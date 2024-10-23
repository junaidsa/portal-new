@foreach($messages as $message)
    @php
        $alignment = $message->sender_id == auth()->id() ? 'chat-message-right' : '';
    @endphp

    <li class="chat-message {{ $alignment }}">
        <div class="d-flex overflow-hidden">
            <div class="chat-message-wrapper flex-grow-1">
                <div class="chat-message-text">
                    <p class="mb-0">{{ $message->message }}</p>
                </div>
                <div class="text-end text-muted mt-1">
                    <small>{{ \Carbon\Carbon::parse($message->created_at)->format('h:i A') }}</small>
                </div>
            </div>
        </div>
    </li>
@endforeach