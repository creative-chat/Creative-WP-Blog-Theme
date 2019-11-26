﻿<?php get_header(); ?>

<!-- Section: Page Header -->
<section class="section-page-header">
    <div class="container">
        <div class="row">

            <!-- Page Title -->
            <div class="col-md-4">
                <h1 class="title title-blog-n"><?php the_category(); ?></h1>
            </div>
            <!-- /Page Title -->

            <!-- Breadcrumbs -->
            <div class="col-md-8">
                <ul class="breadcrumb">
                    <?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
                </ul>
            </div>
            <!-- /Breadcrumbs -->

        </div>
    </div>
</section>
<!-- /Section: Page Header -->

<!-- Main -->
<main class="main-container">
    <div class="container">
        <div class="row">
            
            <!-- Blog Content -->
            <div class="col-md-9">

                <!-- Post -->
                <article class="blog-post">

                    <!-- tag -->
                    
                    <!-- /tag -->

                    

                    <!-- Post Title -->
                    <h2 class="title"><?php the_title(); ?></h2>
                    <!-- /Post Title -->

                    <!-- Post Metadata -->
                    <ul class="list-inline meta">
                        <li><?php bloginfo('name'); ?> <?php the_author(); ?> <?php the_time('Y年n月j日, G:i:s'); ?> 发布</li>
                        <li>分类：
                            <?php
                            $categories = get_the_category();
                            $separator = ", ";
                            $output = '';

                            if($categories){
                                foreach ($categories as $category){
                                    $output .= '<a href="' . get_category_link($category->term_id). '">'. $category->cat_name . '</a>'. $separator;
                                }
                                echo trim($output, $separator);
                            }

                            ?>
                            </li>
                            <li>
                                <i class="fa fa-fw fa-eye"></i> 浏览：<?php get_post_views($post -> ID); ?>
                            </li>
                        <!-- <li><a href="#">12 Comments</a></li> -->
                    </ul>
                    <!-- /Post Metadata -->

                    <!-- Post Content -->
                    <div class="content1">

                        <?php
                        if(have_posts()) :
                            while (have_posts()) : the_post(); ?>
                            
                            <?php the_content(); ?>
                            
                            <?php endwhile;
                            else :
                                // echo '<p>No content found</p>';
                            endif;
                            
                        ?>

                        <?php previous_post_link('上一页： %link'); ?><br/>
                        <?php next_post_link('下一页： %link'); ?><br/><br/>

                    </div>
                    <!-- /Post Content -->

                    <!-- Additional -->
                    <div class="row information">

                        <div class="col-sm-6">
                            
                        </div>

                        <div class="col-sm-6">
                            <ul class="social-inline">
                                <!-- <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a></div>
                                <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{},"image":{"viewList":["weixin","tsina","qzone","tqq","renren"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","tsina","qzone","tqq","renren"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script> -->
                            </ul>
                        </div>

                    </div>
                    <!-- /Additional -->



                </article>
                <!-- /Post -->

                <!-- Comments -->
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
                <!-- /Comments -->

            </div>
            <!-- /Blog Content -->

            <!-- Blog Sidebar -->
            <?php get_template_part( 'sidebar' ); ?>
            <!-- /Blog Sidebar -->

        </div>
    </div>
</main>
<!-- /Main -->

<?php get_footer(); ?>