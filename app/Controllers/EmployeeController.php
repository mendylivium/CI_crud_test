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
        $departments = $employees->select('department')->distinct()->get()->getResultArray();
        $positions = $employees->select('position')->distinct()->get()->getResultArray();

        if($this->request->getMethod(true)=='POST') {
            $request = $this->request->getRawInput();
            
            if($request['department'] != 0) {
                $employees = $employees->where('department',$request['department']);
            }

            if($request['position'] != 0) {
                $employees = $employees->where('position',$request['position']);
            }

            if($request['status'] != 0) {
                $employees = $employees->where('status',$request['status']);
            }

            if(!empty($request['name'])) {
                $employees = $employees->like('name',$request['name'],'both');
            }
        }

        return view('home',[
            'employees' => $employees->orderBy('id','DESC')->paginate(10),
            'departments' => $departments,
            'positions' => $positions,
        ]);
    }

    public function add_user() {

        $request = Services::request()->getRawInput();

        $rules = [
            'name' => 'required|string|min_length[3]',
            'department' => 'required|min_length[3]',
            'position' => 'required|min_length[3]'
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
            'result' => 'success',
            'text' => 'Successfully Registered'
        ],201);
    }

    public function delete_user($id) {
        if($id==0) {
            return $this->setResponseFormat('json')->respond([
                'result' => 'error',
                'text' => 'ID is Missing'
            ],400);
        }

        $employee = new Employee();

        $employee = $employee->where('id', $id);

        if(!$employee) {
            return $this->setResponseFormat('json')->respond([
                'result' => 'error',
                'text' => 'Invalid ID'
            ],400);
        }

        $employee->where('id =',$id)->delete();

        return $this->setResponseFormat('json')->respond([
            'result' => 'success',
            'text' => 'Deleted'
        ],200);

    }

    public function edit_user($id = null) {

        if(!$id) {
            return $this->setResponseFormat('json')->respond([
                'result' => 'error',
                'text' => 'Invalid Action'
            ],400);
        }

        $request = Services::request()->getRawInput();

        $rules = [
            'name' => 'required|string|min_length[3]',
            'department' => 'required|min_length[3]',
            'position' => 'required|min_length[3]',
            'status' => 'required|in_list[Active,Inactive,Resigned]'
        ];


        $validate = Services::validation()->setRules($rules);

        if(!$validate->run($request)) {
            return $this->setResponseFormat('json')->respond([
                'result' => 'error',
                'text' => array_values($validate->getErrors())[0]
            ],400);
        }

        $employee = new Employee();

        $employee->update($id,$request);

        return $this->setResponseFormat('json')->respond([
            'result' => 'success',
            'text' => 'Successfully Updated'
        ],200);
    }

}
