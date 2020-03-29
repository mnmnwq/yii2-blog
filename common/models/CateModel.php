<?php

namespace common\models;

use common\models\base\BaseModel;
use Yii;

/**
 * This is the model class for table "cats".
 *
 * @property int $id 自增ID
 * @property string|null $cat_name 分类名称
 */
class CateModel extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => 'Cat Name',
        ];
    }

    /**
     * 获取所有分类
     */
    public static function getAllCate()
    {
        $cate[] = '请选择';
        $list = self::find()->asArray()->all();
        foreach($list as $k=>$v){
            $cate[$v['id']] = $v['cat_name'];
        }
        return $cate;
    }
}
