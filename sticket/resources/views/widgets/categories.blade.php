<div class="form-group mt-4">
    <label for="category_id">categories</label>
    <select name="category_id" class="form-control">
        <option value="" selected disabled>select category</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
