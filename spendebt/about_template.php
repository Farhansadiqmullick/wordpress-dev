<?php
 /*
 Template Name: Company Info
 */
get_header();


?>
		<div class="header_gutter"></div>

		<section class="page-header page-header-about d-flex align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
							<h1 class="title spendebt"><?php echo the_field('banner_title');?></h1>
						</div>
					</div>
				</div>
			</div>

			<div class="background rellax">
				<?php
						$banner_image = get_field('banners_image');
						$banner_image_details = wp_get_attachment_image_src($banner_image, 'large');

					if(the_field($banner_image_details)){
						echo "<img src='". esc_url($banner_image_details[0])."'>";
					}
					else{
						printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri('/images/page-header-about.svg') ), get_bloginfo() );
						
					}
				?>
		
			</div>
	
		</section><!-- /page-header -->

		<div id="primary" class="content-area">

			<section class="company-info">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-12">
							<div class="media radius">
								<?php
								$info_image = get_field('info_image');
								$info_image_details = wp_get_attachment_image_src($info_image, 'large');
								echo "<img src='". esc_url($info_image_details[0])."'>";
								?>		
							</div>
						</div>

						<div class="col-lg-6 col-md-12">
							<div class="content">
								<div class="entry-title">
									<h4 class="sub-title"><?php echo the_field('info_subtitle')?></h4>
									<h1 class="title"><?php echo the_field('info_title')?></h1>
								</div>

								<p><?php echo the_field('info_content')?></p>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /company-info -->

			<div class="container">
				<div class="row">
					<div class="col-12">
						<hr>
					</div>
				</div>
			</div>

			<section class="meet-founder">
				<div class="container">
					<div class="row flex-row-reverse align-items-center">
						<div class="col-lg-5 col-md-12">
							<div class="media with-note radius">
							<?php
								$founder_image = get_field('founder_image');
								$founder_image_details = wp_get_attachment_image_src($founder_image, 'large');
								echo "<img src='". esc_url($founder_image_details[0])."'>";
							?>
								<h5 class="note"><?php echo the_field('founder_name_title')?> <span><?php echo the_field('founder_name')?></span></h5>
							</div>
						</div>

						<div class="col-lg-7 col-md-12">
							<div class="content">
								<div class="entry-title">
									<h4 class="sub-title"><?php echo the_field('founder_name')?></h4>
									<h1 class="title"><?php echo the_field('founder_title')?></h1>
								</div>

								<p><?php echo the_field('founder_content')?></p>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /company-info -->

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