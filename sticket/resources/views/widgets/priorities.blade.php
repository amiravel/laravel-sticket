<div class="form-group mt-4">
    <label for="priority_id">priorities</label>
    <select name="priority_id" class="form-control">
        <option value="" selected disabled>select priority</option>
        @foreach($priorities as $priority)
            <option value="{{$priority->order()}}">{{$priority->value}}</option>
        @endforeach
    </select>
</div>
