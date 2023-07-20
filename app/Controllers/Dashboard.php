<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {

        $data = [
            'datapengurus'  => $this->dashboard->datapengurus(),
            'dataanggota'   => $this->dashboard->dataanggota(),
            'dataalumni'    => $this->dashboard->dataalumni(),
            'dipecat'       => $this->dashboard->dipecat(),
            'eser'          => $this->_user_model->ketua(),
        ];

        return view('admin/dashboard/index', $data);
    }
}