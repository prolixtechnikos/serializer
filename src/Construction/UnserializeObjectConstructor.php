<?php

declare(strict_types=1);

namespace JMS\Serializer\Construction;

use Doctrine\Instantiator\Instantiator;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\Metadata\ClassMetadata;
use JMS\Serializer\VisitorInterface;

final class UnserializeObjectConstructor implements ObjectConstructorInterface
{
    /** @var Instantiator */
    private $instantiator;

    /**
     * {@inheritdoc}
     */
    public function construct(VisitorInterface $visitor, ClassMetadata $metadata, $data, array $type, DeserializationContext $context): ?object
    {
        return $this->getInstantiator()->instantiate($metadata->name);
    }

    private function getInstantiator(): Instantiator
    {
        if (null === $this->instantiator) {
            $this->instantiator = new Instantiator();
        }

        return $this->instantiator;
    }
}
