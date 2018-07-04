<?php

/**
 * Lorem shortcode
 *
 * Outputs Lorem inspum text.
 *
 * @link       http://example.com
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public/partials
 * @since      1.0.0
 */

$atts = shortcode_atts( array(
	'amount' => 1,
	'what'   => 'paras',
	'cache'  => 'yes',
), $atts, 'lorem_text' );

?>

<div class="lorem-text">
    <div class="lorem-text__content">
		<?php echo Plugin_Name_Helpers::get_lorem( $atts['amount'], $atts['what'], $atts['cache'] ); ?>
    </div>
</div>