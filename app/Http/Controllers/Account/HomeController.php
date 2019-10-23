<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/account/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('account.auth:account');
    }

    /**
     * Show the Account dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('account.home');
    }

}