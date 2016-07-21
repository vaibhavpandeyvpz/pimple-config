<?php

/*
 * This file is part of vaibhavpandeyvpz/pimple-config package.
 *
 * (c) Vaibhav Pandey <contact@vaibhavpandey.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.md.
 */

namespace Pimple\Provider;

use \InvalidArgumentException;
use \RuntimeException;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ConfigServiceProvider
 * @package Pimple\Provider
 */
class ConfigServiceProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @var bool
     */
    protected $optional;

    /**
     * ConfigServiceProvider constructor.
     * @param string $file
     * @param bool $optional
     */
    public function __construct($file, $optional = false)
    {
        $this->file = $file;
        $this->optional = $optional;
    }

    /**
     * @inheritdoc
     */
    public function register(Container $pimple)
    {
        if (is_file($this->file) && is_readable($this->file)) {
            /** @noinspection PhpIncludeInspection */
            $contents = require $this->file;
            if (is_array($contents)) {
                foreach ($contents as $k => $v) {
                    $pimple[$k] = $v;
                }
            } else {
                throw new InvalidArgumentException("Configuration file must return an array");
            }
        } elseif ($this->optional !== true) {
            throw new RuntimeException("Could not find or read from {$this->file}");
        }
    }
}
