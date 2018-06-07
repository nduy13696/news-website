@extends('layout.admin_master')
@section('title')
Add new Category
@stop
@section('content')

      <div class="box-body">
        @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <p><a href="/categories" class='btn btn-success'>Back</a></p>
        <form action="<?= action('admin\CategoryController@save') ?>" method='post'>
            @csrf
          <table class='table'>
              <tr>
                  <th>Name</th>
                  <td><input id='name' type="text" name='txt_name' class='form-control'></td>
              </tr>
              <tr>
                  <th>Slug</th>
                  <td><input id='slug' type="text" name='txt_slug' class='form-control'></td>
              </tr>
              <tr>
                  <th>Show/Hide</th>
                  <td><input type="radio" class='form-check-input' name='rd_active' value='1'>Show <br>
                  <input type="radio" class='form-check-input' name='rd_active' value='0'>Hide</td>
              </tr>
              <tr>
                  <th>Position</th>
                  <td><input type="number" name='txt_position' class='form-control'></td>
              </tr>
              <tr>
                  <th>Parent Category</th>
                  <td>
                  <select name="sl_parent" class='form-control'>
                  <option value="0" selected>Highest Grade</option>
                  <?php foreach($allCategories as $category): ?>
                  <option value="<?=$category['id']?>"><?=$category['name']?></option>
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
      <!-- /.box-body -->

@stop
