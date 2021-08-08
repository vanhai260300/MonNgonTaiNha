<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class CCHQuanLyMonAnController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render('Client/index.php', ['page'=>'QuanLyMonAn', 'title'=>"Quản Lý Món Ăn"]);
    }
}
