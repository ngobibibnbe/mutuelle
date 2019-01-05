
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
<br><br><br><div class="ui four cards">

    <?php foreach ($arrays as $array) {

    echo ' <div class="card">
    <div class="image">
     <img src="' . $array[0] . '" alt="">
    </div>
    <div class="extra">
    <p> <b>' . $array[1] . '</b>
    ';if ($array[3] > 1000000) {
        echo '<i class="star yellow icon"></i><i class="star yellow icon"></i><i class="star yellow icon"></i><i class="star yellow icon"></i>
';} else if ($array[3] > 500000) {
        echo '<i class="star yellow icon"></i><i class="star yellow icon"></i><i class="star yellow icon"></i>
';} else if ($array[3] > 100000) {
        echo '<i class="star yellow icon"></i><i class="star yellow icon"></i>
';} else if ($array[3] > 50000) {
        echo '<i class="star yellow icon"></i>
';}

    echo '</p>
      <a class="ui tag label" style="margin:auto;"> Epargne:' . $array[3] . '</a>
      <a class="ui red tag label" style="margin-left:5px;"> Dette:' . $array[2] . '</a>
            <a class="ui teal tag label"> Gains:' . $array[5] . '</a>
                  <a class="ui blue tag label "> Social:' . $array[4] . '</a>


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
