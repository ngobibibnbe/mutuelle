<?
namespace app\rbac;


use yii\rbac\Rule;


class ToggleActiveMemberRule{
    
    public $name ='cantoggleActive';

    public function execute($user,$item,$param)
    {
        return $user->desactivator === $user->id;
    }
}