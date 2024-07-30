<?php

declare(strict_types=1);

namespace Omnipay\EuPago\Response;

use Omnipay\Common\Message\AbstractResponse;

final class MultibancoResponse extends AbstractResponse
{
    private const CODE_SUCCESS = '200';

    /**
     * The amount being charged.
     */
    public function getAmount(): ?string
    {
        return $this->data['valor'];
    }

    /**
     * Is the response successful?
     */
    public function isSuccessful(): bool
    {
        return isset($this->data['sucesso']) && $this->data['sucesso'];
    }

    /**
     * Multibanco payment entity.
     */
    public function getEntity(): ?string
    {
        return $this->data['entidade'];
    }

    /**
     * Multibanco payment reference.
     */
    public function getReference(): ?string
    {
        return $this->data['referencia'];
    }

    /**
     * Multibanco payment max value.
     */
    public function getMaxValue(): ?string
    {
        return $this->data['valor_maximo'] ?? null;
    }

    /**
     * Multibanco payment min value.
     */
    public function getMinValue(): ?string
    {
        return $this->data['valor_minimo'] ?? null;
    }

    /**
     * Multibanco payment end date
     */
    public function getEndDate(): ?string
    {
        return $this->data['data_fim'] ?? null;
    }

    /**
     * Multibanco payment start date
     */
    public function getStartDate(): ?string
    {
        return $this->data['data_inicio'] ?? null;
    }
}
