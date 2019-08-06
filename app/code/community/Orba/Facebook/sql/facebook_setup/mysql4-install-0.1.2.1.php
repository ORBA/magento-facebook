<?php

$installer = $this;

$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$setup->addAttribute('customer', 'fb_user_id', array(
    'type' => 'varchar',
    'input' => 'hidden',
    'visible' => false,
    'required' => false
));

$msg_title = "Orba Facebook Extension ver. 0.1.2 was successfully installed!";
$msg_desc = "You can find the documentation of this extension at http://orba.pl/magento-facebook<br />"
    ."Contact us at magento@orba.pl if you have any problems with our extension.";
$url = "http://orba.pl/magento-facebook";

$message = Mage::getModel('adminnotification/inbox');
$message->setDateAdded( date( "c", time() ) );

$message->setSeverity( Mage_AdminNotification_Model_Inbox::SEVERITY_NOTICE );

$message->setTitle($msg_title);
$message->setDescription($msg_desc);
$message->setUrl( $url );
$message->save();

//@mail('magento@orba.pl', '[Instalacja] Facebook 0.1.2', "IP: ".$_SERVER['SERVER_ADDR']."\r\nHost: ".gethostbyaddr($_SERVER['SERVER_ADDR']));

$installer->endSetup();