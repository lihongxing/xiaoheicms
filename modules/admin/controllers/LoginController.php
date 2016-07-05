<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\AdminForm;
class LoginController extends Controller
{
    public $layout='main';//设置默认的布局文件
    
    /**
     * 后台用户登录方法实现
     */
    public function actionLogin()
    {
        if (!\Yii::$app->admin->isGuest) {
            return $this->render("/site/index");
        }
        $model = new AdminForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render("/site/index");
        }
        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }
    
    /**
     * 后台用户退出方法实现
     */
    public function actionLogout()
    {
        Yii::$app->admin->logout();
        return $this->renderPartial("/login/login");
    }
}
