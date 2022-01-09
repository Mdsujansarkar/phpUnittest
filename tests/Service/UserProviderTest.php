<?php
declare(strict_types=1);

namespace App\Tests\Service;
use GuzzleHttp\Client;
use App\Service\UserProvider;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

use function PHPUnit\Framework\assertSame;

class UserProviderTest extends TestCase
{
    public function testgetuserIdsGeoLocation(): void
    {
        $actualGuzzalClient = new Client();
        $mockBody = $this->createMock(StreamInterface::class);
        $mockBody
        ->method('getContents')
        ->willReturn(file_get_contents(__DIR__.'/200-users-data.json'));
        /**
         * @var MockObject
         */
        $mockResponse = $this->createMock(ResponseInterface::class);
        $mockResponse
        ->method('getBody')
        ->willReturn( $mockBody);

        /**
         * @var MockObject
         */
        $mockClient = $this->createMock(Client::class);
        $mockClient
        ->method('get')
        ->willReturn( $mockResponse);
        $userProvider = new UserProvider($actualGuzzalClient);
        $output= $userProvider->getuserIdsGeoLocation(-30,30);

       $expect = [4,7,8];
       $this->assertSame($output,$expect);


    }
}