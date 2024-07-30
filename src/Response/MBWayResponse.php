<?php

declare(strict_types=1);

namespace Omnipay\EuPago\Response;

use Omnipay\Common\Message\AbstractResponse;

final class MBWayResponse extends AbstractResponse
{
    /**
     * The amount being charged.
     */
    public function getAmount(): ?string
    {
        return $this->data['valor'];
    }

    /**
     * Payment gateway response reference.
     */
    public function getReference(): ?int
    {
        return $this->data['referencia'];
    }

    /**
     * Payment gateway response message.
     */
    public function getMessage(): ?string
    {
        return $this->data['resposta'];
    }

    /**
     * Is the response successful?
     */
    public function isSuccessful(): bool
    {
        return $this->data['sucesso'];
    }
}
