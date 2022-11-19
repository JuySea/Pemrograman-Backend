<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    # Get All Resource
    public function index(){
        $patients = Patient::all();

        if ($patients) {
            $data = [
                'message' => 'Get All Resource',
                'data' => $patients
             ];
           return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is Empty',
             ];
        }
    }

    # Add Resource
    public function store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'status' => 'required',
            'in_date_at' => 'date|required',
            'out_date_at' => 'date|required'
        ]);

        $patient = Patient::create($validatedData);

        $data = [
            'message' => 'Resource is added successfully',
            'data' => $patient
        ];

        return response()->json($data, 201);
    }

    # Edit Resource
    public function update(Request $request, $id){

        $patient = Patient::find($id);

        $input = [
            'name' => $request->name ?? $patient->name,
            'phone' => $request->phone ?? $patient->phone,
            'address' => $request->address ?? $patient->address,
            'status' => $request->status ?? $patient->status,
            'in_date_at' => $request->in_date_at ?? $patient->in_date_at,
            'out_date_at' => $request->out_date_at ?? $patient->out_date_at
        ];

        $patient->update($input);

        $data = [
            'message' => 'Patient data has been updated',
            'data' => $patient
        ];

        $patient = Patient::find($id)->update($input);

        return response()->json($data, 202);
    }

    # Delete Resource
    public function destroy($id){

        $patient = Patient::find($id);

        $patient->delete();

        $data = [
            'message' => "Patient data has been deleted"
        ];

        return response()->json($data, 201);
    }

    # Search Resource By Name   
    public function search($id){
        $patients = Patient::find($id);

        $data = [
            'message' => 'Get patient data',
            'id' => $id,
            'data' => $patients
        ];

        return response()->json($data, 200);
    }

    #Get Positive Resource
    public function positive(){
        $patients = Patient::where('status','positive')->get();

        $data = [
            'message' => 'Get positive patient data',
            'data' => $patients
        ];

        return response()->json($data, 200);
    }

    #Get Recovered Resource
    public function recovered(){
        $patients = Patient::where('status','recovered')->get();

        $data = [
            'message' => 'Get recovered patient data',
            'data' => $patients
        ];

        return response()->json($data, 200);
    }

    #Get Dead Resource
    public function dead(){
        $patients = Patient::where('status','dead')->get();

        $data = [
            'message' => 'Get dead patient data',
            'data' => $patients
        ];

        return response()->json($data, 200);
    }

}
