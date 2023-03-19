<?php
/*
Vultr Api

A PHP library for interacting with Vultr API
*/

namespace Vultr;

use GuzzleHttp\Client;

// class Api
class Api {
    private $client;
    private $api_key;
    private $base_uri = 'https://api.vultr.com/v2/';

    // main function
    public function __construct($api_key) {
        $this->api_key = $api_key;
        $this->client = new Client([
            'base_uri' => $this->base_uri,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->api_key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
    }

    // get servers list
    public function list() {
        $response = $this->client->get('servers');
        return json_decode($response->getBody(), true)['servers'];
    }

    // get a server data
    public function get($server_id) {
        $response = $this->client->get("servers/$server_id");
        return json_decode($response->getBody(), true)['server'];
    }

    // create new server
    public function create($params) {
        $response = $this->client->post('servers', [
            'json' => $params
        ]);
        return json_decode($response->getBody(), true)['server'];
    }

    // update server data
    public function update($server_id, $params) {
        $response = $this->client->patch("servers/$server_id", [
            'json' => $params
        ]);
        return json_decode($response->getBody(), true)['server'];
    }

    // delete a server
    public function delete($server_id) {
        $response = $this->client->delete("servers/$server_id");
        return $response->getStatusCode() === 204;
    }
}