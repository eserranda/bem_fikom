<?php

namespace App\Controllers;

class InventarisWorkshop extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Inventaris Workshop',
            'pagetitle' => 'Inventaris Workshop',
        ];
        return view('admin/inventaris/viewinventaris_workshop', $data);
    }

    public function getdatainventaris_workshop()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Data Inventarsi Workshop',
                'resultdataworkshop' => $this->workshop->findAll()
            ];

            $msg = [
                'data' => view('admin/inventaris/data_inventaris_workshop', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/inventaris/add_workshop')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function savedataworkshop()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'jenis' => [
                    'label' => 'Jenis Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah' => [
                    'label' => 'Jumlah Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                // 'kondisi' => [
                //     'label' => 'Kondisi Barang',
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong',
                //     ]
                // ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis'        => $validation->getError('jenis'),
                        'nama'         => $validation->getError('nama'),
                        'jumlah'       => $validation->getError('jumlah'),
                        // 'kondisi'      => $validation->getError('kondisi'),
                    ]
                ];
            } else {
                $saveitems = [
                    'jenis_barang'      => $this->request->getVar('jenis'),
                    'nama_barang'       => $this->request->getVar('nama'),
                    'jumlah_barang'     => $this->request->getVar('jumlah'),
                    'barang_rusak'      => $this->request->getVar('rusak'),
                    'kondisi_baru'      => $this->request->getVar('baru'),
                    'kondisi_lama'      => $this->request->getVar('lama'),
                    'status'            => $this->request->getVar('status_barang'),
                ];

                $this->workshop->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_workshop');

            $row = $this->workshop->find($id);

            $data = [
                'id_workshop'       => $row['id_workshop'],
                'jenis_barang'      => $row['jenis_barang'],
                'nama_barang'       => $row['nama_barang'],
                'jumlah_barang'     => $row['jumlah_barang'],
                'barang_rusak'      => $row['barang_rusak'],
                'kondisi_baru'      => $row['kondisi_baru'],
                'kondisi_lama'      => $row['kondisi_lama'],
                'status'            => $row['status'],
            ];
            $msg = [
                'sukses' => view('admin/inventaris/edit_workshop', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'jenis' => [
                    'label' => 'Jenis Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah' => [
                    'label' => 'Jumlah Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis'        => $validation->getError('jenis'),
                        'nama'         => $validation->getError('nama'),
                        'jumlah'       => $validation->getError('jumlah'),
                    ]
                ];
            } else {
                $saveitems = [
                    'jenis_barang'      => $this->request->getVar('jenis'),
                    'nama_barang'       => $this->request->getVar('nama'),
                    'jumlah_barang'     => $this->request->getVar('jumlah'),
                    'barang_rusak'      => $this->request->getVar('rusak'),
                    'kondisi_baru'      => $this->request->getVar('baru'),
                    'kondisi_lama'      => $this->request->getVar('lama'),
                    'status'            => $this->request->getVar('status_barang'),
                ];

                $id = $this->request->getVar('id_workshop');

                $this->workshop->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data berhasil diupdate'
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

            $id = $this->request->getVar('id_workshop');

            $this->workshop->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}