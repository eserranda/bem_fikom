<?php

namespace App\Controllers;

class Alumni extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Alumni',
            'pagetitle' => 'Data Alumni',

        ];

        return view('admin/alumni/viewdataalumni', $data);
    }

    public function getdataalumni()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Data Alumni',
                'resultdataalumni' => $this->alumni->findAll()
            ];

            $msg = [
                'data' => view('admin/alumni/data_alumni', $data)
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
                'data' => view('admin/alumni/add')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function saveitems()
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
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'alumnitahun' => [
                    'label' => 'Alumni Tahun',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
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
                        'alumnitahun'    => $validation->getError('alumnitahun'),
                    ]
                ];
            } else {
                $saveitems = [
                    'stambuk_alumni' => $this->request->getVar('stambuk'),
                    'nama'           => $this->request->getVar('nama'),
                    'gender'         => $this->request->getVar('gender'),
                    'email'          => $this->request->getVar('email'),
                    'nama_angkatan'  => $this->request->getVar('namaangkatan'),
                    'alumni_tahun'   => $this->request->getVar('alumnitahun'),
                    'nomor_hp'       => $this->request->getVar('nomorhp'),
                ];

                $this->alumni->insert($saveitems);
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

            $id = $this->request->getVar('id_alumni');

            $row = $this->alumni->find($id);

            $data = [
                'id_alumni'      => $row['id_alumni'],
                'stambuk_alumni' => $row['stambuk_alumni'],
                'nama'           => $row['nama'],
                'gender'         => $row['gender'],
                'email'          => $row['email'],
                'nama_angkatan'  => $row['nama_angkatan'],
                'alumni_tahun'   => $row['alumni_tahun'],
                'nomor_hp'       => $row['nomor_hp'],
            ];
            $msg = [
                'sukses' => view('admin/alumni/editalumni', $data)
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
                'alumnitahun' => [
                    'label' => 'Alumni Tahun',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
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
                        'alumnitahun'    => $validation->getError('alumnitahun'),
                    ]
                ];
            } else {
                $saveitems = [
                    'stambuk_alumni' => $this->request->getVar('stambuk'),
                    'nama'           => $this->request->getVar('nama'),
                    'gender'         => $this->request->getVar('gender'),
                    'email'          => $this->request->getVar('email'),
                    'nama_angkatan'  => $this->request->getVar('namaangkatan'),
                    'alumni_tahun'   => $this->request->getVar('alumnitahun'),
                    'nomor_hp'       => $this->request->getVar('nomorhp'),
                ];
                $id = $this->request->getVar('id_alumni');
                $this->alumni->update($id, $saveitems);
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

            $id = $this->request->getVar('id_alumni');

            $this->alumni->delete($id);

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

            $id = $this->request->getVar('id_alumni');

            $row = $this->alumni->find($id);

            $data = [
                'id_alumni'      => $row['id_alumni'],
                'stambuk_alumni' => $row['stambuk_alumni'],
                'nama'           => $row['nama'],
                'gender'         => $row['gender'],
                'email'          => $row['email'],
                'nama_angkatan'  => $row['nama_angkatan'],
                'alumni_tahun'   => $row['alumni_tahun'],
                'nomor_hp'       => $row['nomor_hp'],
            ];
            $msg = [
                'sukses' => view('admin/alumni/profile_alumni', $data)
            ];
            echo json_encode($msg);
        }
    }
}