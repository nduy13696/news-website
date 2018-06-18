@extends('layout\master')
@section('left_section')
<div class="col-md-8">
@foreach($Article as $item)
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
        <a href="#">{{ \Carbon\Carbon::parse($item->create_at)->format('M-d-Y') }}</a>
    </div>
    <!-- entity_meta -->

    <div class="entity_content">
        {{ $item->description }}
    </div>
    <!-- entity_content -->

    <div class="entity_social">
        <?php  
            $cmtCount=DB::table('customer_comment')->where('post_id','=',$item->id)->count();
        ?>
        <span><i class="fa fa-comments-o"></i>{{$cmtCount}} <a href="#">Comments</a> </span>
    </div>
    <!-- entity_social -->

</div>
@endforeach
<!-- entity_wrapper -->
{{ $Article->render() }}
<!-- navigation -->

</div>
@stop