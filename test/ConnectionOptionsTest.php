<?php
namespace Nats\Test;

use Nats\ConnectionOptions;

/**
 * Class ConnectionOptionsTest
 */
class ConnectionOptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests Connection Options getters and setters.
     *
     * @return void
     */
    public function testSettersAndGetters()
    {
        $options = new ConnectionOptions();
        $options
            ->setHost('host')
            ->setPort(4222)
            ->setUser('user')
            ->setPass('password')
            ->setLang('lang')
            ->setVersion('version')
            ->setVerbose(true)
            ->setPedantic(true)
            ->setReconnect(true);

        $this->assertEquals('host', $options->getHost());
        $this->assertEquals(4222, $options->getPort());
        $this->assertEquals('user', $options->getUser());
        $this->assertEquals('password', $options->getPass());
        $this->assertEquals('lang', $options->getLang());
        $this->assertEquals('version', $options->getVersion());
        $this->assertTrue($options->isVerbose());
        $this->assertTrue($options->isPedantic());
        $this->assertTrue($options->isReconnect());
    }

    /**
     * Tests Connection Options getters and setters without setting user and password.
     *
     * @return void
     */
    public function testSettersAndGettersWithoutCredentials()
    {
        $options = new ConnectionOptions();
        $options
            ->setHost('host')
            ->setPort(4222)
            ->setLang('lang')
            ->setVersion('version')
            ->setVerbose(true)
            ->setPedantic(true)
            ->setReconnect(true);

        $this->assertEquals('host', $options->getHost());
        $this->assertEquals(4222, $options->getPort());
        $this->assertNull($options->getUser());
        $this->assertNull($options->getPass());
        $this->assertEquals('lang', $options->getLang());
        $this->assertEquals('version', $options->getVersion());
        $this->assertTrue($options->isVerbose());
        $this->assertTrue($options->isPedantic());
        $this->assertTrue($options->isReconnect());
    }

    /**
     * Test string representation of ConnectionOptions.
     *
     * @return void
     */
    public function testStringRepresentation()
    {
        $options = new ConnectionOptions();
        $this->assertEquals("{\"lang\":\"php\",\"version\":\"0.8.0\",\"verbose\":false,\"pedantic\":false}", $options->__toString());
    }

    /**
     * Test string representation of ConnectionOptions with credentials.
     *
     * @return void
     */
    public function testStringRepresentationWithCredentials()
    {
        $options = new ConnectionOptions();
        $options->setUser("username");
        $options->setPass("password");
        $this->assertEquals("{\"lang\":\"php\",\"version\":\"0.8.0\",\"verbose\":false,\"pedantic\":false,\"user\":\"username\",\"pass\":\"password\"}", $options->__toString());
    }
}
