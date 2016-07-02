<?php

namespace Docker\API\Normalizer;

use Joli\Jane\Reference\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class NetworkingSettingsNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'Docker\\API\\Model\\NetworkingSettings') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \Docker\API\Model\NetworkingSettings) {
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
        $object = new \Docker\API\Model\NetworkingSettings();
        if (!isset($context['rootSchema'])) {
            $context['rootSchema'] = $object;
        }
        if (property_exists($data, 'EndpointsConfig')) {
            $value = $data->{'EndpointsConfig'};
            if (is_object($data->{'EndpointsConfig'})) {
                $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data->{'EndpointsConfig'} as $key => $value_1) {
                    $value_2 = $value_1;
                    if (is_array($value_1)) {
                        $values_1 = array();
                        foreach ($value_1 as $value_3) {
                            $values_1[] = $this->serializer->deserialize($value_3, 'Docker\\API\\Model\\EndpointConfig', 'raw', $context);
                        }
                        $value_2 = $values_1;
                    }
                    if (is_null($value_1)) {
                        $value_2 = $value_1;
                    }
                    $values[$key] = $value_2;
                }
                $value = $values;
            }
            if (is_null($data->{'EndpointsConfig'})) {
                $value = $data->{'EndpointsConfig'};
            }
            $object->setEndpointsConfig($value);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        $value = $object->getEndpointsConfig();
        if (is_object($object->getEndpointsConfig())) {
            $values = new \stdClass();
            foreach ($object->getEndpointsConfig() as $key => $value_1) {
                $value_2 = $value_1;
                if (is_array($value_1)) {
                    $values_1 = array();
                    foreach ($value_1 as $value_3) {
                        $values_1[] = $this->serializer->serialize($value_3, 'raw', $context);
                    }
                    $value_2 = $values_1;
                }
                if (is_null($value_1)) {
                    $value_2 = $value_1;
                }
                $values->{$key} = $value_2;
            }
            $value = $values;
        }
        if (is_null($object->getEndpointsConfig())) {
            $value = $object->getEndpointsConfig();
        }
        $data->{'EndpointsConfig'} = $value;
        return $data;
    }
}