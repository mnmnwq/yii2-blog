<?php
/**
 * 文章控制器
 */
namespace frontend\controllers;

use common\models\CateModel;
use frontend\controllers\base\BaseController;
use frontend\models\PostsForm;

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
            ]
        ];
    }
}
