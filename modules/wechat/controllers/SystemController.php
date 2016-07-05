<?php
namespace app\modules\wechat\controllers;
use app\common\base\BaseController;

/**
 * Created by PhpStorm.
 * User: lihongxing
 * Date: 2016/5/29
 * Time: 22:24
 */
class SystemController extends BaseController
{
    public function actionWelcome()
    {
        return $this->renderPartial('welcome');
    }
}