<?php
namespace GusApi\Client;

use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    /**
     * @dataProvider envProvider
     */
    public function testBuildWithValidEnvironmentName($env)
    {
        $builder = new Builder($env);
        $client = $builder->build();

        $this->assertInstanceOf(GusApiClient::class, $client);
    }

    /**
     * @expectedException GusApi\Exception\InvalidEnvironmentNameException
     */
    public function testBuildWithInvalidEnvironmentName()
    {
        $builder = new Builder('random');
        $client = $builder->build();
    }

    public function envProvider()
    {
        return [
            ['prod'],
            ['dev']
        ];
    }
}