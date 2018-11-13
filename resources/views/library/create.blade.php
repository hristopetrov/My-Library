@extends ('layout.master')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Create book</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="{{route('library.store')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Book name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}"required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" name="isbn" class="form-control" value="{{old('isbn')}}" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" id="year" name="year" class="form-control" value="{{old('year')}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control" value="{{old('description')}}" required></textarea>
            </div>
            <div class="form-group">
                <label for="imageFile">Image</label>
                <input type="file" class="form-control-file" name="imageFile" id="imageFile" accept="image/*" value="{{old('imageFile')}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Add book</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
 @endsection