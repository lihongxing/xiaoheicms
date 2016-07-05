<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class BuserController extends Controller
{
    public $layout='main';//设置默认的布局文件
    public function actionUser_profile()
    {
        return $this->render('user_profile');
    }
}
