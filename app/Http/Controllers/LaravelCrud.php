<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\crud;

class LaravelCrud extends Controller
{
    
   /*  function index(){
        $data = array('list'=>DB::table('cruds')->simplePaginate(10)
              ->orderByRaw('created_at DESC')
              ->get()
        );
        
        return view('crud.index', $data);
    } */
	
	
	function index(){
		$data= Crud::paginate(10);
		return view('crud.index', ['list'=> $data]);
	}
    
    /*function add(Request $request){ // for show data that check for pass
        return $request->input();
    }*/ 
    
     function add(Request $request){
		 
        $request->validate([
            'name'=>'required',
            'colour'=>'required',
            'email'=>'required|email|unique:cruds',
			'phone'=>'required|unique:cruds',
            'address'=>'required',
        ]);
    
    
    $query= DB::table('cruds')->insert([
        'name'=>$request->input('name'),
        'colour'=>$request->input('colour'),
        'email'=>$request->input('email'),
        'phone'=>$request->input('phone'),
        'address'=>$request->input('address')
    ]);
        
        if($query)
        {
            return back()->with('success', 'Data has been successfully inserted');
        }
        else
        {
            return back()->with('fail', 'Something went wrong');
        }
    
    }
    
    
    function edit($id){
        $row =DB::table('cruds')
            ->where('id', $id)
            ->first();
        
        $data =[
            'Info' =>$row,
            'Title'=>'Edit Page'
             
        ];
        
        
        return view('crud.edit', $data);
    }
    
    
    function update(Request $request)
	{
        $request->validate([
            
            'name'=>'required',
            'colour'=>'required',
            'email'=>'required|email',
            'phone'=>'required',		
            'address'=>'required'
            
        ]);
        
        $updating =DB::table('cruds')
            ->where('id', $request->input('cid'))
            ->update([
                'name'=>$request->input('name'),
                'colour'=>$request->input('colour'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'address'=>$request->input('address')
                
            ]);
        
       
        if($updating)
        {
            return redirect('crud')->with('success', 'Data has been successfully Updated');
        }
        else
        {
            return redirect('crud')->with('fail', 'Something went wrong');
        }         
    }
    
    
    
    function delete($id){

    $delete= DB::table('cruds')
           ->where('id', $id)
           ->delete();
    
        if($delete)
        {
            return back()->with('success', 'Data has been successfully delated');
        }
        else
        {
            return back()->with('fail', 'Something went wrong');
        }
        
    return redirect('crud');
        
    }
}



