<?php

/**
 * Class Conn
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

class Conn
{
    private $host = DB['DB_HOST_NAME'];
    private $user = DB['DB_USER_NAME'];
    private $pass = DB['DB_PASSWORD'];
    private $db   = DB['DB_DATABASE'];

    protected $conn;

    public function __construct()
    {
        if (!isset($this->conn)) {
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

            if ($this->conn->connect_error) {
                die('Connection failed: ('. $this->conn->connect_errno .') '. $this->conn->connect_error);
            }
        }

        return $this->conn;
    }


    public function filter($data)
    {
        if (!is_array($data)) {
            $data = $this->conn->real_escape_string($data);
            $data = trim(htmlentities($data, ENT_QUOTES, 'UTF-8', false));
        } else {
            $data = array_map(array( $this, 'filter' ), $data);
        }
        return $data;
    }
}
