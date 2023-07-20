<?php

namespace App\Controllers;

class Pengurus extends BaseController
{
    public function index()
    {

        return view('admin/pengurus/viewdatapengurus');
    }

    public function view_foto()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id_pengurus');

            $row = $this->datapengurus->find($id);

            $data = [
                'foto'           => $row['foto'],
            ];

            $msg = [
                'sukses' => view('admin/pengurus/setting', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function getdatapengurus()
    {
        if ($this->request->isAJAX()) {

            $ketua = "Ketua";
            $bendahara = "bendahara";

            $ketua     = $this->datapengurus->ketua($ketua);
            $bendahara = $this->datapengurus->bendahara($bendahara);

            $data = [
                'ketua'      => $this->datapengurus->find($ketua),
                'bendahara'  => $this->datapengurus->find($bendahara),
            ];

            $msg = [
                'data' => view('admin/pengurus/data_pengurus', $data)
            ];

            echo json_encode($msg);
        } else {
            return view('error404');
        }
    }

    public function formtambah_pengurus()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('admin/pengurus/add_pengurus')
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function profile_pengurus()
    {
        return view('admin/pengurus/profile');
    }

    public function edit_profile()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $row = $this->_user_model->find($id);

            $data = [
                'id'             =>  $row['id'],
                'fullname'       =>  $row['fullname'],
                'username'       =>  $row['username'],
                'nickname'       =>  $row['nickname'],
                'gender'         =>  $row['gender'],
                'email'          =>  $row['email'],
                'phone_number'   =>  $row['phone_number'],
                'nama_angkatan'  =>  $row['nama_angkatan'],
                'tahun_masuk'    =>  $row['tahun_masuk'],
                'address'        =>  $row['address'],
                'quote'          =>  $row['quote'],
                'tiktok'         =>  $row['tiktok'],
                'instagram'      =>  $row['instagram'],
                'facebook'       =>  $row['facebook'],
                'tempat_lahir'   =>  $row['tempat_lahir'],
                'tanggal_lahir'  =>  $row['tanggal_lahir'],
            ];

            $msg = [
                'sukses' => view('admin/pengurus/setting', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function doupload()
    {
        if ($this->request->isAJAX()) {

            $namagambar = $this->request->getVar('user_image');

            $valid = $this->validate([
                'foto' => [
                    'label' => 'File',
                    'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]',
                    'errors' => [
                        'uploaded' => 'Silahkan pilih {field} terlebih dahulu',
                        'mime_in'  => 'File foto harus dalam bentuk jpg, png, jpeg',
                    ]
                ]
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'foto' => $this->validation->getError('foto')
                    ]
                ];
            } else {

                $cekdata = $this->_user_model->find($namagambar);

                $fotolama = $cekdata['user_image'];
                if ($fotolama != NULL || $fotolama != "") {
                    unlink($fotolama);
                }

                $filefoto = $this->request->getFile('foto');

                $filefoto->move('assets/images/user-img', $namagambar . '.' . $filefoto->getExtension());

                // $tes = $this->request->getVar('username');

                $updatedata = [
                    'user_image' => 'assets/images/user-img/' . $filefoto->getName()
                ];

                $this->_user_model->update($namagambar, $updatedata);

                $msg = [
                    'sukses' => 'Berhasil Diupload'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function update_pengurus()
    {
        if ($this->request->isAJAX()) {

            $validation = \Config\Services::validation();
            $valid = $this->validate([
                'fullname' => [
                    'label' => 'Nama Lengkap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nickname' => [
                    'label' => 'Nama Panggilan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'gender' => [
                    'label' => 'Gender',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'phone_number' => [
                    'label' => 'Nomor Hp/Whatsapp',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'nama_angkatan' => [
                    'label' => 'Harap',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} pilih salah satu',
                    ]
                ],
                'tahun_masuk' => [
                    'label' => 'Tahun Masuk',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'address' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tanggal_lahir' => [
                    'label' => 'Tanggal lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tempat_lahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'fullname'        => $validation->getError('fullname'),
                        'nickname'         => $validation->getError('nickname'),
                        'gender'        => $validation->getError('gender'),
                        'phone_number'        => $validation->getError('phone_number'),
                        'nama_angkatan'        => $validation->getError('nama_angkatan'),
                        'tahun_masuk'        => $validation->getError('tahun_masuk'),
                        'address'        => $validation->getError('address'),
                        'email'        => $validation->getError('email'),
                        'tanggal_lahir'        => $validation->getError('tanggal_lahir'),
                        'tempat_lahir'        => $validation->getError('tempat_lahir'),


                    ]
                ];
            } else {
                $saveitems = [
                    'fullname'        => $this->request->getVar('fullname'),
                    'nickname'        => $this->request->getVar('nickname'),
                    'gender'          => $this->request->getVar('gender'),
                    'phone_number'    => $this->request->getVar('phone_number'),
                    'nama_angkatan'   => $this->request->getVar('nama_angkatan'),
                    'tahun_masuk'     => $this->request->getVar('tahun_masuk'),
                    'address'         => $this->request->getVar('address'),
                    'email'           => $this->request->getVar('email'),
                    'quote'           => $this->request->getVar('quote'),
                    'tanggal_lahir'   => $this->request->getVar('tanggal_lahir'),
                    'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                    'instagram'    => $this->request->getVar('instagram'),
                    'tiktok'    => $this->request->getVar('tiktok'),
                    'facebook'    => $this->request->getVar('facebook'),
                ];

                $id = $this->request->getVar('id');

                $this->_user_model->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data berhasil diupdate'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}