<?php

namespace app\widgets;


class ActiveForm extends \yii\widgets\ActiveForm 
{
    public $validateOnType = true;
    public $options = ['class' => 'ui form raised segment', 'id' => 'login-form'];
    public $successCssClass = 'success';
    public $errorCssClass = 'error';
    public $errorSummaryCssClass = 'ui error message';
    public $validatingCssClass = 'loading';
    public $fieldConfig = [
        'template' => '{label}{input}{error}',
        'errorOptions' => ['class' => 'ui red'],
        'options' => ['class' => 'field fluid'],
    ];
}
