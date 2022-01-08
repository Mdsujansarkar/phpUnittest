<?php
declare(strict_types=1);

namespace App\Tests\Service;
use GuzzleHttp\Client;
use App\Service\UserProvider;
use PHPUnit\Framework\TestCase;

class UserProviderTest extends TestCase
{
    public function testgetuserIdsGeoLocation(): void
    {
        $actualGuzzalClient = new Client();
        $userProvider = new UserProvider($actualGuzzalClient);
        $userProvider->getuserIdsGeoLocation(3,4);

    }
}