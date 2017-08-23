<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\People;
use App\Service;
use App\Portfolio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function execute(Request $request){

        if($request->isMethod('POST')){

            $messages= [
                'required'=>'Поле :attribute обязательное к заполнению',
                'email'=>'Поле :attribute должно соответствовать Email адресу'
            ];

            $this->validate($request,[
                'name'=>'required|max:255',
                'email'=>'required|email',
                'text' =>'required'
            ],$messages);
            $data = $request->all();
            // SwiftMail
            $result = Mail::send('site.mail',['data'=>$data],function($message) use ($data){

                $mailAdmin = env('MAIL_ADMIN');
                $message->from($data['email'],$data['name']);
                $message->to($mailAdmin,'Mr. Admin')->subject('Question');

            });
            if($result){
                return redirect()->route('home')->with('status','Email отправлен');
            }


        };

        $pages = Page::all();
        $portfolios = Portfolio::get(['name','filter','img']);
        $people = People::where('id','<',20)->get();
        $services = Service::take(6)->get();

        $tags = DB::table('portfolios')->distinct()->pluck('filter');
        $menu = array();
        foreach ($pages as $page) {
            $item = array('title' => $page->name,'alias'=>$page->alias);
            array_push($menu,$item);
        }

        $item=array('title'=>'Услуги','alias'=>'services');
        array_push($menu,$item);
        $item=array('title'=>'Портфолио','alias'=>'Portfolio');
        array_push($menu,$item);
        $item=array('title'=>'Сотрудники','alias'=>'team');
        array_push($menu,$item);
        $item=array('title'=>'Контакты','alias'=>'contact');
        array_push($menu,$item);

        return view('site.index ',array(
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'people' => $people,
            'tags' => $tags
        ));
    }
}
