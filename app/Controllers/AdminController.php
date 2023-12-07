<?php

namespace App\Controllers;
use App\Models\UserModel;
class AdminController extends BaseController
{
    public function index(): string
    {
        return view('public_layout');
    }

    public function adminDashboard(){

        return view('admin/dashboard/mainDashboard.php');
    }
}