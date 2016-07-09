<?php
namespace app\modules\wechat\controllers;

use Yii;
use app\common\core\GlobalHelper;
use app\common\core\MessageHelper;
use app\models\McGroups;
use app\models\SiteMulti;
use app\models\SiteStyles;
use app\models\SiteTemplates;
use app\models\UniAccount;
use app\models\UniSettings;
use yii\helpers\Url;
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
            if (empty($update['name'])) {
                MessageHelper::error("公众号名称必须填写");
            }
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
            if (empty($uniacid)) {
                //获取默认模板信息
                $SiteTemplatesmodel = new SiteTemplates();
                $template = $SiteTemplatesmodel
                    ->select('id,title')
                    ->find(array('name' => 'default'))
                    ->one();
                $styles['uniacid'] = $uniacid;
                $styles['templateid'] = $template['id'];
                $styles['name'] = $template['title'] . '_' . random(4);
                $SiteStylesmodel = new SiteStyles();
                //默认风格
                $result = $SiteStylesmodel->create($styles);
                $styleid = $result['message'];
                $multi['uniacid'] = $uniacid;
                $multi['title'] = $data['name'];
                $multi['styleid'] = $styleid;
                $SiteMultimodel = new SiteMulti();
                $result = $SiteMultimodel->create($multi);
                $multi_id = $result['message'];

                $unisettings['creditnames'] = array('credit1' => array('title' => '积分', 'enabled' => 1), 'credit2' => array('title' => '余额', 'enabled' => 1));
                $unisettings['creditnames'] = iserializer($unisettings['creditnames']);
                $unisettings['creditbehaviors'] = array('activity' => 'credit1', 'currency' => 'credit2');
                $unisettings['creditbehaviors'] = iserializer($unisettings['creditbehaviors']);
                $unisettings['uniacid'] = $uniacid;
                $unisettings['default_site'] = $multi_id;
                $unisettings['sync'] = iserializer(array('switch' => 0, 'acid' => ''));
                $uniSettingsModel = new UniSettings();
                $result = $uniSettingsModel->create($unisettings);
                $mcGroupsModel = new McGroups();
                $result = $mcGroupsModel->create(array(
                    'uniacid' => $uniacid,
                    'title' => '默认会员组',
                    'isdefault' => 1
                ));
            }
            $update['account'] = trim($_GPC['account']);
            $update['original'] = trim($_GPC['original']);
            $update['level'] = intval($_GPC['level']);
            $update['key'] = trim($_GPC['key']);
            $update['secret'] = trim($_GPC['secret']);
            $update['type'] = 1;
            $update['encodingaeskey'] = trim($_GPC['encodingaeskey']);

            if (empty($acid)) {
                $acid = account_create($uniacid, $update);
                if (GlobalHelper::is_error($acid)) {
                    MessageHelper::error('添加公众号信息失败', '', Url::toRoute(['account/poststep', 'uniacid' => intval($_GPC['uniacid']), 'step' => 2]));
                }
                $condition = 'uniacid=:uniacid';
                $attributes = array('default_acid' => $acid);
                $params = array(':uniacid' => $uniacid);
                $count = $uniAccountmodel->updateAll($attributes, $condition, $params);
            }

            if (!empty($_FILES['headimg']['tmp_name'])) {
                $_W['uploadsetting'] = array();
                $_W['uploadsetting']['image']['folder'] = '';
                $_W['uploadsetting']['image']['extentions'] = array('jpg');
                $_W['uploadsetting']['image']['limit'] = $_W['config']['upload']['image']['limit'];
                $upload = file_upload($_FILES['headimg'], 'image', "headimg_{$acid}");
                if (is_array($upload)) {
                    file_remote_upload($upload['path']);
                }
            } else {
                if (file_exists(IA_ROOT . '/attachment/headimg_' . $update['account'] . '.jpg')) {
                    file_move(IA_ROOT . '/attachment/headimg_' . $update['account'] . '.jpg', IA_ROOT . '/attachment/headimg_' . $acid . '.jpg');
                    file_remote_upload('headimg_' . $acid . '.jpg');
                }
            }

        }else{
            $step = Yii::$app->request->get('step');
            return $this->renderPartial('poststep',[
                'step' => $step
            ]);
        }

    }
}