@props(['giftAccounts'])

<div class="gift-section">
    <h3>Amplop Digital</h3>
    <p class="gift-description">Tanpa mengurangi rasa hormat, bagi yang ingin memberikan tanda kasih dapat melalui:</p>
    
    <div class="gift-accounts">
        @foreach($giftAccounts as $account)
            <div class="gift-account">
                <div class="gift-bank">{{ $account->bank_name }}</div>
                <div class="gift-account-number">{{ $account->account_number }}</div>
                <div class="gift-account-holder">a.n {{ $account->account_holder }}</div>
                <button onclick="copyToClipboard('{{ $account->account_number }}')" class="btn-copy">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    Salin Nomor
                </button>
            </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Nomor rekening berhasil disalin!');
    }).catch(() => {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        alert('Nomor rekening berhasil disalin!');
    });
}
</script>
@endpush
