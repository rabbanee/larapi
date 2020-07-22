<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Student;

class StudentController extends Controller
{
    public function corona()
    {
        $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $data = $response->json();
        return view('index', compact('data'));
    }

    public function getStudents()
    {
        $data = Student::all();
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = Student::find($id);
        return response()->json($data, 200);
    }
}
