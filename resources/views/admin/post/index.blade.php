@extends('layout.admin_master')
@section('title')
Posts List
@stop
@section('content')
          <div class="box-body">
                <p><a href="/post/create" class='btn btn-success'>Add</a></p>
              <table class='table table-responsive text-center'> 
                  <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Title</th>
                      <th>Slug</th>
                      <th>Description</th>
                      <th>Content</th>
                      <th>Active</th>
                      <th>Create_at</th>
                      <th>Position</th>
                      <th>Category_id</th>
                      <th colspan='2'>Action</th>
                  </tr>
                  @foreach($allPost as $key => $post)
                  <tr>
                      <td><?=$post['id']?></td>
                      <td><img src="<?=$post['avatar']?>" alt="" width='60%' height='auto'></td>    
                      <td><?=$post['title']?></td>
                      <td><?=$post['slug']?></td>
                      <td><?=$post['description']?></td>
                      <td><?=str_limit($post['content'])?></td>
                      <td><?=$post['active']?></td>
                      <td><?=$post['create_at']?></td>
                      <td><?=$post['position']?></td>
                      <td><?=$post['name']?></td>
                      <td><a href="<?=action('admin\PostController@edit',['id'=>$post['id']])?>" class='btn btn-primary'>Edit</a></td>
                      <td><a href="<?=action('admin\PostController@delete',['id'=>$post['id']])?>" class='btn btn-danger'>Delete</a></td>
                  </tr>
                  @endforeach 
              </table>
          </div>
@stop