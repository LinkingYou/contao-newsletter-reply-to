<?php

/*
 * This file is part of ContaoNewsletterReplyTo.
 *
 * (c) 2018, Frank Mueller, LinkingYou
 *
 * @license LGPL-3.0-or-later
 */

namespace LinkingYou\ContaoNewsletterReplyTo\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ContaoNewsletterReplyToExtension extends Extension
{
    /**
     * @param array            $mergedConfig
     * @param ContainerBuilder $container
     *
     * @throws \Exception
     */
    public function load(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('services.yml');
    }
}
