<?php

/**
 * zoocommerce Theme Customizer
 *
 * @package zerif
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */



function wp_themeisle_customize_register( $wp_customize ) {

	class Zerif_Customize_Alpha_Color_Control extends WP_Customize_Control {
    
        public $type = 'alphacolor';
        public $palette = true;
        public $default = '#000';
    
        protected function render() {
            $id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
            $class = 'customize-control customize-control-' . $this->type; ?>
            <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>">
                <?php $this->render_content(); ?>
            </li>
        <?php }
    
        public function render_content() { ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="text" data-palette="<?php echo $this->palette; ?>" data-default-color="<?php echo $this->default; ?>" value="<?php echo intval( $this->value() ); ?>" class="pluto-color-control" <?php $this->link(); ?>  />
            </label>
        <?php }
    }



	class Zerif_Customizer_Number_Control extends WP_Customize_Control {



		public $type = 'number';

			

		public function render_content() {

		?>

			<label>

				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

				<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />

			</label>

		<?php

		}

	} 

	class Zerif_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
	 
		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" id="customize_textarea" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}
	
	class Zerif_Html_Support extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('You can insert any HTML code in here, to create links, google maps or anything else.','zoocommerce');
		}

	} 
	
	class Zerif_Our_Focus_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Our focus section.<br> There you must add the "Zerif - Our focus widget"','zoocommerce');
		}
	}
	
	class Zerif_Clients_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('To add clients here please go to:<br> Customize -> Widgets -> About us section.<br> There you must add the "Zerif - Clients widget"','zoocommerce');
		}
	}
	
	class Zerif_Our_Team_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Our team section.<br> There you must add the "Zerif - Team member widget"','zoocommerce');
		}
	}
	
	class Zerif_Testimonials_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Testimonials section.<br> There you must add the "Zerif - Testimonial widget"','zoocommerce');
		}
	}
	
	class Zerif_Packages_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Packages section.<br> There you must add the "Zerif - Package widget"','zoocommerce');
		}
	}
	
	class Zerif_Subscribe_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Subscribe section.<br> There you must add the "SendinBlue Widget"','zoocommerce');
		}
	}
	
	class Zerif_LatestNews extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section consists of blog posts.','zoocommerce');
		}
	}
	
	class Zerif_Colors_Panel extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('To have full control over the colors on homepage sections please visit each section options in Customizer.','zoocommerce');
		}
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	

	$wp_customize->remove_section('colors');
	
	$wp_customize->remove_section('static_front_page');
	
	$wp_customize->remove_section('background_image');

	
	
	
	/**********************************************/
	
	/*************** ORDER ************************/
	
	/**********************************************/
	
	
	
	/***********************************************/

	/************** GENERAL OPTIONS  ***************/

	/***********************************************/
require_once ( 'class/zoocommerce_general_control.php');

/**
 * General Customizer fields 
 */

$wp_customize->add_section( 'home_categories' , array(
	'title'		=> __( 'Shop Categories', 'zoocommerce' ),
	'priority'	=> 31
) );

$wp_customize->add_setting( 'customizer_shop_cats', array(
	'sanitize_callback' => 'zoocommerce_sanitize_repeater',
));
$wp_customize->add_control( new Zoocommerce_General_Repeater( $wp_customize, 'customizer_shop_cats', array(
	'label'   => esc_html__('Add new shop category','zoocommerce'),
	'section' => 'home_categories',
	'priority' => 1,
    'parallax_image_control' => false,
    'parallax_icon_control' => false,
    'parallax_text_control' => false,
    'parallax_link_control' => false,
    'parallax_dropdown_categories' => true
) ) );

$wp_customize->add_setting( 'zoocommerce_display_latest_cats', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => 1));
$wp_customize->add_control(
		'zoocommerce_display_latest_cats',
		array(
			'type' 		=> 'checkbox',
			'label' 	=> __('Disable latest shop categories?','zoocommerce'),
			'description' => __('If you check this box, the latest five shop categories will display on index, to use the custom selector please uncheck this box.','zoocommerce'),
			'section' 	=> 'home_categories',
			'priority'	=> 2,
		)
);

/**
 * Home: Testimonials section
 */
$wp_customize->add_section( 'home_testimonials_section' , array(
	'title'		=> __( 'Home Testimonials Section', 'zoocommerce' ),
	'priority'	=> 31
) );


$wp_customize->add_setting( 'latest_testimonials_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Testimonials', 'zoocommerce')));
$wp_customize->add_control( 'latest_testimonials_headline', array(
		'label'    => __( 'Headline', 'zoocommerce' ),
		'section'  => 'home_testimonials_section',
		'settings' => 'latest_testimonials_headline',
		'priority'    => 1,
));

$wp_customize->add_setting( 'latest_testimonials_subheading', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'zoocommerce')));
$wp_customize->add_control( 'latest_testimonials_subheading', array(
		'label'    => __( 'Subtitle', 'zoocommerce' ),
		'section'  => 'home_testimonials_section',
		'settings' => 'latest_testimonials_subheading',
		'priority'    => 2,
));

/**
 * Home: Subscribe section
 */
$wp_customize->add_section( 'home_subscribe_section' , array(
	'title'		=> __( 'Home Subscribe Section', 'zoocommerce' ),
	'priority'	=> 31
) );


$wp_customize->add_setting( 'latest_subscribe_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Newsletter Subscribtion', 'zoocommerce')));
$wp_customize->add_control( 'latest_subscribe_headline', array(
		'label'    => __( 'Headline', 'zoocommerce' ),
		'section'  => 'home_subscribe_section',
		'settings' => 'latest_subscribe_headline',
		'priority'    => 1,
));

$wp_customize->add_setting( 'latest_subscribe_subheading', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Display a small newsletter subscription form. Integrates with services such as MailChimp, SendinBlue.', 'zoocommerce')));
$wp_customize->add_control( 'latest_subscribe_subheading', array(
		'label'    => __( 'Subtitle', 'zoocommerce' ),
		'section'  => 'home_subscribe_section',
		'settings' => 'latest_subscribe_subheading',
		'priority'    => 2,
));


/**
 * Home: Latest Products section
 */
$wp_customize->add_section( 'home_latest_products' , array(
	'title'		=> __( 'Home latest products', 'zoocommerce' ),
	'priority'	=> 31
) );

$wp_customize->add_setting( 'latest_products_wide_image', array('default' =>  get_stylesheet_directory_uri() . '/assets/images/demo/products_background.jpg'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'latest_products_wide_image', array(
		'label'    => __( 'Latest Products Large Image', 'zoocommerce' ),
		'section'  => 'home_latest_products',
		'settings' => 'latest_products_wide_image',
		'priority'    => 1,
)));

$wp_customize->add_setting( 'latest_products_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('New Arrivals', 'zoocommerce')));
$wp_customize->add_control( 'latest_products_headline', array(
		'label'    => __( 'Headline', 'zoocommerce' ),
		'section'  => 'home_latest_products',
		'settings' => 'latest_products_headline',
		'priority'    => 2,
));

$wp_customize->add_setting( 'latest_products_subheading', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Check out our latest products', 'zoocommerce')));
$wp_customize->add_control( 'latest_products_subheading', array(
		'label'    => __( 'Subtitle', 'zoocommerce' ),
		'section'  => 'home_latest_products',
		'settings' => 'latest_products_subheading',
		'priority'    => 3,
));


$wp_customize->add_setting( 'latest_products_count', array('sanitize_callback' => 'zerif_sanitize_number','default' => 3));
$wp_customize->add_control( 'latest_products_count', array(
		'label'    => __( 'Right products count', 'zoocommerce' ),
		'section'  => 'home_latest_products',
		'settings' => 'latest_products_count',
		'priority'    => 4,
));

/**
 * Home: Google Map Section
 */
$wp_customize->add_section( 'home_map' , array(
	'title'		=> __( 'Home Google Map Section', 'zoocommerce' ),
	'priority'	=> 31
) );


$wp_customize->add_setting( 'zerif_googlemap_address', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('New York, Leroy Street','zoocommerce')));
$wp_customize->add_control( 'zerif_googlemap_address', array(
			'label'    => __( 'Google map address', 'zoocommerce' ),
			'section'  => 'home_map',
			'priority'    => 1,
));
	
$wp_customize->add_setting( 'zerif_googlemap_static');
$wp_customize->add_control(
		'zerif_googlemap_static',
		array(
			'type' => 'checkbox',
			'label' => __('Show STATIC google map ?','zoocommerce'),
			'description' => __('If you check this box, the Google map section will display as a static google map.','zoocommerce'),
			'section' => 'home_map',
			'priority'    => 2,
		)
);

/**
 * Home: Contact us Form
 */
$wp_customize->add_section( 'home_contactform_section' , array(
	'title'		=> __( 'Home Contactform Section', 'zoocommerce' ),
	'priority'	=> 31
) );


$wp_customize->add_setting( 'latest_contact_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Get in touch', 'zoocommerce')));
$wp_customize->add_control( 'latest_contact_headline', array(
		'label'    => __( 'Headline', 'zoocommerce' ),
		'section'  => 'home_contactform_section',
		'settings' => 'latest_contact_headline',
		'priority'    => 1,
));

