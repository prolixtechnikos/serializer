<?php

declare(strict_types=1);

namespace JMS\Serializer\Twig;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * @author Asmir Mustafic <goetas@gmail.com>
 */
final class SerializerRuntimeExtension extends AbstractExtension
{
    /**
     * @return string
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingReturnTypeHint
     */
    public function getName()
    {
        return 'jms_serializer';
    }

    /**
     * @return \Twig_Filter[]
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingReturnTypeHint
     */
    public function getFilters()
    {
        return [
            new TwigFilter('serialize', [SerializerRuntimeHelper::class, 'serialize']),
        ];
    }

    /**
     * @return \Twig_Function[]
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingReturnTypeHint
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('serialization_context', '\JMS\Serializer\SerializationContext::create'),
        ];
    }
}
