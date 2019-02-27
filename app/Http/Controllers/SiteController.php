<?php

namespace App\Http\Controllers;

use App\Repositories\MenusRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;
use app\User;
use App\Category;
use App\Comment;
class SiteController extends Controller
{

    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;
    protected $c_rep;



    protected $title;

    protected $template;

    protected $vars = [];

    protected $contentRightBar = false;
    protected $contentLeftBar = false;

    protected $bar = 'false';

    public function __construct(MenusRepository $m_rep)
    {
        $this->m_rep = $m_rep;
    }


    public function renderOutPut()
    {

        return view($this->template,$this->vars);
    }


}
