<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Majelis;
use App\Marhalah;
use App\Babak;
use App\BidangLomba;
use App\Peserta;
use App\PesertaPendaftaran;
use Validator;

class MajelisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majelis_list = Majelis::get();
        $jumlah_majelis = Majelis::count();

        //dd($majelis_list[0]->dewan_hakim_1_majelis);
        
        return view('home.majelis.index', compact('majelis_list','jumlah_majelis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        

        //bidang_lomba_id
        $list_marhalah = Marhalah::lists('marhalah','id_marhalah');
        $list_bidang_lomba = BidangLomba::lists('bidang_lomba','id_bidang_lomba');
        $list_babak = Babak::lists('nama_babak','id_babak');

        $list_dewan_hakim = PesertaPendaftaran::where('jenis_peserta','dewan_hakim')->lists('nama_lengkap','id_peserta');

        $list_panitera = PesertaPendaftaran::where('jenis_peserta','panitera')->lists('nama_lengkap','id_peserta');



        return view('home.majelis.create', compact('list_marhalah','list_bidang_lomba','list_dewan_hakim','list_panitera','list_babak'));
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
        $input['token'] = $this->getToken(4);

        //validasi
        $validator = Validator::make($input,[
          
            
            'bidang_lomba_id' => 'required',
            'babak_id' => 'required',
            'marhalah_id' => 'required',
            'pria_wanita' => 'required',
            'token' => 'required|unique:majelis',
            //'dewan_hakim_3' => 'required',
            //'dewan_hakim_2' => 'required',
            //'dewan_hakim_1' => 'required',
            //'panitera_2' => 'required',
            //'panitera_1' => 'required',
          
        ]);

        if($validator->fails()){
          return redirect('operator_registrasi/majelis/create')->withInput()->withErrors($validator);
        }

        Majelis::create($input);
        return redirect('operator_registrasi/majelis');
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
        $majelis = Majelis::findOrFail($id);
        //bidang_lomba_id
        $list_marhalah = Marhalah::lists('marhalah','id_marhalah');
        $list_bidang_lomba = BidangLomba::lists('bidang_lomba','id_bidang_lomba');
        $list_babak = Babak::lists('nama_babak','id_babak');

        $list_dewan_hakim = PesertaPendaftaran::where('jenis_peserta','dewan_hakim')->lists('nama_lengkap','id_peserta');

        $list_panitera = PesertaPendaftaran::where('jenis_peserta','panitera')->lists('nama_lengkap','id_peserta');

        return view('home.majelis.edit', compact('majelis','list_marhalah','list_bidang_lomba','list_dewan_hakim','list_panitera','list_babak'));
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
        $majelis = Majelis::findOrFail($id);
        $majelis->update($request->all());
        return redirect('operator_registrasi/majelis');
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
        $majelis = Majelis::findOrFail($id);
        $majelis->delete();
        return redirect('operator_registrasi/majelis');
    }

    //generate token
    public function getToken($length){
         $token = "";
         $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
         $codeAlphabet.= "0123456789";
         $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }

        return $token;
    }
}
