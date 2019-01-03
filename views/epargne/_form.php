<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Epargne */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="epargne-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'session_id')->textInput()?>

    <?=$form->field($model, 'user_id')->textInput()?>

    <?=$form->field($model, 'money')->textInput()?>

    <?=$form->field($model, 'state')->textInput()?>

    <?php //echo $form->field($model, 'created_at')->textInput() ?>

    <?=$form->field($model, 'auth_key')->textInput(['maxlength' => true])?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
