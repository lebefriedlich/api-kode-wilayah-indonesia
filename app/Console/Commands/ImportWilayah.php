<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImportWilayah extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-wilayah {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function handle()
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath)) {
            $this->error('File not found!');
            return;
        }

        // Baca CSV, abaikan baris pertama jika merupakan header, dan gunakan ';' sebagai delimiter
        $csvData = array_map(function ($line) {
            return str_getcsv($line, ';');
        }, file($filePath));

        // Jika file CSV memiliki header, abaikan baris pertama:
        $header = array_shift($csvData); // Abaikan baris pertama sebagai header

        // Memasukkan data secara batch untuk performa yang lebih baik
        $batchSize = 100;
        $dataChunks = array_chunk($csvData, $batchSize);

        foreach ($dataChunks as $chunk) {
            // Hanya ambil dua kolom pertama (kode dan nama)
            $filteredData = array_map(function ($row) {
                // Validasi apakah CSV memiliki setidaknya dua kolom
                if (count($row) < 2) {
                    return null; // Skip jika kolom kurang dari dua
                }

                return [
                    'kode' => $row[0],  // Kolom pertama adalah kode
                    'nama' => $row[1]   // Kolom kedua adalah nama
                ];
            }, $chunk);

            // Hapus nilai null dari array
            $filteredData = array_filter($filteredData);

            // Lakukan insert jika ada data yang valid
            if (!empty($filteredData)) {
                DB::table('wilayah')->insert($filteredData);
            }
        }

        $this->info('Data imported successfully!');
    }
}
