<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use App\Employee;

class EmployeesController extends Controller
{
    public static function getAllEmployees(){
        $employees_data = Employee::all(); 
        $employees_data->sortBy('id');
        return $employees_data;       
    }

    public function index(){
        return view('welcome', ['employees_data' => $this->getAllEmployees()]);
    }

    public function insert(Request $request){ 

        /* $employee = Employee::create($request->all()); - как вариант */ 

        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'position' => 'required'
        ]); 
        
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->dob = $request->input('dob');
        $employee->position = $request->input('position');        

        if(
            $employee->save()
        ){
            return redirect('/')->with(['employees_data' => $this->getAllEmployees(), 'successMsg' => 'Сотрудник успешно добавлен!']);
        }else{
            return redirect('/')->with(['employees_data' => $this->getAllEmployees(), 'errorMsg' => 'Ошибка добавления сотрудника!', 'error' => true]);
        }
    }

    public function edit($id){ 
        $employee_data = Employee::find($id);
        return view('editEmployee', compact('employee_data', $employee_data));
    }

    public function updateData(Request $request, $id){ 
        $this->validate($request, [
            'name' => 'required',
            'dob' => 'required',
            'position' => 'required'
        ]);        

        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->dob = $request->input('dob');
        $employee->position = $request->input('position');  

        if(
            $employee->save()
        ){           
            return redirect('/')->with(['employees_data' => $this->getAllEmployees(), 'successMsg' => 'Сотрудник успешно обновлен!']);
        }else{
            return redirect('/')->with(['employees_data' => $this->getAllEmployees(), 'errorMsg' => 'Ошибка изменения сотрудника!', 'error' => true]);
        }
    }

    public function delete($id){ 
        $employee = Employee::find($id);

        if(
            $employee->delete()
        ){           
            return redirect('/')->with(['employees_data' => $this->getAllEmployees(), 'successMsg' => 'Сотрудник успешно удален!']);
        }else{
            return redirect('/')->with(['employees_data' => $this->getAllEmployees(), 'errorMsg' => 'Ошибка удаления сотрудника!', 'error' => true]);
        }
    }
    
}
