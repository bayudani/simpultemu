@props(['invitationId', 'comments'])

<div class="comments-section">
    <div class="comments-form">
        <h3>Ucapan & Doa</h3>
        <form action="{{ route('comment.store', $invitationId) }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="Nama Anda" required>
            </div>
            <div class="form-group">
                <textarea name="message" placeholder="Tulis ucapan & doa..." rows="4" required></textarea>
            </div>
            <button type="submit" class="btn-submit">Kirim Ucapan</button>
        </form>
    </div>

    <div class="comments-list">
        @forelse($comments as $comment)
            <div class="comment-item">
                <div class="comment-header">
                    <strong>{{ $comment->name }}</strong>
                    <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <p class="comment-message">{{ $comment->message }}</p>
            </div>
        @empty
            <p class="no-comments">Belum ada ucapan</p>
        @endforelse
    </div>
</div>

@if(session('comment_success'))
    <div class="alert alert-success">
        {{ session('comment_success') }}
    </div>
@endif
