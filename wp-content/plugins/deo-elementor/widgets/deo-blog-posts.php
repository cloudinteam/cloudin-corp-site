<?php
namespace DeoThemes\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Deo_Blog_Posts extends \Elementor\Widget_Base {

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
		return 'deo-blog-posts';
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
		return esc_html__( 'Deo Blog Posts', 'deo-elementor' );
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
		return 'eicon-posts-masonry';
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
		return [ 'blog', 'posts' ];
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
		$this->section_layout();
		$this->section_posts();
		$this->section_image();
		$this->section_meta();
		$this->section_excerpt();
		
		$this->section_content_style();
		$this->section_grid_style();
		$this->section_title_style();
		$this->section_meta_style();
		$this->section_category_style();
		$this->section_excerpt_style();
		$this->section_pagination_style();
	}

	/**
	* Content > Layout.
	*/
	private function section_layout() {

		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'blog_layout',
			[
				'label'     => esc_html__( 'Layout', 'deo-elementor' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'		=> 'standard',
				'options'   => [
					'masonry'  => esc_html__( 'Masonry', 'deo-elementor' ),
					'creative' => esc_html__( 'Creative', 'deo-elementor' ),
					'standard' => esc_html__( 'Standard', 'deo-elementor' ),
				]
			]
		);

		// Columns
		$this->add_responsive_control(
			'post_columns',
			[
				'label'   => __( 'Columns', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 3,
				'tablet_default' => 6,
				'mobile_default' => 12,
				'options' => [         
					3 => 4,
					4 => 3,
					6 => 2,
					12 => 1
				],
				'frontend_available' => true,
				'condition'   => [
					'blog_layout!' => 'standard',
				]
		  ]
		);

		$this->end_controls_section();
	}

	/**
	* Content > Posts.
	*/
	private function section_posts() {
		$this->start_controls_section(
			'section_posts',
			[
				'label' => __( 'Post options', 'deo-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Post categories.
		$this->add_control(
			'category_name',
			[
				'type'      => \Elementor\Controls_Manager::SELECT,
				'label'     => '<i class="fa fa-folder"></i> ' . __( 'Category', 'deo-elementor' ),
				'options'   => $this->get_post_categories(),
				'separator' => 'before',
			]
		);

		// Posts per page
		$this->add_control(
			'posts_per_page',
			[
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'label'       => '<i class="fa fa-th-large"></i> ' . __( 'Posts per page', 'deo-elementor' ),
				'placeholder' => __( 'Posts per page', 'deo-elementor' ),
				'separator' => 'before',
				'default'     => 6,
			]
		);

		// Orderby
		$this->add_control(
			'orderby',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => '<i class="fa fa-sort"></i> ' . __( 'Order by', 'deo-elementor' ),
				'separator' => 'before',
				'default' => 'date',
				'options' => [
					'date'          => __( 'Date', 'deo-elementor' ),
					'title'         => __( 'Title', 'deo-elementor' ),
					'modified'      => __( 'Modified date', 'deo-elementor' ),
					'menu_order'		=> __( 'Menu Order', 'deo-elementor' ),
					'comment_count' => __( 'Comment count', 'deo-elementor' ),
					'rand'          => __( 'Random', 'deo-elementor' ),
				],
			]
		);

		// Order
		$this->add_control(
			'order',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => '<i class="fa fa-sort"></i> ' . __( 'Order', 'deo-elementor' ),
				'separator' => 'before',
				'default' => 'DESC',
				'options' => [
					'ASC'  => __( 'Ascending', 'deo-elementor' ),
					'DESC' => __( 'Descending', 'deo-elementor' ),
				],
			]
		);

		// Ignore sticky posts
		$this->add_control(
			'ignore_sticky_posts',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . __( 'Ignore Sticky Posts', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'separator' => 'before',
				'default' => 'yes',
			]
		);

		// Display pagination.
		$this->add_control(
			'post_pagination',
			[
				'label'   => '<i class="fa fa-arrow-circle-right"></i> ' . __( 'Pagination', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'numbered',
				'separator' => 'before',
				'options' => [
					'disabled'   => __( 'No Pagination', 'deo-elementor' ),
					'numbered'   => __( 'Numbered', 'deo-elementor' ),
					'load_more'  => __( 'Load More', 'deo-elementor' ),
				],
			]
		);

		// Specific Posts by ID.
		$this->add_control(
			'post_ids',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Show specific posts by ID', 'deo-elementor' ),
				'placeholder' => __( 'ex.: 256, 54, 78', 'deo-elementor' ),
				'description'   => __( 'Paste post ID\'s separated by commas. To find ID, click edit post and you\'ll find it in the browser address bar', 'deo-elementor' ),
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
				'label' => __( 'Image', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Hide image
		$this->add_control(
			'image_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . __( 'Hide Image', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Content > Meta.
	*/
	private function section_meta() {
		$this->start_controls_section(
			'section_meta',
			[
				'label' => __( 'Meta', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Hide date
		$this->add_control(
			'date_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . __( 'Hide Date', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		// Hide author
		$this->add_control(
			'author_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . __( 'Hide Author', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		// Hide category
		$this->add_control(
			'cat_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . __( 'Hide Category', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Content > Excerpt.
	*/
	private function section_excerpt() {
		$this->start_controls_section(
			'section_excerpt',
			[
				'label' => __( 'Excerpt', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Hide content
		$this->add_control(
			'excerpt_hide',
			[
				'label'   => '<i class="fa fa-minus-circle"></i> ' . __( 'Hide Excerpt', 'deo-elementor' ),
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		// Length.
		$this->add_control(
			'excerpt_length',
			[
				'type'        => \Elementor\Controls_Manager::NUMBER,
				'label'       => '<i class="fa fa-arrows-h"></i> ' . __( 'Length (words)', 'deo-elementor' ),
				'condition'   => ['excerpt_hide' => '' ],
				'placeholder' => __( 'Length of excerpt (words)', 'deo-elementor' ),
				'default'     => 25,
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
				'label'     => __( 'Content', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		// $this->add_control(
		// 	'content_background',
		// 	[
		// 		'label' => __( 'Background color', 'deo-elementor' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'default' => '#ffffff',
		// 		'selectors' => [
		// 			'{{WRAPPER}} .entry__body' => 'background-color: {{VALUE}};',
		// 		],
		// 	]
		// );

		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .entry__body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => __( 'Border', 'deo-elementor' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .entry__body',
			]
		);

		$this->add_control(
			'content_border_radius',
			[
				'label' => __( 'Border Radius', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .entry__body' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
      \Elementor\Group_Control_Box_Shadow::get_type(),
      [
				'name'      => 'content_box_shadow',
				'label' => __( 'Box Shadow', 'deo-elementor' ),
				'separator' => 'before',
        'selector'  => '{{WRAPPER}} .entry',
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
				'label' => __( 'Grid', 'deo-elementor' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Columns margin.
		$this->add_control(
			'grid_style_columns_margin',
			[
				'label'     => __( 'Columns margin', 'deo-elementor' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'after',
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
					'{{WRAPPER}} .masonry-item'   => 'padding-right: calc( {{SIZE}}{{UNIT}} / 2 ); padding-left: calc( {{SIZE}}{{UNIT}} / 2 );',
					'{{WRAPPER}} .masonry-grid' => 'margin-left: calc( -{{SIZE}}{{UNIT}} / 2 ); margin-right: calc( -{{SIZE}}{{UNIT}} / 2 );',
				],
				'condition' => [
					'blog_layout!' => 'standard',
				]
			]
		);

		// Rows margin.
		$this->add_control(
			'grid_style_rows_margin',
			[
				'label'     => __( 'Rows margin', 'deo-elementor' ),
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'default'   => [
					'size' => 30,
				],
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .entry' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
				'label'     => __( 'Title', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .entry__title' => 'color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Hover Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .entry__title:hover a' => 'color: {{VALUE}}; background-image: linear-gradient(to right, {{VALUE}} 0%, {{VALUE}} 100%);',
					'{{WRAPPER}} .title-underline a' => 'background-image: linear-gradient(to right, {{VALUE}} 0%, {{VALUE}} 100%);'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .entry__title',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title Heading Tag', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'deo-elementor' ),
					'h2' => __( 'H2', 'deo-elementor' ),
					'h3' => __( 'H3', 'deo-elementor' ),
					'h4' => __( 'H4', 'deo-elementor' ),
					'h5' => __( 'H5', 'deo-elementor' ),
					'h6' => __( 'H6', 'deo-elementor' ),
				],
				'default' => 'h2',
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
				'label'     => __( 'Meta', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' => __( 'Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .entry__meta-item, {{WRAPPER}} .entry__meta-item a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'meta_hover_color',
			[
				'label' => __( 'Hover Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .entry__meta-item a:hover' => 'color: {{VALUE}};',
				],
			]
		);		

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'meta_typography',
				'selector' => '{{WRAPPER}} .entry__meta-item, {{WRAPPER}} .entry__meta-item a',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Category.
	*/
	private function section_category_style() {
		$this->start_controls_section(
			'section_category_style',
			[
				'label'     => __( 'Category', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'category_color',
			[
				'label' => __( 'Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .entry__category-item' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'category_hover_color',
			[
				'label' => __( 'Hover Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .entry__category-item:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'selector' => '{{WRAPPER}} .entry__category-item',
			]
		);

		$this->end_controls_section();
	}

	/**
	* Style > Excerpt.
	*/
	private function section_excerpt_style() {
		$this->start_controls_section(
			'section_excerpt_style',
			[
				'label'     => __( 'Excerpt', 'deo-elementor' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'excerpt_color',
			[
				'label' => __( 'Color', 'deo-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#8b95a3',
				'selectors' => [
					'{{WRAPPER}} .entry__excerpt' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .entry__excerpt',
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
			'pagination_load_more_text',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Load More Text', 'deo-elementor' ),
				'placeholder' => __( 'Load More', 'deo-elementor' ),
				'default'     => __( 'Load More', 'deo-elementor' ),
				'separator'   => 'before',
				'condition'		=> [ 'post_pagination' => 'load_more' ]
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

		$string_ID = $settings['post_ids'];
		$post_ID = ( ! empty( $string_ID ) ) ? array_map( 'intval', explode( ',', $string_ID ) ) : '';
		$ajax_param = '';

		$args = [
			'post_type' => 'post',
			'post_status' => 'publish'
		];

		// Posts per page
		if ( isset( $settings['posts_per_page'] ) ) {
			$args['posts_per_page'] = $settings['posts_per_page'];
		}

		// Category
		if ( isset( $settings['category_name'] ) ) {
			$args['category_name'] = $settings['category_name'];
		}

		// Orderby
		if ( isset( $settings['orderby'] ) ) {
			$args['orderby'] = $settings['orderby'];
		}

		// Order
		if ( isset( $settings['order'] ) ) {
			$args['order'] = $settings['order'];
		}

		// Sticky Posts
		if ( 'yes' == $settings['ignore_sticky_posts'] ) {
			$args['ignore_sticky_posts'] = 1;
		}

		// Pagination.
		if ( isset( $settings['post_pagination'] ) ) {
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

		// AJAX parameters
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
		
		// Render blog layout
		if ( isset( $settings['blog_layout'] ) ) {

			switch ( $settings['blog_layout'] ) {

				case 'masonry':
					$this->render_posts( $settings, $query, 'masonry' );
					break;

				case 'creative':
					$this->render_posts( $settings, $query, 'creative' );
					break;
				
				default:
					$this->render_posts( $settings, $query, 'masonry' );
					break;
			}

		}
	

		// Close load more container
		echo '</div> <!-- .deo-load-more-container -->';

		// Render Pagination
		$this->render_pagination( $settings, $query );
	}

	/**
	* Render posts.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_posts( $settings, $query, $layout = 'masonry' ) {
		$columns = ( ! empty( $settings['post_columns_mobile'] ) ? 'col-' . $settings['post_columns_mobile'] : '' ) . ( ! empty( $settings['post_columns_tablet'] ) ? ' col-md-' . $settings['post_columns_tablet'] : '' ) . ( ! empty( $settings['post_columns'] ) ? ' col-lg-' . $settings['post_columns'] : '' );
		$layout_classes = '';
		$count = 0;
		$sticky_posts = get_option( 'sticky_posts' );
		$post_classes = [
			'entry',
		];

		if ( $query->have_posts() ) :

			echo '<div class="row masonry-grid">';

				while ( $query->have_posts() ) : $query->the_post();

					if ( $this->is_first_post( $count ) && 'creative' !== $layout ) :
						$layout_classes = 'col-lg-12 entry--first-post masonry-item';
					else :
						$layout_classes = $columns;
						$layout_classes .= ' masonry-item';
						$layout_classes .= ( 'creative' == $layout ) ? ' post-creative' : '';
					endif; ?>

					<div class="<?php echo esc_attr( $layout_classes ); ?>">

						<?php if ( in_array( get_the_ID(), $sticky_posts ) ) {
							$post_classes[2] = 'sticky';
						} else {
							unset( $post_classes[2] );
						} ?>

						<article <?php post_class( $post_classes ); ?> itemscope="itemscope" itemtype="https://schema.org/Article">

							<?php if ( 'creative' !== $layout ) :
								$this->render_image( $layout, $count );
							endif; ?>					

							<div class="entry__body">

								<?php
									$this->render_categories();						
									$this->render_title( $layout );
									
									if ( 'creative' !== $layout ) {
										$this->render_excerpt();
									}

									$this->render_meta();
									
									if ( 'creative' == $layout ) : ?>										
										<div class="entry__bg-img" style="background-image: url(<?php echo esc_url( the_post_thumbnail_url( 'emaus_blog_featured_creative' ) ); ?>)"></div>
										<a href="<?php the_permalink(); ?>" class="entry__url" title="<?php the_title_attribute(); ?>"></a>
									<?php endif; ?>

							</div> <!-- .entry__body -->

						</article><!-- #post-## -->
					</div> <!-- .col -->

					<?php $count++; ?>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</div> <!-- .row -->

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif;
	}

	/**
	* AJAX parameters.
	*
	* @since 1.0.0
	* @return string String of data attributes
	* @access protected
	*/
	protected function _ajax_param( $settings ) {

		if ( empty( $settings ) ) {
			return false;
		}

		$param = array();
		$param['block_id'] = esc_attr( $this->get_id() );

		// Post Type
		$param['post_type'] = 'post';

		// Widget Type
		$param['widget_type'] = $this->get_name();

		$attributes = array(
			'blog_layout',
			'image_hide',
			'ignore_sticky_posts',
			'cat_hide',
			'date_hide',
			'author_hide',
			'excerpt_hide',
			'excerpt_length',
			'posts_per_page',
			'post_columns_mobile',
			'post_columns_tablet',
			'post_columns',
			'category_name',
			'title_tag',
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
	 * Render image.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render_image( $layout = 'masonry', $count ) {
		$settings = $this->get_settings_for_display();
		$image_size = ( $this->is_first_post( $count ) ) ? 'emaus_blog_featured_medium' : 'emaus_blog_featured_small' ;

		if ( 'yes' !== $settings['image_hide'] && has_post_thumbnail() ) :
			if ( $this->is_first_post( $count ) ) : ?>
				<figure class="entry__img-holder">
					<div class="entry__bg-img" style="background-image: url(<?php the_post_thumbnail_url( $image_size ); ?>)"></div>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( $image_size, array( 'class' => 'entry__img d-none' ) ); ?>
					</a>
				</figure>
			<?php else: ?>
				<figure class="entry__img-holder">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( $image_size, array( 'class' => 'entry__img' ) ); ?>
					</a>
				</figure>
			<?php endif; ?>	
		<?php endif;
	}


	/**
	* Check if it's a first post.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function is_first_post( $count ) {
		if ( 0 === $count ) {
			return true;
		}
	}


	/**
	* Render categories.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_categories() {
		$settings = $this->get_settings_for_display();

		if ( function_exists( 'deo_meta_category' ) && 'yes' !== $settings['cat_hide'] ) {
			echo deo_meta_category();
		}
	}


	/**
	* Render title.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_title( $layout = 'masonry' ) {
		$settings = $this->get_settings_for_display();
		$size = ( 'masonry' == $layout ) ? ' entry__title--small' : '';
		?>
		<<?php echo \Deo_Elementor_Helper::validate_html_tag( $settings['title_tag'] ); ?> class="entry__title title-underline <?php echo esc_attr( $size ); ?>">
			<a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a>
		</<?php echo \Deo_Elementor_Helper::validate_html_tag( $settings['title_tag'] ); ?>>
		<?php
	}

	/**
	* Render meta.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_meta() {
		$settings = $this->get_settings_for_display();

		if ( 'yes' !== $settings['date_hide'] || 'yes' !== $settings['author_hide'] ) { ?>

			<footer class="entry__footer-meta">

				<?php if ( function_exists( 'deo_meta_author' ) && 'yes' !== $settings['author_hide'] ) : ?>
					<?php echo deo_meta_author(); ?>
				<?php endif; ?>

				<?php if ( function_exists( 'deo_meta_date' ) && 'yes' !== $settings['date_hide'] ) : ?>
					<?php deo_meta_date(); ?>
				<?php endif; ?>				

			</footer>

		<?php
		}
	}

	/**
	* Render post excerpt.
	*
	* @since 1.0.0
	* @access protected
	*/
	protected function render_excerpt() {
		$settings = $this->get_settings_for_display();

		if ( 'yes' !== $settings['excerpt_hide'] ) { ?>
			<div class="entry__excerpt">
				<?php if ( empty( $settings['excerpt_length'] ) ) {
					the_excerpt();
				} else {
					echo '<p>' . wp_trim_words( get_the_content(), $settings['excerpt_length'] ) . '</p>';
				} ?>
			</div>
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

		if ( ! empty( 'category' ) ) {
			// Get categories for post type.
			$terms = get_terms(
				array(
					'taxonomy'   => 'category',
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
		}

		return $options;
	}
}