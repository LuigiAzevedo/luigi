<?php

// Bcrypt hashing class

class Bcrypt {
	protected static $_saltPrefix = '2a';

//	Default hashing cost (4-31) 
	protected static $_defaultCost = 8;

//	Salt limit length
	protected static $_saltLength = 22;
	
	public static function hash($string, $cost = null) {
		if (empty($cost)) {
			$cost = self::$_defaultCost;
		}
		// Salt
		$salt = self::generateRandomSalt();
		// Hash string
		$hashString = self::__generateHashString((int)$cost, $salt);
		return crypt($string, $hashString);
	}
	
// 	Check a hashed string
//	@return boolean
	public static function check($string, $hash) {
		return (crypt($string, $hash) === $hash);
	}

//	Generate a random base64 encoded salt
//	@return string
	public static function generateRandomSalt() {
		// Salt seed
		$seed = uniqid(mt_rand(), true);
		// Generate salt
		$salt = base64_encode($seed);
		$salt = str_replace('+', '.', $salt);
		return substr($salt, 0, self::$_saltLength);
	}

//	Build a hash string for crypt()
// 	@return string
	private static function __generateHashString($cost, $salt) {
		return sprintf('$%s$%02d$%s$', self::$_saltPrefix, $cost, $salt);
	}
}