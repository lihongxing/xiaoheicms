<?php
namespace app\modules\wechat\controllers;

use app\common\core\MessageHelper;
use app\models\UniAccount;
use Yii;
use app\common\base\BaseController;
use yii\swiftmailer\Message;

/**
 * Created by PhpStorm.
 * User: lihongxing
 * Date: 2016/5/29
 * Time: 21:39
 */

class AccountController extends BaseController
{

    /**
     * @return string
     */
    public function actionDisplay()
    {
        return $this->renderPartial('display');
    }

    public function actionWelcome()
    {
        return $this->renderPartial('welcome');
    }

    public function actionPoststep()
    {
        if(Yii::$app->request->isPost){
            $_GPC = yii::$app->request->post();
            $name = trim($_GPC['cname']);
            $description = trim($_GPC['description']);
            $data = array(
                'name' => $name,
                'description' => $description,
                'groupid' => 0,
                'default_acid' => 0
            );
            $uniAccountmodel = new UniAccount();
            $result = $uniAccountmodel->create($data);
            if($result['status'] == 101){
                MessageHelper::error("添加公众号失败");
            }
            $uniacid = $result['message'];

        }else{
            $step = Yii::$app->request->get('step');
            return $this->renderPartial('poststep',[
                'step' => $step
            ]);
        }

    }
}