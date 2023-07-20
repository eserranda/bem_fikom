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

            $ketua = $this->_user_model->ketua();
            $bendahara = $this->_user_model->bendahara();
            $data['ketua'] = $ketua->getResult();
            $data['bendahara'] = $bendahara->getResult();

            // return view('admin/pengurus/tes', $data);

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

    public function test()
    {
        $ketua = $this->_user_model->ketua();
        $bendahara = $this->_user_model->bendahara();
        $data['ketua'] = $ketua->getResult();
        $data['bendahara'] = $bendahara->getResult();
        // foreach ($data->getResult() as $key => $row) {
        //     echo ($key + 1) . '.';
        //     echo $row->fullname;
        //     echo '-';
        //     echo $row->jabatan;
        //     echo '<br>';
        // }
        // return view('admin/dashboard/tes', $data);
        return view('admin/pengurus/tes', $data);
    }
}