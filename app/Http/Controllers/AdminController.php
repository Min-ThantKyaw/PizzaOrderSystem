<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Profile Details Direct route
    public function details()
    {
        return view('admin.account.details');
    }
    //Direct route to edit page
    public function edit()
    {
        return view('admin.account.edit');
    }
}
