<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\ZoneList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

use phpseclib\Net\SSH2;
class PagesController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index (){
        return view('pages.index');
    }

    public function welcome (){
        return view('welcome');
    }

    public function search (){
        return view('pages.domainSearch');
    }

    public function subDomainQuery(){
         $q = Input::get ( 'q' );
	    $x = Input::get ( 'x' );
        if($q != ""){
            $domain = ZoneList::where( 'domain_name','=', $q . $x )->get ();
            if (count ( $domain ) > 0)
                return view ( 'pages.domainSearch' )->withDetails ( $domain )->withQuery ( $q );
            else
                return view ( 'pages.domainSearch' )->withMessage ( 'No existing Domain,  ' . $q . $x .' is available.');
        }
        return view ( 'pages.domainSearch' )->withMessage ( 'Please enter domain.');
    }

    public function home (){

        $ssh = new SSH2('144.120.113.197');

        if (!$ssh->login('arto', 'shitonu81')) {
            exit('Login Failed');
        }

        //  $output = $ssh->exec('dig SOA +noadditional +noquestion +nocomments +nocmd +nostats +multiline google.com');
        $output = $ssh->exec('cd /etc/bind/zone; ls');      
        $output = json_encode( $output,JSON_PRETTY_PRINT);
        $output = str_replace('"','',$output);
        $list = explode('\n',$output);
        array_pop($list);    

        $zonelist = $ssh->exec('cd /etc/bind/zone; cat');
        $zonelist = json_encode($zonelist,JSON_PRETTY_PRINT);
        $zonelist = str_replace('"','',$zonelist);
        $zonelist = str_replace('\t'," ",$zonelist);
        $zonelist = explode('\n',$zonelist);

        $today = Carbon::now()->format('d-M-Y');
        $yesterday = Carbon::yesterday()->format('d-M-Y');
        $lastWeek = Carbon::now()->addWeeks(-1)->format('d-M-Y');
       return view('pages.home',['list'=>$list])->with(compact('zonelist'))->with('time',$today)->with('yes',$yesterday)->with('lastWeek',$lastWeek);
    // return view('pages.home',['list'=>$list]);
    }

    public function home2 (){

        $x = Input::get('x');

       

        $ssh = new SSH2('144.120.113.197');

        if (!$ssh->login('arto', 'shitonu81')) {
            exit('Login Failed');
        }

        //  $output = $ssh->exec('dig SOA +noadditional +noquestion +nocomments +nocmd +nostats +multiline google.com');
        $output = $ssh->exec('cd /etc/bind/zone; ls');      
        $output = json_encode( $output,JSON_PRETTY_PRINT);
        $output = str_replace('"','',$output);
        $list = explode('\n',$output);
        array_pop($list);    

        $zonelist = $ssh->exec('cd /etc/bind/zone; cat'." ". $x);
        //dd($zonelist);
        $zonelist = json_encode($zonelist,JSON_PRETTY_PRINT);
        $zonelist = str_replace('"','',$zonelist);
        $zonelist = explode('\n',$zonelist);
        $zonelist = str_replace('\t',"&nbsp &nbsp &nbsp",$zonelist);
       //dd($zonelist);
        
       $today = Carbon::now()->format('d-M-Y');
       $yesterday = Carbon::yesterday()->format('d-M-Y');
       $lastWeek = Carbon::now()->addWeeks(-1)->format('d-M-Y');

        return view('pages.home',['list'=>$list])->with(compact('zonelist'))->with('time',$today)->with('yes',$yesterday)->with('lastWeek',$lastWeek);

        dd($x);
    }

   

   

    

} 
