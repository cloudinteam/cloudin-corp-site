<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Icon_Box extends \Elementor\Widget_Base {

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
		return 'deo-icon-box';
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
		return __( 'Deo Icon Box', 'deo-elementor' );
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
		return 'eicon-icon-box';
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
		return [ 'icon' ];
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
		
		$this->section_icon_style();
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
			'icon_select',
			[
				'label' => __( 'Icon', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'sl sl-designer-cup',
					'library' => 'streamline',
				],
			]
		);

		$this->add_control(
			'icon_base_size',
			[
				'label' => __( 'Base Size', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'large',
				'options' => [
					'large'  => __( 'Large', 'deo-elementor' ),
					'medium' => __( 'Medium', 'deo-elementor' ),
					'small' => __( 'Small', 'deo-elementor' ),
					'extra-small' => __( 'Extra Small', 'deo-elementor' ),
				],
				'prefix_class' => 'feature-size--'
			]
		);

		$this->add_control(
			'icon_link',
			[
				'label' => __( 'Link', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'deo-elementor' ),
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
					'{{WRAPPER}} .feature' => 'text-align: {{VALUE}};',
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

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#2550de',
				'selectors' => [
					'{{WRAPPER}} .feature__icon-holder' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_background_color',
			[
				'label' => __( 'Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#e6e8fa',
				'selectors' => [
					'{{WRAPPER}} .feature__icon-holder' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Icon Size', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 120,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .feature__icon-holder' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => __( 'Border', 'deo-elementor' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .feature__icon-holder',
			]
		);

		$this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
				'name'      => 'icon_box_shadow',
				'label' => __( 'Box Shadow', 'deo-elementor' ),
				'separator' => 'before',
        'selector'  => '{{WRAPPER}} .feature__icon-holder',
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

		$this->add_render_attribute( 'feature-icon-holder', 'class', 'feature__icon-holder' );

		$icon_tag = 'div';

		if ( ! empty( $settings['icon_link']['url'] ) ) {
			$this->add_render_attribute( 'feature-icon-holder', 'href', $settings['icon_link']['url'] );
			$icon_tag = 'a';

			if ( ! empty( $settings['icon_link']['is_external'] ) ) {
				$this->add_render_attribute( 'feature-icon-holder', 'target', '_blank' );
			}

			if ( $settings['icon_link']['nofollow'] ) {
				$this->add_render_attribute( 'feature-icon-holder', 'rel', 'nofollow' );
			}
		}

		if ( empty( $settings['icon'] ) && ! \Elementor\Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings['icon'] = 'fa fa-star';
		}

		if ( ! empty( $settings['icon'] ) ) {
			$this->add_render_attribute( 'icon', 'class', $settings['icon'] );
			$this->add_render_attribute( 'icon', 'aria-hidden', 'true' );
		}

		$migrated = isset( $settings['__fa4_migrated']['icon_select'] );
		$is_new = empty( $settings['icon'] ) && \Elementor\Icons_Manager::is_migration_allowed();

		?>

			<div class="feature">
				<<?php echo $icon_tag . ' ' . $this->get_render_attribute_string( 'feature-icon-holder' ); ?>>
				<?php if ( $is_new || $migrated ) :
					\Elementor\Icons_Manager::render_icon( $settings['icon_select'], [ 'aria-hidden' => 'true' ] );
				else : ?>
					<i <?php echo $this->get_render_attribute_string( 'icon' ); ?>></i>
				<?php endif; ?>
				</<?php echo $icon_tag; ?>>
			</div>

		<?php
	}

}