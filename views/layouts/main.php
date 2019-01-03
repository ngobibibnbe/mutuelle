<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\SemanticAsset;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
SemanticAsset::register($this);
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language;?>">

<head>
    <meta charset="<?=Yii::$app->charset;?>">
    <?=Html::csrfMetaTags();?>
    <title>
        <?=Html::encode($this->title);?>
    </title>
    <?php $this->head();?>
</head>

<body>
    <?php $this->beginBody();?>

    <div class="ui sidebar inverted vertical menu">



    <div class="item">
            <div class="header"> <a class="item"><b> <i class="user icon"></i> profils</b></a></div>
            <div class="menu">

            </div>
        </div>

        <div class="item">
            <div class="header"><a class="item" href="/session/index"><b><i class="plus icon"></i> nouvelle session</b></a></div>
            <div class="menu">
                <a class="item"  href="/retrait/index">Retrait</a>
                <a class="item" href="/epargne/index">Epargne</a>
                <a class="item"  href="/emprunt/index">Emprunt</a>
                <a class="item"  href="/remboursement/index"> Remboursement</a>
                <a class="item"  href="/social/index">Font Social</a>

            </div>
        </div>


        <div class="item">
            <div class="header"><a class="item" href= "/user" ><b>  <i class="users icon"></i> Utilisateur</b></a></div>
            <div class="menu">
            </div>
        </div>
        <div class="item">
            <div class="header"><a class="item"><b> <i class="handshake  icon "></i> Bilan de la mutuelle</b></a></div>
            <div class="menu">

            </div>
        </div>
    </div>




    <?php
echo Menu::widget([
    'options' => [
        'tag' => 'div',
        'class' => 'ui inverted sticky top attached segment pointing menu ',
    ],
    'itemOptions' => [
        'tag' => false,
    ],
    'items' => [
        // Important: you need to specify url as 'controller/action',
        // not just as 'controller' even if default action is used.
        ['label' => 'Menu', 'template' => '<a class="item" id="sidebar" ><i class="sidebar icon"></i>{label}</a>'],
        ['label' => 'Acceuil', 'url' => '/site/index'],
        // 'Products' menu item will be selected as long as the route is 'product/index'
        [
            'items' => [
                ['label' => '', 'url' => '#', 'template' => '<a class="right item" href="{url}"><i class="bell icon"></i>{label}</a>'],
                ['label' => 'Se déconnecter (' . Yii::$app->user->identity->username . ')',
                    'url' => ['site/logout'], 'visible' => !Yii::$app->user->isGuest,
                    'template' => '<a class="right item" href="{url}">{label}</a>',
                ],
            ],
        ],
    ],
    'submenuTemplate' => '<div class="right menu">{items}</div>',
    'linkTemplate' => '<a class="item" href="{url}">{label}</a>',
]);
?>
    <div class="ui basic segment " id="push">


        <div class="ui basic segment" id="stick">
            <?=Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    'itemTemplate' => '<i class="right chevron icon divider"></i>{link}',
    'activeItemTemplate' => '<i class="right arrow icon divider"></i>{link}',
    'tag' => 'div',
    'options' => ['class' => 'ui breadcrumb'],

]);?>
            <?=Alert::widget();?>
            <?=$content;?>
        </div>
    </div>


    <div class="ui footer inverted vertical segment">
        <div class="ui center aligned container">
            <p class="ui left inline">
                &copy; My Company
                <?=date('Y');?>
            </p>

            <p class="ui right inline">
                <?=Yii::powered();?>
            </p>
        </div>
    </div>

    <?php $this->endBody();?>
    <style>
        #push{
            margin-bottom:100px;
        }
        .ui.footer { /* Increased specificity for SO snippet priority */
        height:75px;
        position: absolute;
        bottom: 0;
        width: 100%;
     }
    </style>

    <script>
        $(document).ready(function () {
            $('.ui.sidebar').sidebar({
                    context: $('body'),
                    dimPage: false
                })
                .sidebar('attach events', '#sidebar', 'toggle')
                .sidebar('setting', 'transition', 'slide along')
            $('.ui.sticky').sticky();
        });
        $('#epargne').click(function(){
            $("#epargnemodal").modal('show');
        });
    </script>
</body>

</html>
<?php $this->endPage();?>