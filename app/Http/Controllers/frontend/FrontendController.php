<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\model\models;
use App\model\post;

class FrontendController extends Controller
{
    public function index(){
        $categories=\App\model\models::all();
        $post=post::orderBy('create_at','desc')->paginate(5);
        $record=DB::table('tbl_posts')->orderBy('create_at','desc')->limit(1)->get();
        $featureLg=json_decode($record,true);
        $record2=DB::table('tbl_posts')->orderBy('create_at','desc')->offset(1)->limit(2)->get();
        $featureXs=json_decode($record2,true);
        return view('frontend\index',['AllCategory'=>$categories],['ftArticleLG'=>$featureLg])->with('ftArticleXS',$featureXs)->with('LastedPost',$post);
    }

    public function post($slug){
        $post=post::where('slug',$slug)->get();
        $Lastedpost=post::orderBy('create_at','desc')->paginate(5);
        //$post=json_decode(json_encode($query),true);
        return view('frontend\post',['postDetail'=>$post])->with('LastedPost',$Lastedpost);
    }

    public function postList($slug){
        $record3=DB::table('tbl_posts as p')->select('p.*')->join('tbl_cateories as ct','p.cateory_id','=','ct.id')->where('ct.slug','=',$slug)->paginate(4);
        $Lastedpost=post::orderBy('create_at','desc')->paginate(5);
        return view('frontend\list',['Article'=>$record3])->with('LastedPost',$Lastedpost);
    }

    public function customer(){
        $id=$_POST['post_id'];
        $slug=$_POST['post_slug'];
        $name=$_POST['txt_cus_name'];
        $email=$_POST['txt_cus_email'];
        $cmt=$_POST['txt_cus_cmt'];
        $cus_id=DB::table('customer_comment')->insert([
            ['customer_name' => $name,'customer_email' => $email,'customer_post'=>$cmt,'post_id'=>$id]
        ]);
        return redirect(action('frontend\FrontendController@post',['slug'=>$slug]));
    }

    public function search(){
        $keyword=$_POST['txt_search'];
        $Lastedpost=post::orderBy('create_at','desc')->paginate(5);
        $result=post::where('title','like','%'.$keyword.'%')->get();
        return view('frontend\search',['result'=>$result])->with('LastedPost',$Lastedpost);
    }
}
