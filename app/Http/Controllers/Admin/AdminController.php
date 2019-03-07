<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Lavary\Menu\Menu;

class AdminController extends Controller
{
    protected $p_rep;
    protected $a_rep;
    protected $user;
    protected $template;
    protected $content = false;
    protected $title;
    protected $vars = [];


    public function __construct(){

        $this->user=Auth::user();

    }


    public function renderOutput(){
        $this->vars = array_add($this->vars,'title',$this->title);

        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.admin.navigation')->with('menu',$menu)->render();

        $this->vars = array_add($this->vars,'navigation',$navigation);


        $footer = view(env('THEME').'.admin.footer')->render();
        $this->vars = array_add($this->vars,'footer',$footer);
        return view($this->template)->with($this->vars);



    }

    public function getMenu(){
        $menu = new Menu();
        return $menu->make('adminMenu',function ($menu){
           $menu->add('Articles',array('route'=>'adminArticles.index'));
           $menu->add('Portfolio',array('route'=>'adminArticles.index'));
           $menu->add('Menu',array('route'=>'adminArticles.index'));
           $menu->add('Users',array('route'=>'adminArticles.index'));
           $menu->add('Privilege',array('route'=>'adminArticles.index'));
        });
    }

}