@extends('Sticket::partials.main')


@section('content')
    <div class="bg-white rounded shadow-sm p-2">
        <div class="fs-2 border-bottom mb-3 py-2">ticket categories</div>

        <div class="row">


            <div class="col-9 mx-auto">
                <div class="my-3 w-25 mx-auto">
                    <a class="btn btn-success w-100" href="{{route('categories.create')}}">Add New Category</a>
                </div>
                <div class="bg-light p-3 d-flex justify-content-between text-center">

                    <div class="w-25">#</div>
                    <div class="w-25">name</div>
                    <div class="w-25 text-info">edit</div>
                    <div class="w-25 text-danger">delete</div>

                </div>
                <div>
                    @foreach ($categories as $category)
                        <div class="py-1 px-3 d-flex justify-content-between text-center my-2 border-bottom">
                            <div class="w-25">{{$category->id}}</div>
                            <div class="w-25">{{$category->name}}</div>
                            <div class="w-25"><a href="{{route('categories.edit', $category)}}" class="btn btn-sm btn-info text-white fw-bold">edit</a></div>
                            <div class="w-25">
                                <form action="{{route('categories.destroy', $category)}}" method="POST">
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

                {{$categories->links()}}
            </div>
        </div>
    </div>

@endsection
