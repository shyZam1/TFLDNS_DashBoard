<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\ZoneList;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
       return view('pages.home',['list'=>$list])->with(compact('zonelist'));
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
        $zonelist = json_encode($zonelist,JSON_PRETTY_PRINT);
        $zonelist = str_replace('"','',$zonelist);
        $zonelist = str_replace('\t'," ",$zonelist);
        $zonelist = explode('\n',$zonelist);
        return view('pages.home',['list'=>$list])->with(compact('zonelist'));

        dd($x);
    }

    // public function homeQuery (Request $request){

    //     $query = $request->all();

    //      $ssh = new SSH2('144.120.113.197');

    //     if (!$ssh->login('arto', 'shitonu81')) {
    //         exit('Login Failed');
    //     }

    //     //  $output = $ssh->exec('dig SOA +noadditional +noquestion +nocomments +nocmd +nostats +multiline google.com');
    //     $output = $ssh->exec('cd /etc/bind/zone; ls');      
    //     $output = json_encode( $output,JSON_PRETTY_PRINT);
    //     $output = str_replace('"','',$output);
    //     $list = explode('\n',$output);
    //     array_pop($list);    

    //     $zonelist = $ssh->exec('cd /etc/bind/zone; cat ' . $query);
    //     $zonelist = json_encode($zonelist,JSON_PRETTY_PRINT);
    //     $zonelist = str_replace('"','',$zonelist);
    //     $zonelist = str_replace('\t'," ",$zonelist);
    //     $zonelist = explode('\n',$zonelist);
    //     //return view('pages.table',['list'=>$list])->with(compact('zonelist'));
    //     $html = view('pages.table', ['list'=>$list])->with(compact('zonelist'))->render();

    //     return response()->json(compact('html'));
    // }

    public function users (Request $request){
        // $data = User::select('id','name','email','password')->get();
        // $results = Role::select('name')->get();
        $data = DB::table('users')
                
                ->leftJoin('role_user','users.id', '=','role_user.user_id')
                ->leftJoin('roles','role_user.role_id','=','roles.id')
                ->select('users.id', 'users.name' , 'users.email','roles.name as role', 'users.password')->get();
        return view('pages.users')->withData($data);
    }

    public function support (Request $request){
        $ssh = new SSH2('144.120.113.197');

        if (!$ssh->login('arto', 'shitonu81')) {
            exit('Login Failed');
        }

        // $output = $ssh->exec('dig ANY +noadditional +noquestion +nocomments +nocmd +nostats computer.telecom.lan');
        $zonelist = $ssh->exec('cd /etc/bind/zone; cat computer.telecom.lan');
        $zonelist = json_encode($zonelist,JSON_PRETTY_PRINT);
        $zonelist = str_replace('"','',$zonelist);
        $zonelist = str_replace('\t'," ",$zonelist);
        $zonelist = explode('\n',$zonelist);
        
        //  dd($list);
        
        //  return view('pages.support',['output'=>$output]);
        //$output = str_replace('"','',$output);
        
        array_pop($zonelist);
        //echo $output;
       // $output = $ssh->exec('cd /etc/bind/zone; ls');  
       return view('pages.support',['zonelist'=>$zonelist]);
    }

    

} 
