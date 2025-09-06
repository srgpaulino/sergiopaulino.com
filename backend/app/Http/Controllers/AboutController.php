<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{

    public function show()
    {
        return About::where('user_id', 1)->firstOrFail();
    }

}
