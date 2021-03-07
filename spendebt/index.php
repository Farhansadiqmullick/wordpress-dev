<?php get_header();
 
?>

			<div class="header_gutter"></div>
			<!-- <section class="featured-blog-posts">
				
				
				<?php 
					$attachments = new Attachments('slider'); ?>
						<?php if( $attachments->exist() ) : ?>
							
							<div class="fbp-slider">
								<?php while( $attachments->get() ) : ?>
									
								<div class="slider-item d-flex align-items-center justify-content-between coverbg" style="background-image: url(<?php echo $attachments->src( 'full' ); ?> );">
									<div class="container">
										<div class="row">
											<div class="col-12">
												<article class="blog-post text-center">
													<a href="<?php echo the_permalink()?>"><span class="date" data-animation="fadeInUp" data-delay="0.6s"><?php echo the_date('F j,Y');?></span></a>
													<a href="<?php echo the_permalink()?>"><h1 class="title" data-animation="fadeInUp" data-delay="0.8s"><?php echo $attachments->field( 'title' ); ?></h1></a>
													<a href="<?php echo the_permalink()?>" class="btn btn-primary" data-animation="fadeInUp" data-delay="1s">Read Story</a>
													<a></a>
												</article>
											</div>
										</div>
									</div>
								</div>
								<?php endwhile;?>
								
								
							</div>		
							<?php endif;?>
				
		</section> -->


		<section class="featured-blog-posts">
		<?php
				if( have_rows('blog_slider', 'option') ): ?>
				<div class="fbp-slider-controls d-flex align-items-center">
					<div class="container">
						<div class="col-12">
							<div class="fbp-slider-control"></div>
						</div>
					</div>
				</div>
				
					
				<ul class="list-unstyled features">
					<div class="fbp-slider">
						<?php while( have_rows('blog_slider', 'option') ): the_row(); ?>
					
						
							 <?php $blog_bg_image = get_sub_field('blog_slider_image');?>

									<li>
										<div class="slider-item d-flex align-items-center justify-content-between coverbg" style="background-image: url(<?php echo esc_url($blog_bg_image['url']); ?> )">
											<div class="container">
												<div class="row">
													<div class="col-12">
														<article class="blog-post text-center">
															<a href="<?php echo the_permalink()?>"><span class="date" data-animation="fadeInUp" data-delay="0.6s"><?php echo get_sub_field('blog_slider_date')?></span></a>
															<a href="<?php echo the_permalink()?>"><h1 class="title" data-animation="fadeInUp" data-delay="0.8s"><?php echo get_sub_field('blog_slider_title'); ?></h1></a>
															<a href="<?php echo the_permalink()?>" class="btn btn-primary" data-animation="fadeInUp" data-delay="1s"><?php get_sub_field('blog_slider_button'); ?><?php _e('Read Story', 'spendebt')?></a>
															
														</article>
													</div>
												</div>
											</div>
										</div>
									</li>
									
									<?php endwhile; ?>
								</div>		
							</ul>
						<?php endif;?>
				
		</section><!-- /featured-blog-posts -->

		<div id="primary" class="content-area">
			
			<section class="blog-page">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<?php echo get_search_form();?>

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
													<a href="<?php the_permalink();?>"><span class="date text-uppercase"><?php echo the_date('F j, Y')?></span></a>
			
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
													previous_posts_link(' <i class="icon-arrow-left"></i> Page 1');
												} 
											?>
											</div>
											<div class="float-right">
											<?php 
												if ( get_next_posts_link() ) 
												{
													next_posts_link('Page 2 <i class="icon-arrow-right"></i> ');
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
											
								