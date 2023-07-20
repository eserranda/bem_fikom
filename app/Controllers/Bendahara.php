<?php

namespace App\Controllers;

class Bendahara extends BaseController
{
    public function index()
    {
        return view('admin/bendahara/viewdata_bendahara');
    }

    public function getdata()
    {
        if ($this->request->isAJAX()) {

            $data = [
                'bendahara' => $this->bendahara->findAll()
            ];

            $msg = [
                'data' => view('admin/bendahara/data', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Data Tidak dapat di proses');
        }
    }
}