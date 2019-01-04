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
        $activeMember = $auth->createPermission('ActiveMember');
        $activeMember->description ='Activer/Désactiver un membre';
        $auth->add($activeMember);

        // Définition des rôles
        $admin = $auth->createRole('admin');
        $member = $auth->createRole('member');

        $auth->add($member);
        $auth->add($admin);
        $auth->addChild($admin,$createMember);
        $auth->addChild($admin,$updateMember);
        $auth->addChild($admin,$activeMember);
        $auth->addChild($admin,$member);
    }
}