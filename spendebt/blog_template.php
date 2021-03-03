<?php
/*
Template Name: Blog Template
*/
 get_header();?>

<div class="header_gutter"></div>

		<section class="featured-blog-posts">
			<div class="fbp-slider-controls d-flex align-items-center">
				<div class="container">
					<div class="col-12">
						<div class="fbp-slider-control"></div>	
					</div>
				</div>
			</div>
			
		
			<div class="fbp-slider">
				<?php
					if(have_rows('blog_slider')) :
						while(have_rows('blog_slider')) : the_row();

						
						if( the_sub_field('slider_image') ) :
						$slide_image = "<img src='".the_sub_field('slider_image')."' />"; ?>

					<?php endif; ?>
					
				
				<div class="slider-item d-flex align-items-center justify-content-between coverbg" style="background-image: url(<?php echo $slide_image ? esc_url( $slider['image']['url'] ) : get_theme_file_uri( 'images/blog-post-1.jpg' ); ?>);">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<article class="blog-post text-center">
									<a href="#"><span class="date" data-animation="fadeInUp" data-delay="0.6s"><?php the_sub_field('slider_date');?></span></a>
									<a href="blog-details.html"><h1 class="title" data-animation="fadeInUp" data-delay="0.8s"><?php the_sub_field('slider_title');?></h1></a>
									<a  class="btn btn-primary" data-animation="fadeInUp" data-delay="1s" href="<?php echo esc_attr( the_permalink() ); ?>"><?php _e('Read More', 'spendent');?></a>
								</article>
							</div>
						</div>	
					</div>
				</div>
				<?php endwhile;
					endif; 
					?>
				
			</div>


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
											<?php $call = get_field('call_action_image');?>
										<div class="call-action">
											<div class="content coverbg" style="background-image: url(<?php echo $call['image'] ? esc_url( $call['image']['url'] ) : get_theme_file_uri( 'images/call-action.jpg' ); ?>);">
												<div class="entry-title">
													<h2 class="title white"><?php get_field('call_action_text');?></h2>
												</div>
											<?php		
												$call_button = get_field('call_button');
												if( $call_button ): 
												$call_button_url = $call_button['url'];
												$call_button_title = $call_button['title'];
												$call_button_target = $call_button['target'] ? $call_button['target'] : '_blank';
											
											?>
                                   			<a class="btn btn-primary" href="<?php echo esc_url( $call_button_url ); ?>" target="<?php echo esc_attr( $call_button_target ); ?>"><?php echo esc_html( $call_button_title ); ?></a>
											<?php endif;?>	
											</div>
										</div><!-- /call-action -->
									</main>
							
						
								</div>
						
						<div class="col-lg-3 col-md-12">
							<aside class="sidebar" data-sticky_column>
								<div class="widget widget-featured">
									<h4 class="widget-title separator">Featured</h4>

									<div class="row lr-9">
										<div class="col-lg-12 col-md-6 col-sm-6">
											<article class="blog-post">
												<div class="media">
													<a href="blog-details.html">
														<img src="../images/blog-post-1.jpg" class="img-fluid" alt="">
													</a>
												</div>

												<div class="text">
													<a href="#"><span class="date text-uppercase">JANUARY 12, 2019</span></a>

													<a href="blog-details.html"><h5 class="title">St. Louis Tech Startup Showing Consumers How To Pay Off Debts When Spending Money</h5></a>
												</div>
											</article><!-- /blog-post -->
										</div>

										<div class="col-lg-12 col-md-6 col-sm-6">
											<article class="blog-post">
												<div class="media">
													<a href="blog-details.html">
														<img src="../images/blog-post-4.jpg" class="img-fluid" alt="">
													</a>
												</div>

												<div class="text">
													<a href="#"><span class="date text-uppercase">JANUARY 12, 2019</span></a>

													<a href="blog-details.html"><h5 class="title">The Bourbon Friday Show With Kiley Summers From Spendebt</h5></a>
												</div>
											</article><!-- /blog-post -->
										</div>

										<div class="col-lg-12 col-md-6 col-sm-6">
											<article class="blog-post">
												<div class="media">
													<a href="blog-details.html">
														<img src="../images/blog-post-5.jpg" class="img-fluid" alt="">
													</a>
												</div>

												<div class="text">
													<a href="#"><span class="date text-uppercase">JANUARY 12, 2019</span></a>

													<a href="blog-details.html"><h5 class="title">Startup Masters 054: Spendebt App With Kiley Summers</h5></a>
												</div>
											</article><!-- /blog-post -->
										</div>
									</div>
								</div><!-- /widget -->

								<div class="widget widget-store">
									<h4 class="widget-title separator">Get the App</h4>

									<ul class="store list-unstyled lr-9 d-flex flex-wrap align-items-center">
										<li class="col-lg-12 col-sm-6"><a href="#" class="btn icon-apple" target="_blank">Get it on the App Store</a></li>
										<li class="col-lg-12 col-sm-6"><a href="#" class="btn btn-base icon-play-store" target="_blank">Get it on Google Play</a></li>
									</ul>
								</div><!-- /widget -->
							</aside>
						</div>
					</div>
			
				</div>
			</section><!-- /blog-page -->

		</div><!-- /primary -->

		<?php get_footer();?>