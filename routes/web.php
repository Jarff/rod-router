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

Route::get('/', function(Request $request) {
    PagesController::setRequest($request);
    PagesController::index();
});
Route::get('/about', function(Request $request) {
    PagesController::setRequest($request);
    PagesController::about();
});
Route::get('/pricing', function(Request $request){
    PagesController::setRequest($request);
    PagesController::pricing();
});
Route::get('/contact', function(Request $request){
    PagesController::setRequest($request);
    PagesController::contact();
});
Route::get('/blog', function(Request $request) {
    PagesController::setRequest($request);
    PagesController::blog();
});
Route::get('/blog/{blog_id}', function(Request $request){
    PagesController::setRequest($request);
    $blog_id = $request->getAttribute('blog_id');
    PagesController::blog($blog_id);
});

//Siempre debe estar al final
Route::error(404, function (Request $request){
    PagesController::missing();
});