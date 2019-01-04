<?php
/* @var $this yii\web\View */
use yii\helpers\VarDumper;
$this->title = Yii::$app->user->identity->username;

?>
    <p>
        <b>Bienvenu Mr/Mme <?=Yii::$app->user->identity->first_name;?></b>
    </p>
    <p class="danger">
        <b>(en cas de dette ) Vous avez une dette de :prix </b>
    </p>
    <p class="danger">
        <b>(en cas de dette ) que vous devez rendre avant le :date </b>
    </p>
    <br><br><br><br><br><br>
    <table class="cadress">
        <tr class="cadres">
            <td>
                <div>
                    <p class=cadre><?=$emprunt == null ? "0" : $emprunt?>Fcfa</p>
                    <hr>
                    <p><b>Dette</b></p>


                </div>
            </td>
            <td>
                <div>
                    <p class=cadre><?=$gain == null ? "0" : $gain?> Fcfa</p>
                    <hr>
                    <p><b>Gains</b></p>

                </div>
            </td>
            <td>
                <div>
                    <p class=cadre><?=$epargne == null ? "0" : $epargne?> Fcfa</p>
                    <hr>
                    <p><b>Epargne</b></p>
                </div>
            </td>
            <td>
                <div>
                    <p class=cadre><?=$social == null ? "0" : $social?> Fcfa</p>
                    <hr>
                    <p><b>Font Social</b></p>
                </div>
            </td>
        </tr>
    </table><br><br><br><br><br><br>
    <style>
        .presentation {}
        .presentation p {
            font-size: 50px;
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
    p {
            text-align: center;
            margin: auto;
            font-size: 20px;
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
