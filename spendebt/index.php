<?php get_header();
 
?>

			<div class="header_gutter"></div>
		<section class="featured-blog-posts">

			<div class="fbp-slider-controls d-flex align-items-center">
					<div class="container">
						<div class="col-12">
							<div class="fbp-slider-control"></div>
						</div>
					</div>
			</div>
					<?php
							$featured_slider = get_field('slider', 'option');
							if( $featured_slider ): ?>
								<ul class="features list-unstyled">
								<div class="fbp-slider">	
									<?php foreach( $featured_slider as $post ):setup_postdata($post); ?>
										<li>
										<div class="slider-item d-flex align-items-center justify-content-between coverbg" style="background-image: url(<?php the_post_thumbnail_url('large'); ?> )">
									
											<div class="container">
												<div class="row">
													<div class="col-12">
															
																<article class="blog-post text-center">
																	<a href="<?php echo the_permalink()?>"><span class="date" data-animation="fadeInUp" data-delay="0.6s"><?php echo the_date('F j, Y');?></span></a>
																	<a href="<?php echo the_permalink()?>"><h1 class="title" data-animation="fadeInUp" data-delay="0.8s"><?php echo the_title(); ?></h1></a>
																	<a href="<?php echo the_permalink()?>" class="btn btn-primary" data-animation="fadeInUp" data-delay="1s"><?php _e('Read Story', 'spendebt')?></a>
																</article>
														
														</div>
													</div>
												</div>
											</div>
										</li>
											<?php endforeach; ?>
											
								</div>
								</ul>
								<?php 
									
									wp_reset_postdata(); ?>
								<?php endif; ?>
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
													<a href="<?php the_permalink()?>"></a>
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
											
											
											<?php $action = get_field('action', 'option');
											$call = $action['image']; ?>
											

										<div class="call-action">
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
											
								