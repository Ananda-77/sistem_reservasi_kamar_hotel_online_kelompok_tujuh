@extends('contoh.layout')

@section('content')
<style>
    .chat-container {
        max-width: 700px;
        margin: 0 auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px #b6e0e033, 0 1.5px 8px #e2e8f0;
        padding: 0;
        display: flex;
        flex-direction: column;
        height: 70vh;
        overflow: hidden;
    }
    .chat-header {
        background: #6c4ee6;
        color: #fff;
        padding: 18px 28px;
        font-size: 1.3em;
        font-weight: 700;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .chat-body {
        flex: 1;
        padding: 24px 18px 12px 18px;
        overflow-y: auto;
        background: #f4f6fb;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .chat-message {
        display: flex;
        align-items: flex-end;
        gap: 10px;
    }
    .chat-bubble {
        max-width: 60%;
        padding: 12px 18px;
        border-radius: 18px;
        font-size: 1.08em;
        box-shadow: 0 2px 8px #e2e8f0;
        position: relative;
        word-break: break-word;
    }
    .chat-bubble.user {
        background: linear-gradient(90deg, #6c4ee6 80%, #4f8cff 100%);
        color: #fff;
        margin-left: auto;
        border-bottom-right-radius: 4px;
        box-shadow: 0 2px 12px #6c4ee644;
    }
    .chat-bubble.admin {
        background: #fff;
        color: #333;
        border: 1.5px solid #6c4ee6;
        margin-right: auto;
        border-bottom-left-radius: 4px;
    }
    .chat-meta {
        font-size: 0.85em;
        color: #888;
        margin-top: 2px;
        margin-bottom: 2px;
        text-align: right;
    }
    .chat-input-area {
        background: #f4f6fb;
        padding: 18px 24px;
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
        display: flex;
        gap: 12px;
        align-items: center;
    }
    .chat-input {
        flex: 1;
        border-radius: 12px;
        border: 1.5px solid #cbd5e1;
        padding: 12px 16px;
        font-size: 1.1em;
        background: #fff;
        box-shadow: 0 1px 4px #e2e8f0;
        outline: none;
        transition: border 0.2s;
    }
    .chat-input:focus {
        border-color: #6c4ee6;
    }
    .chat-send-btn {
        background: linear-gradient(90deg, #6c4ee6 80%, #4f8cff 100%);
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 10px 22px;
        font-size: 1.1em;
        font-weight: 600;
        box-shadow: 0 2px 8px #6c4ee622;
        transition: background 0.2s, box-shadow 0.2s, transform 0.2s;
    }
    .chat-send-btn:hover {
        background: #4f3bbd;
        color: #fff;
        transform: scale(1.04);
    }
    @media (max-width: 800px) {
        .chat-container { max-width: 100%; height: 80vh; }
    }
</style>
<div class="chat-container mt-4 mb-4">
    <div class="chat-header">
        <i class="fa fa-comments"></i> Chat dengan Admin
    </div>
    <div class="chat-body" id="chatBody">
        @forelse($messages as $msg)
            <div class="chat-message {{ $msg->sender }}">
                <div class="chat-bubble {{ $msg->sender }}">
                    {{ $msg->message }}
                    <div class="chat-meta">
                        @if($msg->sender === 'user')
                            Saya
                        @else
                            Admin
                        @endif
                        • {{ $msg->created_at->format('H:i d/m/Y') }}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted">Belum ada pesan. Mulai chat dengan admin!</div>
        @endforelse
    </div>
    <form action="{{ route('chat.send') }}" method="POST" class="chat-input-area">
        @csrf
        <input type="text" name="message" class="chat-input" placeholder="Tulis pesan..." autocomplete="off" required>
        <button type="submit" class="chat-send-btn"><i class="fa fa-paper-plane"></i> Kirim</button>
    </form>
</div>
<script>
    // Scroll otomatis ke bawah saat chat dibuka/ditambah
    window.onload = function() {
        var chatBody = document.getElementById('chatBody');
        chatBody.scrollTop = chatBody.scrollHeight;
    };
</script>
@endsection 