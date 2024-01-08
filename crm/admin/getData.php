<?php
function get_data()
{
    $response = file_get_contents('https://opendata.paris.fr/api/explore/v2.1/catalog/datasets/comptes-administratifs-budgets-principaux-a-partir-de-2019-m57-ville-departement/records?limit=50');
    return  json_decode($response);
}
