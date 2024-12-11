<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;

// Access check
if (!Factory::getUser()->authorise('core.manage', 'com_tschatai')) {
    throw new InvalidArgumentException(Text::_('JERROR_ALERTNOAUTHOR'), 404);
}

// Load assets
$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->useStyle('com_tschatai.admin')
   ->useScript('com_tschatai.admin');

$controller = BaseController::getInstance('TSChatAI');
$controller->execute(Factory::getApplication()->input->get('task', 'display'));
$controller->redirect(); 