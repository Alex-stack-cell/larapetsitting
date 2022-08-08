<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class PrestationController extends Controller
{
    public function index(){
        return Prestation::all();
    }

    public function show($id){
        return Prestation::find($id);
    }

    public function create(Request $request, $petsitter_id){
        if(auth()->user()->id == $petsitter_id){
            $fields = $request->validate([
                'petsitter_id'=>'integer|required',
                'dateStart'=> 'date|required|date_format:d-m-Y|after:today',
                'dateEnd'=>'date|required|date_format:d-m-Y|after:tomorrow'
            ]);

            $prestation = Prestation::create([
                'petsitter_id' => $fields['petsitter_id'],
                'dateStart' => $fields['dateStart'],
                'dateEnd' => $fields['dateEnd']
            ]);
            
            return [0, "Prestation added"];
        } else {
            return [0, "Query failed :("];
        }
    }

    public function update(Request $request, $id, $petsitter_id){
        if($petsitter_id==auth()->user()->id){
            $prestation = Prestation::find($id);
            $prestation->update($request->all());
            if(!empty($prestation)){
                return [1,"Prestation updated"];
            }
        } else{
            return [0, "Query failed :("];
        }
    }
    
    public function destroy($id, $petsitter_id){
        if($petsitter_id==auth()->user()->id){
            Prestation::destroy($id);
            return [1,"Prestation deleted successfuly"];
        } else {
            return [0, "Query failed :("];
        }
    }
}