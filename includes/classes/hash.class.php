<?php
/**
 * Hash class
 * This class generates encrypted strings.
 *
 * @package    NatuurkundeProject
 * @author     Rick Bakker <rickb@kker.net>
 * @copyright  2015 Rick Bakker
 */

class Hash {
	/*
	 * Salt is an completely random string.
	 */
	private static $salt = 'R(RJWJASJFSFJSFPsf,msmfka9jt3io(SHa))';
	
	/**
	 * Returns an encrypted string.
	 *
	 * @param string $unhashed The string which isn't hashed yet. 
	 */
	public static function Make($unhashed) {
		$hashed = $unhashed;
		$hashed = md5($hashed);
		$hashed = sha1($hashed);
		$hashed = $hashed . self::$salt . $hashed;
		$hashed = md5($hashed);
		$hashed = sha1($hashed);
		return $hashed;
	}
}