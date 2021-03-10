<?php
/* 
 Template Name: Contact Us
*/

get_header();?>

<?php $co_banner = get_field('banner')?>

	<div class="header_gutter"></div>

		<section class="page-header d-flex align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
							<h1 class="title"><span><?php echo esc_html($co_banner['title']);?></span></h1>
						</div>
					</div>
				</div>
			</div>

			<div class="background rellax">
                <?php
                 $contact_image = $co_banner['image'];
                    $contact_image_details = wp_get_attachment_image_src($contact_image, 'large');
                    echo "<img src='". esc_url($contact_image_details[0])."'>";
                ?>
			</div>
		</section><!-- /page-header -->

		<div id="primary" class="content-area">

			<section class="contact-page">
				<div class="container">
					<?php $message = get_field('message');?>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="content">
								<div class="entry-title">
									<h4 class="sub-title"><?php echo esc_html($message['title']);?></h4>
									<h1 class="title"><?php echo esc_html($message['subtitle']);?></h1>
								</div>

								<p><?php echo esc_html($message['content']);?></p>

								<?php if(is_active_sidebar('contact-widget')){
								dynamic_sidebar('contact-widget');
								}
								?>
							</div>
						</div>

						<div class="col-md-6 col-sm-12">
							<div class="contact-form">
								<h5 class="title "><?php _e('We look forward to hearing from you','spendebt')?></h5>

								<div class="">
									<div class="">
										<form action="#">
											<?php wp_nonce_field( 'contact', 'contact')?>

											<label for="firstname"></label>
											<input type="text" id="fname" name="fname" placeholder="Your name..">

											<label for="lastname"></label>
											<input type="text" id="lname" name="lname" placeholder="Your last name..">

											<label for="email"></label>
											<input type="email" id="email" name="email" placeholder="Email number">

											<label for="subject"></label>
											<text id="subject" name="subject" placeholder="Enter Subject"></text>

											<label for="message"></label>
											<textarea id="message" name="message" placeholder="Write something.."></textarea>

											<input type="submit" id="send-message" class="btn animated fadeInLeft delay-1s" name="submit" value="Submit">

										</form>

										<?php
											$form = get_field('form', 'option');
											

										
											if ( !empty( $form ) && array_filter( $form ) ): ?>
												<div class="text=-center">
											<div class="col-8">
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /contact-page -->

			<div class="container">
				<div class="row">
					<div class="col">
						<hr>
					</div>
				</div>
			</div>

			<section class="call-action">
				<div class="container">
					<div class="row">
						<?php $action = get_field('action');?>
						<div class="col-12">
							<?php $call = $action['image']; ?>
								
								<div class="content coverbg" style="background-image: url(<?php echo esc_url($call['url'])  ? ( $call['url'] ) : get_theme_file_uri( 'images/video-overview.jpg' );?>)">
									<div class="entry-title">
										<h2 class="title white"><?php echo esc_html($action['text'])?></h2>
									</div>
								<?php
									$link = $action['button'];
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								
								
								
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section><!-- /call-action -->

		</div><!-- /primary -->
<?php get_footer();?>