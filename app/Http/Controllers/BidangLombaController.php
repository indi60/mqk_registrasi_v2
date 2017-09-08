<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\BidangLomba;


class BidangLombaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bidang_lomba_list = BidangLomba::paginate(10);
        $jumlah_bidang_lomba = BidangLomba::count();
        //return $univ_list;

        return view('home.bidang_lomba.index', compact('bidang_lomba_list','jumlah_bidang_lomba'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('home.bidang_lomba.create');
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
          'bidang_lomba' => 'required|string',
          
        ]);

        if($validator->fails()){
          return redirect('operator_registrasi/bidang_lomba/create')->withInput()->withErrors($validator);
        }

        BidangLomba::create($input);
        return redirect('operator_registrasi/bidang_lomba');
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
        $bidang_lomba = BidangLomba::findOrFail($id);
        return view('home.bidang_lomba.edit', compact('bidang_lomba'));
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
        $bidang_lomba = BidangLomba::findOrFail($id);
        $bidang_lomba->update($request->all());
        return redirect('operator_registrasi/bidang_lomba');
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
        $bidang_lomba = BidangLomba::findOrFail($id);
        $bidang_lomba->delete();
        return redirect('operator_registrasi/bidang_lomba');
    }
}
