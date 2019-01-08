@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{$single->title}}</h1></div>
                        <div class="card-body">
                            <h1>{{$single->content}}</h1>
                            <div class="card-footer">
                              <small class="d-flex justify-content-end">
                                Published by {{$single->author}} {{$single->updated_at->diffForHumans()}}
                              </small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
