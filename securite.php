<?php

class Securite {



//sécurité
	public function generateCsrfToken($length = 32) {
		return bin2hex(random_bytes($length / 2));
    }

    public function storeToken($token, $time){
        unset($_SESSION['csrfToken']);
        unset($_SESSION['csrfTokenExpiration']);
		$_SESSION['csrfToken'] = $token;
		$_SESSION['csrfTokenExpiration'] = time() + $time;

        return $token;
	}



    public static function isTokenValid($receivedToken) {
        if (!isset($_SESSION['csrfToken']) || !isset($_SESSION['csrfTokenExpiration'])) {
            return false;
        }
        return ($_SESSION['csrfToken'] === $receivedToken) && (time() < $_SESSION['csrfTokenExpiration']);
    }

}

?>