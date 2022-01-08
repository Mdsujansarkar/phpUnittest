<?php
declare(strict_types=1);
namespace App\Service;
use GuzzleHttp\Client;
class UserProvider
{
    private Client $httpClient;
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    public function getuserIdsGeoLocation(float $latude, float $longtude): array
    {
        $userThisJson = $this->httpClient->get('https://jsonplaceholder.typicode.com/users');
        $response= $userThisJson->getBody()->getContents();
        $useres = json_decode($response);
        foreach($useres as $id=>$user)
        {
            $location = $user->address->geo;
            dd($location);
        }
    }
}