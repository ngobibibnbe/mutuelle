<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Social */

$this->title = 'Create Social';
$this->params['breadcrumbs'][] = ['label' => 'Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-create" style="width:50%;margin:auto;">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>
<?php
\app\assets\AppAsset::register($this);
