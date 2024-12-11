<?php
namespace YourNamespace\Component\TSChatAI\Administrator\View\Dashboard;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

class HtmlView extends BaseHtmlView
{
    public function display($tpl = null)
    {
        ToolbarHelper::title('TS-ChatAI Dashboard');
        
        return parent::display($tpl);
    }
} 