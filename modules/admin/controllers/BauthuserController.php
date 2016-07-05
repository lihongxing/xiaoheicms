<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Admin;
use yii\web\NotFoundHttpException;
class BauthuserController extends Controller
{
    public $layout='main';//设置默认的布局文件
    
    /**
     * 
     */
    public function actionIndex()
    {
        $adminmodel = new Admin(); 
        $admins = $adminmodel->find()->asArray()->all();
        $authManager = Yii::$app->authManager;
        $roles = $authManager->getRoles();
        return  $this->render('index',['admins' => $admins, 'roles' => $roles]);
    }
    
    /**
     * 后台为用户分配角色
     * @param get $id
     * @throws NotFoundHttpException
     */
    public function actionRole(){
        $id = yii::$app->request->post('id');
        $user = Admin::findOne($id);
        if(!$user) throw new NotFoundHttpException('用户未找到');
        $authManager = Yii::$app->authManager;
        if(Yii::$app->request->isPost){
            $roleNames=Yii::$app->request->post('roles');
            $authManager->revokeAll($id);
            if(!empty($roleNames)&&is_array($roleNames)){
                foreach($roleNames as $roleName){
                    $role=$authManager->getRole($roleName);
                    if(!$role){
                        continue;
                    }
                    $authManager->assign($role,$id);
                }
            }
            $roles = $authManager->getRoles();
            Yii::$app->session->setFlash('success','更新成功');
            $this->redirect(['/admin/bauthuser/index']);
        }
    }
}
