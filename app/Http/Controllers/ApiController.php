<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon\Carbon;
use App\Majelis;
use App\MajelisPeserta;
use App\Peserta;

class ApiController extends Controller
{

	protected $token_asli = "10adcba89b4a410c889b66fa3a87b6a0";


	private function cek_token($token){
	  return ($this->token_asli == $token);
	}

    
    public function getMajelis($TOKEN, $TOKEN_MAJELIS){    
	  if($this->cek_token($TOKEN)){
	      $majelis = DB::table('majelis')->where('token', $TOKEN_MAJELIS)
	                 ->first();

	      return response()->json(array('error' => false,
	                                     'pesan' => "Berhasil mengambil data",
	                                     'tanggal' => Carbon::today(),
	                                     'data' => $majelis));
	    }
	    return response()->json(array('error' => true,
	                                  'pesan' => "Anda tidak memiliki akses.",
	                                  'tanggal' => Carbon::today()));

	}

	public function getPeserta($TOKEN){    
	  if($this->cek_token($TOKEN)){
	      $peserta = DB::table('peserta')
	                 ->get();

	      return response()->json(array('error' => false,
	                                     'pesan' => "Berhasil mengambil data",
	                                     'tanggal' => Carbon::today(),
	                                     'data' => $peserta));
	    }
	    return response()->json(array('error' => true,
	                                  'pesan' => "Anda tidak memiliki akses.",
	                                  'tanggal' => Carbon::today()));

	}

	public function getMajelisPeserta($TOKEN, $TOKEN_MAJELIS){    
	  if($this->cek_token($TOKEN)){
	  	//get id majelis
	  	$id_majelis = Majelis::where('token',$TOKEN_MAJELIS)->value('id_majelis');
	  	$majelis_peserta = DB::table('majelis_peserta')->where('majelis_id', $id_majelis)->get();

	      return response()->json(array('error' => false,
	                                     'pesan' => "Berhasil mengambil data",
	                                     'tanggal' => Carbon::today(),
	                                     'data' => $majelis_peserta));
	    }
	    return response()->json(array('error' => true,
	                                  'pesan' => "Anda tidak memiliki akses.",
	                                  'tanggal' => Carbon::today()));

	}

	public function updateNilai($TOKEN, Request $request)
	{
	if($this->cek_token($TOKEN))
	{
	  $ID_MAJELIS_PESERTA = $request->id_majelis_peserta;
	  $nilai = $request->nilai;


	  //dd($nilai);
	  


	  if(isset($ID_MAJELIS_PESERTA) && isset($nilai)){

	  	$nilai_total = 0;
	  	for ($i=0; $i < 18; $i++) { 
	  		$nilai_total+=$nilai[$i];
	  	}


	    $ID_MAJELIS_PESERTA = MajelisPeserta::where('id_majelis_peserta',$ID_MAJELIS_PESERTA)->update([
                'nilai_1_hakim_1' => $nilai[0],
	            'nilai_2_hakim_1' => $nilai[1],
	            'nilai_3_hakim_1' => $nilai[2],
	            'nilai_4_hakim_1' => $nilai[3],
	            'nilai_5_hakim_1' => $nilai[4],
	            'nilai_6_hakim_1' => $nilai[5],

	            'nilai_1_hakim_2' => $nilai[6],
	            'nilai_2_hakim_2' => $nilai[7],
	            'nilai_3_hakim_2' => $nilai[8],
	            'nilai_4_hakim_2' => $nilai[9],
	            'nilai_5_hakim_2' => $nilai[10],
	            'nilai_6_hakim_2' => $nilai[11],

	            'nilai_1_hakim_3' => $nilai[12],
	            'nilai_2_hakim_3' => $nilai[13],
	            'nilai_3_hakim_3' => $nilai[14],
	            'nilai_4_hakim_3' => $nilai[15],
	            'nilai_5_hakim_3' => $nilai[16],
	            'nilai_6_hakim_3' => $nilai[17],

	            //debat 
	            'nilai_pro_hakim_1' => $nilai[18],
	            'nilai_pro_hakim_2' => $nilai[19],
	            'nilai_pro_hakim_3' => $nilai[20],

	            'nilai_kontra_hakim_1' => $nilai[21],
	            'nilai_kontra_hakim_2' => $nilai[22],
	            'nilai_kontra_hakim_3' => $nilai[23],

	            'no_peserta_pemenang_hakim_1' => $nilai[24],
	            'no_peserta_pemenang_hakim_2' => $nilai[25],
	            'no_peserta_pemenang_hakim_3' => $nilai[26],

	            'nilai_total' => $nilai_total,


	            'jumlah_tampil' => $nilai[27],
                            
                        ]);

	    
	  }
	  else{
	    //return response()->json("Data yang dikirim ke server tidak lengkap.");
	    return response()->json(array('error' => true,
	                                  'pesan' => "Data yang dikirim ke server tidak lengkap.",
	                                  'tanggal' => Carbon::today()));
	  }
	}
	//return response()->json("Anda tidak memiliki akses.");
	return response()->json(array('error' => true,
	                              'pesan' => "Anda tidak memiliki akses.",
	                              'tanggal' => Carbon::today()));

	}

