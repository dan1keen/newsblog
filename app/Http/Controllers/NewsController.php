<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
    

    public function show($id)
        {
            $single = \App\News::find($id);
            return view('show', compact('single'));
        }


    public function create()
        {
          if(Auth::user()->admin == 0) {
            return redirect('/news');
          }else{
            return view('form', compact('news'));
          }
          $news = \App\News::all();
          return view('news', compact('news'));
        }

    public function store(Request $request)
        {
          $request->validate([
                 'title'=>'required',
                 'content'=> 'required',
                 'author' => 'required'
               ]);
          $share = new \App\News([
            'title' => $request->get('title'),
            'content'=> $request->get('content'),
            'author'=> $request->get('author')
          ]);
          $share->save();
          return redirect('/news')->with('success', 'Stock has been added');
        }

    public function index()
        {
          $news = \App\News::all();

          return view('index', compact('news'));
        }

    public function edit($id)
        {
          $news = \App\News::find($id);

          return view('edit', compact('news'));
        }

    public function update(Request $request, $id)
        {
              $request->validate([
                'title'=>'required',
                'content'=> 'required'
              ]);

              $share = \App\News::find($id);
              $share->title = $request->get('title');
              $share->content = $request->get('content');
              $share->save();

              return redirect('/news')->with('success', 'Stock has been updated');
        }

    public function destroy($id)
        {
             $news = \App\News::find($id);
             $news->delete();

             return redirect('/news')->with('success', 'Stock has been deleted Successfully');
        }
}
