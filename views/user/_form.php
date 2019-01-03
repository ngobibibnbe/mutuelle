<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin();?>

    <?=$form->field($model, 'social_font')->textInput()?>

    <?=$form->field($model, 'username')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'email')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'password')->passwordInput(['maxlength' => true])?>

    <?=$form->field($model, 'first_name')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'last_name')->textInput(['maxlength' => true])?>

        <?=Html::tag('div',
    Html::tag('input', '', ['type' => 'checkbox', "name" => "User[is_admin]", 'value' => '0'])
    . Html::tag('label', 'admin') . '<br>',
    ['class' => 'ui toggle red checkbox']
)?>
        <?=Html::tag('div',
    Html::tag('input', '', ['type' => 'checkbox', "name" => "User[is_active]", 'value' => '1', 'checked' => ""])
    . Html::tag('label', 'actif') . '<br>',
    ['class' => 'ui toggle checked checkbox']
)?>






    <?php //$form->field($model, 'is_active')->textInput()?>

    <?php //$form->field($model, 'created_at')->textInput()?>


    <?php //$form->field($model, 'auth_key')->textInput(['maxlength' => true])?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
