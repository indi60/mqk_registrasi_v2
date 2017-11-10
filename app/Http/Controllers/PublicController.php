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
use DB;
use App\MajelisPeserta;
use App\Kafilah;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function leaderboard()
    {
    	$id_majelis = rand(1,56);
    	$input = array("pria", "wanita");
		$jenis_kelamin = $input[rand(0,1)];
    	
    	$list_peserta = MajelisPeserta::where('majelis_id', $id_majelis)
                ->orderByRaw("jumlah_menang DESC, nilai_total DESC, no_urut ASC")    
                ->get();

    	while ($list_peserta->count()==0) {
    		$id_majelis = rand(1,56);
	    	$input = array("pria", "wanita");
			$jenis_kelamin = $input[rand(0,1)];
	    	
	    	$list_peserta = MajelisPeserta::where('majelis_id', $id_majelis)
	                ->orderByRaw("jumlah_menang DESC, nilai_total DESC, no_urut ASC")    
	                ->get();
    	}
    	
        
        
        foreach ($list_peserta as $row) {
            $row->jenis_lomba = $row->majelis->bidang_lomba_majelis->jenis_lomba;
            $row->nilai = $row->nilai_total;
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

        
        return view('public.leaderboard', compact('peserta','list_peserta', 'jenis_kelamin'));
        //return view('public.leaderboard');
    }

    public function medal()
    {
        
        $list_kafilah = Kafilah::get();
        
        foreach ($list_kafilah as $row) {

            $emas = DB::table('majelis_peserta')
                    ->join('peserta', 'peserta.no_peserta', '=', 'majelis_peserta.no_peserta')
                    ->where('peserta.kafilah_id',$row->id_kafilah)
                    ->where('juara',1)
                    ->count();

            $perak = DB::table('majelis_peserta')
                    ->join('peserta', 'peserta.no_peserta', '=', 'majelis_peserta.no_peserta')
                    ->where('peserta.kafilah_id',$row->id_kafilah)
                    ->where('juara',2)
                    ->count(); 

            $perunggu = DB::table('majelis_peserta')
                    ->join('peserta', 'peserta.no_peserta', '=', 'majelis_peserta.no_peserta')
                    ->where('peserta.kafilah_id',$row->id_kafilah)
                    ->where('juara',3)
                    ->count();                
               

            $row->emas = $emas;
            $row->perak = $perak;
            $row->perunggu = $perunggu;
            $row->total = $emas+$perak+$perunggu;

        }

        // $list_kafilah = $list_kafilah->sortByDesc('emas')->sortByDesc('perak');

        $list_kafilah = $list_kafilah->sort(
            function ($b, $a) {
                // sort by column1 first, then 2, and so on
                return strcmp($a->emas, $b->emas)
                    ?: strcmp($a->perak, $b->perak)
                    ?: strcmp($a->perunggu, $b->perunggu)
                    ?: strcmp($b->nama_kafilah, $a->nama_kafilah);
            }
        );


        
        return view('public.medal', compact('list_kafilah'));
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function majelis()
    {
        $majelis_list = Majelis::get();
        $jumlah_majelis = Majelis::count();

        foreach ($majelis_list as $row) {
            $row->jumlah_peserta = MajelisPeserta::where('majelis_id', $row->id_majelis)->count();

        }

        //dd($majelis_list[0]->dewan_hakim_1_majelis);
        
        return view('public.majelis', compact('majelis_list','jumlah_majelis'));
    }

    public function list_peserta($id)
    {
        $list_peserta = MajelisPeserta::where('majelis_id', $id)
                ->orderByRaw("jumlah_menang DESC, nilai_total DESC, no_urut ASC")    
                ->get();
        
        foreach ($list_peserta as $row) {
            $row->jenis_lomba = $row->majelis->bidang_lomba_majelis->jenis_lomba;
            $row->nilai = $row->nilai_total;
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

        
        return view('public.list_peserta', compact('peserta','list_peserta'));
    }

    public function home(){
        return view('public.home');
    }
}
