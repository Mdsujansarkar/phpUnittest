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
    public function getuserIdsGeoLocation(float $minlatude, float $maxlongtude): array
    {
        $userThisJson = $this->httpClient->get('https://jsonplaceholder.typicode.com/users');
    
        $response= $userThisJson->getBody()->getContents();
        dd($response);
        $useres = json_decode($response);
        $userId = [];
        foreach($useres as $user)
        {
            $location =(float) $user->address->geo->lat;

            if($location >=$minlatude && $location < $maxlongtude)
            {
                $userId[]= $user->id; 
            }
          
           
        }
        return $userId;
    }
}