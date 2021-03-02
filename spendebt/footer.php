
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-12 text-center">
						<div class="footer-logo">
							<a href="index.html" class="img-responsive" alt="%s">
								<?php 
									$footer_image = get_field('footer_logo');
									$footer_image_details = wp_get_attachment_image_src($footer_image, 'meduim');
									echo "<img src='". esc_url($footer_image_details[0])."'>";?>
								
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
							<li class="btn-menu"><a href="#">Login</a></li>
						</ul>

						<div class="subscribe-newsletter text-center">
							<h4 class="title"><?php if(is_active_sidebar('footer-sidebar-1')){
								dynamic_sidebar('footer-sidebar-1');
								}
								?></h4>
							<img src="../images/footer-subscribe-form.png" class="img-fluid" alt="">
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