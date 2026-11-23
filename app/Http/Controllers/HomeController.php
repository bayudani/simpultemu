<?php

namespace App\Http\Controllers;

use App\Models\Theme;

class HomeController extends Controller
{
    public function index()
    {
        $themes = Theme::where('is_active', true)
            ->limit(8)
            ->get()
            ->map(function ($theme) {
                $config = is_array($theme->theme_config) ? $theme->theme_config : (json_decode($theme->theme_config, true) ?? []);
                $layout = $config['layout'] ?? 'vertical_stack';

                return [
                    'id' => $theme->id,
                    'name' => $theme->name,
                    'slug' => $theme->slug,
                    'description' => $theme->description,
                    'price' => $theme->price,
                    'tier' => $theme->tier,
                    'layout' => str_replace('_', ' ', $layout),
                    'is_premium' => $theme->isPremium(),
                    'mockup_html' => view('partials.theme-phone-mockup', ['theme' => $theme, 'size' => 'catalog'])->render(),
                ];
            });

        return view('home', compact('themes'));
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function howItWorks()
    {
        return view('how-it-works');
    }

    public function faq()
    {
        return view('faq');
    }

    public function about()
    {
        return view('about');
    }
}
