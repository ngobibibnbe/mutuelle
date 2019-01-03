<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    'options' => [
        'data-pjax' => 1,
    ],
]);?>

    <?=$form->field($model, 'id')?>

    <?=$form->field($model, 'social_font')?>

    <?=$form->field($model, 'username')?>

    <?=$form->field($model, 'email')?>

    <?=$form->field($model, 'password')?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'is_admin') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_at') ?>
    <?php // echo $form->field($model, 'auth_key') ?>

    <div class="form-group">
        <?=Html::submitButton('Search', ['class' => 'btn btn-primary'])?>
        <?=Html::resetButton('Reset', ['class' => 'btn btn-default'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
