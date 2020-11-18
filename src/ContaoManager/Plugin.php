<?php

/*
 * This file is part of ContaoNewsletterReplyTo.
 *
 * (c) 2018, Frank Mueller, LinkingYou
 *
 * @license LGPL-3.0-or-later
 */

namespace LinkingYou\ContaoNewsletterReplyTo\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\NewsletterBundle\ContaoNewsletterBundle;
use LinkingYou\ContaoNewsletterReplyTo\ContaoNewsletterReplyToBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoNewsletterReplyToBundle::class)
                ->setLoadAfter([ContaoNewsletterBundle::class]),
        ];
    }
}
