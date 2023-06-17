@extends('Sticket::partials.main')


@section('content')
    <div class="bg-white shadow p-4 rounded-1">

        <div class="fs-2 border-bottom mb-3 py-2">create new ticket</div>

        <div class="row">
            <div class="col-12">
                <form action="{{route('client.tickets.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    @categories
                    @priorities
                    <div class="form-group mt-4">
                        <label for="body">content</label>
                        <textarea name="body" class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" class="btn btn-success w-25" value="send">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
