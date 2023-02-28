<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Video_Icon extends \Elementor\Widget_Base {

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
		return 'deo-video-icon';
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
		return __( 'Deo Video Icon', 'deo-elementor' );
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
		return 'eicon-play-o';
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'jquery-magnific-popup' ];
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
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'icon', 'video', 'popup' ];
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
		$this->section_video();
		
		$this->section_icon_style();
		$this->section_text_style();
	}


	/**
	* Content > Icon.
	*/
	private function section_video() {
		$this->start_controls_section(
			'section_video',
			[
				'label' => __( 'Video', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'play_button_url',
			[
				'label' => __( 'Video URL', 'deo-elementor' ),
				'description' => __( 'Paste YouTube or Video URL', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'default' => [
					'url' => 'https://www.youtube.com/watch?v=nVzVohG304A',
					'is_external' => false,
					'nofollow' => true,
				],
				'placeholder' => __( 'https://www.youtube.com/watch?v=nVzVohG304A', 'deo-elementor' ),
			]
		);

		$this->add_control(
			'play_button_text',
			[
				'label' => __( 'Button Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'How it Works' , 'deo-elementor' ),
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
					'{{WRAPPER}} .play-btn-wrap' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}


	/**
	* Style > Icon.
	*/
	private function section_icon_style() {
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'icon_colors' );

		$this->start_controls_tab(
			'icon_colors_normal',
			[
				'label' => __( 'Normal', 'deo-elementor' ),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#3e4045',
				'selectors' => [
					'{{WRAPPER}} .play-btn:before' => 'border-color: transparent transparent transparent {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_color',
			[
				'label' => __( 'Icon Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .play-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_colors_hover',
			[
				'label' => __( 'Hover', 'deo-elementor' ),
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => __( 'Icon Hover Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover:before' => 'border-color: transparent transparent transparent {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_color_hover',
			[
				'label' => __( 'Icon Hover Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f98910',
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
				],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .play-btn:before' => 'border-top-width: {{SIZE}}{{UNIT}}; border-bottom-width: {{SIZE}}{{UNIT}}; border-left-width: calc( {{SIZE}}{{UNIT}} + 3px );',
				],
			]
		);

		$this->add_control(
			'icon_base_size',
			[
				'label' => __( 'Base Size', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 48,
				],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 400,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .play-btn' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
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
				'label' => __( 'Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .play-btn__text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .play-btn__text',
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

		?>

			<div class="play-btn-wrap">
				<a href="<?php echo $settings['play_button_url']['url'] . '?autoplay=1'; ?>" class="play-btn single-video-lightbox icon-wave" data-effect="mfp-zoom-in"></a>
				<?php if ( $settings['play_button_text'] ) : ?>
					<span class="play-btn__text"><?php echo $settings['play_button_text']; ?></span>
				<?php endif; ?>
			</div>

		<?php
	}

}