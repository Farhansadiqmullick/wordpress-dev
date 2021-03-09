<?php 
/*
Template Name: Home
*/
get_header();?>

<?php $banner = get_field('banner');
 ?>	
<section class="banner">
			<div class="container position-relative">
				<div class="row">
					<div class="col-12">
						<div class="content">
							<div class="entry-title">
								<?php
								if ( $banner['title'] ) 
								{
									printf( '<h1 class="title animated fadeInLeft">%s</h1>', $banner['title'] );
								}
								else
								{
									printf( '<h1 class="title text-uppercase animated fadeInUp">%s</h1>', get_bloginfo('name') );
								}

								if ( $banner['description'] ) 
								{
									printf( '<p class="animated fadeInLeft delay-1s">%s</p>', $banner['description'] );
								}
								else
								{
									printf( '<h4 class="sub-title text-uppercase animated fadeInUp delay-1s">%s</h4>', get_bloginfo( 'description' ) );
								}
								
								?>
							

								<div class="button-group d-flex align-items-center">
									<?php
									$link = $banner['link'];
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn animated fadeInLeft delay-1s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
									<button class="scrollDown animated fadeInLeft delay-2s" data-space="80"><i class="icon-arrow-down"></i></button>
								
								</div>
									
							</div>
						</div>
					</div>

				<div class="background animated fadeInUp delay-1s">
					<?php
					$banner_image = get_field('banner_image');
					$size = 'large'; 
						if( $banner_image ) {
							echo wp_get_attachment_image( $banner_image, $size );
						}
					
					?>
				</div>
			</div>
		</section><!-- /banner -->

		<div id="primary" class="content-area">

			<section class="home-how-works">
				<?php $works = get_field('how_works')?>
				<div class="money rellax animated fadeInUp delay-2s"><img src="<?php echo get_template_directory_uri() . '/images/money.svg'?>" class="svg img-fluid" alt="%s"></div>
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="entry-title text-center">
									<h2 class="title"><?php echo esc_html($works['title']);?></h2>
									<h4 class="font-weight-normal"><?php echo esc_html($works['description']);?></h4>
								</div>
								<?php
								 $video = $works['video'];
								 
								 //var_dump($video);?>
								<div class="media with-note radius">
									<a href="<?php echo esc_attr( $video['link'] ) ?>" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
									<?php
										$works_image = $works['image'];
										$works_image_details = wp_get_attachment_image_src($works_image, 'large');
										echo "<img src='". esc_url($works_image_details[0])."'>";
									?>
										<h5 class="note"><span><?php echo esc_html( $video['span']);?></span> <?php _e('Runtime:', 'spendebt')?> <?php echo esc_html( $video['duration']);?></h5>
									</a>
								</div>
							</div>
						</div>
						

							
						<div class="row eq-height">
							<?php
							if( have_rows('how_works_repeat') ): ?>
									<?php while( have_rows('how_works_repeat') ) : the_row();
									
									?>
								<div class="col-md-4 col-sm-12">
									<div class="how-works-item text-center">
										
										<div class="icon-wrap">
											<?php
													$icon = get_sub_field_object('repeat_icon');
													$value = $icon['value'];
													?>
													<div class="icon">
													<i class=<?php echo $value;?>></i>
													</div>
										</div>	
											<div class="text">
												<h4 class="title"><?php echo get_sub_field('repeat_title');?></h4>
												<span class="step"><?php echo get_sub_field('repeat_steps');?></span>
												<p><?php echo get_sub_field('repeat_description');?></p>
											</div>
										
									</div>
								</div>
								<?php endwhile;	?>
							<?php endif; ?>

							
						
								
					</div><!-- /how-works-item -->
									
						
			</section><!-- /home-how-works -->

			<section class="pricing">
				<div class="container">
				<?php $plan = get_field('plan');?>
					<div class="row">
						<div class="col-12">
							<div class="content">
								<div class="entry-title text-center">
									<h2 class="title"><?php echo esc_html($plan['title']);?></h2>
									<h4 class="font-weight-normal"><?php echo esc_html($plan['description']);?></h4>
								</div>

								<span class="price"><?php _e('$', 'spendebt')?><span class="counter"><?php echo esc_html($plan['price']);?></span></span>
									
										<ul class='features list-unstyled'>
										
										<?php
											while( have_rows('plan_text_list') ) : the_row();?>
											
											<li><?php the_sub_field('plan_text_repeat'); ?></li>
												
											<?php	
												 endwhile; ?>
											 
												</ul>

							</div>
						</div>
					</div>
				</div>
			</section><!-- /pricing -->

			<section class="spendebt-difference">
				<div class="container">
					<?php $difference = get_field('hello');?>
					
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title"><?php echo esc_html($difference['title'])?></h2>
								<h4 class="font-weight-normal"><?php echo esc_html($difference['subtitle'])?></h4>
								<p><?php echo esc_html($difference['description'])?></p>
							</div>
						</div>
					</div>

					<div class="row eq-height position-relative">
						<?php $competition = $difference['items']; ?>
						<div class="col-lg-6 col-md-12">
							<div class="difference-item text-center">
								<h2 class="title"><?php echo esc_html($competition['title'])?></h2>
								<span class="sub-title"><?php echo esc_html($competition['subtitle'])?></span>
								<p><?php echo esc_html($competition['description']) ?></p>

								<span class="note"><?php echo esc_html($competition['note'])?></span>
								<?php
									if( have_rows('diff_repeater') ):
										while( have_rows('diff_repeater') ) : the_row();
									?>
								<ul class="list-unstyled">
									<li>
										<h4 class="label"><?php echo get_sub_field('diff_item_name');?></h4>
										<h4 class="value"><span class="counter"><?php echo get_sub_field('diff_item_value');?></span> + <span class="after-value">$<span class="counter"><?php echo get_sub_field('diff_item_discount_value');?></span></span></h4>
									</li>
								</ul>
								<?php endwhile;
									endif;	
								?>
								<?php $save = get_field('savings')?>
									<div class="total d-flex align-items-center justify-content-center">
										<h4 class="font-weight-normal"><?php echo esc_html($save['title']);?></h4>
										<h2 class="value"><span class="counter"><?php echo esc_html($save['price']);?></span></h2>
									</div>
								</div>
							</div>
									


						<div class="col-lg-6 col-md-12">
							<div class="difference-item color text-center">
								<h2 class="title">
								<?php
									$logo = get_field('logo_image', 'option');
									$logo_img = get_sub_field('logo_image', 'option');

										if ( $logo_img ) 
										{
											printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $logo_img ), $logo_img['alt'] );
										}
										else
										{
											 printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( 'images/logo.png' ) ), get_bloginfo( 'name') );
										}
								
								?>
							</h2>
								<span class="sub-title"><?php echo esc_html($competition['ssubtitle'])?></span>
								<p><?php echo esc_html($competition['sdescription'])?></p>

								<span class="note"><?php echo esc_html($competition['snote'])?></span>
								
								<?php
								if( have_rows('diff_repeater') ):
									while( have_rows('diff_repeater') ) : the_row();
									?>
									<ul class="list-unstyled">
											<li>
												<h4 class="label"><?php echo get_sub_field('diff_item_name');?></h4>
												<h4 class="value"><span class="counter"><?php echo get_sub_field('diff_item_value');?></span> + <span class="after-value">$<span class="counter"><?php echo get_sub_field('diff_item_discount_value');?></span></span></h4>
											</li>
											
									</ul>
								<?php endwhile;
									endif;	
								?>
								
								<div class="total d-flex align-items-center justify-content-center">
									<h4 class="font-weight-normal"><?php echo esc_html($save['stitle']);?></h4>
									<h2 class="value"><span class="counter"><?php echo esc_html($save['sprice']);?></span></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /spendebt-difference -->

			<section class="sign-up">
				<div class="container">
				<?php $about = get_field('about');?>
					<div class="row">
						<div class="col-12">
							<div class="entry-title">
								<h2 class="title"><?php echo esc_html($about['title']);?></h2>
								<?php 
								
									
									$link = $about['button'];
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn animated fadeInLeft delay-1s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="media">
				<img src="<?php echo get_template_directory_uri() . '/images/man-usd.svg'?>" class="svg img-fluid" alt="%s">
				</div>
			</section><!-- /home-about -->

			<section class="testimonials">
				<div class="container">
					<div class="row">
						<div class="col-12">
							
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="testimonial-slider">
								<?php
									
									if(have_rows('slider')):
										while(have_rows('slider')): the_row(); ?>
										<div class="entry-title text-center">
											<h2 class="title"><?php echo get_sub_field('slider_title'); ?></h2>
											<div class="testimonial-item text-center">
													<div class="center">
														<div class="icon">
															<i class="icon-quote-left"></i>
															<i class="icon-quote-right"></i>
														</div>
														<?php $author_video = get_sub_field('slider_author_video')?>
														<div class="quote">
																<p><?php echo get_sub_field( 'slider_caption' ); ?></p>
														</div>
														<a href="<?php echo $author_video;?>" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
																<?php 
																$author_image = get_sub_field('slider_author_image');
																if( $author_image ) {
																	echo wp_get_attachment_image( $author_image, 'thumbnail' );
																}?>
														</a>
														<div class="quote-bottom">
															<h4 class="name"><?php echo get_sub_field( 'slider_author_name' ); ?></h4>
															<span class="location text-uppercase"><?php echo get_sub_field( 'slider_author_place' );  ?></span>
														</div>
													</div>
											</div>
										</div>
										
								<?php
										endwhile;
									endif;
								?>
							
							</div>
						</div>
					</div>
				</div>
			</section><!-- /testimonials -->

			<section class="featured">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content text-center">
								<div class="entry-title ">
									<h2 class="title white"><?php the_field('feature_title');?></h2>
								</div>

								<ul class="client-logos list-unstyled">

									<?php
										while( have_rows('feature_image') ) : the_row();?>
										
										<li>
											<a class="img-fluid" alt="%s">
											<?php 
													$feature_images = get_sub_field('feature_images');
													if( $feature_images ) {
														echo wp_get_attachment_image( $feature_images, 'medium' );
											}?>
											</a>
										</li>
										
											
										<?php	
											endwhile; ?>
											 
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /featured -->

			<section class="latest-news">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title"><?php echo the_field('feature_blog_title');?></h2>
								<h4 class="font-weight-normal"><?php echo the_field('feature_blog_content');?></h4>
							</div>
						</div>
					</div>
						<?php
							$featured_posts = get_field('feature_blog');
							if( $featured_posts ): ?>
								<ul class="features list-unstyled">
									<li>
										<div class="row lr-9">
										<?php foreach( $featured_posts as $post ):setup_postdata($post); ?>
											<div class="col-lg-4 col-sm-6">
												<article class="blog-post">
													<div class="media">
														<a href="<?php the_permalink();?>">
															<?php the_post_thumbnail( 'blog_post', array( 'class' => 'img-fluid' ) ) ;?> 
														</a>
													</div>
																
													<div class="text">
														<a href="<?php the_permalink();?>"><h5 class="title"><?php the_title(); ?></h5></a>
													</div>
												</article>
											</div>
											<?php endforeach; ?>
										</div>
									</li>
								</ul>
								<?php 
									
									wp_reset_postdata(); ?>
								<?php endif; ?>
					
				</div>
				
			</section><!-- /latest-news -->

		</div><!-- /primary -->
<?php get_footer();?>