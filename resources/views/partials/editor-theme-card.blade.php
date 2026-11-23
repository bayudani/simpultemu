@php
    $config = is_array($theme->theme_config) ? $theme->theme_config : (json_decode($theme->theme_config, true) ?? []);
    $primary = $config['primary_color'] ?? ($config['colors']['primary'] ?? '#800000');
    $secondary = $config['secondary_color'] ?? ($config['colors']['secondary'] ?? '#FAF8F5');
    $layoutName = $config['layout'] ?? 'vertical_stack';
    $fontName = $config['font_heading'] ?? 'Playfair Display';
    $selectedTheme = (int) (old('theme_id', request('theme_id', $selectedThemeId ?? ($invitation->theme_id ?? 1))));
    $isSelected = ($selectedTheme === (int) $theme->id);
@endphp
<label class="theme-card-wrapper {{ $theme->tier }} relative cursor-pointer group block select-none"
       data-theme-id="{{ $theme->id }}"
       data-primary="{{ $primary }}"
       data-name="{{ $theme->name }}"
       data-tier="{{ $theme->tier }}"
       data-layout="{{ $layoutName }}">
    <input type="radio" name="theme_id" value="{{ $theme->id }}" {{ $isSelected ? 'checked' : '' }} class="peer sr-only theme-radio-input" required onchange="handleThemeChange(this)">
    
    <div class="theme-card-box p-2 sm:p-2.5 bg-white border-2 {{ $isSelected ? 'border-[#FF2E3A] ring-3 sm:ring-4 ring-[#FF2E3A]/20 shadow-md sm:shadow-lg' : 'border-[#E7E0D6]' }} rounded-2xl group-hover:border-[#FF2E3A]/60 peer-checked:border-[#FF2E3A] peer-checked:ring-3 peer-checked:sm:ring-4 peer-checked:ring-[#FF2E3A]/20 peer-checked:shadow-md transition-all duration-200 flex flex-col items-center text-center">
        
        <!-- Badges -->
        <div class="w-full flex items-center justify-between mb-1 sm:mb-1.5 px-0.5">
            <span class="px-1.5 py-0.5 rounded text-[8px] sm:text-[9px] font-bold uppercase tracking-wider {{ $theme->tier === 'premium' ? 'bg-amber-100 text-amber-900 border border-amber-200' : 'bg-emerald-50 text-emerald-800 border border-emerald-200' }}">
                {{ $theme->tier }}
            </span>
            <span class="px-1.5 py-0.5 rounded text-[8px] sm:text-[9px] font-bold {{ $theme->tier === 'premium' ? 'bg-gradient-to-r from-amber-500 to-rose-500 text-white shadow-xs' : 'bg-emerald-600 text-white' }}">
                {{ $theme->tier === 'premium' ? 'Rp 59k' : 'Gratis' }}
            </span>
        </div>

        <!-- Unified 9:16 Smartphone Mockup with Bespoke Motif & Corak (Responsive Scaler) -->
        @include('partials.theme-phone-mockup', ['theme' => $theme, 'size' => 'catalog'])

        <!-- Footer Info & Actions -->
        <div class="mt-1 sm:mt-1.5 w-full px-0.5">
            <p class="text-[11px] sm:text-xs font-serif font-bold text-stone-900 truncate" title="{{ $theme->name }}">{{ $theme->name }}</p>
            <p class="text-[8px] sm:text-[9px] text-stone-400 font-mono mt-0.5 uppercase truncate">{{ str_replace('_', ' ', $layoutName) }}</p>
            <div class="mt-1.5 pt-1.5 border-t border-[#E7E0D6]/60 flex items-center gap-1 sm:gap-1.5">
                <button type="button" onclick="event.stopPropagation(); event.preventDefault(); openThemeDemoModal({{ $theme->id }}, {{ json_encode($theme->name) }}, {{ json_encode($theme->tier) }}, {{ json_encode($theme->preset_music_label) }});" class="flex-1 py-1 px-1 sm:px-1.5 rounded-lg bg-stone-100 hover:bg-stone-200 text-stone-700 text-[9px] sm:text-[10px] font-semibold flex items-center justify-center gap-0.5 sm:gap-1 transition shadow-2xs cursor-pointer" title="Lihat Demo Tema">
                    <svg class="w-3 h-3 text-stone-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <span>Demo</span>
                </button>
                <span class="theme-card-badge py-1 px-1.5 sm:px-2 rounded-lg text-[9px] sm:text-[10px] font-bold border transition flex items-center justify-center gap-0.5 sm:gap-1 {{ $isSelected ? 'bg-[#FF2E3A] text-white border-[#FF2E3A]' : 'bg-[#FAF8F5] text-[#FF2E3A] border-[#E7E0D6]' }} peer-checked:bg-[#FF2E3A] peer-checked:text-white peer-checked:border-[#FF2E3A]">
                    <svg class="theme-card-badge-icon w-3 h-3 {{ $isSelected ? 'inline' : 'hidden' }} peer-checked:inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    <span class="theme-card-badge-text">{{ $isSelected ? 'Terpilih' : 'Pilih' }}</span>
                </span>
            </div>
        </div>

        <!-- Checkmark Badge on Active -->
        <div class="theme-card-check absolute top-1.5 right-1.5 sm:top-2 sm:right-2 w-4 h-4 sm:w-5 sm:h-5 rounded-lg bg-[#FF2E3A] text-white {{ $isSelected ? 'flex' : 'hidden' }} peer-checked:flex items-center justify-center shadow-md">
            <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>
</label>
