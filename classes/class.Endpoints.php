<?php

/**
 * Class Endpoints
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

class Endpoints
{
    private $api_key;
    private $account_type;

    public function __construct($api_key, $account_type)
    {
        $this->api_key = $api_key;
        $this->account_type = $account_type;
    }


    public function province($province_id = null)
    {
        $params = (is_null($province_id)) ? array() : array('id' => $province_id);
        $rest_client = new RestClient($this->api_key, 'province', $this->account_type);
        return $rest_client->get($params);
    }


    public function city($province_id = null, $city_id = null)
    {
        $params = (is_null($province_id)) ? array() : array('province' => $province_id);
        if (!is_null($city_id)) {
            $params['id'] = $city_id;
        }
        $rest_client = new RestClient($this->api_key, 'city', $this->account_type);
        return $rest_client->get($params);
    }


    public function subdistrict($city_id, $subdistrict_id = null)
    {
        $params = (is_null($city_id)) ? array() : array('city' => $city_id);
        if (!is_null($subdistrict_id)) {
            $params['id'] = $subdistrict_id;
        }
        $rest_client = new RestClient($this->api_key, 'subdistrict', $this->account_type);
        return $rest_client->get($params);
    }

    public function cost($origin, $destination, $weight, $courier)
    {
        $params = array(
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
        );
        $rest_client = new RestClient($this->api_key, 'cost', $this->account_type);
        return $rest_client->post($params);
    }


    public function internationalOrigin($province_id = null, $city_id = null)
    {
        $params = (is_null($province_id)) ? array() : array('province' => $province_id);
        if (!is_null($city_id)) {
            $params['id'] = $city_id;
        }
        $rest_client = new RestClient($this->api_key, 'internationalOrigin', $this->account_type);
        return $rest_client->get($params);
    }


    public function internationalDestination($country_id = null)
    {
        $params = (is_null($country_id)) ? array() : array('id' => $country_id);
        $rest_client = new RestClient($this->api_key, 'internationalDestination', $this->account_type);
        return $rest_client->get($params);
    }


    public function internationalCost($origin, $destination, $weight, $courier)
    {
        $params = array(
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
        );
        $rest_client = new RestClient($this->api_key, 'internationalCost', $this->account_type);
        return $rest_client->post($params);
    }


    public function currency()
    {
        $rest_client = new RestClient($this->api_key, 'currency', $this->account_type);
        return $rest_client->get(array());
    }


    public function waybill($waybill_number, $courier)
    {
        $params = array(
            'waybill' => $waybill_number,
            'courier' => $courier
        );
        $rest_client = new RestClient($this->api_key, 'waybill', $this->account_type);
        return $rest_client->post($params);
    }
}
