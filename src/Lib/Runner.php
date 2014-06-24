<?php

namespace Gourmet\Robo\Lib;

use Robo\Runner as RoboRunner;

class Runner extends RoboRunner {

	public $file;

	public function __construct() {
		$this->file = self::ROBOFILE;
	}

	protected function loadRoboFile() {
		if (!file_exists($this->file)) {
			$this->output->writeln(sprintf('<comment>%s could not be found</comment>', $this->file));
			$dialog = new \Symfony\Component\Console\Helper\DialogHelper();
			if ($dialog->askConfirmation($this->output, sprintf("<question>Should I create %s? (y/n)</question> ", $this->file), false)) {
				$this->initRoboFile();
			}
			exit;
		}

		require_once $this->file;

		if (!class_exists(self::ROBOCLASS)) {
			$this->output->writeln("<error>Class ". self::ROBOCLASS . " was not loaded</error>");
			return false;
		}
		return true;
	}

	protected function initRoboFile() {
		file_put_contents($this->file, <<<TEXT
<?php

use Robo\Tasks;

class RoboFile extends Tasks {

	// define public methods as commands.
	// @see https://github.com/Codegyre/Robo/#examples

}

TEXT
		);
		$this->output->writeln("Created empty " . $this->file);
	}

}
