<?php

namespace App\Http\Controllers;

use App\Repositories\CommentsRepository;
use Illuminate\Http\Request;
use App\Repositories\PortfoliosRepository;
use App\Repositories\ArticlesRepository;
use App\Menu;
use App\User;
use Illuminate\Support\Facades\Lang;
use App\Category;
use App\Comment;

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


    public function index(){
        $menu = $this->getMenu();

        $portfolios = $this->getPortfolios();

        $articles  = $this->getArticles();

        $comments = $this->getComments();

        //dd($comments);
        foreach ($articles as $article){
            $article->img = json_decode($article->img);
        }

        foreach ($portfolios as $portfolio){
            $portfolio->img = json_decode($portfolio->img);
        }
        //dd($portfolio->img);

        $this->vars = [
            'menus' => $menu,
            'portfolios' => $portfolios,
            'articles' => $articles,
            'bar' => $this->bar,
        ];
        return $this->renderOutPut();
    }



    public function getComments(){

        $comment = $this->c_rep->get();
        return $comment;

    }


    public function getArticles(){

        $articles = $this->a_rep->get('*',true);

        if($articles){
            //$articles->load('user','category','comments');
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
