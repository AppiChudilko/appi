<?php

namespace Appi;

/**
* AntiDDos
*/
class AntiDDos
{
    protected $whiteIp;

    protected $countConnect = 20;

    protected $timeOut = 10;

    protected $timeNow;

    protected $DDosMessage;
 
    function __construct()
    {
        $this->whiteIp = ['176.15.18.126', '84.16.133.26'];
        $this->timeNow = time();
        $this->DDosMessage = 'Time out '.$this->timeOut.'s';
        $this->antiDDos();
    }
 
    /**
    * Mehtod. CheckDDos;
    */
    public function antiDDos() {
 
        if (empty($_COOKIE['AntiDDos'])) {
           
            if (!in_array($_SERVER['REMOTE_ADDR'], $this->whiteIp )) {
           
                if (empty($_SESSION['lastConnect'])) {
                    $_SESSION['lastConnect'] = $this->timeNow;
                    $_SESSION['countConnect'] = 0;
                }
                elseif ($_SESSION['lastConnect'] > $this->timeNow + 10) {
                    $_SESSION['lastConnect'] = $this->timeNow;
                    $_SESSION['countConnect'] = 0;
                }
 
                $_SESSION['countConnect']++;
 
                if ($_SESSION['countConnect'] >= $this->countConnect) {
                    setcookie("AntiDDos", true, $this->timeNow + $this->timeOut);
                    $_SESSION['countConnect'] = 0;
                    die($this->DDosMessage);
                }
            }
        }
        else {
            die($this->DDosMessage);
        }
    }

    /**
    * Mehtod. Set whiteIp;
    */
    public function setWhiteIp($params) {

    	$this->whiteIp = $params;
    	return $this;
    }

    /**
    * Mehtod. Get whiteIp;
    */
    public function getWhiteIp($params) {

    	return $this->whiteIp;
    }

    /**
    * Mehtod. Set timeOut;
    */
    public function setTimeOut($params) {
    	
    	$this->timeOut = $params;
    	return $this;
    }

    /**
    * Mehtod. Get timeOut;
    */
    public function getTimeOut($params) {

    	return $this->timeOut;
    }

    /**
    * Mehtod. Set countConnect;
    */
    public function setCountConnect($params) {
    	
    	$this->countConnect = $params;
    	return $this;
    }

    /**
    * Mehtod. Get countConnect;
    */
    public function getCountConnect($params) {

    	return $this->countConnect;
    }
}