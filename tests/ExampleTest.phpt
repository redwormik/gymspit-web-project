<?php
declare(strict_types=1);

namespace GymSpit\WebProject\Tests;

use Mockery;
use Nette;
use Tester;
use Tester\Assert;

require __DIR__ . '/../vendor/autoload.php';


class ExampleTest extends Tester\TestCase
{
	private Nette\DI\Container $container;


	public function __construct(Nette\DI\Container $container)
	{
		$this->container = $container;
	}


	public function setUp(): void
	{
	}


	public function tearDown(): void
	{
		Mockery::close();
	}


	public function testSomething(): void
	{
		Assert::true(true);
	}
}


$container = \GymSpit\WebProject\Bootstrap::bootForTests()
	->createContainer();

$test = new ExampleTest($container);
$test->run();
