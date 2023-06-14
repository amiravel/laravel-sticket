@extends('Sticket::partials.main')


@section('content')
    <div class="mt-4 bg-white rounded shadow p-4">
        <div class="border-bottom mb-3 d-flex align-items-center">
            <span class="fs-3 p-1">{{$ticket->title}}</span>
            <span class="p-1">|</span>
            <span class="p-1">{{$ticket->category->name}}</span>
            <span class="p-1">|</span>
            <span class="{{$ticket->priority_color}} text-white p-1 rounded">{{$ticket->priority_text}}</span>
        </div>
        <div class="fs-5">
            <i class="fas fa-user text-black-50 border rounded-circle p-2 m-1"></i>
            <span>{{$ticket->user->name}} - {{$ticket->user->email}}    </span>
        </div>
        <div>{{$ticket->created_at->format("Y-M-D H:i:s")}} | <span class="{{$ticket->status_color}} rounded p-1 text-white">{{$ticket->status}}</span></div>
        <div class="border rounded p-4 mt-3">{{$ticket->body}}</div>
        <div class="border-bottom py-2 mb-4 fs-3">Messages:</div>
        @foreach($ticket->messages as $message)
            <div class="border mt-2 rounded p-4">
                <div class="d-flex">
                    <div class="me-2">
                        <i class="fas fa-user text-black-50 border rounded-circle p-3 m-1"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <div>{{$message->user->name}} - {{$message->user->email}}</div>
                        <div>{{$message->created_at->format("Y-M-D H:i:s")}}</div>
                    </div>
                </div>
                <div class="p-2">{{$message->content}}</div>
            </div>
        @endforeach
    </div>


    <div class="my-4 bg-white rounded shadow p-4">
        <div class="border-bottom fs-4 mb-3">send message</div>
        <form action="{{route('tickets.messages.store', $ticket)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="content" class="fs-16 fw-bold">content</label>
                <textarea name="content" class="form-control"></textarea>
            </div>
            <div class="form-group mt-3 text-end">
                <input type="submit" name="sendMessage" class="btn btn-success w-25 fw-bold px-3 d-inline-block" value="send">
            </div>
        </form>
    </div>

@endsection
