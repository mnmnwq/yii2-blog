<?php
/**
 * 文章控制器
 */
namespace frontend\controllers;

use frontend\controllers\base\BaseController;

class PostController extends BaseController {
    /**
     * 文章列表
     * @return string
     */
    public function actionIndex(){
        return $this->render('index');
    }
}
