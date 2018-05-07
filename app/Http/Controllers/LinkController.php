<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function show(Link $link)
    {
        return redirect()->to($link->url);
    }
}
