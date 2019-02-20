<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Repositories\ArticlesRepository;
use App\Repositories\Repository;
use App\Repositories\SlidersRepository;
use App\Repositories\PortfoliosRepository;
use Illuminate\Http\Request;

class IndexController extends SiteController
{

    public function __construct(SlidersRepository $s_rep,PortfoliosRepository $p_rep,ArticlesRepository $a_rep){

        parent::__construct(new \App\Repositories\MenusRepository(new Menu));

        $this->bar='right';
        $this->s_rep=$s_rep;
        $this->p_rep=$p_rep;
        $this->a_rep=$a_rep;
        $this->template=env('THEME').'.index';


    }


    public function index(){
        return $this->renderOutPut();
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
