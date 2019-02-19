<?php
namespace  App\Repositories;

use Config;


abstract class Repository{
    protected $menu = false;

    public function get(){
        $builder = $this->menu->select('*');

        return $builder->get();
    }

}