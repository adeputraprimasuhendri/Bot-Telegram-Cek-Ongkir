<?php

function json($data)
{
    header('Content-type: application/json');
    return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

function rp($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}

function r($t)
{
    return str_replace(" HARI", "", $t);
}
