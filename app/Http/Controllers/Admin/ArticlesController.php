<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
