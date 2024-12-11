<?php
namespace YourNamespace\Component\TSChatAI\Administrator\Service\Provider;

defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use YourNamespace\Component\TSChatAI\Administrator\Extension\TSChatAIComponent;

return new class implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $container->registerServiceProvider(new MVCFactory('\\YourNamespace\\Component\\TSChatAI'));
        $container->registerServiceProvider(new ComponentDispatcherFactory('\\YourNamespace\\Component\\TSChatAI'));
        
        $container->set(
            ComponentInterface::class,
            function (Container $container) {
                $component = new TSChatAIComponent($container->get(ComponentDispatcherFactoryInterface::class));
                $component->setMVCFactory($container->get(MVCFactoryInterface::class));
                
                return $component;
            }
        );
    }
}; 