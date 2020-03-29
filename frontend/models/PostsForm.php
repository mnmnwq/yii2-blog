<?php
namespace frontend\models;
use yii\base\Model;
use common\models\PostsModel;

/**
 * 文章表单模型
 */

class PostsForm extends Model{
    public $id;
    public $title;
    public $content;
    public $label_img;
    public $cate_id;
    public $tags;
    public $_lastError = ""; //最后一次的错误

    public function rules()
    {
        return [
            [['id','title','content','cate_id'],'required'],
            [['id','cate_id'],'integer'],
            ['title','string','min'=>4,'max'=>50],
        ];
    }

    /**
     * 各个字段显示的名字命名
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'label_img' => '标签图',
            'tags' => '标签',
        ];
    }
}