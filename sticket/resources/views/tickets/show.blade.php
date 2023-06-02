@extends('Sticket::partials.main')


@section('content')
    <div class="mt-4 bg-white rounded shadow p-4">
        <div class="fs-3 border-bottom mb-3">{{$ticket->title}}  {{$ticket->category->name}} <span class="{{$ticket->priority_color}}">{{$ticket->priority_text}}</span></div>
        <div class="fs-5"><i class="fas fa-user text-black-50 border rounded-circle p-2 m-1"></i>{{$ticket->user->name}} - {{$ticket->user->email}}</div>
        <div>{{$ticket->created_at->format("Y-M-D H:i:s")}} | <span class="{{$ticket->status_color}} rounded p-1 text-white">{{$ticket->status}}</span></div>
        <div class="border rounded p-4 mt-3">{{$ticket->body}}</div>
        @foreach($ticket->messages as $message)
            <div class="shadow rounded">{{$message->content}}</div>
        @endforeach
    </div>


    <div class="mt-4 bg-white rounded shadow p-4">
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
