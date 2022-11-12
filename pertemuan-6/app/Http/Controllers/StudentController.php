<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller{
    public function index(){
        $students = Student::all();

        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request){
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        $student = Student::create($input);

        $data = [
            'message' => 'Data student created success',
            'data' => $student
        ];

        return response()->json($data, 201);
    }

    public function update(Request $request, $id){

        $student = Student::find($id);

        $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan
        ];

        $student->update($input);

        $data = [
            'message' => 'Student is updated',
            'data' => $student
        ];

        return response()->json($data, 200);

        $student = Student::find($id)->update($input);

        return response()->json($data, 202);
    }

    public function destroy($id){

        $student = Student::find($id);

        $student->delete();

        $data = [
            'message' => 'Data student have been deleted',
        ];

        return response()->json($data, 201);
    }

    public function show($id){
        $student = Student::find($id);

        $data = [
            'message' => 'Find detail of student',
            'data' => $student
        ];

        return response()->json($data,200);
    }
}
