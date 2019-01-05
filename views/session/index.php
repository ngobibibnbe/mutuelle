<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sessions';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-index" style="margin-left:220px;">

    <h1><?=Html::encode($this->title)?></h1>
    <?php Pjax::begin();?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('<span class="glyphicon glyphicon-user"> <i class="icon plus"></i> <b>Nouvelle Session</b></span>', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        // ['class' => 'yii\grid\SerialColumn'],

        'id',
        'date',
        [
            'attribute' => 'state',
            'label' => 'etat de la session',
            'filter' => array("1" => "En cours", "0" => "Fermé"),
            'content' => function ($data) {
                $class = $data->getstate() == 1 ? Html::label(
                    '<a class="ui black circular label"> En cours</a>') : Html::label(
                    '<a class="ui grey circular label">Fermé </a>');

                return $class;
            },
        ],

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
                'delete' => function ($url, $model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-user"> <i class="icon trash alternate"></i> </span>',
                        $url);
                }],

        ],
    ],
    'options' => ['class' => 'grid-view gridview-newclass ui very basic collapsing celled table selectable'],
    'rowOptions' => function ($model, $key, $index, $grid) {$class = '';
        // $class = $model->getis_admin() % 2 ? 'warning' : 'even';
        return array('key' => $key, 'index' => $index, 'class' => $class);
    },
]);?>
    <?php Pjax::end();?>
</div>
