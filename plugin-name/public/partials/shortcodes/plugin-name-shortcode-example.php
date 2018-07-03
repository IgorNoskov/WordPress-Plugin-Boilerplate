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

$title = '';

extract( shortcode_atts( array(
	'title' => 'Example shortcode',
), $atts ) );

?>

<div class="example-shortcode">
    <h2><?php echo esc_html( $title ); ?></h2>
	<?php if ( $content ): ?>
        <div class="example-shortcode__content">
			<?php echo esc_html( $content ); ?>
        </div>
	<?php endif; ?>
</div>