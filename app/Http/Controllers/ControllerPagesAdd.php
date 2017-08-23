<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
class ControllerPagesAdd extends Controller
{
    public function execute(Request $request){

        if($request->isMethod('POST')){
            $input = $request->except('_token');
            $message = [
                'required'=>'Вы не заполнили поле :attribute',
                'unique'=>'Поле :attribute должо быть уникальным'
            ];
            $validator = \Validator::make($input,[
                'name'=>'required|max:255',
                'alias'=>'required|unique:pages|max:255',
                'text'=>'required'
            ],$message);
            if($validator->fails()){
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }
            $file = $request->file('img');
            if($request->hasFile('img'))
            $input['img'] = $file->getClientOriginalName();
            $file->move(public_path('/img'),$input['img']);
           $page = new Page();
            $page->fill($input);
            if($page->save()){
                return redirect('admin')->with('status','Страница добавлена');
            }
        }


        if(view()->exists('admin.pages_add')){
            $data = [
                'title'=>'Новая страница'
            ];
            return view('admin.pages_add',$data);
        }else{
            abort(404);
        }

    }
}
