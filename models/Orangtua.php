<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orangtua".
 *
 * @property int $id_orangtua
 * @property string|null $nama_ayah
 * @property string $nik_ayah
 * @property string|null $pekerjaan_ayah
 * @property string|null $tempat_lahir_ayah
 * @property string|null $tanggal_lahir_ayah
 * @property string|null $alamat_ayah
 * @property string|null $nomor_telepon_ayah
 * @property string|null $nama_ibu
 * @property string $nik_ibu
 * @property string|null $pekerjaan_ibu
 * @property string|null $tempat_lahir_ibu
 * @property string|null $tanggal_lahir_ibu
 * @property string|null $alamat_ibu
 * @property string|null $nomor_telepon_ibu
 * @property string $no_registrasi
 *
 * @property DataPribadi $noRegistrasi
 */
class Orangtua extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orangtua';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik_ayah', 'nik_ibu', 'no_registrasi'], 'required'],
            [['tanggal_lahir_ayah', 'tempat_lahir_ibu', 'tanggal_lahir_ibu'], 'safe'],
            [['alamat_ayah'], 'string'],
            [['nama_ayah', 'nik_ayah', 'pekerjaan_ayah', 'tempat_lahir_ayah', 'nik_ibu', 'nomor_telepon_ibu', 'no_registrasi'], 'string', 'max' => 50],
            [['nomor_telepon_ayah'], 'string', 'max' => 20],
            [['nama_ibu', 'pekerjaan_ibu'], 'string', 'max' => 30],
            [['alamat_ibu'], 'string', 'max' => 40],
            [['no_registrasi'], 'exist', 'skipOnError' => true, 'targetClass' => DataPribadi::className(), 'targetAttribute' => ['no_registrasi' => 'no_registrasi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_orangtua' => 'Id Orangtua',
            'nama_ayah' => 'Nama Ayah',
            'nik_ayah' => 'Nik Ayah',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'tempat_lahir_ayah' => 'Tempat Lahir Ayah',
            'tanggal_lahir_ayah' => 'Tanggal Lahir Ayah',
            'alamat_ayah' => 'Alamat Ayah',
            'nomor_telepon_ayah' => 'Nomor Telepon Ayah',
            'nama_ibu' => 'Nama Ibu',
            'nik_ibu' => 'Nik Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'tempat_lahir_ibu' => 'Tempat Lahir Ibu',
            'tanggal_lahir_ibu' => 'Tanggal Lahir Ibu',
            'alamat_ibu' => 'Alamat Ibu',
            'nomor_telepon_ibu' => 'Nomor Telepon Ibu',
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
