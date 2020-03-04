<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use app\models\RegistrasiKomcad;

//SQL Command library
use  yii\db\Command;

/**
 * DaftarForm is the model behind the register form.
 */
class RegistrasiForm extends Model
{   
	 public $no_registrasi;
	 public $nama_lengkap;
	 public $nik;
	 public $tempat_lahir;
	 public $tanggal_lahir;
	 public $jenis_kelamin;
	 public $agama;
	 public $suku;
	 public $kewarganegaraan;
	 public $tinggi_badan;
	 public $berat_badan;
	 public $alamat;
	 public $kelurahan_desa;
	 public $kecamatan;
	 public $kabupaten;
	 public $provinsi;
	 public $domisili;
	 public $kode_pos;
	 public $nomer_telepon;
	 public $jumlah_saudara_kandung;
	 public $anak_ke_berapa;
	 public $dari_jumlah_bersaudara;
	 
	
	 public $nama_ayah;
	 public $nik_ayah;
	 public $pekerjaan_ayah;
	 public $tempat_lahir_ayah;
	 public $tanggal_lahir_ayah;
	 public $alamat_ayah;
	 public $nomor_telepon_ayah;
	 public $nama_ibu;
	 public $nik_ibu;
	 public $pekerjaan_ibu;
	 public $tempat_lahir_ibu;
	 public $tanggal_lahir_ibu;
	 public $alamat_ibu;
	 public $nomor_telepon_ibu;
	 
     public $kodam;
     public $kodim;
     public $matra;
	 
	 public $pendidikan_terakhir;
	 public $nama_perguruan_tinggi_sekolah;
     public $status_perguruan_tinggi_sekolah;
     public $program_studi_jurusan;
     public $akreditasi;
     public $ipk_nilai_un;

 
	 public $verifyCode;
	 
 
    /**
     * @return array the validation rules.
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
			
			['verifyCode', 'captcha','captchaAction'=>'site/captcha'], //action ke controllernya 
        ];
    }

     /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
       return [
            'no_registrasi' => 'No Registrasi',
            'nama_lengkap' => 'Nama Lengkap',
            'nik' => 'NIK',
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

    
  
    public function generateEmailVerificationToken()
    {
        return $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function daftar()
    {   
       
        $datapribadi = new DataPribadi();
		
		if ($datapribadi->load(Yii::$app->request->post())) {
			$datapribadi->no_register = "REG-".time();
			
            return $datapribadi->save();  
		}

	}
}
