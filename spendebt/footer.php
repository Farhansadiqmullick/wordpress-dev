
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
					
						<div class="footer-logo">
							<?php 
								$footer_image = get_field('footer_logo', 'option');
								if( !empty( $footer_image ) ): ?>
									<a href="<?php home_url('/')?>">
										<img src="<?php echo esc_url($footer_image['url']); ?>" alt="<?php echo esc_attr($footer_image['alt']); ?>" />
									</a>
								<?php endif; ?>
						</div>
								


						
							<?php
					  		wp_nav_menu( array(
			                    'menu'               => 'Footer Menu',
			                    'theme_location'     => 'footer',
			                    'depth'              => 1,
			                    'container'          => false,
			                    'menu_class'         => 'footer-menu list-inline',
			                    'menu_id'            => '',
			                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
			                    'walker'             => new wp_bootstrap_navwalker(),
			                ));
						?>
						</ul>

						<ul class="footer-menu list-inline">
							<li><a href="https://play.google.com/store/apps/details?id=com.app.spendebt" target="_blank"><span class="icon-play-store"></span></a></li>
							<li><a href="https://apps.apple.com/us/app/spendebt/id1422084789" target="_blank"><span class="icon-apple"></span></a></li>
							<li class="btn-menu"><a href="//localhost/spendebt/wp-admin"><?php _e('Login', 'spendebt')?></a></li>
						</ul>
						<?php if( have_rows('footer_newsletter', 'option') ): ?>
						<div class="subscribe-newsletter text-center">
							<ul class="list-unstyled features">
								<?php while( have_rows('footer_newsletter', 'option') ): the_row(); ?>
										<h4 class="title">


											<li><?php the_sub_field('footer_newsletter_text'); ?></li>

											<?php endwhile; ?>

										</h4>
							</ul>
								<?php endif; ?>
									<!-- <form text-center action="#">
										<span style="background-color:white">
											<input type="text"class="col-sm-2" placeholder="First Name" name="fname" required>
											<input type="text"class="col-sm-4" placeholder="Email address" name="mail" required>
											
										</span>

										<span class="col-sm-2">
											<input type="submit" class="btn animated fadeInLeft delay-1s" value="Subscribe">
										</span>
									</form> -->




								
								
								
								<?php

								$form = get_field('form', 'option');
								var_dump($form);
								if ( !empty( $form ) && array_filter( $form ) ): ?>
					<div class="col-lg-4 col-md-12">
						<div class="why-choose__form">
							<?php
								if ( $form ) 
								{
									printf( '<h5 class="title text-uppercase">%s</h5>', $form['title'] );
								}

	                    		if ( $form['type'] ) 
	                    		{
	                    			echo '<div class="contact-form">';

		                    		if ( $form['type'] == 'embed' && $form['embed_code'] ) 
		                    		{
		                    			printf('<div class="embed_code">%s</div>', $form['embed_code']);
		                    		}
		                    		elseif( $form['type'] == 'form' && $form['select_form'] )
		                    		{
		                    			echo do_shortcode('[gravityform id="'. $form['select_form']['id'] .'" title="false" description="false" tabindex="10" ajax="true"]');
		                    		} 

	                    			echo '</div>';
	                    		}
							?>
						</div>
					</div>
					<?php endif; ?>
									



						</div>
							
								<div class="container">
										<?php if(is_active_sidebar('footer-social')){
											dynamic_sidebar('footer-social');
											}
										?>
									</div>
								</div>
								
								
							
						
						<div class="container">
							<div class="text-center">
								<div class="copyright d-flex align-items-center justify-content-center">
								<p><?php if(is_active_sidebar('footer-bar-1')){
									dynamic_sidebar('footer-bar-1');
									}
									?></p>
								
								<?php
								wp_nav_menu( array(
									'menu'               => 'Footer Bottom',
									'theme_location'     => 'footer-bottom',
									'menu_class'         => 'footer-links list-inline',
									'menu_id'            => 'footer-bottom',
									'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
									'walker'             => new wp_bootstrap_navwalker(),
								));
							?>
						
									</div>
							</div>
						</div>
						
						
					</div>
				</div>
			</div>
        </footer><!-- /footer -->
        <?php wp_footer(); ?>
	</body>
</html>