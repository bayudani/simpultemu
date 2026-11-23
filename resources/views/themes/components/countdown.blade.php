@props(['eventDate', 'style' => 'default'])

<div x-data="countdown('{{ $eventDate }}')" class="countdown-{{ $style }}">
    <div class="countdown-container">
        <div class="countdown-item">
            <span class="countdown-value" x-text="days">0</span>
            <span class="countdown-label">Hari</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-value" x-text="hours">0</span>
            <span class="countdown-label">Jam</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-value" x-text="minutes">0</span>
            <span class="countdown-label">Menit</span>
        </div>
        <div class="countdown-item">
            <span class="countdown-value" x-text="seconds">0</span>
            <span class="countdown-label">Detik</span>
        </div>
    </div>
</div>

@push('scripts')
<script>
function countdown(eventDate) {
    return {
        days: 0,
        hours: 0,
        minutes: 0,
        seconds: 0,
        init() {
            this.updateCountdown();
            setInterval(() => this.updateCountdown(), 1000);
        },
        updateCountdown() {
            const now = new Date().getTime();
            const event = new Date(eventDate).getTime();
            const distance = event - now;
            
            if (distance > 0) {
                this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                this.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                this.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                this.seconds = Math.floor((distance % (1000 * 60)) / 1000);
            }
        }
    }
}
</script>
@endpush
