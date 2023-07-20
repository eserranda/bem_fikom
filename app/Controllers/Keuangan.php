<?php

namespace App\Controllers;

class Keuangan extends BaseController
{
    public function pemasukan_keuangan()
    {
        return view('admin/keuangan/viewdata_pemasukan');
    }
    public function basar_bulanan()
    {
        return view('admin/keuangan/viewdata_basar');
    }

    public function getdata_basar()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'pemasukan_basar' => $this->basar->findAll()
            ];

            $msg = [
                'data' => view('admin/keuangan/data_basar', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }
    public function getdata_pemasukan()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'pemasukan_keuangan' => $this->pemasukan_keuangan->findAll()
            ];

            $msg = [
                'data' => view('admin/keuangan/data_pemasukan', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah_pemasukan()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/keuangan/add_pemasukan')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }
    public function formtambah_basar()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/keuangan/add_basar')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function save_pemasukan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'sumber_pemasukan' => [
                    'label' => 'Sumber Dana',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan_pemasukan' => [
                    'label' => 'Keterangan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah_pemasukan' => [
                    'label' => 'Jumlah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_pemasukan' => [
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
                        'sumber_pemasukan'       => $validation->getError('sumber_pemasukan'),
                        'keterangan_pemasukan'    => $validation->getError('keterangan_pemasukan'),
                        'tanggal_pemasukan' => $validation->getError('tanggal_pemasukan'),
                        'jumlah_pemasukan' => $validation->getError('jumlah_pemasukan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'sumber_pemasukan'        => $this->request->getVar('sumber_pemasukan'),
                    'keterangan_pemasukan'     => $this->request->getVar('keterangan_pemasukan'),
                    'tanggal_pemasukan'  => $this->request->getVar('tanggal_pemasukan'),
                    'jumlah_pemasukan'  => $this->request->getVar('jumlah_pemasukan'),
                ];

                $this->pemasukan_keuangan->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function save_basar()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'jenis_basar' => [
                    'label' => 'Sumber Dana',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat_basar' => [
                    'label' => 'Keterangan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'pendapatan_basar' => [
                    'label' => 'Jumlah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_basar' => [
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
                        'jenis_basar'       => $validation->getError('jenis_basar'),
                        'tempat_basar'    => $validation->getError('tempat_basar'),
                        'tanggal_basar' => $validation->getError('tanggal_basar'),
                        'pendapatan_basar' => $validation->getError('pendapatan_basar'),
                    ]
                ];
            } else {
                $saveitems = [
                    'jenis_basar'        => $this->request->getVar('jenis_basar'),
                    'tempat_basar'     => $this->request->getVar('tempat_basar'),
                    'tanggal_basar'  => $this->request->getVar('tanggal_basar'),
                    'pendapatan_basar'  => $this->request->getVar('pendapatan_basar'),
                ];

                $this->basar->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit_basar()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_basar');

            $row = $this->basar->find($id);

            $data = [
                'id_basar'          => $row['id_basar'],
                'jenis_basar'       => $row['jenis_basar'],
                'tanggal_basar'     => $row['tanggal_basar'],
                'tempat_basar'      => $row['tempat_basar'],
                'pendapatan_basar'  => $row['pendapatan_basar'],
            ];
            $msg = [
                'sukses' => view('admin/keuangan/edit_basar', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function edit_pemasukan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_pemasukan');

            $row = $this->pemasukan_keuangan->find($id);

            $data = [
                'id_pemasukan'          => $row['id_pemasukan'],
                'sumber_pemasukan'        => $row['sumber_pemasukan'],
                'keterangan_pemasukan'       => $row['keterangan_pemasukan'],
                'jumlah_pemasukan'       => $row['jumlah_pemasukan'],
                'tanggal_pemasukan'     => $row['tanggal_pemasukan'],
            ];
            $msg = [
                'sukses' => view('admin/keuangan/edit_pemasukan', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update_basar()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'jenis_basar' => [
                    'label' => 'Jenis Basar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat_basar' => [
                    'label' => 'Tempat Basar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'pendapatan_basar' => [
                    'label' => 'Pendapatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_basar' => [
                    'label' => 'Tanggal basar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_basar'       => $validation->getError('jenis_basar'),
                        'tempat_basar'    => $validation->getError('tempat_basar'),
                        'tanggal_basar' => $validation->getError('tanggal_basar'),
                        'pendapatan_basar' => $validation->getError('pendapatan_basar'),
                    ]
                ];
            } else {
                $saveitems = [
                    'jenis_basar'        => $this->request->getVar('jenis_basar'),
                    'tempat_basar'     => $this->request->getVar('tempat_basar'),
                    'tanggal_basar'  => $this->request->getVar('tanggal_basar'),
                    'pendapatan_basar'  => $this->request->getVar('pendapatan_basar'),
                ];

                $id  = $this->request->getVar('id_basar');

                $this->basar->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_pemasukan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'sumber_pemasukan' => [
                    'label' => 'Sumber Dana',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan_pemasukan' => [
                    'label' => 'Keterangan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah_pemasukan' => [
                    'label' => 'Jumlah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_pemasukan' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'sumber_pemasukan'     => $validation->getError('sumber_pemasukan'),
                        'keterangan_pemasukan' => $validation->getError('keterangan_pemasukan'),
                        'jumlah_pemasukan'     => $validation->getError('jumlah_pemasukan'),
                        'tanggal_pemasukan'    => $validation->getError('tanggal_pemasukan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'sumber_pemasukan'     => $this->request->getVar('sumber_pemasukan'),
                    'keterangan_pemasukan' => $this->request->getVar('keterangan_pemasukan'),
                    'jumlah_pemasukan'     => $this->request->getVar('jumlah_pemasukan'),
                    'tanggal_pemasukan'    => $this->request->getVar('tanggal_pemasukan'),
                ];

                $id  = $this->request->getVar('id_pemasukan');

                $this->pemasukan_keuangan->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus_pemasukan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_pemasukan');

            $this->pemasukan_keuangan->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function hapus_basar()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_basar');

            $this->basar->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}