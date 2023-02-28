<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Testimonials_Slider extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'deo-testimonials-slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Deo Testimonials Slider', 'deo-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-post-slider';
	}
	
	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'swiper' ];
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'deothemes-widgets' ];
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->section_slider_options();
		$this->section_content();

		$this->section_content_style();
		$this->section_text_style();
		$this->section_image_style();
		$this->section_name_style();
		$this->section_company_style();
		$this->section_navigation_style();
	}

	/**
	* Content > Slider Options.
	*/
	private function section_slider_options() {
		$this->start_controls_section(
			'section_slider_options',
			[
				'label' => __( 'Slider Options', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Swiper Slider Options
		$this->add_control(
			'space_between',
			[
				'label' => __( 'Space Between', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 30,
				],
				'condition' => [
					'slides_to_show!' => '1',
				],
				'frontend_available' => true,
				'render_type' => 'none',
				'separator' => 'after',
			]
		);

		$slides_to_show = range( 1, 10 );
		$slides_to_show = array_combine( $slides_to_show, $slides_to_show );		

		$this->add_responsive_control(
			'slides_to_show',
			[
				'label' => __( 'Slides to Show', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => __( 'Default', 'deo-elementor' ),
				] + $slides_to_show,
				'frontend_available' => true,
			]
		);

		$this->add_responsive_control(
			'slides_to_scroll',
			[
				'label' => __( 'Slides to Scroll', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description' => __( 'Set how many slides are scrolled per swipe.', 'deo-elementor' ),
				'options' => [
					'' => __( 'Default', 'deo-elementor' ),
				] + $slides_to_show,
				'condition' => [
					'slides_to_show!' => '1',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'dots',
				'options' => [
					'both' => __( 'Arrows and Dots', 'deo-elementor' ),
					'arrows' => __( 'Arrows', 'deo-elementor' ),
					'dots' => __( 'Dots', 'deo-elementor' ),
					'none' => __( 'None', 'deo-elementor' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'infinite',
			[
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'label'   => __( 'Infinite Loop', 'deo-elementor' ),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __( 'Effect', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => __( 'Slide', 'deo-elementor' ),
					'fade' => __( 'Fade', 'deo-elementor' ),
				],
				'condition' => [
					'slides_to_show' => '1',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Animation Speed', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 500,
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'direction',
			[
				'label' => __( 'Direction', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ltr',
				'options' => [
					'ltr' => __( 'Left', 'deo-elementor' ),
					'rtl' => __( 'Right', 'deo-elementor' ),
				],
			]
		);

		$this->add_control(
			'autoplay',
			[
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'label'   => __( 'Autoplay', 'deo-elementor' ),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => __( 'Pause on Hover', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'autoplay' => 'yes',
				],
				'render_type' => 'none',
			]
		);

		$this->add_control(
			'pause_on_interaction',
			[
				'label' => __( 'Pause on Interaction', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label' => __( 'Autoplay Speed', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
				'render_type' => 'none',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Content > Content.
	*/
	private function section_content() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Testimonials', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'testimonial_image', [
				'label' => __( 'Testimonial Image', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'testimonial_text', [
				'label' => __( 'Testimonial Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'Testimonial Text' , 'deo-elementor' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'testimonial_name', [
				'label' => __( 'Name', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Testimonial Name' , 'deo-elementor' ),
			]
		);

		$repeater->add_control(
			'testimonial_company', [
				'label' => __( 'Company', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Testimonial Company' , 'deo-elementor' ),
			]
		);
		  

		$this->add_control(
			'testimonials',
			[
				'label' => __( 'Testimonials', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[						
						'testimonial_text' => __( 'Testimonial Text', 'deo-elementor' ),
						'testimonial_name' => __( 'Testimonial Name', 'deo-elementor' ),
						'testimonial_company' => __( 'Testimonial Company', 'deo-elementor' ),
					],
					[						
						'testimonial_text' => __( 'Testimonial Text #2', 'deo-elementor' ),
						'testimonial_name' => __( 'Testimonial Name #2', 'deo-elementor' ),
						'testimonial_company' => __( 'Testimonial Company #2', 'deo-elementor' ),
					],
					[
						'testimonial_text' => __( 'Testimonial Text #3', 'deo-elementor' ),
						'testimonial_name' => __( 'Testimonial Name #3', 'deo-elementor' ),						
						'testimonial_company' => __( 'Testimonial Company #3', 'deo-elementor' ),
					]
				],
				'title_field' => '{{{ testimonial_name }}}',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Content.
	*/
	private function section_content_style() {
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'deo-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'deo-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'deo-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .testimonial' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'box_padding',
			[
				'label' => __( 'Box Padding', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => __( 'Box Shadow', 'deo-elementor' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .testimonial',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Text.
	*/
	private function section_text_style() {
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => __( 'Text', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .testimonial__text',
			]
		);

		$this->add_control(
			'text_bottom_space',
			[
				'label' => __( 'Bottom Space', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 30,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .testimonial__text' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Image.
	*/
	private function section_image_style() {
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => __( 'Image', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' => __( 'Size', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 70,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'separator' => 'after',
				'selectors' => [
					'{{WRAPPER}} .testimonial__img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'image_bottom_space',
			[
				'label' => __( 'Bottom Space', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 27,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial__img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->end_controls_section();
	}	

	/**
	* Style > Name.
	*/
	private function section_name_style() {
		$this->start_controls_section(
			'section_name_style',
			[
				'label' => __( 'Name', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial__author' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .testimonial__author',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Company.
	*/
	private function section_company_style() {
		$this->start_controls_section(
			'section_company_style',
			[
				'label' => __( 'Company', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'company_color',
			[
				'label' => __( 'Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial__company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'company_typography',
				'selector' => '{{WRAPPER}} .testimonial__company',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Navigation.
	*/
	private function section_navigation_style() {
		$this->start_controls_section(
			'section_navigation_style',
			[
				'label' => __( 'Navigation', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);		

		$this->add_control(
			'arrows_size',
			[
				'label' => __( 'Arrows Size', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 60,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-swiper-button.elementor-swiper-button-prev,
					{{WRAPPER}} .elementor-swiper-button.elementor-swiper-button-next' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label' => __( 'Arrows Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-swiper-button.elementor-swiper-button-prev,
					{{WRAPPER}} .elementor-swiper-button.elementor-swiper-button-next' => 'color: {{VALUE}};',
				],
				'separator' => 'after',
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_size',
			[
				'label' => __( 'Dots Size', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Dots Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet:not(.swiper-pagination-bullet-active)' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_active_color',
			[
				'label' => __( 'Dots Active Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet-active,
					{{WRAPPER}} .swiper-pagination-bullet:hover,
					{{WRAPPER}} .swiper-pagination-bullet:focus' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'dots_top_space',
			[
				'label' => __( 'Dots Top Space', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 64,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .testimonial' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}	


	/**
	* Render widget output on the frontend.
	*
	* Written in PHP and used to generate the final HTML.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render() {
		$settings = $this->get_settings_for_display();		
		$breakpoints = \Elementor\Core\Responsive\Responsive::get_breakpoints();
		$mobile = strval( $breakpoints['md'] );
		$tablet = strval( $breakpoints['lg'] );
		$show_dots = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
		$show_arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );
		$is_single = 1 === absint( $settings['slides_to_show'] );

		if ( $settings['testimonials'] ) {

			$slider_options = array(
				'autoHeight' => true,
				'speed' => absint( $settings['speed'] ),

				'loop' => ( 'yes' === $settings['infinite'] ),
				'slidesPerView' =>  ( $settings['slides_to_show_mobile'] ) ? absint( $settings['slides_to_show_mobile'] ) : 1,

				'breakpoints' => [
					$mobile => [
						'slidesPerView' => ( $settings['slides_to_show_tablet'] ) ? absint( $settings['slides_to_show_tablet'] ) : 1,
						'slidesPerGroup' => ( $settings['slides_to_scroll_tablet'] ) ? absint( $settings['slides_to_scroll_tablet'] ) : 1,
					],
					$tablet => [
						'slidesPerView' => ( $settings['slides_to_show'] ) ? absint( $settings['slides_to_show'] ) : 2,
						'slidesPerGroup' => ( $settings['slides_to_scroll'] ) ? absint( $settings['slides_to_scroll'] ) : 1,
					],
				]

			);

			if ( $is_single ) {
				$slider_options['effect'] = $settings['effect'];

				if ( 'fade' === $settings['effect'] ) {
					$slider_options['fadeEffect'] = [
						'crossFade' => true
					];
				}
			} else {
				$slider_options['slidesPerGroup'] = ( $settings['slides_to_scroll_mobile'] ) ? absint( $settings['slides_to_scroll_mobile'] ) : 1;
			}

			if ( $settings['space_between'] ) {
				$slider_options['spaceBetween'] = absint( $settings['space_between']['size'] );
			}

			if ( $show_dots ) {
				$slider_options['pagination'] = [
					'el' => '.swiper-pagination',
					'type' => 'bullets',
					'clickable' => true
				];
			}

			if ( $show_arrows ) {
				$slider_options['navigation'] = [
					'nextEl' => '.elementor-swiper-button-next',
					'prevEl' => '.elementor-swiper-button-prev',
				];
			}

			if ( 'yes' === $settings['autoplay'] ) {
				$slider_options['autoplay'] = [
					'delay' => $settings['autoplay_speed'],
					'disableOnInteraction' => ( 'yes' === $settings['pause_on_interaction'] )
				];
			}

			$this->add_render_attribute( [
				'carousel' => [
					'class'	=> 'swiper-container deo-slider deo-testimonials-slider',
					'data-slider-settings' => wp_json_encode( $slider_options ),
					'dir' => $settings['direction']
				],
				'carousel-wrapper' => [
					'class' => 'swiper-wrapper',
				],	
			]	);

			if ( $show_arrows ) {
				$this->add_render_attribute( 'carousel', 'class', 'deo-slider--arrows' );
			}

			$slides_count = count( $settings['testimonials'] );

			?>

			<!-- Slider main container -->
			<div <?php echo $this->get_render_attribute_string( 'carousel' ); ?>>
				<div <?php echo $this->get_render_attribute_string( 'carousel-wrapper' ); ?>>

					<?php foreach (  $settings['testimonials'] as $index => $item ) :
						$repeater_name_setting_key = $this->get_repeater_setting_key( 'testimonial_name', 'testimonials', $index );
						$repeater_company_setting_key = $this->get_repeater_setting_key( 'testimonial_company', 'testimonials', $index );
						$repeater_text_setting_key = $this->get_repeater_setting_key( 'testimonial_text', 'testimonials', $index );
						$this->add_render_attribute( $repeater_name_setting_key, 'class', 'testimonial__author' );
						$this->add_render_attribute( $repeater_company_setting_key, 'class', 'testimonial__company' );
						$this->add_render_attribute( $repeater_text_setting_key, 'class', 'testimonial__text' );
					?>

						<div class="swiper-slide">
							<div class="testimonial-wrap">
								<div class="testimonial">

									<?php if ( ! empty( $item['testimonial_image'] ) ) {
										echo wp_get_attachment_image( $item['testimonial_image']['id'], 'thumbnail', false, [ 'class' => 'testimonial__img' ] );
									} ?>

									<?php if ( ! empty( $item['testimonial_text'] ) ) : ?>
										<p <?php echo $this->get_render_attribute_string( $repeater_text_setting_key ); ?>><?php echo esc_html( $item['testimonial_text'] ); ?></p>
									<?php endif; ?>														

									<div class="testimonial__info">
										<?php if ( ! empty( $item['testimonial_name'] ) ) : ?>
											<span <?php echo $this->get_render_attribute_string( $repeater_name_setting_key ); ?>><?php echo esc_html( $item['testimonial_name'] ); ?></span>
										<?php endif; ?>
										<?php if ( ! empty( $item['testimonial_company'] ) ) : ?>
											<span <?php echo $this->get_render_attribute_string( $repeater_company_setting_key ); ?>><?php echo esc_html( $item['testimonial_company'] ); ?></span>
										<?php endif; ?>
									</div>

								</div>
							</div>
						</div>

					<?php endforeach; ?>

				</div> <!-- .swiper-wrapper -->

				<?php if ( 1 < $slides_count ) : ?>
					<?php if ( $show_dots ) : ?>
						<div class="swiper-pagination"></div>
					<?php endif; ?>

					<?php if ( $show_arrows ) : ?>
						<div class="elementor-swiper-button elementor-swiper-button-prev">
							<i class="eicon-chevron-left" aria-hidden="true"></i>
							<span class="elementor-screen-only"><?php _e( 'Previous', 'deo-elementor' ); ?></span>
						</div>
						<div class="elementor-swiper-button elementor-swiper-button-next">
							<i class="eicon-chevron-right" aria-hidden="true"></i>
							<span class="elementor-screen-only"><?php _e( 'Next', 'deo-elementor' ); ?></span>
						</div>
					<?php endif; ?>
				<?php endif; ?>
				
			</div> <!-- .swiper-container -->

			<?php
		}
	}

}