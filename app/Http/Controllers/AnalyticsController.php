<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib\Net\SSH2;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Input;
use App\Demos;
use Carbon\Carbon;

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

    public function chartView(){
        $today = Carbon::now();
        $day = Carbon::now()->addWeeks(-1);
        $week= Carbon::now()->startOfWeek();
        $totalDays = $today->diffInDays($day);

        $totalDays = $today->diffInDays($day);
        $startmonth = new Carbon('first day of last month');
        
        $endmonth = new Carbon('last day of last month');
        
        $user = DB::connection('mongodb')->collection('demos')->where('source','!=','(ntp.ubuntu.com):')->count();

        //Widgets
        $dailyQueries = DB::connection('mongodb')->collection('demos')->where('date','=',$today->format('d-M-Y'))->where('source','!=','(ntp.ubuntu.com):')->count();
        $weeklyQueries = DB::connection('mongodb')->collection('demos')->where('date','>=',$week->format('d-M-Y'))->where('source','!=','(ntp.ubuntu.com):')->count();
        $monthlyQueries = DB::connection('mongodb')->collection('demos')->where('date','>=',$startmonth->format('d-M-Y'))->where('date','<=',$endmonth->format('d-M-Y'))->where('source','!=','(ntp.ubuntu.com):')->count();
       
        //Query Types
        $A= DB::connection('mongodb')->collection('demos')->where('query_type','=','A')->where('date','>=',$week->format('d-M-Y'))->count();
        $AAAA= DB::connection('mongodb')->collection('demos')->where('query_type','=','AAAA')->where('date','>=',$week->format('d-M-Y'))->count();
        $PTR= DB::connection('mongodb')->collection('demos')->where('query_type','=','PTR')->where('date','>=',$week->format('d-M-Y'))->count();
        $TXT= DB::connection('mongodb')->collection('demos')->where('query_type','=','TXT')->where('date','>=',$week->format('d-M-Y'))->count();
        $MX= DB::connection('mongodb')->collection('demos')->where('query_type','=','MX')->where('date','>=',$week->format('d-M-Y'))->count();

        //Primary DNS
        $primary= DB::connection('mongodb')->collection('demos')->where('url','=','(10.0.2.15)')->where('date','>=',$week->format('d-M-Y'))->count();

        //Zone Files Queries
        $schoolfj = DB::connection('mongodb')->collection('demos')->where('destination','like', '%'.'.school.fj')->count();
        $comfj = DB::connection('mongodb')->collection('demos')->where('destination','like', '%'.'.com.fj')->count();
        $telecomlan = DB::connection('mongodb')->collection('demos')->where('destination','like', '%'.'.telecom.lan')->count();
        $govfj = DB::connection('mongodb')->collection('demos')->where('destination','like', '%'.'.gov.fj')->count();

        return view('analytics.queryChart')->with('user',$user)
                                            ->with('A',$A)
                                            ->with('PTR',$PTR)
                                            ->with('TXT',$TXT)
                                            ->with('MX',$MX)
                                            ->with('AAAA',$AAAA)
                                            ->with('dailyQueries', $dailyQueries)
                                            ->with('weeklyQueries',$weeklyQueries)
                                            ->with('monthlyQueries',$monthlyQueries)
                                            ->with('today',$today)
                                            ->with('day',$day)
                                             ->with('week',$week)
                                            ->with('primary',$primary)
                                            ->with('startmonth',$startmonth)
                                            ->with('schoolfj',$schoolfj)
                                            ->with('comfj',$comfj)
                                            ->with('telecomlan', $telecomlan )
                                            ->with('govfj',$govfj)
                                            ->with(compact('data'));
    }

    public function chartData(){

        $today = Carbon::now();
        $day = Carbon::now()->addWeeks(-4);
        $totalDays = $today->diffInDays($day);
       
        $weeklyQueries = DB::connection('mongodb')->collection('demos')->where('date','>=',$day->format('d-M-Y'))->count();
      
        $data = array();
        for($i = 0; $i <= $totalDays; $i++){
            $totalQueries = DB::connection('mongodb')->collection('demos')
                            ->where('date','=',$day->format('d-M-Y'))
                            ->where('source','!=','(ntp.ubuntu.com):')
                            ->count();  
            $dates[$i] = $day->format('d-M-Y');
            $numbers[$i] = $totalQueries;

            $day->addDays(1);    
        }

        $data = ['date' => $dates,'number' => $numbers];

        return response()->json($data);
    }

    public function dig(){
        $ssh = new SSH2('144.120.113.196');

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
