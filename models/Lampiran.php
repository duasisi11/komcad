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
			//[['no_registrasi'], 'required'],
			
            [['surat_keterangan_sehat'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['ktp'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['kk'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['ijazah_transkrip_nilai'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['skck'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg,jpeg,png'],
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
