<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use Illuminate\Http\Request;

class ShowPack extends Controller
{
    public function show(Pack $pack)
    {

        return view('show.showPack', compact('pack'));
    }
}
