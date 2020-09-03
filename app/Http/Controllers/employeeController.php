<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;


class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employee = employee::all();
        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tbl =new employee();
        $tbl->id =$request->id;
        $tbl->name =$request->name;
        $tbl->email = $request->email;
        $tbl->phone= $request->phone;
        $tbl->Image = $request->Image;
        $tbl->save();

        return redirect()->route('employee.index')->with('info','Employee Added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = employee::all();
        return view('employee.index',compact('employee',$employee));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = employee::find($id);

        return view ('employee.edit',compact('employee',$employee));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee_id)
    {
        $employee = employee::find($request->input('id'));
        $employee->name =  $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->image = $request->input('image');
       
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'employee updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('success','contact deleted');
    }
}
