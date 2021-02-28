<?php get_header();?>

<?php if(is_front_page()) :?>	
<section class="banner">
			<div class="container position-relative">
				<div class="row">
					<div class="col-12">
						<div class="content">
							<div class="entry-title">
								<h1 class="title animated fadeInLeft"><?php echo the_field('banner_text');?></h1>
							</div>

							<p class="animated fadeInLeft delay-1s"><?php echo the_field('banner_description');?></p>

							<div class="button-group d-flex align-items-center">
							<?php 
							
								$banner_button = get_field('banner_button');
								if( $banner_button ): 
									$banner_button_url = $banner_button['url'];
									$banner_button_title = $banner_button['title'];
									$banner_button_target = $banner_button['target'] ? $banner_button['target'] : '_blank';
							?>
									<a class="btn animated fadeInLeft delay-1s" href="<?php echo esc_url( $banner_button_url ); ?>" target="<?php echo esc_attr( $banner_button_target ); ?>"><?php echo esc_html( $banner_button_title ); ?></a>
								<button class="scrollDown animated fadeInLeft delay-2s" data-space="80"><i class="icon-arrow-down"></i></button>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>

				<div class="background animated fadeInUp delay-1s">
					<?php
					$banner_image = get_field('banner_image');
					$banner_image_details = wp_get_attachment_image_src($banner_image, 'banner_image');
					echo "<img src='". esc_url($banner_image_details[0])."'>";
					?>
				</div>
			</div>
		</section><!-- /banner -->
