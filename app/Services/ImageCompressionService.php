<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageCompressionService
{
    /**
     * Compress and resize an uploaded image file before storing it to disk.
     */
    public function compressAndStoreUploadedFile(
        UploadedFile $file,
        string $directory,
        string $disk = 'public',
        int $maxDimension = 1600,
        int $quality = 80,
        bool $preserveAlpha = false,
    ): string {
        $directory = trim($directory, '/');
        $rawBinary = @file_get_contents($file->getRealPath());
        $mimeType = $file->getMimeType() ?: $file->getClientMimeType();
        $fallbackExt = strtolower($file->getClientOriginalExtension() ?: 'jpg');

        if ($rawBinary === false || $rawBinary === '') {
            return $file->store($directory, $disk);
        }

        ['binary' => $binary, 'extension' => $extension] = $this->compressBinary(
            $rawBinary,
            $mimeType,
            $fallbackExt,
            $maxDimension,
            $quality,
            $preserveAlpha,
        );

        $fileName = $directory.'/'.Str::random(40).'.'.$extension;
        Storage::disk($disk)->put($fileName, $binary);

        return $fileName;
    }

    /**
     * Decode, compress, and resize a base64 data URI image before storing it to disk.
     */
    public function compressAndStoreBase64(
        string $dataUri,
        string $directory,
        string $disk = 'public',
        int $maxDimension = 1600,
        int $quality = 80,
        bool $preserveAlpha = false,
    ): ?string {
        if (! Str::startsWith($dataUri, 'data:image/')) {
            return null;
        }

        $fallbackExt = 'jpg';
        $mimeType = 'image/jpeg';
        $encodedPayload = $dataUri;

        if (preg_match('/^data:(image\/[a-zA-Z0-9\+\-\.]+);base64,/', $dataUri, $matches)) {
            $mimeType = strtolower($matches[1]);
            $encodedPayload = substr($dataUri, strpos($dataUri, ',') + 1);
            $fallbackExt = match ($mimeType) {
                'image/png' => 'png',
                'image/webp' => 'webp',
                default => 'jpg',
            };
        }

        $decoded = base64_decode($encodedPayload);
        if ($decoded === false || $decoded === '') {
            return null;
        }

        $directory = trim($directory, '/');
        ['binary' => $binary, 'extension' => $extension] = $this->compressBinary(
            $decoded,
            $mimeType,
            $fallbackExt,
            $maxDimension,
            $quality,
            $preserveAlpha,
        );

        $fileName = $directory.'/'.Str::random(40).'.'.$extension;
        Storage::disk($disk)->put($fileName, $binary);

        return $fileName;
    }

    /**
     * Compress and resize raw image bytes using PHP GD while fixing EXIF orientation.
     *
     * @return array{binary: string, extension: string}
     */
    private function compressBinary(
        string $rawBinary,
        ?string $mimeType,
        string $fallbackExt,
        int $maxDimension,
        int $quality,
        bool $preserveAlpha,
    ): array {
        $fallback = [
            'binary' => $rawBinary,
            'extension' => $fallbackExt === 'jpeg' ? 'jpg' : $fallbackExt,
        ];

        if (! extension_loaded('gd') || ! function_exists('imagecreatefromstring')) {
            return $fallback;
        }

        $source = @imagecreatefromstring($rawBinary);
        if (! $source) {
            return $fallback;
        }

        $source = $this->applyExifOrientation($source, $rawBinary, $mimeType);

        $origWidth = imagesx($source);
        $origHeight = imagesy($source);
        if ($origWidth <= 0 || $origHeight <= 0) {
            return $fallback;
        }

        $target = $this->resizeIfNeeded($source, $origWidth, $origHeight, $maxDimension);
        $keepAlpha = $preserveAlpha || in_array($mimeType, ['image/png', 'image/webp'], true);

        [$encoded, $outExt] = $this->encodeImage($target, $quality, $keepAlpha);

        if ($encoded === null || $encoded === '') {
            return $fallback;
        }

        $wasResized = imagesx($target) !== $origWidth || imagesy($target) !== $origHeight;
        if (! $wasResized && strlen($encoded) >= strlen($rawBinary)) {
            return $fallback;
        }

        return [
            'binary' => $encoded,
            'extension' => $outExt,
        ];
    }

    /**
     * Rotate JPEG images based on EXIF Orientation metadata so phone portraits stay upright.
     */
    private function applyExifOrientation(\GdImage $image, string $rawBinary, ?string $mimeType): \GdImage
    {
        if (! function_exists('exif_read_data') || ! in_array($mimeType, ['image/jpeg', 'image/jpg', null], true)) {
            return $image;
        }

        $tmpFile = @tempnam(sys_get_temp_dir(), 'st_exif_');
        if ($tmpFile === false) {
            return $image;
        }

        try {
            @file_put_contents($tmpFile, $rawBinary);
            $exif = @exif_read_data($tmpFile);
            $orientation = is_array($exif) ? ($exif['Orientation'] ?? null) : null;

            $angle = match ($orientation) {
                3 => 180,
                6 => -90,
                8 => 90,
                default => null,
            };

            if ($angle !== null) {
                $rotated = @imagerotate($image, $angle, 0);
                if ($rotated instanceof \GdImage) {
                    return $rotated;
                }
            }
        } finally {
            @unlink($tmpFile);
        }

        return $image;
    }

    /**
     * Downscale an image proportionally if either dimension exceeds maxDimension.
     */
    private function resizeIfNeeded(\GdImage $source, int $origWidth, int $origHeight, int $maxDimension): \GdImage
    {
        $largest = max($origWidth, $origHeight);
        if ($maxDimension <= 0 || $largest <= $maxDimension) {
            imagealphablending($source, false);
            imagesavealpha($source, true);

            return $source;
        }

        $ratio = $maxDimension / $largest;
        $newWidth = max(1, (int) round($origWidth * $ratio));
        $newHeight = max(1, (int) round($origHeight * $ratio));

        $canvas = imagecreatetruecolor($newWidth, $newHeight);
        imagealphablending($canvas, false);
        imagesavealpha($canvas, true);
        $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
        imagefilledrectangle($canvas, 0, 0, $newWidth, $newHeight, $transparent);

        imagecopyresampled($canvas, $source, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

        return $canvas;
    }

    /**
     * Encode the GD resource to WebP when supported, or fallback to JPEG/PNG.
     *
     * @return array{0: ?string, 1: string}
     */
    private function encodeImage(\GdImage $image, int $quality, bool $keepAlpha): array
    {
        ob_start();

        if (function_exists('imagewebp')) {
            imagealphablending($image, false);
            imagesavealpha($image, true);
            $ok = @imagewebp($image, null, $quality);
            $data = ob_get_clean();

            if ($ok && is_string($data) && $data !== '') {
                return [$data, 'webp'];
            }

            ob_start();
        }

        if ($keepAlpha && function_exists('imagepng')) {
            imagealphablending($image, false);
            imagesavealpha($image, true);
            $ok = @imagepng($image, null, 7);
            $data = ob_get_clean();

            return [($ok && is_string($data)) ? $data : null, 'png'];
        }

        if (function_exists('imagejpeg')) {
            imageinterlace($image, true);
            $ok = @imagejpeg($image, null, $quality);
            $data = ob_get_clean();

            return [($ok && is_string($data)) ? $data : null, 'jpg'];
        }

        ob_end_clean();

        return [null, 'jpg'];
    }
}
