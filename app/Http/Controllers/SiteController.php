<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;

    protected $template;

    protected $vars = [];

    protected $contentRightBar = false;
    protected $contentLeftBar = false;

    protected $bar = false;

    public function __construct(MenusRepository $m_rep)
    {
        $this->m_rep = $m_rep;
    }


    public function renderOutPut()
    {
        $menu = $this->getMenu();

        $slideItems = $this->getSliders();

        $portfolios = $this->getPortfolios();

        $articles  = $this->getArticles();
        foreach ($articles as $article){
             $article->img = json_decode($article->img);
        }
        //dd($articles->img);

        $this->vars = [
            'menus' => $menu,
            'sliders' => $slideItems,
            'portfolios' => $portfolios,
            'articles' => $articles,
        ];
        //dd($this->vars);
        return view($this->template,$this->vars);
    }


    public function getArticles(){
        $articles = $this->a_rep->get();

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


    public function getSliders(){

        $sliders = $this->s_rep->get();
        return $sliders;
    }

}
