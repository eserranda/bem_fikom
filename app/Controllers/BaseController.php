<?php

namespace App\Controllers;

use App\Models\ModelDataPengurus;
use App\Models\ModelDataAlumni;
use App\Models\ModelDataAnggota;
use App\Models\ModelDataArsip;
use App\Models\ModelDataDashboard;
use App\Models\ModelInventarisBarang;
use App\Models\ModelInventarisWorkshop;
use App\Models\ModelDataMaba;
use App\Models\ModelPeminjamanBarang;
use App\Models\ModelPengadaanKesekretariatan;
use App\Models\ModelKegiatanHumas;
use App\Models\ModelKegiatanKaderisasi;
use App\Models\ModelArsipWorkshop;
use App\Models\ModelKegiatanKeilmuan;
use App\Models\ModelDanaKreatifKeilmuan;
use App\Models\ModelDataBasar;
use App\Models\ModelDataBendahara;
use App\Models\ModelIbadahBulanan;
use App\Models\ModelDiakonia;
use App\Models\ModelKegiatanKerohanian;
use App\Models\ModelPemasukanKeuangan;
use App\Models\ModelNamaAngkatan;
use App\Models\UsersModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */

    protected $helpers = ['form', 'url', 'auth',];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        $this->datapengurus         = new ModelDataPengurus();
        $this->alumni               = new ModelDataAlumni();
        $this->anggota              = new ModelDataAnggota();
        $this->dashboard            = new ModelDataDashboard();
        $this->inventaris           = new ModelInventarisBarang();
        $this->workshop             = new ModelInventarisWorkshop();
        $this->maba                 = new ModelDataMaba();
        $this->arsip                = new ModelDataArsip();
        $this->pengadaan_keseks     = new ModelPengadaanKesekretariatan();
        $this->peminjaman           = new ModelPeminjamanBarang();
        $this->humas                = new ModelKegiatanHumas();
        $this->kegiatan_kaderisasi  = new ModelKegiatanKaderisasi();
        $this->kegiatan_keilmuan    = new ModelKegiatanKeilmuan();
        $this->kegiatan_kerohanian  = new ModelKegiatanKerohanian();
        $this->arsip_workshop       = new ModelArsipWorkshop();
        $this->danakreatif_keilmuan = new ModelDanaKreatifKeilmuan();
        $this->ibadah_bulanan       = new ModelIbadahBulanan();
        $this->diakonia             = new ModelDiakonia();
        $this->pemasukan_keuangan   = new ModelPemasukanKeuangan();
        $this->basar                = new ModelDataBasar();
        $this->nama_angkatan        = new ModelNamaAngkatan();
        $this->_user_model          = new UsersModel();
        $this->bendahara            = new ModelDataBendahara();

        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
    }
}