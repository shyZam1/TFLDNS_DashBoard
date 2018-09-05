<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib\Net\SSH2;
use Illuminate\Support\Facades\Input;

class AnalyticsController extends Controller
{   
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-analytics');
    }


    public function digView(){
        return view('analytics.digWeb');
    }

    public function dig(){
        $ssh = new SSH2('144.120.113.197');

        if (!$ssh->login('arto', 'shitonu81')) {
            exit('Login Failed');
        }

        $record = Input::get ( 'recordType' );
	    $hostname = Input::get ( 'hostname' );

        $dig = $ssh->exec('dig'." ".$record." ". '+noadditional +noquestion +nocomments +nocmd +nostats'." ". $hostname);
        $dig = json_encode($dig,JSON_PRETTY_PRINT);
        $dig = str_replace('"','',$dig);
        $dig = str_replace('\t'," ",$dig);
        $dig = explode('\n',$dig);

        return view('analytics.digWeb',['dig'=>$dig]);
    }
}
