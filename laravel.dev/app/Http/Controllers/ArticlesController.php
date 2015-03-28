<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

class ArticlesController extends Controller {

  public function index()
  {
    //  $articles = Article::latest('published_at')->unpublished()->get();
      $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();
     //$articles = Article::latest('published_at')->get();
    return view('articles.index', compact('articles'));
  }


    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
  {
    $article = Article::find($id);

    return view('articles.show', compact('article'));
  }


    /**
     * @return \Illuminate\View\View
     */
    public function create()
  {
    return view('articles.create');
  }


    /**
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
  {
    Article::create($request->all());
    return redirect('articles');
  }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));

    }


    public function update($id, ArticleRequest $request)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }



}
