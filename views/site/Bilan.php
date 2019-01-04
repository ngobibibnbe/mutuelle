
<?php
/* @var $this yii\web\View */
use yii\helpers\VarDumper;
$this->title = Yii::$app->user->identity->username;
$this->title = 'Bilan de l\'association';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "container">
    <div> <p class= "header"> Bilan de l'Exercice </p></div>  <br/><br/>

    <a class="ui tag label" style="max-height:50px;">Epargne: <b><?php echo $epargne; ?>Fcfa</b></a>
<a class="ui red tag label"> Emprunt:<b><?php echo $emprunt; ?>Fcfa</b></a>
<a class="ui teal tag label"> Gains:<b><?php echo $gain; ?>Fcfa</b></a>
<a class="ui blue tag label ">action social: <b><?php echo $social; ?>Fcfa</b></a>
<br><br><br>
    <div class="ui five column stackable centered grid" >
    <?php foreach ($arrays as $array) {

    echo ' <div class="column ">
        <div class="ui raised segment">
        <div class="ui placeholder">

            <div class="image header">
            <div class="line">
</div>
            <div class="line"></div>
            </div>
            <div class="paragraph">
            <div class="medium line">hg</div>
            <div class="short line">j</div>
            </div>
        </div>
        </div>

    </div>'
    ;}?>

    </div>
</div>
</div>

    <style>
        .container {
            background-image: url("../../web/img/tirelire.jpg") !important;
            background-size: cover !important;
        }
        .dette{
        font-family : Times, serif;
    }
    p {
            text-align: center;
            margin: auto;
            font-size: 20px;
        }
        .header {
                    font-family : "source serif pro",Times, serif;
                    font-size: 40px;
                    text-decoration : "blink";
                    font-style : "italic";
                }
        .danger {
            color: brown;
        }
        td {
            width: 300px;
            height: 100px;
        }
        .cadress {
            padding-left: 100px;
            padding-right: 100px;
        }
        p.cadre {
            text-align: center;
            font-size: 40px;
        }
        .cadres {
            padding-left: 60px;
        }
        hr {
            width: 100px;
        }
        .sop {
            margin: 65px;
        }
    </style>
