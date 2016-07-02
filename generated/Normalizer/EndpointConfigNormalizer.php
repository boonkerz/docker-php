<?php

namespace Docker\API\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class EndpointConfigNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\EndpointConfig') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\EndpointConfig) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (empty($data)) {
            return null;
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['rootSchema'] ?: null);
        }
        $object = new \Docker\API\Model\EndpointConfig();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'IPv4Address')) {
            $object->setIPv4Address($data->{'IPv4Address'});
        }
        if (property_exists($data, 'IPv6Address')) {
            $object->setIPv6Address($data->{'IPv6Address'});
        }
        if (property_exists($data, 'Aliases')) {
            $value = $data->{'Aliases'};
            if (is_array($data->{'Aliases'})) {
                $values = array();
                foreach ($data->{'Aliases'} as $value_1) {
                    $values[] = $value_1;
                }
                $value = $values;
            }
            if (is_null($data->{'Aliases'})) {
                $value = $data->{'Aliases'};
            }
            $object->setAliases($value);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getIPv4Address()) {
            $data->{'IPv4Address'} = $object->getIPv4Address();
        }
        if (null !== $object->getIPv6Address()) {
            $data->{'IPv6Address'} = $object->getIPv6Address();
        }
        $value = $object->getAliases();
        if (is_array($object->getAliases())) {
            $values = array();
            foreach ($object->getAliases() as $value_1) {
                $values[] = $value_1;
            }
            $value = $values;
        }
        if (is_null($object->getAliases())) {
            $value = $object->getAliases();
        }
        $data->{'Aliases'} = $value;
        return $data;
    }
}