<!-- Full-Width Seamless Diagonal Trellis Ornament (Full-bleed from top Y=0 behind navbar, no boundary cuts) -->
<div class="absolute inset-0 pointer-events-none z-0 overflow-hidden" aria-hidden="true">
    <!-- Ambient diffuse soft blue glow on flanks (#0284C7 & #DBF6FF) -->
    <div class="absolute inset-y-0 left-0 w-1/2 bg-[radial-gradient(ellipse_at_left,_rgba(2,132,199,0.12)_0%,_rgba(219,246,255,0.06)_40%,_transparent_70%)] blur-xl md:blur-2xl"></div>
    <div class="absolute inset-y-0 right-0 w-1/2 bg-[radial-gradient(ellipse_at_right,_rgba(2,132,199,0.12)_0%,_rgba(219,246,255,0.06)_40%,_transparent_70%)] blur-xl md:blur-2xl"></div>

    <!-- Repeating Diagonal Trellis Pattern across the FULL screen (dengan vertical fade: pudar/samar di atas, jelas ke bawah) -->
    <div class="absolute inset-0" style="
        -webkit-mask-image: linear-gradient(to bottom,
            rgba(0,0,0,0.15) 0%,
            rgba(0,0,0,0.25) 200px,
            rgba(0,0,0,0.55) 400px,
            rgba(0,0,0,0.90) 580px,
            rgba(0,0,0,1) 700px
        );
        mask-image: linear-gradient(to bottom,
            rgba(0,0,0,0.15) 0%,
            rgba(0,0,0,0.25) 200px,
            rgba(0,0,0,0.55) 400px,
            rgba(0,0,0,0.90) 580px,
            rgba(0,0,0,1) 700px
        );
    ">
        <div class="absolute inset-0" style="
            background-image: url('/images/patterns/blue-geometric-diagonal-trellis.svg?v=20261122_02');
            background-repeat: repeat;
            background-size: 84px 84px;
            -webkit-mask-image: linear-gradient(to right,
                rgba(0,0,0,0.70) 0%,
                rgba(0,0,0,0.48) 12%,
                rgba(0,0,0,0.22) 24%,
                rgba(0,0,0,0.04) 34%,
                rgba(0,0,0,0) 40%,
                rgba(0,0,0,0) 60%,
                rgba(0,0,0,0.04) 66%,
                rgba(0,0,0,0.22) 76%,
                rgba(0,0,0,0.48) 88%,
                rgba(0,0,0,0.70) 100%
            );
            mask-image: linear-gradient(to right,
                rgba(0,0,0,0.70) 0%,
                rgba(0,0,0,0.48) 12%,
                rgba(0,0,0,0.22) 24%,
                rgba(0,0,0,0.04) 34%,
                rgba(0,0,0,0) 40%,
                rgba(0,0,0,0) 60%,
                rgba(0,0,0,0.04) 66%,
                rgba(0,0,0,0.22) 76%,
                rgba(0,0,0,0.48) 88%,
                rgba(0,0,0,0.70) 100%
            );
        "></div>
    </div>

    <!-- Gradasi Putih di Bagian Atas di Bawah Banner (Menyamarkan corak di atas agar tidak terlalu kentara/nabrak) -->
    <div class="absolute top-0 inset-x-0 h-[650px] sm:h-[750px] lg:h-[850px] pointer-events-none" style="
        background: linear-gradient(to bottom,
            rgba(248, 250, 252, 0.95) 0%,
            rgba(248, 250, 252, 0.88) 180px,
            rgba(248, 250, 252, 0.60) 380px,
            rgba(248, 250, 252, 0.20) 560px,
            transparent 100%
        );
    "></div>

    <!-- Vertical Progressive Backdrop Blur Layer (Blur lembut di atas, berangsur-angsur tajam & jernih ke bawah) -->
    <div class="absolute top-0 inset-x-0 h-[650px] sm:h-[750px] lg:h-[850px] pointer-events-none backdrop-blur-md" style="
        -webkit-mask-image: linear-gradient(to bottom,
            rgba(0, 0, 0, 1) 0%,
            rgba(0, 0, 0, 0.90) 200px,
            rgba(0, 0, 0, 0.50) 400px,
            rgba(0, 0, 0, 0.15) 580px,
            transparent 100%
        );
        mask-image: linear-gradient(to bottom,
            rgba(0, 0, 0, 1) 0%,
            rgba(0, 0, 0, 0.90) 200px,
            rgba(0, 0, 0, 0.50) 400px,
            rgba(0, 0, 0, 0.15) 580px,
            transparent 100%
        );
    "></div>

    <!-- Progressive Blur Diffusion Layer toward center (Horizontal) -->
    <div class="absolute inset-0 backdrop-blur-[2px] md:backdrop-blur-[3px]" style="
        -webkit-mask-image: linear-gradient(to right,
            transparent 0%,
            transparent 10%,
            rgba(0,0,0,0.4) 20%,
            rgba(0,0,0,0.9) 32%,
            black 38%,
            black 62%,
            rgba(0,0,0,0.9) 68%,
            rgba(0,0,0,0.4) 80%,
            transparent 90%,
            transparent 100%
        );
        mask-image: linear-gradient(to right,
            transparent 0%,
            transparent 10%,
            rgba(0,0,0,0.4) 20%,
            rgba(0,0,0,0.9) 32%,
            black 38%,
            black 62%,
            rgba(0,0,0,0.9) 68%,
            rgba(0,0,0,0.4) 80%,
            transparent 90%,
            transparent 100%
        );
    "></div>
</div>
