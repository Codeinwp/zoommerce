<?php

/**

 * zerif Theme Customizer

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
        public $default = '#3FADD7';
    
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
			echo __('You can insert any HTML code in here, to create links, google maps or anything else.','zerif');
		}

	} 
	
	class Zerif_Our_Focus_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Our focus section.<br> There you must add the "Zerif - Our focus widget"','zerif');
		}
	}
	
	class Zerif_Clients_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('To add clients here please go to:<br> Customize -> Widgets -> About us section.<br> There you must add the "Zerif - Clients widget"','zerif');
		}
	}
	
	class Zerif_Our_Team_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Our team section.<br> There you must add the "Zerif - Team member widget"','zerif');
		}
	}
	
	class Zerif_Testimonials_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Testimonials section.<br> There you must add the "Zerif - Testimonial widget"','zerif');
		}
	}
	
	class Zerif_Packages_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Packages section.<br> There you must add the "Zerif - Package widget"','zerif');
		}
	}
	
	class Zerif_Subscribe_Widgets extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section is customizable in:<br> Customize -> Widgets -> Subscribe section.<br> There you must add the "SendinBlue Widget"','zerif');
		}
	}
	
	class Zerif_LatestNews extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('The main content of this section consists of blog posts.','zerif');
		}
	}
	
	class Zerif_Colors_Panel extends WP_Customize_Control
	{
		public function render_content()
		{
			echo __('To have full control over the colors on homepage sections please visit each section options in Customizer.','zerif');
		}
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	

	$wp_customize->remove_section('colors');

	
	
	
	/**********************************************/
	/*************** ORDER ************************/
	/**********************************************/
	
	if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'panel_order', array(
			'priority' => 29,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Sections order', 'zerif' )
		) );
		
		$wp_customize->add_section( 'zerif_order_section' , array(
					'title'       => __( 'Sections order', 'zerif' ),
					'priority'    => 29,
					'description' => __( 'Here is where you can rearrange the homepage sections.','zerif' ),
					'panel' => 'panel_order'
		));
	
	else:
	
		$wp_customize->add_section( 'zerif_order_section' , array(
					'title'       => __( 'Sections order', 'zerif' ),
					'description' => __( 'Here is where you can rearrange the homepage sections.','zerif' ),
					'priority'    => 29
		));
	
	endif;

	/* section 1 */	
	
	$wp_customize->add_setting( 'section1', array( 'default' => 'our_focus' ));
	 
	$wp_customize->add_control(
		'section1',
		array(
			'type' => 'select',
			'label' => '1st section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 1
		)
	);
	
	/* section 2 */	
	
	$wp_customize->add_setting( 'section2', array( 'default' => 'bottom_ribbon' ) );
	 
	$wp_customize->add_control(
		'section2',
		array(
			'type' => 'select',
			'label' => '2nd section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 2
		)
	);
	
	/* section 3 */	
	
	$wp_customize->add_setting( 'section3', array( 'default' => 'portofolio' ) );
	 
	$wp_customize->add_control(
		'section3',
		array(
			'type' => 'select',
			'label' => '3rd section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 3
		)
	);
	
	/* section 4 */	
	
	$wp_customize->add_setting( 'section4', array( 'default' => 'about_us' ) );
	 
	$wp_customize->add_control(
		'section4',
		array(
			'type' => 'select',
			'label' => '4rt section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 4
		)
	);
	
	/* section 5 */	
	
	$wp_customize->add_setting( 'section5', array( 'default' => 'our_team' ) );
	 
	$wp_customize->add_control(
		'section5',
		array(
			'type' => 'select',
			'label' => '5th section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 5
		)
	);
	
	/* section 6 */	
	
	$wp_customize->add_setting( 'section6', array( 'default' => 'testimonials' ) );
	 
	$wp_customize->add_control(
		'section6',
		array(
			'type' => 'select',
			'label' => '6th section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 6
		)
	);
	
	/* section 7 */	
	
	$wp_customize->add_setting( 'section7', array( 'default' => 'right_ribbon' ) );
	 
	$wp_customize->add_control(
		'section7',
		array(
			'type' => 'select',
			'label' => '7th section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 7
		)
	);
	
	/* section 8 */	
	
	$wp_customize->add_setting( 'section8', array( 'default' => 'contact_us' ) );
	 
	$wp_customize->add_control(
		'section8',
		array(
			'type' => 'select',
			'label' => '8th section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 8
		)
	);
	
	/* section 9 */	
	
	$wp_customize->add_setting( 'section9', array( 'default' => 'map' ) );
	 
	$wp_customize->add_control(
		'section9',
		array(
			'type' => 'select',
			'label' => '9th section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 9
		)
	);
	
	/* section 10 */	
	
	$wp_customize->add_setting( 'section10', array( 'default' => 'packages' ) );
	 
	$wp_customize->add_control(
		'section10',
		array(
			'type' => 'select',
			'label' => '10th section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 10
		)
	);
	
	/* section 11 */	
	
	$wp_customize->add_setting( 'section11', array( 'default' => 'subscribe' ) );
	 
	$wp_customize->add_control(
		'section11',
		array(
			'type' => 'select',
			'label' => '11th section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 11
		)
	);
	
	/* section 12 */	
	
	$wp_customize->add_setting( 'section12', array( 'default' => 'latest_news' ) );
	 
	$wp_customize->add_control(
		'section12',
		array(
			'type' => 'select',
			'label' => '12th section',
			'section' => 'zerif_order_section',
			'choices' => array(
				'our_focus' => __('Our focus','zerif'),
				'portofolio' => __('Portfolio','zerif'),
				'about_us' => __('About us','zerif'),
				'our_team' => __('Our team','zerif'),
				'testimonials' => __('Testimonials','zerif'),
				'bottom_ribbon' => __('Bottom ribbon','zerif'),
				'right_ribbon' => __('Right ribbon','zerif'),
				'contact_us' => __('Contact us','zerif'),
				'packages' => __('Packages','zerif'),
				'map' => __('Google map','zerif'),
				'subscribe' => __('Subscribe','zerif'),
				'latest_news' => __('Latest news','zerif')
			),
			'priority' => 12
		)
	);
	
	/***********************************************/

	/************** COLORS OPTIONS  ***************/

	/***********************************************/
	
	if ( class_exists( 'WP_Customize_Panel' ) ):
		
		$wp_customize->add_panel( 'panel_1', array(
			'priority' => 30,
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
		
		/* zerif_footer_socials_background 
		$wp_customize->add_setting( 'zerif_footer_socials_background', array( 'default' => '#2d2d2d' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_footer_socials_background',
				array(
					'label'      => __( 'Footer socials background color', 'zerif' ),
					'section'    => 'zerif_footer_color_section',
					'settings'   => 'zerif_footer_socials_background',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_footer_socials_background' )->transport = 'postMessage';*/
		
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
		$wp_customize->add_setting( 'zerif_navbar_color', array( 'default' => '#fff' ) );
		
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
		$wp_customize->add_setting( 'zerif_navbar_color', array( 'default' => '#fff' ) );
		
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

	/***********************************************/

	/************** GENERAL OPTIONS  ***************/

	/***********************************************/

	if ( class_exists( 'WP_Customize_Panel' ) ):
		
		$wp_customize->add_panel( 'panel_2', array(
			'priority' => 31,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'General options', 'zerif' )
		) );
		
		$wp_customize->add_section( 'zerif_general_section' , array(
				'title'       => __( 'General options', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_2'
		));
		
		/* zerif_disable_preloader */
		$wp_customize->add_setting( 'zerif_disable_preloader');
		$wp_customize->add_control(
			'zerif_disable_preloader',
			array(
				'type' => 'checkbox',
				'label' => __('Disable preloader?','zerif'),
				'description' => __('If you check this box, the preloader will be disabled from homepage.','zerif'),
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
					'label' 	=> __('Disable smooth scroll?','zerif-lite'),
					'description' => __('If you check this box, the smooth scroll will be disabled.','zerif'),
					'section' 	=> 'zerif_general_section',
					'priority'	=> 2,
				)
		);
		$wp_customize->add_setting( 'zerif_disable_smooth_scroll', array('sanitize_callback' => 'zerif_sanitize_text'));

		/* zerif_logo */
		$wp_customize->add_setting( 'zerif_logo');

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
				'label'    => __( 'Logo', 'zerif' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_logo',
				'priority'    => 2,
		)));
		
		$wp_customize->get_setting( 'zerif_logo' )->transport = 'postMessage';

		/* zerif_copyright */
		$wp_customize->add_setting( 'zerif_copyright', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_copyright', array(
				'label'    => __( 'Footer Copyright', 'zerif' ),
				'section'  => 'zerif_general_section',
				'settings' => 'zerif_copyright',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_copyright' )->transport = 'postMessage';
		
		/* zerif_google_anaytics */
		$wp_customize->add_setting( 'zerif_google_anaytics' );
        $wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_google_anaytics', array(
            'label'   => __( 'Google analytics code', 'zerif' ),
            'section' => 'zerif_general_section',
            'settings'   => 'zerif_google_anaytics',
            'priority' => 4
        )) ) ;
		
		$wp_customize->add_section( 'zerif_footer_section' , array(

				'title'       => __( 'Footer sections', 'zerif' ),

				'priority'    => 2,

				'panel' => 'panel_2'
		));
		
		$wp_customize->add_setting(
			'zerif_html_note'
		);
		
		$wp_customize->add_control( new Zerif_Html_Support( $wp_customize, 'zerif_html_note',
			array(
				'section' => 'zerif_footer_section',
				'priority' => '1'
		   )
		));
		
		/* email - ICON */
		$wp_customize->add_setting( 'zerif_email_icon', array('default' => get_stylesheet_directory_uri().'/images/icon-address.png'));			

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zerif_email_icon', array(

				'label'    => __( 'Email section - icon', 'zerif' ),

				'section'  => 'zerif_footer_section',

				'settings' => 'zerif_email_icon',

				'priority'    => 2,

		)));
		
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
		$wp_customize->add_setting( 'zerif_phone_icon', array('default' => get_stylesheet_directory_uri().'/images/icon-contact.png'));

			

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
		$wp_customize->add_setting( 'zerif_address_icon', array('default' => get_stylesheet_directory_uri().'/images/icon-location.png'));

			

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
		
		$wp_customize->add_section( 'zerif_general_socials_section' , array(

				'title'       => __( 'Socials options', 'zerif' ),

				'priority'    => 3,

				'panel' => 'panel_2'
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
		$wp_customize->add_setting( 'zerif_email_icon', array('default' => get_template_directory_uri().'/images/envelope4-green.png'));

			

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
		$wp_customize->add_setting( 'zerif_phone_icon', array('default' => get_template_directory_uri().'/images/telephone65-blue.png'));

			

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
		$wp_customize->add_setting( 'zerif_address_icon', array('default' => get_template_directory_uri().'/images/map25-redish.png'));

			

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

		
	endif;

	    

	

	

	



	/*****************************************************/

    /**************	BIG TITLE SECTION *******************/

	/****************************************************/

	
	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_3', array(
			'priority' => 32,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Big title section', 'zerif' )
		) );
		
		/* BIG TITLE SETTINGS */
		
		$wp_customize->add_section( 'zerif_bigtitle_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_3'
		));
		
		/* zerif_bigtitle_show */  
		$wp_customize->add_setting( 'zerif_bigtitle_show');

		$wp_customize->add_control(
			'zerif_bigtitle_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide big title section?','zerif'),
				'description' => __('If you check this box, the Big title section will disappear from homepage.','zerif'),
				'section' => 'zerif_bigtitle_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_show' )->transport = 'postMessage';
		
		/* BIG TITLE CONTENT */
		
		$wp_customize->add_section( 'zerif_bigtitle_texts_section' , array(
				'title'       => __( 'Content', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_3'
		));

		/* zerif_bigtitle_title */
		$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('To add a title here please go to Customizer, "Big title section"','zerif')));

		$wp_customize->add_control( 'zerif_bigtitle_title', array(
				'label'    => __( 'Big title', 'zerif' ),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_title',
				'priority'    => 2,

		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_title' )->transport = 'postMessage';

		/* zerif_bigtitle_redbutton_label */
		$wp_customize->add_setting( 'zerif_bigtitle_redbutton_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('One button','zerif')));			

		$wp_customize->add_control( 'zerif_bigtitle_redbutton_label', array(
				'label'    => __( 'First button label', 'zerif' ),
				'description' => __('This is the text that will appear on the first button','zerif'),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_redbutton_label',
				'priority'    => 3,

		));

		$wp_customize->get_setting( 'zerif_bigtitle_redbutton_label' )->transport = 'postMessage';
		
		/* zerif_bigtitle_redbutton_url */
		$wp_customize->add_setting( 'zerif_bigtitle_redbutton_url', array('sanitize_callback' => 'esc_url','default' => '#'));

		$wp_customize->add_control( 'zerif_bigtitle_redbutton_url', array(
				'label'    => __( 'First button link', 'zerif' ),
				'description' => __('The first button is linked to this URL','zerif'),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_redbutton_url',
				'priority'    => 4,
		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_redbutton_url' )->transport = 'postMessage';
		
		/* zerif_bigtitle_greenbutton_label */
		$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Another button','zerif')));

		$wp_customize->add_control( 'zerif_bigtitle_greenbutton_label', array(
				'label'    => __( 'Second button label', 'zerif' ),
				'description' => __('This is the text that will appear on the second button','zerif'),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_greenbutton_label',
				'priority'    => 5,
		));	
		
		$wp_customize->get_setting( 'zerif_bigtitle_greenbutton_label' )->transport = 'postMessage';
		
		/* zerif_bigtitle_greenbutton_url */
		$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_url', array('sanitize_callback' => 'esc_url','default' => '#'));			

		$wp_customize->add_control( 'zerif_bigtitle_greenbutton_url', array(
				'label'    => __( 'Second button link', 'zerif' ),
				'description' => __('The second button is linked to this URL','zerif'),
				'section'  => 'zerif_bigtitle_texts_section',
				'settings' => 'zerif_bigtitle_greenbutton_url',
				'priority'    => 6,
		));
		
		$wp_customize->get_setting( 'zerif_bigtitle_greenbutton_url' )->transport = 'postMessage';
		
		/* BIG TITLE COLORS */
		
		$wp_customize->add_section( 'zerif_bigtitle_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_3'
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
		
		/* zerif_bigtitle_1button_background_color */
		$wp_customize->add_setting( 'zerif_bigtitle_1button_background_color', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_1button_background_color',
				array(
					'label'      => __( 'First button background color', 'zerif' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_1button_background_color',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_1button_background_color' )->transport = 'postMessage';
		
		/* zerif_bigtitle_1button_background_color_hover */
		$wp_customize->add_setting( 'zerif_bigtitle_1button_background_color_hover', array( 'default' => '#cb4332' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_1button_background_color_hover',
				array(
					'label'      => __( 'First button background color - hover', 'zerif' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_1button_background_color_hover',
					'priority'   => 4
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_1button_background_color_hover' )->transport = 'postMessage';
		
		/* zerif_bigtitle_1button_color */
		$wp_customize->add_setting( 'zerif_bigtitle_1button_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_1button_color',
				array(
					'label'      => __( 'First button text color', 'zerif' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_1button_color',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_1button_color' )->transport = 'postMessage';
		
		/* zerif_bigtitle_2button_background_color */
		$wp_customize->add_setting( 'zerif_bigtitle_2button_background_color', array( 'default' => '#20AA73' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_2button_background_color',
				array(
					'label'      => __( 'Second button background color', 'zerif' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_2button_background_color',
					'priority'   => 6
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_2button_background_color' )->transport = 'postMessage';
		
		/* zerif_bigtitle_2button_background_color_hover */
		$wp_customize->add_setting( 'zerif_bigtitle_2button_background_color_hover', array( 'default' => '#069059' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_2button_background_color_hover',
				array(
					'label'      => __( 'Second button background color - hover', 'zerif' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_2button_background_color_hover',
					'priority'   => 7
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_2button_background_color_hover' )->transport = 'postMessage';
		
		/* zerif_bigtitle_2button_color */
		$wp_customize->add_setting( 'zerif_bigtitle_2button_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_bigtitle_2button_color',
				array(
					'label'      => __( 'Second button text color', 'zerif' ),
					'section'    => 'zerif_bigtitle_colors_section',
					'settings'   => 'zerif_bigtitle_2button_color',
					'priority'   => 8
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_bigtitle_2button_color' )->transport = 'postMessage';
		

		/* BIG TITLE PARALLAX */
		$wp_customize->add_section( 'zerif_bigtitle_parallax_section' , array(
				'title'		=> __( 'Parallax effect', 'zerif' ),
				'priority'	=> 4,
				'panel' 	=> 'panel_3'
		));
		/* show/hide  parallax */
		$wp_customize->add_setting( 'zerif_parallax_show', array('sanitize_callback' => 'zerif_sanitize_text'));
	    $wp_customize->add_control(
			'zerif_parallax_show',
			array(
				'type' 		=> 'checkbox',
				'label' 	=> __('Use parallax effect?','zerif-lite'),
				'section' 	=> 'zerif_bigtitle_parallax_section',
				'priority'	=> 1,
			)
		);
		/* IMAGE 1*/
		$wp_customize->add_setting( 'zerif_parallax_img1', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/background1.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
				'label'    	=> __( 'Image 1', 'zerif' ),
				'section'  	=> 'zerif_bigtitle_parallax_section',
				'settings' 	=> 'zerif_parallax_img1',
				'priority'	=> 1,
		)));
		/* IMAGE 2 */
		$wp_customize->add_setting( 'zerif_parallax_img2', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/background2.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
				'label'    	=> __( 'Image 2', 'zerif' ),
				'section'  	=> 'zerif_bigtitle_parallax_section',
				'settings' 	=> 'zerif_parallax_img2',
				'priority'	=> 2,
		)));


	else: /* Old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_bigtitle_section' , array(
			'title'       => __( 'Big title section', 'zerif' ),
			'priority'    => 32
		));
			
		/* zerif_bigtitle_show */   
		$wp_customize->add_setting( 'zerif_bigtitle_show');
		
		$wp_customize->add_control(
			'zerif_bigtitle_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide big title section?','zerif'),
				'description' => __('If you check this box, the Big title section will disappear from homepage.','zerif'),
				'section' => 'zerif_bigtitle_section',
				'priority'    => 1,
			)
		);
			
		/* zerif_bigtitle_title */
		$wp_customize->add_setting( 'zerif_bigtitle_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('To add a title here please go to Customizer, "Big title section"','zerif')));

		$wp_customize->add_control( 'zerif_bigtitle_title', array(
				'label'    => __( 'Big title', 'zerif' ),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_title',
				'priority'    => 2,
		));

		/* zerif_bigtitle_redbutton_label */
		$wp_customize->add_setting( 'zerif_bigtitle_redbutton_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('One button','zerif')));
	
		$wp_customize->add_control( 'zerif_bigtitle_redbutton_label', array(
				'label'    => __( 'First button label', 'zerif' ),
				'description' => __('This is the text that will appear on the first button','zerif'),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_redbutton_label',
				'priority'    => 3,
		));

		/* zerif_bigtitle_redbutton_url */
		$wp_customize->add_setting( 'zerif_bigtitle_redbutton_url', array('sanitize_callback' => 'esc_url_raw','default' => '#'));

		$wp_customize->add_control( 'zerif_bigtitle_redbutton_url', array(
				'label'    => __( 'First button link', 'zerif' ),
				'description' => __('The first button is linked to this URL','zerif'),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_redbutton_url',
				'priority'    => 4,
		));

		/* zerif_bigtitle_greenbutton_label */
		$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Another button','zerif')));

		$wp_customize->add_control( 'zerif_bigtitle_greenbutton_label', array(
				'label'    => __( 'Second button label', 'zerif' ),
				'description' => __('This is the text that will appear on the second button','zerif'),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_greenbutton_label',
				'priority'    => 5,
		));	

		/* zerif_bigtitle_greenbutton_url */
		$wp_customize->add_setting( 'zerif_bigtitle_greenbutton_url', array('sanitize_callback' => 'esc_url_raw','#'));

		$wp_customize->add_control( 'zerif_bigtitle_greenbutton_url', array(
				'label'    => __( 'Second button link', 'zerif' ),
				'description' => __('The second button is linked to this URL','zerif'),
				'section'  => 'zerif_bigtitle_section',
				'settings' => 'zerif_bigtitle_greenbutton_url',
				'priority'    => 6,
		));

		/* zerif_bigtitle_background */
		$wp_customize->add_setting( 'zerif_bigtitle_background', array( 'default' => 'rgba(0, 0, 0, 0.5)' ) );
			 
		$wp_customize->add_control(
				new Zerif_Customize_Alpha_Color_Control(
					$wp_customize,
					'zerif_bigtitle_background',
					array(
						'label'    => __( 'Background color', 'zerif' ),
						'palette' => true,
						'section'  => 'zerif_bigtitle_section',
						'priority'   => 7
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
						'section'    => 'zerif_bigtitle_section',
						'settings'   => 'zerif_bigtitle_header_color',
						'priority'   => 8
					)
				)
		);
			
		/* zerif_bigtitle_1button_background_color */	
		$wp_customize->add_setting( 'zerif_bigtitle_1button_background_color', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_bigtitle_1button_background_color',
					array(
						'label'      => __( 'First button background color', 'zerif' ),
						'section'    => 'zerif_bigtitle_section',
						'settings'   => 'zerif_bigtitle_1button_background_color',
						'priority'   => 9
					)
				)
		);
			
		/* zerif_bigtitle_1button_background_color_hover */	
		$wp_customize->add_setting( 'zerif_bigtitle_1button_background_color_hover', array( 'default' => '#cb4332' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_bigtitle_1button_background_color_hover',
					array(
						'label'      => __( 'First button background color - hover', 'zerif' ),
						'section'    => 'zerif_bigtitle_section',
						'settings'   => 'zerif_bigtitle_1button_background_color_hover',
						'priority'   => 10
					)
				)
		);
			
		/* zerif_bigtitle_1button_color */
		$wp_customize->add_setting( 'zerif_bigtitle_1button_color', array( 'default' => '#fff' ) );		
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_bigtitle_1button_color',
					array(
						'label'      => __( 'First button text color', 'zerif' ),
						'section'    => 'zerif_bigtitle_section',
						'settings'   => 'zerif_bigtitle_1button_color',
						'priority'   => 11
					)
				)
		);
		
		/* zerif_bigtitle_2button_background_color */
		$wp_customize->add_setting( 'zerif_bigtitle_2button_background_color', array( 'default' => '#20AA73' ) );
	
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_bigtitle_2button_background_color',
					array(
						'label'      => __( 'Second button background color', 'zerif' ),
						'section'    => 'zerif_bigtitle_section',
						'settings'   => 'zerif_bigtitle_2button_background_color',
						'priority'   => 12
					)
				)
		);
			
		/* zerif_bigtitle_2button_background_color_hover */	
		$wp_customize->add_setting( 'zerif_bigtitle_2button_background_color_hover', array( 'default' => '#069059' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_bigtitle_2button_background_color_hover',
					array(
						'label'      => __( 'Second button background color - hover', 'zerif' ),
						'section'    => 'zerif_bigtitle_section',
						'settings'   => 'zerif_bigtitle_2button_background_color_hover',
						'priority'   => 13
					)
				)
		);
			
		/* zerif_bigtitle_2button_color */	
		$wp_customize->add_setting( 'zerif_bigtitle_2button_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_bigtitle_2button_color',
					array(
						'label'      => __( 'Second button text color', 'zerif' ),
						'section'    => 'zerif_bigtitle_section',
						'settings'   => 'zerif_bigtitle_2button_color',
						'priority'   => 14
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
		$wp_customize->add_setting( 'zerif_parallax_img1', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/background1.jpg'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img1', array(
				'label'    	=> __( 'Parallax image 1', 'zerif' ),
				'section'  	=> 'zerif_bigtitle_section',
				'settings' 	=> 'zerif_parallax_img1',
				'priority'	=> 15,
		)));

		/* IMAGE 2 */
		$wp_customize->add_setting( 'zerif_parallax_img2', array('sanitize_callback' => 'esc_url_raw', 'default' => get_template_directory_uri() . '/images/background2.png'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_parallax_img2', array(
				'label'    	=> __( 'Parallax image 2', 'zerif' ),
				'section'  	=> 'zerif_bigtitle_section',
				'settings' 	=> 'zerif_parallax_img2',
				'priority'	=> 16,
		)));


	endif;

	

	/********************************************************************/

	/*************  OUR FOCUS SECTION **********************************/

	/********************************************************************/

	
	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_4', array(
			'priority' => 33,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Our focus section', 'zerif' )
		) );
		
		/* OUR FOCUS SETTINGS */
		
		$wp_customize->add_section( 'zerif_ourfocus_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_4'
		));
		
		/* zerif_ourfocus_show */   
		$wp_customize->add_setting( 'zerif_ourfocus_show');

		$wp_customize->add_control(
			'zerif_ourfocus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our focus section?','zerif'),
				'description' => __('If you check this box, the Our focus section will disappear from homepage.','zerif'),
				'section' => 'zerif_ourfocus_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourfocus_show' )->transport = 'postMessage';
		
		/* OUR FOCUS CONTENT */
		
		$wp_customize->add_section( 'zerif_ourfocus_texts_section' , array(
				'title'       => __( 'Header', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_4'
		));

		/* zerif_ourfocus_title */
		$wp_customize->add_setting( 'zerif_ourfocus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Our Focus','zerif')));

		$wp_customize->add_control( 'zerif_ourfocus_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_ourfocus_texts_section',
				'settings' => 'zerif_ourfocus_title',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_ourfocus_title' )->transport = 'postMessage';

		/* zerif_ourfocus_subtitle */
		$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "Our focus section"','zerif')));			
		$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_ourfocus_texts_section',
				'settings' => 'zerif_ourfocus_subtitle',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_ourfocus_subtitle' )->transport = 'postMessage';
		
		/* zerif_ourfocus_widgets_section */
		$wp_customize->add_section( 'zerif_ourfocus_widgets_section' , array(
				'title'       => __( 'Content', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_4'
		));
		
		$wp_customize->add_setting( 'zerif_ourfocus_widgets_section' );
	
		$wp_customize->add_control( new Zerif_Our_Focus_Widgets( $wp_customize, 'zerif_ourfocus_widgets_section',
			array(
				'section' => 'zerif_ourfocus_widgets_section',
		   )
		));
		
		/* OUR FOCUS COLORS */
		
		$wp_customize->add_section( 'zerif_ourfocus_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_4'
		));

		/* zerif_ourfocus_background */
		$wp_customize->add_setting( 'zerif_ourfocus_background', array( 'default' => '#fff' ) );
			 
		$wp_customize->add_control(
				new Zerif_Customize_Alpha_Color_Control(
					$wp_customize,
					'zerif_ourfocus_background',
					array(
						'label'    => __( 'Background color', 'zerif' ),
						'palette' => true,
						'section'  => 'zerif_ourfocus_colors_section',
						'priority'   => 1
					)
				)
		);
		
		$wp_customize->get_setting( 'zerif_ourfocus_background' )->transport = 'postMessage';
		
		/* zerif_ourfocus_header */
		$wp_customize->add_setting( 'zerif_ourfocus_header', array( 'default' => '#404040' ) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourfocus_header',
				array(
					'label'      => __( 'Header texts color', 'zerif' ),
					'section'    => 'zerif_ourfocus_colors_section',
					'settings'   => 'zerif_ourfocus_header',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourfocus_header' )->transport = 'postMessage';
		
		/* zerif_ourfocus_box_title_color */
		$wp_customize->add_setting( 'zerif_ourfocus_box_title_color', array( 'default' => '#404040'	));
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourfocus_box_title_color',
				array(
					'label'      => __( 'Box title color', 'zerif' ),
					'section'    => 'zerif_ourfocus_colors_section',
					'settings'   => 'zerif_ourfocus_box_title_color',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourfocus_box_title_color' )->transport = 'postMessage';
		
		/* zerif_ourfocus_box_text_color */
		$wp_customize->add_setting( 'zerif_ourfocus_box_text_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourfocus_box_text_color',
				array(
					'label'      => __( 'Box text color', 'zerif' ),
					'section'    => 'zerif_ourfocus_colors_section',
					'settings'   => 'zerif_ourfocus_box_text_color',
					'priority'   => 4
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourfocus_box_text_color' )->transport = 'postMessage';
		
		/* zerif_ourfocus_1box */
		$wp_customize->add_setting( 'zerif_ourfocus_1box', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourfocus_1box',
				array(
					'label'      => __( 'First box border color hover', 'zerif' ),
					'section'    => 'zerif_ourfocus_colors_section',
					'settings'   => 'zerif_ourfocus_1box',
					'priority'   => 5
				)
			)
		);
		
		/* zerif_ourfocus_2box */
		$wp_customize->add_setting( 'zerif_ourfocus_2box', array( 'default' => '#34d293' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourfocus_2box',
				array(
					'label'      => __( 'Second box border color hover', 'zerif' ),
					'section'    => 'zerif_ourfocus_colors_section',
					'settings'   => 'zerif_ourfocus_2box',
					'priority'   => 6
				)
			)
		);

		/* zerif_ourfocus_3box */
		$wp_customize->add_setting( 'zerif_ourfocus_3box', array( 'default' => '#3ab0e2' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourfocus_3box',
				array(
					'label'      => __( 'Third box border color hover', 'zerif' ),
					'section'    => 'zerif_ourfocus_colors_section',
					'settings'   => 'zerif_ourfocus_3box',
					'priority'   => 7
				)
			)
		);
		
		/* zerif_ourfocus_4box */
		$wp_customize->add_setting( 'zerif_ourfocus_4box', array( 'default' => '#f7d861' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourfocus_4box',
				array(
					'label'      => __( 'Fourth box border color hover', 'zerif' ),
					'section'    => 'zerif_ourfocus_colors_section',
					'settings'   => 'zerif_ourfocus_4box',
					'priority'   => 8
				)
			)
		);
		
	else: /* Old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_ourfocus_section' , array(
				'title'       => __( 'Our focus section', 'zerif' ),
				'priority'    => 33
		));
			
		/* zerif_ourfocus_show */   

		$wp_customize->add_setting( 'zerif_ourfocus_show');
		
		$wp_customize->add_control(
				'zerif_ourfocus_show',
				array(
					'type' => 'checkbox',
					'label' => 'Hide our focus section?',	
					'description' => __('If you check this box, the Our focus section will disappear from homepage.','zerif'),
					'section' => 'zerif_ourfocus_section',
					'priority'    => 1,
				)
		);

		/* zerif_ourfocus_title */

		$wp_customize->add_setting( 'zerif_ourfocus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Our Focus','zerif')));

		$wp_customize->add_control( 'zerif_ourfocus_title', array(
					'label'    => __( 'Main title', 'zerif' ),
					'section'  => 'zerif_ourfocus_section',
					'settings' => 'zerif_ourfocus_title',
					'priority'    => 2,
		));

		/* zerif_ourfocus_subtitle */
		$wp_customize->add_setting( 'zerif_ourfocus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "Our focus section"','zerif')));

		$wp_customize->add_control( 'zerif_ourfocus_subtitle', array(
					'label'    => __( 'Subtitle', 'zerif' ),
					'section'  => 'zerif_ourfocus_section',
					'settings' => 'zerif_ourfocus_subtitle',
					'priority'    => 3,
		));

		/* zerif_ourfocus_background */
		$wp_customize->add_setting( 'zerif_ourfocus_background', array( 'default' => '#fff' ) );
				 
		$wp_customize->add_control(
					new Zerif_Customize_Alpha_Color_Control(
						$wp_customize,
						'zerif_ourfocus_background',
						array(
							'label'    => __( 'Background color', 'zerif' ),
							'palette' => true,
							'section'  => 'zerif_ourfocus_section',
							'priority'   => 4
						)
					)
		);
			
		/* zerif_ourfocus_header */	
		$wp_customize->add_setting( 'zerif_ourfocus_header', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ourfocus_header',
					array(
						'label'      => __( 'Header texts color', 'zerif' ),
						'section'    => 'zerif_ourfocus_section',
						'settings'   => 'zerif_ourfocus_header',
						'priority'   => 5
					)
				)
		);
		
		/* zerif_ourfocus_box_title_color */
		$wp_customize->add_setting( 'zerif_ourfocus_box_title_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ourfocus_box_title_color',
					array(
						'label'      => __( 'Box title color', 'zerif' ),
						'section'    => 'zerif_ourfocus_section',
						'settings'   => 'zerif_ourfocus_box_title_color',
						'priority'   => 7
					)
				)
		);
		
		/* zerif_ourfocus_box_text_color */
		$wp_customize->add_setting( 'zerif_ourfocus_box_text_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ourfocus_box_text_color',
					array(
						'label'      => __( 'Box text color', 'zerif' ),
						'section'    => 'zerif_ourfocus_section',
						'settings'   => 'zerif_ourfocus_box_text_color',
						'priority'   => 8
					)
				)
		);
			
		/* zerif_ourfocus_1box */	
		$wp_customize->add_setting( 'zerif_ourfocus_1box', array( 'default' => '#e96656' ) );
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ourfocus_1box',
					array(
						'label'      => __( 'First box border color hover', 'zerif' ),
						'section'    => 'zerif_ourfocus_section',
						'settings'   => 'zerif_ourfocus_1box',
						'priority'   => 9
					)
				)
		);
		
		/* zerif_ourfocus_2box */
		$wp_customize->add_setting( 'zerif_ourfocus_2box', array( 'default' => '#34d293' ) );
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ourfocus_2box',
					array(
						'label'      => __( 'Second box border color hover', 'zerif' ),
						'section'    => 'zerif_ourfocus_section',
						'settings'   => 'zerif_ourfocus_2box',
						'priority'   => 10
					)
				)
		);

		/* zerif_ourfocus_3box */
		$wp_customize->add_setting( 'zerif_ourfocus_3box', array( 'default' => '#3ab0e2' ) );
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ourfocus_3box',
					array(
						'label'      => __( 'Third box border color hover', 'zerif' ),
						'section'    => 'zerif_ourfocus_section',
						'settings'   => 'zerif_ourfocus_3box',
						'priority'   => 11
					)
				)
		);
		
		/* zerif_ourfocus_4box */
		$wp_customize->add_setting( 'zerif_ourfocus_4box', array( 'default' => '#f7d861' ) );
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ourfocus_4box',
					array(
						'label'      => __( 'Fourth box border color hover', 'zerif' ),
						'section'    => 'zerif_ourfocus_section',
						'settings'   => 'zerif_ourfocus_4box',
						'priority'   => 12
					)
				)
		);
	endif;


	/************************************/

	/******** PORTFOLIO SECTION ********/

	/***********************************/

	
	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_5', array(
			'priority' => 34,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Portfolio section', 'zerif' )
		) );
		
		/* PORTFOLIO SETTINGS */
		
		$wp_customize->add_section( 'zerif_portofolio_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_5'
		));
		
		/* zerif_portofolio_show */   
		$wp_customize->add_setting( 'zerif_portofolio_show');

		$wp_customize->add_control(
			'zerif_portofolio_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide portfolio section?','zerif'),
				'description' => __('If you check this box, the Portfolio section will disappear from homepage.','zerif'),
				'section' => 'zerif_portofolio_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_portofolio_show' )->transport = 'postMessage';
		
		/* zerif_portofolio_number */
		$wp_customize->add_setting( 'zerif_portofolio_number', array('sanitize_callback' => 'zerif_sanitize_text','default' => '8'));

		$wp_customize->add_control( 'zerif_portofolio_number', array(
				'label'    => __( 'Maximum number of portfolios to display on homepage', 'zerif' ),
				'section'  => 'zerif_portofolio_settings_section',
				'settings' => 'zerif_portofolio_number',
				'priority'    => 2,
		));
		
		/* PORTFOLIO CONTENT */
		
		$wp_customize->add_section( 'zerif_portofolio_texts_section' , array(
				'title'       => __( 'Content', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_5'
		));
		
		/* zerif_portofolio_title */
		$wp_customize->add_setting( 'zerif_portofolio_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Portfolio','zerif')));

		$wp_customize->add_control( 'zerif_portofolio_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_portofolio_texts_section',
				'settings' => 'zerif_portofolio_title',
				'priority'    => 3,
		));	
		
		$wp_customize->get_setting( 'zerif_portofolio_title' )->transport = 'postMessage';

		/* zerif_portofolio_subtitle */
		$wp_customize->add_setting( 'zerif_portofolio_subtitle', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('Portfolio subtitle','zerif')));	

		$wp_customize->add_control( 'zerif_portofolio_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_portofolio_texts_section',
				'settings' => 'zerif_portofolio_subtitle',
				'priority'    => 4,
		));
		
		$wp_customize->get_setting( 'zerif_portofolio_subtitle' )->transport = 'postMessage';
		
		/* PORTFOLIO SINGLE PAGE */
		
		$wp_customize->add_section( 'zerif_portofolio_single_section' , array(
				'title'       => __( 'Single page', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_5'
		));	
		
		$wp_customize->add_setting( 'zerif_portofolio_single_full');

		$wp_customize->add_control(
			'zerif_portofolio_single_full',
			array(
				'type' => 'checkbox',
				'label' => __('Full width page?','zerif'),
				'description' => __('If you check this box, the single portfolio page will be full width, with no sidebar.','zerif'),
				'section' => 'zerif_portofolio_single_section',
				'priority'    => 1,
			)
		);
		
		/* PORTFOLIO COLORS */

		$wp_customize->add_section( 'zerif_portofolio_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 4,
				'panel' => 'panel_5'
		));	
		
		/* zerif_portofolio_background */
		$wp_customize->add_setting( 'zerif_portofolio_background', array( 'default' => '#fff' ) );
				 
		$wp_customize->add_control(
					new Zerif_Customize_Alpha_Color_Control(
						$wp_customize,
						'zerif_portofolio_background',
						array(
							'label'    => __( 'Background color', 'zerif' ),
							'palette' => true,
							'section'  => 'zerif_portofolio_colors_section',
							'priority'   => 1
						)
					)
		);
		
		$wp_customize->get_setting( 'zerif_portofolio_background' )->transport = 'postMessage';
		
		/* zerif_portofolio_header */
		$wp_customize->add_setting( 'zerif_portofolio_header', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_portofolio_header',
				array(
					'label'      => __( 'Main title and subtitle colors', 'zerif' ),
					'section'    => 'zerif_portofolio_colors_section',
					'settings'   => 'zerif_portofolio_header',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_portofolio_header' )->transport = 'postMessage';
		
		/* zerif_portofolio_text */
		$wp_customize->add_setting( 'zerif_portofolio_text', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_portofolio_text',
				array(
					'label'      => __( 'Portfolio box texts', 'zerif' ),
					'section'    => 'zerif_portofolio_colors_section',
					'settings'   => 'zerif_portofolio_text',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_portofolio_text' )->transport = 'postMessage';
		
	else: /* Old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_portofolio_section' , array(
			'title'       => __( 'Portfolio section', 'zerif' ),
			'priority'    => 34
		));
			
		/* zerif_portofolio_show */  
		$wp_customize->add_setting( 'zerif_portofolio_show');

		$wp_customize->add_control(
			'zerif_portofolio_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide portfolio section?','zerif'),
				'description' => __('If you check this box, the Portfolio section will disappear from homepage.','zerif'),
				'section' => 'zerif_portofolio_section',
				'priority'    => 1,
			)
		);
			
		/* zerif_portofolio_number */
		$wp_customize->add_setting( 'zerif_portofolio_number', array('sanitize_callback' => 'zerif_sanitize_text','default' => '8'));

		$wp_customize->add_control( 'zerif_portofolio_number', array(
				'label'    => __( 'Maximum number of portfolios to display on homepage', 'zerif' ),
				'section'  => 'zerif_portofolio_section',
				'settings' => 'zerif_portofolio_number',
				'priority'    => 2,
		));

		/* zerif_portofolio_title */
		$wp_customize->add_setting( 'zerif_portofolio_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Portfolio','zerif')));

		$wp_customize->add_control( 'zerif_portofolio_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_portofolio_section',
				'settings' => 'zerif_portofolio_title',
				'priority'    => 3,
		));

		/* zerif_portofolio_subtitle */
		$wp_customize->add_setting( 'zerif_portofolio_subtitle', array('sanitize_callback' => 'zerif_sanitize_text', 'default' => __('Portfolio subtitle','zerif')));	

		$wp_customize->add_control( 'zerif_portofolio_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_portofolio_section',
				'settings' => 'zerif_portofolio_subtitle',
				'priority'    => 4,
		));

		/* zerif_portofolio_single_full */
		$wp_customize->add_setting( 'zerif_portofolio_single_full');

		$wp_customize->add_control(
			'zerif_portofolio_single_full',
			array(
				'type' => 'checkbox',
				'label' => __('Full width page?','zerif'),
				'description' => __('If you check this box, the single portfolio page will be full width, with no sidebar.','zerif'),
				'section' => 'zerif_portofolio_section',
				'priority'    => 5,
			)
		);

		/* zerif_portofolio_background */
		$wp_customize->add_setting( 'zerif_portofolio_background', array( 'default' => '#fff' ) );
				 
		$wp_customize->add_control(
					new Zerif_Customize_Alpha_Color_Control(
						$wp_customize,
						'zerif_portofolio_background',
						array(
							'label'    => __( 'Background color', 'zerif' ),
							'palette' => true,
							'section'  => 'zerif_portofolio_section',
							'priority'   => 6
						)
					)
		);
		
		/* zerif_portofolio_header */
		$wp_customize->add_setting( 'zerif_portofolio_header', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_portofolio_header',
				array(
					'label'      => __( 'Main title and subtitle colors', 'zerif' ),
					'section'    => 'zerif_portofolio_section',
					'settings'   => 'zerif_portofolio_header',
					'priority'   => 7
				)
			)
		);
			
		/* zerif_portofolio_text */
		$wp_customize->add_setting( 'zerif_portofolio_text', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_portofolio_text',
				array(
					'label'      => __( 'Portfolio box texts', 'zerif' ),
					'section'    => 'zerif_portofolio_section',
					'settings'   => 'zerif_portofolio_text',
					'priority'   => 8
				)
			)
		);

	endif;
	

	/************************************/

	/******* ABOUT US SECTION ***********/

	/************************************/

	
	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_6', array(
			'priority' => 35,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'About us section', 'zerif' )
		) );
		
		/* ABOUT US SETTINGS */
		$wp_customize->add_section( 'zerif_aboutus_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_6'
		));
		
		/* zerif_aboutus_show */   
		$wp_customize->add_setting( 'zerif_aboutus_show');

		$wp_customize->add_control(
			'zerif_aboutus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide about us section?','zerif'),
				'description' => __('If you check this box, the About us section will disappear from homepage.','zerif'),
				'section' => 'zerif_aboutus_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_aboutus_show' )->transport = 'postMessage';
		
		/* ABOUT US CONTENT */
		
		$wp_customize->add_section( 'zerif_aboutus_texts_section' , array(
				'title'       => __( 'Main content', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_6'
		));
		
		/* zerif_aboutus_title */
		$wp_customize->add_setting( 'zerif_aboutus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('About US','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_aboutus_texts_section',
				'settings' => 'zerif_aboutus_title',
				'priority'    => 1,
		));
		
		$wp_customize->get_setting( 'zerif_aboutus_title' )->transport = 'postMessage';

		/* zerif_aboutus_subtitle */
		$wp_customize->add_setting( 'zerif_aboutus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "About us section"','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_aboutus_texts_section',
				'settings' => 'zerif_aboutus_subtitle',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_aboutus_subtitle' )->transport = 'postMessage';

		/* zerif_aboutus_biglefttitle */
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Title','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
				'label'    => __( 'Left side content', 'zerif' ),
				'section'  => 'zerif_aboutus_texts_section',
				'settings' => 'zerif_aboutus_biglefttitle',
				'priority'    => 3,
		));

		/* zerif_aboutus_text */
		$wp_customize->add_setting( 'zerif_aboutus_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('You can add here a large piece of text. For that, please go in the Admin Area, Customizer, "About us section"')));
		
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_aboutus_text', array(
            'label'   => __( 'Middle content', 'zerif' ),
            'section' => 'zerif_aboutus_texts_section',
            'settings'   => 'zerif_aboutus_text',
            'priority' => 4
        )) ) ;

		/* ABOUT US FEATURE 1 */
		
		$wp_customize->add_section( 'zerif_aboutus_feature1_section' , array(
				'title'       => __( 'Feature no#1', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_6'
		));
		

		/* zerif_aboutus_feature1_title */
		$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_feature1_title', array(
				'label'    => __( 'Title', 'zerif' ),
				'section'  => 'zerif_aboutus_feature1_section',
				'settings' => 'zerif_aboutus_feature1_title',
				'priority'    => 1,
		));
		
		$wp_customize->get_setting( 'zerif_aboutus_feature1_title' )->transport = 'postMessage';

		/* zerif_aboutus_feature1_text */	
		$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(
				'label'    => __( 'Text', 'zerif' ),
				'section'  => 'zerif_aboutus_feature1_section',
				'settings' => 'zerif_aboutus_feature1_text',
				'priority'    => 2,
		));

		$wp_customize->get_setting( 'zerif_aboutus_feature1_text' )->transport = 'postMessage';
		
		/* zerif_aboutus_feature1_nr */
		$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '50'));

		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature1_nr',
				array(
					'type' => 'number',
					'label' => __( 'Percentage', 'zerif' ),
					'section' => 'zerif_aboutus_feature1_section',
					'settings' => 'zerif_aboutus_feature1_nr',
					'priority'    => 3
				)
			)
		); 

		/* ABOUT US FEATURE 2 */
		
		$wp_customize->add_section( 'zerif_aboutus_feature2_section' , array(
				'title'       => __( 'Feature no#2', 'zerif' ),
				'priority'    => 4,
				'panel' => 'panel_6'
		));
		

		/* zerif_aboutus_feature2_title */
		$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_feature2_title', array(
				'label'    => __( 'Title', 'zerif' ),
				'section'  => 'zerif_aboutus_feature2_section',
				'settings' => 'zerif_aboutus_feature2_title',
				'priority'    => 1,
		));

		$wp_customize->get_setting( 'zerif_aboutus_feature2_title' )->transport = 'postMessage';
		
		/* zerif_aboutus_feature2_text */
		$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(
				'label'    => __( 'Text', 'zerif' ),
				'section'  => 'zerif_aboutus_feature2_section',
				'settings' => 'zerif_aboutus_feature2_text',
				'priority'    => 2,
		));

		$wp_customize->get_setting( 'zerif_aboutus_feature2_text' )->transport = 'postMessage';

		/* zerif_aboutus_feature2_nr */
		$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '70'));

		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature2_nr',
				array(
					'type' => 'number',
					'label' => __( 'Percentage', 'zerif' ),
					'section' => 'zerif_aboutus_feature2_section',
					'settings' => 'zerif_aboutus_feature2_nr',
					'priority'    => 3
				)
			)
		); 
		
		/* ABOUT US FEATURE 3 */

		$wp_customize->add_section( 'zerif_aboutus_feature3_section' , array(
				'title'       => __( 'Feature no#3', 'zerif' ),
				'priority'    => 5,
				'panel' => 'panel_6'
		));

		/* zerif_aboutus_feature3_title */
		$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_feature3_title', array(
				'label'    => __( 'Title', 'zerif' ),
				'section'  => 'zerif_aboutus_feature3_section',
				'settings' => 'zerif_aboutus_feature3_title',
				'priority'    => 1,
		));

		$wp_customize->get_setting( 'zerif_aboutus_feature3_title' )->transport = 'postMessage';

		/* zerif_aboutus_feature3_text */
		$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(
				'label'    => __( 'Text', 'zerif' ),
				'section'  => 'zerif_aboutus_feature3_section',
				'settings' => 'zerif_aboutus_feature3_text',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_aboutus_feature3_text' )->transport = 'postMessage';

		/* zerif_aboutus_feature3_nr */
		$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '100'));

		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature3_nr',
				array(
					'type' => 'number',
					'label' => __( 'Feature no3 percentage', 'zerif' ),
					'section' => 'zerif_aboutus_feature3_section',
					'settings' => 'zerif_aboutus_feature3_nr',
					'priority'    => 3
				)
			)
		); 
		
		/* ABOUT US FEATURE 4 */

		$wp_customize->add_section( 'zerif_aboutus_feature4_section' , array(
				'title'       => __( 'Feature no#4', 'zerif' ),
				'priority'    => 6,
				'panel' => 'panel_6'
		));

		/* zerif_aboutus_feature4_title */
		$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_feature4_title', array(
				'label'    => __( 'Title', 'zerif' ),
				'section'  => 'zerif_aboutus_feature4_section',
				'settings' => 'zerif_aboutus_feature4_title',
				'priority'    => 1,
		));

		$wp_customize->get_setting( 'zerif_aboutus_feature4_title' )->transport = 'postMessage';

		/* zerif_aboutus_feature4_text */
		$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(
				'label'    => __( 'Text', 'zerif' ),
				'section'  => 'zerif_aboutus_feature4_section',
				'settings' => 'zerif_aboutus_feature4_text',
				'priority'    => 2,
		));

		$wp_customize->get_setting( 'zerif_aboutus_feature4_text' )->transport = 'postMessage';

		/* zerif_aboutus_feature4_nr */
		$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '10'));

		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature4_nr',
				array(
					'type' => 'number',
					'label' => __( 'Feature no4 percentage', 'zerif' ),
					'section' => 'zerif_aboutus_feature4_section',
					'settings' => 'zerif_aboutus_feature4_nr',
					'priority'    => 3
				)
			)
		); 

		/* ABOUT US COLORS */
		
		$wp_customize->add_section( 'zerif_aboutus_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 7,
				'panel' => 'panel_6'
		));
		
		/* zerif_aboutus_background */
		$wp_customize->add_setting( 'zerif_aboutus_background', array( 'default' => '#272727' ) );
					 
		$wp_customize->add_control(
						new Zerif_Customize_Alpha_Color_Control(
							$wp_customize,
							'zerif_aboutus_background',
							array(
								'label'    => __( 'Background color', 'zerif' ),
								'palette' => true,
								'section'  => 'zerif_aboutus_colors_section',
								'priority'   => 1
							)
						)
		);
		
		$wp_customize->get_setting( 'zerif_aboutus_background' )->transport = 'postMessage';
		
		/* zerif_aboutus_title_color */
		$wp_customize->add_setting( 'zerif_aboutus_title_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_aboutus_title_color',
				array(
					'label'      => __( 'Titles color', 'zerif' ),
					'section'    => 'zerif_aboutus_colors_section',
					'settings'   => 'zerif_aboutus_title_color',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_aboutus_title_color' )->transport = 'postMessage';
		
		/* ABOUT US CLIENTS */
		
		$wp_customize->add_section( 'zerif_aboutus_clients_section' , array(
				'title'       => __( 'Clients area', 'zerif' ),
				'priority'    => 8,
				'panel' => 'panel_6'
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
				'priority'    => 9,
				
				'panel' => 'panel_6'
		));
		
		$wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('OUR HAPPY CLIENTS','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
				'label'    => __( 'Title', 'zerif' ),
				'description' => __('This title appears only if you have widgets in the About us sidebar.','zerif'),
				'section'  => 'zerif_aboutus_clients_title_section',
				'settings' => 'zerif_aboutus_clients_title_text',
				'priority'    => 1,
		));
		
		$wp_customize->get_setting( 'zerif_aboutus_clients_title_text' )->transport = 'postMessage';
		
	else:
		
		$wp_customize->add_section( 'zerif_aboutus_section' , array(
				'title'       => __( 'About us section', 'zerif' ),
				'priority'    => 35
		));
		
		/* zerif_aboutus_show */   
		$wp_customize->add_setting( 'zerif_aboutus_show');

		$wp_customize->add_control(
			'zerif_aboutus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide about us section?','zerif'),
				'description' => __('If you check this box, the About us section will disappear from homepage.','zerif'),
				'section' => 'zerif_aboutus_section',
				'priority'    => 1,
			)
		);
		
		/* zerif_aboutus_title */
		$wp_customize->add_setting( 'zerif_aboutus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('About US')));

		$wp_customize->add_control( 'zerif_aboutus_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_title',
				'priority'    => 2,
		));

		/* zerif_aboutus_subtitle */
		$wp_customize->add_setting( 'zerif_aboutus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "About us section"','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_subtitle',
				'priority'    => 3,
		));

		/* zerif_aboutus_biglefttitle */
		$wp_customize->add_setting( 'zerif_aboutus_biglefttitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Title','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_biglefttitle', array(
				'label'    => __( 'Left side content', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_biglefttitle',
				'priority'    => 4,
		));

		/* zerif_aboutus_text */
		$wp_customize->add_setting( 'zerif_aboutus_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('You can add here a large piece of text. For that, please go in the Admin Area, Customizer, "About us section"')));
		
		$wp_customize->add_control( new Zerif_Customize_Textarea_Control( $wp_customize, 'zerif_aboutus_text', array(
            'label'   => __( 'Middle content', 'zerif' ),
            'section' => 'zerif_aboutus_section',
            'settings'   => 'zerif_aboutus_text',
            'priority' => 5
        )) ) ;
			
		/* zerif_aboutus_feature1_title */
		$wp_customize->add_setting( 'zerif_aboutus_feature1_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_feature1_title', array(
				'label'    => __( 'Feature no1 title', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature1_title',
				'priority'    => 6,
		));
			
		/* zerif_aboutus_feature1_text */	
		$wp_customize->add_setting( 'zerif_aboutus_feature1_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_aboutus_feature1_text', array(
				'label'    => __( 'Feature no1 text', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature1_text',
				'priority'    => 7,
		));

		/* zerif_aboutus_feature1_nr */
		$wp_customize->add_setting( 'zerif_aboutus_feature1_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '50'));

		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature1_nr',
				array(
					'type' => 'number',
					'label' => __( 'Feature no1 percentage', 'zerif' ),
					'section' => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_feature1_nr',
					'priority'    => 8
				)
			)
		); 	

		/* zerif_aboutus_feature2_title */
		$wp_customize->add_setting( 'zerif_aboutus_feature2_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_feature2_title', array(
				'label'    => __( 'Feature no2 title', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature2_title',
				'priority'    => 9,
		));
		
		/* zerif_aboutus_feature2_text */
		$wp_customize->add_setting( 'zerif_aboutus_feature2_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_aboutus_feature2_text', array(
				'label'    => __( 'Feature no2 text', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature2_text',
				'priority'    => 10,
		));

		/* zerif_aboutus_feature2_nr */
		$wp_customize->add_setting( 'zerif_aboutus_feature2_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '70'));

		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature2_nr',
				array(
					'type' => 'number',
					'label' => __( 'Feature no2 percentage', 'zerif' ),
					'section' => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_feature2_nr',
					'priority'    => 11
				)
			)
		);

		/* zerif_aboutus_feature3_title */
		$wp_customize->add_setting( 'zerif_aboutus_feature3_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_feature3_title', array(
				'label'    => __( 'Feature no3 title', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature3_title',
				'priority'    => 12,
		));

		/* zerif_aboutus_feature3_text */
		$wp_customize->add_setting( 'zerif_aboutus_feature3_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_aboutus_feature3_text', array(
				'label'    => __( 'Feature no3 text', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature3_text',
				'priority'    => 13,
		));

		/* zerif_aboutus_feature3_nr */
		$wp_customize->add_setting( 'zerif_aboutus_feature3_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '100'));

		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature3_nr',
				array(
					'type' => 'number',
					'label' => __( 'Feature no3 percentage', 'zerif' ),
					'section' => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_feature3_nr',
					'priority'    => 14
				)
			)
		);

		/* zerif_aboutus_feature4_title */
		$wp_customize->add_setting( 'zerif_aboutus_feature4_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Feature','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_feature4_title', array(
				'label'    => __( 'Feature no4 title', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature4_title',
				'priority'    => 15,
		));

		/* zerif_aboutus_feature4_text */
		$wp_customize->add_setting( 'zerif_aboutus_feature4_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_aboutus_feature4_text', array(
				'label'    => __( 'Feature no4 text', 'zerif' ),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_feature4_text',
				'priority'    => 16,
		));
		
		/* zerif_aboutus_feature4_nr */
		$wp_customize->add_setting( 'zerif_aboutus_feature4_nr', array('sanitize_callback' => 'zerif_sanitize_number','default' => '10'));

		$wp_customize->add_control(
			new Zerif_Customizer_Number_Control(
				$wp_customize,
				'zerif_aboutus_feature4_nr',
				array(
					'type' => 'number',
					'label' => __( 'Feature no4 percentage', 'zerif' ),
					'section' => 'zerif_aboutus_section',
					'settings' => 'zerif_aboutus_feature4_nr',
					'priority'    => 17
				)
			)
		); 		

		/* zerif_aboutus_background */
		$wp_customize->add_setting( 'zerif_aboutus_background', array( 'default' => '#272727' ) );
					 
		$wp_customize->add_control(
						new Zerif_Customize_Alpha_Color_Control(
							$wp_customize,
							'zerif_aboutus_background',
							array(
								'label'    => __( 'Background color', 'zerif' ),
								'palette' => true,
								'section'  => 'zerif_aboutus_section',
								'priority'   => 18
							)
						)
		);
			
		/* zerif_aboutus_title_color */
		$wp_customize->add_setting( 'zerif_aboutus_title_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_aboutus_title_color',
				array(
					'label'      => __( 'Titles color', 'zerif' ),
					'section'    => 'zerif_aboutus_section',
					'settings'   => 'zerif_aboutus_title_color',
					'priority'   => 19
				)
			)
		);
		
		$wp_customize->add_setting( 'zerif_aboutus_clients_title_text', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('OUR HAPPY CLIENTS','zerif')));

		$wp_customize->add_control( 'zerif_aboutus_clients_title_text', array(
				'label'    => __( 'Clients widgets area title', 'zerif' ),
				'description' => __('This title appears only if you have widgets in the About us sidebar.','zerif'),
				'section'  => 'zerif_aboutus_section',
				'settings' => 'zerif_aboutus_clients_title_text',
				'priority'    => 20,
		));		

	endif;
	


	/******************************************/

    /**********	OUR TEAM SECTION **************/

	/******************************************/

	

	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_7', array(
			'priority' => 36,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Our team section', 'zerif' )
		) );
		
		/* OUR TEAM SETTINGS */
		
		$wp_customize->add_section( 'zerif_ourteam_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_7'
		));
		
		/* zerif_ourteam_show */   
		$wp_customize->add_setting( 'zerif_ourteam_show');

		$wp_customize->add_control(
			'zerif_ourteam_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our team section?','zerif'),
				'description' => __('If you check this box, the Our team section will disappear from homepage.','zerif'),
				'section' => 'zerif_ourteam_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourteam_show' )->transport = 'postMessage';
		
		/* OUR TEAM HEADER */
		
		$wp_customize->add_section( 'zerif_ourteam_texts_section' , array(
				'title'       => __( 'Header', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_7'
		));

		/* zerif_ourteam_title */
		$wp_customize->add_setting( 'zerif_ourteam_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Our Team','zerif')));

		$wp_customize->add_control( 'zerif_ourteam_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_ourteam_texts_section',
				'settings' => 'zerif_ourteam_title',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_ourteam_title' )->transport = 'postMessage';

		/* zerif_ourteam_subtitle */
		$wp_customize->add_setting( 'zerif_ourteam_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "Our team section"','zerif')));

		$wp_customize->add_control( 'zerif_ourteam_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_ourteam_texts_section',
				'settings' => 'zerif_ourteam_subtitle',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_ourteam_subtitle' )->transport = 'postMessage';
		
		/* OUR TEAM CONTENT */
		
		$wp_customize->add_section( 'zerif_ourteam_content_section' , array(
				'title'       => __( 'Content', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_7'
		));
		
		$wp_customize->add_setting( 'zerif_ourteam_content_section' );
	
		$wp_customize->add_control( new Zerif_Our_Team_Widgets( $wp_customize, 'zerif_ourteam_content_section',
			array(
				'section' => 'zerif_ourteam_content_section',
		   )
		));

		/* OUR TEAM COLORS */
		
		/* zerif_ourteam_colors_section */
		$wp_customize->add_section( 'zerif_ourteam_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_7'
		));
		
		/* zerif_ourteam_background */
		$wp_customize->add_setting( 'zerif_ourteam_background', array( 'default' => '#fff' ) );
						 
		$wp_customize->add_control(
							new Zerif_Customize_Alpha_Color_Control(
								$wp_customize,
								'zerif_ourteam_background',
								array(
									'label'    => __( 'Background color', 'zerif' ),
									'palette' => true,
									'section'  => 'zerif_ourteam_colors_section',
									'priority'   => 1
								)
							)
		);	
		
		$wp_customize->get_setting( 'zerif_ourteam_background' )->transport = 'postMessage';
		
		/* zerif_ourteam_header */
		$wp_customize->add_setting( 'zerif_ourteam_header', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourteam_header',
				array(
					'label'      => __( 'Titles color', 'zerif' ),
					'section'    => 'zerif_ourteam_colors_section',
					'settings'   => 'zerif_ourteam_header',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourteam_header' )->transport = 'postMessage';
		
		/* zerif_ourteam_text */
		$wp_customize->add_setting( 'zerif_ourteam_text', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourteam_text',
				array(
					'label'      => __( 'Team member hover description color', 'zerif' ),
					'section'    => 'zerif_ourteam_colors_section',
					'settings'   => 'zerif_ourteam_text',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourteam_text' )->transport = 'postMessage';
		
		/* zerif_ourteam_socials */
		$wp_customize->add_setting( 'zerif_ourteam_socials', array( 'default' => '#808080' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourteam_socials',
				array(
					'label'      => __( 'Social icons colors', 'zerif' ),
					'section'    => 'zerif_ourteam_colors_section',
					'settings'   => 'zerif_ourteam_socials',
					'priority'   => 4
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourteam_socials' )->transport = 'postMessage';
		
		/* zerif_ourteam_socials_hover */
		$wp_customize->add_setting( 'zerif_ourteam_socials_hover', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourteam_socials_hover',
				array(
					'label'      => __( 'Social icons colors - hover', 'zerif' ),
					'section'    => 'zerif_ourteam_colors_section',
					'settings'   => 'zerif_ourteam_socials_hover',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ourteam_socials_hover' )->transport = 'postMessage';
		
	else: /* Old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_ourteam_section' , array(
				'title'       => __( 'Our team section', 'zerif' ),
				'priority'    => 36
		));
		
		/* zerif_ourteam_show */   
		$wp_customize->add_setting( 'zerif_ourteam_show');

		$wp_customize->add_control(
			'zerif_ourteam_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide our team section?','zerif'),
				'description' => __('If you check this box, the Our team section will disappear from homepage.','zerif'),
				'section' => 'zerif_ourteam_section',
				'priority'    => 1,
			)
		);

		/* zerif_ourteam_title */
		$wp_customize->add_setting( 'zerif_ourteam_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Our Team','zerif')));

		$wp_customize->add_control( 'zerif_ourteam_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_ourteam_section',
				'settings' => 'zerif_ourteam_title',
				'priority'    => 2,
		));
			
		/* zerif_ourteam_subtitle */
		$wp_customize->add_setting( 'zerif_ourteam_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "Our team section"','zerif')));

		$wp_customize->add_control( 'zerif_ourteam_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_ourteam_section',
				'settings' => 'zerif_ourteam_subtitle',
				'priority'    => 3,
		));
		
		/* zerif_ourteam_background */
		$wp_customize->add_setting( 'zerif_ourteam_background', array( 'default' => '#fff' ) );
						 
		$wp_customize->add_control(
							new Zerif_Customize_Alpha_Color_Control(
								$wp_customize,
								'zerif_ourteam_background',
								array(
									'label'    => __( 'Background color', 'zerif' ),
									'palette' => true,
									'section'  => 'zerif_ourteam_section',
									'priority'   => 4
								)
							)
		);
		
		/* zerif_ourteam_header */
		$wp_customize->add_setting( 'zerif_ourteam_header', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourteam_header',
				array(
					'label'      => __( 'Titles color', 'zerif' ),
					'section'    => 'zerif_ourteam_section',
					'settings'   => 'zerif_ourteam_header',
					'priority'   => 5
				)
			)
		);
		/* zerif_ourteam_text */
		$wp_customize->add_setting( 'zerif_ourteam_text', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourteam_text',
				array(
					'label'      => __( 'Team member hover description color', 'zerif' ),
					'section'    => 'zerif_ourteam_section',
					'settings'   => 'zerif_ourteam_text',
					'priority'   => 6
				)
			)
		);
		
		/* zerif_ourteam_socials */
		$wp_customize->add_setting( 'zerif_ourteam_socials', array( 'default' => '#808080' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourteam_socials',
				array(
					'label'      => __( 'Social icons colors', 'zerif' ),
					'section'    => 'zerif_ourteam_section',
					'settings'   => 'zerif_ourteam_socials',
					'priority'   => 7
				)
			)
		);
		
		/* zerif_ourteam_socials_hover */
		$wp_customize->add_setting( 'zerif_ourteam_socials_hover', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ourteam_socials_hover',
				array(
					'label'      => __( 'Social icons colors - hover', 'zerif' ),
					'section'    => 'zerif_ourteam_section',
					'settings'   => 'zerif_ourteam_socials_hover',
					'priority'   => 8
				)
			)
		);

	endif;

	

	

	/**********************************************/

    /**********	TESTIMONIALS SECTION **************/

	/**********************************************/

	
	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_8', array(
			'priority' => 37,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Testimonials section', 'zerif' )
		) );
		
		/* TESTIMONIALS SETTINGS */
		
		$wp_customize->add_section( 'zerif_testimonials_settings_section' , array(

				'title'       => __( 'Settings', 'zerif' ),

				'priority'    => 1,

				'panel' => 'panel_8'
		));
		
		/* zerif_testimonials_show */
		$wp_customize->add_setting( 'zerif_testimonials_show');

		$wp_customize->add_control(
			'zerif_testimonials_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide testimonials section?','zerif'),
				'description' => __('If you check this box, the Testimonials section will disappear from homepage.','zerif'),
				'section' => 'zerif_testimonials_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_testimonials_show' )->transport = 'postMessage';


		$wp_customize->add_setting( 'zerif_testimonials_pinterest_style');

		$wp_customize->add_control(
			'zerif_testimonials_pinterest_style',
			array(
				'type' 			=> 'checkbox',
				'label' 		=> __('Use pinterest layout?','zerif'),
				'description' 	=> __('If you check this box, the Testimonials section will use pinterest-style layout.','zerif'),
				'section' 		=> 'zerif_testimonials_settings_section',
				'priority'    	=> 2,
			)
		);

		
		/* TESTIMONIALS HEADER */
		
		$wp_customize->add_section( 'zerif_testimonials_texts_section' , array(
				'title'       => __( 'Header', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_8'
		));
		
		/* zerif_testimonials_title */
		$wp_customize->add_setting( 'zerif_testimonials_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Testimonials','zerif')));

		$wp_customize->add_control( 'zerif_testimonials_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_testimonials_texts_section',
				'settings' => 'zerif_testimonials_title',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_testimonials_title' )->transport = 'postMessage';

		/* zerif_testimonials_subtitle */
		$wp_customize->add_setting( 'zerif_testimonials_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_testimonials_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_testimonials_texts_section',
				'settings' => 'zerif_testimonials_subtitle',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_testimonials_subtitle' )->transport = 'postMessage';
		
		/* TESTIMONIALS CONTENT */
		
		$wp_customize->add_section( 'zerif_testimonials_content_section' , array(
				'title'       => __( 'Content', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_8'
		));
		
		$wp_customize->add_setting( 'zerif_testimonials_content_section' );
	
		$wp_customize->add_control( new Zerif_Testimonials_Widgets( $wp_customize, 'zerif_testimonials_content_section',
			array(
				'section' => 'zerif_testimonials_content_section',
		   )
		));
		
		/* TESTIMONIALS COLORS */

		$wp_customize->add_section( 'zerif_testimonials_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 4,
				'panel' => 'panel_8'
		));
		
		/* zerif_testimonials_background */
		$wp_customize->add_setting( 'zerif_testimonials_background', array( 'default' => '#dbbf56' ) );
							 
		$wp_customize->add_control(
								new Zerif_Customize_Alpha_Color_Control(
									$wp_customize,
									'zerif_testimonials_background',
									array(
										'label'    => __( 'Background color', 'zerif' ),
										'palette' => true,
										'section'  => 'zerif_testimonials_colors_section',
										'priority'   => 1
									)
								)
		);
		
		$wp_customize->get_setting( 'zerif_testimonials_background' )->transport = 'postMessage';
		
		/* zerif_testimonials_header */
		$wp_customize->add_setting( 'zerif_testimonials_header', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_testimonials_header',
				array(
					'label'      => __( 'Title and subtitle colors', 'zerif' ),
					'section'    => 'zerif_testimonials_colors_section',
					'settings'   => 'zerif_testimonials_header',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_testimonials_header' )->transport = 'postMessage';
		
		/* zerif_testimonials_text */
		$wp_customize->add_setting( 'zerif_testimonials_text', array( 'default' => '#909090' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_testimonials_text',
				array(
					'label'      => __( 'Testimonial text color', 'zerif' ),
					'section'    => 'zerif_testimonials_colors_section',
					'settings'   => 'zerif_testimonials_text',
					'priority'   => 3
				)
			)
		);	
		
		$wp_customize->get_setting( 'zerif_testimonials_text' )->transport = 'postMessage';
		
		/* zerif_testimonials_author */
		$wp_customize->add_setting( 'zerif_testimonials_author', array( 'default' => '#909090' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_testimonials_author',
				array(
					'label'      => __( 'Testimonial author name color', 'zerif' ),
					'section'    => 'zerif_testimonials_colors_section',
					'settings'   => 'zerif_testimonials_author',
					'priority'   => 4
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_testimonials_author' )->transport = 'postMessage';
		
		/* zerif_testimonials_quote */
		$wp_customize->add_setting( 'zerif_testimonials_quote', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_testimonials_quote',
				array(
					'label'      => __( 'Testimonial quote color', 'zerif' ),
					'section'    => 'zerif_testimonials_colors_section',
					'settings'   => 'zerif_testimonials_quote',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_testimonials_quote' )->transport = 'postMessage';
		
	else: /* Old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_testimonials_section' , array(
				'title'       => __( 'Testimonials section', 'zerif' ),
				'priority'    => 37
		));
		
		/* zerif_testimonials_show */
		$wp_customize->add_setting( 'zerif_testimonials_show');

		$wp_customize->add_control(
			'zerif_testimonials_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide testimonials section?','zerif'),
				'description' => __('If you check this box, the Testimonials section will disappear from homepage.','zerif'),
				'section' => 'zerif_testimonials_section',
				'priority'    => 1,
			)
		);
		
		/* zerif_testimonials_title */
		$wp_customize->add_setting( 'zerif_testimonials_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Testimonials','zerif')));

		$wp_customize->add_control( 'zerif_testimonials_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_testimonials_section',
				'settings' => 'zerif_testimonials_title',
				'priority'    => 2,
		));
		
		/* zerif_testimonials_subtitle */
		$wp_customize->add_setting( 'zerif_testimonials_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_testimonials_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_testimonials_section',
				'settings' => 'zerif_testimonials_subtitle',
				'priority'    => 3,
		));
		
		/* zerif_testimonials_background */
		$wp_customize->add_setting( 'zerif_testimonials_background', array( 'default' => '#dbbf56' ) );
							 
		$wp_customize->add_control(
								new Zerif_Customize_Alpha_Color_Control(
									$wp_customize,
									'zerif_testimonials_background',
									array(
										'label'    => __( 'Background color', 'zerif' ),
										'palette' => true,
										'section'  => 'zerif_testimonials_section',
										'priority'   => 4
									)
								)
		);
		
		/* zerif_testimonials_header */
		$wp_customize->add_setting( 'zerif_testimonials_header', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_testimonials_header',
				array(
					'label'      => __( 'Title and subtitle colors', 'zerif' ),
					'section'    => 'zerif_testimonials_section',
					'settings'   => 'zerif_testimonials_header',
					'priority'   => 5
				)
			)
		);
		
		/* zerif_testimonials_text */
		$wp_customize->add_setting( 'zerif_testimonials_text', array( 'default' => '#909090' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_testimonials_text',
				array(
					'label'      => __( 'Testimonial text color', 'zerif' ),
					'section'    => 'zerif_testimonials_section',
					'settings'   => 'zerif_testimonials_text',
					'priority'   => 6
				)
			)
		);
		
		/* zerif_testimonials_author */
		$wp_customize->add_setting( 'zerif_testimonials_author', array( 'default' => '#909090' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_testimonials_author',
				array(
					'label'      => __( 'Testimonial author name color', 'zerif' ),
					'section'    => 'zerif_testimonials_section',
					'settings'   => 'zerif_testimonials_author',
					'priority'   => 7
				)
			)
		);
		
		/* zerif_testimonials_quote */
		$wp_customize->add_setting( 'zerif_testimonials_quote', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_testimonials_quote',
				array(
					'label'      => __( 'Testimonial quote color', 'zerif' ),
					'section'    => 'zerif_testimonials_section',
					'settings'   => 'zerif_testimonials_quote',
					'priority'   => 8
				)
			)
		);
			
	endif;
	


	/***********************************************************/

	/********* RIBBONS ****************************************/

	/**********************************************************/

	
	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_9', array(
			'priority' => 38,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Ribbon sections', 'zerif' )
		) );
		
		$wp_customize->add_section( 'zerif_bottombribbon_section' , array(

				'title'       => __( 'BottomButton Ribbon', 'zerif' ),

				'priority'    => 1,

				'panel' => 'panel_9'
		));
		
		/* RIBBON SECTION WITH BOTTOM BUTTON */

		/* zerif_bottomribbon_text */
		$wp_customize->add_setting( 'zerif_bottomribbon_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_bottomribbon_text', array(
				'label'    => __( 'Main text', 'zerif' ),
				'section'  => 'zerif_bottombribbon_section',
				'settings' => 'zerif_bottomribbon_text',
				'priority'    => 1,
		));

		$wp_customize->get_setting( 'zerif_bottomribbon_text' )->transport = 'postMessage';	

		/* zerif_bottomribbon_buttonlabel */
		$wp_customize->add_setting( 'zerif_bottomribbon_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_bottomribbon_buttonlabel', array(
				'label'    => __( 'Button label', 'zerif' ),
				'description' => __( 'The button link must be filled too, for the button to show up.', 'zerif' ),
				'section'  => 'zerif_bottombribbon_section',
				'settings' => 'zerif_bottomribbon_buttonlabel',
				'priority'    => 2,
		));

		$wp_customize->get_setting( 'zerif_bottomribbon_buttonlabel' )->transport = 'postMessage';	

		/* zerif_bottomribbon_buttonlink */
		$wp_customize->add_setting( 'zerif_bottomribbon_buttonlink', array('sanitize_callback' => 'esc_url'));

		$wp_customize->add_control( 'zerif_bottomribbon_buttonlink', array(
				'label'    => __( 'Button link', 'zerif' ),
				'description' => __( 'The button label must be filled too, for the button to show up.', 'zerif' ),
				'section'  => 'zerif_bottombribbon_section',
				'settings' => 'zerif_bottomribbon_buttonlink',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_bottomribbon_buttonlink' )->transport = 'postMessage';	
		
		/* zerif_ribbon_background */
		$wp_customize->add_setting( 'zerif_ribbon_background', array( 'default' => 'rgba(52, 210, 147, 0.8)' ) );
								 
		$wp_customize->add_control(
						new Zerif_Customize_Alpha_Color_Control(
							$wp_customize,
							'zerif_ribbon_background',
							array(
								'label'    => __( 'Background color', 'zerif' ),
								'palette' => true,
								'section'  => 'zerif_bottombribbon_section',
								'priority'   => 4
							)
						)
		);
		
		$wp_customize->get_setting( 'zerif_ribbon_background' )->transport = 'postMessage';
		
		/* zerif_ribbon_text_color */
		$wp_customize->add_setting( 'zerif_ribbon_text_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ribbon_text_color',
				array(
					'label'      => __( 'Text color', 'zerif' ),
					'section'    => 'zerif_bottombribbon_section',
					'settings'   => 'zerif_ribbon_text_color',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ribbon_text_color' )->transport = 'postMessage';
		
		/* zerif_ribbon_button_background */
		$wp_customize->add_setting( 'zerif_ribbon_button_background', array( 'default' => '#20AA73' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ribbon_button_background',
				array(
					'label'      => __( 'Button background color', 'zerif' ),
					'section'    => 'zerif_bottombribbon_section',
					'settings'   => 'zerif_ribbon_button_background',
					'priority'   => 6
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ribbon_button_background' )->transport = 'postMessage';

		/* zerif_ribbon_button_background_hover */
		$wp_customize->add_setting( 'zerif_ribbon_button_background_hover', array( 'default' => '#14a168' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ribbon_button_background_hover',
				array(
					'label'      => __( 'Button background color hover', 'zerif' ),
					'section'    => 'zerif_bottombribbon_section',
					'settings'   => 'zerif_ribbon_button_background_hover',
					'priority'   => 7
				)
			)
		);

		$wp_customize->get_setting( 'zerif_ribbon_button_background_hover' )->transport = 'postMessage';

		/* RIBBON SECTION WITH BUTTON IN THE RIGHT SIDE */

		$wp_customize->add_section( 'zerif_rightbribbon_section' , array(
				'title'       => __( 'RightButton Ribbon', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_9'
		));

		/* zerif_ribbonright_text */	
		$wp_customize->add_setting( 'zerif_ribbonright_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_ribbonright_text', array(
				'label'    => __( 'Main text', 'zerif' ),
				'section'  => 'zerif_rightbribbon_section',
				'settings' => 'zerif_ribbonright_text',
				'priority'    => 1,
		));
		
		$wp_customize->get_setting( 'zerif_ribbonright_text' )->transport = 'postMessage';	

		/* zerif_ribbonright_buttonlabel */
		$wp_customize->add_setting( 'zerif_ribbonright_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_ribbonright_buttonlabel', array(
				'label'    => __( 'Button label', 'zerif' ),
				'description' => __( 'The button link must be filled too, for the button to show up.', 'zerif' ),
				'section'  => 'zerif_rightbribbon_section',
				'settings' => 'zerif_ribbonright_buttonlabel',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_ribbonright_buttonlabel' )->transport = 'postMessage';	

		/* zerif_ribbonright_buttonlink */
		$wp_customize->add_setting( 'zerif_ribbonright_buttonlink', array('sanitize_callback' => 'esc_url_raw'));

		$wp_customize->add_control( 'zerif_ribbonright_buttonlink', array(
				'label'    => __( 'Button link', 'zerif' ),
				'description' => __( 'The button label must be filled too, for the button to show up.', 'zerif' ),
				'section'  => 'zerif_rightbribbon_section',
				'settings' => 'zerif_ribbonright_buttonlink',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_ribbonright_buttonlink' )->transport = 'postMessage';	
		
		/* zerif_ribbonright_background */
		$wp_customize->add_setting( 'zerif_ribbonright_background', array( 'default' => '#e96656' ) );
								 
		$wp_customize->add_control(
						new Zerif_Customize_Alpha_Color_Control(
							$wp_customize,
							'zerif_ribbonright_background',
							array(
								'label'    => __( 'Background color', 'zerif' ),
								'palette' => true,
								'section'  => 'zerif_rightbribbon_section',
								'priority'   => 4
							)
						)
		);
		
		$wp_customize->get_setting( 'zerif_ribbonright_background' )->transport = 'postMessage';	
		
		/* zerif_ribbonright_text_color */
		$wp_customize->add_setting( 'zerif_ribbonright_text_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ribbonright_text_color',
				array(
					'label'      => __( 'Text color', 'zerif' ),
					'section'    => 'zerif_rightbribbon_section',
					'settings'   => 'zerif_ribbonright_text_color',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ribbonright_text_color' )->transport = 'postMessage';	

		/* zerif_ribbonright_button_background */
		$wp_customize->add_setting( 'zerif_ribbonright_button_background', array( 'default' => '#db5a4a' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ribbonright_button_background',
				array(
					'label'      => __( 'Button background color', 'zerif' ),
					'section'    => 'zerif_rightbribbon_section',
					'settings'   => 'zerif_ribbonright_button_background',
					'priority'   => 6
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ribbonright_button_background' )->transport = 'postMessage';	

		/* zerif_ribbonright_button_background_hover */
		$wp_customize->add_setting( 'zerif_ribbonright_button_background_hover', array( 'default' => '#bf3928' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_ribbonright_button_background_hover',
				array(
					'label'      => __( 'Button background color hover', 'zerif' ),
					'section'    => 'zerif_rightbribbon_section',
					'settings'   => 'zerif_ribbonright_button_background_hover',
					'priority'   => 7
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_ribbonright_button_background_hover' )->transport = 'postMessage';
		
	else: /* Old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_ribbon_section' , array(
				'title'       => __( 'Ribbon sections', 'zerif' ),
				'priority'    => 38
		));
			
		/* RIBBON SECTION WITH BOTTOM BUTTON */

		/* zerif_bottomribbon_text */	
		$wp_customize->add_setting( 'zerif_bottomribbon_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_bottomribbon_text', array(
					'label'    => __( 'BottomButton Ribbon - Main text', 'zerif' ),
					'section'  => 'zerif_ribbon_section',
					'settings' => 'zerif_bottomribbon_text',
					'priority'    => 1,
		));

		/* zerif_bottomribbon_buttonlabel */
		$wp_customize->add_setting( 'zerif_bottomribbon_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_bottomribbon_buttonlabel', array(
					'label'    => __( 'BottomButton Ribbon - Button label', 'zerif' ),
					'description' => __( 'The button link must be filled too, for the button to show up.', 'zerif' ),
					'section'  => 'zerif_ribbon_section',
					'settings' => 'zerif_bottomribbon_buttonlabel',
					'priority'    => 2,
		));

		/* zerif_bottomribbon_buttonlink */
		$wp_customize->add_setting( 'zerif_bottomribbon_buttonlink', array('sanitize_callback' => 'esc_url_raw'));

		$wp_customize->add_control( 'zerif_bottomribbon_buttonlink', array(
					'label'    => __( 'BottomButton Ribbon - Button link', 'zerif' ),
					'description' => __( 'The button label must be filled too, for the button to show up.', 'zerif' ),
					'section'  => 'zerif_ribbon_section',
					'settings' => 'zerif_bottomribbon_buttonlink',
					'priority'    => 3,
		));
			
		/* zerif_ribbon_background */
		$wp_customize->add_setting( 'zerif_ribbon_background', array( 'default' => 'rgba(52, 210, 147, 0.8)' ) );
									 
		$wp_customize->add_control(
							new Zerif_Customize_Alpha_Color_Control(
								$wp_customize,
								'zerif_ribbon_background',
								array(
									'label'    => __( 'BottomButton Ribbon - background color', 'zerif' ),
									'palette' => true,
									'section'  => 'zerif_ribbon_section',
									'priority'   => 4
								)
							)
		);
			
		/* zerif_ribbon_text_color */
		$wp_customize->add_setting( 'zerif_ribbon_text_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ribbon_text_color',
					array(
						'label'      => __( 'BottomButton Ribbon - text color', 'zerif' ),
						'section'    => 'zerif_ribbon_section',
						'settings'   => 'zerif_ribbon_text_color',
						'priority'   => 5
					)
				)
		);
		
		/* zerif_ribbon_button_background */
		$wp_customize->add_setting( 'zerif_ribbon_button_background', array( 'default' => '#20AA73' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ribbon_button_background',
					array(
						'label'      => __( 'BottomButton Ribbon - button background color', 'zerif' ),
						'section'    => 'zerif_ribbon_section',
						'settings'   => 'zerif_ribbon_button_background',
						'priority'   => 6
					)
				)
		);

		/* zerif_ribbon_button_background_hover */
		$wp_customize->add_setting( 'zerif_ribbon_button_background_hover', array( 'default' => '#14a168' ) );
		
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ribbon_button_background_hover',
					array(
						'label'      => __( 'BottomButton Ribbon - button background color hover', 'zerif' ),
						'section'    => 'zerif_ribbon_section',
						'settings'   => 'zerif_ribbon_button_background_hover',
						'priority'   => 7
					)
				)
		);

		/* RIBBON SECTION WITH BUTTON IN THE RIGHT SIDE */

		/* zerif_ribbonright_text */	
		$wp_customize->add_setting( 'zerif_ribbonright_text', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_ribbonright_text', array(
					'label'    => __( 'RightButton Ribbon - Main text', 'zerif' ),
					'section'  => 'zerif_ribbon_section',
					'settings' => 'zerif_ribbonright_text',
					'priority'    => 8,
		));

		/* zerif_ribbonright_buttonlabel */
		$wp_customize->add_setting( 'zerif_ribbonright_buttonlabel', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_ribbonright_buttonlabel', array(
					'label'    => __( 'RightButton Ribbon - Button label', 'zerif' ),
					'description' => __( 'The button link must be filled too, for the button to show up.', 'zerif' ),
					'section'  => 'zerif_ribbon_section',
					'settings' => 'zerif_ribbonright_buttonlabel',
					'priority'    => 9,
		));

		/* zerif_ribbonright_buttonlink */
		$wp_customize->add_setting( 'zerif_ribbonright_buttonlink', array('sanitize_callback' => 'esc_url_raw'));

		$wp_customize->add_control( 'zerif_ribbonright_buttonlink', array(
					'label'    => __( 'RightButton Ribbon - Button link', 'zerif' ),
					'description' => __( 'The button label must be filled too, for the button to show up.', 'zerif' ),
					'section'  => 'zerif_ribbon_section',
					'settings' => 'zerif_ribbonright_buttonlink',
					'priority'    => 10,
		));
		
		/* zerif_ribbonright_background */
		$wp_customize->add_setting( 'zerif_ribbonright_background', array( 'default' => '#e96656' ) );

		$wp_customize->add_control(
							new Zerif_Customize_Alpha_Color_Control(
								$wp_customize,
								'zerif_ribbonright_background',
								array(
									'label'    => __( 'RightButton Ribbon - section background', 'zerif' ),
									'palette' => true,
									'section'  => 'zerif_ribbon_section',
									'priority'   => 11
								)
							)
		);
		
		/* zerif_ribbonright_text_color */
		$wp_customize->add_setting( 'zerif_ribbonright_text_color', array( 'default' => '#fff' ) );		
			
		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ribbonright_text_color',
					array(
						'label'      => __( 'RightButton Ribbon - color text', 'zerif' ),
						'section'    => 'zerif_ribbon_section',
						'settings'   => 'zerif_ribbonright_text_color',
						'priority'   => 12
					)
				)
		);
		
		/* zerif_ribbonright_button_background */
		$wp_customize->add_setting( 'zerif_ribbonright_button_background', array( 'default' => '#db5a4a' ) );

		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ribbonright_button_background',
					array(
						'label'      => __( 'RightButton Ribbon - button background color', 'zerif' ),
						'section'    => 'zerif_ribbon_section',
						'settings'   => 'zerif_ribbonright_button_background',
						'priority'   => 13
					)
				)
		);
		
		/* zerif_ribbonright_button_background_hover */
		$wp_customize->add_setting( 'zerif_ribbonright_button_background_hover', array( 'default' => '#bf3928' ) );

		$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'zerif_ribbonright_button_background_hover',
					array(
						'label'      => __( 'RightButton Ribbon - button background color hover', 'zerif' ),
						'section'    => 'zerif_ribbon_section',
						'settings'   => 'zerif_ribbonright_button_background_hover',
						'priority'   => 14
					)
				)
		);
			
	endif;

	/*******************************************************/

    /************	CONTACT US SECTION *********************/

	/*******************************************************/
	
	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_10', array(
			'priority' => 39,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Contact us section', 'zerif' )
		) );

		/* CONTACT US SETTINGS */
		
		$wp_customize->add_section( 'zerif_contactus_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_10'
		));

		/* zerif_contactus_show */
		$wp_customize->add_setting( 'zerif_contactus_show');

		$wp_customize->add_control(
			'zerif_contactus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide contact us section?','zerif'),
				'description' => __('If you check this box, the Contact us section will disappear from homepage.','zerif'),
				'section' => 'zerif_contactus_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_contactus_show' )->transport = 'postMessage';

		/* zerif_contactus_email */
		$wp_customize->add_setting( 'zerif_contactus_email', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_contactus_email', array(
				'label'    => __( 'Email address', 'zerif' ),
				'description' => __('The contact us form is submitted to this email address.','zerif'),
				'section'  => 'zerif_contactus_settings_section',
				'settings' => 'zerif_contactus_email',
				'priority'    => 4,
		));

		/* zerif_contactus_recaptcha_show */
		$wp_customize->add_setting( 'zerif_contactus_recaptcha_show', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control(
			'zerif_contactus_recaptcha_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide reCaptcha?','zerif'),
				'description' => __('If you check this box, the reCaptcha will not be enabled on the Contact us form.','zerif'),
				'section' => 'zerif_contactus_settings_section',
				'priority'    => 10,
			)
		);

		/* zerif_contactus_sitekey */
		$wp_customize->add_setting( 'zerif_contactus_sitekey', array('sanitize_callback' => 'zerif_sanitize_text'));	

		$wp_customize->add_control( 'zerif_contactus_sitekey', array(
					'label'    => __( 'Site key', 'zerif' ),
					'description' => '<a href="https://www.google.com/recaptcha/admin#list" target="_blank">'.__('Create an account here','zerif').'</a> to get the Site key and the Secret key for the reCaptcha.',
					'section'  => 'zerif_contactus_settings_section',
					'settings' => 'zerif_contactus_sitekey',
					'priority'    => 11,
		));

		/* zerif_contactus_secretkey */
		$wp_customize->add_setting( 'zerif_contactus_secretkey', array('sanitize_callback' => 'zerif_sanitize_text'));	

		$wp_customize->add_control( 'zerif_contactus_secretkey', array(
					'label'    => __( 'Secret key', 'zerif' ),
					'section'  => 'zerif_contactus_settings_section',
					'settings' => 'zerif_contactus_secretkey',
					'priority'    => 12,
		));
		
		/* CONTACT US MAIN CONTENT */
		
		$wp_customize->add_section( 'zerif_contactus_texts_section' , array(
				'title'       => __( 'Main content', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_10'
		));
		
		/* zerif_contactus_title */
		$wp_customize->add_setting( 'zerif_contactus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Get in touch','zerif')));

		$wp_customize->add_control( 'zerif_contactus_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_contactus_texts_section',
				'settings' => 'zerif_contactus_title',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_contactus_title' )->transport = 'postMessage';

		/* zerif_contactus_subtitle */
		$wp_customize->add_setting( 'zerif_contactus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_contactus_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_contactus_texts_section',
				'settings' => 'zerif_contactus_subtitle',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_contactus_subtitle' )->transport = 'postMessage';
		
		/* zerif_contactus_name_placeholder */
		$wp_customize->add_setting( 'zerif_contactus_name_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Name','zerif')));

		$wp_customize->add_control( 'zerif_contactus_name_placeholder', array(
				'label'    => __( 'Placeholder for "Your Name" input ', 'zerif' ),
				'section'  => 'zerif_contactus_texts_section',
				'settings' => 'zerif_contactus_name_placeholder',
				'priority'    => 4,
		));
		
		$wp_customize->get_setting( 'zerif_contactus_name_placeholder' )->transport = 'postMessage';
		
		/* zerif_contactus_email_placeholder */
		$wp_customize->add_setting( 'zerif_contactus_email_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Email','zerif')));

		$wp_customize->add_control( 'zerif_contactus_email_placeholder', array(
				'label'    => __( 'Placeholder for "Your Email" input', 'zerif' ),
				'section'  => 'zerif_contactus_texts_section',
				'settings' => 'zerif_contactus_email_placeholder',
				'priority'    => 5,
		));
		
		$wp_customize->get_setting( 'zerif_contactus_email_placeholder' )->transport = 'postMessage';
		
		/* zerif_contactus_subject_placeholder */
		$wp_customize->add_setting( 'zerif_contactus_subject_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Subject','zerif')));

		$wp_customize->add_control( 'zerif_contactus_subject_placeholder', array(
				'label'    => __( 'Placeholder for "Subject" input', 'zerif' ),
				'section'  => 'zerif_contactus_texts_section',
				'settings' => 'zerif_contactus_subject_placeholder',
				'priority'    => 6,
		));
		
		$wp_customize->get_setting( 'zerif_contactus_subject_placeholder' )->transport = 'postMessage';
		
		/* zerif_contactus_message_placeholder */
		$wp_customize->add_setting( 'zerif_contactus_message_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Message','zerif')));

		$wp_customize->add_control( 'zerif_contactus_message_placeholder', array(
				'label'    => __( 'Placeholder for "Message" input', 'zerif' ),
				'section'  => 'zerif_contactus_texts_section',
				'settings' => 'zerif_contactus_message_placeholder',
				'priority'    => 7,
		));
		
		$wp_customize->get_setting( 'zerif_contactus_message_placeholder' )->transport = 'postMessage';
		
		/* zerif_contactus_button_label */
		$wp_customize->add_setting( 'zerif_contactus_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Send Message','zerif')));

		$wp_customize->add_control( 'zerif_contactus_button_label', array(
				'label'    => __( 'Send message button label', 'zerif' ),
				'section'  => 'zerif_contactus_texts_section',
				'settings' => 'zerif_contactus_button_label',
				'priority'    => 8,
		));

		$wp_customize->get_setting( 'zerif_contactus_button_label' )->transport = 'postMessage';
		
		/* CONTACT US MAIN COLORS */
		
		$wp_customize->add_section( 'zerif_contactus_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_10'
		));

		/* zerif_contacus_background */
		$wp_customize->add_setting( 'zerif_contacus_background', array( 'default' => 'rgba(0, 0, 0, 0.5)' ) );
									 
		$wp_customize->add_control(
							new Zerif_Customize_Alpha_Color_Control(
								$wp_customize,
								'zerif_contacus_background',
								array(
									'label'    => __( 'Background color', 'zerif' ),
									'palette' => true,
									'section'  => 'zerif_contactus_colors_section',
									'priority'   => 1
								)
							)
		);
		
		$wp_customize->get_setting( 'zerif_contacus_background' )->transport = 'postMessage';
		
		/* zerif_contacus_header */
		$wp_customize->add_setting( 'zerif_contacus_header', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_contacus_header',
				array(
					'label'      => __( 'Title and subtitle color', 'zerif' ),
					'section'    => 'zerif_contactus_colors_section',
					'settings'   => 'zerif_contacus_header',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_contacus_header' )->transport = 'postMessage';
		
		/* zerif_contacus_button_background */
		$wp_customize->add_setting( 'zerif_contacus_button_background', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_contacus_button_background',
				array(
					'label'      => __( 'Submit button background color', 'zerif' ),
					'section'    => 'zerif_contactus_colors_section',
					'settings'   => 'zerif_contacus_button_background',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_contacus_button_background' )->transport = 'postMessage';
		
		/* zerif_contacus_button_background_hover */
		$wp_customize->add_setting( 'zerif_contacus_button_background_hover', array( 'default' => '#cb4332' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_contacus_button_background_hover',
				array(
					'label'      => __( 'Submit button background color - hover', 'zerif' ),
					'section'    => 'zerif_contactus_colors_section',
					'settings'   => 'zerif_contacus_button_background_hover',
					'priority'   => 4
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
					'label'      => __( 'Section button color', 'zerif' ),
					'section'    => 'zerif_contactus_colors_section',
					'settings'   => 'zerif_contacus_button_color',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_contacus_button_color' )->transport = 'postMessage';
		
	else: /* For old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_contactus_section' , array(
				'title'       => __( 'Contact us section', 'zerif' ),
				'priority'    => 39
		));
		
		/* zerif_contactus_show */
		$wp_customize->add_setting( 'zerif_contactus_show');

		$wp_customize->add_control(
			'zerif_contactus_show',
			array(
				'type' => 'checkbox',
				'label' => __('Hide contact us section?','zerif'),
				'description' => __('If you check this box, the Contact us section will disappear from homepage.','zerif'),
				'section' => 'zerif_contactus_section',
				'priority'    => 1,
			)
		);

		/* zerif_contactus_title */
		$wp_customize->add_setting( 'zerif_contactus_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Get in touch','zerif')));

		$wp_customize->add_control( 'zerif_contactus_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_title',
				'priority'    => 2,
		));
		
		/* zerif_contactus_subtitle */
		$wp_customize->add_setting( 'zerif_contactus_subtitle', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_contactus_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_subtitle',
				'priority'    => 3,
		));
		
		/* zerif_contactus_email */
		$wp_customize->add_setting( 'zerif_contactus_email', array('sanitize_callback' => 'zerif_sanitize_text'));

		$wp_customize->add_control( 'zerif_contactus_email', array(
				'label'    => __( 'Email address', 'zerif' ),
				'description' => __('The contact us form is submitted to this email address.','zerif'),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_email',
				'priority'    => 4,
		));
		
		/* zerif_contactus_button_label */
		$wp_customize->add_setting( 'zerif_contactus_button_label', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Send Message','zerif')));

		$wp_customize->add_control( 'zerif_contactus_button_label', array(
				'label'    => __( 'Send message button label', 'zerif' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_button_label',
				'priority'    => 5,
		));
		
		/* zerif_contactus_name_placeholder */
		$wp_customize->add_setting( 'zerif_contactus_name_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Name','zerif')));

		$wp_customize->add_control( 'zerif_contactus_name_placeholder', array(
				'label'    => __( 'Placeholder for "Your Name" input ', 'zerif' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_name_placeholder',
				'priority'    => 6,
		));
		
		/* zerif_contactus_email_placeholder */
		$wp_customize->add_setting( 'zerif_contactus_email_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Email','zerif')));

		$wp_customize->add_control( 'zerif_contactus_email_placeholder', array(
				'label'    => __( 'Placeholder for "Your Email" input', 'zerif' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_email_placeholder',
				'priority'    => 7,
		));
		
		/* zerif_contactus_subject_placeholder */
		$wp_customize->add_setting( 'zerif_contactus_subject_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Subject','zerif')));

		$wp_customize->add_control( 'zerif_contactus_subject_placeholder', array(
				'label'    => __( 'Placeholder for "Subject" input', 'zerif' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_subject_placeholder',
				'priority'    => 8,
		));
		
		/* zerif_contactus_message_placeholder */
		$wp_customize->add_setting( 'zerif_contactus_message_placeholder', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Your Message','zerif')));

		$wp_customize->add_control( 'zerif_contactus_message_placeholder', array(
				'label'    => __( 'Placeholder for "Message" input', 'zerif' ),
				'section'  => 'zerif_contactus_section',
				'settings' => 'zerif_contactus_message_placeholder',
				'priority'    => 9,
		));
		
		/* zerif_contacus_background */
		$wp_customize->add_setting( 'zerif_contacus_background', array( 'default' => 'rgba(0, 0, 0, 0.5)' ) );
									 
		$wp_customize->add_control(
							new Zerif_Customize_Alpha_Color_Control(
								$wp_customize,
								'zerif_contacus_background',
								array(
									'label'    => __( 'Background color', 'zerif' ),
									'palette' => true,
									'section'  => 'zerif_contactus_section',
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
					'label'      => __( 'Title and subtitle color', 'zerif' ),
					'section'    => 'zerif_contactus_section',
					'settings'   => 'zerif_contacus_header',
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
					'label'      => __( 'Submit button background color', 'zerif' ),
					'section'    => 'zerif_contactus_section',
					'settings'   => 'zerif_contacus_button_background',
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
					'label'      => __( 'Submit button background color - hover', 'zerif' ),
					'section'    => 'zerif_contactus_section',
					'settings'   => 'zerif_contacus_button_background_hover',
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
					'label'      => __( 'Section button color', 'zerif' ),
					'section'    => 'zerif_contactus_section',
					'settings'   => 'zerif_contacus_button_color',
					'priority'   => 14
				)
			)
		);

	endif;	
	
	/*******************************************************/

    /************	PACKAGES SECTION ***********************/

	/*******************************************************/

	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_11', array(
			'priority' => 40,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Packages section', 'zerif' )
		) );
		
		/* PACKAGES SETTINGS */
		
		$wp_customize->add_section( 'zerif_packages_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_11'
		));
		
		/* zerif_packages_show */
		$wp_customize->add_setting( 'zerif_packages_show');

		$wp_customize->add_control(
			'zerif_packages_show',
			array(
				'type' => 'checkbox',
				'label' => __('Show packages section?','zerif'),
				'description' => __('If you check this box, the Packages section will appear on homepage.','zerif'),
				'section' => 'zerif_packages_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_packages_show' )->transport = 'postMessage';
		
		/* PACKAGES HEADER */
		
		$wp_customize->add_section( 'zerif_packages_texts_section' , array(
				'title'       => __( 'Header', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_11'
		));

		/* zerif_packages_title */
		$wp_customize->add_setting( 'zerif_packages_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('PACKAGES','zerif')));

		$wp_customize->add_control( 'zerif_packages_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_packages_texts_section',
				'settings' => 'zerif_packages_title',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_packages_title' )->transport = 'postMessage';

		/* zerif_packages_subtitle */
		$wp_customize->add_setting( 'zerif_packages_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('We have 4 friendly packages for you. Check all the packages and choose the right one for you.','zerif')));

		$wp_customize->add_control( 'zerif_packages_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_packages_texts_section',
				'settings' => 'zerif_packages_subtitle',
				'priority'    => 3,
		));
		
		$wp_customize->get_setting( 'zerif_packages_subtitle' )->transport = 'postMessage';
		
		/* PACKAGES CONTENT */
		
		$wp_customize->add_section( 'zerif_packages_content_section' , array(
				'title'       => __( 'Main content', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_11'
		));
		
		$wp_customize->add_setting( 'zerif_packages_content_section' );
	
		$wp_customize->add_control( new Zerif_Packages_Widgets( $wp_customize, 'zerif_packages_content_section',
			array(
				'section' => 'zerif_packages_content_section',
		   )
		));
		
		/* PACKAGES COLORS */
		
		$wp_customize->add_section( 'zerif_packages_colors_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 4,
				'panel' => 'panel_11'
		));

		/* zerif_packages_header */
		$wp_customize->add_setting( 'zerif_packages_header', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_packages_header',
				array(
					'label'      => __( 'Title and subtitle colors', 'zerif' ),
					'section'    => 'zerif_packages_colors_section',
					'settings'   => 'zerif_packages_header',
					'priority'   => 1
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_packages_header' )->transport = 'postMessage';
		
		/* zerif_package_title_color */
		$wp_customize->add_setting( 'zerif_package_title_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_title_color',
				array(
					'label'      => __( 'Package title color', 'zerif' ),
					'section'    => 'zerif_packages_colors_section',
					'settings'   => 'zerif_package_title_color',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_package_title_color' )->transport = 'postMessage';
		
		/* zerif_package_text_color */
		$wp_customize->add_setting( 'zerif_package_text_color', array( 'default' => '#808080' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_text_color',
				array(
					'label'      => __( 'Package text color', 'zerif' ),
					'section'    => 'zerif_packages_colors_section',
					'settings'   => 'zerif_package_text_color',
					'priority'   => 3
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_package_text_color' )->transport = 'postMessage';
		
		/* zerif_package_button_text_color */
		$wp_customize->add_setting( 'zerif_package_button_text_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_button_text_color',
				array(
					'label'      => __( 'Package button text color', 'zerif' ),
					'section'    => 'zerif_packages_colors_section',
					'settings'   => 'zerif_package_button_text_color',
					'priority'   => 4
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_package_button_text_color' )->transport = 'postMessage';
		
		/* zerif_package_price_background_color */
		$wp_customize->add_setting( 'zerif_package_price_background_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_price_background_color',
				array(
					'label'      => __( 'Package price background color', 'zerif' ),
					'section'    => 'zerif_packages_colors_section',
					'settings'   => 'zerif_package_price_background_color',
					'priority'   => 5
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_package_price_background_color' )->transport = 'postMessage';
		
		/* zerif_package_price_color */
		$wp_customize->add_setting( 'zerif_package_price_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_price_color',
				array(
					'label'      => __( 'Package price color', 'zerif' ),
					'section'    => 'zerif_packages_colors_section',
					'settings'   => 'zerif_package_price_color',
					'priority'   => 6
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_package_price_color' )->transport = 'postMessage';
		
	else: /* For old versions of WordPress */
		
		$wp_customize->add_section( 'zerif_packages_section' , array(
				'title'       => __( 'Packages section', 'zerif' ),
				'priority'    => 40
		));
		
		/* zerif_packages_show */
		$wp_customize->add_setting( 'zerif_packages_show');

		$wp_customize->add_control(
			'zerif_packages_show',
			array(
				'type' => 'checkbox',
				'label' => __('Show packages section?','zerif'),
				'description' => __('If you check this box, the Packages section will appear on homepage.','zerif'),
				'section' => 'zerif_packages_section',
				'priority'    => 1,
			)
		);
		
		/* zerif_packages_title */
		$wp_customize->add_setting( 'zerif_packages_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('PACKAGES','zerif')));

		$wp_customize->add_control( 'zerif_packages_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_packages_section',
				'settings' => 'zerif_packages_title',
				'priority'    => 2,
		));
		
		/* zerif_packages_subtitle */
		$wp_customize->add_setting( 'zerif_packages_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('We have 4 friendly packages for you. Check all the packages and choose the right one for you.','zerif')));

		$wp_customize->add_control( 'zerif_packages_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_packages_section',
				'settings' => 'zerif_packages_subtitle',
				'priority'    => 3,
		));
		
		/* zerif_packages_header */
		$wp_customize->add_setting( 'zerif_packages_header', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_packages_header',
				array(
					'label'      => __( 'Title and subtitle colors', 'zerif' ),
					'section'    => 'zerif_packages_section',
					'settings'   => 'zerif_packages_header',
					'priority'   => 4
				)
			)
		);
		
		/* zerif_package_title_color */
		$wp_customize->add_setting( 'zerif_package_title_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_title_color',
				array(
					'label'      => __( 'Package title color', 'zerif' ),
					'section'    => 'zerif_packages_section',
					'settings'   => 'zerif_package_title_color',
					'priority'   => 5
				)
			)
		);
		
		/* zerif_package_text_color */
		$wp_customize->add_setting( 'zerif_package_text_color', array( 'default' => '#808080' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_text_color',
				array(
					'label'      => __( 'Package text color', 'zerif' ),
					'section'    => 'zerif_packages_section',
					'settings'   => 'zerif_package_text_color',
					'priority'   => 6
				)
			)
		);
		
		/* zerif_package_button_text_color */
		$wp_customize->add_setting( 'zerif_package_button_text_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_button_text_color',
				array(
					'label'      => __( 'Package button text color', 'zerif' ),
					'section'    => 'zerif_packages_section',
					'settings'   => 'zerif_package_button_text_color',
					'priority'   => 7
				)
			)
		);
		
		/* zerif_package_price_background_color */
		$wp_customize->add_setting( 'zerif_package_price_background_color', array( 'default' => '#404040' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_price_background_color',
				array(
					'label'      => __( 'Package price background color', 'zerif' ),
					'section'    => 'zerif_packages_section',
					'settings'   => 'zerif_package_price_background_color',
					'priority'   => 8
				)
			)
		);
		
		/* zerif_package_price_color */
		$wp_customize->add_setting( 'zerif_package_price_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_package_price_color',
				array(
					'label'      => __( 'Package price color', 'zerif' ),
					'section'    => 'zerif_packages_section',
					'settings'   => 'zerif_package_price_color',
					'priority'   => 9
				)
			)
		);
		
	endif;

	/*******************************************************/

    /************	GOOGLE MAP SECTION *********************/

	/*******************************************************/
		
	$wp_customize->add_section( 'zerif_googlemap_section' , array(
			'title'       => __( 'Google map section', 'zerif' ),
			'priority'    => 41
	));
		
	/* zerif_googlemap_show */   
	$wp_customize->add_setting( 'zerif_googlemap_show');

	$wp_customize->add_control(
			'zerif_googlemap_show',
			array(
				'type' => 'checkbox',
				'label' => __('Show google map section?','zerif'),
				'description' => __('If you check this box, the Google map section will appear on homepage.','zerif'),
				'section' => 'zerif_googlemap_section',
				'priority'    => 1,
			)
	);

	/* zerif_googlemap_address */
	$wp_customize->add_setting( 'zerif_googlemap_address', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('New York, Leroy Street','zerif')));

	$wp_customize->add_control( 'zerif_googlemap_address', array(
				'label'    => __( 'Google map address', 'zerif' ),
				'section'  => 'zerif_googlemap_section',
				'settings' => 'zerif_googlemap_address',
				'priority'    => 2,
	));
		
	/* zerif_googlemap_static */
	$wp_customize->add_setting( 'zerif_googlemap_static');

	$wp_customize->add_control(
			'zerif_googlemap_static',
			array(
				'type' => 'checkbox',
				'label' => __('Show STATIC google map ?','zerif'),
				'description' => __('If you check this box, the Google map section will display as a static google map.','zerif'),
				'section' => 'zerif_googlemap_section',
				'priority'    => 3,
			)
	);
	
	/********************************************************/

    /************	LATEST NEWS SECTION *********************/

	/********************************************************/

	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_14', array(
			'priority' => 42,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Latest news section', 'zerif' )
		) );
		
		/* LATEST NEWS SETTINGS */
		
		$wp_customize->add_section( 'zerif_latest_news_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_14'
		));
		
		/* zerif_latest_news_show */  
		$wp_customize->add_setting( 'zerif_latest_news_show');

		$wp_customize->add_control(
			'zerif_latest_news_show',
			array(
				'type' => 'checkbox',
				'label' => __('Show latest news section?','zerif'),
				'description' => __('If you check this box, the Latest news section will appear on homepage.','zerif'),
				'section' => 'zerif_latest_news_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_latest_news_show' )->transport = 'postMessage';
		
		/* LATEST NEWS HEADER */
		
		$wp_customize->add_section( 'zerif_latest_news_section' , array(
				'title'       => __( 'Header', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_14'
		));
		
		/* zerif_latestnews_title */
		$wp_customize->add_setting( 'zerif_latestnews_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('LATEST NEWS','zerif')));

		$wp_customize->add_control( 'zerif_latestnews_title', array(
				'label'    		=> __( 'Main title', 'zerif' ),
				'section'  		=> 'zerif_latest_news_section',
				'settings' 		=> 'zerif_latestnews_title',
				'priority'    	=> 1,
		));

		$wp_customize->get_setting( 'zerif_latestnews_title' )->transport = 'postMessage';
		
		/* zerif_latestnews_subtitle */
		$wp_customize->add_setting( 'zerif_latestnews_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "Latest news section"','zerif')));

		$wp_customize->add_control( 'zerif_latestnews_subtitle', array(
				'label'    		=> __( 'Subtitle', 'zerif' ),
				'section'  		=> 'zerif_latest_news_section',
				'settings' 		=> 'zerif_latestnews_subtitle',
				'priority'   	=> 2,
		));
		
		$wp_customize->get_setting( 'zerif_latestnews_subtitle' )->transport = 'postMessage';
		
		/* LATEST NEWS CONTENT */
		
		$wp_customize->add_section( 'zerif_latest_news_content_section' , array(
				'title'       => __( 'Main content', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_14'
		));
		
		$wp_customize->add_setting( 'zerif_latest_news_content_section' );
	
		$wp_customize->add_control( new Zerif_LatestNews( $wp_customize, 'zerif_latest_news_content_section',
			array(
				'section' => 'zerif_latest_news_content_section',
		   )
		));

		
	else: /* Older versions of WordPress */
				
		$wp_customize->add_section( 'zerif_latest_news_section' , array(
				'title'       => __( 'Latest news section', 'zerif' ),
				'priority'    => 42
		));
		
		/* zerif_latest_news_show */
		$wp_customize->add_setting( 'zerif_latest_news_show' );

		$wp_customize->add_control(
			'zerif_latest_news_show',
			array(
				'type' => 'checkbox',
				'label' => __('Show latest news section?','zerif'),
				'description' => __('If you check this box, the Latest news section will appear on homepage.','zerif'),
				'section' => 'zerif_latest_news_section',
				'priority'    => 1,
			)
		);
		
		/* zerif_latestnews_title */
		$wp_customize->add_setting( 'zerif_latestnews_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('LATEST NEWS','zerif')));

		$wp_customize->add_control( 'zerif_latestnews_title', array(
				'label'    		=> __( 'Main title', 'zerif' ),
				'section'  		=> 'zerif_latest_news_section',
				'settings' 		=> 'zerif_latestnews_title',
				'priority'    	=> 2,
		));


		/* zerif_latestnews_subtitle */
		$wp_customize->add_setting( 'zerif_latestnews_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Add a subtitle in Customizer, "Latest news section"','zerif')));

		$wp_customize->add_control( 'zerif_latestnews_subtitle', array(
				'label'    		=> __( 'Subtitle', 'zerif' ),
				'section'  		=> 'zerif_latest_news_section',
				'settings' 		=> 'zerif_latestnews_subtitle',
				'priority'   	=> 3,
		));

		
	endif;
	
	/*******************************************************/

    /************	SUBSCRIBE SECTION **********************/

	/*******************************************************/

	
	if ( class_exists( 'WP_Customize_Panel' ) ) :
		
		$wp_customize->add_panel( 'panel_13', array(
			'priority' => 43,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Subscribe section', 'zerif' )
		) );
		
		/* SUBSCRIBE SETTINGS */
		
		$wp_customize->add_section( 'zerif_subscribe_settings_section' , array(
				'title'       => __( 'Settings', 'zerif' ),
				'priority'    => 1,
				'panel' => 'panel_13'
		));
		
		/* zerif_subscribe_show */
		$wp_customize->add_setting( 'zerif_subscribe_show' );

		$wp_customize->add_control(
			'zerif_subscribe_show',
			array(
				'type' => 'checkbox',
				'label' => __('Show subscribe section?','zerif'),
				'description' => __('If you check this box, the Subscribe section will appear on homepage.','zerif'),
				'section' => 'zerif_subscribe_settings_section',
				'priority'    => 1,
			)
		);
		
		$wp_customize->get_setting( 'zerif_subscribe_show' )->transport = 'postMessage';
		
		/* SUBSCRIBE HEADER */
		
		$wp_customize->add_section( 'zerif_subscribe_section' , array(
				'title'       => __( 'Header', 'zerif' ),
				'priority'    => 2,
				'panel' => 'panel_13'
		));

		/* zerif_subscribe_title */
		$wp_customize->add_setting( 'zerif_subscribe_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('STAY IN TOUCH','zerif')));

		$wp_customize->add_control( 'zerif_subscribe_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_subscribe_section',
				'settings' => 'zerif_subscribe_title',
				'priority'    => 1,
		));
		
		$wp_customize->get_setting( 'zerif_subscribe_title' )->transport = 'postMessage';
		
		/* zerif_subscribe_subtitle */
		$wp_customize->add_setting( 'zerif_subscribe_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Sign Up for Email Updates on on News & Offers','zerif')));

		$wp_customize->add_control( 'zerif_subscribe_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_subscribe_section',
				'settings' => 'zerif_subscribe_subtitle',
				'priority'    => 2,
		));
		
		$wp_customize->get_setting( 'zerif_subscribe_subtitle' )->transport = 'postMessage';
		
		/* SUBSCRIBE CONTENT */
		
		$wp_customize->add_section( 'zerif_subscribe_content_section' , array(
				'title'       => __( 'Content', 'zerif' ),
				'priority'    => 3,
				'panel' => 'panel_13'
		));
		
		$wp_customize->add_setting( 'zerif_subscribe_content_section' );
	
		$wp_customize->add_control( new Zerif_Subscribe_Widgets( $wp_customize, 'zerif_subscribe_content_section',
			array(
				'section' => 'zerif_subscribe_content_section',
		   )
		));
		
		/* SUBSCRIBE COLORS */
		
		$wp_customize->add_section( 'zerif_subscribe_color_section' , array(
				'title'       => __( 'Colors', 'zerif' ),
				'priority'    => 4,
				'panel' => 'panel_13'
		));
		
		/* zerif_subscribe_header_color */
		$wp_customize->add_setting( 'zerif_subscribe_header_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_subscribe_header_color',
				array(
					'label'      => __( 'Title and subtitle colors', 'zerif' ),
					'section'    => 'zerif_subscribe_color_section',
					'settings'   => 'zerif_subscribe_header_color',
					'priority'   => 1
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_subscribe_header_color' )->transport = 'postMessage';
		
		/* zerif_subscribe_button_background_color */
		$wp_customize->add_setting( 'zerif_subscribe_button_background_color', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_subscribe_button_background_color',
				array(
					'label'      => __( 'Button background color', 'zerif' ),
					'section'    => 'zerif_subscribe_color_section',
					'settings'   => 'zerif_subscribe_button_background_color',
					'priority'   => 2
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_subscribe_button_background_color' )->transport = 'postMessage';
		
		/* zerif_subscribe_button_background_color_hover */
		$wp_customize->add_setting( 'zerif_subscribe_button_background_color_hover', array( 'default' => '#cb4332' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_subscribe_button_background_color_hover',
				array(
					'label'      => __( 'Button background color - hover', 'zerif' ),
					'section'    => 'zerif_subscribe_color_section',
					'settings'   => 'zerif_subscribe_button_background_color_hover',
					'priority'   => 3
				)
			)
		);
		
		/* zerif_subscribe_button_color */
		$wp_customize->add_setting( 'zerif_subscribe_button_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_subscribe_button_color',
				array(
					'label'      => __( 'Button text color', 'zerif' ),
					'section'    => 'zerif_subscribe_color_section',
					'settings'   => 'zerif_subscribe_button_color',
					'priority'   => 4
				)
			)
		);
		
		$wp_customize->get_setting( 'zerif_subscribe_button_color' )->transport = 'postMessage';
		
	else: /* Old versions of WordPress */
	
		$wp_customize->add_section( 'zerif_subscribe_section' , array(
				'title'       => __( 'Subscribe section', 'zerif' ),
				'priority'    => 43,
				'description' => __('For this section to work properly, you must add the "SendinBlue Widget" to the "Subscribe section" widgets area','zerif')
		));
		
		/* zerif_subscribe_show */
		$wp_customize->add_setting( 'zerif_subscribe_show');

		$wp_customize->add_control(
			'zerif_subscribe_show',
			array(
				'type' => 'checkbox',
				'label' => __('Show subscribe section?','zerif'),
				'description' => __('If you check this box, the Subscribe section will appear on homepage.','zerif'),
				'section' => 'zerif_subscribe_section',
				'priority'    => 1,
			)
		);
		
		/* zerif_subscribe_title */
		$wp_customize->add_setting( 'zerif_subscribe_title', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('STAY IN TOUCH','zerif')));

		$wp_customize->add_control( 'zerif_subscribe_title', array(
				'label'    => __( 'Main title', 'zerif' ),
				'section'  => 'zerif_subscribe_section',
				'settings' => 'zerif_subscribe_title',
				'priority'    => 2,
		));
		
		/* zerif_subscribe_subtitle */
		$wp_customize->add_setting( 'zerif_subscribe_subtitle', array('sanitize_callback' => 'zerif_sanitize_text','default' => __('Sign Up for Email Updates on on News & Offers','zerif')));

		$wp_customize->add_control( 'zerif_subscribe_subtitle', array(
				'label'    => __( 'Subtitle', 'zerif' ),
				'section'  => 'zerif_subscribe_section',
				'settings' => 'zerif_subscribe_subtitle',
				'priority'    => 3,
		));
		
		/* zerif_subscribe_header_color */
		$wp_customize->add_setting( 'zerif_subscribe_header_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_subscribe_header_color',
				array(
					'label'      => __( 'Title and subtitle colors', 'zerif' ),
					'section'    => 'zerif_subscribe_section',
					'settings'   => 'zerif_subscribe_header_color',
					'priority'   => 4
				)
			)
		);
		
		/* zerif_subscribe_button_background_color */
		$wp_customize->add_setting( 'zerif_subscribe_button_background_color', array( 'default' => '#e96656' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_subscribe_button_background_color',
				array(
					'label'      => __( 'Button background color', 'zerif' ),
					'section'    => 'zerif_subscribe_section',
					'settings'   => 'zerif_subscribe_button_background_color',
					'priority'   => 5
				)
			)
		);
		
		/* zerif_subscribe_button_background_color_hover */
		$wp_customize->add_setting( 'zerif_subscribe_button_background_color_hover', array( 'default' => '#cb4332' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_subscribe_button_background_color_hover',
				array(
					'label'      => __( 'Button background color - hover', 'zerif' ),
					'section'    => 'zerif_subscribe_section',
					'settings'   => 'zerif_subscribe_button_background_color_hover',
					'priority'   => 6
				)
			)
		);
		
		/* zerif_subscribe_button_color */
		$wp_customize->add_setting( 'zerif_subscribe_button_color', array( 'default' => '#fff' ) );
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'zerif_subscribe_button_color',
				array(
					'label'      => __( 'Button text color', 'zerif' ),
					'section'    => 'zerif_subscribe_section',
					'settings'   => 'zerif_subscribe_button_color',
					'priority'   => 7
				)
			)
		);
		
	endif;
	
	/****************************************************/
	/****************** BACKGROUND **********************/
	/****************************************************/

	if ( class_exists( 'WP_Customize_Panel' ) ) :

		$wp_customize->add_panel(
			'panel_background',
			array(
				'priority' 			=> 45,
				'capability' 		=> 'edit_theme_options',
				'theme_supports' 	=> '',
				'title' 			=> __( 'Background', 'zerif' )
			)
		);

		/* Background settings */
		$wp_customize->add_section(
			'zerif_background_settings_section',
			array(
				'title'       	=> __( 'Background settings', 'zerif' ),
				'priority'    	=> 1,
				'panel'			=> 'panel_background',
			)
		);
		$wp_customize->add_setting( 'zerif_background_settings' );
		$wp_customize->add_control(
			'zerif_background_settings',
			array(
				'type' => 'radio',
				'label' => __('Type of background','zerif'),
				'description' => __('Select the type of background you want. <b>Make sure you also set up the images/video in their corresponding places, down below.</b>','zerif'),
				'section' => 'zerif_background_settings_section',
				'choices' => array(
					'zerif-background-image' => __( 'Background image','zerif' ),
					'zerif-background-slider' => __( 'Background slider','zerif' ),
					'zerif-background-video' => __( 'Background video', 'zerif' )
				),
				'priority'    => 1,
			)
		);

		/* Background image */
		$wp_customize->get_section('background_image')->panel = 'panel_background';
		$wp_customize->get_section('background_image')->priority = 2;

		/* Background slider */
		$wp_customize->add_section(
			'zerif_background_slider_section',
			array(
				'title'       	=> __( 'Background slider', 'zerif' ),
				'priority'    	=> 3,
				'panel'			=> 'panel_background',
			)
		);

		/* slider image 1 */

		$wp_customize->add_setting(
			'zerif_bgslider_1'
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_bgslider_1',
				array(
					'label'    => __( 'Image 1', 'zerif' ),
					'section'  => 'zerif_background_slider_section',
					'priority'    => 1,
				)
			)
		);

		$wp_customize->add_setting(
			'zerif_vposition_bgslider_1',
			array(
				'default' => 'top',
			)
		);
		$wp_customize->add_control(
			'zerif_vposition_bgslider_1',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Vertical align',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'top' 		=> __('Top','zerif'),
					'center'	=> __('Center','zerif'),
					'bottom' 	=> __('Bottom','zerif'),
				),
				'priority' 	=> 2,
			)
		);

		$wp_customize->add_setting(
			'zerif_hposition_bgslider_1',
			array(
				'default' => 'left',
			)
		);
		$wp_customize->add_control(
			'zerif_hposition_bgslider_1',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Horizontal align',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'left' 		=> __('Left','zerif'),
					'center'	=> __('Center','zerif'),
					'right' 	=> __('Right','zerif'),
				),
				'priority' 	=> 3,
			)
		);

		$wp_customize->add_setting(
			'zerif_bgsize_bgslider_1',
			array(
				'default' => 'cover',
			)
		);
		$wp_customize->add_control(
			'zerif_bgsize_bgslider_1',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Background size',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'cover' 	=> __('Cover','zerif'),
					'width' 	=> __('width 100%','zerif'),
					'height'	=> __('Height 100%','zerif'),
				),
				'priority' 	=> 4,
			)
		);

		/* slider image 2 */

		$wp_customize->add_setting(
			'zerif_bgslider_2'
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_bgslider_2',
				array(
					'label'    	=> __( 'Image 2', 'zerif' ),
					'section'  	=> 'zerif_background_slider_section',
					'priority'	=> 5,
				)
			)
		);

		$wp_customize->add_setting(
			'zerif_vposition_bgslider_2',
			array(
				'default' => 'top',
			)
		);
		$wp_customize->add_control(
			'zerif_vposition_bgslider_2',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Vertical align',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'top' 		=> __('Top','zerif'),
					'center'	=> __('Center','zerif'),
					'bottom' 	=> __('Bottom','zerif'),
				),
				'priority' 	=> 6,
			)
		);

		$wp_customize->add_setting(
			'zerif_hposition_bgslider_2',
			array(
				'default' => 'left',
			)
		);
		$wp_customize->add_control(
			'zerif_hposition_bgslider_2',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Horizontal align',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'left' 		=> __('Left','zerif'),
					'center'	=> __('Center','zerif'),
					'right' 	=> __('Right','zerif'),
				),
				'priority' 	=> 7,
			)
		);

		$wp_customize->add_setting(
			'zerif_bgsize_bgslider_2',
			array(
				'default' => 'cover',
			)
		);
		$wp_customize->add_control(
			'zerif_bgsize_bgslider_2',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Background size',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'cover' 	=> __('Cover','zerif'),
					'width' 	=> __('width 100%','zerif'),
					'height'	=> __('Height 100%','zerif'),
				),
				'priority' 	=> 8,
			)
		);

		/* slider image 3 */

		$wp_customize->add_setting(
			'zerif_bgslider_3'
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_bgslider_3',
				array(
					'label'    	=> __( 'Image 3', 'zerif' ),
					'section'  	=> 'zerif_background_slider_section',
					'priority'	=> 9,
				)
			)
		);

		$wp_customize->add_setting(
			'zerif_vposition_bgslider_3',
			array(
				'default' => 'top',
			)
		);
		$wp_customize->add_control(
			'zerif_vposition_bgslider_3',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Vertical align',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'top' 		=> __('Top','zerif'),
					'center'	=> __('Center','zerif'),
					'bottom' 	=> __('Bottom','zerif'),
				),
				'priority' 	=> 10,
			)
		);

		$wp_customize->add_setting(
			'zerif_hposition_bgslider_3',
			array(
				'default' => 'left',
			)
		);
		$wp_customize->add_control(
			'zerif_hposition_bgslider_3',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Horizontal align',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'left' 		=> __('Left','zerif'),
					'center'	=> __('Center','zerif'),
					'right' 	=> __('Right','zerif'),
				),
				'priority' 	=> 11,
			)
		);

		$wp_customize->add_setting(
			'zerif_bgsize_bgslider_3',
			array(
				'default' => 'cover',
			)
		);
		$wp_customize->add_control(
			'zerif_bgsize_bgslider_3',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Background size',
				'section' 	=> 'zerif_background_slider_section',
				'choices' 	=> array(
					'cover' 	=> __('Cover','zerif'),
					'width' 	=> __('width 100%','zerif'),
					'height'	=> __('Height 100%','zerif'),
				),
				'priority' 	=> 12,
			)
		);

		/* Video Background */
		$wp_customize->add_section(
			'zerif_background_video_section',
			array(
				'title'       	=> __( 'Background Video', 'zerif' ),
				'priority'    	=> 4,
				'panel'			=> 'panel_background',
			)
		);

		/* Video */
		$wp_customize->add_setting(
			'zerif_background_video'
		);
		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
			$wp_customize,
			'zerif_background_video',
			array(
				'label'      => __( 'Video file', 'zerif' ),
				'description'=> __( 'mp4 format file', 'zerif' ),
				'section'    => 'zerif_background_video_section',
				'priority'   => 1
			) )
		);

		/* Thumbnail */
		$wp_customize->add_setting(
			'zerif_background_video_thumbnail'
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_background_video_thumbnail',
				array(
					'label'    	=> __( 'Video thumbnail', 'zerif' ),
					'description' => __( 'This image will appear while the video is downloading. If this is not included, the first frame of the video will be used instead.', 'zerif' ),
					'section'  	=> 'zerif_background_video_section',
					'priority'	=> 2,
				)
			)
		);

	else:

		/* Background settings */
		$wp_customize->add_section(
			'zerif_background_settings_section',
			array(
				'title'       	=> __( 'Background settings', 'zerif' ),
				'priority'    	=> 44,
				'panel'			=> 'panel_background',
			)
		);
		$wp_customize->add_setting( 'zerif_background_settings' );
		$wp_customize->add_control(
			'zerif_background_settings',
			array(
				'type' => 'radio',
				'label' => __('Type of background','zerif'),
				'description' => __('Select the type of background you want.','zerif'),
				'section' => 'zerif_background_settings_section',
				'choices' => array(
					'zerif-background-image' => __( 'Background image','zerif' ),
					'zerif-background-slider' => __( 'Background slider','zerif' ),
					'zerif-background-video' => __( 'Background video', 'zerif' )
				),
				'priority'    => 1,
			)
		);

		$wp_customize->add_section(
			'zerif_bgslider_section',
			array(
				'title'		=> __( 'Background slider', 'zerif' ),
				'priority'	=> 45,
			)
		);

		/* slider image 1 */
		$wp_customize->add_setting(
			'zerif_bgslider_1'
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_bgslider_1',
				array(
					'label'    => __( 'Image 1', 'zerif' ),
					'section'  => 'zerif_bgslider_section',
					'settings' => 'zerif_bgslider_1',
					'priority' => 1,
				)
			)
		);

		$wp_customize->add_setting(
			'zerif_vposition_bgslider_1',
			array(
				'default' => 'top',
			)
		);
		$wp_customize->add_control(
			'zerif_vposition_bgslider_1',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Vertical align',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'top' 		=> __('Top','zerif'),
					'center'	=> __('Center','zerif'),
					'bottom' 	=> __('Bottom','zerif'),
				),
				'priority' 	=> 2,
			)
		);

		$wp_customize->add_setting(
			'zerif_hposition_bgslider_1',
			array(
				'default' => 'left',
			)
		);
		$wp_customize->add_control(
			'zerif_hposition_bgslider_1',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Horizontal align',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'left' 		=> __('Left','zerif'),
					'center'	=> __('Center','zerif'),
					'right' 	=> __('Right','zerif'),
				),
				'priority' 	=> 3,
			)
		);

		$wp_customize->add_setting(
			'zerif_bgsize_bgslider_1',
			array(
				'default' => 'cover',
			)
		);
		$wp_customize->add_control(
			'zerif_bgsize_bgslider_1',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Background size',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'cover' 	=> __('Cover','zerif'),
					'width' 	=> __('width 100%','zerif'),
					'height'	=> __('Height 100%','zerif'),
				),
				'priority' 	=> 4,
			)
		);

		/* slider image 2 */
		$wp_customize->add_setting(
			'zerif_bgslider_2'
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_bgslider_2',
				array(
					'label'    	=> __( 'Image 2', 'zerif' ),
					'section'  	=> 'zerif_bgslider_section',
					'settings' 	=> 'zerif_bgslider_2',
					'priority'	=> 5,
				)
			)
		);

		$wp_customize->add_setting(
			'zerif_vposition_bgslider_2',
			array(
				'default' => 'top',
			)
		);
		$wp_customize->add_control(
			'zerif_vposition_bgslider_2',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Vertical align',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'top' 		=> __('Top','zerif'),
					'center'	=> __('Center','zerif'),
					'bottom' 	=> __('Bottom','zerif'),
				),
				'priority' 	=> 6,
			)
		);

		$wp_customize->add_setting(
			'zerif_hposition_bgslider_2',
			array(
				'default' => 'left',
			)
		);
		$wp_customize->add_control(
			'zerif_hposition_bgslider_2',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Horizontal align',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'left' 		=> __('Left','zerif'),
					'center'	=> __('Center','zerif'),
					'right' 	=> __('Right','zerif'),
				),
				'priority' 	=> 7,
			)
		);

		$wp_customize->add_setting(
			'zerif_bgsize_bgslider_2',
			array(
				'default' => 'cover',
			)
		);
		$wp_customize->add_control(
			'zerif_bgsize_bgslider_2',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Background size',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'cover' 	=> __('Cover','zerif'),
					'width' 	=> __('width 100%','zerif'),
					'height'	=> __('Height 100%','zerif'),
				),
				'priority' 	=> 8,
			)
		);

		/* slider image 3 */
		$wp_customize->add_setting(
			'zerif_bgslider_3'
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'zerif_bgslider_3',
				array(
					'label'    	=> __( 'Image 3', 'zerif' ),
					'section'  	=> 'zerif_bgslider_section',
					'settings' 	=> 'zerif_bgslider_3',
					'priority'	=> 9,
				)
			)
		);

		$wp_customize->add_setting(
			'zerif_vposition_bgslider_3',
			array(
				'default' => 'top',
			)
		);
		$wp_customize->add_control(
			'zerif_vposition_bgslider_3',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Vertical align',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'top' 		=> __('Top','zerif'),
					'center'	=> __('Center','zerif'),
					'bottom' 	=> __('Bottom','zerif'),
				),
				'priority' 	=> 10,
			)
		);

		$wp_customize->add_setting(
			'zerif_hposition_bgslider_3',
			array(
				'default' => 'left',
			)
		);
		$wp_customize->add_control(
			'zerif_hposition_bgslider_3',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Image Horizontal align',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'left' 		=> __('Left','zerif'),
					'center'	=> __('Center','zerif'),
					'right' 	=> __('Right','zerif'),
				),
				'priority' 	=> 11,
			)
		);

		$wp_customize->add_setting(
			'zerif_bgsize_bgslider_3',
			array(
				'default' => 'cover',
			)
		);
		$wp_customize->add_control(
			'zerif_bgsize_bgslider_3',
			array(
				'type' 		=> 'select',
				'label' 	=> 'Background size',
				'section' 	=> 'zerif_bgslider_section',
				'choices' 	=> array(
					'cover' 	=> __('Cover','zerif'),
					'width' 	=> __('width 100%','zerif'),
					'height'	=> __('Height 100%','zerif'),
				),
				'priority' 	=> 12,
			)
		);

		/* Video Background */
		$wp_customize->add_section(
			'zerif_background_video_section',
			array(
				'title'       	=> __( 'Background Video', 'zerif' ),
				'priority'    	=> 46
			)
		);

		$wp_customize->add_setting(
			'zerif_background_video'
		);
		$wp_customize->add_control(
			new WP_Customize_Upload_Control(
			$wp_customize,
			'zerif_background_video',
			array(
				'label'      => __( 'Video file', 'zerif' ),
				'description'=> __( 'mp4 format file', 'zerif' ),
				'section'    => 'zerif_background_video_section',
				'settings'   => 'zerif_background_video',
			) )
		);

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

}

add_action( 'customize_controls_enqueue_scripts', 'zerif_registers' );