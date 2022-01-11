<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * User API Controller
 */
class UserController extends Controller
{
    /**
     * ユーザ一覧エンドポイント
     *  - /api/
     *
     * @return void
     */
    public function index()
    {
        return User::all();
    }
}
