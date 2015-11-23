<?php 

get_header(); 

if ( get_option( 'show_on_front' ) == 'page' ) {
echo '
</header>
	<div id="content" class="site-content">
		<div class="container">
			<div class="content-left-wrap col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">';

						while (have_posts()) : the_post();
							get_template_part('content', 'page');
						endwhile;
					
				echo '</main>
				</div><!--/#primary-->
			</div><!--/.content-left-wrap col-md-12-->
		</div><!--/.container-->
	</div><!--/#content.site-content-->';
	
} else {
	echo '</header> <!-- / END HOME SECTION  -->';

	if(isset($_POST['submitted'])) :        

			/* recaptcha */
			$zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');
			$zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
			$zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

			if( isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey) ) :
		        $captcha;

		        if( isset($_POST['g-recaptcha-response']) ){
		          $captcha=$_POST['g-recaptcha-response'];
		        }

		        if( !$captcha ){
		          $hasError = true;    
		        }

		        $response = wp_remote_get( "https://www.google.com/recaptcha/api/siteverify?secret=".esc_html($zerif_contactus_secretkey)."&response=".esc_html($captcha)."&remoteip=".$_SERVER['REMOTE_ADDR'] );
		        if($response['body'].success==false) {
		        	$hasError = true;
		        }

	        endif;

			/* name */

			if(trim($_POST['myname']) === ''):               
				$nameError = __('* Please enter your name.', 'zoommerce');               
				$hasError = true;        
			else:               
				$name = trim($_POST['myname']);        
			endif; 

			/* email */	
			if(trim($_POST['myemail']) === ''):               
				$emailError = __('* Please enter your email address.', 'zoommerce');               
				$hasError = true;        
			elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))) :               
				$emailError = __('* You entered an invalid email address.', 'zoommerce');               
				$hasError = true;        
			else:               
				$email = trim($_POST['myemail']);        
			endif;  

			/* subject */
			if(trim($_POST['mysubject']) === ''):               
				$subjectError = __('* Please enter a subject.', 'zoommerce');               
				$hasError = true;        
			else:               
				$subject = trim($_POST['mysubject']);        
			endif; 

			/* message */
			if(trim($_POST['mymessage']) === ''):               
				$messageError = __('* Please enter a message.', 'zoommerce');               
				$hasError = true;        
			else:                                     
				$message = stripslashes(trim($_POST['mymessage']));               
			endif; 		

			/* send the email */
			if(!isset($hasError)):               
				$zerif_contactus_email = get_theme_mod('zerif_contactus_email');
				
				if( empty($zerif_contactus_email) ):
					$emailTo = get_theme_mod('zerif_email');
				else:
					$emailTo = $zerif_contactus_email;
				endif;

				if(isset($emailTo) && $emailTo != ""):
					if( empty($subject) ):
						$subject = 'From '.$name;
					endif;

					$body = "Name: $name \n\nEmail: $email \n\n Subject: $subject \n\n Message: $message";               


					/* FIXED HEADERS FOR EMAIL NOT GOING TO SPAM */
					$zerif_admin_email = get_option( 'admin_email' );
					$zerif_sitename = strtolower( $_SERVER['SERVER_NAME'] );

					function zerif_is_localhost() {
						$zerif_server_name = strtolower( $_SERVER['SERVER_NAME'] );
						return in_array( $zerif_server_name, array( 'localhost', '127.0.0.1' ) );
					}
					
					if ( zerif_is_localhost() ) {
						$headers = 'From: '.$name.' <'.$zerif_admin_email.'>' . "\r\n" . 'Reply-To: ' . $email;
					} else {
						if ( substr( $zerif_sitename, 0, 4 ) == 'www.' ) {
							$zerif_sitename = substr( $zerif_sitename, 4 );
						}
						
						$headers = 'From: '.$name.' <wordpress@'.$zerif_sitename.'>' . "\r\n" . 'Reply-To: ' . $email;
					}				               

					wp_mail($emailTo, $subject, $body, $headers);               

					$emailSent = true;        
				else:
					$emailSent = false;
				endif; //isset($emailTo) && $emailTo != ""
			endif; //!isset($hasError)
	endif; //isset($_POST['submitted'])

	//Big banner section
	get_template_part( 'sections/big_banner' );

	$section1 = get_theme_mod('section1','shop_cats');
	$section2 = get_theme_mod('section2','our_focus');
	$section3 = get_theme_mod('section3','shop_products');
	$section4 = get_theme_mod('section4','subscribe');
	$section5 = get_theme_mod('section5','portofolio');
	$section6 = get_theme_mod('section6','testimonials');
	$section7 = get_theme_mod('section7','map');
	$section8 = get_theme_mod('section8','contact_us');
	$section9 = get_theme_mod('section9','about_us');
	$section10 = get_theme_mod('section10','our_team');
	$section11 = get_theme_mod('section11','right_ribbon');
	$section12 = get_theme_mod('section12','packages');
	$section13 = get_theme_mod('section13','bottom_ribbon');
	$section14 = get_theme_mod('section14','latest_news');
	
	$sections[0] = $section1;
	$sections[1] = $section2;
	$sections[2] = $section3;
	$sections[3] = $section4;
	$sections[4] = $section5;
	$sections[5] = $section6;
	$sections[6] = $section7;
	$sections[7] = $section8;
	$sections[8] = $section9;
	$sections[9] = $section10;
	$sections[10] = $section11;
	$sections[11] = $section12;
	$sections[12] = $section13;
	$sections[13] = $section14;
	
	for ($i = 0; $i < 14; $i++):
		if( !empty($sections[$i]) ):
			switch ( $sections[$i] ) {
				case "shop_cats":
					if(zoommerce_is_woocommerce_activated()) {
						//Shop categories sections
						get_template_part( 'sections/home_shop_categories' );
					}
				break;

				case "our_focus":				
					//Home our focus section
					get_template_part( 'sections/home_our_focus' );
				break;

				case "shop_products":
					if(zoommerce_is_woocommerce_activated()) {				
						//Home Products Section
						get_template_part( 'sections/home_products' );
					}
				break;

				case "subscribe":				
					//Home newsletter section
					get_template_part( 'sections/home_newsletter' );
				break;

				case "portofolio":				
					//Home portfolio section
					get_template_part( 'sections/home_portfolio' );
				break;

				case "testimonials":				
					//Home testimonials section
					get_template_part( 'sections/home_testimonials' );
				break;

				case "map":				
					//Home google map
					get_template_part( 'sections/home_map' );
				break;

				case "contact_us":				
					//Check if contactform is enabled
					$hide_contactform = get_theme_mod('zoommerce_contactform_hide');
					if(empty($hide_contactform)):
					?>
					<section class="contact-us" id="contact">
						<div class="container">
							<!-- SECTION HEADER -->
							<?php
								echo '<div class="home_headline">';
								$headline = get_theme_mod('latest_contact_headline', __('Get in touch', 'zoommerce'));
								if($headline) {
									echo '<h3>'.esc_html(get_theme_mod('latest_contact_headline', __('Get in touch', 'zoommerce') )).'</h3>';
								}

								$subtitle = get_theme_mod('latest_contact_subheading', __('Big and mobile optimized contact form integrated. All fields are customizable.', 'zoommerce'));
								if($subtitle) {
									echo '<h4>'.esc_html(get_theme_mod('latest_contact_subheading', __('Big and mobile optimized contact form integrated. All fields are customizable.', 'zoommerce'))).'</h4>';
								}
								echo '</div><!-- / .home_headline -->';
							?>
							<!-- / END SECTION HEADER -->
							
							<?php
							if ( defined('PIRATE_FORMS_VERSION') && shortcode_exists( 'pirate_forms' ) ):
								echo '<div class="row">';
									echo do_shortcode('[pirate_forms]');
								echo '</div>';
							else:
							?>
							
								<!-- CONTACT FORM-->
								<div class="row">

									<?php 

										if(isset($emailSent) && $emailSent == true) :

											echo '<p class="error white-text error_thanks">'.__('Thanks, your email was sent successfully!', 'zoommerce').'</p>';                            

										elseif(isset($_POST['submitted'])):                                    

											echo '<p class="error white-text error_sorry">'.__('Sorry, an error occured. The email could not be sent.', 'zoommerce').'</p>';

										endif;

									

										if(isset($nameError) && $nameError != '') :																		 

											echo '<p class="error white-text">'.esc_html($nameError).'</p>';																 

										endif;	

										if(isset($emailError) && $emailError != '') :																		 

											echo '<p class="error white-text">'.esc_html($emailError).'</p>';																 

										endif;	

										if(isset($subjectError) && $subjectError != '') :																		 

											echo '<p class="error white-text">'.esc_html($subjectError).'</p>';																 

										endif;	

										if(isset($messageError) && $messageError != '') :																		 

											echo '<p class="error white-text">'.esc_html($messageError).'</p>';																 

										endif;	

									?>

									<form role="form" method="POST" action="" onSubmit="this.scrollPosition.value=(document.body.scrollTop || document.documentElement.scrollTop)" class="contact-form">

										<input type="hidden" name="scrollPosition">

										<input type="hidden" name="submitted" id="submitted" value="true" />

										<div class="col-lg-4 col-sm-4 zerif-rtl-contact-name" data-scrollreveal="enter left after 0s over 1s">

											<?php $zerif_contactus_name_placeholder = get_theme_mod('zerif_contactus_name_placeholder',__('Your Name', 'zoommerce')); ?>
											
											<input type="text" name="myname" placeholder="<?php if(!empty($zerif_contactus_name_placeholder)) echo esc_attr($zerif_contactus_name_placeholder); ?>" class="form-control input-box" value="<?php if(isset($_POST['myname'])) echo esc_attr($_POST['myname']);?>">

										</div>

										<div class="col-lg-4 col-sm-4 zerif-rtl-contact-email" data-scrollreveal="enter left after 0s over 1s">
										
											<?php $zerif_contactus_email_placeholder = get_theme_mod('zerif_contactus_email_placeholder',__('Your Email', 'zoommerce')); ?>
											
											<input type="email" name="myemail" placeholder="<?php if(!empty($zerif_contactus_email_placeholder)) echo esc_attr($zerif_contactus_email_placeholder); ?>" class="form-control input-box" value="<?php if(isset($_POST['myemail'])) echo is_email($_POST['myemail']) ? $_POST['myemail'] : ""; ?>">

										</div>

										<div class="col-lg-4 col-sm-4 zerif-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
										
											<?php $zerif_contactus_subject_placeholder = get_theme_mod('zerif_contactus_subject_placeholder',__('Subject', 'zoommerce')); ?>
											
											<input type="text" name="mysubject" placeholder="<?php if(!empty($zerif_contactus_subject_placeholder)) echo esc_attr($zerif_contactus_subject_placeholder); ?>" class="form-control input-box" value="<?php if(isset($_POST['mysubject'])) echo esc_attr($_POST['mysubject']);?>">

										</div>
										
										<div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">

											<?php $zerif_contactus_message_placeholder = get_theme_mod('zerif_contactus_message_placeholder',__('Your Message', 'zoommerce')); ?>
											
											<textarea name="mymessage" class="form-control textarea-box" placeholder="<?php if(!empty($zerif_contactus_message_placeholder)) echo esc_attr($zerif_contactus_message_placeholder); ?>"><?php if(isset($_POST['mymessage'])) { echo stripslashes($_POST['mymessage']); } ?></textarea>

										</div>
										
										<?php
											$zerif_contactus_button_label = get_theme_mod('zerif_contactus_button_label',__('Send Message', 'zoommerce'));
											
											if( !empty($zerif_contactus_button_label) ):
												
												echo '<button class="btn btn-primary custom-button" type="submit" data-scrollreveal="enter left after 0s over 1s">'.esc_html($zerif_contactus_button_label).'</button>';
												
											elseif ( isset( $wp_customize ) ):
											
												echo '<button class="btn btn-primary custom-button zerif_hidden_if_not_customizer" type="submit" data-scrollreveal="enter left after 0s over 1s"></button>';
												
											endif;
										?>

										<?php 

											$zerif_contactus_sitekey = get_theme_mod('zerif_contactus_sitekey');
											$zerif_contactus_secretkey = get_theme_mod('zerif_contactus_secretkey');
											$zerif_contactus_recaptcha_show = get_theme_mod('zerif_contactus_recaptcha_show');

											if( isset($zerif_contactus_recaptcha_show) && $zerif_contactus_recaptcha_show != 1 && !empty($zerif_contactus_sitekey) && !empty($zerif_contactus_secretkey) ) :

												echo '<div class="g-recaptcha zerif-g-recaptcha" data-sitekey="' . esc_attr($zerif_contactus_sitekey) . '"></div>';

											endif;

										?>

									</form>

								</div>

								<!-- / END CONTACT FORM-->
							<?php
							endif;
							?>

						</div> <!-- / END CONTAINER -->
					</section> <!-- / END CONTACT US SECTION-->
					<?php

					endif; //Check if contactform is enabled
				break;

				case "about_us":				
					//Home portfolio section
					get_template_part( 'sections/home_about' );
				break;

				case "our_team":				
					//Home team section
					get_template_part( 'sections/home_team' );
				break;

				case "right_ribbon":				
					//Home ribbon right button section
					get_template_part( 'sections/home_ribbon_right' );
				break;

				case "packages":				
					//Home google map
					get_template_part( 'sections/home_packages' );
				break;

				case "bottom_ribbon":				
					//Home ribbon bottom section
					get_template_part( 'sections/home_ribbon_bottom' );
				break;

				case "latest_news":				
					//Home recent posts
					get_template_part( 'sections/home_blog' );
				break;				
			}
		endif;
	endfor;

} //get_option( 'show_on_front' ) == 'page' ) 

get_footer(); 

?>