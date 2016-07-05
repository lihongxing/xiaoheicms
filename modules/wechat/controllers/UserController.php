<?php

namespace app\modules\wechat\controllers;
use app\common\core\GlobalHelper;
use app\common\core\MessageHelper;
use app\models\WechatForm;
use Yii;
use yii\web\Controller;
use yii\web\Url;

class UserController extends Controller
{
        public function actions()
        {
            return [
                'error' => [
                    'class' => 'yii\web\ErrorAction',
                ]
            ];
        }

        /**
         * @uses 用户登录
         * @author lihongxing
         * @version 1.0
         * @return view
         */
        public function actionLogin()
        {
            if (!\Yii::$app->wechat->isGuest) {
                return $this->renderPartial('/account/display');
            }
            $model = new WechatForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                MessageHelper::success('欢迎登录小黑微信cms！',\yii\helpers\Url::toRoute('/wechat/account/display'));
            }
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    
        public function actionLogout()
        {
            Yii::$app->user->logout();
    
            return $this->goHome();
        }
        
        public function actionRegister()
        {
            return $this->renderPartial('register');
        }
        
        /**
         * @uses 账号信息修改
         * @author lihongxing
         * @version 1.0
         * @return view 
         */
        public function actionProfile()
        {
            return $this->renderPartial('profile');
        }
        
        /**
         * @uses 基本信息修改
         * @author lihongxing
         * @version 1.0
         * @return view 
         */
        public function actionBase()
        {
            return $this->renderPartial('base');
        }
}
