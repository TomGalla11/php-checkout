<?php
$root = realpath(dirname(__FILE__));
require_once $root . '/../../src/Includes.php';

/**
 * Handle curl commands
 */
class SveaCurlHandler {

//    private $orderUrl;

    private $location;

//    public $svea_connection_url = 'http://sveawebpaycheckoutws.dev.svea.com/checkout/orders';
    /**
     * cUrl handler
     * @var resource
     */
    private $handler = null;
    /**
     *
     * @var type FormatHttpResponse result
     */
    public $result;

    /**
     * Do curl_init and create a new curl handler
     * @return curl handler
     */
    public function __construct() {
        $this->handler = curl_init();
//        return $this->handler;
    }
    public function getResource() {
        return $this->handler;
    }

    /**
     * Do curl_exec
     * @return mixed response
     */
    public function execute() {
        return curl_exec($this->handler);
    }
    /**
     * Do curl_close
     * void
     */
    public function close() {
        curl_close($this->handler);
    }

    public function getError() {
         return curl_error($this->handler);
    }

    public function getInfo() {
        return curl_getinfo($this->handler);
    }

//    public function getConnectionUrl() {
//        return $this->svea_connection_url;
//    }

    /**
     * Get the URL of the resource
     *
     * @return string
     */
    public function getLocation() {
        return $this->location;
    }

    /**
     * Set the URL of the resource
     *
     * @param string $location URL of the resource
     *
     * @return void
     */
    public function setLocation($location) {
        $this->location = strval($location);
    }

}