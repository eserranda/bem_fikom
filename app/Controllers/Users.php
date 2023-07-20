<?php

namespace App\Controllers;

use PhpParser\Node\Expr\AssignOp\Div;

class Users extends BaseController
{
    public function index()
    {
        return view('admin/users/viewdata_users');
    }
    public function list_user()
    {
        return view('admin/users/viewdata_users');
    }

    public function edit_data()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $row = $this->_user_model->find($id);

            $data = [
                'id'             => $row['id'],
                'fullname'       => $row['fullname'],
                'jabatan'        => $row['jabatan'],
                'username'       => $row['username'],
            ];
            $msg = [
                'sukses' => view('admin/users/edit_data_users', $data)
            ];
            echo json_encode($msg);
        }
    }

    public function hapus_users()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $this->_user_model->delete($id);

            $msg = [
                'sukses' => 'Data Berhasil dihapus'
            ];
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function update_data_users()
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

                'jabatan' => [
                    'label' => 'Jabatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
            ]);
            if (!$valid) {
                $msg = [
                    'error' => [
                        'fullname'       => $validation->getError('fullname'),
                        'jabatan'        => $validation->getError('jabatan'),

                    ]
                ];
            } else {
                $saveitems = [
                    'fullname'     => $this->request->getVar('fullname'),
                    'jabatan'      => $this->request->getVar('jabatan'),

                ];

                $id  = $this->request->getVar('id');

                $this->_user_model->update($id, $saveitems);

                $msg = [
                    'sukses' => 'Data Berhasil di simpan'
                ];
            }
            echo json_encode($msg);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function getdatausers()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'datausers' => $this->_user_model->findAll()
            ];

            $msg = [
                'data' => view('admin/users/data_users', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }

    public function profile_users()
    {
        return view('admin/users/profile');
    }

    public function ajaxSearch()
    {
        if ($this->request->isAJAX()) {

            $cari = $this->request->getGet('search');

            $anggota = $this->db->table('anggota_bem')->like('stambuk_anggota', $cari)->get();

            if ($anggota->getNumRows() > 0) {
                $list = [];
                $key = 0;

                foreach ($anggota->getResultArray() as $row) :
                    $list[$key]['id'] = $row['stambuk_anggota'];
                    $list[$key]['text'] = $row['stambuk_anggota'];
                    $key++;
                endforeach;
                echo json_encode($list);
            }
        }
    }

    public function getName()
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getVar('username');

            $anggota = $this->db->table('anggota_bem')->where('stambuk_anggota', $username)->get();

            $isidata = "";

            foreach ($anggota->getResultArray() as $row) :
                $isidata = $row['nama_anggota'];
            // $isidata .= '<option value="' . $row['id_anggota'] . '">' . $row['nama_anggota'] . '</option>';
            // $isidata .= '<input disabled class="form-control" id="fullname" name="fullname"  value="' . $row['nama_anggota'] . '">';
            endforeach;

            $msg = [
                'data' => $isidata
            ];
            echo json_encode($msg);
        }
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
                'sukses' => view('admin/users/edit_profile', $data)
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
                    'rules' => 'uploaded[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]|is_image[foto]|max_size[foto,1048]',
                    'errors' => [
                        'uploaded' => 'Silahkan pilih {field} terlebih dahulu',
                        'max_size' => 'Melebihi Ukuran! Max ukuran file 1Mb',
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
                    // . '?' . date('d-m-Y')
                ];

                $this->_user_model->update($namagambar, $updatedata);

                $msg = [
                    'sukses' => 'Berhasil Diupload'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function update_users()
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

    // tessting edit profile

    public function setting()
    {
        return view('admin/users/setting');
    }

    // public function edit()
    // {
    //     if ($this->request->isAJAX()) {

    //         $id = $this->request->getVar('id');

    //         $row = $this->_user_model->find($id);

    //         $data = [
    //             'id'             =>  $row['id'],
    //             'fullname'       =>  $row['fullname'],
    //             'username'       =>  $row['username'],
    //             'nickname'       =>  $row['nickname'],
    //             'gender'         =>  $row['gender'],
    //             'email'          =>  $row['email'],
    //             'phone_number'   =>  $row['phone_number'],
    //             'nama_angkatan'  =>  $row['nama_angkatan'],
    //             'tahun_masuk'    =>  $row['tahun_masuk'],
    //             'address'        =>  $row['address'],
    //             'quote'          =>  $row['quote'],
    //             'tiktok'         =>  $row['tiktok'],
    //             'instagram'      =>  $row['instagram'],
    //             'facebook'       =>  $row['facebook'],
    //             'tempat_lahir'   =>  $row['tempat_lahir'],
    //             'tanggal_lahir'  =>  $row['tanggal_lahir'],
    //         ];

    //         $msg = [
    //             'sukses' => view('admin/users/edit_profilee', $data)
    //         ];
    //         echo json_encode($msg);
    //     } else {
    //         exit('Data Tidak dapat di proses');
    //     }
    // }
}