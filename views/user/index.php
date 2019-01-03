<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ENSP MUTUAL USER';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index" style="width:50%;margin:auto;">

    <h1><?=Html::encode($this->title)?></h1>
    <br><br>
    <?php Pjax::begin();?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('<span class="glyphicon glyphicon-user"> <i class="icon user plus"></i></span>', ['create'], ['class' => 'btn btn-success'])?>
    </p>
<br><br>
<div >
    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        // ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'image',
            'label' => ' profile',
            //'filter' => '',
            'content' => function ($data) {
                $class = Html::label(
                    '<h4 class="ui image header "><a class="imageclickable">
          <img  src="' . $data->getimage() . '" class="ui mini rounded image ">
          <div class="content">
            ' . $data->getusername() . '

        </div></a>
      </h4><img src="' . $data->getimage() . '"
       data-title="' . $data->getusername() . 'Matricule ' . $data->getusername() . '" data-content="' . $data->getusername() . 'est un membre de la mutuelle depuis
        ' . $data->getcreated_at() . '" class="ui avatar image">'
                );

                return $class;
            },
            //TblCategory::get_status(),
        ],

        /* [
        'attribute' => 'id',
        'label' => 'matricule',
        'format' => 'text', //raw, html
        'content' => function ($data) {
        return $data->getid();
        },
        ],*/

        'email:email',
        //'password',
        //'first_name',
        //'last_name',

        [
            'attribute' => 'is_active',
            'label' => 'actif ?',
            'filter' => array("1" => "Active", "0" => "Inactive"),
            'content' => function ($data) {
                $class = $data->getis_active() == 1 ? Html::label(
                    '<a class="ui black circular label"></a>') : Html::label(
                    '<a class="ui grey circular label"></a>');

                return $class;
            },
            //TblCategory::get_status(),
        ],
        'social_font',
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
                /*  'delete' => function ($url, $model) {
            return Html::a(
            '<span class="glyphicon glyphicon-user"> <i class="icon user times"></i> </span>',
            $url);
            },
            /*'link' => function ($url, $model, $key) {
            return Html::a('Action', $url);
            },*/
            ],
        ],
    ],
    'options' => ['class' => 'grid-view gridview-newclass ui very basic collapsing celled table selectable'],
    'rowOptions' => function ($model, $key, $index, $grid) {
        $class = $model->getis_admin() % 2 ? 'warning' : 'even';
        return array('key' => $key, 'index' => $index, 'class' => $class);
    },
]);?>
</div>
    <?php Pjax::end();?>
</div>

