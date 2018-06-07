<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategotyRequest;
use App\Http\Controllers\Controller;
use App\model\models;
use Session;

class CategoryController extends Controller
{
    public function index(){
        $categories=\App\model\models::paginate(10);
        return view('admin\categories\index',['allCategories'=>$categories]);
    }

    public function create(){
        $categories=\App\model\models::all();
        return view('admin\categories\create',['allCategories'=>$categories]);
    }

    public function save(CategotyRequest $rq){
        $name = $rq->txt_name;
        $slug= $rq->txt_slug;
        $active= $rq->rd_active;
        $position= $rq->txt_position;
        $parent= $rq->sl_parent;

        $categoryS=new models;
        $categoryS->name=$name;
        $categoryS->slug=$slug;
        $categoryS->active=$active;
        $categoryS->position=$position;
        $categoryS->parent_id=$parent;
        $categoryS->save();
        return redirect('categories');
    }

    public function delete($id){
        $category=models::find($id);
        $category->delete();
        return redirect('categories');
    }

    public function edit($id){
        $categories=\App\model\models::all();
        $category=models::find($id);
        return view('admin/categories/update',['categories'=>$category],['allCategories'=>$categories]);
    }

    public function editsave($id){
        $name = $_POST['txt_name'];
        $slug= $_POST['txt_slug'];
        $active= $_POST['rd_active'];
        $position= $_POST['txt_position'];
        $parent= $_POST['sl_parent'];
        $category=models::find($id);
        $category->name=$name;
        $category->slug=$slug;
        $category->active=$active;
        $category->position=$position;
        $category->parent_id=$parent;
        $category->save();
        return redirect('categories');
    }
}
