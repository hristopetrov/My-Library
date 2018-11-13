@extends('layout.master')

@section('content')
<div class="row">
    <h1 class="text-center">Home page</h1>
</div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
@foreach($books->chunk(3) as $booksChunk)
    <div class="row">
        @foreach($booksChunk as $book)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{asset('images/'.$book->image)}}"
                    class="img-responsive" alt="...">
                <div class="caption">
                    <h2>{{$book->name}}</h2>
                    <p class="description">{{str_limit($book->description,100)}}
                    </p>
                    <div class="clearfix">
                        <div class="pull-left price">Writen: {{$book->year}} </div>
                    @if($book->added)
                    @else
                    <form method="POST" action="{{route('book.add-to-library',['id'=>$book->id])}}">
                        {{csrf_field()}}
                         <button type="submit" class="btn btn-default pull-right btn-success">Add to Library</button>             
                    </form> 
                     @endif
                 </div>
                </div>
            </div>
        </div>
      @endforeach
    </div>
@endforeach

@endsection