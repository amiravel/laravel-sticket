@extends('Sticket::partials.main')


@section('content')

    <div class="fs-5 py-2 px-1 border-bottom mb-3">Add New Category</div>
    <div class="col-3 mx-auto mt-5">

        <form action="{{route('categories.store')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="mb-1">Name :</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mb-3 text-center">
                <input type="submit" name="submit" id="submit" value="Add" class="btn btn-success w-100">
            </div>

        </form>
        <div class="text-center">
            <a class="btn btn-primary w-100" href="{{route('categories.index')}}">&lt&ltBack To List</a>
        </div>
    </div>

@endsection
