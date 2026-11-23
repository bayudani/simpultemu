@php
    $hasTopWave = $hasTopWave ?? false;
    $topMask = $hasTopWave
        ? "linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.05) 30px, rgba(0,0,0,0.5) 80px, black 160px)"
        : "linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.5) 20px, black 60px)";
@endphp

<!-- Left Flank Ornament: Blue geometric mesh + ambient glow + smooth gradient blur towards center -->
<div
    class="absolute top-0 bottom-0 left-0 w-20 sm:w-32 md:w-[28%] lg:w-[32%] xl:w-[35%] max-w-[600px] pointer-events-none z-0 block overflow-hidden"
    style="-webkit-mask-image: {{ $topMask }}; mask-image: {{ $topMask }};"
    aria-hidden="true"
>
    <!-- 1. Ambient soft blue blur glow (#0284C7 & #DBF6FF) -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#0284C7]/[0.12] via-[#DBF6FF]/[0.08] to-transparent blur-xl md:blur-2xl"></div>

    <!-- 2. Geometric mesh lattice pattern with smooth horizontal opacity fade -->
    <div
        class="absolute inset-0"
        style="background-image: url('/images/patterns/blue-geometric-mesh.svg?v=20261121_02'); background-repeat: repeat; background-size: 52px 52px; -webkit-mask-image: linear-gradient(to right, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.28) 35%, rgba(0,0,0,0.08) 70%, rgba(0,0,0,0) 95%); mask-image: linear-gradient(to right, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.28) 35%, rgba(0,0,0,0.08) 70%, rgba(0,0,0,0) 95%);"
    ></div>

    <!-- 3. Soft gradient blur layer that diffuses the pattern towards the center -->
    <div
        class="absolute inset-0 backdrop-blur-[2px] md:backdrop-blur-[3px]"
        style="-webkit-mask-image: linear-gradient(to right, transparent 20%, rgba(0,0,0,0.5) 55%, black 90%); mask-image: linear-gradient(to right, transparent 20%, rgba(0,0,0,0.5) 55%, black 90%);"
    ></div>

    <!-- 4. Top wave soft blur diffuser to seamlessly melt into the wave -->
    @if($hasTopWave)
        <div
            class="absolute top-0 left-0 right-0 h-32 md:h-48 backdrop-blur-[2px] md:backdrop-blur-[3px]"
            style="-webkit-mask-image: linear-gradient(to bottom, black 0%, rgba(0,0,0,0.6) 40%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, rgba(0,0,0,0.6) 40%, transparent 100%);"
        ></div>
    @endif
</div>

<!-- Right Flank Ornament: Blue geometric mesh + ambient glow + smooth gradient blur towards center -->
<div
    class="absolute top-0 bottom-0 right-0 w-20 sm:w-32 md:w-[28%] lg:w-[32%] xl:w-[35%] max-w-[600px] pointer-events-none z-0 block overflow-hidden"
    style="-webkit-mask-image: {{ $topMask }}; mask-image: {{ $topMask }};"
    aria-hidden="true"
>
    <!-- 1. Ambient soft blue blur glow (#0284C7 & #DBF6FF) -->
    <div class="absolute inset-0 bg-gradient-to-l from-[#0284C7]/[0.12] via-[#DBF6FF]/[0.08] to-transparent blur-xl md:blur-2xl"></div>

    <!-- 2. Geometric mesh lattice pattern with smooth horizontal opacity fade -->
    <div
        class="absolute inset-0"
        style="background-image: url('/images/patterns/blue-geometric-mesh.svg?v=20261121_02'); background-repeat: repeat; background-size: 52px 52px; -webkit-mask-image: linear-gradient(to left, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.28) 35%, rgba(0,0,0,0.08) 70%, rgba(0,0,0,0) 95%); mask-image: linear-gradient(to left, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.28) 35%, rgba(0,0,0,0.08) 70%, rgba(0,0,0,0) 95%);"
    ></div>

    <!-- 3. Soft gradient blur layer that diffuses the pattern towards the center -->
    <div
        class="absolute inset-0 backdrop-blur-[2px] md:backdrop-blur-[3px]"
        style="-webkit-mask-image: linear-gradient(to left, transparent 20%, rgba(0,0,0,0.5) 55%, black 90%); mask-image: linear-gradient(to left, transparent 20%, rgba(0,0,0,0.5) 55%, black 90%);"
    ></div>

    <!-- 4. Top wave soft blur diffuser to seamlessly melt into the wave -->
    @if($hasTopWave)
        <div
            class="absolute top-0 left-0 right-0 h-32 md:h-48 backdrop-blur-[2px] md:backdrop-blur-[3px]"
            style="-webkit-mask-image: linear-gradient(to bottom, black 0%, rgba(0,0,0,0.6) 40%, transparent 100%); mask-image: linear-gradient(to bottom, black 0%, rgba(0,0,0,0.6) 40%, transparent 100%);"
        ></div>
    @endif
</div>
