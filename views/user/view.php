<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view" style="width:50%;margin:auto;">

    <h1><?=Html::encode($this->title)?></h1>
	<div class="ui modal" id="usermodal">
		<i class="close icon"></i>
		<div class="content">
			<?php echo $this->render('update', ['model' => $model]); ?>
		</div>
	</div>


    <p>
        <button class="ui secondary button" id="userbutton">
			Modifier
		</button>
    </p>

    <?=DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
		'first_name',
		'last_name',
        [
            'attribute' => 'social_font',
            'content' => function ($data) {
                return (new Formatter)->asInteger($data->social_font);
            },
        ],
        'email:email',
		'created_at:datetime',
    ],
])?>

</div>
<?php

