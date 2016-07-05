<?php

namespace app\modules\admin;

class AdminClass extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();
        
        // 设置错误处理默认控制器
        \yii::$app->errorHandler->errorAction = "admin/site/error";
    }
}
