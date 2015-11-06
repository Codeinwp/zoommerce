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

		        $response = wp_remote_get( "https://www.google.com/recaptcha/api/siteverify?secret=".$zerif_contactus_secretkey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR'] );
		        if($response['body'].success==false) {
		        	$hasError = true;
		        }

	        endif;

			/* name */

			if(trim($_POST['myname']) === ''):               
				$nameError = __('* Please enter your name.','zerif');               
				$hasError = true;        
			else:               
				$name = trim($_POST['myname']);        
			endif; 

			/* email */	
			if(trim($_POST['myemail']) === ''):               
				$emailError = __('* Please enter your email address.','zerif');               
				$hasError = true;        
			elseif (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['myemail']))) :               
				$emailError = __('* You entered an invalid email address.','zerif');               
				$hasError = true;        
			else:               
				$email = trim($_POST['myemail']);        
			endif;  

			/* subject */
			if(trim($_POST['mysubject']) === ''):               
				$subjectError = __('* Please enter a subject.','zerif');               
				$hasError = true;        
			else:               
				$subject = trim($_POST['mysubject']);        
			endif; 

			/* message */
			if(trim($_POST['mymessage']) === ''):               
				$messageError = __('* Please enter a message.','zerif');               
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
		echo '<p style="margin: 20px;">'. __('Please install WooCommerce plugin in order to display the shop categories section and latest producs section', 'zoocommerce'). '</p>';
	}

	//Home newsletter section
	get_template_part( 'sections/home_newsletter' );
?>

<div id="content" class="site-content">

<?php get_footer(); ?>

</div><!-- .site-content -->

<?php } //get_option( 'show_on_front' ) == 'page' ) ?>


