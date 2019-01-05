<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\i18n\Formatter;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ENSP MUTUAL USER';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index" >


    <br><br>
    <?php Pjax::begin();?>
    <p style="text-align:right">
        <?=Html::a('<i class="icon user plus"></i>Ajouter un utilisateur', ['create'], ['class' => 'ui right labeled icon primary button'])?>
    </p>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


<br><br>
<div >
    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'image',
            'label' => '',
            'content' => function ($data) {
                return '<img src="' . $data->image . '" class="ui avatar image"></img>';
            },
        ],
		'id',
        'first_name',
        'last_name',
        'username',
        'email:email',
        [
            'attribute' => 'is_active',
            'options' => ['class' => 'centered aligned'],
            'label' => 'actif',
            'filter' => array("1" => "Active", "0" => "Inactive"),
            'content' => function ($data) {
                $class = Html::tag(
                    'i', '',
                    ['class' => $data->is_active === 1 ? "large green checkmark icon" : "large red close icon"]);
                return $class;
            },
        ],
        [
            'attribute' => 'social_font',
            'content' => function ($data) {
                return (new Formatter)->asInteger($data->social_font);
            },
        ],
        "created_at:date:Date d'ajout",
        ['class' => 'yii\grid\ActionColumn',
            'header' => 'Action',
            'headerOptions' => ['width' => '80'],
            'template' => '{view} {update}',
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a(
                        '<i class="icon edit"></i>',
                        $url, ['class' => 'ui tiny basic circular icon button']);
                },
                'view' => function ($url, $model) {
					return Html::a('<i class="eye icon"></i>',$url,['class' => 'ui tiny basic circular icon button']);
				},
            ],
        ],
    ],
    'rowOptions' => function ($model, $key, $index, $grid) {
        $class = $model->getis_admin() === 1 ? 'positive' : '';
        return array('key' => $key, 'index' => $index, 'class' => $class);
    },
    'tableOptions' => ['class' => 'ui definition celled tablet stackable striped collapsing table'],
]);?>
</div>
    <?php Pjax::end();?>
</div>
<?php


