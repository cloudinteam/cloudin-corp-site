<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Pricing_Tables extends \Elementor\Widget_Base {

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
		return 'deo-pricing-tables';
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
		return __( 'Deo Pricing Tables', 'deo-elementor' );
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
		return 'eicon-price-table';
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
		return [ 'pricing', 'table' ];
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
		$this->section_toggle();
		$this->section_primary_pricing();
		$this->section_secondary_pricing();
		
    $this->section_toggle_style();
    $this->section_best_style();
		$this->section_content_style();
		$this->section_image_style();
		$this->section_title_style();
		$this->section_currency_style();
		$this->section_price_style();
		$this->section_term_style();
    $this->section_description_style();
    $this->section_features_style();
		$this->section_button_style();		
	}


	/**
  * Content > Toggle.
  */
  private function section_toggle() {
    $this->start_controls_section(
      'section_toggle',
      [
        'label' => __( 'Toggle', 'deo-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
		);

		$this->add_control(
      'toggle_show',
      [
        'label'   => __( 'Show Toggle', 'deo-elementor' ),
        'type'    => \Elementor\Controls_Manager::SWITCHER,
        'default' => 'yes',
      ]
    );

		$this->add_control(
      'toggle_primary_text',
      [
        'label' => __( 'Primary Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'separator' => 'before',
        'default' => __( 'Monthly', 'deo-elementor' ),
        'placeholder' => __( 'Monthly', 'deo-elementor' ),
      ]
		);

		$this->add_control(
      'toggle_secondary_text',
      [
        'label' => __( 'Secondary Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'separator' => 'before',
        'default' => __( 'Annual', 'deo-elementor' ),
        'placeholder' => __( 'Annual', 'deo-elementor' ),
      ]
		);
		
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => __( 'Left', 'deo-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'deo-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => __( 'Right', 'deo-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .deo-toggle__switch' => 'justify-content: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
  * Content > Primary Pricing.
  */
  private function section_primary_pricing() {
    $this->start_controls_section(
      'section_primary_pricing',
      [
        'label' => __( 'Primary', 'deo-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
      'pricing_primary_best_price',
      [
        'label'   => __( 'Best Price', 'deo-elementor' ),
        'type'    => \Elementor\Controls_Manager::SWITCHER,
        'default' => '',
      ]
    );

    $repeater->add_control(
      'pricing_primary_best_text',
      [
        'label' => __( 'Best Price Text', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Popular', 'deo-elementor' ),
        'placeholder' => __( 'Popular', 'deo-elementor' ),
        'condition' => [
          'pricing_primary_best_price' => 'yes'
        ]
      ]
    );

    $repeater->add_control(
      'pricing_primary_image', [
        'label' => __( 'Image', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'show_label' => false,
      ]
    );

    $repeater->add_control(
      'pricing_primary_name',
      [
        'label' => __( 'Name', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Business', 'deo-elementor' ),
        'placeholder' => __( 'Name', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_primary_currency',
      [
        'label' => __( 'Currency', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( '$', 'deo-elementor' ),
        'placeholder' => __( 'Currency', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_primary_price',
      [
        'label' => __( 'Price', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( '19', 'deo-elementor' ),
        'placeholder' => __( 'Price', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_primary_term',
      [
        'label' => __( 'Term', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => '',
        'placeholder' => __( 'Term', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_primary_description',
      [
        'label' => 'Description',
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __( 'An entry tool for those who started. Forever free.' ),
        'placeholder' => __( 'Description', 'deo-elementor' ),
        'title' => __( 'Input text here', 'deo-elementor' ),
        'rows' => 6,
        'separator' => 'before',
      ]
		);

		$repeater->add_control(
      'pricing_primary_button_text',
      [
        'label' => __( 'Button Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'separator' => 'before',
        'default' => __( 'Get Started', 'deo-elementor' ),
        'placeholder' => __( 'Button Text', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_primary_button_link',
      [
        'type'        => \Elementor\Controls_Manager::URL,
				'label'       => __( 'Link', 'deo-elementor' ),
				'separator' => 'before',
        'placeholder' => __( 'https://example.com', 'deo-elementor' ),
      ]
    );

		$repeater->add_control(
      'pricing_primary_features', [
        'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Features List' , 'deo-elementor' ),
				'label'   => __( 'Features', 'deo-elementor' ),
				'separator' => 'before',
        'dynamic' => [
          'active' => true,
        ],
      ]
    );
		
		$this->add_control(
			'pricing_primary_tables',
			[
				'label' => __( 'Pricing Tables', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'pricing_primary_name' => __( 'Free', 'deo-elementor' ),
						'pricing_primary_currency' => __( '$', 'deo-elementor' ),
						'pricing_primary_price' => __( '0', 'deo-elementor' ),
						'pricing_primary_description' => __( 'An entry tool for those who started. Forever free.', 'deo-elementor' ),
						'pricing_primary_button_text' => __( 'Get Started', 'deo-elementor' ),
						'pricing_primary_button_link' => __( '#', 'deo-elementor' ),
						'pricing_primary_features' => __( 'Features List', 'deo-elementor' ),
					],
					[
						'pricing_primary_best_price' => __( 'yes', 'deo-elementor' ),
						'pricing_primary_name' => __( 'Business', 'deo-elementor' ),
						'pricing_primary_currency' => __( '$', 'deo-elementor' ),
						'pricing_primary_price' => __( '9', 'deo-elementor' ),
						'pricing_primary_description' => __( 'Perfect plan for professional designers and users.', 'deo-elementor' ),
						'pricing_primary_button_text' => __( 'Get Started', 'deo-elementor' ),
						'pricing_primary_button_link' => __( '#', 'deo-elementor' ),
						'pricing_primary_features' => __( 'Features List', 'deo-elementor' ),
					],
					[
						'pricing_primary_name' => __( 'Premium', 'deo-elementor' ),
						'pricing_primary_currency' => __( '$', 'deo-elementor' ),
						'pricing_primary_price' => __( '17', 'deo-elementor' ),
						'pricing_primary_description' => __( 'Lifetime plan for professional designers and users.', 'deo-elementor' ),
						'pricing_primary_button_text' => __( 'Get Started', 'deo-elementor' ),
						'pricing_primary_button_link' => __( '#', 'deo-elementor' ),
						'pricing_primary_features' => __( 'Features List', 'deo-elementor' ),
					],
					[
						'pricing_primary_name' => __( 'VIP', 'deo-elementor' ),
						'pricing_primary_currency' => __( '$', 'deo-elementor' ),
						'pricing_primary_price' => __( '29', 'deo-elementor' ),
						'pricing_primary_description' => __( 'Lifetime plan for professional designers and users.', 'deo-elementor' ),
						'pricing_primary_button_text' => __( 'Get Started', 'deo-elementor' ),
						'pricing_primary_button_link' => __( '#', 'deo-elementor' ),
						'pricing_primary_features' => __( 'Features List', 'deo-elementor' ),
					],
				],
				'title_field' => '{{{ pricing_primary_name }}}',
			]
		);

    $this->end_controls_section();
	}

		/**
  * Content > Secondary Pricing.
  */
  private function section_secondary_pricing() {
    $this->start_controls_section(
      'section_secondary_pricing',
      [
        'label' => __( 'Secondary', 'deo-elementor' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
		);
		
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
      'pricing_secondary_best_price',
      [
        'label'   => __( 'Best Price', 'deo-elementor' ),
        'type'    => \Elementor\Controls_Manager::SWITCHER,
        'default' => '',
      ]
    );

    $repeater->add_control(
      'pricing_secondary_best_text',
      [
        'label' => __( 'Best Price Text', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Popular', 'deo-elementor' ),
        'placeholder' => __( 'Popular', 'deo-elementor' ),
        'condition' => [
          'pricing_secondary_best_price' => 'yes'
        ]
      ]
    );

    $repeater->add_control(
      'pricing_secondary_image', [
        'label' => __( 'Image', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ],
        'show_label' => false,
      ]
    );

    $repeater->add_control(
      'pricing_secondary_name',
      [
        'label' => __( 'Name', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Business', 'deo-elementor' ),
        'placeholder' => __( 'Name', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_secondary_currency',
      [
        'label' => __( 'Currency', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( '$', 'deo-elementor' ),
        'placeholder' => __( 'Currency', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_secondary_price',
      [
        'label' => __( 'Price', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => __( '99', 'deo-elementor' ),
        'placeholder' => __( 'Price', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_secondary_term',
      [
        'label' => __( 'Term', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => '',
        'placeholder' => __( 'Term', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_secondary_description',
      [
        'label' => 'Description',
        'type' => \Elementor\Controls_Manager::TEXTAREA,
        'default' => __( 'An entry tool for those who started. Forever free.' ),
        'placeholder' => __( 'Description', 'deo-elementor' ),
        'title' => __( 'Input text here', 'deo-elementor' ),
        'rows' => 6,
        'separator' => 'before',
      ]
		);

		$repeater->add_control(
      'pricing_secondary_button_text',
      [
        'label' => __( 'Button Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'separator' => 'before',
        'default' => __( 'Get Started', 'deo-elementor' ),
        'placeholder' => __( 'Button Text', 'deo-elementor' ),
      ]
    );

    $repeater->add_control(
      'pricing_secondary_button_link',
      [
        'type'        => \Elementor\Controls_Manager::URL,
				'label'       => __( 'Link', 'deo-elementor' ),
				'separator' => 'before',
        'placeholder' => __( 'https://example.com', 'deo-elementor' ),
      ]
    );

		$repeater->add_control(
      'pricing_secondary_features', [
        'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Features List' , 'deo-elementor' ),
				'label'   => __( 'Features', 'deo-elementor' ),
				'separator' => 'before',
        'dynamic' => [
          'active' => true,
        ],
      ]
    );
		
		$this->add_control(
			'pricing_secondary_tables',
			[
				'label' => __( 'Pricing Tables', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'pricing_secondary_name' => __( 'Free', 'deo-elementor' ),
						'pricing_secondary_currency' => __( '$', 'deo-elementor' ),
						'pricing_secondary_price' => __( '0', 'deo-elementor' ),
						'pricing_secondary_description' => __( 'An entry tool for those who started. Forever free.', 'deo-elementor' ),
						'pricing_secondary_button_text' => __( 'Get Started', 'deo-elementor' ),
						'pricing_secondary_button_link' => __( '#', 'deo-elementor' ),
						'pricing_secondary_features' => __( 'Features List', 'deo-elementor' ),
					],
					[
						'pricing_secondary_best_price' => __( 'yes', 'deo-elementor' ),
						'pricing_secondary_name' => __( 'Business', 'deo-elementor' ),
						'pricing_secondary_currency' => __( '$', 'deo-elementor' ),
						'pricing_secondary_price' => __( '99', 'deo-elementor' ),
						'pricing_secondary_description' => __( 'Perfect plan for professional designers and users.', 'deo-elementor' ),
						'pricing_secondary_button_text' => __( 'Get Started', 'deo-elementor' ),
						'pricing_secondary_button_link' => __( '#', 'deo-elementor' ),
						'pricing_secondary_features' => __( 'Features List', 'deo-elementor' ),
					],
					[
						'pricing_secondary_name' => __( 'Premium', 'deo-elementor' ),
						'pricing_secondary_currency' => __( '$', 'deo-elementor' ),
						'pricing_secondary_price' => __( '199', 'deo-elementor' ),
						'pricing_secondary_description' => __( 'Lifetime plan for professional designers and users.', 'deo-elementor' ),
						'pricing_secondary_button_text' => __( 'Get Started', 'deo-elementor' ),
						'pricing_secondary_button_link' => __( '#', 'deo-elementor' ),
						'pricing_secondary_features' => __( 'Features List', 'deo-elementor' ),
					],
					[
						'pricing_secondary_name' => __( 'VIP', 'deo-elementor' ),
						'pricing_secondary_currency' => __( '$', 'deo-elementor' ),
						'pricing_secondary_price' => __( '299', 'deo-elementor' ),
						'pricing_secondary_description' => __( 'Lifetime plan for professional designers and users.', 'deo-elementor' ),
						'pricing_secondary_button_text' => __( 'Get Started', 'deo-elementor' ),
						'pricing_secondary_button_link' => __( '#', 'deo-elementor' ),
						'pricing_secondary_features' => __( 'Features List', 'deo-elementor' ),
					],
				],
				'title_field' => '{{{ pricing_secondary_name }}}',
			]
		);

    $this->end_controls_section();
	}



	/**
  * Style > Toggle.
  */
  private function section_toggle_style() {
    $this->start_controls_section(
      'section_toggle_style',
      [
        'label' => __( 'Toggle', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'toggle_show' => 'yes',
				],
      ]
		);

		$this->add_control(
			'toggle_margin_bottom',
			[
				'label' => __( 'Toggle Margin Bottom', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 60,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .deo-toggle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
      'toggle_background_color',
      [
        'label' => __( 'Background Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
        'selectors' => [
          '{{WRAPPER}} .deo-toggle__button' => 'background-color: {{VALUE}};',
        ],
      ]
		);

		$this->add_control(
      'toggle_text_color',
      [
        'label' => __( 'Text Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
        'selectors' => [
          '{{WRAPPER}} .deo-toggle__button' => 'color: {{VALUE}};',
        ],
      ]
		);
		
		$this->add_control(
      'toggle_active_background_color',
      [
        'label' => __( 'Active Background Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
        'selectors' => [
          '{{WRAPPER}} .deo-toggle__button--is-active, .deo-toggle__button:hover' => 'background-color: {{VALUE}};',
        ],
      ]
		);
		
		$this->add_control(
      'toggle_active_text_color',
      [
        'label' => __( 'Active Text Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
        'selectors' => [
          '{{WRAPPER}} .deo-toggle__button--is-active' => 'color: {{VALUE}};',
        ],
      ]
		);

		$this->add_control(
      'toggle_border_color',
      [
        'label' => __( 'Border Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'separator' => 'after',
        'selectors' => [
          '{{WRAPPER}} .deo-toggle__button:not(.deo-toggle__button--is-active)' => 'border-color: {{VALUE}};',
        ],
      ]
		);

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'toggle_typography',
				'selector' => '{{WRAPPER}} .deo-toggle__button',
      ]
    );

		$this->end_controls_section();
  }
  
  /**
  * Style > Best.
  */
  private function section_best_style() {
    $this->start_controls_section(
      'section_best_style',
      [
        'label' => __( 'Best', 'deo-elementor' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'best_background_color',
      [
        'label' => __( 'Background Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__best' => 'background-color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(
      'best_text_color',
      [
        'label' => __( 'Text Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__best-text' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'best_typography',
        'selector' => '{{WRAPPER}} .pricing__best',
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

    // Columns margin.
    $this->add_control(
      'pricing_columns_margin',
      [
        'label'     => __( 'Columns margin', 'deo-elementor' ),
        'type'      => \Elementor\Controls_Manager::SLIDER,
        'default'   => [
          'size' => 30,
        ],
        'range'     => [
          'px' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .pricing-col' => 'padding-right: calc( {{SIZE}}{{UNIT}} / 2 ); padding-left: calc( {{SIZE}}{{UNIT}} / 2 );',
          '{{WRAPPER}} .pricing-row' => 'margin-left: calc( -{{SIZE}}{{UNIT}} / 2 ); margin-right: calc( -{{SIZE}}{{UNIT}} / 2 );',
        ]
      ]
    );
    
    $this->add_responsive_control(
      'content_align',
      [
        'label' => __( 'Alignment', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::CHOOSE,
        'separator' => 'before',
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
          '{{WRAPPER}} .pricing' => 'text-align: {{VALUE}};',
        ],
      ]
    );

		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'after',
				'selectors' => [
					'{{WRAPPER}} .pricing' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'content_background',
				'label' => __( 'Background', 'deo-elementor' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .pricing',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => __( 'Border', 'deo-elementor' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .pricing',
			]
		);

		$this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
				'name'      => 'content_box_shadow',
				'label' => __( 'Box Shadow', 'deo-elementor' ),
				'separator' => 'before',
        'selector'  => '{{WRAPPER}} .pricing',
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
      'image_bottom_margin',
      [
        'label' => __( 'Bottom Margin', 'deo-elementor' ),
        'type' => \Elementor\Controls_Manager::SLIDER,
        'separator' => 'after',
        'default' => [
          'size' => 0,
        ],
        'range' => [
          'px' => [
            'min' => 0,
            'max' => 100,
          ],
        ],
        'selectors' => [
          '{{WRAPPER}} .pricing__img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
      ]
    );

    $this->end_controls_section();
  }
	
	/**
  * Style > Title.
  */
  private function section_title_style() {
    $this->start_controls_section(
      'section_title_style',
      [
        'label' => __( 'Title', 'deo-elementor' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
		);
		
		$this->add_control(
			'title_bottom_margin',
			[
				'label' => __( 'Bottom Margin', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'after',
				'default' => [
					'size' => 7,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->add_control(
      'title_color',
      [
        'label' => __( 'Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__title' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'selector' => '{{WRAPPER}} .pricing__title',
      ]
    );

    $this->end_controls_section();
  }

  /**
  * Style > Currency.
  */
  private function section_currency_style() {
    $this->start_controls_section(
      'section_currency_style',
      [
        'label' => __( 'Currency', 'deo-elementor' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'currency_color',
      [
        'label' => __( 'Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__currency' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'currency_typography',
        'selector' => '{{WRAPPER}} .pricing__currency',
      ]
    );

    $this->end_controls_section();
  }

  /**
  * Style > Price.
  */
  private function section_price_style() {
    $this->start_controls_section(
      'section_price_style',
      [
        'label' => __( 'Price', 'deo-elementor' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'price_color',
      [
        'label' => __( 'Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__price' => 'color: {{VALUE}};',
        ],
      ]
		);
		
		$this->add_control(
      'price_best_color',
      [
        'label' => __( 'Best Price Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing--best .pricing__price, .pricing--best .pricing__currency' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'price_typography',
        'selector' => '{{WRAPPER}} .pricing__price',
      ]
    );

    $this->end_controls_section();
  }

  /**
  * Style > Term.
  */
  private function section_term_style() {
    $this->start_controls_section(
      'section_term_style',
      [
        'label' => __( 'Term', 'deo-elementor' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(
      'term_color',
      [
        'label' => __( 'Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__term' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'term_typography',
        'selector' => '{{WRAPPER}} .pricing__term',
      ]
    );

    $this->end_controls_section();
  }

  /**
  * Style > Description.
  */
  private function section_description_style() {
    $this->start_controls_section(
      'section_description_style',
      [
        'label' => __( 'Description', 'deo-elementor' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
		);
		
		$this->add_control(
			'description_top_margin',
			[
				'label' => __( 'Top Margin', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'after',
				'default' => [
					'size' => 18,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing__text' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->add_control(
      'description_color',
      [
        'label' => __( 'Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__text' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'description_typography',
        'selector' => '{{WRAPPER}} .pricing__text',
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
		
		$this->add_control(
			'button_top_margin',
			[
				'label' => __( 'Top Margin', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'after',
				'default' => [
					'size' => 32,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing__button' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->add_group_control(
      \Elementor\Group_Control_Background::get_type(), [
        'name'     => 'background',
        'label'    => __( 'Section Background', 'deo-elementor' ),
        'types'    => [ 'classic', 'gradient' ],
        'selector' => '{{WRAPPER}} .pricing__button',
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name'     => 'typography',
        'label'    => __( 'Typography', 'deo-elementor' ),
        'selector' => '{{WRAPPER}} .pricing__button',
      ]
    );

    $this->add_control(
      'border_radius',
      [
        'label'      => __( 'Border Radius', 'deo-elementor' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', '%' ],
        'selectors'  => [
          '{{WRAPPER}} .pricing__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $this->add_control(
      'text_padding',
      [
        'label'      => __( 'Padding', 'deo-elementor' ),
        'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px', 'em', '%' ],
        'selectors'  => [
          '{{WRAPPER}} .pricing__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    // Add the tabbed control.
    $this->tabbed_button_controls();

    $this->end_controls_section();
  }

  /**
  * Tabs for the Style > Button section.
  */
  private function tabbed_button_controls() {
    $this->start_controls_tabs( 'tabs_background' );

    $this->start_controls_tab(
      'tab_background_normal',
      [
        'label' => __( 'Normal', 'deo-elementor' ),
      ]
    );

    $this->add_control(
      'button_text_color',
      [
        'type'      => \Elementor\Controls_Manager::COLOR,
        'label'     => __( 'Text Color', 'deo-elementor' ),
        'default'   => '#ffffff',
        'selectors' => [
          '{{WRAPPER}} .pricing__button' => 'color: {{VALUE}};',
        ],
      ]
    );
    $this->add_control(
      'button_bg_color',
      [
        'type'      => \Elementor\Controls_Manager::COLOR,
        'label'     => __( 'Background Color', 'deo-elementor' ),
        'default'   => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__button' => 'background-color: {{VALUE}};',
        ],
      ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'label' => __( 'Border', 'deo-elementor' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .pricing__button',
			]
		);

    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
        'name'      => 'button_box_shadow',
        'selector'  => '{{WRAPPER}} .pricing__button',
        'separator' => '',
      ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
      'tab_background_hover',
      [
        'label' => __( 'Hover', 'deo-elementor' ),
      ]
    );

    $this->add_control(
      'button_hover_text_color',
      [
        'type'      => \Elementor\Controls_Manager::COLOR,
        'label'     => __( 'Text Color', 'deo-elementor' ),
        'default'   => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__button:hover' => 'color: {{VALUE}};',
        ],
      ]
    );
    $this->add_control(
      'button_hover_bg_color',
      [
        'type'      => \Elementor\Controls_Manager::COLOR,
        'label'     => __( 'Background Color', 'deo-elementor' ),
        'default'   => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__button:hover' => 'background-color: {{VALUE}};',
        ],
      ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'button_hover_border',
				'label' => __( 'Border', 'deo-elementor' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .pricing__button:hover',
			]
		);

    $this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
        'name'      => 'button_hover_box_shadow',
        'selector'  => '{{WRAPPER}} .pricing__button:hover',
        'separator' => '',
      ]
    );

    $this->add_control(
      'background_hover_transition',
      [
        'label'       => __( 'Transition Duration', 'deo-elementor' ),
        'type'        => \Elementor\Controls_Manager::SLIDER,
        'default'     => [
          'size' => 0.3,
        ],
        'range'       => [
          'px' => [
            'max'  => 3,
            'step' => 0.1,
          ],
        ],
        'render_type' => 'ui',
        'selectors'   => [
          '{{WRAPPER}} .pricing__button' => 'transition: all {{SIZE}}s ease;',
        ],
      ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();
	}
	
	/**
  * Style > Features.
  */
  private function section_features_style() {
    $this->start_controls_section(
      'section_features_style',
      [
        'label' => __( 'Features', 'deo-elementor' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
      ]
		);
		
		$this->add_control(
			'features_top_margin',
			[
				'label' => __( 'Top Margin', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'after',
				'default' => [
					'size' => 28,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .pricing__features' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $this->add_control(
      'features_color',
      [
        'label' => __( 'Color', 'elementor' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
          '{{WRAPPER}} .pricing__features' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'features_typography',
        'selector' => '{{WRAPPER}} .pricing__features',
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

		if ( 'yes' === $settings['toggle_show'] ) : ?>
			<!-- Toggle -->
			<div class="deo-toggle">
				<label class="deo-toggle__switch">
					<input type="checkbox" class="deo-toggle__checkbox">
					<span class="deo-toggle__button deo-toggle__button--is-active" data-tab-id="primary-pricing"><?php echo $settings['toggle_primary_text']; ?></span>
					<span class="deo-toggle__button" data-tab-id="secondary-pricing"><?php echo $settings['toggle_secondary_text']; ?></span>
				</label>
			</div>
		<?php endif; ?>
		
		<div class="pricing-container">
			<?php $this->get_pricing_tables( 'primary' ); ?>
			<?php if ( 'yes' === $settings['toggle_show'] ) : ?>
				<?php $this->get_pricing_tables( 'secondary' ); ?>
			<?php endif; ?>
		</div>

		<?php
	}


	/**
	 * Get pricing tables.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function get_pricing_tables( $type = 'primary' ) {
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( "pricing_{$type}_best_text", 'class', 'pricing__best-text' );
		$this->add_render_attribute( "pricing_{$type}_name", 'class', 'pricing__title' );
		$this->add_render_attribute( "pricing_{$type}_currency", 'class', 'pricing__currency' );
		$this->add_render_attribute( "pricing_{$type}_price", 'class', 'pricing__price' );
		$this->add_render_attribute( "pricing_{$type}_term", 'class', 'pricing__term' );
    $this->add_render_attribute( "pricing_{$type}_description", 'class', 'pricing__text' );
    $this->add_render_attribute( "pricing_{$type}_features", 'class', 'pricing__features' );
    ?>

		<div class="<?php echo "{$type}-pricing" ?>">

			<div class="row pricing-row">

				<?php foreach ( $settings["pricing_{$type}_tables"] as $index => $item ) : ?>

          <?php
            $pricing_setting_key = $this->get_repeater_setting_key( "pricing_{$type}_button", "pricing_{$type}_tables", $index );

            $this->add_render_attribute( $pricing_setting_key, [
              'class' => ['pricing__button', 'btn', 'btn--lg', 'btn--color'],
            ] );

            $this->add_link_attributes( $pricing_setting_key, $item["pricing_{$type}_button_link"] );
          ?>

					<div class="col-lg col-md-6 pricing-col">
            <div class="pricing hover-up <?php if ( 'yes' === $item["pricing_{$type}_best_price"] ) { echo esc_attr( 'pricing--best' ); } ?>">
              <?php if ( 'yes' === $item["pricing_{$type}_best_price"] && isset( $item["pricing_{$type}_best_text"] ) ) : ?>
                <div class="pricing__best">
                  <?php if ( isset( $item["pricing_{$type}_best_text"] ) ) : ?>
                    <span <?php echo $this->get_render_attribute_string( "pricing_{$type}_best_text" ); ?>><?php echo $item["pricing_{$type}_best_text"]; ?></span>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
							<div class="pricing__price-box">
                <?php if ( ! empty( $item["pricing_{$type}_image"] ) ) {
                  echo wp_get_attachment_image( $item["pricing_{$type}_image"]['id'], 'full', false, [ 'class' => 'pricing__img' ] );
                } ?>
								<?php if ( isset( $item["pricing_{$type}_name"] ) ) : ?>
									<h3 <?php echo $this->get_render_attribute_string( "pricing_{$type}_name" ); ?>><?php echo $item["pricing_{$type}_name"]; ?></h3>
								<?php endif; ?>
								<?php if ( isset( $item["pricing_{$type}_currency"] ) ) : ?>
									<span <?php echo $this->get_render_attribute_string( "pricing_{$type}_currency" ); ?>><?php echo $item["pricing_{$type}_currency"]; ?></span>
								<?php endif; ?>
								<?php if ( isset( $item["pricing_{$type}_price"] ) ) : ?>
									<span <?php echo $this->get_render_attribute_string( "pricing_{$type}_price" ); ?>><?php echo $item["pricing_{$type}_price"]; ?></span>
								<?php endif; ?>
								<?php if ( isset( $item["pricing_{$type}_term"] ) ) : ?>
									<span <?php echo $this->get_render_attribute_string( "pricing_{$type}_term" ); ?>><?php echo $item["pricing_{$type}_term"]; ?></span>
								<?php endif; ?>
							</div>

							<!-- Description -->
							<?php if ( isset( $item["pricing_{$type}_description"] ) ) : ?>
								<p <?php echo $this->get_render_attribute_string( "pricing_{$type}_description" ); ?>>
									<?php echo esc_html( $item["pricing_{$type}_description"] ); ?>
								</p>
              <?php endif; ?>
              
              <!-- Features -->
              <?php if ( isset( $item["pricing_{$type}_features"] ) ) : ?>
                <div <?php echo $this->get_render_attribute_string( "pricing_{$type}_features" ); ?>>
                  <?php echo $item["pricing_{$type}_features"]; ?>
                </div>
              <?php endif; ?>

							<!-- Button -->
							<?php if ( isset( $item["pricing_{$type}_button_text"] ) ) : ?>
								<a <?php echo $this->get_render_attribute_string( $pricing_setting_key ); ?>>
									<span <?php echo $this->get_render_attribute_string( "pricing_{$type}_button_text" ); ?>><?php echo $item["pricing_{$type}_button_text"]; ?></span>
								</a>
							<?php endif; ?>							

						</div>
					</div> <!-- .col -->

				<?php endforeach; ?>

			</div> <!-- .row -->

		</div> <!-- .type-pricing -->
		<?php
	}

}