<?php

namespace App\Http\Controllers;

use App\Models\Advertisment;
use Illuminate\Http\Request;

class AdvertismentsController extends Controller
{
    public function index(){
        return $this->all();
    }

    public function show($id){
        return $this->find($id);
    }

    public function create(Request $request, $owner_id){
        if(auth()->user()->id == $owner_id){
            $fields = $request->validate([
                'owner_id' => 'required',
                'prestation_id' => 'nullable|integer|unique',
                'title' => 'required|string',
                'tags' => 'required|string',
                'description' => 'required|string',
                'postCode' => 'postal_code:NL,FR,BE',
                'city' => 'required|string',
                'dateStart' => 'date|required|date_format:d-m-Y|after:today',
                'dateEnd' => 'date|required|date_format:d-m-Y|after:tomorrow'
              ]);
              
              $advertisment = Advertisment::create([
                'owner_id' => $fields['owner_id'],
                'prestation_id' => $fields['prestation_id'],
                'title' => $fields['title'],
                'tags' => $fields['tags'],
                'description' => $fields['description'],
                'postCode' => $fields['postCode'],
                'city' => $fields['city'],
                'dateStart' => $fields['dateStart'],
                'dateEnd' => $fields['dateEnd']
            ]);
            return [1,'Advertisement created sucessfully'];
        } else {
            return [0,'Error, please try again'];
        }
    }

    public function delete($advertisment_id,$owner_id){
        if(auth()->user()->id == $owner_id){
            Advertisment::destroy($advertisment_id);
            return [1, 'Advertisment deleted sucessfully !'];
        } else {
            [0, 'Deletion failed, please try again'];
        }
    }

    public function update(Request $request,$id){
        $advertisment = Advertisment::find($id);
        $advertisment->update($request->all());

        if(!empty($advertisment)){
            return [1,"Advertisment updated"];
        } else {
            return [0, "Query failed :("];
        }
    }
}