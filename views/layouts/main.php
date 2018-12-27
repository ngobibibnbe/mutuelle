<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use app\assets\SemanticAsset;

SemanticAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="ui sidebar inverted vertical menu">
    <a class="item">
      1
    </a>
    <a class="item">
      2
    </a>
    <a class="item">
      3
    </a>
  </div>


    <?php
    echo Menu::widget([
        'options'=>[
            'tag'=>'div',
            'class' =>'ui large sticky top attached segment pointing menu',
        ],
        'itemOptions'=>[
            'tag'=>false,
        ],
        'items' => [
            // Important: you need to specify url as 'controller/action',
            // not just as 'controller' even if default action is used.
            ['label' => 'Menu','template'=>'<a class="item" id="sidebar" ><i class="sidebar icon"></i>{label}</a>'],
            ['label'=>'Acceuil','url'=>'/site/index'],
            // 'Products' menu item will be selected as long as the route is 'product/index'
            [
                'items'=>[
                    ['label' => '','url'=>'#','template'=>'<a class="right item" href="{url}"><i class="bell icon"></i>{label}</a>'],
            ['label' => 'Se déconnecter ('.Yii::$app->user->identity->username.')', 
                    'url' => ['site/logout'], 'visible' => !Yii::$app->user->isGuest,
                    'template'=>'<a class="right item" href="{url}">{label}</a>'
            ],
                ]
            ]
            
        ],
        'submenuTemplate'=>'<div class="right menu">{items}</div>',
        'linkTemplate'=> '<a class="item" href="{url}">{label}</a>'
    ]);
    
    ?>
<div class="ui attached segment pushable"id="push">
    <div class="ui sidebar inverted vertical menu">
        <a class="item">
        1
        </a>
        <a class="item">
        2
        </a>
        <a class="item">
        3
        </a>
    </div>
    <div class="pusher">
        <div class="ui basic segment" id="stick">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>


<div class="ui bottom attached inverted vertical footer segment">
    <div class="ui center aligned container">
        <p class="ui left inline">&copy; My Company <?= date('Y') ?></p>

        <p class="ui right inline"><?= Yii::powered() ?></p>
    </div>
</div>

<?php $this->endBody() ?>
<script>
    $(document).ready(function(){
        $('.ui.sidebar').sidebar({context:$('#push'),dimPage:false})
            .sidebar('attach events', '#sidebar','toggle')
            .sidebar('setting', 'transition', 'slide along')
        $('.ui.sticky').sticky({context:$('.pusher')});
    })
</script>
</body>
</html>
<?php $this->endPage() ?>
