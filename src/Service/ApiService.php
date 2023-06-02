<?php

namespace App\Service;

/**
 * Get api response for a url.
 */
class ApiService
{
    /**
     * Url Definitions
     *
     * @var array $urlDefinitions urlDefinitions
     */
    private $urlDefinitions;

    const CONNECT_TIME_OUT = 5000;

    /**
     * Constructor
     *
     * @param array $urlDefinitions urlDefinitions
     */
    public function __construct(array $urlDefinitions)
    {
        $this->urlDefinitions = $urlDefinitions;
    }

    /**
     * GetApiResponse - get api response for a url.
     *
     * @param string $urlDefinition url definition
     * @param array  $params        key value query parameters to construct url
     *
     * @return string api response in json format
     */
    public function getApiResponse(string $urlDefinition, array $params = array())
    {
        if (isset($this->urlDefinitions[$urlDefinition])) {
            $url = $this->urlDefinitions[$urlDefinition];
        } else {
            throw new \Exception('Invalid url definition');
        }

        $qs = http_build_query($params);

        $url = $url. '?' . $qs;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::CONNECT_TIME_OUT);
        $result = curl_exec($ch);
        if (false == $result) {
            throw new \Exception('curl error'.$ch);
        }
        curl_close($ch);

        return json_decode($result);
    }
}