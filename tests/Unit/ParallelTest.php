<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParallelTest extends TestCase
{
    private $start;

    public function setUp(): void
    {
        parent::setUp();
        $this->start = microtime(true);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        echo "実行時間" . (microtime(true) - $this->start) . "\n";
    }

    /**
     * 並列処理で実行する
     *
     * @return void
     */
    public function testExample()
    {
        $client = new Client();

        $uris = [
            'nginx/user/search?start=1&end=1000',
            'nginx/user/search?start=1001&end=2000',
            'nginx/user/search?start=2001&end=3000',
            'nginx/user/search?start=3001&end=4000'
        ];

        $requests =[];
        foreach ($uris as $uri) {
            $requests[] = new Request('get', $uri);
        }

        $resultNames = [];
        $pool = new Pool($client, $requests, [
           'concurrency' => 4,
            'fulfilled' => function ($response) use (&$resultNames) {
                $results = $response->getBody()->getContents();

                foreach (json_decode($results) as $user) {
                    if (strpos($user->name, 'Jr') !== false) {
                        $resultNames[] = $user->name;
                    }
                }
            }
        ]);
        $pool->promise()->wait();

        echo "Jrの含まれる名前1" . implode(',', $resultNames) ."\n";

        $this->assertTrue(true);
    }

    /**
     * シングルプロセスで実行する
     */
    public function testSingle()
    {
        $client = new Client();
        $response = $client->get('http://nginx/user/search?start=1&end=4000');

        $results = $response->getBody()->getContents();

        $resultNames = [];
        foreach (json_decode($results) as $user) {
            if (strpos($user->name, 'Jr') !== false) {
                $resultNames[] = $user->name;
            }
        }

        echo "Jrの含まれる名前2" . implode(',', $resultNames) ."\n";

        $this->assertTrue(true);
    }
}
