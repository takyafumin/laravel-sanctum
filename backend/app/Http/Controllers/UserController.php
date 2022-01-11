<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * User Controller
 */
class UserController extends Controller
{
    /**
     * ログインユーザ情報画面
     *
     * @param Request $request requestオブジェクト
     * @return void
     */
    public function index(Request $request)
    {
       return view('user.index', [
           'user' => $request->user(),
       ]);
    }
}
