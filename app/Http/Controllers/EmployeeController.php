<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\Employee;
use App\Models\EmpDetail;
use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function getEmployee()
    {
        $employess = Employee::with('empdetail')->get()->toArray();
     
        return view("employee.list", compact("employess"));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $input = $request->all();

        $data = Employee::create($input);

        $data->save();
        $sql="insert into emp_details (emp_id,cmpname,salary,exp,fromyear,toyear) values ";
        //  dd(count($request->cmpname));
          for($i=0;$i<count($request->cmpname);$i++){
            $rows[]="('{$data->id}','{$request->cmpname[$i]}','{$request->salary[$i]}',
            '{$request->exp[$i]}',
            '{$request->fromyear[$i]}',
            '{$request->toyear[$i]}'
            )";
          }
          $sql.=implode(",",$rows);
        //  dd($sql);
          DB::statement($sql);
         // $sql.=implode(",",$rows);
         // exit;
      //  notify()->success('Bank details has been updated !');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $employess = Employee::with('empdetail')->where("id",'=',$id)
        ->first();
      
        return view('employee.edit', compact("employess"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();

        $data = Employee::create($input);

        $data->save();
        $sql="insert into emp_details (emp_id,cmpname,salary,exp,fromyear,toyear) values ";
        //  dd(count($request->cmpname));
          for($i=0;$i<count($request->cmpname);$i++){
            $rows[]="('{$data->id}','{$request->cmpname[$i]}','{$request->salary[$i]}',
            '{$request->exp[$i]}',
            '{$request->fromyear[$i]}',
            '{$request->toyear[$i]}'
            )";
          }
          $sql.=implode(",",$rows);
        //  dd($sql);
          DB::statement($sql);
         // $sql.=implode(",",$rows);
         // exit;
      //  notify()->success('Bank details has been updated !');
      return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       // dd($id);

        $findemployee = Employee::findorFail($id);

        $findemployee->delete();
        return redirect('/');
    }
}
