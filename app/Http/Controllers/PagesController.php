<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
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
    public function home (Request $request){
        $request->user()->authorizeRoles(['admin','ISP','CSR']);
        return view('pages.home');
    }
    public function users (Request $request){
        $request->user()->authorizeRoles('admin');
        $data = User::select('id','name','email','password')->get();
        $results = Role::select('name')->get();
        return view('pages.users')->withData($data,$results);
    }

    public function support (Request $request){
        $request->user()->authorizeRoles('CSR');
        return view('pages.support');
    }


}
