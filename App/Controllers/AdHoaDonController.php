<?php

namespace App\Controllers;

use \Core\View;
use App\Models\hoaDonModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdHoaDonController extends AdBaseController
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getListHoaDon = hoaDonModel::getAll();
        //var_dump($getListHoaDon); die();
        View::render('Admin/index.php', ['page' => 'hoaDon', 'listHoaDon' => $getListHoaDon] );
    }
}