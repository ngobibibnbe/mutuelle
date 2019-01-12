<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(
    [
        'fieldConfig' => ['options' => ['class' => 'ui toggled']],
    ]);?>

    <?=$form->field($model, 'social_font')->textInput()?>

    <?=$form->field($model, 'username')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'email')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'password')->passwordInput(['maxlength' => true])?>

    <?=$form->field($model, 'first_name')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'last_name')->textInput(['maxlength' => true])?>
    <?=$form->field($model, 'imageFile')->fileInput(['multiple' => false, 'accept' => 'image/*'])?>


 <?php
//echo '<input type="checkbox" name="' . CHtml::activeName($model, 'is_admin') . '[]" value="' . $model->is_admin . '" class= "ui toggle checked checkbox" />';
echo
$form->field($model, 'is_admin')->checkbox(array(
    'class' => 'ui slider checkbox',
));
?>

       <?php echo
$form->field($model, 'is_active')->checkbox(array(
    'class' => 'ui slider checkbox'));

?>





    <?php //$form->field($model, 'is_active')->textInput()?>

    <?php //$form->field($model, 'created_at')->textInput()?>


    <?php //$form->field($model, 'auth_key')->textInput(['maxlength' => true])?>

    <div class="form-group">
        <?=Html::submitButton('Enregistrer', ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
