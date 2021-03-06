<?php
/* 
 Template Name: Contact Us
*/

get_header();?>

<?php
global $spendebt_section_id;
$spendent_section = get_post($spendebt_section_id);
$spendent_section_title = $spendent_section->post_title;
$spendent_section_description = $spendent_section->post_description;


?>

	<div class="header_gutter"></div>

		<section class="page-header d-flex align-items-center">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="entry-title">
							<h1 class="title"><span><?php the_field('banner_title');?></h1>
						</div>
					</div>
				</div>
			</div>

			<div class="background rellax">
                <?php
                 $contact_image = get_field('banner_image');
                    $contact_image_details = wp_get_attachment_image_src($contact_image, 'large');
                    echo "<img src='". esc_url($contact_image_details[0])."'>";
                ?>
			</div>
		</section><!-- /page-header -->

		<div id="primary" class="content-area">

			<section class="contact-page">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6 col-sm-12">
							<div class="content">
								<div class="entry-title">
									<h4 class="sub-title"><?php the_field('message_subtitle');?></h4>
									<h1 class="title"><?php the_field('message_title');?></h1>
								</div>

								<p><?php the_field('message_content');?></a></p>

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
						<div class="col-12">
							<?php $call = get_field('call_action_image');
							if( !empty( $call ) ): ?>
								
								<div class="content coverbg" style="background-image: url(<?php echo esc_url($call['url']); ?>)">
								<div class="entry-title">
									<h2 class="title white"><?php the_field('call_action_text')?></h2>
								</div>

								<a href="<?php echo get_field('call_button')?>" class="btn btn-primary"><?php _e('Sign Up', 'spendebt')?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section><!-- /call-action -->

		</div><!-- /primary -->
<?php get_footer();?>