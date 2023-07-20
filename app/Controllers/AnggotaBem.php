<?php

namespace App\Controllers;

class AnggotaBem extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Anggota BEM_FIKOM',
            'pagetitle' => 'Data Anggota Bem',
        ];

        return view('admin/anggota/viewdataanggota', $data);
    }

    public function getdataanggota()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Data Alumni',
                'resultdataanggota' => $this->anggota->findAll()
            ];

            $msg = [
                'data' => view('admin/anggota/data_anggota', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function formtambah()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'hasil' => $this->dashboard->findAll()
            ];

            $msg = [
                'data' => view('admin/anggota/add', $data),

            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function savedataanggota()
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
                    'email_anggota'         => $this->request->getVar('email'),
                    'nama_angkatan_anggota' => $this->request->getVar('namaangkatan'),
                    'nomor_hp_anggota'      => $this->request->getVar('nomorhp'),
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

    public function edit()
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
                'sukses' => view('admin/anggota/edit', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function update()
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

    public function hapus()
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

    public function detail()
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
                'sukses' => view('admin/anggota/profile_anggota', $data)
            ];
            echo json_encode($msg);
        }
    }
}