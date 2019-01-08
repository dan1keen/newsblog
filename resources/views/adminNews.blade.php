@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard<a class="float-right" href="/form">Add new post</a>
                      <small  class="d-flex justify-content-center">{{$news->onEachSide(2)-> links()}}</small>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="content">
                            <table class="table table-bordered table-hover">
                                <tr>
                                <th>Title</th>
                                <th>Conent</th>
                                <th>Created at</th>
                                <th>Author</th>
                                <td colspan="2">Action</td>
                                </tr>
                                 @foreach($news as $single)
                                 <tr>
                                     <td>
                                        <a href="/news/{{$single->id}}">{{$single->title}}</a>
                                     </td>
                                     <td>
                                         {{$single->content}}
                                     </td>
                                     <td>{{ $single->updated_at }}</td>
                                     <td>
                                         {{$single->author}}
                                     </td>
                                     <td><a href="/edit/{{$single->id}}" class="btn btn-primary">Edit</a></td>
                                     <td>
                                          <form action="{{ route('shares.destroy', $single->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                          </form>
                                      </td>
                                 </tr>
                                 @endforeach

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
