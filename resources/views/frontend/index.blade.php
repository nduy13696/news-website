@extends('layout\master')
@section('feature')
<section id="feature_news_section" class="feature_news_section">
    <div class="container">
        <div class="row">
            @foreach($ftArticleLG as $articleLG)
            <div class="col-md-7">
                <div class="feature_article_wrapper">
                    <div class="feature_article_img">
                        <img width='653px' height="568px" class="top_static_article_img" src="{{ $articleLG['avatar'] }}"
                             alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="tag_lg red"><a href="category.html">Hot News</a></div>
                        <div class="feature_article_title">
                            <h1><a href="<?=action('frontend\FrontendController@post',['slug'=>$articleLG['slug']])?>" target="_self">{{ $articleLG['title'] }}</a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">{{ $articleLG['create_at'] }}</a></div>
                        <!-- feature_article_date -->

                        <div class="feature_article_content">
                            {{ $articleLG['description'] }}
                        </div>
                        <!-- feature_article_content -->

                        <div class="article_social">
                            <?php  
                            $cmtCount=DB::table('customer_comment')->where('post_id','=',$articleLG['id'])->count();
                            ?>
                            <span><i class="fa fa-comments-o"></i><a href="#">{{ $cmtCount }}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_article_wrapper -->

            </div>
            @endforeach
            <!-- col-md-7 -->
            @foreach($ftArticleXS as $articleXS)
            <div class="col-md-5">
                <div class="feature_static_wrapper">
                    <div class="feature_article_img">
                        <img width='458px' height="280px" src="{{ $articleXS['avatar'] }}" alt="feature-top">
                    </div>
                    <!-- feature_article_img -->

                    <div class="feature_article_inner">
                        <div class="feature_article_title">
                            <h1><a href="<?=action('frontend\FrontendController@post',['slug'=>$articleXS['slug']])?>" target="_self">{{ $articleXS['title'] }}</a></h1>
                        </div>
                        <!-- feature_article_title -->

                        <div class="feature_article_date"><a href="#" target="_self">{{ $articleXS['create_at'] }}</a></div>
                        <!-- feature_article_date -->


                        <!-- feature_article_content -->

                        <div class="article_social">
                            <?php  
                            $cmtCount=DB::table('customer_comment')->where('post_id','=',$articleXS['id'])->count();
                            ?>
                            <span><i class="fa fa-comments-o"></i><a href="#">{{$cmtCount}}</a>Comments</span>
                        </div>
                        <!-- article_social -->

                    </div>
                    <!-- feature_article_inner -->

                </div>
                <!-- feature_static_wrapper -->

            </div>
            <!-- col-md-5 -->
            @endforeach
            </div>
        <!-- Row -->
    </div>
    <!-- container -->
</section>
@stop
<!-- Feature News Section -->

<!--Feature article-->
@section('left_section')
<div class="col-md-8">

<!-- category Section -->
<?php foreach($AllCategory as $category): ?>
  <?php
  $categoriesID=$category->id;
  $record=DB::table('tbl_posts as p')->select('p.*')->join('tbl_cateories as ct','p.cateory_id','=','ct.id')->where('p.cateory_id','=',"$categoriesID")->offset(1)->limit(4)->get();
  $AllPost=json_decode($record,true);
  $topRecord=DB::table('tbl_posts as p')->select('p.*')->join('tbl_cateories as ct','p.cateory_id','=','ct.id')->where('p.cateory_id','=',"$categoriesID")->limit(1)->get();
  $top=json_decode($topRecord,true);
  ?>
<div class="category_section">
    <div class="article_title header_purple">
        <h2><a href="category.html" target="_self"><?=$category->name?></a></h2>
    </div>
    <!----article_title------>
    <div class="category_article_wrapper">
      @foreach($top as $top1)
        <div class="row">
            <div class="col-md-6">
                <div class="top_article_img">
                    <a href="<?=action('frontend\FrontendController@post',['slug'=>$top1['slug']])?>" target="_self"><img class="img-responsive"
                                                               src="{{ $top1['avatar'] }}" alt="feature-top">
                    </a>
                </div>
                <!----top_article_img------>
            </div>
            <div class="col-md-6">
                <span class="tag purple"><?=$category->name?></span>

                <div class="category_article_title">
                    <h2><a href="<?=action('frontend\FrontendController@post',['slug'=>$top1['slug']])?>" target="_self">{{ $top1['title'] }}</a></h2>
                </div>
                <!----category_article_title------>
                <div class="category_article_date"><a href="{{ $top1['slug'] }}">{{ $top1['create_at'] }}</a></div>
                <!----category_article_date------>
                <div class="category_article_content">
                    {{ $top1['description'] }}
                </div>
                <!----category_article_content------>
                <div class="media_social">
                    <?php  
                    $cmtCount=DB::table('customer_comment')->where('post_id','=',$top1['id'])->count();
                    ?>
                    <span><i class="fa fa-comments-o"></i><a href="#"><?php echo $cmtCount ?></a> Comments</span>
                </div>
                <!----media_social------>
            </div>
        </div>
        @endforeach
    </div>
    <div class="category_article_wrapper">
        <div class="row">
        @foreach($AllPost as $post)
            <div class="col-md-6">
                <div class="media">
                    <div class="media-left">
                        <a href="#"><img width='122px' height='auto' class="media-object" src="{{ $post['avatar'] }}"
                                         alt="Generic placeholder image"></a>
                    </div>
                    <div class="media-body">
                        <span class="tag purple"><?=$category->name?></span>

                        <h3 class="media-heading"><a href="<?=action('frontend\FrontendController@post',['slug'=>$post['slug']])?>" target="_self">{{ $post['title'] }}</a></h3>
                        <span class="media-date"><a href="#">{{ $post['create_at'] }}</a></span>

                        <div class="media_social">
                            <?php  
                            $cmtCount=DB::table('customer_comment')->where('post_id','=',$post['id'])->count();
                            ?>
                            <span><a href="#"><i class="fa fa-comments-o"></i><?php echo $cmtCount ?></a> Comments</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach;
        </div>
    </div>
    <p class="divider"><a href="#">More News&nbsp;&raquo;</a></p>
</div>
<?php endforeach ; ?>
<!-- end category sction -->

</div>
<!-- Left Section -->
@stop

