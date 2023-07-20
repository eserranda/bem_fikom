<?php

namespace App\Controllers;

class InventarisBem extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Inventaris Bem',
            'pagetitle' => 'Inventaris BEM'

        ];
        return view('admin/inventaris/viewdatainventaris', $data);
    }

    public function getdatainventaris()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Data Inventarsi',
                'resultdatainventaris' => $this->inventaris->findAll()
            ];

            $msg = [
                'data' => view('admin/inventaris/data_inventaris', $data)
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
                'data' => view('admin/inventaris/add_inventaris')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function save()
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
                        'kondisi'      => $validation->getError('kondisi'),
                        // 'keterangan'   => $validation->getError('keterangan'),

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

                $this->inventaris->insert($saveitems);
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

            $id = $this->request->getVar('id_inventaris');

            $row = $this->inventaris->find($id);

            $data = [
                'id_inventaris'     => $row['id_inventaris'],
                'jenis_barang'      => $row['jenis_barang'],
                'nama_barang'       => $row['nama_barang'],
                'jumlah_barang'     => $row['jumlah_barang'],
                'barang_rusak'      => $row['barang_rusak'],
                'kondisi_baru'      => $row['kondisi_baru'],
                'kondisi_lama'      => $row['kondisi_lama'],
                'status'            => $row['status'],
            ];
            $msg = [
                'sukses' => view('admin/inventaris/edit_inventaris', $data)
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

                $id = $this->request->getVar('id_inventaris');

                $this->inventaris->update($id, $saveitems);

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

            $id = $this->request->getVar('id_inventaris');

            $this->inventaris->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}