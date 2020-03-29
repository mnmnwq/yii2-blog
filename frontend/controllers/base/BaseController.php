<?php
namespace frontend\controllers\base;

use yii\web\Controller;

class BaseController extends Controller{
    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }
}
