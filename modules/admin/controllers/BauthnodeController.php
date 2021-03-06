<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\NodeForm;
class BauthnodeController extends Controller
{
    public $layout='main';//设置默认的布局文件
    
    /**
     * 后台权限管理首页方法
     */
    public function actionIndex(){
        $authManager = \Yii::$app->authManager;
        $nodes = $authManager->getPermissions();
        return $this->render('index',[
            'nodes'=>$nodes,
        ]);
    }
    
    /**
     * 创建权限
     */
    public function actionCreate(){  
        $model = new NodeForm(); 
        if($model->load(\Yii::$app->request->post()) && $model->save()){
            \Yii::$app->session->setFlash('success','节点['.$model->name.']添加成功');
            return $this->redirect(['/node/index']);
        }else{
            return $this->render('create',[
                'model'=>$model,
            ]);
        }
    }
    
    /**
     * 更新权限
     */
    public function actionUpdate($name){
        $authManager = \Yii::$app->authManager;
        $child = $authManager->getChildren($name);
        if($child){
            \Yii::$app->session->setFlash('success','节点['.$name.']有子节点,不能修改');
            return $this->redirect(['/node/index']);
        }
    
        $node = $authManager->getPermission($name);
        if(!$node) return false;
        $model = new NodeForm();
        $model->name = $node->name;
        $model->description = $node->description;
    
        if($model->load(\Yii::$app->request->post()) && $model->update($name)){
            \Yii::$app->session->setFlash('success','节点['.$name.']修改成功');
            return $this->redirect(['/node/index']);
        }else{
            return $this->render('update',[
                'model'=>$model,
            ]);
        }
    }
    
    /**
     * 删除权限
     */
    public function actionDelete($name){
        $authManager = \Yii::$app->authManager;
        $child = $authManager->getChildren($name);
        if($child){
            \Yii::$app->session->setFlash('success','节点['.$name.']有子节点,不能删除');
            return $this->redirect(['/node/index']);
        }
        $node = $authManager->getPermission($name);
        if(!$node) return false;
        if($authManager->remove($node)){
            \Yii::$app->session->setFlash('success','节点['.$name.']删除成功');
        }else{
            \Yii::$app->session->setFlash('error','节点['.$name.']删除失败');
        }
        return $this->redirect(['/node/index']);
    }
}
