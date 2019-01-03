<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Epargne */

$this->title = 'Update Epargne: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Epargnes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="epargne-update" style="width:50%;margin:auto;">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>
<?php
\app\assets\AppAsset::register($this);
