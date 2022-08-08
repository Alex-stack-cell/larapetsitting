<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\OwnerCommentVue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    /**
     * Retrieve all the pet owners 
     *
     * @return void
     */
    public function index(){
        return Owner::all();
    }

    public function info(){
        $test = OwnerCommentVue::select("*")
        ->get()
        ->toArray();
        dd($test);
        // return OwnerCommentVue::all();
    }
    /**
     * Find a specific owner based on its id
     *
     * @param [integer] $id
     * @return void
     */
    public function show($id){
        return Owner::find($id);
    }

    /**
     * Delete an owner
     *
     * @param [integer] $id
     * @return void
     */
    public function destroy($id){
        if(auth()->user()->id == $id){
            Owner::destroy($id);
            return [1,"User deleted successfuly"];
        }
        return [0,"Your are not allowed to delete this user !"];
    }

    /**
     * Update owner's info
     *
     * @param Request $request
     * @param [integer] $id
     * @return void
     */
    public function update(Request $request, $id){
        $owner = Owner::find($id);
        $owner->update($request->all() && auth()->user()->id == $id);

        if(!empty($owner)){
            return [1,'Owner updated !'];
        } else {
            return [0,'Query has failed :('];
        }
    }

    /**
     * Search for a pet owner
     *
     * @param [type] $owner
     * @return void
     */
    public function search($owner){
        return Owner::where('lastName', 'like','%'.$owner.'%')
                    ->orWhere('firstName','like','%',$owner.'%')
                    ->get();
    }
}