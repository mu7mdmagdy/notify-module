<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function pushNotification(Request $request)
    {
        $content = $request->notify_content;

        if (!empty($content)) {
            event(new NewNotification($content));
        }
    }
}
