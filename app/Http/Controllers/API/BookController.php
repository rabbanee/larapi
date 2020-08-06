<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookCollection;
use App\Http\Resources\Book\BookResource;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        // $response = [
        //     'success' => 'true',
        //     'data' => $books
        // ];
        return new BookCollection($books);
        // return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_cetak' => 'required',
            'tahun_terbit' => 'required',
        ]);

        $book = Book::create([
            'nama_buku' => $request->nama_buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_cetak' => $request->tahun_cetak,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        $response = [
            'success' => 'true',
            'data' => $book
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if (is_null($book)) {
            return response()->json('Data is not found', 200);
        }

        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_cetak' => 'required',
            'tahun_terbit' => 'required',
        ]);

        Book::find($id)->update($request->all());
        $response = [
            'success' => 'true',
            'data' => $request->all()
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Book::destroy($id);
        $response = [
            'success' => $deleted === 0 ? 'false' : 'true',
            'message' => $deleted === 0 ? 'Failed to delete' : 'Success to delete'
        ];
        return response()->json($response, 200);
    }
}
