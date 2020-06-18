<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use App\AbsenPembayaran;
use App\JadwalPengganti;
use App\JadwalPemesananPerminggu;
use Carbon\Carbon;
use DB;

class AbsenController extends Controller
{
    public function __construct()
    {
        $this->relationship = [
            'jadwalPemesananPerminggu',
            'jadwalPengganti',
            'pemesanan',
            'pemesanan.murid',
            'pemesanan.guru',
            'pemesanan.mataPelajaran',
            'pemesanan.mataPelajaran.jenjang'
        ];
        $this->datetimeFormat = "Y-M-d H:i:s";
        date_default_timezone_set('Asia/Jakarta');
    }

    /**
     * Menampilkan Data Absensi
     */
    public function index()
    {
        $absen = Absen::with($this->relationship)->get();
        // dd($absen);
        return view('admin.absensi', compact('absen'));
    }

    public function getAbsen()
    {
        return Absen::with($this->relationship)
            // ->join('jadwal_pemesanan_perminggu as jpp', 'jpp.id_jadwal_pemesanan_perminggu', 'absen.id_jadwal_pemesanan_perminggu')
            // ->join('pemesanan as p', 'p.id_pemesanan', 'jpp.id_pemesanan')
            // ->join('users as guru', 'p.id_guru', 'guru.id')
            // ->join('users as murid', 'p.id_murid', 'murid.id')
            // ->where($where)
            // ->select('absen.*')
            ->get();
    }

    public function getAbsenById($id)
    {
        return Absen::with($this->relationship)
            ->find($id);
    }

    public function getAbsenByIdGuru($id)
    {
        return Absen::with($this->relationship)
            ->join('pemesanan', 'pemesanan.id_pemesanan', 'absen.id_pemesanan')
            ->where([
                'pemesanan.id_guru' => $id
            ])
            ->select('absen.*')
            ->orderBy('waktu_absen', 'desc')
            ->get();
    }

    public function getAbsenByIdMurid($id)
    {
        return Absen::with($this->relationship)
            ->join('pemesanan', 'pemesanan.id_pemesanan', 'absen.id_pemesanan')
            ->where([
                'pemesanan.id_murid' => $id
            ])
            ->select('absen.*')
            ->orderBy('waktu_absen', 'desc')
            ->get();
    }

    public function store(Request $r)
    {
        $absenValidity = $this->verifyAbsen($r->id_pemesanan);

        if($absenValidity==1){
            $absen = new Absen;
            $absen->id_pemesanan = $r->id_pemesanan;

            if(isset($r->waktu_pengganti)){
                $absen->waktu_absen = $r->waktu_pengganti;

                $jadwalPengganti = new JadwalPengganti;
                $jadwalPengganti->id_pemesanan = $r->id_pemesanan;
                $jadwalPengganti->id_jadwal_pemesanan_perminggu = $r->id_jadwal_pemesanan_perminggu;
                $jadwalPengganti->waktu_pengganti = date("Y-m-d H:i:s");
                $jadwalPengganti->save();

                $absen->id_jadwal_pengganti = $jadwalPengganti->id;
            }else if(!isset($r->waktu_pengganti)){
                $absen->id_jadwal_pemesanan_perminggu = $r->id_jadwal_pemesanan_perminggu;
                $absen->waktu_absen = date("Y-m-d H:i:s");
            }
    
            $absen->save();
    
            // return Absen::with($this->relationship)->where('id_absen', $absen->id_absen)->first();
        }
        return $absenValidity;
    }

    public function verifyAbsen($id_pemesanan)
    {
        $absen = Absen::where('id_pemesanan', $id_pemesanan)->orderBy('waktu_absen', 'desc')->first();
        if(!isset($absen)){
            return 1;
        }
        $currDateTime = Carbon::now();

        $currYear = $currDateTime->year;
        $currMonth = $currDateTime->month;
        $currDay = $currDateTime->day;

        $now = [];
        array_push($now, $currYear);
        array_push($now, $currMonth);
        array_push($now, $currDay);

        $absenDateTime = Carbon::parse($absen->waktu_absen);
        $absenYear = $absenDateTime->year;
        $absenMonth = $absenDateTime->month;
        $absenDay = $absenDateTime->day;

        $waktuAbsen = [];
        array_push($waktuAbsen, $absenYear);
        array_push($waktuAbsen, $absenMonth);
        array_push($waktuAbsen, $absenDay);

        // dd([$now, $waktuAbsen]);

        for($i = 0; $i < count($waktuAbsen); $i++){
            if($now[$i] != $waktuAbsen[$i]){
                return 1;
            }
        }

        return 0;
    }

