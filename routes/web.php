<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([],function (){

    Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);
    Route::get('/page/{allias}',['uses'=>'PageController@execute','as'=>'page']);
    Route::auth();

});

//Admin panel
//admin
Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){

    Route::get('/',function(){
       if(view()->exists('admin.index')){
           $data=[
               'title'=>'Панель администратора'
           ];
           return view('admin.index',$data);
        }
    });
// /admin/pages
    Route::group(['prefix'=>'pages'],function(){

        Route::get('/',['uses'=>'PagesController@execute','as'=>'pages']);
        // /admin/pages/add
        Route::match(['get','post'],'/add',['uses'=>'ControllerPagesAdd@execute','as'=>'pagesAdd']);
        // /admin/pages/edit/{page}
        Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'ControllerPagesEdit@execute','as'=>'pagesEdit']);

    });
// /admin/portfolios
    Route::group(['prefix'=>'partfolios'],function(){

        Route::get('/',['uses'=>'PortfolioController@execute','as'=>'partfolio']);
        // /admin/portfolios/add
        Route::match(['get','post'],'/add',['uses'=>'ControllerPortfolioAdd@execute','as'=>'portfolioAdd']);
        // /admin/pages/edit/{portfolio}
        Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'ControllerPortfolioEdit@execute','as'=>'portfolioEdit']);

    });

    // /admin/services
    Route::group(['prefix'=>'services'],function(){

        Route::get('/',['uses'=>'ServiceController@execute','as'=>'service']);
        // /admin/services/add
        Route::match(['get','post'],'/add',['uses'=>'ControllerServiceAdd@execute','as'=>'serviceAdd']);
        // /admin/services/edit/{service}
        Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'ControllerServiceEdit@execute','as'=>'serviceEdit']);

    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
