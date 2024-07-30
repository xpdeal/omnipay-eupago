<?php

declare(strict_types=1);

namespace Omnipay\EuPago\Request;

use DomainException;
use LengthException;
use Omnipay\Common\Message\AbstractRequest as BaseAbstractRequest;

abstract class AbstractRequest extends BaseAbstractRequest
{
    protected $zeroAmountAllowed = false;

    public function getKey(): ?string
    {
        return $this->getParameter('key');
    }

    public function setKey(string $value): self
    {
        return $this->setParameter('key', $value);
    }

    public function getReference(): ?string
    {
        return $this->getParameter('reference');
    }

    public function getClientPhone(): ?string
    {
        return $this->getParameter('clientPhone');
    }

    public function setClientPhone(string $value): self
    {
        if (mb_strlen($value) > 200) {
            throw new LengthException('The client phone value must not exceed 200 characters');
        }

        return $this->setParameter('clientPhone', $value);
    }

    public function getClientEmail(): ?string
    {
        return $this->getParameter('clientEmail');
    }

    public function setClientEmail(string $value): self
    {
        if (mb_strlen($value) > 200) {
            throw new LengthException('The client email value must not exceed 200 characters');
        }

        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            throw new DomainException('Invalid client email');
        }

        return $this->setParameter('clientEmail', $value);
    }

    public function setId(string $value): self
    {
        if (mb_strlen($value) > 200) {
            throw new LengthException('The identifier value must not exceed 200 characters');
        }

        return $this->setParameter('id', $value);
    }

    public function getId(): ?string
    {
        return $this->getParameter('id');
    }

    public function setFailOver(int $value): self
    {
        return $this->setParameter('failOver', $value);
    }

    public function getFailOver(): ?int
    {
        return $this->getParameter('failOver');
    }

    /**
     * @param  string  ...$path
     */
    protected function buildURL(string $baseURL, mixed ...$path): string
    {
        return sprintf('%s/%s', $baseURL, implode('/', $path));
    }
}
