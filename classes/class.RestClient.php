<?php

/**
 * Class RestClient
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2018 FIAND T
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	TELEGRAM BOT ONGKIR
 * @author	fiand96
 * @copyright	FIAND T
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @since	Version 1.0.0
 * @filesource
 */

class RestClient
{
    private $endpoint;
    private $account_type;
    private $api_key;
    private $api_url;

    public function __construct($api_key, $endpoint, $account_type)
    {
        $this->api_key = $api_key;
        $this->endpoint = $endpoint;
        $this->account_type = $account_type;
        if ($this->account_type=='pro') {
            $this->api_url = "https://pro.rajaongkir.com/api/";
        } elseif ($this->account_type=='basic') {
            $this->api_url = "https://api.rajaongkir.com/basic/";
        } elseif ($this->account_type=='starter') {
            $this->api_url = "https://api.rajaongkir.com/starter/";
        }
    }

    public function post($params)
    {
        $curl = curl_init();
        $header[] = "Content-Type: application/x-www-form-urlencoded";
        $header[] = "key: $this->api_key";
        $query = http_build_query($params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $this->api_url . "/" . $this->endpoint);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $request = curl_exec($curl);
        $return = ($request === false) ? curl_error($curl) : $request;
        curl_close($curl);
        return $return;
    }

    public function get($params)
    {
        $curl = curl_init();
        $header[] = "key: $this->api_key";
        $query = http_build_query($params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $this->api_url . "/" . $this->endpoint . "?" . $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $request = curl_exec($curl);
        $return = ($request === false) ? curl_error($curl) : $request;
        curl_close($curl);
        return $return;
    }
}
