<?php

namespace App\Http\Controllers\API\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    public function get()
    {
        try {
            $data = DataTables::of(Employee::with(['employeeType'])->get())->make(true);
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
    public function store(EmployeeRequest $request)
    {
        try {
            $data = Employee::create([
                'employee_type_id' => $request->employee_type_id,
                'nip' => $request->nip,
                'nidn' => $request->nidn,
                'name' => $request->name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'email' => $request->email,
                'birthplace' => $request->birthplace,
                'birthdate' => $request->birthdate,
                'religion' => $request->religion,
                'address' => $request->address,
                'city' => $request->city,
                'district' => $request->district,
                'province' => $request->province,
                'nationality' => $request->nationality,
                'postal_code' => $request->postal_code,
                'back_degree' => $request->back_degree,
                'front_degree' => $request->front_degree,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menambahkan data',
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
    public function update(EmployeeRequest $request, EmployeeType $employeeType)
    {
        try {
            $employeeType->update([
                'employee_type_id' => $request->employee_type_id,
                'nip' => $request->nip,
                'nidn' => $request->nidn,
                'name' => $request->name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'email' => $request->email,
                'birthplace' => $request->birthplace,
                'birthdate' => $request->birthdate,
                'religion' => $request->religion,
                'address' => $request->address,
                'city' => $request->city,
                'district' => $request->district,
                'province' => $request->province,
                'nationality' => $request->nationality,
                'postal_code' => $request->postal_code,
                'back_degree' => $request->back_degree,
                'front_degree' => $request->front_degree,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Berhasil merubah data',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    public function show(Employee $employee)
    {
        try {
            return response()->json([
                'status' => true,
                'data' => $employee
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return response()->json([
                'status' => true,
                'data' => 'Berhasil menghapus data'
            ], 200);
        } catch (QueryException $e) {
            if ($e->getCode() == '23000') {
                return response()->json([
                    'status' => true,
                    'message' => 'Gagal menghapus data, data tersebut masih digunakan'
                ], 500);
            } else {
                return response()->json([
                    'message' => $e->getMessage(),
                    'trace' => $e->getTrace()
                ], 500);
            }
        }
    }
}
