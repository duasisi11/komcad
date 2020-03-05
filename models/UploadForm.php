<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Lampiran;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
	
	public $surat_keterangan_sehat;
	public $ktp;
	public $kk;
	public $ijazah_transkrip_nilai;
	public $skck;
	public $foto;

    public function rules()
    {
        return [
			[['surat_keterangan_sehat'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['ktp'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['kk'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['ijazah_transkrip_nilai'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['skck'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
			[['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg,jpeg,png'],
        ];
    }
	
	public function attributeLabels()
    {
        return [
            'surat_keterangan_sehat' => 'Surat Keterangan Sehat',
            'ktp' => 'Ktp',
            'kk' => 'Kk',
            'ijazah_transkrip_nilai' => 'Ijazah Transkrip Nilai',
            'skck' => 'Skck',
            'foto' => 'Foto',
        ];
    }
    

    public function upload_doc($no_registrasi)
    {
		$lampiran = new Lampiran();
		
        if(!$this->validate()){
			return null;
        }else{
			$this->surat_keterangan_sehat->saveAs('uploads/dokumen/1SUKETSHT/' . $no_registrasi.'_SUKETSHT.' . $this->surat_keterangan_sehat->extension);
			$this->ktp->saveAs('uploads/dokumen/2KTP/' . $no_registrasi.'_KTP.' . $this->ktp->extension);
			$this->kk->saveAs('uploads/dokumen/3KK/' . $no_registrasi.'_KK.' . $this->kk->extension);
			$this->ijazah_transkrip_nilai->saveAs('uploads/dokumen/4IJAZAH/' . $no_registrasi.'_IJAZAH.' . $this->ijazah_transkrip_nilai->extension);
			$this->skck->saveAs('uploads/dokumen/5SKCK/' . $no_registrasi.'_SKCK.' . $this->skck->extension);
			$this->foto->saveAs('uploads/dokumen/6FOTO/' . $no_registrasi.'_FOTO.' . $this->foto->extension);
			
				$lampiran->surat_keterangan_sehat=$no_registrasi.'_SUKETSHT.' . $this->surat_keterangan_sehat->extension;
				$lampiran->ktp=$no_registrasi.'_KTP.' . $this->ktp->extension;
				$lampiran->kk=$no_registrasi.'_KK.' . $this->kk->extension;
				$lampiran->ijazah_transkrip_nilai=$no_registrasi.'_IJAZAH.' . $this->ijazah_transkrip_nilai->extension;
				$lampiran->skck=$no_registrasi.'_SKCK.' . $this->skck->extension;
				$lampiran->foto=$no_registrasi.'_FOTO.' . $this->foto->extension;
				
				$lampiran->no_registrasi=$no_registrasi;
			
				$lampiran->save(); 
				
			return true;
        }
    }
}