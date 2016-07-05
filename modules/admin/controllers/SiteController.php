<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public $layout='main';//设置默认的布局文件
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
    /**
     * @后台站点管理站点设置基本信息设置
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
     * @后台站点管理站点设置附件设置
     */
    public function actionUpfile()
    {
        return $this->render('upfile');
    }
}
