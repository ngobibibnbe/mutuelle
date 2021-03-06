<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Emprunt */

$this->title = 'Update Emprunt: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Emprunts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emprunt-update" style="width:50%;margin:auto;">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>
