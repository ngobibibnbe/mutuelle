<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Remboursement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="remboursement-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'session_id')->textInput()?>

    <?=$form->field($model, 'emprunt_id')->textInput()?>

    <?=$form->field($model, 'amount')->textInput()?>

    <?=$form->field($model, 'tranche')->textInput()?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
