<?php

namespace App\Controllers;

class Kerohanian extends BaseController
{
    public function ibadah_bulanan()
    {
        return view('admin/kerohanian/viewdata_ibadah');
    }

    public function kegiatan()
    {
        return view('admin/kerohanian/viewdata_kegiatan');
    }

    public function diakonia()
    {
        return view('admin/kerohanian/viewdata_diakonia');
    }

    public function getdataibadah()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdataibadah' => $this->ibadah_bulanan->findAll()
            ];

            $msg = [
                'data' => view('admin/kerohanian/data_ibadah', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function getdatadiakonia()
    {
        if ($this->request->isAJAX()) {
            $result = $this->diakonia->select('sum(pengeluaran_kunjungan) as totalpengeluaran')->first();

            $data = [
                'resultdatadiakonia' => $this->diakonia->findAll(),
                'total'              => $result['totalpengeluaran'],
            ];

            $msg = [
                'data' => view('admin/kerohanian/data_diakonia', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function getdata_kegiatan()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdatakegiatan' => $this->kegiatan_kerohanian->findAll()
            ];

            $msg = [
                'data' => view('admin/kerohanian/data_kegiatan', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }


    public function formtambah_diakonia()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/kerohanian/add_diakonia')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }
    public function formtambah_ibadah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/kerohanian/add_ibadah')
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
                'data' => view('admin/kerohanian/add_kegiatan')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function save_ibadah()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat' => [
                    'label' => 'Tempat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'tanggal'   => $validation->getError('tanggal'),
                        'tempat'    => $validation->getError('tempat'),
                    ]
                ];
            } else {
                $saveitems = [
                    'tanggal_ibadah'        => $this->request->getVar('tanggal'),
                    'tempat_ibadah'         => $this->request->getVar('tempat'),

                ];

                $this->ibadah_bulanan->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function save_diakonia()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kunjungan' => [
                    'label' => 'Kunjungan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_kunjungan' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat_kunjungan' => [
                    'label' => 'Tempat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'pengeluaran_kunjungan' => [
                    'label' => 'Pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan_kunjungan' => [
                    'label' => 'Keterangan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kunjungan'   => $validation->getError('nama_kunjungan'),
                        'tanggal_kunjungan'    => $validation->getError('tanggal_kunjungan'),
                        'tempat_kunjungan'    => $validation->getError('tempat_kunjungan'),
                        'pengeluaran_kunjungan'    => $validation->getError('pengeluaran_kunjungan'),
                        'keterangan_kunjungan'    => $validation->getError('keterangan_kunjungan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_kunjungan'        => $this->request->getVar('nama_kunjungan'),
                    'tanggal_kunjungan'         => $this->request->getVar('tanggal_kunjungan'),
                    'tempat_kunjungan'         => $this->request->getVar('tempat_kunjungan'),
                    'pengeluaran_kunjungan'         => $this->request->getVar('pengeluaran_kunjungan'),
                    'keterangan_kunjungan'         => $this->request->getVar('keterangan_kunjungan'),

                ];

                $this->diakonia->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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
                'pengeluaran_kegiatan' => [
                    'label' => 'Pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                // 'pemasukan_kegiatan' => [
                //     'label' => 'Pemasukan',
                //     'rules' => 'required',
                //     'errors' => [
                //         'required' => '{field} tidak boleh kosong',
                //     ]
                // ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kegiatan'    => $validation->getError('nama_kegiatan'),
                        'tempat_kegiatan'    => $validation->getError('tempat_kegiatan'),
                        'tanggal_kegiatan'   => $validation->getError('tanggal_kegiatan'),
                        'pengeluaran_kegiatan' => $validation->getError('pengeluaran_kegiatan'),
                        // 'pemasukan_kegiatan'  => $validation->getError('pemasukan_kegiatan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_kegiatan'          => $this->request->getVar('nama_kegiatan'),
                    'tempat_kegiatan'        => $this->request->getVar('tempat_kegiatan'),
                    'tanggal_kegiatan'       => $this->request->getVar('tanggal_kegiatan'),
                    'pengeluaran_kegiatan'   => $this->request->getVar('pengeluaran_kegiatan'),
                    'pemasukan_kegiatan'     => $this->request->getVar('pemasukan_kegiatan'),
                ];

                $this->kegiatan_kerohanian->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_diakonia()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_kunjungan' => [
                    'label' => 'Kunjungan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_kunjungan' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat_kunjungan' => [
                    'label' => 'Tempat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'pengeluaran_kunjungan' => [
                    'label' => 'Pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan_kunjungan' => [
                    'label' => 'Keterangan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kunjungan'   => $validation->getError('nama_kunjungan'),
                        'tanggal_kunjungan'    => $validation->getError('tanggal_kunjungan'),
                        'tempat_kunjungan'    => $validation->getError('tempat_kunjungan'),
                        'pengeluaran_kunjungan'    => $validation->getError('pengeluaran_kunjungan'),
                        'keterangan_kunjungan'    => $validation->getError('keterangan_kunjungan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_kunjungan'        => $this->request->getVar('nama_kunjungan'),
                    'tanggal_kunjungan'         => $this->request->getVar('tanggal_kunjungan'),
                    'tempat_kunjungan'         => $this->request->getVar('tempat_kunjungan'),
                    'pengeluaran_kunjungan'         => $this->request->getVar('pengeluaran_kunjungan'),
                    'keterangan_kunjungan'         => $this->request->getVar('keterangan_kunjungan'),

                ];

                $id = $this->request->getVar('id_diakonia');

                $this->diakonia->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di Update'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_ibadah()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat' => [
                    'label' => 'Tempat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'tanggal'   => $validation->getError('tanggal'),
                        'tempat'    => $validation->getError('tempat'),
                    ]
                ];
            } else {
                $saveitems = [
                    'tanggal_ibadah'        => $this->request->getVar('tanggal'),
                    'tempat_ibadah'         => $this->request->getVar('tempat'),
                ];

                $id = $this->request->getVar('id_ibadah');

                $this->ibadah_bulanan->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di Update'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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
                'pengeluaran_kegiatan' => [
                    'label' => 'Pengeluaran',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'pemasukan_kegiatan' => [
                    'label' => 'Pemasukan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_kegiatan'        => $validation->getError('nama_kegiatan'),
                        'tempat_kegiatan'      => $validation->getError('tempat_kegiatan'),
                        'tanggal_kegiatan'     => $validation->getError('tanggal_kegiatan'),
                        'pengeluaran_kegiatan' => $validation->getError('pengeluaran_kegiatan'),
                        'pemasukan_kegiatan'   => $validation->getError('pemasukan_kegiatan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_kegiatan'         => $this->request->getVar('nama_kegiatan'),
                    'tempat_kegiatan'       => $this->request->getVar('tempat_kegiatan'),
                    'tanggal_kegiatan'      => $this->request->getVar('tanggal_kegiatan'),
                    'pengeluaran_kegiatan'  => $this->request->getVar('pengeluaran_kegiatan'),
                    'pemasukan_kegiatan'    => $this->request->getVar('pemasukan_kegiatan'),
                ];
                $id  = $this->request->getVar('id_kegiatan');

                $this->kegiatan_kerohanian->update($id, $saveitems);

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

            $row = $this->kegiatan_kerohanian->find($id);

            $data = [
                'id_kegiatan'          => $row['id_kegiatan'],
                'nama_kegiatan'        => $row['nama_kegiatan'],
                'tempat_kegiatan'      => $row['tempat_kegiatan'],
                'tanggal_kegiatan'     => $row['tanggal_kegiatan'],
                'pengeluaran_kegiatan' => $row['pengeluaran_kegiatan'],
                'pemasukan_kegiatan'   => $row['pemasukan_kegiatan'],
            ];
            $msg = [
                'sukses' => view('admin/kerohanian/edit_kegiatan', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function edit_diakonia()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_diakonia');

            $row = $this->diakonia->find($id);

            $data = [
                'id_diakonia'           => $row['id_diakonia'],
                'nama_kunjungan'        => $row['nama_kunjungan'],
                'tanggal_kunjungan'     => $row['tanggal_kunjungan'],
                'tempat_kunjungan'      => $row['tempat_kunjungan'],
                'pengeluaran_kunjungan' => $row['pengeluaran_kunjungan'],
                'keterangan_kunjungan'  => $row['keterangan_kunjungan'],
            ];

            $msg = [
                'sukses' => view('admin/kerohanian/edit_diakonia', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function edit_ibadah()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_ibadah');

            $row = $this->ibadah_bulanan->find($id);

            $data = [
                'id_ibadah'         => $row['id_ibadah'],
                'tanggal_ibadah'    => $row['tanggal_ibadah'],
                'tempat_ibadah'     => $row['tempat_ibadah'],
            ];

            $msg = [
                'sukses' => view('admin/kerohanian/edit_ibadah', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function hapus_ibadah()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_ibadah');

            $this->ibadah_bulanan->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function hapus_diakonia()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_diakonia');

            $this->diakonia->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus_kegiatan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_kegiatan');

            $this->kegiatan_kerohanian->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}