<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Document\HtmlDocument;

$app = Factory::getApplication();
$document = $app->getDocument();

if ($app->isClient('site') && $document instanceof HtmlDocument) {
    // Load assets
    $wa = $document->getWebAssetManager();
    $wa->getRegistry()->addRegistryFile('media/com_tschatai/joomla.asset.json');
    $wa->registerAndUseStyle('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
    $wa->useStyle('com_tschatai.chat')
       ->useScript('com_tschatai.chat');
    
    // Thêm chat container vào cuối body
    $document->addCustomTag('
        <div id="ts-chat-container"></div>
    ');
}

$controller = BaseController::getInstance('TSChatAI');
$controller->execute($app->input->get('task', 'display'));
$controller->redirect(); 