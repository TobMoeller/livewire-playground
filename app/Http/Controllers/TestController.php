<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function wizard(): View
    {
        return view('test-view', ['header' => 'Wizard']);
    }
}
