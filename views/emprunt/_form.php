<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprunt-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'session_id')->textInput()?>

    <?=$form->field($model, 'user_id')->textInput()?>

    <?=$form->field($model, 'amount')->textInput()?>

    <?=$form->field($model, 'percentage')->textInput()?>

    <?=$form->field($model, 'delay')->textInput()?>

    <?=$form->field($model, 'state')->textInput()?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
