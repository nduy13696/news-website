@extends('layout.admin_master')
@section('title')
Categories List
@stop
@section('content')
      <div class="box-body">
        <p><a href="/create" class='btn btn-success'>Add</a></p>
        <table class='table table-responsive text-center'>
          <tr >
              <th>Id</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Show/Hide</th>
              <th>Position</th>
              <th>Create_at</th>
              <th>Parent_id</th>
              <th colspan='2'>Action</th>
          </tr>
          <?php foreach($allCategories as $category): ?>
          <tr>
              <td><?=$category->id?></td>
              <td><?=$category->name?></td>
              <td><?=$category->slug?></td>
              <td><?=$category->active?></td>
              <td><?=$category->position?></td>
              <td><?=$category->create_at?></td>
              <td><?=$category->parent_id?></td>
              <td><a href="<?=action('admin\CategoryController@edit',['id'=> $category->id])?>" class='btn btn-primary'>Edit</a></td>
              <td><a href="<?=action('admin\CategoryController@delete',['id'=> $category->id])?>" class='btn btn-danger'>Delete</a></td>
          </tr>
          <?php endforeach ; ?>
        </table>
        <div class="text-center">
          {!!$allCategories->render()!!}
        </div>
      </div>
      <!-- /.box-body -->
@stop