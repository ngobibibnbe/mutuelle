<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RetraitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Retraits';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="retrait-index"  style="width:50%;margin:auto;>

    <h1><?=Html::encode($this->title)?></h1>
    <?php Pjax::begin();?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('Create Retrait', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        //  ['class' => 'yii\grid\SerialColumn'],

        'id',
        'session_id',
        'user_id',
        'money',
        'state',
        //'created_at',
        //'auth_key',

        ['class' => 'yii\grid\ActionColumn',
            'header' => 'Action',
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update} {delete}{link}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-user"> <i class="icon edit"></i> </span>',
                        $url);
                },

                /*'link' => function ($url, $model, $key) {
            return Html::a('Action', $url);
            },*/
            ],
        ],
    ],
    'options' => ['class' => 'grid-view gridview-newclass ui very basic collapsing celled table selectable'],

]);?>
    <?php Pjax::end();?>
</div>
