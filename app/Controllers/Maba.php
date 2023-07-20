<?php

namespace App\Controllers;

class Maba extends BaseController
{
    public function index()
    {
        return view('admin/maba/viewdatamaba');
    }

    public function getdatamaba()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdatamaba' => $this->maba->findAll()
            ];

            $msg = [
                'data' => view('admin/maba/data_maba', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function detail()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_maba');

            $row = $this->maba->find($id);

            $data = [
                'id_maba'               => $row['id_maba'],
                'stambuk_maba'          => $row['stambuk_maba'],
                'nama_maba'             => $row['nama_maba'],
                'nama_panggilan_maba'   => $row['nama_panggilan_maba'],
                'agama'                 => $row['agama'],
                'tempat_lahir_maba'     => $row['tempat_lahir_maba'],
                'tanggal_lahir_maba'    => $row['tanggal_lahir_maba'],
                'tahun_tamat'           => $row['tahun_tamat'],
                'gender'                => $row['gender'],
                'alamat_asal'           => $row['alamat_asal'],
                'asal_sekolah'          => $row['asal_sekolah'],
                'jurusan'               => $row['jurusan'],
                'hobby'                 => $row['hobby'],
                'nama_ayah'             => $row['nama_ayah'],
                'nama_ibu'              => $row['nama_ibu'],
                'email_maba'            => $row['email_maba'],
                'nomor_hp_maba'         => $row['nomor_hp_maba'],
                'alamat'                => $row['alamat'],
                'pengalaman_organisasi' => $row['pengalaman_organisasi'],
                'instagram'             => $row['instagram'],
                'tiktok'                => $row['tiktok'],
                'facebook'              => $row['facebook'],
                'alasan'                => $row['alasan'],
                'foto'                  => $row['foto'],
            ];
            $msg = [
                'sukses' => view('admin/maba/profile_maba', $data)
            ];
            echo json_encode($msg);
        }
    }
}