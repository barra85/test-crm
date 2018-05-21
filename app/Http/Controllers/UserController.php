<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $oList = User::where(['sales_manager_id' => 0])->get();
        return view('home', ['users' => $oList]);
    }

    public function profile($p_iId = null)
    {
        $iId = (!empty($p_iId)) ? $p_iId : \Auth::user()->id;
        $oUser = User::find($iId);

        return view('my-profile', ['user' => $oUser]);
    }
}
