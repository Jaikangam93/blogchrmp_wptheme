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
                        <h1> <?php the_title(); ?>  </h1>
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

                            <!-- Open Single Post-->
                            <div class="blog-posts single-post">
                                <!-- Open Single Post image -->
                                <div class="post-image">
                                    <div>
                                    <?php if(has_post_thumbnail()) : ?>
                                        <div class="img-thumbnail d-block">

                                            <div class="post-thumbnail">
                                                <?php the_post_thumbnail(); ?>
                                            </div>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Close Single Post image -->
                                <br>

                                <div class="post-content">


                                    <div class="bloga card-blog">
                                        <div class="table" >
                                        <h2> <?php the_title(); ?> </h2>

                                         <?php the_content(); ?>

                                        <hr>
                                            <div  style="font-size: 14px;">
                                                    <span><i class="fa fa-list-alt"> </i>  Category :
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

                                                <span style="margin-left: 8px;"><i class="fas fa-clock"></i> <?php echo get_the_date(); ?> </span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="bloga card-blog">
                                        <div class="table" >
                                    <!-- Open Div for the Author Details -->
                                    <div class="post-author clearfix">
                                    <h6 class="heading-primary"><i class="fas fa-user"></i> Author</h6>
                                    <hr>
                                        <!-- Open Author Image -->
                                        <div class="img-thumbnail ">

                                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>

                                        </div>
                                        <!-- Close Author Image -->

                                        <p>
                                            <strong class="name" style="text-decoration:none">
                                                <a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>">
                                                    <?php the_author(); ?>
                                                </a>
                                            </strong>
                                        </p>


                                        <p> <?php  echo wpautop( get_the_author_meta( 'description' ) );  ?> </p>
                                    </div>
                                    <!-- Close Div for the Author Details -->
                                    </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Close Single Post -->



                            <?php endwhile; ?>
                            <?php else : ?>
                                <div class="bloga card-blog">
                                    <div class="table" style="text-align: center;">
                                         <span style="color: red; text-align: center;">   <?php echo wpautop('Sorry, No posts were found'); ?> </span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- Open Disqus comment -->
                            <div class="bloga card-blog">
                              <div class="table" >
                                <!-- main disqus script start here -->
                                <div id="disqus_thread"></div>
                                  <script>

                                  /**
                                  *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                  *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                  /*
                                  var disqus_config = function () {
                                  this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                  this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                  };
                                  */
                                  (function() { // DON'T EDIT BELOW THIS LINE
                                  var d = document, s = d.createElement('script');
                                  s.src = 'https://chrmp-blog.disqus.com/embed.js';
                                  s.setAttribute('data-timestamp', +new Date());
                                  (d.head || d.body).appendChild(s);
                                  })();
                                  </script>

                                  <script id="dsq-count-scr" src="//chrmp-blog.disqus.com/count.js" async></script>

                                <!-- main close disqus script start here -->
                              </div>
                            </div>
                            <!-- Close Disqus comment -->
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
