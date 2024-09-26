<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\LearningStyleHelper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatasetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataset = [
            ["nama" => "Ika Mei", "tgl_lahir" => "04/05/2006", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 84, "pjok" => 88, "visual" => 9, "auditori" => 3, "kinestetik" => 4, "skor" => 86],
            ["nama" => "Novalian Nayla Dian Aprilia", "tgl_lahir" => "10/04/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 89, "pjok" => 90, "visual" => 6, "auditori" => 4, "kinestetik" => 6, "skor" => 89.5],
            ["nama" => "Candra Dimas Setiawan ", "tgl_lahir" => "26/02/2009", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 85, "visual" => 8, "auditori" => 4, "kinestetik" => 4, "skor" => 82.5],
            ["nama" => "Keysa Dwi Oktaviani", "tgl_lahir" => "20/10/2008", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 84, "visual" => 7, "auditori" => 4, "kinestetik" => 5, "skor" => 82],
            ["nama" => "Rizky Wulan Aprilia", "tgl_lahir" => "19/04/2002", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 42, "pjok" => 75, "visual" => 4, "auditori" => 4, "kinestetik" => 8, "skor" => 58.5],
            ["nama" => "Wilda Nova Ananda ", "tgl_lahir" => "28/07/2001", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 75, "visual" => 7, "auditori" => 3, "kinestetik" => 6, "skor" => 77.5],
            ["nama" => "Alvia Najwa ", "tgl_lahir" => "08/08/2024", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 90, "visual" => 16, "auditori" => 0, "kinestetik" => 0, "skor" => 85],
            ["nama" => "Ayu Nur naimah", "tgl_lahir" => "28/01/2002", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 50, "pjok" => 80, "visual" => 2, "auditori" => 10, "kinestetik" => 4, "skor" => 65],
            ["nama" => "Safrizal darma ", "tgl_lahir" => "01/05/2003", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "ANIMASI", "mtk" => 72, "pjok" => 80, "visual" => 8, "auditori" => 7, "kinestetik" => 1, "skor" => 76],
            ["nama" => "Kunarty ", "tgl_lahir" => "12/10/2006", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 50, "pjok" => 67, "visual" => 10, "auditori" => 2, "kinestetik" => 4, "skor" => 58.5],
            ["nama" => "Sani'atul Khuluq ", "tgl_lahir" => "10/04/2002", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "ANIMASI", "mtk" => 60, "pjok" => 80, "visual" => 6, "auditori" => 5, "kinestetik" => 5, "skor" => 70],
            ["nama" => "Sauqi", "tgl_lahir" => "17/04/2002", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "ANIMASI", "mtk" => 85, "pjok" => 90, "visual" => 4, "auditori" => 6, "kinestetik" => 6, "skor" => 87.5],
            ["nama" => "ummi nur laylatul", "tgl_lahir" => "03/11/2000", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "ANIMASI", "mtk" => 76, "pjok" => 75, "visual" => 10, "auditori" => 1, "kinestetik" => 5, "skor" => 75.5],
            ["nama" => "Aminur Rijal Kusuma", "tgl_lahir" => "20/07/2001", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 60, "pjok" => 75, "visual" => 6, "auditori" => 2, "kinestetik" => 8, "skor" => 67.5],
            ["nama" => "Zanis ahmed s", "tgl_lahir" => "09/07/2007", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 80, "visual" => 6, "auditori" => 5, "kinestetik" => 5, "skor" => 77.5],
            ["nama" => "Rifqi Naufalazmi ", "tgl_lahir" => "12/02/2007", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 80, "visual" => 4, "auditori" => 5, "kinestetik" => 7, "skor" => 77.5],
            ["nama" => "Rifki Agus Riyanto", "tgl_lahir" => "18/08/2007", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 36, "pjok" => 75, "visual" => 5, "auditori" => 5, "kinestetik" => 6, "skor" => 55.5],
            ["nama" => "suci putri anggrieni ", "tgl_lahir" => "17/08/2006", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 84, "pjok" => 82, "visual" => 5, "auditori" => 6, "kinestetik" => 5, "skor" => 83],
            ["nama" => "Rustanti ", "tgl_lahir" => "23/11/2008", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "ANIMASI", "mtk" => 70, "pjok" => 65, "visual" => 10, "auditori" => 4, "kinestetik" => 2, "skor" => 67.5],
            ["nama" => "David Santoso", "tgl_lahir" => "13/08/2008", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 40, "pjok" => 75, "visual" => 4, "auditori" => 5, "kinestetik" => 7, "skor" => 57.5],
            ["nama" => "Faisal Halim", "tgl_lahir" => "04/06/2001", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 56, "pjok" => 75, "visual" => 3, "auditori" => 7, "kinestetik" => 6, "skor" => 65.5],
            ["nama" => "KHOLISNA NURUL AINI", "tgl_lahir" => "18/12/2007", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 53, "pjok" => 70, "visual" => 6, "auditori" => 5, "kinestetik" => 5, "skor" => 61.5],
            ["nama" => "Widya Ajeng Pramesti ", "tgl_lahir" => "20/10/2007", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 27, "pjok" => 60, "visual" => 4, "auditori" => 4, "kinestetik" => 8, "skor" => 43.5],
            ["nama" => "Putri Najwa Meilaningsih ", "tgl_lahir" => "20/05/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 30, "pjok" => 47, "visual" => 6, "auditori" => 7, "kinestetik" => 3, "skor" => 38.5],
            ["nama" => "shofi salsabila w.", "tgl_lahir" => "18/12/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 57, "pjok" => 80, "visual" => 7, "auditori" => 2, "kinestetik" => 7, "skor" => 68.5],
            ["nama" => "siti zahrotusiffa", "tgl_lahir" => "08/11/2007", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 25, "pjok" => 75, "visual" => 9, "auditori" => 6, "kinestetik" => 1, "skor" => 50],
            ["nama" => "Rida Octaviana Safitri ", "tgl_lahir" => "15/10/2007", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 80, "visual" => 4, "auditori" => 8, "kinestetik" => 4, "skor" => 77.5],
            ["nama" => "sholekhatun nisa' ", "tgl_lahir" => "11/12/2007", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 40, "pjok" => 40, "visual" => 7, "auditori" => 5, "kinestetik" => 4, "skor" => 40],
            ["nama" => "Rina Apiyani ", "tgl_lahir" => "04/06/2007", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 80, "visual" => 3, "auditori" => 9, "kinestetik" => 4, "skor" => 77.5],
            ["nama" => "nila amalia nabila", "tgl_lahir" => "21/05/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 40, "pjok" => 70, "visual" => 6, "auditori" => 7, "kinestetik" => 3, "skor" => 55],
            ["nama" => "Dimas Putra Mawardi", "tgl_lahir" => "10/04/2002", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 87, "pjok" => 90, "visual" => 3, "auditori" => 5, "kinestetik" => 8, "skor" => 88.5],
            ["nama" => "Muhammad Iqbal Tawakkal", "tgl_lahir" => "05/04/2002", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 70, "pjok" => 80, "visual" => 5, "auditori" => 8, "kinestetik" => 3, "skor" => 75],
            ["nama" => "Delia Arya", "tgl_lahir" => "01/08/2007", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 50, "pjok" => 75, "visual" => 5, "auditori" => 5, "kinestetik" => 6, "skor" => 62.5],
            ["nama" => "Nurrimas Catur Konvetidhiena ", "tgl_lahir" => "06/06/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 25, "pjok" => 75, "visual" => 8, "auditori" => 1, "kinestetik" => 7, "skor" => 50],
            ["nama" => "Imanuel Nicolas Manafe ", "tgl_lahir" => "27/09/1997", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 76, "pjok" => 78, "visual" => 2, "auditori" => 12, "kinestetik" => 2, "skor" => 77],
            ["nama" => "Rafa Ifaqoh ", "tgl_lahir" => "04/01/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 75, "visual" => 6, "auditori" => 8, "kinestetik" => 2, "skor" => 75],
            ["nama" => "Putri Anggaraini ", "tgl_lahir" => "02/07/2005", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 43, "pjok" => 50, "visual" => 6, "auditori" => 4, "kinestetik" => 6, "skor" => 46.5],
            ["nama" => "shella puspita sari ", "tgl_lahir" => "07/01/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 50, "pjok" => 67, "visual" => 6, "auditori" => 3, "kinestetik" => 7, "skor" => 58.5],
            ["nama" => "salma nabilah", "tgl_lahir" => "22/11/2007", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 57, "pjok" => 60, "visual" => 9, "auditori" => 4, "kinestetik" => 3, "skor" => 58.5],
            ["nama" => "risma putri lestari ", "tgl_lahir" => "11/12/2007", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 45, "pjok" => 60, "visual" => 8, "auditori" => 5, "kinestetik" => 3, "skor" => 52.5],
            ["nama" => "Rafa nur samsudin", "tgl_lahir" => "23/09/2008", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 12, "pjok" => 65, "visual" => 7, "auditori" => 1, "kinestetik" => 8, "skor" => 38.5],
            ["nama" => "Nurul Miftakhul Awaliyah", "tgl_lahir" => "19/07/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 54, "pjok" => 70, "visual" => 6, "auditori" => 6, "kinestetik" => 4, "skor" => 62],
            ["nama" => "Renanda", "tgl_lahir" => "20/05/2007", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 45, "pjok" => 65, "visual" => 3, "auditori" => 6, "kinestetik" => 7, "skor" => 55],
            ["nama" => "safira ramadhani ", "tgl_lahir" => "04/09/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 86, "pjok" => 78, "visual" => 4, "auditori" => 9, "kinestetik" => 3, "skor" => 82],
            ["nama" => "Nazilatul Zulfa Aulia Pratiwi ", "tgl_lahir" => "05/01/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 45, "pjok" => 70, "visual" => 11, "auditori" => 3, "kinestetik" => 2, "skor" => 57.5],
            ["nama" => "Rifqi indra saputra ", "tgl_lahir" => "09/08/2007", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 56, "pjok" => 75, "visual" => 4, "auditori" => 4, "kinestetik" => 8, "skor" => 65.5],
            ["nama" => "rezva indah kurnia ", "tgl_lahir" => "30/03/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 80, "visual" => 6, "auditori" => 5, "kinestetik" => 5, "skor" => 80],
            ["nama" => "Sinta romasuci", "tgl_lahir" => "28/09/2006", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 78, "visual" => 5, "auditori" => 7, "kinestetik" => 4, "skor" => 79],
            ["nama" => "Tri Budi Utomo", "tgl_lahir" => "14/01/2008", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 82, "pjok" => 75, "visual" => 4, "auditori" => 6, "kinestetik" => 6, "skor" => 78.5],
            ["nama" => "Ririn khoirun nisa", "tgl_lahir" => "04/05/2024", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 34, "pjok" => 60, "visual" => 5, "auditori" => 5, "kinestetik" => 6, "skor" => 47],
            ["nama" => "silvani diana prasasti ", "tgl_lahir" => "30/03/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 30, "pjok" => 40, "visual" => 7, "auditori" => 6, "kinestetik" => 3, "skor" => 35],
            ["nama" => "Yanuar ikrom", "tgl_lahir" => "30/01/2008", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 35, "pjok" => 72, "visual" => 5, "auditori" => 6, "kinestetik" => 5, "skor" => 53.5],
            ["nama" => "Raehan Kamal syabba", "tgl_lahir" => "02/03/2008", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 30, "pjok" => 76, "visual" => 8, "auditori" => 4, "kinestetik" => 4, "skor" => 53],
            ["nama" => "Shilny Farah", "tgl_lahir" => "14/05/2008", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 72, "visual" => 5, "auditori" => 6, "kinestetik" => 5, "skor" => 76]
        ];

        foreach ($dataset as $data) {
            // Panggil helper untuk menentukan gaya belajar
            $data['label'] = LearningStyleHelper::determineLearningStyle($data['visual'], $data['auditori'], $data['kinestetik']);

            // Insert data ke database
            \App\Models\Dataset::create($data);
        }
    }
}
