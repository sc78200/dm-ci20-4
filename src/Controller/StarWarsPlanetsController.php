<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StarWarsPlanetsController
 * @package App\Controller
 */
class StarWarsPlanetsController extends AbstractController
{
    /**
     * @var Client
     */
    private $client;


    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://swapi.co/'
        ]);
    }

    public static function transformPlanet($planet)
    {
        return [
            'planet_name' => $planet['name'],
            'planet_diameter' => intval($planet['diameter']),
            'planet_climate' => $planet['climate']
        ];
    }


    /**
     * @Route("/star-wars-planets", name="star_wars_planets")
     */
    public function index()
    {
        $response = $this->client->request('GET', 'api/planets');
        $response = json_decode($response->getBody(), true);
        $planets = array_map([$this, 'transformPlanet'], $response['results']);
        return $this->json(['data' => $planets]);
    }
}
