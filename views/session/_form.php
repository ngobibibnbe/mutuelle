<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-form">




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
        'options' => ['class' => 'field '],
    ],
]);?>

<?=$form->field($model, 'date')->input('date')?>

<?=$form->field($model, 'state')->checkbox(array(
    'label' => '',
    'labelOptions' => array('style' => 'padding:5px;'),
))
->label('ouvrir');
?>


    <div class="form-group">
        <?=Html::submitButton('Enregistrer', ['class' => 'btn btn-success green'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
<?php
\app\assets\AppAsset::register($this);