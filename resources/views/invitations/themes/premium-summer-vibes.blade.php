<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $invitation->groom_nickname ?? 'Rian' }} &amp; {{ $invitation->bride_nickname ?? 'Maya' }} - Undangan Pernikahan</title>
    <meta name="description" content="Undangan pernikahan {{ $invitation->groom_name ?? 'Rian Pratama' }} dan {{ $invitation->bride_name ?? 'Maya Anggraini' }}">
    <meta property="og:title" content="The Wedding of {{ $invitation->groom_nickname ?? 'Rian' }} &amp; {{ $invitation->bride_nickname ?? 'Maya' }}">
    <meta property="og:description" content="Rayakan momen bahagia pernikahan kami. Klik untuk melihat detail acara dan undangan online.">
    <meta property="og:type" content="website">

    <!-- Google Fonts Comprehensive Multi-Theme Typography for all 20 Themes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Allison&family=Allura&family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..700;1,6..96,400..700&family=Cinzel:wght@400;600;700&family=Cinzel+Decorative:wght@400;700&family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Cormorant+Infant:ital,wght@0,400;0,600;1,400&family=DM+Serif+Display:ital@0;1&family=EB+Garamond:ital,wght@0,400;0,600;1,400&family=Great+Vibes&family=Inter:wght@300;400;500;600&family=Italianno&family=Lato:ital,wght@0,300;0,400;0,700;1,400&family=Lora:ital,wght@0,400;0,600;1,400&family=Marcellus&family=Mea+Culpa&family=Montserrat:wght@300;400;500;600;700&family=Nunito+Sans:wght@300;400;600&family=Outfit:wght@300;400;500;600&family=Pinyon+Script&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600&family=Prata&family=Raleway:wght@300;400;500;600&family=Rochester&family=Shrikhand&family=Sniglet:wght@800&family=Space+Grotesk:wght@300;400;500;600&family=Syne:wght@400;600;700&family=Tangerine:wght@700&family=Titan+One&family=Urbanist:wght@300;400;600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @php
        // 1. Identify active theme data from model
        $themeModel = $invitation->theme ?? null;
        $currentThemeId = $themeModel?->id ?? ($invitation->theme_id ?? 1);
        $currentThemeSlug = $themeModel?->slug ?? ($invitation->theme_slug ?? 'basic-harmony-maroon');
        $currentThemeTier = $themeModel?->tier ?? 'basic';
        $isPremium = ($currentThemeTier === 'premium') || ($themeModel && $themeModel->isPremium()) || str_starts_with($currentThemeSlug, 'premium-');

        // 2. Comprehensive 20 Theme Visual Presets Library (Soft & Elegant)
        $allThemes = [
            1 => [
                'name' => 'Basic Harmony Maroon',
                'slug' => 'basic-harmony-maroon',
                'tier' => 'basic',
                'bgCanvas' => '#FFDADA',
                'bgCard' => '#FFDADA',
                'bgAccentBlock' => '#620000',
                'bgAccentLight' => '#FFEAEA',
                'textMain' => '#620000',
                'textMuted' => '#620000',
                'textAccent' => '#620000',
                'textSecondary' => '#800000',
                'borderFrame' => '#620000',
                'frameRadius' => '24px',
                'frameBorder' => '1.5px solid #620000',
                'frameShadow' => '0 10px 25px -5px rgba(98, 0, 0, 0.08)',
                'photoRadius' => '24px',
                'heroPhotoRadius' => '24px',
                'profilePhotoRadius' => '28px',
                'fontHeading' => "'Playfair Display', Georgia, serif",
                'fontScript' => "'Great Vibes', cursive",
                'fontBody' => "'Lato', sans-serif",
                'ornamentPrimary' => '#620000',
                'ornamentSecondary' => '#F4DFC8',
            ],
            2 => [
                'name' => 'Basic Harmony Emerald',
                'slug' => 'basic-harmony-emerald',
                'tier' => 'basic',
                'bgCanvas' => '#FAFCFA',
                'bgCard' => '#1E6B52',
                'bgAccentBlock' => '#247E64',
                'bgAccentLight' => '#E8F4EE',
                'textMain' => '#1A382B',
                'textMuted' => '#4D6B5E',
                'textAccent' => '#1E6B52',
                'textSecondary' => '#D4AF37',
                'borderFrame' => '#D4AF37',
                'frameRadius' => '16px 44px 20px 20px',
                'frameBorder' => '1.5px solid #D4AF37',
                'frameShadow' => '0 16px 36px -6px rgba(22, 86, 64, 0.28)',
                'photoRadius' => '8px',
                'heroPhotoRadius' => '10px',
                'profilePhotoRadius' => '10px',
                'fontHeading' => "'Cinzel', serif",
                'fontScript' => "'Cinzel', serif",
                'fontBody' => "'Montserrat', sans-serif",
                'ornamentPrimary' => '#D4AF37',
                'ornamentSecondary' => '#E5C158',
            ],
            3 => [
                'name' => 'Basic Harmony Navy',
                'slug' => 'basic-harmony-navy',
                'tier' => 'basic',
                'bgCanvas' => '#FFFFFF',
                'bgCard' => '#1E3A5F',
                'bgAccentBlock' => '#1E3A5F',
                'bgAccentLight' => '#EDF4FA',
                'textMain' => '#0F172A',
                'textMuted' => '#475569',
                'textAccent' => '#1E3A5F',
                'textSecondary' => '#4B6B94',
                'borderFrame' => '#1E3A5F',
                'frameRadius' => '16px',
                'frameBorder' => '1.5px solid #1E3A5F',
                'frameShadow' => '0 12px 30px -5px rgba(30, 58, 95, 0.15)',
                'photoRadius' => '16px',
                'heroPhotoRadius' => '16px',
                'profilePhotoRadius' => '16px',
                'fontHeading' => "'Prata', serif",
                'fontScript' => "'Prata', serif",
                'fontBody' => "'Montserrat', sans-serif",
                'ornamentPrimary' => '#1E3A5F',
                'ornamentSecondary' => '#CBDCEB',
            ],
            4 => [
                'name' => 'Basic Harmony Rose',
                'slug' => 'basic-harmony-rose',
                'tier' => 'basic',
                'bgCanvas' => '#FDF8F8',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#9D174D',
                'bgAccentLight' => '#FCE7F3',
                'textMain' => '#362222',
                'textMuted' => '#795757',
                'textAccent' => '#9D174D',
                'textSecondary' => '#E11D48',
                'borderFrame' => '#BE185D',
                'frameRadius' => '56px',
                'frameBorder' => '1.5px solid #BE185D',
                'frameShadow' => '0 10px 25px -5px rgba(190, 24, 93, 0.08)',
                'photoRadius' => '9999px',
                'heroPhotoRadius' => '48px',
                'profilePhotoRadius' => '9999px',
                'fontHeading' => "'Cormorant Garamond', serif",
                'fontScript' => "'Allura', cursive",
                'fontBody' => "'Poppins', sans-serif",
                'ornamentPrimary' => '#BE185D',
                'ornamentSecondary' => '#FBCFE8',
            ],
            5 => [
                'name' => 'Basic Harmony Monochrome',
                'slug' => 'basic-harmony-monochrome',
                'tier' => 'basic',
                'bgCanvas' => '#FFFFFF',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#2C2D2F',
                'bgAccentLight' => '#F4F4F5',
                'textMain' => '#18181B',
                'textMuted' => '#52525B',
                'textAccent' => '#2C2D2F',
                'textSecondary' => '#3F3F46',
                'borderFrame' => '#2C2D2F',
                'frameRadius' => '24px',
                'frameBorder' => '1px solid #2C2D2F',
                'frameShadow' => '0 10px 25px -5px rgba(0, 0, 0, 0.06)',
                'photoRadius' => '16px',
                'heroPhotoRadius' => '20px',
                'profilePhotoRadius' => '9999px',
                'fontHeading' => "'Bodoni Moda', Georgia, serif",
                'fontScript' => "'Alex Brush', cursive",
                'fontBody' => "'Space Grotesk', sans-serif",
                'ornamentPrimary' => '#2C2D2F',
                'ornamentSecondary' => '#E4E4E7',
            ],
            6 => [
                'name' => 'Basic Harmony Terracotta',
                'slug' => 'basic-harmony-terracotta',
                'tier' => 'basic',
                'bgCanvas' => '#FBF7F2',
                'bgCard' => '#FFFDF9',
                'bgAccentBlock' => '#C2410C',
                'bgAccentLight' => '#FFEDD5',
                'textMain' => '#292524',
                'textMuted' => '#57534E',
                'textAccent' => '#C2410C',
                'textSecondary' => '#D97706',
                'borderFrame' => '#C2410C',
                'frameRadius' => '20px',
                'frameBorder' => '2px solid #C2410C',
                'frameShadow' => '0 12px 30px -5px rgba(194, 65, 12, 0.12)',
                'photoRadius' => '8px',
                'heroPhotoRadius' => '12px',
                'profilePhotoRadius' => '8px',
                'fontHeading' => "'Lora', serif",
                'fontScript' => "'Great Vibes', cursive",
                'fontBody' => "'Plus Jakarta Sans', sans-serif",
                'ornamentPrimary' => '#C2410C',
                'ornamentSecondary' => '#FED7AA',
            ],
            7 => [
                'name' => 'Basic Harmony Lilac',
                'slug' => 'basic-harmony-lilac',
                'tier' => 'basic',
                'bgCanvas' => '#FAF7FC',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#7E22CE',
                'bgAccentLight' => '#F3E8FF',
                'textMain' => '#2E1065',
                'textMuted' => '#581C87',
                'textAccent' => '#7E22CE',
                'textSecondary' => '#9333EA',
                'borderFrame' => '#7E22CE',
                'frameRadius' => '38px',
                'frameBorder' => '1.5px solid #7E22CE',
                'frameShadow' => '0 10px 25px -5px rgba(126, 34, 206, 0.08)',
                'photoRadius' => '28px',
                'heroPhotoRadius' => '32px',
                'profilePhotoRadius' => '28px',
                'fontHeading' => "'Outfit', sans-serif",
                'fontScript' => "'Alex Brush', cursive",
                'fontBody' => "'Outfit', sans-serif",
                'ornamentPrimary' => '#7E22CE',
                'ornamentSecondary' => '#E9D5FF',
            ],
            8 => [
                'name' => 'Basic Harmony Sage',
                'slug' => 'basic-harmony-sage',
                'tier' => 'basic',
                'bgCanvas' => '#F4F7F4',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#3F6212',
                'bgAccentLight' => '#ECFCCB',
                'textMain' => '#1A2E05',
                'textMuted' => '#365314',
                'textAccent' => '#3F6212',
                'textSecondary' => '#4D7C0F',
                'borderFrame' => '#4D7C0F',
                'frameRadius' => '140px',
                'frameBorder' => '1.5px solid #4D7C0F',
                'frameShadow' => '0 10px 25px -5px rgba(77, 124, 15, 0.08)',
                'photoRadius' => '9999px',
                'heroPhotoRadius' => '9999px',
                'profilePhotoRadius' => '9999px',
                'fontHeading' => "'EB Garamond', serif",
                'fontScript' => "'Pinyon Script', cursive",
                'fontBody' => "'Nunito Sans', sans-serif",
                'ornamentPrimary' => '#4D7C0F',
                'ornamentSecondary' => '#D9F99D',
            ],
            9 => [
                'name' => 'Basic Harmony Champagne',
                'slug' => 'basic-harmony-champagne',
                'tier' => 'basic',
                'bgCanvas' => '#FBF9F4',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#B45309',
                'bgAccentLight' => '#FEF3C7',
                'textMain' => '#3D1602',
                'textMuted' => '#78350F',
                'textAccent' => '#B45309',
                'textSecondary' => '#D97706',
                'borderFrame' => '#B45309',
                'frameRadius' => '48px',
                'frameBorder' => '2px solid #B45309',
                'frameShadow' => '0 10px 25px -5px rgba(180, 83, 9, 0.12)',
                'photoRadius' => '32px',
                'heroPhotoRadius' => '36px',
                'profilePhotoRadius' => '32px',
                'fontHeading' => "'Marcellus', serif",
                'fontScript' => "'Great Vibes', cursive",
                'fontBody' => "'Raleway', sans-serif",
                'ornamentPrimary' => '#B45309',
                'ornamentSecondary' => '#FDE68A',
            ],
            10 => [
                'name' => 'Basic Harmony Charcoal',
                'slug' => 'basic-harmony-charcoal',
                'tier' => 'basic',
                'bgCanvas' => '#F3F4F6',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#374151',
                'bgAccentLight' => '#E5E7EB',
                'textMain' => '#111827',
                'textMuted' => '#4B5563',
                'textAccent' => '#374151',
                'textSecondary' => '#4B5563',
                'borderFrame' => '#374151',
                'frameRadius' => '16px',
                'frameBorder' => '2px solid #374151',
                'frameShadow' => '0 10px 25px -5px rgba(55, 65, 81, 0.12)',
                'photoRadius' => '12px',
                'heroPhotoRadius' => '14px',
                'profilePhotoRadius' => '12px',
                'fontHeading' => "'DM Serif Display', serif",
                'fontScript' => "'Alex Brush', cursive",
                'fontBody' => "'Urbanist', sans-serif",
                'ornamentPrimary' => '#374151',
                'ornamentSecondary' => '#9CA3AF',
            ],

            // === 10 PREMIUM THEMES ===
            11 => [
                'name' => 'Premium Serenade Maroon',
                'slug' => 'premium-serenade-maroon',
                'tier' => 'premium',
                'bgCanvas' => '#FAF5F6',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#5A0B18',
                'bgAccentLight' => '#FCE7EB',
                'textMain' => '#2E040B',
                'textMuted' => '#5A2A32',
                'textAccent' => '#D4AF37',
                'textSecondary' => '#5A0B18',
                'borderFrame' => '#D4AF37',
                'frameRadius' => '9999px 9999px 28px 28px',
                'frameBorder' => '2px solid #D4AF37',
                'frameShadow' => '0 20px 50px -10px rgba(90, 11, 24, 0.18)',
                'photoRadius' => '9999px 9999px 20px 20px',
                'heroPhotoRadius' => '9999px 9999px 24px 24px',
                'profilePhotoRadius' => '9999px 9999px 20px 20px',
                'fontHeading' => "'Playfair Display', serif",
                'fontScript' => "'Pinyon Script', cursive",
                'fontBody' => "'Cormorant Infant', serif",
                'ornamentPrimary' => '#D4AF37',
                'ornamentSecondary' => '#5A0B18',
            ],
            12 => [
                'name' => 'Premium Serenade Emerald',
                'slug' => 'premium-serenade-emerald',
                'tier' => 'premium',
                'bgCanvas' => '#FAF6EE',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#064E3B',
                'bgAccentLight' => '#E6F4EA',
                'textMain' => '#0F2926',
                'textMuted' => '#2D554C',
                'textAccent' => '#D4AF37',
                'textSecondary' => '#064E3B',
                'borderFrame' => '#D4AF37',
                'frameRadius' => '9999px 9999px 28px 28px',
                'frameBorder' => '2px solid #D4AF37',
                'frameShadow' => '0 20px 50px -10px rgba(6, 78, 59, 0.18)',
                'photoRadius' => '24px',
                'heroPhotoRadius' => '9999px 9999px 24px 24px',
                'profilePhotoRadius' => '24px',
                'fontHeading' => "'Cinzel Decorative', serif",
                'fontScript' => "'Pinyon Script', cursive",
                'fontBody' => "'Montserrat', sans-serif",
                'ornamentPrimary' => '#D4AF37',
                'ornamentSecondary' => '#064E3B',
            ],
            13 => [
                'name' => 'Premium Summer Vibes',
                'slug' => 'premium-summer-vibes',
                'tier' => 'premium',
                'bgCanvas' => '#EFECE6',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#1D63B8',
                'bgAccentLight' => '#FFF7ED',
                'textMain' => '#1E293B',
                'textMuted' => '#64748B',
                'textAccent' => '#D94B26',
                'textSecondary' => '#1D63B8',
                'borderFrame' => '#1D63B8',
                'frameRadius' => '16px',
                'frameBorder' => '2px dashed #1D63B8',
                'frameShadow' => '0 16px 40px -10px rgba(29, 99, 184, 0.15)',
                'photoRadius' => '8px',
                'heroPhotoRadius' => '8px',
                'profilePhotoRadius' => '8px',
                'fontHeading' => "'Shrikhand', 'Titan One', cursive",
                'fontScript' => "'Cinzel', serif",
                'fontBody' => "'Plus Jakarta Sans', sans-serif",
                'ornamentPrimary' => '#D94B26',
                'ornamentSecondary' => '#1D63B8',
            ],
            14 => [
                'name' => 'Premium Serenade Blush Pink',
                'slug' => 'premium-serenade-blush-pink',
                'tier' => 'premium',
                'bgCanvas' => '#FDF8F9',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#831843',
                'bgAccentLight' => '#FCE7F3',
                'textMain' => '#362222',
                'textMuted' => '#6B384A',
                'textAccent' => '#C58C85',
                'textSecondary' => '#831843',
                'borderFrame' => '#C58C85',
                'frameRadius' => '48px',
                'frameBorder' => '2px solid #C58C85',
                'frameShadow' => '0 15px 40px -8px rgba(197, 140, 133, 0.25)',
                'photoRadius' => '8px',
                'heroPhotoRadius' => '24px',
                'profilePhotoRadius' => '12px',
                'fontHeading' => "'Bodoni Moda', serif",
                'fontScript' => "'Great Vibes', cursive",
                'fontBody' => "'Poppins', sans-serif",
                'ornamentPrimary' => '#C58C85',
                'ornamentSecondary' => '#831843',
            ],
            15 => [
                'name' => 'Premium Serenade Midnight Amber',
                'slug' => 'premium-serenade-midnight-amber',
                'tier' => 'premium',
                'bgCanvas' => '#161514',
                'bgCard' => '#1C1A18',
                'bgAccentBlock' => '#242220',
                'bgAccentLight' => '#2E2B28',
                'textMain' => '#FAF5EC',
                'textMuted' => '#C5B59E',
                'textAccent' => '#DDA74F',
                'textSecondary' => '#E8C37D',
                'borderFrame' => '#DDA74F',
                'frameRadius' => '24px',
                'frameBorder' => '1.5px solid #DDA74F',
                'frameShadow' => '0 20px 50px -10px rgba(0, 0, 0, 0.7)',
                'photoRadius' => '20px',
                'heroPhotoRadius' => '24px',
                'profilePhotoRadius' => '20px',
                'fontHeading' => "'Cinzel', 'Cormorant Garamond', serif",
                'fontScript' => "'Great Vibes', 'Pinyon Script', cursive",
                'fontBody' => "'Plus Jakarta Sans', sans-serif",
                'ornamentPrimary' => '#DDA74F',
                'ornamentSecondary' => '#2C5E6B',
            ],
            16 => [
                'name' => 'Premium Museum of Love',
                'slug' => 'premium-museum-of-love',
                'tier' => 'premium',
                'bgCanvas' => '#F7F2E8',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#8B1E22',
                'bgAccentLight' => '#F4EAD4',
                'textMain' => '#2A1F1D',
                'textMuted' => '#6B5A55',
                'textAccent' => '#8B1E22',
                'textSecondary' => '#D4AF37',
                'borderFrame' => '#D4AF37',
                'frameRadius' => '16px',
                'frameBorder' => '2px solid #D4AF37',
                'frameShadow' => '0 25px 60px -10px rgba(139, 30, 34, 0.25)',
                'photoRadius' => '8px',
                'heroPhotoRadius' => '8px',
                'profilePhotoRadius' => '8px',
                'fontHeading' => "'Cinzel Decorative', 'Playfair Display', serif",
                'fontScript' => "'Pinyon Script', 'Alex Brush', cursive",
                'fontBody' => "'Plus Jakarta Sans', sans-serif",
                'ornamentPrimary' => '#D4AF37',
                'ornamentSecondary' => '#8B1E22',
            ],
            17 => [
                'name' => 'Premium Serenade Botanical',
                'slug' => 'premium-serenade-botanical',
                'tier' => 'premium',
                'bgCanvas' => '#F4FAF5',
                'bgCard' => 'rgba(255, 255, 255, 0.92)',
                'bgAccentBlock' => '#14532D',
                'bgAccentLight' => '#DCFCE7',
                'textMain' => '#051F0F',
                'textMuted' => '#164E2E',
                'textAccent' => '#D4AF37',
                'textSecondary' => '#14532D',
                'borderFrame' => '#D4AF37',
                'frameRadius' => '9999px 9999px 32px 32px',
                'frameBorder' => '2px solid #D4AF37',
                'frameShadow' => '0 20px 50px -10px rgba(20, 83, 45, 0.18)',
                'photoRadius' => '9999px 9999px 20px 20px',
                'heroPhotoRadius' => '9999px 9999px 24px 24px',
                'profilePhotoRadius' => '9999px 9999px 20px 20px',
                'fontHeading' => "'Cormorant Garamond', serif",
                'fontScript' => "'Allison', cursive",
                'fontBody' => "'Montserrat', sans-serif",
                'ornamentPrimary' => '#D4AF37',
                'ornamentSecondary' => '#14532D',
            ],
            18 => [
                'name' => 'Premium Serenade Minimalist White',
                'slug' => 'premium-serenade-minimalist-white',
                'tier' => 'premium',
                'bgCanvas' => '#F8F9FA',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#1E293B',
                'bgAccentLight' => '#F1F5F9',
                'textMain' => '#0F172A',
                'textMuted' => '#475569',
                'textAccent' => '#D4AF37',
                'textSecondary' => '#1E293B',
                'borderFrame' => '#0F172A',
                'frameRadius' => '0px',
                'frameBorder' => '2px solid #0F172A',
                'frameShadow' => '0 10px 30px -5px rgba(15, 23, 42, 0.12)',
                'photoRadius' => '0px',
                'heroPhotoRadius' => '0px',
                'profilePhotoRadius' => '0px',
                'fontHeading' => "'Prata', serif",
                'fontScript' => "'Pinyon Script', cursive",
                'fontBody' => "'Syne', sans-serif",
                'ornamentPrimary' => '#D4AF37',
                'ornamentSecondary' => '#1E293B',
            ],
            19 => [
                'name' => 'Premium Serenade Lavender Mist',
                'slug' => 'premium-serenade-lavender-mist',
                'tier' => 'premium',
                'bgCanvas' => '#8B7CB0',
                'bgCard' => '#FFFFFF',
                'bgAccentBlock' => '#9B88B3',
                'bgAccentLight' => '#F4EFF9',
                'textMain' => '#2E1A47',
                'textMuted' => '#6B5282',
                'textAccent' => '#9B88B3',
                'textSecondary' => '#4C1D95',
                'borderFrame' => '#9B88B3',
                'frameRadius' => '32px',
                'frameBorder' => '1.5px solid #D6C8E3',
                'frameShadow' => '0 20px 50px -10px rgba(155, 136, 179, 0.28)',
                'photoRadius' => '28px',
                'heroPhotoRadius' => '32px',
                'profilePhotoRadius' => '9999px 9999px 28px 28px',
                'fontHeading' => "'Playfair Display', serif",
                'fontScript' => "'Pinyon Script', cursive",
                'fontBody' => "'Urbanist', sans-serif",
                'ornamentPrimary' => '#9B88B3',
                'ornamentSecondary' => '#4C1D95',
            ],
            20 => [
                'name' => 'Premium Serenade Dark Elegance',
                'slug' => 'premium-serenade-dark-elegance',
                'tier' => 'premium',
                'bgCanvas' => '#070807',
                'bgCard' => '#131713',
                'bgAccentBlock' => '#1A211A',
                'bgAccentLight' => '#212A21',
                'textMain' => '#FAF7F2',
                'textMuted' => '#9EB092',
                'textAccent' => '#9EB092',
                'textSecondary' => '#FAF7F2',
                'borderFrame' => '#9EB092',
                'frameRadius' => '24px',
                'frameBorder' => '1.5px solid #9EB092',
                'frameShadow' => '0 25px 60px -10px rgba(0, 0, 0, 0.7)',
                'photoRadius' => '24px',
                'heroPhotoRadius' => '9999px',
                'profilePhotoRadius' => '24px',
                'fontHeading' => "'Cinzel', Georgia, serif",
                'fontScript' => "'Alex Brush', cursive",
                'fontBody' => "'Urbanist', sans-serif",
                'ornamentPrimary' => '#9EB092',
                'ornamentSecondary' => '#588157',
            ],
        ];

        // Active Theme Configuration
        $activeTheme = $allThemes[$currentThemeId] ?? $allThemes[1];

        // Data Normalization
        $groomName = $invitation->groom_name ?? 'Rian Pratama, S.Kom.';
        $groomNickname = $invitation->groom_nickname ?? 'Rian';
        $groomParents = $invitation->groom_parents ?? 'Putra pertama dari Bpk. Hendra & Ibu Susi';
        $groomInstagram = $invitation->groom_instagram ?? 'rian.pratama';

        $brideName = $invitation->bride_name ?? 'Maya Anggraini, S.E.';
        $brideNickname = $invitation->bride_nickname ?? 'Maya';
        $brideParents = $invitation->bride_parents ?? 'Putri kedua dari Bpk. Bambang & Ibu Dewi';
        $brideInstagram = $invitation->bride_instagram ?? 'maya.anggraini';

        $rawTo = trim((string) request('to', ''));
        if (!empty($rawTo)) {
            $guestName = (str_contains($rawTo, '-') && !str_contains($rawTo, ' '))
                ? ucwords(str_replace('-', ' ', $rawTo))
                : $rawTo;
        } else {
            $guestName = $guest->name ?? (!empty($isDemo) ? 'Budi Santoso & Pasangan' : 'Tamu Undangan');
        }
        $eventDate = ($invitation->event_date ? ($invitation->event_date instanceof \Illuminate\Support\Carbon ? $invitation->event_date->copy() : \Illuminate\Support\Carbon::parse($invitation->event_date)) : now()->addDays(62)->startOfDay())->locale('id');
        $eventDateFormatted = $eventDate->translatedFormat('l, d F Y');
        $eventDayName = strtoupper($eventDate->translatedFormat('l'));
        $eventDayNum = $eventDate->format('d');
        $eventMonthYear = strtoupper($eventDate->translatedFormat('F Y'));

        $venueName = $invitation->venue ?? 'Grand Ballroom Hotel Mulia';
        $venueAddress = $invitation->address ?? 'Jl. Asia Afrika No. 6, Senayan, Jakarta Pusat';
        $mapsUrl = $invitation->maps_url ?? 'https://maps.google.com/?q=Hotel+Mulia+Senayan';

        $akadDate = ($invitation->akad_date ? ($invitation->akad_date instanceof \Illuminate\Support\Carbon ? $invitation->akad_date->copy() : \Illuminate\Support\Carbon::parse($invitation->akad_date)) : $eventDate->copy())->locale('id');
        $akadVenue = $invitation->akad_venue ?? 'Masjid Agung Al-Azhar';
        $akadAddress = $invitation->akad_address ?? 'Jl. Sisingamangaraja, Kebayoran Baru, Jakarta Selatan';
        $akadMapsUrl = $invitation->akad_maps_url ?? 'https://maps.google.com/?q=Masjid+Agung+Al-Azhar';
        $akadTimeFormatted = ($invitation->akad_time ? (is_string($invitation->akad_time) ? $invitation->akad_time : $invitation->akad_time->format('H:i')) : '08:00') . ' - ' . ($invitation->akad_end_time ?? '10:00') . ' WIB';
        $eventTimeFormatted = ($invitation->event_time ? (is_string($invitation->event_time) ? $invitation->event_time : $invitation->event_time->format('H:i')) : '11:00') . ' - ' . ($invitation->event_end_time ?? '13:00') . ' WIB';
        $resepsiDate = $eventDate;
        $resepsiTimeFormatted = $eventTimeFormatted;
        $akadTimeRaw = is_string($invitation->akad_time ?? null) ? $invitation->akad_time : ($invitation->akad_time?->format('H:i') ?? '08:00');
        $resepsiTimeRaw = is_string($invitation->event_time ?? null) ? $invitation->event_time : ($invitation->event_time?->format('H:i') ?? '11:00');

        $musicUrl = $invitation->music ? $invitation->music->audio_url : asset('music/janji-suci.mp3');

        $galleryPhotos = $invitation->photos && $invitation->photos->count() > 0
            ? $invitation->photos->map(fn($p) => Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path))->toArray()
            : [
                'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80',
                'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80',
                'https://images.unsplash.com/photo-1520854221256-17451cc331bf?w=800&auto=format&fit=crop&q=80',
                'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
                'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?w=800&auto=format&fit=crop&q=80',
                'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80'
            ];

        $bgPhoto = $invitation->background_photo_url
            ?? ($galleryPhotos[0] ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1600&auto=format&fit=crop&q=80');
        $storyBgPhoto = $galleryPhotos[1] ?? $bgPhoto;
        $closingBgPhoto = $galleryPhotos[2] ?? $bgPhoto;

        // Theme 5 (Basic Harmony Monochrome) Bespoke Photo Assets
        $t5CoverPhoto = !empty($invitation->background_photo_url)
            ? $invitation->background_photo_url
            : asset('images/themes/monochrome/cover-default.jpg');

        $t5HeroPhoto = (!empty($invitation->background_photo_url) && $invitation->id != 999999)
            ? $invitation->background_photo_url
            : asset('images/themes/monochrome/hero-default.jpg');

        $t5CountdownPhoto = !empty($invitation->countdown_photo_url)
            ? $invitation->countdown_photo_url
            : asset('images/themes/monochrome/countdown-default.jpg');

        $t5StoryPhoto1 = !empty($invitation->story_photo_1_url)
            ? $invitation->story_photo_1_url
            : asset('images/themes/monochrome/story-1.jpg');

        $t5StoryPhoto2 = !empty($invitation->story_photo_2_url)
            ? $invitation->story_photo_2_url
            : asset('images/themes/monochrome/story-2.jpg');

        $t5EventPhoto = asset('images/themes/monochrome/event-default.jpg');

        $t5BridePhoto = !empty($invitation->bride_photo)
            ? (Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo))
            : asset('images/themes/monochrome/bride-default.jpg');

        $t5GroomPhoto = !empty($invitation->groom_photo)
            ? (Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo))
            : asset('images/themes/monochrome/groom-default.jpg');

        $t5DefaultSlides = [
            asset('images/themes/monochrome/slide-1.jpg'),
            asset('images/themes/monochrome/slide-2.jpg'),
            asset('images/themes/monochrome/slide-3.jpg'),
            asset('images/themes/monochrome/slide-4.jpg'),
            asset('images/themes/monochrome/slide-5.jpg'),
        ];
        $t5RollingPhotos = [];
        if (!empty($invitation->photos) && $invitation->photos->count() >= 3) {
            foreach ($invitation->photos as $p) {
                $t5RollingPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
            }
        }
        while (count($t5RollingPhotos) < 5) {
            $t5RollingPhotos[] = $t5DefaultSlides[count($t5RollingPhotos) % 5];
        }

        // Theme 5 3-2-1 Bespoke Editorial Gallery Photos (Matching User Reference Image 4)
        $t5DefaultGallery = [
            asset('images/themes/monochrome/slide-1.jpg'),
            asset('images/themes/monochrome/slide-2.jpg'),
            asset('images/themes/monochrome/slide-3.jpg'),
            asset('images/themes/monochrome/slide-4.jpg'),
            asset('images/themes/monochrome/slide-5.jpg'),
            asset('images/themes/monochrome/hero-default.jpg'),
        ];
        $t5GalleryPhotos = [];
        if (!empty($invitation->photos) && $invitation->photos->count() > 0) {
            foreach ($invitation->photos as $p) {
                $t5GalleryPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
            }
        }
        $galIdx = 0;
        while (count($t5GalleryPhotos) < 6) {
            $t5GalleryPhotos[] = $t5DefaultGallery[$galIdx % count($t5DefaultGallery)];
            $galIdx++;
        }

        // Theme 19 (Premium Serenade Lavender Mist) Bespoke Variables & Photo Assets
        $isLavenderMist = ($currentThemeId == 19) || ($currentThemeSlug === 'premium-serenade-lavender-mist') || (request()->route('theme') == 19);

        $t19DefaultCover = 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1200&auto=format&fit=crop&q=80';
        $t19DefaultHero = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t19DefaultBride = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80';
        $t19DefaultGroom = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
        $t19DefaultStory1 = 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80';
        $t19DefaultStory2 = 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80';
        $t19DefaultStory3 = 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80';

        $t19CoverPhoto = !empty($invitation->background_photo)
            ? (Str::startsWith($invitation->background_photo, ['http://', 'https://']) ? $invitation->background_photo : asset('storage/' . $invitation->background_photo))
            : (!empty($invitation->background_photo_url) ? $invitation->background_photo_url : (!empty($invitation->cover_photo_url) ? $invitation->cover_photo_url : $t19DefaultCover));

        $t19HeroPhoto = !empty($invitation->countdown_photo)
            ? (Str::startsWith($invitation->countdown_photo, ['http://', 'https://']) ? $invitation->countdown_photo : asset('storage/' . $invitation->countdown_photo))
            : (!empty($invitation->countdown_photo_url) ? $invitation->countdown_photo_url : $t19CoverPhoto);

        $t19BridePhoto = !empty($invitation->bride_photo)
            ? (Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo))
            : $t19DefaultBride;

        $t19GroomPhoto = !empty($invitation->groom_photo)
            ? (Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo))
            : $t19DefaultGroom;

        $t19StoryPhoto1 = !empty($invitation->story_photo_1_url) ? $invitation->story_photo_1_url : $t19DefaultStory1;
        $t19StoryPhoto2 = !empty($invitation->story_photo_2_url) ? $invitation->story_photo_2_url : $t19DefaultStory2;
        $t19StoryPhoto3 = !empty($invitation->story_photo_3_url) ? $invitation->story_photo_3_url : $t19DefaultStory3;

        $t19GalleryPhotos = [];
        if (!empty($invitation->photos) && $invitation->photos->count() > 0) {
            foreach ($invitation->photos as $p) {
                $t19GalleryPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
            }
        }
        $t19DefaultGallery = [
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?w=800&auto=format&fit=crop&q=80',
        ];
        $t19GalIdx = 0;
        while (count($t19GalleryPhotos) < 6) {
            $t19GalleryPhotos[] = $t19DefaultGallery[$t19GalIdx % count($t19DefaultGallery)];
            $t19GalIdx++;
        }

        // Theme 15 (Premium Serenade Midnight Amber) Bespoke Variables & Photo Assets
        $isMidnightAmber = ($currentThemeId == 15) || ($currentThemeSlug === 'premium-serenade-midnight-amber') || ($currentThemeSlug === 'premium-serenade-rustic-wood') || (request()->route('theme') == 15);

        $t15DefaultCover = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t15DefaultHero = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t15DefaultBride = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80';
        $t15DefaultGroom = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
        $t15DefaultStory1 = 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80';
        $t15DefaultStory2 = 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80';
        $t15DefaultStory3 = 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80';

        $t15CoverPhoto = !empty($invitation->cover_photo_url)
            ? $invitation->cover_photo_url
            : (!empty($invitation->background_photo_url) ? $invitation->background_photo_url : $t15DefaultCover);

        $t15HeroPhoto = !empty($invitation->countdown_photo_url)
            ? $invitation->countdown_photo_url
            : (!empty($invitation->cover_photo_url) ? $invitation->cover_photo_url : $t15DefaultHero);

        $t15BridePhoto = !empty($invitation->bride_photo)
            ? (Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo))
            : $t15DefaultBride;

        $t15GroomPhoto = !empty($invitation->groom_photo)
            ? (Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo))
            : $t15DefaultGroom;

        $t15StoryPhoto1 = !empty($invitation->story_photo_1_url) ? $invitation->story_photo_1_url : $t15DefaultStory1;
        $t15StoryPhoto2 = !empty($invitation->story_photo_2_url) ? $invitation->story_photo_2_url : $t15DefaultStory2;
        $t15StoryPhoto3 = !empty($invitation->story_photo_3_url) ? $invitation->story_photo_3_url : $t15DefaultStory3;

        $t15GalleryPhotos = [];
        if (!empty($invitation->photos) && $invitation->photos->count() > 0) {
            foreach ($invitation->photos as $p) {
                $t15GalleryPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
            }
        }
        $t15DefaultGallery = [
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=800&auto=format&fit=crop&q=80',
        ];
        $t15GalIdx = 0;
        while (count($t15GalleryPhotos) < 6) {
            $t15GalleryPhotos[] = $t15DefaultGallery[$t15GalIdx % count($t15DefaultGallery)];
            $t15GalIdx++;
        }

        // Theme 16 (Premium Museum of Love) Bespoke Variables & Photo Assets
        $isMuseumOfLove = ($currentThemeId == 16) || ($currentThemeSlug === 'premium-museum-of-love') || ($currentThemeSlug === 'premium-serenade-golden-glam') || (request()->route('theme') == 16);

        $t16DefaultCover = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t16DefaultHero = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t16DefaultBride = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80';
        $t16DefaultGroom = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
        $t16DefaultStory1 = 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80';
        $t16DefaultStory2 = 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80';
        $t16DefaultStory3 = 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80';

        $t16CoverPhoto = !empty($invitation->cover_photo_url)
            ? $invitation->cover_photo_url
            : (!empty($invitation->background_photo_url) ? $invitation->background_photo_url : $t16DefaultCover);

        $t16HeroPhoto = !empty($invitation->countdown_photo_url)
            ? $invitation->countdown_photo_url
            : (!empty($invitation->cover_photo_url) ? $invitation->cover_photo_url : $t16DefaultHero);

        $t16BridePhoto = !empty($invitation->bride_photo)
            ? (Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo))
            : $t16DefaultBride;

        $t16GroomPhoto = !empty($invitation->groom_photo)
            ? (Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo))
            : $t16DefaultGroom;

        $t16StoryPhoto1 = !empty($invitation->story_photo_1_url) ? $invitation->story_photo_1_url : $t16DefaultStory1;
        $t16StoryPhoto2 = !empty($invitation->story_photo_2_url) ? $invitation->story_photo_2_url : $t16DefaultStory2;
        $t16StoryPhoto3 = !empty($invitation->story_photo_3_url) ? $invitation->story_photo_3_url : $t16DefaultStory3;

        $t16GalleryPhotos = [];
        if (!empty($invitation->photos) && $invitation->photos->count() > 0) {
            foreach ($invitation->photos as $p) {
                $t16GalleryPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
            }
        }
        $t16DefaultGallery = [
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=800&auto=format&fit=crop&q=80',
        ];
        $t16GalIdx = 0;
        while (count($t16GalleryPhotos) < 6) {
            $t16GalleryPhotos[] = $t16DefaultGallery[$t16GalIdx % count($t16DefaultGallery)];
            $t16GalIdx++;
        }

        // Theme 20 (Premium Serenade Dark Elegance) Bespoke Variables & Photo Assets
        $isDarkElegance = ($currentThemeId == 20) || ($currentThemeSlug === 'premium-serenade-dark-elegance') || (request()->route('theme') == 20);

        $t20DefaultCover = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t20DefaultHero = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t20DefaultBride = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80';
        $t20DefaultGroom = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
        $t20DefaultStory1 = 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80';
        $t20DefaultStory2 = 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80';
        $t20DefaultStory3 = 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80';

        $t20CoverPhoto = !empty($invitation->cover_photo_url)
            ? $invitation->cover_photo_url
            : (!empty($invitation->background_photo_url) ? $invitation->background_photo_url : $t20DefaultCover);

        $t20HeroPhoto = !empty($invitation->cover_photo_url)
            ? $invitation->cover_photo_url
            : (!empty($invitation->background_photo_url) ? $invitation->background_photo_url : $t20DefaultHero);

        $t20BridePhoto = !empty($invitation->bride_photo)
            ? (Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo))
            : $t20DefaultBride;

        $t20GroomPhoto = !empty($invitation->groom_photo)
            ? (Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo))
            : $t20DefaultGroom;

        $t20StoryPhoto1 = !empty($invitation->story_photo_1_url) ? $invitation->story_photo_1_url : $t20DefaultStory1;
        $t20StoryPhoto2 = !empty($invitation->story_photo_2_url) ? $invitation->story_photo_2_url : $t20DefaultStory2;
        $t20StoryPhoto3 = !empty($invitation->story_photo_3_url) ? $invitation->story_photo_3_url : $t20DefaultStory3;

        $t20RollingPhotos = [];
        if (!empty($invitation->photos) && $invitation->photos->count() >= 3) {
            foreach ($invitation->photos as $p) {
                $t20RollingPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
            }
        }
        $t20DefaultSlides = [
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
        ];
        while (count($t20RollingPhotos) < 5) {
            $t20RollingPhotos[] = $t20DefaultSlides[count($t20RollingPhotos) % 5];
        }

        $t20GalleryPhotos = [];
        if (!empty($invitation->photos) && $invitation->photos->count() > 0) {
            foreach ($invitation->photos as $p) {
                $t20GalleryPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
            }
        }
        while (count($t20GalleryPhotos) < 6) {
            $t20GalleryPhotos[] = $t20DefaultSlides[count($t20GalleryPhotos) % 5];
        }

        // Theme 13 (Premium Summer Vibes) Bespoke Variables & Photo Assets
        $isSummerVibes = ($currentThemeId == 13) || ($currentThemeSlug === 'premium-summer-vibes') || ($currentThemeSlug === 'premium-serenade-royal-blue') || (request()->route('theme') == 13);

        $t13DefaultCover = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t13DefaultHero = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80';
        $t13DefaultBride = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80';
        $t13DefaultGroom = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80';
        $t13DefaultStory1 = 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80';
        $t13DefaultStory2 = 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80';
        $t13DefaultStory3 = 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80';

        $t13CoverPhoto = !empty($invitation->cover_photo_url)
            ? $invitation->cover_photo_url
            : (!empty($invitation->background_photo_url) ? $invitation->background_photo_url : $t13DefaultCover);

        $t13HeroPhoto = !empty($invitation->countdown_photo_url)
            ? $invitation->countdown_photo_url
            : (!empty($invitation->cover_photo_url) ? $invitation->cover_photo_url : $t13DefaultHero);

        $t13BridePhoto = !empty($invitation->bride_photo)
            ? (Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo))
            : $t13DefaultBride;

        $t13GroomPhoto = !empty($invitation->groom_photo)
            ? (Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo))
            : $t13DefaultGroom;

        $t13StoryPhoto1 = !empty($invitation->story_photo_1_url) ? $invitation->story_photo_1_url : $t13DefaultStory1;
        $t13StoryPhoto2 = !empty($invitation->story_photo_2_url) ? $invitation->story_photo_2_url : $t13DefaultStory2;
        $t13StoryPhoto3 = !empty($invitation->story_photo_3_url) ? $invitation->story_photo_3_url : $t13DefaultStory3;

        $t13GalleryPhotos = [];
        if (!empty($invitation->photos) && $invitation->photos->count() > 0) {
            foreach ($invitation->photos as $p) {
                $t13GalleryPhotos[] = Str::startsWith($p->path, ['http://', 'https://']) ? $p->path : asset('storage/' . $p->path);
            }
        }
        $t13DefaultGallery = [
            'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80',
            'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=800&auto=format&fit=crop&q=80',
        ];
        $t13GalIdx = 0;
        while (count($t13GalleryPhotos) < 6) {
            $t13GalleryPhotos[] = $t13DefaultGallery[$t13GalIdx % count($t13DefaultGallery)];
            $t13GalIdx++;
        }
    @endphp

    <style>
        /* ================= THEME CSS VARIABLES (DYNAMICALLY APPLIED) ================= */
        :root {
            --bg-canvas: {{ $activeTheme['bgCanvas'] }};
            --bg-card: {{ $activeTheme['bgCard'] ?? '#FFFFFF' }};
            --bg-accent-block: {{ $activeTheme['bgAccentBlock'] }};
            --bg-accent-light: {{ $activeTheme['bgAccentLight'] }};
            --text-main: {{ $activeTheme['textMain'] }};
            --text-muted: {{ $activeTheme['textMuted'] }};
            --text-accent: {{ $activeTheme['textAccent'] }};
            --text-secondary: {{ $activeTheme['textSecondary'] }};
            --border-frame: {{ $activeTheme['borderFrame'] }};
            --frame-radius: {{ $activeTheme['frameRadius'] ?? '9999px 9999px 24px 24px' }};
            --frame-border: {{ $activeTheme['frameBorder'] ?? '1.5px solid var(--border-frame)' }};
            --frame-shadow: {{ $activeTheme['frameShadow'] ?? '0 10px 25px -5px rgba(0, 0, 0, 0.05)' }};
            --photo-radius: {{ $activeTheme['photoRadius'] ?? '9999px 9999px 16px 16px' }};
            --hero-photo-radius: {{ $activeTheme['heroPhotoRadius'] ?? ($activeTheme['photoRadius'] ?? '9999px 9999px 24px 24px') }};
            --profile-photo-radius: {{ $activeTheme['profilePhotoRadius'] ?? ($activeTheme['photoRadius'] ?? '9999px 9999px 20px 20px') }};
            --font-heading: {!! $activeTheme['fontHeading'] !!};
            --font-script: {!! $activeTheme['fontScript'] !!};
            --font-body: {!! $activeTheme['fontBody'] !!};
            --ornament-primary: {{ $activeTheme['ornamentPrimary'] }};
            --ornament-secondary: {{ $activeTheme['ornamentSecondary'] }};
        }

        /* Outer Full Canvas Background: NO MORE BLACK VOID */
        html, body {
            background-color: var(--bg-canvas) !important;
            color: var(--text-main);
            font-family: var(--font-body);
        }

        .theme-heading { font-family: var(--font-heading); }
        .theme-script { font-family: var(--font-script); }
        .theme-body { font-family: var(--font-body); }

        /* Bespoke Frame Shapes (Adaptive per Theme & Tier) */
        .theme-arch-frame, .theme-main-frame {
            border: var(--frame-border);
            border-radius: var(--frame-radius);
            box-shadow: var(--frame-shadow);
            background-color: var(--bg-card);
            transition: border-radius 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Premium Tier Double Gold Frame Styling */
        [data-tier="premium"] .theme-arch-frame, [data-tier="premium"] .theme-main-frame {
            position: relative;
        }
        [data-tier="premium"] .theme-arch-frame::after, [data-tier="premium"] .theme-main-frame::after {
            content: '';
            position: absolute;
            inset: 6px;
            border: 1px solid rgba(212, 175, 55, 0.45);
            border-radius: inherit;
            pointer-events: none;
        }

        /* Specific Overrides for Sharp Geometric Themes (Theme 3 Navy & Theme 18 Minimalist White) */
        [data-theme-id="3"] .theme-arch-frame, [data-theme-id="18"] .theme-arch-frame,
        [data-theme-id="3"] .theme-main-frame, [data-theme-id="18"] .theme-main-frame {
            border-radius: 0px !important;
        }
        [data-theme-id="3"] .theme-arch-frame::after, [data-theme-id="18"] .theme-arch-frame::after,
        [data-theme-id="3"] .theme-main-frame::after, [data-theme-id="18"] .theme-main-frame::after {
            content: '';
            position: absolute;
            inset: 6px !important;
            border: 1px solid var(--border-frame) !important;
            border-radius: 0px !important;
            pointer-events: none;
        }

        /* ================= THEME 1: BASIC HARMONY MAROON BESPOKE BOTANICAL COVER ================= */
        [data-theme-id="1"] #invitation-cover {
            background-color: #FDFCF8 !important;
            background-image: radial-gradient(circle at 50% 50%, #FFFDFB 0%, #F5EEE6 100%) !important;
        }

        #invitation-cover .cover-card-wrapper {
            position: relative;
            width: 92%;
            max-width: 410px;
            height: 90vh;
            max-height: 820px;
            min-height: 580px;
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #invitation-cover .cover-card-container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: visible;
            box-sizing: border-box;
        }

        /* ================= THEME 1: BASIC HARMONY MAROON BESPOKE COVER & DESKTOP SPLIT ================= */
        [data-theme-id="1"] #invitation-cover {
            padding: 0 !important;
            background-color: #4A050C !important;
        }

        [data-theme-id="1"] #invitation-cover .btn-open-invitation {
            background-color: #FCD8DF !important;
            color: #4A050C !important;
            box-shadow: 0 10px 25px -4px rgba(0, 0, 0, 0.45) !important;
        }

        [data-theme-id="1"] #invitation-cover .btn-open-invitation:hover {
            background-color: #FCE2E7 !important;
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 14px 28px -4px rgba(0, 0, 0, 0.55) !important;
        }

        @media (min-width: 768px) {
            [data-theme-id="1"] body {
                background-color: #4A050C !important;
            }
            [data-theme-id="1"] #t1-desktop-sidebar {
                display: flex !important;
            }
            [data-theme-id="1"] #invitation-main-content {
                margin-left: 58% !important;
                margin-right: 0 !important;
                width: 42% !important;
                max-width: none !important;
                box-shadow: -15px 0 35px rgba(0, 0, 0, 0.45) !important;
            }
            [data-theme-id="1"] #floating-bottom-nav-wrapper {
                left: 58% !important;
                right: 0 !important;
            }
            [data-theme-id="1"] #floating-autoscroll-container {
                left: calc(58% + 16px) !important;
            }
            [data-theme-id="1"] #invitation-toast {
                left: 79% !important;
            }
        }

        @media (min-width: 1024px) {
            [data-theme-id="1"] #invitation-main-content {
                margin-left: 60% !important;
                width: 40% !important;
            }
            [data-theme-id="1"] #floating-bottom-nav-wrapper {
                left: 60% !important;
            }
            [data-theme-id="1"] #floating-autoscroll-container {
                left: calc(60% + 16px) !important;
            }
            [data-theme-id="1"] #invitation-toast {
                left: 80% !important;
            }
        }

        /* ================= THEME 1: BASIC HARMONY MAROON BESPOKE FLOATING NAV ================= */
        [data-theme-id="1"] #invitation-main-content {
            background-color: #FFDADA !important;
            box-shadow: 0 25px 50px -12px rgba(98, 0, 0, 0.15) !important;
        }

        [data-theme-id="1"] #floating-bottom-nav {
            background: rgba(255, 255, 255, 0.96) !important;
            border: 1px solid rgba(98, 0, 0, 0.12) !important;
            box-shadow: 0 12px 30px -5px rgba(98, 0, 0, 0.22), 0 2px 8px rgba(0, 0, 0, 0.05) !important;
            border-radius: 9999px !important;
            padding: 0.35rem 0.65rem !important;
            display: flex !important;
            align-items: center !important;
            gap: 0.45rem !important;
        }

        [data-theme-id="1"] #floating-bottom-nav .nav-item {
            width: 2.35rem !important;
            height: 2.35rem !important;
            border-radius: 9999px !important;
            background: transparent !important;
            color: #620000 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
            box-shadow: none !important;
            transition: all 0.25s ease !important;
        }

        [data-theme-id="1"] #floating-bottom-nav .nav-item span {
            display: none !important;
        }

        [data-theme-id="1"] #floating-bottom-nav .nav-item svg {
            width: 1.15rem !important;
            height: 1.15rem !important;
            color: #620000 !important;
            margin-bottom: 0 !important;
            transition: all 0.25s ease !important;
        }

        [data-theme-id="1"] #floating-bottom-nav .nav-item:hover,
        [data-theme-id="1"] #floating-bottom-nav .nav-item.active {
            background: #620000 !important;
            color: #FFFFFF !important;
            width: 3.25rem !important;
            border-radius: 9999px !important;
            transform: scale(1.05) !important;
            box-shadow: 0 4px 12px rgba(98, 0, 0, 0.35) !important;
        }

        [data-theme-id="1"] #floating-bottom-nav .nav-item:hover svg,
        [data-theme-id="1"] #floating-bottom-nav .nav-item.active svg {
            color: #FFFFFF !important;
        }

        [data-theme-id="1"] #musicToggleBtn {
            background: rgba(98, 0, 0, 0.95) !important;
            border: 2px solid #E8A5A5 !important;
        }

        /* ================= THEME 2: BASIC HARMONY EMERALD BESPOKE STYLING ================= */
        [data-theme-id="2"] {
            background-color: #FAFCFA !important;
        }

        [data-theme-id="2"] #invitation-cover {
            background-color: #FFFFFF !important;
            background-image: radial-gradient(circle at 50% 50%, #FFFFFF 0%, #F4F9F6 100%) !important;
        }

        [data-theme-id="2"] #invitation-main-content {
            background-color: #FAFCFA !important;
            box-shadow: 0 25px 50px -12px rgba(30, 107, 82, 0.12) !important;
        }

        /* Floating Nav & Music in Theme 2 (Matching Reference Screenshot 2) */
        [data-theme-id="2"] #floating-bottom-nav {
            background: rgba(19, 74, 55, 0.95) !important;
            border: 1px solid rgba(212, 175, 55, 0.45) !important;
            box-shadow: 0 12px 30px -5px rgba(10, 40, 30, 0.5) !important;
            border-radius: 9999px !important;
            padding: 0.35rem 0.5rem !important;
            display: flex !important;
            gap: 0.35rem !important;
        }

        [data-theme-id="2"] #floating-bottom-nav .nav-item {
            width: 2.25rem !important;
            height: 2.25rem !important;
            border-radius: 9999px !important;
            background: #FFFFFF !important;
            color: #1E6B52 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15) !important;
            transition: all 0.2s ease !important;
        }

        [data-theme-id="2"] #floating-bottom-nav .nav-item span {
            display: none !important;
        }

        [data-theme-id="2"] #floating-bottom-nav .nav-item svg {
            width: 1.1rem !important;
            height: 1.1rem !important;
            color: #1E6B52 !important;
            margin-bottom: 0 !important;
        }

        [data-theme-id="2"] #floating-bottom-nav .nav-item:hover,
        [data-theme-id="2"] #floating-bottom-nav .nav-item.active {
            background: #E5C158 !important;
            transform: scale(1.08) !important;
        }

        [data-theme-id="2"] #floating-bottom-nav .nav-item:hover svg,
        [data-theme-id="2"] #floating-bottom-nav .nav-item.active svg {
            color: #134A37 !important;
        }

        [data-theme-id="2"] #musicToggleBtn {
            background: rgba(19, 74, 55, 0.95) !important;
            border: 2px solid #D4AF37 !important;
        }

        /* ================= THEME 3: BASIC HARMONY NAVY BESPOKE STYLING ================= */
        [data-theme-id="3"] {
            background-color: #F8FAFC !important;
        }

        [data-theme-id="3"] #invitation-cover {
            background: linear-gradient(180deg, #CBDCE7 0%, #2E4D71 40%, #1E3A5F 100%) !important;
        }

        [data-theme-id="3"] #invitation-main-content {
            background-color: #FFFFFF !important;
            box-shadow: 0 25px 50px -12px rgba(30, 58, 95, 0.12) !important;
        }

        [data-theme-id="3"] .theme3-vertical-label {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
        }

        [data-theme-id="3"] #floating-bottom-nav {
            background: rgba(30, 58, 95, 0.95) !important;
            border: 1px solid rgba(255, 255, 255, 0.25) !important;
            box-shadow: 0 12px 30px -5px rgba(15, 23, 42, 0.4) !important;
            border-radius: 9999px !important;
            padding: 0.35rem 0.5rem !important;
            display: flex !important;
            gap: 0.35rem !important;
        }

        [data-theme-id="3"] #floating-bottom-nav .nav-item {
            width: 2.25rem !important;
            height: 2.25rem !important;
            border-radius: 9999px !important;
            background: #FFFFFF !important;
            color: #1E3A5F !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12) !important;
            transition: all 0.2s ease !important;
        }

        [data-theme-id="3"] #floating-bottom-nav .nav-item span {
            display: none !important;
        }

        [data-theme-id="3"] #floating-bottom-nav .nav-item svg {
            width: 1.1rem !important;
            height: 1.1rem !important;
            color: #1E3A5F !important;
            margin-bottom: 0 !important;
        }

        [data-theme-id="3"] #floating-bottom-nav .nav-item:hover,
        [data-theme-id="3"] #floating-bottom-nav .nav-item.active {
            background: #4B6B94 !important;
            color: #FFFFFF !important;
            transform: scale(1.08) !important;
        }

        [data-theme-id="3"] #floating-bottom-nav .nav-item:hover svg,
        [data-theme-id="3"] #floating-bottom-nav .nav-item.active svg {
            color: #FFFFFF !important;
        }

        [data-theme-id="3"] #musicToggleBtn {
            background: rgba(30, 58, 95, 0.95) !important;
            border: 2px solid rgba(255, 255, 255, 0.4) !important;
        }

        /* ================= THEME 5: BASIC HARMONY MONOCHROME BESPOKE STYLING ================= */
        [data-theme-id="5"] {
            background-color: #FAFAFA !important;
        }

        [data-theme-id="5"] #invitation-main-content {
            background-color: #FFFFFF !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08) !important;
        }

        /* Rolling 5 Photos Strip Marquee / Rolling Animation */
        @keyframes marquee-rolling-strip {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }

        .animate-rolling-strip {
            display: flex;
            width: max-content;
            animation: marquee-rolling-strip 24s linear infinite;
        }
        .animate-rolling-strip:hover {
            animation-play-state: paused;
        }

        [data-theme-id="5"] #floating-bottom-nav {
            background: rgba(44, 45, 47, 0.92) !important;
            backdrop-filter: blur(12px) !important;
            border: 1px solid rgba(255, 255, 255, 0.2) !important;
            box-shadow: 0 16px 36px -4px rgba(0, 0, 0, 0.35) !important;
            border-radius: 9999px !important;
            padding: 0.4rem 0.6rem !important;
            display: flex !important;
            gap: 0.4rem !important;
        }

        [data-theme-id="5"] #floating-bottom-nav .nav-item {
            width: 2.35rem !important;
            height: 2.35rem !important;
            border-radius: 9999px !important;
            background: rgba(255, 255, 255, 0.12) !important;
            color: #FFFFFF !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15) !important;
            transition: all 0.25s ease !important;
        }

        [data-theme-id="5"] #floating-bottom-nav .nav-item span {
            display: none !important;
        }

        [data-theme-id="5"] #floating-bottom-nav .nav-item svg {
            width: 1.15rem !important;
            height: 1.15rem !important;
            color: #FFFFFF !important;
            margin-bottom: 0 !important;
        }

        [data-theme-id="5"] #floating-bottom-nav .nav-item:hover,
        [data-theme-id="5"] #floating-bottom-nav .nav-item.active {
            background: #FFFFFF !important;
            color: #18181B !important;
            transform: scale(1.1) !important;
        }

        [data-theme-id="5"] #floating-bottom-nav .nav-item:hover svg,
        [data-theme-id="5"] #floating-bottom-nav .nav-item.active svg {
            color: #18181B !important;
        }

        [data-theme-id="5"] #musicToggleBtn {
            background: rgba(44, 45, 47, 0.92) !important;
            border: 1.5px solid rgba(255, 255, 255, 0.3) !important;
        }

        /* ================= THEME 20: PREMIUM SERENADE DARK ELEGANCE BESPOKE STYLING ================= */
        [data-theme-id="20"] {
            background-color: #070807 !important;
            color: #FAF7F2 !important;
        }

        [data-theme-id="20"] #invitation-main-content {
            background-color: #070807 !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.9) !important;
        }

        [data-theme-id="20"] #floating-bottom-nav {
            background: rgba(19, 23, 19, 0.94) !important;
            backdrop-filter: blur(12px) !important;
            border: 1px solid rgba(158, 176, 146, 0.35) !important;
            box-shadow: 0 12px 30px -5px rgba(0, 0, 0, 0.7), 0 0 15px rgba(158, 176, 146, 0.15) !important;
            border-radius: 9999px !important;
            padding: 0.35rem 0.5rem !important;
            display: flex !important;
            gap: 0.35rem !important;
        }

        [data-theme-id="20"] #floating-bottom-nav .nav-item {
            width: 2.25rem !important;
            height: 2.25rem !important;
            border-radius: 9999px !important;
            background: #1A211A !important;
            color: #9EB092 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
            border: 1px solid rgba(158, 176, 146, 0.25) !important;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3) !important;
            transition: all 0.25s ease !important;
        }

        [data-theme-id="20"] #floating-bottom-nav .nav-item span {
            display: none !important;
        }

        [data-theme-id="20"] #floating-bottom-nav .nav-item svg {
            width: 1.1rem !important;
            height: 1.1rem !important;
            color: #9EB092 !important;
            margin-bottom: 0 !important;
            transition: all 0.25s ease !important;
        }

        [data-theme-id="20"] #floating-bottom-nav .nav-item:hover,
        [data-theme-id="20"] #floating-bottom-nav .nav-item.active {
            background: #9EB092 !important;
            color: #070807 !important;
            transform: scale(1.08) !important;
            border-color: #FAF7F2 !important;
        }

        [data-theme-id="20"] #floating-bottom-nav .nav-item:hover svg,
        [data-theme-id="20"] #floating-bottom-nav .nav-item.active svg {
            color: #070807 !important;
        }

        [data-theme-id="20"] #musicToggleBtn {
            background: rgba(19, 23, 19, 0.94) !important;
            border: 2px solid #9EB092 !important;
            color: #FAF7F2 !important;
        }

        [data-theme-id="20"] #floating-autoscroll-btn {
            background: rgba(19, 23, 19, 0.94) !important;
            border: 2px solid #9EB092 !important;
            color: #FAF7F2 !important;
        }

        /* ================= THEME 13: PREMIUM SUMMER VIBES DESKTOP SPLIT VIEW & STYLES ================= */
        @media (min-width: 768px) {
            [data-theme-id="13"] body {
                background-color: #EFECE6 !important;
            }
            [data-theme-id="13"] #t13-desktop-sidebar {
                display: flex !important;
            }
            [data-theme-id="13"] #invitation-main-content {
                margin-left: 58% !important;
                margin-right: 0 !important;
                width: 42% !important;
                max-width: none !important;
                box-shadow: -15px 0 35px rgba(29, 99, 184, 0.15) !important;
                background-color: #EFECE6 !important;
            }
            [data-theme-id="13"] #floating-nav-container,
            [data-theme-id="13"] #floating-bottom-nav-wrapper {
                left: 79% !important;
                transform: translateX(-50%) !important;
                right: auto !important;
            }
            [data-theme-id="13"] #floating-autoscroll-container {
                left: calc(58% + 16px) !important;
            }
            [data-theme-id="13"] #invitation-toast {
                left: 79% !important;
            }
            [data-theme-id="13"] #floating-music-container {
                right: 20px !important;
            }
        }

        @media (min-width: 1024px) {
            [data-theme-id="13"] #invitation-main-content {
                margin-left: 60% !important;
                width: 40% !important;
            }
            [data-theme-id="13"] #floating-nav-container,
            [data-theme-id="13"] #floating-bottom-nav-wrapper {
                left: 80% !important;
                transform: translateX(-50%) !important;
                right: auto !important;
            }
            [data-theme-id="13"] #floating-autoscroll-container {
                left: calc(60% + 16px) !important;
            }
            [data-theme-id="13"] #invitation-toast {
                left: 80% !important;
            }
        }

        /* Terracotta Capsule Bottom Nav matching Reference */
        [data-theme-id="13"] #floating-bottom-nav {
            background: #D94B26 !important;
            border: 2px solid #FFFFFF !important;
            box-shadow: 0 10px 30px rgba(217, 75, 38, 0.45) !important;
            border-radius: 9999px !important;
            padding: 0.35rem 0.65rem !important;
            display: flex !important;
            align-items: center !important;
            gap: 0.45rem !important;
        }

        [data-theme-id="13"] #floating-bottom-nav .nav-item {
            width: 2.35rem !important;
            height: 2.35rem !important;
            color: #FFFFFF !important;
            transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) !important;
            border-radius: 9999px !important;
        }

        [data-theme-id="13"] #floating-bottom-nav .nav-item:hover {
            background: rgba(255, 255, 255, 0.25) !important;
            transform: translateY(-2px) scale(1.08) !important;
        }

        [data-theme-id="13"] #floating-bottom-nav .nav-item.active {
            background: #FFFFFF !important;
            color: #D94B26 !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        }

        [data-theme-id="13"] #floating-music-btn {
            background: #D94B26 !important;
            border: 2px solid #FFFFFF !important;
            box-shadow: 0 8px 24px rgba(217, 75, 38, 0.4) !important;
            color: #FFFFFF !important;
        }

        [data-theme-id="13"] #floating-autoscroll-btn {
            background: #1D63B8 !important;
            border: 2px solid #FFFFFF !important;
            box-shadow: 0 8px 24px rgba(29, 99, 184, 0.4) !important;
            color: #FFFFFF !important;
        }

        /* Summer Vibes Keyframe Animations */
        @keyframes summerPalmSway {
            0%, 100% { transform: rotate(0deg) scale(1); transform-origin: bottom center; }
            50% { transform: rotate(2.8deg) scale(1.02); transform-origin: bottom center; }
        }
        .anim-summer-palm {
            animation: summerPalmSway 7s ease-in-out infinite;
        }

        @keyframes summerFlowerSwayTR {
            0%, 100% { transform: rotate(0deg) scale(1); transform-origin: top right; }
            50% { transform: rotate(3deg) scale(1.03); transform-origin: top right; }
        }
        .anim-summer-flower-tr {
            animation: summerFlowerSwayTR 6s ease-in-out infinite;
        }

        @keyframes summerFlowerSwayTL {
            0%, 100% { transform: rotate(0deg) scale(1); transform-origin: top left; }
            50% { transform: rotate(-3deg) scale(1.03); transform-origin: top left; }
        }
        .anim-summer-flower-tl {
            animation: summerFlowerSwayTL 6.5s ease-in-out infinite;
        }

        @keyframes summerStampPop {
            0% { opacity: 0; transform: scale(1.12) rotate(-2deg); filter: blur(3px); }
            70% { opacity: 1; transform: scale(0.98) rotate(0.5deg); filter: blur(0); }
            100% { opacity: 1; transform: scale(1) rotate(0deg); }
        }
        .anim-summer-stamp {
            animation: summerStampPop 1s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes summerFloatBubble {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .anim-summer-bubble {
            animation: summerFloatBubble 4s ease-in-out infinite;
        }

        @keyframes summerCloudFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(6px, -4px) scale(1.02); }
        }
        .anim-summer-cloud {
            animation: summerCloudFloat 8s ease-in-out infinite;
        }
        .anim-summer-cloud-alt {
            animation: summerCloudFloat 9s ease-in-out infinite reverse;
        }

        @keyframes summerSparkleDust {
            0%, 100% { opacity: 0.25; transform: translateY(0) scale(0.9); }
            50% { opacity: 0.85; transform: translateY(-8px) scale(1.15); }
        }
        .anim-summer-sparkle {
            animation: summerSparkleDust 3.5s ease-in-out infinite;
        }

        /* Ticket Card Styling Helper */
        .summer-ticket-card {
            position: relative;
            border: 2.5px solid #1D63B8;
            border-radius: 28px;
            background-color: #FAF8F5;
            box-shadow: 0 16px 45px rgba(29, 99, 184, 0.12);
            overflow: hidden;
        }
        .summer-ticket-inner {
            border: 2px dashed rgba(29, 99, 184, 0.75);
            border-radius: 22px;
            margin: 8px;
            padding: 1.5rem 1.25rem;
            position: relative;
        }
        @media (min-width: 640px) {
            .summer-ticket-inner {
                padding: 2.25rem 2rem;
            }
        }

        /* Postage Stamp Frame Layout Helper */
        .theme-summer-stamp {
            position: relative;
            width: 100%;
            aspect-ratio: 682/1024;
            display: block;
        }
        .theme-summer-stamp-photo {
            position: absolute;
            left: 9.8%;
            top: 7.9%;
            width: 80.4%;
            height: 75.7%;
            overflow: hidden;
            border-radius: 4px;
            background-color: #EFECE6;
        }
        .theme-summer-stamp-overlay {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            pointer-events: none;
            z-index: 10;
        }

        /* ================= THEME 16: PREMIUM MUSEUM OF LOVE DESKTOP SPLIT VIEW & FLOATING DOCK ================= */
        @media (min-width: 768px) {
            [data-theme-id="16"] body {
                background-color: #F7F2E8 !important;
            }
            [data-theme-id="16"] #t16-desktop-sidebar {
                display: flex !important;
            }
            [data-theme-id="16"] #invitation-main-content {
                margin-left: 58% !important;
                margin-right: 0 !important;
                width: 42% !important;
                max-width: none !important;
                box-shadow: -15px 0 35px rgba(0, 0, 0, 0.45) !important;
                background-color: #F7F2E8 !important;
            }
            [data-theme-id="16"] #floating-nav-container,
            [data-theme-id="16"] #floating-bottom-nav-wrapper {
                left: 79% !important;
                transform: translateX(-50%) !important;
                right: auto !important;
            }
            [data-theme-id="16"] #floating-autoscroll-container {
                left: calc(58% + 16px) !important;
            }
            [data-theme-id="16"] #invitation-toast {
                left: 79% !important;
            }
            [data-theme-id="16"] #floating-music-container {
                right: 20px !important;
            }
        }

        @media (min-width: 1024px) {
            [data-theme-id="16"] #invitation-main-content {
                margin-left: 60% !important;
                width: 40% !important;
            }
            [data-theme-id="16"] #floating-nav-container,
            [data-theme-id="16"] #floating-bottom-nav-wrapper {
                left: 80% !important;
                transform: translateX(-50%) !important;
                right: auto !important;
            }
            [data-theme-id="16"] #floating-autoscroll-container {
                left: calc(60% + 16px) !important;
            }
            [data-theme-id="16"] #invitation-toast {
                left: 80% !important;
            }
        }

        [data-theme-id="16"] #floating-bottom-nav {
            background: #6B1417 !important;
            border: 1px solid rgba(212, 175, 55, 0.45) !important;
            box-shadow: 0 12px 30px -5px rgba(90, 10, 15, 0.45), 0 2px 8px rgba(0, 0, 0, 0.15) !important;
            border-radius: 9999px !important;
            padding: 0.35rem 0.65rem !important;
            display: flex !important;
            align-items: center !important;
            gap: 0.45rem !important;
        }

        [data-theme-id="16"] #floating-bottom-nav .nav-item {
            width: 2.35rem !important;
            height: 2.35rem !important;
            border-radius: 9999px !important;
            background: transparent !important;
            color: #FFFFFF !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 !important;
            box-shadow: none !important;
            transition: all 0.25s ease !important;
        }

        [data-theme-id="16"] #floating-bottom-nav .nav-item span {
            display: none !important;
        }

        [data-theme-id="16"] #floating-bottom-nav .nav-item svg {
            width: 1.15rem !important;
            height: 1.15rem !important;
            color: #FFFFFF !important;
            margin-bottom: 0 !important;
            transition: all 0.25s ease !important;
        }

        [data-theme-id="16"] #floating-bottom-nav .nav-item:hover,
        [data-theme-id="16"] #floating-bottom-nav .nav-item.active {
            background: #FFFFFF !important;
            color: #6B1417 !important;
            width: 3.25rem !important;
            border-radius: 9999px !important;
            transform: scale(1.05) !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.25) !important;
        }

        [data-theme-id="16"] #floating-bottom-nav .nav-item:hover svg,
        [data-theme-id="16"] #floating-bottom-nav .nav-item.active svg {
            color: #6B1417 !important;
        }

        [data-theme-id="16"] #musicToggleBtn {
            background: rgba(107, 20, 23, 0.95) !important;
            border: 2px solid #D4AF37 !important;
        }

        /* Dynamic Theme Photo Shapes */
        .theme-photo-shape {
            border-radius: var(--photo-radius) !important;
            transition: border-radius 0.3s ease;
        }
        .theme-hero-photo-shape {
            border-radius: var(--hero-photo-radius) !important;
            transition: border-radius 0.3s ease;
        }
        .theme-profile-photo-shape {
            border-radius: var(--profile-photo-radius) !important;
            transition: border-radius 0.3s ease;
        }

        /* Animation Keyframes */
        @keyframes float-sway {
            0%, 100% { transform: rotate(-3deg) translateY(0); }
            50% { transform: rotate(3deg) translateY(-4px); }
        }
        .animate-sway { animation: float-sway 4s ease-in-out infinite; }

        @keyframes flower-bloom {
            0% { transform: scale(0.6) rotate(-15deg); opacity: 0; }
            70% { transform: scale(1.08) rotate(2deg); }
            100% { transform: scale(1) rotate(0deg); opacity: 1; }
        }

        @keyframes pinch-in-left {
            0% { transform: translateX(-4px) scale(0.9); opacity: 0; }
            100% { transform: translateX(0) scale(1); opacity: 0.65; }
        }
        @keyframes pinch-in-right {
            0% { transform: translateX(4px) scale(0.9); opacity: 0; }
            100% { transform: translateX(0) scale(1); opacity: 0.65; }
        }
        @keyframes bounce-scale {
            0% { transform: scale(0.4); opacity: 0; }
            65% { transform: scale(1.18); opacity: 1; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* ================= CREATIVE & LUXURY SCROLL REVEAL ANIMATIONS ================= */
        @keyframes blur-sharp-zoom {
            0% { filter: blur(14px); transform: scale(1.18); opacity: 0; }
            100% { filter: blur(0px); transform: scale(1); opacity: 1; }
        }

        @keyframes fade-slide-up {
            0% { transform: translateY(38px); opacity: 0; filter: blur(4px); }
            100% { transform: translateY(0); opacity: 1; filter: blur(0); }
        }

        @keyframes luxury-reveal-up {
            0% { opacity: 0; transform: translateY(48px) scale(0.95); filter: blur(6px); }
            100% { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
        }

        @keyframes card-3d-rise {
            0% { opacity: 0; transform: perspective(1000px) rotateX(15deg) translateY(60px) scale(0.93); filter: blur(6px); }
            100% { opacity: 1; transform: perspective(1000px) rotateX(0deg) translateY(0) scale(1); filter: blur(0); }
        }

        @keyframes split-monogram-left {
            0% { opacity: 0; transform: translateX(-50px) scale(0.7); filter: blur(6px); }
            70% { opacity: 1; transform: translateX(5px) scale(1.08); filter: blur(0); }
            100% { opacity: 1; transform: translateX(0) scale(1); filter: blur(0); }
        }

        @keyframes split-monogram-right {
            0% { opacity: 0; transform: translateX(50px) scale(0.7); filter: blur(6px); }
            70% { opacity: 1; transform: translateX(-5px) scale(1.08); filter: blur(0); }
            100% { opacity: 1; transform: translateX(0) scale(1); filter: blur(0); }
        }

        @keyframes bar-expand-vert {
            0% { opacity: 0; transform: scaleY(0); }
            100% { opacity: 1; transform: scaleY(1); }
        }

        @keyframes slide-in-curved-left {
            0% { opacity: 0; transform: translateX(-55px) translateY(25px) rotate(-3.5deg); filter: blur(5px); }
            100% { opacity: 1; transform: translateX(0) translateY(0) rotate(0); filter: blur(0); }
        }

        @keyframes slide-in-curved-right {
            0% { opacity: 0; transform: translateX(55px) translateY(25px) rotate(3.5deg); filter: blur(5px); }
            100% { opacity: 1; transform: translateX(0) translateY(0) rotate(0); filter: blur(0); }
        }

        @keyframes pop-bounce-in {
            0% { opacity: 0; transform: scale(0.55) translateY(30px); filter: blur(4px); }
            65% { opacity: 1; transform: scale(1.1) translateY(-5px); filter: blur(0); }
            100% { opacity: 1; transform: scale(1) translateY(0); filter: blur(0); }
        }

        @keyframes photo-glide-left {
            0% { opacity: 0; transform: translate(-45px, -35px) rotate(-9deg) scale(0.88); filter: blur(6px); }
            100% { opacity: 1; transform: translate(0, 0) rotate(-3deg) scale(1); filter: blur(0); }
        }

        @keyframes photo-glide-right {
            0% { opacity: 0; transform: translate(45px, 35px) rotate(9deg) scale(0.88); filter: blur(6px); }
            100% { opacity: 1; transform: translate(0, 0) rotate(3deg) scale(1); filter: blur(0); }
        }

        @keyframes cinematic-expand {
            0% { opacity: 0; transform: scale(0.9) translateY(45px); filter: blur(8px); }
            100% { opacity: 1; transform: scale(1) translateY(0); filter: blur(0); }
        }

        @keyframes tracking-in-expand {
            0% { letter-spacing: -0.15em; opacity: 0; filter: blur(6px); transform: translateY(15px); }
            60% { opacity: 0.8; }
            100% { opacity: 1; filter: blur(0); transform: translateY(0); }
        }

        @keyframes bounce-scale {
            0% { transform: scale(0.4); opacity: 0; filter: blur(4px); }
            65% { transform: scale(1.2); opacity: 1; filter: blur(0); }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes pinch-in-left {
            0% { transform: translateX(-8px) scale(0.85); opacity: 0; }
            100% { transform: translateX(0) scale(1); opacity: 0.7; }
        }

        @keyframes pinch-in-right {
            0% { transform: translateX(8px) scale(0.85); opacity: 0; }
            100% { transform: translateX(0) scale(1); opacity: 0.7; }
        }

        /* Scroll Reveal Base Utility */
        .reveal-item {
            opacity: 0;
            will-change: opacity, transform, filter;
            transition-property: opacity, transform, filter;
            transition-duration: 0.85s;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
        .reveal-item.revealed { opacity: 1; }

        .anim-border.revealed { animation: card-3d-rise 0.95s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-title.revealed { animation: luxury-reveal-up 0.85s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-script.revealed { animation: blur-sharp-zoom 1.05s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-fade-up.revealed { animation: fade-slide-up 0.85s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-bracket-left.revealed { animation: pinch-in-left 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-bracket-right.revealed { animation: pinch-in-right 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-date-number.revealed { animation: bounce-scale 0.85s cubic-bezier(0.34, 1.56, 0.64, 1) both; }
        .anim-photo.revealed { animation: luxury-reveal-up 0.9s cubic-bezier(0.16, 1, 0.3, 1) both; }

        .anim-slide-from-right.revealed { animation: slide-in-curved-right 0.9s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-slide-from-left.revealed { animation: slide-in-curved-left 0.9s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-zoom-in.revealed { animation: pop-bounce-in 0.85s cubic-bezier(0.34, 1.56, 0.64, 1) both; }

        /* Bespoke Creative Classes */
        .anim-card-3d.revealed { animation: card-3d-rise 1s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-luxury-up.revealed { animation: luxury-reveal-up 0.9s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-monogram-left.revealed { animation: split-monogram-left 0.95s cubic-bezier(0.34, 1.56, 0.64, 1) both; }
        .anim-monogram-right.revealed { animation: split-monogram-right 0.95s cubic-bezier(0.34, 1.56, 0.64, 1) both; }
        .anim-bar-grow.revealed { animation: bar-expand-vert 0.8s cubic-bezier(0.16, 1, 0.3, 1) both; transform-origin: center; }
        .anim-curved-left.revealed { animation: slide-in-curved-left 0.95s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-curved-right.revealed { animation: slide-in-curved-right 0.95s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-pop-in.revealed { animation: pop-bounce-in 0.85s cubic-bezier(0.34, 1.56, 0.64, 1) both; }
        .anim-photo-glide-1.revealed { animation: photo-glide-left 1s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-photo-glide-2.revealed { animation: photo-glide-right 1s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-cinematic.revealed { animation: cinematic-expand 1s cubic-bezier(0.16, 1, 0.3, 1) both; }
        .anim-tracking.revealed { animation: tracking-in-expand 0.95s cubic-bezier(0.16, 1, 0.3, 1) both; }

        /* Floral Bloom Scroll-Reveal Animations for Theme 1 */
        @keyframes floral-bloom-tr {
            0% { opacity: 0; transform: scale(0.4) rotate(12deg); filter: blur(2px); }
            60% { opacity: 0.9; transform: scale(1.08) rotate(-2deg); filter: blur(0); }
            100% { opacity: 1; transform: scale(1) rotate(0deg); filter: blur(0); }
        }
        @keyframes floral-bloom-tl {
            0% { opacity: 0; transform: scale(0.4) rotate(-12deg); filter: blur(2px); }
            60% { opacity: 0.9; transform: scale(1.08) rotate(2deg); filter: blur(0); }
            100% { opacity: 1; transform: scale(1) rotate(0deg); filter: blur(0); }
        }
        @keyframes floral-bloom-bl {
            0% { opacity: 0; transform: scale(0.4) rotate(-12deg); filter: blur(2px); }
            60% { opacity: 0.9; transform: scale(1.08) rotate(2deg); filter: blur(0); }
            100% { opacity: 1; transform: scale(1) rotate(0deg); filter: blur(0); }
        }
        @keyframes floral-bloom-br {
            0% { opacity: 0; transform: scale(0.4) rotate(12deg); filter: blur(2px); }
            60% { opacity: 0.9; transform: scale(1.08) rotate(-2deg); filter: blur(0); }
            100% { opacity: 1; transform: scale(1) rotate(0deg); filter: blur(0); }
        }
        @keyframes floral-bloom-center {
            0% { opacity: 0; transform: scale(0.5); filter: blur(2px); }
            70% { opacity: 0.95; transform: scale(1.05); filter: blur(0); }
            100% { opacity: 1; transform: scale(1); filter: blur(0); }
        }

        .anim-flower-tr { opacity: 0; transform-origin: top right; will-change: transform, opacity; }
        .anim-flower-tr.revealed { animation: floral-bloom-tr 0.95s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .anim-flower-tl { opacity: 0; transform-origin: top left; will-change: transform, opacity; }
        .anim-flower-tl.revealed { animation: floral-bloom-tl 0.95s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .anim-flower-bl { opacity: 0; transform-origin: bottom left; will-change: transform, opacity; }
        .anim-flower-bl.revealed { animation: floral-bloom-bl 0.95s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .anim-flower-br { opacity: 0; transform-origin: bottom right; will-change: transform, opacity; }
        .anim-flower-br.revealed { animation: floral-bloom-br 0.95s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .anim-flower-center { opacity: 0; transform-origin: center center; will-change: transform, opacity; }
        .anim-flower-center.revealed { animation: floral-bloom-center 0.85s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .delay-1 { animation-delay: 120ms !important; transition-delay: 120ms !important; }
        .delay-2 { animation-delay: 240ms !important; transition-delay: 240ms !important; }
        .delay-3 { animation-delay: 360ms !important; transition-delay: 360ms !important; }
        .delay-4 { animation-delay: 480ms !important; transition-delay: 480ms !important; }
        .delay-5 { animation-delay: 600ms !important; transition-delay: 600ms !important; }
        .delay-6 { animation-delay: 720ms !important; transition-delay: 720ms !important; }
        .delay-7 { animation-delay: 840ms !important; transition-delay: 840ms !important; }
        .delay-8 { animation-delay: 960ms !important; transition-delay: 960ms !important; }

        /* ================= THEME 20 BESPOKE CREATIVE ANIMATIONS (PREMIUM SERENADE DARK ELEGANCE) ================= */
        @keyframes serenade-halo-pulse {
            0%, 100% {
                box-shadow: 0 0 25px 8px rgba(158, 176, 146, 0.4), 0 0 60px 20px rgba(158, 176, 146, 0.15), inset 0 0 20px rgba(0,0,0,0.6);
                border-color: rgba(158, 176, 146, 0.75);
            }
            50% {
                box-shadow: 0 0 45px 16px rgba(158, 176, 146, 0.65), 0 0 90px 35px rgba(158, 176, 146, 0.3), inset 0 0 10px rgba(0,0,0,0.3);
                border-color: rgba(158, 176, 146, 1);
            }
        }
        .anim-serenade-halo {
            animation: serenade-halo-pulse 4.5s ease-in-out infinite;
        }

        /* ================= THEME 19 BESPOKE HEBOH & KREATIF ANIMATIONS (PREMIUM SERENADE LAVENDER MIST) ================= */
        .font-lavender-title { font-family: 'Cinzel', 'Marcellus', serif; }
        .font-lavender-headline { font-family: 'Cormorant Garamond', 'Playfair Display', serif; }
        .font-lavender-script { font-family: 'Great Vibes', 'Alex Brush', cursive; }
        .font-lavender-body { font-family: 'Plus Jakarta Sans', 'Outfit', sans-serif; }

        /* Bespoke Soft Floral Watermark Pattern for Theme 19 White Backgrounds & Cards */
        .theme-lavender-pattern {
            background-color: #FFFFFF !important;
            background-image: url('/images/themes/serenade-lavender/floral-pattern.png?v=2') !important;
            background-repeat: repeat !important;
            background-size: 520px auto !important;
            background-position: center top !important;
        }

        @keyframes lavender-flower-unfold {
            0% {
                opacity: 0;
                transform: perspective(900px) scale(0.35) translateY(45px);
                filter: blur(8px) drop-shadow(0 0 35px rgba(197, 184, 216, 0.95));
            }
            65% {
                opacity: 0.95;
                transform: perspective(900px) scale(1.08) translateY(-4px);
                filter: blur(0px) drop-shadow(0 0 25px rgba(139, 124, 176, 0.75));
            }
            100% {
                opacity: 1;
                transform: perspective(900px) scale(1) translateY(0);
                filter: drop-shadow(0 4px 14px rgba(139, 124, 176, 0.35));
            }
        }
        .anim-lavender-flower-unfold.revealed {
            animation: lavender-flower-unfold 1.25s cubic-bezier(0.175, 0.885, 0.32, 1.275) both;
        }

        @keyframes lavender-card-3d-entrance {
            0% {
                opacity: 0;
                transform: perspective(1200px) translateY(90px) rotateX(10deg) scale(0.92);
                box-shadow: 0 0 0 rgba(0, 0, 0, 0);
            }
            70% {
                opacity: 0.95;
                transform: perspective(1200px) translateY(-8px) rotateX(-1deg) scale(1.015);
                box-shadow: 0 30px 60px -15px rgba(74, 59, 102, 0.45);
            }
            100% {
                opacity: 1;
                transform: perspective(1200px) translateY(0) rotateX(0deg) scale(1);
                box-shadow: 0 25px 50px -12px rgba(74, 59, 102, 0.35);
            }
        }
        .anim-lavender-card-3d.revealed {
            animation: lavender-card-3d-entrance 1.2s cubic-bezier(0.2, 0.9, 0.3, 1.1) both;
        }

        @keyframes lavender-frame-bloom {
            0% {
                opacity: 0;
                transform: perspective(1000px) scale(0.65) translateY(35px);
                filter: blur(6px) drop-shadow(0 0 40px rgba(197, 184, 216, 1));
            }
            65% {
                opacity: 1;
                transform: perspective(1000px) scale(1.06) translateY(-4px);
                filter: drop-shadow(0 15px 35px rgba(139, 124, 176, 0.6));
            }
            100% {
                opacity: 1;
                transform: perspective(1000px) scale(1) translateY(0);
                filter: drop-shadow(0 10px 25px rgba(139, 124, 176, 0.35));
            }
        }
        .anim-lavender-frame.revealed {
            animation: lavender-frame-bloom 1.3s cubic-bezier(0.175, 0.885, 0.32, 1.2) both;
        }

        @keyframes lavender-title-reveal {
            0% {
                opacity: 0;
                transform: translateY(35px) scale(0.92);
                filter: blur(5px);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: blur(0);
            }
        }
        .anim-lavender-title.revealed {
            animation: lavender-title-reveal 1.1s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes lavender-item-pop {
            0% {
                opacity: 0;
                transform: scale(0.7) translateY(25px);
            }
            70% {
                opacity: 0.95;
                transform: scale(1.05) translateY(-3px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        .anim-lavender-pop.revealed {
            animation: lavender-item-pop 0.95s cubic-bezier(0.175, 0.885, 0.32, 1.2) both;
        }

        @keyframes lavender-halo-glow {
            0%, 100% {
                box-shadow: 0 0 25px 8px rgba(139, 124, 176, 0.45), 0 0 60px 20px rgba(139, 124, 176, 0.2), inset 0 0 15px rgba(255,255,255,0.4);
                border-color: rgba(139, 124, 176, 0.75);
                transform: scale(1);
            }
            50% {
                box-shadow: 0 0 55px 20px rgba(175, 155, 205, 0.85), 0 0 110px 45px rgba(175, 155, 205, 0.45), inset 0 0 28px rgba(255,255,255,0.85);
                border-color: rgba(225, 212, 245, 1);
                transform: scale(1.025);
            }
        }
        .anim-lavender-halo {
            animation: lavender-halo-glow 4s ease-in-out infinite;
        }

        @keyframes flower-float-gentle {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-7px) scale(1.015); filter: drop-shadow(0 8px 18px rgba(139, 124, 176, 0.45)); }
        }
        .anim-flower-float {
            animation: flower-float-gentle 5s ease-in-out infinite;
        }

        @keyframes flower-pulse-glow {
            0%, 100% { transform: scale(1); filter: drop-shadow(0 4px 12px rgba(139, 124, 176, 0.3)); }
            50% { transform: scale(1.03); filter: drop-shadow(0 8px 24px rgba(139, 124, 176, 0.6)); }
        }
        .anim-flower-pulse {
            animation: flower-pulse-glow 4s ease-in-out infinite;
        }

        .anim-floral-bloom.revealed {
            animation: lavender-flower-unfold 1.25s cubic-bezier(0.175, 0.885, 0.32, 1.275) both;
        }
        .anim-card-rise.revealed {
            animation: lavender-card-3d-entrance 1.2s cubic-bezier(0.2, 0.9, 0.3, 1.1) both;
        }

        /* ================= THEME 15 BESPOKE (PREMIUM SERENADE MIDNIGHT AMBER) ================= */
        .font-amber-script {
            font-family: 'Great Vibes', 'Pinyon Script', cursive;
        }
        .font-amber-title {
            font-family: 'Cinzel', serif;
        }
        .font-amber-headline {
            font-family: 'Cormorant Garamond', 'Cinzel', serif;
        }
        .font-amber-body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Continuous Swaying Flowers (Image 4 User Asset: "gerak goyang goyang") */
        @keyframes amber-sway-right {
            0%, 100% { transform: rotate(0deg) scale(1); }
            25% { transform: rotate(3.5deg) scale(1.02); }
            50% { transform: rotate(-2deg) scale(0.98); }
            75% { transform: rotate(2.8deg) scale(1.01); }
        }
        @keyframes amber-sway-left {
            0%, 100% { transform: rotate(0deg) scale(1); }
            25% { transform: rotate(-3.5deg) scale(1.02); }
            50% { transform: rotate(2deg) scale(0.98); }
            75% { transform: rotate(-2.8deg) scale(1.01); }
        }
        .anim-amber-flower-right {
            animation: amber-sway-right 5.5s ease-in-out infinite;
            transform-origin: bottom right;
        }
        .anim-amber-flower-left {
            animation: amber-sway-left 5.5s ease-in-out infinite;
            transform-origin: bottom left;
        }
        .anim-amber-flower-top-right {
            animation: amber-sway-left 6s ease-in-out infinite;
            transform-origin: top right;
        }
        .anim-amber-flower-mid-left {
            animation: amber-sway-right 6.5s ease-in-out infinite;
            transform-origin: center left;
        }

        /* Bespoke Photo Frame for Bride & Groom */
        .amber-frame-box {
            position: relative;
            width: 260px;
            max-width: 85%;
            aspect-ratio: 682 / 1024;
            margin: 0 auto;
        }
        .amber-frame-photo {
            position: absolute;
            left: 12.5%;
            right: 12.5%;
            top: 15.5%;
            bottom: 7%;
            width: 75%;
            height: 77.5%;
            object-fit: cover;
            border-radius: 34px 34px 16px 16px;
        }
        .amber-frame-overlay {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: contain;
            pointer-events: none;
            z-index: 10;
        }

        /* Creative Scroll Entrance Animations ("animasi kreatif/heboh") */
        @keyframes amber-card-3d-entrance {
            0% {
                opacity: 0;
                transform: perspective(1000px) translateY(50px) rotateX(8deg) scale(0.94);
                box-shadow: 0 0 0 rgba(221, 167, 79, 0);
                filter: blur(4px);
            }
            70% {
                opacity: 1;
                transform: perspective(1000px) translateY(-4px) rotateX(-1deg) scale(1.01);
                box-shadow: 0 16px 45px rgba(221, 167, 79, 0.25);
                filter: blur(0);
            }
            100% {
                opacity: 1;
                transform: perspective(1000px) translateY(0) rotateX(0deg) scale(1);
                box-shadow: 0 10px 35px rgba(0, 0, 0, 0.7);
                filter: blur(0);
            }
        }
        .anim-amber-card-3d.revealed {
            animation: amber-card-3d-entrance 1.1s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes amber-bloom-flower {
            0% {
                opacity: 0;
                transform: scale(0.4) rotate(-12deg);
                filter: brightness(1.6) blur(4px);
            }
            70% {
                opacity: 1;
                transform: scale(1.06) rotate(3deg);
                filter: brightness(1.1) blur(0);
            }
            100% {
                opacity: 1;
                transform: scale(1) rotate(0deg);
                filter: brightness(1) blur(0);
            }
        }
        .anim-amber-bloom.revealed {
            animation: amber-bloom-flower 1.2s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes amber-frame-rise {
            0% {
                opacity: 0;
                transform: perspective(1000px) translateY(45px) scale(0.88);
                filter: drop-shadow(0 0 0 rgba(221, 167, 79, 0));
            }
            70% {
                opacity: 1;
                transform: perspective(1000px) translateY(-5px) scale(1.03);
                filter: drop-shadow(0 15px 35px rgba(221, 167, 79, 0.4));
            }
            100% {
                opacity: 1;
                transform: perspective(1000px) translateY(0) scale(1);
                filter: drop-shadow(0 10px 25px rgba(0, 0, 0, 0.7));
            }
        }
        .anim-amber-frame.revealed {
            animation: amber-frame-rise 1.25s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes amber-title-expand {
            0% {
                opacity: 0;
                transform: translateY(25px) scale(0.92);
                letter-spacing: 0.5em;
                filter: blur(5px);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
                filter: blur(0);
            }
        }
        .anim-amber-title.revealed {
            animation: amber-title-expand 1s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes amber-pop-bounce {
            0% {
                opacity: 0;
                transform: scale(0.7) translateY(20px);
            }
            70% {
                opacity: 1;
                transform: scale(1.06) translateY(-3px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        .anim-amber-pop.revealed {
            animation: amber-pop-bounce 0.9s cubic-bezier(0.175, 0.885, 0.32, 1.2) both;
        }

        /* ================= THEME 16: PREMIUM MUSEUM OF LOVE ================= */
        .font-museum-title {
            font-family: 'Cinzel Decorative', 'Cinzel', serif;
        }
        .font-museum-sub {
            font-family: 'Cinzel', 'Playfair Display', serif;
        }
        .font-museum-script {
            font-family: 'Pinyon Script', 'Alex Brush', cursive;
        }
        .font-museum-body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .theme-museum-canvas {
            background-color: #F7F2E8;
            background-image: 
                radial-gradient(circle at 50% 12%, rgba(255, 248, 230, 0.95) 0%, rgba(247, 242, 232, 0.5) 55%),
                radial-gradient(circle at 10% 85%, rgba(212, 175, 55, 0.06) 0%, transparent 45%),
                radial-gradient(circle at 90% 45%, rgba(139, 30, 34, 0.05) 0%, transparent 45%);
        }

        .museum-spotlight {
            background: radial-gradient(ellipse at 50% 0%, rgba(255, 246, 219, 0.7) 0%, rgba(255, 238, 190, 0.25) 45%, transparent 75%);
        }

        /* Lantern Ambient Pulse & Sway */
        @keyframes lantern-sway-left {
            0%, 100% { transform: rotate(0deg) scale(1); filter: drop-shadow(0 0 15px rgba(234, 179, 8, 0.35)); }
            50% { transform: rotate(-2.8deg) scale(1.02); filter: drop-shadow(0 0 26px rgba(253, 224, 71, 0.65)); }
        }
        @keyframes lantern-sway-right {
            0%, 100% { transform: rotate(0deg) scale(1); filter: drop-shadow(0 0 15px rgba(234, 179, 8, 0.35)); }
            50% { transform: rotate(2.8deg) scale(1.02); filter: drop-shadow(0 0 26px rgba(253, 224, 71, 0.65)); }
        }
        .anim-lantern-sway {
            animation: lantern-sway-left 5.2s ease-in-out infinite;
            transform-origin: top center;
        }
        .anim-lantern-sway-delayed {
            animation: lantern-sway-right 5.8s ease-in-out infinite 0.75s;
            transform-origin: top center;
        }

        /* Baroque Gold Picture Frame Aperture & Animations */
        .museum-frame-container {
            position: relative;
            width: 270px;
            max-width: 86%;
            aspect-ratio: 916 / 1024;
            margin: 0 auto;
        }
        .museum-frame-photo {
            position: absolute;
            left: 21.5%;
            right: 21.5%;
            top: 14%;
            bottom: 13%;
            width: 57%;
            height: 73%;
            object-fit: cover;
            border-radius: 20px;
        }

        @keyframes museum-frame-unveil {
            0% {
                opacity: 0;
                transform: perspective(1000px) translateY(45px) scale(0.88) rotateX(7deg);
                filter: drop-shadow(0 0 0 rgba(212, 175, 55, 0));
            }
            70% {
                opacity: 1;
                transform: perspective(1000px) translateY(-5px) scale(1.03) rotateX(-1deg);
                filter: drop-shadow(0 18px 45px rgba(212, 175, 55, 0.35));
            }
            100% {
                opacity: 1;
                transform: perspective(1000px) translateY(0) scale(1) rotateX(0deg);
                filter: drop-shadow(0 14px 35px rgba(0, 0, 0, 0.22));
            }
        }
        .anim-museum-frame.revealed {
            animation: museum-frame-unveil 1.25s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes museum-card-rise {
            0% {
                opacity: 0;
                transform: perspective(1000px) translateY(40px) scale(0.95);
                filter: blur(4px);
            }
            100% {
                opacity: 1;
                transform: perspective(1000px) translateY(0) scale(1);
                filter: blur(0);
            }
        }
        .anim-museum-card.revealed {
            animation: museum-card-rise 1.1s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        @keyframes scroll-unroll {
            0% {
                opacity: 0;
                transform: scale(0.9) translateY(24px);
                filter: blur(2px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
                filter: blur(0);
            }
        }
        .anim-scroll-unroll {
            animation: scroll-unroll 1.25s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .scrollbar-none::-webkit-scrollbar, ::-webkit-scrollbar { display: none; }
        .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="antialiased min-h-screen text-slate-800 relative selection:bg-amber-100 selection:text-amber-900 scrollbar-none"
      data-theme-id="{{ $currentThemeId }}"
      data-theme-slug="{{ $currentThemeSlug }}"
      data-tier="{{ $currentThemeTier }}">

    <!-- ================= 1. COVER UNDANGAN (FULLSCREEN OVERLAY PEMBUKA) ================= -->
    <div id="invitation-cover" data-test="invitation-cover-overlay" class="fixed inset-0 z-[60] flex items-center justify-center {{ ($currentThemeId == 1 || $currentThemeId == 5 || $currentThemeId == 13 || $currentThemeId == 15 || $currentThemeId == 16 || $currentThemeId == 19 || $currentThemeId == 20 || $isDarkElegance || $isLavenderMist || $isMidnightAmber || $isMuseumOfLove || $isSummerVibes) ? 'p-0' : 'p-3 sm:p-6' }} select-none transition-all duration-1000 ease-in-out bg-[var(--bg-canvas)] overflow-hidden">
        
        @if($currentThemeId == 1)
        <!-- ================= THEME 1 BESPOKE COVER (BASIC HARMONY MAROON - MATCHING IMAGE 1 & 2) ================= -->
        <div class="w-full h-full min-h-screen flex flex-col md:flex-row relative">
            <!-- Left Pane (Desktop Dual-Pane view matching Image 2) -->
            <div class="hidden md:flex md:w-[58%] lg:w-[60%] bg-[#4A050C] items-center justify-center p-8 text-center text-white select-none">
                <div class="space-y-4">
                    <p class="font-serif text-sm tracking-[0.25em] uppercase text-white/80 font-medium">Undangan Pernikahan</p>
                    <h1 class="font-serif text-5xl lg:text-6xl text-white font-normal tracking-wide leading-tight">
                        {{ $groomNickname }} & {{ $brideNickname }}
                    </h1>
                    <p class="font-serif text-xs tracking-widest text-[#FCD8DF]/80 pt-2">
                        {{ $eventDate->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>

            <!-- Right Pane / Mobile Full Bleed (Matching Image 1 & Image 2) -->
            <div class="relative w-full md:w-[42%] lg:w-[40%] min-h-screen flex flex-col justify-between p-6 sm:p-8 md:p-10 text-white shadow-2xl"
                 style="background-image: linear-gradient(180deg, rgba(65, 4, 10, 0.72) 0%, rgba(55, 4, 9, 0.65) 35%, rgba(40, 4, 8, 0.92) 100%), url('{{ $bgPhoto }}'); background-size: cover; background-position: center;">
                
                <!-- Top Right: Undangan Pernikahan & Names -->
                <div class="text-right pt-4 sm:pt-6">
                    <p class="font-serif text-xs sm:text-sm text-white/90 tracking-wide font-medium">Undangan Pernikahan</p>
                    <h2 class="font-serif text-3xl sm:text-4xl text-white font-semibold tracking-tight mt-1">
                        {{ $groomNickname }} & {{ $brideNickname }}
                    </h2>
                </div>

                <!-- Middle Left: Kepada Guest Name -->
                <div class="my-auto py-8 text-left space-y-1">
                    <p class="font-serif text-xs sm:text-sm text-white/80 font-light">Kepada:</p>
                    <h3 class="font-serif text-2xl sm:text-3xl md:text-4xl font-bold text-white tracking-wide">
                        {{ $guestName }}
                    </h3>
                </div>

                <!-- Bottom Right: Date, Line Divider, Pill Button -->
                <div class="pb-4 sm:pb-6 flex flex-col items-end text-right w-full">
                    <p class="font-serif text-xs sm:text-sm text-white/95 tracking-wide mb-2 font-medium">
                        {{ $eventDate->translatedFormat('d F Y') }}
                    </p>
                    <div class="w-48 sm:w-56 h-[1.5px] bg-white/70 mb-4"></div>
                    <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation px-8 sm:px-10 py-2.5 sm:py-3 rounded-full bg-[#FFDADA] hover:bg-[#ffe3e3] text-[#620000] font-serif font-bold text-xs sm:text-sm tracking-wide shadow-xl flex items-center justify-center gap-2 cursor-pointer transition transform active:scale-95 group">
                        <span>Buka Undangan</span>
                    </button>
                </div>
            </div>
        </div>
        @elseif($currentThemeId == 2)
        <!-- ================= THEME 2 BESPOKE COVER (BASIC HARMONY EMERALD) ================= -->
        <div class="w-full max-w-sm sm:max-w-md mx-auto py-6 sm:py-8 flex flex-col items-center justify-between min-h-[85vh] sm:min-h-[90vh]">
            <!-- Top Header: Couple Names in Tracked Uppercase on White Canvas -->
            <div class="text-center pt-2 pb-4">
                <p class="font-heading text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-stone-700 font-semibold">
                    {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                </p>
            </div>

            <!-- Main Asymmetric Emerald Card with Double Gold Inset Frame -->
            <div class="w-full rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-3 sm:p-4 relative border border-[#D4AF37]/45">
                <!-- Inner Inset Frame with Double Gold Border -->
                <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl py-8 sm:py-10 px-5 sm:px-8 text-center flex flex-col items-center justify-center space-y-5 sm:space-y-6">
                    <!-- Gold Interlocking Rings Divider -->
                    <div class="w-48 sm:w-56 h-6 sm:h-7 mx-auto">
                        <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Wedding Rings" class="w-full h-full object-contain">
                    </div>

                    <!-- Recipient Greeting Header -->
                    <div class="space-y-1.5">
                        <p class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-[#E5C158]">
                            KEPADA YTH
                        </p>
                        <h3 class="font-heading text-xl sm:text-2xl font-bold text-white tracking-wide truncate max-w-xs px-2 drop-shadow-xs">
                            {{ $guestName }}
                        </h3>
                    </div>

                    <!-- Buka Undangan CTA Button with Gold Metallic Gradient -->
                    <div class="pt-2">
                        <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation px-8 sm:px-10 py-3 sm:py-3.5 rounded-full bg-gradient-to-r from-[#9C782F] via-[#C59B3F] to-[#8F6C25] hover:from-[#AD8737] hover:to-[#9C782F] border border-[#F3E196]/80 text-white font-bold text-xs sm:text-sm tracking-wider uppercase shadow-xl flex items-center justify-center gap-2 cursor-pointer transition transform active:scale-95 group">
                            <svg class="w-4 h-4 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>BUKA UNDANGAN</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bouncing Chevron Down Icon on White Canvas -->
            <div class="mt-4 sm:mt-6 text-[#1E6B52] animate-bounce pointer-events-none">
                <svg class="w-6 h-6 sm:w-7 sm:h-7 mx-auto stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
        </div>
        @elseif($currentThemeId == 3)
        <!-- ================= THEME 3 BESPOKE COVER (BASIC HARMONY NAVY - MATCHING IMAGE 1) ================= -->
        <div class="relative w-full min-h-screen flex flex-col justify-between items-center px-4 py-8 overflow-hidden text-white">
            <!-- Top Layered Organic Waves SVG -->
            <div class="absolute inset-x-0 top-0 w-full pointer-events-none z-0">
                <img src="/images/themes/bg/navy-wave-top.svg" alt="" class="w-full h-24 sm:h-36 object-cover object-bottom opacity-90 transform rotate-180">
            </div>

            <!-- Top Title Badge -->
            <div class="relative z-10 pt-4 text-center">
                <span class="inline-block px-4 py-1 rounded-full text-[10px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-white/90 bg-white/10 backdrop-blur-md border border-white/20">
                    {{ $invitation->title ?? 'THE WEDDING OF' }}
                </span>
            </div>

            <!-- Center Frosted Glassmorphism Card (Directly Matching Image 1) -->
            <div class="relative z-10 w-full max-w-sm sm:max-w-md mx-auto my-auto py-4">
                <div class="rounded-2xl p-6 sm:p-8 bg-white/10 backdrop-blur-md border border-white/25 text-center text-white shadow-2xl space-y-4 sm:space-y-5">
                    <p class="font-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-white/80 font-medium">
                        THE WEDDING OF
                    </p>

                    <h2 class="font-heading text-3xl sm:text-4xl md:text-5xl font-normal text-white tracking-wide">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </h2>

                    <div class="pt-2 space-y-1">
                        <p class="text-[11px] sm:text-xs uppercase tracking-widest text-white/75 font-light">
                            Kepada Yth.
                        </p>
                        <h3 class="text-lg sm:text-xl font-bold text-white tracking-wide">
                            {{ $guestName }}
                        </h3>
                    </div>

                    <div class="pt-3">
                        <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation px-8 sm:px-10 py-3 rounded-full bg-white/20 hover:bg-white/30 border border-white/60 text-white font-bold text-xs sm:text-sm tracking-wider uppercase shadow-lg inline-flex items-center justify-center gap-2 cursor-pointer transition transform active:scale-95 group">
                            <svg class="w-4 h-4 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>Buka Undangan</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Bottom Chevron Indicator -->
            <div class="relative z-10 pb-2 text-white/80 animate-bounce pointer-events-none">
                <svg class="w-6 h-6 mx-auto stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
        </div>
        @elseif($currentThemeId == 5)
        <!-- ================= THEME 5 BESPOKE COVER (BASIC HARMONY MONOCHROME - MATCHING IMAGE 2) ================= -->
        <div class="relative w-full h-full min-h-full flex flex-col justify-between items-center text-center p-6 sm:p-10 text-white select-none overflow-hidden"
             style="background-image: linear-gradient(180deg, rgba(20,20,20,0.65) 0%, rgba(30,30,30,0.35) 45%, rgba(15,15,15,0.85) 100%), url('{{ $t5CoverPhoto }}'); background-size: cover; background-position: center;">
            
            <!-- Top Header: The Wedding of, Nicknames, Event Date -->
            <div class="relative z-10 pt-6 sm:pt-10 space-y-2 max-w-md mx-auto">
                <p class="font-serif text-xs sm:text-sm tracking-[0.3em] uppercase text-stone-200 font-light">
                    The Wedding of
                </p>
                <h1 class="theme-script text-4xl sm:text-5xl md:text-6xl text-white font-normal tracking-wide drop-shadow-md leading-tight">
                    {{ $groomNickname }} &amp; {{ $brideNickname }}
                </h1>
                <p class="font-serif text-xs sm:text-sm tracking-widest text-stone-300 font-light pt-0.5">
                    {{ $eventDateFormatted }}
                </p>
            </div>

            <!-- Center Recipient Box: Dear, Guest Name -->
            <div class="relative z-10 my-auto py-4 text-center space-y-2 max-w-sm sm:max-w-md mx-auto">
                <p class="font-serif text-xs sm:text-sm tracking-wider text-stone-300 font-light">
                    Dear,
                </p>
                <h2 class="font-serif text-2xl sm:text-3xl md:text-4xl font-semibold text-white tracking-wide drop-shadow-sm">
                    {{ $guestName }}
                </h2>
                <p class="text-[10px] sm:text-xs text-stone-400 italic">
                    *Mohon maaf apabila ada kesalahan penulisan nama/gelar
                </p>
            </div>

            <!-- Bottom: Open Invitation Translucent Pill Button -->
            <div class="relative z-10 pb-6 sm:pb-10 flex flex-col items-center w-full max-w-xs mx-auto">
                <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation w-full max-w-[240px] py-3 sm:py-3.5 px-6 rounded-full bg-black/60 hover:bg-black/85 backdrop-blur-md border border-white/70 text-white font-serif font-medium text-xs sm:text-sm tracking-wider uppercase shadow-2xl flex items-center justify-center gap-2.5 cursor-pointer transition transform active:scale-95 group">
                    <svg class="w-4 h-4 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Buka Undangan</span>
                </button>
            </div>
        </div>
        @elseif($currentThemeId == 20 || $isDarkElegance)
        <!-- ================= THEME 20 BESPOKE COVER (PREMIUM SERENADE DARK ELEGANCE) ================= -->
        <div class="relative w-full h-full min-h-full flex flex-col justify-between items-center text-center p-6 sm:p-10 text-white select-none overflow-hidden bg-[#070807]">
            <!-- Subtle Radial Gradient Glow -->
            <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at center, rgba(158, 176, 146, 0.12) 0%, rgba(7, 8, 7, 0.95) 70%, #070807 100%);"></div>

            <!-- Top Header: The Wedding of, Couple Names, Date -->
            <div class="relative z-10 pt-6 sm:pt-10 space-y-3 max-w-md mx-auto">
                <span class="inline-block font-serif text-[11px] sm:text-xs tracking-[0.35em] uppercase text-[#9EB092] font-semibold">
                    THE WEDDING OF
                </span>
                
                <!-- Circular Couple Photo with Ambient Pulsing Glow -->
                <div class="w-36 sm:w-44 aspect-square mx-auto rounded-full p-1 border-2 border-[#9EB092]/80 anim-serenade-halo overflow-hidden shadow-2xl relative group my-2">
                    <img src="{{ $t20CoverPhoto }}" alt="Cover Theo & Lisa" class="w-full h-full object-cover rounded-full group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 rounded-full bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                </div>

                <h1 class="theme-script text-4xl sm:text-5xl text-[#FAF7F2] font-normal tracking-wide drop-shadow-md leading-tight pt-1">
                    {{ $brideNickname }} &amp; {{ $groomNickname }}
                </h1>
                <p class="font-serif text-[11px] sm:text-xs tracking-[0.25em] text-[#9EB092] font-medium uppercase">
                    {{ $eventDateFormatted }}
                </p>
            </div>

            <!-- Center Recipient Box: Kepada Yth, Guest Name -->
            <div class="relative z-10 my-auto py-3 text-center space-y-2 max-w-xs sm:max-w-sm mx-auto w-full">
                <div class="p-4 sm:p-5 rounded-2xl bg-[#131713]/90 backdrop-blur-md border border-[#9EB092]/40 shadow-xl space-y-1.5">
                    <p class="text-[10px] sm:text-[11px] tracking-widest uppercase text-[#9EB092] font-semibold">
                        Kepada Yth. Bapak/Ibu/Saudara/i:
                    </p>
                    <h2 class="font-serif text-xl sm:text-2xl font-bold text-[#FAF7F2] tracking-wide">
                        {{ $guestName }}
                    </h2>
                    <p class="text-[9px] text-[#9EB092]/80 italic pt-0.5">
                        *Mohon maaf apabila ada kesalahan penulisan nama/gelar
                    </p>
                </div>
            </div>

            <!-- Bottom: Flower Divider + Buka Undangan CTA Button -->
            <div class="relative z-10 pb-6 sm:pb-10 flex flex-col items-center w-full max-w-xs mx-auto space-y-4">
                <!-- Floral Divider -->
                <div class="w-44 sm:w-56 mx-auto pointer-events-none opacity-90">
                    <img src="{{ asset('images/themes/serenade-dark/floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>

                <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation w-full max-w-[240px] py-3 sm:py-3.5 px-6 rounded-full bg-[#9EB092] hover:bg-[#8da081] text-[#070807] font-serif font-bold text-xs sm:text-sm tracking-widest uppercase shadow-2xl shadow-[#9eb092]/25 flex items-center justify-center gap-2.5 cursor-pointer transition transform active:scale-95 group">
                    <svg class="w-4 h-4 text-[#070807] group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Buka Undangan</span>
                </button>
            </div>
        </div>
        @elseif($currentThemeId == 19 || $isLavenderMist)
        <!-- ================= THEME 19 BESPOKE COVER (PREMIUM SERENADE LAVENDER MIST) ================= -->
        <div class="relative w-full h-full min-h-full flex flex-col justify-between items-center text-center p-6 sm:p-10 text-white select-none overflow-hidden"
             style="background-image: linear-gradient(180deg, rgba(25,12,38,0.45) 0%, rgba(35,18,52,0.3) 40%, rgba(20,10,32,0.92) 100%), url('{{ $t19CoverPhoto }}'); background-size: cover; background-position: center;">
            
            <!-- Centered Majestic Symmetrical Floral Garland at Top (Zero tilt, perfectly horizontal) -->
            <div class="w-60 sm:w-72 mx-auto pt-2 pointer-events-none z-10 opacity-95 anim-flower-pulse">
                <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-xl">
            </div>

            <!-- Top Header: Title, Names, Date -->
            <div class="relative z-10 pt-2 space-y-2 max-w-md mx-auto">
                <span class="inline-block font-lavender-title px-4 py-1.5 rounded-full text-[10px] sm:text-xs tracking-[0.35em] uppercase text-purple-200 font-semibold bg-black/40 backdrop-blur-md border border-purple-300/30 shadow-md">
                    THE WEDDING OF
                </span>
                <h1 class="font-lavender-script text-5xl sm:text-6xl md:text-7xl text-white font-normal tracking-wide drop-shadow-2xl leading-tight py-1">
                    {{ $groomNickname }} <span class="text-purple-200 font-light">&amp;</span> {{ $brideNickname }}
                </h1>
                <p class="font-lavender-headline text-sm sm:text-base tracking-[0.25em] text-purple-100 font-medium uppercase drop-shadow-md">
                    {{ $eventDateFormatted }}
                </p>
            </div>

            <!-- Center Recipient Card -->
            <div class="relative z-10 my-auto py-3 text-center space-y-2 max-w-xs sm:max-w-sm mx-auto w-full">
                <div class="p-5 sm:p-6 rounded-3xl bg-black/55 backdrop-blur-md border border-purple-300/40 shadow-2xl space-y-2">
                    <p class="font-lavender-title text-[9.5px] sm:text-[11px] tracking-[0.25em] uppercase text-purple-200 font-semibold">
                        Kepada Yth. Bapak/Ibu/Saudara/i:
                    </p>
                    <h2 class="font-lavender-headline text-2xl sm:text-3xl font-bold text-white tracking-wide leading-tight drop-shadow-md">
                        {{ $guestName }}
                    </h2>
                    <p class="text-[10px] sm:text-xs text-purple-200/80 italic font-lavender-serif">
                        *Mohon maaf apabila ada kesalahan penulisan nama/gelar
                    </p>
                </div>
            </div>

            <!-- Bottom: Symmetrical Flower Divider + Buka Undangan CTA Button -->
            <div class="relative z-10 pb-6 sm:pb-10 flex flex-col items-center w-full max-w-xs mx-auto space-y-3">
                <div class="w-56 sm:w-64 mx-auto pointer-events-none anim-flower-float">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-lg">
                </div>

                <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation w-full max-w-[260px] py-3.5 sm:py-4 px-8 rounded-full bg-gradient-to-r from-[#8B7CB0] via-[#9F90C2] to-[#8B7CB0] hover:from-[#7E6FA3] hover:to-[#7E6FA3] text-white font-lavender-title font-bold text-xs sm:text-sm tracking-[0.25em] uppercase shadow-[0_10px_30px_rgba(139,124,176,0.6)] border border-purple-200/50 flex items-center justify-center gap-2.5 cursor-pointer transition transform hover:scale-105 active:scale-95 group">
                    <svg class="w-4 h-4 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Buka Undangan</span>
                </button>
            </div>
        </div>
        @elseif($currentThemeId == 15 || $isMidnightAmber)
        <!-- ================= THEME 15 BESPOKE COVER (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
        <div class="relative w-full h-full min-h-full flex flex-col justify-between items-center text-center p-6 sm:p-10 select-none overflow-hidden bg-[#161514] text-white">
            
            <!-- Continuous Gentle Swaying Floral Elements (Image 4 User Asset: "gerak goyang goyang") -->
            <!-- Top-Right Swaying Flower Bouquet -->
            <div class="absolute -top-6 -right-6 sm:-top-8 sm:-right-8 w-44 sm:w-56 md:w-64 pointer-events-none z-10 anim-amber-flower-top-right drop-shadow-2xl opacity-95">
                <img src="{{ asset('images/themes/serenade-amber/floral-corner.png') }}" alt="" class="w-full h-auto object-contain transform -scale-x-100 rotate-45">
            </div>

            <!-- Middle-Left Swaying Flower Bouquet -->
            <div class="absolute top-[35%] -left-8 sm:-left-12 w-40 sm:w-48 pointer-events-none z-10 anim-amber-flower-mid-left drop-shadow-2xl opacity-90">
                <img src="{{ asset('images/themes/serenade-amber/floral-corner.png') }}" alt="" class="w-full h-auto object-contain rotate-12">
            </div>

            <!-- Bottom-Left Swaying Flower Bouquet -->
            <div class="absolute -bottom-6 -left-6 sm:-bottom-8 sm:-left-8 w-48 sm:w-60 md:w-68 pointer-events-none z-10 anim-amber-flower-left drop-shadow-2xl opacity-95">
                <img src="{{ asset('images/themes/serenade-amber/floral-corner.png') }}" alt="" class="w-full h-auto object-contain">
            </div>

            <!-- Bottom-Right Swaying Flower Bouquet -->
            <div class="absolute -bottom-6 -right-6 sm:-bottom-8 sm:-right-8 w-48 sm:w-60 md:w-68 pointer-events-none z-10 anim-amber-flower-right drop-shadow-2xl opacity-95">
                <img src="{{ asset('images/themes/serenade-amber/floral-corner.png') }}" alt="" class="w-full h-auto object-contain transform -scale-x-100">
            </div>

            <!-- Center Content Container (Matching Reference Preview Image) -->
            <div class="relative z-20 w-full max-w-sm mx-auto flex flex-col items-center pt-2 sm:pt-4 my-auto space-y-4">
                
                <!-- Couple Arch Frame with Floral Crest at Bottom -->
                <div class="relative w-44 sm:w-52 aspect-[3/4] mx-auto anim-amber-bloom">
                    <!-- Photo Container with Golden Border and Curved Arch -->
                    <div class="w-full h-full rounded-t-[100px] rounded-b-[18px] overflow-hidden border-[2.5px] border-[#DDA74F] shadow-[0_12px_40px_rgba(0,0,0,0.85)] bg-[#1F1D1B] relative">
                        <img src="{{ $t15CoverPhoto }}" alt="The Couple" class="w-full h-full object-cover">
                    </div>
                    <!-- Floral Crest wrapping the bottom of the arch photo -->
                    <div class="absolute -bottom-6 sm:-bottom-7 -left-6 -right-6 pointer-events-none z-10 drop-shadow-[0_8px_20px_rgba(0,0,0,0.8)]">
                        <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                </div>

                <!-- Text: The Wedding Of & Names -->
                <div class="pt-2 space-y-1">
                    <p class="font-amber-title text-[9.5px] sm:text-[11px] tracking-[0.35em] text-[#E8C37D] uppercase font-semibold">
                        THE WEDDING OF
                    </p>
                    <h1 class="font-amber-script text-4xl sm:text-5xl text-[#F2D59B] leading-tight drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)] py-1">
                        {{ $groomNickname }} <span class="text-[#DDA74F] font-light">&amp;</span> {{ $brideNickname }}
                    </h1>
                </div>

                <!-- Guest Greeting Card -->
                <div class="space-y-1 pt-1 text-center">
                    <p class="font-amber-headline text-xs sm:text-sm text-[#C4B5A5] italic">
                        Kepada Yth :
                    </p>
                    <h2 class="font-amber-headline text-lg sm:text-xl font-bold text-[#FAF5EC] tracking-wide">
                        {{ $guestName }}
                    </h2>
                    <p class="font-amber-headline text-xs sm:text-sm text-[#C4B5A5]">
                        Ditempat
                    </p>
                </div>

                <!-- Buka Undangan Button (Golden Gradient with Open Book Icon) -->
                <div class="pt-2 w-full max-w-[210px]">
                    <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation w-full py-2.5 sm:py-3 px-6 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] hover:brightness-110 text-[#161514] font-amber-title font-bold text-[11px] sm:text-xs tracking-[0.2em] uppercase shadow-[0_6px_25px_rgba(221,167,79,0.45)] border border-[#FFE7B3] flex items-center justify-center gap-2 cursor-pointer transition transform active:scale-95 group">
                        <svg class="w-4 h-4 text-[#161514] group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                        <span>Buka Undangan</span>
                    </button>
                </div>

            </div>
        </div>
        @elseif($currentThemeId == 13 || $isSummerVibes)
        <!-- ================= THEME 13 BESPOKE COVER (PREMIUM SUMMER VIBES DUAL PANE) ================= -->
        <div class="w-full h-full min-h-screen flex flex-col md:flex-row relative overflow-hidden select-none bg-[#EFECE6]">
            
            <!-- Desktop Left Pane (Exact Mirror of #t13-desktop-sidebar for Seamless Unfold) -->
            <div class="hidden md:flex md:w-[58%] lg:w-[60%] h-full flex-col items-center justify-center p-6 lg:p-12 select-none relative shadow-2xl overflow-hidden bg-[#EFECE6]">
                <!-- Decorative Framing Lines with Arrows matching Reference Image -->
                <div class="absolute inset-6 lg:inset-8 pointer-events-none z-10 border-t border-l border-[#D94B26]/60">
                    <div class="absolute -top-1.5 -left-1.5 w-3 h-3 border-t-2 border-l-2 border-[#D94B26]"></div>
                    <div class="absolute -top-1 -right-1 text-[#D94B26] text-xs font-serif leading-none">▶</div>
                    <div class="absolute -bottom-1 -left-1 text-[#D94B26] text-xs font-serif leading-none">▼</div>
                </div>

                <!-- Top-Right Scalloped Cloud in Cobalt Blue -->
                <div class="absolute -top-2 -right-2 w-72 lg:w-96 pointer-events-none z-10 anim-summer-cloud">
                    <svg viewBox="0 0 380 220" fill="none" class="w-full h-auto drop-shadow-md">
                        <path d="M380,0 L160,0 C150,35 170,75 195,90 C165,100 155,140 185,165 C210,185 250,180 270,205 C290,220 330,225 380,220 Z" fill="#1D63B8" opacity="0.95"/>
                        <path d="M380,0 L200,0 C190,28 210,60 225,75 C200,85 190,120 215,145 C235,160 270,155 290,180 C310,195 340,205 380,200 Z" fill="#2563EB" opacity="0.6"/>
                    </svg>
                </div>

                <!-- Bottom-Left Scalloped Cloud in Terracotta/Peach -->
                <div class="absolute -bottom-2 -left-2 w-64 lg:w-80 pointer-events-none z-10 anim-summer-cloud-alt">
                    <svg viewBox="0 0 340 200" fill="none" class="w-full h-auto drop-shadow-md">
                        <path d="M0,200 L0,50 C35,40 65,60 80,80 C105,55 145,65 160,95 C180,115 175,150 205,165 C225,175 235,190 235,200 Z" fill="#D94B26" opacity="0.9"/>
                        <path d="M0,200 L0,80 C25,75 50,90 62,105 C85,85 120,95 132,120 C150,135 145,165 170,175 C185,185 195,195 195,200 Z" fill="#E07A5F" opacity="0.7"/>
                    </svg>
                </div>

                <!-- Blue Flower Branch on top of Peach Cloud -->
                <div class="absolute bottom-5 left-5 w-28 lg:w-36 pointer-events-none z-20 opacity-90 drop-shadow-sm">
                    <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain transform -rotate-12">
                </div>

                <!-- Top-Left Peach Hibiscus Corner -->
                <div class="absolute top-0 left-0 w-40 lg:w-52 pointer-events-none z-20 anim-summer-flower-tl drop-shadow-md">
                    <img src="{{ asset('images/themes/summer-vibes/flower-corner-2.png') }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Bottom-Right Peach Hibiscus Bouquet -->
                <div class="absolute bottom-0 right-0 w-44 lg:w-56 pointer-events-none z-20 anim-summer-flower-tr drop-shadow-md">
                    <img src="{{ asset('images/themes/summer-vibes/flower-corner-1.png') }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Swaying Coconut Palm Tree Rising on Left -->
                <div class="absolute -bottom-6 left-2 lg:left-6 w-52 lg:w-68 pointer-events-none z-20 anim-summer-palm drop-shadow-xl">
                    <img src="{{ asset('images/themes/summer-vibes/palm-tree.png') }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Floating Animated Sparkles / Beach Dust Particles -->
                <div class="absolute inset-0 pointer-events-none z-15 overflow-hidden">
                    <div class="absolute top-[22%] left-[28%] w-2 h-2 rounded-full bg-[#1D63B8]/40 anim-summer-sparkle"></div>
                    <div class="absolute top-[36%] right-[22%] w-1.5 h-1.5 rounded-full bg-[#D94B26]/40 anim-summer-sparkle" style="animation-delay: 1.2s;"></div>
                    <div class="absolute bottom-[38%] left-[42%] w-2.5 h-2.5 rounded-full bg-[#1D63B8]/30 anim-summer-sparkle" style="animation-delay: 2.4s;"></div>
                    <div class="absolute bottom-[24%] right-[32%] w-2 h-2 rounded-full bg-[#D94B26]/35 anim-summer-sparkle" style="animation-delay: 0.7s;"></div>
                </div>

                <!-- Central Invitation Typography Block -->
                <div class="relative z-30 text-center max-w-lg space-y-4 px-6 anim-fade-up">
                    <span class="inline-block font-serif text-xs lg:text-sm tracking-[0.35em] uppercase text-[#1D63B8] font-bold">
                        WEDDING INVITATION
                    </span>

                    <!-- Blue Floral Divider -->
                    <div class="w-28 sm:w-36 mx-auto pointer-events-none">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>

                    <!-- Couple Names in Shrikhand Display Font -->
                    <h1 class="text-6xl sm:text-7xl lg:text-8xl text-[#D94B26] font-normal leading-none tracking-normal py-2 drop-shadow-xs"
                        style="font-family: 'Shrikhand', 'Titan One', cursive;">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </h1>

                    <!-- Event Date -->
                    <p class="font-serif text-sm sm:text-base font-bold text-[#1D63B8] tracking-[0.2em] uppercase">
                        {{ $eventDateFormatted }}
                    </p>
                </div>
            </div>

            <!-- Mobile & Right Pane: Postage Stamp Invitation Card Cover matching Reference -->
            <div class="w-full md:w-[42%] lg:w-[40%] h-full flex flex-col items-center justify-between p-4 sm:p-6 md:p-8 relative overflow-y-auto bg-[#EFECE6] text-[#1E293B]">
                
                <!-- Ticket Card Container matching Reference Image -->
                <div class="w-full max-w-sm sm:max-w-md my-auto rounded-[28px] border-[2.5px] border-[#1D63B8] bg-[#FAF8F5] shadow-[0_16px_45px_rgba(29,99,184,0.18)] relative overflow-hidden flex flex-col justify-between">
                    
                    <!-- Solid Blue Header Banner -->
                    <div class="w-full bg-[#1D63B8] text-white py-2.5 px-4 text-center">
                        <span class="font-serif text-xs sm:text-sm font-bold tracking-[0.25em] uppercase">
                            WEDDING INVITATION
                        </span>
                    </div>

                    <!-- Inner Dashed Border Frame -->
                    <div class="border-2 border-dashed border-[#1D63B8]/75 rounded-[20px] m-2 sm:m-3 p-4 sm:p-6 text-center space-y-3.5 relative overflow-hidden">
                        
                        <!-- Top-Right Scalloped Cloud Accent on Stamp -->
                        <div class="absolute top-2 right-2 w-14 h-12 bg-[#1D63B8]/20 rounded-bl-3xl pointer-events-none z-0"></div>

                        <!-- Couple Portrait in Postage Stamp Frame -->
                        <div class="theme-summer-stamp w-44 sm:w-52 mx-auto anim-summer-stamp drop-shadow-[0_12px_28px_rgba(29,99,184,0.22)] relative z-10">
                            <div class="theme-summer-stamp-photo">
                                <img src="{{ $t13HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover">
                            </div>
                            <img src="{{ asset('images/themes/summer-vibes/stamp-frame.png') }}" alt="" class="theme-summer-stamp-overlay">
                        </div>

                        <!-- Couple Names: Dea & Dion (Vertical Stack) -->
                        <div class="text-center pt-1 space-y-0.5">
                            <h2 class="text-3xl sm:text-4xl text-[#D94B26] font-normal leading-tight tracking-normal"
                                style="font-family: 'Shrikhand', 'Titan One', cursive;">
                                {{ $brideNickname }}
                            </h2>
                            <p class="text-2xl text-[#D94B26] font-normal leading-none" style="font-family: 'Shrikhand', cursive;">
                                &amp;
                            </p>
                            <h2 class="text-3xl sm:text-4xl text-[#D94B26] font-normal leading-tight tracking-normal"
                                style="font-family: 'Shrikhand', 'Titan One', cursive;">
                                {{ $groomNickname }}
                            </h2>
                        </div>

                        <!-- Event Date in Cobalt Blue -->
                        <p class="font-serif text-xs sm:text-sm font-bold text-[#1D63B8] tracking-widest uppercase">
                            {{ $eventDateFormatted }}
                        </p>

                        <!-- 4 Cobalt Blue Countdown Bubbles -->
                        <div class="pt-1">
                            <div class="grid grid-cols-4 gap-2 max-w-xs mx-auto">
                                <div class="aspect-square rounded-full bg-[#1D63B8] text-white flex flex-col items-center justify-center p-1 shadow-sm border border-white">
                                    <span class="font-bold text-sm sm:text-base leading-none" data-cd-days>00</span>
                                    <span class="text-[7px] sm:text-[8px] uppercase tracking-wider font-semibold opacity-90">Days</span>
                                </div>
                                <div class="aspect-square rounded-full bg-[#1D63B8] text-white flex flex-col items-center justify-center p-1 shadow-sm border border-white">
                                    <span class="font-bold text-sm sm:text-base leading-none" data-cd-hours>00</span>
                                    <span class="text-[7px] sm:text-[8px] uppercase tracking-wider font-semibold opacity-90">Hr</span>
                                </div>
                                <div class="aspect-square rounded-full bg-[#1D63B8] text-white flex flex-col items-center justify-center p-1 shadow-sm border border-white">
                                    <span class="font-bold text-sm sm:text-base leading-none" data-cd-minutes>00</span>
                                    <span class="text-[7px] sm:text-[8px] uppercase tracking-wider font-semibold opacity-90">Min</span>
                                </div>
                                <div class="aspect-square rounded-full bg-[#1D63B8] text-white flex flex-col items-center justify-center p-1 shadow-sm border border-white">
                                    <span class="font-bold text-sm sm:text-base leading-none" data-cd-seconds>00</span>
                                    <span class="text-[7px] sm:text-[8px] uppercase tracking-wider font-semibold opacity-90">Sec</span>
                                </div>
                            </div>
                        </div>

                        <!-- Guest Card Divider & Name -->
                        <div class="w-full max-w-xs mx-auto text-center pt-2 space-y-0.5 border-t border-[#D94B26]/30">
                            <p class="text-[10px] sm:text-[11px] tracking-wider uppercase text-slate-500 font-semibold">
                                To: Yth. Bapak/Ibu/Saudara/i
                            </p>
                            <p class="font-serif text-sm sm:text-base font-bold text-[#D94B26] tracking-wide">
                                {{ $guestName }}
                            </p>
                        </div>

                        <!-- Buka Undangan CTA Button -->
                        <div class="pt-3 pb-1 text-center">
                            <button type="button" 
                                    id="btn-buka-undangan-summer"
                                    onclick="openInvitation()"
                                    class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-full bg-[#D94B26] hover:bg-[#c23d1b] text-white font-bold text-xs tracking-[0.18em] uppercase shadow-[0_4px_20px_rgba(217,75,38,0.35)] border border-orange-300/40 transform hover:scale-105 active:scale-95 transition-all cursor-pointer">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span>Buka Undangan</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @elseif($currentThemeId == 16 || $isMuseumOfLove)
        <!-- ================= THEME 16 BESPOKE COVER (PREMIUM MUSEUM OF LOVE DUAL PANE) ================= -->
        <div class="w-full h-full min-h-screen flex flex-col md:flex-row relative overflow-hidden select-none">
            
            <!-- Desktop Left Pane (Exact Mirror of #t16-desktop-sidebar for Seamless Unfold) -->
            <div class="hidden md:flex md:w-[58%] lg:w-[60%] h-full flex-col items-center justify-center p-6 lg:p-10 select-none relative shadow-2xl overflow-hidden"
                 style="background: url('{{ asset('images/themes/museum-love/wall-bg.jpg') }}') center / cover no-repeat;">
                
                <div class="absolute inset-0 bg-radial-gradient from-transparent via-black/10 to-black/35 pointer-events-none"></div>

                <!-- Left Wall Sconce Lantern -->
                <div class="absolute top-10 left-6 lg:left-10 w-16 lg:w-20 pointer-events-none z-10 anim-lantern-sway drop-shadow-[0_10px_25px_rgba(234,179,8,0.45)]">
                    <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain">
                </div>

                <!-- Right Wall Sconce Lantern -->
                <div class="absolute top-10 right-6 lg:right-10 w-16 lg:w-20 pointer-events-none z-10 anim-lantern-sway-delayed drop-shadow-[0_10px_25px_rgba(234,179,8,0.45)]">
                    <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain transform -scale-x-100">
                </div>

                <!-- Central Wall Composition (Shelf on top, Arch Frame + Scroll Banner below) -->
                <div class="relative z-20 w-full max-w-2xl flex flex-col items-center justify-center space-y-5 lg:space-y-6">
                    <!-- Neoclassical Wooden Bookshelf with Antiquities -->
                    <div class="w-full max-w-[380px] lg:max-w-[440px] drop-shadow-2xl anim-fade-up">
                        <img src="{{ asset('images/themes/museum-love/bookshelf-top.png') }}" alt="Antique Bookshelf" class="w-full h-auto object-contain">
                    </div>

                    <!-- Side-by-Side Gallery Artworks: Arched Baroque Gold Frame & Antique Scroll Banner -->
                    <div class="w-full flex items-center justify-center gap-3 lg:gap-5 px-2">
                        <!-- 1. Arched Baroque Gold Frame with Couple Portrait -->
                        <div class="relative shrink-0 w-[180px] sm:w-[200px] lg:w-[230px] aspect-[338/441] drop-shadow-[0_18px_35px_rgba(0,0,0,0.5)] anim-museum-frame">
                            <div class="absolute overflow-hidden bg-[#241A15]" style="left: 9.2%; top: 9.3%; width: 79.3%; height: 80%; border-radius: 46% 46% 4px 4px;">
                                <img src="{{ $t16HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover">
                            </div>
                            <img src="{{ asset('images/themes/museum-love/arch-frame.png') }}" alt="Arch Frame" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
                        </div>

                        <!-- 2. Antique Gold Scroll Banner with Royal Calligraphy -->
                        <div class="relative shrink-0 w-[280px] sm:w-[320px] lg:w-[380px] aspect-[674/441] drop-shadow-[0_18px_35px_rgba(0,0,0,0.5)] anim-museum-card">
                            <img src="{{ asset('images/themes/museum-love/scroll-banner.png') }}" alt="Scroll Banner" class="w-full h-full object-contain pointer-events-none">
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-10 py-6 z-10 select-none">
                                <span class="font-museum-sub text-[10px] lg:text-xs text-[#5C453C] tracking-[0.25em] uppercase font-semibold">
                                    The Wedding of
                                </span>
                                <h2 class="font-museum-title text-2xl sm:text-3xl lg:text-4xl text-[#701518] font-bold tracking-wide leading-tight my-1.5 drop-shadow-xs">
                                    {{ $groomNickname }} &amp; {{ $brideNickname }}
                                </h2>
                                <p class="font-museum-sub text-[10px] lg:text-xs text-[#5C453C] tracking-widest uppercase font-semibold">
                                    {{ $eventDateFormatted }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Pane on Desktop / Full Screen on Mobile: Greeting Card & Open Invitation -->
            <div class="relative w-full md:w-[42%] lg:w-[40%] min-h-screen flex flex-col justify-between items-center text-center p-6 sm:p-10 select-none overflow-hidden theme-museum-canvas text-[#2A1F1D] shadow-2xl">
                
                <!-- Museum Gallery Ambient Spotlight from Top -->
                <div class="absolute inset-x-0 top-0 h-96 museum-spotlight pointer-events-none z-0"></div>

                <!-- Wall Sconce Lanterns for Mobile (Hidden on Desktop) -->
                <div class="md:hidden absolute top-8 left-2 sm:left-6 w-16 sm:w-24 pointer-events-none z-10 anim-lantern-sway drop-shadow-[0_10px_25px_rgba(234,179,8,0.35)]">
                    <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain">
                </div>
                <div class="md:hidden absolute top-8 right-2 sm:right-6 w-16 sm:w-24 pointer-events-none z-10 anim-lantern-sway-delayed drop-shadow-[0_10px_25px_rgba(234,179,8,0.35)]">
                    <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain transform -scale-x-100">
                </div>

                <!-- Center Greeting & Invitation Content -->
                <div class="relative z-20 w-full max-w-sm mx-auto flex flex-col items-center pt-2 sm:pt-4 my-auto space-y-4">
                    
                    <!-- Mobile-Only Couple Portrait in Arched Frame -->
                    <div class="md:hidden relative w-[180px] sm:w-[210px] aspect-[338/441] drop-shadow-[0_14px_30px_rgba(0,0,0,0.4)] anim-museum-frame mb-1">
                        <div class="absolute overflow-hidden bg-[#241A15]" style="left: 9.2%; top: 9.3%; width: 79.3%; height: 80%; border-radius: 46% 46% 4px 4px;">
                            <img src="{{ $t16CoverPhoto }}" alt="The Couple" class="w-full h-full object-cover">
                        </div>
                        <img src="{{ asset('images/themes/museum-love/arch-frame.png') }}" alt="Museum Frame" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
                    </div>

                    <!-- Museum Title & Couple Names -->
                    <div class="pt-2 space-y-1">
                        <span class="inline-block px-3.5 py-1 rounded-sm bg-[#8B1E22]/10 border border-[#D4AF37]/50 text-[#8B1E22] font-museum-title text-[9px] sm:text-[10px] tracking-[0.35em] uppercase font-bold shadow-xs">
                            MUSEUM OF LOVE
                        </span>
                        <h1 class="font-museum-title text-3xl sm:text-4xl text-[#8B1E22] leading-tight drop-shadow-sm font-bold tracking-wider pt-1">
                            {{ $groomNickname }} <span class="text-[#D4AF37] font-normal">&amp;</span> {{ $brideNickname }}
                        </h1>
                    </div>

                    <!-- Guest Greeting Card with Museum Exhibition Pass Styling -->
                    <div class="space-y-1 pt-1 text-center">
                        <p class="font-museum-sub text-[11px] sm:text-xs text-[#6B5A55] tracking-widest uppercase">
                            Kepada Yth. Tamu Undangan:
                        </p>
                        <h2 class="font-museum-title text-base sm:text-lg font-bold text-[#2A1F1D] tracking-wide">
                            {{ $guestName }}
                        </h2>
                        <p class="text-[10px] text-[#6B5A55] tracking-wider uppercase font-museum-body">
                            Di Tempat
                        </p>
                    </div>

                    <!-- Buka Undangan Button (Royal Crimson with Gold Border & Wax Seal Styling) -->
                    <div class="pt-2 w-full max-w-[220px]">
                        <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation w-full py-3 px-6 rounded-md bg-gradient-to-r from-[#8B1E22] via-[#A82B30] to-[#701518] hover:brightness-110 text-white font-museum-title font-bold text-[11px] sm:text-xs tracking-[0.25em] uppercase shadow-[0_8px_25px_rgba(139,30,34,0.45)] border border-[#D4AF37] flex items-center justify-center gap-2.5 cursor-pointer transition transform hover:scale-105 active:scale-95 group">
                            <svg class="w-4 h-4 text-[#F3D89A] group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span>Buka Undangan</span>
                        </button>
                    </div>

                </div>

                <div class="pb-2 text-[10px] text-[#6B5A55]/70 tracking-widest uppercase font-museum-sub">
                    SimpulTemu &copy; 2026
                </div>

            </div>
        </div>
        @else
        <!-- Outer Wrapper for Arch Cover -->
        <div class="cover-card-wrapper">
            <!-- Responsive Arch Cover Container -->
            <div class="cover-card-container bg-[var(--bg-canvas)] theme-arch-frame shadow-2xl">
                
                @if($currentThemeId == 19)
                <!-- Lavender Butterflies & Wildflowers for Theme 19 Cover -->
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10">
                    <img src="/images/themes/bg/lavender-butterflies.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -top-3.5 -left-3.5 sm:-top-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10">
                    <img src="/images/themes/bg/lavender-butterflies-flip.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute inset-x-0 bottom-0 pointer-events-none z-10">
                    <img src="/images/themes/bg/lavender-meadow-bottom.svg" alt="" class="w-full h-10 object-cover opacity-85">
                </div>
                @else
                <!-- Ornamen Bunga Sudut Kanan Atas (Other Themes) -->
                <div class="absolute -top-3 -right-3 w-24 sm:w-32 h-24 sm:h-32 pointer-events-none z-10 animate-sway cover-generic-ornament">
                    <svg viewBox="0 0 100 100" class="w-full h-full fill-[var(--ornament-primary)] opacity-80">
                        <circle cx="70" cy="30" r="14" fill="var(--ornament-secondary)" opacity="0.85"/>
                        <circle cx="70" cy="30" r="7" fill="var(--ornament-primary)"/>
                        <path d="M40 25C25 35 20 50 30 65C45 55 50 40 40 25Z" fill="var(--ornament-primary)" opacity="0.45"/>
                        <circle cx="55" cy="50" r="10" fill="var(--ornament-secondary)" opacity="0.75"/>
                    </svg>
                </div>
                @endif

                <!-- Top Cover Content -->
                <div class="relative z-10 pt-6 sm:pt-8 space-y-1.5">
                    <p class="theme-heading text-[11px] sm:text-xs tracking-[0.25em] uppercase text-[var(--text-muted)] font-semibold">
                        The Wedding of
                    </p>
                    <div class="w-10 h-px bg-[var(--border-frame)] mx-auto opacity-40 my-1"></div>
                </div>

                <!-- Middle Cover: Script Couple Names & Guest Greeting -->
                <div class="relative z-10 my-auto py-3 space-y-4 sm:space-y-5 w-full px-4">
                    <div class="py-1 space-y-2">
                        <h1 class="theme-script text-3xl sm:text-5xl text-[var(--text-accent)] leading-tight tracking-wide drop-shadow-xs overflow-visible">
                            {{ $groomNickname }} <span class="text-xl sm:text-3xl font-serif text-[var(--text-secondary)]">&amp;</span> {{ $brideNickname }}
                        </h1>
                        <div class="flex items-center justify-center gap-2 max-w-[120px] mx-auto opacity-40">
                            <span class="h-px flex-1 bg-[var(--border-frame)]"></span>
                            <span class="w-1.5 h-1.5 rotate-45 bg-[var(--border-frame)]"></span>
                            <span class="h-px flex-1 bg-[var(--border-frame)]"></span>
                        </div>
                    </div>

                    <p class="text-xs sm:text-sm text-[var(--text-muted)] font-medium tracking-wider">
                        {{ $eventDateFormatted }}
                    </p>

                    <!-- Guest Greeting Card -->
                    <div class="guest-greeting-box mt-3 py-2.5 sm:py-3 px-4 sm:px-5 rounded-2xl bg-white/90 backdrop-blur-xs border border-[var(--border-frame)]/25 shadow-xs max-w-[270px] sm:max-w-[290px] mx-auto space-y-0.5">
                        <p class="text-[9px] sm:text-[10px] uppercase tracking-widest text-[var(--text-muted)] font-semibold">
                            Kepada Yth. Bapak/Ibu/Sdr/i:
                        </p>
                        <h3 class="theme-heading text-base sm:text-lg font-bold text-[var(--text-main)] truncate">
                            {{ $guestName }}
                        </h3>
                        <p class="text-[8px] sm:text-[9px] text-[var(--text-muted)] italic">
                            *Mohon maaf bila ada kesalahan penulisan gelar/nama
                        </p>
                    </div>
                </div>

                <!-- Bottom Cover: Buka Undangan CTA Button & Bottom Floral Garland -->
                <div class="relative z-10 pb-4 sm:pb-6 w-full flex flex-col items-center">
                    <button id="btn-open-invitation" type="button" onclick="unlockInvitation()" class="btn-open-invitation px-8 sm:px-10 py-3 sm:py-3.5 rounded-full bg-[var(--bg-accent-block)] text-white font-medium text-xs sm:text-sm tracking-wider uppercase shadow-lg hover:opacity-90 active:scale-95 transition-all flex items-center gap-2 cursor-pointer group">
                        <svg class="w-4 h-4 text-white group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>Buka Undangan</span>
                    </button>

                    @if($currentThemeId != 19)
                    <!-- Ornamen Rangkaian Bunga Bawah Bingkai -->
                    <div class="w-48 sm:w-64 h-8 mx-auto mt-4 opacity-75 cover-generic-ornament">
                        <svg viewBox="0 0 200 30" class="w-full h-full fill-[var(--ornament-primary)]">
                            <circle cx="100" cy="15" r="5" fill="var(--ornament-secondary)"/>
                            <circle cx="80" cy="14" r="3.5" fill="var(--ornament-primary)"/>
                            <circle cx="120" cy="14" r="3.5" fill="var(--ornament-primary)"/>
                            <path d="M60 15 Q80 8 100 15 Q120 8 140 15" stroke="var(--ornament-primary)" stroke-width="1.2" fill="none"/>
                        </svg>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>

    @if($currentThemeId == 1)
    <!-- Desktop Fixed Sidebar for Theme 1 (Basic Harmony Maroon - Matching Image 3) -->
    <aside id="t1-desktop-sidebar" class="hidden md:flex fixed top-0 left-0 md:w-[58%] lg:w-[60%] h-screen bg-[#4A050C] text-white z-20 items-center justify-center p-8 text-center select-none shadow-2xl">
        <div class="space-y-4">
            <p class="font-serif text-sm tracking-[0.25em] uppercase text-white/80 font-medium">Undangan Pernikahan</p>
            <h1 class="font-serif text-5xl lg:text-6xl text-white font-normal tracking-wide leading-tight">
                {{ $groomNickname }} & {{ $brideNickname }}
            </h1>
            <p class="font-serif text-xs tracking-widest text-[#FCD8DF]/80 pt-2">
                {{ $eventDate->translatedFormat('d F Y') }}
            </p>
        </div>
    </aside>
    @endif

    @if($currentThemeId == 13 || $isSummerVibes)
    <!-- Desktop Fixed Sidebar for Theme 13 (Premium Summer Vibes - Tropical Beach & Palm Tree) -->
    <aside id="t13-desktop-sidebar" class="hidden md:flex fixed top-0 left-0 md:w-[58%] lg:w-[60%] h-screen text-[#1E293B] z-20 flex-col items-center justify-center p-6 lg:p-12 select-none shadow-2xl overflow-hidden bg-[#EFECE6]">
        
        <!-- Decorative Framing Lines with Arrows matching Reference Image -->
        <div class="absolute inset-6 lg:inset-8 pointer-events-none z-10 border-t border-l border-[#D94B26]/60">
            <div class="absolute -top-1.5 -left-1.5 w-3 h-3 border-t-2 border-l-2 border-[#D94B26]"></div>
            <div class="absolute -top-1 -right-1 text-[#D94B26] text-xs font-serif leading-none">▶</div>
            <div class="absolute -bottom-1 -left-1 text-[#D94B26] text-xs font-serif leading-none">▼</div>
        </div>

        <!-- Top-Right Scalloped Cloud in Cobalt Blue -->
        <div class="absolute -top-2 -right-2 w-72 lg:w-96 pointer-events-none z-10 anim-summer-cloud">
            <svg viewBox="0 0 380 220" fill="none" class="w-full h-auto drop-shadow-md">
                <path d="M380,0 L160,0 C150,35 170,75 195,90 C165,100 155,140 185,165 C210,185 250,180 270,205 C290,220 330,225 380,220 Z" fill="#1D63B8" opacity="0.95"/>
                <path d="M380,0 L200,0 C190,28 210,60 225,75 C200,85 190,120 215,145 C235,160 270,155 290,180 C310,195 340,205 380,200 Z" fill="#2563EB" opacity="0.6"/>
            </svg>
        </div>

        <!-- Bottom-Left Scalloped Cloud in Terracotta/Peach -->
        <div class="absolute -bottom-2 -left-2 w-64 lg:w-80 pointer-events-none z-10 anim-summer-cloud-alt">
            <svg viewBox="0 0 340 200" fill="none" class="w-full h-auto drop-shadow-md">
                <path d="M0,200 L0,50 C35,40 65,60 80,80 C105,55 145,65 160,95 C180,115 175,150 205,165 C225,175 235,190 235,200 Z" fill="#D94B26" opacity="0.9"/>
                <path d="M0,200 L0,80 C25,75 50,90 62,105 C85,85 120,95 132,120 C150,135 145,165 170,175 C185,185 195,195 195,200 Z" fill="#E07A5F" opacity="0.7"/>
            </svg>
        </div>

        <!-- Blue Flower Branch on top of Peach Cloud -->
        <div class="absolute bottom-5 left-5 w-28 lg:w-36 pointer-events-none z-20 opacity-90 drop-shadow-sm">
            <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain transform -rotate-12">
        </div>

        <!-- Top-Left Peach Hibiscus Corner -->
        <div class="absolute top-0 left-0 w-40 lg:w-52 pointer-events-none z-20 anim-summer-flower-tl drop-shadow-md">
            <img src="{{ asset('images/themes/summer-vibes/flower-corner-2.png') }}" alt="" class="w-full h-auto object-contain">
        </div>

        <!-- Bottom-Right Peach Hibiscus Bouquet -->
        <div class="absolute bottom-0 right-0 w-44 lg:w-56 pointer-events-none z-20 anim-summer-flower-tr drop-shadow-md">
            <img src="{{ asset('images/themes/summer-vibes/flower-corner-1.png') }}" alt="" class="w-full h-auto object-contain">
        </div>

        <!-- Swaying Coconut Palm Tree Rising on Left -->
        <div class="absolute -bottom-6 left-2 lg:left-6 w-52 lg:w-68 pointer-events-none z-20 anim-summer-palm drop-shadow-xl">
            <img src="{{ asset('images/themes/summer-vibes/palm-tree.png') }}" alt="" class="w-full h-auto object-contain">
        </div>

        <!-- Floating Animated Sparkles / Beach Dust Particles -->
        <div class="absolute inset-0 pointer-events-none z-15 overflow-hidden">
            <div class="absolute top-[22%] left-[28%] w-2 h-2 rounded-full bg-[#1D63B8]/40 anim-summer-sparkle"></div>
            <div class="absolute top-[36%] right-[22%] w-1.5 h-1.5 rounded-full bg-[#D94B26]/40 anim-summer-sparkle" style="animation-delay: 1.2s;"></div>
            <div class="absolute bottom-[38%] left-[42%] w-2.5 h-2.5 rounded-full bg-[#1D63B8]/30 anim-summer-sparkle" style="animation-delay: 2.4s;"></div>
            <div class="absolute bottom-[24%] right-[32%] w-2 h-2 rounded-full bg-[#D94B26]/35 anim-summer-sparkle" style="animation-delay: 0.7s;"></div>
        </div>

        <!-- Central Invitation Typography Block -->
        <div class="relative z-30 text-center max-w-lg space-y-4 px-6 anim-fade-up">
            <span class="inline-block font-serif text-xs lg:text-sm tracking-[0.35em] uppercase text-[#1D63B8] font-bold">
                WEDDING INVITATION
            </span>

            <!-- Blue Floral Divider -->
            <div class="w-28 sm:w-36 mx-auto pointer-events-none">
                <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
            </div>

            <!-- Couple Names in Shrikhand Display Font -->
            <h1 class="text-6xl sm:text-7xl lg:text-8xl text-[#D94B26] font-normal leading-none tracking-normal py-2 drop-shadow-xs"
                style="font-family: 'Shrikhand', 'Titan One', cursive;">
                {{ $groomNickname }} &amp; {{ $brideNickname }}
            </h1>

            <!-- Event Date -->
            <p class="font-serif text-sm sm:text-base font-bold text-[#1D63B8] tracking-[0.2em] uppercase">
                {{ $eventDateFormatted }}
            </p>
        </div>

    </aside>
    @endif

    @if($currentThemeId == 16 || $isMuseumOfLove)
    <!-- Desktop Fixed Sidebar for Theme 16 (Premium Museum of Love - Neoclassical Wall & Artworks) -->
    <aside id="t16-desktop-sidebar" class="hidden md:flex fixed top-0 left-0 md:w-[58%] lg:w-[60%] h-screen text-white z-20 flex-col items-center justify-center p-6 lg:p-10 select-none shadow-2xl overflow-hidden"
           style="background: url('{{ asset('images/themes/museum-love/wall-bg.jpg') }}') center / cover no-repeat;">
        
        <!-- Ambient Wall Lighting Glow -->
        <div class="absolute inset-0 bg-radial-gradient from-transparent via-black/10 to-black/35 pointer-events-none"></div>

        <!-- Left Wall Sconce Lantern -->
        <div class="absolute top-10 left-6 lg:left-10 w-16 lg:w-20 pointer-events-none z-10 anim-lantern-sway drop-shadow-[0_10px_25px_rgba(234,179,8,0.45)]">
            <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain">
        </div>

        <!-- Right Wall Sconce Lantern -->
        <div class="absolute top-10 right-6 lg:right-10 w-16 lg:w-20 pointer-events-none z-10 anim-lantern-sway-delayed drop-shadow-[0_10px_25px_rgba(234,179,8,0.45)]">
            <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain transform -scale-x-100">
        </div>

        <!-- Central Wall Composition (Shelf on top, Arch Frame + Scroll Banner below) -->
        <div class="relative z-20 w-full max-w-2xl flex flex-col items-center justify-center space-y-5 lg:space-y-6">
            
            <!-- Neoclassical Wooden Bookshelf with Antiquities -->
            <div class="w-full max-w-[380px] lg:max-w-[440px] drop-shadow-2xl anim-fade-up">
                <img src="{{ asset('images/themes/museum-love/bookshelf-top.png') }}" alt="Antique Bookshelf" class="w-full h-auto object-contain">
            </div>

            <!-- Side-by-Side Gallery Artworks: Arched Baroque Gold Frame & Antique Scroll Banner -->
            <div class="w-full flex items-center justify-center gap-3 lg:gap-5 px-2">
                
                <!-- 1. Arched Baroque Gold Frame with Couple Portrait -->
                <div class="relative shrink-0 w-[180px] sm:w-[200px] lg:w-[230px] aspect-[338/441] drop-shadow-[0_18px_35px_rgba(0,0,0,0.5)] anim-museum-frame">
                    <!-- Photo Aperture inside Arch Frame -->
                    <div class="absolute overflow-hidden bg-[#241A15]" style="left: 9.2%; top: 9.3%; width: 79.3%; height: 80%; border-radius: 46% 46% 4px 4px;">
                        <img src="{{ $t16HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover">
                    </div>
                    <!-- Transparent Arched Baroque Gold Frame Overlay -->
                    <img src="{{ asset('images/themes/museum-love/arch-frame.png') }}" alt="Arch Frame" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10">
                </div>

                <!-- 2. Antique Gold Scroll Banner with Royal Calligraphy -->
                <div class="relative shrink-0 w-[280px] sm:w-[320px] lg:w-[380px] aspect-[674/441] drop-shadow-[0_18px_35px_rgba(0,0,0,0.5)] anim-museum-card">
                    <!-- Transparent Scroll Banner Image -->
                    <img src="{{ asset('images/themes/museum-love/scroll-banner.png') }}" alt="Scroll Banner" class="w-full h-full object-contain pointer-events-none">
                    <!-- Inscription Centered in Parchment -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-10 py-6 z-10 select-none">
                        <span class="font-museum-sub text-[10px] lg:text-xs text-[#5C453C] tracking-[0.25em] uppercase font-semibold">
                            The Wedding of
                        </span>
                        <h2 class="font-museum-title text-2xl sm:text-3xl lg:text-4xl text-[#701518] font-bold tracking-wide leading-tight my-1.5 drop-shadow-xs">
                            {{ $groomNickname }} &amp; {{ $brideNickname }}
                        </h2>
                        <p class="font-museum-sub text-[10px] lg:text-xs text-[#5C453C] tracking-widest uppercase font-semibold">
                            {{ $eventDateFormatted }}
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </aside>
    @endif

    <!-- ================= MAIN INVITATION RESPONSIVE CONTAINER (FULL WIDTH CANVAS) ================= -->
    <main id="invitation-main-content" class="w-full max-w-md md:max-w-4xl lg:max-w-5xl mx-auto relative overflow-hidden shadow-2xl min-h-screen bg-[var(--bg-canvas)] transition-all duration-500 pb-28 {{ (isset($invitation->theme) && str_contains($invitation->theme->slug, 'monochrome')) ? 'theme-monochrome-filter grayscale-0' : '' }}">

        <!-- ================= 2. HERO SECTION (RESPONSIVE DUAL PANE ON DESKTOP) ================= -->
        <section id="section-hero" class="relative {{ ($currentThemeId == 5 || $currentThemeId == 13 || $currentThemeId == 15 || $currentThemeId == 16 || $currentThemeId == 19 || $currentThemeId == 20 || $isDarkElegance || $isLavenderMist || $isMidnightAmber || $isMuseumOfLove || $isSummerVibes) ? 'pt-0 pb-10 px-0' : 'pt-6 sm:pt-10 pb-14 px-4 sm:px-6 md:px-10' }} text-center overflow-hidden">
            @if($currentThemeId == 15 || $isMidnightAmber)
            <!-- ================= THEME 15: BESPOKE HERO SECTION (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
            <div class="w-full relative overflow-hidden select-none bg-[#161514] text-white py-10 sm:py-16 px-4 sm:px-6">
                <!-- Top-Right Swaying Flower Bouquet -->
                <div class="absolute -top-6 -right-6 sm:-top-8 sm:-right-8 w-44 sm:w-56 pointer-events-none z-10 anim-amber-flower-top-right drop-shadow-2xl opacity-90">
                    <img src="{{ asset('images/themes/serenade-amber/floral-corner.png') }}" alt="" class="w-full h-auto object-contain transform -scale-x-100 rotate-45">
                </div>
                <!-- Middle-Left Swaying Flower Bouquet -->
                <div class="absolute top-[38%] -left-8 sm:-left-12 w-40 sm:w-48 pointer-events-none z-10 anim-amber-flower-mid-left drop-shadow-2xl opacity-85">
                    <img src="{{ asset('images/themes/serenade-amber/floral-corner.png') }}" alt="" class="w-full h-auto object-contain rotate-12">
                </div>

                <div class="relative z-10 max-w-lg mx-auto text-center space-y-4 pt-2">
                    <!-- Couple Photo in Gold Arch Frame with Bottom Floral Crest -->
                    <div class="relative w-48 sm:w-56 aspect-[3/4] mx-auto my-2 reveal-item anim-amber-frame">
                        <div class="w-full h-full rounded-t-[110px] rounded-b-[20px] overflow-hidden border-[2.5px] border-[#DDA74F] shadow-[0_16px_50px_rgba(0,0,0,0.85)] bg-[#1F1D1B] group">
                            <img src="{{ $t15HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        </div>
                        <!-- Floral Crest Wrapping Bottom of Arch -->
                        <div class="absolute -bottom-6 sm:-bottom-7 -left-7 -right-7 pointer-events-none z-10 drop-shadow-[0_10px_25px_rgba(0,0,0,0.8)]">
                            <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain">
                        </div>
                    </div>

                    <!-- Header Title -->
                    <div class="pt-3 space-y-1 reveal-item anim-amber-title">
                        <span class="inline-block font-amber-title text-[10px] sm:text-xs tracking-[0.35em] uppercase text-[#E8C37D] font-semibold">
                            THE WEDDING OF
                        </span>
                        <h1 class="font-amber-script text-5xl sm:text-6xl md:text-7xl text-[#F2D59B] leading-tight drop-shadow-[0_4px_16px_rgba(0,0,0,0.9)] py-1">
                            {{ $groomNickname }} <span class="text-[#DDA74F] font-light">&amp;</span> {{ $brideNickname }}
                        </h1>
                        <p class="font-amber-headline text-sm sm:text-base tracking-[0.25em] text-[#C4B5A5] font-semibold uppercase pt-1">
                            {{ $eventDateFormatted }}
                        </p>
                    </div>

                    <!-- 4 Amber Gold Countdown Timer Boxes -->
                    <div class="grid grid-cols-4 gap-2 sm:gap-3 max-w-xs sm:max-w-sm mx-auto pt-3 font-mono reveal-item anim-amber-card-3d delay-1 relative z-20">
                        <div class="p-2.5 sm:p-3 rounded-xl bg-gradient-to-br from-[#DDA74F] via-[#C59132] to-[#9A6E20] text-[#161514] shadow-[0_6px_20px_rgba(221,167,79,0.3)] border border-[#FFE7B3]/60 text-center">
                            <span id="hero-cd-days-t15" class="block text-xl sm:text-2xl font-bold leading-none cd-val-days font-sans">00</span>
                            <span class="text-[9px] uppercase font-amber-title tracking-wider text-[#2A1D07] font-bold mt-1 block">Hari</span>
                        </div>
                        <div class="p-2.5 sm:p-3 rounded-xl bg-gradient-to-br from-[#DDA74F] via-[#C59132] to-[#9A6E20] text-[#161514] shadow-[0_6px_20px_rgba(221,167,79,0.3)] border border-[#FFE7B3]/60 text-center">
                            <span id="hero-cd-hours-t15" class="block text-xl sm:text-2xl font-bold leading-none cd-val-hours font-sans">00</span>
                            <span class="text-[9px] uppercase font-amber-title tracking-wider text-[#2A1D07] font-bold mt-1 block">Jam</span>
                        </div>
                        <div class="p-2.5 sm:p-3 rounded-xl bg-gradient-to-br from-[#DDA74F] via-[#C59132] to-[#9A6E20] text-[#161514] shadow-[0_6px_20px_rgba(221,167,79,0.3)] border border-[#FFE7B3]/60 text-center">
                            <span id="hero-cd-mins-t15" class="block text-xl sm:text-2xl font-bold leading-none cd-val-mins font-sans">00</span>
                            <span class="text-[9px] uppercase font-amber-title tracking-wider text-[#2A1D07] font-bold mt-1 block">Menit</span>
                        </div>
                        <div class="p-2.5 sm:p-3 rounded-xl bg-gradient-to-br from-[#DDA74F] via-[#C59132] to-[#9A6E20] text-[#161514] shadow-[0_6px_20px_rgba(221,167,79,0.3)] border border-[#FFE7B3]/60 text-center">
                            <span id="hero-cd-secs-t15" class="block text-xl sm:text-2xl font-bold leading-none cd-val-secs font-sans">00</span>
                            <span class="text-[9px] uppercase font-amber-title tracking-wider text-[#2A1D07] font-bold mt-1 block">Detik</span>
                        </div>
                    </div>

                    <!-- "SAVE THE DATE" Button -->
                    <div class="pt-2 reveal-item anim-amber-pop delay-2 relative z-20">
                        <button type="button" onclick="saveTheDateCalendar()" class="px-8 py-3 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] hover:brightness-110 text-[#161514] font-amber-title text-xs font-bold tracking-[0.25em] uppercase transition-all duration-300 inline-flex items-center justify-center gap-2 shadow-[0_8px_25px_rgba(221,167,79,0.45)] border border-[#FFE7B3] active:scale-95 cursor-pointer group">
                            <svg class="w-4 h-4 text-[#161514] group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>SAVE THE DATE</span>
                        </button>
                    </div>
                </div>

                <!-- Golden Wavy Ribbon Divider Across Section -->
                <div class="w-full pt-8 pointer-events-none reveal-item anim-amber-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
                </div>
            </div>
            @elseif($currentThemeId == 13 || $isSummerVibes)
            <!-- ================= THEME 13: BESPOKE HERO SECTION (PREMIUM SUMMER VIBES) ================= -->
            <div class="w-full relative overflow-hidden select-none bg-[#FAF8F5] text-[#1E293B] py-8 sm:py-14 px-4 sm:px-6">
                <!-- Top-Left Scalloped Cloud / Blue Accent -->
                <div class="absolute -top-6 -left-6 w-28 sm:w-36 h-24 bg-[#1D63B8]/15 rounded-br-[60px] pointer-events-none z-0"></div>

                <!-- Top-Right Hibiscus Corner (Swaying Animation) -->
                <div class="absolute top-0 right-0 w-32 sm:w-44 pointer-events-none z-10 anim-summer-flower-tr drop-shadow-md">
                    <img src="{{ asset('images/themes/summer-vibes/flower-corner-1.png') }}" alt="" class="w-full h-auto object-contain">
                </div>

                <div class="relative z-10 max-w-lg mx-auto text-center space-y-4 pt-2">
                    <!-- Couple Photo in Postage Stamp Frame (User Uploaded or Curated Online Template) -->
                    <div class="theme-summer-stamp w-52 sm:w-60 mx-auto reveal-item anim-summer-stamp drop-shadow-[0_16px_35px_rgba(29,99,184,0.25)]">
                        <div class="theme-summer-stamp-photo">
                            <img src="{{ $t13HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover">
                        </div>
                        <img src="{{ asset('images/themes/summer-vibes/stamp-frame.png') }}" alt="" class="theme-summer-stamp-overlay">
                    </div>

                    <!-- Header Titles -->
                    <div class="pt-2 space-y-1.5 reveal-item anim-fade-up">
                        <span class="inline-block font-serif text-[11px] sm:text-xs tracking-[0.35em] uppercase text-[#1D63B8] font-bold">
                            THE WEDDING OF
                        </span>
                        
                        <div class="w-24 sm:w-28 mx-auto pointer-events-none my-1">
                            <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                        </div>

                        <h1 class="text-4xl sm:text-5xl md:text-6xl text-[#D94B26] leading-tight py-1"
                            style="font-family: 'Shrikhand', 'Titan One', cursive;">
                            {{ $groomNickname }} &amp; {{ $brideNickname }}
                        </h1>

                        <p class="font-serif text-xs sm:text-sm font-bold text-[#1D63B8] tracking-[0.18em] uppercase">
                            {{ $eventDateFormatted }}
                        </p>
                    </div>

                    <!-- 4 Cobalt Blue Countdown Bubbles -->
                    <div class="pt-3 reveal-item anim-fade-up">
                        <div class="grid grid-cols-4 gap-2 sm:gap-3 max-w-xs sm:max-w-sm mx-auto">
                            <!-- Hari -->
                            <div class="aspect-square rounded-full bg-[#1D63B8] text-white flex flex-col items-center justify-center p-1.5 shadow-[0_6px_18px_rgba(29,99,184,0.35)] anim-summer-bubble border-2 border-white">
                                <span class="font-bold text-base sm:text-lg leading-none" data-cd-days>00</span>
                                <span class="text-[8px] sm:text-[9px] uppercase tracking-wider font-semibold opacity-90 mt-0.5">Hari</span>
                            </div>
                            <!-- Jam -->
                            <div class="aspect-square rounded-full bg-[#1D63B8] text-white flex flex-col items-center justify-center p-1.5 shadow-[0_6px_18px_rgba(29,99,184,0.35)] anim-summer-bubble border-2 border-white" style="animation-delay: 0.2s;">
                                <span class="font-bold text-base sm:text-lg leading-none" data-cd-hours>00</span>
                                <span class="text-[8px] sm:text-[9px] uppercase tracking-wider font-semibold opacity-90 mt-0.5">Jam</span>
                            </div>
                            <!-- Menit -->
                            <div class="aspect-square rounded-full bg-[#1D63B8] text-white flex flex-col items-center justify-center p-1.5 shadow-[0_6px_18px_rgba(29,99,184,0.35)] anim-summer-bubble border-2 border-white" style="animation-delay: 0.4s;">
                                <span class="font-bold text-base sm:text-lg leading-none" data-cd-minutes>00</span>
                                <span class="text-[8px] sm:text-[9px] uppercase tracking-wider font-semibold opacity-90 mt-0.5">Menit</span>
                            </div>
                            <!-- Detik -->
                            <div class="aspect-square rounded-full bg-[#1D63B8] text-white flex flex-col items-center justify-center p-1.5 shadow-[0_6px_18px_rgba(29,99,184,0.35)] anim-summer-bubble border-2 border-white" style="animation-delay: 0.6s;">
                                <span class="font-bold text-base sm:text-lg leading-none" data-cd-seconds>00</span>
                                <span class="text-[8px] sm:text-[9px] uppercase tracking-wider font-semibold opacity-90 mt-0.5">Detik</span>
                            </div>
                        </div>
                    </div>

                    <!-- Save the Date CTA Button -->
                    <div class="pt-2 reveal-item anim-fade-up">
                        <button type="button" onclick="saveTheDateCalendar()"
                           class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-full bg-[#D94B26] hover:bg-[#c23d1b] text-white font-bold text-xs tracking-wider uppercase shadow-[0_4px_16px_rgba(217,75,38,0.35)] border border-orange-300/40 transform hover:scale-105 active:scale-95 transition-all cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Save The Date</span>
                        </button>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 16 || $isMuseumOfLove)
            <!-- ================= THEME 16: BESPOKE HERO SECTION (PREMIUM MUSEUM OF LOVE) ================= -->
            <div class="w-full relative overflow-hidden select-none theme-museum-canvas text-[#2A1F1D] py-10 sm:py-16 px-4 sm:px-6">
                <!-- Museum Gallery Ambient Spotlight from Top -->
                <div class="absolute inset-x-0 top-0 h-96 museum-spotlight pointer-events-none z-0"></div>

                <!-- Wall Sconce Lantern on Left & Right Walls (Hidden on smartphone to prevent collision with portrait frame, visible on fullscreen/desktop) -->
                <div class="hidden md:block absolute top-8 left-2 sm:left-6 w-20 sm:w-28 pointer-events-none z-10 anim-lantern-sway drop-shadow-[0_10px_25px_rgba(234,179,8,0.35)]">
                    <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain">
                </div>
                <div class="hidden md:block absolute top-8 right-2 sm:right-6 w-20 sm:w-28 pointer-events-none z-10 anim-lantern-sway-delayed drop-shadow-[0_10px_25px_rgba(234,179,8,0.35)]">
                    <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain transform -scale-x-100">
                </div>

                <div class="relative z-10 max-w-lg mx-auto text-center space-y-4 pt-2">
                    <!-- Couple Portrait in Baroque Gold Frame -->
                    <div class="museum-frame-container anim-museum-frame">
                        <!-- Photo Aperture with smooth rounded corners -->
                        <div class="museum-frame-photo overflow-hidden bg-[#241A15] shadow-inner">
                            <img src="{{ $t16HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover">
                        </div>
                        <!-- Transparent Baroque Gold Frame Overlay -->
                        <img src="{{ asset('images/themes/museum-love/photo-frame.png') }}" alt="Museum Frame" class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-2xl">
                    </div>

                    <!-- Header Title -->
                    <div class="pt-3 space-y-1 reveal-item anim-fade-up">
                        <span class="inline-block px-3 py-1 rounded-sm bg-[#8B1E22]/10 border border-[#D4AF37]/50 text-[#8B1E22] font-museum-title text-[9px] sm:text-[10px] tracking-[0.35em] uppercase font-bold shadow-xs">
                            THE WEDDING OF
                        </span>
                        <h1 class="font-museum-title text-4xl sm:text-5xl md:text-6xl text-[#8B1E22] leading-tight drop-shadow-sm font-bold tracking-wider pt-1">
                            {{ $groomNickname }} <span class="text-[#D4AF37] font-normal">&amp;</span> {{ $brideNickname }}
                        </h1>
                        <p class="font-museum-sub text-xs sm:text-sm tracking-[0.25em] text-[#6B5A55] font-semibold uppercase pt-1">
                            {{ $eventDateFormatted }}
                        </p>
                    </div>

                    <!-- 4 Crimson Countdown Circular Medallions -->
                    <div class="grid grid-cols-4 gap-2 sm:gap-3 max-w-xs sm:max-w-sm mx-auto pt-3 font-mono reveal-item anim-museum-card delay-1 relative z-20">
                        <div class="p-2 sm:p-2.5 rounded-full aspect-square flex flex-col items-center justify-center bg-gradient-to-br from-[#8B1E22] via-[#A82B30] to-[#5C1417] text-white shadow-[0_6px_20px_rgba(139,30,34,0.35)] border border-[#D4AF37]/70 text-center">
                            <span id="hero-cd-days-t16" class="block text-lg sm:text-xl font-bold leading-none cd-val-days font-sans text-[#FAF5EC]">00</span>
                            <span class="text-[8px] sm:text-[9px] uppercase font-museum-title tracking-wider text-[#F3D89A] font-semibold mt-0.5 block">Hari</span>
                        </div>
                        <div class="p-2 sm:p-2.5 rounded-full aspect-square flex flex-col items-center justify-center bg-gradient-to-br from-[#8B1E22] via-[#A82B30] to-[#5C1417] text-white shadow-[0_6px_20px_rgba(139,30,34,0.35)] border border-[#D4AF37]/70 text-center">
                            <span id="hero-cd-hours-t16" class="block text-lg sm:text-xl font-bold leading-none cd-val-hours font-sans text-[#FAF5EC]">00</span>
                            <span class="text-[8px] sm:text-[9px] uppercase font-museum-title tracking-wider text-[#F3D89A] font-semibold mt-0.5 block">Jam</span>
                        </div>
                        <div class="p-2 sm:p-2.5 rounded-full aspect-square flex flex-col items-center justify-center bg-gradient-to-br from-[#8B1E22] via-[#A82B30] to-[#5C1417] text-white shadow-[0_6px_20px_rgba(139,30,34,0.35)] border border-[#D4AF37]/70 text-center">
                            <span id="hero-cd-mins-t16" class="block text-lg sm:text-xl font-bold leading-none cd-val-mins font-sans text-[#FAF5EC]">00</span>
                            <span class="text-[8px] sm:text-[9px] uppercase font-museum-title tracking-wider text-[#F3D89A] font-semibold mt-0.5 block">Menit</span>
                        </div>
                        <div class="p-2 sm:p-2.5 rounded-full aspect-square flex flex-col items-center justify-center bg-gradient-to-br from-[#8B1E22] via-[#A82B30] to-[#5C1417] text-white shadow-[0_6px_20px_rgba(139,30,34,0.35)] border border-[#D4AF37]/70 text-center">
                            <span id="hero-cd-secs-t16" class="block text-lg sm:text-xl font-bold leading-none cd-val-secs font-sans text-[#FAF5EC]">00</span>
                            <span class="text-[8px] sm:text-[9px] uppercase font-museum-title tracking-wider text-[#F3D89A] font-semibold mt-0.5 block">Detik</span>
                        </div>
                    </div>

                    <!-- Curved Red Velvet Museum Stanchion Rope -->
                    <div class="w-full max-w-xs sm:max-w-sm mx-auto pt-2 pointer-events-none reveal-item anim-fade-up">
                        <svg class="w-full h-10" viewBox="0 0 360 45" fill="none">
                            <rect x="14" y="6" width="6" height="36" rx="2" fill="url(#brassGrad16)"/>
                            <circle cx="17" cy="6" r="6" fill="url(#brassGrad16)"/>
                            <circle cx="17" cy="6" r="2.5" fill="#FFEAA7"/>
                            <rect x="340" y="6" width="6" height="36" rx="2" fill="url(#brassGrad16)"/>
                            <circle cx="343" cy="6" r="6" fill="url(#brassGrad16)"/>
                            <circle cx="343" cy="6" r="2.5" fill="#FFEAA7"/>
                            <path d="M17,12 Q180,42 343,12" stroke="#5C1417" stroke-width="6" stroke-linecap="round"/>
                            <path d="M17,11 Q180,41 343,11" stroke="#8B1E22" stroke-width="4.5" stroke-linecap="round"/>
                            <path d="M17,9.5 Q180,39.5 343,9.5" stroke="#C83B40" stroke-width="1.5" stroke-linecap="round" opacity="0.8"/>
                            <circle cx="17" cy="12" r="4" fill="url(#brassGrad16)"/>
                            <circle cx="343" cy="12" r="4" fill="url(#brassGrad16)"/>
                            <defs>
                                <linearGradient id="brassGrad16" x1="0" y1="0" x2="1" y2="1">
                                    <stop offset="0%" stop-color="#F5D061"/>
                                    <stop offset="50%" stop-color="#C59B27"/>
                                    <stop offset="100%" stop-color="#735214"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>

                    <!-- "SAVE THE DATE" Button -->
                    <div class="pt-2 reveal-item anim-fade-up delay-2 relative z-20">
                        <button type="button" onclick="saveTheDateCalendar()" class="px-8 py-3 rounded-md bg-gradient-to-r from-[#8B1E22] via-[#A82B30] to-[#701518] hover:brightness-110 text-white font-museum-title text-xs font-bold tracking-[0.25em] uppercase transition-all duration-300 inline-flex items-center justify-center gap-2 shadow-[0_8px_25px_rgba(139,30,34,0.4)] border border-[#D4AF37] active:scale-95 cursor-pointer group">
                            <svg class="w-4 h-4 text-[#F3D89A] group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>SAVE THE DATE</span>
                        </button>
                    </div>
                </div>

                <!-- Vintage Bookshelf, Telescope & Hourglass Divider Across Section -->
                <div class="w-full max-w-lg mx-auto pt-8 pointer-events-none reveal-item anim-fade-up delay-3">
                    <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @elseif($currentThemeId == 19 || $isLavenderMist)
            <!-- ================= THEME 19: BESPOKE HERO SECTION (PREMIUM SERENADE LAVENDER MIST) ================= -->
            <div class="w-full relative overflow-hidden select-none bg-white theme-lavender-pattern text-[#2D1E40] py-8 sm:py-14 px-4 sm:px-6">
                <!-- Top Centered Symmetrical Floral Crown (Zero tilt, perfectly horizontal) -->
                <div class="w-56 sm:w-72 mx-auto pt-1 pointer-events-none reveal-item anim-lavender-flower-unfold">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <div class="relative z-10 max-w-lg mx-auto text-center space-y-4 pt-3">
                    <!-- Circular Photo Surrounded by Flower Cluster Wreath -->
                    <div class="relative w-48 sm:w-56 aspect-square mx-auto my-2 flex items-center justify-center reveal-item anim-lavender-frame">
                        <!-- Wreath Garland Around Circle -->
                        <div class="absolute inset-0 w-full h-full pointer-events-none z-0 transform scale-110 anim-flower-float">
                            <img src="{{ asset('images/themes/serenade-lavender/flower-cluster.png') }}" alt="" class="w-full h-full object-contain">
                        </div>
                        <!-- Inner Circular Couple Photo -->
                        <div class="w-28 sm:w-34 aspect-square rounded-full overflow-hidden p-1 bg-white shadow-2xl relative z-10 anim-lavender-halo group">
                            <img src="{{ $t19HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover rounded-full group-hover:scale-105 transition-transform duration-700">
                        </div>
                    </div>

                    <!-- Top Title: The Wedding of -->
                    <span class="inline-block font-lavender-title text-[11px] sm:text-xs tracking-[0.35em] uppercase text-[#8B7CB0] font-semibold reveal-item anim-lavender-title">
                        THE WEDDING OF
                    </span>

                    <!-- Couple Names in Script Font -->
                    <h1 class="font-lavender-script text-5xl sm:text-6xl md:text-7xl text-[#2D1E40] font-normal tracking-wide drop-shadow-xs leading-tight reveal-item anim-script">
                        {{ $groomNickname }} <span class="text-[#8B7CB0] font-light">&amp;</span> {{ $brideNickname }}
                    </h1>

                    <!-- Event Date -->
                    <p class="font-lavender-headline text-sm sm:text-base tracking-[0.25em] text-[#6E5D87] font-semibold uppercase pt-1 reveal-item anim-fade-up delay-1">
                        {{ $eventDateFormatted }}
                    </p>

                    <!-- 4 Solid Lavender Countdown Timer Boxes -->
                    <div class="grid grid-cols-4 gap-2 sm:gap-3 max-w-xs sm:max-w-sm mx-auto pt-2 font-mono reveal-item anim-lavender-card-3d delay-2">
                        <div class="p-2.5 sm:p-3 rounded-2xl bg-gradient-to-br from-[#8B7CB0] to-[#79679C] text-white shadow-lg border border-purple-200/50 text-center">
                            <span id="hero-cd-days" class="block text-xl sm:text-2xl font-bold leading-none cd-val-days">00</span>
                            <span class="text-[9px] uppercase font-lavender-title tracking-wider text-purple-100 mt-1 block">Hari</span>
                        </div>
                        <div class="p-2.5 sm:p-3 rounded-2xl bg-gradient-to-br from-[#8B7CB0] to-[#79679C] text-white shadow-lg border border-purple-200/50 text-center">
                            <span id="hero-cd-hours" class="block text-xl sm:text-2xl font-bold leading-none cd-val-hours">00</span>
                            <span class="text-[9px] uppercase font-lavender-title tracking-wider text-purple-100 mt-1 block">Jam</span>
                        </div>
                        <div class="p-2.5 sm:p-3 rounded-2xl bg-gradient-to-br from-[#8B7CB0] to-[#79679C] text-white shadow-lg border border-purple-200/50 text-center">
                            <span id="hero-cd-mins" class="block text-xl sm:text-2xl font-bold leading-none cd-val-mins">00</span>
                            <span class="text-[9px] uppercase font-lavender-title tracking-wider text-purple-100 mt-1 block">Menit</span>
                        </div>
                        <div class="p-2.5 sm:p-3 rounded-2xl bg-gradient-to-br from-[#8B7CB0] to-[#79679C] text-white shadow-lg border border-purple-200/50 text-center">
                            <span id="hero-cd-secs" class="block text-xl sm:text-2xl font-bold leading-none cd-val-secs">00</span>
                            <span class="text-[9px] uppercase font-lavender-title tracking-wider text-purple-100 mt-1 block">Detik</span>
                        </div>
                    </div>

                    <!-- "SAVE THE DATE" Button -->
                    <div class="pt-2 reveal-item anim-lavender-pop delay-3">
                        <button type="button" onclick="saveTheDateCalendar()" class="px-8 py-3 rounded-full bg-gradient-to-r from-[#8B7CB0] via-[#9F90C2] to-[#8B7CB0] hover:from-[#7E6FA3] hover:to-[#7E6FA3] text-white font-lavender-title text-xs font-bold tracking-[0.25em] uppercase transition-all duration-300 inline-flex items-center justify-center gap-2 shadow-[0_8px_25px_rgba(139,124,176,0.5)] active:scale-95 cursor-pointer group">
                            <svg class="w-4 h-4 text-purple-100 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>SAVE THE DATE</span>
                        </button>
                    </div>

                    <!-- Symmetrical Horizontal Floral Garland at Bottom of Hero (Zero tilt, perfectly horizontal) -->
                    <div class="w-56 sm:w-72 mx-auto pt-6 pb-1 reveal-item anim-lavender-flower-unfold delay-3">
                        <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 2)
            <!-- THEME 2: BESPOKE HERO SECTION (BASIC HARMONY EMERALD) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto space-y-4 reveal-item anim-fade-up">
                <!-- Top White Canvas Header: Royal Crown Crest + Couple Names -->
                <div class="text-center space-y-1.5 py-2">
                    <div class="w-24 sm:w-28 h-8 sm:h-9 mx-auto">
                        <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                    </div>
                    <p class="font-heading text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-stone-700 font-semibold">
                        {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                    </p>
                </div>

                <!-- Main Asymmetric Emerald Hero Card with Double Gold Frame -->
                <div class="w-full rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45">
                    <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl overflow-hidden flex flex-col justify-between">
                        <!-- Header: THE WEDDING OF -->
                        <div class="pt-5 pb-3 text-center">
                            <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-white/90 font-heading">
                                THE WEDDING OF
                            </span>
                        </div>

                        <!-- Couple Framed Photo -->
                        <div class="px-4 sm:px-6">
                            <div class="w-full aspect-[4/3] sm:aspect-[16/11] rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-lg relative group">
                                <img src="{{ $bgPhoto }}" alt="Foto Mempelai" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            </div>
                        </div>

                        <!-- Romantic Quote -->
                        <div class="px-5 sm:px-8 py-4 sm:py-5 text-center">
                            <p class="text-xs sm:text-sm font-light italic text-white/95 leading-relaxed">
                                "Thinking of you keeps me awake. Dreaming of you keeps me asleep. Being with you keeps me alive."
                            </p>
                        </div>

                        <!-- Emerald Date Bar with Gold Divider -->
                        <div class="bg-[#134A37] border-t border-[#D4AF37]/35 py-3 px-4 text-center">
                            <p class="text-xs sm:text-sm font-bold tracking-[0.25em] uppercase text-white/95 font-heading">
                                {{ strtoupper($eventDate->translatedFormat('F . d . Y')) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 3)
            <!-- THEME 3: BESPOKE HERO SECTION (BASIC HARMONY NAVY - MATCHING IMAGE 2 SECTION 1) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-4 reveal-item anim-fade-up">
                <!-- Tall Couple Portrait with Bottom Navy Gradient Overlay -->
                <div class="w-full rounded-2xl overflow-hidden shadow-2xl relative aspect-[3/4] sm:aspect-[4/5] bg-slate-900 border border-slate-200">
                    <img src="{{ $bgPhoto }}" alt="Foto Mempelai" class="w-full h-full object-cover">
                    
                    <!-- Bottom Deep Navy Gradient with Serif Typography -->
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#0E1A29]/95 via-[#1E3A5F]/80 to-transparent pt-20 pb-8 px-6 text-center text-white space-y-2">
                        <p class="font-heading text-xs sm:text-sm tracking-[0.3em] uppercase text-white/80 font-medium reveal-item anim-fade-up delay-1">
                            THE WEDDING OF
                        </p>
                        <h1 class="font-heading text-3xl sm:text-5xl font-bold tracking-wide text-white drop-shadow-md reveal-item anim-fade-up delay-2">
                            {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                        </h1>
                        <p class="text-xs sm:text-sm font-light tracking-widest text-slate-200 uppercase pt-1 reveal-item anim-fade-up delay-3">
                            {{ $eventDateFormatted }}
                        </p>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 1)
            <!-- ================= THEME 1: BESPOKE HERO SECTION (BASIC HARMONY MAROON - MATCHING REFERENCE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto space-y-3.5 reveal-item anim-fade-up">
                <!-- Top Canvas Header: The Wedding of, Couple Names, Date -->
                <div class="flex items-center justify-between text-left px-1 sm:px-2 pt-1 pb-1">
                    <div>
                        <p class="font-heading text-[10px] sm:text-xs tracking-[0.25em] uppercase text-[#620000] font-semibold">
                            THE WEDDING OF
                        </p>
                        <h1 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-[#620000] leading-tight">
                            {{ $groomNickname }} & {{ $brideNickname }}
                        </h1>
                    </div>
                    <div class="text-right">
                        <span class="inline-block px-3 py-1 rounded-full text-[10px] sm:text-xs font-semibold tracking-wider text-[#620000] bg-[#FFEAEA] border border-[#F0B2B8]">
                            {{ $eventDateFormatted }}
                        </span>
                    </div>
                </div>

                <!-- Tall Couple Portrait with Downward Frosted Gradient Blur Overlay -->
                <div class="w-full rounded-2xl overflow-hidden shadow-2xl relative aspect-[3/4] sm:aspect-[4/5] bg-stone-900 border border-[#F0B2B8] group">
                    @php
                        $t1HeroPhoto = !empty($invitation->background_photo_url) 
                            ? $invitation->background_photo_url 
                            : asset('images/themes/bg/basic-harmony-maroon-cover-portrait.jpg');
                    @endphp
                    <img src="{{ $t1HeroPhoto }}" alt="Foto Mempelai" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">

                    <!-- Downward Frosted Blur Gradient Overlay ("gradasi ngeblur kebawah") -->
                    <div class="absolute inset-x-0 bottom-0 pt-24 pb-5 px-4 sm:px-6 bg-gradient-to-t from-[#FFDADA] via-[#FFDADA]/90 to-transparent backdrop-blur-[3px] flex flex-col items-center justify-end text-center">
                        <!-- Countdown Title with Horizontal Line -->
                        <div class="w-full flex items-center justify-center gap-3 mb-2.5">
                            <span class="h-0.5 w-10 sm:w-16 bg-[#620000]/40"></span>
                            <h3 class="font-heading text-base sm:text-lg font-bold tracking-[0.2em] uppercase text-[#620000]">
                                Countdown
                            </h3>
                            <span class="h-0.5 w-10 sm:w-16 bg-[#620000]/40"></span>
                        </div>

                        <!-- 4 Maroon Badges for Countdown -->
                        <div class="grid grid-cols-4 gap-2 sm:gap-2.5 w-full max-w-xs sm:max-w-sm mx-auto font-mono">
                            <div class="p-2 sm:p-2.5 rounded-xl bg-[#580B14] text-white shadow-md text-center border border-[#7A1C28]/50">
                                <span id="hero-cd-days" class="block text-xl sm:text-2xl font-bold leading-none text-white">00</span>
                                <span class="text-[9px] uppercase font-sans tracking-wider text-rose-200 mt-1 block font-medium">Hari</span>
                            </div>
                            <div class="p-2 sm:p-2.5 rounded-xl bg-[#580B14] text-white shadow-md text-center border border-[#7A1C28]/50">
                                <span id="hero-cd-hours" class="block text-xl sm:text-2xl font-bold leading-none text-white">00</span>
                                <span class="text-[9px] uppercase font-sans tracking-wider text-rose-200 mt-1 block font-medium">Jam</span>
                            </div>
                            <div class="p-2 sm:p-2.5 rounded-xl bg-[#580B14] text-white shadow-md text-center border border-[#7A1C28]/50">
                                <span id="hero-cd-mins" class="block text-xl sm:text-2xl font-bold leading-none text-white">00</span>
                                <span class="text-[9px] uppercase font-sans tracking-wider text-rose-200 mt-1 block font-medium">Menit</span>
                            </div>
                            <div class="p-2 sm:p-2.5 rounded-xl bg-[#580B14] text-white shadow-md text-center border border-[#7A1C28]/50">
                                <span id="hero-cd-secs" class="block text-xl sm:text-2xl font-bold leading-none text-white">00</span>
                                <span class="text-[9px] uppercase font-sans tracking-wider text-rose-200 mt-1 block font-medium">Detik</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 5)
            <!-- ================= THEME 5: BESPOKE FULL-BLEED HERO & ROLLING PHOTOS (BASIC HARMONY MONOCHROME - MATCHING IMAGE 3) ================= -->
            <div class="w-full relative overflow-hidden select-none">
                <!-- 1. Full-Bleed Top Hero Photo (No white card / edge-to-edge exactly matching Image 3) -->
                <div class="relative w-full min-h-[85vh] sm:min-h-[92vh] flex flex-col justify-between items-center text-center text-white p-6 sm:p-10 overflow-hidden"
                     style="background-image: linear-gradient(180deg, rgba(15,15,15,0.7) 0%, rgba(20,20,20,0.2) 40%, rgba(15,15,15,0.85) 100%), url('{{ $t5HeroPhoto }}'); background-size: cover; background-position: center;">
                    
                    <!-- Top Overlay Info: The Wedding of, Couple Script Names, Date -->
                    <div class="pt-8 sm:pt-14 space-y-2 max-w-md mx-auto z-10">
                        <span class="inline-block font-serif text-xs sm:text-sm tracking-[0.25em] uppercase text-stone-200 font-light drop-shadow-sm reveal-item anim-tracking delay-1">
                            The Wedding of
                        </span>
                        <h2 class="theme-script text-4xl sm:text-5xl md:text-6xl text-white font-normal leading-tight drop-shadow-md reveal-item anim-script delay-2">
                            {{ $groomNickname }} &amp; {{ $brideNickname }}
                        </h2>
                        <p class="font-serif text-xs sm:text-sm tracking-widest text-stone-200 font-light pt-0.5 drop-shadow-sm reveal-item anim-fade-up delay-3">
                            {{ $eventDate->translatedFormat('l, d F Y') }}
                        </p>
                    </div>

                    <!-- Bottom Overlay Monogram Initials (Otomatis ngikut nama pasangan: D | M) -->
                    <div class="pb-10 sm:pb-14 z-10 select-none">
                        <div class="flex items-center justify-center gap-3 sm:gap-4 font-serif text-5xl sm:text-6xl md:text-7xl font-light text-white tracking-wider drop-shadow-xl">
                            <span id="mockup-hero-initial-groom" class="inline-block reveal-item anim-monogram-left delay-3">{{ mb_strtoupper(mb_substr(trim($groomNickname ?: 'D'), 0, 1)) }}</span>
                            <span class="w-[1.5px] h-12 sm:h-16 bg-white/70 inline-block reveal-item anim-bar-grow delay-4"></span>
                            <span id="mockup-hero-initial-bride" class="inline-block reveal-item anim-monogram-right delay-3">{{ mb_strtoupper(mb_substr(trim($brideNickname ?: 'M'), 0, 1)) }}</span>
                        </div>
                    </div>
                </div>

                <!-- 2. 5 Rolling Photos Strip (Carousel / Marquee moving Right to Left flush below Hero) -->
                <div class="w-full overflow-hidden py-3 bg-stone-900/10 relative select-none reveal-item anim-cinematic delay-4">
                    <div class="animate-rolling-strip gap-2.5 sm:gap-3.5">
                        @foreach(array_merge($t5RollingPhotos, $t5RollingPhotos) as $idx => $slideImg)
                        <div class="w-28 sm:w-36 md:w-40 aspect-square shrink-0 rounded-xl overflow-hidden border border-stone-800/20 shadow-xs bg-stone-100 group cursor-pointer" onclick="openLightbox('{{ $slideImg }}')">
                            <img src="{{ $slideImg }}" alt="Slide {{ ($idx % 5) + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- 3. Heading BRIDE & GROOM with Greeting -->
                <div class="pt-8 pb-4 px-4 text-center space-y-3.5 max-w-lg mx-auto">
                    <div class="relative select-none reveal-item anim-luxury-up">
                        <h2 class="font-serif text-3xl sm:text-4xl md:text-5xl font-bold tracking-[0.2em] text-[#2C2D2F] uppercase">
                            BRIDE &amp; GROOM
                        </h2>
                        <span class="block font-serif text-2xl sm:text-3xl md:text-4xl font-bold tracking-[0.2em] text-stone-300/40 uppercase -mt-4 sm:-mt-5 select-none" aria-hidden="true">
                            BRIDE &amp; GROOM
                        </span>
                    </div>

                    <div class="space-y-1.5 pt-1 reveal-item anim-fade-up delay-1">
                        <h3 class="font-serif text-xs sm:text-sm font-semibold tracking-wider text-[#2C2D2F] uppercase">
                            Assalamu’alaikum Warahmatullahi Wabarakatuh
                        </h3>
                        <p class="font-serif text-xs sm:text-sm text-stone-600 font-light leading-relaxed max-w-md mx-auto">
                            Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta’ala, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami:
                        </p>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 20 || $isDarkElegance)
            <!-- ================= THEME 20: BESPOKE SPOTLIGHT HERO & COUNTDOWN (PREMIUM SERENADE DARK ELEGANCE) ================= -->
            <div class="w-full relative overflow-hidden select-none bg-[#070807] text-[#FAF7F2] py-8 sm:py-14 px-4 sm:px-6">
                <!-- Subtle Radial Glow Behind Hero -->
                <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at center, rgba(158, 176, 146, 0.14) 0%, rgba(7, 8, 7, 0.95) 75%, #070807 100%);"></div>

                <div class="relative z-10 max-w-lg mx-auto text-center space-y-4">
                    <!-- Top Title: The Wedding of -->
                    <span class="inline-block font-serif text-[11px] sm:text-xs tracking-[0.35em] uppercase text-[#9EB092] font-semibold reveal-item anim-fade-up">
                        THE WEDDING OF
                    </span>

                    <!-- Large Circular Photo with Ambient Pulsing Glow & Overlaid Script Names -->
                    <div class="w-64 sm:w-72 md:w-80 aspect-square mx-auto rounded-full p-1.5 border-2 border-[#9EB092] anim-serenade-halo overflow-hidden shadow-2xl relative my-6 group reveal-item anim-pop-in delay-1">
                        <img src="{{ $t20HeroPhoto }}" alt="{{ $groomNickname }} &amp; {{ $brideNickname }}" class="w-full h-full object-cover rounded-full group-hover:scale-105 transition-transform duration-1000">
                        <!-- Overlaid Script Names in Circle Center -->
                        <div class="absolute inset-0 rounded-full bg-gradient-to-t from-black/60 via-black/20 to-black/40 flex items-center justify-center p-4">
                            <h1 class="theme-script text-4xl sm:text-5xl md:text-6xl text-[#FAF7F2] font-normal tracking-wide drop-shadow-xl text-center leading-tight reveal-item anim-script">
                                {{ $brideNickname }} <span class="text-[#9EB092] block sm:inline font-light">&amp;</span> {{ $groomNickname }}
                            </h1>
                        </div>
                    </div>

                    <!-- Event Date: SABTU, 09 JANUARI 2027 -->
                    <p class="font-serif text-xs sm:text-sm tracking-[0.25em] text-[#D5DDD0] font-light uppercase pt-1 reveal-item anim-fade-up delay-2">
                        {{ $eventDateFormatted }}
                    </p>

                    <!-- 4 Countdown Timer Pills (Rounded-2xl, Border #9EB092) -->
                    <div class="grid grid-cols-4 gap-2 sm:gap-3.5 max-w-xs sm:max-w-sm mx-auto pt-4 reveal-item anim-card-rise delay-2">
                        <div class="p-3 sm:p-4 rounded-2xl bg-[#131713] border border-[#9EB092]/60 shadow-lg text-center">
                            <span id="hero-cd-days-t20" class="block text-2xl sm:text-3xl font-bold font-mono text-[#FAF7F2] leading-none cd-val-days">00</span>
                            <span class="text-[9px] sm:text-[10px] uppercase font-serif tracking-wider text-[#9EB092] mt-1.5 block font-semibold">Hari</span>
                        </div>
                        <div class="p-3 sm:p-4 rounded-2xl bg-[#131713] border border-[#9EB092]/60 shadow-lg text-center">
                            <span id="hero-cd-hours-t20" class="block text-2xl sm:text-3xl font-bold font-mono text-[#FAF7F2] leading-none cd-val-hours">00</span>
                            <span class="text-[9px] sm:text-[10px] uppercase font-serif tracking-wider text-[#9EB092] mt-1.5 block font-semibold">Jam</span>
                        </div>
                        <div class="p-3 sm:p-4 rounded-2xl bg-[#131713] border border-[#9EB092]/60 shadow-lg text-center">
                            <span id="hero-cd-mins-t20" class="block text-2xl sm:text-3xl font-bold font-mono text-[#FAF7F2] leading-none cd-val-mins">00</span>
                            <span class="text-[9px] sm:text-[10px] uppercase font-serif tracking-wider text-[#9EB092] mt-1.5 block font-semibold">Menit</span>
                        </div>
                        <div class="p-3 sm:p-4 rounded-2xl bg-[#131713] border border-[#9EB092]/60 shadow-lg text-center">
                            <span id="hero-cd-secs-t20" class="block text-2xl sm:text-3xl font-bold font-mono text-[#FAF7F2] leading-none cd-val-secs">00</span>
                            <span class="text-[9px] sm:text-[10px] uppercase font-serif tracking-wider text-[#9EB092] mt-1.5 block font-semibold">Detik</span>
                        </div>
                    </div>

                    <!-- "SIMPAN TANGGAL" Button -->
                    <div class="pt-5 reveal-item anim-pop-in delay-3">
                        <button type="button" onclick="saveTheDateCalendar()" class="px-7 py-2.5 rounded-full border border-[#9EB092] bg-[#131713]/80 hover:bg-[#9EB092] hover:text-[#070807] text-[#FAF7F2] text-xs font-semibold tracking-widest uppercase transition-all duration-300 inline-flex items-center justify-center gap-2 shadow-lg active:scale-95 cursor-pointer group">
                            <svg class="w-4 h-4 text-[#9EB092] group-hover:text-[#070807] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>SIMPAN TANGGAL</span>
                        </button>
                    </div>

                    <!-- Symmetrical Horizontal Flower Divider -->
                    <div class="w-48 sm:w-64 mx-auto pt-6 pb-2 reveal-item anim-floral-bloom delay-3">
                        <img src="{{ asset('images/themes/serenade-dark/floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                </div>
            </div>
            @else
            <div class="theme-arch-frame bg-white p-5 sm:p-8 md:p-12 shadow-lg w-full mx-auto relative reveal-item anim-border">
                
                @if($currentThemeId == 1)
                <!-- Bespoke Botanical Floral Ornaments for Theme 1 (Top-Right & Bottom-Left with Scroll Bloom) -->
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/maroon-delicate-top.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -bottom-3.5 -left-3.5 sm:-bottom-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-bl delay-2">
                    <img src="/images/themes/bg/maroon-delicate-bottom.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @else
                <!-- Ornamen Bunga Sudut Kanan Atas (Other Themes) -->
                <div class="absolute -top-4 -right-4 w-20 sm:w-28 h-20 sm:h-28 pointer-events-none z-10 animate-sway">
                    <svg viewBox="0 0 100 100" class="w-full h-full fill-[var(--ornament-primary)] opacity-80">
                        <circle cx="65" cy="35" r="16" fill="var(--ornament-secondary)"/>
                        <circle cx="65" cy="35" r="8" fill="var(--ornament-primary)"/>
                        <path d="M40 30C25 40 20 55 35 70C50 55 55 40 40 30Z" fill="var(--ornament-primary)" opacity="0.5"/>
                    </svg>
                </div>
                @endif

                <!-- Desktop Responsive Grid (Side by Side on Wide Screens) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 items-center">
                    <!-- Foto Pasangan di Dalam Bingkai Lengkung / Adaptive Shape -->
                    <div class="w-full max-w-xs md:max-w-sm mx-auto aspect-[4/5] rounded-t-[9999px] rounded-b-2xl overflow-hidden shadow-inner relative theme-hero-photo-shape">
                        <img src="{{ $galleryPhotos[0] }}" alt="Foto Mempelai" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-transparent"></div>
                    </div>

                    <!-- Detail Headline & Tanggal -->
                    <div class="space-y-3 md:text-left md:pl-4">
                        <p class="theme-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-[var(--text-muted)] font-semibold reveal-item anim-title delay-1">
                            The Wedding of
                        </p>

                        <h2 class="theme-script text-4xl sm:text-5xl md:text-6xl text-[var(--text-accent)] leading-normal tracking-wide py-2 overflow-visible reveal-item anim-script delay-2">
                            {{ $groomNickname }} &amp; {{ $brideNickname }}
                        </h2>

                        <div class="flex items-center md:justify-start justify-center gap-3 text-xs sm:text-sm text-[var(--text-muted)] font-medium reveal-item anim-fade-up delay-3">
                            <span class="w-6 h-px bg-[var(--border-frame)]/50"></span>
                            <span>{{ $eventDateFormatted }}</span>
                            <span class="w-6 h-px bg-[var(--border-frame)]/50"></span>
                        </div>

                        <p class="text-xs sm:text-sm text-[var(--text-muted)] font-light leading-relaxed pt-2 hidden md:block">
                            Merupakan suatu kebahagiaan dan kehormatan yang mendalam bagi kami sekeluarga atas kehadiran dan doa restu Anda di hari suci pernikahan kami.
                        </p>
                    </div>
                </div>
            </div>
            @endif
        </section>


        <!-- ================= 3. SECTION KUTIPAN AYAT (FULL-WIDTH SOLID BLOCK) ================= -->
        @if($currentThemeId != 5 && ($invitation->show_quote ?? true) && (!empty($invitation->quran_text) || $currentThemeId == 2 || $currentThemeId == 3 || $currentThemeId == 1))
        @if($currentThemeId == 2)
        <!-- THEME 2 BESPOKE QURAN VERSE CARD (BASIC HARMONY EMERALD) -->
        <section id="section-kutipan" class="py-6 sm:py-10 px-4 sm:px-6 md:px-10 text-center">
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45 reveal-item anim-fade-up">
                <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-6 sm:p-8 text-center space-y-4">
                    <!-- Gold Interlocking Rings Divider -->
                    <div class="w-44 sm:w-52 h-6 mx-auto">
                        <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
                    </div>

                    @if(!empty($invitation->quran_text))
                    <p class="text-xl sm:text-2xl leading-relaxed font-serif text-white/95" dir="rtl">
                        {{ $invitation->quran_text }}
                    </p>
                    @endif

                    <p class="text-xs sm:text-sm text-white/90 leading-relaxed italic font-light max-w-lg mx-auto">
                        "{{ $invitation->quran_translation ?? 'And of His signs is that He created for you from yourselves mates that you may find tranquillity in them; and He placed between you affection and mercy. Indeed in that are signs for a people who give thought.' }}"
                    </p>

                    <p class="text-[11px] sm:text-xs font-semibold text-[#E5C158] tracking-widest uppercase font-heading">
                        ( {{ $invitation->quote_source ?? 'QS. Ar- Rum 21' }} )
                    </p>
                </div>
            </div>
        </section>
        @elseif($currentThemeId == 3)
        <!-- THEME 3 BESPOKE QURAN VERSE SECTION (BASIC HARMONY NAVY - MATCHING IMAGE 2 SECTION 2) -->
        <section id="section-kutipan" class="relative bg-[#1E3A5F] text-white py-14 sm:py-18 px-4 sm:px-6 md:px-10 text-center overflow-hidden">
            <!-- Top Wave Transition -->
            <div class="absolute inset-x-0 top-0 w-full pointer-events-none">
                <img src="/images/themes/bg/navy-wave-top.svg" alt="" class="w-full h-8 sm:h-12 object-cover object-top opacity-80">
            </div>

            <div class="max-w-2xl mx-auto space-y-5 relative z-10 pt-2 pb-4">
                <!-- Botanical Feather Flourish Crest -->
                <div class="w-36 sm:w-44 h-9 mx-auto opacity-90 reveal-item anim-fade-up">
                    <img src="/images/themes/bg/navy-crest-feather.svg" alt="Emblem" class="w-full h-full object-contain">
                </div>

                @if(!empty($invitation->quran_text))
                <p class="text-xl sm:text-2xl leading-relaxed font-serif text-white/95 reveal-item anim-fade-up delay-1" dir="rtl">
                    {{ $invitation->quran_text }}
                </p>
                @endif

                <p class="text-xs sm:text-sm text-white/90 leading-relaxed italic font-light max-w-lg mx-auto reveal-item anim-fade-up delay-2">
                    "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan-pasangan dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
                </p>

                <p class="text-[11px] sm:text-xs font-semibold text-sky-200 tracking-widest uppercase font-heading reveal-item anim-fade-up delay-3">
                    ( {{ $invitation->quote_source ?? 'QS. Ar-Rum 21' }} )
                </p>
            </div>

            <!-- Bottom Wave Transition to White -->
            <div class="absolute inset-x-0 bottom-0 w-full pointer-events-none">
                <img src="/images/themes/bg/navy-wave-bottom.svg" alt="" class="w-full h-8 sm:h-12 object-cover object-bottom opacity-80">
            </div>
        </section>
        @elseif($currentThemeId == 1)
        <!-- THEME 1 BESPOKE QURAN VERSE CARD (BASIC HARMONY MAROON - MATCHING REFERENCE) -->
        <section id="section-kutipan" class="py-4 sm:py-6 px-4 sm:px-6 md:px-10 text-center">
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto rounded-2xl shadow-xl bg-[#580B14] text-white p-5 sm:p-7 relative border border-[#7A1C28] reveal-item anim-fade-up">
                <div class="space-y-3">
                    @if(!empty($invitation->quran_text))
                    <p class="text-lg sm:text-xl leading-relaxed font-serif text-white/95" dir="rtl">
                        {{ $invitation->quran_text }}
                    </p>
                    @endif

                    <p class="text-xs sm:text-sm text-rose-100 leading-relaxed italic font-light max-w-md mx-auto">
                        "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berpikir.' }}"
                    </p>

                    <p class="text-[10px] sm:text-xs font-semibold text-rose-300 tracking-widest uppercase font-heading pt-1">
                        ( {{ $invitation->quote_source ?? 'QS. Ar-Rum: 21' }} )
                    </p>
                </div>
            </div>
        </section>
        @elseif($currentThemeId == 19 || $isLavenderMist)
        <!-- ================= THEME 19 BESPOKE KUTIPAN SUCI (PREMIUM SERENADE LAVENDER MIST) ================= -->
        <section id="section-kutipan" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center relative overflow-hidden bg-[#8B7CB0]">
            <!-- White Arched Card with 3D Entrance -->
            <div class="max-w-xl mx-auto rounded-t-[44px] sm:rounded-t-[56px] rounded-b-3xl bg-white theme-lavender-pattern p-6 sm:p-10 shadow-2xl relative space-y-5 text-center reveal-item anim-lavender-card-3d">
                <!-- Symmetrical Floral Garland Top Crown (Zero tilt, perfectly horizontal) -->
                <div class="w-56 sm:w-72 mx-auto -mt-3 mb-2 pointer-events-none reveal-item anim-lavender-flower-unfold">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Arabic Calligraphy -->
                <p class="text-2xl sm:text-3xl md:text-4xl leading-loose font-serif text-[#2D1E40] drop-shadow-xs reveal-item anim-fade-up" dir="rtl">
                    {{ $invitation->quran_text ?? 'بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ' }}
                </p>

                <!-- Translation with High-End Serif -->
                <p class="font-lavender-headline text-sm sm:text-base text-[#2D1E40] leading-relaxed italic font-medium max-w-lg mx-auto reveal-item anim-fade-up delay-1">
                    "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berpikir.' }}"
                </p>

                <!-- Citation Source in Cinzel Uppercase -->
                <p class="font-lavender-title text-xs font-bold text-[#8B7CB0] tracking-[0.3em] uppercase reveal-item anim-fade-up delay-2">
                    ( {{ $invitation->quote_source ?? 'QS. AR-RUM: 21' }} )
                </p>

                <!-- Soft Lavender Floret Divider -->
                <div class="flex items-center justify-center gap-3 pt-2 text-[#8B7CB0] reveal-item anim-lavender-flower-unfold delay-3">
                    <span class="w-12 h-px bg-[#8B7CB0]/40"></span>
                    <svg class="w-4 h-4 fill-current text-[#8B7CB0]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    <span class="w-12 h-px bg-[#8B7CB0]/40"></span>
                </div>
            </div>
        </section>
        @elseif($currentThemeId == 15 || $isMidnightAmber)
        <!-- ================= THEME 15 BESPOKE KUTIPAN SUCI (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
        <section id="section-kutipan" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center relative overflow-hidden bg-[#161514] text-white">
            <!-- Dark Obsidian Card with Gold Border & 3D Rise Entrance -->
            <div class="max-w-xl mx-auto rounded-2xl sm:rounded-3xl bg-[#1C1A18] border border-[#DDA74F]/40 p-6 sm:p-10 shadow-[0_16px_50px_rgba(0,0,0,0.8)] relative space-y-5 text-center reveal-item anim-amber-card-3d">
                <!-- Floral Crest Ornament Top -->
                <div class="w-44 sm:w-56 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-amber-bloom">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Arabic Calligraphy -->
                <p class="text-2xl sm:text-3xl md:text-4xl leading-loose font-serif text-[#F2D59B] drop-shadow-md reveal-item anim-fade-up" dir="rtl">
                    {{ $invitation->quran_text ?? 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً' }}
                </p>

                <!-- Translation with High-End Serif -->
                <p class="font-amber-headline text-sm sm:text-base text-[#FAF5EC] leading-relaxed italic font-normal max-w-lg mx-auto reveal-item anim-fade-up delay-1">
                    "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
                </p>

                <!-- Citation Source in Cinzel Uppercase -->
                <p class="font-amber-title text-xs font-bold text-[#DDA74F] tracking-[0.3em] uppercase reveal-item anim-amber-title delay-2">
                    ( {{ $invitation->quote_source ?? 'QS. AR-RUM: 21' }} )
                </p>

                <!-- Gold Heart Accent Divider -->
                <div class="flex items-center justify-center gap-3 pt-2 text-[#DDA74F] reveal-item anim-amber-pop delay-3">
                    <span class="w-12 h-px bg-[#DDA74F]/40"></span>
                    <svg class="w-4 h-4 fill-current text-[#DDA74F]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    <span class="w-12 h-px bg-[#DDA74F]/40"></span>
                </div>
            </div>

            <!-- Golden Wavy Ribbon Divider -->
            <div class="w-full pt-8 pointer-events-none reveal-item anim-amber-bloom delay-3">
                <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
            </div>
        </section>
        @elseif($currentThemeId == 13 || $isSummerVibes)
        <!-- ================= THEME 13 BESPOKE KUTIPAN SUCI (PREMIUM SUMMER VIBES) ================= -->
        <section id="section-kutipan" class="py-10 sm:py-14 px-4 sm:px-6 md:px-10 text-center relative overflow-hidden bg-[#EFECE6] text-[#1E293B]">
            <!-- Sandy Linen Card with Cobalt & Terracotta Accents -->
            <div class="max-w-xl mx-auto rounded-3xl bg-[#FAF8F5] border-2 border-[#1D63B8]/30 p-6 sm:p-10 shadow-[0_16px_40px_rgba(29,99,184,0.12)] relative space-y-5 text-center reveal-item anim-summer-stamp">
                <!-- Top Badge -->
                <div class="inline-block px-4 py-1 rounded-full bg-[#1D63B8]/10 border border-[#1D63B8]/30 text-[#1D63B8] font-serif text-[10px] tracking-[0.3em] uppercase font-bold">
                    HOLY MATRIMONY
                </div>

                <!-- Arabic Calligraphy in Cobalt Blue -->
                <p class="text-2xl sm:text-3xl md:text-4xl leading-loose font-serif text-[#1D63B8] drop-shadow-xs reveal-item anim-fade-up" dir="rtl">
                    {{ $invitation->quran_text ?? 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً' }}
                </p>

                <!-- Translation with Clean Sans -->
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic max-w-lg mx-auto reveal-item anim-fade-up delay-1">
                    "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
                </p>

                <!-- Citation Source in Terracotta -->
                <p class="font-serif text-xs font-bold text-[#D94B26] tracking-[0.25em] uppercase reveal-item anim-fade-up delay-2">
                    ( {{ $invitation->quote_source ?? 'QS. AR-RUM: 21' }} )
                </p>

                <!-- Blue Floral Divider -->
                <div class="w-24 sm:w-28 mx-auto pointer-events-none pt-2">
                    <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
        </section>
        @elseif($currentThemeId == 16 || $isMuseumOfLove)
        <!-- ================= THEME 16 BESPOKE KUTIPAN SUCI (PREMIUM MUSEUM OF LOVE) ================= -->
        <section id="section-kutipan" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center relative overflow-hidden theme-museum-canvas text-[#2A1F1D]">
            <!-- Dark Mahogany Museum Plaque Card with Gold Border & 3D Rise Entrance -->
            <div class="max-w-xl mx-auto rounded-2xl sm:rounded-3xl bg-[#382318] border-2 border-[#D4AF37] p-6 sm:p-10 shadow-[0_16px_50px_rgba(56,35,24,0.45)] relative space-y-5 text-center text-white reveal-item anim-museum-card">
                <!-- Top Gold Museum Plaque Badge -->
                <div class="inline-block px-3.5 py-1 rounded-sm bg-[#D4AF37]/20 border border-[#D4AF37]/60 text-[#F3D89A] font-museum-title text-[9px] tracking-[0.3em] uppercase font-bold">
                    HOLY MATRIMONY ARCHIVE
                </div>

                <!-- Arabic Calligraphy in Glowing Gold -->
                <p class="text-2xl sm:text-3xl md:text-4xl leading-loose font-serif text-[#F3D89A] drop-shadow-md reveal-item anim-fade-up" dir="rtl">
                    {{ $invitation->quran_text ?? 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً' }}
                </p>

                <!-- Translation with High-End Serif -->
                <p class="font-museum-body text-xs sm:text-sm text-[#F5EAD4] leading-relaxed italic font-normal max-w-lg mx-auto reveal-item anim-fade-up delay-1">
                    "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
                </p>

                <!-- Citation Source in Cinzel Uppercase -->
                <p class="font-museum-title text-xs font-bold text-[#D4AF37] tracking-[0.3em] uppercase reveal-item anim-fade-up delay-2">
                    ( {{ $invitation->quote_source ?? 'QS. AR-RUM: 21' }} )
                </p>

                <!-- Gold Accent Divider -->
                <div class="flex items-center justify-center gap-3 pt-2 text-[#D4AF37] reveal-item anim-fade-up delay-3">
                    <span class="w-12 h-px bg-[#D4AF37]/40"></span>
                    <svg class="w-4 h-4 fill-current text-[#D4AF37]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    <span class="w-12 h-px bg-[#D4AF37]/40"></span>
                </div>
            </div>

            <!-- Vintage Bookshelf, Telescope & Hourglass Divider Across Section -->
            <div class="w-full max-w-lg mx-auto pt-8 pointer-events-none reveal-item anim-fade-up delay-3">
                <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
            </div>
        </section>
        @elseif($currentThemeId == 20 || $isDarkElegance)
        <!-- ================= THEME 20 BESPOKE KUTIPAN SUCI (PREMIUM SERENADE DARK ELEGANCE) ================= -->
        <section id="section-kutipan" class="py-8 sm:py-12 px-4 sm:px-6 md:px-10 text-center relative overflow-hidden bg-[#070807] text-[#FAF7F2]">
            <div class="max-w-xl mx-auto space-y-4 text-center relative z-10">
                <!-- Quran Arabic Calligraphy -->
                @if(!empty($invitation->quran_text))
                <p class="text-xl sm:text-2xl md:text-3xl leading-loose font-serif text-[#FAF7F2] drop-shadow-sm reveal-item anim-fade-up" dir="rtl">
                    {{ $invitation->quran_text }}
                </p>
                @endif

                <!-- Indonesian Translation -->
                <p class="text-xs sm:text-sm text-[#D5DDD0] leading-relaxed italic font-serif font-light max-w-lg mx-auto reveal-item anim-fade-up delay-1">
                    "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda kebesaran-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang.' }}"
                </p>

                <!-- Source: ( QS. AR-RUM: 21 ) -->
                <p class="text-xs font-serif font-semibold text-[#9EB092] tracking-widest uppercase reveal-item anim-fade-up delay-2">
                    ( {{ $invitation->quote_source ?? 'QS. AR-RUM: 21' }} )
                </p>

                <!-- Sage Heart / Diamond Floral Divider -->
                <div class="flex items-center justify-center gap-3 pt-2 text-[#9EB092] reveal-item anim-floral-bloom delay-3">
                    <span class="w-10 h-px bg-[#9EB092]/40"></span>
                    <svg class="w-4 h-4 fill-current text-[#9EB092]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                    <span class="w-10 h-px bg-[#9EB092]/40"></span>
                </div>
            </div>
        </section>
        @else
        <section id="section-kutipan" class="py-12 sm:py-16 px-6 bg-[var(--bg-accent-block)] text-white text-center relative overflow-hidden reveal-item anim-fade-up">
            <div class="max-w-2xl mx-auto relative z-10 space-y-4">
                <div class="w-8 h-8 mx-auto text-white/80">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-full h-full"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                </div>

                <p class="text-xl sm:text-3xl leading-relaxed font-serif text-white/95" dir="rtl">
                    {{ $invitation->quran_text }}
                </p>

                @if(!empty($invitation->quran_translation))
                <p class="text-xs sm:text-base text-white/85 leading-relaxed italic font-light max-w-xl mx-auto">
                    "{{ $invitation->quran_translation }}"
                </p>
                @endif

                @if(!empty($invitation->quote_source))
                <div class="flex items-center justify-center gap-3 pt-2">
                    <span class="w-8 h-px bg-white/40"></span>
                    <span class="text-[11px] sm:text-xs uppercase tracking-widest font-semibold text-white/90">
                        {{ $invitation->quote_source }}
                    </span>
                    <span class="w-8 h-px bg-white/40"></span>
                </div>
                @endif

                @if($currentThemeId == 1)
                <div class="w-48 sm:w-56 mx-auto mt-4 pointer-events-none reveal-item anim-fade-up delay-3">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto brightness-0 invert opacity-75 object-contain">
                </div>
                @elseif($currentThemeId == 19)
                <div class="w-36 sm:w-48 h-7 mx-auto mt-4 pointer-events-none reveal-item anim-flower-center delay-3">
                    <img src="/images/themes/bg/lavender-wildflowers.svg" alt="" class="w-full h-full brightness-0 invert opacity-85">
                </div>
                <div class="w-full pointer-events-none mt-6 -mb-12 sm:-mb-16">
                    <img src="/images/themes/bg/lavender-meadow-bottom.svg" alt="" class="w-full h-10 sm:h-12 object-cover opacity-90 drop-shadow-sm">
                </div>
                @endif
            </div>
        </section>
        @endif
        @endif


        <!-- ================= 4. SECTION PROFIL MEMPELAI (PASANGAN MEMPELAI) ================= -->
        <section id="section-mempelai" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
            @if($currentThemeId == 2)
            <!-- THEME 2 BESPOKE PROFIL MEMPELAI (BASIC HARMONY EMERALD) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-8 sm:space-y-12">
                
                <!-- 1. Salam Pembuka Card with 3-Photo Preview Row -->
                <div class="space-y-3.5 reveal-item anim-fade-up">
                    <div class="text-center space-y-1 py-1">
                        <div class="w-24 sm:w-28 h-8 mx-auto">
                            <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                        </div>
                        <p class="font-heading text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-stone-700 font-semibold">
                            {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                        </p>
                    </div>

                    <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45">
                        <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-6 sm:p-8 text-center space-y-4">
                            <h3 class="font-heading text-xs sm:text-sm font-bold tracking-[0.2em] uppercase text-[#E5C158]">
                                ASSALAMUALAIKUM WR. WB.
                            </h3>
                            <p class="text-xs sm:text-sm text-white/95 leading-relaxed italic font-light max-w-md mx-auto">
                                "Tanpa mengurangi rasa hormat, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami"
                            </p>

                            <!-- Mini 3-Photo Preview Row -->
                            <div class="grid grid-cols-3 gap-2 pt-2">
                                <div class="aspect-square rounded-lg overflow-hidden border border-[#D4AF37]/60 shadow-sm">
                                    <img src="{{ $galleryPhotos[0] }}" alt="Foto 1" class="w-full h-full object-cover">
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden border border-[#D4AF37]/60 shadow-sm">
                                    <img src="{{ $galleryPhotos[1] ?? $galleryPhotos[0] }}" alt="Foto 2" class="w-full h-full object-cover">
                                </div>
                                <div class="aspect-square rounded-lg overflow-hidden border border-[#D4AF37]/60 shadow-sm">
                                    <img src="{{ $galleryPhotos[2] ?? $galleryPhotos[0] }}" alt="Foto 3" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. The Bride & The Groom Cards (Responsive 2-Col on Desktop, Stack on Mobile) -->
                <div class="space-y-4">
                    <div class="text-center space-y-1 py-1">
                        <div class="w-24 sm:w-28 h-8 mx-auto">
                            <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                        </div>
                        <p class="font-heading text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-stone-700 font-semibold">
                            {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-stretch">
                        <!-- CARD: THE BRIDE -->
                        <div class="rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45 reveal-item anim-fade-up delay-1 flex flex-col justify-between">
                            <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-5 sm:p-7 text-center space-y-4 flex flex-col justify-between h-full">
                                <div class="space-y-3.5">
                                    <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-white/90 font-heading block">
                                        THE BRIDE
                                    </span>

                                    <!-- Framed Portrait Photo -->
                                    <div class="w-44 sm:w-52 aspect-[3/4] mx-auto rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-lg">
                                        @if(!empty($invitation->bride_photo))
                                            <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}" alt="The Bride" class="w-full h-full object-cover">
                                        @else
                                            <img src="{{ $galleryPhotos[1] ?? $galleryPhotos[0] }}" alt="The Bride" class="w-full h-full object-cover">
                                        @endif
                                    </div>

                                    <!-- Full Name in Gleaming Gold -->
                                    <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wider text-[#E5C158] pt-1">
                                        {{ strtoupper($brideName) }}
                                    </h4>

                                    <!-- Parents Info -->
                                    <p class="text-xs sm:text-sm text-white/90 font-light leading-relaxed max-w-xs mx-auto">
                                        {{ $brideParents }}
                                    </p>
                                </div>

                                @if($brideInstagram)
                                <div class="pt-2">
                                    <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-[#D4AF37]/50 text-white text-xs font-medium transition shadow-xs">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                        <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- CARD: THE GROOM -->
                        <div class="rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45 reveal-item anim-fade-up delay-2 flex flex-col justify-between">
                            <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-5 sm:p-7 text-center space-y-4 flex flex-col justify-between h-full">
                                <div class="space-y-3.5">
                                    <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-white/90 font-heading block">
                                        THE GROOM
                                    </span>

                                    <!-- Framed Portrait Photo -->
                                    <div class="w-44 sm:w-52 aspect-[3/4] mx-auto rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-lg">
                                        @if(!empty($invitation->groom_photo))
                                            <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}" alt="The Groom" class="w-full h-full object-cover">
                                        @else
                                            <img src="{{ $galleryPhotos[0] }}" alt="The Groom" class="w-full h-full object-cover">
                                        @endif
                                    </div>

                                    <!-- Full Name in Gleaming Gold -->
                                    <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wider text-[#E5C158] pt-1">
                                        {{ strtoupper($groomName) }}
                                    </h4>

                                    <!-- Parents Info -->
                                    <p class="text-xs sm:text-sm text-white/90 font-light leading-relaxed max-w-xs mx-auto">
                                        {{ $groomParents }}
                                    </p>
                                </div>

                                @if($groomInstagram)
                                <div class="pt-2">
                                    <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-white/10 hover:bg-white/20 border border-[#D4AF37]/50 text-white text-xs font-medium transition shadow-xs">
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                        <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @elseif($currentThemeId == 3)
            <!-- THEME 3 BESPOKE PROFIL MEMPELAI (BASIC HARMONY NAVY - MATCHING IMAGE 2 SECTION 3 & 4) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-10 sm:space-y-14 overflow-hidden">
                <!-- 1. Salam Pembuka Card with 3-Photo Preview Row on Pure White Background -->
                <div class="space-y-4 text-center">
                    <h3 class="font-heading text-base sm:text-lg tracking-[0.2em] uppercase text-[#1E3A5F] font-bold reveal-item anim-fade-up">
                        ASSALAMU'ALAIKUM WR. WB.
                    </h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed max-w-lg mx-auto font-light reveal-item anim-fade-up delay-1">
                        Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan. Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri hari bahagia pernikahan kami:
                    </p>

                    <!-- 3-Photo Mini Preview Row -->
                    <div class="grid grid-cols-3 gap-2.5 sm:gap-3.5 max-w-xs sm:max-w-sm mx-auto pt-2">
                        @for($p = 0; $p < 3; $p++)
                        <div class="aspect-square rounded-xl overflow-hidden shadow-sm border border-slate-200 group reveal-item anim-zoom-in delay-{{ $p + 1 }}">
                            <img src="{{ $galleryPhotos[$p] ?? $galleryPhotos[0] }}" alt="Preview {{ $p+1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        @endfor
                    </div>
                </div>

                <!-- 2. The Bride & The Groom Cards with Vertical Side Labels (Matching Image 2 Section 4) -->
                <div class="space-y-6 sm:space-y-8">
                    <div class="text-center reveal-item anim-fade-up">
                        <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-stone-500 font-heading block">
                            PASANGAN MEMPELAI
                        </span>
                        <div class="w-12 h-0.5 bg-[#1E3A5F] mx-auto mt-2 opacity-60"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-10 items-stretch overflow-hidden py-2 px-1">
                        <!-- CARD 1: THE BRIDE (Vertical Label on the Left - Muncul dari Kanan ke Kiri) -->
                        <div class="flex items-center gap-3 sm:gap-4 w-full reveal-item anim-slide-from-right delay-1">
                            <div class="theme3-vertical-label select-none text-xs sm:text-sm font-heading tracking-[0.3em] uppercase text-[#1E3A5F] font-bold py-2">
                                The Bride
                            </div>
                            <div class="flex-1 rounded-2xl overflow-hidden shadow-xl border border-slate-200 relative group aspect-[3/4] bg-slate-900">
                                @if(!empty($invitation->bride_photo))
                                    <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}" alt="The Bride" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <img src="{{ $galleryPhotos[1] ?? $galleryPhotos[0] }}" alt="The Bride" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @endif
                                <!-- Dark Navy Glass Banner at Bottom -->
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#0A1626]/95 via-[#1E3A5F]/85 to-transparent pt-12 pb-5 px-4 text-center text-white">
                                    <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wide text-white">
                                        {{ $brideName }}
                                    </h4>
                                    <p class="text-xs sm:text-sm text-slate-200 font-light mt-1">
                                        {{ $brideParents }}
                                    </p>
                                    @if($brideInstagram)
                                    <div class="pt-2">
                                        <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/15 hover:bg-white/25 border border-white/30 text-[11px] text-white transition shadow-xs">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                            <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- CARD 2: THE GROOM (Vertical Label on the Right - Muncul dari Kiri ke Kanan) -->
                        <div class="flex items-center gap-3 sm:gap-4 w-full reveal-item anim-slide-from-left delay-2">
                            <div class="flex-1 rounded-2xl overflow-hidden shadow-xl border border-slate-200 relative group aspect-[3/4] bg-slate-900">
                                @if(!empty($invitation->groom_photo))
                                    <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}" alt="The Groom" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <img src="{{ $galleryPhotos[0] }}" alt="The Groom" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @endif
                                <!-- Dark Navy Glass Banner at Bottom -->
                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#0A1626]/95 via-[#1E3A5F]/85 to-transparent pt-12 pb-5 px-4 text-center text-white">
                                    <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wide text-white">
                                        {{ $groomName }}
                                    </h4>
                                    <p class="text-xs sm:text-sm text-slate-200 font-light mt-1">
                                        {{ $groomParents }}
                                    </p>
                                    @if($groomInstagram)
                                    <div class="pt-2">
                                        <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-white/15 hover:bg-white/25 border border-white/30 text-[11px] text-white transition shadow-xs">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                            <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="theme3-vertical-label select-none text-xs sm:text-sm font-heading tracking-[0.3em] uppercase text-[#1E3A5F] font-bold py-2">
                                The Groom
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 1)
            <!-- THEME 1 BESPOKE PASANGAN MEMPELAI (BASIC HARMONY MAROON - MATCHING IMAGE 5) -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-6 sm:space-y-8 text-center overflow-hidden">
                <!-- Top Floral Branch Ornament Matching Image 1 -->
                <div class="w-48 sm:w-56 mx-auto pointer-events-none reveal-item anim-fade-up">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>

                <!-- Section Title -->
                <div class="space-y-1.5 reveal-item anim-fade-up delay-1">
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold tracking-wide text-[#620000]">
                        Pasangan Mempelai
                    </h3>
                    <p class="font-serif text-xs sm:text-sm text-[#620000]/85 font-normal max-w-sm mx-auto leading-relaxed">
                        Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengundang Bapak/Ibu/Saudara/i untuk menghadiri pernikahan kami:
                    </p>
                </div>

                <!-- 1. The Bride (Mempelai Wanita - Muncul dari Kanan ke Kiri - Foto di Atas) -->
                <div class="space-y-3.5 reveal-item anim-slide-from-right delay-2">
                    <!-- Bride Photo with Thick Maroon Rounded Border -->
                    <div class="w-56 sm:w-64 aspect-[4/5] mx-auto rounded-[32px] overflow-hidden shadow-lg border-4 border-[#620000] bg-stone-900 group">
                        @if(!empty($invitation->bride_photo))
                            <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}" alt="Mempelai Wanita" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @elseif(!empty($isDemo))
                            <img src="{{ $galleryPhotos[1] ?? $galleryPhotos[0] }}" alt="Mempelai Wanita" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <div class="placeholder-avatar w-full h-full bg-[#65011E] flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/70" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                            </div>
                        @endif
                    </div>

                    <!-- Bride Details & Parents -->
                    <div class="space-y-1">
                        <h4 class="font-serif text-2xl sm:text-3xl font-bold text-[#620000] tracking-wide">
                            {{ $brideName }}
                        </h4>
                        <p class="font-serif text-xs sm:text-sm text-[#620000]/90 font-normal">
                            {{ $brideParents }}
                        </p>

                        <!-- Circular Maroon Social Icon Buttons Row Matching Image 5 -->
                        <div class="pt-2 flex items-center justify-center gap-2 sm:gap-2.5">
                            @php
                                $brideIgUrl = $brideInstagram ? 'https://instagram.com/' . ltrim($brideInstagram, '@') : '#';
                            @endphp
                            <!-- Instagram -->
                            <a href="{{ $brideIgUrl }}" target="_blank" rel="noopener noreferrer" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="Instagram">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <!-- TikTok -->
                            <a href="#" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="TikTok">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 00-1-.08A6.34 6.34 0 003 15.66a6.34 6.34 0 0010.86 4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-3.04-1.52z"/></svg>
                            </a>
                            <!-- Facebook -->
                            <a href="#" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="Facebook">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <!-- X / Twitter -->
                            <a href="#" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="X">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <!-- YouTube -->
                            <a href="#" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="YouTube">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Center Large Ampersand & Matching Image 5 -->
                <div class="py-1 reveal-item anim-zoom-in delay-2 select-none">
                    <span class="font-serif text-7xl sm:text-8xl text-[#E8A5A5] leading-none block font-light">&amp;</span>
                </div>

                <!-- 2. The Groom (Mempelai Pria - Muncul dari Kiri ke Kanan - Teks di Atas, Foto di Bawah) -->
                <div class="space-y-3.5 reveal-item anim-slide-from-left delay-3">
                    <!-- Groom Details & Parents -->
                    <div class="space-y-1">
                        <h4 class="font-serif text-2xl sm:text-3xl font-bold text-[#620000] tracking-wide">
                            {{ $groomName }}
                        </h4>
                        <p class="font-serif text-xs sm:text-sm text-[#620000]/90 font-normal">
                            {{ $groomParents }}
                        </p>

                        <!-- Circular Maroon Social Icon Buttons Row Matching Image 5 -->
                        <div class="pt-2 flex items-center justify-center gap-2 sm:gap-2.5">
                            @php
                                $groomIgUrl = $groomInstagram ? 'https://instagram.com/' . ltrim($groomInstagram, '@') : '#';
                            @endphp
                            <!-- Instagram -->
                            <a href="{{ $groomIgUrl }}" target="_blank" rel="noopener noreferrer" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="Instagram">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <!-- TikTok -->
                            <a href="#" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="TikTok">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 00-1-.08A6.34 6.34 0 003 15.66a6.34 6.34 0 0010.86 4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-3.04-1.52z"/></svg>
                            </a>
                            <!-- Facebook -->
                            <a href="#" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="Facebook">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <!-- X / Twitter -->
                            <a href="#" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="X">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <!-- YouTube -->
                            <a href="#" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white flex items-center justify-center shadow-xs transition transform hover:scale-110 active:scale-95" title="YouTube">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Groom Photo with Thick Maroon Rounded Border (Below Details as per Image 5) -->
                    <div class="w-56 sm:w-64 aspect-[4/5] mx-auto rounded-[32px] overflow-hidden shadow-lg border-4 border-[#620000] bg-stone-900 group">
                        @if(!empty($invitation->groom_photo))
                            <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}" alt="Mempelai Pria" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @elseif(!empty($isDemo))
                            <img src="{{ $galleryPhotos[0] }}" alt="Mempelai Pria" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        @else
                            <div class="placeholder-avatar w-full h-full bg-[#8B3A1C] flex items-center justify-center">
                                <svg class="w-16 h-16 text-white/70" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 5)
            <!-- ================= THEME 5 BESPOKE PASANGAN MEMPELAI (BASIC HARMONY MONOCHROME - MATCHING IMAGE 4) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto rounded-[60px] sm:rounded-[80px] bg-[#2C2D2F] text-white py-12 px-6 sm:px-8 shadow-2xl relative space-y-7 text-center reveal-item anim-card-3d">
                <!-- 1. The Bride (Milea Adnan) -->
                <div class="space-y-3.5">
                    <!-- Oval Photo Cutout -->
                    <div class="w-40 sm:w-48 h-56 sm:h-64 mx-auto rounded-full overflow-hidden border-2 border-white/20 shadow-xl bg-stone-800 relative group reveal-item anim-pop-in delay-1">
                        <img src="{{ $t5BridePhoto }}" alt="{{ $brideName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>

                    <div class="space-y-1 reveal-item anim-curved-right delay-2">
                        <h3 class="theme-script text-3xl sm:text-4xl text-white font-normal leading-tight">
                            {{ $brideNickname }}
                        </h3>
                        <h4 class="font-serif text-sm sm:text-base font-semibold tracking-wider text-white uppercase">
                            {{ $brideName }}
                        </h4>
                        <p class="font-serif text-xs text-stone-300 font-light leading-relaxed max-w-xs mx-auto">
                            {{ $brideParents }}
                        </p>
                    </div>

                    @if($brideInstagram)
                    <div class="pt-1 reveal-item anim-pop-in delay-3">
                        <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-[#1C1D1F] hover:bg-black border border-white/30 text-xs text-white transition shadow-sm font-sans cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Center Ampersand Divider -->
                <div class="py-1 select-none reveal-item anim-pop-in delay-2">
                    <span class="font-serif text-5xl sm:text-6xl text-white/80 font-light block leading-none">&amp;</span>
                </div>

                <!-- 2. The Groom (Dilan Pratama) -->
                <div class="space-y-3.5">
                    <!-- Oval Photo Cutout -->
                    <div class="w-40 sm:w-48 h-56 sm:h-64 mx-auto rounded-full overflow-hidden border-2 border-white/20 shadow-xl bg-stone-800 relative group reveal-item anim-pop-in delay-2">
                        <img src="{{ $t5GroomPhoto }}" alt="{{ $groomName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>

                    <div class="space-y-1 reveal-item anim-curved-left delay-3">
                        <h3 class="theme-script text-3xl sm:text-4xl text-white font-normal leading-tight">
                            {{ $groomNickname }}
                        </h3>
                        <h4 class="font-serif text-sm sm:text-base font-semibold tracking-wider text-white uppercase">
                            {{ $groomName }}
                        </h4>
                        <p class="font-serif text-xs text-stone-300 font-light leading-relaxed max-w-xs mx-auto">
                            {{ $groomParents }}
                        </p>
                    </div>

                    @if($groomInstagram)
                    <div class="pt-1 reveal-item anim-pop-in delay-4">
                        <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-[#1C1D1F] hover:bg-black border border-white/30 text-xs text-white transition shadow-sm font-sans cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @elseif($currentThemeId == 19 || $isLavenderMist)
            <!-- ================= THEME 19 BESPOKE PASANGAN MEMPELAI (PREMIUM SERENADE LAVENDER MIST) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-7 text-center text-[#2D1E40] py-6 relative">
                <!-- Section Header in White Card -->
                <div class="rounded-t-[44px] sm:rounded-t-[56px] rounded-b-3xl bg-white theme-lavender-pattern p-6 sm:p-10 shadow-2xl relative space-y-4 text-center reveal-item anim-lavender-card-3d">
                    <!-- Top Symmetrical Floral Garland (Zero tilt, perfectly horizontal) -->
                    <div class="w-56 sm:w-72 mx-auto -mt-3 mb-2 pointer-events-none reveal-item anim-lavender-flower-unfold">
                        <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                    </div>

                    <span class="font-lavender-title text-[11px] sm:text-xs tracking-[0.35em] uppercase text-[#8B7CB0] font-semibold block">
                        KEDUA MEMPELAI
                    </span>
                    <h3 class="font-lavender-headline text-2xl sm:text-3xl font-bold tracking-wide text-[#2D1E40]">
                        Assalamu’alaikum Warahmatullahi Wabarakatuh
                    </h3>
                    <p class="font-lavender-body text-xs sm:text-sm text-[#2D1E40] leading-relaxed max-w-sm mx-auto pt-1 font-normal">
                        Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan. Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud melangsungkan pernikahan kami:
                    </p>

                    <!-- 1. The Bride Card with Photo Frame -->
                    <div class="pt-4 space-y-3">
                        <div class="relative w-64 sm:w-72 aspect-[682/1024] mx-auto group my-4 reveal-item anim-lavender-frame delay-1">
                            <!-- Inner Photo with padding to sit perfectly inside frame -->
                            <div class="absolute inset-[4%] rounded-[24px] sm:rounded-[28px] overflow-hidden bg-purple-50 shadow-inner">
                                <img src="{{ $t19BridePhoto }}" alt="{{ $brideName }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <!-- Frame Overlay -->
                            <img src="{{ asset('images/themes/serenade-lavender/photo-frame.png') }}" 
                                 alt="Bingkai Mempelai Wanita" 
                                 class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-md">
                        </div>

                        <!-- Bride Details -->
                        <div class="space-y-1 pt-1 reveal-item anim-fade-up delay-2">
                            <h4 class="font-lavender-headline text-2xl sm:text-3xl font-bold tracking-wide text-[#2D1E40]">
                                {{ $brideName }}
                            </h4>
                            <p class="font-lavender-body text-xs sm:text-sm text-[#5A4B70] font-normal leading-relaxed max-w-xs mx-auto">
                                {{ $brideParents }}
                            </p>
                        </div>

                        @if($brideInstagram)
                        <div class="pt-1 reveal-item anim-lavender-pop delay-2">
                            <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] hover:from-[#7E6FA3] hover:to-[#7E6FA3] text-xs text-white transition shadow-sm font-lavender-title tracking-wider cursor-pointer group">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Center Ampersand Divider -->
                    <div class="py-4 select-none reveal-item anim-lavender-pop delay-2">
                        <span class="font-lavender-script text-6xl sm:text-7xl text-[#8B7CB0] font-light block leading-none">&amp;</span>
                    </div>

                    <!-- 2. The Groom Card with Photo Frame -->
                    <div class="space-y-3 pb-2">
                        <div class="relative w-64 sm:w-72 aspect-[682/1024] mx-auto group my-4 reveal-item anim-lavender-frame delay-2">
                            <!-- Inner Photo with padding to sit perfectly inside frame -->
                            <div class="absolute inset-[4%] rounded-[24px] sm:rounded-[28px] overflow-hidden bg-purple-50 shadow-inner">
                                <img src="{{ $t19GroomPhoto }}" alt="{{ $groomName }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <!-- Frame Overlay -->
                            <img src="{{ asset('images/themes/serenade-lavender/photo-frame.png') }}" 
                                 alt="Bingkai Mempelai Pria" 
                                 class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-md">
                        </div>

                        <!-- Groom Details -->
                        <div class="space-y-1 pt-1 reveal-item anim-fade-up delay-3">
                            <h4 class="font-lavender-headline text-2xl sm:text-3xl font-bold tracking-wide text-[#2D1E40]">
                                {{ $groomName }}
                            </h4>
                            <p class="font-lavender-body text-xs sm:text-sm text-[#5A4B70] font-normal leading-relaxed max-w-xs mx-auto">
                                {{ $groomParents }}
                            </p>
                        </div>

                        @if($groomInstagram)
                        <div class="pt-1 reveal-item anim-lavender-pop delay-3">
                            <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] hover:from-[#7E6FA3] hover:to-[#7E6FA3] text-xs text-white transition shadow-sm font-lavender-title tracking-wider cursor-pointer group">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Bottom Symmetrical Floral Garland (Zero tilt, perfectly horizontal) -->
                    <div class="w-56 sm:w-72 mx-auto pt-4 pb-1 pointer-events-none reveal-item anim-lavender-flower-unfold delay-3">
                        <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 15 || $isMidnightAmber)
            <!-- ================= THEME 15 BESPOKE PASANGAN MEMPELAI (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-7 text-center text-white py-6 relative">
                <!-- Section Header in Dark Obsidian Card -->
                <div class="rounded-2xl sm:rounded-3xl bg-[#1C1A18] border border-[#DDA74F]/40 p-6 sm:p-10 shadow-[0_16px_50px_rgba(0,0,0,0.8)] relative space-y-4 text-center reveal-item anim-amber-card-3d">
                    <!-- Top Floral Crest Ornament -->
                    <div class="w-48 sm:w-60 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-amber-bloom">
                        <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                    </div>

                    <span class="font-amber-title text-[11px] sm:text-xs tracking-[0.35em] uppercase text-[#DDA74F] font-bold block">
                        KEDUA MEMPELAI
                    </span>
                    <h3 class="font-amber-headline text-2xl sm:text-3xl font-bold tracking-wide text-[#FAF5EC]">
                        Assalamu’alaikum Warahmatullahi Wabarakatuh
                    </h3>
                    <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] leading-relaxed max-w-sm mx-auto pt-1 font-normal">
                        Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan. Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud melangsungkan pernikahan kami:
                    </p>

                    <!-- 1. The Bride Card with User-Provided Photo Frame -->
                    <div class="pt-4 space-y-3">
                        <div class="relative w-64 sm:w-72 aspect-[682/1024] mx-auto group my-4 reveal-item anim-amber-frame delay-1">
                            <!-- Inner Photo with Aperture Alignment -->
                            <div class="absolute left-[12.5%] right-[12.5%] top-[15.5%] bottom-[7%] w-[75%] h-[77.5%] rounded-t-[34px] rounded-b-[16px] overflow-hidden bg-[#1F1D1B] shadow-inner">
                                <img src="{{ $t15BridePhoto }}" alt="{{ $brideName }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <!-- User Sourced Frame Overlay on Top -->
                            <img src="{{ asset('images/themes/serenade-amber/photo-frame.png') }}" 
                                 alt="Bingkai Foto Mempelai Wanita" 
                                 class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-2xl">
                        </div>

                        <!-- Bride Details -->
                        <div class="space-y-1 pt-1 reveal-item anim-fade-up delay-2">
                            <h4 class="font-amber-script text-3xl sm:text-4xl text-[#F2D59B] leading-tight drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)]">
                                {{ $brideName }}
                            </h4>
                            <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] font-normal leading-relaxed max-w-xs mx-auto">
                                {{ $brideParents }}
                            </p>
                        </div>

                        @if($brideInstagram)
                        <div class="pt-1 reveal-item anim-amber-pop delay-2">
                            <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] text-xs text-[#161514] font-bold transition shadow-md font-amber-title tracking-wider cursor-pointer group hover:brightness-110">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Center Ampersand Divider -->
                    <div class="py-4 select-none reveal-item anim-amber-pop delay-2">
                        <span class="font-amber-script text-6xl sm:text-7xl text-[#DDA74F] font-light block leading-none">&amp;</span>
                    </div>

                    <!-- 2. The Groom Card with User-Provided Photo Frame -->
                    <div class="space-y-3 pb-2">
                        <div class="relative w-64 sm:w-72 aspect-[682/1024] mx-auto group my-4 reveal-item anim-amber-frame delay-2">
                            <!-- Inner Photo with Aperture Alignment -->
                            <div class="absolute left-[12.5%] right-[12.5%] top-[15.5%] bottom-[7%] w-[75%] h-[77.5%] rounded-t-[34px] rounded-b-[16px] overflow-hidden bg-[#1F1D1B] shadow-inner">
                                <img src="{{ $t15GroomPhoto }}" alt="{{ $groomName }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <!-- User Sourced Frame Overlay on Top -->
                            <img src="{{ asset('images/themes/serenade-amber/photo-frame.png') }}" 
                                 alt="Bingkai Foto Mempelai Pria" 
                                 class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-2xl">
                        </div>

                        <!-- Groom Details -->
                        <div class="space-y-1 pt-1 reveal-item anim-fade-up delay-3">
                            <h4 class="font-amber-script text-3xl sm:text-4xl text-[#F2D59B] leading-tight drop-shadow-[0_4px_12px_rgba(0,0,0,0.9)]">
                                {{ $groomName }}
                            </h4>
                            <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] font-normal leading-relaxed max-w-xs mx-auto">
                                {{ $groomParents }}
                            </p>
                        </div>

                        @if($groomInstagram)
                        <div class="pt-1 reveal-item anim-amber-pop delay-3">
                            <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] text-xs text-[#161514] font-bold transition shadow-md font-amber-title tracking-wider cursor-pointer group hover:brightness-110">
                                <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                            </a>
                        </div>
                        @endif
                    </div>

                    <!-- Floral Crest Bottom Ornament -->
                    <div class="w-48 sm:w-60 mx-auto pt-4 pb-1 pointer-events-none reveal-item anim-amber-bloom delay-3">
                        <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                    </div>
                </div>

                <!-- Golden Wavy Ribbon Divider -->
                <div class="w-full pt-6 pointer-events-none reveal-item anim-amber-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
                </div>
            </div>
            @elseif($currentThemeId == 13 || $isSummerVibes)
            <!-- ================= THEME 13 BESPOKE PASANGAN MEMPELAI (PREMIUM SUMMER VIBES) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-7 text-center text-[#1E293B] py-6 relative">
                <!-- Main Card in Sandy Linen with Cobalt Border -->
                <div class="rounded-3xl bg-[#FAF8F5] border-2 border-[#1D63B8]/30 p-6 sm:p-10 shadow-[0_16px_50px_rgba(29,99,184,0.12)] relative space-y-6 text-center reveal-item anim-summer-stamp">
                    <!-- Top Badge -->
                    <span class="inline-block px-4 py-1 rounded-full bg-[#1D63B8]/10 border border-[#1D63B8]/30 text-[#1D63B8] font-serif text-[10px] sm:text-[11px] tracking-[0.35em] uppercase font-bold">
                        THE HAPPY COUPLE
                    </span>

                    <h3 class="font-serif text-2xl sm:text-3xl font-bold tracking-wide text-[#1D63B8]">
                        Assalamu’alaikum Warahmatullahi Wabarakatuh
                    </h3>

                    <div class="w-24 sm:w-28 mx-auto pointer-events-none my-1">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>

                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed max-w-sm mx-auto font-normal">
                        Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan. Dengan memohon rahmat dan ridho-Nya, kami mengundang Anda dalam perayaan ikatan suci kami:
                    </p>

                    <!-- 1. The Bride (Mempelai Wanita) in Postage Stamp Frame -->
                    <div class="pt-4 space-y-3.5 reveal-item anim-summer-stamp">
                        <div class="theme-summer-stamp w-44 sm:w-52 mx-auto drop-shadow-[0_12px_30px_rgba(29,99,184,0.2)]">
                            <div class="theme-summer-stamp-photo">
                                <img src="{{ $t13BridePhoto }}" alt="{{ $invitation->bride_name }}" class="w-full h-full object-cover">
                            </div>
                            <img src="{{ asset('images/themes/summer-vibes/stamp-frame.png') }}" alt="" class="theme-summer-stamp-overlay">
                        </div>

                        <div class="space-y-1">
                            <h4 class="text-2xl sm:text-3xl text-[#D94B26] font-normal"
                                style="font-family: 'Shrikhand', 'Titan One', cursive;">
                                {{ $invitation->bride_name ?? 'Dea Febriana, PhD' }}
                            </h4>
                            <p class="text-xs sm:text-sm text-slate-600 max-w-xs mx-auto leading-relaxed">
                                {{ $invitation->bride_parents ?? 'Putri pertama dari Bpk. Sumarni & Ibu Maryati' }}
                            </p>
                            @if(!empty($invitation->bride_instagram))
                            <div class="pt-2">
                                <a href="https://instagram.com/{{ ltrim($invitation->bride_instagram, '@') }}" target="_blank" rel="noopener noreferrer" 
                                   class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-[#1D63B8] text-white hover:bg-[#154c8f] text-xs font-semibold shadow-sm transition-all hover:scale-105 active:scale-95">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    <span>{{ '@' . ltrim($invitation->bride_instagram, '@') }}</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Center Floral & Ampersand Divider -->
                    <div class="py-2 flex items-center justify-center gap-3 reveal-item anim-fade-up">
                        <span class="w-16 h-0.5 bg-[#1D63B8]/30"></span>
                        <div class="w-10 h-10 rounded-full bg-[#D94B26] text-white flex items-center justify-center font-bold text-lg shadow-md"
                             style="font-family: 'Shrikhand', cursive;">
                            &amp;
                        </div>
                        <span class="w-16 h-0.5 bg-[#1D63B8]/30"></span>
                    </div>

                    <!-- 2. The Groom (Mempelai Pria) in Postage Stamp Frame -->
                    <div class="pt-2 space-y-3.5 reveal-item anim-summer-stamp">
                        <div class="theme-summer-stamp w-44 sm:w-52 mx-auto drop-shadow-[0_12px_30px_rgba(29,99,184,0.2)]">
                            <div class="theme-summer-stamp-photo">
                                <img src="{{ $t13GroomPhoto }}" alt="{{ $invitation->groom_name }}" class="w-full h-full object-cover">
                            </div>
                            <img src="{{ asset('images/themes/summer-vibes/stamp-frame.png') }}" alt="" class="theme-summer-stamp-overlay">
                        </div>

                        <div class="space-y-1">
                            <h4 class="text-2xl sm:text-3xl text-[#D94B26] font-normal"
                                style="font-family: 'Shrikhand', 'Titan One', cursive;">
                                {{ $invitation->groom_name ?? 'Dion Yunus, S.T.' }}
                            </h4>
                            <p class="text-xs sm:text-sm text-slate-600 max-w-xs mx-auto leading-relaxed">
                                {{ $invitation->groom_parents ?? 'Putra pertama dari Bpk. Yunus & Ibu Kartini' }}
                            </p>
                            @if(!empty($invitation->groom_instagram))
                            <div class="pt-2">
                                <a href="https://instagram.com/{{ ltrim($invitation->groom_instagram, '@') }}" target="_blank" rel="noopener noreferrer" 
                                   class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-[#1D63B8] text-white hover:bg-[#154c8f] text-xs font-semibold shadow-sm transition-all hover:scale-105 active:scale-95">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    <span>{{ '@' . ltrim($invitation->groom_instagram, '@') }}</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Bottom Blue Floral Divider -->
                    <div class="w-28 sm:w-36 mx-auto pt-3 pointer-events-none">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 16 || $isMuseumOfLove)
            <!-- ================= THEME 16 BESPOKE PASANGAN MEMPELAI (PREMIUM MUSEUM OF LOVE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-7 text-center text-[#2A1F1D] py-6 relative">
                <!-- Wall Sconce Lantern on Left & Right Walls (Hidden on smartphone to prevent clash with card, visible on fullscreen/desktop) -->
                <div class="hidden md:block absolute top-10 left-1 sm:left-4 w-16 sm:w-24 pointer-events-none z-10 anim-lantern-sway drop-shadow-[0_10px_25px_rgba(234,179,8,0.35)]">
                    <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain">
                </div>
                <div class="hidden md:block absolute top-10 right-1 sm:right-4 w-16 sm:w-24 pointer-events-none z-10 anim-lantern-sway-delayed drop-shadow-[0_10px_25px_rgba(234,179,8,0.35)]">
                    <img src="{{ asset('images/themes/museum-love/lantern.png') }}" alt="Vintage Lantern" class="w-full h-auto object-contain transform -scale-x-100">
                </div>

                <!-- Main Exhibition Card in Cream Parchment with Gold Border -->
                <div class="rounded-2xl sm:rounded-3xl bg-[#FFFDF9] border border-[#D4AF37]/50 p-6 sm:p-10 shadow-[0_16px_50px_rgba(0,0,0,0.08)] relative space-y-5 text-center reveal-item anim-museum-card">
                    <!-- Top Museum Badge -->
                    <span class="inline-block px-3.5 py-1 rounded-sm bg-[#8B1E22]/10 border border-[#D4AF37]/50 text-[#8B1E22] font-museum-title text-[9px] sm:text-[10px] tracking-[0.35em] uppercase font-bold shadow-xs">
                        THE ROYAL COUPLE
                    </span>
                    <h3 class="font-museum-title text-2xl sm:text-3xl font-bold tracking-wide text-[#8B1E22]">
                        Assalamu’alaikum Warahmatullahi Wabarakatuh
                    </h3>
                    <p class="font-museum-body text-xs sm:text-sm text-[#6B5A55] leading-relaxed max-w-sm mx-auto pt-1 font-normal">
                        Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan. Dengan memohon rahmat dan ridho-Nya, kami mengundang Anda dalam perayaan ikatan suci kami:
                    </p>

                    <!-- 1. The Bride (Mempelai Wanita) in Baroque Gold Frame -->
                    <div class="pt-4 space-y-3">
                        <div class="museum-frame-container anim-museum-frame">
                            <div class="museum-frame-photo overflow-hidden bg-[#241A15] shadow-inner">
                                <img src="{{ $t16BridePhoto }}" alt="{{ $brideName }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                            </div>
                            <img src="{{ asset('images/themes/museum-love/photo-frame.png') }}" 
                                 alt="Bingkai Foto Mempelai Wanita" 
                                 class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-2xl">
                        </div>

                        <!-- Bride Details -->
                        <div class="space-y-1.5 pt-1 reveal-item anim-fade-up delay-2">
                            <h4 class="font-museum-title text-2xl sm:text-3xl text-[#8B1E22] leading-tight font-bold tracking-wide">
                                {{ $brideName }}
                            </h4>
                            <p class="font-museum-body text-xs sm:text-sm text-[#6B5A55] font-normal leading-relaxed max-w-xs mx-auto">
                                {{ $brideParents }}
                            </p>
                        </div>

                        <!-- 4 Circular Social Icon Buttons (Matching Mockup: Instagram, Facebook, X, YouTube) -->
                        <div class="pt-2 flex items-center justify-center gap-2.5 reveal-item anim-fade-up delay-2">
                            <a href="https://instagram.com/{{ ltrim($brideInstagram ?? 'instagram', '@') }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-[#4A0A0D] hover:bg-[#701518] text-white flex items-center justify-center shadow-md hover:scale-110 active:scale-95 transition-all cursor-pointer border border-[#D4AF37]/40" title="Instagram">
                                <svg class="w-4 h-4 fill-current text-[#F3D89A]" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#4A0A0D] hover:bg-[#701518] text-white flex items-center justify-center shadow-md hover:scale-110 active:scale-95 transition-all cursor-pointer border border-[#D4AF37]/40" title="Facebook">
                                <svg class="w-4 h-4 fill-current text-[#F3D89A]" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#4A0A0D] hover:bg-[#701518] text-white flex items-center justify-center shadow-md hover:scale-110 active:scale-95 transition-all cursor-pointer border border-[#D4AF37]/40" title="X (Twitter)">
                                <svg class="w-3.5 h-3.5 fill-current text-[#F3D89A]" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#4A0A0D] hover:bg-[#701518] text-white flex items-center justify-center shadow-md hover:scale-110 active:scale-95 transition-all cursor-pointer border border-[#D4AF37]/40" title="YouTube">
                                <svg class="w-4 h-4 fill-current text-[#F3D89A]" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Gold Ampersand Brooch Medallion (Exact Match to User Mockup Image!) -->
                    <div class="py-3 select-none reveal-item anim-fade-up delay-2 flex items-center justify-center">
                        <img src="{{ asset('images/themes/museum-love/gold-brooch.png') }}" alt="Gold Brooch Medallion" class="w-24 sm:w-28 h-auto object-contain drop-shadow-md hover:scale-105 transition-transform duration-300">
                    </div>

                    <!-- 2. The Groom (Mempelai Pria) in Baroque Gold Frame -->
                    <div class="space-y-3 pb-2">
                        <div class="museum-frame-container anim-museum-frame">
                            <div class="museum-frame-photo overflow-hidden bg-[#241A15] shadow-inner">
                                <img src="{{ $t16GroomPhoto }}" alt="{{ $groomName }}" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700">
                            </div>
                            <img src="{{ asset('images/themes/museum-love/photo-frame.png') }}" 
                                 alt="Bingkai Foto Mempelai Pria" 
                                 class="absolute inset-0 w-full h-full object-contain pointer-events-none z-10 drop-shadow-2xl">
                        </div>

                        <!-- Groom Details -->
                        <div class="space-y-1.5 pt-1 reveal-item anim-fade-up delay-3">
                            <h4 class="font-museum-title text-2xl sm:text-3xl text-[#8B1E22] leading-tight font-bold tracking-wide">
                                {{ $groomName }}
                            </h4>
                            <p class="font-museum-body text-xs sm:text-sm text-[#6B5A55] font-normal leading-relaxed max-w-xs mx-auto">
                                {{ $groomParents }}
                            </p>
                        </div>

                        <!-- 4 Circular Social Icon Buttons (Matching Mockup: Instagram, Facebook, X, YouTube) -->
                        <div class="pt-2 flex items-center justify-center gap-2.5 reveal-item anim-fade-up delay-3">
                            <a href="https://instagram.com/{{ ltrim($groomInstagram ?? 'instagram', '@') }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-[#4A0A0D] hover:bg-[#701518] text-white flex items-center justify-center shadow-md hover:scale-110 active:scale-95 transition-all cursor-pointer border border-[#D4AF37]/40" title="Instagram">
                                <svg class="w-4 h-4 fill-current text-[#F3D89A]" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#4A0A0D] hover:bg-[#701518] text-white flex items-center justify-center shadow-md hover:scale-110 active:scale-95 transition-all cursor-pointer border border-[#D4AF37]/40" title="Facebook">
                                <svg class="w-4 h-4 fill-current text-[#F3D89A]" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#4A0A0D] hover:bg-[#701518] text-white flex items-center justify-center shadow-md hover:scale-110 active:scale-95 transition-all cursor-pointer border border-[#D4AF37]/40" title="X (Twitter)">
                                <svg class="w-3.5 h-3.5 fill-current text-[#F3D89A]" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-full bg-[#4A0A0D] hover:bg-[#701518] text-white flex items-center justify-center shadow-md hover:scale-110 active:scale-95 transition-all cursor-pointer border border-[#D4AF37]/40" title="YouTube">
                                <svg class="w-4 h-4 fill-current text-[#F3D89A]" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Vintage Gifts, Letters, Wax Seals & Clock Divider -->
                <div class="w-full max-w-lg mx-auto pt-4 pointer-events-none reveal-item anim-fade-up delay-3">
                    <img src="{{ asset('images/themes/museum-love/gifts-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @elseif($currentThemeId == 20 || $isDarkElegance)
            <!-- ================= THEME 20 BESPOKE PASANGAN MEMPELAI (PREMIUM SERENADE DARK ELEGANCE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-7 text-center text-[#FAF7F2] py-4">
                <!-- Section Header -->
                <div class="space-y-1.5 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.3em] uppercase text-[#9EB092] font-semibold block">
                        KEDUA MEMPELAI
                    </span>
                    <h3 class="font-serif text-lg sm:text-xl font-bold tracking-wide text-[#FAF7F2]">
                        Assalamu’alaikum Warahmatullahi Wabarakatuh
                    </h3>
                    <p class="font-serif text-xs text-[#D5DDD0] font-light leading-relaxed max-w-sm mx-auto pt-1">
                        Maha Suci Allah yang telah menciptakan makhluk-Nya berpasang-pasangan. Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud melangsungkan pernikahan kami:
                    </p>
                </div>

                <!-- 1. The Bride Card (Lisa Salsabila) with Leaf Branch Ornament -->
                <div class="w-full max-w-[280px] sm:max-w-[320px] mx-auto rounded-[28px] p-3 sm:p-3.5 bg-[#131713] border-2 border-[#9EB092] relative shadow-2xl space-y-3.5 reveal-item anim-card-rise delay-1">
                    <!-- Leaf Branch Sprouting from Top-Right Corner of Border -->
                    <div class="absolute -top-10 -right-7 sm:-right-8 w-20 sm:w-24 h-auto pointer-events-none z-20 reveal-item anim-vine-right delay-2">
                        <img src="{{ asset('images/themes/serenade-dark/leaf-branch.png') }}" alt="" class="w-full h-auto object-contain anim-leaf-sway">
                    </div>

                    <!-- Photo in Rounded Frame -->
                    <div class="w-full aspect-[4/5] rounded-2xl overflow-hidden shadow-lg bg-stone-900 group">
                        <img src="{{ $t20BridePhoto }}" alt="{{ $brideName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>

                    <!-- Bride Details -->
                    <div class="space-y-1 pt-0.5">
                        <h4 class="font-serif text-lg sm:text-xl font-bold tracking-wide text-[#FAF7F2]">
                            {{ $brideName }}
                        </h4>
                        <p class="font-serif text-xs text-[#9EB092] font-light leading-relaxed max-w-xs mx-auto">
                            {{ $brideParents }}
                        </p>
                    </div>

                    @if($brideInstagram)
                    <div class="pt-0.5">
                        <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#1A211A] hover:bg-[#9EB092] hover:text-[#070807] border border-[#9EB092]/50 text-[11px] text-[#FAF7F2] transition shadow-xs font-serif cursor-pointer group">
                            <svg class="w-3 h-3 text-[#9EB092] group-hover:text-[#070807] transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Center Ampersand Divider -->
                <div class="py-1 select-none reveal-item anim-pop-in delay-2">
                    <span class="font-serif text-5xl sm:text-6xl text-[#9EB092] font-light block leading-none">&amp;</span>
                </div>

                <!-- 2. The Groom Card (Theo Pratama) with Flipped Leaf Branch Ornament -->
                <div class="w-full max-w-[280px] sm:max-w-[320px] mx-auto rounded-[28px] p-3 sm:p-3.5 bg-[#131713] border-2 border-[#9EB092] relative shadow-2xl space-y-3.5 reveal-item anim-card-rise delay-2">
                    <!-- Flipped Leaf Branch Sprouting from Top-Left Corner of Border -->
                    <div class="absolute -top-10 -left-7 sm:-left-8 w-20 sm:w-24 h-auto pointer-events-none z-20 reveal-item anim-vine-left delay-3">
                        <img src="{{ asset('images/themes/serenade-dark/leaf-branch.png') }}" alt="" class="w-full h-auto object-contain -scale-x-100 anim-leaf-sway">
                    </div>

                    <!-- Photo in Rounded Frame -->
                    <div class="w-full aspect-[4/5] rounded-2xl overflow-hidden shadow-lg bg-stone-900 group">
                        <img src="{{ $t20GroomPhoto }}" alt="{{ $groomName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>

                    <!-- Groom Details -->
                    <div class="space-y-1 pt-0.5">
                        <h4 class="font-serif text-lg sm:text-xl font-bold tracking-wide text-[#FAF7F2]">
                            {{ $groomName }}
                        </h4>
                        <p class="font-serif text-xs text-[#9EB092] font-light leading-relaxed max-w-xs mx-auto">
                            {{ $groomParents }}
                        </p>
                    </div>

                    @if($groomInstagram)
                    <div class="pt-0.5">
                        <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-[#1A211A] hover:bg-[#9EB092] hover:text-[#070807] border border-[#9EB092]/50 text-[11px] text-[#FAF7F2] transition shadow-xs font-serif cursor-pointer group">
                            <svg class="w-3 h-3 text-[#9EB092] group-hover:text-[#070807] transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Symmetrical Flower Divider Below Mempelai -->
                <div class="w-48 sm:w-64 mx-auto pt-6 reveal-item anim-floral-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-dark/floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
            @else
            <div class="theme-arch-frame bg-white p-6 sm:p-10 md:p-14 shadow-lg w-full mx-auto relative reveal-item anim-border">
                
                @if($currentThemeId == 1)
                <!-- Corner Botanical Sprigs for Theme 1 Profil Mempelai -->
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/maroon-delicate-top.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -top-3.5 -left-3.5 sm:-top-4 sm:-left-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tl delay-1">
                    <img src="/images/themes/bg/maroon-delicate-top-left.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @elseif($currentThemeId == 19)
                <!-- Corner Butterflies for Theme 19 Profil Mempelai -->
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/lavender-butterflies.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -top-3.5 -left-3.5 sm:-top-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-tl delay-1">
                    <img src="/images/themes/bg/lavender-butterflies-flip.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @endif

                <p class="theme-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-[var(--text-muted)] font-semibold reveal-item anim-title delay-1">
                    The Groom &amp; Bride
                </p>
                <h2 class="theme-heading text-2xl sm:text-4xl font-bold text-[var(--text-main)] mt-1 mb-2 reveal-item anim-title delay-1">
                    Pasangan Mempelai
                </h2>

                @if($currentThemeId == 1)
                <div class="w-48 sm:w-56 mx-auto my-3 pointer-events-none reveal-item anim-fade-up delay-1">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>
                @elseif($currentThemeId == 19)
                <div class="w-36 sm:w-48 h-7 mx-auto my-3 pointer-events-none reveal-item anim-flower-center delay-1">
                    <img src="/images/themes/bg/lavender-wildflowers.svg" alt="" class="w-full h-full">
                </div>
                @endif
                <p class="text-xs sm:text-sm text-[var(--text-muted)] max-w-lg mx-auto leading-relaxed mb-10 reveal-item anim-fade-up delay-2">
                    Assalamu’alaikum Warahmatullahi Wabarakatuh.<br>
                    Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud mengumumkan pernikahan putra-putri kami:
                </p>

                <!-- Dual Columns on Desktop (Side by Side) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
                    
                    <!-- PROFIL MEMPELAI PRIA -->
                    <div class="space-y-3 reveal-item anim-fade-up delay-2">
                        <div class="w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center shadow-md bg-[var(--bg-accent-light)] theme-profile-photo-shape">
                            @if(!empty($invitation->groom_photo))
                                <img src="{{ Str::startsWith($invitation->groom_photo, ['http://', 'https://']) ? $invitation->groom_photo : asset('storage/' . $invitation->groom_photo) }}" alt="Mempelai Pria" class="w-full h-full object-cover">
                            @else
                                <div class="placeholder-avatar w-full h-full bg-[#8B3A1C] flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white/70" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                            @endif
                            <div class="absolute -bottom-2 inset-x-0 h-6 flex justify-center">
                                <span class="px-2 py-0.5 rounded-full bg-white/95 shadow-xs border border-[var(--border-frame)]/40 text-[9px] font-bold text-[var(--text-accent)] uppercase tracking-wider">Groom</span>
                            </div>
                        </div>

                        <h3 class="theme-script text-3xl sm:text-4xl md:text-5xl text-[var(--text-accent)] pt-2 leading-normal overflow-visible">
                            {{ $groomName }}
                        </h3>
                        <p class="text-xs sm:text-sm text-[var(--text-muted)] font-light max-w-xs mx-auto">
                            {{ $groomParents }}
                        </p>
                        @if($groomInstagram)
                        <a href="https://instagram.com/{{ ltrim($groomInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[var(--bg-accent-light)] text-[var(--text-accent)] text-[10px] sm:text-xs font-semibold hover:opacity-80 transition">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>&#64;{{ ltrim($groomInstagram, '@') }}</span>
                        </a>
                        @endif
                    </div>

                    <!-- PROFIL MEMPELAI WANITA -->
                    <div class="space-y-3 reveal-item anim-fade-up delay-3">
                        <div class="w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center shadow-md bg-[var(--bg-accent-light)] theme-profile-photo-shape">
                            @if(!empty($invitation->bride_photo))
                                <img src="{{ Str::startsWith($invitation->bride_photo, ['http://', 'https://']) ? $invitation->bride_photo : asset('storage/' . $invitation->bride_photo) }}" alt="Mempelai Wanita" class="w-full h-full object-cover">
                            @else
                                <div class="placeholder-avatar w-full h-full bg-[#65011E] flex items-center justify-center">
                                    <svg class="w-12 h-12 text-white/70" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                </div>
                            @endif
                            <div class="absolute -bottom-2 inset-x-0 h-6 flex justify-center">
                                <span class="px-2 py-0.5 rounded-full bg-white/95 shadow-xs border border-[var(--border-frame)]/40 text-[9px] font-bold text-[var(--text-accent)] uppercase tracking-wider">Bride</span>
                            </div>
                        </div>

                        <h3 class="theme-script text-3xl sm:text-4xl md:text-5xl text-[var(--text-accent)] pt-2 leading-normal overflow-visible">
                            {{ $brideName }}
                        </h3>
                        <p class="text-xs sm:text-sm text-[var(--text-muted)] font-light max-w-xs mx-auto">
                            {{ $brideParents }}
                        </p>
                        @if($brideInstagram)
                        <a href="https://instagram.com/{{ ltrim($brideInstagram, '@') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[var(--bg-accent-light)] text-[var(--text-accent)] text-[10px] sm:text-xs font-semibold hover:opacity-80 transition">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            <span>&#64;{{ ltrim($brideInstagram, '@') }}</span>
                        </a>
                        @endif
                    </div>
                </div>

                @if($currentThemeId == 19)
                <div class="w-full pointer-events-none mt-8 -mb-6 sm:-mb-14">
                    <img src="/images/themes/bg/lavender-meadow-bottom.svg" alt="" class="w-full h-10 sm:h-12 object-cover opacity-85">
                </div>
                @endif
            </div>
            @endif
        </section>


        <!-- ================= 5. SECTION HITUNG MUNDUR (COUNTDOWN TIMER BLOCK) ================= -->
        @if($currentThemeId != 1)
        <section id="section-countdown" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
            @if($currentThemeId == 2)
            <!-- THEME 2 BESPOKE COUNTDOWN TIMER (BASIC HARMONY EMERALD) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45 reveal-item anim-fade-up">
                <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-6 sm:p-8 text-center space-y-5">
                    <!-- Gold Interlocking Rings Divider -->
                    <div class="w-44 sm:w-52 h-6 mx-auto">
                        <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
                    </div>

                    <div class="space-y-1">
                        <p class="text-[10px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-emerald-200">
                            SAVE THE DATE
                        </p>
                        <h3 class="font-heading text-lg sm:text-2xl font-bold text-white tracking-wider">
                            Menuju Hari Bahagia
                        </h3>
                    </div>

                    <!-- 4 Gold Rimmed Countdown Boxes -->
                    <div class="grid grid-cols-4 gap-2 sm:gap-3 max-w-xs sm:max-w-sm mx-auto pt-2">
                        <div class="p-2 sm:p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/50 shadow-md text-center">
                            <span id="countdown-days" class="block text-xl sm:text-2xl font-black font-mono text-[#E5C158] leading-none">00</span>
                            <span class="text-[9px] uppercase font-sans tracking-wider text-emerald-200 mt-1 block">Hari</span>
                        </div>
                        <div class="p-2 sm:p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/50 shadow-md text-center">
                            <span id="countdown-hours" class="block text-xl sm:text-2xl font-black font-mono text-[#E5C158] leading-none">00</span>
                            <span class="text-[9px] uppercase font-sans tracking-wider text-emerald-200 mt-1 block">Jam</span>
                        </div>
                        <div class="p-2 sm:p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/50 shadow-md text-center">
                            <span id="countdown-minutes" class="block text-xl sm:text-2xl font-black font-mono text-[#E5C158] leading-none">00</span>
                            <span class="text-[9px] uppercase font-sans tracking-wider text-emerald-200 mt-1 block">Menit</span>
                        </div>
                        <div class="p-2 sm:p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/50 shadow-md text-center">
                            <span id="countdown-seconds" class="block text-xl sm:text-2xl font-black font-mono text-[#E5C158] leading-none">00</span>
                            <span class="text-[9px] uppercase font-sans tracking-wider text-emerald-200 mt-1 block">Detik</span>
                        </div>
                    </div>

                    <!-- Date text -->
                    <p class="text-xs sm:text-sm text-white/90 font-medium">
                        {{ $eventDateFormatted }}
                    </p>

                    <!-- Simpan Tanggal Button -->
                    <div class="pt-2">
                        <button type="button" onclick="saveTheDateCalendar()" class="px-8 py-2.5 rounded-full bg-gradient-to-r from-[#9C782F] via-[#C59B3F] to-[#8F6C25] hover:from-[#AD8737] hover:to-[#9C782F] border border-[#F3E196]/80 text-white font-bold text-xs sm:text-sm tracking-wider uppercase shadow-xl inline-flex items-center gap-2 cursor-pointer transition transform active:scale-95">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan di Kalender</span>
                        </button>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 3)
            <!-- THEME 3 BESPOKE COUNTDOWN TIMER (BASIC HARMONY NAVY - MATCHING IMAGE 2 SECTION 5) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto rounded-2xl shadow-xl bg-[#1E3A5F] text-white p-5 sm:p-7 relative border border-white/20 reveal-item anim-fade-up">
                <div class="text-center space-y-4">
                    <div class="reveal-item anim-fade-up delay-1">
                        <span class="text-[10px] sm:text-xs font-semibold tracking-[0.3em] uppercase text-sky-200 font-heading block">
                            MENGHITUNG HARI
                        </span>
                        <h3 class="font-heading text-xl sm:text-2xl font-bold tracking-wider text-white mt-1">
                            COUNTDOWN
                        </h3>
                    </div>

                    <div class="grid grid-cols-4 gap-2 sm:gap-3 py-2">
                        <div class="bg-white/10 backdrop-blur-md rounded-xl p-2.5 sm:p-3.5 border border-white/20 text-center reveal-item anim-zoom-in delay-1">
                            <span id="days-3" class="font-mono text-2xl sm:text-3xl font-bold text-white block">{{ $invitation->days_remaining ?? '00' }}</span>
                            <span class="text-[9px] sm:text-[10px] uppercase tracking-wider text-slate-200 mt-0.5 block">Hari</span>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md rounded-xl p-2.5 sm:p-3.5 border border-white/20 text-center reveal-item anim-zoom-in delay-2">
                            <span id="hours-3" class="font-mono text-2xl sm:text-3xl font-bold text-white block">00</span>
                            <span class="text-[9px] sm:text-[10px] uppercase tracking-wider text-slate-200 mt-0.5 block">Jam</span>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md rounded-xl p-2.5 sm:p-3.5 border border-white/20 text-center reveal-item anim-zoom-in delay-3">
                            <span id="minutes-3" class="font-mono text-2xl sm:text-3xl font-bold text-white block">00</span>
                            <span class="text-[9px] sm:text-[10px] uppercase tracking-wider text-slate-200 mt-0.5 block">Menit</span>
                        </div>
                        <div class="bg-white/10 backdrop-blur-md rounded-xl p-2.5 sm:p-3.5 border border-white/20 text-center reveal-item anim-zoom-in delay-4">
                            <span id="seconds-3" class="font-mono text-2xl sm:text-3xl font-bold text-white block">00</span>
                            <span class="text-[9px] sm:text-[10px] uppercase tracking-wider text-slate-200 mt-0.5 block">Detik</span>
                        </div>
                    </div>

                    <div class="pt-2 reveal-item anim-fade-up delay-3">
                        <button type="button" onclick="saveTheDateCalendar()" class="px-6 py-2.5 rounded-full bg-white text-[#1E3A5F] hover:bg-slate-100 font-bold text-xs tracking-wider uppercase inline-flex items-center gap-2 transition shadow-md cursor-pointer">
                            <svg class="w-4 h-4 text-[#1E3A5F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>SIMPAN KE KALENDER</span>
                        </button>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 5)
            <!-- ================= THEME 5 BESPOKE COUNTDOWN & AYAT AL-QUR'AN (BASIC HARMONY MONOCHROME - MATCHING IMAGE 5) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-3xl overflow-hidden shadow-2xl relative p-6 sm:p-10 text-white text-center reveal-item anim-card-3d"
                 style="background-image: linear-gradient(180deg, rgba(15,15,15,0.78) 0%, rgba(20,20,20,0.7) 50%, rgba(15,15,15,0.88) 100%), url('{{ $t5CountdownPhoto }}'); background-size: cover; background-position: center;">
                
                <div class="space-y-6 relative z-10">
                    <!-- Title: Count The Date -->
                    <div class="space-y-1">
                        <h2 class="theme-script text-4xl sm:text-5xl text-white font-normal drop-shadow-md reveal-item anim-script delay-1">
                            Count The Date
                        </h2>
                        <p class="font-serif text-xs tracking-widest text-stone-300 uppercase font-light reveal-item anim-fade-up delay-2">
                            Menuju Hari Bahagia
                        </p>
                    </div>

                    <!-- 4 Dark Countdown Boxes with Thin White Border -->
                    <div class="grid grid-cols-4 gap-2 sm:gap-3 max-w-xs sm:max-w-sm mx-auto pt-1 font-mono">
                        <div class="p-2 sm:p-3 rounded-2xl bg-black/60 backdrop-blur-md border border-white/40 shadow-xl text-center reveal-item anim-pop-in delay-1">
                            <span id="countdown-days" class="block text-2xl sm:text-3xl font-bold text-white leading-none">00</span>
                            <span class="text-[9px] uppercase font-serif tracking-wider text-stone-300 mt-1 block">Hari</span>
                        </div>
                        <div class="p-2 sm:p-3 rounded-2xl bg-black/60 backdrop-blur-md border border-white/40 shadow-xl text-center reveal-item anim-pop-in delay-2">
                            <span id="countdown-hours" class="block text-2xl sm:text-3xl font-bold text-white leading-none">00</span>
                            <span class="text-[9px] uppercase font-serif tracking-wider text-stone-300 mt-1 block">Jam</span>
                        </div>
                        <div class="p-2 sm:p-3 rounded-2xl bg-black/60 backdrop-blur-md border border-white/40 shadow-xl text-center reveal-item anim-pop-in delay-3">
                            <span id="countdown-minutes" class="block text-2xl sm:text-3xl font-bold text-white leading-none">00</span>
                            <span class="text-[9px] uppercase font-serif tracking-wider text-stone-300 mt-1 block">Menit</span>
                        </div>
                        <div class="p-2 sm:p-3 rounded-2xl bg-black/60 backdrop-blur-md border border-white/40 shadow-xl text-center reveal-item anim-pop-in delay-4">
                            <span id="countdown-seconds" class="block text-2xl sm:text-3xl font-bold text-white leading-none">00</span>
                            <span class="text-[9px] uppercase font-serif tracking-wider text-stone-300 mt-1 block">Detik</span>
                        </div>
                    </div>

                    <!-- Button: Simpan Tanggal -->
                    <div class="pt-1 reveal-item anim-pop-in delay-4">
                        <button type="button" onclick="saveTheDateCalendar()" class="px-7 sm:px-9 py-2.5 rounded-full bg-black/55 hover:bg-black/80 backdrop-blur-md border border-white/60 text-white font-serif text-xs sm:text-sm tracking-wider uppercase inline-flex items-center gap-2 transition active:scale-95 shadow-xl cursor-pointer">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>Simpan tanggal</span>
                        </button>
                    </div>

                    <!-- Hairline Divider -->
                    <div class="w-20 h-px bg-white/30 mx-auto my-4 reveal-item anim-bar-grow delay-4"></div>

                    <!-- Ayat Al-Qur'an (QS. Ar-Rum 21) -->
                    <div class="space-y-3 pt-1">
                        @if(!empty($invitation->quran_text))
                        <p class="text-lg sm:text-xl leading-loose font-serif text-white/95 reveal-item anim-luxury-up delay-4" dir="rtl">
                            {{ $invitation->quran_text }}
                        </p>
                        @endif

                        <p class="text-xs sm:text-sm text-stone-200 leading-relaxed italic font-light max-w-md mx-auto reveal-item anim-fade-up delay-5">
                            "{{ $invitation->quran_translation ?? 'Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berpikir.' }}"
                        </p>

                        <p class="text-[10px] sm:text-xs font-serif font-semibold text-stone-300 tracking-widest uppercase reveal-item anim-fade-up delay-5">
                            ( {{ $invitation->quote_source ?? 'QS. Ar-Rum: 21' }} )
                        </p>
                    </div>
                </div>
            </div>
            @else
            <div class="max-w-xl mx-auto space-y-5 relative z-10 bg-[var(--bg-accent-block)] p-8 sm:p-12 rounded-3xl text-white shadow-xl">
                <p class="text-xs uppercase tracking-[0.25em] font-medium text-white/80">Save The Date</p>
                <h2 class="theme-heading text-2xl sm:text-4xl font-bold text-white">Menuju Hari Bahagia</h2>

                <!-- 4 Kotak Indikator Putih Berdampingan -->
                <div class="grid grid-cols-4 gap-2.5 sm:gap-4 max-w-sm sm:max-w-md mx-auto">
                    <div class="p-3 sm:p-4 bg-white text-[var(--text-main)] rounded-2xl shadow-md text-center">
                        <span id="countdown-days" class="block text-2xl sm:text-4xl font-black font-mono text-[var(--text-accent)] leading-none">00</span>
                        <span class="text-[9px] sm:text-xs uppercase tracking-wider font-semibold text-stone-500 mt-1 block">Hari</span>
                    </div>
                    <div class="p-3 sm:p-4 bg-white text-[var(--text-main)] rounded-2xl shadow-md text-center">
                        <span id="countdown-hours" class="block text-2xl sm:text-4xl font-black font-mono text-[var(--text-accent)] leading-none">00</span>
                        <span class="text-[9px] sm:text-xs uppercase tracking-wider font-semibold text-stone-500 mt-1 block">Jam</span>
                    </div>
                    <div class="p-3 sm:p-4 bg-white text-[var(--text-main)] rounded-2xl shadow-md text-center">
                        <span id="countdown-minutes" class="block text-2xl sm:text-4xl font-black font-mono text-[var(--text-accent)] leading-none">00</span>
                        <span class="text-[9px] sm:text-xs uppercase tracking-wider font-semibold text-stone-500 mt-1 block">Menit</span>
                    </div>
                    <div class="p-3 sm:p-4 bg-white text-[var(--text-main)] rounded-2xl shadow-md text-center">
                        <span id="countdown-seconds" class="block text-2xl sm:text-4xl font-black font-mono text-[var(--text-accent)] leading-none">00</span>
                        <span class="text-[9px] sm:text-xs uppercase tracking-wider font-semibold text-stone-500 mt-1 block">Detik</span>
                    </div>
                </div>

                <p class="text-xs sm:text-sm text-white/90 font-medium">
                    {{ $eventDateFormatted }}
                </p>

                <button type="button" onclick="saveTheDateCalendar()" class="inline-flex items-center gap-2 px-6 sm:px-8 py-2.5 sm:py-3 rounded-full bg-white text-[var(--text-accent)] font-semibold text-xs sm:text-sm shadow-md hover:bg-stone-50 active:scale-95 transition cursor-pointer">
                    <svg class="w-4 h-4 text-[var(--text-accent)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Simpan Tanggal</span>
                </button>
            </div>
            @endif
        </section>
        @endif


        <!-- ================= 6. SECTION DETAIL ACARA (AKAD NIKAH & RESEPSI) ================= -->
        <section id="section-acara" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
            @if($currentThemeId == 2)
            <!-- THEME 2 BESPOKE RANGKAIAN ACARA (BASIC HARMONY EMERALD) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
                <!-- Section Header on White Canvas -->
                <div class="text-center space-y-1 py-1">
                    <div class="w-24 sm:w-28 h-8 mx-auto">
                        <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                    </div>
                    <p class="font-heading text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-stone-700 font-semibold">
                        {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                    </p>
                    <h3 class="font-heading text-lg sm:text-2xl font-bold text-stone-800 tracking-wider">
                        RANGKAIAN ACARA
                    </h3>
                </div>

                <!-- 2 Columns on Desktop (Akad & Resepsi) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-stretch">
                    <!-- CARD 1: AKAD NIKAH -->
                    <div class="rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45 reveal-item anim-fade-up delay-1 flex flex-col justify-between">
                        <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-5 sm:p-7 text-center space-y-5 flex flex-col justify-between h-full">
                            <div class="space-y-4">
                                <div class="w-10 h-10 mx-auto rounded-full bg-white/10 border border-[#D4AF37]/60 flex items-center justify-center text-[#E5C158] shadow-xs">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <h4 class="font-heading text-sm sm:text-base font-bold tracking-[0.25em] uppercase text-[#E5C158]">
                                    AKAD NIKAH
                                </h4>

                                <!-- Date & Time Box -->
                                <div class="bg-[#134A37] border border-[#D4AF37]/35 rounded-xl py-3 px-4 space-y-1">
                                    <p class="font-heading text-xs sm:text-sm font-bold tracking-wider text-white">
                                        {{ $eventDayName }}, {{ $eventDate->translatedFormat('d F Y') }}
                                    </p>
                                    <p class="text-xs text-emerald-200 font-medium">
                                        Pukul {{ $invitation->akad_time ? (is_string($invitation->akad_time) ? $invitation->akad_time : $invitation->akad_time->format('H:i')) : '08:00' }} - {{ $invitation->akad_end_time ?? '10:00' }} WIB
                                    </p>
                                </div>

                                <!-- Location Details -->
                                <div class="space-y-1">
                                    <p class="font-bold text-sm sm:text-base text-white">{{ $akadVenue }}</p>
                                    <p class="text-xs text-white/80 font-light leading-relaxed">{{ $akadAddress }}</p>
                                </div>
                            </div>

                            <div class="pt-3">
                                <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-gradient-to-r from-[#9C782F] via-[#C59B3F] to-[#8F6C25] hover:from-[#AD8737] hover:to-[#9C782F] border border-[#F3E196]/80 text-white font-bold text-xs tracking-wider uppercase shadow-md inline-flex items-center justify-center gap-2 transition active:scale-95">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>Buka Google Maps</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- CARD 2: RESEPSI PERNIKAHAN -->
                    <div class="rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45 reveal-item anim-fade-up delay-2 flex flex-col justify-between">
                        <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-5 sm:p-7 text-center space-y-5 flex flex-col justify-between h-full">
                            <div class="space-y-4">
                                <div class="w-10 h-10 mx-auto rounded-full bg-white/10 border border-[#D4AF37]/60 flex items-center justify-center text-[#E5C158] shadow-xs">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18z"/></svg>
                                </div>
                                <h4 class="font-heading text-sm sm:text-base font-bold tracking-[0.25em] uppercase text-[#E5C158]">
                                    RESEPSI PERNIKAHAN
                                </h4>

                                <!-- Date & Time Box -->
                                <div class="bg-[#134A37] border border-[#D4AF37]/35 rounded-xl py-3 px-4 space-y-1">
                                    <p class="font-heading text-xs sm:text-sm font-bold tracking-wider text-white">
                                        {{ $eventDayName }}, {{ $eventDate->translatedFormat('d F Y') }}
                                    </p>
                                    <p class="text-xs text-emerald-200 font-medium">
                                        Pukul {{ $invitation->event_time ? (is_string($invitation->event_time) ? $invitation->event_time : $invitation->event_time->format('H:i')) : '11:00' }} - {{ $invitation->event_end_time ?? '13:00' }} WIB
                                    </p>
                                </div>

                                <!-- Location Details -->
                                <div class="space-y-1">
                                    <p class="font-bold text-sm sm:text-base text-white">{{ $venueName }}</p>
                                    <p class="text-xs text-white/80 font-light leading-relaxed">{{ $venueAddress }}</p>
                                </div>
                            </div>

                            <div class="pt-3">
                                <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-gradient-to-r from-[#9C782F] via-[#C59B3F] to-[#8F6C25] hover:from-[#AD8737] hover:to-[#9C782F] border border-[#F3E196]/80 text-white font-bold text-xs tracking-wider uppercase shadow-md inline-flex items-center justify-center gap-2 transition active:scale-95">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>Buka Google Maps</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 3)
            <!-- THEME 3 BESPOKE RANGKAIAN ACARA (BASIC HARMONY NAVY - MATCHING IMAGE 2 SECTION 6 & 7) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
                <div class="text-center space-y-1 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-stone-500 font-heading block">
                        WAKTU &amp; TEMPAT
                    </span>
                    <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-stone-800">
                        Rangkaian Acara
                    </h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-stretch overflow-hidden py-2">
                    <!-- 1. KARTU AKAD (Arch Dome Shape matching Image 2) -->
                    <div class="rounded-t-full rounded-b-2xl shadow-xl bg-gradient-to-b from-[#F4F8FC] to-white border border-[#CBDCEB] p-6 sm:p-8 text-center flex flex-col justify-between reveal-item anim-slide-from-left delay-1">
                        <div class="space-y-4 pt-6">
                            <div class="inline-block px-5 py-1.5 rounded-full bg-[#1E3A5F] text-white font-heading text-xs font-bold tracking-widest uppercase shadow-xs">
                                AKAD NIKAH
                            </div>

                            <div class="py-2 space-y-1">
                                <p class="font-heading text-lg sm:text-xl font-bold text-[#1E3A5F] tracking-wide">
                                    {{ strtoupper($akadDate->translatedFormat('l, d F Y')) }}
                                </p>
                                <p class="text-xs sm:text-sm text-stone-600 font-medium">
                                    Pukul {{ $akadTimeFormatted }}
                                </p>
                            </div>

                            <div class="space-y-1 text-stone-700">
                                <p class="font-bold text-sm sm:text-base text-stone-900">{{ $akadVenue }}</p>
                                <p class="text-xs text-stone-600 leading-relaxed max-w-xs mx-auto">{{ $akadAddress }}</p>
                            </div>
                        </div>

                        <div class="pt-6">
                            <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-[#1E3A5F] hover:bg-[#162D4A] text-white font-semibold text-xs tracking-wider uppercase inline-flex items-center justify-center gap-2 shadow-md transition transform active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Google Maps</span>
                            </a>
                        </div>
                    </div>

                    <!-- 2. KARTU RESEPSI (Arch Dome Shape matching Image 2) -->
                    <div class="rounded-t-full rounded-b-2xl shadow-xl bg-gradient-to-b from-[#F4F8FC] to-white border border-[#CBDCEB] p-6 sm:p-8 text-center flex flex-col justify-between reveal-item anim-slide-from-right delay-2">
                        <div class="space-y-4 pt-6">
                            <div class="inline-block px-5 py-1.5 rounded-full bg-[#1E3A5F] text-white font-heading text-xs font-bold tracking-widest uppercase shadow-xs">
                                RESEPSI
                            </div>

                            <div class="py-2 space-y-1">
                                <p class="font-heading text-lg sm:text-xl font-bold text-[#1E3A5F] tracking-wide">
                                    {{ strtoupper($eventDate->translatedFormat('l, d F Y')) }}
                                </p>
                                <p class="text-xs sm:text-sm text-stone-600 font-medium">
                                    Pukul {{ $eventTimeFormatted }}
                                </p>
                            </div>

                            <div class="space-y-1 text-stone-700">
                                <p class="font-bold text-sm sm:text-base text-stone-900">{{ $venueName }}</p>
                                <p class="text-xs text-stone-600 leading-relaxed max-w-xs mx-auto">{{ $venueAddress }}</p>
                            </div>
                        </div>

                        <div class="pt-6">
                            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-[#1E3A5F] hover:bg-[#162D4A] text-white font-semibold text-xs tracking-wider uppercase inline-flex items-center justify-center gap-2 shadow-md transition transform active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Google Maps</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 3. KARTU DRESSCODE (Matching Image 2 Section 7) -->
                <div class="rounded-2xl p-5 sm:p-6 bg-[#1E3A5F] text-white shadow-xl border border-white/20 text-center max-w-md mx-auto space-y-3 reveal-item anim-fade-up delay-2">
                    <span class="text-[10px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-sky-200 font-heading block">
                        DRESSCODE
                    </span>
                    <div class="flex items-center justify-center gap-3 py-1">
                        <span class="w-6 h-6 rounded-full bg-[#1E3A5F] border-2 border-white shadow-xs" title="Navy"></span>
                        <span class="w-6 h-6 rounded-full bg-[#4B6B94] border-2 border-white shadow-xs" title="Slate Blue"></span>
                        <span class="w-6 h-6 rounded-full bg-[#FFFFFF] border-2 border-slate-300 shadow-xs" title="White"></span>
                        <span class="w-6 h-6 rounded-full bg-[#DCE7F0] border-2 border-white shadow-xs" title="Ice Blue"></span>
                    </div>
                    <p class="text-xs text-slate-200 font-light leading-relaxed max-w-xs mx-auto">
                        Nuansa Pakaian: Navy / Biru / Putih. Para tamu undangan disarankan mengenakan pakaian formal yang rapi dan sopan.
                    </p>
                </div>
            </div>
            @elseif($currentThemeId == 1)
            <!-- THEME 1 BESPOKE RANGKAIAN ACARA (BASIC HARMONY MAROON - MATCHING IMAGE 2 - NO WHITE BOXES) -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto text-center space-y-6 sm:space-y-8">
                <!-- Top Floral Branch Ornament Matching Image 1 -->
                <div class="w-48 sm:w-56 mx-auto pointer-events-none reveal-item anim-fade-up">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>

                <!-- Heading: Acara (Matching Image 2) -->
                <div class="space-y-1.5 reveal-item anim-fade-up delay-1">
                    <h2 class="text-3xl sm:text-4xl font-serif text-[#620000] tracking-wide font-normal">
                        Acara
                    </h2>
                    <p class="text-xs sm:text-sm font-serif text-[#620000] max-w-md mx-auto pt-1 leading-relaxed font-normal">
                        Kami bermaksud untuk mengundang saudara/(i) dalam acara pernikahan kami pada:
                    </p>
                </div>

                <!-- 1. AKAD NIKAH (Matching Image 2 - Borderless Canvas) -->
                <div class="space-y-2 reveal-item anim-slide-from-left delay-1 pt-2">
                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-[#620000] tracking-wide">
                        Akad Nikah
                    </h3>

                    <!-- Date Flanked by 2 Vertical Lines (Matching Image 2) -->
                    <div class="flex items-center justify-center gap-3 sm:gap-4 my-3 text-[#620000]">
                        <span class="text-base sm:text-lg font-serif font-medium w-16 text-right">{{ $akadDate->translatedFormat('M') }}</span>
                        <div class="border-x-2 border-[#620000] px-4 sm:px-6 py-0.5 text-center flex flex-col items-center">
                            <span class="text-xs sm:text-sm font-serif font-medium leading-tight">{{ $akadDate->translatedFormat('l') }}</span>
                            <span class="text-3xl sm:text-4xl font-serif font-bold leading-none mt-1">{{ $akadDate->format('d') }}</span>
                        </div>
                        <span class="text-base sm:text-lg font-serif font-medium w-16 text-left">{{ $akadDate->format('Y') }}</span>
                    </div>

                    <!-- Time -->
                    <p class="text-xs sm:text-sm font-serif font-bold text-[#620000]">
                        Pukul {{ $akadTimeFormatted }}
                    </p>

                    <!-- Venue & Address -->
                    <div class="space-y-0.5 pt-1">
                        <h4 class="text-sm sm:text-base font-serif font-bold text-[#620000]">{{ $akadVenue }}</h4>
                        <p class="text-[11px] sm:text-xs font-serif text-[#620000] max-w-xs mx-auto leading-relaxed">{{ $akadAddress }}</p>
                    </div>

                    <!-- 2 Side-by-side Deep Maroon Pill Buttons: [Simpan Tanggal] and [Navigasi Map] (Matching Image 2) -->
                    <div class="flex items-center justify-center gap-2.5 sm:gap-3 pt-3">
                        <button type="button" onclick="saveCalendarEvent('akad')" class="inline-flex items-center gap-1.5 px-5 sm:px-6 py-2 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white text-xs font-medium shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Tanggal</span>
                        </button>
                        <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-5 sm:px-6 py-2 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white text-xs font-medium shadow-md transition transform active:scale-95">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Navigasi Map</span>
                        </a>
                    </div>
                </div>

                <!-- 2. RESEPSI (Matching Image 2 - Borderless Canvas) -->
                <div class="space-y-2 reveal-item anim-slide-from-right delay-2 pt-6 sm:pt-8">
                    <h3 class="text-2xl sm:text-3xl font-serif font-bold text-[#620000] tracking-wide">
                        Resepsi
                    </h3>

                    <!-- Date Flanked by 2 Vertical Lines (Matching Image 2) -->
                    <div class="flex items-center justify-center gap-3 sm:gap-4 my-3 text-[#620000]">
                        <span class="text-base sm:text-lg font-serif font-medium w-16 text-right">{{ $eventDate->translatedFormat('M') }}</span>
                        <div class="border-x-2 border-[#620000] px-4 sm:px-6 py-0.5 text-center flex flex-col items-center">
                            <span class="text-xs sm:text-sm font-serif font-medium leading-tight">{{ $eventDate->translatedFormat('l') }}</span>
                            <span class="text-3xl sm:text-4xl font-serif font-bold leading-none mt-1">{{ $eventDate->format('d') }}</span>
                        </div>
                        <span class="text-base sm:text-lg font-serif font-medium w-16 text-left">{{ $eventDate->format('Y') }}</span>
                    </div>

                    <!-- Time -->
                    <p class="text-xs sm:text-sm font-serif font-bold text-[#620000]">
                        Pukul {{ $eventTimeFormatted }}
                    </p>

                    <!-- Venue & Address -->
                    <div class="space-y-0.5 pt-1">
                        <h4 class="text-sm sm:text-base font-serif font-bold text-[#620000]">{{ $venueName }}</h4>
                        <p class="text-[11px] sm:text-xs font-serif text-[#620000] max-w-xs mx-auto leading-relaxed">{{ $venueAddress }}</p>
                    </div>

                    <!-- 2 Side-by-side Deep Maroon Pill Buttons: [Simpan Tanggal] and [Navigasi Map] (Matching Image 2) -->
                    <div class="flex items-center justify-center gap-2.5 sm:gap-3 pt-3">
                        <button type="button" onclick="saveCalendarEvent('resepsi')" class="inline-flex items-center gap-1.5 px-5 sm:px-6 py-2 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white text-xs font-medium shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Tanggal</span>
                        </button>
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-5 sm:px-6 py-2 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white text-xs font-medium shadow-md transition transform active:scale-95">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Navigasi Map</span>
                        </a>
                    </div>
                </div>

                <!-- 3. LIVE STREAMING (Solid Deep Maroon Card - Matching Image 8) -->
                <div class="rounded-2xl bg-[#620000] text-white shadow-xl p-6 sm:p-8 text-center space-y-3.5 border border-[#4a0000] reveal-item anim-fade-up delay-3 mt-8">
                    <h4 class="font-serif text-lg sm:text-xl font-bold tracking-wider text-white">
                        Live Streaming
                    </h4>
                    <p class="font-serif text-xs sm:text-sm text-rose-100/90 font-light leading-relaxed max-w-sm mx-auto">
                        Bagi keluarga dan sahabat yang berhalangan hadir secara langsung, dapat menyaksikan momen bahagia kami melalui siaran langsung:
                    </p>
                    <div class="pt-1">
                        <a href="{{ $invitation->live_stream_url ?? 'https://youtube.com' }}" target="_blank" rel="noopener noreferrer" class="px-7 py-2.5 rounded-full bg-white hover:bg-rose-50 text-[#620000] font-bold text-xs tracking-wider uppercase inline-flex items-center gap-2 shadow-lg transition transform active:scale-95">
                            <svg class="w-4 h-4 text-[#620000]" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                            <span>Tonton Streaming</span>
                        </a>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 5)
            <!-- ================= THEME 5 BESPOKE RANGKAIAN ACARA (BASIC HARMONY MONOCHROME - MATCHING REFERENCE ARCH) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto rounded-t-[140px] sm:rounded-t-[180px] rounded-b-[140px] sm:rounded-b-[180px] overflow-hidden shadow-2xl border border-stone-800/80 my-8 text-center relative bg-[#F7F5F0] reveal-item anim-card-3d">
                
                <div class="p-6 sm:p-10 space-y-8 relative z-10">
                    <!-- 1. AKAD NIKAH -->
                    <div class="space-y-3 pt-6 sm:pt-10">
                        <h3 class="theme-script text-4xl sm:text-5xl text-stone-900 font-normal leading-tight reveal-item anim-script delay-1">
                            Akad Nikah
                        </h3>

                        <div class="space-y-0.5 pt-1 reveal-item anim-fade-up delay-2">
                            <p class="font-sans text-xs sm:text-sm font-semibold text-stone-800">
                                {{ $akadDate->translatedFormat('l, d F Y') }}
                            </p>
                            <p class="font-sans text-xs sm:text-sm text-stone-700 font-light">
                                Pukul : {{ $akadTimeFormatted }}
                            </p>
                        </div>

                        <!-- Folded Map Icon with Pin -->
                        <div class="w-7 h-7 mx-auto py-1 text-stone-900 reveal-item anim-pop-in delay-2">
                            <svg class="w-full h-full mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                        </div>

                        <div class="space-y-0.5 reveal-item anim-fade-up delay-3">
                            <p class="font-sans text-xs text-stone-600">Lokasi Acara :</p>
                            <h4 class="font-sans font-bold text-sm sm:text-base text-stone-900">{{ $akadVenue }}</h4>
                            <p class="font-sans text-xs text-stone-700 max-w-xs mx-auto leading-relaxed">{{ $akadAddress }}</p>
                        </div>

                        <div class="pt-2 reveal-item anim-pop-in delay-3">
                            <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-7 sm:px-9 py-2.5 rounded-full bg-[#18181B] hover:bg-black text-white font-sans text-xs font-medium tracking-wide inline-flex items-center justify-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                <span>Lihat Lokasi</span>
                            </a>
                        </div>
                    </div>

                    <!-- Subtle Separator -->
                    <div class="w-16 h-px bg-stone-400/50 mx-auto reveal-item anim-bar-grow delay-3"></div>

                    <!-- 2. RESEPSI -->
                    <div class="space-y-3 pb-6 sm:pb-10">
                        <h3 class="theme-script text-4xl sm:text-5xl text-stone-900 font-normal leading-tight reveal-item anim-script delay-3">
                            Resepsi
                        </h3>

                        <div class="space-y-0.5 pt-1 reveal-item anim-fade-up delay-4">
                            <p class="font-sans text-xs sm:text-sm font-semibold text-stone-800">
                                {{ $eventDate->translatedFormat('l, d F Y') }}
                            </p>
                            <p class="font-sans text-xs sm:text-sm text-stone-700 font-light">
                                Pukul : {{ $eventTimeFormatted }}
                            </p>
                        </div>

                        <!-- Folded Map Icon with Pin -->
                        <div class="w-7 h-7 mx-auto py-1 text-stone-900 reveal-item anim-pop-in delay-4">
                            <svg class="w-full h-full mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                        </div>

                        <div class="space-y-0.5 reveal-item anim-fade-up delay-5">
                            <p class="font-sans text-xs text-stone-600">Lokasi Acara :</p>
                            <h4 class="font-sans font-bold text-sm sm:text-base text-stone-900">{{ $venueName }}</h4>
                            <p class="font-sans text-xs text-stone-700 max-w-xs mx-auto leading-relaxed">{{ $venueAddress }}</p>
                        </div>

                        <div class="pt-2 reveal-item anim-pop-in delay-5">
                            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-7 sm:px-9 py-2.5 rounded-full bg-[#18181B] hover:bg-black text-white font-sans text-xs font-medium tracking-wide inline-flex items-center justify-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                                <span>Lihat Lokasi</span>
                            </a>
                        </div>
                    </div>

                    @if(!empty($invitation->live_stream_url))
                    <div class="pt-2 border-t border-stone-400/40">
                        <p class="text-xs text-stone-600 font-sans mb-2">Siaran Langsung Acara:</p>
                        <a href="{{ $invitation->live_stream_url }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2 rounded-full bg-[#18181B] hover:bg-black text-white font-sans text-xs tracking-wider inline-flex items-center gap-2 shadow-md transition active:scale-95">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                            <span>Tonton Streaming</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @elseif($currentThemeId == 20 || $isDarkElegance)
            <!-- ================= THEME 20 BESPOKE RANGKAIAN ACARA (PREMIUM SERENADE DARK ELEGANCE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-6 text-center text-[#FAF7F2] py-4">
                <!-- Section Header -->
                <div class="space-y-1.5 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.3em] uppercase text-[#9EB092] font-semibold block">
                        WAKTU &amp; TEMPAT
                    </span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold tracking-wide text-[#FAF7F2]">
                        Rangkaian Acara
                    </h3>
                    <p class="font-serif text-xs text-[#D5DDD0] font-light leading-relaxed max-w-xs mx-auto">
                        Dengan penuh rasa syukur, kami mengundang Anda untuk hadir pada hari bahagia kami:
                    </p>
                </div>

                <!-- 1. KARTU AKAD NIKAH -->
                <div class="rounded-3xl bg-[#131713] border border-[#9EB092]/60 p-6 sm:p-8 shadow-2xl relative space-y-4 text-center reveal-item anim-card-rise delay-1">
                    <div class="space-y-2">
                        <span class="inline-block px-4 py-1 rounded-full bg-[#1A211A] border border-[#9EB092]/40 text-[#9EB092] font-serif text-[11px] tracking-widest uppercase font-semibold">
                            AKAD NIKAH
                        </span>
                        <h4 class="font-serif text-2xl sm:text-3xl font-bold text-[#FAF7F2] pt-1">
                            Akad Nikah
                        </h4>
                    </div>

                    <!-- Date & Time Box -->
                    <div class="py-2 space-y-1 border-y border-[#9EB092]/20 py-3">
                        <p class="font-serif text-sm sm:text-base font-semibold text-[#FAF7F2]">
                            {{ $akadDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="font-serif text-xs text-[#9EB092] font-light">
                            Pukul : {{ $akadTimeFormatted }}
                        </p>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-1 pt-1">
                        <div class="w-6 h-6 mx-auto text-[#9EB092]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h5 class="font-serif font-bold text-sm sm:text-base text-[#FAF7F2]">{{ $akadVenue }}</h5>
                        <p class="font-serif text-xs text-[#D5DDD0] leading-relaxed max-w-xs mx-auto">{{ $akadAddress }}</p>
                    </div>

                    <!-- Action Buttons: Google Maps & Simpan Kalender -->
                    <div class="pt-3 flex flex-wrap items-center justify-center gap-2.5">
                        <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2 rounded-full bg-[#9EB092] hover:bg-[#8da081] text-[#070807] font-serif font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>Petunjuk Arah</span>
                        </a>
                        <button type="button" onclick="saveCalendarEvent('akad')" class="px-5 py-2 rounded-full border border-[#9EB092]/60 hover:bg-[#1A211A] text-[#FAF7F2] font-serif font-medium text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#9EB092]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Kalender</span>
                        </button>
                    </div>
                </div>

                <!-- 2. KARTU RESEPSI PERNIKAHAN -->
                <div class="rounded-3xl bg-[#131713] border border-[#9EB092]/60 p-6 sm:p-8 shadow-2xl relative space-y-4 text-center reveal-item anim-card-rise delay-2">
                    <div class="space-y-2">
                        <span class="inline-block px-4 py-1 rounded-full bg-[#1A211A] border border-[#9EB092]/40 text-[#9EB092] font-serif text-[11px] tracking-widest uppercase font-semibold">
                            RESEPSI PERNIKAHAN
                        </span>
                        <h4 class="font-serif text-2xl sm:text-3xl font-bold text-[#FAF7F2] pt-1">
                            Resepsi Pernikahan
                        </h4>
                    </div>

                    <!-- Date & Time Box -->
                    <div class="py-2 space-y-1 border-y border-[#9EB092]/20 py-3">
                        <p class="font-serif text-sm sm:text-base font-semibold text-[#FAF7F2]">
                            {{ $eventDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="font-serif text-xs text-[#9EB092] font-light">
                            Pukul : {{ $eventTimeFormatted }}
                        </p>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-1 pt-1">
                        <div class="w-6 h-6 mx-auto text-[#9EB092]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h5 class="font-serif font-bold text-sm sm:text-base text-[#FAF7F2]">{{ $venueName }}</h5>
                        <p class="font-serif text-xs text-[#D5DDD0] leading-relaxed max-w-xs mx-auto">{{ $venueAddress }}</p>
                    </div>

                    <!-- Action Buttons: Google Maps & Simpan Kalender -->
                    <div class="pt-3 flex flex-wrap items-center justify-center gap-2.5">
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2 rounded-full bg-[#9EB092] hover:bg-[#8da081] text-[#070807] font-serif font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>Petunjuk Arah</span>
                        </a>
                        <button type="button" onclick="saveCalendarEvent('resepsi')" class="px-5 py-2 rounded-full border border-[#9EB092]/60 hover:bg-[#1A211A] text-[#FAF7F2] font-serif font-medium text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#9EB092]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Kalender</span>
                        </button>
                    </div>
                </div>

                @if(!empty($invitation->live_stream_url))
                <!-- Live Stream Card -->
                <div class="rounded-3xl bg-[#131713] border border-[#9EB092]/40 p-5 text-center space-y-2.5 reveal-item anim-card-rise delay-3">
                    <p class="text-xs text-[#9EB092] font-serif font-semibold">Siaran Langsung Acara:</p>
                    <a href="{{ $invitation->live_stream_url }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2 rounded-full bg-[#9EB092] hover:bg-[#8da081] text-[#070807] font-serif text-xs font-semibold tracking-wider inline-flex items-center gap-2 shadow-md transition active:scale-95">
                        <svg class="w-4 h-4 text-[#070807]" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        <span>Tonton Streaming</span>
                    </a>
                </div>
                @endif

                <!-- Symmetrical Flower Divider Below Acara -->
                <div class="w-48 sm:w-64 mx-auto pt-6 reveal-item anim-floral-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-dark/floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
            @elseif($currentThemeId == 19 || $isLavenderMist)
            <!-- ================= THEME 19 BESPOKE RANGKAIAN ACARA (PREMIUM SERENADE LAVENDER MIST) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-t-[44px] sm:rounded-t-[56px] rounded-b-3xl bg-white theme-lavender-pattern shadow-2xl p-6 sm:p-10 relative space-y-6 text-center text-[#2D1E40] reveal-item anim-lavender-card-3d">
                <!-- Top Floral Garland Decoration -->
                <div class="w-56 sm:w-72 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-lavender-flower-unfold">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-lavender-title">
                    <span class="text-[11px] sm:text-xs font-lavender-title tracking-[0.35em] uppercase text-[#8B7CB0] font-bold block">
                        WEDDING EVENT
                    </span>
                    <h3 class="font-lavender-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#2D1E40]">
                        Rangkaian Acara
                    </h3>
                    <p class="font-lavender-body text-xs sm:text-sm text-[#6E5D87] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, kami bermaksud menyelenggarakan acara pernikahan kami:
                    </p>
                </div>

                <!-- 1. KARTU AKAD NIKAH -->
                <div class="rounded-3xl border border-[#C5B8D8] bg-[#FAF7FC] p-6 sm:p-8 shadow-md hover:shadow-xl transition-shadow space-y-4 text-center reveal-item anim-lavender-card-3d delay-1">
                    <div class="space-y-1">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] text-white font-lavender-title text-[11px] tracking-widest uppercase font-semibold shadow-xs">
                            AKAD NIKAH
                        </span>
                        <h4 class="font-lavender-headline text-2xl sm:text-3xl font-bold text-[#2D1E40] pt-1">
                            Akad Nikah
                        </h4>
                    </div>

                    <!-- Date & Time Box -->
                    <div class="border-y border-[#E5DEEE] py-3 space-y-1">
                        <p class="font-lavender-headline text-base sm:text-lg font-bold text-[#2D1E40]">
                            {{ $akadDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="font-lavender-body text-xs sm:text-sm text-[#6E5D87] font-medium">
                            Pukul : {{ $akadTimeFormatted }}
                        </p>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-1 pt-1">
                        <div class="w-6 h-6 mx-auto text-[#8B7CB0]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h5 class="font-lavender-headline font-bold text-sm sm:text-base text-[#2D1E40]">{{ $akadVenue }}</h5>
                        <p class="font-lavender-body text-xs text-[#6E5D87] leading-relaxed max-w-xs mx-auto">{{ $akadAddress }}</p>
                    </div>

                    <!-- Action Buttons: Google Maps & Simpan Kalender -->
                    <div class="pt-2 flex flex-wrap items-center justify-center gap-2.5">
                        <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] hover:from-[#79679C] hover:to-[#68568B] text-white font-lavender-title font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>Petunjuk Arah</span>
                        </a>
                        <button type="button" onclick="saveCalendarEvent('akad')" class="px-5 py-2.5 rounded-full border border-[#8B7CB0] hover:bg-[#F3EEF8] text-[#5A4B70] font-lavender-title font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#8B7CB0]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Kalender</span>
                        </button>
                    </div>
                </div>

                <!-- 2. KARTU RESEPSI PERNIKAHAN -->
                <div class="rounded-3xl border border-[#C5B8D8] bg-[#FAF7FC] p-6 sm:p-8 shadow-md hover:shadow-xl transition-shadow space-y-4 text-center reveal-item anim-lavender-card-3d delay-2">
                    <div class="space-y-1">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] text-white font-lavender-title text-[11px] tracking-widest uppercase font-semibold shadow-xs">
                            RESEPSI PERNIKAHAN
                        </span>
                        <h4 class="font-lavender-headline text-2xl sm:text-3xl font-bold text-[#2D1E40] pt-1">
                            Resepsi Pernikahan
                        </h4>
                    </div>

                    <!-- Date & Time Box -->
                    <div class="border-y border-[#E5DEEE] py-3 space-y-1">
                        <p class="font-lavender-headline text-base sm:text-lg font-bold text-[#2D1E40]">
                            {{ $eventDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="font-lavender-body text-xs sm:text-sm text-[#6E5D87] font-medium">
                            Pukul : {{ $eventTimeFormatted }}
                        </p>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-1 pt-1">
                        <div class="w-6 h-6 mx-auto text-[#8B7CB0]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h5 class="font-lavender-headline font-bold text-sm sm:text-base text-[#2D1E40]">{{ $venueName }}</h5>
                        <p class="font-lavender-body text-xs text-[#6E5D87] leading-relaxed max-w-xs mx-auto">{{ $venueAddress }}</p>
                    </div>

                    <!-- Action Buttons: Google Maps & Simpan Kalender -->
                    <div class="pt-2 flex flex-wrap items-center justify-center gap-2.5">
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] hover:from-[#79679C] hover:to-[#68568B] text-white font-lavender-title font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>Petunjuk Arah</span>
                        </a>
                        <button type="button" onclick="saveCalendarEvent('resepsi')" class="px-5 py-2.5 rounded-full border border-[#8B7CB0] hover:bg-[#F3EEF8] text-[#5A4B70] font-lavender-title font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#8B7CB0]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Kalender</span>
                        </button>
                    </div>
                </div>

                @if(!empty($invitation->live_stream_url))
                <!-- Live Stream Card -->
                <div class="rounded-3xl border border-[#C5B8D8] bg-[#FAF7FC] p-5 text-center space-y-2.5 reveal-item anim-lavender-pop delay-3">
                    <p class="text-xs text-[#8B7CB0] font-lavender-title font-semibold">Siaran Langsung Acara:</p>
                    <a href="{{ $invitation->live_stream_url }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] hover:from-[#79679C] hover:to-[#68568B] text-white font-lavender-title text-xs font-semibold tracking-wider inline-flex items-center gap-2 shadow-md transition active:scale-95">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        <span>Tonton Streaming</span>
                    </a>
                </div>
                @endif

                <!-- Bottom Floral Garland Divider -->
                <div class="w-56 sm:w-72 mx-auto pt-4 pointer-events-none reveal-item anim-lavender-flower-unfold delay-3">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @elseif($currentThemeId == 15 || $isMidnightAmber)
            <!-- ================= THEME 15 BESPOKE RANGKAIAN ACARA (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl bg-[#1C1A18] border border-[#DDA74F]/40 shadow-[0_16px_50px_rgba(0,0,0,0.8)] p-6 sm:p-10 relative space-y-6 text-center text-white reveal-item anim-amber-card-3d">
                <!-- Top Floral Crest Decoration -->
                <div class="w-48 sm:w-60 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-amber-bloom">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-amber-title">
                    <span class="text-[11px] sm:text-xs font-amber-title tracking-[0.35em] uppercase text-[#DDA74F] font-bold block">
                        WEDDING EVENT
                    </span>
                    <h3 class="font-amber-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#FAF5EC]">
                        Rangkaian Acara
                    </h3>
                    <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, kami bermaksud menyelenggarakan acara pernikahan kami:
                    </p>
                </div>

                <!-- 1. KARTU AKAD NIKAH -->
                <div class="rounded-2xl border border-[#DDA74F]/35 bg-[#161514] p-6 sm:p-8 shadow-lg hover:shadow-2xl transition-shadow space-y-4 text-center reveal-item anim-amber-card-3d delay-1">
                    <div class="space-y-1">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] text-[#161514] font-amber-title text-[11px] tracking-widest uppercase font-bold shadow-sm">
                            AKAD NIKAH
                        </span>
                        <h4 class="font-amber-script text-3xl sm:text-4xl text-[#F2D59B] pt-1">
                            Akad Nikah
                        </h4>
                    </div>

                    <!-- Date & Time Box -->
                    <div class="border-y border-[#DDA74F]/20 py-3 space-y-1">
                        <p class="font-amber-headline text-base sm:text-lg font-bold text-[#FAF5EC]">
                            {{ $akadDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="font-amber-body text-xs sm:text-sm text-[#E8C37D] font-medium">
                            Pukul : {{ $akadTimeFormatted }}
                        </p>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-1 pt-1">
                        <div class="w-6 h-6 mx-auto text-[#DDA74F]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h5 class="font-amber-headline font-bold text-sm sm:text-base text-[#FAF5EC]">{{ $venueName }}</h5>
                        <p class="font-amber-body text-xs text-[#C4B5A5] leading-relaxed max-w-xs mx-auto">{{ $venueAddress }}</p>
                    </div>

                    <!-- Action Buttons: Google Maps & Simpan Kalender -->
                    <div class="pt-2 flex flex-wrap items-center justify-center gap-2.5">
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] hover:brightness-110 text-[#161514] font-amber-title font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>Petunjuk Arah</span>
                        </a>
                        <button type="button" onclick="saveCalendarEvent('akad')" class="px-5 py-2.5 rounded-md border border-[#DDA74F] hover:bg-[#DDA74F]/10 text-[#E8C37D] font-amber-title font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#DDA74F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Kalender</span>
                        </button>
                    </div>
                </div>

                <!-- 2. KARTU RESEPSI PERNIKAHAN -->
                <div class="rounded-2xl border border-[#DDA74F]/35 bg-[#161514] p-6 sm:p-8 shadow-lg hover:shadow-2xl transition-shadow space-y-4 text-center reveal-item anim-amber-card-3d delay-2">
                    <div class="space-y-1">
                        <span class="inline-block px-4 py-1.5 rounded-full bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] text-[#161514] font-amber-title text-[11px] tracking-widest uppercase font-bold shadow-sm">
                            RESEPSI PERNIKAHAN
                        </span>
                        <h4 class="font-amber-script text-3xl sm:text-4xl text-[#F2D59B] pt-1">
                            Resepsi
                        </h4>
                    </div>

                    <!-- Date & Time Box -->
                    <div class="border-y border-[#DDA74F]/20 py-3 space-y-1">
                        <p class="font-amber-headline text-base sm:text-lg font-bold text-[#FAF5EC]">
                            {{ $eventDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="font-amber-body text-xs sm:text-sm text-[#E8C37D] font-medium">
                            Pukul : {{ $eventTimeFormatted }}
                        </p>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-1 pt-1">
                        <div class="w-6 h-6 mx-auto text-[#DDA74F]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h5 class="font-amber-headline font-bold text-sm sm:text-base text-[#FAF5EC]">{{ $venueName }}</h5>
                        <p class="font-amber-body text-xs text-[#C4B5A5] leading-relaxed max-w-xs mx-auto">{{ $venueAddress }}</p>
                    </div>

                    <!-- Action Buttons: Google Maps & Simpan Kalender -->
                    <div class="pt-2 flex flex-wrap items-center justify-center gap-2.5">
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] hover:brightness-110 text-[#161514] font-amber-title font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>Petunjuk Arah</span>
                        </a>
                        <button type="button" onclick="saveCalendarEvent('resepsi')" class="px-5 py-2.5 rounded-md border border-[#DDA74F] hover:bg-[#DDA74F]/10 text-[#E8C37D] font-amber-title font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#DDA74F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Kalender</span>
                        </button>
                    </div>
                </div>

                @if(!empty($invitation->live_stream_url))
                <!-- Live Stream Card -->
                <div class="rounded-2xl border border-[#DDA74F]/35 bg-[#161514] p-5 text-center space-y-2.5 reveal-item anim-amber-pop delay-3">
                    <p class="text-xs text-[#E8C37D] font-amber-title font-bold">Siaran Langsung Acara:</p>
                    <a href="{{ $invitation->live_stream_url }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] hover:brightness-110 text-[#161514] font-amber-title text-xs font-bold tracking-wider inline-flex items-center gap-2 shadow-md transition active:scale-95">
                        <svg class="w-4 h-4 text-[#161514]" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        <span>Tonton Streaming</span>
                    </a>
                </div>
                @endif

                <!-- Bottom Floral Crest Divider -->
                <div class="w-48 sm:w-60 mx-auto pt-4 pointer-events-none reveal-item anim-amber-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>

            <!-- Golden Wavy Ribbon Divider Across Section -->
            <div class="w-full pt-6 pointer-events-none reveal-item anim-amber-bloom delay-3">
                <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
            </div>
            @elseif($currentThemeId == 13 || $isSummerVibes)
            <!-- ================= THEME 13 BESPOKE RANGKAIAN ACARA (PREMIUM SUMMER VIBES) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-3xl bg-[#FAF8F5] border-2 border-[#1D63B8]/30 shadow-[0_16px_50px_rgba(29,99,184,0.12)] p-6 sm:p-10 relative space-y-7 text-center text-[#1E293B] reveal-item anim-summer-stamp">
                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.35em] uppercase text-[#1D63B8] font-bold block">
                        WEDDING ITINERARY &amp; EVENT
                    </span>
                    <h3 class="text-3xl sm:text-4xl text-[#D94B26] leading-tight"
                        style="font-family: 'Shrikhand', 'Titan One', cursive;">
                        Rangkaian Acara
                    </h3>
                    <div class="w-24 sm:w-28 mx-auto pointer-events-none my-1">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, kami bermaksud menyelenggarakan acara pernikahan kami:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 pt-2">
                    <!-- 1. Akad Nikah Card -->
                    <div class="rounded-2xl bg-white border border-[#1D63B8]/25 p-5 sm:p-6 shadow-sm hover:shadow-md transition-shadow space-y-4 text-center reveal-item anim-fade-up">
                        <div class="inline-block px-3.5 py-1 rounded-full bg-[#1D63B8]/10 text-[#1D63B8] text-[10px] font-bold tracking-widest uppercase">
                            AKAD NIKAH
                        </div>
                        <h4 class="font-serif text-xl sm:text-2xl text-[#1D63B8] font-bold">
                            {{ $invitation->akad_date ? $invitation->akad_date->isoFormat('dddd, D MMMM Y') : $eventDateFormatted }}
                        </h4>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold">
                            <svg class="w-3.5 h-3.5 text-[#1D63B8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $invitation->akad_time ? $invitation->akad_time->format('H:i') : '08:00' }} - {{ $invitation->akad_end_time ?? 'Selesai' }} WIB</span>
                        </div>
                        <div class="space-y-1 pt-1">
                            <p class="font-bold text-sm text-[#1E293B]">
                                {{ $invitation->akad_venue ?? 'Masjid Agung Al-Azhar' }}
                            </p>
                            <p class="text-xs text-slate-500 leading-relaxed max-w-xs mx-auto">
                                {{ $invitation->akad_address ?? 'Jl. Sisingamangaraja, Kebayoran Baru, Jakarta Selatan' }}
                            </p>
                        </div>
                        <div class="pt-2 flex flex-col gap-2">
                            @if(!empty($invitation->akad_maps_url))
                            <a href="{{ $invitation->akad_maps_url }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-full bg-[#1D63B8] hover:bg-[#154c8f] text-white text-xs font-bold tracking-wider uppercase shadow-sm transition-all hover:scale-[1.02] active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Petunjuk Lokasi (Maps)</span>
                            </a>
                            @endif
                            <button type="button" onclick="saveCalendarEvent('akad')"
                               class="inline-flex items-center justify-center gap-2 w-full py-2 px-4 rounded-full border border-[#1D63B8] text-[#1D63B8] hover:bg-[#1D63B8]/10 text-xs font-bold tracking-wider uppercase transition-all hover:scale-[1.02] active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>Simpan ke Kalender</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. Resepsi Pernikahan Card -->
                    <div class="rounded-2xl bg-white border border-[#D94B26]/30 p-5 sm:p-6 shadow-sm hover:shadow-md transition-shadow space-y-4 text-center reveal-item anim-fade-up delay-1">
                        <div class="inline-block px-3.5 py-1 rounded-full bg-[#D94B26]/10 text-[#D94B26] text-[10px] font-bold tracking-widest uppercase">
                            RESEPSI PERNIKAHAN
                        </div>
                        <h4 class="font-serif text-xl sm:text-2xl text-[#D94B26] font-bold">
                            {{ $invitation->event_date ? $invitation->event_date->isoFormat('dddd, D MMMM Y') : $eventDateFormatted }}
                        </h4>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold">
                            <svg class="w-3.5 h-3.5 text-[#D94B26]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $invitation->event_time ? $invitation->event_time->format('H:i') : '11:00' }} - {{ $invitation->event_end_time ?? 'Selesai' }} WIB</span>
                        </div>
                        <div class="space-y-1 pt-1">
                            <p class="font-bold text-sm text-[#1E293B]">
                                {{ $invitation->venue ?? 'Grand Ballroom Hotel Mulia' }}
                            </p>
                            <p class="text-xs text-slate-500 leading-relaxed max-w-xs mx-auto">
                                {{ $invitation->address ?? 'Jl. Asia Afrika No. 6, Senayan, Jakarta Pusat' }}
                            </p>
                        </div>
                        <div class="pt-2 flex flex-col gap-2">
                            @if(!empty($invitation->maps_url))
                            <a href="{{ $invitation->maps_url }}" target="_blank" rel="noopener noreferrer"
                               class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-full bg-[#D94B26] hover:bg-[#c23d1b] text-white text-xs font-bold tracking-wider uppercase shadow-sm transition-all hover:scale-[1.02] active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Petunjuk Lokasi (Maps)</span>
                            </a>
                            @endif
                            <button type="button" onclick="saveCalendarEvent('resepsi')"
                               class="inline-flex items-center justify-center gap-2 w-full py-2 px-4 rounded-full border border-[#D94B26] text-[#D94B26] hover:bg-[#D94B26]/10 text-xs font-bold tracking-wider uppercase transition-all hover:scale-[1.02] active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>Simpan ke Kalender</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Bottom Blue Floral Divider -->
                <div class="w-28 sm:w-36 mx-auto pt-2 pointer-events-none">
                    <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
            @elseif($currentThemeId == 16 || $isMuseumOfLove)
            <!-- ================= THEME 16 BESPOKE RANGKAIAN ACARA (PREMIUM MUSEUM OF LOVE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl theme-museum-canvas border border-[#D4AF37]/45 shadow-[0_16px_50px_rgba(56,35,24,0.18)] p-6 sm:p-10 relative space-y-7 text-center text-[#2A1F1D] reveal-item anim-museum-card">
                <!-- Overhead Museum Spotlight Effect -->
                <div class="museum-spotlight absolute top-0 left-1/2 -translate-x-1/2 w-48 sm:w-64 h-32 pointer-events-none"></div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-museum-sub tracking-[0.35em] uppercase text-[#8B1E22] font-bold block">
                        WEDDING EXHIBITION &amp; EVENT
                    </span>
                    <h3 class="font-museum-title text-3xl sm:text-4xl font-bold tracking-wide text-[#382318]">
                        Rangkaian Acara
                    </h3>
                    <div class="w-16 h-0.5 bg-[#8B1E22] mx-auto my-2"></div>
                    <p class="font-museum-body text-xs sm:text-sm text-[#5C4033] font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Dengan memohon rahmat dan ridho Allah Subhanahu Wa Ta'ala, kami bermaksud menyelenggarakan acara pernikahan kami:
                    </p>
                </div>

                <!-- 1. KARTU AKAD NIKAH (Classical Exhibition Placard) -->
                <div class="rounded-2xl border-2 border-[#D4AF37]/40 bg-[#FFFDF9] p-6 sm:p-8 shadow-md hover:shadow-xl transition-all duration-500 space-y-4 text-center reveal-item anim-museum-card delay-1 relative overflow-hidden">
                    <div class="absolute top-2 left-2 w-3 h-3 border-t-2 border-l-2 border-[#8B1E22]/60"></div>
                    <div class="absolute top-2 right-2 w-3 h-3 border-t-2 border-r-2 border-[#8B1E22]/60"></div>
                    <div class="absolute bottom-2 left-2 w-3 h-3 border-b-2 border-l-2 border-[#8B1E22]/60"></div>
                    <div class="absolute bottom-2 right-2 w-3 h-3 border-b-2 border-r-2 border-[#8B1E22]/60"></div>

                    <div class="space-y-1">
                        <span class="inline-block px-4 py-1 rounded-full bg-[#8B1E22] text-[#FAF5EC] font-museum-sub text-[10px] sm:text-[11px] tracking-widest uppercase font-bold shadow-xs">
                            AKAD NIKAH
                        </span>
                        <h4 class="font-museum-script text-3xl sm:text-4xl text-[#8B1E22] pt-2">
                            Akad Nikah
                        </h4>
                    </div>

                    <!-- Date & Time Box -->
                    <div class="border-y border-[#D4AF37]/30 py-3.5 space-y-1 bg-[#F9F5EC]/60 rounded-lg">
                        <p class="font-museum-title text-base sm:text-lg font-bold text-[#382318]">
                            {{ $akadDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="font-museum-sub text-xs sm:text-sm text-[#8B1E22] font-semibold">
                            Pukul : {{ $akadTimeFormatted }}
                        </p>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-1 pt-1">
                        <div class="w-6 h-6 mx-auto text-[#8B1E22]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h5 class="font-museum-title font-bold text-sm sm:text-base text-[#382318]">{{ $akadVenue }}</h5>
                        <p class="font-museum-body text-xs text-[#5C4033] leading-relaxed max-w-xs mx-auto">{{ $akadAddress }}</p>
                    </div>

                    <!-- Action Buttons: Google Maps & Simpan Kalender -->
                    <div class="pt-2 flex flex-wrap items-center justify-center gap-2.5">
                        <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] font-museum-sub font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>Buka Google Maps</span>
                        </a>
                        <button type="button" onclick="saveCalendarEvent('akad')" class="px-5 py-2.5 rounded-full border border-[#8B1E22] hover:bg-[#8B1E22]/10 text-[#8B1E22] font-museum-sub font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#8B1E22]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Kalender</span>
                        </button>
                    </div>
                </div>

                <!-- 2. KARTU RESEPSI PERNIKAHAN (Classical Exhibition Placard) -->
                <div class="rounded-2xl border-2 border-[#D4AF37]/40 bg-[#FFFDF9] p-6 sm:p-8 shadow-md hover:shadow-xl transition-all duration-500 space-y-4 text-center reveal-item anim-museum-card delay-2 relative overflow-hidden">
                    <div class="absolute top-2 left-2 w-3 h-3 border-t-2 border-l-2 border-[#8B1E22]/60"></div>
                    <div class="absolute top-2 right-2 w-3 h-3 border-t-2 border-r-2 border-[#8B1E22]/60"></div>
                    <div class="absolute bottom-2 left-2 w-3 h-3 border-b-2 border-l-2 border-[#8B1E22]/60"></div>
                    <div class="absolute bottom-2 right-2 w-3 h-3 border-b-2 border-r-2 border-[#8B1E22]/60"></div>

                    <div class="space-y-1">
                        <span class="inline-block px-4 py-1 rounded-full bg-[#8B1E22] text-[#FAF5EC] font-museum-sub text-[10px] sm:text-[11px] tracking-widest uppercase font-bold shadow-xs">
                            RESEPSI PERNIKAHAN
                        </span>
                        <h4 class="font-museum-script text-3xl sm:text-4xl text-[#8B1E22] pt-2">
                            Resepsi Pernikahan
                        </h4>
                    </div>

                    <!-- Date & Time Box -->
                    <div class="border-y border-[#D4AF37]/30 py-3.5 space-y-1 bg-[#F9F5EC]/60 rounded-lg">
                        <p class="font-museum-title text-base sm:text-lg font-bold text-[#382318]">
                            {{ $eventDate->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="font-museum-sub text-xs sm:text-sm text-[#8B1E22] font-semibold">
                            Pukul : {{ $eventTimeFormatted }}
                        </p>
                    </div>

                    <!-- Location Details -->
                    <div class="space-y-1 pt-1">
                        <div class="w-6 h-6 mx-auto text-[#8B1E22]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h5 class="font-museum-title font-bold text-sm sm:text-base text-[#382318]">{{ $venueName }}</h5>
                        <p class="font-museum-body text-xs text-[#5C4033] leading-relaxed max-w-xs mx-auto">{{ $venueAddress }}</p>
                    </div>

                    <!-- Action Buttons: Google Maps & Simpan Kalender -->
                    <div class="pt-2 flex flex-wrap items-center justify-center gap-2.5">
                        <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] font-museum-sub font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>Buka Google Maps</span>
                        </a>
                        <button type="button" onclick="saveCalendarEvent('resepsi')" class="px-5 py-2.5 rounded-full border border-[#8B1E22] hover:bg-[#8B1E22]/10 text-[#8B1E22] font-museum-sub font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#8B1E22]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Simpan Kalender</span>
                        </button>
                    </div>
                </div>

                @if(!empty($invitation->live_stream_url))
                <!-- Live Stream Museum Placard -->
                <div class="rounded-2xl border border-[#D4AF37]/40 bg-[#FFFDF9] p-5 text-center space-y-2.5 shadow-md reveal-item anim-museum-card delay-3">
                    <p class="text-xs text-[#8B1E22] font-museum-sub font-bold uppercase tracking-wider">Siaran Langsung Acara:</p>
                    <a href="{{ $invitation->live_stream_url }}" target="_blank" rel="noopener noreferrer" class="px-6 py-2.5 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] font-museum-sub text-xs font-bold tracking-wider uppercase inline-flex items-center gap-2 shadow-md transition active:scale-95">
                        <svg class="w-4 h-4 text-[#FAF5EC]" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        <span>Tonton Live Streaming</span>
                    </a>
                </div>
                @endif

                <!-- Bookshelf Divider Below Acara -->
                <div class="w-full max-w-sm sm:max-w-md mx-auto pt-4 pointer-events-none reveal-item anim-museum-frame delay-3">
                    <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @else
            <div class="theme-arch-frame bg-white p-6 sm:p-10 md:p-12 shadow-lg w-full mx-auto relative space-y-8 reveal-item anim-border">
                
                @if($currentThemeId == 1)
                <!-- Corner Botanical Sprigs for Theme 1 Detail Acara -->
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/maroon-delicate-top.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -bottom-3.5 -left-3.5 sm:-bottom-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-bl delay-2">
                    <img src="/images/themes/bg/maroon-delicate-bottom.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @elseif($currentThemeId == 19)
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/lavender-butterflies.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -bottom-3.5 -left-3.5 sm:-bottom-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-bl delay-2">
                    <img src="/images/themes/bg/lavender-butterflies-flip.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @endif

                <div>
                    <p class="theme-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-[var(--text-muted)] font-semibold reveal-item anim-title delay-1">
                        Wedding Schedule
                    </p>
                    <h2 class="theme-heading text-2xl sm:text-4xl font-bold text-[var(--text-main)] mt-1 mb-2 reveal-item anim-title delay-1">
                        Rangkaian Acara
                    </h2>
                    @if($currentThemeId == 1)
                    <div class="w-48 sm:w-56 mx-auto my-3 pointer-events-none reveal-item anim-fade-up delay-1">
                        <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                    </div>
                    @endif
                    <p class="text-xs sm:text-sm text-[var(--text-muted)] max-w-md mx-auto leading-relaxed reveal-item anim-fade-up delay-2">
                        Merupakan kehormatan bagi kami bila Bapak/Ibu/Saudara/i berkenan hadir di hari istimewa kami:
                    </p>
                </div>

                <!-- 2 Columns on Desktop (Akad on Left, Resepsi on Right) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 items-stretch">
                    
                    <!-- CARD 1: AKAD NIKAH -->
                    <div class="p-5 sm:p-7 rounded-2xl bg-[var(--bg-canvas)] border border-[var(--border-frame)]/30 shadow-xs space-y-4 text-center reveal-item anim-fade-up delay-2 flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3.5 py-1 rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-widest bg-[var(--bg-accent-block)] text-white">
                                Akad Nikah
                            </span>

                            <!-- Format Tanggal Elegan: Hari di kiri, ( 22 ) di tengah, Bulan di kanan -->
                            <div class="flex items-center justify-between max-w-xs mx-auto py-2.5 px-3 bg-white/75 rounded-2xl border border-[var(--border-frame)]/25 my-3 shadow-2xs">
                                <span class="text-xs font-semibold uppercase tracking-wider text-[var(--text-muted)] text-right flex-1 truncate">
                                    {{ $eventDayName }}
                                </span>
                                
                                <div class="inline-flex items-center justify-center text-[var(--text-accent)] px-2 whitespace-nowrap shrink-0">
                                    <span class="font-serif text-2xl sm:text-3xl font-light opacity-50 select-none reveal-item anim-bracket-left delay-3">(</span>
                                    <span class="font-serif text-3xl sm:text-4xl font-black mx-1 tracking-tight text-[var(--text-main)] reveal-item anim-date-number delay-3">{{ $eventDayNum }}</span>
                                    <span class="font-serif text-2xl sm:text-3xl font-light opacity-50 select-none reveal-item anim-bracket-right delay-3">)</span>
                                </div>

                                <span class="text-xs font-semibold uppercase tracking-wider text-[var(--text-muted)] text-left flex-1 truncate">
                                    {{ $eventMonthYear }}
                                </span>
                            </div>

                            <div class="space-y-1.5 text-xs sm:text-sm">
                                <p class="font-semibold text-[var(--text-accent)] flex items-center justify-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>Pukul {{ $invitation->akad_time ? (is_string($invitation->akad_time) ? $invitation->akad_time : $invitation->akad_time->format('H:i')) : '08:00' }} - {{ $invitation->akad_end_time ?? '10:00' }} WIB</span>
                                </p>
                                <p class="font-bold text-base text-[var(--text-main)] pt-1">{{ $akadVenue }}</p>
                                <p class="text-xs text-[var(--text-muted)] font-light leading-relaxed">{{ $akadAddress }}</p>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a href="{{ $akadMapsUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-white border border-[var(--border-frame)]/40 text-[var(--text-accent)] font-semibold text-xs sm:text-sm hover:bg-[var(--bg-accent-light)] transition shadow-2xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Lihat Lokasi</span>
                            </a>
                        </div>
                    </div>

                    <!-- CARD 2: RESEPSI PERNIKAHAN -->
                    <div class="p-5 sm:p-7 rounded-2xl bg-[var(--bg-canvas)] border border-[var(--border-frame)]/30 shadow-xs space-y-4 text-center reveal-item anim-fade-up delay-3 flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3.5 py-1 rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-widest bg-[var(--bg-accent-block)] text-white">
                                Resepsi Pernikahan
                            </span>

                            <div class="flex items-center justify-between max-w-xs mx-auto py-2.5 px-3 bg-white/75 rounded-2xl border border-[var(--border-frame)]/25 my-3 shadow-2xs">
                                <span class="text-xs font-semibold uppercase tracking-wider text-[var(--text-muted)] text-right flex-1 truncate">
                                    {{ $eventDayName }}
                                </span>
                                
                                <div class="inline-flex items-center justify-center text-[var(--text-accent)] px-2 whitespace-nowrap shrink-0">
                                    <span class="font-serif text-2xl sm:text-3xl font-light opacity-50 select-none reveal-item anim-bracket-left delay-3">(</span>
                                    <span class="font-serif text-3xl sm:text-4xl font-black mx-1 tracking-tight text-[var(--text-main)] reveal-item anim-date-number delay-3">{{ $eventDayNum }}</span>
                                    <span class="font-serif text-2xl sm:text-3xl font-light opacity-50 select-none reveal-item anim-bracket-right delay-3">)</span>
                                </div>

                                <span class="text-xs font-semibold uppercase tracking-wider text-[var(--text-muted)] text-left flex-1 truncate">
                                    {{ $eventMonthYear }}
                                </span>
                            </div>

                            <div class="space-y-1.5 text-xs sm:text-sm">
                                <p class="font-semibold text-[var(--text-accent)] flex items-center justify-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>Pukul {{ $invitation->event_time ? (is_string($invitation->event_time) ? $invitation->event_time : $invitation->event_time->format('H:i')) : '11:00' }} - {{ $invitation->event_end_time ?? '13:00' }} WIB</span>
                                </p>
                                <p class="font-bold text-base text-[var(--text-main)] pt-1">{{ $venueName }}</p>
                                <p class="text-xs text-[var(--text-muted)] font-light leading-relaxed">{{ $venueAddress }}</p>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-white border border-[var(--border-frame)]/40 text-[var(--text-accent)] font-semibold text-xs sm:text-sm hover:bg-[var(--bg-accent-light)] transition shadow-2xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Lihat Lokasi</span>
                            </a>
                        </div>
                    </div>
                </div>

                @if($currentThemeId == 19)
                <div class="w-full pointer-events-none mt-8 -mb-6 sm:-mb-14">
                    <img src="/images/themes/bg/lavender-meadow-bottom.svg" alt="" class="w-full h-10 sm:h-12 object-cover opacity-85">
                </div>
                @endif
            </div>
            @endif
        </section>


        <!-- ================= 7. SECTION LOVE STORY ================= -->
        @if($invitation->show_love_story ?? true)
        <section id="section-cerita" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
            @if($currentThemeId == 2)
            <!-- THEME 2 BESPOKE LOVE STORY (BASIC HARMONY EMERALD) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-2.5 sm:p-3 relative border border-[#D4AF37]/45 reveal-item anim-fade-up">
                <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-6 sm:p-8 text-center space-y-6">
                    <!-- Gold Interlocking Rings Divider -->
                    <div class="w-44 sm:w-52 h-6 mx-auto">
                        <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
                    </div>

                    <div>
                        <p class="font-heading text-xs uppercase tracking-[0.25em] text-[#E5C158] font-bold">
                            OUR JOURNEY
                        </p>
                        <h3 class="font-heading text-xl sm:text-2xl font-bold text-white tracking-wide mt-1">
                            Love Story
                        </h3>
                    </div>

                    <div class="relative pl-6 sm:pl-8 space-y-6 text-left border-l-2 border-[#D4AF37]/50 ml-4 sm:ml-8 mr-2">
                        @foreach($invitation->milestones as $idx => $m)
                        @if(!empty($m['year']) || !empty($m['title']))
                        <div class="relative reveal-item anim-fade-up delay-{{ ($idx % 4) + 1 }}">
                            <span class="absolute -left-[31px] sm:-left-[39px] top-1 w-3.5 h-3.5 rounded-full bg-[#E5C158] border-2 border-[#134A37] shadow-sm"></span>
                            <span class="text-[10px] sm:text-xs font-mono font-bold text-[#E5C158] uppercase tracking-wider block">{{ $m['year'] ?? '' }}</span>
                            <h4 class="font-heading font-bold text-sm sm:text-base text-white mt-0.5">{{ $m['title'] ?? '' }}</h4>
                            <p class="text-xs sm:text-sm text-white/85 font-light leading-relaxed mt-1">
                                {{ $m['story'] ?? '' }}
                            </p>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 3)
            <!-- THEME 3 BESPOKE LOVE STORY (BASIC HARMONY NAVY - MATCHING IMAGE 2 SECTION 9) -->
            <div class="relative w-full bg-[#1E3A5F] text-white py-12 sm:py-16 px-4 sm:px-6 md:px-10 rounded-2xl shadow-xl border border-white/20">
                <div class="max-w-2xl mx-auto space-y-6 sm:space-y-8 relative z-10">
                    <div class="text-center space-y-1 reveal-item anim-fade-up">
                        <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-sky-200 font-heading block">
                            PERJALANAN KAMI
                        </span>
                        <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-white">
                            Love Story
                        </h3>
                    </div>

                    <div class="space-y-6">
                        @foreach($invitation->milestones as $idx => $story)
                        @php
                            $storyImg = !empty($story['image'])
                                ? (Str::startsWith($story['image'], ['http://', 'https://']) ? $story['image'] : asset('storage/' . $story['image']))
                                : ($galleryPhotos[$idx % max(1, count($galleryPhotos))] ?? null);
                        @endphp
                        <div class="rounded-xl overflow-hidden bg-white/10 backdrop-blur-md border border-white/20 shadow-md reveal-item anim-fade-up delay-{{ ($idx % 3) + 1 }}">
                            @if(!empty($storyImg))
                            <div class="w-full aspect-[16/9] sm:aspect-[21/9] overflow-hidden">
                                <img src="{{ $storyImg }}" alt="{{ $story['title'] ?? 'Story' }}" class="w-full h-full object-cover">
                            </div>
                            @endif
                            <div class="p-4 sm:p-5 space-y-2 text-left">
                                <div class="flex items-center justify-between text-sky-200 text-xs font-bold font-mono">
                                    <span>#0{{ $idx+1 }}</span>
                                    <span class="px-2.5 py-0.5 rounded-full bg-white/15 border border-white/30 text-[10px]">{{ $story['year'] ?? '' }}</span>
                                </div>
                                <h4 class="font-heading text-base sm:text-lg font-bold text-white">{{ $story['title'] ?? '' }}</h4>
                                <p class="text-xs sm:text-sm text-slate-200 font-light leading-relaxed">{{ $story['story'] ?? '' }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 1)
            <!-- THEME 1 BESPOKE CERITA CINTA (BASIC HARMONY MAROON - MATCHING REFERENCE) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto space-y-6 sm:space-y-8">
                <div class="text-center space-y-1 reveal-item anim-fade-up">
                    <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-[#580B14]">
                        Cerita Cinta
                    </h3>
                    <div class="w-2 h-2 rounded-full bg-[#580B14] mx-auto mt-2"></div>
                </div>

                <!-- Vertical Timeline with Connecting Line -->
                <div class="relative pl-6 sm:pl-8 space-y-8 text-left border-l-2 border-[#7A1C28]/35 ml-4 sm:ml-6">
                    @foreach($invitation->milestones as $idx => $story)
                    @php
                        $storyImg = !empty($story['image'])
                            ? (Str::startsWith($story['image'], ['http://', 'https://']) ? $story['image'] : asset('storage/' . $story['image']))
                            : ($galleryPhotos[$idx % max(1, count($galleryPhotos))] ?? null);
                    @endphp
                    <div class="relative rounded-2xl bg-white border border-[#F4D9DE] shadow-md overflow-hidden reveal-item anim-fade-up delay-{{ ($idx % 3) + 1 }}">
                        <span class="absolute -left-[31px] sm:-left-[39px] top-4 w-3.5 h-3.5 rounded-full bg-[#580B14] border-2 border-white shadow-xs"></span>
                        
                        @if(!empty($storyImg))
                        <div class="w-full aspect-[16/9] sm:aspect-[21/9] overflow-hidden bg-stone-900">
                            <img src="{{ $storyImg }}" alt="{{ $story['title'] ?? 'Story' }}" class="w-full h-full object-cover">
                        </div>
                        @endif

                        <div class="p-5 sm:p-6 space-y-2">
                            <div class="flex items-center justify-between text-xs font-bold text-[#580B14]">
                                <span class="font-heading text-sm sm:text-base font-bold">{{ $story['title'] ?? '' }}</span>
                                <span class="px-2.5 py-0.5 rounded-full bg-[#FDF2F4] border border-[#F4D9DE] text-[10px] font-mono">{{ $story['year'] ?? '' }}</span>
                            </div>
                            <p class="text-xs sm:text-sm text-stone-600 font-light leading-relaxed">
                                {{ $story['story'] ?? '' }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @elseif($currentThemeId == 5)
            <!-- ================= THEME 5 BESPOKE LOVE STORY (BASIC HARMONY MONOCHROME - MATCHING REFERENCE IMAGE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-6 text-center">
                <!-- Two Overlapping Portrait Photos Matching Reference Image -->
                <div class="relative w-64 sm:w-72 h-72 sm:h-80 mx-auto my-4 select-none">
                    <!-- Photo 1: Top-Left (Glides in from top-left with subtle rotation) -->
                    <div class="absolute top-0 left-2 sm:left-4 w-36 sm:w-42 aspect-[3/4] overflow-hidden shadow-lg border-2 border-white bg-stone-200 reveal-item anim-photo-glide-1 delay-1">
                        <img src="{{ $t5StoryPhoto1 }}" alt="Love Story 1" class="w-full h-full object-cover">
                    </div>
                    <!-- Photo 2: Bottom-Right Overlap (Glides in from bottom-right overlapping Photo 1) -->
                    <div class="absolute bottom-0 right-2 sm:right-4 w-34 sm:w-38 aspect-[3/4] overflow-hidden shadow-2xl border-2 border-white z-10 bg-stone-200 reveal-item anim-photo-glide-2 delay-2">
                        <img src="{{ $t5StoryPhoto2 }}" alt="Love Story 2" class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Section Title: LOVE STORY (Expands tracking smoothly) -->
                <div class="pt-6 pb-2 text-center select-none reveal-item anim-tracking delay-2">
                    <h2 class="font-serif text-2xl sm:text-3xl uppercase tracking-[0.25em] text-[#18181B] font-semibold">
                        LOVE STORY
                    </h2>
                </div>

                <!-- Milestones / Story Paragraphs (Rise up with blur-to-sharp luxury effect) -->
                <div class="space-y-6 pt-2 text-left max-w-sm sm:max-w-md mx-auto px-2">
                    @foreach($invitation->milestones as $idx => $story)
                    @if(!empty($story['title']) || !empty($story['story']))
                    <div class="space-y-2 reveal-item anim-luxury-up delay-{{ ($idx % 3) + 2 }}">
                        <h3 class="font-serif text-base sm:text-lg text-[#18181B] font-bold tracking-wide">
                            {{ $story['title'] ?? 'Awal Bertemu' }}
                        </h3>
                        <p class="font-sans text-xs sm:text-sm text-stone-700 font-light leading-relaxed text-justify">
                            {{ $story['story'] ?? '' }}
                        </p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @elseif($currentThemeId == 20 || $isDarkElegance)
            <!-- ================= THEME 20 BESPOKE LOVE STORY (PREMIUM SERENADE DARK ELEGANCE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-7 text-center text-[#FAF7F2] py-4 relative">
                <!-- Arch Vertical Floral Flourishes on Left & Right Top Corners -->
                <div class="absolute -top-12 -left-6 sm:-left-8 w-16 sm:w-20 h-auto pointer-events-none z-10 opacity-80 reveal-item anim-arch-floral delay-1">
                    <img src="{{ asset('images/themes/serenade-dark/floral-vertical.png') }}" alt="" class="w-full h-auto object-contain -scale-x-100">
                </div>
                <div class="absolute -top-12 -right-6 sm:-right-8 w-16 sm:w-20 h-auto pointer-events-none z-10 opacity-80 reveal-item anim-arch-floral delay-1">
                    <img src="{{ asset('images/themes/serenade-dark/floral-vertical.png') }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Section Header -->
                <div class="space-y-1.5 pt-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.3em] uppercase text-[#9EB092] font-semibold block">
                        OUR JOURNEY
                    </span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold tracking-wide text-[#FAF7F2]">
                        Love Story
                    </h3>
                    <p class="font-serif text-xs text-[#D5DDD0] font-light leading-relaxed max-w-xs mx-auto">
                        Perjalanan kisah kasih kami hingga melangkah menuju ikatan suci:
                    </p>
                </div>

                <!-- Milestone Cards -->
                @php
                    $t20Milestones = !empty($invitation->milestones) && count($invitation->milestones) > 0
                        ? $invitation->milestones
                        : [
                            ['year' => '2020', 'title' => 'Pertama Bertemu', 'story' => 'Pertemuan pertama kami bermula di perpustakaan kampus saat menyelesaikan skripsi. Obrolan singkat mengenai buku membuka awal kisah indah kami.'],
                            ['year' => '2022', 'title' => 'Menjalin Hubungan', 'story' => 'Saling memahami dan mendukung impian masing-masing membuat langkah kami kian mantap untuk mengarungi hidup bersama.'],
                            ['year' => '2025', 'title' => 'Lamaran & Komitmen', 'story' => 'Di hadapan kedua keluarga besar, kami mengikrarkan niat tulus untuk melangkah ke ikatan pernikahan yang suci.'],
                        ];
                    $t20StoryImgs = [$t20StoryPhoto1, $t20StoryPhoto2, $t20StoryPhoto3];
                @endphp

                <div class="space-y-5 pt-1">
                    @foreach($t20Milestones as $idx => $story)
                    @php
                        $cardImg = !empty($story['image'])
                            ? (Str::startsWith($story['image'], ['http://', 'https://']) ? $story['image'] : asset('storage/' . $story['image']))
                            : ($t20StoryImgs[$idx % count($t20StoryImgs)] ?? $t20StoryPhoto1);
                    @endphp
                    <div class="rounded-3xl bg-[#131713] border border-[#9EB092]/50 p-4 sm:p-5 shadow-2xl space-y-3.5 text-left reveal-item anim-card-rise delay-{{ ($idx % 3) + 1 }}">
                        @if(!empty($cardImg))
                        <div class="w-full aspect-[16/9] rounded-2xl overflow-hidden bg-stone-900 group">
                            <img src="{{ $cardImg }}" alt="{{ $story['title'] ?? 'Story' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        @endif

                        <div class="space-y-1.5 pt-1">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-[#1A211A] border border-[#9EB092]/40 text-[#9EB092] font-serif text-[11px] font-bold tracking-wider">
                                    {{ $story['year'] ?? '' }}
                                </span>
                                <span class="text-[10px] text-[#9EB092]/80 font-serif uppercase tracking-widest font-semibold">
                                    Chapter 0{{ $idx + 1 }}
                                </span>
                            </div>

                            <h4 class="font-serif text-base sm:text-lg font-bold text-[#FAF7F2] tracking-wide pt-1">
                                {{ $story['title'] ?? '' }}
                            </h4>

                            <p class="font-serif text-xs text-[#D5DDD0] font-light leading-relaxed text-justify">
                                {{ $story['story'] ?? '' }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Symmetrical Flower Divider Below Love Story -->
                <div class="w-48 sm:w-64 mx-auto pt-6 reveal-item anim-floral-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-dark/floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
            @elseif($currentThemeId == 19 || $isLavenderMist)
            <!-- ================= THEME 19 BESPOKE LOVE STORY (PREMIUM SERENADE LAVENDER MIST) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-t-[44px] sm:rounded-t-[56px] rounded-b-3xl bg-white theme-lavender-pattern shadow-2xl p-6 sm:p-10 relative space-y-6 text-center text-[#2D1E40] reveal-item anim-lavender-card-3d">
                <!-- Top Floral Garland Decoration -->
                <div class="w-56 sm:w-72 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-lavender-flower-unfold">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-lavender-title">
                    <span class="text-[11px] sm:text-xs font-lavender-title tracking-[0.35em] uppercase text-[#8B7CB0] font-bold block">
                        OUR JOURNEY
                    </span>
                    <h3 class="font-lavender-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#2D1E40]">
                        Love Story
                    </h3>
                    <p class="font-lavender-body text-xs sm:text-sm text-[#6E5D87] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Perjalanan kisah cinta kami hingga melangkah menuju ikatan suci pernikahan:
                    </p>
                </div>

                <!-- Milestone Cards -->
                @php
                    $t19Milestones = !empty($invitation->milestones) && count($invitation->milestones) > 0
                        ? $invitation->milestones
                        : [
                            ['year' => '2020', 'title' => 'Pertama Bertemu', 'story' => 'Pertemuan pertama kami bermula saat kegiatan kampus. Sebuah sapaan sederhana yang kemudian membuka lembaran cerita penuh warna dalam hidup kami berdua.'],
                            ['year' => '2023', 'title' => 'Menjalin Komitmen', 'story' => 'Seiring berjalannya waktu, saling memahami dan mendukung impian masing-masing membuat langkah kami kian mantap untuk merajut masa depan bersama.'],
                            ['year' => '2027', 'title' => 'Menuju Hari Bahagia', 'story' => 'Dengan doa dan restu dari kedua keluarga tercinta, kami memutuskan untuk mengikat janji suci pernikahan dan menyempurnakan ibadah seumur hidup.'],
                        ];
                    $t19StoryImgs = [$t19StoryPhoto1, $t19StoryPhoto2, $t19StoryPhoto3];
                @endphp

                <div class="space-y-5 pt-1">
                    @foreach($t19Milestones as $idx => $story)
                    @php
                        $cardImg = !empty($story['image'])
                            ? (Str::startsWith($story['image'], ['http://', 'https://']) ? $story['image'] : asset('storage/' . $story['image']))
                            : ($t19StoryImgs[$idx % count($t19StoryImgs)] ?? $t19StoryPhoto1);
                    @endphp
                    <div class="rounded-3xl border border-[#C5B8D8] bg-[#FAF7FC] p-4 sm:p-5 shadow-md space-y-3.5 text-left reveal-item anim-lavender-pop delay-{{ ($idx % 3) + 1 }}">
                        @if(!empty($cardImg))
                        <div class="w-full aspect-[16/9] rounded-2xl overflow-hidden bg-purple-50 group border border-[#E5DEEE]">
                            <img src="{{ $cardImg }}" alt="{{ $story['title'] ?? 'Story' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        @endif

                        <div class="space-y-1.5 pt-1">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] text-white font-lavender-title text-[11px] font-bold tracking-wider shadow-xs">
                                    {{ $story['year'] ?? '' }}
                                </span>
                                <span class="text-[10px] text-[#8B7CB0] font-lavender-title uppercase tracking-widest font-bold">
                                    Chapter 0{{ $idx + 1 }}
                                </span>
                            </div>

                            <h4 class="font-lavender-headline text-lg sm:text-xl font-bold text-[#2D1E40] tracking-wide pt-1">
                                {{ $story['title'] ?? '' }}
                            </h4>

                            <p class="font-lavender-body text-xs sm:text-sm text-[#6E5D87] font-normal leading-relaxed text-justify">
                                {{ $story['story'] ?? '' }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Bottom Floral Garland Divider -->
                <div class="w-56 sm:w-72 mx-auto pt-4 pointer-events-none reveal-item anim-lavender-flower-unfold delay-3">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @elseif($currentThemeId == 15 || $isMidnightAmber)
            <!-- ================= THEME 15 BESPOKE LOVE STORY (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl bg-[#1C1A18] border border-[#DDA74F]/40 shadow-[0_16px_50px_rgba(0,0,0,0.8)] p-6 sm:p-10 relative space-y-6 text-center text-white reveal-item anim-amber-card-3d">
                <!-- Top Floral Crest Decoration -->
                <div class="w-48 sm:w-60 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-amber-bloom">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-amber-title">
                    <span class="text-[11px] sm:text-xs font-amber-title tracking-[0.35em] uppercase text-[#DDA74F] font-bold block">
                        OUR JOURNEY
                    </span>
                    <h3 class="font-amber-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#FAF5EC]">
                        Love Story
                    </h3>
                    <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Perjalanan kisah cinta kami hingga melangkah menuju ikatan suci pernikahan:
                    </p>
                </div>

                <!-- Milestone Cards -->
                @php
                    $t15Milestones = !empty($invitation->milestones) && count($invitation->milestones) > 0
                        ? $invitation->milestones
                        : [
                            ['year' => '2020', 'title' => 'Pertama Bertemu', 'story' => 'Pertemuan pertama kami bermula saat kegiatan kampus. Sebuah sapaan sederhana yang kemudian membuka lembaran cerita penuh warna dalam hidup kami berdua.'],
                            ['year' => '2023', 'title' => 'Menjalin Komitmen', 'story' => 'Seiring berjalannya waktu, saling memahami dan mendukung impian masing-masing membuat langkah kami kian mantap untuk merajut masa depan bersama.'],
                            ['year' => '2027', 'title' => 'Menuju Hari Bahagia', 'story' => 'Dengan doa dan restu dari kedua keluarga tercinta, kami memutuskan untuk mengikat janji suci pernikahan dan menyempurnakan ibadah seumur hidup.'],
                        ];
                    $t15StoryImgs = [$t15StoryPhoto1, $t15StoryPhoto2, $t15StoryPhoto3];
                @endphp

                <div class="space-y-5 pt-1">
                    @foreach($t15Milestones as $idx => $story)
                    @php
                        $cardImg = !empty($story['image'])
                            ? (Str::startsWith($story['image'], ['http://', 'https://']) ? $story['image'] : asset('storage/' . $story['image']))
                            : ($t15StoryImgs[$idx % count($t15StoryImgs)] ?? $t15StoryPhoto1);
                    @endphp
                    <div class="rounded-2xl border border-[#DDA74F]/35 bg-[#161514] p-4 sm:p-5 shadow-lg space-y-3.5 text-left reveal-item anim-amber-pop delay-{{ ($idx % 3) + 1 }}">
                        @if(!empty($cardImg))
                        <div class="w-full aspect-[16/9] rounded-xl overflow-hidden bg-[#1F1D1B] group border border-[#DDA74F]/25">
                            <img src="{{ $cardImg }}" alt="{{ $story['title'] ?? 'Story' }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>
                        @endif

                        <div class="space-y-1.5 pt-1">
                            <div class="flex items-center justify-between">
                                <span class="px-3 py-0.5 rounded-full bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] text-[#161514] font-amber-title text-[11px] font-bold tracking-wider shadow-xs">
                                    {{ $story['year'] ?? '' }}
                                </span>
                                <span class="text-[10px] text-[#DDA74F] font-amber-title uppercase tracking-widest font-bold">
                                    Chapter 0{{ $idx + 1 }}
                                </span>
                            </div>

                            <h4 class="font-amber-script text-2xl sm:text-3xl font-normal text-[#F2D59B] tracking-wide pt-1">
                                {{ $story['title'] ?? '' }}
                            </h4>

                            <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] font-normal leading-relaxed text-justify">
                                {{ $story['story'] ?? '' }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Bottom Floral Crest Divider -->
                <div class="w-48 sm:w-60 mx-auto pt-4 pointer-events-none reveal-item anim-amber-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>

            <!-- Golden Wavy Ribbon Divider Across Section -->
            <div class="w-full pt-6 pointer-events-none reveal-item anim-amber-bloom delay-3">
                <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
            </div>
            @elseif($currentThemeId == 13 || $isSummerVibes)
            <!-- ================= THEME 13 BESPOKE LOVE STORY (PREMIUM SUMMER VIBES) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-3xl bg-[#FAF8F5] border-2 border-[#1D63B8]/30 shadow-[0_16px_50px_rgba(29,99,184,0.12)] p-6 sm:p-10 relative space-y-7 text-center text-[#1E293B] reveal-item anim-summer-stamp">
                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.35em] uppercase text-[#1D63B8] font-bold block">
                        OUR LOVE JOURNEY
                    </span>
                    <h3 class="text-3xl sm:text-4xl text-[#D94B26] leading-tight"
                        style="font-family: 'Shrikhand', 'Titan One', cursive;">
                        Cerita Kita
                    </h3>
                    <div class="w-24 sm:w-28 mx-auto pointer-events-none my-1">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Perjalanan kisah cinta kami yang terabadikan dalam lembaran kenangan indah:
                    </p>
                </div>

                <!-- Story Items -->
                <div class="space-y-6 pt-2">
                    @php
                        $t13Stories = !empty($invitation->love_stories) && is_array($invitation->love_stories) ? $invitation->love_stories : [
                            ['year' => '2020', 'title' => 'Pertama Bertemu', 'story' => 'Pertemuan pertama kami bermula di perpustakaan kampus saat menyelesaikan skripsi. Obrolan singkat mengenai buku membuka awal kisah indah kami.'],
                            ['year' => '2022', 'title' => 'Menjalin Hubungan', 'story' => 'Saling memahami dan mendukung impian masing-masing membuat langkah kami kian mantap untuk mengarungi hidup bersama.'],
                            ['year' => '2025', 'title' => 'Lamaran & Komitmen', 'story' => 'Di hadapan kedua keluarga besar, kami mengikrarkan niat tulus untuk melangkah ke ikatan pernikahan yang suci.'],
                        ];
                        $t13StoryPhotos = [$t13StoryPhoto1, $t13StoryPhoto2, $t13StoryPhoto3];
                    @endphp

                    @foreach($t13Stories as $idx => $st)
                    <div class="rounded-2xl bg-white border border-[#1D63B8]/25 p-5 sm:p-6 shadow-sm text-center space-y-3.5 reveal-item anim-fade-up">
                        <!-- Story Photo in Stamp Frame if available -->
                        @if(!empty($t13StoryPhotos[$idx]))
                        <div class="theme-summer-stamp w-36 sm:w-40 mx-auto drop-shadow-md">
                            <div class="theme-summer-stamp-photo">
                                <img src="{{ $t13StoryPhotos[$idx] }}" alt="{{ $st['title'] ?? 'Story' }}" class="w-full h-full object-cover">
                            </div>
                            <img src="{{ asset('images/themes/summer-vibes/stamp-frame.png') }}" alt="" class="theme-summer-stamp-overlay">
                        </div>
                        @endif

                        <div class="inline-block px-3.5 py-1 rounded-full bg-[#D94B26] text-white text-[11px] font-bold tracking-wider shadow-xs">
                            {{ $st['year'] ?? (2020 + $idx * 2) }}
                        </div>
                        <h4 class="font-serif text-lg sm:text-xl font-bold text-[#1D63B8]">
                            {{ $st['title'] ?? 'Kisah Cinta' }}
                        </h4>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed max-w-md mx-auto">
                            {{ $st['story'] ?? '' }}
                        </p>
                    </div>
                    @endforeach
                </div>

                <!-- Bottom Blue Floral Divider -->
                <div class="w-28 sm:w-36 mx-auto pt-2 pointer-events-none">
                    <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
            @elseif($currentThemeId == 16 || $isMuseumOfLove)
            <!-- ================= THEME 16 BESPOKE LOVE STORY (PREMIUM MUSEUM OF LOVE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl theme-museum-canvas border border-[#D4AF37]/45 shadow-[0_16px_50px_rgba(56,35,24,0.18)] p-6 sm:p-10 relative space-y-7 text-center text-[#2A1F1D] reveal-item anim-museum-card">
                <!-- Overhead Museum Spotlight Effect -->
                <div class="museum-spotlight absolute top-0 left-1/2 -translate-x-1/2 w-48 sm:w-64 h-32 pointer-events-none"></div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-museum-sub tracking-[0.35em] uppercase text-[#8B1E22] font-bold block">
                        ARCHIVE OF LOVE
                    </span>
                    <h3 class="font-museum-title text-3xl sm:text-4xl font-bold tracking-wide text-[#382318]">
                        Cerita Kita
                    </h3>
                    <div class="w-16 h-0.5 bg-[#8B1E22] mx-auto my-2"></div>
                    <p class="font-museum-body text-xs sm:text-sm text-[#5C4033] font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Perjalanan kisah cinta kami yang terabadikan dalam lembaran sejarah dan galeri kenangan:
                    </p>
                </div>

                @php
                    $t16Milestones = !empty($invitation->milestones) && count($invitation->milestones) > 0
                        ? $invitation->milestones
                        : [
                            ['year' => '2021', 'title' => 'Pertemuan Pertama', 'story' => 'Sebuah pertemuan tak terduga yang dipersatukan oleh takdir. Dari sapaan hangat dan perbincangan bersahaja, terukir permulaan dari kisah perjalanan kami.'],
                            ['year' => '2024', 'title' => 'Mengikat Janji Hati', 'story' => 'Menghadapi berbagai warna kehidupan bersama semakin menguatkan rasa percaya dan komitmen kami untuk melangkah beriringan menuju masa depan.'],
                            ['year' => '2027', 'title' => 'Menuju Pelaminan Suci', 'story' => 'Dengan penuh rasa syukur dan restu tulus keluarga besar tercinta, kami memantapkan hati untuk menyatukan dua jiwa dalam ikatan suci pernikahan.'],
                        ];
                    $t16StoryImgs = [$t16StoryPhoto1, $t16StoryPhoto2, $t16StoryPhoto3];
                @endphp

                <!-- Milestone Exhibition Gallery (Oil Painting Style Frames) -->
                <div class="space-y-7 pt-2">
                    @foreach($t16Milestones as $idx => $story)
                    @php
                        $cardImg = !empty($story['image'])
                            ? (Str::startsWith($story['image'], ['http://', 'https://']) ? $story['image'] : asset('storage/' . $story['image']))
                            : ($t16StoryImgs[$idx % count($t16StoryImgs)] ?? $t16StoryPhoto1);
                    @endphp
                    <div class="rounded-2xl border-2 border-[#D4AF37]/50 bg-[#FFFDF9] p-4 sm:p-6 shadow-md hover:shadow-xl transition-all duration-500 space-y-4 text-center reveal-item anim-museum-card delay-{{ ($idx % 3) + 1 }} relative">
                        <!-- Frame Corner Ornaments -->
                        <div class="absolute top-2 left-2 w-3 h-3 border-t-2 border-l-2 border-[#8B1E22]/60"></div>
                        <div class="absolute top-2 right-2 w-3 h-3 border-t-2 border-r-2 border-[#8B1E22]/60"></div>
                        <div class="absolute bottom-2 left-2 w-3 h-3 border-b-2 border-l-2 border-[#8B1E22]/60"></div>
                        <div class="absolute bottom-2 right-2 w-3 h-3 border-b-2 border-r-2 border-[#8B1E22]/60"></div>

                        <!-- Painting Container with Gold Inner Matting -->
                        @if(!empty($cardImg))
                        <div class="w-full aspect-[16/10] sm:aspect-[16/9] rounded-xl overflow-hidden p-1.5 bg-gradient-to-br from-[#D4AF37] via-[#F3E196] to-[#A67C1E] shadow-md">
                            <div class="w-full h-full rounded-lg overflow-hidden bg-[#2A1F1D]">
                                <img src="{{ $cardImg }}" alt="{{ $story['title'] ?? 'Story' }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-700">
                            </div>
                        </div>
                        @endif

                        <!-- Museum Brass Placard -->
                        <div class="space-y-2 pt-1 text-center">
                            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-[#8B1E22] text-[#FAF5EC] font-museum-sub text-[10px] sm:text-[11px] font-bold tracking-widest uppercase shadow-xs">
                                <span>CHAPTER 0{{ $idx + 1 }}</span>
                                <span class="w-1 h-1 rounded-full bg-[#FAF5EC]"></span>
                                <span>{{ $story['year'] ?? '' }}</span>
                            </div>

                            <h4 class="font-museum-script text-2xl sm:text-3xl font-bold text-[#8B1E22] tracking-wide pt-1">
                                {{ $story['title'] ?? '' }}
                            </h4>

                            <p class="font-museum-body text-xs sm:text-sm text-[#5C4033] font-light leading-relaxed max-w-md mx-auto text-center">
                                {{ $story['story'] ?? '' }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Bookshelf Divider Below Cerita -->
                <div class="w-full max-w-sm sm:max-w-md mx-auto pt-4 pointer-events-none reveal-item anim-museum-frame delay-3">
                    <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @else
            <div class="theme-arch-frame bg-white p-6 sm:p-10 md:p-14 shadow-lg w-full mx-auto relative reveal-item anim-border">
                
                @if($currentThemeId == 1)
                <!-- Corner Botanical Sprigs for Theme 1 Love Story -->
                <div class="absolute -top-3.5 -left-3.5 sm:-top-4 sm:-left-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tl delay-1">
                    <img src="/images/themes/bg/maroon-delicate-top-left.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -bottom-3.5 -right-3.5 sm:-bottom-4 sm:-right-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-br delay-2">
                    <img src="/images/themes/bg/maroon-delicate-bottom-right.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @elseif($currentThemeId == 19)
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/lavender-butterflies.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -top-3.5 -left-3.5 sm:-top-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-tl delay-1">
                    <img src="/images/themes/bg/lavender-butterflies-flip.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @endif

                <p class="theme-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-[var(--text-muted)] font-semibold reveal-item anim-title delay-1">
                    Our Journey
                </p>
                <h2 class="theme-heading text-2xl sm:text-4xl font-bold text-[var(--text-main)] mt-1 mb-2 reveal-item anim-title delay-1">
                    Love Story
                </h2>
                @if($currentThemeId == 1)
                <div class="w-48 sm:w-56 mx-auto my-3 pointer-events-none reveal-item anim-fade-up delay-1">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>
                @elseif($currentThemeId == 19)
                <div class="w-36 sm:w-48 h-7 mx-auto my-3 pointer-events-none reveal-item anim-flower-center delay-1">
                    <img src="/images/themes/bg/lavender-wildflowers.svg" alt="" class="w-full h-full">
                </div>
                @endif

                <div class="relative pl-6 sm:pl-8 space-y-8 text-left border-l-2 border-[var(--border-frame)]/30 ml-6 sm:ml-12 mr-2 max-w-2xl mx-auto">
                    @foreach($invitation->milestones as $idx => $m)
                    @if(!empty($m['year']) || !empty($m['title']))
                    <div class="relative reveal-item anim-fade-up delay-{{ ($idx % 4) + 1 }}">
                        <span class="absolute -left-[33px] sm:-left-[41px] top-1 w-4 h-4 rounded-full {{ $loop->last ? 'bg-[var(--ornament-primary)] animate-ping' : 'bg-[var(--bg-accent-block)]' }} border-2 border-white shadow-xs"></span>
                        <span class="text-[10px] sm:text-xs font-mono font-bold text-[var(--text-accent)] uppercase tracking-wider block">{{ $m['year'] ?? '' }}</span>
                        <h4 class="font-serif font-bold text-base sm:text-lg text-[var(--text-main)] mt-0.5">{{ $m['title'] ?? '' }}</h4>
                        <p class="text-xs sm:text-sm text-[var(--text-muted)] font-light leading-relaxed mt-1">
                            {{ $m['story'] ?? '' }}
                        </p>
                    </div>
                    @endif
                    @endforeach
                </div>

                @if($currentThemeId == 19)
                <div class="w-full pointer-events-none mt-8 -mb-6 sm:-mb-14">
                    <img src="/images/themes/bg/lavender-meadow-bottom.svg" alt="" class="w-full h-10 sm:h-12 object-cover opacity-85">
                </div>
                @endif
            </div>
            @endif
        </section>
        @endif


        <!-- ================= 8. SECTION GALERI PENGANTIN (RESPONSIVE GRID) ================= -->
        <section id="section-galeri" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
            @if($currentThemeId == 2)
            <!-- THEME 2 BESPOKE GALERI PENGANTIN (BASIC HARMONY EMERALD) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
                <!-- Section Header on White Canvas -->
                <div class="text-center space-y-1 py-1">
                    <div class="w-24 sm:w-28 h-8 mx-auto">
                        <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                    </div>
                    <p class="font-heading text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-stone-700 font-semibold">
                        {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                    </p>
                    <h3 class="font-heading text-lg sm:text-2xl font-bold text-stone-800 tracking-wider">
                        GALERI BAHAGIA
                    </h3>
                </div>

                <div class="rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-3 sm:p-4 relative border border-[#D4AF37]/45 reveal-item anim-fade-up">
                    <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-5 sm:p-8 space-y-4">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                            @foreach($galleryPhotos as $idx => $photo)
                            <div class="aspect-square rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-md group cursor-pointer relative" onclick="openLightbox('{{ $photo }}')">
                                <img src="{{ $photo }}" alt="Galeri Foto {{ $idx+1 }}" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                                <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                            </div>
                            @endforeach
                        </div>
                        <p class="text-[10px] sm:text-xs text-white/70 italic text-center pt-2">
                            *Klik foto untuk memperbesar tampilan
                        </p>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 3)
            <!-- THEME 3 BESPOKE GALERI FOTO (BASIC HARMONY NAVY - MATCHING IMAGE 2 SECTION 8) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
                <div class="text-center space-y-1 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-stone-500 font-heading block">
                        OUR MOMENTS
                    </span>
                    <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-stone-800">
                        Galeri Foto
                    </h3>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5 sm:gap-3.5">
                    @foreach($galleryPhotos as $idx => $photoUrl)
                    <div class="{{ $idx === 2 ? 'col-span-2 md:col-span-2 row-span-1 aspect-[16/9]' : 'col-span-1 aspect-[3/4]' }} rounded-xl overflow-hidden shadow-md border border-slate-200 cursor-pointer group relative reveal-item anim-zoom-in delay-{{ ($idx % 4) + 1 }}" onclick="openLightbox('{{ $photoUrl }}')">
                        <img src="{{ $photoUrl }}" alt="Galeri Foto {{ $idx+1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-[#1E3A5F]/0 group-hover:bg-[#1E3A5F]/30 transition-colors flex items-center justify-center">
                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @elseif($currentThemeId == 1)
            <!-- THEME 1 BESPOKE GALERI FOTO (BASIC HARMONY MAROON - MATCHING REFERENCE) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto space-y-6 sm:space-y-8">
                <!-- Top Floral Branch Ornament Matching Image 1 -->
                <div class="w-48 sm:w-56 mx-auto pointer-events-none reveal-item anim-fade-up">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>

                <!-- Heading: Galeri -->
                <div class="text-center space-y-1 reveal-item anim-fade-up">
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold tracking-wide text-[#620000]">
                        Galeri
                    </h3>
                </div>

                <!-- Responsive Photo Mosaic/Grid -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4">
                    @foreach($galleryPhotos as $idx => $photo)
                    <div class="aspect-square rounded-2xl overflow-hidden shadow-md border-2 border-[#620000]/20 group cursor-pointer relative bg-stone-900 reveal-item anim-zoom-in delay-{{ ($idx % 4) + 1 }}" onclick="openLightbox('{{ $photo }}')">
                        <img src="{{ $photo }}" alt="Galeri Foto {{ $idx+1 }}" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                    </div>
                    @endforeach
                </div>
            </div>
            @elseif($currentThemeId == 5)
            <!-- ================= THEME 5 BESPOKE WEDDING GALLERY (BASIC HARMONY MONOCHROME - MATCHING IMAGE 4) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-6 sm:space-y-8 text-center">
                <!-- Section Header -->
                <div class="space-y-1.5 text-center">
                    <p class="font-serif text-xs uppercase tracking-[0.25em] text-stone-500 font-light reveal-item anim-tracking delay-1">
                        Our Moments
                    </p>
                    <h2 class="theme-script text-4xl sm:text-5xl text-[#18181B] font-normal leading-tight reveal-item anim-script delay-2">
                        Wedding Gallery
                    </h2>
                    <p class="font-serif text-xs text-stone-600 font-light max-w-sm mx-auto leading-relaxed pt-1 reveal-item anim-fade-up delay-3">
                        Momen-momen indah yang mengabadikan langkah awal perjalanan cinta kami.
                    </p>
                </div>

                <!-- Bespoke Editorial 3-2-1 Grid Matching Image 4 -->
                <div class="space-y-2.5 sm:space-y-3.5">
                    <!-- Row 1: 3 Tall Portrait Photos Side by Side (Staggered curved & pop entrance) -->
                    <div class="grid grid-cols-3 gap-2 sm:gap-3">
                        @for($i = 0; $i < 3; $i++)
                        @php 
                            $photo = $t5GalleryPhotos[$i] ?? $t5DefaultGallery[$i];
                            $animClass = $i === 0 ? 'anim-curved-left delay-1' : ($i === 1 ? 'anim-pop-in delay-2' : 'anim-curved-right delay-3');
                        @endphp
                        <div class="aspect-[3/4] rounded-xl sm:rounded-2xl overflow-hidden border border-stone-800/20 shadow-md group cursor-pointer relative bg-stone-100 reveal-item {{ $animClass }}" onclick="openLightbox('{{ $photo }}')">
                            <img src="{{ $photo }}" alt="Gallery {{ $i + 1 }}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors flex items-center justify-center">
                                <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                            </div>
                        </div>
                        @endfor
                    </div>

                    <!-- Row 2: 2 Portrait Photos Side by Side (Staggered curved entrance from left and right) -->
                    <div class="grid grid-cols-2 gap-2 sm:gap-3">
                        @for($i = 3; $i < 5; $i++)
                        @php 
                            $photo = $t5GalleryPhotos[$i] ?? $t5DefaultGallery[$i]; 
                            $animClass = $i === 3 ? 'anim-curved-left delay-2' : 'anim-curved-right delay-3';
                        @endphp
                        <div class="aspect-[3/4] rounded-xl sm:rounded-2xl overflow-hidden border border-stone-800/20 shadow-md group cursor-pointer relative bg-stone-100 reveal-item {{ $animClass }}" onclick="openLightbox('{{ $photo }}')">
                            <img src="{{ $photo }}" alt="Gallery {{ $i + 1 }}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors flex items-center justify-center">
                                <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                            </div>
                        </div>
                        @endfor
                    </div>

                    <!-- Row 3: 1 Full-Width Landscape / Editorial Photo (Cinematic Zoom Expand) -->
                    @php $photo5 = $t5GalleryPhotos[5] ?? $t5DefaultGallery[5]; @endphp
                    <div class="w-full aspect-[16/10] rounded-xl sm:rounded-2xl overflow-hidden border border-stone-800/20 shadow-md group cursor-pointer relative bg-stone-100 reveal-item anim-cinematic delay-3" onclick="openLightbox('{{ $photo5 }}')">
                        <img src="{{ $photo5 }}" alt="Gallery 6" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors flex items-center justify-center">
                            <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        </div>
                    </div>

                    <!-- Additional Photos (if user uploaded more than 6 photos) -->
                    @if(count($t5GalleryPhotos) > 6)
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 sm:gap-3 pt-1">
                        @for($i = 6; $i < count($t5GalleryPhotos); $i++)
                        @php $extraPhoto = $t5GalleryPhotos[$i]; @endphp
                        <div class="aspect-[3/4] rounded-xl sm:rounded-2xl overflow-hidden border border-stone-800/20 shadow-md group cursor-pointer relative bg-stone-100 reveal-item anim-pop-in delay-{{ ($i % 3) + 1 }}" onclick="openLightbox('{{ $extraPhoto }}')">
                            <img src="{{ $extraPhoto }}" alt="Gallery {{ $i + 1 }}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/25 transition-colors flex items-center justify-center">
                                <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                            </div>
                        </div>
                        @endfor
                    </div>
                    @endif
                </div>

                <p class="text-[10px] sm:text-xs text-stone-500 italic text-center pt-1 font-serif reveal-item anim-fade-up delay-4">
                    *Klik foto untuk memperbesar tampilan
                </p>
            </div>
            @elseif($currentThemeId == 20 || $isDarkElegance)
            <!-- ================= THEME 20 BESPOKE WEDDING GALLERY (PREMIUM SERENADE DARK ELEGANCE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-6 sm:space-y-8 text-center text-[#FAF7F2] py-4 relative">
                <!-- Arch Vertical Floral Flourishes on Left & Right Top Corners -->
                <div class="absolute -top-10 -left-6 sm:-left-8 w-16 sm:w-20 h-auto pointer-events-none z-10 opacity-75 reveal-item anim-arch-floral delay-1">
                    <img src="{{ asset('images/themes/serenade-dark/floral-vertical.png') }}" alt="" class="w-full h-auto object-contain -scale-x-100">
                </div>
                <div class="absolute -top-10 -right-6 sm:-right-8 w-16 sm:w-20 h-auto pointer-events-none z-10 opacity-75 reveal-item anim-arch-floral delay-1">
                    <img src="{{ asset('images/themes/serenade-dark/floral-vertical.png') }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Section Header -->
                <div class="space-y-1.5 pt-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.3em] uppercase text-[#9EB092] font-semibold block">
                        OUR MOMENTS
                    </span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold tracking-wide text-[#FAF7F2]">
                        Wedding Gallery
                    </h3>
                    <p class="font-serif text-xs text-[#D5DDD0] font-light leading-relaxed max-w-sm mx-auto">
                        Momen-momen indah yang mengabadikan langkah awal perjalanan cinta kami:
                    </p>
                </div>

                <!-- 1. Top 5-Photo Rolling Continuous Slider (Marquee Strip) -->
                <div class="w-full overflow-hidden py-2 bg-[#131713]/80 rounded-2xl border border-[#9EB092]/30 relative select-none reveal-item anim-cinematic delay-1">
                    <div class="animate-rolling-strip gap-2.5 sm:gap-3">
                        @foreach(array_merge($t20RollingPhotos, $t20RollingPhotos) as $idx => $slideImg)
                        <div class="w-24 sm:w-32 aspect-square shrink-0 rounded-xl overflow-hidden border border-[#9EB092]/40 shadow-md bg-stone-900 group cursor-pointer" onclick="openLightbox('{{ $slideImg }}')">
                            <img src="{{ $slideImg }}" alt="Slide {{ ($idx % 5) + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- 2. Featured Spotlight Center Photo -->
                <div class="w-full max-w-[280px] sm:max-w-[340px] aspect-[3/4] mx-auto rounded-3xl overflow-hidden border-2 border-[#9EB092] p-1.5 shadow-2xl relative group cursor-pointer reveal-item anim-card-rise delay-2" onclick="openLightbox('{{ $t20GalleryPhotos[0] ?? $t20CoverPhoto }}')">
                    <div class="w-full h-full rounded-[22px] overflow-hidden relative">
                        <img src="{{ $t20GalleryPhotos[0] ?? $t20CoverPhoto }}" alt="Featured Portrait" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent flex items-end justify-center pb-4">
                            <span class="text-xs font-serif tracking-widest text-[#FAF7F2] uppercase font-medium">Theo &amp; Lisa</span>
                        </div>
                    </div>
                </div>

                <!-- 3. Photo Grid (2 Columns on Mobile / Tablet) -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4 max-w-md mx-auto pt-1">
                    @for($i = 1; $i < min(5, count($t20GalleryPhotos)); $i++)
                    @php $photo = $t20GalleryPhotos[$i]; @endphp
                    <div class="aspect-square rounded-2xl overflow-hidden border border-[#9EB092]/40 shadow-lg group cursor-pointer relative bg-stone-900 reveal-item anim-zoom-in delay-{{ $i }}" onclick="openLightbox('{{ $photo }}')">
                        <img src="{{ $photo }}" alt="Gallery {{ $i + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/35 transition-colors flex items-center justify-center">
                            <svg class="w-6 h-6 text-[#9EB092] opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        </div>
                    </div>
                    @endfor
                </div>

                <p class="text-[10px] sm:text-xs text-[#9EB092]/80 italic text-center font-serif reveal-item anim-fade-up delay-3">
                    *Klik foto untuk memperbesar tampilan
                </p>

                <!-- Symmetrical Flower Divider Below Galeri -->
                <div class="w-48 sm:w-64 mx-auto pt-4 reveal-item anim-floral-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-dark/floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
            @elseif($currentThemeId == 19 || $isLavenderMist)
            <!-- ================= THEME 19 BESPOKE WEDDING GALLERY (PREMIUM SERENADE LAVENDER MIST) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-t-[44px] sm:rounded-t-[56px] rounded-b-3xl bg-white theme-lavender-pattern shadow-2xl p-6 sm:p-10 relative space-y-6 text-center text-[#2D1E40] reveal-item anim-lavender-card-3d">
                <!-- Top Floral Garland Decoration -->
                <div class="w-56 sm:w-72 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-lavender-flower-unfold">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-lavender-title">
                    <span class="text-[11px] sm:text-xs font-lavender-title tracking-[0.35em] uppercase text-[#8B7CB0] font-bold block">
                        OUR MOMENTS
                    </span>
                    <h3 class="font-lavender-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#2D1E40]">
                        Galeri Kebahagiaan
                    </h3>
                    <p class="font-lavender-body text-xs sm:text-sm text-[#6E5D87] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Momen-momen indah yang mengabadikan langkah awal perjalanan cinta kami:
                    </p>
                </div>

                @if(!empty($invitation->youtube_url))
                @php
                    $ytUrl = $invitation->youtube_url;
                    $ytEmbed = '';
                    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/', $ytUrl, $ytMatches)) {
                        $ytEmbed = 'https://www.youtube.com/embed/' . $ytMatches[1];
                    }
                @endphp
                @if($ytEmbed)
                <div class="w-full aspect-[16/9] rounded-2xl overflow-hidden shadow-lg border border-[#C5B8D8] bg-black reveal-item anim-lavender-card-3d delay-1">
                    <iframe src="{{ $ytEmbed }}" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif
                @endif

                <!-- Featured Spotlight Center Photo -->
                <div class="w-full max-w-[280px] sm:max-w-[340px] aspect-[3/4] mx-auto rounded-3xl overflow-hidden border-2 border-[#C5B8D8] p-1.5 shadow-xl relative group cursor-pointer reveal-item anim-lavender-frame delay-1" onclick="openLightbox('{{ $t19GalleryPhotos[0] ?? $t19CoverPhoto }}')">
                    <div class="w-full h-full rounded-[22px] overflow-hidden relative">
                        <img src="{{ $t19GalleryPhotos[0] ?? $t19CoverPhoto }}" alt="Featured Portrait" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent flex items-end justify-center pb-4">
                            <span class="text-xs font-lavender-title tracking-widest text-white uppercase font-bold">{{ $groomNickname }} &amp; {{ $brideNickname }}</span>
                        </div>
                    </div>
                </div>

                <!-- Photo Grid (2 Columns on Mobile / Tablet) -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4 max-w-md mx-auto pt-1">
                    @for($i = 1; $i < min(6, count($t19GalleryPhotos)); $i++)
                    @php $photo = $t19GalleryPhotos[$i]; @endphp
                    <div class="aspect-square rounded-2xl overflow-hidden border border-[#C5B8D8] shadow-md group cursor-pointer relative bg-purple-50 reveal-item anim-lavender-pop delay-{{ $i }}" onclick="openLightbox('{{ $photo }}')">
                        <img src="{{ $photo }}" alt="Gallery {{ $i + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-[#3D2D56]/0 group-hover:bg-[#3D2D56]/30 transition-colors flex items-center justify-center">
                            <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                        </div>
                    </div>
                    @endfor
                </div>

                <p class="text-[10px] sm:text-xs text-[#8B7CB0] italic text-center font-lavender-body reveal-item anim-lavender-title delay-3">
                    *Klik foto untuk memperbesar tampilan
                </p>

                <!-- Bottom Floral Garland Divider -->
                <div class="w-56 sm:w-72 mx-auto pt-4 pointer-events-none reveal-item anim-lavender-flower-unfold delay-3">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @elseif($currentThemeId == 15 || $isMidnightAmber)
            <!-- ================= THEME 15 BESPOKE GALERI PENGANTIN (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl bg-[#1C1A18] border border-[#DDA74F]/40 shadow-[0_16px_50px_rgba(0,0,0,0.8)] p-6 sm:p-10 relative space-y-6 text-center text-white reveal-item anim-amber-card-3d">
                <!-- Top Floral Crest Decoration -->
                <div class="w-48 sm:w-60 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-amber-bloom">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-amber-title">
                    <span class="text-[11px] sm:text-xs font-amber-title tracking-[0.35em] uppercase text-[#DDA74F] font-bold block">
                        OUR MOMENTS
                    </span>
                    <h3 class="font-amber-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#FAF5EC]">
                        Galeri Bahagia
                    </h3>
                    <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Momen-momen indah perjalanan kisah cinta kami yang terabadikan dalam kehangatan cinta:
                    </p>
                </div>

                @if(!empty($invitation->video_url))
                <!-- Video Prewedding Embed -->
                <div class="rounded-2xl overflow-hidden border border-[#DDA74F]/40 shadow-xl bg-black aspect-video relative reveal-item anim-amber-card-3d delay-1">
                    @php
                        $videoEmbed = $invitation->video_url;
                        if(str_contains($videoEmbed, 'youtube.com/watch?v=')) {
                            $videoEmbed = str_replace('watch?v=', 'embed/', $videoEmbed);
                        } elseif(str_contains($videoEmbed, 'youtu.be/')) {
                            $videoEmbed = str_replace('youtu.be/', 'youtube.com/embed/', $videoEmbed);
                        }
                    @endphp
                    <iframe src="{{ $videoEmbed }}" title="Prewedding Video" class="w-full h-full" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif

                <!-- Featured Portrait Photo -->
                <div class="max-w-xs sm:max-w-sm mx-auto aspect-[3/4] rounded-2xl overflow-hidden border-2 border-[#DDA74F]/60 shadow-[0_10px_30px_rgba(221,167,79,0.25)] relative group cursor-pointer reveal-item anim-amber-frame delay-1" onclick="openLightbox('{{ $t15GalleryPhotos[0] ?? $t15CoverPhoto }}')">
                    <img src="{{ $t15GalleryPhotos[0] ?? $t15CoverPhoto }}" alt="Featured Moment" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent flex flex-col justify-end p-4 text-center">
                        <span class="font-amber-script text-2xl sm:text-3xl text-[#F2D59B]">{{ $groomNickname }} &amp; {{ $brideNickname }}</span>
                        <span class="text-[10px] uppercase tracking-widest text-[#DDA74F] font-amber-title font-semibold">Klik untuk melihat</span>
                    </div>
                </div>

                <!-- Photo Grid (2 Columns on Mobile / Tablet) -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4 max-w-md mx-auto pt-2">
                    @for($i = 1; $i < min(6, count($t15GalleryPhotos)); $i++)
                    @php $photo = $t15GalleryPhotos[$i]; @endphp
                    <div class="aspect-square rounded-xl overflow-hidden border border-[#DDA74F]/40 shadow-lg group cursor-pointer relative bg-[#161514] reveal-item anim-amber-pop delay-{{ $i }}" onclick="openLightbox('{{ $photo }}')">
                        <img src="{{ $photo }}" alt="Gallery {{ $i + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-[#161514]/0 group-hover:bg-[#161514]/40 transition-colors flex items-center justify-center">
                            <div class="w-8 h-8 rounded-full bg-[#DDA74F]/90 text-[#161514] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:scale-110">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <p class="text-[10px] sm:text-xs text-[#C4B5A5] italic text-center font-amber-body reveal-item anim-amber-title delay-3">
                    *Klik foto untuk memperbesar tampilan layar penuh
                </p>

                <!-- Bottom Floral Crest Divider -->
                <div class="w-48 sm:w-60 mx-auto pt-4 pointer-events-none reveal-item anim-amber-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>

            <!-- Golden Wavy Ribbon Divider Across Section -->
            <div class="w-full pt-6 pointer-events-none reveal-item anim-amber-bloom delay-3">
                <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
            </div>
            @elseif($currentThemeId == 13 || $isSummerVibes)
            <!-- ================= THEME 13 BESPOKE GALERI FOTO (PREMIUM SUMMER VIBES) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto summer-ticket-card text-center text-[#1E293B] reveal-item anim-summer-stamp">
                <!-- Top Perforation Circles -->
                <div class="absolute -top-4 left-0 right-0 flex justify-around pointer-events-none z-20">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                </div>

                <div class="summer-ticket-inner space-y-6">
                    <!-- Section Header matching Reference -->
                    <div class="space-y-1.5 reveal-item anim-fade-up">
                        <span class="text-[11px] sm:text-xs font-serif tracking-[0.35em] uppercase text-[#1D63B8] font-bold block">
                            OUR MOMENTS
                        </span>
                        <h3 class="text-3xl sm:text-4xl text-[#D94B26] leading-tight"
                            style="font-family: 'Shrikhand', 'Titan One', cursive;">
                            Gallery
                        </h3>
                        <div class="w-24 sm:w-28 mx-auto pointer-events-none my-1">
                            <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                        </div>
                    </div>

                    <!-- 2-Column Photo Grid with Scalloped Cloud Accents matching Reference -->
                    <div class="grid grid-cols-2 gap-3 sm:gap-4 pt-1">
                        @foreach($t13GalleryPhotos as $gIdx => $gPhoto)
                        <div class="group relative rounded-2xl overflow-hidden bg-white border-2 border-[#1D63B8]/30 shadow-sm hover:shadow-lg transition-all duration-300 cursor-pointer aspect-square reveal-item anim-fade-up"
                             onclick="openThemeLightbox('{{ $gPhoto }}', 'Momen Bahagia {{ $gIdx + 1 }}')">
                            <!-- Cloud Accent on Corners -->
                            @if($gIdx % 2 === 0)
                            <div class="absolute -top-2 -right-2 w-10 sm:w-12 h-10 sm:h-12 bg-[#1D63B8] rounded-bl-2xl pointer-events-none z-10 opacity-90"></div>
                            @else
                            <div class="absolute -bottom-2 -left-2 w-10 sm:w-12 h-10 sm:h-12 bg-[#D94B26] rounded-tr-2xl pointer-events-none z-10 opacity-90"></div>
                            @endif

                            <img src="{{ $gPhoto }}" alt="Gallery {{ $gIdx + 1 }}" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                            
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-[#1D63B8]/30 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-2 z-20">
                                <span class="p-2 rounded-full bg-white text-[#1D63B8] shadow-md transform scale-90 group-hover:scale-100 transition-transform">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <p class="text-[10px] sm:text-xs text-slate-500 italic pt-1">
                        *Klik foto untuk memperbesar tampilan
                    </p>

                    <!-- Bottom Blue Floral Divider -->
                    <div class="w-24 sm:w-32 mx-auto pt-1 pointer-events-none">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                </div>

                <!-- Bottom Perforation Circles -->
                <div class="absolute -bottom-4 left-0 right-0 flex justify-around pointer-events-none z-20">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                </div>
            </div>
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl bg-[#181413] border-2 border-[#D4AF37]/50 shadow-[0_20px_60px_rgba(0,0,0,0.85)] p-6 sm:p-10 relative space-y-7 text-center text-white reveal-item anim-museum-card">
                <!-- Overhead Museum Spotlight Effect -->
                <div class="museum-spotlight absolute top-0 left-1/2 -translate-x-1/2 w-56 sm:w-80 h-36 pointer-events-none"></div>

                <!-- Section Header -->
                <div class="space-y-2 relative z-10 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-museum-sub tracking-[0.35em] uppercase text-[#D4AF37] font-bold block">
                        EXHIBITION OF LOVE
                    </span>
                    <h3 class="font-museum-title text-3xl sm:text-4xl font-bold tracking-wide text-[#FAF5EC]">
                        Galeri Karya Cinta
                    </h3>
                    <div class="w-16 h-0.5 bg-[#D4AF37] mx-auto my-2"></div>
                    <p class="font-museum-body text-xs sm:text-sm text-[#C4B5A5] font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Momen-momen indah perjalanan kisah cinta kami yang terabadikan dalam galeri seni:
                    </p>
                </div>

                @if(!empty($invitation->video_url))
                <!-- Video Prewedding in Classical Frame -->
                <div class="rounded-2xl overflow-hidden border-2 border-[#D4AF37]/60 shadow-2xl bg-black aspect-video relative reveal-item anim-museum-card delay-1 p-1 bg-gradient-to-br from-[#D4AF37] via-[#9E782F] to-[#5C4018]">
                    @php
                        $videoEmbed = $invitation->video_url;
                        if(str_contains($videoEmbed, 'youtube.com/watch?v=')) {
                            $videoEmbed = str_replace('watch?v=', 'embed/', $videoEmbed);
                        } elseif(str_contains($videoEmbed, 'youtu.be/')) {
                            $videoEmbed = str_replace('youtu.be/', 'youtube.com/embed/', $videoEmbed);
                        }
                    @endphp
                    <iframe src="{{ $videoEmbed }}" title="Prewedding Video" class="w-full h-full rounded-xl" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                @endif

                <!-- Featured Masterpiece Portrait in Baroque Frame -->
                <div class="max-w-xs sm:max-w-sm mx-auto aspect-[3/4] rounded-2xl overflow-hidden p-2 bg-gradient-to-br from-[#D4AF37] via-[#F3E196] to-[#8F6C25] shadow-[0_12px_35px_rgba(212,175,55,0.3)] relative group cursor-pointer reveal-item anim-museum-frame delay-1" onclick="openLightbox('{{ $t16GalleryPhotos[0] ?? $t16CoverPhoto }}')">
                    <div class="w-full h-full rounded-xl overflow-hidden relative">
                        <img src="{{ $t16GalleryPhotos[0] ?? $t16CoverPhoto }}" alt="Featured Masterpiece" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent flex flex-col justify-end p-4 text-center">
                            <span class="font-museum-script text-2xl sm:text-3xl text-[#F2D59B]">{{ $groomNickname }} &amp; {{ $brideNickname }}</span>
                            <span class="text-[10px] uppercase tracking-widest text-[#D4AF37] font-museum-sub font-semibold">Klik untuk melihat karya penuh</span>
                        </div>
                    </div>
                </div>

                <!-- Museum Photo Grid (2 Columns) -->
                <div class="grid grid-cols-2 gap-3.5 sm:gap-4 max-w-md mx-auto pt-2">
                    @for($i = 1; $i < min(6, count($t16GalleryPhotos)); $i++)
                    @php $photo = $t16GalleryPhotos[$i]; @endphp
                    <div class="aspect-square rounded-xl overflow-hidden p-1.5 bg-gradient-to-br from-[#D4AF37] via-[#A88232] to-[#5C4018] shadow-lg group cursor-pointer relative reveal-item anim-museum-card delay-{{ $i }}" onclick="openLightbox('{{ $photo }}')">
                        <div class="w-full h-full rounded-lg overflow-hidden relative bg-[#2A1F1D]">
                            <img src="{{ $photo }}" alt="Gallery Piece {{ $i + 1 }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-colors flex items-center justify-center">
                                <div class="w-8 h-8 rounded-full bg-[#D4AF37] text-[#181413] flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity transform group-hover:scale-110 shadow-md">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>

                <p class="text-[10px] sm:text-xs text-[#C4B5A5] italic text-center font-museum-body reveal-item anim-fade-up delay-3">
                    *Sentuh karya foto untuk memperbesar tampilan kanvas penuh
                </p>

                <!-- Bookshelf Divider Below Galeri -->
                <div class="w-full max-w-sm sm:max-w-md mx-auto pt-4 pointer-events-none reveal-item anim-museum-frame delay-3">
                    <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @else
            <div class="theme-arch-frame bg-white p-5 sm:p-10 shadow-lg w-full mx-auto relative reveal-item anim-border">
                
                @if($currentThemeId == 1)
                <!-- Corner Botanical Sprigs for Theme 1 Galeri Foto -->
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/maroon-delicate-top.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -bottom-3.5 -left-3.5 sm:-bottom-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-bl delay-2">
                    <img src="/images/themes/bg/maroon-delicate-bottom.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @elseif($currentThemeId == 19)
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/lavender-butterflies.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -bottom-3.5 -left-3.5 sm:-bottom-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-bl delay-2">
                    <img src="/images/themes/bg/lavender-butterflies-flip.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @endif

                <p class="theme-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-[var(--text-muted)] font-semibold reveal-item anim-title delay-1">
                    Pre-Wedding Moments
                </p>
                <h2 class="theme-heading text-2xl sm:text-4xl font-bold text-[var(--text-main)] mt-1 mb-2 reveal-item anim-title delay-1">
                    Galeri Foto
                </h2>
                @if($currentThemeId == 1)
                <div class="w-48 sm:w-56 mx-auto my-3 pointer-events-none reveal-item anim-fade-up delay-1">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>
                @elseif($currentThemeId == 19)
                <div class="w-36 sm:w-48 h-7 mx-auto my-3 pointer-events-none reveal-item anim-flower-center delay-1">
                    <img src="/images/themes/bg/lavender-wildflowers.svg" alt="" class="w-full h-full">
                </div>
                @endif

                <!-- PREMIUM ASYMMETRIC BENTO GRID (Visible on Premium Themes) -->
                <div id="gallery-premium-bento" class="{{ $isPremium ? '' : 'hidden' }} grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4 text-left">
                    <!-- 1. Featured Large Photo with Gold Trim & Masking -->
                    <div class="col-span-2 sm:col-span-2 md:col-span-2 aspect-[4/3] md:aspect-[16/10] overflow-hidden shadow-xl border-2 border-amber-400/90 relative group cursor-pointer reveal-item anim-photo delay-1 theme-hero-photo-shape" onclick="openLightbox('{{ $galleryPhotos[0] }}')">
                        <img src="{{ $galleryPhotos[0] }}" alt="Featured Pre-Wedding" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute top-3 left-3 px-2.5 py-1 rounded-full bg-amber-400 text-stone-950 font-bold text-[9px] uppercase tracking-wider shadow-md">
                            Featured Moment
                        </div>
                        <div class="absolute bottom-3 left-3 text-white">
                            <span class="text-[10px] uppercase font-mono tracking-wider opacity-85 block">The Beginning of Forever</span>
                            <h4 class="font-serif text-base sm:text-lg font-bold">Momen Bahagia Kami</h4>
                        </div>
                    </div>

                    <!-- 2. Arch Dome Mask Photo -->
                    <div class="col-span-1 aspect-[3/4] overflow-hidden shadow-md border-2 border-amber-400/80 relative group cursor-pointer reveal-item anim-photo delay-2 rounded-t-full rounded-b-lg" onclick="openLightbox('{{ $galleryPhotos[1] ?? $galleryPhotos[0] }}')">
                        <img src="{{ $galleryPhotos[1] ?? $galleryPhotos[0] }}" alt="Galeri Foto 2" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                    </div>

                    <!-- 3. Cameo Oval Mask Photo -->
                    <div class="col-span-1 aspect-[3/4] overflow-hidden shadow-md border-2 border-amber-400 relative group cursor-pointer reveal-item anim-photo delay-3 rounded-[9999px]" onclick="openLightbox('{{ $galleryPhotos[2] ?? $galleryPhotos[0] }}')">
                        <img src="{{ $galleryPhotos[2] ?? $galleryPhotos[0] }}" alt="Galeri Foto 3" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                    </div>

                    <!-- 4. Square Gold Rimmed Photo -->
                    <div class="col-span-1 aspect-square overflow-hidden shadow-md border-2 border-amber-400/80 relative group cursor-pointer reveal-item anim-photo delay-4 rounded-xl" onclick="openLightbox('{{ $galleryPhotos[3] ?? $galleryPhotos[0] }}')">
                        <img src="{{ $galleryPhotos[3] ?? $galleryPhotos[0] }}" alt="Galeri Foto 4" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <!-- 5. Portrait Rounded Photo -->
                    <div class="col-span-1 aspect-[3/4] overflow-hidden shadow-md border border-stone-200 relative group cursor-pointer reveal-item anim-photo delay-1 rounded-2xl" onclick="openLightbox('{{ $galleryPhotos[4] ?? $galleryPhotos[0] }}')">
                        <img src="{{ $galleryPhotos[4] ?? $galleryPhotos[0] }}" alt="Galeri Foto 5" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <!-- 6. Wide Polaroid Banner Photo -->
                    @if(isset($galleryPhotos[5]))
                    <div class="col-span-2 sm:col-span-1 md:col-span-2 aspect-[16/9] sm:aspect-square md:aspect-[16/9] overflow-hidden shadow-md border-2 border-amber-400/70 relative group cursor-pointer reveal-item anim-photo delay-2 rounded-xl" onclick="openLightbox('{{ $galleryPhotos[5] }}')">
                        <img src="{{ $galleryPhotos[5] }}" alt="Galeri Foto 6" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    </div>
                    @endif
                </div>

                <!-- BASIC SYMMETRICAL CLEAN GRID (Visible on Basic Themes) -->
                <div id="gallery-basic-grid" class="{{ $isPremium ? 'hidden' : '' }} grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4">
                    @foreach($galleryPhotos as $idx => $photo)
                    <div class="aspect-[3/4] overflow-hidden shadow-xs border border-stone-200 group cursor-pointer reveal-item anim-photo delay-{{ ($idx % 4) + 1 }} theme-photo-shape" onclick="openLightbox('{{ $photo }}')">
                        <img src="{{ $photo }}" alt="Galeri Foto {{ $idx+1 }}" class="w-full h-full object-cover transform group-hover:scale-108 transition-transform duration-500">
                    </div>
                    @endforeach
                </div>

                <p class="text-[10px] sm:text-xs text-[var(--text-muted)] italic mt-6 font-light">
                    *Klik foto untuk memperbesar tampilan
                </p>
            </div>
            @endif
        </section>


        <!-- ================= 9. SECTION KIRIM HADIAH (CASHLESS GIFT) ================= -->
        <section id="section-hadiah" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
            @if($currentThemeId == 2)
            <!-- THEME 2 BESPOKE KIRIM HADIAH (BASIC HARMONY EMERALD) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
                <!-- Section Header on White Canvas -->
                <div class="text-center space-y-1 py-1">
                    <div class="w-24 sm:w-28 h-8 mx-auto">
                        <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                    </div>
                    <p class="font-heading text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-stone-700 font-semibold">
                        {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                    </p>
                    <h3 class="font-heading text-lg sm:text-2xl font-bold text-stone-800 tracking-wider">
                        TANDA KASIH &amp; AMPLOP DIGITAL
                    </h3>
                </div>

                <div class="rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-3 sm:p-4 relative border border-[#D4AF37]/45 reveal-item anim-fade-up">
                    <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-5 sm:p-8 space-y-6">
                        <!-- Gold Interlocking Rings Divider -->
                        <div class="w-44 sm:w-52 h-6 mx-auto">
                            <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="Rings" class="w-full h-full object-contain">
                        </div>

                        <p class="text-xs sm:text-sm text-white/90 max-w-lg mx-auto leading-relaxed">
                            Doa restu Anda merupakan karunia terindah bagi kami. Namun jika berkenan memberikan tanda kasih secara digital, Anda dapat melalui rekening berikut:
                        </p>

                        <!-- Bank Transfer Cards (Responsive Grid) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 text-left">
                            <!-- Bank BCA -->
                            <div class="p-4 sm:p-5 rounded-xl bg-[#134A37] border border-[#D4AF37]/45 space-y-3 flex flex-col justify-between shadow-md">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <span class="font-black text-sm tracking-wide text-white">BANK BCA</span>
                                        <span class="text-[10px] font-mono text-[#E5C158] uppercase">Transfer Bank</span>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-[10px] text-white/70 block">Nomor Rekening:</span>
                                        <p class="font-mono font-bold text-base sm:text-lg text-[#E5C158] tracking-wider">
                                            {{ $invitation->gift_account_number ?? '8801234567' }}
                                        </p>
                                        <p class="text-xs text-white/85 font-medium">
                                            a.n. {{ $invitation->gift_account_holder ?? $groomName }}
                                        </p>
                                    </div>
                                </div>
                                <button type="button" onclick="copyToClipboard('{{ $invitation->gift_account_number ?? '8801234567' }}', 'Nomor rekening BCA')" class="w-full py-2 px-3 rounded-full bg-gradient-to-r from-[#9C782F] via-[#C59B3F] to-[#8F6C25] hover:from-[#AD8737] hover:to-[#9C782F] border border-[#F3E196]/80 text-white font-bold text-xs tracking-wider uppercase transition flex items-center justify-center gap-1.5 shadow-md cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                    <span>Salin No. Rekening</span>
                                </button>
                            </div>

                            <!-- Bank Mandiri -->
                            <div class="p-4 sm:p-5 rounded-xl bg-[#134A37] border border-[#D4AF37]/45 space-y-3 flex flex-col justify-between shadow-md">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <span class="font-black text-sm tracking-wide text-white">BANK MANDIRI</span>
                                        <span class="text-[10px] font-mono text-[#E5C158] uppercase">Transfer Bank</span>
                                    </div>
                                    <div class="mt-2">
                                        <span class="text-[10px] text-white/70 block">Nomor Rekening:</span>
                                        <p class="font-mono font-bold text-base sm:text-lg text-[#E5C158] tracking-wider">
                                            1230009876543
                                        </p>
                                        <p class="text-xs text-white/85 font-medium">
                                            a.n. {{ $brideName }}
                                        </p>
                                    </div>
                                </div>
                                <button type="button" onclick="copyToClipboard('1230009876543', 'Nomor rekening Mandiri')" class="w-full py-2 px-3 rounded-full bg-gradient-to-r from-[#9C782F] via-[#C59B3F] to-[#8F6C25] hover:from-[#AD8737] hover:to-[#9C782F] border border-[#F3E196]/80 text-white font-bold text-xs tracking-wider uppercase transition flex items-center justify-center gap-1.5 shadow-md cursor-pointer">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                    <span>Salin No. Rekening</span>
                                </button>
                            </div>
                        </div>

                        <!-- Physical Gift Address -->
                        <div class="p-4 sm:p-5 rounded-xl bg-[#134A37] border border-[#D4AF37]/45 text-left space-y-2 shadow-md">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#E5C158]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                <span class="text-xs sm:text-sm font-bold text-white font-heading">Kirim Kado Fisik</span>
                            </div>
                            <p class="text-xs text-white/85 font-light leading-relaxed">
                                {{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}
                            </p>
                            <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}', 'Alamat kado fisik')" class="py-2 px-4 rounded-full bg-white/10 hover:bg-white/20 border border-[#D4AF37]/50 text-white font-medium text-xs transition inline-flex items-center justify-center gap-1.5 cursor-pointer">
                                <span>Salin Alamat Lengkap</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 3)
            <!-- THEME 3 BESPOKE KIRIM HADIAH (BASIC HARMONY NAVY - MATCHING IMAGE 2 SECTION 12) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-4xl mx-auto space-y-6 sm:space-y-8">
                <div class="text-center space-y-1 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-semibold tracking-[0.25em] uppercase text-stone-500 font-heading block">
                        TANDA KASIH
                    </span>
                    <h3 class="font-heading text-2xl sm:text-3xl font-bold tracking-wide text-stone-800">
                        Kirim Hadiah
                    </h3>
                    <p class="text-xs text-stone-600 max-w-sm mx-auto">
                        Doa restu Anda adalah karunia terindah bagi kami. Namun jika hendak memberikan tanda kasih, Anda dapat menyalurkannya melalui:
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 items-stretch overflow-hidden py-2">
                    <div class="rounded-2xl p-5 sm:p-6 bg-[#1E3A5F] text-white shadow-xl border border-white/20 text-center flex flex-col justify-between space-y-4 reveal-item anim-slide-from-left delay-1">
                        <div class="space-y-2">
                            <span class="text-[10px] sm:text-xs font-bold tracking-widest uppercase text-sky-200">
                                TRANSFER BANK
                            </span>
                            <p class="font-heading text-lg sm:text-xl font-bold text-white">
                                {{ $invitation->gift_bank_name ?? 'BCA' }}
                            </p>
                            <div class="py-2">
                                <p id="rekening-number-3-1" class="font-mono text-xl sm:text-2xl font-bold tracking-wider text-sky-100">
                                    {{ $invitation->gift_account_number ?? '1234567890' }}
                                </p>
                                <p class="text-xs text-slate-200 font-light mt-1">
                                    a.n. {{ $invitation->gift_account_holder ?? ($groomNickname . ' & ' . $brideNickname) }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <button type="button" onclick="copyToClipboard('{{ $invitation->gift_account_number ?? '1234567890' }}', 'Nomor rekening')" class="px-6 py-2 rounded-full bg-white/20 hover:bg-white/30 border border-white/40 text-white font-medium text-xs tracking-wider uppercase inline-flex items-center gap-1.5 transition active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                <span>Salin No. Rekening</span>
                            </button>
                        </div>
                    </div>

                    <div class="rounded-2xl p-5 sm:p-6 bg-[#1E3A5F] text-white shadow-xl border border-white/20 text-center flex flex-col justify-between space-y-4 reveal-item anim-slide-from-right delay-2">
                        <div class="space-y-2">
                            <span class="text-[10px] sm:text-xs font-bold tracking-widest uppercase text-sky-200">
                                KIRIM KADO FISIK
                            </span>
                            <p class="font-heading text-lg sm:text-xl font-bold text-white">
                                Alamat Pengiriman
                            </p>
                            <div class="py-2">
                                <p class="text-xs sm:text-sm text-slate-100 leading-relaxed font-light">
                                    {{ $invitation->gift_address ?? ($venueName . ', ' . $venueAddress) }}
                                </p>
                                <p class="text-xs text-sky-200 font-medium mt-1">
                                    Penerima: {{ $invitation->gift_recipient_name ?? ($groomNickname . ' / ' . $brideNickname) }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? ($venueName . ', ' . $venueAddress) }}', 'Alamat kado')" class="px-6 py-2 rounded-full bg-white/20 hover:bg-white/30 border border-white/40 text-white font-medium text-xs tracking-wider uppercase inline-flex items-center gap-1.5 transition active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                <span>Salin Alamat</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 1)
            <!-- THEME 1 BESPOKE KIRIM HADIAH (BASIC HARMONY MAROON - MATCHING REFERENCE) -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-6 text-center">
                <!-- Top Floral Branch Ornament Matching Image 1 -->
                <div class="w-48 sm:w-56 mx-auto pointer-events-none reveal-item anim-fade-up">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>

                <!-- Title: Kado / Tanda Kasih -->
                <div class="space-y-1.5 reveal-item anim-fade-up">
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold tracking-wide text-[#620000]">
                        Kado
                    </h3>
                    <p class="font-serif text-xs sm:text-sm text-[#620000]/85 font-normal max-w-xs mx-auto leading-relaxed">
                        Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika memberi adalah ungkapan tanda kasih, Anda dapat memberi kado secara digital:
                    </p>
                </div>

                <!-- Bank Cards -->
                <div class="space-y-3.5">
                    <!-- 1. BANK BCA -->
                    <div class="p-5 rounded-2xl bg-white border border-[#620000]/20 shadow-sm space-y-2.5 text-center reveal-item anim-fade-up delay-1">
                        <span class="inline-block px-3 py-1 rounded-full text-[11px] font-bold tracking-wider text-blue-700 bg-blue-50 border border-blue-200">
                            BANK BCA
                        </span>
                        <div>
                            <p class="font-mono text-xl sm:text-2xl font-bold text-[#620000] tracking-wider">
                                {{ $invitation->gift_account_number ?? '8801234567' }}
                            </p>
                            <p class="text-xs text-[#620000]/80 font-medium mt-0.5">
                                a.n. {{ $invitation->gift_account_holder ?? $groomName }}
                            </p>
                        </div>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_account_number ?? '8801234567' }}', 'Nomor rekening BCA')" class="px-6 py-2 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white font-medium text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin No. Rekening</span>
                        </button>
                    </div>

                    <!-- 2. BANK MANDIRI -->
                    <div class="p-5 rounded-2xl bg-white border border-[#620000]/20 shadow-sm space-y-2.5 text-center reveal-item anim-fade-up delay-2">
                        <span class="inline-block px-3 py-1 rounded-full text-[11px] font-bold tracking-wider text-amber-700 bg-amber-50 border border-amber-200">
                            BANK MANDIRI
                        </span>
                        <div>
                            <p class="font-mono text-xl sm:text-2xl font-bold text-[#620000] tracking-wider">
                                1230009876543
                            </p>
                            <p class="text-xs text-[#620000]/80 font-medium mt-0.5">
                                a.n. {{ $brideName }}
                            </p>
                        </div>
                        <button type="button" onclick="copyToClipboard('1230009876543', 'Nomor rekening Mandiri')" class="px-6 py-2 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white font-medium text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin No. Rekening</span>
                        </button>
                    </div>

                    <!-- 3. KIRIM KADO FISIK -->
                    <div class="p-5 rounded-2xl bg-white border border-[#620000]/20 shadow-sm space-y-2.5 text-center reveal-item anim-fade-up delay-3">
                        <span class="text-xs font-bold tracking-wider uppercase text-[#620000] font-serif block">
                            Kirim Kado Fisik
                        </span>
                        <p class="text-xs text-[#620000]/80 font-light leading-relaxed max-w-sm mx-auto">
                            {{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}
                        </p>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}', 'Alamat kado fisik')" class="px-6 py-2 rounded-full bg-[#620000] hover:bg-[#7a0505] text-white font-medium text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin Alamat</span>
                        </button>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 5)
            <!-- ================= THEME 5 BESPOKE KIRIM HADIAH (BASIC HARMONY MONOCHROME - MATCHING REFERENCE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-6 text-center">
                <!-- Title with Ghost Reflection Shadow -->
                <div class="space-y-1 select-none">
                    <div class="relative inline-block reveal-item anim-tracking delay-1">
                        <span class="absolute inset-0 font-serif text-3xl sm:text-4xl uppercase tracking-[0.2em] text-stone-300/40 select-none translate-y-2 pointer-events-none" aria-hidden="true">
                            TANDA KASIH
                        </span>
                        <h3 class="relative font-serif text-2xl sm:text-3xl uppercase tracking-[0.2em] text-[#18181B] font-normal">
                            TANDA KASIH
                        </h3>
                    </div>
                    <p class="font-sans text-xs sm:text-sm text-stone-600 font-light max-w-xs mx-auto leading-relaxed pt-2 reveal-item anim-fade-up delay-2">
                        Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika memberi adalah ungkapan tanda kasih, Anda dapat memberi kado secara digital:
                    </p>
                </div>

                <!-- Bank Cards Container -->
                <div class="space-y-4 pt-2">
                    <!-- 1. BANK BCA -->
                    <div class="p-5 rounded-2xl bg-white border border-stone-800/20 shadow-md space-y-3 text-center reveal-item anim-card-3d delay-1">
                        <span class="inline-block px-3 py-1 rounded-full text-[11px] font-bold tracking-wider text-stone-900 bg-stone-100 border border-stone-300">
                            {{ $invitation->gift_bank_name ?: 'BANK BCA' }}
                        </span>
                        <div>
                            <p class="font-mono text-xl sm:text-2xl font-bold text-stone-900 tracking-wider">
                                {{ $invitation->gift_account_number ?? '8801234567' }}
                            </p>
                            <p class="text-xs text-stone-600 font-medium mt-0.5">
                                a.n. {{ $invitation->gift_account_holder ?? $groomName }}
                            </p>
                        </div>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_account_number ?? '8801234567' }}', 'Nomor rekening BCA', this)" class="px-7 py-2.5 rounded-full bg-[#18181B] hover:bg-black text-white font-sans font-medium text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin No. Rekening</span>
                        </button>
                    </div>

                    <!-- 2. BANK MANDIRI (Secondary Account) -->
                    <div class="p-5 rounded-2xl bg-white border border-stone-800/20 shadow-md space-y-3 text-center reveal-item anim-card-3d delay-2">
                        <span class="inline-block px-3 py-1 rounded-full text-[11px] font-bold tracking-wider text-stone-900 bg-stone-100 border border-stone-300">
                            BANK MANDIRI
                        </span>
                        <div>
                            <p class="font-mono text-xl sm:text-2xl font-bold text-stone-900 tracking-wider">
                                1230009876543
                            </p>
                            <p class="text-xs text-stone-600 font-medium mt-0.5">
                                a.n. {{ $brideName }}
                            </p>
                        </div>
                        <button type="button" onclick="copyToClipboard('1230009876543', 'Nomor rekening Mandiri', this)" class="px-7 py-2.5 rounded-full bg-[#18181B] hover:bg-black text-white font-sans font-medium text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin No. Rekening</span>
                        </button>
                    </div>

                    <!-- 3. KIRIM KADO FISIK -->
                    <div class="p-5 rounded-2xl bg-white border border-stone-800/20 shadow-md space-y-3 text-center reveal-item anim-card-3d delay-3">
                        <span class="text-xs font-bold tracking-wider uppercase text-stone-900 font-serif block">
                            Kirim Kado Fisik
                        </span>
                        <p class="text-xs text-stone-600 font-light leading-relaxed max-w-sm mx-auto">
                            {{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}
                        </p>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}', 'Alamat kado fisik', this)" class="px-7 py-2.5 rounded-full bg-[#18181B] hover:bg-black text-white font-sans font-medium text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin Alamat</span>
                        </button>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 20 || $isDarkElegance)
            <!-- ================= THEME 20 BESPOKE KIRIM HADIAH (PREMIUM SERENADE DARK ELEGANCE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md mx-auto space-y-6 text-center text-[#FAF7F2] py-4 relative">
                <!-- Arch Vertical Floral Flourishes on Left & Right Top Corners -->
                <div class="absolute -top-10 -left-6 sm:-left-8 w-16 sm:w-20 h-auto pointer-events-none z-10 opacity-75 reveal-item anim-arch-floral delay-1">
                    <img src="{{ asset('images/themes/serenade-dark/floral-vertical.png') }}" alt="" class="w-full h-auto object-contain -scale-x-100">
                </div>
                <div class="absolute -top-10 -right-6 sm:-right-8 w-16 sm:w-20 h-auto pointer-events-none z-10 opacity-75 reveal-item anim-arch-floral delay-1">
                    <img src="{{ asset('images/themes/serenade-dark/floral-vertical.png') }}" alt="" class="w-full h-auto object-contain">
                </div>

                <!-- Section Header -->
                <div class="space-y-1.5 pt-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.3em] uppercase text-[#9EB092] font-semibold block">
                        KIRIM HADIAH
                    </span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold tracking-wide text-[#FAF7F2]">
                        Tanda Kasih
                    </h3>
                    <p class="font-serif text-xs text-[#D5DDD0] font-light leading-relaxed max-w-sm mx-auto">
                        Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Dan jika memberi adalah ungkapan tanda kasih Anda, Anda dapat memberi kado secara cashless:
                    </p>
                </div>

                <!-- Sleek Dark Metallic Credit Cards -->
                <div class="space-y-4 pt-1">
                    <!-- 1. BANK BCA CARD -->
                    @php
                        $bcaAccNum = $invitation->gift_account_number ?? '8801234567';
                        $bcaHolder = $invitation->gift_account_holder ?? $groomName;
                    @endphp
                    <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-[#1C241C] via-[#131713] to-[#0A0D0A] border border-[#9EB092]/50 shadow-2xl relative space-y-4 text-left overflow-hidden reveal-item anim-card-rise delay-1">
                        <!-- Card Top Bar: Chip & Logo -->
                        <div class="flex items-center justify-between">
                            <!-- EMV Chip Icon -->
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-7 rounded-md bg-gradient-to-tr from-amber-600 via-amber-300 to-amber-500 border border-amber-200/60 p-0.5 shadow-sm flex items-center justify-center">
                                    <div class="w-full h-full border border-amber-700/50 rounded-xs flex items-center justify-center">
                                        <div class="w-3 h-2 border-t border-b border-amber-800/60"></div>
                                    </div>
                                </div>
                                <!-- Contactless Waves -->
                                <svg class="w-4 h-4 text-[#9EB092]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                            </div>
                            <span class="font-serif font-bold text-sm tracking-widest text-[#FAF7F2] uppercase">
                                BANK BCA
                            </span>
                        </div>

                        <!-- Card Number -->
                        <div class="py-1">
                            <span class="text-[9px] uppercase tracking-wider text-[#9EB092] font-semibold block">Nomor Rekening</span>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-widest text-[#FAF7F2]">
                                {{ $bcaAccNum }}
                            </p>
                        </div>

                        <!-- Card Bottom Bar: Holder & Copy Button -->
                        <div class="flex items-center justify-between pt-1 border-t border-[#9EB092]/20">
                            <div>
                                <span class="text-[9px] uppercase tracking-wider text-[#9EB092]/80 block">Atas Nama</span>
                                <p class="font-serif text-xs sm:text-sm font-semibold text-[#FAF7F2] tracking-wide">
                                    {{ $bcaHolder }}
                                </p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $bcaAccNum }}', 'Nomor rekening BCA', this)" class="px-4 py-1.5 rounded-full bg-[#9EB092] hover:bg-[#8da081] text-[#070807] font-serif font-bold text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. BANK MANDIRI CARD -->
                    @php
                        $mandiriAcc = $invitation->giftAccounts ? $invitation->giftAccounts->firstWhere('bank_name', 'Bank Mandiri') : null;
                        $mandiriAccNum = $mandiriAcc?->account_number ?? '137001928374';
                        $mandiriHolder = $mandiriAcc?->account_holder ?? $brideName;
                    @endphp
                    <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-[#1C241C] via-[#131713] to-[#0A0D0A] border border-[#9EB092]/50 shadow-2xl relative space-y-4 text-left overflow-hidden reveal-item anim-card-rise delay-2">
                        <!-- Card Top Bar: Chip & Logo -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-7 rounded-md bg-gradient-to-tr from-amber-600 via-amber-300 to-amber-500 border border-amber-200/60 p-0.5 shadow-sm flex items-center justify-center">
                                    <div class="w-full h-full border border-amber-700/50 rounded-xs flex items-center justify-center">
                                        <div class="w-3 h-2 border-t border-b border-amber-800/60"></div>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-[#9EB092]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                            </div>
                            <span class="font-serif font-bold text-sm tracking-widest text-[#FAF7F2] uppercase">
                                BANK MANDIRI
                            </span>
                        </div>

                        <!-- Card Number -->
                        <div class="py-1">
                            <span class="text-[9px] uppercase tracking-wider text-[#9EB092] font-semibold block">Nomor Rekening</span>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-widest text-[#FAF7F2]">
                                {{ $mandiriAccNum }}
                            </p>
                        </div>

                        <!-- Card Bottom Bar: Holder & Copy Button -->
                        <div class="flex items-center justify-between pt-1 border-t border-[#9EB092]/20">
                            <div>
                                <span class="text-[9px] uppercase tracking-wider text-[#9EB092]/80 block">Atas Nama</span>
                                <p class="font-serif text-xs sm:text-sm font-semibold text-[#FAF7F2] tracking-wide">
                                    {{ $mandiriHolder }}
                                </p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $mandiriAccNum }}', 'Nomor rekening Mandiri', this)" class="px-4 py-1.5 rounded-full bg-[#9EB092] hover:bg-[#8da081] text-[#070807] font-serif font-bold text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- 3. KIRIM KADO FISIK CARD -->
                    <div class="rounded-2xl bg-[#131713] border border-[#9EB092]/40 p-5 text-center space-y-3 shadow-xl reveal-item anim-card-rise delay-3">
                        <div class="w-8 h-8 mx-auto text-[#9EB092]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <span class="text-xs font-serif font-bold tracking-wider uppercase text-[#FAF7F2] block">
                            Kirim Kado Fisik
                        </span>
                        <p class="font-serif text-xs text-[#D5DDD0] font-light leading-relaxed max-w-sm mx-auto">
                            {{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}
                        </p>
                        <p class="text-[11px] text-[#9EB092] font-serif">
                            Penerima: {{ $invitation->gift_recipient_name ?? ($groomNickname . ' & ' . $brideNickname) }} ({{ $invitation->gift_phone ?? '081234567890' }})
                        </p>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}', 'Alamat kado fisik', this)" class="px-6 py-2 rounded-full border border-[#9EB092] hover:bg-[#1A211A] text-[#FAF7F2] font-serif font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-sm transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#9EB092]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin Alamat</span>
                        </button>
                    </div>
                </div>

                <!-- Symmetrical Flower Divider Below Hadiah -->
                <div class="w-48 sm:w-64 mx-auto pt-6 reveal-item anim-floral-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-dark/floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
            @elseif($currentThemeId == 19 || $isLavenderMist)
            <!-- ================= THEME 19 BESPOKE KIRIM HADIAH (PREMIUM SERENADE LAVENDER MIST) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-t-[44px] sm:rounded-t-[56px] rounded-b-3xl bg-white theme-lavender-pattern shadow-2xl p-6 sm:p-10 relative space-y-6 text-center text-[#2D1E40] reveal-item anim-lavender-card-3d">
                <!-- Top Floral Garland Decoration -->
                <div class="w-56 sm:w-72 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-lavender-flower-unfold">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-lavender-title">
                    <span class="text-[11px] sm:text-xs font-lavender-title tracking-[0.35em] uppercase text-[#8B7CB0] font-bold block">
                        KIRIM HADIAH
                    </span>
                    <h3 class="font-lavender-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#2D1E40]">
                        Tanda Kasih
                    </h3>
                    <p class="font-lavender-body text-xs sm:text-sm text-[#6E5D87] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Dan jika memberi adalah ungkapan tanda kasih Anda, Anda dapat memberi kado secara cashless:
                    </p>
                </div>

                <!-- Sleek Lavender Metallic Digital Bank Cards -->
                <div class="space-y-4 pt-1">
                    <!-- 1. BANK BCA CARD -->
                    @php
                        $bcaAccNum = $invitation->gift_account_number ?? '8801234567';
                        $bcaHolder = $invitation->gift_account_holder ?? $groomName;
                    @endphp
                    <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-[#5D4E75] via-[#4A3C60] to-[#2E2240] border border-[#C5B8D8]/50 shadow-xl relative space-y-4 text-left overflow-hidden reveal-item anim-lavender-card-3d delay-1 text-white">
                        <!-- Card Top Bar: Chip & Logo -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-7 rounded-md bg-gradient-to-tr from-amber-600 via-amber-300 to-amber-500 border border-amber-200/60 p-0.5 shadow-sm flex items-center justify-center">
                                    <div class="w-full h-full border border-amber-700/50 rounded-xs flex items-center justify-center">
                                        <div class="w-3 h-2 border-t border-b border-amber-800/60"></div>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-[#D8CFE6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                            </div>
                            <span class="font-lavender-title font-bold text-sm tracking-widest text-white uppercase">
                                BANK BCA
                            </span>
                        </div>

                        <!-- Card Number -->
                        <div class="py-1">
                            <span class="text-[9px] uppercase tracking-wider text-[#C5B8D8] font-lavender-title font-bold block">Nomor Rekening</span>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-widest text-white">
                                {{ $bcaAccNum }}
                            </p>
                        </div>

                        <!-- Card Bottom Bar: Holder & Copy Button -->
                        <div class="flex items-center justify-between pt-1 border-t border-white/20">
                            <div>
                                <span class="text-[9px] uppercase tracking-wider text-[#C5B8D8] font-lavender-title block">Atas Nama</span>
                                <p class="font-lavender-headline text-xs sm:text-sm font-semibold text-white tracking-wide">
                                    {{ $bcaHolder }}
                                </p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $bcaAccNum }}', 'Nomor rekening BCA', this)" class="px-4 py-1.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] hover:from-[#79679C] hover:to-[#68568B] text-white font-lavender-title font-bold text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. BANK MANDIRI CARD -->
                    @php
                        $mandiriAcc = $invitation->giftAccounts ? $invitation->giftAccounts->firstWhere('bank_name', 'Bank Mandiri') : null;
                        $mandiriAccNum = $mandiriAcc?->account_number ?? '137001928374';
                        $mandiriHolder = $mandiriAcc?->account_holder ?? $brideName;
                    @endphp
                    <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-[#5D4E75] via-[#4A3C60] to-[#2E2240] border border-[#C5B8D8]/50 shadow-xl relative space-y-4 text-left overflow-hidden reveal-item anim-lavender-card-3d delay-2 text-white">
                        <!-- Card Top Bar: Chip & Logo -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-7 rounded-md bg-gradient-to-tr from-amber-600 via-amber-300 to-amber-500 border border-amber-200/60 p-0.5 shadow-sm flex items-center justify-center">
                                    <div class="w-full h-full border border-amber-700/50 rounded-xs flex items-center justify-center">
                                        <div class="w-3 h-2 border-t border-b border-amber-800/60"></div>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-[#D8CFE6]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                            </div>
                            <span class="font-lavender-title font-bold text-sm tracking-widest text-white uppercase">
                                BANK MANDIRI
                            </span>
                        </div>

                        <!-- Card Number -->
                        <div class="py-1">
                            <span class="text-[9px] uppercase tracking-wider text-[#C5B8D8] font-lavender-title font-bold block">Nomor Rekening</span>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-widest text-white">
                                {{ $mandiriAccNum }}
                            </p>
                        </div>

                        <!-- Card Bottom Bar: Holder & Copy Button -->
                        <div class="flex items-center justify-between pt-1 border-t border-white/20">
                            <div>
                                <span class="text-[9px] uppercase tracking-wider text-[#C5B8D8] font-lavender-title block">Atas Nama</span>
                                <p class="font-lavender-headline text-xs sm:text-sm font-semibold text-white tracking-wide">
                                    {{ $mandiriHolder }}
                                </p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $mandiriAccNum }}', 'Nomor rekening Mandiri', this)" class="px-4 py-1.5 rounded-full bg-gradient-to-r from-[#8B7CB0] to-[#79679C] hover:from-[#79679C] hover:to-[#68568B] text-white font-lavender-title font-bold text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- 3. KIRIM KADO FISIK CARD -->
                    <div class="rounded-2xl border border-[#C5B8D8] bg-[#FAF7FC] p-5 text-center space-y-3 shadow-md reveal-item anim-lavender-card-3d delay-3">
                        <div class="w-8 h-8 mx-auto text-[#8B7CB0]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <span class="text-xs font-lavender-title font-bold tracking-wider uppercase text-[#2D1E40] block">
                            Kirim Kado Fisik
                        </span>
                        <p class="font-lavender-body text-xs text-[#6E5D87] font-normal leading-relaxed max-w-sm mx-auto">
                            {{ $invitation->gift_address ?? 'Jl. Melati Indah No. 12, Kebayoran Baru, Jakarta Selatan 12160' }}
                        </p>
                        <p class="text-[11px] text-[#8B7CB0] font-lavender-body font-medium">
                            Penerima: {{ $invitation->gift_recipient_name ?? ($groomNickname . ' & ' . $brideNickname) }} ({{ $invitation->gift_phone ?? '081234567890' }})
                        </p>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? 'Jl. Melati Indah No. 12, Kebayoran Baru, Jakarta Selatan 12160' }}', 'Alamat kado fisik', this)" class="px-6 py-2 rounded-full border border-[#8B7CB0] hover:bg-[#F3EEF8] text-[#5A4B70] font-lavender-title font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-sm transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#8B7CB0]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin Alamat</span>
                        </button>
                    </div>
                </div>

                <!-- Bottom Floral Garland Divider -->
                <div class="w-56 sm:w-72 mx-auto pt-4 pointer-events-none reveal-item anim-lavender-flower-unfold delay-3">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @elseif($currentThemeId == 15 || $isMidnightAmber)
            <!-- ================= THEME 15 BESPOKE TANDA KASIH (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl bg-[#1C1A18] border border-[#DDA74F]/40 shadow-[0_16px_50px_rgba(0,0,0,0.8)] p-6 sm:p-10 relative space-y-6 text-center text-white reveal-item anim-amber-card-3d">
                <!-- Top Floral Crest Decoration -->
                <div class="w-48 sm:w-60 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-amber-bloom">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-amber-title">
                    <span class="text-[11px] sm:text-xs font-amber-title tracking-[0.35em] uppercase text-[#DDA74F] font-bold block">
                        WEDDING GIFT
                    </span>
                    <h3 class="font-amber-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#FAF5EC]">
                        Tanda Kasih
                    </h3>
                    <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika Anda ingin memberikan tanda kasih, Anda dapat mengirimkannya melalui:
                    </p>
                </div>

                <div class="space-y-4 max-w-md mx-auto pt-2">
                    <!-- 1. BANK BCA CARD -->
                    @php
                        $bcaAcc = $invitation->giftAccounts ? $invitation->giftAccounts->firstWhere('bank_name', 'BCA') : null;
                        $bcaAccNum = $bcaAcc?->account_number ?? ($invitation->gift_account_number ?? '8801234567');
                        $bcaHolder = $bcaAcc?->account_holder ?? ($invitation->gift_account_holder ?? $groomName);
                    @endphp
                    <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-[#24211D] via-[#1C1A18] to-[#121110] border border-[#DDA74F]/40 shadow-xl relative space-y-4 text-left overflow-hidden reveal-item anim-amber-card-3d delay-1 text-white">
                        <!-- Card Top Bar: Chip & Logo -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-7 rounded-md bg-gradient-to-tr from-amber-600 via-amber-300 to-amber-500 border border-amber-200/60 p-0.5 shadow-sm flex items-center justify-center">
                                    <div class="w-full h-full border border-amber-700/50 rounded-xs flex items-center justify-center">
                                        <div class="w-3 h-2 border-t border-b border-amber-800/60"></div>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-[#DDA74F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                            </div>
                            <span class="font-amber-title font-bold text-sm tracking-widest text-[#F2D59B] uppercase">
                                BANK BCA
                            </span>
                        </div>

                        <!-- Card Number -->
                        <div class="py-1">
                            <span class="text-[9px] uppercase tracking-wider text-[#C4B5A5] font-amber-title font-bold block">Nomor Rekening</span>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-widest text-[#FAF5EC]">
                                {{ $bcaAccNum }}
                            </p>
                        </div>

                        <!-- Card Bottom Bar: Holder & Copy Button -->
                        <div class="flex items-center justify-between pt-2 border-t border-[#DDA74F]/20">
                            <div>
                                <span class="text-[9px] uppercase tracking-wider text-[#C4B5A5] font-amber-body block">Atas Nama</span>
                                <p class="font-amber-headline text-xs sm:text-sm font-semibold text-[#F2D59B] tracking-wide">
                                    {{ $bcaHolder }}
                                </p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $bcaAccNum }}', 'Nomor rekening BCA', this)" class="px-4 py-1.5 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] hover:brightness-110 text-[#161514] font-amber-title font-bold text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. BANK MANDIRI CARD -->
                    @php
                        $mandiriAcc = $invitation->giftAccounts ? $invitation->giftAccounts->firstWhere('bank_name', 'Bank Mandiri') : null;
                        $mandiriAccNum = $mandiriAcc?->account_number ?? '137001928374';
                        $mandiriHolder = $mandiriAcc?->account_holder ?? $brideName;
                    @endphp
                    <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-[#24211D] via-[#1C1A18] to-[#121110] border border-[#DDA74F]/40 shadow-xl relative space-y-4 text-left overflow-hidden reveal-item anim-amber-card-3d delay-2 text-white">
                        <!-- Card Top Bar: Chip & Logo -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-7 rounded-md bg-gradient-to-tr from-amber-600 via-amber-300 to-amber-500 border border-amber-200/60 p-0.5 shadow-sm flex items-center justify-center">
                                    <div class="w-full h-full border border-amber-700/50 rounded-xs flex items-center justify-center">
                                        <div class="w-3 h-2 border-t border-b border-amber-800/60"></div>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-[#DDA74F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                            </div>
                            <span class="font-amber-title font-bold text-sm tracking-widest text-[#F2D59B] uppercase">
                                BANK MANDIRI
                            </span>
                        </div>

                        <!-- Card Number -->
                        <div class="py-1">
                            <span class="text-[9px] uppercase tracking-wider text-[#C4B5A5] font-amber-title font-bold block">Nomor Rekening</span>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-widest text-[#FAF5EC]">
                                {{ $mandiriAccNum }}
                            </p>
                        </div>

                        <!-- Card Bottom Bar: Holder & Copy Button -->
                        <div class="flex items-center justify-between pt-2 border-t border-[#DDA74F]/20">
                            <div>
                                <span class="text-[9px] uppercase tracking-wider text-[#C4B5A5] font-amber-body block">Atas Nama</span>
                                <p class="font-amber-headline text-xs sm:text-sm font-semibold text-[#F2D59B] tracking-wide">
                                    {{ $mandiriHolder }}
                                </p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $mandiriAccNum }}', 'Nomor rekening Mandiri', this)" class="px-4 py-1.5 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] hover:brightness-110 text-[#161514] font-amber-title font-bold text-xs tracking-wider inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- 3. KIRIM KADO FISIK CARD -->
                    <div class="rounded-2xl border border-[#DDA74F]/35 bg-[#161514] p-5 text-center space-y-3 shadow-md reveal-item anim-amber-card-3d delay-3">
                        <div class="w-8 h-8 mx-auto text-[#DDA74F]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <span class="text-xs font-amber-title font-bold tracking-wider uppercase text-[#F2D59B] block">
                            Kirim Kado Fisik
                        </span>
                        <p class="font-amber-body text-xs text-[#C4B5A5] font-normal leading-relaxed max-w-sm mx-auto">
                            {{ $invitation->gift_address ?? 'Jl. Melati Indah No. 12, Kebayoran Baru, Jakarta Selatan 12160' }}
                        </p>
                        <p class="text-[11px] text-[#E8C37D] font-amber-body font-medium">
                            Penerima: {{ $invitation->gift_recipient_name ?? ($groomNickname . ' & ' . $brideNickname) }} ({{ $invitation->gift_phone ?? '081234567890' }})
                        </p>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? 'Jl. Melati Indah No. 12, Kebayoran Baru, Jakarta Selatan 12160' }}', 'Alamat kado fisik', this)" class="px-6 py-2 rounded-md border border-[#DDA74F] hover:bg-[#DDA74F]/10 text-[#E8C37D] font-amber-title font-semibold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-sm transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#DDA74F]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin Alamat</span>
                        </button>
                    </div>
                </div>

                <!-- Bottom Floral Crest Divider -->
                <div class="w-48 sm:w-60 mx-auto pt-4 pointer-events-none reveal-item anim-amber-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>

            <!-- Golden Wavy Ribbon Divider Across Section -->
            <div class="w-full pt-6 pointer-events-none reveal-item anim-amber-bloom delay-3">
                <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
            </div>
            @elseif($currentThemeId == 13 || $isSummerVibes)
            <!-- ================= THEME 13 BESPOKE TANDA KASIH (PREMIUM SUMMER VIBES) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-xl mx-auto summer-ticket-card text-center text-[#1E293B] reveal-item anim-summer-stamp">
                <!-- Top Perforation Circles -->
                <div class="absolute -top-4 left-0 right-0 flex justify-around pointer-events-none z-20">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                </div>

                <div class="summer-ticket-inner space-y-6">
                    <!-- Section Header -->
                    <div class="space-y-1.5 reveal-item anim-fade-up">
                        <span class="text-[11px] sm:text-xs font-serif tracking-[0.35em] uppercase text-[#1D63B8] font-bold block">
                            WEDDING GIFT &amp; REGISTRY
                        </span>
                        <h3 class="text-3xl sm:text-4xl text-[#D94B26] leading-tight"
                            style="font-family: 'Shrikhand', 'Titan One', cursive;">
                            Gift
                        </h3>
                        <div class="w-24 sm:w-28 mx-auto pointer-events-none my-1">
                            <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                        </div>
                        <p class="text-xs sm:text-sm text-slate-600 font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                            Doa restu Anda merupakan karunia terindah bagi kami. Namun jika Anda bermaksud memberikan tanda kasih, dapat disalurkan melalui:
                        </p>
                    </div>

                    <!-- Sleek Realistic ATM Debit Cards matching Reference -->
                    <div class="space-y-4 max-w-md mx-auto pt-1">
                        <!-- Card 1: BCA (Dion Yunus) -->
                        <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-[#23272F] via-[#1A1D24] to-[#111317] text-white border border-slate-700/60 shadow-[0_12px_28px_rgba(0,0,0,0.35)] relative overflow-hidden space-y-4 text-left reveal-item anim-fade-up">
                            <div class="absolute top-0 right-0 -mr-12 -mt-12 w-44 h-44 rounded-full bg-white/5 pointer-events-none"></div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-9 h-6.5 rounded-sm bg-gradient-to-br from-[#E2B963] via-[#F4D085] to-[#B88930] p-1 shadow-inner flex flex-col justify-between">
                                        <div class="w-full h-0.5 bg-amber-900/40"></div>
                                        <div class="w-full h-0.5 bg-amber-900/40"></div>
                                    </div>
                                    <svg class="w-4 h-4 text-slate-400 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                                    </svg>
                                </div>
                                <span class="font-bold text-sm tracking-widest text-white/90">BCA</span>
                            </div>

                            <div class="space-y-0.5 pt-1">
                                <p class="text-[9px] uppercase tracking-wider text-slate-400 font-medium">Card Number</p>
                                <p class="font-mono text-base sm:text-lg font-bold tracking-[0.18em] text-white">
                                    {{ $invitation->gift_account_number ?? '8801 2345 6789' }}
                                </p>
                            </div>

                            <div class="flex items-end justify-between pt-1">
                                <div>
                                    <p class="text-[8px] uppercase tracking-widest text-slate-400">Cardholder Name</p>
                                    <p class="font-mono text-xs sm:text-sm font-semibold tracking-wider text-slate-200 uppercase">
                                        {{ $invitation->gift_account_holder ?? 'DION YUNUS' }}
                                    </p>
                                </div>
                                <button type="button"
                                        onclick="copyToClipboard('{{ $invitation->gift_account_number ?? '880123456789' }}', 'Nomor rekening BCA berhasil disalin!')"
                                        class="px-3.5 py-1.5 rounded-lg bg-[#D94B26] hover:bg-[#b83b1a] text-white text-[10px] font-bold tracking-wider uppercase shadow-md transition-all active:scale-95 flex items-center gap-1 cursor-pointer">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    <span>SALIN</span>
                                </button>
                            </div>
                        </div>

                        <!-- Card 2: Mandiri (Dea Febriana) -->
                        <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-br from-[#23272F] via-[#1A1D24] to-[#111317] text-white border border-slate-700/60 shadow-[0_12px_28px_rgba(0,0,0,0.35)] relative overflow-hidden space-y-4 text-left reveal-item anim-fade-up delay-1">
                            <div class="absolute top-0 right-0 -mr-12 -mt-12 w-44 h-44 rounded-full bg-white/5 pointer-events-none"></div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2.5">
                                    <div class="w-9 h-6.5 rounded-sm bg-gradient-to-br from-[#E2B963] via-[#F4D085] to-[#B88930] p-1 shadow-inner flex flex-col justify-between">
                                        <div class="w-full h-0.5 bg-amber-900/40"></div>
                                        <div class="w-full h-0.5 bg-amber-900/40"></div>
                                    </div>
                                    <svg class="w-4 h-4 text-slate-400 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                                    </svg>
                                </div>
                                <span class="font-bold text-sm tracking-widest text-white/90">MANDIRI</span>
                            </div>

                            <div class="space-y-0.5 pt-1">
                                <p class="text-[9px] uppercase tracking-wider text-slate-400 font-medium">Card Number</p>
                                <p class="font-mono text-base sm:text-lg font-bold tracking-[0.18em] text-white">
                                    1370 0192 8374
                                </p>
                            </div>

                            <div class="flex items-end justify-between pt-1">
                                <div>
                                    <p class="text-[8px] uppercase tracking-widest text-slate-400">Cardholder Name</p>
                                    <p class="font-mono text-xs sm:text-sm font-semibold tracking-wider text-slate-200 uppercase">
                                        DEA FEBRIANA
                                    </p>
                                </div>
                                <button type="button"
                                        onclick="copyToClipboard('137001928374', 'Nomor rekening Mandiri berhasil disalin!')"
                                        class="px-3.5 py-1.5 rounded-lg bg-[#D94B26] hover:bg-[#b83b1a] text-white text-[10px] font-bold tracking-wider uppercase shadow-md transition-all active:scale-95 flex items-center gap-1 cursor-pointer">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    <span>SALIN</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Physical Gift Address Card if available -->
                    @if(!empty($invitation->gift_address))
                    <div class="rounded-2xl p-4 sm:p-5 bg-white border border-[#D94B26]/30 shadow-xs text-left space-y-2.5 reveal-item anim-fade-up">
                        <div class="flex items-center gap-2 text-[#D94B26]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            <span class="font-bold text-xs sm:text-sm tracking-wide">Kirim Hadiah Fisik</span>
                        </div>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            {{ $invitation->gift_address }}
                        </p>
                        <p class="text-xs font-semibold text-slate-700">
                            Penerima: {{ $invitation->gift_recipient_name ?? ($groomNickname . ' & ' . $brideNickname) }} ({{ $invitation->gift_phone ?? '081234567890' }})
                        </p>
                        <button type="button"
                                onclick="copyToClipboard('{{ addslashes($invitation->gift_address) }}', 'Alamat pengiriman berhasil disalin!')"
                                class="inline-flex items-center justify-center gap-1.5 w-full py-2 px-4 rounded-full bg-[#D94B26] hover:bg-[#b83b1a] text-white text-xs font-bold tracking-wider uppercase shadow-xs transition-all hover:scale-[1.01] active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span>Salin Alamat</span>
                        </button>
                    </div>
                    @endif

                    <!-- Bottom Blue Floral Divider -->
                    <div class="w-24 sm:w-32 mx-auto pt-1 pointer-events-none">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                </div>

                <!-- Bottom Perforation Circles -->
                <div class="absolute -bottom-4 left-0 right-0 flex justify-around pointer-events-none z-20">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#EFECE6] border-2 border-[#1D63B8] shadow-inner"></div>
                </div>
            </div>
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl theme-museum-canvas border border-[#D4AF37]/45 shadow-[0_16px_50px_rgba(56,35,24,0.18)] p-6 sm:p-10 relative space-y-7 text-center text-[#2A1F1D] reveal-item anim-museum-card">
                <!-- Top Gifts Divider Banner -->
                <div class="w-full max-w-xs sm:max-w-sm mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-museum-frame">
                    <img src="{{ asset('images/themes/museum-love/gifts-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-museum-sub tracking-[0.35em] uppercase text-[#8B1E22] font-bold block">
                        WEDDING GIFT &amp; REGISTRY
                    </span>
                    <h3 class="font-museum-title text-3xl sm:text-4xl font-bold tracking-wide text-[#382318]">
                        Tanda Kasih
                    </h3>
                    <div class="w-16 h-0.5 bg-[#8B1E22] mx-auto my-2"></div>
                    <p class="font-museum-body text-xs sm:text-sm text-[#5C4033] font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Doa restu Anda merupakan karunia yang sangat berarti bagi kami. Namun jika Anda ingin memberikan tanda kasih, Anda dapat mengirimkannya melalui:
                    </p>
                </div>

                <div class="space-y-5 max-w-md mx-auto pt-2">
                    <!-- 1. BANK BCA CERTIFICATE -->
                    @php
                        $bcaAcc = $invitation->giftAccounts ? $invitation->giftAccounts->firstWhere('bank_name', 'BCA') : null;
                        $bcaAccNum = $bcaAcc?->account_number ?? ($invitation->gift_account_number ?? '8801234567');
                        $bcaHolder = $bcaAcc?->account_holder ?? ($invitation->gift_account_holder ?? $groomName);
                    @endphp
                    <div class="rounded-2xl p-5 sm:p-6 bg-[#FFFDF9] border-2 border-[#D4AF37]/50 shadow-md hover:shadow-xl transition-all duration-500 relative space-y-4 text-left overflow-hidden reveal-item anim-museum-card delay-1 text-[#2A1F1D]">
                        <div class="absolute top-2 left-2 w-3 h-3 border-t-2 border-l-2 border-[#8B1E22]/60"></div>
                        <div class="absolute top-2 right-2 w-3 h-3 border-t-2 border-r-2 border-[#8B1E22]/60"></div>
                        <div class="absolute bottom-2 left-2 w-3 h-3 border-b-2 border-l-2 border-[#8B1E22]/60"></div>
                        <div class="absolute bottom-2 right-2 w-3 h-3 border-b-2 border-r-2 border-[#8B1E22]/60"></div>

                        <!-- Card Top Bar: Chip & Logo -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-7 rounded-md bg-gradient-to-tr from-amber-600 via-amber-300 to-amber-500 border border-amber-200/60 p-0.5 shadow-xs flex items-center justify-center">
                                    <div class="w-full h-full border border-amber-700/50 rounded-xs flex items-center justify-center">
                                        <div class="w-3 h-2 border-t border-b border-amber-800/60"></div>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-[#8B1E22]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                            </div>
                            <span class="font-museum-title font-bold text-sm tracking-widest text-[#8B1E22] uppercase">
                                BANK BCA
                            </span>
                        </div>

                        <!-- Card Number -->
                        <div class="py-1">
                            <span class="text-[9px] uppercase tracking-wider text-[#5C4033] font-museum-sub font-bold block">Nomor Rekening</span>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-widest text-[#382318]">
                                {{ $bcaAccNum }}
                            </p>
                        </div>

                        <!-- Card Bottom Bar: Holder & Copy Button -->
                        <div class="flex items-center justify-between pt-2 border-t border-[#D4AF37]/30">
                            <div>
                                <span class="text-[9px] uppercase tracking-wider text-[#5C4033] font-museum-body block">Atas Nama</span>
                                <p class="font-museum-title text-xs sm:text-sm font-semibold text-[#8B1E22] tracking-wide">
                                    {{ $bcaHolder }}
                                </p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $bcaAccNum }}', 'Nomor rekening BCA', this)" class="px-4 py-1.5 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] font-museum-sub font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- 2. BANK MANDIRI CERTIFICATE -->
                    @php
                        $mandiriAcc = $invitation->giftAccounts ? $invitation->giftAccounts->firstWhere('bank_name', 'Bank Mandiri') : null;
                        $mandiriAccNum = $mandiriAcc?->account_number ?? '137001928374';
                        $mandiriHolder = $mandiriAcc?->account_holder ?? $brideName;
                    @endphp
                    <div class="rounded-2xl p-5 sm:p-6 bg-[#FFFDF9] border-2 border-[#D4AF37]/50 shadow-md hover:shadow-xl transition-all duration-500 relative space-y-4 text-left overflow-hidden reveal-item anim-museum-card delay-2 text-[#2A1F1D]">
                        <div class="absolute top-2 left-2 w-3 h-3 border-t-2 border-l-2 border-[#8B1E22]/60"></div>
                        <div class="absolute top-2 right-2 w-3 h-3 border-t-2 border-r-2 border-[#8B1E22]/60"></div>
                        <div class="absolute bottom-2 left-2 w-3 h-3 border-b-2 border-l-2 border-[#8B1E22]/60"></div>
                        <div class="absolute bottom-2 right-2 w-3 h-3 border-b-2 border-r-2 border-[#8B1E22]/60"></div>

                        <!-- Card Top Bar: Chip & Logo -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-9 h-7 rounded-md bg-gradient-to-tr from-amber-600 via-amber-300 to-amber-500 border border-amber-200/60 p-0.5 shadow-xs flex items-center justify-center">
                                    <div class="w-full h-full border border-amber-700/50 rounded-xs flex items-center justify-center">
                                        <div class="w-3 h-2 border-t border-b border-amber-800/60"></div>
                                    </div>
                                </div>
                                <svg class="w-4 h-4 text-[#8B1E22]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.393 9.393c5.857-5.857 15.355-5.857 21.213 0"/></svg>
                            </div>
                            <span class="font-museum-title font-bold text-sm tracking-widest text-[#8B1E22] uppercase">
                                BANK MANDIRI
                            </span>
                        </div>

                        <!-- Card Number -->
                        <div class="py-1">
                            <span class="text-[9px] uppercase tracking-wider text-[#5C4033] font-museum-sub font-bold block">Nomor Rekening</span>
                            <p class="font-mono text-xl sm:text-2xl font-bold tracking-widest text-[#382318]">
                                {{ $mandiriAccNum }}
                            </p>
                        </div>

                        <!-- Card Bottom Bar: Holder & Copy Button -->
                        <div class="flex items-center justify-between pt-2 border-t border-[#D4AF37]/30">
                            <div>
                                <span class="text-[9px] uppercase tracking-wider text-[#5C4033] font-museum-body block">Atas Nama</span>
                                <p class="font-museum-title text-xs sm:text-sm font-semibold text-[#8B1E22] tracking-wide">
                                    {{ $mandiriHolder }}
                                </p>
                            </div>
                            <button type="button" onclick="copyToClipboard('{{ $mandiriAccNum }}', 'Nomor rekening Mandiri', this)" class="px-4 py-1.5 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] font-museum-sub font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-md transition transform active:scale-95 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                                <span>Salin</span>
                            </button>
                        </div>
                    </div>

                    <!-- 3. KIRIM KADO FISIK PLACARD -->
                    <div class="rounded-2xl border-2 border-[#D4AF37]/50 bg-[#FFFDF9] p-5 text-center space-y-3 shadow-md reveal-item anim-museum-card delay-3">
                        <div class="w-8 h-8 mx-auto text-[#8B1E22]">
                            <svg class="w-full h-full" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <span class="text-xs font-museum-title font-bold tracking-wider uppercase text-[#8B1E22] block">
                            Kirim Kado Fisik
                        </span>
                        <p class="font-museum-body text-xs text-[#5C4033] font-normal leading-relaxed max-w-sm mx-auto">
                            {{ $invitation->gift_address ?? 'Jl. Melati Indah No. 12, Kebayoran Baru, Jakarta Selatan 12160' }}
                        </p>
                        <p class="text-[11px] text-[#8B1E22] font-museum-sub font-semibold">
                            Penerima: {{ $invitation->gift_recipient_name ?? ($groomNickname . ' & ' . $brideNickname) }} ({{ $invitation->gift_phone ?? '081234567890' }})
                        </p>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? 'Jl. Melati Indah No. 12, Kebayoran Baru, Jakarta Selatan 12160' }}', 'Alamat kado fisik', this)" class="px-6 py-2 rounded-full border border-[#8B1E22] hover:bg-[#8B1E22]/10 text-[#8B1E22] font-museum-sub font-bold text-xs tracking-wider uppercase inline-flex items-center gap-1.5 shadow-xs transition transform active:scale-95 cursor-pointer">
                            <svg class="w-3.5 h-3.5 text-[#8B1E22]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin Alamat</span>
                        </button>
                    </div>
                </div>

                <!-- Bookshelf Divider Below Hadiah -->
                <div class="w-full max-w-sm sm:max-w-md mx-auto pt-4 pointer-events-none reveal-item anim-museum-frame delay-3">
                    <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @else
            <div class="theme-arch-frame bg-white p-6 sm:p-10 md:p-12 shadow-lg w-full mx-auto relative space-y-8 reveal-item anim-border">
                
                @if($currentThemeId == 1)
                <!-- Corner Botanical Sprigs for Theme 1 Kirim Hadiah -->
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/maroon-delicate-top.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @elseif($currentThemeId == 19)
                <div class="absolute -top-3.5 -right-3.5 sm:-top-4 sm:-right-4 w-16 sm:w-20 h-16 sm:h-20 pointer-events-none z-10 reveal-item anim-flower-tr delay-1">
                    <img src="/images/themes/bg/lavender-butterflies.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                <div class="absolute -top-3.5 -left-3.5 sm:-top-4 sm:-left-4 w-14 sm:w-18 h-14 sm:h-18 pointer-events-none z-10 reveal-item anim-flower-tl delay-1">
                    <img src="/images/themes/bg/lavender-butterflies-flip.svg" alt="" class="w-full h-full drop-shadow-xs">
                </div>
                @endif

                <div>
                    <p class="theme-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-[var(--text-muted)] font-semibold reveal-item anim-title delay-1">
                        Tanda Kasih
                    </p>
                    <h2 class="theme-heading text-2xl sm:text-4xl font-bold text-[var(--text-main)] mt-1 mb-2 reveal-item anim-title delay-1">
                        Kirim Hadiah
                    </h2>
                    @if($currentThemeId == 1)
                    <div class="w-48 sm:w-56 mx-auto my-3 pointer-events-none reveal-item anim-fade-up delay-1">
                        <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                    </div>
                    @elseif($currentThemeId == 19)
                    <div class="w-36 sm:w-48 h-7 mx-auto my-3 pointer-events-none reveal-item anim-flower-center delay-1">
                        <img src="/images/themes/bg/lavender-wildflowers.svg" alt="" class="w-full h-full">
                    </div>
                    @endif
                    <p class="text-xs sm:text-sm text-[var(--text-muted)] max-w-lg mx-auto leading-relaxed reveal-item anim-fade-up delay-2">
                        Doa restu Anda merupakan karunia terindah bagi kami. Namun jika berkenan memberikan tanda kasih secara digital, Anda dapat melalui tautan berikut:
                    </p>
                </div>

                <!-- 2 Columns on Desktop for Bank Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-stretch">
                    <!-- Rekening 1: BCA -->
                    <div class="p-5 rounded-2xl bg-[var(--bg-canvas)] border border-[var(--border-frame)]/30 text-left space-y-3 shadow-xs reveal-item anim-fade-up delay-2 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="font-extrabold text-sm sm:text-base text-[#0060AF] tracking-wide">BCA</span>
                                <span class="text-[10px] font-mono text-stone-500 uppercase">Transfer Bank</span>
                            </div>
                            <div class="mt-2">
                                <span class="text-[11px] text-[var(--text-muted)] block">Nomor Rekening:</span>
                                <p class="font-mono font-bold text-lg text-[var(--text-main)] tracking-wider">
                                    {{ $invitation->gift_account_number ?? '8801234567' }}
                                </p>
                                <p class="text-xs text-[var(--text-muted)] font-medium">
                                    a.n. {{ $invitation->gift_account_holder ?? $groomName }}
                                </p>
                            </div>
                        </div>
                        <button type="button" onclick="copyToClipboard('{{ $invitation->gift_account_number ?? '8801234567' }}', 'Nomor rekening BCA')" class="w-full py-2.5 px-3 rounded-xl bg-white border border-[var(--border-frame)]/40 text-[var(--text-accent)] font-semibold text-xs hover:bg-[var(--bg-accent-light)] transition flex items-center justify-center gap-1.5 shadow-2xs cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin No. Rekening</span>
                        </button>
                    </div>

                    <!-- Rekening 2: Mandiri -->
                    <div class="p-5 rounded-2xl bg-[var(--bg-canvas)] border border-[var(--border-frame)]/30 text-left space-y-3 shadow-xs reveal-item anim-fade-up delay-3 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between">
                                <span class="font-extrabold text-sm sm:text-base text-[#003876] tracking-wide">MANDIRI</span>
                                <span class="text-[10px] font-mono text-stone-500 uppercase">Transfer Bank</span>
                            </div>
                            <div class="mt-2">
                                <span class="text-[11px] text-[var(--text-muted)] block">Nomor Rekening:</span>
                                <p class="font-mono font-bold text-lg text-[var(--text-main)] tracking-wider">
                                    1230009876543
                                </p>
                                <p class="text-xs text-[var(--text-muted)] font-medium">
                                    a.n. {{ $brideName }}
                                </p>
                            </div>
                        </div>
                        <button type="button" onclick="copyToClipboard('1230009876543', 'Nomor rekening Mandiri')" class="w-full py-2.5 px-3 rounded-xl bg-white border border-[var(--border-frame)]/40 text-[var(--text-accent)] font-semibold text-xs hover:bg-[var(--bg-accent-light)] transition flex items-center justify-center gap-1.5 shadow-2xs cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                            <span>Salin No. Rekening</span>
                        </button>
                    </div>
                </div>

                <!-- Alamat Pengiriman Kado Fisik -->
                <div class="p-5 rounded-2xl bg-[var(--bg-canvas)] border border-[var(--border-frame)]/30 text-left space-y-2.5 shadow-xs reveal-item anim-fade-up delay-4">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-[var(--text-accent)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        <span class="text-xs sm:text-sm font-bold text-[var(--text-main)]">Kirim Kado Fisik</span>
                    </div>
                    <p class="text-xs sm:text-sm text-[var(--text-muted)] font-light leading-relaxed">
                        {{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}
                    </p>
                    <button type="button" onclick="copyToClipboard('{{ $invitation->gift_address ?? 'Jl. Asia Afrika No. 8, Gelora, Tanah Abang, Jakarta Pusat 10270' }}', 'Alamat kado fisik')" class="py-2 px-4 rounded-xl bg-white border border-[var(--border-frame)]/40 text-[var(--text-accent)] font-semibold text-xs hover:bg-[var(--bg-accent-light)] transition flex items-center justify-center gap-1.5 cursor-pointer">
                        <span>Salin Alamat Lengkap</span>
                    </button>
                </div>
            </div>
            @endif
        </section>


        <!-- ================= SECTION RSVP ================= -->
        <section id="section-rsvp" class="py-10 sm:py-16 px-4 sm:px-6 md:px-10 text-center">
            @if($currentThemeId == 2)
            <!-- THEME 2 BESPOKE RSVP & BUKU TAMU (BASIC HARMONY EMERALD) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-6 sm:space-y-8">
                <!-- Section Header on White Canvas -->
                <div class="text-center space-y-1 py-1">
                    <div class="w-24 sm:w-28 h-8 mx-auto">
                        <img src="/images/themes/bg/emerald-royal-crest.svg" alt="Royal Crest" class="w-full h-full object-contain">
                    </div>
                    <p class="font-heading text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-stone-700 font-semibold">
                        {{ strtoupper($groomNickname) }} &amp; {{ strtoupper($brideNickname) }}
                    </p>
                    <h3 class="font-heading text-lg sm:text-2xl font-bold text-stone-800 tracking-wider">
                        KONFIRMASI KEHADIRAN (RSVP)
                    </h3>
                </div>

                <div class="rounded-tr-[44px] sm:rounded-tr-[52px] rounded-tl-2xl rounded-b-2xl shadow-2xl bg-gradient-to-br from-[#247E64] via-[#1E6B52] to-[#165640] text-white p-3 sm:p-4 relative border border-[#D4AF37]/45 reveal-item anim-fade-up">
                    <div class="border border-[#D4AF37]/50 rounded-tr-[36px] sm:rounded-tr-[42px] rounded-tl-xl rounded-b-xl p-5 sm:p-8 space-y-5 text-left">
                        <p class="text-xs sm:text-sm text-white/90 text-center leading-relaxed">
                            Bantu kami mempersiapkan jamuan terbaik dengan mengisi konfirmasi kehadiran Anda di bawah ini:
                        </p>

                        <form action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" class="space-y-4" data-rsvp-form>
                            @csrf
                            <div>
                                <label class="block text-xs font-semibold text-white/90 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ ($guestName === 'Tamu Undangan') ? '' : $guestName }}" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-2.5 rounded-xl border border-[#D4AF37]/50 bg-[#134A37] text-white placeholder-white/50 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#E5C158]">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-white/90 mb-1">Konfirmasi Kehadiran</label>
                                    <select name="attendance" class="w-full px-4 py-2.5 rounded-xl border border-[#D4AF37]/50 bg-[#134A37] text-white text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#E5C158]">
                                        <option value="hadir">Ya, Saya Akan Hadir</option>
                                        <option value="tidak_hadir">Maaf, Tidak Bisa Hadir</option>
                                        <option value="masih_ragu">Masih Ragu-ragu</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-white/90 mb-1">Jumlah Tamu</label>
                                    <select name="guest_count" class="w-full px-4 py-2.5 rounded-xl border border-[#D4AF37]/50 bg-[#134A37] text-white text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#E5C158]">
                                        <option value="1">1 Orang</option>
                                        <option value="2">2 Orang</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-white/90 mb-1">Pesan / Doa Restu</label>
                                <textarea name="message" rows="3" placeholder="Tuliskan ucapan dan doa Anda..." class="w-full px-4 py-2.5 rounded-xl border border-[#D4AF37]/50 bg-[#134A37] text-white placeholder-white/50 text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-[#E5C158]"></textarea>
                            </div>
                            <button type="submit" class="w-full py-3 px-6 rounded-full bg-gradient-to-r from-[#9C782F] via-[#C59B3F] to-[#8F6C25] hover:from-[#AD8737] hover:to-[#9C782F] border border-[#F3E196]/80 text-white text-xs sm:text-sm font-bold uppercase tracking-wider shadow-lg transition cursor-pointer">
                                Kirim Konfirmasi &amp; Ucapan
                            </button>
                        </form>

                        <!-- Daftar Ucapan Masuk (Theme 2) -->
                        <div class="mt-6 pt-5 border-t border-[#D4AF37]/35 space-y-3" data-comments-feed>
                            <h4 class="text-xs sm:text-sm font-bold uppercase tracking-wider text-[#E5C158] flex items-center justify-between">
                                <span>Buku Doa Restu</span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-white/10 text-white" data-comments-count>
                                    {{ isset($invitation->comments) ? $invitation->comments->count() : 0 }} Pesan
                                </span>
                            </h4>
                            <div class="space-y-2.5 max-h-72 overflow-y-auto pr-1" data-comments-list>
                                @if(isset($invitation->comments) && $invitation->comments->isNotEmpty())
                                    @foreach($invitation->comments as $c)
                                    <div class="p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/35 space-y-1">
                                        <div class="flex items-center justify-between text-xs">
                                            <span class="font-bold text-[#E5C158]">{{ $c->name }}</span>
                                            <span class="text-[10px] text-white/60">{{ $c->created_at ? $c->created_at->diffForHumans() : 'Baru saja' }}</span>
                                        </div>
                                        <p class="text-xs text-white/90 leading-relaxed italic">
                                            "{{ $c->message }}"
                                        </p>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="p-4 rounded-xl bg-[#134A37]/60 border border-[#D4AF37]/25 text-center text-xs text-white/70 italic" data-comments-empty>
                                        Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                                    </div>
                                @endif
                            </div>

                            <template data-comment-template>
                                <div class="p-3 rounded-xl bg-[#134A37] border border-[#D4AF37]/35 space-y-1 transform transition duration-500 ease-out">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="font-bold text-[#E5C158]" data-comment-name></span>
                                        <span class="text-[10px] text-white/60" data-comment-time>Baru saja</span>
                                    </div>
                                    <p class="text-xs text-white/90 leading-relaxed italic" data-comment-message></p>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 3)
            <!-- THEME 3 BESPOKE RSVP & BUKU TAMU (BASIC HARMONY NAVY - MATCHING IMAGE 1 & IMAGE 2 SECTION 10 & 11) -->
            <div class="relative w-full bg-[#1E3A5F] text-white py-12 sm:py-16 px-4 sm:px-6 md:px-10 rounded-2xl shadow-xl border border-white/20 space-y-8 sm:space-y-10">
                <!-- Top Waves -->
                <div class="absolute inset-x-0 top-0 w-full pointer-events-none">
                    <img src="/images/themes/bg/navy-wave-top.svg" alt="" class="w-full h-8 sm:h-12 object-cover object-top opacity-60">
                </div>

                <!-- 1. RSVP via WhatsApp Card (Directly Matching Image 1 & Image 2) -->
                <div class="max-w-md mx-auto text-center space-y-4 relative z-10">
                    <div>
                        <h3 class="font-heading text-3xl sm:text-4xl font-normal tracking-wide text-white">
                            RSVP
                        </h3>
                        <p class="text-xs sm:text-sm italic font-light text-sky-200 mt-1">
                            Reservasi kehadiranmu via whatsapp
                        </p>
                    </div>

                    <div class="bg-white rounded-2xl p-6 sm:p-8 text-stone-800 shadow-2xl space-y-4 text-left">
                        <div>
                            <label for="rsvp_guest_name_3" class="block text-xs font-semibold text-stone-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="rsvp_guest_name_3" value="{{ $guestName }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-xs text-stone-800 focus:outline-none focus:border-[#1E3A5F]" placeholder="Nama Lengkap">
                        </div>

                        <div>
                            <label for="rsvp_guest_count_3" class="block text-xs font-semibold text-stone-700 mb-1">Jumlah Tamu</label>
                            <select id="rsvp_guest_count_3" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 text-xs text-stone-800 focus:outline-none focus:border-[#1E3A5F]">
                                <option value="1">1 Orang</option>
                                <option value="2">2 Orang</option>
                                <option value="3">3 Orang</option>
                                <option value="4">4 Orang</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-stone-700 mb-1.5">Konfirmasi Kehadiran</label>
                            <div class="grid grid-cols-3 gap-2">
                                <label class="flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 cursor-pointer text-xs font-medium hover:bg-slate-50 transition">
                                    <input type="radio" name="rsvp_status_3" value="Hadir" checked class="text-[#1E3A5F] mb-1">
                                    <span>Hadir</span>
                                </label>
                                <label class="flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 cursor-pointer text-xs font-medium hover:bg-slate-50 transition">
                                    <input type="radio" name="rsvp_status_3" value="Tidak Hadir" class="text-[#1E3A5F] mb-1">
                                    <span>Tidak Hadir</span>
                                </label>
                                <label class="flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 cursor-pointer text-xs font-medium hover:bg-slate-50 transition">
                                    <input type="radio" name="rsvp_status_3" value="Ragu-ragu" class="text-[#1E3A5F] mb-1">
                                    <span>Ragu-ragu</span>
                                </label>
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="button" onclick="sendWhatsAppRSVP3()" class="w-full py-3 rounded-full bg-[#1E3A5F] hover:bg-[#162D4A] text-white font-bold text-xs tracking-wider uppercase shadow-md flex items-center justify-center gap-2 transition cursor-pointer">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.592 2.654-.696c1.004.549 1.956.848 2.806.849h.001c3.181 0 5.767-2.586 5.768-5.766 0-3.18-2.586-5.766-5.769-5.766zm0 10.378h-.001c-.808 0-1.603-.217-2.298-.629l-.165-.098-1.708.448.456-1.664-.107-.171c-.453-.72-.692-1.554-.691-2.498.001-2.539 2.067-4.605 4.607-4.605 2.539 0 4.605 2.066 4.606 4.606-.001 2.54-2.067 4.606-4.607 4.606zm2.528-3.454c-.139-.069-.821-.405-.948-.451-.128-.046-.221-.069-.314.07-.093.138-.36.451-.442.544-.081.092-.163.104-.302.035s-.588-.217-1.12-.691c-.414-.369-.693-.825-.774-.964-.081-.139-.009-.214.061-.283.063-.062.139-.163.209-.244.069-.081.093-.139.139-.232.046-.093.023-.174-.012-.244-.035-.069-.314-.755-.43-.1033-.113-.271-.227-.234-.313-.239l-.268-.005c-.093 0-.244.035-.372.174-.128.139-.488.476-.488 1.16s.5 1.346.57 1.439c.069.093.984 1.502 2.384 2.106.333.144.593.229.796.294.335.106.64.091.881.055.269-.04 821-.336.937-.661.116-.325.116-.603.081-.661-.034-.058-.127-.092-.266-.162z"/></svg>
                                <span>Kirim via WhatsApp</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 2. Guestbook Wishes Feed inside Navy Card -->
                <div class="max-w-md mx-auto space-y-4 pt-4 border-t border-white/20">
                    <h4 class="font-heading text-lg sm:text-xl font-bold tracking-wide text-white text-center">
                        Buku Tamu &amp; Ucapan Doa
                    </h4>
                    <form action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" class="space-y-3 bg-white/10 backdrop-blur-md p-4 sm:p-5 rounded-2xl border border-white/20 text-left" data-rsvp-form>
                        @csrf
                        <input type="hidden" name="name" value="{{ ($guestName === 'Tamu Undangan') ? 'Tamu Undangan' : $guestName }}">
                        <input type="hidden" name="attendance" value="hadir">
                        <input type="hidden" name="guest_count" value="1">
                        <textarea name="message" rows="3" required placeholder="Tuliskan ucapan dan doa restu Anda..." class="w-full px-3.5 py-2.5 rounded-xl bg-white/90 text-stone-800 text-xs focus:outline-none"></textarea>
                        <button type="submit" class="w-full py-2.5 rounded-full bg-white text-[#1E3A5F] hover:bg-slate-100 font-bold text-xs tracking-wider uppercase transition shadow-md cursor-pointer">
                            Kirim Doa Restu
                        </button>
                    </form>

                    <!-- Daftar Ucapan Masuk (Theme 3 Navy) -->
                    <div class="mt-6 pt-5 border-t border-white/20 space-y-3" data-comments-feed>
                        <h4 class="text-xs sm:text-sm font-bold uppercase tracking-wider text-sky-200 flex items-center justify-between">
                            <span>Buku Doa Restu</span>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-white/10 text-white" data-comments-count>
                                {{ isset($invitation->comments) ? $invitation->comments->count() : 0 }} Pesan
                            </span>
                        </h4>

                        <div class="space-y-2.5 max-h-72 overflow-y-auto pr-1" data-comments-list>
                            @if(isset($invitation->comments) && $invitation->comments->isNotEmpty())
                                @foreach($invitation->comments as $c)
                                <div class="p-3.5 rounded-xl bg-white/10 border border-white/15 space-y-1 text-left backdrop-blur-xs">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="font-bold text-white">{{ $c->name }}</span>
                                        <span class="text-[10px] text-sky-200">{{ $c->created_at ? $c->created_at->diffForHumans() : 'Baru saja' }}</span>
                                    </div>
                                    <p class="text-xs text-white/90 leading-relaxed italic">
                                        "{{ $c->message }}"
                                    </p>
                                </div>
                                @endforeach
                            @else
                                <div class="p-4 rounded-xl bg-white/5 border border-white/10 text-center text-xs text-sky-200/80 italic" data-comments-empty>
                                    Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                                </div>
                            @endif
                        </div>

                        <template data-comment-template>
                            <div class="p-3.5 rounded-xl bg-white/10 border border-white/15 space-y-1 text-left backdrop-blur-xs transform transition duration-500 ease-out">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-bold text-white" data-comment-name></span>
                                    <span class="text-[10px] text-sky-200" data-comment-time>Baru saja</span>
                                </div>
                                <p class="text-xs text-white/90 leading-relaxed italic" data-comment-message></p>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 20 || $isDarkElegance)
            <!-- THEME 20 BESPOKE RSVP & BUKU TAMU (PREMIUM SERENADE DARK ELEGANCE) -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto space-y-6 sm:space-y-8">
                <!-- Section Header -->
                <div class="text-center space-y-1 py-1 reveal-item anim-title">
                    <p class="font-serif text-xs sm:text-sm tracking-[0.25em] sm:tracking-[0.3em] uppercase text-[#9EB092] font-semibold">
                        RESERVASI
                    </p>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold text-[#FAF7F2] tracking-wider">
                        Konfirmasi Kehadiran &amp; Doa
                    </h3>
                    <p class="font-serif text-xs sm:text-sm text-[#D5DDD0]/80 max-w-md mx-auto leading-relaxed">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.
                    </p>
                </div>

                <div class="rounded-2xl shadow-2xl bg-[#0F110F] text-[#FAF7F2] p-5 sm:p-8 relative border border-[#9EB092]/30 reveal-item anim-card-rise">
                    <form action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" class="space-y-4 text-left" data-rsvp-form>
                        @csrf
                        <div>
                            <label class="block text-xs font-serif font-medium text-[#FAF7F2] mb-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ ($guestName === 'Tamu Undangan') ? '' : $guestName }}" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-2.5 rounded-xl border border-[#9EB092]/40 bg-[#070807] text-white placeholder-white/40 text-xs sm:text-sm focus:outline-none focus:ring-1 focus:ring-[#9EB092]">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-serif font-medium text-[#FAF7F2] mb-1">Konfirmasi Kehadiran</label>
                                <select name="attendance" class="w-full px-4 py-2.5 rounded-xl border border-[#9EB092]/40 bg-[#070807] text-white text-xs sm:text-sm focus:outline-none focus:ring-1 focus:ring-[#9EB092]">
                                    <option value="hadir">Ya, Saya Akan Hadir</option>
                                    <option value="tidak_hadir">Maaf, Tidak Bisa Hadir</option>
                                    <option value="masih_ragu">Masih Ragu-ragu</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-serif font-medium text-[#FAF7F2] mb-1">Jumlah Tamu</label>
                                <select name="guest_count" class="w-full px-4 py-2.5 rounded-xl border border-[#9EB092]/40 bg-[#070807] text-white text-xs sm:text-sm focus:outline-none focus:ring-1 focus:ring-[#9EB092]">
                                    <option value="1">1 Orang</option>
                                    <option value="2">2 Orang</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-serif font-medium text-[#FAF7F2] mb-1">Pesan / Doa Restu</label>
                            <textarea name="message" rows="3" placeholder="Tuliskan ucapan dan doa Anda..." class="w-full px-4 py-2.5 rounded-xl border border-[#9EB092]/40 bg-[#070807] text-white placeholder-white/40 text-xs sm:text-sm focus:outline-none focus:ring-1 focus:ring-[#9EB092]"></textarea>
                        </div>
                        <button type="submit" class="w-full py-3 px-6 rounded-xl bg-[#9EB092] hover:bg-[#8CA080] text-[#070807] text-xs sm:text-sm font-bold uppercase tracking-wider shadow-lg transition cursor-pointer">
                            Kirim Konfirmasi &amp; Ucapan
                        </button>
                    </form>

                    <!-- Daftar Ucapan Masuk (Theme 20) -->
                    <div class="mt-6 pt-5 border-t border-[#9EB092]/30 space-y-3" data-comments-feed>
                        <h4 class="text-xs sm:text-sm font-bold uppercase tracking-wider text-[#9EB092] flex items-center justify-between">
                            <span>Buku Doa Restu</span>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-white/10 text-white" data-comments-count>
                                {{ isset($invitation->comments) ? $invitation->comments->count() : 0 }} Pesan
                            </span>
                        </h4>
                        <div class="space-y-2.5 max-h-72 overflow-y-auto pr-1" data-comments-list>
                            @if(isset($invitation->comments) && $invitation->comments->isNotEmpty())
                                @foreach($invitation->comments as $c)
                                <div class="p-3 rounded-xl bg-[#070807] border border-[#9EB092]/30 space-y-1">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="font-bold text-[#9EB092]">{{ $c->name }}</span>
                                        <span class="text-[10px] text-white/50">{{ $c->created_at ? $c->created_at->diffForHumans() : 'Baru saja' }}</span>
                                    </div>
                                    <p class="text-xs text-[#FAF7F2]/90 leading-relaxed italic">
                                        "{{ $c->message }}"
                                    </p>
                                </div>
                                @endforeach
                            @else
                                <div class="p-4 rounded-xl bg-[#070807]/60 border border-[#9EB092]/20 text-center text-xs text-white/60 italic font-serif" data-comments-empty>
                                    Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                                </div>
                            @endif
                        </div>

                        <template data-comment-template>
                            <div class="p-3 rounded-xl bg-[#070807] border border-[#9EB092]/30 space-y-1 transform transition duration-500 ease-out">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-bold text-[#9EB092]" data-comment-name></span>
                                    <span class="text-[10px] text-white/50" data-comment-time>Baru saja</span>
                                </div>
                                <p class="text-xs text-[#FAF7F2]/90 leading-relaxed italic" data-comment-message></p>
                            </div>
                        </template>
                    </div>

                    <!-- Bottom Floral Divider -->
                    <div class="w-48 sm:w-64 mx-auto pointer-events-none reveal-item anim-floral-bloom">
                        <img src="/images/themes/serenade-dark/floral-divider.png" alt="" class="w-full h-auto object-contain">
                    </div>
                </div>
            </div>
            @elseif($currentThemeId == 19 || $isLavenderMist)
            <!-- ================= THEME 19 BESPOKE RSVP & BUKU TAMU (PREMIUM SERENADE LAVENDER MIST) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-t-[44px] sm:rounded-t-[56px] rounded-b-3xl bg-white theme-lavender-pattern shadow-2xl p-6 sm:p-10 relative space-y-6 text-center text-[#2D1E40] reveal-item anim-lavender-card-3d">
                <!-- Top Floral Garland Decoration -->
                <div class="w-56 sm:w-72 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-lavender-flower-unfold">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-lavender-title">
                    <span class="text-[11px] sm:text-xs font-lavender-title tracking-[0.35em] uppercase text-[#8B7CB0] font-bold block">
                        RESERVASI &amp; DOA RESTU
                    </span>
                    <h3 class="font-lavender-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#2D1E40]">
                        Ucapan &amp; Doa
                    </h3>
                    <p class="font-lavender-body text-xs sm:text-sm text-[#6E5D87] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan memberikan doa restu kepada kami:
                    </p>
                </div>

                <!-- RSVP Form Card -->
                <div class="rounded-3xl border border-[#C5B8D8] bg-[#FAF7FC] p-6 sm:p-8 shadow-md text-left space-y-5 relative reveal-item anim-lavender-card-3d">
                    <form action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" class="space-y-4" data-rsvp-form>
                        @csrf
                        <div>
                            <label class="block text-xs font-lavender-title tracking-wider uppercase text-[#8B7CB0] mb-1.5 font-bold">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ ($guestName === 'Tamu Undangan') ? '' : $guestName }}" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-3 rounded-xl border border-[#C5B8D8] bg-white text-[#2D1E40] placeholder-[#8B7CB0]/60 font-lavender-body text-xs sm:text-sm focus:outline-none focus:border-[#8B7CB0] focus:ring-1 focus:ring-[#8B7CB0] transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-lavender-title tracking-wider uppercase text-[#8B7CB0] mb-1.5 font-bold">Konfirmasi Kehadiran</label>
                                <select name="attendance" class="w-full px-4 py-3 rounded-xl border border-[#C5B8D8] bg-white text-[#2D1E40] font-lavender-body text-xs sm:text-sm focus:outline-none focus:border-[#8B7CB0] focus:ring-1 focus:ring-[#8B7CB0] transition">
                                    <option value="hadir">Ya, Saya Akan Hadir</option>
                                    <option value="tidak_hadir">Maaf, Tidak Bisa Hadir</option>
                                    <option value="masih_ragu">Masih Ragu-ragu</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-lavender-title tracking-wider uppercase text-[#8B7CB0] mb-1.5 font-bold">Jumlah Tamu</label>
                                <select name="guest_count" class="w-full px-4 py-3 rounded-xl border border-[#C5B8D8] bg-white text-[#2D1E40] font-lavender-body text-xs sm:text-sm focus:outline-none focus:border-[#8B7CB0] focus:ring-1 focus:ring-[#8B7CB0] transition">
                                    <option value="1">1 Orang</option>
                                    <option value="2">2 Orang</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-lavender-title tracking-wider uppercase text-[#8B7CB0] mb-1.5 font-bold">Pesan &amp; Doa Restu</label>
                            <textarea name="message" rows="3" placeholder="Tuliskan ucapan dan doa restu Anda..." class="w-full px-4 py-3 rounded-xl border border-[#C5B8D8] bg-white text-[#2D1E40] placeholder-[#8B7CB0]/60 font-lavender-body text-xs sm:text-sm focus:outline-none focus:border-[#8B7CB0] focus:ring-1 focus:ring-[#8B7CB0] transition"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 px-6 rounded-full bg-gradient-to-r from-[#8B7CB0] via-[#A898D0] to-[#736398] hover:from-[#736398] hover:to-[#8B7CB0] text-white text-xs sm:text-sm font-bold uppercase tracking-wider shadow-lg transition transform active:scale-95 cursor-pointer font-lavender-title">
                            Kirim Ucapan &amp; Konfirmasi
                        </button>
                    </form>

                    <!-- Daftar Ucapan Masuk (Theme 19) -->
                    <div class="mt-6 pt-5 border-t border-[#C5B8D8]/50 space-y-3" data-comments-feed>
                        <h4 class="text-xs sm:text-sm font-bold uppercase tracking-wider text-[#8B7CB0] font-lavender-title flex items-center justify-between">
                            <span>Buku Doa Restu</span>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-[#8B7CB0]/15 text-[#6E5D87]" data-comments-count>
                                {{ isset($invitation->comments) ? $invitation->comments->count() : 0 }} Pesan
                            </span>
                        </h4>

                        <div class="space-y-2.5 max-h-72 overflow-y-auto pr-1" data-comments-list>
                            @if(isset($invitation->comments) && $invitation->comments->isNotEmpty())
                                @foreach($invitation->comments as $c)
                                <div class="p-3.5 rounded-2xl bg-white border border-[#C5B8D8]/60 space-y-1 shadow-xs">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="font-bold text-[#2D1E40] font-lavender-title">{{ $c->name }}</span>
                                        <span class="text-[10px] text-[#6E5D87] font-lavender-body">{{ $c->created_at ? $c->created_at->diffForHumans() : 'Baru saja' }}</span>
                                    </div>
                                    <p class="text-xs text-[#4A3B60] leading-relaxed italic font-lavender-body">
                                        "{{ $c->message }}"
                                    </p>
                                </div>
                                @endforeach
                            @else
                                <div class="p-4 rounded-2xl bg-purple-50/60 border border-purple-100 text-center text-xs text-[#6E5D87] italic font-lavender-body" data-comments-empty>
                                    Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                                </div>
                            @endif
                        </div>

                        <template data-comment-template>
                            <div class="p-3.5 rounded-2xl bg-white border border-[#C5B8D8]/60 space-y-1 shadow-xs transform transition duration-500 ease-out">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-bold text-[#2D1E40] font-lavender-title" data-comment-name></span>
                                    <span class="text-[10px] text-[#6E5D87] font-lavender-body" data-comment-time>Baru saja</span>
                                </div>
                                <p class="text-xs text-[#4A3B60] leading-relaxed italic font-lavender-body" data-comment-message></p>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Bottom Floral Garland Divider -->
                <div class="w-56 sm:w-72 mx-auto pt-4 pointer-events-none reveal-item anim-lavender-flower-unfold delay-3">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @elseif($currentThemeId == 15 || $isMidnightAmber)
            <!-- ================= THEME 15 BESPOKE RSVP & UCAPAN (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl bg-[#1C1A18] border border-[#DDA74F]/40 shadow-[0_16px_50px_rgba(0,0,0,0.8)] p-6 sm:p-10 relative space-y-6 text-center text-white reveal-item anim-amber-card-3d">
                <!-- Top Floral Crest Decoration -->
                <div class="w-48 sm:w-60 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-amber-bloom">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-amber-title">
                    <span class="text-[11px] sm:text-xs font-amber-title tracking-[0.35em] uppercase text-[#DDA74F] font-bold block">
                        RESERVASI &amp; DOA RESTU
                    </span>
                    <h3 class="font-amber-headline text-3xl sm:text-4xl font-bold tracking-wide text-[#FAF5EC]">
                        Ucapan &amp; Doa
                    </h3>
                    <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] font-normal leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan memberikan doa restu kepada kami:
                    </p>
                </div>

                <!-- RSVP Form Card -->
                <div class="rounded-2xl border border-[#DDA74F]/35 bg-[#161514] p-6 sm:p-8 shadow-md text-left space-y-5 relative reveal-item anim-amber-card-3d">
                    <form action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" class="space-y-4" data-rsvp-form>
                        @csrf
                        <div>
                            <label class="block text-xs font-amber-title tracking-wider uppercase text-[#DDA74F] mb-1.5 font-bold">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ ($guestName === 'Tamu Undangan') ? '' : $guestName }}" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-3 rounded-xl border border-[#DDA74F]/40 bg-[#1C1A18] text-[#FAF5EC] placeholder-[#C4B5A5]/60 font-amber-body text-xs sm:text-sm focus:outline-none focus:border-[#DDA74F] focus:ring-1 focus:ring-[#DDA74F] transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-amber-title tracking-wider uppercase text-[#DDA74F] mb-1.5 font-bold">Konfirmasi Kehadiran</label>
                                <select name="attendance" class="w-full px-4 py-3 rounded-xl border border-[#DDA74F]/40 bg-[#1C1A18] text-[#FAF5EC] font-amber-body text-xs sm:text-sm focus:outline-none focus:border-[#DDA74F] focus:ring-1 focus:ring-[#DDA74F] transition">
                                    <option value="hadir" class="bg-[#1C1A18] text-[#FAF5EC]">Ya, Saya Akan Hadir</option>
                                    <option value="tidak_hadir" class="bg-[#1C1A18] text-[#FAF5EC]">Maaf, Tidak Bisa Hadir</option>
                                    <option value="masih_ragu" class="bg-[#1C1A18] text-[#FAF5EC]">Masih Ragu-ragu</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-amber-title tracking-wider uppercase text-[#DDA74F] mb-1.5 font-bold">Jumlah Tamu</label>
                                <select name="guest_count" class="w-full px-4 py-3 rounded-xl border border-[#DDA74F]/40 bg-[#1C1A18] text-[#FAF5EC] font-amber-body text-xs sm:text-sm focus:outline-none focus:border-[#DDA74F] focus:ring-1 focus:ring-[#DDA74F] transition">
                                    <option value="1" class="bg-[#1C1A18] text-[#FAF5EC]">1 Orang</option>
                                    <option value="2" class="bg-[#1C1A18] text-[#FAF5EC]">2 Orang</option>
                                    <option value="3" class="bg-[#1C1A18] text-[#FAF5EC]">3 Orang</option>
                                    <option value="4" class="bg-[#1C1A18] text-[#FAF5EC]">4 Orang</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-amber-title tracking-wider uppercase text-[#DDA74F] mb-1.5 font-bold">Pesan &amp; Doa Restu</label>
                            <textarea name="message" rows="3" placeholder="Tuliskan ucapan dan doa restu Anda..." class="w-full px-4 py-3 rounded-xl border border-[#DDA74F]/40 bg-[#1C1A18] text-[#FAF5EC] placeholder-[#C4B5A5]/60 font-amber-body text-xs sm:text-sm focus:outline-none focus:border-[#DDA74F] focus:ring-1 focus:ring-[#DDA74F] transition"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 px-6 rounded-md bg-gradient-to-r from-[#DDA74F] via-[#F2D59B] to-[#C59132] hover:brightness-110 text-[#161514] text-xs sm:text-sm font-bold uppercase tracking-wider shadow-lg transition transform active:scale-95 cursor-pointer font-amber-title">
                            Kirim Ucapan &amp; Konfirmasi
                        </button>
                    </form>

                    <!-- Daftar Ucapan Masuk (Theme 15) -->
                    <div class="mt-6 pt-5 border-t border-[#DDA74F]/30 space-y-3" data-comments-feed>
                        <h4 class="text-xs sm:text-sm font-bold uppercase tracking-wider text-[#DDA74F] font-amber-title flex items-center justify-between">
                            <span>Buku Doa Restu</span>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-[#DDA74F]/20 text-[#E8C37D]" data-comments-count>
                                {{ isset($invitation->comments) ? $invitation->comments->count() : 0 }} Pesan
                            </span>
                        </h4>

                        <div class="space-y-2.5 max-h-72 overflow-y-auto pr-1" data-comments-list>
                            @if(isset($invitation->comments) && $invitation->comments->isNotEmpty())
                                @foreach($invitation->comments as $c)
                                <div class="p-3.5 rounded-xl bg-[#1C1A18] border border-[#DDA74F]/30 space-y-1 shadow-xs">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="font-bold text-[#DDA74F] font-amber-title">{{ $c->name }}</span>
                                        <span class="text-[10px] text-[#C4B5A5] font-amber-body">{{ $c->created_at ? $c->created_at->diffForHumans() : 'Baru saja' }}</span>
                                    </div>
                                    <p class="text-xs text-[#FAF5EC]/90 leading-relaxed italic font-amber-body">
                                        "{{ $c->message }}"
                                    </p>
                                </div>
                                @endforeach
                            @else
                                <div class="p-4 rounded-xl bg-[#161514] border border-[#DDA74F]/20 text-center text-xs text-[#C4B5A5] italic font-amber-body" data-comments-empty>
                                    Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                                </div>
                            @endif
                        </div>

                        <template data-comment-template>
                            <div class="p-3.5 rounded-xl bg-[#1C1A18] border border-[#DDA74F]/30 space-y-1 shadow-xs transform transition duration-500 ease-out">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-bold text-[#DDA74F] font-amber-title" data-comment-name></span>
                                    <span class="text-[10px] text-[#C4B5A5] font-amber-body" data-comment-time>Baru saja</span>
                                </div>
                                <p class="text-xs text-[#FAF5EC]/90 leading-relaxed italic font-amber-body" data-comment-message></p>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Bottom Floral Crest Divider -->
                <div class="w-48 sm:w-60 mx-auto pt-4 pointer-events-none reveal-item anim-amber-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>

            <!-- Golden Wavy Ribbon Divider Across Section -->
            <div class="w-full pt-6 pointer-events-none reveal-item anim-amber-bloom delay-3">
                <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
            </div>
            @elseif($currentThemeId == 13 || $isSummerVibes)
            <!-- ================= THEME 13 BESPOKE RSVP & UCAPAN (PREMIUM SUMMER VIBES) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-3xl bg-[#FAF8F5] border-2 border-[#1D63B8]/30 shadow-[0_16px_50px_rgba(29,99,184,0.12)] p-6 sm:p-10 relative space-y-7 text-center text-[#1E293B] reveal-item anim-summer-stamp">
                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.35em] uppercase text-[#1D63B8] font-bold block">
                        GUESTBOOK &amp; WISHES
                    </span>
                    <h3 class="text-3xl sm:text-4xl text-[#D94B26] leading-tight"
                        style="font-family: 'Shrikhand', 'Titan One', cursive;">
                        Buku Tamu &amp; Doa
                    </h3>
                    <div class="w-24 sm:w-28 mx-auto pointer-events-none my-1">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                    <p class="text-xs sm:text-sm text-slate-600 font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan memberikan doa restu kepada kami:
                    </p>
                </div>

                <!-- RSVP Form Card -->
                <div class="rounded-2xl border border-[#1D63B8]/25 bg-white p-6 sm:p-8 shadow-sm text-left space-y-4 relative reveal-item anim-fade-up">
                    <form action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" class="space-y-4" data-rsvp-form>
                        @csrf
                        <div>
                            <label class="block text-xs font-serif tracking-wider uppercase text-[#1D63B8] mb-1.5 font-bold">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ ($guestName === 'Tamu Undangan') ? '' : $guestName }}" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-3 rounded-xl border border-[#1D63B8]/30 bg-slate-50 text-[#1E293B] placeholder-slate-400 text-xs sm:text-sm focus:outline-none focus:border-[#D94B26] focus:ring-1 focus:ring-[#D94B26] transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-serif tracking-wider uppercase text-[#1D63B8] mb-1.5 font-bold">Konfirmasi Kehadiran</label>
                                <select name="attendance" class="w-full px-4 py-3 rounded-xl border border-[#1D63B8]/30 bg-slate-50 text-[#1E293B] text-xs sm:text-sm focus:outline-none focus:border-[#D94B26] focus:ring-1 focus:ring-[#D94B26] transition">
                                    <option value="hadir">Ya, Saya Akan Hadir</option>
                                    <option value="tidak_hadir">Maaf, Tidak Bisa Hadir</option>
                                    <option value="masih_ragu">Masih Ragu-ragu</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-serif tracking-wider uppercase text-[#1D63B8] mb-1.5 font-bold">Jumlah Tamu</label>
                                <select name="guest_count" class="w-full px-4 py-3 rounded-xl border border-[#1D63B8]/30 bg-slate-50 text-[#1E293B] text-xs sm:text-sm focus:outline-none focus:border-[#D94B26] focus:ring-1 focus:ring-[#D94B26] transition">
                                    <option value="1">1 Orang</option>
                                    <option value="2">2 Orang</option>
                                    <option value="3">3 Orang</option>
                                    <option value="4">4 Orang</option>
                                    <option value="5">5 Orang</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-serif tracking-wider uppercase text-[#1D63B8] mb-1.5 font-bold">Pesan &amp; Doa Restu</label>
                            <textarea name="message" rows="3" placeholder="Tuliskan ucapan dan doa restu terbaik Anda..." required class="w-full px-4 py-3 rounded-xl border border-[#1D63B8]/30 bg-slate-50 text-[#1E293B] placeholder-slate-400 text-xs sm:text-sm focus:outline-none focus:border-[#D94B26] focus:ring-1 focus:ring-[#D94B26] transition"></textarea>
                        </div>

                        <button type="submit" data-submit-btn
                                class="w-full py-3.5 px-6 rounded-full bg-gradient-to-r from-[#D94B26] to-[#E85D36] hover:from-[#c23d1b] hover:to-[#d44d27] text-white font-bold text-xs sm:text-sm tracking-wider uppercase shadow-md transition-all hover:scale-[1.01] active:scale-98 flex items-center justify-center gap-2 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                            <span>Kirim Ucapan &amp; Konfirmasi</span>
                        </button>
                    </form>
                </div>

                <!-- Buku Doa Restu (Real-time Live Comments Feed) -->
                <div class="space-y-4 pt-2 text-left" data-comments-feed>
                    <div class="flex items-center justify-between border-b border-[#1D63B8]/20 pb-2">
                        <h4 class="font-serif text-base sm:text-lg font-bold text-[#1D63B8] flex items-center gap-2">
                            <span>Buku Doa Restu Tamu</span>
                        </h4>
                        <span class="px-2.5 py-0.5 rounded-full bg-[#1D63B8]/10 text-[#1D63B8] font-bold text-xs" data-comments-count>
                            {{ (!empty($invitation->comments) && is_countable($invitation->comments)) ? count($invitation->comments) : 0 }} Pesan
                        </span>
                    </div>

                    <div class="space-y-3 max-h-96 overflow-y-auto pr-1" data-comments-list>
                        @forelse($invitation->comments ?? [] as $cmt)
                        <div class="rounded-2xl p-4 bg-white border border-[#1D63B8]/20 shadow-xs space-y-1.5 transition-all">
                            <div class="flex items-center justify-between">
                                <h5 class="font-bold text-xs sm:text-sm text-[#1D63B8] uppercase tracking-wide">{{ $cmt->name ?? 'Tamu Undangan' }}</h5>
                                <span class="text-[10px] text-slate-400 font-sans">{{ !empty($cmt->created_at) ? (is_string($cmt->created_at) ? $cmt->created_at : $cmt->created_at->diffForHumans()) : 'Baru saja' }}</span>
                            </div>
                            @if(!empty($cmt->attendance))
                            <span class="inline-block px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider {{ $cmt->attendance === 'hadir' ? 'bg-emerald-100 text-emerald-800' : ($cmt->attendance === 'tidak_hadir' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800') }}">
                                {{ $cmt->attendance === 'hadir' ? 'Hadir' : ($cmt->attendance === 'tidak_hadir' ? 'Tidak Hadir' : 'Ragu-ragu') }}
                            </span>
                            @endif
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic">
                                "{{ $cmt->message ?? '' }}"
                            </p>
                        </div>
                        @empty
                        <div class="text-center py-6 text-slate-400 text-xs italic" data-comments-empty>
                            Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                        </div>
                        @endforelse
                    </div>

                    <!-- Client-side Template for instant prepend without reloading -->
                    <template data-comment-template>
                        <div class="rounded-2xl p-4 bg-white border border-[#1D63B8]/20 shadow-xs space-y-1.5 transition-all border-l-4 border-l-[#D94B26] animate-pulse">
                            <div class="flex items-center justify-between">
                                <h5 class="font-bold text-xs sm:text-sm text-[#1D63B8] uppercase tracking-wide" data-template-name></h5>
                                <span class="text-[10px] text-slate-400 font-sans">Baru saja</span>
                            </div>
                            <span class="inline-block px-2 py-0.5 rounded-full text-[9px] font-bold uppercase tracking-wider" data-template-badge></span>
                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed italic" data-template-message></p>
                        </div>
                    </template>
                </div>

                <!-- Bottom Blue Floral Divider -->
                <div class="w-28 sm:w-36 mx-auto pt-2 pointer-events-none">
                    <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
            @elseif($currentThemeId == 16 || $isMuseumOfLove)
            <!-- ================= THEME 16 BESPOKE RSVP & UCAPAN (PREMIUM MUSEUM OF LOVE) ================= -->
            <div class="w-full max-w-sm sm:max-w-md md:max-w-2xl mx-auto rounded-2xl sm:rounded-3xl theme-museum-canvas border border-[#D4AF37]/45 shadow-[0_16px_50px_rgba(56,35,24,0.18)] p-6 sm:p-10 relative space-y-7 text-center text-[#2A1F1D] reveal-item anim-museum-card">
                <!-- Overhead Museum Spotlight Effect -->
                <div class="museum-spotlight absolute top-0 left-1/2 -translate-x-1/2 w-48 sm:w-64 h-32 pointer-events-none"></div>

                <!-- Section Header -->
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-museum-sub tracking-[0.35em] uppercase text-[#8B1E22] font-bold block">
                        GUESTBOOK &amp; WISHES
                    </span>
                    <h3 class="font-museum-title text-3xl sm:text-4xl font-bold tracking-wide text-[#382318]">
                        Buku Tamu &amp; Doa
                    </h3>
                    <div class="w-16 h-0.5 bg-[#8B1E22] mx-auto my-2"></div>
                    <p class="font-museum-body text-xs sm:text-sm text-[#5C4033] font-light leading-relaxed max-w-xs sm:max-w-md mx-auto">
                        Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan memberikan doa restu kepada kami:
                    </p>
                </div>

                <!-- RSVP Form Card (Museum Registry Style) -->
                <div class="rounded-2xl border-2 border-[#D4AF37]/45 bg-[#FFFDF9] p-6 sm:p-8 shadow-md text-left space-y-5 relative reveal-item anim-museum-card">
                    <form action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" class="space-y-4" data-rsvp-form>
                        @csrf
                        <div>
                            <label class="block text-xs font-museum-title tracking-wider uppercase text-[#8B1E22] mb-1.5 font-bold">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ ($guestName === 'Tamu Undangan') ? '' : $guestName }}" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-3 rounded-xl border border-[#D4AF37]/50 bg-[#FAF6EE] text-[#382318] placeholder-[#5C4033]/60 font-museum-body text-xs sm:text-sm focus:outline-none focus:border-[#8B1E22] focus:ring-1 focus:ring-[#8B1E22] transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-museum-title tracking-wider uppercase text-[#8B1E22] mb-1.5 font-bold">Konfirmasi Kehadiran</label>
                                <select name="attendance" class="w-full px-4 py-3 rounded-xl border border-[#D4AF37]/50 bg-[#FAF6EE] text-[#382318] font-museum-body text-xs sm:text-sm focus:outline-none focus:border-[#8B1E22] focus:ring-1 focus:ring-[#8B1E22] transition">
                                    <option value="hadir">Ya, Saya Akan Hadir</option>
                                    <option value="tidak_hadir">Maaf, Tidak Bisa Hadir</option>
                                    <option value="masih_ragu">Masih Ragu-ragu</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-museum-title tracking-wider uppercase text-[#8B1E22] mb-1.5 font-bold">Jumlah Tamu</label>
                                <select name="guest_count" class="w-full px-4 py-3 rounded-xl border border-[#D4AF37]/50 bg-[#FAF6EE] text-[#382318] font-museum-body text-xs sm:text-sm focus:outline-none focus:border-[#8B1E22] focus:ring-1 focus:ring-[#8B1E22] transition">
                                    <option value="1">1 Orang</option>
                                    <option value="2">2 Orang</option>
                                    <option value="3">3 Orang</option>
                                    <option value="4">4 Orang</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-museum-title tracking-wider uppercase text-[#8B1E22] mb-1.5 font-bold">Pesan &amp; Doa Restu</label>
                            <textarea name="message" rows="3" placeholder="Tuliskan ucapan dan doa restu Anda..." class="w-full px-4 py-3 rounded-xl border border-[#D4AF37]/50 bg-[#FAF6EE] text-[#382318] placeholder-[#5C4033]/60 font-museum-body text-xs sm:text-sm focus:outline-none focus:border-[#8B1E22] focus:ring-1 focus:ring-[#8B1E22] transition"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 px-6 rounded-full bg-[#8B1E22] hover:bg-[#6D1619] border border-[#D4AF37]/80 text-[#FAF5EC] text-xs sm:text-sm font-bold uppercase tracking-wider shadow-lg transition transform active:scale-95 cursor-pointer font-museum-sub">
                            Kirim Ucapan &amp; Konfirmasi
                        </button>
                    </form>

                    <!-- Daftar Ucapan Masuk (Theme 16) -->
                    <div class="mt-6 pt-5 border-t border-[#D4AF37]/35 space-y-3" data-comments-feed>
                        <h4 class="text-xs sm:text-sm font-bold uppercase tracking-wider text-[#8B1E22] font-museum-title flex items-center justify-between">
                            <span>Buku Doa Restu Tamu</span>
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-[#8B1E22]/15 text-[#8B1E22]" data-comments-count>
                                {{ isset($invitation->comments) ? $invitation->comments->count() : 0 }} Pesan
                            </span>
                        </h4>

                        <div class="space-y-2.5 max-h-72 overflow-y-auto pr-1" data-comments-list>
                            @if(isset($invitation->comments) && $invitation->comments->isNotEmpty())
                                @foreach($invitation->comments as $c)
                                <div class="p-3.5 rounded-xl bg-[#FAF6EE] border border-[#D4AF37]/40 space-y-1 shadow-2xs">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="font-bold text-[#8B1E22] font-museum-title">{{ $c->name }}</span>
                                        <span class="text-[10px] text-[#5C4033] font-museum-body">{{ $c->created_at ? $c->created_at->diffForHumans() : 'Baru saja' }}</span>
                                    </div>
                                    <p class="text-xs text-[#382318] leading-relaxed italic font-museum-body">
                                        "{{ $c->message }}"
                                    </p>
                                </div>
                                @endforeach
                            @else
                                <div class="p-4 rounded-xl bg-[#FAF6EE] border border-[#D4AF37]/30 text-center text-xs text-[#5C4033] italic font-museum-body" data-comments-empty>
                                    Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                                </div>
                            @endif
                        </div>

                        <template data-comment-template>
                            <div class="p-3.5 rounded-xl bg-[#FAF6EE] border border-[#D4AF37]/40 space-y-1 shadow-2xs transform transition duration-500 ease-out">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-bold text-[#8B1E22] font-museum-title" data-comment-name></span>
                                    <span class="text-[10px] text-[#5C4033] font-museum-body" data-comment-time>Baru saja</span>
                                </div>
                                <p class="text-xs text-[#382318] leading-relaxed italic font-museum-body" data-comment-message></p>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Bookshelf Divider Below RSVP -->
                <div class="w-full max-w-sm sm:max-w-md mx-auto pt-4 pointer-events-none reveal-item anim-museum-frame delay-3">
                    <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
            @else
            <div class="theme-arch-frame bg-white p-6 sm:p-10 md:p-12 shadow-lg w-full mx-auto relative space-y-6 reveal-item anim-border">
                
                @if($currentThemeId == 1)
                <!-- Corner Botanical Sprigs for Theme 1 RSVP -->
                <div class="w-28 sm:w-36 mx-auto -mt-2 mb-2 pointer-events-none reveal-item anim-botanical-sway">
                    <img src="/images/themes/bg/maroon-floral-corner-refined.png" alt="" class="w-full h-auto object-contain drop-shadow-xs">
                </div>
                @endif

                <div>
                    <p class="theme-heading text-xs sm:text-sm tracking-[0.25em] uppercase text-[var(--text-muted)] font-semibold reveal-item anim-title delay-1">
                        Reservasi
                    </p>
                    <h2 class="theme-heading text-2xl sm:text-4xl font-bold text-[var(--text-main)] mt-1 mb-2 reveal-item anim-title delay-1">
                        Konfirmasi Kehadiran (RSVP)
                    </h2>
                    <p class="text-xs sm:text-sm text-[var(--text-muted)] max-w-lg mx-auto leading-relaxed reveal-item anim-fade-up delay-2">
                        Bantu kami mempersiapkan jamuan terbaik dengan mengisi konfirmasi kehadiran Anda di bawah ini:
                    </p>
                </div>

                <form action="{{ route('rsvp.store', $invitation->id ?? 1) }}" method="POST" class="space-y-4 text-left max-w-2xl mx-auto" data-rsvp-form>
                    @csrf
                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-[var(--text-main)] mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ ($guestName === 'Tamu Undangan') ? '' : $guestName }}" placeholder="Nama Lengkap Anda" required class="w-full px-4 py-2.5 rounded-xl border border-[var(--border-frame)]/40 bg-[var(--bg-canvas)] text-xs sm:text-sm text-[var(--text-main)] focus:outline-none focus:ring-2 focus:ring-[var(--border-frame)]">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs sm:text-sm font-semibold text-[var(--text-main)] mb-1">Konfirmasi Kehadiran</label>
                            <select name="attendance" class="w-full px-4 py-2.5 rounded-xl border border-[var(--border-frame)]/40 bg-[var(--bg-canvas)] text-xs sm:text-sm text-[var(--text-main)] focus:outline-none focus:ring-2 focus:ring-[var(--border-frame)]">
                                <option value="hadir">Ya, Saya Akan Hadir</option>
                                <option value="tidak_hadir">Maaf, Tidak Bisa Hadir</option>
                                <option value="ragu">Masih Ragu-ragu</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs sm:text-sm font-semibold text-[var(--text-main)] mb-1">Jumlah Tamu</label>
                            <select name="guest_count" class="w-full px-4 py-2.5 rounded-xl border border-[var(--border-frame)]/40 bg-[var(--bg-canvas)] text-xs sm:text-sm text-[var(--text-main)] focus:outline-none focus:ring-2 focus:ring-[var(--border-frame)]">
                                <option value="1">1 Orang</option>
                                <option value="2">2 Orang</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-[var(--text-main)] mb-1">Pesan / Doa Restu</label>
                        <textarea name="message" rows="3" placeholder="Tuliskan ucapan dan doa Anda..." class="w-full px-4 py-2.5 rounded-xl border border-[var(--border-frame)]/40 bg-[var(--bg-canvas)] text-xs sm:text-sm text-[var(--text-main)] focus:outline-none focus:ring-2 focus:ring-[var(--border-frame)]"></textarea>
                    </div>
                    <button type="submit" class="w-full py-3 px-6 rounded-xl bg-[var(--bg-accent-block)] text-white text-xs sm:text-sm font-semibold shadow-md hover:opacity-90 transition cursor-pointer">
                        Kirim Konfirmasi &amp; Ucapan
                    </button>
                </form>

                <!-- Daftar Ucapan Masuk (General Themes Preset) -->
                <div class="mt-8 pt-6 border-t border-[var(--border-frame)]/30 space-y-4 max-w-2xl mx-auto text-left" data-comments-feed>
                    <div class="flex items-center justify-between">
                        <h4 class="theme-heading text-sm sm:text-base font-bold uppercase tracking-wider text-[var(--text-main)] flex items-center gap-2">
                            <span>Buku Doa Restu Tamu</span>
                        </h4>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-[var(--bg-accent-block)]/15 text-[var(--bg-accent-block)]" data-comments-count>
                            {{ isset($invitation->comments) ? $invitation->comments->count() : 0 }} Pesan
                        </span>
                    </div>

                    <div class="space-y-3 max-h-80 overflow-y-auto pr-1" data-comments-list>
                        @if(isset($invitation->comments) && $invitation->comments->isNotEmpty())
                            @foreach($invitation->comments as $c)
                            <div class="p-3.5 sm:p-4 rounded-xl bg-[var(--bg-canvas)]/70 border border-[var(--border-frame)]/35 space-y-1.5 shadow-2xs">
                                <div class="flex items-center justify-between text-xs">
                                    <span class="font-bold text-[var(--text-main)]">{{ $c->name }}</span>
                                    <span class="text-[10px] text-[var(--text-muted)]">{{ $c->created_at ? $c->created_at->diffForHumans() : 'Baru saja' }}</span>
                                </div>
                                <p class="text-xs text-[var(--text-main)]/90 leading-relaxed italic">
                                    "{{ $c->message }}"
                                </p>
                            </div>
                            @endforeach
                        @else
                            <div class="p-4 rounded-xl bg-[var(--bg-canvas)]/60 border border-[var(--border-frame)]/25 text-center text-xs text-[var(--text-muted)] italic" data-comments-empty>
                                Belum ada ucapan. Jadilah yang pertama memberikan doa restu!
                            </div>
                        @endif
                    </div>

                    <template data-comment-template>
                        <div class="p-3.5 sm:p-4 rounded-xl bg-[var(--bg-canvas)]/70 border border-[var(--border-frame)]/35 space-y-1.5 shadow-2xs transform transition duration-500 ease-out">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-[var(--text-main)]" data-comment-name></span>
                                <span class="text-[10px] text-[var(--text-muted)]" data-comment-time>Baru saja</span>
                            </div>
                            <p class="text-xs text-[var(--text-main)]/90 leading-relaxed italic" data-comment-message></p>
                        </div>
                    </template>
                </div>
            </div>
            @endif
        </section>

        <!-- ================= SECTION PENUTUP ================= -->
        @if($currentThemeId == 1)
        <!-- THEME 1 BESPOKE CLOSING & KELUARGA BESAR (BASIC HARMONY MAROON) -->
        <section id="section-penutup" class="py-14 sm:py-20 px-4 sm:px-6 md:px-10 text-center space-y-8 relative overflow-hidden">
            <div class="max-w-xl mx-auto space-y-5 pt-4 relative z-10 reveal-item anim-card-rise">
                <div class="w-48 sm:w-56 mx-auto mb-2 pointer-events-none reveal-item anim-botanical-sway">
                    <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>

                <h3 class="font-serif text-3xl sm:text-4xl text-[#7A1C2E] font-normal tracking-wide reveal-item anim-title delay-1">
                    Terima Kasih
                </h3>

                <p class="font-serif text-xs sm:text-sm text-[#3D2328]/85 leading-relaxed font-light max-w-md mx-auto reveal-item anim-fade-up delay-2">
                    {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.' }}
                </p>

                <div class="pt-2 space-y-2 reveal-item anim-fade-up delay-3">
                    <p class="text-[11px] sm:text-xs uppercase tracking-widest text-[#7A1C2E] font-semibold">
                        KAMI YANG BERBAHAGIA
                    </p>
                    <p class="font-script text-4xl sm:text-5xl text-[#7A1C2E] py-1 reveal-item anim-title delay-3">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </p>
                    <p class="text-[10px] sm:text-xs uppercase tracking-widest text-[#3D2328]/70">
                        {{ $invitation->closing_signature ?? 'Beserta Seluruh Keluarga Besar' }}
                    </p>
                </div>
            </div>
        </section>
        @elseif($currentThemeId == 19 || $isLavenderMist)
        <!-- ================= THEME 19 BESPOKE CLOSING & TERIMA KASIH (PREMIUM SERENADE LAVENDER MIST) ================= -->
        <section id="section-penutup" class="py-14 sm:py-20 px-4 sm:px-6 md:px-10 text-center space-y-8 relative overflow-hidden bg-[#8B7CB0] text-white">
            <!-- White Arched Card -->
            <div class="max-w-xl mx-auto rounded-t-[44px] sm:rounded-t-[56px] rounded-b-3xl bg-white theme-lavender-pattern text-[#2D1E40] p-6 sm:p-10 shadow-2xl relative space-y-6 text-center reveal-item anim-lavender-card-3d">
                <!-- Floral Garland Top Crown -->
                <div class="w-56 sm:w-72 mx-auto pointer-events-none -mt-2 mb-2 reveal-item anim-lavender-flower-unfold">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <h3 class="font-lavender-script text-4xl sm:text-5xl text-[#2D1E40] font-normal tracking-wide reveal-item anim-lavender-title delay-1">
                    Terima Kasih
                </h3>

                <p class="font-lavender-body text-xs sm:text-sm text-[#4A3B60] leading-relaxed font-normal max-w-md mx-auto reveal-item anim-fade-up delay-2">
                    {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.' }}
                </p>

                <div class="pt-2 space-y-2 reveal-item anim-fade-up delay-3">
                    <p class="text-[11px] sm:text-xs uppercase tracking-widest text-[#8B7CB0] font-bold font-lavender-title">
                        Hormat Kami Yang Berbahagia,
                    </p>
                    <p class="font-lavender-script text-4xl sm:text-5xl text-[#2D1E40] font-medium py-1 reveal-item anim-lavender-title delay-3">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </p>
                    <p class="text-[10px] sm:text-xs uppercase tracking-widest text-[#6E5D87] font-lavender-body">
                        {{ $invitation->closing_signature ?? 'Beserta Seluruh Keluarga Besar' }}
                    </p>
                </div>

                <!-- Bottom Floral Garland -->
                <div class="w-48 sm:w-64 mx-auto pt-3 pointer-events-none reveal-item anim-lavender-flower-unfold delay-3">
                    <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
        </section>
        @elseif($currentThemeId == 20 || $isDarkElegance)
        <!-- THEME 20 BESPOKE CLOSING & TERIMA KASIH (PREMIUM SERENADE DARK ELEGANCE) -->
        <section id="section-penutup" class="py-14 sm:py-20 px-4 sm:px-6 md:px-10 text-center space-y-8 relative overflow-hidden bg-[#070807]">
            <!-- Subtle Radial Glow -->
            <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at center, rgba(158, 176, 146, 0.12) 0%, rgba(7, 8, 7, 0.95) 75%, #070807 100%);"></div>

            <!-- Penutup & Terima Kasih -->
            <div class="max-w-xl mx-auto space-y-5 pt-4 relative z-10 reveal-item anim-card-rise">
                <div class="w-48 sm:w-64 mx-auto pointer-events-none reveal-item anim-floral-bloom">
                    <img src="/images/themes/serenade-dark/floral-divider.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
                </div>

                <h3 class="font-serif text-3xl sm:text-4xl text-[#FAF7F2] font-normal tracking-wide reveal-item anim-title delay-1">
                    Terima Kasih
                </h3>

                <p class="font-serif text-xs sm:text-sm text-[#D5DDD0]/85 leading-relaxed font-light max-w-md mx-auto reveal-item anim-fade-up delay-2">
                    {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.' }}
                </p>

                <div class="pt-2 space-y-2 reveal-item anim-fade-up delay-3">
                    <p class="text-[11px] sm:text-xs uppercase tracking-widest text-[#9EB092] font-semibold">
                        KAMI YANG BERBAHAGIA
                    </p>
                    <p class="font-script text-4xl sm:text-5xl text-[#FAF7F2] py-1 reveal-item anim-title delay-3">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </p>
                    <p class="text-[10px] sm:text-xs uppercase tracking-widest text-[#D5DDD0]/70">
                        {{ $invitation->closing_signature ?? 'Beserta Seluruh Keluarga Besar' }}
                    </p>
                </div>

                <!-- Bottom Floral Divider -->
                <div class="w-40 sm:w-56 mx-auto pt-3 pointer-events-none reveal-item anim-floral-bloom">
                    <img src="/images/themes/serenade-dark/floral-divider.png" alt="" class="w-full h-auto object-contain">
                </div>
            </div>
        </section>
        @elseif($currentThemeId == 15 || $isMidnightAmber)
        <!-- ================= THEME 15 BESPOKE CLOSING & TERIMA KASIH (PREMIUM SERENADE MIDNIGHT AMBER) ================= -->
        <section id="section-penutup" class="py-14 sm:py-20 px-4 sm:px-6 md:px-10 text-center space-y-8 relative overflow-hidden bg-[#161514] text-white">
            <!-- Arched Card Container -->
            <div class="max-w-xl mx-auto rounded-2xl sm:rounded-3xl bg-[#1C1A18] border border-[#DDA74F]/40 shadow-[0_16px_50px_rgba(0,0,0,0.8)] p-6 sm:p-10 relative space-y-6 text-center reveal-item anim-amber-card-3d">
                <!-- Floral Crest Top Crown -->
                <div class="w-48 sm:w-60 mx-auto pointer-events-none -mt-2 mb-2 reveal-item anim-amber-bloom">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>

                <h3 class="font-amber-script text-4xl sm:text-5xl text-[#FAF5EC] font-normal tracking-wide reveal-item anim-amber-title delay-1">
                    Terima Kasih
                </h3>

                <p class="font-amber-body text-xs sm:text-sm text-[#C4B5A5] leading-relaxed font-normal max-w-md mx-auto reveal-item anim-fade-up delay-2">
                    {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.' }}
                </p>

                <div class="pt-2 space-y-2 reveal-item anim-fade-up delay-3">
                    <p class="text-[11px] sm:text-xs uppercase tracking-widest text-[#DDA74F] font-bold font-amber-title">
                        Hormat Kami Yang Berbahagia,
                    </p>
                    <p class="font-amber-script text-4xl sm:text-5xl text-[#FAF5EC] font-medium py-1 reveal-item anim-amber-title delay-3">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </p>
                    <p class="text-[10px] sm:text-xs uppercase tracking-widest text-[#C4B5A5] font-amber-body">
                        {{ $invitation->closing_signature ?? 'Beserta Seluruh Keluarga Besar' }}
                    </p>
                </div>

                <!-- Bottom Floral Crest -->
                <div class="w-40 sm:w-56 mx-auto pt-3 pointer-events-none reveal-item anim-amber-bloom delay-3">
                    <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>

            <!-- Golden Wavy Ribbon Divider Across Bottom -->
            <div class="w-full pt-4 pointer-events-none reveal-item anim-amber-bloom delay-3">
                <img src="{{ asset('images/themes/serenade-amber/golden-ribbon.svg') }}" alt="" class="w-full h-8 sm:h-10 object-cover">
            </div>
        </section>
        @elseif($currentThemeId == 13 || $isSummerVibes)
        <!-- ================= THEME 13 BESPOKE CLOSING & PROTOKOL (PREMIUM SUMMER VIBES) ================= -->
        <section id="section-penutup" class="py-12 sm:py-16 px-4 sm:px-6 md:px-10 text-center space-y-8 relative overflow-hidden bg-[#FAF8F5] text-[#1E293B]">
            <!-- Card Container -->
            <div class="max-w-xl mx-auto rounded-3xl bg-white border-2 border-[#1D63B8]/30 shadow-[0_16px_50px_rgba(29,99,184,0.12)] p-6 sm:p-10 relative space-y-6 text-center reveal-item anim-summer-stamp">
                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-serif tracking-[0.35em] uppercase text-[#1D63B8] font-bold block">
                        OUR SINCERE GRATITUDE
                    </span>
                    <h3 class="text-3xl sm:text-4xl text-[#D94B26] leading-tight"
                        style="font-family: 'Shrikhand', 'Titan One', cursive;">
                        Terima Kasih
                    </h3>
                    <div class="w-24 sm:w-28 mx-auto pointer-events-none my-1">
                        <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
                    </div>
                </div>

                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-light max-w-md mx-auto reveal-item anim-fade-up delay-1">
                    {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.' }}
                </p>

                <div class="pt-2 space-y-2 reveal-item anim-fade-up delay-2">
                    <p class="text-[11px] sm:text-xs uppercase tracking-widest text-[#1D63B8] font-bold font-serif">
                        Kami yang berbahagia,
                    </p>
                    <p class="text-3xl sm:text-4xl text-[#D94B26] py-1"
                       style="font-family: 'Shrikhand', 'Titan One', cursive;">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </p>
                    <p class="text-xs text-slate-500 font-medium">
                        beserta segenap keluarga besar
                    </p>
                </div>

                <!-- Instagram Filter CTA Button if available -->
                @if(!empty($invitation->instagram_filter_url))
                <div class="pt-4 reveal-item anim-fade-up delay-3">
                    <a href="{{ $invitation->instagram_filter_url }}" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-full bg-gradient-to-r from-[#D94B26] to-[#E85D36] hover:from-[#c23d1b] hover:to-[#d44d27] text-white text-xs font-bold tracking-wider uppercase shadow-md transition-all hover:scale-105 active:scale-95">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        <span>Coba Filter Instagram</span>
                    </a>
                </div>
                @endif
            </div>

            <!-- Bottom Blue Floral Divider Across Bottom -->
            <div class="w-32 sm:w-44 mx-auto pt-2 pointer-events-none">
                <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
            </div>
        </section>
        @elseif($currentThemeId == 16 || $isMuseumOfLove)
        <!-- ================= THEME 16 BESPOKE CLOSING & PROTOKOL (PREMIUM MUSEUM OF LOVE) ================= -->
        <section id="section-penutup" class="py-14 sm:py-20 px-4 sm:px-6 md:px-10 text-center space-y-8 relative overflow-hidden theme-museum-canvas text-[#2A1F1D]">
            <!-- Arched Card Container -->
            <div class="max-w-xl mx-auto rounded-2xl sm:rounded-3xl bg-[#FFFDF9] border-2 border-[#D4AF37]/50 shadow-[0_16px_50px_rgba(56,35,24,0.18)] p-6 sm:p-10 relative space-y-6 text-center reveal-item anim-museum-card">
                <!-- Overhead Spotlight -->
                <div class="museum-spotlight absolute top-0 left-1/2 -translate-x-1/2 w-48 sm:w-64 h-32 pointer-events-none"></div>

                <div class="space-y-2 reveal-item anim-fade-up">
                    <span class="text-[11px] sm:text-xs font-museum-sub tracking-[0.35em] uppercase text-[#8B1E22] font-bold block">
                        OUR SINCERE GRATITUDE
                    </span>
                    <h3 class="font-museum-script text-4xl sm:text-5xl text-[#8B1E22] font-bold tracking-wide">
                        Terima Kasih
                    </h3>
                    <div class="w-16 h-0.5 bg-[#8B1E22] mx-auto my-2"></div>
                </div>

                <p class="font-museum-body text-xs sm:text-sm text-[#5C4033] leading-relaxed font-light max-w-md mx-auto reveal-item anim-fade-up delay-1">
                    {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.' }}
                </p>

                <div class="pt-2 space-y-2 reveal-item anim-fade-up delay-2">
                    <p class="text-[11px] sm:text-xs uppercase tracking-widest text-[#8B1E22] font-bold font-museum-sub">
                        Hormat Kami Yang Berbahagia,
                    </p>
                    <p class="font-museum-script text-4xl sm:text-5xl text-[#8B1E22] font-bold py-1">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </p>
                    <p class="text-[10px] sm:text-xs uppercase tracking-widest text-[#5C4033] font-museum-body">
                        {{ $invitation->closing_signature ?? 'Beserta Seluruh Keluarga Besar' }}
                    </p>
                </div>



                <!-- Bookshelf Divider at Bottom of Card -->
                <div class="w-full max-w-sm sm:max-w-md mx-auto pt-4 pointer-events-none reveal-item anim-museum-frame delay-3">
                    <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
                </div>
            </div>
        </section>
        @else
        <!-- DEFAULT CLOSING SECTION -->
        <section id="section-penutup" class="py-14 sm:py-20 px-4 sm:px-6 md:px-10 text-center space-y-8 relative overflow-hidden">
            <div class="theme-arch-frame bg-white p-6 sm:p-10 md:p-12 shadow-lg w-full mx-auto relative space-y-6 reveal-item anim-border">
                <h3 class="theme-script text-4xl sm:text-5xl text-[var(--text-accent)] reveal-item anim-title delay-1">
                    Terima Kasih
                </h3>

                <p class="text-xs sm:text-sm text-[var(--text-muted)] leading-relaxed max-w-md mx-auto reveal-item anim-fade-up delay-2">
                    {{ $invitation->closing_message ?? 'Merupakan suatu kehormatan dan kebahagiaan bagi kami sekeluarga apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu kepada kedua mempelai.' }}
                </p>

                <div class="pt-2 space-y-2 reveal-item anim-fade-up delay-3">
                    <p class="text-[11px] sm:text-xs uppercase tracking-widest text-[var(--text-muted)] font-semibold">
                        KAMI YANG BERBAHAGIA
                    </p>
                    <p class="theme-script text-4xl sm:text-5xl text-[var(--text-accent)] py-1 reveal-item anim-title delay-3">
                        {{ $groomNickname }} &amp; {{ $brideNickname }}
                    </p>
                    <p class="text-[10px] sm:text-xs uppercase tracking-widest text-[var(--text-muted)]/70">
                        {{ $invitation->closing_signature ?? 'Beserta Seluruh Keluarga Besar' }}
                    </p>
                </div>
            </div>
        </section>
        @endif

        <!-- Footer Signature Section -->
        <footer class="py-10 px-6 text-center text-xs text-[var(--text-muted)] border-t border-[var(--border-frame)]/20 mt-6 space-y-2">
            @if($currentThemeId == 1)
            <div class="w-48 sm:w-56 mx-auto mb-3 pointer-events-none reveal-item anim-fade-up">
                <img src="/images/themes/bg/maroon-floral-branch-transparent.png" alt="Ornamen Bunga" class="w-full h-auto object-contain">
            </div>
            @elseif($currentThemeId == 19 || $isLavenderMist)
            <div class="w-56 sm:w-72 mx-auto mb-3 pointer-events-none reveal-item anim-lavender-flower-unfold">
                <img src="{{ asset('images/themes/serenade-lavender/floral-garland.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
            </div>
            @elseif($currentThemeId == 2)
            <div class="w-36 sm:w-48 h-6 mx-auto mb-3 pointer-events-none reveal-item anim-fade-up">
                <img src="/images/themes/bg/emerald-interlocking-rings.svg" alt="" class="w-full h-full opacity-85">
            </div>
            @elseif($currentThemeId == 3)
            <div class="w-36 sm:w-48 h-6 mx-auto mb-3 pointer-events-none reveal-item anim-fade-up">
                <img src="/images/themes/bg/navy-crest-feather.svg" alt="" class="w-full h-full opacity-70">
            </div>
            @elseif($currentThemeId == 20 || $isDarkElegance)
            <div class="w-48 sm:w-64 mx-auto mb-3 pointer-events-none reveal-item anim-floral-bloom">
                <img src="/images/themes/serenade-dark/floral-divider.png" alt="" class="w-full h-auto object-contain">
            </div>
            @elseif($currentThemeId == 15 || $isMidnightAmber)
            <div class="w-48 sm:w-64 mx-auto mb-3 pointer-events-none reveal-item anim-amber-bloom">
                <img src="{{ asset('images/themes/serenade-amber/floral-crest.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
            </div>
            @elseif($currentThemeId == 13 || $isSummerVibes)
            <div class="w-32 sm:w-44 mx-auto mb-3 pointer-events-none reveal-item anim-summer-stamp">
                <img src="{{ asset('images/themes/summer-vibes/blue-floral-divider.png') }}" alt="" class="w-full h-auto object-contain">
            </div>
            <p class="text-3xl sm:text-4xl text-[#D94B26] reveal-item anim-fade-up delay-1" style="font-family: 'Shrikhand', 'Titan One', cursive;">{{ $groomNickname }} &amp; {{ $brideNickname }}</p>
            <p class="font-serif text-[10px] sm:text-xs uppercase tracking-widest text-[#1D63B8] font-bold reveal-item anim-fade-up delay-2">Terima kasih atas doa &amp; restu Anda</p>
            @elseif($currentThemeId == 16 || $isMuseumOfLove)
            <div class="w-48 sm:w-64 mx-auto mb-3 pointer-events-none reveal-item anim-museum-frame">
                <img src="{{ asset('images/themes/museum-love/bookshelf-divider.png') }}" alt="" class="w-full h-auto object-contain drop-shadow-md">
            </div>
            <p class="font-museum-script text-3xl sm:text-4xl text-[#8B1E22] reveal-item anim-fade-up delay-1">{{ $groomNickname }} &amp; {{ $brideNickname }}</p>
            <p class="font-museum-sub text-[10px] sm:text-xs uppercase tracking-widest text-[#5C4033] reveal-item anim-fade-up delay-2">Terima kasih atas doa &amp; restu Anda</p>
            @endif
            @if($currentThemeId != 1 && $currentThemeId != 20 && !$isDarkElegance && $currentThemeId != 19 && !$isLavenderMist && $currentThemeId != 15 && !$isMidnightAmber && $currentThemeId != 16 && !$isMuseumOfLove && $currentThemeId != 13 && !$isSummerVibes)
            <p class="theme-script text-3xl sm:text-4xl text-[var(--text-accent)] reveal-item anim-fade-up delay-1">{{ $groomNickname }} &amp; {{ $brideNickname }}</p>
            <p class="text-[10px] sm:text-xs uppercase tracking-widest opacity-80 reveal-item anim-fade-up delay-2">Terima kasih atas doa &amp; restu Anda</p>
            @endif
            <p class="text-[9px] sm:text-[10px] font-mono opacity-60 reveal-item anim-fade-up delay-3">SimpulTemu Digital Wedding Platform</p>
        </footer>
    </main>


    <!-- ================= 10. KOMPONEN MELAYANG (FLOATING UI) ================= -->

    <audio id="bg-music" class="bgMusic" loop preload="auto">
        <source src="{{ $musicUrl }}" type="audio/mpeg">
    </audio>

    <!-- Bottom-Left Floating Controller: Auto-Scroll Toggle -->
    <div id="floating-autoscroll-container" class="fixed bottom-4 left-4 z-50 flex items-center pointer-events-auto" style="bottom: 76px; left: 16px;">
        <button id="autoScrollToggleBtn" type="button" onclick="toggleAutoScrollPlayback()" class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-stone-900/95 backdrop-blur-md border border-white/20 text-stone-300 shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all cursor-pointer group" title="Matikan / Nyalakan Auto-Scroll">
            <!-- Icon when running: Pause bars (Click to pause) -->
            <svg id="autoScrollIconPlaying" class="w-4 h-4 text-emerald-400 hidden" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
            </svg>
            <!-- Icon when stopped: Double chevron down (Click to start auto-scroll) -->
            <svg id="autoScrollIconPaused" class="w-4 h-4 text-stone-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 13l-7 7-7-7m14-8l-7 7-7-7"/>
            </svg>
        </button>
    </div>

    <!-- Bottom Floating Controllers: Audio & Fullscreen -->
    <div id="floating-music-container" class="fixed bottom-4 right-4 z-50 flex items-center gap-2 pointer-events-auto" style="bottom: 76px;">
        <button id="musicToggleBtn" type="button" onclick="toggleAudioPlayback()" class="w-10 h-10 sm:w-11 sm:h-11 rounded-full bg-stone-900/95 backdrop-blur-md border-2 border-amber-400 ring-2 ring-black/40 shadow-2xl flex items-center justify-center p-0.5 hover:scale-110 active:scale-95 transition-transform group cursor-pointer relative" title="Putar / Jeda Musik">
            <svg id="vinylDiscSvg" class="w-full h-full text-stone-800" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="48" fill="#1c1917" stroke="#ca8a04" stroke-width="2"/>
                <circle cx="50" cy="50" r="40" fill="none" stroke="#292524" stroke-width="2" stroke-dasharray="2, 2"/>
                <circle cx="50" cy="50" r="32" fill="none" stroke="#292524" stroke-width="1.5" stroke-dasharray="1, 1"/>
                <circle cx="50" cy="50" r="24" fill="none" stroke="#292524" stroke-width="1.5"/>
                <circle cx="50" cy="50" r="15" fill="#ca8a04"/>
                <circle cx="50" cy="50" r="4" fill="#000000"/>
            </svg>
            <div class="absolute inset-0 flex items-center justify-center text-amber-300">
                <svg id="vinylIconPause" class="w-2.5 h-2.5 hidden" fill="currentColor" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
                <svg id="vinylIconPlay" class="w-2.5 h-2.5" fill="currentColor" viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg>
            </div>
        </button>
    </div>

    <!-- Floating Bottom Navigation Bar -->
    <div id="floating-nav-container" class="fixed bottom-3 left-1/2 -translate-x-1/2 z-40 w-auto max-w-[94vw] sm:max-w-md pointer-events-auto">
        <nav id="floating-bottom-nav" class="flex items-center justify-around gap-1 sm:gap-2 px-3 py-1.5 rounded-full bg-stone-900/90 backdrop-blur-md border border-white/10 shadow-2xl text-stone-300">
            <a href="#section-hero" onclick="smoothScrollTo(event, 'section-hero')" class="nav-item flex flex-col items-center justify-center text-[9px] text-stone-300 hover:text-white px-1.5 py-1 rounded-xl cursor-pointer transition">
                <svg class="w-4 h-4 text-stone-400 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Cover</span>
            </a>
            <a href="#section-mempelai" onclick="smoothScrollTo(event, 'section-mempelai')" class="nav-item flex flex-col items-center justify-center text-[9px] text-stone-300 hover:text-white px-1.5 py-1 rounded-xl cursor-pointer transition">
                <svg class="w-4 h-4 text-stone-400 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                <span>Mempelai</span>
            </a>
            <a href="#section-acara" onclick="smoothScrollTo(event, 'section-acara')" class="nav-item flex flex-col items-center justify-center text-[9px] text-stone-300 hover:text-white px-1.5 py-1 rounded-xl cursor-pointer transition">
                <svg class="w-4 h-4 text-stone-400 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Acara</span>
            </a>
            <a href="#section-kutipan" onclick="smoothScrollTo(event, 'section-kutipan')" class="nav-item flex flex-col items-center justify-center text-[9px] text-stone-300 hover:text-white px-1.5 py-1 rounded-xl cursor-pointer transition">
                <svg class="w-4 h-4 text-stone-400 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                <span>Ayat</span>
            </a>
            <a href="#section-galeri" onclick="smoothScrollTo(event, 'section-galeri')" class="nav-item flex flex-col items-center justify-center text-[9px] text-stone-300 hover:text-white px-1.5 py-1 rounded-xl cursor-pointer transition">
                <svg class="w-4 h-4 text-stone-400 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Galeri</span>
            </a>
            @if($invitation->show_love_story ?? true)
            <a href="#section-cerita" onclick="smoothScrollTo(event, 'section-cerita')" class="nav-item flex flex-col items-center justify-center text-[9px] text-stone-300 hover:text-white px-1.5 py-1 rounded-xl cursor-pointer transition">
                <svg class="w-4 h-4 text-stone-400 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Cerita</span>
            </a>
            @endif
            <a href="#section-hadiah" onclick="smoothScrollTo(event, 'section-hadiah')" class="nav-item flex flex-col items-center justify-center text-[9px] text-stone-300 hover:text-white px-1.5 py-1 rounded-xl cursor-pointer transition">
                <svg class="w-4 h-4 text-stone-400 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                <span>Hadiah</span>
            </a>
        </nav>
    </div>

    <!-- Floating Toast Notification -->
    <div id="invitation-toast" class="fixed bottom-20 sm:bottom-24 left-1/2 -translate-x-1/2 z-[1000] px-4 py-2.5 rounded-2xl bg-stone-900/95 text-white text-xs font-semibold shadow-2xl border border-emerald-500/50 opacity-0 pointer-events-none transition-all duration-300 transform translate-y-3 flex items-center gap-2">
        <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        <span id="invitation-toast-message">Teks berhasil disalin!</span>
    </div>

    <!-- Lightbox Pop-up Modal -->
    <div id="lightbox-modal" class="fixed inset-0 z-[1000] bg-black/90 backdrop-blur-md hidden items-center justify-center p-4 transition-all duration-300">
        <button type="button" onclick="closeLightbox()" class="absolute top-5 right-5 w-10 h-10 rounded-full bg-white/10 text-white hover:bg-white/20 flex items-center justify-center transition cursor-pointer">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="max-w-4xl w-full max-h-[85vh] flex items-center justify-center">
            <img id="lightbox-img" src="" alt="Pratinjau Galeri" class="max-w-full max-h-[80vh] object-contain rounded-2xl shadow-2xl">
        </div>
    </div>


    <!-- ================= JAVASCRIPT ENGINE ================= -->
    <script>
        const THEME_PRESETS = @json($allThemes);

        let isAudioPlaying = false;
        const bgAudio = document.getElementById('bg-music');
        const vinylSvg = document.getElementById('vinylDiscSvg');
        const vinylIconPlay = document.getElementById('vinylIconPlay');
        const vinylIconPause = document.getElementById('vinylIconPause');

        function updateAudioIcons() {
            if (!vinylSvg || !vinylIconPlay || !vinylIconPause) return;
            if (isAudioPlaying) {
                vinylSvg.classList.add('animate-spin');
                vinylSvg.style.animationDuration = '4s';
                vinylIconPlay.classList.add('hidden');
                vinylIconPause.classList.remove('hidden');
            } else {
                vinylSvg.classList.remove('animate-spin');
                vinylIconPlay.classList.remove('hidden');
                vinylIconPause.classList.add('hidden');
            }
        }

        window.toggleAudioPlayback = function() {
            if (!bgAudio) return;
            if (isAudioPlaying) {
                bgAudio.pause();
                isAudioPlaying = false;
            } else {
                bgAudio.play().then(() => {
                    isAudioPlaying = true;
                }).catch(err => {
                    console.log('Audio autoplay prevented:', err);
                    isAudioPlaying = false;
                });
            }
            updateAudioIcons();
        };

        // --- Auto-Scroll Controller Engine ---
        let isAutoScrolling = false;
        let autoScrollAnimationId = null;
        let autoScrollSpeed = 0.85; // smooth reading speed (pixels per frame)

        window.toggleAutoScrollPlayback = function() {
            if (isAutoScrolling) {
                stopAutoScroll();
                showToast("Auto-Scroll Dihentikan");
            } else {
                startAutoScroll();
                showToast("Auto-Scroll Dimulai");
            }
        };

        function startAutoScroll() {
            if (isAutoScrolling) return;
            isAutoScrolling = true;
            updateAutoScrollButtonUI(true);

            function step() {
                if (!isAutoScrolling) return;
                const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
                if (window.scrollY >= maxScroll - 2) {
                    stopAutoScroll();
                    return;
                }
                window.scrollBy(0, autoScrollSpeed);
                autoScrollAnimationId = requestAnimationFrame(step);
            }
            autoScrollAnimationId = requestAnimationFrame(step);
        }

        function stopAutoScroll() {
            isAutoScrolling = false;
            if (autoScrollAnimationId) {
                cancelAnimationFrame(autoScrollAnimationId);
                autoScrollAnimationId = null;
            }
            updateAutoScrollButtonUI(false);
        }

        function updateAutoScrollButtonUI(running) {
            const iconPlaying = document.getElementById('autoScrollIconPlaying');
            const iconPaused = document.getElementById('autoScrollIconPaused');
            const btn = document.getElementById('autoScrollToggleBtn');
            if (!btn) return;

            if (running) {
                if (iconPlaying) iconPlaying.classList.remove('hidden');
                if (iconPaused) iconPaused.classList.add('hidden');
                btn.classList.add('ring-2', 'ring-emerald-400');
            } else {
                if (iconPlaying) iconPlaying.classList.add('hidden');
                if (iconPaused) iconPaused.classList.remove('hidden');
                btn.classList.remove('ring-2', 'ring-emerald-400');
            }
        }

        ['wheel', 'touchstart'].forEach(evt => {
            window.addEventListener(evt, () => {
                if (isAutoScrolling) {
                    stopAutoScroll();
                }
            }, { passive: true });
        });

        function startCountdown() {
            const targetDate = new Date("{{ $eventDate->toIso8601String() }}").getTime();

            function update() {
                const now = new Date().getTime();
                const difference = targetDate - now;

                if (difference <= 0) {
                    const zeros = "00";
                    ['countdown-days', 'countdown-hours', 'countdown-minutes', 'countdown-seconds', 'hero-cd-days', 'hero-cd-hours', 'hero-cd-mins', 'hero-cd-secs', 'hero-cd-days-t20', 'hero-cd-hours-t20', 'hero-cd-mins-t20', 'hero-cd-secs-t20'].forEach(id => {
                        const el = document.getElementById(id);
                        if (el) el.innerText = zeros;
                    });
                    document.querySelectorAll('.cd-val-days, .cd-val-hours, .cd-val-mins, .cd-val-secs').forEach(el => el.innerText = zeros);
                    return;
                }

                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                const elDays = document.getElementById('countdown-days');
                const elHours = document.getElementById('countdown-hours');
                const elMinutes = document.getElementById('countdown-minutes');
                const elSeconds = document.getElementById('countdown-seconds');

                const valDays = days < 10 ? '0' + days : days;
                const valHours = hours < 10 ? '0' + hours : hours;
                const valMins = minutes < 10 ? '0' + minutes : minutes;
                const valSecs = seconds < 10 ? '0' + seconds : seconds;

                if (elDays) elDays.innerText = valDays;
                if (elHours) elHours.innerText = valHours;
                if (elMinutes) elMinutes.innerText = valMins;
                if (elSeconds) elSeconds.innerText = valSecs;

                const hDays = document.getElementById('hero-cd-days');
                const hHours = document.getElementById('hero-cd-hours');
                const hMins = document.getElementById('hero-cd-mins');
                const hSecs = document.getElementById('hero-cd-secs');

                if (hDays) hDays.innerText = valDays;
                if (hHours) hHours.innerText = valHours;
                if (hMins) hMins.innerText = valMins;
                if (hSecs) hSecs.innerText = valSecs;

                const t20Days = document.getElementById('hero-cd-days-t20');
                const t20Hours = document.getElementById('hero-cd-hours-t20');
                const t20Mins = document.getElementById('hero-cd-mins-t20');
                const t20Secs = document.getElementById('hero-cd-secs-t20');
                if (t20Days) t20Days.innerText = valDays;
                if (t20Hours) t20Hours.innerText = valHours;
                if (t20Mins) t20Mins.innerText = valMins;
                if (t20Secs) t20Secs.innerText = valSecs;

                document.querySelectorAll('.cd-val-days').forEach(el => el.innerText = valDays);
                document.querySelectorAll('.cd-val-hours').forEach(el => el.innerText = valHours);
                document.querySelectorAll('.cd-val-mins').forEach(el => el.innerText = valMins);
                document.querySelectorAll('.cd-val-secs').forEach(el => el.innerText = valSecs);
            }

            update();
            setInterval(update, 1000);
        }

        let revealObserverStarted = false;
        function initRevealAnimations() {
            if (revealObserverStarted) return;
            revealObserverStarted = true;

            if (!('IntersectionObserver' in window)) {
                document.querySelectorAll('.reveal-item').forEach(el => el.classList.add('revealed'));
                return;
            }

            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -20px 0px',
                threshold: 0.02
            };

            const revealObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal-item').forEach(el => {
                revealObserver.observe(el);
            });
        }

        window.unlockInvitation = function() {
            const cover = document.getElementById('invitation-cover');
            if (cover) {
                cover.style.transform = 'translateY(-100%)';
                cover.style.opacity = '0';
                cover.style.pointerEvents = 'none';
                setTimeout(() => {
                    cover.classList.add('hidden');
                }, 1000);
            }
            document.body.classList.remove('overflow-hidden');

            if (bgAudio) {
                bgAudio.play().then(() => {
                    isAudioPlaying = true;
                    updateAudioIcons();
                }).catch(() => {
                    isAudioPlaying = false;
                    updateAudioIcons();
                });
            }

            initRevealAnimations();
            triggerHeroReveals();
        };

        function triggerHeroReveals() {
            const heroItems = document.querySelectorAll('#section-hero .reveal-item');
            heroItems.forEach((el, index) => {
                setTimeout(() => {
                    el.classList.add('revealed');
                }, index * 120);
            });
        }

        window.toggleFullscreenMode = function() {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen().catch(e => console.log(e));
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        };

        document.addEventListener('DOMContentLoaded', function () {
            startCountdown();
            initRevealAnimations();
        });

        window.saveTheDateCalendar = function() {
            saveCalendarEvent('resepsi');
        };

        window.saveCalendarEvent = function(type) {
            const isAkad = (type === 'akad');
            const eventTitle = isAkad 
                ? "Akad Nikah: {{ $groomNickname }} & {{ $brideNickname }}"
                : "Resepsi Pernikahan: {{ $groomNickname }} & {{ $brideNickname }}";
            const eventDesc = "Pernikahan {{ $groomName }} & {{ $brideName }}. Kami sangat menantikan kehadiran Anda!";
            const eventLoc = isAkad ? "{{ $akadAddress ?? $venueAddress }}" : "{{ $venueAddress }}";
            
            const startDateStr = isAkad 
                ? "{{ $akadDate ? $akadDate->format('Ymd') : $eventDate->format('Ymd') }}T{{ $akadTimeRaw ? str_replace(':', '', $akadTimeRaw) : '0800' }}00"
                : "{{ $resepsiDate ? $resepsiDate->format('Ymd') : $eventDate->format('Ymd') }}T{{ $resepsiTimeRaw ? str_replace(':', '', $resepsiTimeRaw) : '1100' }}00";
            
            const endDateStr = isAkad
                ? "{{ $akadDate ? $akadDate->format('Ymd') : $eventDate->format('Ymd') }}T{{ $akadTimeRaw ? str_replace(':', '', $akadTimeRaw) + 200 : '1000' }}00"
                : "{{ $resepsiDate ? $resepsiDate->format('Ymd') : $eventDate->format('Ymd') }}T{{ $resepsiTimeRaw ? str_replace(':', '', $resepsiTimeRaw) + 300 : '1400' }}00";

            const gCalUrl = `https://calendar.google.com/calendar/render?action=TEMPLATE&text=${encodeURIComponent(eventTitle)}&dates=${startDateStr}/${endDateStr}&details=${encodeURIComponent(eventDesc)}&location=${encodeURIComponent(eventLoc)}`;
            
            window.open(gCalUrl, '_blank');
        };

        window.copyToClipboard = function(text, label) {
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(() => {
                    showToast(`${label ?? 'Teks'} berhasil disalin!`);
                }).catch(() => {
                    fallbackCopyText(text, label);
                });
            } else {
                fallbackCopyText(text, label);
            }
        };

        function fallbackCopyText(text, label) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-999999px";
            textArea.style.top = "-999999px";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                document.execCommand('copy');
                showToast(`${label ?? 'Teks'} berhasil disalin!`);
            } catch (err) {
                showToast("Gagal menyalin teks.");
            }
            document.body.removeChild(textArea);
        }

        function showToast(msg) {
            const toast = document.getElementById('invitation-toast');
            const toastMsg = document.getElementById('invitation-toast-message');
            if (!toast) return;
            if (toastMsg) toastMsg.innerText = msg;
            toast.style.opacity = '1';
            toast.style.pointerEvents = 'auto';
            toast.style.transform = 'translate(-50%, 0)';
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.pointerEvents = 'none';
                toast.style.transform = 'translate(-50%, 10px)';
            }, 2600);
        }

        window.openLightbox = function(src) {
            const modal = document.getElementById('lightbox-modal');
            const img = document.getElementById('lightbox-img');
            if (modal && img) {
                img.src = src;
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
        };

        window.closeLightbox = function() {
            const modal = document.getElementById('lightbox-modal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        };

        window.smoothScrollTo = function(e, id) {
            e.preventDefault();
            const el = document.getElementById(id);
            if (el) {
                el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        };

        window.sendWhatsAppRSVP3 = function() {
            const name = document.getElementById('rsvp_guest_name_3')?.value || 'Tamu Undangan';
            const count = document.getElementById('rsvp_guest_count_3')?.value || '1';
            const status = document.querySelector('input[name="rsvp_status_3"]:checked')?.value || 'Hadir';
            const groom = "{{ $groomNickname }}";
            const bride = "{{ $brideNickname }}";
            const text = `Halo ${groom} & ${bride}, saya ${name} mengonfirmasi kehadiran di pernikahan kalian: ${status} (${count} orang). Terima kasih!`;
            const phone = "{{ $invitation->contact_phone ?? '6281234567890' }}";
            window.open(`https://wa.me/${phone}?text=${encodeURIComponent(text)}`, '_blank');
        };

        // ================= GLOBAL REAL-TIME RSVP & UCAPAN HANDLER FOR ALL THEMES =================
        document.addEventListener('DOMContentLoaded', function () {
            const rsvpForms = document.querySelectorAll('form[data-rsvp-form], #section-rsvp form');
            
            rsvpForms.forEach(form => {
                form.addEventListener('submit', async function (e) {
                    e.preventDefault();

                    const submitBtn = form.querySelector('button[type="submit"]');
                    const originalBtnContent = submitBtn ? submitBtn.innerHTML : '';
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                        submitBtn.innerHTML = `
                            <span class="inline-flex items-center justify-center gap-2">
                                <svg class="animate-spin h-4 w-4" viewBox="0 0 24 24" fill="none">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                                <span>Mengirimkan...</span>
                            </span>
                        `;
                    }

                    const formData = new FormData(form);
                    @if(isset($isDemo) && $isDemo)
                    formData.append('is_demo', '1');
                    @endif

                    try {
                        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') 
                            || form.querySelector('input[name="_token"]')?.value 
                            || '';

                        const response = await fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': token,
                                @if(isset($isDemo) && $isDemo)
                                'X-Is-Demo': '1',
                                @endif
                            },
                            body: formData
                        });

                        const resData = await response.json().catch(() => null);

                        if (response.ok && resData && resData.success) {
                            showToast(resData.message || 'Konfirmasi & ucapan Anda berhasil dikirim!');

                            // If a comment message was provided, prepend into comment feed
                            if (resData.comment && resData.comment.message) {
                                const section = form.closest('#section-rsvp') || document;
                                const feed = section.querySelector('[data-comments-feed]') || document.querySelector('[data-comments-feed]');
                                
                                if (feed) {
                                    const list = feed.querySelector('[data-comments-list]');
                                    const countBadge = feed.querySelector('[data-comments-count]');
                                    const emptyState = feed.querySelector('[data-comments-empty]');
                                    const template = feed.querySelector('template[data-comment-template]');

                                    if (emptyState) {
                                        emptyState.classList.add('hidden');
                                        emptyState.style.display = 'none';
                                    }

                                    if (countBadge) {
                                        const countNum = parseInt((countBadge.textContent.match(/\d+/) || [0])[0], 10) + 1;
                                        countBadge.textContent = `${countNum} Pesan`;
                                    }

                                    if (list && template) {
                                        const clone = template.content.cloneNode(true);
                                        const nameEl = clone.querySelector('[data-comment-name]');
                                        const timeEl = clone.querySelector('[data-comment-time]');
                                        const msgEl = clone.querySelector('[data-comment-message]');

                                        if (nameEl) nameEl.textContent = resData.comment.name;
                                        if (timeEl) timeEl.textContent = resData.comment.time_ago || 'Baru saja';
                                        if (msgEl) msgEl.textContent = `"${resData.comment.message}"`;

                                        const firstItem = clone.firstElementChild;
                                        if (firstItem) {
                                            firstItem.classList.add('ring-2', 'ring-emerald-400/50');
                                            setTimeout(() => {
                                                firstItem.classList.remove('ring-2', 'ring-emerald-400/50');
                                            }, 2500);
                                        }

                                        list.insertBefore(clone, list.firstChild);
                                        list.scrollTop = 0;
                                    }
                                }
                            }

                            // Reset message textarea
                            const messageArea = form.querySelector('textarea[name="message"]');
                            if (messageArea) messageArea.value = '';

                        } else {
                            const errMessage = resData?.message 
                                || (resData?.errors ? Object.values(resData.errors).flat().join(', ') : null)
                                || 'Gagal mengirim konfirmasi. Silakan coba lagi.';
                            showToast(errMessage);
                        }
                    } catch (err) {
                        console.error('RSVP AJAX Error:', err);
                        showToast('Gagal menghubungi server. Mohon periksa koneksi Anda.');
                    } finally {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                            submitBtn.innerHTML = originalBtnContent;
                        }
                    }
                });
            });
        });
    </script>
    @if($currentThemeId == 13 || $isSummerVibes)
    <!-- ================= THEME 13 BACK TO TOP BUTTON ================= -->
    <div class="fixed right-3 bottom-24 sm:bottom-28 z-40 select-none pointer-events-auto">
        <button type="button" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#1D63B8] hover:bg-[#D94B26] text-white border-2 border-white shadow-[0_4px_16px_rgba(29,99,184,0.35)] flex items-center justify-center transition-all hover:scale-110 active:scale-95 cursor-pointer" title="Kembali ke Atas">
            <svg class="w-4 h-4 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
            </svg>
        </button>
    </div>
    @endif

    @if($currentThemeId == 16 || $isMuseumOfLove)
    <!-- ================= THEME 16 BACK TO TOP BUTTON ================= -->
    <div class="fixed right-3 bottom-24 sm:bottom-28 z-40 select-none pointer-events-auto">
        <button type="button" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#8B1E22] hover:bg-[#701518] text-[#FAF5EC] border border-[#D4AF37]/60 shadow-[0_4px_16px_rgba(0,0,0,0.25)] flex items-center justify-center transition-all hover:scale-110 active:scale-95 cursor-pointer" title="Kembali ke Atas">
            <svg class="w-4 h-4 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
            </svg>
        </button>
    </div>
    @endif

</body>
</html>