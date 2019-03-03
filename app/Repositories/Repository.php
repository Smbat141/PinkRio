<?php
namespace  App\Repositories;

use Config;


abstract class Repository{
    protected $model = false;

    public function get($select = '*',$pagination = false,$where = false){

        $builder = $this->model->select($select);

        if($where){
             $builder->where($where[0],$where[1]);
        }

        if($pagination){
            return $builder->paginate(2);
        }



        return $builder->get();
    }

}