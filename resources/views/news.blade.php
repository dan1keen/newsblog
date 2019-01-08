@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard <span class="float-right">{{$news->onEachSide(2)-> links()}}</span></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="content">
                            @foreach($news as $single)
                                <h1><a href="/news/{{$single->id}}">{{$single->title}}</a></h1>
                                <small class="d-flex justify-content-end">
                                  Published by {{$single->author}} {{$single->updated_at->diffForHumans()}}
                                </small>
                                <hr>

                            @endforeach
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
