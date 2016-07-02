<?php

namespace Docker\API\Model;

class NetworkingSettings
{
    /**
     * @var EndpointConfig[][]|null[]|null
     */
    protected $endpointsConfig;
    /**
     * @return EndpointConfig[][]|null[]|null
     */
    public function getEndpointsConfig()
    {
        return $this->endpointsConfig;
    }
    /**
     * @param EndpointConfig[][]|null[]|null $endpointsConfig
     *
     * @return self
     */
    public function setEndpointsConfig($endpointsConfig = null)
    {
        $this->endpointsConfig = $endpointsConfig;
        return $this;
    }
}