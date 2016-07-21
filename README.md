# vaibhavpandeyvpz/pimple-config
A service provider for [pimple/pimple](https://github.com/silexphp/Pimple), for loading configuration from simple PHP files.

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
