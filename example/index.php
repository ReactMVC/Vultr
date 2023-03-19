<?php
use Vultr\Api;

require 'vendor/autoload.php';

$api_key = 'YOUR_API_KEY';
$vultr_api = new Api($api_key);


// List all servers
$servers = $vultr_api->list();
print_r($servers);


// Get a server by ID
$server_id = 'SERVER_ID';
$server = $vultr_api->get($server_id);
print_r($server);


// Create a server
$params = [
    'region' => 'ewr',
    'plan' => 'vc2-1c-1gb',
    'os_id' => 387,
    'label' => 'Example Server',
    'hostname' => 'example.com'
];
$new_server = $vultr_api->create($params);
print_r($new_server);


// Update a server
$server_id = 'SERVER_ID';
$update_params = [
    'label' => 'Updated Example Server'
];
$updated_server = $vultr_api->update($server_id, $update_params);
print_r($updated_server);


// Delete a server
$server_id = 'SERVER_ID';
$deleted = $vultr_api->delete($server_id);
var_dump($deleted);