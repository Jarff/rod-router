<?php

class PanelPagesController extends Controller{
    public function login(){
        return self::view('panel/login')->render();
    }
}