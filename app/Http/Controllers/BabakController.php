<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Babak;
use Validator;

class BabakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $babak_list = Babak::paginate(10);
        $jumlah_babak = Babak::count();
        //return $univ_list;

        return view('home.babak.index', compact('babak_list','jumlah_babak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home.babak.create');
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
          'nama_babak' => 'required|string',
          
        ]);

        if($validator->fails()){
          return redirect('operator_registrasi/babak/create')->withInput()->withErrors($validator);
        }

        Babak::create($input);
        return redirect('operator_registrasi/babak');
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
        $babak = Babak::findOrFail($id);
        return view('home.babak.edit', compact('babak'));
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
        $babak = Babak::findOrFail($id);
        $babak->update($request->all());
        return redirect('operator_registrasi/babak');
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
        $babak = Babak::findOrFail($id);
        $babak->delete();
        return redirect('operator_registrasi/babak');
    }
}
