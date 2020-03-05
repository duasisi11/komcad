<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lampiran".
 *
 * @property int $id_lampiran
 * @property string|null $surat_keterangan_sehat
 * @property string|null $ktp
 * @property string|null $kk
 * @property string|null $ijazah_transkrip_nilai
 * @property string|null $skck
 * @property string|null $foto
 * @property string $no_registrasi
 *
 * @property DataPribadi $noRegistrasi
 */
class Lampiran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lampiran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_registrasi'], 'required'],
            [['surat_keterangan_sehat', 'ktp', 'kk', 'ijazah_transkrip_nilai', 'skck', 'foto'], 'string', 'max' => 80],
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
            'id_lampiran' => 'Id Lampiran',
            'surat_keterangan_sehat' => 'Surat Keterangan Sehat',
            'ktp' => 'Ktp',
            'kk' => 'Kk',
            'ijazah_transkrip_nilai' => 'Ijazah Transkrip Nilai',
            'skck' => 'Skck',
            'foto' => 'Foto',
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
