<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Retrait */

$this->title = 'Update Retrait: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Retraits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="retrait-update" style="width:50%;margin:auto;">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>
<?php