<?php endif;?>
		<div id="primary" class="content-area">

			<section class="home-how-works">
				<div class="money rellax animated fadeInUp delay-2s"><img src="<?php echo get_template_directory_uri() . '/images/money.svg'?>" class="svg img-fluid" alt="%s"></div>
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title"><?php echo get_field('how_works_title')?></h2>
								<h4 class="font-weight-normal"><?php echo get_field('how_works_description')?></h4>
							</div>

							<div class="media with-note radius">
								<a href="<?php the_field('how_works_video'); ?>" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
							<?php
								$works_image = get_field('how_works_image');
								$works_image_details = wp_get_attachment_image_src($works_image, 'how_works_image');
								echo "<img src='". esc_url($works_image_details[0])."'>";
							?>
								<h5 class="note"><span><?php echo esc_html(get_field('how_works_video_span'));?></span> Runtime: <?php echo esc_html(get_field('how_works_video_span_duration'));?></h5>
								</a>
							</div>
						</div>
					</div>
					

    					
					<div class="row eq-height">
						<?php

							// Check rows exists.
							if( have_rows('how_works_repeat') ):

							// Loop through rows.
							while( have_rows('how_works_repeat') ) : the_row();
						?>
							<div class="col-md-4 col-sm-12">
								<div class="how-works-item text-center">
								
									<div class="icon-wrap">
										<div class="icon">
											<?php
											
												$icon_image = get_field('repeat_icon');
												$icon_image_size = 'thumbnail'; 
												$icon_image_details = wp_get_attachment_image_src($icon_image, $icon_image_size);
												echo "<img src='". esc_url($icon_image_details[0])."'>";
											?>
										</div>
									</div>

									
									<div class="text">
										<h4 class="title"><?php echo get_sub_field('repeat_title');?></h4>
										<span class="step"><?php echo get_sub_field('repeat_steps');?></span>
										<p><?php echo get_sub_field('repeat_description');?></p>
									</div>
								</div>
							
							</div><!-- /how-works-item -->
						<?php 
						
							endwhile;

							endif;
						?>

					</div>
						
					
				</div>
			</section><!-- /home-how-works -->

			<section class="pricing">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content">
								<div class="entry-title text-center">
									<h2 class="title"><?php echo get_field('plan_title')?></h2>
									<h4 class="font-weight-normal"><?php echo get_field('plan_description')?></h4>
								</div>

								<span class="price"><span class="counter"><?php echo get_field('plan_price')?></span></span>
									<?php
										
										$fields_repeat = get_sub_field('plan_text_repeat');

										if( have_rows('plan_text_list') ):

											// Loop through rows.
											while( have_rows('plan_text_list') ) : the_row();
									
											echo"<ul class='features list-unstyled'>";
												foreach( $fields_repeat as $field_repeat ):
													echo '<li>' .$field_repeat. '</li>';
												endforeach;
												echo '</ul>';
											endwhile; endif; ?>
								
							</div>
						</div>
					</div>
				</div>
			</section><!-- /pricing -->

			<section class="spendebt-difference">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title"><?php echo get_field('difference_title')?></h2>
								<h4 class="font-weight-normal"><?php echo get_field('difference_subtitle')?></h4>
								<p><?php echo get_field('difference_description')?></p>
							</div>
						</div>
					</div>

					<div class="row eq-height position-relative">
						<div class="col-lg-6 col-md-12">
							<div class="difference-item text-center">
								<h2 class="title"><?php echo get_field('difference_item_title')?></h2>
								<span class="sub-title"><?php echo get_field('difference_item_subtitle')?></span>
								<p><?php echo get_field('difference_item_description')?></p>

								<span class="note"><?php echo get_field('difference_item_note')?></span>
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
									<h4 class="font-weight-normal"><?php echo get_field('diff_item_savings');?></h4>
									<h2 class="value"><span class="counter"><?php echo get_field('diff_savings_price');?></span></h2>
								</div>
								
							</div>
						</div>

						<div class="col-lg-6 col-md-12">
							<div class="difference-item color text-center">
								<h2 class="title"><?php
								$logo = get_field('logo');
								$logo_details = wp_get_attachment_image_src($logo, 'medium');
								echo "<img src='". esc_url($logo_details[0])."'>";
							?></h2>
								<span class="sub-title"><?php echo get_field('diff_item_save_title')?></span>
								<p><?php echo get_field('diff_item_save_description')?></p>

								<span class="note"><?php echo get_field('diff_item_save_note')?></span>
								
								<?php

									// Check rows exists.
									if( have_rows('diff_repeater') ):

									// Loop through rows.
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
									<h4 class="font-weight-normal"><?php echo get_field('diff_item_savings_title')?></h4>
									<h2 class="value"><span class="counter"><?php echo get_field('diff_item_savings_large_price')?></span></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /spendebt-difference -->

			<section class="sign-up">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="entry-title">
								<h2 class="title"><?php echo get_field('home_about_title')?></h2>
								<?php 
								
									$sign_up = get_field('sign_up_button');
									if( $sign_up ): 
										$sign_up_url = $sign_up['url'];
										$sign_up_title = $sign_up['title'];
										$sign_up_target = $sign_up['target'] ? $sign_up['target'] : '_blank';
									
								?>
								<a class="btn" href="<?php echo esc_url( $sign_up_url ); ?>" target="<?php echo esc_attr( $sign_up_target ); ?>"><?php echo esc_html( $sign_up_title ); ?></a>
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
							<div class="entry-title text-center">
								<h2 class="title">Real People. Real Comments.</h2>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="testimonial-slider">
								<div class="testimonial-item text-center">
									<div class="center">
										<div class="icon">
											<i class="icon-quote-left"></i>
											<i class="icon-quote-right"></i>
										</div>

										<div class="quote">
											<p>“First I would like to thank you for launching this amazing venture. I have successfully paid off my first student loan through Great Lakes and I would not be able to do It without you”</p>
										</div>

										<a href="https://www.youtube.com/watch?v=QANXeDqOo5U" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
											<img src="../images/client.jpg" class="img-fluid" alt="">
										</a>

										<div class="quote-bottom">
											<h4 class="name">Jessica Rogers</h4>
											<span class="location text-uppercase">Houston, Tx</span>
										</div>
									</div>
								</div>
								<div class="testimonial-item text-center">
									<div class="center">
										<div class="icon">
											<i class="icon-quote-left"></i>
											<i class="icon-quote-right"></i>
										</div>

										<div class="quote">
											<p>“First I would like to thank you for launching this amazing venture. I have successfully paid off my first student loan through Great Lakes and I would not be able to do It without you”</p>
										</div>

										<a href="https://www.youtube.com/watch?v=QANXeDqOo5U" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
											<img src="../images/client.jpg" class="img-fluid" alt="">
										</a>

										<div class="quote-bottom">
											<h4 class="name">Jessica Rogers</h4>
											<span class="location text-uppercase">Houston, Tx</span>
										</div>
									</div>
								</div>
							</div>

							<div class="slider-progress-bar">
								<span class="progress" style="width: 10%;"></span>
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
									<h2 class="title white">Featured In...</h2>
								</div>

								<ul class="client-logos list-unstyled">
									<li><a><img src="../images/client-logo-1.png" class="img-fluid" alt=""></a></li>
									<li><a><img src="../images/client-logo-2.png" class="img-fluid" alt=""></a></li>
									<li><a><img src="../images/client-logo-3.png" class="img-fluid" alt=""></a></li>
									<li><a><img src="../images/client-logo-4.png" class="img-fluid" alt=""></a></li>
									<li><a><img src="../images/client-logo-5.png" class="img-fluid" alt=""></a></li>
									<li><a><img src="../images/client-logo-6.png" class="img-fluid" alt=""></a></li>
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
								<h2 class="title">Company News & Updates</h2>
								<h4 class="font-weight-normal">The Latest Happenings Inside the Spendebt Family</h4>
							</div>
						</div>
					</div>

					<div class="row lr-9">
						<div class="col-lg-4 col-sm-6">
							<article class="blog-post">
								<div class="media">
									<a href="blog-details.html"><img src="../images/blog-post-1.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="text">
									<a href="blog-details.html"><h5 class="title">St. Louis tech startup showing consumers how to pay off debts when spending money</h5></a>
								</div>
							</article>
						</div><!-- /blog-post -->

						<div class="col-lg-4 col-sm-6">
							<article class="blog-post">
								<div class="media">
									<a href="blog-details.html"><img src="../images/blog-post-4.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="text">
									<a href="blog-details.html"><h5 class="title">The Bourbon Friday Show with Kiley Summers from Spendebt</h5></a>
								</div>
							</article>
						</div><!-- /blog-post -->
						
						<div class="col-lg-4 col-sm-6">
							<article class="blog-post">
								<div class="media">
									<a href="blog-details.html"><img src="../images/blog-post-5.jpg" class="img-fluid" alt=""></a>
								</div>

								<div class="text">
									<a href="blog-details.html"><h5 class="title">Startup masters 054: Spendebt App with Kiley Summers</h5></a>
								</div>
							</article>
						</div><!-- /blog-post -->
					</div>
				</div>
			</section><!-- /latest-news -->

		</div><!-- /primary -->
<?php get_footer();?>