<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Case_Studies extends \Elementor\Widget_Base {

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
		return 'deo-case-studies';
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
		return __( 'Deo Case Studies', 'deo-elementor' );
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
		return 'eicon-posts-grid';
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
		return [ 'case studies', 'projects' ];
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
		$this->section_post_options();
		$this->section_image();
		$this->section_meta();
		$this->section_content();

		$this->section_filter_style();
		$this->section_grid_style();
		$this->section_title_style();
		$this->section_meta_style();
		$this->section_content_style();
		$this->section_pagination_style();
	}


	/**
	* Content > Post Options.
	*/
	private function section_post_options() {
		$this->start_controls_section(
			'section_post_options',
			[
				'label' => esc_html__( 'Post Options', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Filter Categories
		$this->add_control(
			'filter_item_list',
			[
				'label'         => esc_html__( 'Categories', 'deo-elementor'),
				'type'          => \Elementor\Controls_Manager::SELECT2,
				'options'       => $this->get_post_categories(),
				'multiple'      => true,
				'label_block'		=> true,
				'description'   => esc_html__('Remove all categories to show all. This option affects filter as well.', 'deo-elementor'),
			]
		);

		// Items
		$this->add_control(
			'posts_per_page',
			[
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'label'       => '<i class="fa fa-th-large"></i> ' . esc_html__( 'Posts', 'deo-elementor' ),
				'placeholder' => esc_html__( '3', 'deo-elementor' ),
				'default'     => 3,
			]
		);

		// Order by
		$this->add_control(
			'orderby',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => '<i class="fa fa-sort"></i> ' . esc_html__( 'Order by', 'deo-elementor' ),
				'default' => 'date',
				'options' => [
					'date'          => esc_html__( 'Date', 'deo-elementor' ),
					'title'         => esc_html__( 'Title', 'deo-elementor' ),
					'modified'      => esc_html__( 'Modified date', 'deo-elementor' ),
					'comment_count' => esc_html__( 'Comment count', 'deo-elementor' ),
					'rand'          => esc_html__( 'Random', 'deo-elementor' ),
				],
			]
		);

		// Order
		$this->add_control(
			'order',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => '<i class="fa fa-sort"></i> ' . esc_html__( 'Order', 'deo-elementor' ),
				'default' => 'DESC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'deo-elementor' ),
					'DESC' => esc_html__( 'Descending', 'deo-elementor' ),
				],
			]
		);

		// Ignore sticky posts
		$this->add_control(
			'ignore_sticky_posts',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . __( 'Ignore Sticky Posts', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		// Show filter
		$this->add_control(
			'filter_show',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . __( 'Show filter', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		// Display pagination.
		$this->add_control(
			'post_pagination',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => '<i class="fa fa-arrow-circle-right"></i> ' . __( 'Pagination Type', 'deo-elementor' ),
				'default' => 'disabled',
				'separator' => 'before',
				'options' => [
					'disabled'   => __( 'No Pagination', 'deo-elementor' ),
					'numbered'   => __( 'Numbered', 'deo-elementor' ),
					'load_more'  => __( 'Load More', 'deo-elementor' ),
				],
			]
		);

		$this->add_control(
			'pagination_load_more_text',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Load More Text', 'deo-elementor' ),
				'placeholder' => __( 'Load More', 'deo-elementor' ),
				'default'     => __( 'Load More', 'deo-elementor' ),
				'condition'		=> [ 'post_pagination' => 'load_more' ]
			]
		);

		// Specific Posts by ID.
		$this->add_control(
			'post_ids',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => esc_html__( 'Show specific posts by ID', 'deo-elementor' ),
				'placeholder' => esc_html__( 'ex.: 256, 54, 78', 'deo-elementor' ),
				'description'   => esc_html__( 'Paste post ID\'s separated by commas. To find ID, click edit post and you\'ll find it in the browser address bar', 'deo-elementor' ),
				'default'     => '',
				'separator'     => 'before',
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	/**
	* Content > Image.
	*/
	private function section_image() {
		$this->start_controls_section(
			'section_image',
			[
				'label' => esc_html__( 'Image', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Hide image
		$this->add_control(
			'image_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Hide', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		// Image Size
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image',
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'emaus_case_study_thumbnail',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Content > Meta section.
	*/
	private function section_meta() {
		$this->start_controls_section(
			'section_meta',
			[
				'label' => esc_html__( 'Meta', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Hide categories
		$this->add_control(
			'category_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Hide Categories', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Content > Content section.
	*/
	private function section_content() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Hide content.
		$this->add_control(
			'read_more_show',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . esc_html__( 'Hide Link', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->add_control(
			'read_more_text', [
				'label' => __( 'Link Text', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'View Case Study' , 'deo-elementor' ),
				'condition' => [
					'read_more_show!' => 'yes'
				]
			]
		);

		$this->end_controls_section();
	}


	/**
	* Style > Filter.
	*/
	private function section_filter_style() {
		$this->start_controls_section(
			'section_filter_style',
			[
				'label'     => __( 'Filter', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'filter_show' => 'yes'
				]
			]
		);

		$this->add_control(
			'filter_align',
			[
				'label' => __( 'Filter alignment', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'text-left' => [
						'title' => __( 'Left', 'deo-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'deo-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-right' => [
						'title' => __( 'Right', 'deo-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'text-center',
				'toggle' => true,
			]
		);

		// Filter active background color
		$this->add_control(
			'filter_active_background_color',
			[
				'label' => __( 'Filter active background color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FF3465',
				'selectors' => [
					'{{WRAPPER}} .project-filter a.active, {{WRAPPER}} .project-filter a:hover, {{WRAPPER}} .project-filter a:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .project-filter a.active, {{WRAPPER}} .project-filter a:hover, {{WRAPPER}} .project-filter a:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Filter active color
		$this->add_control(
			'filter_active_color',
			[
				'label' => __( 'Filter active color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .project-filter a.active, {{WRAPPER}} .project-filter a:hover, {{WRAPPER}} .project-filter a:focus' => 'color: {{VALUE}};',
				],
			]
		);

		// Filter links color
		$this->add_control(
			'filter_links_color',
			[
				'label' => __( 'Filter links color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#656970',
				'selectors' => [
					'{{WRAPPER}} .project-filter a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'filter_typography',
				'selector' => '{{WRAPPER}} .project-filter a',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Grid.
	*/
	private function section_grid_style() {
		$this->start_controls_section(
			'section_grid_style',
			[
				'label'     => esc_html__( 'Grid', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Columns
		$this->add_responsive_control(
			'post_columns',
			[
				'label'   => __( 'Columns', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 4,
				'tablet_default' => 6,
				'mobile_default' => 12,
				'options' => [         
					3 => 4,
					4 => 3,
					6 => 2,
					12 => 1
				],
				'frontend_available' => true,
			]
		);

		// Columns gap.
		$this->add_control(
			'grid_style_columns_gap',
			[
				'label'     => esc_html__( 'Columns gap', 'deo-elementor' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'before',
				'default'   => [
					'size' => 38,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .case-study' => 'padding-right: calc( {{SIZE}}{{UNIT}} / 2 ); padding-left: calc( {{SIZE}}{{UNIT}} / 2 );',
					'{{WRAPPER}} .masonry-grid__case-study' => 'margin-left: calc( -{{SIZE}}{{UNIT}} / 2 ); margin-right: calc( -{{SIZE}}{{UNIT}} / 2 );',
				],
			]
		);

		// Rows gap.
		$this->add_control(
			'grid_style_rows_gap',
			[
				'label'     => __( 'Rows gap', 'deo-elementor' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'default'   => [
					'size' => 50,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .case-study__entry' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
				'label'     => esc_html__( 'Title', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .case-study__title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .case-study__title:hover a, {{WRAPPER}} .case-study__title:focus a' => 'color: {{VALUE}}; background-image: linear-gradient(to right, {{VALUE}} 0%, {{VALUE}} 100%);',
					'{{WRAPPER}} .title-underline a' => 'background-image: linear-gradient(to right, {{VALUE}} 0%, {{VALUE}} 100%);'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .case-study__title',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Meta.
	*/
	private function section_meta_style() {
		$this->start_controls_section(
			'section_meta_style',
			[
				'label'     => esc_html__( 'Meta', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'meta_text_color',
			[
				'label' => esc_html__( 'Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .case-study__category' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'meta_text_hover_color',
			[
				'label' => esc_html__( 'Text Hover Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .case-study__category:hover, {{WRAPPER}} .case-study__category:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'selector' => '{{WRAPPER}} .case-study__category',
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
				'label'     => esc_html__( 'Content', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'content_link_color',
			[
				'label' => esc_html__( 'Link Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .case-study__read-more' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_link_hover_color',
			[
				'label' => esc_html__( 'Link Hover Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .case-study__read-more:hover, {{WRAPPER}} .case-study__read-more:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'content_link_line_color',
			[
				'label' => esc_html__( 'Link Line Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .case-study__read-more:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_link_typography',
				'selector' => '{{WRAPPER}} .case-study__read-more',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Pagination.
	*/
	private function section_pagination_style() {
		$this->start_controls_section(
			'section_pagination_style',
			[
				'label'     => __( 'Pagination', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'post_pagination!' => 'disabled'
				]
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
					'{{WRAPPER}} .elementor-pagination' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'pagination_load_more_padding',
			[
				'label' => __( 'Padding', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .deo-load-more__button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [ 'post_pagination' => 'load_more' ]
			]
		);

		$this->add_control(
			'pagination_load_more_background_color',
			[
				'label' => __( 'Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'separator' => 'before',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-load-more__button' => 'background-color: {{VALUE}};',
				],
				'condition' => [ 'post_pagination' => 'load_more' ]
			]
		);

		$this->add_control(
			'pagination_load_more_text_color',
			[
				'label' => __( 'Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-load-more__button' => 'color: {{VALUE}};',
				],
				'condition' => [ 'post_pagination' => 'load_more' ]
			]
		);

		$this->add_control(
			'pagination_load_more_hover_background_color',
			[
				'label' => __( 'Hover Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-load-more__button:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [ 'post_pagination' => 'load_more' ]
			]
		);

		$this->add_control(
			'pagination_load_more_hover_text_color',
			[
				'label' => __( 'Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .deo-load-more__button:hover' => 'color: {{VALUE}};',
				],
				'condition' => [ 'post_pagination' => 'load_more' ]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'pagination_load_more_border',
				'label' => __( 'Border', 'deo-elementor' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .deo-load-more__button',
				'condition' => [ 'post_pagination' => 'load_more' ]
			]
		);

		$this->add_control(
			'pagination_load_more_border_radius',
			[
				'label' => __( 'Border Radius', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .deo-load-more__button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [ 'post_pagination' => 'load_more' ]
			]
		);

		$this->add_group_control(
					\Elementor\Group_Control_Box_Shadow::get_type(),
					[
				'name'      => 'pagination_load_more_box_shadow',
				'label' => __( 'Box Shadow', 'deo-elementor' ),
				'separator' => 'before',
				'selector'  => '{{WRAPPER}} .deo-load-more__button',
				'condition' => [ 'post_pagination' => 'load_more' ]
					]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pagination_load_more_typography',
				'selector' => '{{WRAPPER}} .deo-load-more__button',
				'condition' => [ 'post_pagination' => 'load_more' ]
			]
		);

		$this->add_control(
			'pagination_background_color',
			[
				'label' => __( 'Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .page-numbers' => 'background-color: {{VALUE}};',
				],
				'condition' => [ 'post_pagination' => 'numbered' ]
			]
		);

		$this->add_control(
			'pagination_text_color',
			[
				'label' => __( 'Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .page-numbers' => 'color: {{VALUE}};',
				],
				'condition' => [ 'post_pagination' => 'numbered' ]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'pagination_border',
				'label' => __( 'Border', 'deo-elementor' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .page-numbers:not(.current)',
				'condition' => [ 'post_pagination' => 'numbered' ]
			]
		);	

		$this->add_control(
			'pagination_active_background_color',
			[
				'label' => __( 'Active Background Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'separator' => 'before',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .page-numbers.current, {{WRAPPER}} .page-numbers:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [ 'post_pagination' => 'numbered' ]
			]
		);

		$this->add_control(
			'pagination_active_text_color',
			[
				'label' => __( 'Active Text Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .page-numbers.current, {{WRAPPER}} .page-numbers:hover' => 'color: {{VALUE}};',
				],
				'condition' => [ 'post_pagination' => 'numbered' ]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'pagination_typography',
				'selector' => '{{WRAPPER}} .page-numbers',
				'condition' => [ 'post_pagination' => 'numbered' ]
			]
		);

		$this->add_control(
			'pagination_arrows_size',
			[
				'label'     => __( 'Arrows Size', 'deo-elementor' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'before',
				'default'   => [
					'size' => 12,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .page-numbers i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [ 'post_pagination' => 'numbered' ]
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
		$query = $this->get_query( $settings );
		?>

		<?php if ( 'yes' == $settings['filter_show'] ) {
			echo $this->render_filter_items( $settings );
		} ?>

		<?php
		// Ajax parameters
		if ( ! empty( $query ) && is_object( $query ) ) {
			$ajax_param = $this->_ajax_param( $settings );
		}

		// Max page
		$page_max = ( ! empty( $query->max_num_pages ) ) ? $query->max_num_pages : 1;

		// Open load more container
		echo '<div class="deo-load-more-container"
							data-page_max="' . esc_attr( $page_max ) . '"
							data-page="1"
							data-settings=\'' . wp_json_encode( $ajax_param ) . '\'>';
		?>

			<div class="row masonry-grid masonry-grid__case-study">		

				<?php if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post(); ?>

						<?php $columns = ( ! empty( $settings['post_columns_mobile'] ) ? 'col-' . $settings['post_columns_mobile'] : '' ) . ( ! empty( $settings['post_columns_tablet'] ) ? ' col-md-' . $settings['post_columns_tablet'] : '' ) . ( ! empty( $settings['post_columns'] ) ? ' col-lg-' . $settings['post_columns'] : '' ) . deo_get_case_study_categories(); ?>

						<div class="case-study masonry-item <?php echo esc_attr( $columns ); ?>">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'case-study__entry' ); ?> itemscope="itemscope" itemtype="http://schema.org/Article">

								<?php $this->render_image( $settings ); ?>

								<div class="case-study__body">

									<?php $this->render_categories( $settings ); ?>
				
									<?php the_title( sprintf( '<h3 class="entry__title case-study__title title-underline"><a href="%s">',
										esc_url( get_permalink() ) ),
										'</a></h3>'
									);

									$this->render_read_more( $settings );
								?>
								</div> <!-- .case-study__body -->

							</article>
						</div>

						<?php
					endwhile;
				endif;

				wp_reset_postdata(); ?>

			</div> <!-- .row -->

		</div> <!-- .deo-load-more-container -->
		
		<?php
		// Render Pagination
		$this->render_pagination( $settings, $query );
	
	}

	/**
	 * Get posts Query based on the settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return array posts query
	 */
	protected function get_query( $settings ) {
		$string_ID = $settings['post_ids'];
		$post_ID = ( ! empty( $string_ID ) ) ? array_map( 'intval', explode( ',', $string_ID ) ) : '';

		$args = [
			'post_type' => 'case_study',
			'post_status' => 'publish',
		];

		// Posts per page
		if ( ! empty( $settings['posts_per_page'] ) ) {
			$args['posts_per_page'] = $settings['posts_per_page'];
		}

		// Category
		if ( ! empty( $settings['filter_item_list'] ) ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'case_study_categories',
				'field' => 'slug',
				'terms' => $settings['filter_item_list']
			);
		}

		// Order by
		if ( ! empty( $settings['orderby'] ) ) {
			$args['orderby'] = $settings['orderby'];
		}

		// Order
		if ( ! empty( $settings['order'] ) ) {
			$args['order'] = $settings['order'];
		}

		// Sticky Posts
		if ( 'yes' == $settings['ignore_sticky_posts'] ) {
			$args['ignore_sticky_posts'] = 1;
		}		

		// Pagination.
		if ( ! empty( $settings['post_pagination'] ) ) {
			if ( is_front_page() ) {
				$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
			} else {
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			}
			$args['paged'] = $paged;
		}

		// Specific Posts by ID's
		if ( ! empty( $settings['post_ids'] ) ) {
			$args['post__in'] = $post_ID;
		}

		// Query
		$query = new \WP_Query( $args );

		return $query;
	}

	/**
	* AJAX parameters.
	*
	* @since 1.0.0
	* @return array Array of data attributes
	* @access protected
	*/
	protected function _ajax_param( $settings ) {

		if ( empty( $settings ) ) {
			return false;
		}

		$param = array();
		$param['block_id'] = esc_attr( $this->get_id() );

		// Post Type
		$param['post_type'] = 'case_study';

		// Widget Type
		$param['widget_type'] = $this->get_name();

		$attributes = array(
			'image_hide',
			'image_size',
			'category_hide',
			'ignore_sticky_posts',
			'read_more_show',
			'read_more_text',
			'posts_per_page',
			'post_columns_mobile',
			'post_columns_tablet',
			'post_columns',
			'filter_item_list',
			'orderby',
			'order'
		);

		foreach( $attributes as $attribute ) {
			if ( isset( $settings[$attribute] ) ) {
				$param[$attribute] = $settings[$attribute];
			}
		}

		return $param;
	}

	/**
	 * Render filter items.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render_filter_items( $settings ) {

		$categories_list = $settings['filter_item_list'];

		$align = ( $settings['filter_align'] ) ? $settings['filter_align'] : '';

		$terms = $this->get_filter_list( $categories_list );

		if ( ! empty( $terms ) ) { ?>
			<div class="project-filter <?php echo esc_attr( $align ); ?>">
				<a href="#" class="filter active" data-filter="*"><?php echo esc_html__( 'All', 'deo-elementor' ); ?></a>
				<?php foreach ( $terms as $term ) : ?>
					<a href="#" class="filter" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
				<?php endforeach; ?>
			</div>
		<?php
		}
	}

	/**
	 * Get the list of filter categories.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return array filter list items
	 */
	protected function get_filter_list( $categories_list = '' ) {

		$filter_list = array();

		$categories = get_categories( array(
			'include'   => $categories_list,
			'exclude'   => '1',
			'number'    => 50,
			'taxonomy'  => 'case_study_categories'
		) );

		//check category input
		if ( ! empty( $categories_list ) ) {

			foreach ( $categories_list as $cat ) {
				foreach ( $categories as $category ) {
					if ( $cat == $category->slug ) {
						$filter_list[] = $category;
					}
				}
			}
		} else {
			foreach ( $categories as $category ) {
				$filter_list[] = $category;
			}
		}

		return $filter_list;
	}

	/**
	 * Render image of post type.
	 * 
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render_image( $settings ) {
		if ( has_post_thumbnail() ) {		

			if ( $settings['image_hide'] !== 'yes' ) {
				?>
				<figure class="entry__img-holder case-study__img-holder">				
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php
						the_post_thumbnail(
							$settings['image_size'], array(
								'class' => 'entry__img case-study__img',
							)
						); ?>
					</a>
				</figure>
			<?php }
		}
	}	


	/**
	 * Render categories of post type.
	 * 
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render_categories( $settings ) {
		if ( $settings['category_hide'] !== 'yes' ) {			
			echo '<div class="entry__categories case-study__categories">';
				$terms = get_the_terms( get_the_ID(), 'case_study_categories' );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						echo '<a href="' . esc_url( get_category_link( $term->term_id ) ) . '" class="case-study__category entry-category">' . esc_html( $term->name ) . '</a>';
					}
				}
			echo '</div>';
		}
	}


	/**
	* Render read more.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_read_more( $settings ) {
		if ( $settings['read_more_show'] !== 'yes' ) { ?>
			<a href="<?php the_permalink(); ?>" class="read-more case-study__read-more link-underline">
				<span class="case-study__read-more-text"><?php echo esc_html__( $settings['read_more_text'], 'deo-elementor' ); ?></span>
			</a>
			<?php
		}
	}


	/**
	* Render pagination.
	* @since 1.0.0
	* @access protected
	*/
	protected function render_pagination( $settings, $query ) {

		if ( 'disabled' == $settings['post_pagination'] || $query->max_num_pages < 2 ) {
			return;
		}

		if ( 'numbered' == $settings['post_pagination'] ) {
			if ( is_front_page() ) {
				$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
			} else {
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			}
		}

		// Pagination
		if ( 'numbered' == $settings['post_pagination'] ) :
			$paginate_args = array(
				'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'current'   => max( 1, $paged ),
				'total'     => $query->max_num_pages,
				'prev_text' => wp_kses( '<i class="ui-arrow-left"></i>', array( 'i' => array( 'class' => array() ) ) ),
				'next_text' => wp_kses( '<i class="ui-arrow-right"></i>', array( 'i' => array( 'class' => array() ) ) ),
			);

			$pagination = paginate_links( $paginate_args ); ?>
			<nav class="pagination elementor-pagination" itemscope itemtype="https://schema.org/SiteNavigationElement">
				<?php echo $pagination; ?>
			</nav>

		<?php elseif( 'load_more' == $settings['post_pagination'] ) : ?>
			<nav class="deo-load-more elementor-pagination" itemscope itemtype="https://schema.org/SiteNavigationElement">
				<button class="btn btn--md btn--color deo-load-more__button">
					<span><?php echo $settings['pagination_load_more_text']; ?></span>
				</button>
			</nav>
		<?php endif;
	}


	/**
	* Get post categories.
	*/
	private function get_post_categories() {
		$options = array();

		// Get categories for post type.
		$terms = get_terms(
			array(
				'taxonomy'   => 'case_study_categories',
				'hide_empty' => false,
			)
		);

		if ( ! empty( $terms ) ) {
			foreach ( $terms as $term ) {
				if ( isset( $term ) ) {
					if ( isset( $term->slug ) && isset( $term->name ) ) {
						$options[ $term->slug ] = $term->name;
					}
				}
			}
		}

		return $options;
	}

}