<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Gains]].
 *
 * @see Gains
 */
class GainsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Gains[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Gains|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
