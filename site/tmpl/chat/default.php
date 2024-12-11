<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Factory;

// Load required assets
HTMLHelper::_('jquery.framework');
$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->useStyle('com_tschatai.chat')
   ->useScript('com_tschatai.chat');
?>

<!-- Chat button và window sẽ được thêm tự động bởi JavaScript -->
<div id="ts-chat-container"></div> 