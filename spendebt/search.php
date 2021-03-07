<?php get_header();
 
?>

			<div class="header_gutter"></div>
			

		<div id="primary" class="content-area">
			
			<section class="blog-page">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?php _e('Search For', 'spendebt');?>

						</div>
					</div>
					
					<div class="row lr-9" data-sticky_parent>
						
								<div class="col-lg-9 col-md-12">
								
								
									<main class="main-content" data-sticky_column>
										<h4 class="widget-title separator"><?php echo the_field('blog_header')?></h4>
										<?php if ( have_posts() ) : ?>
												<?php while ( have_posts() ) : the_post(); ?>
											<article class="blog-post d-flex align-items-center">
												<div class="media float-left">
													<a href="<?php the_permalink();?>">
													<?php
															if ( has_post_thumbnail() ) 
															{
																the_post_thumbnail( 'blog_post', array( 'class' => 'img-fluid' ) );
															}
															else
															{
																printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri('images/blog-post-1.jpg') ), get_bloginfo() );
															}
														?>
													</a>
												</div>
		
												<div class="text">
													<a href="<?php the_permalink();?>"><span class="date text-uppercase"><?php echo date('F j, Y')?></span></a>
			
													<a href="<?php the_permalink()?>"><h3 class="title"><?php echo esc_html(the_title());?></h3></a>
												</div>
											</article><!-- /blog-post -->
										<?php endwhile;
						 					endif;	?>
										<div class="pagination">
										<?php if ( get_previous_posts_link() || get_next_posts_link() ): ?>
											<div class="float-left">
											<?php 
												if ( get_previous_posts_link() ) 
												{
													previous_posts_link('<i class="icon-arrow-left"></i> Previous');
												} 
											?>
											</div>
											<div class="float-right">
											<?php 
												if ( get_next_posts_link() ) 
												{
													next_posts_link('<i class="icon-arrow-right"></i> Next');
												} 
											?>
											</div>
										<?php endif;?>
										</div><!-- /pagination -->
											<?php $call = get_field('call_action_image');
											if( $call ) {
													echo wp_get_attachment_image( $call, $size );
												} ?>

										<div class="call-action">
											<div class="content coverbg" style="background-image: url(<?php echo esc_attr($call) ? esc_url( $call) : get_theme_file_uri( 'images/call-action.jpg' ); ?>);">
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
								</div>
										

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