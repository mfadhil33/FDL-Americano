<?php

namespace FdlAmericano\MhdFadhilAp\Controller;

use FdlAmericano\MhdFadhilAp\App\view;

Class HomeController{

    function index(): void{

       view::render('Home/index', [
    "title" => "php login management"
    ]);
    }


}