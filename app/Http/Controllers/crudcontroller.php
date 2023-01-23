<?php

namespace App\Http\Controllers;
use app\Http\Controllers\crudcontroller;
use App\Models\Crud;
use Session;

use Illuminate\Http\Request;

class crudcontroller extends Controller
{
    public function showdata(){
        $showdata = crud :: all();
        return view ('show_data',compact('showdata'));
    }
    public function adddata(){
        return view ('add_data');
    }
    public function storedata(Request $request){
         $rules=[
            'name'=>'required|max:10',
            'email'=>'required|email',
         ];
         $cm=[
            'name.required'=>'enter your name',
            'name.max'=>'Enter lower than 10 characters',
            'email.required'=>'enter your email',
            'email.email'=>'enter valid email',
         ];
         $this->validate($request,$rules,$cm);
         $crud=new crud();
         $crud->name=$request->name;
         $crud->email=$request->email;
         $crud->save();
         Session::flash('msg','data added succesfully');

        return redirect('/');
    }
    public function editdata($id=null){
        $editdata=crud::find($id);
        return view ('edit_data',compact('editdata'));

    }
    public function updatedata(Request $request,$id){
        $rules=[
           'name'=>'required|max:10',
           'email'=>'required|email',
        ];
        $cm=[
           'name.required'=>'enter your name',
           'name.max'=>'Enter lower than 10 characters',
           'email.required'=>'enter your email',
           'email.email'=>'enter valid email',
        ];
        $this->validate($request,$rules,$cm);
        $crud=crud::find($id);
        $crud->name=$request->name;
        $crud->email=$request->email;
        $crud->save();
        Session::flash('msg','data update succesfully');

       return redirect('/');
    }
    public function deletedata($id=null){
        $deletedata=crud::find($id);
        $deletedata->delete();
        Session::flash('msg','data deleted succesfully');
        return redirect('/');

    }
}
