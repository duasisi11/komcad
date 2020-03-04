<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_pribadi".
 *
 * @property string $no_registrasi
 * @property string|null $nama_lengkap
 * @property string $nik
 * @property string|null $tempat_lahir
 * @property string|null $tanggal_lahir
 * @property string|null $jenis_kelamin
 * @property string|null $agama
 * @property string|null $suku
 * @property string|null $kewarganegaraan
 * @property int|null $tinggi_badan
 * @property int|null $berat_badan
 * @property string|null $alamat
 * @property string|null $kelurahan_desa
 * @property string|null $kecamatan
 * @property string|null $kabupaten
 * @property string|null $provinsi
 * @property string|null $domisili
 * @property string|null $kode_pos
 * @property string|null $nomer_telepon
 * @property int|null $jumlah_saudara_kandung
 * @property int|null $anak_ke_berapa
 * @property int|null $dari_jumlah_bersaudara
 *
 * @property Lampiran[] $lampirans
 * @property Orangtua[] $orangtuas
 * @property Pendidikan[] $pendidikans
 * @property WilayahMatra[] $wilayahMatras
 */
class DataPribadi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_pribadi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_registrasi', 'nik'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['jenis_kelamin', 'alamat'], 'string'],
            [['tinggi_badan', 'berat_badan', 'jumlah_saudara_kandung', 'anak_ke_berapa', 'dari_jumlah_bersaudara'], 'integer'],
            [['no_registrasi', 'nama_lengkap', 'nik', 'suku', 'kewarganegaraan'], 'string', 'max' => 50],
            [['tempat_lahir'], 'string', 'max' => 60],
            [['agama', 'kode_pos', 'nomer_telepon'], 'string', 'max' => 30],
            [['kelurahan_desa', 'kecamatan', 'kabupaten', 'provinsi', 'domisili'], 'string', 'max' => 100],
            [['no_registrasi'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_registrasi' => 'No Registrasi',
            'nama_lengkap' => 'Nama Lengkap',
            'nik' => 'Nik',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'suku' => 'Suku',
            'kewarganegaraan' => 'Kewarganegaraan',
            'tinggi_badan' => 'Tinggi Badan',
            'berat_badan' => 'Berat Badan',
            'alamat' => 'Alamat',
            'kelurahan_desa' => 'Kelurahan Desa',
            'kecamatan' => 'Kecamatan',
            'kabupaten' => 'Kabupaten',
            'provinsi' => 'Provinsi',
            'domisili' => 'Domisili',
            'kode_pos' => 'Kode Pos',
            'nomer_telepon' => 'Nomer Telepon',
            'jumlah_saudara_kandung' => 'Jumlah Saudara Kandung',
            'anak_ke_berapa' => 'Anak Ke Berapa',
            'dari_jumlah_bersaudara' => 'Dari Jumlah Bersaudara',
        ];
    }

    /**
     * Gets query for [[Lampirans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLampirans()
    {
        return $this->hasMany(Lampiran::className(), ['no_registrasi' => 'no_registrasi']);
    }

    /**
     * Gets query for [[Orangtuas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrangtuas()
    {
        return $this->hasMany(Orangtua::className(), ['no_registrasi' => 'no_registrasi']);
    }

    /**
     * Gets query for [[Pendidikans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikans()
    {
        return $this->hasMany(Pendidikan::className(), ['no_registrasi' => 'no_registrasi']);
    }

    /**
     * Gets query for [[WilayahMatras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWilayahMatras()
    {
        return $this->hasMany(WilayahMatra::className(), ['no_registrasi' => 'no_registrasi']);
    }
}
