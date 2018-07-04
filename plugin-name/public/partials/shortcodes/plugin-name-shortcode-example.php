<?php

/**
 * Example shortcode
 *
 * Just example shortcode with title and content.
 *
 * @link       http://example.com
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public/partials
 * @since      1.0.0
 */

$atts = shortcode_atts( array(
	'title' => 'Example shortcode',
), $atts, 'example' );

?>

<div class="example-shortcode">
    <h2><?php echo esc_html( $atts['title'] ); ?></h2>
	<?php if ( $content ): ?>
        <div class="example-shortcode__content">
			<?php echo $content; ?>
        </div>
	<?php endif; ?>
</div>