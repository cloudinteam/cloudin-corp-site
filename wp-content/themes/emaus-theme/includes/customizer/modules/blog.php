<?php
/**
 * Customizer Blog
 *
 * @package Emaus
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
* Meta
*/

// Meta category
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_meta_category_show',
	'label'       => esc_attr__( 'Show meta category', 'emaus' ),
	'section'     => 'deo_post_meta',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_meta_date_show',
	'label'       => esc_attr__( 'Show meta date', 'emaus' ),
	'section'     => 'deo_post_meta',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_meta_author_show',
	'label'       => esc_attr__( 'Show meta author', 'emaus' ),
	'section'     => 'deo_post_meta',
	'default'     => true,
) );


// Post excerpt
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_post_excerpt_show',
	'label'       => esc_attr__( 'Show post excerpt', 'emaus' ),
	'section'     => 'deo_post_meta',
	'default'     => true,
) );


/**
* Single Post
*/

// Meta category
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_single_category_show',
	'label'       => esc_attr__( 'Show category', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => true,
) );

// Meta date
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_single_date_show',
	'label'       => esc_attr__( 'Show date', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => true,
) );

// Meta author
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_single_author_show',
	'label'       => esc_attr__( 'Show author', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => true,
) );

// Post tags
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_post_tags_show',
	'label'       => esc_attr__( 'Show tags', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => true,
) );

// Post author box
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_author_box_show',
	'label'       => esc_attr__( 'Show author box', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => true,
) );

// Related posts heading
Kirki::add_field( 'deo_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'deo_single_post',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Related Posts', 'emaus' ) . '</h3><hr class="customizer-separator"></hr>',
) );

// Related posts
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_related_posts_show',
	'label'       => esc_attr__( 'Show related posts', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => true,
) );

// Related by
Kirki::add_field( 'deo_config', array(
	'type'        => 'select',
	'settings'    => 'deo_related_posts_relation',
	'label'       => esc_html__( 'Related by', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => 'category',
	'choices'     => array(
		'category' => esc_attr__( 'Category', 'emaus' ),
		'tag' => esc_attr__( 'Tag', 'emaus' ),
		'author' => esc_attr__( 'Author', 'emaus' ),
	),
) );

// Newsletter heading
Kirki::add_field( 'deo_config', array(
	'type'        => 'custom',
	'settings'    => 'separator-' . $uniqid++,
	'section'     => 'deo_single_post',
	'default'     => '<h3 class="customizer-title">' . esc_attr__( 'Newsletter', 'emaus' ) . '</h3><hr class="customizer-separator"></hr>',
) );

// Single post newsletter
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_newsletter_show',
	'label'       => esc_attr__( 'Show newsletter form', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => true,
) );

// Newsletter background image
Kirki::add_field( 'deo_config', array(
	'type'        => 'image',
	'settings'    => 'deo_newsletter_background',
	'label'       => esc_attr__( 'Newsletter background image', 'emaus' ),
	'section'     => 'deo_single_post',
	'default'     => get_template_directory_uri() . '/assets/img/newsletter/emaus_newsletter_bg-min.jpg'
) );


/**
* Socials Share Buttons
*/

// Social Share Buttons
Kirki::add_field( 'deo_config', array(
	'type'        => 'toggle',
	'settings'    => 'deo_post_share_buttons_show',
	'label'       => esc_attr__( 'Show share buttons', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => true,
) );

// Facebook Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_facebook',
	'label'       => esc_attr__( 'Facebook', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => true,
) );

// Twitter Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_twitter',
	'label'       => esc_attr__( 'Twitter', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => true,
) );

// Linkedin Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_linkedin',
	'label'       => esc_attr__( 'Linkedin', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => false,
) );

// Pinterest Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_pinterest',
	'label'       => esc_attr__( 'Pinterest', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => true,
) );

// Vkontakte Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_vkontakte',
	'label'       => esc_attr__( 'Vkontakte', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => false,
) );

// Pocket Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_pocket',
	'label'       => esc_attr__( 'Pocket', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => true,
) );

// Facebook Messenger Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_facebook_messenger',
	'label'       => esc_attr__( 'Facebook Messenger', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => false,
) );

// Whatsapp Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_whatsapp',
	'label'       => esc_attr__( 'Whatsapp', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => true,
) );

// Viber Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_viber',
	'label'       => esc_attr__( 'Viber', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => false,
) );

// Telegram Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_telegram',
	'label'       => esc_attr__( 'Telegram', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => false,
) );

// Line Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_line',
	'label'       => esc_attr__( 'Line', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => false,
) );

// Reddit Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_reddit',
	'label'       => esc_attr__( 'Reddit', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => false,
) );

// Email Share
Kirki::add_field( 'deo_config', array(
	'type'        => 'checkbox',
	'settings'    => 'deo_share_email',
	'label'       => esc_attr__( 'Email', 'emaus' ),
	'section'     => 'deo_social_share',
	'default'     => true,
) );