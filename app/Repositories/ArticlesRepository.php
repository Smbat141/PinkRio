<?php
namespace  App\Repositories;

use App\Article;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Facades\Image;

class ArticlesRepository extends Repository{

    public function __construct(Article $article){
        $this->model = $article;
    }

    public function addArticle($request){

        $data = $request->except('_token','article_image');
        if($request->hasFile('article_image')){

            $image = $request->file('article_image');

            if($image->isValid()){
                $str = str_random(8);

                $obj = new \stdClass();

                $obj->mini = $str.'_mini.jpg';
                $obj->max = $str.'_max.jpg';
                $obj->path = $str.'.jpg';

                $img = Image::make($image);

                $img->fit(Config::get('settings.image')['width'],
                    Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->path);

                $img->fit(Config::get('settings.articles_img')['max']['width'],
                    Config::get('settings.articles_img')['max']['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->max);

                $img->fit(Config::get('settings.articles_img')['mini']['width'],
                    Config::get('settings.articles_img')['mini']['width'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->mini);

                $data['img'] = json_encode($obj);
                $this->model->fill($data);
                if($request->user()->article()->save($this->model)){
                    return ['message' => 'Article added'];
                }

            }
        }
    }

    public function updateArticle($request,$article){

        $data = $request->except('_token','article_image','_method');
        if($request->hasFile('article_image')){

            $image = $request->file('article_image');

            if($image->isValid()){
                $str = str_random(8);

                $obj = new \stdClass();

                $obj->mini = $str.'_mini.jpg';
                $obj->max = $str.'_max.jpg';
                $obj->path = $str.'.jpg';

                $img = Image::make($image);

                $img->fit(Config::get('settings.image')['width'],
                    Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->path);

                $img->fit(Config::get('settings.articles_img')['max']['width'],
                    Config::get('settings.articles_img')['max']['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->max);

                $img->fit(Config::get('settings.articles_img')['mini']['width'],
                    Config::get('settings.articles_img')['mini']['width'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->mini);

                $data['img'] = json_encode($obj);

                $article->fill($data);
                if($article->update()){
                    return ['message' => 'Article updated'];
                }

            }
        }
    }



    public function destroyArticle($article){
        $article->comment()->delete();
        if($article->delete()){
            return ['message' => 'Article deleted'];
        }
    }




}