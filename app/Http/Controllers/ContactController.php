<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\Mail;

class ContactController extends SiteController
{
    public function __construct(){

        parent::__construct(new \App\Repositories\MenusRepository(new Menu));

        $this->bar='left';
        $this->template=env('THEME').'.contact';

    }


    public function index(){


        $title = $this->title = 'Contacts';

        $menu = $this->getMenu();

        $this->vars = [
            'menus' => $menu,
            'bar' => $this->bar,
            'title' => $title,
        ];




        return $this->renderOutPut();
    }


    public function store(ContactRequest $request){
        if($request->isMethod('post')){
            $data = $request->all();


             Mail::send(env('THEME').'.mail',['data'=>$data],function ($message) use( $data) {
                $mail_admin = env('MAIL_USERNAME');
                $message->to($mail_admin)->subject('Question');
                $message->from($data['email'],$data['name']);
            });
            if(Mail::failures()){
                return redirect()->route('contacts')->with('message','Email not send');
            }
            return redirect()->route('contacts')->with('message','Email  send');
        }
    }


    public function getMenu(){

        $menu = $this->m_rep->get();
        return $menu;
    }

}
