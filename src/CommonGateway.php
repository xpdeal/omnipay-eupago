<?php

declare(strict_types=1);

namespace Omnipay\EuPago;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Http\ClientInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\EuPago\Enum\PayMethod;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

abstract class CommonGateway extends AbstractGateway
{
    protected PayMethod $payMethod;

    public function __construct(PayMethod $payMethod, ?ClientInterface $httpClient = null, ?SymfonyRequest $httpRequest = null)
    {
        $this->payMethod = $payMethod;

        parent::__construct($httpClient, $httpRequest);
    }

    /**
     * Get the default parameters of the gateway channel.
     */
    public function getDefaultParameters(): array
    {
        return $this->payMethod->defaultParameters();
    }

    public function purchase(array $options = []): RequestInterface
    {
        return $this->createRequest($this->payMethod->requestClass(), $options);
    }
}
