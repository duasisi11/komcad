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
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
       return [
            [['no_registrasi', 'nik_komcad'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['jenis_kelamin', 'alamat', 'matra'], 'string'],
            [['tinggi_badan', 'berat_badan', 'jml_saudara_kandung', 'anak_ke', 'dari_berapa_bersaudara', 'ipk_nilai_un'], 'integer'],
            [['no_registrasi', 'nik_komcad', 'nama_lengkap', 'kodam', 'kodim'], 'string', 'max' => 50],
            [['tempat_lahir'], 'string', 'max' => 60],
            [['agama', 'suku', 'kode_pos', 'nomer_telepon'], 'string', 'max' => 30],
            [['kewarganegaraan'], 'string', 'max' => 40],
            [['kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'domisili'], 'string', 'max' => 100],
            [['pendidikan_terakhir', 'nama_perguruan_tinggi_sekolah', 'status_perguruan_tinggi_sekolah', 'program_studi_jurusan', 'akreditasi'], 'string', 'max' => 80],
            [['no_registrasi'], 'unique'],
        ];
    }

     /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
       return [
            'no_registrasi' => 'No Registrasi',
            'nik_komcad' => 'Nik Komcad',
            'nama_lengkap' => 'Nama Lengkap',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'agama' => 'Agama',
            'suku' => 'Suku',
            'kewarganegaraan' => 'Kewarganegaraan',
            'tinggi_badan' => 'Tinggi Badan',
            'berat_badan' => 'Berat Badan',
            'alamat' => 'Alamat',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kabupaten' => 'Kabupaten',
            'provinsi' => 'Provinsi',
            'domisili' => 'Domisili',
            'kode_pos' => 'Kode Pos',
            'nomer_telepon' => 'Nomer Telepon',
            'jml_saudara_kandung' => 'Jml Saudara Kandung',
            'anak_ke' => 'Anak Ke',
            'dari_berapa_bersaudara' => 'Dari Berapa Bersaudara',
            'kodam' => 'Kodam',
            'kodim' => 'Kodim',
            'matra' => 'Matra',
            'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'nama_perguruan_tinggi_sekolah' => 'Nama Perguruan Tinggi Sekolah',
            'status_perguruan_tinggi_sekolah' => 'Status Perguruan Tinggi Sekolah',
            'program_studi_jurusan' => 'Program Studi Jurusan',
            'akreditasi' => 'Akreditasi',
            'ipk_nilai_un' => 'Ipk Nilai Un',
        ];
    }

    
  
    public function generateEmailVerificationToken()
    {
        return $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function daftar()
    {   
       
        $regkomcad = new RegistrasiKomcad();
		
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$regkomcad->no_register = "REG-".time();
			$this->redirect(['detail_registrasi', 'id' => $model->no_registrasi]);
			
            return $regkomcad->save();  
		}

	}
}
