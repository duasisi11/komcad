<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

use app\models\DataPribadi;
use app\models\Orangtua;
use app\models\WilayahMatra;
use app\models\Pendidikan;
use app\models\Lampiran;

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
	 
	 public $surat_keterangan_sehat;
	 public $ktp;
	 public $kk;
	 public $ijazah_transkrip_nilai;
	 public $skck;
	 public $foto;
 
	 //public $verifyCode;
	 
 
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
       return [
            [['nik'], 'required'],
            [['nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'suku', 'kewarganegaraan', 'tinggi_badan',
			'berat_badan', 'alamat', 'kelurahan_desa', 'kecamatan','kabupaten', 'provinsi', 'domisili','kode_pos', 'nomer_telepon',
			'jumlah_saudara_kandung', 'anak_ke_berapa', 'dari_jumlah_bersaudara'], 'safe'],
            [['jenis_kelamin', 'alamat'], 'string'],
            [['tinggi_badan', 'berat_badan', 'jumlah_saudara_kandung', 'anak_ke_berapa', 'dari_jumlah_bersaudara'], 'integer'],
            [['nama_lengkap', 'nik', 'suku', 'kewarganegaraan'], 'string', 'max' => 50],
            [['tempat_lahir'], 'string', 'max' => 60],
            [['agama', 'kode_pos', 'nomer_telepon'], 'string', 'max' => 30],
            [['kelurahan_desa', 'kecamatan', 'kabupaten', 'provinsi', 'domisili'], 'string', 'max' => 100],


			[['nik_ayah', 'nik_ibu'], 'required'],
            [['nama_ayah','pekerjaan_ayah', 'tempat_lahir_ayah','tanggal_lahir_ayah', 'alamat_ayah', 'nomor_telepon_ayah',
			  'nama_ibu','pekerjaan_ibu', 'tempat_lahir_ibu', 'tanggal_lahir_ibu', 'alamat_ibu', 'nomor_telepon_ibu'], 'safe'],
            [['alamat_ayah','alamat_ibu'], 'string'],
            [['nama_ayah', 'nik_ayah', 'pekerjaan_ayah', 'tempat_lahir_ayah', 'nik_ibu', 'nomor_telepon_ibu', 'no_registrasi'], 'string', 'max' => 50],
            [['nomor_telepon_ayah'], 'string', 'max' => 20],
            [['nama_ibu', 'pekerjaan_ibu'], 'string', 'max' => 30],
            
			
			[['kodam','kodim', 'matra'], 'safe'],
			[['matra'], 'string'],
            [['kodam', 'kodim'], 'string', 'max' => 100],
			
			[['pendidikan_terakhir','nama_perguruan_tinggi_sekolah', 'status_perguruan_tinggi_sekolah','program_studi_jurusan', 'akreditasi', 'ipk_nilai_un'], 'safe'],
			[['ipk_nilai_un'], 'number'],
            [['pendidikan_terakhir', 'nama_perguruan_tinggi_sekolah', 'status_perguruan_tinggi_sekolah', 'program_studi_jurusan', 'akreditasi'], 'string', 'max' => 80],
			
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
			
			'nama_ayah' => 'Nama Ayah',
            'nik_ayah' => 'NIK Ayah',
            'pekerjaan_ayah' => 'Pekerjaan Ayah',
            'tempat_lahir_ayah' => 'Tempat Lahir Ayah',
            'tanggal_lahir_ayah' => 'Tanggal Lahir Ayah',
            'alamat_ayah' => 'Alamat Ayah',
            'nomor_telepon_ayah' => 'Nomor Telepon Ayah',
            'nama_ibu' => 'Nama Ibu',
            'nik_ibu' => 'NIK Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'tempat_lahir_ibu' => 'Tempat Lahir Ibu',
            'tanggal_lahir_ibu' => 'Tanggal Lahir Ibu',
            'alamat_ibu' => 'Alamat Ibu',
            'nomor_telepon_ibu' => 'Nomor Telepon Ibu',
			
			'kodam' => 'Kodam',
            'kodim' => 'Kodim',
            'matra' => 'Matra',
			
			'pendidikan_terakhir' => 'Pendidikan Terakhir',
            'nama_perguruan_tinggi_sekolah' => 'Nama Perguruan Tinggi Sekolah',
            'status_perguruan_tinggi_sekolah' => 'Status Perguruan Tinggi/Sekolah',
            'program_studi_jurusan' => 'Program Studi/Jurusan',
            'akreditasi' => 'Akreditasi',
            'ipk_nilai_un' => 'IPK/Nilai UN',
			
			'surat_keterangan_sehat' => 'Surat Keterangan Sehat',
            'ktp' => 'KTP',
            'kk' => 'Kartu Keluarga (KK)',
            'ijazah_transkrip_nilai' => 'Ijazah dan Transkrip Nilai',
            'skck' => 'SKCK',
            'foto' => 'Foto Ukuran 4x6 Berwarna (Background Biru)',
        ];
    }

    
  
    public function generateEmailVerificationToken()
    {
        return $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function daftar()
    {   
		//validasi inputan
		if (!$this->validate()) {
            //because null == false 
            return null;
        }else{
			$no_registrasi = "REG-".time();
			
			$datapribadi = new DataPribadi();
				//var_dump($this->nama_lengkap);exit;
				//var_dump($datapribadi->errors);exit;
				$datapribadi->no_registrasi=$no_registrasi;
				
				$datapribadi->nama_lengkap=$this->nama_lengkap;
				$datapribadi->nik=$this->nik;
				$datapribadi->tempat_lahir=$this->tempat_lahir;
				$datapribadi->tanggal_lahir=$this->tanggal_lahir;
				$datapribadi->jenis_kelamin=$this->jenis_kelamin;
				$datapribadi->agama=$this->agama;
				$datapribadi->suku=$this->suku;
				$datapribadi->kewarganegaraan=$this->kewarganegaraan;
				$datapribadi->tinggi_badan=$this->tinggi_badan;
				$datapribadi->berat_badan=$this->berat_badan;
				$datapribadi->alamat=$this->alamat;
				$datapribadi->kelurahan_desa=$this->kelurahan_desa;
				$datapribadi->kecamatan=$this->kecamatan;
				$datapribadi->kabupaten=$this->kabupaten;
				$datapribadi->provinsi=$this->provinsi;
				$datapribadi->domisili=$this->domisili;
				$datapribadi->kode_pos=$this->kode_pos;
				$datapribadi->nomer_telepon=$this->nomer_telepon;
				$datapribadi->jumlah_saudara_kandung=$this->jumlah_saudara_kandung;
				$datapribadi->anak_ke_berapa=$this->anak_ke_berapa;
				$datapribadi->dari_jumlah_bersaudara=$this->dari_jumlah_bersaudara;
			$datapribadi->save();  
			
			$orangtua = new Orangtua();
			//var_dump($orangtua->errors);exit;
				$orangtua->nama_ayah=$this->nama_ayah;
				$orangtua->nik_ayah=$this->nik_ayah;
				$orangtua->pekerjaan_ayah=$this->pekerjaan_ayah;
				$orangtua->tempat_lahir_ayah=$this->tempat_lahir_ayah;
				$orangtua->tanggal_lahir_ayah=$this->tanggal_lahir_ayah;
				$orangtua->alamat_ayah=$this->alamat_ayah;
				$orangtua->nomor_telepon_ayah=$this->nomor_telepon_ayah;
				$orangtua->nama_ibu=$this->nama_ibu;
				$orangtua->nik_ibu=$this->nik_ibu;
				$orangtua->pekerjaan_ibu=$this->pekerjaan_ibu;
				$orangtua->tempat_lahir_ibu=$this->tempat_lahir_ibu;
				$orangtua->tanggal_lahir_ibu=$this->tanggal_lahir_ibu;
				$orangtua->alamat_ibu=$this->alamat_ibu;
				$orangtua->nomor_telepon_ibu=$this->nomor_telepon_ibu;
				
				$orangtua->no_registrasi=$no_registrasi;
			$orangtua->save();  
			
			$wilayahmatra = new WilayahMatra();
				$wilayahmatra->kodam=$this->kodam;
				$wilayahmatra->kodim=$this->kodim;
				$wilayahmatra->matra=$this->matra;
			 
				$wilayahmatra->no_registrasi=$no_registrasi;
			$wilayahmatra->save(); 
			
			$pendidikan = new Pendidikan();
				$pendidikan->pendidikan_terakhir=$this->pendidikan_terakhir;
				$pendidikan->nama_perguruan_tinggi_sekolah=$this->nama_perguruan_tinggi_sekolah;
				$pendidikan->status_perguruan_tinggi_sekolah=$this->status_perguruan_tinggi_sekolah;
				$pendidikan->program_studi_jurusan=$this->program_studi_jurusan;
				$pendidikan->akreditasi=$this->akreditasi;
				$pendidikan->ipk_nilai_un=$this->ipk_nilai_un;
			 
				$pendidikan->no_registrasi=$no_registrasi;
			$pendidikan->save(); 
			
			$lampiran = new Lampiran();
				$lampiran->surat_keterangan_sehat=$this->surat_keterangan_sehat;
				$lampiran->ktp=$this->ktp;
				$lampiran->kk=$this->kk;
				$lampiran->ijazah_transkrip_nilai=$this->ijazah_transkrip_nilai;
				$lampiran->skck=$this->skck;
				$lampiran->foto=$this->foto;
			 
				$lampiran->no_registrasi=$no_registrasi;
			$lampiran->save(); 
		
			return true;
		}

	}
}
