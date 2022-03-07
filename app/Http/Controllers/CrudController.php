<?php

namespace App\Http\Controllers;
use App\Models\Crud;
use Illuminate\Http\Request;

use Session;

class CrudController extends Controller
{
    public function showData(Request $request){

        if ($request->has('search')) {
            $showData = Crud::where('name', 'like', '%' . $request->get('search') . '%')   
             ->paginate(5);
        } else {
            $showData = Crud::paginate(5);
        }

        //$showData= Crud::all();
        //$showData= Crud::paginate(5);
        return view('show_data',compact('showData'));
    }

    public function addData(){
        return view('add_data');
    }

    public function storeData(Request $request){
        $rules=[
            'name'=>'required|max:10',
            'email'=>'required|email',
        ];
        $cm = [
            'name.required'=>'Enter Name', 
            'name.max'=>'Must less than 10 character', 
            'email.required'=>'Enter email', 
            'email.email'=>'Enter valid email', 
        ];
        $this->validate($request,$rules,$cm);
        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session:: flash('msg','data added successfull');
        return redirect('/');
    }
    public function editData($id=null)
    {
        $editData = Crud::find($id);
        return view('edit_data',compact('editData'));
    }

    public function updateData(Request $request,$id){
        $rules=[
            'name'=>'required|max:10',
            'email'=>'required|email',
        ];
        $cm = [
            'name.required'=>'Enter Name', 
            'name.max'=>'Must less than 10 character', 
            'email.required'=>'Enter email', 
            'email.email'=>'Enter valid email', 
        ];
        $this->validate($request,$rules,$cm);
        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session:: flash('msg','data updated successfull');
        return redirect('/');
    }

    public function deleteData($id=null){
        $deleteData = Crud::find($id);
        $deleteData->delete();

        Session:: flash('msg','data deleted successfull');
        return redirect('/');
    }
}
