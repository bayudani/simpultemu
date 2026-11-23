<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Theme extends Model
{
    protected static ?Collection $cachedAllMusic = null;

    protected $fillable = [
        'name',
        'slug',
        'tier',
        'price',
        'description',
        'preview_image',
        'theme_config',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getThemeConfigAttribute($value): array
    {
        if (is_array($value)) {
            return $value;
        }

        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_string($decoded)) {
                $decoded = json_decode($decoded, true);
            }

            return is_array($decoded) ? $decoded : [];
        }

        return [];
    }

    public function setThemeConfigAttribute($value): void
    {
        $this->attributes['theme_config'] = is_array($value) ? json_encode($value) : $value;
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(Invitation::class);
    }

    public function isPremium(): bool
    {
        return $this->tier === 'premium';
    }

    public static function clearMusicCache(): void
    {
        static::$cachedAllMusic = null;
    }

    /**
     * Dapatkan model musik preset default untuk tema ini.
     */
    public function defaultMusic(): ?Music
    {
        $themeConfig = is_array($this->theme_config)
            ? $this->theme_config
            : (json_decode($this->theme_config, true) ?? []);

        $musicId = $themeConfig['default_music_id'] ?? null;

        if (static::$cachedAllMusic === null) {
            static::$cachedAllMusic = Music::all()->keyBy('id');
        }

        if ($musicId && isset(static::$cachedAllMusic[$musicId])) {
            return static::$cachedAllMusic[$musicId];
        }

        if ($this->tier === 'basic') {
            $basicMusic = static::$cachedAllMusic->where('tier', 'basic');
            if ($basicMusic->isNotEmpty()) {
                $basicList = $basicMusic->values();
                $index = ($this->id - 1) % $basicList->count();

                return $basicList[$index];
            }
        }

        if (isset(static::$cachedAllMusic[$this->id])) {
            return static::$cachedAllMusic[$this->id];
        }

        return static::$cachedAllMusic->first();
    }

    public function getDefaultMusicAttribute(): ?Music
    {
        return $this->defaultMusic();
    }

    public function getDefaultMusicIdAttribute(): ?int
    {
        $themeConfig = is_array($this->theme_config)
            ? $this->theme_config
            : (json_decode($this->theme_config, true) ?? []);

        if (isset($themeConfig['default_music_id'])) {
            return (int) $themeConfig['default_music_id'];
        }

        return $this->default_music?->id;
    }

    public function getPresetMusicLabelAttribute(): string
    {
        $music = $this->default_music;
        if ($music) {
            return $music->title.($music->artist ? ' – '.$music->artist : '');
        }

        $themeConfig = is_array($this->theme_config)
            ? $this->theme_config
            : (json_decode($this->theme_config, true) ?? []);

        return $themeConfig['default_music'] ?? 'Musik Preset Default';
    }
}
