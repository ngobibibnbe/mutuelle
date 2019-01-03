<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Remboursement */

$this->title = 'Create Remboursement';
$this->params['breadcrumbs'][] = ['label' => 'Remboursements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remboursement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
