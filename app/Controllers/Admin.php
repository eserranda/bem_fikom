<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Data Pengurus',
            'pagetitle' => 'Data Pengurus',
        ];

        return view('admin/viewdatapengurus', $data);
    }
}