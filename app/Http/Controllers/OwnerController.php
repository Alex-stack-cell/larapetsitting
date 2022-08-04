<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index(){
        return Owner::all();
    }

    public function show($id){
        return Owner::find($id);
    }


}