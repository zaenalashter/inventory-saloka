<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\mod_store;
use App\mod_general_info;
use App\mod_top_marketer;
use App\mod_slide;
use App\mod_agen;
use App\mod_image;
use App\mod_kota;
use App\mod_area;
use App\mod_tipe;

class c_store extends Controller
{
    public function get(Request $request){
        // return $request->area;

        $alamat = '';$about = '';$email = '';$no_telp = '';
        $quote1 = '';$quote2 = '';$typeprd='';$key='';
        $ktc='';$arc='';$st='';$ktn='';$arn='';

        $data = $this->getgeneral();
        $about = $this->getdata($data, 'about');
        $email = $this->getdata($data, 'email');
        $no_telp = $this->getdata($data, 'no_telp');
        $alamat = $this->getdata($data, 'alamat');
        $quote1 = $this->getdata($data, 'quote-of-the-day1');
        $quote2 = $this->getdata($data, 'quote-of-the-day2');


        $hargaFrom = 0;
        $hargaTo = 999999999999999;
        if($request->hargaawal){
            $hargaFrom = $request->hargaawal;
        }
        if($request->hargaakhir){
            $hargaTo = $request->hargaakhir;
        }

        $luasFrom = 0;
        $luasTo = 999999999999999;
        if($request->luasawal){
            $luasFrom = $request->luasawal;
        }
        if($request->luasakhir){
            $luasTo = $request->luasakhir;
        }

        $cari=$request->cari;
        $kota=$this->cekvalue($request->kota);
        $area=$this->cekvalue($request->area);
        $type=$this->cekvalue($request->tipe);
        $status=$this->cekvalue($request->status);
        $kt=$this->cekvalue($request->kt);
        $km=$this->cekvalue($request->km);

        // 
        // 
        if($request->status == 1){
            $st='Dijual -';
        }elseif($request->status == 2){
            $st='Disewakan -';
        }else{
            $st='Jual/Sewa';
        }

        if($request->kota){
            $ktc = mod_kota::where('id','=',$request->kota)->first();
            $ktn=$ktc->nama;
            $key=$st.' ('.$ktc->nama.')';
        }
        if($request->area){
            $arc = mod_area::where('id','=',$request->area)->first();
            // dd($arc);
            $arn=$arc->nama;
            $key=$st.' ('.$ktn.' '.$arn.')';
        }
        // dd($arn.'-'.$request->area);
        

        $page=$request->page;

        $getkota = mod_kota::orderBy('nama', 'asc')->get();
        $gettipe = mod_tipe::orderBy('nama', 'asc')->get();

        $store = mod_store::select('id as idstore','cd_properti','judul','harga','lt','lb','foto')
            ->where('judul','like', '%'.$cari.'%')
            ->where('id_kota','like',$kota)
            ->where('id_area','like',$area)
            ->whereBetween('harga', [$hargaFrom, $hargaTo])
            ->where('status','like',$status)
            ->where('tipe','like',$type)
            ->where('kt','like',$kt)
            ->where('km','like',$km)
            ->whereBetween('lb', [$luasFrom, $luasTo])
            ->where('is_del','=',0)
            ->orderBy('created_at', 'asc')->paginate(9);
        // dd($cari.'-'.$kota.'-'.$area.'-'.$hargaFrom.'-'.$hargaTo.'-'.$status.'-'.$type.'-'.$kt.'-'.$km.'-'.$store);
        $url = $this->url();
        $urlimageall = $url.'/storage/1920x300_.jpg';

        return view('product', ['about'=>$about, 'email'=>$email,'no_telp'=>$no_telp, 'alamat'=>$alamat,'quote1'=>$quote1, 'quote2'=>$quote2, 
        'urlimageall'=>$urlimageall, 'url'=>$url, 'store'=>$store, 'typeprd'=>$typeprd, 'key'=>$key, 'getkota'=>$getkota, 'gettipe'=>$gettipe]);
    }
    public function detail($idstore){
        $storedetail = mod_store::where('id','=',$idstore)->orderBy('created_at', 'asc')->first();
        return $storedetail;
    }

    public function cekvalue($val){
        $rslt;
        if($val){
            $rslt=$val;
        }else{
            $rslt='%%';
        }
        return $rslt;
    }

    public function getgeneral(){
        $general = mod_general_info::orderBy('created_at', 'asc')->get();
        return $general;
    }
     public function getdata($data, $type){
        $result;

        if($type=='about'){
            $section ='header-section';
            $area ='tagline';
        }elseif($type=='aboutall'){
            $section ='about-us';
            $area ='';
        }elseif($type=='quote-of-the-day1'){
            $section ='quote-of-the-day';
            $area ='atas';
        }elseif($type=='quote-of-the-day2'){
            $section ='quote-of-the-day';
            $area ='bawah';
        }elseif($type=='email'){
            $section ='contact-us';
            $area ='email';
        }elseif($type=='no_telp'){
            $section ='contact-us';
            $area ='no_telp';
        }elseif($type=='alamat'){
            $section ='contact-us';
            $area ='alamat';
        }elseif($type=='aboutdesc'){
            $section ='header-section';
            $area ='deskripsi-singkat';
        }elseif($type=='bannertext'){
            $section ='slider-text';
            $area ='-';
         }elseif($type=='imagequote'){
            $section ='image-quote';
            $area ='-';
        }elseif($type=='visi'){
            $section ='visi';
            $area ='-';
        }elseif($type=='misi'){
            $section ='misi';
            $area ='-';
        }else{
            $section ='header-section';
            $area ='tagline';
        }

        foreach($data as $gnrl){
            if($gnrl['section']==$section){
                if($gnrl['area']==$area){
                    $result = $gnrl['data'];
                }                
            }
        }
        return $result;
    }

    public function url()
    {
        $url = 'https://hepiproperty.com';
        return $url;
    }

}
