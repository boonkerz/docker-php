<?php

namespace Docker\API\Model;

class EndpointConfig
{
    /**
     * @var string
     */
    protected $iPv4Address;
    /**
     * @var string
     */
    protected $iPv6Address;
    /**
     * @var string[]|null
     */
    protected $aliases;
    /**
     * @return string
     */
    public function getIPv4Address()
    {
        return $this->iPv4Address;
    }
    /**
     * @param string $iPv4Address
     *
     * @return self
     */
    public function setIPv4Address($iPv4Address = null)
    {
        $this->iPv4Address = $iPv4Address;
        return $this;
    }
    /**
     * @return string
     */
    public function getIPv6Address()
    {
        return $this->iPv6Address;
    }
    /**
     * @param string $iPv6Address
     *
     * @return self
     */
    public function setIPv6Address($iPv6Address = null)
    {
        $this->iPv6Address = $iPv6Address;
        return $this;
    }
    /**
     * @return string[]|null
     */
    public function getAliases()
    {
        return $this->aliases;
    }
    /**
     * @param string[]|null $aliases
     *
     * @return self
     */
    public function setAliases($aliases = null)
    {
        $this->aliases = $aliases;
        return $this;
    }
}