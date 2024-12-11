<?php
defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcher;
use Joomla\CMS\Factory;
use Joomla\CMS\Document\HtmlDocument;

/**
 * Component Dispatcher
 */
class TSChatAIDispatcher extends ComponentDispatcher
{
    public function dispatch()
    {
        $app = Factory::getApplication();
        
        if ($app->isClient('site')) {
            $document = $app->getDocument();
            
            if ($document instanceof HtmlDocument) {
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
        }
        
        return parent::dispatch();
    }
} 