<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Peserta;
use App\PesertaPendaftaran;
use App\Kafilah;
use Auth;
use DB;
use Image;
use PDF;
use Alert;
use App\Majelis;
use App\MajelisPeserta;
use App\BidangLomba;

class OperatorRegistrasiController extends Controller
{
    //

    public function index(){
    	return view('home/index');
    }

    public function dashboard(){

    	$total_found = -1;
    	$isValidated = false;

    	return view('home/dashboard',compact('total_found','isValidated'));
    }

    protected function no_registrasi_validator(array $data)
	  {
	      return Validator::make($data, [

	          'no_registrasi' => 'required|numeric',
	      ], [

	    'no_registrasi.required' => 'Kolom Nomor Registrasi boleh kosong.',	    
	    'no_registrasi.numeric' => 'Kolom Nomor Registrasi harus berupa angka.',

	    ]);
	  }


    public function cari_no_registrasi(Request $request)
	  {
	      //
	  	  $input = $request->all();

	  	  //$peserta = PesertaPendaftaran::where('no_registrasi', $input['no_registrasi'])->first();




	  	  $isValidated = false;
	  	  $peserta_valid = Peserta::where('no_registrasi', $input['no_registrasi'])->where('status',1)->count();
	  	  if($peserta_valid > 0) $isValidated = true;


	  	  $peserta_invalid = Peserta::where('no_registrasi', $input['no_registrasi'])->where('status',2)->count();
	  	  if($peserta_invalid > 0) $isValidated = true;


	      
	      $validator = $this->no_registrasi_validator($input);

	      if($validator->fails()){
	        return redirect('operator_registrasi/dashboard')->withInput()->withErrors($validator);
	      }



	      if($isValidated){
	      	$peserta = Peserta::where('no_registrasi', $input['no_registrasi'])->first();

	      }else{
	      	$peserta = PesertaPendaftaran::where('no_registrasi', $input['no_registrasi'])->first();	
	      	if($peserta!=null) $peserta->status = 0;
	      }

	      // dd($peserta);	

	      
	      $total_found = count($peserta);

	      //dd(isset($peserta));

	      if($total_found == 0 ){
	      	notify()->flash('Maaf!', 'warning', [                    
                    'text' => 'Data Peserta dengan Nomor Registrasi '. $input['no_registrasi'] .' tidak ditemukan di Database Sistem Pendaftaran.',
                ]);
	      }
	      else{
	      	notify()->flash('Data Ditemukan!', 'success', [
			    'timer' => 1000,
			    'text' => 'Data Peserta Ditemukan!.',
			]);
	      }


	      
	      /*
	      $id_peserta = Peserta::create($input)->id_peserta;


	      $pes = Peserta::find($id_peserta);
	      $pes->no_registrasi = $this->no_peserta($id_peserta,8);
	      $pes->save();
	      */
	      //dd($peserta);
	      return view('home/dashboard',compact('peserta','total_found','isValidated'));
	      //return redirect('operator_registrasi/dashboard');

	  }

	  public function verifikasi_peserta(Request $request){

	  	
	  	$input = $request->all();

	  	$peserta = PesertaPendaftaran::where('no_registrasi', $input['no_registrasi'])->first();
	  	//dd($peserta);
	  	return view('home/verifikasi_peserta',compact('peserta'));
	  }

	  public function generate_no_peserta($jenis_kelamin='pria'){

	  	$no_peserta = 0;
	  	
	  	if($jenis_kelamin == 'pria'){ //generate nomor ganjil
	  		$last_no_peserta = DB::table('peserta')->where('jenis_kelamin','=','pria')->max('no_peserta');
	  		$last_no_peserta == 0 ? $no_peserta = 1 : $no_peserta = $last_no_peserta+2; 
	  	}
	  	else{ //generate nomor genap
	  		$last_no_peserta = DB::table('peserta')->where('jenis_kelamin','=','wanita')->max('no_peserta');
	  		$last_no_peserta == 0 ? $no_peserta = 2 : $no_peserta = $last_no_peserta+2; 
	  	}



	  	return sprintf('%04s', $no_peserta);
	  }

