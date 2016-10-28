<?php

namespace Svea\Checkout;

use Svea\Checkout\Implementation\Admin\ImplementationAdminFactory;
use Svea\Checkout\Transport\Connector;

/**
 * Class CheckoutAdminClient
 *
 * @package Svea\Checkout
 * @author Svea
 */
class CheckoutAdminClient
{
    /**
     * Transport connector used to make HTTP request to Svea Checkout API.
     *
     * @var Connector
     */
    private $connector;

    /**
     * CheckoutAdminClient constructor.
     *
     * @param Connector $connector
     */
    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * Deliver Svea Checkout order.
     *
     * @param int $data
     * @return mixed
     */
    public function deliverOrder($data)
    {
        $deliverOrder = ImplementationAdminFactory::returnDeliverOrderClass($this->connector);
        $deliverOrder->execute($data);

        return $deliverOrder->getResponse();
    }
}