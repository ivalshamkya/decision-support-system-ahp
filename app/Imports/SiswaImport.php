<?php
namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel
{
    /**
     * Transform the row from the Excel sheet into a Siswa model instance.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row[0],
            'nama' => $row[1],
            'matematika' => $row[2],
            'indonesia' => $row[3],
            'inggris' => $row[4],
            'biologi' => $row[5],
            'ekonomi' => $row[6],
            'minat_siswa' => $row[7],
            'kelas_id' => $row[8],
        ]);
    }
}
