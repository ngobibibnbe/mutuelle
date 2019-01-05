<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Retrait]].
 *
 * @see Retrait
 */
class RetraitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Retrait[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Retrait|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
