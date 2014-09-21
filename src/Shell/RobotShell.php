<?php

namespace Gourmet\Robo\Shell;

use Cake\Shell;
use Cake\Console\ConsoleOptionParser;
use Cake\Core\Configure;
use Gourmet\Robo\Lib\Runner;

/**
 * Simple wrapper around Robo.
 */
class RobotShell extends Shell {

/**
 * Start the shell and interactive console.
 *
 * @return void
 */
	public function main() {
		if (!class_exists('Robo\Runner')) {
			$this->err('<error>Unable to load Robo\Runner.</error>');
			$this->err('');
			$this->err('Make sure you have installed robo as a dependency,');
			$this->err('and that Robo\Runner is registered in your autoloader.');
			$this->err('');
			$this->err('If you are using composer run');
			$this->err('');
			$this->err('<info>$ php composer.phar require codegyre/robo</info>');
			$this->err('');
			return 1;
		}

		array_shift($_SERVER['argv']);

		$runner = new Runner();
		$runner->file = $this->params['config'];
		$runner->execute();
	}

/**
 * Display help for this console.
 *
 * @return ConsoleOptionParser
 */
	public function getOptionParser() {
		$file = Runner::ROBOFILE;
		if (Configure::check('Path.robofile')) {
			$file = Configure::read('Path.robofile');
		}

		$parser = new ConsoleOptionParser('robot', false);
		$parser->description(
			'This shell provides a Robo runner.' .
			"\n\n" .
			'You will need to have robo installed for this Shell to work. '
		)->addOption('config', [
			'help' => __d('cake_console', 'Path to your RoboFile class'),
			'default' => $file
		]);
		return $parser;
	}

}
