<?php

namespace common\models;

use common\models\base\BaseModel;
use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id 自增ID
 * @property string|null $title 标题
 * @property string|null $summary 摘要
 * @property string|null $content 内容
 * @property string|null $label_img 标签图
 * @property int|null $cat_id 分类id
 * @property int|null $user_id 用户id
 * @property string|null $user_name 用户名
 * @property int|null $is_valid 是否有效：0-未发布 1-已发布
 * @property int|null $created_at 创建时间
 * @property int|null $updated_at 更新时间
 */
class PostsModel extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['cat_id', 'user_id', 'is_valid', 'created_at', 'updated_at'], 'integer'],
            [['title', 'summary', 'label_img', 'user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'summary' => 'Summary',
            'content' => 'Content',
            'label_img' => 'Label Img',
            'cat_id' => 'Cat ID',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'is_valid' => 'Is Valid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
