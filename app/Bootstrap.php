<?php
declare(strict_types=1);

namespace GymSpit\WebProject;

use Nette;
use Nette\Configurator;
use Nette\DI\Compiler;


class Bootstrap
{
	use Nette\StaticClass;

	public static function boot(?string $tempDir = null): Configurator
	{
		$configurator = new Configurator;

		// $configurator->setDebugMode('secret@23.75.345.200'); // enable for your remote IP
		if (getenv('NETTE_DEBUG') !== false) {
			$configurator->setDebugMode((bool) getenv('NETTE_DEBUG'));
		} elseif (PHP_SAPI === 'cli') {
			$configurator->setDebugMode(true);
		}
		$configurator->enableTracy(__DIR__ . '/../log');

		$configurator->setTimeZone('Europe/Prague');
		$configurator->setTempDirectory($tempDir ?? __DIR__ . '/../temp');

		$configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();

		$configurator->addConfig(__DIR__ . '/config/common.neon');
		$configurator->addConfig(__DIR__ . '/config/version.php');
		$configurator->onCompile[] = function (Configurator $_, Compiler $compiler): void {
			$compiler->addDependencies([__DIR__ . '/../package.json']);
		};
		$configurator->addConfig(__DIR__ . '/config/local.neon');

		$configurator->addParameters([
			'wwwDir' => __DIR__ . '/../www',
		]);

		return $configurator;
	}


	public static function bootForTests(): Configurator
	{
		$tempDir = __DIR__ . '/../temp/tests_' . getmypid();
		\Tester\Helpers::purge($tempDir);

		$configurator = self::boot($tempDir);
		\Tester\Environment::setup();

		return $configurator;
	}
}
