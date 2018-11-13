@extends ('layout.master')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Update book</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="{{route('book.update',['id'=>$book->id])}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">

            <div class="form-group">
                <label for="name">Book name</label>
                <input type="text" id="name" value="{{ old('name')? old('name') : $book->name }}" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" id="isbn" value="{{ old('isbn')? old('isbn') : $book->isbn }}" name="isbn" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" id="year" value="{{ old('year')? old('year') : $book->year }}"  name="year" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" id="description" value="{{ old('description')? old('description') : $book->description }}"  name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="imageFile">Image</label>
                <input type="file" class="form-control-file" name="imageFile" id="imageFile" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Add book</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
 @endsection