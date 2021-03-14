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
										<a href="<?php the_permalink()?>"><span class="date text-uppercase"><?php the_date('F j, Y')?></span></a>
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
									<a href="<?php echo get_home_url( '', 'our-blog')?>" class="btn-return"><i class="icon-arrow-left"></i> <?php _e('Return to Blog','spendebt')?></a>

									<div class="share">
										<img src="../images/share.png" class="img-fluid" alt="">
									</div>
								</div>
								
										<div class="call-action">
										<?php $action = get_field('action', 'option');
											$call = $action['image']; ?>
											<div class="content coverbg" style="background-image: url(<?php echo esc_url($call['url'])  ? ( $call['url'] ) : get_theme_file_uri( 'images/call-action.jpg' );?>);">
												<div class="entry-title">
														<h2 class="title white"><?php echo esc_html($action['title']);?></h2>
												</div>
												
												<?php
												$link = $action['button'];
												if( $link ): 
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
													?>
													<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
												<?php endif; ?>
													
											</div>
										</div><!-- /call-action -->
							</main>
						</div>

						<div class="col-lg-3 col-md-12">
							<aside class="sidebar" data-sticky_column>
							<div class="widget widget-featured">
									<div class="row lr-9">
										<div class="col-lg-12 col-md-6 col-sm-6">
										<h4 class="widget-title separator"><?php _e('Featured', 'spendebt');?></h4>
										
											<article class="blog-post">
												
												<?php 
											
													$query = new WP_Query( array( 'meta_key' => '_is_ns_featured_post', 'meta_value' => 'yes' ) );
													
													if ( $query->have_posts() ) : ?>

														<?php while ( $query->have_posts() ) : $query->the_post(); ?>
														
														<a class ="blog-post"><?php
															if ( has_post_thumbnail() ) 
															{
																the_post_thumbnail( 'wp-post-image', array( 'class' => 'img-fluid wp-post-image' ) );
															}
															else
															{
																printf( '<img src="%s" class="img-fluid wp-post-image" alt="%s">', esc_url( get_theme_file_uri('images/blog-post-1.jpg') ), get_bloginfo() );
															}
														?>
														</a>
														<a href="<?php the_permalink();?>"><span class="date text-uppercase"><?php the_date( 'F j, Y', '', '', true );?></span></a>
														<h5 class ="title"><a class="title" href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
													<?php endwhile; ?>
													<?php wp_reset_postdata(); ?>
													
													<?php else : ?>
														<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
													<?php endif; ?>
											</article><!-- /blog-post -->
									
										</div><!--widget-->
									</div>
								</div>

								<div class="widget widget-store">
									<h4 class="widget-title separator"><?php _e('Get the App','spendebt')?></h4>

									<ul class="store list-unstyled lr-9 d-flex flex-wrap align-items-center">
										<li class="col-lg-12 col-sm-6"><a href="//apps.apple.com/us/app/spendebt/id1422084789" class="btn icon-apple" target="_blank"><?php _e('Get it on the App Store','spendebt')?></a></li>
										<li class="col-lg-12 col-sm-6"><a href="//play.google.com/store/apps/details?id=com.app.spendebt" class="btn btn-base icon-play-store" target="_blank"><?php _e('Get it on the Google Play','spendebt')?></a></li>
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