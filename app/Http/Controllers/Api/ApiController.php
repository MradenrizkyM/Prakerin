<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Kasus;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Rw;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $data = [];
    public function global()
    {
       $response = Http::get('https://api.kawalcorona.com/')->json();
       //dd($response);
       foreach ($response as $data =>$val){
           $raw = $val['attributes'];
           $res = [   
               'Negara' => $raw['Country_Region'],
               'Positif' => $raw['Confirmed'],
               'Sembuh' => $raw['Recovered'],
               'Meninggal' => $raw['Deaths']
           ]; 
           array_push ($this->data, $res);
       }
       $data = [
           'success' => true,
           'data' => $this->data,
           'message' => 'Data Berhasil'
       ];
       return response()->json($data,200);
    }
    
    public function indonesia()
    {
      

        //Data SeIndonesia
        $positif = DB::table('rws')
        ->select('kasuses.positif','kasuses.meninggal','kasuses.sembuh')->join('kasuses',
                'rws.id', '=', 'kasuses.id_rw')->sum('kasuses.positif');
        $meninggal = DB::table('rws')
        ->select('kasuses.positif','kasuses.meninggal','kasuses.sembuh')->join('kasuses',
                'rws.id', '=', 'kasuses.id_rw')->sum('kasuses.meninggal');
        $sembuh = DB::table('rws')
        ->select('kasuses.positif','kasuses.meninggal','kasuses.sembuh')->join('kasuses',
                'rws.id', '=', 'kasuses.id_rw')->sum('kasuses.sembuh');

                $res = [
                    'succsess' => true,
                    'Data' => 'Data Kasus Indonesia',
                    'Jumlah Positif' => $positif,
                    'Jumlah Meninggal' => $meninggal,
                    'Jumlah Sembuh' => $sembuh,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function hari()
    {
        //Data Perhari
        $kasus2 = kasus::get('created_at')->last();
        $positif = kasus::where('tanggal', date('Y-m-d'))->sum('positif');
        $sembuh = kasus::where('tanggal', date('Y-m-d'))->sum('sembuh');
        $meninggal = kasus::where('tanggal', date('Y-m-d'))->sum('meninggal');

        $join = DB::table('kasuses')
                    ->select('positif', 'sembuh', 'meninggal')
                    ->join('rws' ,'kasuses.id_rw', '=', 'rws.id')
                    ->get();
        $arr1 = [
            'positif' =>$join->sum('positif'),
            'sembuh' =>$join->sum('sembuh'),
            'meninggal' =>$join->sum('meninggal'),
        ];
        $arr2 = [
            'positif' =>$positif,
            'sembuh' =>$sembuh,
            'meninggal' =>$meninggal,
        ];
        $arr = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $arr2,
                'total' => $arr1
            ],
            'message' => 'Berhasil'
        ];
        
        return response()->json($arr, 200);
    }

    public function provinsi($id)
    {
        //Data Provinsi Dengan Id
        $data = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
        ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
        ->join('desas','desas.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_desa', '=', 'desas.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->where('provinsis.id',$id)
        ->select('nama_provinsi',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_provinsi')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function provinsi1()
    {
        //Data Provinsi 
        $data = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi', '=', 'provinsis.id')
        ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
        ->join('desas','desas.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_desa', '=', 'desas.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('nama_provinsi',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_provinsi')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function kota($id)
    {
        //Data Kota Dengan Id
        $data = DB::table('kotas')
        ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
        ->join('desas','desas.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_desa', '=', 'desas.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->where('kotas.id',$id)
        ->select('nama_kota',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_kota')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }
    
    public function kota1()
    {
        //Data Kota 
        $data = DB::table('kotas')
        ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
        ->join('desas','desas.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_desa', '=', 'desas.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('nama_kota',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_kota')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function kecamatan($id)
    {
        //Data Kecamatan Dengan Id
        $data = DB::table('kecamatans')
        ->join('desas','desas.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_desa', '=', 'desas.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->where('kecamatans.id',$id)
        ->select('nama_kecamatan',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_kecamatan')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function kecamatan1()
    {
        //Data Kecamatan 
        $data = DB::table('kecamatans')
        ->join('desas','desas.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_desa', '=', 'desas.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('nama_kecamatan',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_kecamatan')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function desa($id)
    {
        //Data Desa Dengan Id
        $data = DB::table('desas')
        ->join('rws','rws.id_desa', '=', 'desas.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->where('desas.id',$id)
        ->select('nama_desa',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_desa')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function desa1()
    {
        //Data Desa 
        $data = DB::table('desas')
        ->join('rws','rws.id_desa', '=', 'desas.id')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('nama_desa',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_desa')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function rw($id)
    {
        //Data Rw Dengan Id
        $data = DB::table('rws')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->where('rws.id',$id)
        ->select('nama_rw',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_rw')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function rw1()
    {
        //Data Rw 
        $data = DB::table('rws')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('nama_rw',
        DB::raw('sum(kasuses.positif) as positif'),
        DB::raw('sum(kasuses.meninggal) as meninggal'),
        DB::raw('sum(kasuses.sembuh) as sembuh'))
        ->groupBy('nama_rw')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}