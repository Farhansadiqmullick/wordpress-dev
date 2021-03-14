<?php

/*
Template Name: Discover
*/

    get_header();
    ?>
	<div class="header_gutter"></div>
   <?php $dis_banner = get_field('banner'); 
  
   $image = $dis_banner['image'];?>
		<section class="page-banner d-flex align-items-center" style="background-image: url(<?php echo esc_url($image['url']) ? esc_url( $image['url'] ) : get_theme_file_uri( 'images/page-banner-discover.png' ); ?>);">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="content">
							<div class="entry-title">
								<h4 class="sub-title"><?php echo esc_html($dis_banner['title']);?></h4>
								<h1 class="title white"><?php echo esc_html($dis_banner['name']);?></h1>

								<div class="button-group d-flex align-items-center">
									
                                    <?php                          
                                        $banner_button = $dis_banner['button'];
                                        if( $banner_button ): 
                                            $banner_button_url = $banner_button['url'];
                                            $banner_button_title = $banner_button['title'];
                                            $banner_button_target = $banner_button['target'] ? $banner_button['target'] : '_blank';
                                        
                                    ?>
                                   <a class="btn btn-primary" href="<?php echo esc_url( $banner_button_url ); ?>" target="<?php echo esc_attr( $banner_button_target ); ?>"><?php echo esc_html( $banner_button_title ); ?></a>
                                   
                                    <button class="scrollDown" data-space="80"><i class="icon-arrow-down"></i></button>
                                    <?php endif;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /page-banner -->

		<div id="primary" class="content-area">

			<section class="how-works">
				<div class="container">
					<?php $dis_works = get_field('how_works');
					?>

					<div class="row">
						<div class="col-12">
							<div class="entry-title separator">
								<h2 class="title"><?php echo esc_html($dis_works['title'])?></h2>
								<h4 class="font-weight-normal"><?php echo esc_html($dis_works['description'])?></h4>
							</div>	
						</div>
					</div>
				</div>

                <?php
                if( have_rows('how_works_repeater') ):
                    while( have_rows('how_works_repeater') ) : the_row();
					 ?>
                        

                    <div class="work-steps">
                        <div class="container">
                                <div class="row align-items-center">
								
                                    <div class="col-sm-8">
									
										<div class="content" data-number="<?php echo ++$i;?>" >
									
                                            <div class="icon float-left">
                                                <i class="icon-edit"></i>
                                                <span class="number"><?php echo $i;?></span>
                                            </div>
				
                                            <div class="text">
                                                <h2 class="title"><?php the_sub_field('how_works_title_repeater');?></h2>
                                                <p><?php the_sub_field('how_works_content_repeater');?></p>
                                                
                                                <?php                          
                                                    $how_works_button = get_sub_field('how_works_button_repeater');
                                                    if( $how_works_button ): 
                                                        $how_works_button_url = $how_works_button['url'];
                                                        $how_works_button_title = $how_works_button['title'];
                                                        $how_works_button_target = $how_works_button['target'] ? $how_works_button['target'] : '_blank';
                                                    endif;
												   
												  ?>
                                                <a class="btn" href="<?php echo esc_url( $how_works_button_url ); ?>" target="<?php echo esc_attr( $how_works_button_target ); ?>"><?php echo esc_html( $how_works_button_title ); ?> </a>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="media">
                                            <?php
                                                        
                                                $how_works_image = get_sub_field('how_works_image_repeater');
                                                $how_works_image_details = wp_get_attachment_image_src($how_works_image, 'large');
                                                echo "<img src='". esc_url($how_works_image_details[0])."'>";
                                            ?>
                                        </div>
                                    </div> 
                                </div>
                        </div>
                    </div><!-- /work-steps -->
                <?php endwhile;
                                endif;?>
			
			</section class="video-overview"><!-- /how-works -->
			<?php $video = get_field( 'video_overview' ); 
			$bg_image = $video['bg_image'];?>
			<section class="video-overview" style="background-image: url(<?php echo $bg_image['url']  ? esc_url( $bg_image['url'] ) : get_theme_file_uri( 'images/video-overview.jpg' );?>);">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-5 col-md-5 col-sm-12">
							<div class="entry-title">
								<h2 class="title white"><?php echo esc_html($video['title']);?></h2>
								<p><?php echo esc_html($video['content']);?></p>
							</div>
						</div>

						<div class="col-lg-7 col-md-7 col-sm-12">
							<div class="media with-note radius">
								<?php $video_link = $video['link'] ;?>
								
								<a href="<?php echo esc_url($video_link['url']);?>" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
                                <?php
                                                        
                                    $video_image = $video['image'];
                                    $video_image_details = wp_get_attachment_image_src( $video_image, 'large');
                                    echo "<img src='". esc_url($video_image_details[0])."'>";
                                ?>
                                    
									<h5 class="note"><span><?php echo esc_html($video['note'])?></span> <?php echo esc_html($video['time'])?>&nbsp;<?php _e('seconds', 'spendebt');?></h5>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /video-overview -->

			<section class="highlights">
				<div class="container">
					<?php $highlights = get_field('highlights')?>
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title"><?php echo esc_html($highlights['title']);?></h2>
							</div>
						</div>
					</div>
                    
				<?php	if(have_rows('highlights')) :
						while( have_rows('highlights') ) : the_row();
						 $repeat = $highlights['repeat']; ?>
						
						<div class="row">
							<?php
								if(have_rows('repeat')) : ?>
							<?php while(have_rows('repeat')) : the_row(); ?>          
							<div class="col-md-4 col-sm-6">
								<div class="icon-box text-center">
									<div class="icon">
										
										<?php	$svg_image = get_sub_field('image');
											$title = get_sub_field('img_title');
											$content = get_sub_field('img_content');
											
											$svg_image_details = wp_get_attachment_image_src( $svg_image, 'medium');
											echo "<img src='". esc_url($svg_image_details[0])."'>";
											?>
									</div>

									<div class="text">
										<h4 class="title"><?php echo esc_html($title);?></h4>
										<p><?php echo esc_html($content);?></p>
									</div>
							</div>
						</div><!-- /icon-box -->
						<?php endwhile; ?>
                    </div>
						<?php 
						 endif; endwhile; endif;?>
                    
				</div>
			</section><!-- /highlights -->
			
			<section class="frequently-asked">
				<div class="container">
					<?php $faq = get_field('faq');?>
					<div class="row">
						<div class="col-12">
							<div class="content">
								<div class="entry-title">
									<h2 class="title"><?php echo esc_html($faq['title']);?></h2>
								</div>
                                <?php
                                        if( have_rows('faq') ):
                                            while( have_rows('faq') ) : the_row();
												
											if(have_rows('repeat')) :
												while( have_rows('repeat')) : the_row();
												$question = get_sub_field('questions');
												$answer = get_sub_field('answers');
                                        ?>

								<ul class="faqs list-unstyled">
                                     
									<li>
                                        <h5 class="question"><?php echo esc_html($question);?></h5>
										<div class="answer">
											<p><?php echo esc_html($answer);?></p>
										</div>
                                    </li>
                                    
									
                                </ul>
                                <?php endwhile;
                                    endif;
									endwhile; endif;
                                                         
										$faq_button = $faq['faq_button'];
										var_dump($faq_button);
                                        if( $faq_button ): 
                                            $faq_button_url = $faq_button['url'];
                                            $faq_button_title = $faq_button['title'];
                                            $faq_button_target = $faq_button['target'] ? $faq_button['target'] : '_blank';
                                        
                                    ?>
                                 <a class="btn btn-base" href="<?php echo esc_url( $faq_button_url ); ?>" target="<?php echo esc_attr( $faq_button_target ); ?>"><?php echo esc_html( $faq_button_title ); ?></a>
                                        <?php endif;?>
							</div>
										
						</div>
					</div>
				</div>
			</section><!-- /frequently-asked -->

			<section class="pricing">
				<div class="container">
					<?php $plan = get_field('plan')?>
					<div class="row">
						<div class="col-12">
							<div class="content">
								<div class="entry-title text-center">
									<h2 class="title"><?php echo esc_html($plan['title'])?></h2>
									<h4 class="font-weight-normal"><?php echo esc_html($plan['content'])?></h4>
								</div>

								<span class="price"><?php echo _e('$','spendebt')?><?php echo esc_html($plan['price'])?></span>
									<?php if(have_rows('plan')) :
										while(have_rows('plan')): the_row(); ?>
								<ul class="features list-unstyled">
									<?php
										
										while( have_rows('repeat') ) : the_row();
										$repeater = get_sub_field('repeater');?>
                                        
                                        <li><?php echo esc_html($repeater);?></li>
                                      <?php	
                                            endwhile; ?>
								</ul>
										<?php endwhile; endif;?>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /pricing -->

		</div><!-- /primary -->

		
<?php
get_footer();
?>