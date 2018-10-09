<?php

/*
 * This file is part of ContaoNewsletterReplyTo.
 *
 * (c) 2018, Frank Mueller, LinkingYou
 *
 * @license LGPL-3.0-or-later
 */

namespace LinkingYou\ContaoNewsletterReplyTo\Listener;

use Contao\NewsletterModel;
use Swift_Events_SendEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class Newsletter extends \Swift_Plugins_DecoratorPlugin
{
    private $request;

    public function __construct(RequestStack $requestStack)
    {
        $this->request = $requestStack->getMasterRequest();
        parent::__construct([]);
    }

    public function beforeSendPerformed(Swift_Events_SendEvent $evt)
    {
        $do = $this->request->query->get('do', null);
        //$table = $this->request->query->get('table', null);
        $key = $this->request->query->get('key', null);
        $id = $this->request->query->get('id', null);

        if (('newsletter' === $do) && ('send' === $key)) {
            // get the meta data for the current newsletter
            $newsletter = NewsletterModel::findById($id);
            $newsletter_channel = $newsletter->getRelated('pid');
            $replyto = $newsletter_channel->replyto;

            if ($replyto) {
                // set reply-to address
                $evt->getMessage()->setReplyTo($replyto);
            }
        }
    }
}
