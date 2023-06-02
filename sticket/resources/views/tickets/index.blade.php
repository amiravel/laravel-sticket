@extends('Sticket::partials.main')


@section('content')

    <div class="bg-white shadow p-4 rounded-1">

        <div class="fs-2 border-bottom mb-3 py-2">tickets</div>

        <div class="row">

            <div class="col-12 mx-auto">
                <div class="my-3 w-25 mx-auto">
                    {{--                <a class="btn btn-success w-100" href="{{route('tickets.create')}}">Add New Category</a>--}}
                </div>
                <div class="bg-light p-3 d-flex justify-content-between text-center">

                    <div class="w-25">#</div>
                    <div class="w-25">title</div>
                    <div class="w-25">category</div>
                    <div class="w-25">status</div>
                    <div class="w-25">priority</div>
                    <div class="w-25 text-info">respond</div>
                    <div class="w-25 text-danger">close</div>

                </div>
                <div>
                    @foreach ($tickets as $ticket)
                        <div class="py-1 px-3 d-flex justify-content-between text-center my-2 border-bottom">
                            <div class="w-25">{{$ticket->id}}</div>
                            <div class="w-25">{{$ticket->title}}</div>
                            <div class="w-25">{{$ticket->category?->name}}</div>
                            <div class="w-25">{{$ticket->status}}</div>
                            <div class="w-25">{{$ticket->priority}}</div>
                            <div class="w-25"><a href="{{route('tickets.show', $ticket)}}" class="btn btn-sm btn-info text-white fw-bold">view</a></div>
                            <div class="w-25">
                                <form action="{{route('categories.destroy', $ticket)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group">
                                        <input type="submit" value="delete" class="btn btn-danger btn-sm fw-bold text-white">
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{$tickets->links()}}
            </div>
        </div>

        {{$tickets->links()}}
    </div>

@endsection
