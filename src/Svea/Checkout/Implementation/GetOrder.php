<?php

namespace Svea\Checkout\Implementation;

use Svea\Checkout\Model\Request;
use Svea\Checkout\Exception\SveaApiException;
use Svea\Checkout\Exception\SveaInputValidationException;

class GetOrder extends ImplementationManager
{
    const API_URL = '/api/orders/';

    /**
     * @var int $orderId
     */
    private $orderId;

    /**
     * Request body - JSON
     *
     * @var string $requestBodyData
     */
    private $requestBodyData;

    /**
     * @param $data
     * @throws SveaInputValidationException
     */
    public function validateData($data)
    {
        $validator = $this->validator;
        $validator->validate($data);
    }

    /**
     * Map input data
     *
     * @param mixed $data
     */
    public function mapData($data)
    {
        $this->orderId = intval($data);
    }

    /**
     * Prepare data for request
     */
    public function prepareData()
    {
        $preparedData['Id'] = $this->orderId;

        $this->requestBodyData = json_encode($preparedData);
    }

    /**
     * Invoke request call
     *
     * @throws SveaApiException
     */
    public function invoke()
    {
        $request = new Request();
        $request->setGetMethod();
        $request->setBody($this->requestBodyData);
        $request->setApiUrl($this->connector->getBaseApiUrl() . self::API_URL . $this->orderId);

        $this->response = $this->connector->sendRequest($request);
    }

    /**
     * @return string
     */
    public function getRequestBodyData()
    {
        return $this->requestBodyData;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }
}
