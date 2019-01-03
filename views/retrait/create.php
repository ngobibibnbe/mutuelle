<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Retrait */

$this->title = 'Create Retrait';
$this->params['breadcrumbs'][] = ['label' => 'Retraits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="retrait-create" style="width:50%;margin:auto;">

    <h1><?=Html::encode($this->title)?></h1>

    <?=$this->render('_form', [
    'model' => $model,
])?>

</div>
<?php
\app\assets\AppAsset::register($this);
