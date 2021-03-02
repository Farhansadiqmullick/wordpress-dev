<?php

/*
Template Name: Discover
*/

    get_header();
    ?>
	<div class="header_gutter"></div>
   <?php $banner = get_field( 'banner' ); ?>
		<section class="page-banner d-flex align-items-center" style="background-image: url(<?php echo $banner['image'] ? esc_url( $banner['image']['url'] ) : get_theme_file_uri( 'images/page-banner-discover.png' ); ?>);">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="content">
							<div class="entry-title">
								<h4 class="sub-title"><?php echo get_field('banner_title');?></h4>
								<h1 class="title white"><?php echo get_field('banner_name');?></h1>

								<div class="button-group d-flex align-items-center">
									
                                    <?php                          
                                        $banner_button = get_field('banner_button');
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
					<div class="row">
						<div class="col-12">
							<div class="entry-title separator">
								<h2 class="title"><?php get_field('how_works_title')?></h2>
								<h4 class="font-weight-normal"><?php get_field('how_works_description')?></h4>
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
                                        <div class="content" data-number="<?php for($i=0; $i<1; $i++){echo $i++;} ;?>">
                                            <div class="icon float-left">
                                                <i class="icon-edit"></i>
                                                <span class="number"><?php for($i=0; $i<1; $i++){echo $i++;} ;?></span>
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
			
			</section><!-- /how-works -->
            <?php $video = get_field( 'video_image' ); ?>
			<section class="video-overview" style="background-image: url(<?php echo $video['image'] ? esc_url( $video['image']['url'] ) : get_theme_file_uri( 'images/video-overview.jpg' );?>);">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-5 col-md-5 col-sm-12">
							<div class="entry-title">
								<h2 class="title white"><?php get_field('video_overview_title');?>Video Overview</h2>
								<p><?php the_field('video_overview_content');?></p>
							</div>
						</div>

						<div class="col-lg-7 col-md-7 col-sm-12">
							<div class="media with-note radius">
								<a href="<?php the_field('video_overview_video')?>" class="popup-video" data-effect="mfp-move-from-top vertical-middle">
                                <?php
                                                        
                                    $video_image = get_field('video_overview_image');
                                    $video_image_details = wp_get_attachment_image_src( $video_image, 'large');
                                    echo "<img src='". esc_url($video_image_details[0])."'>";
                                ?>
                                    
									<h5 class="note"><span><?php the_field('video_overview_note')?></span> <?php the_field('video_overview_time')?></h5>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /video-overview -->

			<section class="highlights">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="entry-title text-center">
								<h2 class="title"><?php the_field('highlights_title');?></h2>
							</div>
						</div>
					</div>
                    
					<div class="row">
                        <?php
                        if( have_rows('highlights_repeat') ):
                            while( have_rows('highlights_repeat') ) : the_row();
                                
                        ?>
						<div class="col-md-4 col-sm-6">
							<div class="icon-box text-center">
								<div class="icon">
                                    <?php
                                                            
                                    $svg_image = get_sub_field('highlights_repeat_image');
                                    $svg_image_details = wp_get_attachment_image_src( $svg_image, 'medium');
                                    echo "<img src='". esc_url($svg_image_details[0])."'>";
                                    ?>
                            	</div>

								<div class="text">
									<h4 class="title"><?php echo get_sub_field('highlights_repeat_title')?></h4>
									<p><?php echo get_sub_field('highlights_repeat_content')?></p>
								</div>
							</div>
						</div><!-- /icon-box -->
                        <?php endwhile;
                        endif;?>
                    </div>
                    
				</div>
			</section><!-- /highlights -->
			
			<section class="frequently-asked">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="content">
								<div class="entry-title">
									<h2 class="title"><?php the_field('faq_title');?></h2>
								</div>
                                <?php
                                        if( have_rows('faq_repeat') ):
                                            while( have_rows('faq_repeat') ) : the_row();
                                                
                                        ?>

								<ul class="faqs list-unstyled">
                                     
									<li>
                                        <h5 class="question"><?php the_sub_field('faq_question');?></h5>
										<div class="answer">
											<p><?php the_sub_field('faq_answer');?></p>
										</div>
                                    </li>
                                    
									
                                </ul>
                                <?php endwhile;
                                    endif;

                                                         
                                        $faq_button = get_field('faq_button');
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
					<div class="row">
						<div class="col-12">
							<div class="content">
								<div class="entry-title text-center">
									<h2 class="title"><?php the_field('plan_title');?></h2>
									<h4 class="font-weight-normal"><?php the_field('plan_content');?></h4>
								</div>

								<span class="price"><?php the_field('plan_price');?></span>

								<ul class="features list-unstyled">
                                    <?php
                                        while( have_rows('plan_repeat') ) : the_row();?>
                                        
                                        <li><?php the_sub_field('plan_text_repeat'); ?></li>
                                      <?php	
                                            endwhile; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section><!-- /pricing -->

		</div><!-- /primary -->

		
<?php
get_footer();
?>