<?php

namespace mkiselev\broadcasting;

use mkiselev\broadcasting\broadcasters\Broadcaster;
use mkiselev\broadcasting\components\BroadcastManager;
use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\di\Instance;

class Module extends \yii\base\Module implements BootstrapInterface
{
    public $defaultRoute = 'broadcasting/auth';
    /**
     * @var string|array|\mkiselev\broadcasting\components\BroadcastManager
     */
    public $broadcastManager = BroadcastManager::class;

    /**
     * @var string|array|\mkiselev\broadcasting\broadcasters\Broadcaster
     */
    public $broadcaster;

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'mkiselev\broadcasting\controllers';


    /**
     * @return \mkiselev\broadcasting\components\BroadcastManager|string
     */
    public function getBroadcastManagerInstance()
    {
        if (!is_object($this->broadcastManager)) {
            $this->broadcastManager = Instance::ensure($this->broadcastManager, BroadcastManager::class);
        }

        return $this->broadcastManager;
    }

    /**
     * @return \mkiselev\broadcasting\broadcasters\Broadcaster|string
     */
    public function getBroadcasterInstance()
    {
        if (!is_object($this->broadcaster)) {
            $this->broadcaster = Instance::ensure($this->broadcaster, Broadcaster::class);
        }

        return $this->broadcaster;
    }


    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
    }

}