    public function getAbsenFiltered(Request $r)
    {
        $where = [];
        if(isset($r->id_absen)){
            $where['id_absen'] = $r->id_absen;
        }
        if(isset($r->id_pemesanan)){
            $where['p.id_pemesanan'] = $r->id_pemesanan;
        }
        if(isset($r->status)){
            $where['p.status'] = $r->status;
        }
        if(isset($r->id_jadwal_pemesanan_perminggu)){
            $where['jpp.id_jadwal_pemesanan_perminggu'] = $r->id_jadwal_pemesanan_perminggu;
        }
        if(isset($r->id_guru)){
            $where['guru.id'] = $r->id_guru;
        }
        if(isset($r->id_murid)){
            $where['murid.id'] = $r->id_murid;
        }

        return Absen::with($this->relationship)
            // ->join('jadwal_pemesanan_perminggu as jpp', 'jpp.id_jadwal_pemesanan_perminggu', 'absen.id_jadwal_pemesanan_perminggu')
            ->join('pemesanan as p', 'absen.id_pemesanan', 'p.id_pemesanan')
            ->join('users as guru', 'p.id_guru', 'guru.id')
            ->join('users as murid', 'p.id_murid', 'murid.id')
            ->where($where)
            ->select('absen.*')
            ->orderBy('waktu_absen', 'desc')
            ->get();
    }
    public function pembayaranAbsen(Request $r)
    {
        $where =[];
        $relationshipPembayaranAbsen = ['murid','guru','pemesanan','pemesanan.mataPelajaran','pemesanan.mataPelajaran.jenjang'];
        if(isset($r->id_pemesanan)){
            $where['id_pemesanan'] = $r->id_pemesanan;
        }
        if(isset($r->id_guru)){
            $where['id_guru'] = $r->id_guru;
        }
        if(isset($r->id_murid)){
            $where['id_murid'] = $r->id_murid;
        }
        if(isset($r->bulan)){
            $where['bulan'] = $r->bulan;
        }
        if(isset($r->tahun)){
            $where['tahun'] = $r->tahun;
        }
        $absenQuery = AbsenPembayaran::with($relationshipPembayaranAbsen)->where($where);
        if(isset($r->distinct)){
            $absenQuery = $absenQuery->groupBy('bulan','tahun',$r->distinct);
            $absenQuery = $absenQuery->select('bulan','tahun',$r->distinct);
        }

        return $absenQuery->get();
    }

    public function getTanggalPengganti(Request $r)
    {
        $currFormat = 'Y-MM-DD HH:mm:ss';

        //Memasukkan variable where
        $where = [];
        $where['id_pemesanan'] = $r->id_pemesanan;

        //Get current date
        $currDateTime = Carbon::now();
        $formattedCurrDateTime = $currDateTime->toDateTimeString();
        
        //Mendapatkan jadwal pemesanan perminggu
        $jpp = JadwalPemesananPerminggu::with(['jadwalAvailable'])->where($where)->get();

        //Mendapatkan tanggal pertemuan seharusnya
        $tanggalPertemuanSeharusnya = [];
        $nextDate = Carbon::now()->addWeeks(1);
        $prevDate = Carbon::now()->subWeeks(1);

        //Mendapatkan absen
        $absen = Absen::where($where)
            ->orderBy('waktu_absen', 'desc')
            ->get();

        while($prevDate->lessThan($nextDate)){
            $currDay = $this->dayOfWeekEngToInd($prevDate->englishDayOfWeek);

            foreach($jpp as $j){
                $comparedDay = $j->jadwalAvailable->hari;
                
                if($comparedDay == $currDay){
                    //Mendapatkan absen
                    $dateString = $prevDate->toDateString();

                    $currAbsen = Absen::selectRaw('id_absen, id_pemesanan, DATE(waktu_absen) AS tanggal_absen')
                        ->whereRaw('id_pemesanan = '.$r->id_pemesanan.' AND DATE(waktu_absen) = \''.$dateString.'\'')
                        ->orderBy('waktu_absen', 'desc')
                        ->get();

                    if(count($currAbsen) == 0){
                        array_push($tanggalPertemuanSeharusnya, [
                            'id_jadwal_perminggu'=>$j->id_jadwal_pemesanan_perminggu,
                            'tanggal_pengganti'=>$dateString
                            ]);
                    }
                }
            }

            $prevDate->addDay();
        }


        // var_dump($nextDate->greaterThan($prevDate));
        return $tanggalPertemuanSeharusnya;
    }

    public function dayOfWeekEngToInd($day)
    {
        $hari = '';
        switch($day){
            case 'Monday':
                $hari = 'Senin';
                break;

            case 'Tuesday':
                $hari = 'Selasa';
                break;
            
            case 'Wednesday':
                $hari = 'Rabu';
                break;

            case 'Thursday':
                $hari = 'Kamis';
                break;

            case 'Friday':
                $hari = 'Jumat';
                break;

            case 'Saturday':
                $hari = 'Sabtu';
                break;

            case 'Sunday':
                $hari = 'Minggu';
                break;
            
                
            }
            return $hari;
        }
}
