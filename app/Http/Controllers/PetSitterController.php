<?php

namespace App\Http\Controllers;

use App\Models\Petsitter;
use Illuminate\Http\Request;

class PetSitterController extends Controller
{
    /**
     * Get all pet sitters
     *
     * @return void
     */
    public function index(){
        return Petsitter::all();
    }

    /**
     * Get pet sitter by its id
     *
     * @param [type] $id
     * @return void
     */
    public function show($id){
        return Petsitter::find($id);
    }

    /**
     * Delete a petsitter
     *
     * @param [integer] $id
     * @return void
     */
    public function destroy($id){
        if(auth()->user()->id == $id){
            Petsitter::destroy($id);
            return [1,"User deleted successfuly"];
        }
        return [0,"Your are not allowed to delete this user !"];
    }

    /**
     * Update a petsitter
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request, $id){
        $petsitter = Petsitter::find($id);
        $petsitter->update($request->all());

        if(!empty($petsitter) && auth()->user()->id == $id){
            return [1,'Pet sitter updated'];
        } else {
            return [0, 'Query has failed :('];
        }
    }

    /**
     * Find a petsitter by its lastname or firstname 
     *
     * @param [type] $petsitter
     * @return void
     */
    public function search($petsitter){
        return Petsitter::where('lastName','like','%'.$petsitter.'%')
                        ->orWhere('firstName','like','%'.$petsitter.'%')
                        ->get();
    }
}