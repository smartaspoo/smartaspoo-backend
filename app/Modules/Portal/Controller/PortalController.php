<?php

namespace App\Modules\Portal\Controller;

use App\Handler\JsonResponseHandler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index(Request $request){
        return view('Portal::index');
    }
}