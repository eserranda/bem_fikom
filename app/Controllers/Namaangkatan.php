<?php

namespace App\Controllers;

class NamaAngkatan extends BaseController
{
    public function index()
    {
        return view('admin/namaangkatan/viewdataangkatan');
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'angkatan' => $this->nama_angkatan->findAll()
            ];

            $msg = [
                'data' => view('admin/namaangkatan/data_angkatan', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah_angkatan()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/namaangkatan/add')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function save_namaangkatan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'tahun' => [
                    'label' => 'Tahun',
                    'rules' => 'required|is_unique[nama_angkatan.tahun]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada!'
                    ]
                ],
                'nama_angkatan' => [
                    'label' => 'Nama angkatan',
                    'rules' => 'required|is_unique[nama_angkatan.nama]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada!'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'tahun'        => $validation->getError('tahun'),
                        'nama_angkatan'           => $validation->getError('nama_angkatan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama'           => $this->request->getVar('nama_angkatan'),
                    'tahun'          => $this->request->getVar('tahun'),
                ];

                $this->nama_angkatan->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_namaangkatan');

            $this->nama_angkatan->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}