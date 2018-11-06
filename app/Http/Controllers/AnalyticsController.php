<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib\Net\SSH2;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\Input;
use App\Demos;
use Carbon\Carbon; 

 /**
 * References 
 * -----------------------------------------------------------------------------------'
 * 1. Carbon 
 *    Title: Carbon extension for PHP Time
 *    Author: Carbon Docs
 *    Date: 6/11/2018
 *    Code version: 2.5.0, PHP 7.1, Laravel 5.4
 *    Availability: https://carbon.nesbot.com/docs/
 * 
 * 2. Laravel SSH Connections
 *    Title: SSH
 *    Author: Laravel Docs
 *    Date: 6/11/2018
 *    Code version: PHP 7.1, Laravel 5.4
 *    Availability: https://laravel.com/docs/4.2/ssh
 * 
 * 3. Search Functionality
 *    Title: Paginated data with Search functionality – laravel
 *    Author: Avinash Nethala
 *    Date: 6/6/2016
 *    Code version: PHP 7.1, Laravel 5.4
 *    Availability: https://justlaravel.com/paginated-data-search-laravel/
 * 
 * 4. User Roles and Permissions
 *    Title: Easy roles and permissions in Laravel 5.4
 *    Author: Saqueib Ansari
 *    Date: 1/6/2017
 *    Code version: PHP 7.1, Laravel 5.4
 *    Availability: https://justlaravel.com/paginated-data-search-laravel/
 * 
 * 5. Highcharts API
 *    Title: Time series data and Donut graph
 *    Author: Highcharts Docs
 *    Date: 6/11/2018
 *    Code version: PHP 7.1, Laravel 5.4
 *    Availability: https://www.highcharts.com/demo
 * 
 * 6. SB-Admin Template
 *    Title: SB-Admin Template - For Laravel 5.4
 *    Author: Sankhadeep Roy
 *    Date: 25/3/2015
 *    Code version: PHP 7.1, Laravel 5.4
 *    Availability: https://github.com/start-laravel/sb-admin-laravel
*/ 

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
        $this->middleware('permission:view-analytics');// setting access control here.
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

    // using carbon to get the date and time
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

    // using ssh to remotely run commands on dns server
    public function dig(){
        $ssh = new SSH2('144.120.113.197');

        if (!$ssh->login('arto', 'shitonu81')) {
            exit('Login Failed');
        }
        // give two inputs i.e record type and hostname
        $record = Input::get ( 'recordType' );
	    $hostname = Input::get ( 'hostname' );
        //This is the command run on the dns server
        $dig = $ssh->exec('dig'." ".$record." ". '+noadditional +noquestion +nocomments +nocmd +nostats'." ". $hostname);
        $dig = json_encode($dig,JSON_PRETTY_PRINT);
        $dig = str_replace('"','',$dig);
        $dig = str_replace('\t'," ",$dig);
        $dig = explode('\n',$dig);
        //returning the results in a view.
        return view('analytics.digWeb',['dig'=>$dig]);
    }
}
