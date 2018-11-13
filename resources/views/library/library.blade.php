@extends ('layout.master')

@section ('content')
	<div><h1>This is Users library page</h1></div>
   @if (session()->has('message'))
    <div class="alert alert-danger">
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
                    <p class="year">Writen: {{$book->year}} </p>
                        <div>
                    <div class="clearfix">
                    <form method="POST" action="{{route('book.destroy',['id'=>$book->id])}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                     <button type="submit" class="btn btn-default pull-right btn-danger" >Delete Book</button>
                        
                    </form>
                     <a href="{{route('book.view',['id'=>$book->id])}}" class="btn btn-default pull-right btn-success" role="button" >View Book</a>
                     <a href="{{route('book.edit',['id'=>$book->id])}}" class="btn btn-default pull-right btn-warning" role="button" >Edit Book</a>
                    	
                     </div>
                    
                 </div>
                </div>
            </div>
        </div>
      @endforeach
    </div>
@endforeach
@endsection





