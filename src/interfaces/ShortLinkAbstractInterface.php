<?php

namespace Mbarwick83\Shorty\Interfaces;

use Mbarwick83\Shorty\Exceptions\InvalidApiResponseException;

abstract class ShortLinkAbstractInterface
{
    /**
     * Shortens the long given URL
     *
     * @param string $longUrl
     *
     * @throws \Sonrisa\Service\ShortLink\Exceptions\InvalidApiResponseException
     */
    abstract public function shorten($longUrl);

    /**
     * Expands the short given URL
     *
     * @param string $shortUrl
     *
     * @throws \Sonrisa\Service\ShortLink\Exceptions\InvalidApiResponseException
     */
    abstract public function expand($shortUrl);

    /**
     * Validates if the URL to submit actually exists and is accessible.
     *
     * @param $url string                 URL being submitted.
     * @throws \Sonrisa\Service\ShortLink\Exceptions\InvalidApiResponseException
     * @return boolean
     */
    protected function urlCheck($url)
    {
        // first check if url has http:// prefix, if not, add it
        $parsed = parse_url($url);

        if (empty($parsed['scheme'])) {
            $url = 'http://' . ltrim($url, '/');
        }

        $file_headers = get_headers($url);

        if (!strpos($file_headers[0], "404 Not Found") > 0) {
            return true;
        }
        
        return false;
    }

    /**
     * Performs the Request to the API server.
     *
     * @param $url
     * @param $context
     * @return string
     */
    protected function request($url,$context)
    {
        return file_get_contents($url,false,$context);
    }

}
