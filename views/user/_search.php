<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin(
    [
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'ui form',
            'data-pjax' => 1,
        ], 'validateOnType' => true,
        'successCssClass' => 'success',
        'errorCssClass' => 'error',
        'errorSummaryCssClass' => 'ui error message',
        'fieldConfig' => [
            'template' => '{label}{input}{error}',
            'errorOptions' => ['class' => 'ui red'],
            'options' => ['class' => 'field'],
        ],

    ]);?>

    <div class="ui accordion field">
        <div class="title"><i class="icon dropdown"></i> Ajouter des filtres </div>
        <div class="content ">
            <div class="two fields">
                <?=$form->field($model, 'first_name')?>
                <?=$form->field($model, 'last_name')?>
            </div>
            <div class="four fields">
            <?=$form->field($model, 'id')?>
            <?=$form->field($model, 'username')?>
            <?=$form->field($model, 'email', ['inputOptions' => ['type' => 'email']])?>
            <?=$form->field($model, 'created_at', ['inputOptions' => ['type' => 'date']])?>
            </div>
            <?php // echo $form->field($model, 'tel') ?>
            <div>
                <?=Html::resetButton('Réinitialiser', ['class' => 'ui secondary button'])?>
                <?=Html::submitButton('<i class="search icon"></i>Rechecher', ['class' => 'ui left labeled icon button '])?>
            </div>

        </div>
    </div>



    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'is_admin') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_at') ?>
    <?php // echo $form->field($model, 'auth_key') ?>



    <?php ActiveForm::end();?>

</div>
