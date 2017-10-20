<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Majelis;
use App\Marhalah;
use App\Babak;
use App\BidangLomba;
use App\Peserta;
use App\PesertaPendaftaran;
use Validator;
use App\MajelisPeserta;


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

        foreach ($majelis_list as $row) {
            $row->jumlah_peserta = MajelisPeserta::where('majelis_id', $row->id_majelis)->count();

        }

        //dd($majelis_list[0]->dewan_hakim_1_majelis);
        
        return view('home.majelis.index', compact('majelis_list','jumlah_majelis'));
    }

    public function ambil_nilai($id_majelis_peserta){

        $nilai = array();
        $data = MajelisPeserta::where('id_majelis_peserta', $id_majelis_peserta)->first();
        $nilai[0] = $data['nilai_1_hakim_1'] + $data['nilai_2_hakim_1'] + $data['nilai_3_hakim_1'] + $data['nilai_4_hakim_1'] + $data['nilai_5_hakim_1'] + $data['nilai_6_hakim_1'];
        $nilai[1] = $data['nilai_1_hakim_2'] + $data['nilai_2_hakim_2'] + $data['nilai_3_hakim_2'] + $data['nilai_4_hakim_2'] + $data['nilai_5_hakim_2'] + $data['nilai_6_hakim_2'];
        $nilai[2] = $data['nilai_1_hakim_3'] + $data['nilai_2_hakim_3'] + $data['nilai_3_hakim_3'] + $data['nilai_4_hakim_3'] + $data['nilai_5_hakim_3'] + $data['nilai_6_hakim_3'];

        return $nilai;
    }

    public function list_peserta($id)
    {
        $list_peserta = MajelisPeserta::where('majelis_id', $id)->orderBy('no_urut')->get();
        //$peserta = array();

        //dd($list_peserta);
        
        foreach ($list_peserta as $row) {
            $row->jenis_lomba = $row->majelis->bidang_lomba_majelis->jenis_lomba;
            $row->nilai = $this->ambil_nilai($row->id_majelis_peserta);
            $row->masuk_final = false;
            if($row->majelis->babak_id == 1){

                $majelis_final = Majelis::where('bidang_lomba_id',$row->majelis->bidang_lomba_id)
                            ->where('marhalah_id', $row->majelis->marhalah_id)
                            ->where('babak_id', 2)
                            ->first();
                $masuk_final = MajelisPeserta::where('no_peserta',$row->no_peserta)->where('majelis_id', $majelis_final->id_majelis)->first();
                if($masuk_final != null){
                    $row->masuk_final = true;    
                }
                
            }

        }

        
        return view('home.majelis.list_peserta', compact('peserta','list_peserta'));
    }

    public function masuk_final($no_peserta, $majelis_id)
    {

        $majelis_penyisihan = Majelis::findOrFail($majelis_id);
        $majelis_final = Majelis::where('bidang_lomba_id',$majelis_penyisihan->bidang_lomba_id)
                            ->where('marhalah_id', $majelis_penyisihan->marhalah_id)
                            ->where('babak_id', 2)
                            ->first();

        MajelisPeserta::create([
            'no_peserta' => $no_peserta,
            'majelis_id' => $majelis_final->id_majelis
            ]);

        return $this->list_peserta($majelis_id);


    }

    public function update_no_urut(Request $request, $id)
    {

        $test = MajelisPeserta::find($id);
        $column_name = Input::get('name');
        $column_value = Input::get('value');

        if( Input::has('name') && Input::has('value')) {
            $test = MajelisPeserta::select()
                ->where('id_majelis_peserta', '=', $id)
                ->update([$column_name => $column_value]);
            return response()->json([ 'code'=>200], 200);
        }

        return response()->json([ 'error'=> 400, 'message'=> 'Not enought params' ], 400);


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

        $list_dewan_hakim = Peserta::where('jenis_peserta','dewan_hakim')->lists('nama_lengkap','id_peserta');

        $list_panitera = Peserta::where('jenis_peserta','panitera')->lists('nama_lengkap','id_peserta');



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

        $list_dewan_hakim = Peserta::where('jenis_peserta','dewan_hakim')->lists('nama_lengkap','id_peserta');

        $list_panitera = Peserta::where('jenis_peserta','panitera')->lists('nama_lengkap','id_peserta');

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
        //dd($request->all());
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
