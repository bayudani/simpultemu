<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Inertia\Inertia;

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

        return Inertia::render('Home', [
            'themes' => $themes,
            'auth' => [
                'user' => auth()->user() ? [
                    'id' => auth()->user()->id,
                    'name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'role' => auth()->user()->role,
                    'avatar' => auth()->user()->avatar,
                    'is_premium' => (bool) auth()->user()->is_premium,
                ] : null,
            ],
        ]);
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
