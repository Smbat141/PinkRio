<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticlesRepository;
use Illuminate\Support\Facades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends AdminController
{

    public function __construct(ArticlesRepository $a_rep){
        parent::__construct();

        /*  if(Gate::denies('EDIT_ARTICLES')){
              abort(404);
          }*/
        $this->a_rep = $a_rep;
        $this->template = env('THEME').'.admin.articles';
    }



    public function index(){
       $this->title = 'Articles Menejer';

       $articles = $this->getArticles();

        foreach ($articles as $article){
            $article->img = json_decode($article->img);
        }
       $this->content = view(env('THEME').'.admin.articles_content')->with('articles',$articles)->render();

       $this->vars = array_add($this->vars,'content',$this->content);


        return $this->renderOutput();

    }

    public function getArticles(){
        return  $this->a_rep->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(Facades\Gate::denies('save',new Article)){
            abort(404);
        }

        $this->title = 'Add new Artticles';

        $category = Category::select('*')->get();


        $this->content = view(env('THEME').'.admin.articles_create_content')->with('categories',$category)->render();

        $this->vars = array_add($this->vars,'content',$this->content);

        return $this->renderOutput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest  $request){
        $result = $this->a_rep->addArticle($request);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($alias)
    {
        if(Facades\Gate::denies('save',new Article)){
            abort(404);
        }

        $this->title = 'Edit Artticles';

        $article = Article::where('alias',$alias)->first();
        $category = Category::select('*')->get();
        $article->img = json_decode($article->img);


        $this->content = view(env('THEME').'.admin.articles_create_content')->with(['categories' => $category,'article' => $article])->render();

        $this->vars = array_add($this->vars,'content',$this->content);

        return $this->renderOutput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $alias){
        $article = Article::where('alias',$alias)->first();
        $result = $this->a_rep->updateArticle($request,$article);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($alias){

        if(Facades\Gate::denies('destroy',new Article)){
            abort(404);
        }
        $article = Article::where('alias',$alias)->first();
        $result = $this->a_rep->destroyArticle($article);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect('/admin')->with($result);

    }
}
