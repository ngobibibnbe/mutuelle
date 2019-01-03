<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-form">




<?php $form = ActiveForm::begin();?>

      <?=Html::tag('div',
    Html::tag('input', '', ['type' => 'date', 'class' => 'field', "name" => "Session[date]"])
    . Html::tag('label', '') . '<br>',
    ['class' => 'ui ']
)?>
<?=$form->field($model, 'state')->checkbox(array(
    'label' => '',
    'labelOptions' => array('style' => 'padding:5px;'),
))
->label('ouvrir');
?>


    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
