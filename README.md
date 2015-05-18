# Robo

A simple [CakePHP][cakephp] shell to wrap around [Robo][robo:repo].

## Requirements

* CakePHP 3.x

## Install

Using [Composer][composer]:

```
composer require gourmet/robo:dev-master
```

You then need to load the plugin. In `boostrap.php`, something like:

```php
\Cake\Core\Plugin::load('Gourmet/Robo', ['bootstrap' => true]);
```

## Usage

```
bin/cake Gourmet/Robo.robot
```

### Runtime Configuration

From the cli:

```
bin/cake Gourmet/Robo.robot --config=path/to/robo.php
```

Or using the `Gourmet/Robo.path` configuration key:

```php
Cake\Core\Configure::write('Gourmet/Robo.path', 'path/to/robo.php');
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
