<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdBaseController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function __construct()
    {
        if(!isset($_SESSION['username']))
        {
            header("location:/DoAn1/public/admin/login");
        }
    }
}
