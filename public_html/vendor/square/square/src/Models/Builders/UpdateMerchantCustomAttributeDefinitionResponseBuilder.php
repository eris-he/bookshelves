<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CustomAttributeDefinition;
use Square\Models\UpdateMerchantCustomAttributeDefinitionResponse;

/**
 * Builder for model UpdateMerchantCustomAttributeDefinitionResponse
 *
 * @see UpdateMerchantCustomAttributeDefinitionResponse
 */
class UpdateMerchantCustomAttributeDefinitionResponseBuilder
{
    /**
     * @var UpdateMerchantCustomAttributeDefinitionResponse
     */
    private $instance;

    private function __construct(UpdateMerchantCustomAttributeDefinitionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new update merchant custom attribute definition response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateMerchantCustomAttributeDefinitionResponse());
    }

    /**
     * Sets custom attribute definition field.
     */
    public function customAttributeDefinition(?CustomAttributeDefinition $value): self
    {
        $this->instance->setCustomAttributeDefinition($value);
        return $this;
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new update merchant custom attribute definition response object.
     */
    public function build(): UpdateMerchantCustomAttributeDefinitionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
