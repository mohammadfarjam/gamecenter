<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'verified', 'isAdmin']], function () {
    Route::prefix('/administrator')->group(function () {
        Route::get('/', 'Backend\MainController@index');
        Route::resource('/access', 'Backend\AccessController');
        Route::resource('/posts', 'Backend\PostController');
        Route::post('photos/upload', 'Backend\PhotoController@upload')->name('photos.upload');
        Route::post('photos_desc/upload', 'Backend\PhotoDescController@upload')->name('photos_desc.upload');
        Route::resource('categories', 'Backend\CategoryController');
        Route::resource('categories_newest', 'Backend\CategoryNewestController');
        Route::post('video/upload', 'Backend\VideoController@upload')->name('video.upload');
        Route::post('delete_child_category', 'Backend\DeleteChildCategoryController@delete_child_category')->name('delete.child.category');
        Route::resource('menu', 'Backend\MenuController');
        Route::resource('comments','Backend\CommentController');
    });

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/', 'Frontend\HomeController@index');
Route::get('/details/{slug}', 'Frontend\DetailController@index')->name('detail.post');
Route::post('get_attr_category_new', 'Frontend\GetAttrCategoryNewController@getAttrCategory')->name('getAttrCategory');
Route::post('get_more_attr_category_new', 'Frontend\GetAttrCategoryNewController@getmoreAttrCategory')->name('getmoreAttrCategory');
Route::post('get_data_sub_cat','Frontend\GetDataSubCatController@get_sub_data')->name('get_data_sub_cat');
Route::post('get_first_time_video','Frontend\GetFirstTimeVideoController@get_first_time_video')->name('get_first_time_video');
Route::resource('comment','Frontend\CommentController');


