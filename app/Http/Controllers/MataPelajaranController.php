<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataPelajaran;
use App\GuruMapel;

class MataPelajaranController extends Controller
{
    public function __construct()
    {
        $this->relationship = ['jenjang'];
    }

    public function getMapel()
    {
        return MataPelajaran::with($this->relationship)->get();
    }

    public function getMapelById($id)
    {
        return MataPelajaran::with($this->relationship)->find($id);
    }

    public function getMapelByIdJenjang($id)
    {
        return MataPelajaran::with($this->relationship)
            ->where([
                'id_jenjang' => $id
            ])
            ->get();
    }

    public function getMapelperJenjang(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = MataPelajaran::where([
            'id_jenjang' => $value
        ])->get();

        $output = '<option value="" selected>Pilih Mata Pelajaran</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id_mapel . '">' . $row->nama_mapel . '</option>';
        }
        echo $output;
    }

    public function getMapelByIdGuru($id)
    {
        $guruMapel = GuruMapel::where([
            'id_guru' => $id
        ])->get();

        $idMapels = [];

        foreach ($guruMapel as $i) {
            array_push($idMapels, $i->id_mapel);
        }

        return MataPelajaran::with($this->relationship)
            ->whereIn('id_mapel', $idMapels)
            ->get();
    }
}
