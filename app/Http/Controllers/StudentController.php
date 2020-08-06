<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Student;
use App\Http\Resources\Student\StudentResource;
use App\Http\Resources\Student\StudentCollection;

class StudentController extends Controller
{
    public function corona()
    {
        $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $data = $response->json();
        return view('index', compact('data'));
    }

    public function index()
    {
        $data = Student::all();
        return new StudentCollection($data);
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $data = Student::find($id);
        if (is_null($data)) {
            return response()->json('data tidak ditemukan', 404);
        }
        return new StudentResource($data);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jurusan' => 'required',
        ]);
        Student::insert([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jurusan' => $request->jurusan,
        ]);
        return response()->json('Insert success', 201);
    }

    public function update(Request $request, $id)
    {

        Student::where('id', $id)->first()->update([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jurusan' => $request->jurusan,
        ]);

        return response()->json('Update success', 200);
    }

    public function destroy($id)
    {
        $deleted = Student::destroy($id);
        $response = [
            'success' => $deleted === 0 ? 'false' : 'true',
            'message' => $deleted === 0 ? 'Failed to delete' : 'Success to delete'
        ];
        return response()->json($response, 200);
    }
}
