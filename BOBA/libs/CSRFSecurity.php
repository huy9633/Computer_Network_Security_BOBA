<?php

class CSRFSecurity
{
    protected $tokenInputName = '_token';

    protected $tokenSessionName = '_csrf';

    private static $instance;

    public static function getInstance() 
    {
        if (self::$instance === null) {
            self::$instance = new CSRFSecurity();
        }

        return self::$instance;
    }

    private function __construct()
    {
        if ($this->nullSessionToken()) {
            $this->createToken();
        }
    }

    public function createToken()
    {
        $_SESSION[$this->tokenSessionName] = md5(
            $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] . random_bytes(10)
        );
    }

    public function nullSessionToken()
    {
        return empty($_SESSION[$this->tokenSessionName]);
    }

    public function getSessionToken()
    {
        return $_SESSION[$this->tokenSessionName];
    }

    public function validate()
    {
        if (empty($this->getSessionToken())) {
            return true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $this->getRequestToken($_POST);
        } else {
            $token = $this->getRequestToken($_GET);
        }

        if ($token !== $this->getSessionToken()) {
            throw new Exception('Token not correct!');
        }

        return true;
    }

    public function getRequestToken($request)
    {
        if (empty($request[$this->tokenInputName])) {
            throw new Exception('Token mismatch!');
        }

        return $request[$this->tokenInputName];
    }

    public function generateInput()
    {
        return '<input type="hidden" name="' . $this->tokenInputName . '" value="' . $this->getSessionToken() . '">';
    }
}