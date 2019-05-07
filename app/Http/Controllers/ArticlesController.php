<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles = Article::all();
        return $articles;
    }

    public function home()
    {
        return view('articles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
        ]);

        $article->save();

        return response()->json('successfuly added');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit($id)
    {
//        $this->validate($request,[
//            'title' => 'required',
//            'body' => 'required',
//        ]);
//        $article = Article::find($id);
//        if($article->count()){
//            $article->update($request->all());
//            return response()->json(['status'=>'success','msg'=>'Article updated successfully']);
//        }else{
//            return response()->json(['status'=>'error','msg'=>'Error in updating article']);
//        }
        dd('sal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json('deleted!');


    }
}
