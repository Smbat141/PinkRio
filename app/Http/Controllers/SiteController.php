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
        //dd($menu);
        $this->vars = [
            'menus' => $menu,
        ];
        return view($this->template,$this->vars);
    }

    public function getMenu()
    {

        $menu = $this->m_rep->get();
        return $menu;
    }
}
