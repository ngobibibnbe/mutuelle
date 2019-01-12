<?php
/* @var $this yii\web\View */
use yii\helpers\VarDumper;
$this->title = Yii::$app->user->identity->username;

?>
    <p>
        <b class= "accueil">Bienvenu <?=Yii::$app->user->identity->first_name;?></b>
    </p>
    <br><br><br><br><br><br>

    <div class="ui center aligned grid">
    <div class="ui statistics">

<div class="blue statistic">
    <div class="value">
      <p class=cadre><?=$emprunt == null ? "0" : number_format($emprunt, 2, ',', '');
?> Fcfa</p>
        <hr>
      <p><b class= "dette">Dette</b></p>
    </div>

  </div>

<div class="red statistic">
    <div class="value">
        <p class=cadre><?=$gain == null ? "0" : number_format($gain, 2, ',', '');
?>Fcfa</p>
            <hr>
        <p><b class= "dette">Gains</b></p>
    </div>

  </div>

<div class="purple statistic">
    <div class="value">
        <p class=cadre><?=$epargne == null ? "0" : number_format($epargne, 2, ',', '');
?>Fcfa</p>
            <hr>
        <p><b class= "dette">Epargne </b></p>
    </div>

  </div>

<div class="pink statistic">
    <div class="value">
        <p class=cadre><?=$social == null ? "0" : number_format($social, 2, ',', '');
?>Fcfa </p>
            <hr>
        <p><b class= "dette" >Font Social</b></p>
    </div>

  </div>






  </div>
</div>
</div> <br><br><br><br><br><br>

    <style>
        .presentation {}
        .presentation p {
            font-size: 40px;
            font-family :"Berlin dans FB Demi";
        }
    </style>
    <div class="presentation">
        <p> <b>Recentes historiques</b> </p>
    </div>

    <div class="sop">
        <table class="ui inverted teal table ">
            <thead>
                <tr>
                    <th class="t">
                        <p>type</p>
                    </th>
                    <th>
                        <p>montant</p>
                    </th>
                    <th>
                        <p>date de l'action</p>
                    </th>
                    <th>
                        <p>Description</p>
                    </th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($epargnes as $epargne) {
    echo '
                <tr>
                    <td class="t">
                        <p>Epargnes</p>
                    </td>
                    <td>
                        <p>' . $epargne->money . '</p>
                    </td>
                    <td>
                        <p>' . $epargne->created_at . '</p>
                    </td>
                    <td>
                        <p> Vous avezfait cet epargne à la session  N°' . $epargne->session_id . '</p>
                    </td></tr>'
    ;}?>
    <?php foreach ($sessions as $epargne) {
    echo '
                <tr>
                    <td class="t">
                        <p>Sessions</p>
                    </td>
                    <td><p>' ;
                    echo  $epargne->date==0 ?'Ferme' : 'ouvert'. '</p>
                    </td>
                    <td>
                        <p>' . $epargne->date . '</p>
                    </td>
                    <td>
                        <p> Cette session est la session  N°' . $epargne->id . '</p>
                    </td></tr>'
    ;}?>
    <?php foreach ($retraits as $epargne) {
    echo '
                <tr>
                    <td class="t">
                        <p>Retrait</p>
                    </td>
                    <td>
                        <p>' . $epargne->money . '</p>
                    </td>
                    <td>
                        <p>' . $epargne->created_at . '</p>
                    </td>
                    <td>
                        <p> Vous avez fait ce retrait  à la session N° ' . $epargne->session_id . ' </p>
                    </td></tr>'
    ;}?>
    <?php foreach ($emprunts as $epargne) {
    $date = new DateTime($epargne->created_at);
    $date->add(new DateInterval('P' . $epargne->delay . 'M'));

    echo '
                <tr>
                    <td class="t">
                        <p>Emprunt</p>
                    </td>
                    <td>
                        <p>' . $epargne->amount . '</p>
                    </td>
                    <td>
                        <p>' . $epargne->created_at . '</p>
                    </td>
                    <td>
                        <p> Vous avez fait cet emprunt  à la session N° ' . $epargne->session_id . ' avec
                        un taux de  :' . $epargne->percentage . '% que vous devez rembourser avant le: ' . $date->format('Y-m-d H:i:s') . '   </p>
                    </td></tr>'
    ;}

?>


            </tbody>
        </table>
    </div>
    <style>
    .dette{
        font-family :"Berlin dans FB Demi", Times, serif;
    }
    p {
            text-align: center;
            margin: auto;
            font-size: 20px;
        }
        .accueil {
                    font-family :"Berlin dans FB Demi", Times, serif;
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
