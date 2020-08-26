<?php

class Pages extends controller
{

    public function __construct()
    {


    }

    public function index()
    {

        if (Pages::isLoggedIn()) {

            Pages::redirect('posts');

        }


        $data = [
            'title' => 'wecolme',

        ];
        $this->view('pages/index', $data);


    }

    public function about()
    {
        $this->view('pages/about', ['title' => 'about page']);
    }

}
