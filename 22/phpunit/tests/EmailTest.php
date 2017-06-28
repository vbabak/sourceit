<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
final class EmailTest extends TestCase
{
    protected function setUp()
    {
        // called before each test
    }

    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }

    public function testFailExample()
    {
        // $this->markTestSkipped('test failure');
        $this->assertEquals(1, 0);
    }

    public function testIncompleteExample()
    {
        $this->markTestIncomplete('This test has not been implemented yet.');
    }
}
