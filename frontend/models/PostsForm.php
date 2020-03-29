<?php
namespace frontend\models;
use yii\base\Model;
use common\models\PostsModel;
use Yii;

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

    /**
     * SCENARIO_CREATE  创建
     * SCENARIO_UPDATE  修改
     * 定义场景
     */
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    /**
     * 设置场景
     */
    public function scenarios()
    {
        $scenarios = [
            self::SCENARIO_CREATE => ['title','content','label_img','tags','cate_id'],
            self::SCENARIO_UPDATE => ['title','content','label_img','tags','cate_id'],
        ];
        return array_merge(parent::scenarios(),$scenarios);
    }
    
    /**
     * 表单规则
     * @return array
     */
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
            'cate_id' => '分类',
        ];
    }

    /**
     * 创建
     */
    public function create()
    {
        //事务
        $transaction = Yii::$app->db->beginTransaction();
        try{
            $model = new PostsModel();
            $model->setAttribute('label_img',$this->attributes);
            $model->summary = $this->_getSummary();
            $model->user_id = Yii::$app->user->identity->id;  //当前登录用户的id
            $model->user_name = Yii::$app->user->identity->username;  //当前登录用户的username
            $model->created_at = time();
            $model->updated_at = time();
            if(!$model->save()){
                throw new \Exception('文章保存失败');
            }
            $this->id = $model->id;
            //调用事件
            $this->_eventAfterCreate();
            $transaction->commit();
            return true;
        }catch (\Exception $e){
            $transaction->rollBack();
            $this->_lastError = $e->getMessage();
            return false;
        }
    }

    /**
     * 截取文章简略信息
     */
    private function _getSummary($s = 0,$e = 90,$char = 'utf-8')
    {
        if(empty($this->content)){
            return '';
        }
        return (mb_substr(str_replace('&nbsp;','',strip_tags($this->content)),$s,$e,$char));
    }

    private function _eventAfterCreate()
    {}
}