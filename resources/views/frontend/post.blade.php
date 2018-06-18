@extends('layout\master')
@section('left_section')
<section id="entity_section" class="entity_section">
<div class="container">
<div class="row">
<div class="col-md-8">
<?php foreach($postDetail as $post): ?>
<?php $post_id=$post['id']; ?>
<!-- // Post ID -->
<div class="entity_wrapper">
    <div class="entity_title">
        <h1><a href="#">{{ $post['title'] }}</a></h1>
    </div>
    <!-- entity_title -->

    <div class="entity_meta"><a href="#" target="_self">{{ \Carbon\Carbon::parse($post['create_at'])->format('M-d-Y') }}</a>, by: <a href="#" target="_self">Eric joan</a>
    </div>
    <!-- entity_meta -->

    <div class="entity_rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star-half-full"></i>
    </div>
    <!-- entity_rating -->

    <div class="entity_social">
        <a href="#" class="icons-sm sh-ic">
            <i class="fa fa-share-alt"></i>
            <b>424</b> <span class="share_ic">Shares</span>
        </a>
        <a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook-f"></i></a>
        <!--Twitter-->
        <a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"></i></a>
        <!--Google +-->
        <a href="#" class="icons-sm inst-ic"><i class="fab fa-google"> </i></a>
    </div>
    <!-- entity_social -->

    <div class="entity_thumb">
        <img class="img-responsive" src="{{ $post['avatar'] }}" alt="feature-top">
    </div>
    <!-- entity_thumb -->

    <div class="entity_content">
        <?=$post['content']?>
    </div>
    <!-- entity_content -->

    <div class="entity_footer">
    <?php  
        $cmtCount=DB::table('customer_comment')->where('post_id','=',$post_id)->count();
    ?>
    <!-- cmt count -->
        <div class="entity_social">
            <span><i class="far fa-comment-dots"></i><?php echo $cmtCount ?> <a href="#">Comments</a> </span>
        </div>
        <!-- entity_social -->

    </div>
    <!-- entity_footer -->

</div>
<!-- entity_wrapper -->
<?php 
    $parentID=$post['cateory_id'];
    $record=DB::table('tbl_posts as p')->select('p.*','ct.name')->join('tbl_cateories as ct','p.cateory_id','=','ct.id')->where('cateory_id','=',$parentID)->get();
    $relate=json_decode($record,true);
?>
<!-- relate news querry -->
<div class="related_news">
    <div class="entity_inner__title header_purple">
        <h2><a href="#">Related News</a></h2>
    </div>
    <!-- entity_title -->

    <div class="row">
        @foreach($relate as $relateItem)
            <div class="media col-md-6">
                <div class="media-left">
                    <a href="#"><img width='100px' height='auto' class="media-object" src="{{ $relateItem['avatar'] }}"
                                     alt="Generic placeholder image"></a>
                </div>
                <div class="media-body">
                    <span class="tag purple"><a href="category.html" target="_self">{{ $relateItem['name'] }}</a></span>

                    <h3 class="media-heading"><a href="single.html" target="_self">{{ $relateItem['title'] }}</a></h3>
                    <span class="media-date"><a href="#">{{ $relateItem['create_at'] }}</a></span>

                    <div class="media_social">
                        <span><a href="#"><i class="fa fa-share-alt"></i>424</a> Shares</span>
                        <span><a href="#"><i class="fa fa-comments-o"></i>4</a> Comments</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Related news -->
<?php
$cmt=DB::table('customer_comment as cm')->select('cm.*')->join('tbl_posts as p','cm.post_id','=','p.id')->where('cm.post_id','=',$post_id)->get();
$AllComment=json_decode($cmt,true);
?>
 <!-- comment querry -->
<div class="readers_comment">
    <div class="entity_inner__title header_purple">
        <h2>Readers Comment</h2>
    </div>
    <!-- entity_title -->
    @foreach($AllComment as $cmt)
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img alt="64x64" class="media-object" data-src="assets/img/reader_img1.jpg"
                     src="{{asset('img/reader_img1.jpg')}}" data-holder-rendered="true">
            </a>
        </div>
        <div class="media-body">
            <h2 class="media-heading"><a href="#">{{ $cmt['customer_name'] }}</a></h2>
            {{ $cmt['customer_post'] }}

            <div class="entity_vote">
                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                <a href="#"><span class="reply_ic">Reply </span></a>
            </div>
        </div>

    </div>
    @endforeach
    <!-- media end -->
</div>
<!--Readers Comment-->
<div class="entity_comments">
    <div class="entity_inner__title header_black">
        <h2>Add a Comment</h2>
    </div>
    <!--Entity Title -->

    <div class="entity_comment_from">
        <form action='<?= action('frontend\FrontendController@customer') ?>' method='post'>
            @csrf
            <input type="hidden" value='{{ $post['id'] }}' name='post_id'>
            <input type="hidden" value='{{ $post['slug'] }}' name='post_slug'>
            <div class="form-group">
                <input type="text" class="form-control" id="inputName" placeholder="Name" name='txt_cus_name'>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputEmail" placeholder="Email" name='txt_cus_email'>
            </div>
            <div class="form-group comment">
                <textarea class="form-control" id="inputComment" placeholder="Comment" name='txt_cus_cmt'></textarea>
            </div>

            <button type="submit" class="btn btn-submit red">Submit</button>
        </form>
    </div>
    <!--Entity Comments From -->

</div>
<!--Entity Comments -->
<?php endforeach  ?>

</div>
<!--Left Section-->
@stop

