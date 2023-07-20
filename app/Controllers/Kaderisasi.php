<?php

namespace App\Controllers;

class Kaderisasi extends BaseController
{
    public function index()
    {
        return view('admin/kaderisasi/viewdata_kegiatan');
    }

    public function anggota()
    {
        return view('admin/kaderisasi/viewdata_anggota');
    }

    public function addanggota()
    {
        $data = [
            'nama_angkatan' => $this->nama_angkatan->findAll()
        ];

        return view('admin/kaderisasi/add_anggota', $data);
    }

    public function getdata_anggota()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'resultdataanggota' => $this->anggota->findAll()
            ];
            $msg = [
                'data' => view('admin/kaderisasi/data_anggota', $data)
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
                'resultdatakegiatan' => $this->kegiatan_kaderisasi->findAll()
            ];

            $msg = [
                'data' => view('admin/kaderisasi/data_kegiatan', $data)
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
                'data' => view('admin/kaderisasi/add_kegiatan')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function save_anggota()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'stambuk' => [
                    'label' => 'Stambuk',
                    'rules' => 'required|is_unique[data_alumni.stambuk_alumni]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada!'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'gender' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'namaangkatan' => [
                    'label' => 'Nama angkatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih!',
                    ]
                ],
                'status_anggota' => [
                    'label' => 'Status Keanggotaan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus dipilih!',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'stambuk'        => $validation->getError('stambuk'),
                        'nama'           => $validation->getError('nama'),
                        'gender'         => $validation->getError('gender'),
                        'namaangkatan'   => $validation->getError('namaangkatan'),
                        'status_anggota'         => $validation->getError('status_anggota'),
                    ]
                ];
            } else {
                $saveitems = [
                    'stambuk_anggota'       => $this->request->getVar('stambuk'),
                    'nama_anggota'          => $this->request->getVar('nama'),
                    'gender'                => $this->request->getVar('gender'),
                    // 'email_anggota'         => $this->request->getVar('email'),
                    'nama_angkatan_anggota' => $this->request->getVar('namaangkatan'),
                    // 'nomor_hp_anggota'      => $this->request->getVar('nomorhp'),
                    'status'                => $this->request->getVar('status_anggota'),
                    'keterangan_anggota'    => $this->request->getVar('keterangan'),
                ];

                $this->anggota->insert($saveitems);
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
                        'tempat_kegiatan'    => $validation->getError('tempat_kegiatan'),
                        'tanggal_kegiatan' => $validation->getError('tanggal_kegiatan'),
                    ]
                ];
            } else {
                $saveitems = [
                    'nama_kegiatan'        => $this->request->getVar('nama_kegiatan'),
                    'jenis_kegiatan'     => $this->request->getVar('jenis_kegiatan'),
                    'tempat_kegiatan'     => $this->request->getVar('tempat_kegiatan'),
                    'tanggal_kegiatan'  => $this->request->getVar('tanggal_kegiatan'),
                ];

                $this->kegiatan_kaderisasi->insert($saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function edit_anggota()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_anggota');

            $row = $this->anggota->find($id);

            $data = [
                'id_anggota'            => $row['id_anggota'],
                'stambuk_anggota'       => $row['stambuk_anggota'],
                'nama_anggota'          => $row['nama_anggota'],
                'gender'                => $row['gender'],
                'email_anggota'         => $row['email_anggota'],
                'nama_angkatan_anggota' => $row['nama_angkatan_anggota'],
                'nomor_hp_anggota'      => $row['nomor_hp_anggota'],
                'status'                => $row['status'],
                'keterangan'            => $row['keterangan_anggota'],
                'nama_angkatan'         => $this->dashboard->findAll()
            ];
            $msg = [
                'sukses' => view('admin/kaderisasi/edit_anggota', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function edit_kegiatan()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_kegiatan');

            $row = $this->kegiatan_kaderisasi->find($id);

            $data = [
                'id_kegiatan'          => $row['id_kegiatan'],
                'nama_kegiatan'        => $row['nama_kegiatan'],
                'jenis_kegiatan'     => $row['jenis_kegiatan'],
                'tempat_kegiatan'     => $row['tempat_kegiatan'],
                'tanggal_kegiatan'  => $row['tanggal_kegiatan'],
            ];
            $msg = [
                'sukses' => view('admin/kaderisasi/edit_kegiatan', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update_anggota()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'stambuk' => [
                    'label' => 'Stambuk',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada!'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'gender' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'namaangkatan' => [
                    'label' => 'Nama angkatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'status_anggota' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Pilih salah satu!',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'stambuk'        => $validation->getError('stambuk'),
                        'nama'           => $validation->getError('nama'),
                        'gender'         => $validation->getError('gender'),
                        'namaangkatan'   => $validation->getError('namaangkatan'),
                        'status_anggota'         => $validation->getError('status_anggota'),
                    ]
                ];
            } else {
                $saveitems = [
                    'stambuk_anggota'       => $this->request->getVar('stambuk'),
                    'nama_anggota'          => $this->request->getVar('nama'),
                    'gender'                => $this->request->getVar('gender'),
                    'email_anggota'         => $this->request->getVar('email'),
                    'nama_angkatan_anggota' => $this->request->getVar('namaangkatan'),
                    'nomor_hp_anggota'      => $this->request->getVar('nomorhp'),
                    'status'                => $this->request->getVar('status_anggota'),
                    'keterangan_anggota'    => $this->request->getVar('keterangan')
                ];
                $id = $this->request->getVar('id_anggota');

                $this->anggota->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data berhasil diupdate'
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
                ];
                $id  = $this->request->getVar('id_kegiatan');
                $this->kegiatan_kaderisasi->update($id, $saveitems);
                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function hapus_anggota()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_anggota');

            $this->anggota->delete($id);

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

            $this->kegiatan_kaderisasi->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function detail_anggota()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_anggota');

            $row = $this->anggota->find($id);

            $data = [
                'id_anggota'            => $row['id_anggota'],
                'stambuk_anggota'       => $row['stambuk_anggota'],
                'nama_anggota'          => $row['nama_anggota'],
                'gender'                => $row['gender'],
                'email_anggota'         => $row['email_anggota'],
                'nama_angkatan_anggota' => $row['nama_angkatan_anggota'],
                'nomor_hp_anggota'      => $row['nomor_hp_anggota'],
                'status'                => $row['status'],
                'alamat'                => $row['alamat'],
                'tiktok'                => $row['tiktok'],
                'instagram'             => $row['instagram'],
                'keterangan_anggota'    => $row['keterangan_anggota'],
            ];
            $msg = [
                'sukses' => view('admin/kaderisasi/profile_anggota', $data)
            ];
            echo json_encode($msg);
        }
    }
}