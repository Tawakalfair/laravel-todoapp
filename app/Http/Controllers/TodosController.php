<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
   public function index(){
     $todos= Todo::All();
     return view('todos')->with('todos',$todos);
   }
   public function store(Request $request){
     $todo= New Todo;

     $todo->todo = $request->todo;
     $todo->save();
     Session::flash('success','berhasil membuat todo');
     return redirect()->back();
   }

   public function delete($id){
     $todo= Todo::find($id);

     $todo->delete();
     Session::flash('success','berhasil menghapus todo');
     return redirect()->back();

   }
   public function update($id){
     $todo = Todo::find($id);

     return view('update')->with('todo',$todo);
   }

   public function save(Request $request,$id){
     $todo = Todo::find($id);

     $todo->todo = $request->todo;
     $todo->save();
     Session::flash('success','berhasil mengupdate todo');
     return redirect()->route('todos');

   }
   public function complete($id){
     $todo = Todo::find($id);

     $todo->completed = 1;
     $todo->save();
     Session::flash('success','completed todo');
     return redirect()->back();
   }
}
