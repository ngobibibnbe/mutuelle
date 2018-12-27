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
            'errorOptions'=>['class'=>"ui red"],
            //'labelOptions' => ['class' => 'ui label'],
            'options' => ['class' => 'field']
        ],
    ]); ?>
        <?= Html::tag('h1',Html::encode($this->title),[
                'class' =>'ui dividing header center aligned',
                'style' =>'margin-bottom:100px'
            ])?>
        
        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Nom d'utilisateur") ?>

        <?= $form->field($model, 'password')->passwordInput()->label("Mot de passe") ?>
            
        <?= Html::tag('div',
            Html::tag('input','',['type'=>'checkbox',"name"=>"LoginForm[rememberMe]"])
            .Html::tag('label','Se souvenir de moi').'<br>',
            ['class'=>'ui checkbox']
        )?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Se connecter', ['class' => 'ui positive fluid button', 'name' => 'login-button']) ?>
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
            if($('.error').length===0)
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
    display:table;
}

.site-login{
    vertical-align:middle;
    /*text-align:center;*/
    display:table-cell;
    width:100%;
}

#login-form{
    margin:auto;
    max-width:400px
}

.ui.red{
    color:#9f3a38;
    text-align:center;
}



</style>
</body>
</html>
<?php $this->endPage() ?>

