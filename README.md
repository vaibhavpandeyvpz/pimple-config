# vaibhavpandeyvpz/pimple-config
A service provider for [Pimple](https://github.com/silexphp/Pimple) to load configuration from simple [PHP](http://www.php.net/) files.

[![Latest Version](https://img.shields.io/github/release/vaibhavpandeyvpz/pimple-config.svg?style=flat-square)](https://github.com/vaibhavpandeyvpz/pimple-config/releases) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vaibhavpandeyvpz/pimple-config/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vaibhavpandeyvpz/pimple-config/?branch=master) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/f5756aeb-102d-42d3-92df-ea085c584737/mini.png)](https://insight.sensiolabs.com/projects/f5756aeb-102d-42d3-92df-ea085c584737) [![Total Downloads](https://img.shields.io/packagist/dt/vaibhavpandeyvpz/pimple-config.svg?style=flat-square)](https://packagist.org/packages/vaibhavpandeyvpz/pimple-config) [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Install
-------
```bash
composer require vaibhavpandeyvpz/pimple-config
```

Usage
-----
```php
<?php

$container = new Pimple\Container();

/**
 * @desc You can add as many as config service providers.
 */
$container->register(new Pimple\Provider\ConfigServiceProvider(__DIR__ . '/config.php'));

/**
 * @desc You can also load optional configuration files.
 *  If the file is missing ..., it won't complain.
 */
$container->register(new Pimple\Provider\ConfigServiceProvider(__DIR__ . '/config.dev.php', true));
```

License
------
See [LICENSE.md](https://github.com/vaibhavpandeyvpz/pimple-config/blob/master/LICENSE.md) file.
