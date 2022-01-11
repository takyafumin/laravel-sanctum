<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
