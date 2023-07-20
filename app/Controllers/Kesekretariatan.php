<?php

namespace App\Controllers;

// use CodeIgniter\HTTP\IncomingRequest;

/**
//  * @property IncomingRequest $request
 */
class Kesekretariatan extends BaseController
{

    public function index()
    {
        return view('admin/kesekretariatan/viewdataarsip');
    }

    public function inventaris()
    {
        return view('admin/kesekretariatan/viewdata_inventaris');
    }

    public function peminjaman()
    {
        return view('admin/kesekretariatan/viewdata_peminjaman');
    }

    public function pengadaan()
    {
        return view('admin/kesekretariatan/viewdata_pengadaan');
    }

    public function getdata_inventaris()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdatainventaris' => $this->inventaris->findAll()
            ];

            $msg = [
                'data' => view('admin/kesekretariatan/data_inventaris', $data)
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
                'resultdataarsip' => $this->arsip->findAll()
            ];

            $msg = [
                'data' => view('admin/kesekretariatan/data_arsip', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function getdatapeminjaman()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdatapeminjaman' => $this->peminjaman->orderBy('tanggal_pengembalian', '')->findAll()
            ];

            $msg = [
                'data' => view('admin/kesekretariatan/data_peminjaman', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function getdatapengadaan()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdatapengadaan' => $this->pengadaan_keseks->findAll()
            ];

            $msg = [
                'data' => view('admin/kesekretariatan/data_pengadaan', $data)
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
                'data' => view('admin/kesekretariatan/add_inventaris')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah_peminjaman()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/kesekretariatan/add_peminjaman')
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
                'data' => view('admin/kesekretariatan/add_arsip')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah_pengadaan()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/kesekretariatan/add_pengadaan')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function save_peminjaman()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'nama_peminjam' => [
                    'label' => 'Nama Peminjam',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_barang' => [
                    'label' => 'Nama Barang',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_peminjaman' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jangka_waktu' => [
                    'label' => 'Jangka Waktu',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama_peminjam'       => $validation->getError('nama_peminjam'),
                        'nama_barang'         => $validation->getError('nama_barang'),
                        'tanggal_peminjaman'  => $validation->getError('tanggal_peminjaman'),
                        'jangka_waktu'        => $validation->getError('jangka_waktu'),
                        // 'keterangan'   => $validation->getError('keterangan'),

                    ]
                ];
            } else {
                $saveitems = [
                    'nama_peminjam'        => $this->request->getVar('nama_peminjam'),
                    'nama_barang'          => $this->request->getVar('nama_barang'),
                    'tanggal_peminjaman'   => $this->request->getVar('tanggal_peminjaman'),
                    'jangka_waktu'         => $this->request->getVar('jangka_waktu'),
                    'tanggal_pengembalian' => $this->request->getVar('tanggal_pengembalian'),
                    'keterangan'           => $this->request->getVar('keterangan'),
                ];

                $this->peminjaman->insert($saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
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

                $this->arsip->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function save_pengadaan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'jenis_pengadaan' => [
                    'label' => 'Jenis Pengadaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_pengadaan' => [
                    'label' => 'Nama Pengadaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah_pengadaan' => [
                    'label' => 'Jumlah Pengadaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_pengadaan' => [
                    'label' => 'Tanggal Pengadaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_pengadaan'   => $validation->getError('jenis_pengadaan'),
                        'nama_pengadaan'    => $validation->getError('nama_pengadaan'),
                        'jumlah_pengadaan'  => $validation->getError('jumlah_pengadaan'),
                        'tanggal_pengadaan' => $validation->getError('tanggal_pengadaan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'jenis'       => $this->request->getVar('jenis_pengadaan'),
                    'nama'        => $this->request->getVar('nama_pengadaan'),
                    'jumlah'      => $this->request->getVar('jumlah_pengadaan'),
                    'tanggal'     => $this->request->getVar('tanggal_pengadaan'),
                    'keterangan'  => $this->request->getVar('keterangan_pengadaan'),
                ];

                $this->pengadaan_keseks->insert($saveitems);
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
                'sukses' => view('admin/kesekretariatan/edit_inventaris', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function editpeminjaman()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_peminjaman');

            $row = $this->peminjaman->find($id);

            $data = [
                'id_peminjaman'        => $row['id_peminjaman'],
                'nama_peminjam'        => $row['nama_peminjam'],
                'nama_barang'          => $row['nama_barang'],
                'tanggal_peminjaman'   => $row['tanggal_peminjaman'],
                'jangka_waktu'         => $row['jangka_waktu'],
                'tanggal_pengembalian' => $row['tanggal_pengembalian'],
                'keterangan'           => $row['keterangan'],
            ];
            $msg = [
                'sukses' => view('admin/kesekretariatan/edit_peminjaman', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function edit_arsip()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_arsip');

            $row = $this->arsip->find($id);

            $data = [
                'id_arsip'        => $row['id_arsip'],
                'nama_arsip'        => $row['nama_arsip'],
                'kondisi_arsip'     => $row['kondisi_arsip'],
                'keterangan_arsip'  => $row['keterangan_arsip'],
            ];
            $msg = [
                'sukses' => view('admin/kesekretariatan/edit_arsip', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function edit_pengadaan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_pengadaan_keseks');

            $row = $this->pengadaan_keseks->find($id);

            $data = [
                'id_pengadaan_keseks' => $row['id_pengadaan_keseks'],
                'jenis'               => $row['jenis'],
                'nama'                => $row['nama'],
                'jumlah'              => $row['jumlah'],
                'tanggal'             => $row['tanggal'],
                'keterangan'          => $row['keterangan'],
            ];
            $msg = [
                'sukses' => view('admin/kesekretariatan/edit_pengadaan', $data)
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

    public function update_peminjam()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'tanggal_pengembalian' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'tanggal_pengembalian'  => $validation->getError('tanggal_pengembalian'),
                    ]
                ];
            } else {
                $saveitems = [
                    'tanggal_pengembalian'  => $this->request->getVar('tanggal_pengembalian'),
                    'keterangan'            => $this->request->getVar('keterangan'),
                ];

                $id = $this->request->getVar('id_peminjaman');

                $this->peminjaman->update($id, $saveitems);

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

                $this->arsip->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update_pengadaan()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'jenis_pengadaan' => [
                    'label' => 'Jenis Pengadaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_pengadaan' => [
                    'label' => 'Nama Pengadaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'jumlah_pengadaan' => [
                    'label' => 'Jumlah Pengadaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_pengadaan' => [
                    'label' => 'Tanggal Pengadaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'jenis_pengadaan'   => $validation->getError('jenis_pengadaan'),
                        'nama_pengadaan'    => $validation->getError('nama_pengadaan'),
                        'jumlah_pengadaan'  => $validation->getError('jumlah_pengadaan'),
                        'tanggal_pengadaan' => $validation->getError('tanggal_pengadaan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'jenis'       => $this->request->getVar('jenis_pengadaan'),
                    'nama'        => $this->request->getVar('nama_pengadaan'),
                    'jumlah'      => $this->request->getVar('jumlah_pengadaan'),
                    'tanggal'     => $this->request->getVar('tanggal_pengadaan'),
                    'keterangan'  => $this->request->getVar('keterangan'),
                ];
                $id = $this->request->getVar('id_pengadaan_keseks');

                $this->pengadaan_keseks->update($id, $saveitems);

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

    public function hapuspeminjam()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_peminjaman');

            $this->peminjaman->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus_pengadaan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_pengadaan_keseks');

            $this->pengadaan_keseks->delete($id);

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

            $this->arsip->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }


    public function ajaxSearch()
    {
        if ($this->request->isAJAX()) {

            $cari = $this->request->getGet('search');

            // $databarang = $this->inventaris->like('nama_barang', $cari)->get();
            $databarang = $this->db->table('inventaris_barang')->like('nama_barang', $cari)->get();

            if ($databarang->getNumRows() > 0) {

                $list = [];
                $key = 0;

                foreach ($databarang->getResultArray() as $row) :
                    $list[$key]['id'] = $row['nama_barang'];
                    $list[$key]['text'] = $row['nama_barang'];
                    $key++;
                endforeach;
                echo json_encode($list);
            }
        }
    }
}