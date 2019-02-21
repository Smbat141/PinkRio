<?php
namespace  App\Repositories;

use Config;


abstract class Repository{
    protected $model = false;

    public function get($select = '*',$pagination = false){

        $builder = $this->model->select($select);

        if($pagination){
            return $builder->paginate(2);
        }

        return $builder->get();
    }

}