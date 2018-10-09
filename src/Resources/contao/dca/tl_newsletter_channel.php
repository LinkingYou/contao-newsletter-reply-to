<?php

$GLOBALS['TL_DCA']['tl_newsletter_channel']['fields']['replyto'] = array(
    'label'                   => &$GLOBALS['TL_LANG']['tl_newsletter_channel']['replyto'],
    'exclude'                 => true,
    'search'                  => true,
    'filter'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('rgxp'=>'email', 'maxlength'=>128, 'decodeEntities'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(128) NOT NULL default ''"
);

\Contao\CoreBundle\DataContainer\PaletteManipulator::create()
    ->addField('replyto', 'senderName', \Contao\CoreBundle\DataContainer\PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_newsletter_channel');
