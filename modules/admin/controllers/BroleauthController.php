<?php
/**
 * 为角色分配权限
 */
namespace app\modules\admin\controllers;

use yii\web\Controller;

class BroleauthController extends Controller
{
    public $layout='main';//设置默认的布局文件
    
    public function actionIndex()
    {
        $authManager = \Yii::$app->authManager;
        $roles = $authManager->getRoles();
        return $this->render('index',[
            'roles'=>$roles,
        ]);
    }
}
