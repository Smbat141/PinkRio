<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
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
        //$navigation = view(env('THEME') . '.navigation')->render();
        $slideItems = $this->getSliders();
        //dd($slideItems);
        $this->vars = [
            'menus' => $menu,
            'sliders' => $slideItems,
        ];
        //dd($this->vars);
        return view($this->template,$this->vars);
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
