<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = '创建';
    $this->params['breadcrumbs'][] = ['label'=>'文章','url'=>['post/index']]; //面包屑
    $this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-lg-9">
        <div class="panel-title box-title">
            <span>创建文章</span>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model,'title')->textInput(['maxlength'=>true])?>
            <?= $form->field($model,'cate_id')->dropDownList($cate)?>
            <?= $form->field($model, 'label_img')->widget('common\widgets\file_upload\FileUpload',[
                'config'=>[
                    //图片上传的一些配置，不写调用默认配置
                ]
            ]) ?>

            <?= $form->field($model, 'content')->widget('common\widgets\ueditor\Ueditor',[
                'options'=>[
                    'initialFrameHeight' => 400,
                ]
            ]) ?>
            <?= $form->field($model, 'tags')->widget('common\widgets\tags\tagWidget',[
                'options'=>[
                    'initialFrameHeight' => 400,
                ]
            ]) ?>
            <div class="form-group">
                <?=Html::submitButton('发布',['class'=>'btn btn-success'])?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel-title box-title">注意事项</div>
        <div class="panel-body">
            <p>1.adasdsadsadas</p>
            <p>2.adasdsadsadas</p>
            <p>3.adasdsadsadas</p>
            <p>4.adasdsadsadas</p>
            <p>5.adasdsadsadas</p>
        </div>
    </div>
</div>
