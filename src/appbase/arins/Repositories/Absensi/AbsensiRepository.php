<?php

namespace Arins\Repositories\Absensi;

use Arins\Repositories\BaseRepository;
use Arins\Repositories\Absensi\AbsensiRepositoryInterface;

class AbsensiRepository extends BaseRepository implements AbsensiRepositoryInterface
{
    public function __construct($parData)
    {
        parent::__construct($parData);

        $this->inputField = [
            //code array here...
            'idabsen' => null,
            'badgeno' => null,
            'tgl' => null,
            'daytype' => null,
            'masuk' => null,
            'keluar' => null,
            'work' => null,
            'overtime' => null,
            'leavetype' => null,
            'remark' => null,
        ];

        $this->validateField = [
            //code array here...
            'badgeno' => 'required',
            'tgl' => 'required',
        ];

    }

}