<?php

// $icons = [
// 	'icons' => [
// 		'Book-Write',
// 		'Books',
// 		'Chandelier',
// 	]
// ];

$css_source = file_get_contents( 'sl-icons.css' );

preg_match_all( "/\.(sl-.*?):\w*?\s*?{/", $css_source, $matches, PREG_SET_ORDER, 0 );
$iconList = [];
$icons = [];
foreach ( $matches as $match ) {
	$iconList[] = str_replace('sl-', '', $match[1]);
}

$icons['icons'] = $iconList;
echo json_encode( $icons );