@extends('layout.admin_master')
@section('title')
Edit Post
@stop
@section('content')
          <div class="box-body">
              <p><a href="/post" class='btn btn-success'>Back</a></p>
              <form action="<?= action('admin\PostController@editsave',['id'=>$allPost->id]) ?>" method='post' enctype="multipart/form-data">
                  @csrf
                <table class='table table-responsive'>
                    <tr>
                        <th>Title</th>
                        <td><input type="text" class='form-control' placeholder='Enter Title' name='txt_title' value='<?=$allPost->title?>'></td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td><input type="text" class='form-control' placeholder='Enter Slug' name='txt_slug' value='<?=$allPost->slug?>'></td>
                    </tr>
                    <tr>
                        <th>Image</th>
                        <td><input type="file" class='form-control' placeholder='Enter Slug' name='txt_file' value='<?=$allPost->avatar?>'></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><input type="text" class='form-control' placeholder='Enter Description' name='txt_des' value='<?=$allPost->description?>'></td>
                    </tr>
                    <tr>
                        <th>Content</th>
                        <td><textarea name="editior1" id="editior1" cols="30" rows="30"><?=$allPost->content?></textarea></td>
                    </tr>
                    <tr>
                        <th>Show/Hide</th>
                        <td><input type="radio" value=0 name='rd_active' <?=$allPost->active==0?'checked':''?>> Hide <br> <input type="radio" value=1 name='rd_active' <?=$allPost->active==1?'checked':''?>> Show</td>
                    </tr>
                    <tr>
                        <th>Position</th>
                        <td><input type="number" class='form-control' placeholder='Enter Position' name='txt_position' value='<?=$allPost->position?>'></td>
                    </tr>
                    <tr>
                        <th>Categories</th>
                        <td>
                        <select class='form-control' name="sl_category" id="">
                            <?php foreach($AllCategoryID as $CategoryID): ?>
                            <option value="<?=$CategoryID->id?>" <?=$allPost->cateory_id==$CategoryID->id?'selected':''?>><?=$CategoryID->name?></option>
                            <?php endforeach ; ?> 
                        </select>
                        </td>
                    </tr>
                </table>
                <div class="text-center">
                    <input type="submit" value='Submit' class='btn btn-primary'>
                    <input type="reset" value='Reset' class='btn btn-secondary'>
                </div>
              </form>
          </div>
@stop