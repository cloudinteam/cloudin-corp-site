<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Animated_Text extends \Elementor\Widget_Base {

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
		return 'deo-animated-text';
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
		return __( 'Deo Animated Text', 'deo-elementor' );
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
		return 'eicon-animated-headline';
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
		return [ 'typed' ];
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
		return [ 'animated', 'text' ];
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
		$this->section_content();
		$this->section_animation();
		
		$this->section_text_style();
	}


	/**
	* Content > Content.
	*/
	private function section_content() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'text_before',
			[
				'label' => __( 'Before Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Check this ', 'deo-elementor' ),
				'label_block' => true,
				'separator' => 'after',
			]
		);

		$this->add_control(
			'text_animated',
			[
				'label' => __( 'Animated Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'description' => __( 'Type text separated by commas', 'deo-elementor' ),
				'default' => __( 'Amazing, Flexible, Unique', 'deo-elementor' ),
			]
		);

		$this->add_control(
			'text_after',
			[
				'label' => __( 'After Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( ' text effect', 'deo-elementor' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'tag',
			[
				'label' => __( 'HTML Tag', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h3',
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'text_align',
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
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-typed' => 'text-align: {{VALUE}};',
				],
				'separator' => 'before'
			]
		);

		$this->end_controls_section();
	}


	/**
	* Content > Animation.
	*/
	private function section_animation() {
		$this->start_controls_section(
			'section_animation',
			[
				'label' => __( 'Animation', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'type_speed',
			[
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'label'       => __( 'Type speed', 'deo-elementor' ),
				'default'     => 70,
			]
		);

		$this->add_control(
			'back_speed',
			[
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'label'       => __( 'Backspacing speed', 'deo-elementor' ),
				'default'     => 30,
				'separator'		=> 'before'
			]
		);

		$this->add_control(
			'back_delay',
			[
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'label'       => __( 'Time before backspacing', 'deo-elementor' ),
				'default'     => 700,
				'separator'		=> 'before'
			]
		);

		$this->add_control(
			'start_delay',
			[
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'label'       => __( 'Time before typing starts', 'deo-elementor' ),
				'default'     => 0,
				'separator'		=> 'before'
			]
		);

		$this->add_control(
			'loop',
			[
				'type'        => \Elementor\Controls_Manager::SWITCHER,
				'label'       => __( 'Loop', 'deo-elementor' ),
				'default'    	=> 'yes',
				'separator'		=> 'before'
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
					'{{WRAPPER}} .deo-typed__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .deo-typed__title',
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
		$typed_text = $settings['text_animated'];
		
		$typed_options = [
			'typeSpeed' => ( isset( $settings['type_speed'] ) ) ? $settings['type_speed'] : 70,
			'backSpeed' => ( isset( $settings['back_speed'] ) ) ? $settings['back_speed'] : 30,
			'backDelay' => ( isset( $settings['back_delay'] ) ) ? $settings['back_delay'] : 700,
			'startDelay' => ( isset( $settings['start_delay'] ) ) ? $settings['start_delay'] : 0,
			'loop'			=> ( 'yes' !== $settings['loop'] ) ? false : true
		];

		$this->add_render_attribute( 'typed_options', [
			'data-typed' => wp_json_encode( $typed_options ),
			'data-widget-id' => $this->get_id(),
			'data-typed-strings' => $typed_text
		] );

		?>
			<div class="deo-typed" <?php echo $this->get_render_attribute_string( 'typed_options' ); ?>>
				<<?php echo \Deo_Elementor_Helper::validate_html_tag( $settings['tag'] ); ?> class="deo-typed__title">
					<?php if ( ! empty( $settings['text_before'] ) ) : ?>
						<span class="deo-typed__text-before"><?php echo $settings['text_before']; ?></span>					
					<?php endif;?>

					<?php if ( ! empty( $typed_text ) ) : ?>
						<span class="deo-typed__text-animated" id="deo-typed__text-<?php echo $this->get_id(); ?>"></span>
					<?php endif;?>

					<?php if ( ! empty( $settings['text_after'] ) ) : ?>
						<span class="deo-typed__text-after"><?php echo $settings['text_after']; ?></span>					
					<?php endif;?>
				</<?php echo \Deo_Elementor_Helper::validate_html_tag( $settings['tag'] ); ?>>
			</div>

		<?php
	}

}