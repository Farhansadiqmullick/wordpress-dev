
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="footer-logo">
							<a href="index.html" class="img-responsive" alt="%s">
									<?php
										$logo = get_field( 'logo', 'spendebt' );

										if ( $logo ) 
										{
											printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( $logo['url'] ), $logo['alt'] );
										}
										else
										{
											printf( '<img src="%s" class="img-fluid" alt="%s">', esc_url( get_theme_file_uri( 'images/logo.png' ) ), get_bloginfo( 'name') );
										}
									?>
									
							</a>
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
							<li><a href="#" target="_blank"><span class="icon-play-store"></span></a></li>
							<li><a href="#" target="_blank"><span class="icon-apple"></span></a></li>
							<li class="btn-menu"><a href="#"><?php _e('Login', 'spendebt')?></a></li>
						</ul>

						<div class="subscribe-newsletter text-center">
							<h4 class="title"><?php if(is_active_sidebar('footer-sidebar-1')){
								dynamic_sidebar('footer-sidebar-1');
								}
								?></h4>
									<form text-center action="#">
										<span style="background-color:white">
											
											<input type="text"class="col-sm-4" placeholder="Email address" name="mail" required>
											
										</span>

										<span class="col-sm-2">
											<input type="submit" class="btn animated fadeInLeft delay-1s" value="Subscribe">
										</span>
									</form>
						</div>

						
							<?php if(is_active_sidebar('footer-social')){
								dynamic_sidebar('footer-social');
								}
							?>
						
						
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
        </footer><!-- /footer -->
        <?php wp_footer(); ?>
	</body>
</html>