$wp_customize->add_setting( 'latest_contact_subheading', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Big and mobile optimized contact form integrated. All fields are customizable.', 'zoocommerce')));
$wp_customize->add_control( 'latest_contact_subheading', array(
		'label'    => __( 'Subtitle', 'zoocommerce' ),
		'section'  => 'home_contactform_section',
		'settings' => 'latest_contact_subheading',
		'priority'    => 2,
));

/* zerif_contactus_email */
$wp_customize->add_setting( 'zerif_contactus_email', array('sanitize_callback' => 'zerif_sanitize_text'));
$wp_customize->add_control( 'zerif_contactus_email', array(
		'label'    => __( 'Email address', 'zoocommerce' ),
		'description' => __('The contact us form is submitted to this email address.','zoocommerce'),
		'section'  => 'home_contactform_section',
		'priority'    => 4,
));

/* zerif_contactus_button_label */
$wp_customize->add_setting( 'zerif_contactus_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Send Message','zoocommerce')));
$wp_customize->add_control( 'zerif_contactus_button_label', array(
		'label'    => __( 'Send message button label', 'zoocommerce' ),
		'section'  => 'home_contactform_section',
		'priority'    => 5,
));

/* zerif_contactus_name_placeholder */
$wp_customize->add_setting( 'zerif_contactus_name_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Name','zoocommerce')));
$wp_customize->add_control( 'zerif_contactus_name_placeholder', array(
		'label'    => __( 'Placeholder for "Your Name" input ', 'zoocommerce' ),
		'section'  => 'home_contactform_section',
		'priority'    => 6,
));

/* zerif_contactus_email_placeholder */
$wp_customize->add_setting( 'zerif_contactus_email_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Email','zoocommerce')));
$wp_customize->add_control( 'zerif_contactus_email_placeholder', array(
		'label'    => __( 'Placeholder for "Your Email" input', 'zoocommerce' ),
		'section'  => 'home_contactform_section',
		'priority'    => 7,
));

/* zerif_contactus_subject_placeholder */
$wp_customize->add_setting( 'zerif_contactus_subject_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Subject','zoocommerce')));
$wp_customize->add_control( 'zerif_contactus_subject_placeholder', array(
		'label'    => __( 'Placeholder for "Subject" input', 'zoocommerce' ),
		'section'  => 'home_contactform_section',
		'priority'    => 8,
));

/* zerif_contactus_message_placeholder */
$wp_customize->add_setting( 'zerif_contactus_message_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Message','zoocommerce')));
$wp_customize->add_control( 'zerif_contactus_message_placeholder', array(
		'label'    => __( 'Placeholder for "Message" input', 'zoocommerce' ),
		'section'  => 'home_contactform_section',
		'priority'    => 9,
));

/* zerif_contacus_background */
$wp_customize->add_setting( 'zerif_contacus_background', array( 'default' => 'rgba(255, 255, 255, 1)' ) );					 
$wp_customize->add_control(
					new Zerif_Customize_Alpha_Color_Control(
						$wp_customize,
						'zerif_contacus_background',
						array(
							'label'    => __( 'Background color', 'zoocommerce' ),
							'palette' => true,
							'section'  => 'home_contactform_section',
							'priority'   => 10
						)
					)
);
		
/* zerif_contacus_header */
$wp_customize->add_setting( 'zerif_contacus_header', array( 'default' => '#fff' ) );
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'zerif_contacus_header',
		array(
			'label'      => __( 'Title and subtitle color', 'zoocommerce' ),
			'section'    => 'home_contactform_section',
			'priority'   => 11
		)
	)
);

/* zerif_contacus_button_background */
$wp_customize->add_setting( 'zerif_contacus_button_background', array( 'default' => '#e96656' ) );
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'zerif_contacus_button_background',
		array(
			'label'      => __( 'Submit button background color', 'zoocommerce' ),
			'section'    => 'home_contactform_section',
			'priority'   => 12
		)
	)
);

/* zerif_contacus_button_background_hover */
$wp_customize->add_setting( 'zerif_contacus_button_background_hover', array( 'default' => '#cb4332' ) );
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'zerif_contacus_button_background_hover',
		array(
			'label'      => __( 'Submit button background color - hover', 'zoocommerce' ),
			'section'    => 'home_contactform_section',
			'priority'   => 13
		)
	)
);

/* zerif_contacus_button_color */
$wp_customize->add_setting( 'zerif_contacus_button_color', array( 'default' => '#fff' ) );
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'zerif_contacus_button_color',
		array(
			'label'      => __( 'Section button color', 'zoocommerce' ),
			'section'    => 'home_contactform_section',
			'priority'   => 14
		)
	)
);

/**
 * Home: Blog section
 */
$wp_customize->add_section( 'home_blog_section' , array(
	'title'		=> __( 'Home Blog Section', 'zoocommerce' ),
	'priority'	=> 31
) );


$wp_customize->add_setting( 'home_latest_posts_headline', array('sanitize_callback' => 'zerif_sanitize_number','default' => __('Latest blog posts', 'zoocommerce')));
$wp_customize->add_control( 'home_latest_posts_headline', array(
		'label'    => __( 'Headline', 'zoocommerce' ),
		'section'  => 'home_blog_section',
		'settings' => 'home_latest_posts_headline',
		'priority'    => 1,
));

$wp_customize->add_setting( 'home_latest_posts_subheading', array('sanitize_callback' => 'zerif_sanitize_number'));
$wp_customize->add_control( 'home_latest_posts_subheading', array(
		'label'    => __( 'Subtitle', 'zoocommerce' ),
		'section'  => 'home_blog_section',
		'settings' => 'home_latest_posts_subheading',
		'priority'    => 2,
));

