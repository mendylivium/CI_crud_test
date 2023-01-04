<?php

namespace App\Controllers;

use App\Models\Employee;
use CodeIgniter\Config\Services;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class EmployeeController extends BaseController
{
    use ResponseTrait;

    public function index()
    {

        
        //
        $employees = new Employee();

        return view('home',[
            'employees' => $employees->orderBy('id','DESC')->paginate(10),
        ]);
    }

    public function add_user() {

        $request = Services::request()->getRawInput();

        $rules = [
            'code' => 'required',
            'name' => 'required|string|min_length[8]',
            'department' => 'required|min_length[8]'
        ];


        $validate = Services::validation()->setRules($rules);

        if(!$validate->run($request)) {
            return $this->setResponseFormat('json')->respond([
                'result' => 'error',
                'text' => array_values($validate->getErrors())[0]
            ],400);
        }

        $employee = new Employee();
        $employee->save($request);

        return $this->setResponseFormat('json')->respond([
            'result' => 'error',
            'text' => 'Successfully Registered'
        ],201);
    }
}
