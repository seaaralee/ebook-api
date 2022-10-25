<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Author::all();
        return $author;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // -- NOT USE
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author();
        $author->name = $request->input('name');
        $author->date_of_birth = $request->input('date_of_birth');
        $author->place_of_birth = $request->input('place_of_birth');
        $author->gender = $request->input('gender');
        $author->email = $request->input('email');
        $author->no = $request->input('no');
        $author->save();

        return response()->json([
            'success' => 201,
            'message' => 'data saved!',
            'data' => $author
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);

        if ($author) {
            return response()->json([
                'status'=> 200,
                'data' => $author
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message'=> 'ID ' . $id . ' Not Found!'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // -- NOT USE
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
        $author = Author::find($id);
        if($author){
            $author -> name = $request -> name ? $request -> name : $author -> name;
            $author -> date_of_birth = $request -> date_of_birth ? $request -> date_of_birth : $author -> date_of_birth;
            $author -> place_of_birth = $request -> place_of_birth ? $request -> place_of_birth : $author -> place_of_birth;
            $author -> gender = $request -> gender ? $request -> gender : $author -> gender;
            $author -> email = $request -> email ? $request -> email : $author -> email;
            $author -> no = $request -> no ? $request -> no : $author -> no;
            $author-> save();
            return response()->json([
                'status' => 200,
                'data' => $author,
                'message' => 'data updated!'
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'message'=> $id . ' Not Found!'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::where('id', $id)->first();
        if($author){
            $author -> delete();
            return response()->json([
                'status'=> 200,
                'data' => $author,
                'message' => 'data deleted!'
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'Not Found!'
            ], 404);
        }
    }
}
