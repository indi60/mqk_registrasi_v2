<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Marhalah;

class MarhalahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marhalah_list = Marhalah::paginate(10);
        $jumlah_marhalah = Marhalah::count();
        //return $univ_list;

        return view('home.marhalah.index', compact('marhalah_list','jumlah_marhalah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home.marhalah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();

        //validasi
        $validator = Validator::make($input,[
          'marhalah' => 'required|string',
          
        ]);

        if($validator->fails()){
          return redirect('operator_registrasi/marhalah/create')->withInput()->withErrors($validator);
        }

        Marhalah::create($input);
        return redirect('operator_registrasi/marhalah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $marhalah = Marhalah::findOrFail($id);
        return view('home.marhalah.edit', compact('marhalah'));
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
        //
        $marhalah = Marhalah::findOrFail($id);
        $marhalah->update($request->all());
        return redirect('operator_registrasi/marhalah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $marhalah = Marhalah::findOrFail($id);
        $marhalah->delete();
        return redirect('operator_registrasi/marhalah');
    }
}
