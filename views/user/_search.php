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

        <select class="ui dropdown">
        <option value="">Ajouter des filtres</option>
  <option value="0">nom</option>
  <option value="1">Prenom</option>
  <option value="2">id</option>
  <option value="3">Nom d utilisateur</option>
    <option value="4">email</option>
    <option value="5">date</option>

</select>

        <div class="content ">
            <div class="two fields">
            <button  id="b">jjj</button>
            <?=$form->field($model, 'authkey', ['inputOptions' => ['id' => '']]);?>
                <?=$form->field($model, 'first_name', ['inputOptions' => ['style' => 'display:none;', 'id' => '0']]);?>
                <?=$form->field($model, 'last_name', ['inputOptions' => ['style' => 'display:none;', 'id' => '1']]);?>
            </div>
            <div class="four fields">
            <?=$form->field($model, 'id', ['inputOptions' => ['style' => 'display:none;', 'id' => '2']]);?>
            <?=$form->field($model, 'username', ['inputOptions' => ['style' => 'display:none;', 'id' => '3']]);?>
            <?=$form->field($model, 'email', ['inputOptions' => ['type' => 'email', 'style' => 'display:none;', 'id' => '4']]);?>
            <?=$form->field($model, 'created_at', ['inputOptions' => ['type' => 'date', 'style' => 'display:none;', 'id' => '5']]);?>
            </div>
            <?php // echo $form->field($model, 'tel') ?>
            <div>
                <?=Html::resetButton('Réinitialiser', ['class' => 'ui secondary button'])?>
                <?=Html::submitButton('<i class="search icon"></i>Rechecher', ['class' => 'ui left labeled icon button '])?>
            </div>

        </div>
        <script>

e2=$(".ui.dropdown");
e2.select(function(){
a=e2.val();

          // if(e.val=="0"){
               $('#0').css({"visibility":"block"});
               if(a==2){alert("The paragraph was clicked"+e2 . val()+"gfgh");
            <?php $model->id = $model->auth_key;
$model->auth_key = "";?>
            }
        });
          // }


        </script>
    </div>



    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'is_admin') ?>

    <?php // echo $form->field($model, 'is_active') ?>

    <?php // echo $form->field($model, 'created_at') ?>
    <?php // echo $form->field($model, 'auth_key') ?>



    <?php ActiveForm::end();?>

</div>
