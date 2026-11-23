<?php

use App\Models\Theme;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $basicMusicMap = [
            1 => [1, 'Solo Acoustic Serenade – Jason Shaw (Audionautix)'],
            2 => [2, 'Acoustic Meditation – Jason Shaw (Fingerstyle Guitar)'],
            3 => [3, 'Green Leaves Romance – Jason Shaw (Acoustic Guitar)'],
            4 => [4, 'Serenity Strings – Jason Shaw (Soft Guitar)'],
            5 => [5, 'Calmant (Peaceful Acoustic) – Kevin MacLeod (Incompetech)'],
            6 => [1, 'Solo Acoustic Serenade – Jason Shaw (Audionautix)'],
            7 => [2, 'Acoustic Meditation – Jason Shaw (Fingerstyle Guitar)'],
            8 => [3, 'Green Leaves Romance – Jason Shaw (Acoustic Guitar)'],
            9 => [4, 'Serenity Strings – Jason Shaw (Soft Guitar)'],
            10 => [5, 'Calmant (Peaceful Acoustic) – Kevin MacLeod (Incompetech)'],
        ];

        foreach ($basicMusicMap as $themeId => [$musicId, $musicLabel]) {
            $theme = Theme::find($themeId);
            if ($theme) {
                $config = is_array($theme->theme_config)
                    ? $theme->theme_config
                    : (json_decode($theme->theme_config, true) ?? []);

                $config['default_music_id'] = $musicId;
                $config['default_music'] = $musicLabel;

                $theme->theme_config = $config;
                $theme->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reversal needed
    }
};
