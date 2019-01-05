<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Remboursement]].
 *
 * @see Remboursement
 */
class RemboursementQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Remboursement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Remboursement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
