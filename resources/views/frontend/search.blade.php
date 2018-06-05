@extends('layout\master')
@section('left_section')
<div class="col-md-8">
@foreach($result as $item)
<div class="entity_wrapper">
    <div class="entity_title header_purple">
        <h1><a href="category.html" target="_blank">Mobile</a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_thumb">
        <img class="img-responsive" src="{{ $item->avatar }}" alt="feature-top">
    </div>
    <!-- entity_thumb -->

    <div class="entity_title">
        <a href="<?=action('frontend\FrontendController@post',['slug'=>$item->slug])?>" target="_blank"><h3>{{ $item->title }}</h3></a>
    </div>
    <!-- entity_title -->

    <div class="entity_meta">
        <a href="#">{{ $item->create_at }}</a>, by: <a href="#">Eric joan</a>
    </div>
    <!-- entity_meta -->

    <div class="entity_content">
        {{ $item->description }}
    </div>
    <!-- entity_content -->

    <div class="entity_social">
        <span><i class="fa fa-comments-o"></i>4 <a href="#">Comments</a> </span>
    </div>
    <!-- entity_social -->

</div>
@endforeach
<!-- entity_wrapper -->
<!-- navigation -->

</div>
@stop