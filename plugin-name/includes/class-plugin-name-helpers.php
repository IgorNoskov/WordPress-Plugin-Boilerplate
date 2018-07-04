<?php

/**
 * The file that defines class with static helpers methods
 *
 * @link http://example.com
 *
 * @package Plugin_Name
 * @subpackage Plugin_Name/includes
 * @since 1.0.0
 */

/**
 * The class with static helpers methods.
 *
 * @since 1.0.0
 */
class Plugin_Name_Helpers {

	/**
	 * Gets lorem inspum text.
	 *
	 * Uses http://www.lipsum.com to generate dummy text.
	 *
	 * @since 1.0.0
	 *
	 * @param int $amount Amount of paragraphs, words or bytes. Default 5.
	 * @param string $what Determines what to use to generate the algorithm. Accepts 'paras', 'words', or 'bytes'. Default 'paras'.
	 * @param string $cache Determines whether to cache the result or not. Accepts 'yes' or 'no'. Default 'yes'.
	 *
	 * @return string $lorem_text Content with lorem inspum text.
	 */
	public static function get_lorem( $amount = 5, $what = 'paras', $cache = 'yes' ) {
		$amount = intval( $amount );
		$what   = sanitize_text_field( $what );

		$transient_name = 'lorem_text/' . $what . '/' . $amount;
		$lorem_text     = get_transient( $transient_name );

		if ( ! $lorem_text || $cache !== 'yes' ) {
			$xml = simplexml_load_file( 'http://www.lipsum.com/feed/xml?amount=' . $amount . '&what=' . $what . '&start=0' );

			if ( $xml ) {
				$lorem_text = wpautop( str_replace( "\n", "\n\n", $xml->lipsum ) );

				set_transient( $transient_name, $lorem_text, 60 * 60 * 24 * 30 );
			}

		}

		return $lorem_text;
	}
}