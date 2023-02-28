<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Illustrations extends \Elementor\Widget_Base {

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
		return 'deo-illustrations';
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
		return __( 'Deo Illustrations', 'deo-elementor' );
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
		return 'eicon-animation';
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
		return [ 'lottie' ];
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
		return [ 'animation', 'illustration', 'svg' ];
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
		$this->section_illustrations();
		
		$this->section_shape_style();
	}


	/**
	* Content > Illustrations.
	*/
	private function section_illustrations() {
		$this->start_controls_section(
			'section_illustrations',
			[
				'label' => __( 'Illustrations', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'illustrations_select',
			[
				'label' => __( 'Choose Illustration', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'teamwork_1',
				'options' => [
					'teamwork_1' => 'Teamwork 1',
					'teamwork_2' => 'Teamwork 2',
					'teamwork_3' => 'Teamwork 3',
					'teamwork_4' => 'Teamwork 4',
					'teamwork_5' => 'Teamwork 5',
					'teamwork_6' => 'Teamwork 6',
					'teamwork_7' => 'Teamwork 7',
					'teamwork_8' => 'Teamwork 8',
					'teamwork_9' => 'Teamwork 9',
					'teamwork_10' => 'Teamwork 10',
					'teamwork_11' => 'Teamwork 11',
					'teamwork_12' => 'Teamwork 12',
					'teamwork_13' => 'Teamwork 13',
					'teamwork_14' => 'Teamwork 14',
					'teamwork_15' => 'Teamwork 15',
				],
			]
		);

		$this->end_controls_section();
	}




	/**
	* Style > Shape.
	*/
	private function section_shape_style() {
		$this->start_controls_section(
			'section_shape_style',
			[
				'label' => __( 'Shape', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'shape_size',
			[
				'label' => __( 'Minimum Height', 'deo-elementor' ),
				'description' => __( 'Used to prevent jumping effect when the illustration is loading', 'deo-elementor'),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'after',
				'default' => [
					'size' => 600,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .deo-illustrations' => 'min-height: {{SIZE}}{{UNIT}};',
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
		$illustrations = $settings['illustrations_select'];

		$this->add_render_attribute( 'illustration_type', [
			'data-illustration' => $illustrations
		] );

		?>
			<div class="deo-illustrations" id="deo-illustrations" <?php echo $this->get_render_attribute_string( 'illustration_type' ); ?>></div>
		<?php
	}

}