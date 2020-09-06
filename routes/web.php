<?php


Route::get('/sitemap.xml','HomeController@sitemap')->name('sitemap');

Route::get('/','HomeController@index')->name('page_main');
Route::get('/iso','HomeController@iso')->name('iso');
Route::get('/product','HomeController@product')->name('product');
Route::get('/laboratory','HomeController@laboratory')->name('laboratory');
Route::get('/gallery','HomeController@gallery')->name('gallery');
Route::post('contact-me', ['as' => 'contact_send', 'uses' => 'HomeController@contactSend']);

Route::group(['namespace' => 'Admin','middleware' => ['auth:web' , 'checkAdmin'], 'prefix' => 'admin'],function ()
{
    Route::resource('/','AdminController');
    Route::resource('/images','ImageController');
    Route::POST('/chooseimage/','ImageController@chooseimage')->name('chooseimage');
    Route::POST('/chooseiso/','IsoController@chooseiso')->name('chooseiso');
    Route::POST('/settingg/','AdminController@settingg')->name('settingg');
    Route::resource('/about','AboutController');
    Route::resource('/iso','IsoController');
    Route::resource('/send','SendController');
    Route::resource('/laboratory','LaboratoryController');
    Route::resource('/product','ProductController');
    Route::resource('/catalog','catalogController');
    Route::get('/catlog','catalogController@catlogget')->name('catlogget');
    Route::post('/catlog','catalogController@catlogpost');
    Route::resource('/section','SectionController');
    Route::get('/send-all','SendController@all')->name('send_all');
    Route::get('/send-state','SendController@state')->name('send_state');
});

Auth::routes();

Route::get('/home', 'HomeController@indexx')->name('home');