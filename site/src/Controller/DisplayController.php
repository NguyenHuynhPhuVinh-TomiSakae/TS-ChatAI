<?php
namespace YourNamespace\Component\TSChatAI\Site\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;
use Joomla\CMS\Response\JsonResponse;

class DisplayController extends BaseController
{
    protected $default_view = 'chat';

    public function display($cachable = false, $urlparams = [])
    {
        return parent::display($cachable, $urlparams);
    }

    public function chat()
    {
        $app = Factory::getApplication();
        
        // Kiểm tra CSRF token
        $this->checkToken('post') or jexit('Invalid Token');
        
        $input = $app->input;
        $message = $input->getString('message', '');
        
        try {
            // Xử lý API AI ở đây
            $aiResponse = "Đây là phản hồi từ AI"; // Thay bằng tích hợp API thực tế
            
            echo new JsonResponse(['success' => true, 'response' => $aiResponse]);
        } catch (\Exception $e) {
            echo new JsonResponse(['success' => false, 'message' => $e->getMessage()]);
        }
        
        $app->close();
    }
} 