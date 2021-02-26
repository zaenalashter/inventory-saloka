<?php

namespace App\Exports;

use App\mod_penggajian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ExportPeriodePenggajia implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return mod_penggajian::all();
        return DB::table('penggajian')
        ->select('karyawan.nip as nip','karyawan.nama as nama','departemen.departemen as departemen','penggajian.no_rek as no_rekening','penggajian.total_hari_kerja as total_hari_kerja',
        'penggajian.gaji_pokok as gaji_pokok','penggajian.gaji_harian as gaji_harian','penggajian.tnj_jabatan as tnj_jabatan','penggajian.tnj_keahlian as tnj_keahlian',
        'penggajian.tnj_komunikasi as tnj_komunikasi','penggajian.tnj_tempat_tinggal as tnj_tempat_tinggal','penggajian.tnj_kehadiran as tnj_kehadiran','penggajian.tnj_transportasi as tnj_transportasi',
        'penggajian.tnj_makan_siang as tnj_makan_siang','penggajian.jml_hari_prorate as jml_hari_prorate','penggajian.prorate_point as proprate_point','penggajian.lembur as lembur','penggajian.thr as thr',
        'penggajian.bonus as bonus','penggajian.komisi as komisi','penggajian.lain_lain_tnj_td_ttp as lain_lain_tnj_td_ttp','penggajian.skema1_bpjs_kesehatan as skema1_bpjs_kesehatan',
        'penggajian.skema2_bpjs_kesehatan as skema2_bpjs_kesehatan','penggajian.beban_perusahaan_kesehatan as beban_perusahaan_kesehatan','penggajian.beban_karyawan_perusahaan as beban_karyawan_perusahaan',
        'penggajian.skema1_bpjs_tk as skema1_bpjs_tk','penggajian.skema2_bpjs_tk as skema2_bpjs_tk','penggajian.beban_perusahaan_tk as beban_perusahaan_tk','penggajian.beban_karyawan_tk as beban_karyawan_tk',
        'penggajian.skema1_pajak as skema1_pajak','penggajian.skema2_pajak as skema2_pajak','penggajian.beban_perusahaan_pajak as beban_perusahaan_pajak','penggajian.beban_karyawan_pajak as beban_karyawan_pajak',
        'penggajian.iuran_koperasi as iuran_koperasi','penggajian.hutang_pinjaman as hutang_pinjaman','penggajian.piutang_karyawan as piutang_karyawan','penggajian.lain_lain_pengurangan as lain_lain_pengurangan',
        'penggajian.bulan as bulan','penggajian.tahun as tahun','penggajian.pic as pic','penggajian.reff as reff','penggajian.thp as thp')
        ->join('karyawan','karyawan.nip','penggajian.nip')
        ->join('departemen','departemen.id_dept','karyawan.departemen')
        ->orderBy('departemen.departemen','asc')
        ->orderBy('penggajian.nip','asc')
    
        ->get();
    }

    public function headings(): array
    {
        return [
            'NIP',
            'NAMA KARYAWAN',
            'DEPARTEMEN',
            'NO REKENING',
            'TOTAL HARI KERJA',
            'GAJI POKOK',
            'GAJI HARIAN',
            'TUNJANGAN JABATAN',
            'TUNJANGAN KEAHLIAN',
            'TUNJANGAN KOMUNIKASI',
            'TUNJANGAN TEMPAT TINGGAL',
            'TUNJANGAN KEHADIRAN',
            'TUNJANGAN TRANSPORTASI',
            'TUNJANGAN MAKAN SIANG',
            'JUMLAH HARI PRORATE',
            'PRORATE POINT',
            'LEMBUR',
            'THR',
            'BONUS',
            'KOMISI',
            'LAIN-LAIN TUNJANGAN TETAP',
            'SKEMA 1 BPJS KESEHATAN',
            'SKEMA 2 BPJS KESEHATAN',
            'BEBAN PERUSAHAAN BPJS KESEHATAN',
            'BEBAN KARYAWAN BPJS KESEHATAN',
            'SKEMA 1 BPJS TK',
            'SKEMA 2 BPJS TK',
            'BEBAN PERUSAHAAN BPJS TK',
            'BEBAN KARYAWAN BPJS TK',
            'SKEMA 1 PAJAK',
            'SKEMA 2 PAJAK',
            'BEBAN PERUSAHAAN PAJAK',
            'BEBAN KARYAWAN PAJAK',
            'IURAN KOPERASI',
            'HUTANG PINJAMAN',
            'PIUTANG KARYAWAN',
            'PENGURANGAN LAIN-LAIN',
            'BULAN',
            'TAHUN',
            'PIC',
            'REFF',
            'TAKE HOME PAY',

        ];
    }
}