	public function updateNilaiDebat($TOKEN, Request $request)
	{
	if($this->cek_token($TOKEN))
	{
	  $ID_MAJELIS_PESERTA = $request->id_majelis_peserta;
	  $JUMLAH_MENANG = 	$request->jumlah_menang;
	  $PRO_KONTRA = 	$request->pro_kontra;
	  $nilai = $request->nilai;

	  //'jumlah_menang' => $row->jumlah_menang,
      //                  'pro_kontra' => $row->pro_kontra,


	  //dd($nilai);
	  


	  if(isset($ID_MAJELIS_PESERTA) && isset($nilai)){

	  	$nilai_total = 0;
	  	for ($i=0; $i < 18; $i++) { 
	  		$nilai_total+=$nilai[$i];
	  	}


	    $ID_MAJELIS_PESERTA = MajelisPeserta::where('id_majelis_peserta',$ID_MAJELIS_PESERTA)->update([
	    		'jumlah_menang' => $JUMLAH_MENANG,
	    		'pro_kontra' => $PRO_KONTRA,
                'nilai_1_hakim_1' => $nilai[0],
	            'nilai_2_hakim_1' => $nilai[1],
	            'nilai_3_hakim_1' => $nilai[2],
	            'nilai_4_hakim_1' => $nilai[3],
	            'nilai_5_hakim_1' => $nilai[4],
	            'nilai_6_hakim_1' => $nilai[5],

	            'nilai_1_hakim_2' => $nilai[6],
	            'nilai_2_hakim_2' => $nilai[7],
	            'nilai_3_hakim_2' => $nilai[8],
	            'nilai_4_hakim_2' => $nilai[9],
	            'nilai_5_hakim_2' => $nilai[10],
	            'nilai_6_hakim_2' => $nilai[11],

	            'nilai_1_hakim_3' => $nilai[12],
	            'nilai_2_hakim_3' => $nilai[13],
	            'nilai_3_hakim_3' => $nilai[14],
	            'nilai_4_hakim_3' => $nilai[15],
	            'nilai_5_hakim_3' => $nilai[16],
	            'nilai_6_hakim_3' => $nilai[17],

	            //debat 
	            'nilai_pro_hakim_1' => $nilai[18],
	            'nilai_pro_hakim_2' => $nilai[19],
	            'nilai_pro_hakim_3' => $nilai[20],

	            'nilai_kontra_hakim_1' => $nilai[21],
	            'nilai_kontra_hakim_2' => $nilai[22],
	            'nilai_kontra_hakim_3' => $nilai[23],

	            'no_peserta_pemenang_hakim_1' => $nilai[24],
	            'no_peserta_pemenang_hakim_2' => $nilai[25],
	            'no_peserta_pemenang_hakim_3' => $nilai[26],

	            'nilai_total' => $nilai_total,


	            'jumlah_tampil' => $nilai[27],
                            
                        ]);

	    
	  }
	  else{
	    //return response()->json("Data yang dikirim ke server tidak lengkap.");
	    return response()->json(array('error' => true,
	                                  'pesan' => "Data yang dikirim ke server tidak lengkap.",
	                                  'tanggal' => Carbon::today()));
	  }
	}
	//return response()->json("Anda tidak memiliki akses.");
	return response()->json(array('error' => true,
	                              'pesan' => "Anda tidak memiliki akses.",
	                              'tanggal' => Carbon::today()));

	}




	}
