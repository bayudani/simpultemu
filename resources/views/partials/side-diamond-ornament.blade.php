<!-- Full-Width Seamless Diamond Star Lattice Ornament (Full-bleed from top Y=0 behind navbar, no boundary cuts) -->
<div class="absolute inset-0 pointer-events-none z-0 overflow-hidden" aria-hidden="true">
    <!-- Ambient diffuse soft blue glow on flanks (#0284C7 & #DBF6FF) -->
    <div class="absolute inset-y-0 left-0 w-1/2 bg-[radial-gradient(ellipse_at_left,_rgba(2,132,199,0.12)_0%,_rgba(219,246,255,0.06)_40%,_transparent_70%)] blur-xl md:blur-2xl"></div>
    <div class="absolute inset-y-0 right-0 w-1/2 bg-[radial-gradient(ellipse_at_right,_rgba(2,132,199,0.12)_0%,_rgba(219,246,255,0.06)_40%,_transparent_70%)] blur-xl md:blur-2xl"></div>

    <!-- Repeating Diamond Star Lattice Pattern across the FULL screen -->
    <div class="absolute inset-0" style="
        background-image: url('/images/patterns/blue-geometric-diamond-lattice.svg?v=20261121_02');
        background-repeat: repeat;
        background-size: 56px 56px;
        -webkit-mask-image: linear-gradient(to right,
            rgba(0,0,0,0.65) 0%,
            rgba(0,0,0,0.45) 12%,
            rgba(0,0,0,0.20) 24%,
            rgba(0,0,0,0.04) 34%,
            rgba(0,0,0,0) 40%,
            rgba(0,0,0,0) 60%,
            rgba(0,0,0,0.04) 66%,
            rgba(0,0,0,0.20) 76%,
            rgba(0,0,0,0.45) 88%,
            rgba(0,0,0,0.65) 100%
        );
        mask-image: linear-gradient(to right,
            rgba(0,0,0,0.65) 0%,
            rgba(0,0,0,0.45) 12%,
            rgba(0,0,0,0.20) 24%,
            rgba(0,0,0,0.04) 34%,
            rgba(0,0,0,0) 40%,
            rgba(0,0,0,0) 60%,
            rgba(0,0,0,0.04) 66%,
            rgba(0,0,0,0.20) 76%,
            rgba(0,0,0,0.45) 88%,
            rgba(0,0,0,0.65) 100%
        );
    "></div>

    <!-- Progressive Blur Diffusion Layer toward center -->
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
