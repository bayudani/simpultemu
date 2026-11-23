@props(['musicPath', 'musicTitle' => 'Background Music'])

<div x-data="musicPlayer()" class="music-player fixed bottom-4 right-4 z-50">
    <button @click="toggle" class="music-toggle" :class="{ 'playing': isPlaying }">
        <svg x-show="!isPlaying" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M8 5v14l11-7z"/>
        </svg>
        <svg x-show="isPlaying" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
        </svg>
    </button>
    <audio x-ref="audio" loop>
        <source src="{{ asset('storage/' . $musicPath) }}" type="audio/mpeg">
    </audio>
</div>

@push('scripts')
<script>
function musicPlayer() {
    return {
        isPlaying: false,
        init() {
            // Auto-play on user interaction
            document.addEventListener('click', () => {
                if (!this.isPlaying) {
                    this.play();
                }
            }, { once: true });
        },
        toggle() {
            this.isPlaying ? this.pause() : this.play();
        },
        play() {
            this.$refs.audio.play();
            this.isPlaying = true;
        },
        pause() {
            this.$refs.audio.pause();
            this.isPlaying = false;
        }
    }
}
</script>
@endpush
