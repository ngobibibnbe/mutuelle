<?php

namespace app\commands;


use Yii;
use yii\console\Controller;


class RbacController extends Controller{


    public function actionInit(){
        $auth = Yii::$app->authManager;

        // Droit de création d'un membre
        $createMember = $auth->createPermission('createMember');
        $createMember->description = 'Créer un membre';
        $auth->add($createMember);

        // Mettre à jour un membre
        $updateMember = $auth->createPermission('updateMember');
        $updateMember->description = 'Mettre à jour un membre';
        $auth->add($updateMember);

        // Activer/Désaciver un membre
        $toggleActiveMember = $auth->createPermission('toggleActiveMember');
        $toggleActiveMember = $auth->description('Activer/Désactiver un membre ');
        $auth->add($toggleActiveMember);


        // Faire un épargne
        $doASaving = $auth->createPermission('doASaving');
        $doASaving->description = 'faire une épargne';
        $auth->add($doASaving);

        // Faire un emprunt
        $doAborrowing = $auth->createPermission('doABorrowing');
        $doABorrowing->description('faire un emprunt');
        $auth->add($doABorrowing);

        // Faire un retrait
        $doAWithDrawal = $auth->createPermission('doABorrowing');
        $doAWithDrawal->description('Faire un retrait');
        $auth->add($doAWithDrawal);

        // Définition des rôles
        $admin = $auth->createRole('admin');
        $member = $auth->createRole('member');
        $candidate = $auth->createRole('candidate');



    }
}