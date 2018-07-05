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

	/**
	 * Checks a date against a format to ensure its validity.
	 *
	 *
	 * @since 1.0.0
	 *
	 * @link http://www.php.net/manual/en/function.checkdate.php
	 *
	 * @param string $date The date as collected from the form field.
	 * @param string $format Optional. The format to check the date against. Default is 'Y-m-d H:i:s'.
	 *
	 * @return string A validated, formatted date.
	 */
	public static function validate_date( $date, $format = 'Y-m-d H:i:s' ) {
		$version = explode( '.', phpversion() );

		if ( ( (int) $version[0] >= 5 && (int) $version[1] >= 2 && (int) $version[2] > 17 ) ) {
			$d = DateTime::createFromFormat( $format, $date );
		} else {
			$d = new DateTime( date( $format, strtotime( $date ) ) );
		}

		return $d && $d->format( $format ) == $date;
	}

	/**
	 * Validates a phone number.
	 *
	 * @since 1.0.0
	 *
	 * @link http://jrtashjian.com/2009/03/code-snippet-validate-a-phone-number/
	 *
	 * @param string $phone A phone number string.
	 *
	 * @return string|bool $phone|FALSE Returns the valid phone number, FALSE if not.
	 */
	public static function sanitize_phone( $phone ) {
		if ( empty( $phone ) ) {
			return false;
		}

		if ( preg_match( '/^[+]?([0-9]?)[(|s|-|.]?([0-9]{3})[)|s|-|.]*([0-9]{3})[s|-|.]*([0-9]{4})$/', $phone ) ) {
			return trim( $phone );
		}

		return false;
	}
}