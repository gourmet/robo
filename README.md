# Robo

A simple [CakePHP][cakephp] shell to wrap around [Robo][robo:repo].

## Requirements

* CakePHP 3.x

## Install

Add the plugin to your project's `composer.json` - something like this:

```json
{
	"require": {
		"gourmet/robo": "*"
	}
}
```

Because this plugin has the type `cakephp-plugin` set in its own `composer.json`,
[Composer][composer] will install it inside your /Plugins directory, rather than
in your `vendor-dir`. It is recommended that you add /Plugins/Robo to your
`.gitignore` file and here's [why][composer:ignore].

### Enable plugin

Enable it in your `App/Config/bootstrap.php` like so:

```php
\Cake\Core\Plugin::load('Robo', [
	'namespace' => 'Gourmet\\Robo',
	'autoload' => true
]);
```

## Usage

```
cake Robo.robot
```

## Configure

From the cli:

```
cake Robo.robot --config=path/to/RoboFile.php
```

Or using the `Path.robofile` configuration key:

```php
Cake\Core\Configure::write('Path.robofile', 'path/to/RoboFile.php');
```

## TODO

- [ ] Write tests.
- [ ] Add badges (travis, coveralls, downloads, latest stable).

## License

Copyright (c) 2014, Jad Bitar and licensed under [The MIT License][mit].

[cakephp]:http://cakephp.org
[composer]:http://getcomposer.org
[composer:ignore]:http://getcomposer.org/doc/faqs/should-i-commit-the-dependencies-in-my-vendor-directory.md
[mit]:http://www.opensource.org/licenses/mit-license.php
[robo:repo]://github.com/codegyre/robo
