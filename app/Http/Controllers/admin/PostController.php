<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\model\post;
use App\model\models;
use Illuminate\Support\Facades\Input as input;

class PostController extends Controller
{
    public function index(){
        // $post=\App\model\post::paginate(3);
        $record = DB::table('tbl_posts as p')->join('tbl_cateories as ct','cateory_id','=','ct.id')->select('p.id','p.avatar','p.title','p.slug','p.description','p.content','p.active','p.create_at','p.position','ct.name')->get();
        $post=json_decode(json_encode($record),true);
        return view('admin\post\index',['allPost'=>$post]);
    }

    public function create(){
        $categories=DB::table('tbl_cateories')->select('id','name')->get();
        $result=json_decode($categories,true);
        return view('admin\post\create',['AllCategoryID'=>$result]);
    }

    public function save(){

        $title=$_POST['txt_title'];
        $slug=$_POST['txt_slug'];
        $description=$_POST['txt_des'];
        $content=$_POST['editior1'];
        $active=$_POST['rd_active'];
        $position=$_POST['txt_position'];
        $categoryID=$_POST['sl_category'];
        $image='';
        if(input::hasFile('txt_file')){
            $file = Input::file('txt_file');
            $file->move('uploads', $file->getClientOriginalName());
            $image="http://fireaway.local/uploads/".$file->getClientOriginalName();
        }
        DB::insert('insert into tbl_posts(title,slug,description,content,active,position,cateory_id,avatar) values(?,?,?,?,?,?,?,?)',[$title,$slug,$description,$content,$active,$position,$categoryID,$image]);
        return redirect('/post');
    }

    public function delete($id){
        $post= post::find($id);
        $post -> delete();
        return redirect('/post');
    }

    public function edit($id){
        $categories=models::all();
        $post=post::find($id);
        return view('admin\post\edit',['AllCategoryID'=>$categories],['allPost'=>$post]);
    }

    public function editsave($id){
        $title=$_POST['txt_title'];
        $slug=$_POST['txt_slug'];
        $description=$_POST['txt_des'];
        $content=$_POST['editior1'];
        $active=$_POST['rd_active'];
        $position=$_POST['txt_position'];
        $categoryID=$_POST['sl_category'];
        $image='';
        if(input::hasFile('txt_file')){
            $file = Input::file('txt_file');
            $file->move('uploads', $file->getClientOriginalName());
            $image="http://fireaway.local/uploads/".$file->getClientOriginalName();
        }
        $post = post::find($id);
        $post->title =$title;
        $post->slug =$slug;
        $post->description =$description;
        $post->content =$content;
        $post->active =$active;
        $post->position =$position;
        $post->cateory_id =$categoryID;
        $post->avatar=$image;
        $post->save();
        return redirect('/post');
    }
}
