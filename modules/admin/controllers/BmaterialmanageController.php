<?php
namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;

class BmaterialmanageController extends Controller
{
    public $layout='main';//设置默认的布局文件
    
    public function actionPicture(){
        return $this->render("picture");
    }
}
