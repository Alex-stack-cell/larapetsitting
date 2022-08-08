<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return Comment::all();
    }

    public function show($id){
        return Comment::find($id);
    }

    public function create(Request $request){
        $fields = $request->validate([
            'owner_id' => 'nullable|string',
            'petsitter_id' =>'nullable|string',
            'prestation_id' => 'required|integer',
            'title'=> 'required|string',
            'description'=> 'required|string',
            'score'=> 'required|integer'
        ]);

        $comment = Comment::create([
            'owner_id' =>  $fields['owner_id'],
            'petsitter_id' => $fields['petsitter_id'],
            'prestation_id' => $fields['prestation_id'],
            'title'=> $fields['title'],
            'description'=> $fields['description'],
            'score'=> $fields['score']
        ]);

        return [1,'Comment added'];
    }

    public function delete($id){
        return Comment::destroy($id);
    }

    public function update(Request $request, $id){
        $comment = Comment::find($id);

        $comment->update($request->all());
    }
}