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
 * @property string|null $surat_keterangan_sehat
 * @property string|null $ktp
 * @property string|null $kk
 * @property string|null $ijazah_transkrip_nilai
 * @property string|null $skck
 * @property string|null $foto
 *
 * @property Orangtua[] $orangtuas
 * @property Pendidikan[] $pendidikans
 * @property WilayahMatra[] $wilayahMatras
 */
class DataPribadi extends \yii\db\ActiveRecord
{
	public $surat_keterangan_sehat2;
	public $ktp2;
	public $kk2;
	public $ijazah_transkrip_nilai2;
	public $skck2;
	public $foto2;
	 
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
			[['no_registrasi','nama_lengkap', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'suku', 'kewarganegaraan', 'tinggi_badan',
			'berat_badan', 'alamat', 'kelurahan_desa', 'kecamatan','kabupaten', 'provinsi', 'domisili','kode_pos', 'nomer_telepon',
			'jumlah_saudara_kandung', 'anak_ke_berapa', 'dari_jumlah_bersaudara'], 'safe'],
			
			[['surat_keterangan_sehat', 'ktp', 'kk', 'ijazah_transkrip_nilai', 'skck', 'foto'], 'safe'],
			
            [['jenis_kelamin', 'alamat'], 'string'],
            [['tinggi_badan', 'berat_badan', 'jumlah_saudara_kandung', 'anak_ke_berapa', 'dari_jumlah_bersaudara'], 'integer'],
            [['no_registrasi', 'nama_lengkap', 'nik', 'suku', 'kewarganegaraan'], 'string', 'max' => 50],
            [['tempat_lahir'], 'string', 'max' => 60],
            [['agama', 'kode_pos', 'nomer_telepon'], 'string', 'max' => 30],
            [['kelurahan_desa', 'kecamatan', 'kabupaten', 'provinsi', 'domisili'], 'string', 'max' => 100],
            
            //[['surat_keterangan_sehat', 'ktp', 'kk', 'ijazah_transkrip_nilai', 'skck', 'foto'], 'string', 'max' => 80],
			
			[['surat_keterangan_sehat2'], 'file', 'skipOnEmpty' => FALSE, 'extensions' => 'pdf'],
			[['ktp2'], 'file', 'skipOnEmpty' => FALSE, 'extensions' => 'pdf'],
			[['kk2'], 'file', 'skipOnEmpty' => FALSE, 'extensions' => 'pdf'],
			[['ijazah_transkrip_nilai2'], 'file', 'skipOnEmpty' => FALSE, 'extensions' => 'pdf'],
			[['skck2'], 'file', 'skipOnEmpty' => FALSE, 'extensions' => 'pdf'],
			[['foto2'], 'file', 'skipOnEmpty' => FALSE, 'extensions' => 'jpg,jpeg,png'],
			
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
			
            'surat_keterangan_sehat2' => 'Surat Keterangan Sehat',
            'ktp2' => 'KTP',
            'kk2' => 'KK',
            'ijazah_transkrip_nilai2' => 'Ijazah Transkrip Nilai',
            'skck2' => 'SKCK',
            'foto2' => 'Foto',
        ];
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
