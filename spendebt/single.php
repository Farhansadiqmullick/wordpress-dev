<?php

get_header();?>



<div class="header_gutter"></div>
    <div id="primary" class="content-area">

			<section class="breadcrumb-wrapper">
				<div class="container">
				<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<nav class="breadcrumb">
                            <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
							</nav>
						</div>
					</div>
				</div>
            </section>
              
			
			<section class="blog-page blog-page-details">
				<div class="container">
					<div class="row lr-9" data-sticky_parent>
						<div class="col-lg-9 col-md-12">
							<main class="main-content" data-sticky_column>
								<article class="blog-post">
									<div class="text">
										<a href="#"><span class="date text-uppercase"><?php the_date('F j, Y')?></span></a>
										<h1 class="title"><?php the_title();?></h1>

										<div class="media">
                                        <?php
                                        if ( has_post_thumbnail() ) 
                                            {
                                                the_post_thumbnail( 'large', array( 'class' => 'img-fluid' ) );
                                            }
                                        ?>
										</div>

										<div class="content">
											<?php the_content();?>
										</div>
									</div>
								</article><!-- /blog-post -->
                                <div class="entry-footer d-flex flex-wrap align-items-center justify-content-between">
									<a href="home_url(/our-blog)" class="btn-return"><i class="icon-arrow-left"></i> <?php _e('Return to Blog','spendebt')?></a>

									<div class="share">
										<img src="../images/share.png" class="img-fluid" alt="">
									</div>
								</div>

									<div class="share">
                                        <img src="../images/share.png" class="img-fluid" alt="">
                                        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );  ?>

                                            <?php if($image[0] != "" ){ ?>

                                            <meta property="og:image" content="<?php echo $image[0]; ?>"  >

                                            <?php } else { ?>

                                            <meta property="og:image" content="logo.png"  >

                                            <?php } ?>


                                            <meta property="og:image:width" content="3523" >

                                            <meta property="og:image:height" content="2372" >

                                            <meta property="og:url" content="<?php echo the_permalink(); ?>"  >

                                            <meta property="og:title" content="<?php echo the_title(); ?>"  > 

                                            <meta property="og:site_name" content="Thefansworld" />

                                            <meta property="og:description" content="" >  

                                            <meta property="fb:app_id" content="3668661019" >

                                            <meta property="fb:admins" content="" >

                                            <?php endwhile; wp_reset_query(); ?>
									</div>
								

									<?php $call = get_field('call_action_image');
											if( $call ) {
													echo wp_get_attachment_image( $call, $size );
												} ?>

										<div class="call-action">
											<div class="content coverbg" style="background-image: url(<?php echo get_theme_file_uri( 'images/call-action.jpg' ); ?>);">
												<div class="entry-title">
														<h2 class="title white"><?php _e('Ready to get serious about paying off debt?', 'spendebt')?></h2>
												</div>
												
														<a href="#" class="btn btn-primary"><?php _e('Sign up', 'spendebt')?></a>
													
											</div>
										</div><!-- /call-action -->
							</main>
						</div>

						<div class="col-lg-3 col-md-12">
							<aside class="sidebar" data-sticky_column>
								<div class="widget widget-featured">
									<div class="row lr-9">
										<div class="col-lg-12 col-md-6 col-sm-6">
											<article class="blog-post">
												<?php if(is_active_sidebar('category-posts')){
													dynamic_sidebar('category-posts');
														
												}?>
											</article><!-- /blog-post -->
										</div><!--widget-->
									</div>
								</div><!-- /widget -->

								<div class="widget widget-store">
									<h4 class="widget-title separator"><?php _e('Get the App','spendebt')?></h4>

									<ul class="store list-unstyled lr-9 d-flex flex-wrap align-items-center">
										<li class="col-lg-12 col-sm-6"><a href="#" class="btn icon-apple" target="_blank"><?php _e('Get it on the App Store','spendebt')?></a></li>
										<li class="col-lg-12 col-sm-6"><a href="#" class="btn btn-base icon-play-store" target="_blank"><?php _e('Get it on the Google Play','spendebt')?></a></li>
									</ul>
								</div><!-- /widget -->
							</aside>
						</div>
					</div>
			
				</div>
			</section><!-- /blog-page -->

		</div><!-- /primary -->

		<?php
		 get_footer();?>