	  public function generate_no_peserta_grup($jenis_kelamin='pria', $peserta){

	  	$no_peserta = 0;

	  	//cek apakah di table peserta no_peserta where lomba, marhalah, kafilah, jenis_kelamin apakah ada.
	  	$no_peserta = Peserta::where('bidang_lomba_id',$peserta['bidang_lomba_id'])->where('marhalah_id',$peserta['marhalah_id'])->where('kafilah_id',$peserta['kafilah_id'])->where('jenis_kelamin',$jenis_kelamin)->value('no_peserta');

	  	if($no_peserta==0 || $no_peserta == null){
	  		if($jenis_kelamin == 'pria'){ //generate nomor ganjil
		  		$last_no_peserta = DB::table('peserta')->where('jenis_kelamin','=','pria')->max('no_peserta');
		  		$last_no_peserta == 0 ? $no_peserta = 1 : $no_peserta = $last_no_peserta+2; 
		  	}
		  	else{ //generate nomor genap
		  		$last_no_peserta = DB::table('peserta')->where('jenis_kelamin','=','wanita')->max('no_peserta');
		  		$last_no_peserta == 0 ? $no_peserta = 2 : $no_peserta = $last_no_peserta+2; 
		  	}
	  	}
	  	return sprintf('%04s', $no_peserta);
	  }

	  public function verifikasi_peserta_valid(Request $request){

	  	

	  	//return "sayang";
	  	

	  	//masuk ke halaman konfirmasi

	  	$input = $request->all();
	  	//$peserta = PesertaPendaftaran::where('no_registrasi', $input['no_registrasi'])->first();


	  	//return view('home.konfirmasi_validasi', compact('input','peserta'));

	  	

	  	

	  	$peserta_valid = PesertaPendaftaran::where('no_registrasi', $input['no_registrasi'])->first()->toArray();
	  	
	  	if($input['btn'] == 'valid'){

	  		//cek jenis lomba yang diikuti grup atau individu
	  		$jenis_lomba = BidangLomba::where('id_bidang_lomba',$peserta_valid['bidang_lomba_id'])->value('jenis_lomba');
	  		if($jenis_lomba == 'individu'){
	  			$peserta_valid['no_peserta'] = $this->generate_no_peserta($peserta_valid['jenis_kelamin']); //generate nomor peserta
	  		}else{
	  			$peserta_valid['no_peserta'] = $this->generate_no_peserta_grup($peserta_valid['jenis_kelamin'], $peserta_valid); //generate nomor peserta
	  		}

		  	
		  	$peserta_valid['status'] = 1; //valid
		  	$peserta_valid['alasan'] = '';
		  	$peserta_valid['updated_by'] = Auth::user()->id_pengguna; //valid

		  	$total_found = 1;
	  		$isValidated = true;

	  	}else{

	  		$peserta_valid['no_peserta'] = 0;
		  	$peserta_valid['status'] = 2; //valid
		  	$peserta_valid['alasan'] = $input['alasan'];
		  	$peserta_valid['updated_by'] = Auth::user()->id_pengguna; //valid

		  	$total_found = 1;
	  		$isValidated = false;

	  	}


	  	

	  	//ceklist syarat
	  	//dd($peserta_valid);
	  	isset($input['cek_form_data_peserta']) ? $peserta_valid['cek_form_data_peserta'] = 1 : $peserta_valid['cek_form_data_peserta'] = 0;
	  	isset($input['cek_izin_operasional_pesantren']) ? $peserta_valid['cek_izin_operasional_pesantren'] = 1 : $peserta_valid['cek_izin_operasional_pesantren'] = 0;
	  	isset($input['cek_raport']) ? $peserta_valid['cek_raport'] = 1 : $peserta_valid['cek_raport'] = 0;
	  	isset($input['cek_akte_kelahiran']) ? $peserta_valid['cek_akte_kelahiran'] = 1 : $peserta_valid['cek_akte_kelahiran'] = 0;

	  	isset($input['cek_sk']) ? $peserta_valid['cek_sk'] = 1 : $peserta_valid['cek_sk'] = 0;

	  	//get_id_majelis
	  	//dd($peserta_valid);
	  	if($peserta_valid['jenis_peserta'] == 'peserta'){
	  		$input_peserta_majelis = array();
	  		$input_peserta_majelis['majelis_id'] = Majelis::where('bidang_lomba_id', $peserta_valid['bidang_lomba_id'])->where('marhalah_id',$peserta_valid['marhalah_id'])->value('id_majelis');
	  		$input_peserta_majelis['no_peserta'] = $peserta_valid['no_peserta'];

	  		if(MajelisPeserta::where('majelis_id', $input_peserta_majelis['majelis_id'])->where('no_peserta',$input_peserta_majelis['no_peserta'])->count() == 0){
	  			
	  			$peserta_majelis = MajelisPeserta::create($input_peserta_majelis);	
	  		}


	  			  		
	  	}

	  	$peserta = Peserta::create($peserta_valid);
	  	return redirect('operator_registrasi/verifikasi_result');
	  	
	  	//dd($peserta_valid->no_peserta);
	  	//return view('home/dashboard',compact('peserta','total_found','isValidated'));
	  }

