<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Mailchimp_Form extends \Elementor\Widget_Base {

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
		return 'deo-mailchimp-form';
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
		return __( 'Deo Mailchimp Form', 'deo-elementor' );
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
		return 'eicon-form-vertical';
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
		return [ 'form', 'mailchimp' ];
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
		$this->section_shortcode();
		
		$this->section_form_style();
		$this->section_fields_style();
		$this->section_alert_style();
		$this->section_button_style();
	}


	/**
	* Content > Shortcode.
	*/
	private function section_shortcode() {
		$this->start_controls_section(
			'section_shortcode',
			[
				'label' => __( 'Mailchimp Shortcode', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label' => __( 'Enter Mailchimp Shortcode', 'deo-elementor' ),
				'description' => sprintf( esc_html__( 'Paste shortcode generated from %1$sMailchimp for WP%2$s', 'deo-elementor' ), '<a href="' . admin_url( 'admin.php?page=mailchimp-for-wp-forms' ) . '" target="_blank">', '</a>' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => '[mc4wp_form id="24"]',
				'placeholder' => __( '[mc4wp_form id="24"]' ),
			]
		);

		$this->end_controls_section();
	}


	/**
	* Style > Form.
	*/
	private function section_form_style() {
		$this->start_controls_section(
			'section_form_style',
			[
				'label' => __( 'Form', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'columns_gap',
			[
				'label' => __( 'Columns Gap', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .deo-field-group' => 'padding-right: calc( {{SIZE}}{{UNIT}} / 2 ); padding-left: calc( {{SIZE}}{{UNIT}} / 2 );',
					'{{WRAPPER}} .mc4wp-form-fields' => 'margin-left: calc( -{{SIZE}}{{UNIT}} / 2 ); margin-right: calc( -{{SIZE}}{{UNIT}} / 2 );',
				],
			]
		);

		$this->add_responsive_control(
			'rows_gap',
			[
				'label' => __( 'Rows Gap', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .deo-field-group' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .mc4wp-form-fields' => 'margin-bottom: -{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}


	/**
	* Style > Fields.
	*/
	private function section_fields_style() {
		$this->start_controls_section(
			'section_fields_style',
			[
				'label' => __( 'Fields', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'fields_width',
			[
				'label' => __( 'Fields Width', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range'     => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 60,
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-input' => 'flex-basis: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'fields_text_color',
			[
				'label' => __( 'Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-input > input::-webkit-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .deo-field-type-input > input:-moz-placeholder' => 'color: {{VALUE}}; opacity: 1;',
					'{{WRAPPER}} .deo-field-type-input > input::-moz-placeholder' => 'color: {{VALUE}}; opacity: 1;',
					'{{WRAPPER}} .deo-field-type-input > input:-ms-input-placeholder' => 'color: {{VALUE}};',
					'{{WRAPPER}} .deo-field-type-input > input' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'fields_typography',
				'selector' => '{{WRAPPER}} .deo-field-type-input > input',
			]
		);

		$this->add_control(
			'fields_background_color',
			[
				'label' => __( 'Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-input > input' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'fields_border_color',
			[
				'label' => __( 'Border Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-input > input' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'fields_border_width',
			[
				'label' => __( 'Border Width', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-input > input' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'fields_border_radius',
			[
				'label' => __( 'Border Radius', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-input > input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'fields_padding',
			[
				'label' => __( 'Text Padding', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-input > input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}



	/**
	* Style > Alerts.
	*/
	private function section_alert_style() {
		$this->start_controls_section(
			'section_alert_style',
			[
				'label' => __( 'Alert', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'alert_error_color',
			[
				'label' => __( 'Error Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff3465',
				'selectors' => [
					'{{WRAPPER}} .mc4wp-error, {{WRAPPER}} .mc4wp-error a:hover, {{WRAPPER}} .mc4wp-error a:focus' => 'color: {{COLOR}};',
				],
			]
		);

		$this->add_control(
			'alert_notice_color',
			[
				'label' => __( 'Notice Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#2ce6ef',
				'selectors' => [
					'{{WRAPPER}} .mc4wp-notice, {{WRAPPER}} .mc4wp-notice a:hover, {{WRAPPER}} .mc4wp-notice a:focus' => 'color: {{COLOR}};',
				],
			]
		);

		$this->add_control(
			'alert_success_color',
			[
				'label' => __( 'Success Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#46d19b',
				'selectors' => [
					'{{WRAPPER}} .mc4wp-success, {{WRAPPER}} .mc4wp-success a:hover, {{WRAPPER}} .mc4wp-success a:focus' => 'color: {{COLOR}};',
				],
			]
		);

		$this->end_controls_section();

	}


	/**
	* Style > Button.
	*/
	private function section_button_style() {
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'button_width',
			[
				'label' => __( 'Button Width', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'separator' => 'after',
				'range'     => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 40,
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-submit' => 'flex-basis: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// BUTTON HOVER TABS

		$this->start_controls_tabs(
			'button_tabs'
		);

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'deo-elementor' ),
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label' => __( 'Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-submit > input' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-submit > input' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .deo-field-type-submit > input',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(), [
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .deo-field-type-submit > input',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-submit > input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_text_padding',
			[
				'label' => __( 'Text Padding', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-submit > input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'deo-elementor' ),
			]
		);

		$this->add_control(
			'button_hover_background_color',
			[
				'label' => __( 'Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-submit > input:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'label' => __( 'Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-submit > input' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-field-type-submit > input:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'button_border_border!' => '',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		// END BUTTON HOVER TABS

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
		$shortcode = do_shortcode( shortcode_unautop( $settings['shortcode'] ) );

		?>
			<div class="deo-mailchimp-newsletter">
				<?php echo $shortcode; ?>
			</div>
		<?php
	}

}