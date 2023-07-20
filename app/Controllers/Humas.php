<?php

namespace App\Controllers;

class Humas extends BaseController
{
    public function index()
    {
        return view('admin/humas/viewdata_kegiatan');
    }

    public function getdata_kegiatan()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdatakegiatan' => $this->humas->findAll()
            ];

            $msg = [
                'data' => view('admin/humas/data_kegiatan', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah_kegiatan()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/humas/add_kegiatan')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function save_kegiatan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kegiatan' => [
                    'label' => 'Nama Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenis_kegiatan' => [
                    'label' => 'Jenis Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat_kegiatan' => [
                    'label' => 'Tempat Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_kegiatan' => [
                    'label' => 'Tanggal Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kegiatan'       => $validation->getError('nama_kegiatan'),
                        'jenis_kegiatan'    => $validation->getError('jenis_kegiatan'),
                        'tanggal_kegiatan' => $validation->getError('tanggal_kegiatan'),
                        'tempat_kegiatan' => $validation->getError('tempat_kegiatan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_kegiatan'        => $this->request->getVar('nama_kegiatan'),
                    'jenis_kegiatan'     => $this->request->getVar('jenis_kegiatan'),
                    'tanggal_kegiatan'  => $this->request->getVar('tanggal_kegiatan'),
                    'tempat_kegiatan'  => $this->request->getVar('tempat_kegiatan'),
                ];

                $this->humas->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit_kegiatan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_kegiatan');

            $row = $this->humas->find($id);

            $data = [
                'id_kegiatan'          => $row['id_kegiatan'],
                'nama_kegiatan'        => $row['nama_kegiatan'],
                'jenis_kegiatan'       => $row['jenis_kegiatan'],
                'tempat_kegiatan'       => $row['tempat_kegiatan'],
                'tanggal_kegiatan'     => $row['tanggal_kegiatan'],
            ];
            $msg = [
                'sukses' => view('admin/humas/edit_kegiatan', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update_kegiatan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kegiatan' => [
                    'label' => 'Nama Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jenis_kegiatan' => [
                    'label' => 'Jenis Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat_kegiatan' => [
                    'label' => 'Tempat Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_kegiatan' => [
                    'label' => 'Tanggal Kegiatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kegiatan'       => $validation->getError('nama_kegiatan'),
                        'jenis_kegiatan'    => $validation->getError('jenis_kegiatan'),
                        'tempat_kegiatan'    => $validation->getError('tempat_kegiatan'),
                        'tanggal_kegiatan' => $validation->getError('tanggal_kegiatan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_kegiatan'     => $this->request->getVar('nama_kegiatan'),
                    'jenis_kegiatan'    => $this->request->getVar('jenis_kegiatan'),
                    'tempat_kegiatan'    => $this->request->getVar('tempat_kegiatan'),
                    'tanggal_kegiatan'  => $this->request->getVar('tanggal_kegiatan'),
                ];

                $id  = $this->request->getVar('id_kegiatan');

                $this->humas->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus_kegiatan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_kegiatan');

            $this->humas->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}