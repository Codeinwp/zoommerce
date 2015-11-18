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
				$nameError = __('* Please enter your name.', 'zoocommerce');               
				$hasError = true;        
			else:               
				$name = trim($_POST['myname']);        
			endif; 

			/* email */	
			if(trim($_POST['myemail']) === ''):               
				$emailError = __('* Please enter your email address.', 'zoocommerce');               
				$hasError = true;        
			elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))) :               
				$emailError = __('* You entered an invalid email address.', 'zoocommerce');               
				$hasError = true;        
			else:               
				$email = trim($_POST['myemail']);        
			endif;  

			/* subject */
			if(trim($_POST['mysubject']) === ''):               
				$subjectError = __('* Please enter a subject.', 'zoocommerce');               
				$hasError = true;        
			else:               
				$subject = trim($_POST['mysubject']);        
			endif; 

			/* message */
			if(trim($_POST['mymessage']) === ''):               
				$messageError = __('* Please enter a message.', 'zoocommerce');               
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

	if(zoocommerce_is_woocommerce_activated()) {
		
		//Shop categories sections
		get_template_part( 'sections/home_shop_categories' );

		//Home Products Section
		get_template_part( 'sections/home_products' );

	} else {
		echo '<p style="margin: 20px; height: 391px; background: url('.get_stylesheet_directory_uri() . '/assets/images/demo/latest_product_demo.jpg'.') no-repeat center center; line-height: 391px;">'. __('Please install WooCommerce plugin in order to display the shop categories section and latest producs section', 'zoocommerce'). '</p>';
	}

	//Home newsletter section
	get_template_part( 'sections/home_newsletter' );

	//Home testimonials section
	get_template_part( 'sections/home_testimonials' );

	//Home google map
	get_template_part( 'sections/home_map' );

	//Check if contactform is enabled
	if(empty(get_theme_mod('zoocommerce_contactform_hide'))):
	?>
	<section class="contact-us" id="contact">
		<div class="container">
			<!-- SECTION HEADER -->
			<?php
				echo '<div class="home_headline">';
				if(get_theme_mod('latest_contact_headline', __('Get in touch', 'zoocommerce'))) {
					echo '<h3>'.esc_html(get_theme_mod('latest_contact_headline', __('Get in touch', 'zoocommerce') )).'</h3>';
				}

				if(get_theme_mod('latest_contact_subheading', __('Big and mobile optimized contact form integrated. All fields are customizable.', 'zoocommerce'))) {
					echo '<h4>'.esc_html(get_theme_mod('latest_contact_subheading', __('Big and mobile optimized contact form integrated. All fields are customizable.', 'zoocommerce'))).'</h4>';
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

							echo '<p class="error white-text error_thanks">'.__('Thanks, your email was sent successfully!', 'zoocommerce').'</p>';                            

						elseif(isset($_POST['submitted'])):                                    

							echo '<p class="error white-text error_sorry">'.__('Sorry, an error occured. The email could not be sent.', 'zoocommerce').'</p>';

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

							<?php $zerif_contactus_name_placeholder = get_theme_mod('zerif_contactus_name_placeholder',__('Your Name', 'zoocommerce')); ?>
							
							<input type="text" name="myname" placeholder="<?php if(!empty($zerif_contactus_name_placeholder)) echo esc_attr($zerif_contactus_name_placeholder); ?>" class="form-control input-box" value="<?php if(isset($_POST['myname'])) echo esc_attr($_POST['myname']);?>">

						</div>

						<div class="col-lg-4 col-sm-4 zerif-rtl-contact-email" data-scrollreveal="enter left after 0s over 1s">
						
							<?php $zerif_contactus_email_placeholder = get_theme_mod('zerif_contactus_email_placeholder',__('Your Email', 'zoocommerce')); ?>
							
							<input type="email" name="myemail" placeholder="<?php if(!empty($zerif_contactus_email_placeholder)) echo esc_attr($zerif_contactus_email_placeholder); ?>" class="form-control input-box" value="<?php if(isset($_POST['myemail'])) echo is_email($_POST['myemail']) ? $_POST['myemail'] : ""; ?>">

						</div>

						<div class="col-lg-4 col-sm-4 zerif-rtl-contact-subject" data-scrollreveal="enter left after 0s over 1s">
						
							<?php $zerif_contactus_subject_placeholder = get_theme_mod('zerif_contactus_subject_placeholder',__('Subject', 'zoocommerce')); ?>
							
							<input type="text" name="mysubject" placeholder="<?php if(!empty($zerif_contactus_subject_placeholder)) echo esc_attr($zerif_contactus_subject_placeholder); ?>" class="form-control input-box" value="<?php if(isset($_POST['mysubject'])) echo esc_attr($_POST['mysubject']);?>">

						</div>
						
						<div class="col-lg-12 col-sm-12" data-scrollreveal="enter right after 0s over 1s">

							<?php $zerif_contactus_message_placeholder = get_theme_mod('zerif_contactus_message_placeholder',__('Your Message', 'zoocommerce')); ?>
							
							<textarea name="mymessage" class="form-control textarea-box" placeholder="<?php if(!empty($zerif_contactus_message_placeholder)) echo esc_attr($zerif_contactus_message_placeholder); ?>"><?php if(isset($_POST['mymessage'])) { echo stripslashes($_POST['mymessage']); } ?></textarea>

						</div>
						
						<?php
							$zerif_contactus_button_label = get_theme_mod('zerif_contactus_button_label',__('Send Message', 'zoocommerce'));
							
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

	//Home recent posts
	get_template_part( 'sections/home_blog' );

} //get_option( 'show_on_front' ) == 'page' ) 

get_footer(); 

?>