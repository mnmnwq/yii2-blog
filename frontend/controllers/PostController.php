<?php
/**
 * 文章控制器
 */
namespace frontend\controllers;

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
        return $this->render('create',['model'=>$model]);
    }
}
