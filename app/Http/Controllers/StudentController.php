<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    
    function index(){
        $data = array('list'=>DB::table('members')
              ->orderByRaw('created_at DESC')
              ->get()
        );
        
        return view('member.index', $data);
    }
    
    /*function add(Request $request){ // for show data that check for pass
        return $request->input();
    }*/ 
    
     function add(Request $request){
        $request->validate([
            'name'=>'required',
			'email'=>'required|email|unique:members',
            'colour'=>'required',
			'phone'=>'required|unique:members',
			'state'=>'required',
			'city'=>'required',
			'country'=>'required',
            'address'=>'required',
        ]);
    
    
    $query= DB::table('members')->insert([
        'name'=>$request->input('name'),
		'email'=>$request->input('email'),
        'colour'=>$request->input('colour'),
        'phone'=>$request->input('phone'),
        'state'=>$request->input('state'),
        'city'=>$request->input('city'),
        'country'=>$request->input('country'),
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
        $row =DB::table('members')
            ->where('id', $id)
            ->first();
        
        $data =[
            'Info' =>$row,
            'Title'=>'Edit Page'
             
        ];
        
        
        return view('member.edit  ', $data);
    }
    
    
    function update(Request $request){
        $request->validate([
            
            'name'=>'required',
			'email'=>'required|email',
            'colour'=>'required',
            'phone'=>'required',		
            'state'=>'required',		
            'city'=>'required',		
            'country'=>'required',		
            'address'=>'required'
            
        ]);
        
        $updating =DB::table('members')
            ->where('id', $request->input('cid'))
            ->update([
                'name'=>$request->input('name'),
				'email'=>$request->input('email'),
                'colour'=>$request->input('colour'),
                'phone'=>$request->input('phone'),
				'state'=>$request->input('state'),
				'city'=>$request->input('city'),
                'country'=>$request->input('country'),
                'address'=>$request->input('address')
                
            ]);
        
       
        if($updating)
        {
            return redirect('member')->with('success', 'Data has been successfully Updated');
        }
        else
        {
            return redirect('member')->with('fail', 'Something went wrong');
        }         
    }
    
    
    
    function delete($id){

    $delete= DB::table('members')
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
        
    return redirect('member');
        
    }
}



