<?php

namespace App\Controllers;

class Pengurus extends BaseController
{
    public function index()
    {

        return view('admin/pengurus/viewdatapengurus');
    }

    public function view_foto()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_pengurus');

            $row = $this->datapengurus->find($id);

            $data = [
                'foto' => $row['foto'],
            ];

            $msg = [
                'sukses' => view('admin/pengurus/setting', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function getdatapengurus()
    {
        if ($this->request->isAJAX()) {
            // $data['ketua'] = $ketua->getResult();

            $ketua              = $this->_user_model->ketua();
            $bendahara          = $this->_user_model->bendahara();
            $sekretaris         = $this->_user_model->sekretaris();
            $koor_keseks        = $this->_user_model->koor_keseks();
            $koor_humas         = $this->_user_model->koor_humas();
            $koor_kader         = $this->_user_model->koor_kader();
            $koor_keilmuan      = $this->_user_model->koor_keilmuan();
            $koor_kerohanian    = $this->_user_model->koor_kerohanian();
            $koor_keuangan      = $this->_user_model->koor_keuangan();

            $anggota_keseks     = $this->_user_model->anggota_keseks();
            $anggota_kader      = $this->_user_model->anggota_kader();
            $anggota_humas      = $this->_user_model->anggota_humas();
            $anggota_keilmuan   = $this->_user_model->anggota_keilmuan();
            $anggota_kerohanian = $this->_user_model->anggota_kerohanian();
            $anggota_keuangan   = $this->_user_model->anggota_keuangan();


            $data = [
                'ketua'              => $ketua->getResult(),
                'bendahara'          => $bendahara->getResult(),
                'sekretaris'         => $sekretaris->getResult(),
                'koor_keseks'        => $koor_keseks->getResult(),
                'koor_kader'         => $koor_kader->getResult(),
                'koor_humas'         => $koor_humas->getResult(),
                'koor_keilmuan'      => $koor_keilmuan->getResult(),
                'koor_kerohanian'    => $koor_kerohanian->getResult(),
                'koor_keuangan'      => $koor_keuangan->getResult(),

                'anggota_keseks'     => $anggota_keseks->getResult(),
                'anggota_kader'      => $anggota_kader->getResult(),
                'anggota_humas'      => $anggota_humas->getResult(),
                'anggota_keilmuan'   => $anggota_keilmuan->getResult(),
                'anggota_kerohanian' => $anggota_kerohanian->getResult(),
                'anggota_keuangan'   => $anggota_keuangan->getResult(),
            ];

            $msg = [
                'data' => view('admin/pengurus/data_pengurus', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('error404');
        }
    }

    public function formtambah_pengurus()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/pengurus/add_pengurus')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function profile_pengurus()
    {
        return view('admin/pengurus/profile');
    }


    public function ajaxSearch()
    {
        if ($this->request->isAJAX()) {

            $cari = $this->request->getGet('search');

            $anggota = $this->db->table('anggota_bem')->like('stambuk_anggota', $cari)->get();

            if ($anggota->getNumRows() > 0) {
                $list = [];
                $key = 0;

                foreach ($anggota->getResultArray() as $row) :
                    $list[$key]['id'] = $row['stambuk_anggota'];
                    $list[$key]['text'] = $row['stambuk_anggota'];
                    $key++;
                endforeach;
                echo json_encode($list);
            }
        }
    }

    public function getName()
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getVar('username');

            $anggota = $this->db->table('anggota_bem')->where('stambuk_anggota', $username)->get();

            $isidata = "";

            foreach ($anggota->getResultArray() as $row) :
                $isidata = $row['nama_anggota'];
            endforeach;

            $msg = [
                'data' => $isidata
            ];
            echo json_encode($msg);
        }
    }

    public function detail_pengurus()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $row = $this->_user_model->find($id);

            $data = [
                'id'             => $row['id'],
                'username'       => $row['username'],
                'nickname'       => $row['nickname'],
                'fullname'          => $row['fullname'],
                'gender'                => $row['gender'],
                'phone_number'                => $row['phone_number'],
                'email'           => $row['email'],
                'nama_angkatan'   => $row['nama_angkatan'],
                'jabatan'         => $row['jabatan'],
                'quote'                 => $row['quote'],
                'tiktok'                => $row['tiktok'],
                'facebook'                => $row['facebook'],
                'instagram'             => $row['instagram'],
                'tempat_lahir'             => $row['tempat_lahir'],
                'tanggal_lahir'             => $row['tanggal_lahir'],
                'tahun_masuk'             => $row['tahun_masuk'],
                'address'             => $row['address'],
                'user_image'    => $row['user_image'],
            ];
            $msg = [
                'sukses' => view('admin/pengurus/detail_pengurus', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function foto()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $row = $this->_user_model->find($id);

            $data = [
                'user_image'    => $row['user_image'],
            ];
            $msg = [
                'sukses' => view('admin/pengurus/foto', $data)
            ];
            echo json_encode($msg);
        }
    }
}