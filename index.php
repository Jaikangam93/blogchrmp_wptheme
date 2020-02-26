<?php get_header(); ?>

    <div role="main" class="main">
        <!-- Start Custom header -->
        <section class="page-header page-header-color page-header-primary page-header-more-padding" style="padding-bottom: 50px;">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="breadcrumb">
                            <li><a href="https://www.chrmp.com/" style="color: white;">Home</a></li>
                            <li class="active" style="color: white;"> Blogs  </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <h1> Blogs  </h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Custom header -->
        <br><br>

        <div class="container">
            <div class="row">
                <!-- Open main blog -->
                <div class="col-lg-8">
                    <div class="blog-posts">
                        <?php if(have_posts()) : ?>
                        <?php while(have_posts()): the_post(); ?>

                                <div class="bloga card-blog">
                                    <div class="table">
                                        <article class="post post-medium">
                                            <div class="row">

                                                <div class="col-lg-5">
                                                    <div class="post-image">
                                                        <div>
                                                            <div class="img-thumbnail d-block">
                                                            <?php if(has_post_thumbnail()) : ?>
                                                                <div class="post-thumbnail">
                                                                    <?php the_post_thumbnail(); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">

                                                    <div class="post-content">
                                                        <h4 class="heading-primary">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php the_title(); ?>
                                                            </a>
                                                        </h4>

                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <div class="post-meta">
                                                        <span><i class="fas fa-user"></i> By
                                                        <a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                            <?php the_author_posts_link(); ?>
                                                        </a>
                                                        </span>
                                                        <span><i class="fa fa-list-alt"></i>Category :
                                                        <?php
                                                            $categories = get_the_category();
                                                            $separator = ", ";
                                                            $output = '';

                                                            if($categories){
                                                                foreach($categories as $category){
                                                                    $output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name.'</a>'. $separator;
                                                                }
                                                            }

                                                            echo trim($output, $separator);
                                                        ?>

                                                        </span>
                                                        <span><i class="fas fa-clock"></i><?php echo get_the_date(); ?>   </span>
                                                        <span class="d-block d-md-inline-block float-md-right mt-3 mt-md-0">

                                                            <a href="<?php the_permalink(); ?>" class="btn btn-xs btn-primary">Read more...</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                            <?php else : ?>
                                <div class="bloga card-blog">
                                    <div class="table" style="text-align: center;">
                                         <span style="color: red; text-align: center;">   <?php echo wpautop('Sorry, No posts were found'); ?> </span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php $pagination = get_the_posts_pagination(); ?>

                    </div>
                </div>
                <!-- Close main blog -->

                <!-- Open Blog Side bar  -->
                <div class="col-lg-4">

                    <aside class="sidebar">

                    <?php if(is_active_sidebar('sidebar')) : ?>
                        <?php dynamic_sidebar('sidebar'); ?>
                    <?php endif; ?>

                    </aside>

                </div>
                <!-- Close Blog Side bar  -->
            </div>
        </div>
    </div>

<?php get_footer(); ?>
