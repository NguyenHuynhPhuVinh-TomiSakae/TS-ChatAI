<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

// Load assets
HTMLHelper::_('jquery.framework');
$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->useStyle('com_tschatai.chat')
   ->useScript('com_tschatai.chat');
?>
<div id="ts-chat-container"></div> 