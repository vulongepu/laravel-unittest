<?php

namespace Drag\Account\Controllers;

use Illuminate\Http\Request;
use Drag\Account\Models\Account;

class AccountController
{
    public function index()
    {
        dd(Account::all());
    }
}
