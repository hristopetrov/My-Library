@extends('layout.master')

@section('content')
<div class="col-sm-4 col-md-offset-4">
            <div class="thumbnail">
                <img src="{{asset('images/'.$book->image)}}"
                 class="img-responsive" alt="...">
                <div class="caption">
                    <h2>{{$book->name}}</h2>
                    <p class="description">{{$book->description}}
                    </p>
                    <div class="clearfix">
                        <div class="pull-left price">Writen:  {{$book->year}} </div>
                    </div>
                </div>
            </div>
</div>            
@endsection