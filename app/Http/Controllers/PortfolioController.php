<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Repositories\ArticlesRepository;
use Illuminate\Http\Request;
use App\Repositories\PortfoliosRepository;
use App\Menu;

class PortfolioController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep,ArticlesRepository $a_rep){

        parent::__construct(new \App\Repositories\MenusRepository(new Menu));

        $this->bar='no';
        $this->p_rep=$p_rep;
        $this->a_rep=$a_rep;

        $this->template=env('THEME').'.portfolios';

    }


    public function getPortfolios($paginate = false){
        if($paginate){
            $portfolio = $this->p_rep->get('*',false);
        }
        else{
            $portfolio = $this->p_rep->get('*',true);

        }

        return $portfolio;
    }


    public function getMenu(){

        $menu = $this->m_rep->get();
        return $menu;
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


    public function index($cat_alias = false){

        $title = $this->title = 'Portfolio';

        $menu = $this->getMenu();

        $portfolios = $this->getPortfolios();


        foreach ($portfolios as $portfolio){
            $portfolio->img = json_decode($portfolio->img);
        }



        $this->vars = [
            'menus' => $menu,
            'portfolios' => $portfolios,
            'bar' => $this->bar,
            'title' => $title,
        ];



        return $this->renderOutPut();
    }





    public function show($alias = false){

        $title = $this->title = 'Articles';

        $alias = Portfolio::where('alias',$alias)->first()->alias;

        $articles  = $this->getArticles();

        $hash = false;



        $menu = $this->getMenu();

        $portfolios = $this->getPortfolios(true);


        foreach ($articles as $article){
            $article->img = json_decode($article->img);
        }

        foreach ($portfolios as $portfolio){
            $portfolio->img = json_decode($portfolio->img);
        }



        $this->vars = [
            'menus' => $menu,
            'portfolios' => $portfolios,
            'bar' => $this->bar,
            'articles' => $articles,
            'title' => $title,
            'hash' => $hash,
            'alias' => $alias,
        ];

        return view(env('THEME').'.portfolio',$this->vars);
    }

}


