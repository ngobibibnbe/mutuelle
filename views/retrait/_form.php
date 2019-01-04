<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Retrait */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="retrait-form">

    <?php $form = ActiveForm::begin([
    'validateOnType' => true,
    'options' => ['class' => 'ui form', 'id' => 'login-form'],
    'successCssClass' => 'success',
    'errorCssClass' => 'error',
    'errorSummaryCssClass' => 'ui error message',
    'validatingCssClass' => 'loading',
    'fieldConfig' => [
        'template' => '{label}{input}{error}',
        'errorOptions' => ['class' => 'ui red'],
        //'labelOptions' => ['class' => 'ui label'],
        'options' => ['class' => 'field  '],
    ],
]);?>

    <h5> <?php echo "Session N°" . $model->session_id; ?></h5>
<?php echo $form->field($model, 'session_id', ['options' => ['style' => 'display:none;']])->textInput() ?>

    <?=$form->field($model, 'user_id')->textInput()?>

    <?=$form->field($model, 'money')->textInput()?>

    <?=$form->field($model, 'state')->textInput()?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php //$form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success green'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
