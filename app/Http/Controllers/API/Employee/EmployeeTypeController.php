<?php

namespace App\Http\Controllers\API\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeTypeRequest;
use App\Models\EmployeeType;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeeTypeController extends Controller
{
    public function get(Request $request)
    {
        try {
            $data = EmployeeType::all();
            return isset($request->datatable) && $request->datatable == 'true' ? DataTables::of($data)->make(true) : response()->json([
                'status' => true,
                'data' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
    public function store(EmployeeTypeRequest $request)
    {
        try {
            $data = EmployeeType::create($request->only(['name']));
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
    public function update(EmployeeTypeRequest $request, EmployeeType $employeeType)
    {
        try {
            $employeeType->update($request->only(['name']));
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

    public function show(EmployeeType $employeeType)
    {
        try {
            return response()->json([
                'status' => true,
                'data' => $employeeType
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
    public function destroy(EmployeeType $employeeType)
    {
        try {
            $employeeType->delete();
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
