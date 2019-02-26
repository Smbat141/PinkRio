<?php

namespace App\Http\Controllers;

use App\Article;
use App\Repositories\CommentsRepository;
use Illuminate\Http\Request;
use App\Repositories\PortfoliosRepository;
use App\Repositories\ArticlesRepository;
use App\Menu;
use App\User;
use Illuminate\Support\Facades\Lang;
use App\Category;
use App\Comment;
use Auth;

class ArticleController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep,ArticlesRepository $a_rep,CommentsRepository $c_rap){

        parent::__construct(new \App\Repositories\MenusRepository(new Menu));

        $this->bar='right';
        $this->p_rep=$p_rep;
        $this->c_rep=$c_rap;
        $this->a_rep=$a_rep;
        $this->template=env('THEME').'.articles';

    }


    public function index($cat_alias = false){
        $menu = $this->getMenu();

        $portfolios = $this->getPortfolios();

        $articles  = $this->getArticles($cat_alias);

        $comments = $this->getComments();


        foreach ($articles as $article){
            $article->img = json_decode($article->img);
        }

        foreach ($portfolios as $portfolio){
            $portfolio->img = json_decode($portfolio->img);
        }

        foreach ($comments as $comment){
            if($comment->email ? md5($comment->email) : $comment->user->email ){
                $hash = $comment->email;
            }
        }


        $this->vars = [
            'menus' => $menu,
            'portfolios' => $portfolios,
            'articles' => $articles,
            'bar' => $this->bar,
            'comments' => $comments,
            'hash' => $hash,
        ];



        return $this->renderOutPut();
    }




    public function show($alias = false){


        $id_alias = Article::where('alias',$alias)->first()->id;

        $articles  = $this->getArticles();

        $hash = false;

        $menu = $this->getMenu();

        $portfolios = $this->getPortfolios();

        $comments = $this->getComments($alias,$id_alias);

        foreach ($articles as $article){
            $article->img = json_decode($article->img);
        }

        foreach ($portfolios as $portfolio){
            $portfolio->img = json_decode($portfolio->img);
        }

        foreach ($comments as $comment){

            if($comment->email  ? md5($comment->email) : $comment->user->email ){
                $hash = $comment->email;
            }
        }

        $this->vars = [
            'menus' => $menu,
            'portfolios' => $portfolios,
            'bar' => $this->bar,
            'comments' => $comments,
            'articles' => $articles,
            'hash' => $hash,
            'alias' => $alias,
            'id_alias' => $id_alias,
        ];

        return view(env('THEME').'.article',$this->vars);
    }


        public function getComments($alias = false,$id_alias = false){


        $where = false;

        if($alias){
                $where = ['article_id',$id_alias];
            }

        $comment = $this->c_rep->get('*',false,$where);

        if($comment){
            $comment->load('article','user');
        }

        return $comment;

    }


    public function getArticles($alias = false){

        $where = false;

        if($alias){
            $id = Category::select('id')->where('alias',$alias)->first()->id;
            $where = ['category_id',$id];
        }

        $articles = $this->a_rep->get('*',true,$where);

        if($articles){
            $articles->load('user','category','comment');
        }
        return $articles;

    }

    public function getPortfolios(){
        $portfolio = $this->p_rep->get();

        return $portfolio;
    }


    public function getMenu(){

        $menu = $this->m_rep->get();
        return $menu;
    }





}
