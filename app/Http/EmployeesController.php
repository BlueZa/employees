<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;

class EmployeesController extends Controller
{
    public function index(){
        $employees = DB::table('employees')->get(); 
        return response()->json(["employees"=>$employees]);
    } 

    public function insert(){ 
        if(DB::table('employees')->insert(
            [
                'name' => $_POST["name"], 
                'dob' => $_POST["dob"],
                'position' => $_POST["position"]
            ]
        )){
            return (['message' => 'Сотрудник успешно добавлен!']);
        }else{
            return (['message' => 'Ошибка добавления сотрудника!', 'error' => true]);
        }
    }

    public function update(){ 
        if(DB::table('employees')->where('id',$_POST["id"])->update(
            [
                'name' => $_POST["name"], 
                'dob' => $_POST["dob"],
                'position' => $_POST["position"]
            ]
        )){
            return (['message' => 'Данные сотруднкиа успешно изменены!']);
        }else{
            return (['message' => 'Ошибка изменения данных сотрудника!', 'error' => true]);
        }
    }

    public function delete(){ 
        if(DB::table('employees')->where('id',$_POST["id"])->delete()){
            return (['message' => 'Сотрудник успешно удален']);
        }else{
            return (['message' => 'Ошибка удаления сотрудника!', 'error' => true]);
        }
    }
}
