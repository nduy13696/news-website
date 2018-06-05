@extends('layout.admin_master')
@section('title')
Edit Category
@stop
@section('content')
      <div class="box-body">
        <p><a href="/categories" class='btn btn-success'>Back</a></p>
        <form action="<?= action('admin\CategoryController@editsave',['id'=>$categories->id]) ?>" method='post'>
            @csrf
          <table class='table'>
              <tr>
                  <th>Name</th>
                  <td><input type="text" name='txt_name' class='form-control' value='<?=$categories->name?>'></td>
              </tr>
              <tr>
                  <th>Slug</th>
                  <td><input type="text" name='txt_slug' class='form-control' value='<?=$categories->slug?>'></td>
              </tr>
              <tr>
                  <th>Show/Hide</th>
                  <td><input type="radio" class='form-check-input' name='rd_active' value='1' <?=$categories->active=1?'checked':''?>>Show <br>
                  <input type="radio" class='form-check-input' name='rd_active' value='0' <?=$categories->active=0?'checked':''?>>Hide</td>
              </tr>
              <tr>
                  <th>Position</th>
                  <td><input type="number" name='txt_position' class='form-control' value='<?=$categories->position?>'></td>
              </tr>
              <tr>
                  <th>Parent Category</th>
                  <td>
                  <select name="sl_parent" class='form-control'>
                  <option value="0" selected>Highest Grade</option>
                  <?php foreach($allCategories as $category): ?>
                  <option value="<?=$category->id?>" <?=$categories->parent_id==$category->id?'selected':''?>><?=$category->name?></option>
                  <?php endforeach ; ?>
                  </select>
                  </td>
              </tr>
          </table>
          <div class="text-center">
              <input type="submit" class='btn btn-primary' value='Submit'>
              <input type="Reset" class='btn btn-secondary' value='Reset'>
          </div>
        </form>
      </div>
@stop