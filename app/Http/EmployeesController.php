<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;



class EmployeesController extends Controller
{
    public function index(){
        $employees = App\Employee::inAll(); 
        return response()->json(["employees"=>$employees]);
    }

    public function store(Request $request){
        //$employee = App\Employee::create($request->all()); 
        //return response()->json(["employee"=>$employee]);
        return ['message' => 'I have employee'];
    }

}
