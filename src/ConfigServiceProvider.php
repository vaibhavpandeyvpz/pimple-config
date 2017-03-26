<?php

/*
 * This file is part of vaibhavpandeyvpz/pimple-config package.
 *
 * (c) Vaibhav Pandey <contact@vaibhavpandey.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.md.
 */

namespace Pimple\Config;

use InvalidArgumentException;
use RuntimeException;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ConfigServiceProvider
 * @package Pimple\Config
 */
class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     */
    public function register(Container $pimple)
    {
        $pimple['config.files'] = function ($pimple) {
            return [$pimple['config.file']];
        };
        $pimple['config.hydrate'] = $pimple->protect(function ($pimple) {
            foreach ($pimple['config.files'] as $file) {
                if (is_file($file) && is_readable($file)) {
                    /** @noinspection PhpIncludeInspection */
                    $values = require $file;
                    if (is_array($values)) {
                        foreach ($values as $key => $value) {
                            $pimple[$key] = $value;
                        }
                    } else {
                        throw new InvalidArgumentException("Configuration file must return an array");
                    }
                } else {
                    throw new RuntimeException("Could not find or read from {$file}");
                }
            }
        });
    }
}
