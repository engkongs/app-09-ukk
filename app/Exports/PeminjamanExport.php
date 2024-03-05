<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PeminjamanExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Peminjaman::all();
    }
    public function headings(): array
    {
        return [
            'NO',
            'ID PEMINJAMAN',
            'Judul Buku',
            'Tanggal. Pinjam',
            'Tanggal. Kembali',
            'Status Peminjaman',
            'Peminjam',

        ];
    }

    public function map($peminjaman): array
    {
        $no =  1;
        return [
            $no++,
            $peminjaman->id,
            $peminjaman->buku->judul,
            $peminjaman->tanggal_pinjam,
            $peminjaman->tanggal_kembali,
            $peminjaman->status_pinjam,
            $peminjaman->user->name,
        ];
    }
}
