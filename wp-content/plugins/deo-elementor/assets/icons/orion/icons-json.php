<?php
$css_source = file_get_contents( 'orion-icons.css' );

preg_match_all( "/(\.o-.*?)::\w*?\s*?{/", $css_source, $matches, PREG_SET_ORDER, 0 );
$iconList = [];
$icons = [];
foreach ( $matches as $match ) {
	$iconList[] = str_replace('.o-', '', $match[1]);
}

$icons['icons'] = $iconList;
echo json_encode( $icons );