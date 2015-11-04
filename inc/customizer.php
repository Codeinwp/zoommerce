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
require_once ( 'class/parallax_one_general_control.php');

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
$wp_customize->add_control( new Parallax_One_General_Repeater( $wp_customize, 'customizer_shop_cats', array(
	'label'   => esc_html__('Add new shop category','parallax-one'),
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





$wp_customize->add_section( 'home_latest_products' , array(
	'title'		=> __( 'Home latest products', 'zoocommerce' ),
	'priority'	=> 31
) );

$wp_customize->add_setting( 'latest_products_wide_image', array('default' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/e666bd30685839.562e97f59fde8.jpg'));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'latest_products_wide_image', array(
		'label'    => __( 'Latest Products Large Image', 'zoocommerce' ),
		'section'  => 'home_latest_products',
		'settings' => 'latest_products_wide_image',
		'priority'    => 1,
)));

$wp_customize->add_setting( 'latest_products_count', array('sanitize_callback' => 'zerif_sanitize_number','default' => 3));
$wp_customize->add_control( 'latest_products_count', array(
		'label'    => __( 'Right products count', 'zoocommerce' ),
		'section'  => 'home_latest_products',
		'settings' => 'latest_products_count',
		'priority'    => 2,
));

$wp_customize->add_setting( 'latest_products_count_wide', array('sanitize_callback' => 'zerif_sanitize_number','default' => 6));
$wp_customize->add_control( 'latest_products_count_wide', array(
		'label'    => __( 'Wide products count ( no right image )', 'zoocommerce' ),
		'section'  => 'home_latest_products',
		'settings' => 'latest_products_count_wide',
		'priority'    => 2,
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
			'title' => __( 'Colors', 'zerif' )
		) );
		
		/* COLORS HOMEPAGE */
		
		$wp_customize->add_section( 'zerif_hp_color_section' , array(
				'title'       => __( 'Homepage sections', 'zerif' ),
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
				'title'       => __( 'Footer colors', 'zerif' ),
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
					'label'      => __( 'Footer background color', 'zerif' ),
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
					'label'      => __( 'Footer text color', 'zerif' ),
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
					'label'      => __( 'Footer social icons color', 'zerif' ),
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
					'label'      => __( 'Footer socials icons color - hover', 'zerif' ),
					'section'    => 'zerif_footer_color_section',
					'settings'   => 'zerif_footer_socials_hover',
					'priority'   => 5
				)
			)
		);
		
		/* COLORS FOOTER */
		
		$wp_customize->add_section( 'zerif_general_color_section' , array(
				'title'       => __( 'General colors', 'zerif' ),
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
					'label'      => __( 'Background color', 'zerif' ),
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
					'label'      => __( 'Navbar background color', 'zerif' ),
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
					'label'      => __( 'Titles color', 'zerif' ),
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
					'label'      => __( 'Titles bottom border color', 'zerif' ),
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
					'label'      => __( 'Text color', 'zerif' ),
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
					'label'      => __( 'Links color', 'zerif' ),
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
					'label'      => __( 'Links color hover', 'zerif' ),
					'section'    => 'zerif_general_color_section',
					'settings'   => 'zerif_links_color_hover',
					'priority'   => 7
				)
			)
		);
		
		/* COLORS BUTTONS */
		
		$wp_customize->add_section( 'zerif_buttons_color_section' , array(
				'title'       => __( 'Buttons colors', 'zerif' ),
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
					'label'      => __( 'Buttons background color', 'zerif' ),
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
					'label'      => __( 'Buttons background color - hover', 'zerif' ),
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
					'label'      => __( 'Buttons text color', 'zerif' ),
					'section'    => 'zerif_buttons_color_section',
					'settings'   => 'zerif_buttons_text_color',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_buttons_text_color' )->transport = 'postMessage';
		
	else: /* Older versions of WordPress */
	
		$wp_customize->add_section( 'zerif_color_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 30,
				'description' => __('Zerif theme colors','zerif'),
		));
		
		/* zerif_footer_background */
		$wp_customize->add_setting( 'zerif_footer_background', array( 'default' => '#2d2d2d' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_background',
				array(
					'label'      => __( 'Footer background color', 'zerif' ),
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
					'label'      => __( 'Footer socials background color', 'zerif' ),
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
					'label'      => __( 'Footer text color', 'zerif' ),
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
					'label'      => __( 'Footer social icons color', 'zerif' ),
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
					'label'      => __( 'Footer socials icons color - hover', 'zerif' ),
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
					'label'      => __( 'Background color', 'zerif' ),
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
					'label'      => __( 'Navbar background color', 'zerif' ),
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
					'label'      => __( 'Titles color', 'zerif' ),
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
					'label'      => __( 'Titles bottom border color', 'zerif' ),
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
					'label'      => __( 'Text color', 'zerif' ),
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
					'label'      => __( 'Links color', 'zerif' ),
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
					'label'      => __( 'Links color hover', 'zerif' ),
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
					'label'      => __( 'Buttons background color', 'zerif' ),
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
					'label'      => __( 'Buttons background color - hover', 'zerif' ),
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
					'label'      => __( 'Buttons text color', 'zerif' ),
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
					'title'       => __( 'Login Menu', 'zerif' ),
					'priority'    => 2,
					'panel' => 'nav_menus'
			));
			
			/* My Account Icon */
			$wp_customize->add_setting( 'myaccount_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-profile.png'));			
	
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'myaccount_icon', array(
	
					'label'    => __( 'My Account - Icon', 'zerif' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'myaccount_icon',	
					'priority'    => 1,
	
			)));
			
			/* My Account Link */  	
			$wp_customize->add_setting( 'myaccount_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

			$wp_customize->add_control( 'zerif_myaccount_link', array(
	
					'label'    => __( 'My Account link', 'zerif' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'myaccount_link',	
					'priority'    => 2,
	
			));
			
			
			/* My Cart Icon */
			$wp_customize->add_setting( 'cart_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-cart.png'));			
	
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cart_icon', array(
	
					'label'    => __( 'Cart - Icon', 'zerif' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'cart_icon',	
					'priority'    => 3,
	
			)));
			
			/* My Cart Link */  	
			$wp_customize->add_setting( 'cart_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

			$wp_customize->add_control( 'zerif_cart_link', array(
	
					'label'    => __( 'Cart link', 'zerif' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'cart_link',	
					'priority'    => 4,
	
			));
			
	else:
			$wp_customize->add_section( 'woocommerce_menu_section' , array(
					'title'       => __( 'Login Menu', 'zerif' ),
					'priority'    => 2,
					'panel' => 'nav_menus'
			));
			
			/* My Account Icon */
			$wp_customize->add_setting( 'myaccount_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-profile.png'));			
	
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'myaccount_icon', array(
	
					'label'    => __( 'My Account - Icon', 'zerif' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'myaccount_icon',	
					'priority'    => 1,
	
			)));
			
			/* My Account Link */  	
			$wp_customize->add_setting( 'myaccount_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

			$wp_customize->add_control( 'zerif_myaccount_link', array(
	
					'label'    => __( 'My Account link', 'zerif' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'myaccount_link',	
					'priority'    => 2,
	
			));
			
			
			/* My Cart Icon */
			$wp_customize->add_setting( 'cart_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/menu-cart.png'));			
	
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'cart_icon', array(
	
					'label'    => __( 'Cart - Icon', 'zerif' ),	
					'section'  => 'woocommerce_menu_section',	
					'settings' => 'cart_icon',	
					'priority'    => 3,
	
			)));
			
			/* My Cart Link */  	
			$wp_customize->add_setting( 'cart_link', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

			$wp_customize->add_control( 'zerif_cart_link', array(
	
					'label'    => __( 'Cart link', 'zerif' ),	
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
			'title' => __( 'Big Banner section', 'zerif' )
		) );
		
		/* BIG TITLE CONTENT ------------------------------------------------------*/
		
		$wp_customize->add_section( 'zerif_bigtitle_texts_section' , array(
				'title'       => __( 'Content', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_3'
		));

		/* zerif_bigtitle_title */
		$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('To add a title here please go to Customizer, "Big banner section"','zerif')));

		$wp_customize->add_control( 'zerif_bigtitle_title', array(
				'label'    => __( 'Big Banner Heading', 'zerif' ),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_title',
				'priority'    => 2,

		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_title' )->transport = 'postMessage';
		
		/* zerif_bigtitle_small_heading */
		$wp_customize->add_setting( 'zerif_bigtitle_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add Sub Title','zerif')));

		$wp_customize->add_control( 'zerif_bigtitle_subtitle', array(
				'label'    => __( 'Big Banner Sub Heading', 'zerif' ),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_subtitle',
				'priority'    => 3,

		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_title' )->transport = 'postMessage';

		/* zerif_bigtitle_button_label */
		$wp_customize->add_setting( 'zerif_bigtitle_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Shop Now','zerif')));			

		$wp_customize->add_control( 'zerif_bigtitle_button_label', array(
				'label'    => __( 'Button label', 'zerif' ),
				'description' => __('This is the text that will appear on the button','zerif'),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_button_label',
				'priority'    => 4,

		));

		$wp_customize->get_setting( 'zerif_bigtitle_button_label' )->transport = 'postMessage';
		
		/* zerif_bigtitle_button_url */
		$wp_customize->add_setting( 'zerif_bigtitle_button_url', array('sanitize_callback' => 'esc_url','default' => '#'));

		$wp_customize->add_control( 'zerif_bigtitle_button_url', array(
				'label'    => __( 'Button link', 'zerif' ),
				'description' => __('The button is linked to this URL','zerif'),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_button_url',
				'priority'    => 5,
		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_button_url' )->transport = 'postMessage';
		
		
		
		/* BIG TITLE COLORS --------------------------------------------------------------------*/
		
		$wp_customize->add_section( 'zerif_bigtitle_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
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
					'label'    => __( 'Background color', 'zerif' ),
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
					'label'      => __( 'Big title color', 'zerif' ),
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
					'label'      => __( 'Sub title color', 'zerif' ),
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
					'label'      => __( 'Button background color', 'zerif' ),
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
					'label'      => __( 'Button text color', 'zerif' ),
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
					'label'      => __( 'Button Border color', 'zerif' ),
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
				'title'       	=> __( 'Background Image', 'zerif' ),
				'priority'    	=> 4,
				'panel'			=> 'panel_3',
			)
		);

		
		$wp_customize->add_setting(	'zerif_background_image' );
		
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_background_image',
				array(
					'label'    => __( 'Background Image', 'zerif' ),
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
					'top' 		=> __('Top','zerif'),
					'center'	=> __('Center','zerif'),
					'bottom' 	=> __('Bottom','zerif'),
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
					'left' 		=> __('Left','zerif'),
					'center'	=> __('Center','zerif'),
					'right' 	=> __('Right','zerif'),
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
					'cover' 	=> __('Cover','zerif'),
					'width' 	=> __('width 100%','zerif'),
					'height'	=> __('Height 100%','zerif'),
				),
				'priority' 	=> 4,
			)
		);

		

	else: /* Old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_bigtitle_section' , array(
			'title'       => __( 'Big Banner section', 'zerif' ),
			'priority'    => 32
		));
			
			
		/* zerif_bigtitle_title */
		$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('To add a title here please go to Customizer, "Big banner section"','zerif')));

		$wp_customize->add_control( 'zerif_bigtitle_title', array(
				'label'    => __( 'Big Heading', 'zerif' ),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_title',
				'priority'    => 2,
		));

		/* zerif_bigtitle_small_heading */
		$wp_customize->add_setting( 'zerif_bigtitle_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add Sub Title','zerif')));

		$wp_customize->add_control( 'zerif_bigtitle_subtitle', array(
				'label'    => __( 'Big Banner Sub Heading', 'zerif' ),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_subtitle',
				'priority'    => 3,

		));
		
		
		/* zerif_bigtitle_button_label */
		$wp_customize->add_setting( 'zerif_bigtitle_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Shop','zerif')));			

		$wp_customize->add_control( 'zerif_bigtitle_button_label', array(
				'label'    => __( 'Button label', 'zerif' ),
				'description' => __('This is the text that will appear on the button','zerif'),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_button_label',
				'priority'    => 4,

		));

				
		/* zerif_bigtitle_button_url */
		$wp_customize->add_setting( 'zerif_bigtitle_button_url', array('sanitize_callback' => 'esc_url','default' => '#'));

		$wp_customize->add_control( 'zerif_bigtitle_button_url', array(
				'label'    => __( 'Button link', 'zerif' ),
				'description' => __('The button is linked to this URL','zerif'),
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
					'label'    => __( 'Background color', 'zerif' ),
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
					'label'      => __( 'Big title color', 'zerif' ),
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
					'label'      => __( 'Sub title color', 'zerif' ),
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
					'label'      => __( 'Button background color', 'zerif' ),
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
					'label'      => __( 'Button background color - hover', 'zerif' ),
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
					'label'      => __( 'Button text color', 'zerif' ),
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
				'label'    	=> __( 'Parallax image 1', 'zerif' ),
				'section'  	=> 'zerif_bigtitle_section',
				'settings' 	=> 'zerif_parallax_img1',
				'priority'	=> 15,
		)));

		/* IMAGE 2 */
		$wp_customize->add_setting( 'zerif_parallax_img2', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/assets/images/background2.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
				'label'    	=> __( 'Parallax image 2', 'zerif' ),
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
			'title' => __( 'Footer', 'zerif' )
		) );
		
		
		$wp_customize->add_section( 'zerif_footer_general_section' , array(
				'title'       => __( 'General options', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_10'
		));		
		

		/* zerif_copyright */
		$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_copyright', array(
				'label'    => __( 'Footer Copyright', 'zerif' ),
				'section'  => 'zerif_footer_general_section',
				'settings' => 'zerif_copyright',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_copyright' )->transport = 'postMessage';
		
		/* zerif_google_anaytics */
		$wp_customize->add_setting( 'zerif_google_anaytics' );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_google_anaytics', array(
            'label'   => __( 'Google analytics code', 'zerif' ),
            'section' => 'zerif_footer_general_section',
            'settings'   => 'zerif_google_anaytics',
            'priority' => 4
        )) ) ;
		
		$wp_customize->add_section( 'zerif_footer_section' , array(

				'title'       => __( 'Footer sections', 'zerif' ),

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

				'label'    => __( 'Email section - icon', 'zerif' ),

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
            'label'   => __( 'Email', 'zerif' ),
            'section' => 'zerif_footer_section',
            'settings'   => 'zerif_email',
            'priority' => 3
        )) );
		
		
		

		/* phone number - ICON */
		$wp_customize->add_setting( 'zerif_phone_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/icon-contact.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(

				'label'    => __( 'Phone number section - icon', 'zerif' ),

				'section'  => 'zerif_footer_section',

				'settings' => 'zerif_phone_icon',

				'priority'    => 4,

		)));
		
		

		/* phone number */
		
		$wp_customize->add_setting( 'zerif_phone', array(
            'default'        => '<a href="tel:0 332 548 954">0 332 548 954</a>',
        ) );
        $wp_customize->add_control(new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_phone', array(
            'label'   => __( 'Phone number', 'zerif' ),
            'section' => 'zerif_footer_section',
            'settings'   => 'zerif_phone',
            'priority' => 5
        )) );
		
		

		/* address - ICON */
		$wp_customize->add_setting( 'zerif_address_icon', array('default' => get_stylesheet_directory_uri().'/assets/images/icon-location.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(

				'label'    => __( 'Address section - icon', 'zerif' ),

				'section'  => 'zerif_footer_section',

				'settings' => 'zerif_address_icon',

				'priority'    => 6,

		)));
		

		/* address */
		
		$wp_customize->add_setting( 'zerif_address', array(
            'default'        => __('San Francisco - Address - 128 California Street 3200.','zerif-lite'),
        ) );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_address', array(
            'label'   => __( 'Address', 'zerif' ),
            'section' => 'zerif_footer_section',
            'settings'   => 'zerif_address',
            'priority' => 7
        )) ) ;
		
		
		/* Social Options */
		$wp_customize->add_section( 'zerif_general_socials_section' , array(

				'title'       => __( 'Socials options', 'zerif' ),

				'priority'    => 3,

				'panel' => 'panel_10'
		));	

		/* facebook */	

		$wp_customize->add_setting( 'zerif_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_facebook', array(

				'label'    => __( 'Facebook link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_facebook',

				'priority'    => 1,

		));

		

		/* twitter */

		$wp_customize->add_setting( 'zerif_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_twitter', array(

				'label'    => __( 'Twitter link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_twitter',

				'priority'    => 2,

		));

		

		/* linkedin */

		$wp_customize->add_setting( 'zerif_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_linkedin', array(

				'label'    => __( 'Linkedin link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_linkedin',

				'priority'    => 3,

		));

		

		/* behance */

		$wp_customize->add_setting( 'zerif_socials_behance', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_behance', array(

				'label'    => __( 'Behance link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_behance',

				'priority'    => 4,

		));

		

		/* dribbble */

		$wp_customize->add_setting( 'zerif_socials_dribbble', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_dribbble', array(

				'label'    => __( 'Dribbble link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_dribbble',

				'priority'    => 5,

		));
		
		/* Google+ */

		$wp_customize->add_setting( 'zerif_socials_googleplus', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_googleplus', array(

				'label'    => __( 'Google+ link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_googleplus',

				'priority'    => 6,

		));
		
		/* Pinterest */

		$wp_customize->add_setting( 'zerif_socials_pinterest', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_pinterest', array(

				'label'    => __( 'Pinterest link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_pinterest',

				'priority'    => 7,

		));
		
		/* Tumblr */

		$wp_customize->add_setting( 'zerif_socials_tumblr', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_tumblr', array(

				'label'    => __( 'Tumblr link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_tumblr',

				'priority'    => 8,

		));
		
		/* Reddit */

		$wp_customize->add_setting( 'zerif_socials_reddit', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_reddit', array(

				'label'    => __( 'Reddit link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_reddit',

				'priority'    => 9,

		));
		
		/* Youtube */

		$wp_customize->add_setting( 'zerif_socials_youtube', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_youtube', array(

				'label'    => __( 'Youtube link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_youtube',

				'priority'    => 10,

		));
		
		/* ABOUT US CLIENTS */
		
		$wp_customize->add_section( 'zerif_aboutus_clients_section' , array(
				'title'       => __( 'Clients area', 'zerif' ),
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
				'title'       => __( 'Clients area title', 'zerif' ),
				'priority'    => 5,
				
				'panel' => 'panel_10'
		));
		
		$wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('SHOWCASE YOUR CLIENTS HERE','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
				'label'    => __( 'Title', 'zerif' ),
				'description' => __('This title appears only if you have widgets in the About us sidebar.','zerif'),
				'section'  => 'zerif_aboutus_clients_title_section',
				'settings' => 'zerif_aboutus_clients_title_text',
				'priority'    => 1,
		));
		
		$wp_customize->get_setting( 'zerif_aboutus_clients_title_text' )->transport = 'postMessage';
		
	

	else:
		$wp_customize->add_section( 'zerif_general_section' , array(

				'title'       => __( 'General options', 'zerif' ),

				'priority'    => 31,

				'description' => __('Zerif theme general options','zerif'),

		));
		
		/* LOGO	*/

		$wp_customize->add_setting( 'zerif_logo');			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(

				'label'    => __( 'Logo', 'zerif' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_logo',

				'priority'    => 1,

		)));

		

		/* COPYRIGHT */		   

		$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));			

		$wp_customize->add_control( 'zerif_copyright', array(

				'label'    => __( 'Copyright', 'zerif' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_copyright',

				'priority'    => 2,

		));
		
		/* Google analytics */
		
		$wp_customize->add_setting( 'zerif_google_anaytics' );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_google_anaytics', array(
            'label'   => __( 'Google analytics code', 'zerif' ),
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
				'label' => __('Disable preloader?','zerif'),
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

				'label'    => __( 'Email section - icon', 'zerif' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_email_icon',

				'priority'    => 6,

		)));
		
		
		/* email */   

		$wp_customize->add_setting( 'zerif_email', array(
            'default'        => __('Company email','zerif'),
        ) );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_email', array(
            'label'   => __( 'Email', 'zerif' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_email',
            'priority' => 7
        )) );

		/* phone number - ICON */
		$wp_customize->add_setting( 'zerif_phone_icon', array('default' => get_template_directory_uri().'/assets/images/telephone65-blue.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_phone_icon', array(

				'label'    => __( 'Phone number section - icon', 'zerif' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_phone_icon',

				'priority'    => 8,

		)));

		/* phone number */
		
		$wp_customize->add_setting( 'zerif_phone', array(
            'default'        => __('Phone number','zerif'),
        ) );
        $wp_customize->add_control(new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_phone', array(
            'label'   => __( 'Phone number', 'zerif' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_phone',
            'priority' =>9
        )) );

		/* address - ICON */
		$wp_customize->add_setting( 'zerif_address_icon', array('default' => get_template_directory_uri().'/assets/images/map25-redish.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_address_icon', array(

				'label'    => __( 'Address section - icon', 'zerif' ),

				'section'  => 'zerif_general_section',

				'settings' => 'zerif_address_icon',

				'priority'    => 10,

		)));

		/* address */
		
		$wp_customize->add_setting( 'zerif_address', array(
            'default'        => __('Company address','zerif'),
        ) );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_address', array(
            'label'   => __( 'Address', 'zerif' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_address',
            'priority' => 11
        )) ) ;
		
		$wp_customize->add_section( 'zerif_general_socials_section' , array(

				'title'       => __( 'Socials options', 'zerif' ),

				'priority'    => 40
		));	
		
		/* facebook */	

		$wp_customize->add_setting( 'zerif_socials_facebook', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_facebook', array(

				'label'    => __( 'Facebook link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_facebook',

				'priority'    => 1,

		));

		

		/* twitter */

		$wp_customize->add_setting( 'zerif_socials_twitter', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_twitter', array(

				'label'    => __( 'Twitter link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_twitter',

				'priority'    => 2,

		));

		

		/* linkedin */

		$wp_customize->add_setting( 'zerif_socials_linkedin', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_linkedin', array(

				'label'    => __( 'Linkedin link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_linkedin',

				'priority'    => 3,

		));

		

		/* behance */

		$wp_customize->add_setting( 'zerif_socials_behance', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_behance', array(

				'label'    => __( 'Behance link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_behance',

				'priority'    => 4,

		));

		

		/* dribbble */

		$wp_customize->add_setting( 'zerif_socials_dribbble', array('sanitize_callback' => 'esc_url_raw','default' => '#'));			

		$wp_customize->add_control( 'zerif_socials_dribbble', array(

				'label'    => __( 'Dribbble link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_dribbble',

				'priority'    => 5,

		));
		
		/* Google+ */
		
		$wp_customize->add_setting( 'zerif_socials_googleplus', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_googleplus', array(

				'label'    => __( 'Google+ link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_googleplus',

				'priority'    => 6,

		));
		
		/* Pinterest */

		$wp_customize->add_setting( 'zerif_socials_pinterest', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_pinterest', array(

				'label'    => __( 'Pinterest link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_pinterest',

				'priority'    => 7,

		));
		
		/* Tumblr */

		$wp_customize->add_setting( 'zerif_socials_tumblr', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_tumblr', array(

				'label'    => __( 'Tumblr link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_tumblr',

				'priority'    => 8,

		));
		
		
		/* Reddit */

		$wp_customize->add_setting( 'zerif_socials_reddit', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_reddit', array(

				'label'    => __( 'Reddit link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_reddit',

				'priority'    => 9,

		));
		
		/* Youtube */

		$wp_customize->add_setting( 'zerif_socials_youtube', array('sanitize_callback' => 'esc_url_raw'));			

		$wp_customize->add_control( 'zerif_socials_youtube', array(

				'label'    => __( 'Youtube link', 'zerif' ),

				'section'  => 'zerif_general_socials_section',

				'settings' => 'zerif_socials_youtube',

				'priority'    => 10,

		));
		
		/* Clients */
		
		$wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('SHOWCASE YOUR CLIENTS HERE','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
				'label'    => __( 'Clients widgets area title', 'zerif' ),
				'description' => __('This title appears only if you have widgets in the About us sidebar.','zerif'),
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
