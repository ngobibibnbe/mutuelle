<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\SemanticAsset;


SemanticAsset::register($this);

$this->title = 'Login';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="ui site-login">

    
    
    <?php $form = ActiveForm::begin([
        'validateOnType'=>true,
        'options'=>['class'=>'ui form raised segment','id'=>'login-form'],
        'successCssClass'=>'success',
        'errorCssClass'=>"error",
        'errorSummaryCssClass'=>"ui error message",
        'validatingCssClass'=>"loading",
        'fieldConfig' => [
            'template' => "{label}{input}{error}",
            'errorOptions'=>['class'=>"ui error message"],
            //'labelOptions' => ['class' => 'ui label'],
            'options' => ['class' => 'field']
        ],
    ]); ?>
        <h1 class="ui dividing header" style="margin-bottom:100px"><?= Html::encode($this->title) ?></h1>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Nom d'utilisateur") ?>

        <?= $form->field($model, 'password')->passwordInput()->label("Mot de passe") ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            //'template'=>"<div class=\"ui slider checkbox\">{label}{input}</div>"
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ],false)->label('Se souvenir de moi') ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Se connecter', ['class' => 'ui submit button', 'name' => 'login-button']) ?>
            </div>
        </div>
        <br>
        <div class="ui message" style="color:#999;">
            Veuillez remplir les champs ci dessus pour vous connecter.
        </div>

    <?php ActiveForm::end(); ?>


    
</div>
<?php $this->endBody() ?>
<script>
    $(document).ready( function () { 
        $('.ui.form').submit(function(event){
            if($('.error').length<=3)
                $('.ui.form').addClass('loading');
        });
    });
</script>

<style>
html,body{
    height:100%;
}

body{
    margin: 0;
    padding: 10px ;
    width: 100%;
    //*display:table;*/
}

.site-login{
    vertical-align:middle;
    text-align:center;
    display:/*table-cell*/ flex;
    width:100%;
    height:100%;
    justify-content:center;
    /*width:50%;
    max-width:400px;*/
}

</style>
</body>
</html>
<?php $this->endPage() ?>

