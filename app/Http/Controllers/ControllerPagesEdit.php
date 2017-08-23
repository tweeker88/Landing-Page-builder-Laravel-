<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class ControllerPagesEdit extends Controller
{
    public function execute(Page $page,Request $request){

        if($request->isMethod('DELETE')){
            $page->delete();
            return redirect('admin')->with('status','Страница удалена');
        }

        if($request->isMethod('POST')){
            $input = $request->except('_token');
            $validator = \Validator::make($input,[
                'name'=>'required|max:255',
                'alias'=>'required|max:255|unique:pages,alias,'.$input['id'],
                'text'=>'required'
            ]);
            if($validator->fails()){
                return redirect()->route('pagesEdit',['page'=>$input['id']])->withErrors($validator);
            }
            if($request->hasFile('img')){

                $file=$request->file('img');
                $file->move(public_path('img'),$file->getClientOriginalName());
                $input['img'] = $file->getClientOriginalName();

            }else{
                $input['img'] = $input['old_img'];
            }
            unset($input['old_img']);
            $page->fill($input);
            if($page->update()){
                return redirect('admin')->with('Status','Страница обновлена');
            }
        }

        //   $page = Page::find($id);
        $old = $page->toArray();
        if(view()->exists('admin.pages_edit')){
            $data=[
                'title'=>'Редактирование страницы - '.$old['name'],
                'data'=>$old
            ];
            return view('admin.pages_edit',$data);
        }

    }
}
