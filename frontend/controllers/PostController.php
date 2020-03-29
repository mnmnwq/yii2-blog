<?php
/**
 * 文章控制器
 */
namespace frontend\controllers;

use common\models\CateModel;
use frontend\controllers\base\BaseController;
use frontend\models\PostsForm;
use Yii;

class PostController extends BaseController {
    /**
     * 文章列表
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 创建文章
     */
    public function actionCreate()
    {
        $model = new PostsForm();
        //定义场景
        $model->setScenario(PostsForm::SCENARIO_CREATE);
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            if($model->create()){
                return $this->redirect(['post/view','id'=>$model->id]);
            }else{
                Yii::$app->session->setFlash('warning',$model->_lastError);
            }
        }
        //获取所有分类
        $cate = CateModel::getAllCate();
        return $this->render('create',['model'=>$model,'cate'=>$cate]);
    }

    /**
     * 调用图片上传扩展
     * @return array
     */
    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],
            'ueditor'=>[
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config'=>[
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ]
        ];
    }
}
