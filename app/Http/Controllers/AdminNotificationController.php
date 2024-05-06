<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNotificationController extends Controller
{
    function index(){
        $this->data['notifications'] = auth()->guard('admin')->user()->notifications()->latest()->get();
        dd($this->data);
    }
}
