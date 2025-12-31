<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    public function index()
    {
        dd(Auth::user());
        return view('welcome', ['message' => "Test Controller Authenticated Access"]);
    }
}
