<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pendidikan".
 *
 * @property int $id_pendidikan
 * @property string|null $pendidikan_terakhir
 * @property string|null $nama_perguruan_tinggi_sekolah
 * @property string|null $status_perguruan_tinggi_sekolah
 * @property string|null $program_studi_jurusan
 * @property string|null $akreditasi
 * @property int|null $ipk_nilai_un
 * @property string $no_registrasi
 *
 * @property DataPribadi $noRegistrasi
 */
class Pendidikan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pendidikan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ipk_nilai_un'], 'integer'],
            [['no_registrasi'], 'required'],
            [['pendidikan_terakhir', 'nama_perguruan_tinggi_sekolah', 'status_perguruan_tinggi_sekolah', 'program_studi_jurusan', 'akreditasi'], 'string', 'max' => 80],
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
            'id_pendidikan' => 'Id Pendidikan',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'nama_perguruan_tinggi_sekolah' => 'Nama Perguruan Tinggi Sekolah',
            'status_perguruan_tinggi_sekolah' => 'Status Perguruan Tinggi Sekolah',
            'program_studi_jurusan' => 'Program Studi Jurusan',
            'akreditasi' => 'Akreditasi',
            'ipk_nilai_un' => 'Ipk Nilai Un',
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
