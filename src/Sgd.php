<?php

namespace KnowEx\Sgd;

/**
 * Class Sgd
 * @package KnowEx\Sgd
 */
class Sgd
{
    /**
     * @var string
     */
    protected $userName = '';

    /**
     * @var string
     */
    protected $apiKey = '';

    /**
     * @var string
     */
    protected $apiBase = '';

    function __construct($userName, $apiKey, $apiBase = 'https://www.sgd.de/rest')
    {
        $this->userName = $userName;
        $this->apiKey = $apiKey;
        $this->apiBase = $apiBase;
    }

    function request($method, $path, $data = false)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->apiBase . '/auth/login');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'username=' . $this->userName . '&apikey=' . $this->apiKey);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookies.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookies.txt');
        curl_exec($curl);

        $url = $this->apiBase . $path;

        switch ($method)
        {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;

            case 'PUT':
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;

            default:
                if ($data)
                {
                    $url = sprintf('%s?%s', $url, http_build_query($data));
                }
        }

        $headers = array();
        $headers[] = 'Content-Type: application/json';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($curl, CURLOPT_URL, $url);

        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result);
    }
}
