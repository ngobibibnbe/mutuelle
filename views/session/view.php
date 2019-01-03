<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Session */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="session-view" style="max-width:1000px;margin:auto";>

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
])?>
    </p>

    <?=DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'date',
        'state',
    ],
])?>

</div>
<br><br><br><br>
<div style="max-width:1000px;margin:auto">
<button class="ui secondary button" id="epargne">
  Nouvelle Epargne
</button>
<button class="ui secondary button" id="retrait">
  Nouveau Retrait
</button>
<button class="ui secondary button" id="emprunt">
  Nouvel Emprunt
</button>
<button class="ui secondary button" id="remboursement">
  Nouveau Remboursement
</button>
<button class="ui secondary button" id="social">
  Nouvelle action Social
</button>


<div class="ui modal" id="socialmodal">
  <i class="close icon"></i>
  <div class="header">
    Profile Picture
  </div>
  <div class="image content">
    <?php echo $this->render('/social/create', ['model' => $social]); ?>

  </div>
</div>


<div class="ui modal" id="empruntmodal">
  <i class="close icon"></i>
  <div class="header">
    Profile Picture
  </div>
  <div class="image content">
    <?php echo $this->render('/emprunt/create', ['model' => $emprunt]); ?>

  </div>
</div>

<div class="ui modal" id="epargnemodal">
  <i class="close icon"></i>
  <div class="header">
    Profile Picture
  </div>
  <div class="image content">
    <?php echo $this->render('/epargne/create', ['model' => $epargne]); ?>

  </div>
</div>


<div class="ui modal" id="retraitmodal">
  <i class="close icon"></i>
  <div class="header">
    Profile Picture
  </div>
  <div class="image content">
    <?php echo $this->render('/retrait/create', ['model' => $retrait]); ?>

  </div>
</div>


<div class="ui mini modal" id="remboursementemodal">
  <i class="close icon"></i>
  <div class="header">
    Profile Picture
  </div>
  <div class="content">
    <?php echo $this->render('/remboursement/create', ['model' => $remboursement]); ?>

  </div>
</div>

</div>