	  public function verifikasi_result(){
	  	return view('home.verifikasi_result');
	  }

	  //untuk cetak kartu
	  public function cetak_kartu(Request $request){
	  	$input = $request->all();

	  	// foreach <img> in the submited message
	    
	      $src = $input['photo'];

	      // if the img source is 'data-url'
	      if(preg_match('/data:image/', $src)){

	        // get the mimetype
	        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
	        $mimetype = $groups['mime'];

	        // Generating a random filename
	        $filename = uniqid();
	        $filepath = "/photo/$filename.$mimetype";



	        // @see http://image.intervention.io/api/
	        $image = Image::make($src)
	          // resize if required
	          /* ->resize(300, 200) */
	          ->encode($mimetype, 100) 	// encode file to the specified mimetype
	          ->save(public_path($filepath));
	        
	        //save to db
	        $peserta = Peserta::where('no_registrasi',$input['no_registrasi'])->first();
	        $peserta->foto =  "$filename.$mimetype"; 
	        $peserta->save();
	        
	      } // <!--endif
	    

	  	//dd($input);
	  	$peserta = Peserta::where('no_registrasi', $input['no_registrasi'])->first();

	  	view()->share('peserta',$peserta);
        $pdf = PDF::loadView('home.cetak_kartu');

        //dd(base_path()."/public/images/mqk.png");
        //return $pdf->download('formulirpengajuanbeasiswa.pdf');
        //return $pdf->stream();
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('home.cetak_kartu')->stream();



	  	// return view('home/cetak_kartu',compact('peserta'));
	  }

	  public function rekapitulasi_peserta(){
	    $list_kafilah = Kafilah::lists('nama_kafilah','id_kafilah');

	    return view('home.rekapitulasi.form_rekapitulasi_peserta',compact('list_kafilah'));
	  }

	  public function filter_peserta(Request $request)
	  {
	      //
	      $input = $request->all();
	      //dd($input);
	      $list_kafilah = Kafilah::lists('nama_kafilah','id_kafilah');
	      $nama_kafilah = Kafilah::where('id_kafilah',$input['kafilah_id'])->value('nama_kafilah');
	      //dd($nama_kafilah);

	      $peserta = Peserta::where('status',1)->where('jenis_peserta','peserta')->where('kafilah_id',$input['kafilah_id'])->get();
	      //dd($peserta);

	      return view('home.rekapitulasi.rekapitulasi_peserta',compact('nama_kafilah','peserta','list_kafilah'));

	  }

	  public function rekapitulasi_peserta_invalid(){
	    $list_kafilah = Kafilah::lists('nama_kafilah','id_kafilah');

	    return view('home.rekapitulasi.form_rekapitulasi_peserta_invalid',compact('list_kafilah'));
	  }

	  public function filter_peserta_invalid(Request $request)
	  {
	      //
	      $input = $request->all();
	      //dd($input);
	      $list_kafilah = Kafilah::lists('nama_kafilah','id_kafilah');
	      $nama_kafilah = Kafilah::where('id_kafilah',$input['kafilah_id'])->value('nama_kafilah');
	      //dd($nama_kafilah);

	      $peserta = Peserta::where('status',2)->where('jenis_peserta','peserta')->where('kafilah_id',$input['kafilah_id'])->get();
	      //dd($peserta);

	      return view('home.rekapitulasi.rekapitulasi_peserta_invalid',compact('nama_kafilah','peserta','list_kafilah'));

	  }

}
