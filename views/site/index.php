<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
<style>
fieldset{        width:500px ;border:solid rgb(0,0,0);padding:15px;
    background-color:white;
}
}p {text-align: center;}
.f1 p {text-align: center;font-size:30px;}
body{
    background-image: url('piggy-3612928_1920.jpg') ;

text-align
}

div div.f1{ ;font-color:green;}
td{border:solid green; width:48%;height:400px;padding:10px;}
</style>

  <h1>premiere page des utilisateurs </h1>
<div><?php $customer[0]->code?> y</div>
<div></div>
  <?php foreach ($sum as $sums):?> 
  <?php foreach ($dette as $dettes):?> 
  <table>
            <tr><td style="width: 55%;">
            <div class="f1" style="float:left">
<?php foreach ($customer as $connection):?> 
<p><b><?php $sop= $connection->user;?> 
<?= Html::encode("{$sop}") ?></b> Bienvenu sur votre compte vous avez un montant de :<b><?= Html::encode("{$connection->avoir}") ?></b>fcfa 
et une dette de <b><?= Html::encode("{$connection->dette}") ?></b>fcfa  que vous avez prise le 
:<b><?= Html::encode("{$connection->dettedate}") ?></b>
</p> 
<?php endforeach; ?>
</div>         
            </td  style="width: 45%;height:150px;">
<td><div class="f1" style="margin-left:20px;float:right;">
        <img src="views\connections\piggy-3612928_1920.jpg" alt="ici on doit ajouter les urls des images dans la bd et les recuperer pour les ajouters" srcset="views\connections\piggy-3612928_1920.jpg" style="width: 40%;height:150px;">
        </div></td>
        </tr>
        <tr>
         <td><table><tr><td style="width:65%;">
         <div style="background-color:blue;width:130px;padding:5px;"><p><b>Your money state </b></p><div style="margin:5px;background-color:white;height:95px;">

<p>you have:<?= Html::encode("{$connection->avoir}") ?>fcfa</p>
<p>you borrowed:<?= Html::encode("{$connection->dette}") ?>fcfa</p><div>
</div>

         </td><td style="width:49%;">

         <div style="background-color:blue;width:130px;padding:5px;"><p><b>This is the mutual state </b></p><div style="margin:5px;background-color:white;height:95px;">

<p> having:<?= Html::encode("{$sums->avoir}") ?>fcfa</p>
<p>borrowed-money:<?= Html::encode("{$dettes->dette}") ?>fcfa</p><div>
</div>
         </td></tr></table>
</td>   
         <td> </td>
        </tr>
        </table>

        <?php endforeach; ?><?php endforeach; ?>
</div>
