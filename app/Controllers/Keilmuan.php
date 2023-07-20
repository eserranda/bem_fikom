<?php

namespace App\Controllers;

use App\Models\ModelDanaKreatifKeilmuan;

class Keilmuan extends BaseController
{


    public function inventaris()
    {
        return view('admin/keilmuan/viewdata_inventarisworkshop');
    }

    public function arsip_keilmuan()
    {
        return view('admin/keilmuan/viewdata_arsip');
    }

    public function kegiatan()
    {
        return view('admin/keilmuan/viewdata_kegiatan');
    }
    public function dana_kreatif()
    {
        return view('admin/keilmuan/viewdata_danakreatif');
    }

    public function getdata_inventaris()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Data Inventarsi Workshop',
                'resultdataworkshop' => $this->workshop->findAll()
            ];

            $msg = [
                'data' => view('admin/keilmuan/data_inventaris', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function getdataarsip()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdataarsip' => $this->arsip_workshop->findAll()
            ];

            $msg = [
                'data' => view('admin/keilmuan/data_arsip', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function getdata_danakreatif()

    {
        if ($this->request->isAJAX()) {

            $result = $this->danakreatif_keilmuan->where('keterangan_danakeratif', 'Lunas')->select('sum(pendapatan_danakreatif) as totalpendapatan')->first();
            // $hutang = $this->danakreatif_keilmuan->where('keterangan_danakeratif', 'Hutang')->select('sum(pendapatan_danakreatif) as totalpendapatan')->first();

            $data = [
                'resultdanakreatif' => $this->danakreatif_keilmuan->findAll(),
                'total'  => $result['totalpendapatan'],
                // 'hutang' => $hutang['totalpendapatan'],
            ];

            $msg = [
                'data' => view('admin/keilmuan/data_danakreatif', $data)
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
                'resultdatakegiatan' => $this->kegiatan_keilmuan->findAll()
            ];

            $msg = [
                'data' => view('admin/keilmuan/data_kegiatan', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah_inventaris()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/keilmuan/add_inventaris')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah_arsip()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/keilmuan/add_arsip')
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
                'data' => view('admin/keilmuan/add_kegiatan')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah_danakreatif()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/keilmuan/add_danakreatif')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function save_inventaris()
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

    public function save_arsip()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_arsip' => [
                    'label' => 'Nama Arsip',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kondisi_arsip' => [
                    'label' => 'Kondisi Arsip',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan_arsip' => [
                    'label' => 'Keterangan Arsip',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_arsip'       => $validation->getError('nama_arsip'),
                        'kondisi_arsip'    => $validation->getError('kondisi_arsip'),
                        'keterangan_arsip' => $validation->getError('keterangan_arsip'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_arsip'        => $this->request->getVar('nama_arsip'),
                    'kondisi_arsip'     => $this->request->getVar('kondisi_arsip'),
                    'keterangan_arsip'  => $this->request->getVar('keterangan_arsip'),
                ];

                $this->arsip_workshop->insert($saveitems);
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
                    'tanggal_selesai'  => $this->request->getVar('tanggal_selesai'),
                ];

                $this->kegiatan_keilmuan->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save_danakreatif()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_pencariandana' => [
                    'label' => 'Pencarian Dana',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_cs' => [
                    'label' => 'Nama Customers',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'total_bayar' => [
                    'label' => 'Total Bayar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan' => [
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
                        'nama_cs'             => $validation->getError('nama_cs'),
                        'nama_pencariandana'  => $validation->getError('nama_pencariandana'),
                        'tanggal'             => $validation->getError('tanggal'),
                        'total_bayar'         => $validation->getError('total_bayar'),
                        'keterangan'          => $validation->getError('keterangan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_danakreatif'       => $this->request->getVar('nama_pencariandana'),
                    'nama_cs'                => $this->request->getVar('nama_cs'),
                    'tanggal_danakreatif'    => $this->request->getVar('tanggal'),
                    'pendapatan_danakreatif' => $this->request->getVar('total_bayar'),
                    'keterangan_danakeratif' => $this->request->getVar('keterangan'),
                ];

                $this->danakreatif_keilmuan->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit_inventaris()
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
                'sukses' => view('admin/keilmuan/edit_inventaris', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function edit_arsip()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_arsip');

            $row = $this->arsip_workshop->find($id);

            $data = [
                'id_arsip'          => $row['id_arsip'],
                'nama_arsip'        => $row['nama_arsip'],
                'kondisi_arsip'     => $row['kondisi_arsip'],
                'keterangan_arsip'  => $row['keterangan_arsip'],
            ];
            $msg = [
                'sukses' => view('admin/keilmuan/edit_arsip', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function edit_danakreatif()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_danakreatif');

            $row = $this->danakreatif_keilmuan->find($id);

            $data = [
                'id_danakreatif'         => $row['id_danakreatif'],
                'nama_danakreatif'       => $row['nama_danakreatif'],
                'nama_cs'                => $row['nama_cs'],
                'tanggal_danakreatif'    => $row['tanggal_danakreatif'],
                'pendapatan_danakreatif' => $row['pendapatan_danakreatif'],
                'keterangan_danakeratif' => $row['keterangan_danakeratif'],
            ];
            $msg = [
                'sukses' => view('admin/keilmuan/edit_danakreatif', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function edit_kegiatan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_kegiatan');

            $row = $this->kegiatan_keilmuan->find($id);

            $data = [
                'id_kegiatan'          => $row['id_kegiatan'],
                'nama_kegiatan'        => $row['nama_kegiatan'],
                'jenis_kegiatan'       => $row['jenis_kegiatan'],
                'tempat_kegiatan'       => $row['tempat_kegiatan'],
                'tanggal_kegiatan'     => $row['tanggal_kegiatan'],
                'tanggal_selesai'     => $row['tanggal_selesai'],
            ];
            $msg = [
                'sukses' => view('admin/keilmuan/edit_kegiatan', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update_inventaris()
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

    public function update_arsip()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_arsip' => [
                    'label' => 'Nama Arsip',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kondisi_arsip' => [
                    'label' => 'Kondisi Arsip',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan_arsip' => [
                    'label' => 'Keterangan Arsip',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_arsip'       => $validation->getError('nama_arsip'),
                        'kondisi_arsip'    => $validation->getError('kondisi_arsip'),
                        'keterangan_arsip' => $validation->getError('keterangan_arsip'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_arsip'        => $this->request->getVar('nama_arsip'),
                    'kondisi_arsip'     => $this->request->getVar('kondisi_arsip'),
                    'keterangan_arsip'  => $this->request->getVar('keterangan_arsip'),
                ];

                $id = $this->request->getVar('id_arsip');

                $this->arsip_workshop->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update_danakreatif()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_pencariandana' => [
                    'label' => 'Pencarian Dana',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_cs' => [
                    'label' => 'Nama Customers',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'total_bayar' => [
                    'label' => 'Total Bayar',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan' => [
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
                        'nama_cs'             => $validation->getError('nama_cs'),
                        'nama_pencariandana'  => $validation->getError('nama_pencariandana'),
                        'tanggal'             => $validation->getError('tanggal'),
                        'total_bayar'         => $validation->getError('total_bayar'),
                        'keterangan'          => $validation->getError('keterangan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_danakreatif'       => $this->request->getVar('nama_pencariandana'),
                    'nama_cs'                => $this->request->getVar('nama_cs'),
                    'tanggal_danakreatif'    => $this->request->getVar('tanggal'),
                    'pendapatan_danakreatif' => $this->request->getVar('total_bayar'),
                    'keterangan_danakeratif' => $this->request->getVar('keterangan'),
                ];

                $id = $this->request->getVar('id_danakreatif');

                $this->danakreatif_keilmuan->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
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
                    'tanggal_selesai'  => $this->request->getVar('tanggal_selesai'),
                ];
                $id  = $this->request->getVar('id_kegiatan');

                $this->kegiatan_keilmuan->update($id, $saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus_inventaris()
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

    public function hapus_arsip()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_arsip');

            $this->arsip_workshop->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus_danakreatif()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_danakreatif');

            $this->danakreatif_keilmuan->delete($id);

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

            $this->kegiatan_keilmuan->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}