<?php

get_header();?>



<div class="header_gutter"></div>
    <div id="primary" class="content-area">
        <section>
				<div class="container">
					<div class="row" data-sticky_parent>
						<div class="col-12">
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

					
					</div>
			
				</div>
			</section><!---page -->

		</div><!-- /primary -->

		<?php
		 get_footer();?>