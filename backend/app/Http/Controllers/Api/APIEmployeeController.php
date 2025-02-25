<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\EmployeeResourceAPI;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class APIEmployeeController extends Controller
{
    public function index()
    {
        try {
            $employees = EmployeeResourceAPI::collection(
                $self = Employee::query()
                ->select(['id','name', 'email', 'position', 'salary', 'created_at', 'updated_at'])
                ->orderBy('updated_at', 'desc')
                ->paginate(10)
                ->onEachSide(0)
            )->additional([
                'meta' => [
                    'has_pages' => $self->hasPages(),
                ]
            ]);

            return response()->json([
                'data' => $employees,
                'pagination' => [
                    'total' => $self->total(),
                    'per_page' => $self->perPage(),
                    'current_page' => $self->currentPage(),
                    'last_page' => $self->lastPage(),
                    'from' => $self->firstItem(),
                    'to' => $self->lastItem(),
                    'next_page_url' => $self->nextPageUrl(),
                    'prev_page_url' => $self->previousPageUrl(),
                    'links' =>  $self->linkCollection()->toArray()
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
       try {
            $employee = Employee::where('id', $id)->first();
            if(!$employee) {
                return response()->json(['error' => 'Data not found'], 404);
            }

            return response()->json([
                'id' => $employee->id ?? null,
                'name' => $employee->name ?? "-",
                'email' => $employee->email ?? "-",
                'salary' => $employee->salary ?? "-",
                'position' => $employee->position ?? "-"
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:employees,email|min:3|max:100',
            'position' => 'required|string|min:3|max:50',
            'salary' => 'required|numeric|min:1000000'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        try {
            DB::beginTransaction();
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->position = $request->position;
            $employee->salary = $request->salary;
            $employee->save();

            DB::commit();

            return response()->json(['message' => 'Data has been saved'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update (Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:employees,email,'.$id.'|min:3|max:100',
            'position' => 'required|string|min:3|max:50',
            'salary' => 'required|numeric|min:1000000'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        try {
            $employee = Employee::where('id', $id)->first();
            if(!$employee) {
                return response()->json(['error' => 'Data not found'], 404);
            }

            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->position = $request->position;
            $employee->salary = $request->salary;
            $employee->save();

            return response()->json(['message' => 'Data has been updated'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id){
        try {
            $employee = Employee::where('id', $id)->first();
            if(!$employee) {
                return response()->json(['error' => 'Data not found'], 404);
            }

            $employee->delete();
            return response()->json(['message' => 'Data has been deleted'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
