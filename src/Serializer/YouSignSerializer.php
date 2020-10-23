<?php

declare(strict_types = 1);

/*
 * This file is part of the Easyblue YouSign project.
 * (c) Easyblue <dev@easyblue.io>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Easyblue\YouSign\Serializer;

use Doctrine\Common\Annotations\AnnotationReader;
use Easyblue\YouSign\Serializer\Normalizer\HeaderNormalizer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class YouSignSerializer
{
    protected Serializer $serializer;

    public function __construct()
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $objectNormalizer     = new ObjectNormalizer($classMetadataFactory, new MetadataAwareNameConverter($classMetadataFactory), null, new ReflectionExtractor());
        $normalizers          = [
            new HeaderNormalizer(),
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            $objectNormalizer,
        ];
        $this->serializer = new Serializer($normalizers, [new JsonEncode(), new JsonDecode()]);
    }

    public function deserialize(string $data, string $entityClass)
    {
        return $this->serializer->deserialize($data, $entityClass, 'json', ['groups' => ['read']]);
    }

    public function serialize($object): string
    {
        return $this->serializer->serialize($object, 'json', ['groups' => ['write']]);
    }

    public function normalize($data): array
    {
        return $this->serializer->normalize($data, null, ['groups' => ['write'], AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
    }
}
