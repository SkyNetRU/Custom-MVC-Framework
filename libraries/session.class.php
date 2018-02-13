<?php
defined('ROOT') or exit('No direct script access allowed');

class Session{

	protected static $flash_message;

	public function __construct()
	{
		if (!self::get('csrf_token')){
			self::renewCsrfToken ();
		}

		self::$flash_message = self::get('flash');
	}

	public static function renewCsrfToken () {
		$_SESSION['csrf_token'] = base64_encode(openssl_random_pseudo_bytes(32));
	}

	public static function setFlash($message){
		self::set('flash', $message);
    }

    public static function hasFlash(){
        return !is_null(self::$flash_message);
    }

    public static function flash(){
        echo self::$flash_message;
        self::delete('flash');
        self::$flash_message = null;
    }

    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if ( isset($_SESSION[$key]) ){
            return $_SESSION[$key];
        }
        return null;
    }

    public static function delete($key){
        if ( isset($_SESSION[$key]) ){
            unset($_SESSION[$key]);
        }
    }

    public static function destroy(){
        session_destroy();
    }

}