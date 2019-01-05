<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Epargne]].
 *
 * @see Epargne
 */
class EpargneQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Epargne[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Epargne|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
