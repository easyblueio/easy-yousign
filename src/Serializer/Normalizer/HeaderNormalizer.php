<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Serializer\Normalizer;

use Easyblue\YouSign\Model\Header;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class HeaderNormalizer implements DenormalizerInterface
{
    /**
     * {@inheritdoc}
     *
     * @throws NotNormalizableValueException
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        return new Header(json_decode(json_encode($data), true));
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, string $type, string $format = null)
    {
        return Header::class === $type;
    }
}
