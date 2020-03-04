<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah_matra".
 *
 * @property int $id_wilayah_matra
 * @property string|null $kodam
 * @property string|null $kodim
 * @property string|null $matra
 * @property string $no_registrasi
 *
 * @property DataPribadi $noRegistrasi
 */
class WilayahMatra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah_matra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matra'], 'string'],
            [['no_registrasi'], 'required'],
            [['kodam', 'kodim'], 'string', 'max' => 100],
            [['no_registrasi'], 'string', 'max' => 50],
            [['no_registrasi'], 'exist', 'skipOnError' => true, 'targetClass' => DataPribadi::className(), 'targetAttribute' => ['no_registrasi' => 'no_registrasi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_wilayah_matra' => 'Id Wilayah Matra',
            'kodam' => 'Kodam',
            'kodim' => 'Kodim',
            'matra' => 'Matra',
            'no_registrasi' => 'No Registrasi',
        ];
    }

    /**
     * Gets query for [[NoRegistrasi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNoRegistrasi()
    {
        return $this->hasOne(DataPribadi::className(), ['no_registrasi' => 'no_registrasi']);
    }
}
