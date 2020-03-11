<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Http\Requests\storeRequest;
class testController extends Controller
{
     public function test(Request $r){
       return 'test';
     }
}
 
