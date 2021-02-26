<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\mod_general_info;
use App\mod_top_marketer;
use App\mod_slide;
use App\mod_agen;
use App\mod_store;
use App\mod_image;
use App\mod_rumah_gambar;
use App\mod_kota;
use App\mod_tipe;
use App\mod_user;
use App\mod_user_detail;

class c_mastermenu extends Controller
{

    public function home()
    {
        $alamat = '';$about = '';$email = '';$no_telp = '';
        $quote1 = '';$quote2 = '';

        $data = $this->getgeneral();
        $about = $this->get($data, 'about');
        $email = $this->get($data, 'email');
        $no_telp = $this->get($data, 'no_telp');
        $alamat = $this->get($data, 'alamat');
        $quote1 = $this->get($data, 'quote-of-the-day1');
        $quote2 = $this->get($data, 'quote-of-the-day2');
        $aboutdesc = $this->get($data, 'aboutdesc');
        $bannertext = $this->get($data, 'bannertext');

        $imagequote = $this->get($data, 'imagequote');

        $getkota = mod_kota::orderBy('nama', 'asc')->get();        

        $slide = mod_slide::orderBy('created_at', 'asc')->get();
        $url = $this->url();

        $store = mod_store::select('id as idstore','cd_properti','judul','harga','status','tipe','lt','lb','foto')->orderBy('created_at', 'asc')->skip(0)->take(8)->get();

        $topmk = mod_top_marketer::orderBy('created_at', 'asc')->pluck('id_marketer');
        $agenhome = mod_agen::whereIn('id', $topmk)->get();

        return view('home', ['about'=>$about, 'email'=>$email,'no_telp'=>$no_telp, 'alamat'=>$alamat,
                    'quote1'=>$quote1, 'quote2'=>$quote2, 'slide'=>$slide, 'url'=>$url, 'aboutdesc'=>$aboutdesc,
                     'bannertext'=>$bannertext, 'imagequote'=>$imagequote, 'agenhome'=>$agenhome, 'store'=>$store, 'getkota'=>$getkota]);
    }
     public function about()
    {
        $alamat = '';$about = '';$email = '';$no_telp = '';
        $quote1 = '';$quote2 = '';

        $data = $this->getgeneral();
        $about = $this->get($data, 'about');
        $aboutall = $this->get($data, 'aboutall');
        $visi = $this->get($data, 'visi');
        $misi = $this->get($data, 'misi');
        $email = $this->get($data, 'email');
        $no_telp = $this->get($data, 'no_telp');
        $alamat = $this->get($data, 'alamat');
        $quote1 = $this->get($data, 'quote-of-the-day1');
        $quote2 = $this->get($data, 'quote-of-the-day2');

        $getkota = mod_kota::orderBy('nama', 'asc')->get();

        $imageabout = mod_image::where('section','=', 'about-us')->orderBy('created_at', 'asc')->first();

        $url = $this->url();
        $urlimageall = $url.'/storage/1920x300_.jpg';

        return view('about', ['about'=>$about, 'email'=>$email,'no_telp'=>$no_telp, 'alamat'=>$alamat,'quote1'=>$quote1, 'quote2'=>$quote2,
         'aboutall'=>$aboutall, 'imageabout'=>$imageabout, 'visi'=>$visi, 'misi'=>$misi, 'url'=>$url,'urlimageall'=>$urlimageall, 'getkota'=>$getkota]);
    }
     public function productsell()
    {
        $alamat = '';$about = '';$email = '';$no_telp = '';
        $quote1 = '';$quote2 = '';$key='';

        $data = $this->getgeneral();
        $about = $this->get($data, 'about');
        $email = $this->get($data, 'email');
        $no_telp = $this->get($data, 'no_telp');
        $alamat = $this->get($data, 'alamat');
        $quote1 = $this->get($data, 'quote-of-the-day1');
        $quote2 = $this->get($data, 'quote-of-the-day2');

        $store = mod_store::select('id as idstore','cd_properti','judul','harga','lt','lb','foto')->where('status','=',1)->where('is_del','=',0)->orderBy('created_at', 'asc')->paginate(9);

        $url = $this->url();
        $urlimageall = $url.'/storage/1920x300_.jpg';

        $typeprd= '- Sell';

        $getkota = mod_kota::orderBy('nama', 'asc')->get();
        $gettipe = mod_tipe::orderBy('nama', 'asc')->get();

        return view('product', ['about'=>$about, 'email'=>$email,'no_telp'=>$no_telp, 'alamat'=>$alamat,'quote1'=>$quote1, 'quote2'=>$quote2, 
        'urlimageall'=>$urlimageall, 'url'=>$url, 'store'=>$store, 'typeprd'=>$typeprd, 'key'=>$key, 'getkota'=>$getkota, 'gettipe'=>$gettipe]);
    }
    public function productrent()
    {
        $alamat = '';$about = '';$email = '';$no_telp = '';
        $quote1 = '';$quote2 = '';$key='';

        $data = $this->getgeneral();
        $about = $this->get($data, 'about');
        $email = $this->get($data, 'email');
        $no_telp = $this->get($data, 'no_telp');
        $alamat = $this->get($data, 'alamat');
        $quote1 = $this->get($data, 'quote-of-the-day1');
        $quote2 = $this->get($data, 'quote-of-the-day2');

        $store = mod_store::select('id as idstore','cd_properti','judul','harga','lt','lb','foto')->where('status','=',2)->where('is_del','=',0)->orderBy('created_at', 'asc')->paginate(9);

        $url = $this->url();
        $urlimageall = $url.'/storage/1920x300_.jpg';

        $typeprd= '- Rent';

        $getkota = mod_kota::orderBy('nama', 'asc')->get();
        $gettipe = mod_tipe::orderBy('nama', 'asc')->get();

        return view('product', ['about'=>$about, 'email'=>$email,'no_telp'=>$no_telp, 'alamat'=>$alamat,'quote1'=>$quote1, 'quote2'=>$quote2, 
        'urlimageall'=>$urlimageall, 'url'=>$url, 'store'=>$store, 'typeprd'=>$typeprd, 'key'=>$key, 'getkota'=>$getkota, 'gettipe'=>$gettipe]);
    }
    public function productdetail($id)
    {
        $alamat = '';$about = '';$email = '';$no_telp = '';
        $quote1 = '';$quote2 = '';$status = '';$key='';

        $data = $this->getgeneral();
        $about = $this->get($data, 'about');
        $email = $this->get($data, 'email');
        $no_telp = $this->get($data, 'no_telp');
        $alamat = $this->get($data, 'alamat');
        $quote1 = $this->get($data, 'quote-of-the-day1');
        $quote2 = $this->get($data, 'quote-of-the-day2');

        $url = $this->url();
        $urlimageall = $url.'/storage/1920x300_.jpg';

         $storedetail = mod_store::where('id','=',$id)->orderBy('created_at', 'asc')->first();
         if($storedetail->status==1){$status = 'Di Jual';}
         else{$status = 'Di Sewakan';}
         $agenprd = mod_agen::where('id', '=',$storedetail->id_pic)->first();

         $gambarutama = mod_rumah_gambar::where('id_rumah', '=',$id)->first();
         $gambar = mod_rumah_gambar::where('id_rumah', '=',$id)->get();
         
         $user = mod_user::where('id', '=',$storedetail->id_pic)->first();
        //  dd($user);
          $userdetail = mod_user_detail::where('username', '=',$user->username)->first();
          
         

         $store = mod_store::select('id as idstore','cd_properti','judul','harga','lt','lb','foto')->where('id','<>',$id)->where('is_del','=',0)->inRandomOrder()->limit(3)->get();
        //  dd($store);

         $getkota = mod_kota::orderBy('nama', 'asc')->get();

        return view('productdetail', ['about'=>$about, 'email'=>$email,'no_telp'=>$no_telp, 'alamat'=>$alamat,'quote1'=>$quote1, 'quote2'=>$quote2, 
        'urlimageall'=>$urlimageall, 'url'=>$url, 'storedetail'=>$storedetail, 'store'=>$store, 'status'=>$status, 'agenprd'=>$agenprd, 
        'gambarutama'=>$gambarutama, 'gambar'=>$gambar, 'key'=>$key, 'getkota'=>$getkota, 'userdetail'=>$userdetail]);
    }
     public function team()
    {
        $alamat = '';$about = '';$email = '';$no_telp = '';
        $quote1 = '';$quote2 = '';

        $data = $this->getgeneral();
        $about = $this->get($data, 'about');
        $email = $this->get($data, 'email');
        $no_telp = $this->get($data, 'no_telp');
        $alamat = $this->get($data, 'alamat');
        $quote1 = $this->get($data, 'quote-of-the-day1');
        $quote2 = $this->get($data, 'quote-of-the-day2');

        $url = $this->url();
        $urlimageall = $url.'/storage/1920x300_.jpg';

        $agent = mod_agen::all();

        $getkota = mod_kota::orderBy('nama', 'asc')->get();

        return view('team', ['about'=>$about, 'email'=>$email,'no_telp'=>$no_telp, 'alamat'=>$alamat,'quote1'=>$quote1, 'quote2'=>$quote2 ,
        'urlimageall'=>$urlimageall, 'url'=>$url, 'agent'=>$agent, 'getkota'=>$getkota]);
    }
     public function contact()
    {
        $alamat = '';$about = '';$email = '';$no_telp = '';
        $quote1 = '';$quote2 = '';

        $data = $this->getgeneral();
        $about = $this->get($data, 'about');
        $email = $this->get($data, 'email');
        $no_telp = $this->get($data, 'no_telp');
        $alamat = $this->get($data, 'alamat');
        $quote1 = $this->get($data, 'quote-of-the-day1');
        $quote2 = $this->get($data, 'quote-of-the-day2');

        $url = $this->url();
        $urlimageall = $url.'/storage/1920x300_.jpg';
        $urlimagecontact = $url.'/storage/360x333_contact_us.jpg';

        $getkota = mod_kota::orderBy('nama', 'asc')->get();


        return view('contact', ['about'=>$about, 'email'=>$email,'no_telp'=>$no_telp, 'alamat'=>$alamat,'quote1'=>$quote1, 'quote2'=>$quote2, 
        'urlimageall'=>$urlimageall, 'urlimagecontact'=>$urlimagecontact, 'getkota'=>$getkota]);
    }
    public function getgeneral(){
        $general = mod_general_info::orderBy('created_at', 'asc')->get();
        return $general;
    }
     public function get($data, $type){
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