$wp_customize->add_setting( 'home_latest_posts_count', array('sanitize_callback' => 'zerif_sanitize_number', 'default' => 4));
$wp_customize->add_control( 'home_latest_posts_count', array(
		'label'    => __( 'Coubt', 'zoocommerce' ),
		'section'  => 'home_blog_section',
		'settings' => 'home_latest_posts_count',
		'priority'    => 3,
));


	if ( class_exists( 'WP_Customize_Panel' ) ):		
		
		
		$wp_customize->add_section( 'zerif_general_section' , array(
				'title'       => __( 'General options', 'zoocommerce' ),
				'priority'    => 31
				
		));
		
		/* zerif_disable_preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader');
		$wp_customize->add_control(
			'zerif_disable_preloader',
			array(
				'type' => 'checkbox',
				'label' => __('Disable preloader?','zoocommerce'),
				'description' => __('If you check this box, the preloader will be disabled from homepage.','zoocommerce'),
				'section' => 'zerif_general_section',
				'priority'    => 1,
			)
		);
		$wp_customize->get_setting( 'zerif_disable_preloader' )->transport = 'postMessage';
		
		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_smooth_scroll',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Disable smooth scroll?','zoocommerce'),
					'description' => __('If you check this box, the smooth scroll will be disabled.','zoocommerce'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 2,
				)
		);
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));

		/* zerif_logo */
		$wp_customize->add_setting( 'zerif_logo', array('default' => get_stylesheet_directory_uri().'/assets/images/logo.png'));

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
				'label'    => __( 'Logo', 'zoocommerce' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_logo',
				'priority'    => 2,
		)));
		
		$wp_customize->get_setting( 'zerif_logo' )->transport = 'postMessage';

		
	else:
		$wp_customize->add_section( 'zerif_general_section' , array(

				'title'       => __( 'General options', 'zoocommerce' ),

				'priority'    => 31,

				'description' => __('Zerif theme general options','zoocommerce'),

		));
		
		/* LOGO	*/

		$wp_customize->add_setting( 'zerif_logo');

			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(

				'label'    => __( 'Logo', 'zoocommerce' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_logo',

				'priority'    => 1,

		)));
		

		
	endif;
	

	/***********************************************/

	/************** COLORS OPTIONS  ***************/

	/***********************************************/
	
	if ( class_exists( 'WP_Customize_Panel' ) ):
		
		$wp_customize->add_panel( 'panel_1', array(
			'priority' => 32,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Colors', 'zoocommerce' )
		) );
		
		/* COLORS HOMEPAGE */
		
		$wp_customize->add_section( 'zerif_hp_color_section' , array(
				'title'       => __( 'Homepage sections', 'zoocommerce' ),
				'priority'    => 1,
				'panel' => 'panel_1'
		));
		
		$wp_customize->add_setting( 'zerif_hp_color_section' );
	
		$wp_customize->add_control( new Zerif_Colors_Panel( $wp_customize, 'zerif_hp_color_section',
			array(
				'section' => 'zerif_hp_color_section',
		   )
		));
		
		/* COLORS FOOTER */
		
		$wp_customize->add_section( 'zerif_footer_color_section' , array(
				'title'       => __( 'Footer colors', 'zoocommerce' ),
				'priority'    => 2,
				'panel' => 'panel_1'
		));
		
		/* zerif_footer_background */
		$wp_customize->add_setting( 'zerif_footer_background', array( 'default' => '#2d2d2d' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_background',
				array(
					'label'      => __( 'Footer background color', 'zoocommerce' ),
					'section'    => 'zerif_footer_color_section',
					'settings'   => 'zerif_footer_background',
					'priority'   => 1
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_footer_background' )->transport = 'postMessage';
		
		
		
		/* zerif_footer_text_color */
		$wp_customize->add_setting( 'zerif_footer_text_color', array( 'default' => '#737373' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_text_color',
				array(
					'label'      => __( 'Footer text color', 'zoocommerce' ),
					'section'    => 'zerif_footer_color_section',
					'settings'   => 'zerif_footer_text_color',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_footer_text_color' )->transport = 'postMessage';
		
		/* zerif_footer_socials */
		$wp_customize->add_setting( 'zerif_footer_socials', array( 'default' => '#939393' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_socials',
				array(
					'label'      => __( 'Footer social icons color', 'zoocommerce' ),
					'section'    => 'zerif_footer_color_section',
					'settings'   => 'zerif_footer_socials',
					'priority'   => 4
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_footer_socials' )->transport = 'postMessage';
		
		/* zerif_footer_socials_hover */
		$wp_customize->add_setting( 'zerif_footer_socials_hover', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_socials_hover',
				array(
					'label'      => __( 'Footer socials icons color - hover', 'zoocommerce' ),
					'section'    => 'zerif_footer_color_section',
					'settings'   => 'zerif_footer_socials_hover',
					'priority'   => 5
				)
			)
		);
		
		/* COLORS FOOTER */
		
		$wp_customize->add_section( 'zerif_general_color_section' , array(
				'title'       => __( 'General colors', 'zoocommerce' ),
				'priority'    => 3,
				'panel' => 'panel_1'
		));
		
		/* zerif_background_color */
		$wp_customize->add_setting( 'zerif_background_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_background_color',
				array(
					'label'      => __( 'Background color', 'zoocommerce' ),
					'section'    => 'zerif_general_color_section',
					'settings'   => 'zerif_background_color',
					'priority'   => 1
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_background_color' )->transport = 'postMessage';
		
		/* zerif_navbar_color */
		$wp_customize->add_setting( 'zerif_navbar_color', array( 'default' => '#000' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_navbar_color',
				array(
					'label'      => __( 'Navbar background color', 'zoocommerce' ),
					'section'    => 'zerif_general_color_section',
					'settings'   => 'zerif_navbar_color',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_navbar_color' )->transport = 'postMessage';
		
		/* zerif_titles_color */
		$wp_customize->add_setting( 'zerif_titles_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_titles_color',
				array(
					'label'      => __( 'Titles color', 'zoocommerce' ),
					'section'    => 'zerif_general_color_section',
					'settings'   => 'zerif_titles_color',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_titles_color' )->transport = 'postMessage';
		
		/* zerif_titles_bottomborder_color */
		$wp_customize->add_setting( 'zerif_titles_bottomborder_color', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_titles_bottomborder_color',
				array(
					'label'      => __( 'Titles bottom border color', 'zoocommerce' ),
					'section'    => 'zerif_general_color_section',
					'settings'   => 'zerif_titles_bottomborder_color',
					'priority'   => 4
				)
			)
		);
		
		/* zerif_texts_color */
		$wp_customize->add_setting( 'zerif_texts_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_texts_color',
				array(
					'label'      => __( 'Text color', 'zoocommerce' ),
					'section'    => 'zerif_general_color_section',
					'settings'   => 'zerif_texts_color',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_texts_color' )->transport = 'postMessage';
		
		/* zerif_links_color */
		$wp_customize->add_setting( 'zerif_links_color', array( 'default' => '#808080' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_links_color',
				array(
					'label'      => __( 'Links color', 'zoocommerce' ),
					'section'    => 'zerif_general_color_section',
					'settings'   => 'zerif_links_color',
					'priority'   => 6
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_links_color' )->transport = 'postMessage';
		
		/* zerif_links_color_hover */
		$wp_customize->add_setting( 'zerif_links_color_hover', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_links_color_hover',
				array(
					'label'      => __( 'Links color hover', 'zoocommerce' ),
					'section'    => 'zerif_general_color_section',
					'settings'   => 'zerif_links_color_hover',
					'priority'   => 7
				)
			)
		);
		
		/* COLORS BUTTONS */
		
		$wp_customize->add_section( 'zerif_buttons_color_section' , array(
				'title'       => __( 'Buttons colors', 'zoocommerce' ),
				'priority'    => 4,
				'panel' => 'panel_1'
		));
		
		/* zerif_buttons_background_color */
		$wp_customize->add_setting( 'zerif_buttons_background_color', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_buttons_background_color',
				array(
					'label'      => __( 'Buttons background color', 'zoocommerce' ),
					'section'    => 'zerif_buttons_color_section',
					'settings'   => 'zerif_buttons_background_color',
					'priority'   => 1
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_buttons_background_color' )->transport = 'postMessage';
		
		/* zerif_buttons_background_color_hover */
		$wp_customize->add_setting( 'zerif_buttons_background_color_hover', array( 'default' => '#cb4332' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_buttons_background_color_hover',
				array(
					'label'      => __( 'Buttons background color - hover', 'zoocommerce' ),
					'section'    => 'zerif_buttons_color_section',
					'settings'   => 'zerif_buttons_background_color_hover',
					'priority'   => 2
				)
			)
		);
		
		/* zerif_buttons_text_color */
		$wp_customize->add_setting( 'zerif_buttons_text_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_buttons_text_color',
				array(
					'label'      => __( 'Buttons text color', 'zoocommerce' ),
					'section'    => 'zerif_buttons_color_section',
					'settings'   => 'zerif_buttons_text_color',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_buttons_text_color' )->transport = 'postMessage';
		
	else: /* Older versions of WordPress */
	
		$wp_customize->add_section( 'zerif_color_section' , array(
				'title'       => __( 'Colors', 'zoocommerce' ),
				'priority'    => 30,
				'description' => __('Zerif theme colors','zoocommerce'),
		));
		
		/* zerif_footer_background */
		$wp_customize->add_setting( 'zerif_footer_background', array( 'default' => '#2d2d2d' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_background',
				array(
					'label'      => __( 'Footer background color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_footer_background',
					'priority'   => 1
				)
			)
		);
		
		/* zerif_footer_socials_background */
		$wp_customize->add_setting( 'zerif_footer_socials_background', array( 'default' => '#2d2d2d' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_socials_background',
				array(
					'label'      => __( 'Footer socials background color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_footer_socials_background',
					'priority'   => 2
				)
			)
		);
		
		/* zerif_footer_text_color */
		$wp_customize->add_setting( 'zerif_footer_text_color', array( 'default' => '#737373' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_text_color',
				array(
					'label'      => __( 'Footer text color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_footer_text_color',
					'priority'   => 3
				)
			)
		);
		
		/* zerif_footer_socials */
		$wp_customize->add_setting( 'zerif_footer_socials', array( 'default' => '#939393' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_socials',
				array(
					'label'      => __( 'Footer social icons color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_footer_socials',
					'priority'   => 4
				)
			)
		);
		
		/* zerif_footer_socials_hover */
		$wp_customize->add_setting( 'zerif_footer_socials_hover', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_socials_hover',
				array(
					'label'      => __( 'Footer socials icons color - hover', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_footer_socials_hover',
					'priority'   => 5
				)
			)
		);
		
		/* zerif_background_color */
		$wp_customize->add_setting( 'zerif_background_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_background_color',
				array(
					'label'      => __( 'Background color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_background_color',
					'priority'   => 6
				)
			)
		);
		
		/* zerif_navbar_color */
		$wp_customize->add_setting( 'zerif_navbar_color', array( 'default' => '#000' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_navbar_color',
				array(
					'label'      => __( 'Navbar background color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_navbar_color',
					'priority'   => 7
				)
			)
		);
		
		/* zerif_titles_color */
		$wp_customize->add_setting( 'zerif_titles_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_titles_color',
				array(
					'label'      => __( 'Titles color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_titles_color',
					'priority'   => 8
				)
			)
		);
		
		/* zerif_titles_bottomborder_color */
		$wp_customize->add_setting( 'zerif_titles_bottomborder_color', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_titles_bottomborder_color',
				array(
					'label'      => __( 'Titles bottom border color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_titles_bottomborder_color',
					'priority'   => 9
				)
			)
		);
		
		/* zerif_texts_color */
		$wp_customize->add_setting( 'zerif_texts_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_texts_color',
				array(
					'label'      => __( 'Text color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_texts_color',
					'priority'   => 10
				)
			)
		);
		
		/* zerif_links_color */
		$wp_customize->add_setting( 'zerif_links_color', array( 'default' => '#808080' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_links_color',
				array(
					'label'      => __( 'Links color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_links_color',
					'priority'   => 11
				)
			)
		);
		
		/* zerif_links_color_hover */
		$wp_customize->add_setting( 'zerif_links_color_hover', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_links_color_hover',
				array(
					'label'      => __( 'Links color hover', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_links_color_hover',
					'priority'   => 12
				)
			)
		);
		
		/* zerif_buttons_background_color */
		$wp_customize->add_setting( 'zerif_buttons_background_color', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_buttons_background_color',
				array(
					'label'      => __( 'Buttons background color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_buttons_background_color',
					'priority'   => 13
				)
			)
		);
		
		/* zerif_buttons_background_color_hover */
		$wp_customize->add_setting( 'zerif_buttons_background_color_hover', array( 'default' => '#cb4332' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_buttons_background_color_hover',
				array(
					'label'      => __( 'Buttons background color - hover', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_buttons_background_color_hover',
					'priority'   => 14
				)
			)
		);
		
		/* zerif_buttons_text_color */
		$wp_customize->add_setting( 'zerif_buttons_text_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_buttons_text_color',
				array(
					'label'      => __( 'Buttons text color', 'zoocommerce' ),
					'section'    => 'zerif_color_section',
					'settings'   => 'zerif_buttons_text_color',
					'priority'   => 15
				)
			)
		);
	
	endif;
	
	
	

	/********************************************************************/

	/*************  MENU PANEL ADDITION **********************************/

	/********************************************************************/
	
	if ( class_exists( 'WP_Customize_Panel' ) ):
	
			$wp_customize->add_section( 'woocommerce_menu_section' , array(
					'title'       => __( 'Login Menu', 'zoocommerce' ),
					'priority'    => 2,
					'panel' => 'nav_menus'
			));
			
			/* My Account Icon */
			$wp_customize->add_setting( 'myaccount_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-profile.png'));			
	
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'myaccount_icon', array(
	
					'label'    => __( 'My Account - Icon', 'zoocommerce' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'myaccount_icon',	
					'priority'    => 1,
	
			)));
			
			/* My Account Link */  	
			$wp_customize->add_setting( 'myaccount_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

			$wp_customize->add_control( 'zerif_myaccount_link', array(
	
					'label'    => __( 'My Account link', 'zoocommerce' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'myaccount_link',	
					'priority'    => 2,
	
			));
			
			
			/* My Cart Icon */
			$wp_customize->add_setting( 'cart_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-cart.png'));			
	
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cart_icon', array(
	
					'label'    => __( 'Cart - Icon', 'zoocommerce' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'cart_icon',	
					'priority'    => 3,
	
			)));
			
			/* My Cart Link */  	
			$wp_customize->add_setting( 'cart_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

			$wp_customize->add_control( 'zerif_cart_link', array(
	
					'label'    => __( 'Cart link', 'zoocommerce' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'cart_link',	
					'priority'    => 4,
	
			));
			
	else:
			$wp_customize->add_section( 'woocommerce_menu_section' , array(
					'title'       => __( 'Login Menu', 'zoocommerce' ),
					'priority'    => 2,
					'panel' => 'nav_menus'
			));
			
			/* My Account Icon */
			$wp_customize->add_setting( 'myaccount_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-profile.png'));			
	
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'myaccount_icon', array(
	
					'label'    => __( 'My Account - Icon', 'zoocommerce' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'myaccount_icon',	
					'priority'    => 1,
	
			)));
			
			/* My Account Link */  	
			$wp_customize->add_setting( 'myaccount_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

			$wp_customize->add_control( 'zerif_myaccount_link', array(
	
					'label'    => __( 'My Account link', 'zoocommerce' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'myaccount_link',	
					'priority'    => 2,
	
			));
			
			
			/* My Cart Icon */
			$wp_customize->add_setting( 'cart_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-cart.png'));			
	
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cart_icon', array(
	
					'label'    => __( 'Cart - Icon', 'zoocommerce' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'cart_icon',	
					'priority'    => 3,
	
			)));
			
			/* My Cart Link */  	
			$wp_customize->add_setting( 'cart_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

			$wp_customize->add_control( 'zerif_cart_link', array(
	
					'label'    => __( 'Cart link', 'zoocommerce' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'cart_link',	
					'priority'    => 4,
	
			));		
		
	endif;	
	
	
	/*****************************************************/

    /**************	BIG BANNER SECTION *******************/

	/****************************************************/

	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_3', array(
			'priority' => 101,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Big Banner section', 'zoocommerce' )
		) );
		
		/* BIG TITLE CONTENT ------------------------------------------------------*/
		
		$wp_customize->add_section( 'zerif_bigtitle_texts_section' , array(
				'title'       => __( 'Content', 'zoocommerce' ),
				'priority'    => 1,
				'panel' => 'panel_3'
		));

		/* zerif_bigtitle_title */
		$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('To add a title here please go to Customizer, "Big banner section"','zoocommerce')));

		$wp_customize->add_control( 'zerif_bigtitle_title', array(
				'label'    => __( 'Big Banner Heading', 'zoocommerce' ),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_title',
				'priority'    => 2,

		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_title' )->transport = 'postMessage';
		
		/* zerif_bigtitle_small_heading */
		$wp_customize->add_setting( 'zerif_bigtitle_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add Sub Title','zoocommerce')));

		$wp_customize->add_control( 'zerif_bigtitle_subtitle', array(
				'label'    => __( 'Big Banner Sub Heading', 'zoocommerce' ),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_subtitle',
				'priority'    => 3,

		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_title' )->transport = 'postMessage';

		/* zerif_bigtitle_button_label */
		$wp_customize->add_setting( 'zerif_bigtitle_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Shop Now','zoocommerce')));			

		$wp_customize->add_control( 'zerif_bigtitle_button_label', array(
				'label'    => __( 'Button label', 'zoocommerce' ),
				'description' => __('This is the text that will appear on the button','zoocommerce'),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_button_label',
				'priority'    => 4,

		));

		$wp_customize->get_setting( 'zerif_bigtitle_button_label' )->transport = 'postMessage';
		
		/* zerif_bigtitle_button_url */
		$wp_customize->add_setting( 'zerif_bigtitle_button_url', array('sanitize_callback' => 'esc_url','default' => '#'));

		$wp_customize->add_control( 'zerif_bigtitle_button_url', array(
				'label'    => __( 'Button link', 'zoocommerce' ),
				'description' => __('The button is linked to this URL','zoocommerce'),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_button_url',
				'priority'    => 5,
		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_button_url' )->transport = 'postMessage';
		
		
		
		/* BIG TITLE COLORS --------------------------------------------------------------------*/
		
		$wp_customize->add_section( 'zerif_bigtitle_colors_section' , array(
				'title'       => __( 'Colors', 'zoocommerce' ),
				'priority'    => 2,
				'panel' => 'panel_3'
		));
		
		/* zerif_bigtitle_background */
		$wp_customize->add_setting( 'zerif_bigtitle_background', array( 'default' => '#000' ));
		 
		$wp_customize->add_control(
			new Zerif_Customize_Alpha_Color_Control(
				$wp_customize,
				'zerif_bigtitle_background',
				array(
					'label'    => __( 'Background color', 'zoocommerce' ),
					'palette' => true,
					'section'  => 'zerif_bigtitle_colors_section',
					'priority'   => 1
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_background' )->transport = 'postMessage';
		
		/* zerif_bigtitle_header_color */
		$wp_customize->add_setting( 'zerif_bigtitle_header_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_header_color',
				array(
					'label'      => __( 'Big title color', 'zoocommerce' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_header_color',
					'priority'   => 2
				)
			)
		);
		$wp_customize->get_setting( 'zerif_bigtitle_header_color' )->transport = 'postMessage';
		
		/* zerif_bigtitle_subheader_color */
		$wp_customize->add_setting( 'zerif_bigtitle_subheader_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_subheader_color',
				array(
					'label'      => __( 'Sub title color', 'zoocommerce' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_subheader_color',
					'priority'   => 3
				)
			)
		);
		$wp_customize->get_setting( 'zerif_bigtitle_subheader_color' )->transport = 'postMessage';
		
		/* zerif_bigtitle_button_background_color */
		$wp_customize->add_setting( 'zerif_bigtitle_button_background_color', array( 'default' => 'transparent' ) );
		
		$wp_customize->add_control(
			new Zerif_Customize_Alpha_Color_Control(
				$wp_customize,
				'zerif_bigtitle_button_background_color',
				array(
					'label'      => __( 'Button background color', 'zoocommerce' ),
					'palette' => true,
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_button_background_color',
					'priority'   => 4
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_button_background_color' )->transport = 'postMessage';
		
		/* zerif_bigtitle_button_background_color_hover */
		$wp_customize->add_setting( 'zerif_bigtitle_button_background_color_hover', array( 'default' => 'transparent' ) );
		
		$wp_customize->add_control(
			new Zerif_Customize_Alpha_Color_Control(
				$wp_customize,
				'zerif_bigtitle_button_background_color_hover',
				array(
					'label'      => __( 'Button background color - hover', 'zoocommerce' ),
					'palette' => true,
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_button_background_color_hover',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_button_background_color_hover' )->transport = 'postMessage';
		
		/* zerif_bigtitle_button_color */
		$wp_customize->add_setting( 'zerif_bigtitle_button_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_button_color',
				array(
					'label'      => __( 'Button text color', 'zoocommerce' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_button_color',
					'priority'   => 6
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_button_color' )->transport = 'postMessage';
		
		/* zerif_bigtitle_button_border_color */
		$wp_customize->add_setting( 'zerif_bigtitle_button_border_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_button_border_color',
				array(
					'label'      => __( 'Button Border color', 'zoocommerce' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_button_border_color',
					'priority'   => 6
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_button_border_color' )->transport = 'postMessage';
		
		
		

		
		/* Background image ----------------------------------------------------- */
		//$wp_customize->get_section('background_image')->panel = 'panel_3';
		//$wp_customize->get_section('background_image')->priority = 5;
		
		$wp_customize->add_section(
			'zerif_background_image_section',
			array(
				'title'       	=> __( 'Background Image', 'zoocommerce' ),
				'priority'    	=> 4,
				'panel'			=> 'panel_3',
			)
		);

		
		$wp_customize->add_setting(	'zerif_background_image', array('default' => get_stylesheet_directory_uri() . '/assets/images/demo/home_background.png') );
		
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_background_image',
				array(
					'label'    => __( 'Background Image', 'zoocommerce' ),
					'section'  => 'zerif_background_image_section',
					'priority'    => 1,
				)
			)
		);

		$wp_customize->add_setting(	'zerif_vposition_bgimage', array('default' => 'top',	));
		
		$wp_customize->add_control(
			'zerif_vposition_bgimage',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Vertical align',
				'section' 	=> 'zerif_background_image_section',
				'choices' 	=> array(
					'top' 		=> __('Top','zoocommerce'),
					'center'	=> __('Center','zoocommerce'),
					'bottom' 	=> __('Bottom','zoocommerce'),
				),
				'priority' 	=> 2,
			)
		);

		$wp_customize->add_setting(	'zerif_hposition_bgimage', array('default' => 'left',));
		
		$wp_customize->add_control(
			'zerif_hposition_bgimage',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Horizontal align',
				'section' 	=> 'zerif_background_image_section',
				'choices' 	=> array(
					'left' 		=> __('Left','zoocommerce'),
					'center'	=> __('Center','zoocommerce'),
					'right' 	=> __('Right','zoocommerce'),
				),
				'priority' 	=> 3,
			)
		);

		$wp_customize->add_setting(	'zerif_bgsize_bgimage',	array('default' => 'cover',	));
		
		$wp_customize->add_control(
			'zerif_bgsize_bgimage',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Background size',
				'section' 	=> 'zerif_background_image_section',
				'choices' 	=> array(
					'cover' 	=> __('Cover','zoocommerce'),
					'width' 	=> __('width 100%','zoocommerce'),
					'height'	=> __('Height 100%','zoocommerce'),
				),
				'priority' 	=> 4,
			)
		);

		

	else: /* Old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_bigtitle_section' , array(
			'title'       => __( 'Big Banner section', 'zoocommerce' ),
			'priority'    => 32
		));
			
			
		/* zerif_bigtitle_title */
		$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('To add a title here please go to Customizer, "Big banner section"','zoocommerce')));

		$wp_customize->add_control( 'zerif_bigtitle_title', array(
				'label'    => __( 'Big Heading', 'zoocommerce' ),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_title',
				'priority'    => 2,
		));

		/* zerif_bigtitle_small_heading */
		$wp_customize->add_setting( 'zerif_bigtitle_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add Sub Title','zoocommerce')));

		$wp_customize->add_control( 'zerif_bigtitle_subtitle', array(
				'label'    => __( 'Big Banner Sub Heading', 'zoocommerce' ),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_subtitle',
				'priority'    => 3,

		));
		
		
		/* zerif_bigtitle_button_label */
		$wp_customize->add_setting( 'zerif_bigtitle_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Shop','zoocommerce')));			

		$wp_customize->add_control( 'zerif_bigtitle_button_label', array(
				'label'    => __( 'Button label', 'zoocommerce' ),
				'description' => __('This is the text that will appear on the button','zoocommerce'),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_button_label',
				'priority'    => 4,

		));

				
		/* zerif_bigtitle_button_url */
		$wp_customize->add_setting( 'zerif_bigtitle_button_url', array('sanitize_callback' => 'esc_url','default' => '#'));

		$wp_customize->add_control( 'zerif_bigtitle_button_url', array(
				'label'    => __( 'Button link', 'zoocommerce' ),
				'description' => __('The button is linked to this URL','zoocommerce'),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_button_url',
				'priority'    => 5,
		));
		

		/* zerif_bigtitle_background */
		$wp_customize->add_setting( 'zerif_bigtitle_background', array( 'default' => 'rgba(0, 0, 0, 0.5)' ));
		 
		$wp_customize->add_control(
			new Zerif_Customize_Alpha_Color_Control(
				$wp_customize,
				'zerif_bigtitle_background',
				array(
					'label'    => __( 'Background color', 'zoocommerce' ),
					'palette' => true,
					'section'  => 'zerif_bigtitle_colors_section',
					'priority'   => 1
				)
			)
		);
		
		
		/* zerif_bigtitle_header_color */
		$wp_customize->add_setting( 'zerif_bigtitle_header_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_header_color',
				array(
					'label'      => __( 'Big title color', 'zoocommerce' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_header_color',
					'priority'   => 2
				)
			)
		);


		/* zerif_bigtitle_subheader_color */
		$wp_customize->add_setting( 'zerif_bigtitle_subheader_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_subheader_color',
				array(
					'label'      => __( 'Sub title color', 'zoocommerce' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_subheader_color',
					'priority'   => 3
				)
			)
		);
		

		/* zerif_bigtitle_button_background_color */
		$wp_customize->add_setting( 'zerif_bigtitle_button_background_color', array( 'default' => 'rgba(0, 0, 0, 0.5)' ) );
		
		$wp_customize->add_control(
			new Zerif_Customize_Alpha_Color_Control(
				$wp_customize,
				'zerif_bigtitle_button_background_color',
				array(
					'label'      => __( 'Button background color', 'zoocommerce' ),
					'palette' => true,
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_button_background_color',
					'priority'   => 4
				)
			)
		);
		
		
		
		/* zerif_bigtitle_button_background_color_hover */
		$wp_customize->add_setting( 'zerif_bigtitle_button_background_color_hover', array( 'default' => 'rgba(0, 0, 0, 0.8)' ) );
		
		$wp_customize->add_control(
			new Zerif_Customize_Alpha_Color_Control(
				$wp_customize,
				'zerif_bigtitle_button_background_color_hover',
				array(
					'label'      => __( 'Button background color - hover', 'zoocommerce' ),
					'palette' => true,
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_button_background_color_hover',
					'priority'   => 5
				)
			)
		);
		
		
		
		/* zerif_bigtitle_button_color */
		$wp_customize->add_setting( 'zerif_bigtitle_button_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_button_color',
				array(
					'label'      => __( 'Button text color', 'zoocommerce' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_button_color',
					'priority'   => 6
				)
			)
		);
		
		
		

		/* show/hide  parallax */
		$wp_customize->add_setting( 'zerif_parallax_show', array('sanitize_callback' => 'zerif_sanitize_text'));
	    $wp_customize->add_control(
			'zerif_parallax_show',
			array(
				'type' 		=> 'checkbox',
				'label' 	=> __('Use parallax effect?','zerif-lite'),
				'section' 	=> 'zerif_bigtitle_section',
				'priority'	=> 1,
			)
		);

		/* IMAGE 1*/
		$wp_customize->add_setting( 'zerif_parallax_img1', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/assets/images/background1.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
				'label'    	=> __( 'Parallax image 1', 'zoocommerce' ),
				'section'  	=> 'zerif_bigtitle_section',
				'settings' 	=> 'zerif_parallax_img1',
				'priority'	=> 15,
		)));

		/* IMAGE 2 */
		$wp_customize->add_setting( 'zerif_parallax_img2', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/assets/images/background2.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
				'label'    	=> __( 'Parallax image 2', 'zoocommerce' ),
				'section'  	=> 'zerif_bigtitle_section',
				'settings' 	=> 'zerif_parallax_img2',
				'priority'	=> 16,
		)));


	endif;




	/************************************/

	/******** PORTFOLIO SECTION ********/

	/***********************************/

	
	

	/************************************/

	/******* ABOUT US SECTION ***********/

	/************************************/

	
	
	


	/******************************************/

    /**********	OUR TEAM SECTION **************/

	/******************************************/

	

	

	

	

	/**********************************************/

    /**********	TESTIMONIALS SECTION **************/

	/**********************************************/

	
	
	


	/***********************************************************/

	/********* RIBBONS ****************************************/

	/**********************************************************/

	
	

	/*******************************************************/

    /************	CONTACT US SECTION *********************/

	/*******************************************************/
	
	
	
	/*******************************************************/

    /************	PACKAGES SECTION ***********************/

	/*******************************************************/

	

	/*******************************************************/

    /************	GOOGLE MAP SECTION *********************/

	/*******************************************************/
		
	
	
	/********************************************************/

    /************	LATEST NEWS SECTION *********************/

	/********************************************************/

	
	
	/*******************************************************/

    /************	SUBSCRIBE SECTION **********************/

	/*******************************************************/

	
	
	
	/****************************************************/
	
	/****************** FOOTER **********************/
	
	/****************************************************/
	if ( class_exists( 'WP_Customize_Panel' ) ):		
		
		$wp_customize->add_panel( 'panel_10', array(
			'priority' => 121,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Footer', 'zoocommerce' )
		) );
		
		
		$wp_customize->add_section( 'zerif_footer_general_section' , array(
				'title'       => __( 'General options', 'zoocommerce' ),
				'priority'    => 1,
				'panel' => 'panel_10'
		));		
		

		/* zerif_copyright */
		$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_copyright', array(
				'label'    => __( 'Footer Copyright', 'zoocommerce' ),
				'section'  => 'zerif_footer_general_section',
				'settings' => 'zerif_copyright',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_copyright' )->transport = 'postMessage';
		
		/* zerif_google_anaytics */
		$wp_customize->add_setting( 'zerif_google_anaytics' );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_google_anaytics', array(
            'label'   => __( 'Google analytics code', 'zoocommerce' ),
            'section' => 'zerif_footer_general_section',
            'settings'   => 'zerif_google_anaytics',
            'priority' => 4
        )) ) ;
		
		$wp_customize->add_section( 'zerif_footer_section' , array(

				'title'       => __( 'Footer sections', 'zoocommerce' ),

				'priority'    => 2,

				'panel' => 'panel_10'
		));
		
		$wp_customize->add_setting('zerif_html_note');
		
		$wp_customize->add_control( new Zerif_Html_Support( $wp_customize, 'zerif_html_note',
			array(
				'section' => 'zerif_footer_section',
				'priority' => '1'
		   )
		));
		
		/* email - ICON */
		$wp_customize->add_setting( 'zerif_email_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/icon-address.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(

				'label'    => __( 'Email section - icon', 'zoocommerce' ),

				'section'  => 'zerif_footer_section',

				'settings' => 'zerif_email_icon',

				'priority'    => 2,

		)));
		
		$wp_customize->get_setting( 'zerif_email_icon' )->transport = 'postMessage';
		
		
		/* email */   

		$wp_customize->add_setting( 'zerif_email', array(
            'default'        => '<a href="mailto:friends@themeisle.com">friends@themeisle.com</a>',
        ) );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_email', array(
            'label'   => __( 'Email', 'zoocommerce' ),
            'section' => 'zerif_footer_section',
            'settings'   => 'zerif_email',
            'priority' => 3
        )) );
		
		
		

		/* phone number - ICON */
		$wp_customize->add_setting( 'zerif_phone_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/icon-contact.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(

				'label'    => __( 'Phone number section - icon', 'zoocommerce' ),

				'section'  => 'zerif_footer_section',

				'settings' => 'zerif_phone_icon',

				'priority'    => 4,

		)));
		
		

		/* phone number */
		
		$wp_customize->add_setting( 'zerif_phone', array(
            'default'        => '<a href="tel:0 332 548 954">0 332 548 954</a>',
        ) );
        $wp_customize->add_control(new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_phone', array(
            'label'   => __( 'Phone number', 'zoocommerce' ),
            'section' => 'zerif_footer_section',
            'settings'   => 'zerif_phone',
            'priority' => 5
        )) );
		
		

		/* address - ICON */
		$wp_customize->add_setting( 'zerif_address_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/icon-location.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(

				'label'    => __( 'Address section - icon', 'zoocommerce' ),

				'section'  => 'zerif_footer_section',

				'settings' => 'zerif_address_icon',

				'priority'    => 6,

		)));
		

		/* address */
		
		$wp_customize->add_setting( 'zerif_address', array(
            'default'        => __('San Francisco - Address - 128 California Street 3200.','zerif-lite'),
        ) );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_address', array(
            'label'   => __( 'Address', 'zoocommerce' ),
            'section' => 'zerif_footer_section',
            'settings'   => 'zerif_address',
            'priority' => 7
        )) ) ;
		
		
		/* Social Options */
		$wp_customize->add_section( 'zerif_general_socials_section' , array(

				'title'       => __( 'Socials options', 'zoocommerce' ),

				'priority'    => 3,

				'panel' => 'panel_10'
		));	

		/* facebook */	

		$wp_customize->add_setting( 'zerif_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_facebook', array(

				'label'    => __( 'Facebook link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_facebook',

				'priority'    => 1,

		));

		

		/* twitter */

		$wp_customize->add_setting( 'zerif_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_twitter', array(

				'label'    => __( 'Twitter link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_twitter',

				'priority'    => 2,

		));

		

		/* linkedin */

		$wp_customize->add_setting( 'zerif_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_linkedin', array(

				'label'    => __( 'Linkedin link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_linkedin',

				'priority'    => 3,

		));

		

		/* behance */

		$wp_customize->add_setting( 'zerif_socials_behance', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_behance', array(

				'label'    => __( 'Behance link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_behance',

				'priority'    => 4,

		));

		

		/* dribbble */

		$wp_customize->add_setting( 'zerif_socials_dribbble', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_dribbble', array(

				'label'    => __( 'Dribbble link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_dribbble',

				'priority'    => 5,

		));
		
		/* Google+ */

		$wp_customize->add_setting( 'zerif_socials_googleplus', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_googleplus', array(

				'label'    => __( 'Google+ link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_googleplus',

				'priority'    => 6,

		));
		
		/* Pinterest */

		$wp_customize->add_setting( 'zerif_socials_pinterest', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_pinterest', array(

				'label'    => __( 'Pinterest link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_pinterest',

				'priority'    => 7,

		));
		
		/* Tumblr */

		$wp_customize->add_setting( 'zerif_socials_tumblr', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_tumblr', array(

				'label'    => __( 'Tumblr link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_tumblr',

				'priority'    => 8,

		));
		
		/* Reddit */

		$wp_customize->add_setting( 'zerif_socials_reddit', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_reddit', array(

				'label'    => __( 'Reddit link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_reddit',

				'priority'    => 9,

		));
		
		/* Youtube */

		$wp_customize->add_setting( 'zerif_socials_youtube', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_youtube', array(

				'label'    => __( 'Youtube link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_youtube',

				'priority'    => 10,

		));
		
		/* ABOUT US CLIENTS */
		
		$wp_customize->add_section( 'zerif_aboutus_clients_section' , array(
				'title'       => __( 'Clients area', 'zoocommerce' ),
				'priority'    => 4,
				'panel' => 'panel_10'
		));
		
		$wp_customize->add_setting( 'zerif_aboutus_clients_section' );
	
		$wp_customize->add_control( new Zerif_Clients_Widgets( $wp_customize, 'zerif_aboutus_clients_section',
			array(
				'section' => 'zerif_aboutus_clients_section',
		   )
		));
		
		/* ABOUT US CLIENTS TITLE */
		
		$wp_customize->add_section( 'zerif_aboutus_clients_title_section' , array(
				'title'       => __( 'Clients area title', 'zoocommerce' ),
				'priority'    => 5,
				
				'panel' => 'panel_10'
		));
		
		$wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('SHOWCASE YOUR CLIENTS HERE','zoocommerce')));

		$wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
				'label'    => __( 'Title', 'zoocommerce' ),
				'description' => __('This title appears only if you have widgets in the About us sidebar.','zoocommerce'),
				'section'  => 'zerif_aboutus_clients_title_section',
				'settings' => 'zerif_aboutus_clients_title_text',
				'priority'    => 1,
		));
		
		$wp_customize->get_setting( 'zerif_aboutus_clients_title_text' )->transport = 'postMessage';
		
	

	else:
		$wp_customize->add_section( 'zerif_general_section' , array(

				'title'       => __( 'General options', 'zoocommerce' ),

				'priority'    => 31,

				'description' => __('Zerif theme general options','zoocommerce'),

		));
		
		/* LOGO	*/

		$wp_customize->add_setting( 'zerif_logo');			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(

				'label'    => __( 'Logo', 'zoocommerce' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_logo',

				'priority'    => 1,

		)));

		

		/* COPYRIGHT */		   

		$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));			

		$wp_customize->add_control( 'zerif_copyright', array(

				'label'    => __( 'Copyright', 'zoocommerce' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_copyright',

				'priority'    => 2,

		));
		
		/* Google analytics */
		
		$wp_customize->add_setting( 'zerif_google_anaytics' );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_google_anaytics', array(
            'label'   => __( 'Google analytics code', 'zoocommerce' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_google_anaytics',
            'priority' => 3
        )) ) ;
		
		/* Disable preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader');
		$wp_customize->add_control(
			'zerif_disable_preloader',
			array(
				'type' => 'checkbox',
				'label' => __('Disable preloader?','zoocommerce'),
				'section' => 'zerif_general_section',
				'priority'    => 4,
			)
		);

		/* Disable smooth scroll */
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));
		$wp_customize->add_control(
				'zerif_disable_smooth_scroll',
				array(
					'type' 		=> 'checkbox',
					'label' 	=> __('Disable smooth scroll?','zerif-lite'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 3,
				)
		);

		$wp_customize->add_setting(
			'zerif_html_note'
		);
		
		$wp_customize->add_control( new Zerif_Html_Support( $wp_customize, 'zerif_html_note',
			array(
				'section' => 'zerif_footer_section',
				'priority' => 5
		   )
		));
		
		/* email - ICON */
		$wp_customize->add_setting( 'zerif_email_icon', array('default' => get_template_directory_uri().'/assets/images/envelope4-green.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(

				'label'    => __( 'Email section - icon', 'zoocommerce' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_email_icon',

				'priority'    => 6,

		)));
		
		
		/* email */   

		$wp_customize->add_setting( 'zerif_email', array(
            'default'        => __('Company email','zoocommerce'),
        ) );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_email', array(
            'label'   => __( 'Email', 'zoocommerce' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_email',
            'priority' => 7
        )) );

		/* phone number - ICON */
		$wp_customize->add_setting( 'zerif_phone_icon', array('default' => get_template_directory_uri().'/assets/images/telephone65-blue.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(

				'label'    => __( 'Phone number section - icon', 'zoocommerce' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_phone_icon',

				'priority'    => 8,

		)));

		/* phone number */
		
		$wp_customize->add_setting( 'zerif_phone', array(
            'default'        => __('Phone number','zoocommerce'),
        ) );
        $wp_customize->add_control(new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_phone', array(
            'label'   => __( 'Phone number', 'zoocommerce' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_phone',
            'priority' =>9
        )) );

		/* address - ICON */
		$wp_customize->add_setting( 'zerif_address_icon', array('default' => get_template_directory_uri().'/assets/images/map25-redish.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(

				'label'    => __( 'Address section - icon', 'zoocommerce' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_address_icon',

				'priority'    => 10,

		)));

		/* address */
		
		$wp_customize->add_setting( 'zerif_address', array(
            'default'        => __('Company address','zoocommerce'),
        ) );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_address', array(
            'label'   => __( 'Address', 'zoocommerce' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_address',
            'priority' => 11
        )) ) ;
		
		$wp_customize->add_section( 'zerif_general_socials_section' , array(

				'title'       => __( 'Socials options', 'zoocommerce' ),

				'priority'    => 40
		));	
		
		/* facebook */	

		$wp_customize->add_setting( 'zerif_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_facebook', array(

				'label'    => __( 'Facebook link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_facebook',

				'priority'    => 1,

		));

		

		/* twitter */

		$wp_customize->add_setting( 'zerif_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_twitter', array(

				'label'    => __( 'Twitter link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_twitter',

				'priority'    => 2,

		));

		

		/* linkedin */

		$wp_customize->add_setting( 'zerif_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_linkedin', array(

				'label'    => __( 'Linkedin link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_linkedin',

				'priority'    => 3,

		));

		

		/* behance */

		$wp_customize->add_setting( 'zerif_socials_behance', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_behance', array(

				'label'    => __( 'Behance link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_behance',

				'priority'    => 4,

		));

		

		/* dribbble */

		$wp_customize->add_setting( 'zerif_socials_dribbble', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_dribbble', array(

				'label'    => __( 'Dribbble link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_dribbble',

				'priority'    => 5,

		));
		
		/* Google+ */
		
		$wp_customize->add_setting( 'zerif_socials_googleplus', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_googleplus', array(

				'label'    => __( 'Google+ link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_googleplus',

				'priority'    => 6,

		));
		
		/* Pinterest */

		$wp_customize->add_setting( 'zerif_socials_pinterest', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_pinterest', array(

				'label'    => __( 'Pinterest link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_pinterest',

				'priority'    => 7,

		));
		
		/* Tumblr */

		$wp_customize->add_setting( 'zerif_socials_tumblr', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_tumblr', array(

				'label'    => __( 'Tumblr link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_tumblr',

				'priority'    => 8,

		));
		
		
		/* Reddit */

		$wp_customize->add_setting( 'zerif_socials_reddit', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_reddit', array(

				'label'    => __( 'Reddit link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_reddit',

				'priority'    => 9,

		));
		
		/* Youtube */

		$wp_customize->add_setting( 'zerif_socials_youtube', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_youtube', array(

				'label'    => __( 'Youtube link', 'zoocommerce' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_youtube',

				'priority'    => 10,

		));
		
		/* Clients */
		
		$wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('SHOWCASE YOUR CLIENTS HERE','zoocommerce')));

		$wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
				'label'    => __( 'Clients widgets area title', 'zoocommerce' ),
				'description' => __('This title appears only if you have widgets in the About us sidebar.','zoocommerce'),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_clients_title_text',
				'priority'    => 20,
		));	

		
	endif;
	
	
}

add_action( 'customize_register', 'wp_themeisle_customize_register' );



/**

 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.

 */

function wp_themeisle_customize_preview_js() {

	wp_enqueue_script( 'wp_themeisle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}

add_action( 'customize_preview_init', 'wp_themeisle_customize_preview_js' );



function zerif_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}



function zerif_sanitize_number( $input ) {

    return force_balance_tags( $input );

}



function zerif_registers() {
    wp_enqueue_script( 'zerif_jquery_ui', '//code.jquery.com/ui/1.10.4/jquery-ui.js', array("jquery"), '20120206', true  );
	wp_enqueue_style( 'zerif_jquery_ui_css', '//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css');	
	wp_enqueue_script( 'zerif_customizer_script', get_template_directory_uri() . '/js/zerif_customizer.js', array("jquery","zerif_jquery_ui"), '20120206', true  );
	wp_enqueue_style( 'zoocommerce_customizer_style', get_stylesheet_directory_uri() . '/assets/css/admin-style.css');
}

add_action( 'customize_controls_enqueue_scripts', 'zerif_registers' );
