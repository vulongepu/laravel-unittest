<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class HomeController extends Controller
{
    public function index()
    {
        dd(Account::all());
    }
}
