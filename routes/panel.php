<?php

Route::get('/panel', function(Request $request){
    PanelPagesController::setRequest($request);
    PanelPagesController::login();
});
Route::post('/login', function(Request $request){
    print_r($request);
});