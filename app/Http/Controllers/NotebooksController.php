<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Notebook;
// use App\User;

class NotebooksController extends Controller
{
    public function index()
    {
    	// $notebook= Notebook::all();
    	$user= Auth::user();
    	$notebooks= $user->notebooks;
    	return view('notebooks.index',compact('notebooks'));

    }
    public function create(){
    	return view('notebooks.create');
    }

    public function show($id){
           $notebook = Notebook::findOrFail($id);
           $notes = $notebook->notes;
           return view('notes.index',compact('notes','notebook'));
    }
    public function store(Request $request){
          $dataInput = $request->all();
          // Notebook::create($dataInput);
          $user = Auth::user();
          $user->notebooks()->create($dataInput);

          return redirect('/notebooks');
    }

    public function edit($id){
     // $notebook = Notebook::where('id',$id)->first();
    	$user = Auth::user();
    	$notebook=$user->nootebooks()->find($id);
     return view('notebooks.edit')->with('notebook',$notebook);

    }
    public function update(Request $request ,$id){
    	// $notebook = Notebook::where('id',$id)->first();
    	$user = Auth:: user();
    	$notebook=$user->nootebooks()->find($id);
    	$notebook->update($request->all());
    	return redirect('/notebooks');
    }
    public function delete($id){

    	// $notebook = Notebook::where ('id',$id)->first();
    	$user = Auth:: user();
    	$notebook=$user->nootebooks()->find($id);
    	$notebook->delete();
    	return redirect('/notebooks');
    }
}
