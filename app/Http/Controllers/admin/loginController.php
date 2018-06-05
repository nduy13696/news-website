<?php

namespace App\Http\Controllers\admin;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function index(){
        return view('admin/login');
    }

    public function login(){
        $usename=$_POST['txt_user'];
        $password=$_POST['txt_pass'];
        $query=DB::table('tbl_account')->select('usename','password')->where('usename','=',$usename)->where('password','=',$password)->count();
        if($query==1){
            Request::session()->put('login',true);
            Request::session()->put('message','Successful Login');
            Request::session()->put('name','Tran Nhat Duy');
            return redirect('/categories');
        }else{
            
            return redirect('/admin');
        }
    }

    public function logout(){
        Request::session()->flush();
        return redirect('admin');
    }
}
