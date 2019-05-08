<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
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
        return response()->json(['articles'=> $articles]);

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
        $article = new Article();
        $expl = explode(',',$request->image);
        $decode = base64_decode($expl[1]);
        if (strpos($expl[0],'png')){
            $extension = 'png';
        }else{
            $extension = 'jpg';
        }
        $currenttime = Carbon::now()->timestamp;
        $filename = $currenttime. '.' . $extension;
        $filepath = storage_path().'/'.$filename;

        file_put_contents($filepath,$decode);


        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->image = $filename;


//       $article->save();
        return response()->json(['article' => $article]);
    }

    /**
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return response()->json(['article' => $article]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editArticle(Request $request, $id)
    {
        $article = Article::find($id);
        if(!$article){
            return response()->json(['msg' =>'Article not found']);
        }
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        $article->update();
        return response()->json(['msg'=> $article]);
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
        return response()->json(['msg' => $article]);


    }
}
