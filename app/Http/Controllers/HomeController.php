<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $visitorCount = Visitor::count();
        return view('home');
    }
}
