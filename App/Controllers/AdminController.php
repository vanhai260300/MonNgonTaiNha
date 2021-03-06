<?php

namespace App\Controllers;

use \Core\View;
use App\Models\adminModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdminController extends AdBaseController
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::render('Admin/index.php', ['page' => 'home']);
    }
    public function accAdminAction()
    {
        $getAllAd = adminModel::getAll();
        if(isset($_POST['bt-save']))
        {
            $res = $this->insertAdminAction();
            $getAllAd = adminModel::getAll();
            View::render('Admin/index.php', ['page' => 'accAdmin', 'getAllAd' => $getAllAd, 'kq' => $res]);
        }
        
        View::render('Admin/index.php', ['page' => 'accAdmin', 'getAllAd' => $getAllAd]);
    }
    public function insertAdminAction()
    {
            $fullName = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $insertAdmin = adminModel::insertAdmin($fullName, $username, $password, $repassword);
            return $insertAdmin;   
    }
    public function updateAdminAction()
    {
        $id = $_POST['id'];
        $fullName = $_POST['fullname'];
        $username = $_POST['username'];
        echo adminModel::updateAdmin($id, $fullName, $username);
    }
    public static function checkUsernameAction()
    {
        $username = $_POST['username'];
        echo adminModel::getUserName($username);
    }
    public static function deleteAdminAction()
    {
        $id = $_POST['id'];
        echo adminModel::deleteAdmin($id);
    }
}
