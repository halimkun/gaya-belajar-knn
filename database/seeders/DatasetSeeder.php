<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\LearningStyleHelper;

class DatasetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataset = [
            // Google Form
            ["nama" => "Ika Mei", "tgl_lahir" => "2006-05-04", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 84, "pjok" => 88, "visual" => 9, "auditori" => 3, "kinestetik" => 4, "skor" => 86],
            ["nama" => "Novalian Nayla Dian Aprilia", "tgl_lahir" => "2008-04-10", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 89, "pjok" => 90, "visual" => 6, "auditori" => 4, "kinestetik" => 6, "skor" => 89.5],
            ["nama" => "Candra Dimas Setiawan ", "tgl_lahir" => "2009-02-26", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 85, "visual" => 8, "auditori" => 4, "kinestetik" => 4, "skor" => 82.5],
            ["nama" => "Keysa Dwi Oktaviani", "tgl_lahir" => "2008-10-20", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 84, "visual" => 7, "auditori" => 4, "kinestetik" => 5, "skor" => 82],
            ["nama" => "Rizky Wulan Aprilia", "tgl_lahir" => "2002-04-19", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 42, "pjok" => 75, "visual" => 4, "auditori" => 4, "kinestetik" => 8, "skor" => 58.5],
            ["nama" => "Wilda Nova Ananda ", "tgl_lahir" => "2001-07-28", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 75, "visual" => 7, "auditori" => 3, "kinestetik" => 6, "skor" => 77.5],
            ["nama" => "Alvia Najwa ", "tgl_lahir" => "2024-08-08", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 90, "visual" => 16, "auditori" => 0, "kinestetik" => 0, "skor" => 85],
            ["nama" => "Ayu Nur naimah", "tgl_lahir" => "2002-01-28", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 50, "pjok" => 80, "visual" => 2, "auditori" => 10, "kinestetik" => 4, "skor" => 65],
            ["nama" => "Safrizal darma ", "tgl_lahir" => "2003-05-01", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "ANIMASI", "mtk" => 72, "pjok" => 80, "visual" => 8, "auditori" => 7, "kinestetik" => 1, "skor" => 76],
            ["nama" => "Kunarty ", "tgl_lahir" => "2006-10-12", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 50, "pjok" => 67, "visual" => 10, "auditori" => 2, "kinestetik" => 4, "skor" => 58.5],
            ["nama" => "Sani'atul Khuluq ", "tgl_lahir" => "2002-04-10", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "ANIMASI", "mtk" => 60, "pjok" => 80, "visual" => 6, "auditori" => 5, "kinestetik" => 5, "skor" => 70],
            ["nama" => "Sauqi", "tgl_lahir" => "2002-04-17", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "ANIMASI", "mtk" => 85, "pjok" => 90, "visual" => 4, "auditori" => 6, "kinestetik" => 6, "skor" => 87.5],
            ["nama" => "ummi nur laylatul", "tgl_lahir" => "2000-11-03", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "ANIMASI", "mtk" => 76, "pjok" => 75, "visual" => 10, "auditori" => 1, "kinestetik" => 5, "skor" => 75.5],
            ["nama" => "Aminur Rijal Kusuma", "tgl_lahir" => "2001-07-20", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 60, "pjok" => 75, "visual" => 6, "auditori" => 2, "kinestetik" => 8, "skor" => 67.5],
            ["nama" => "Zanis ahmed s", "tgl_lahir" => "2007-07-09", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 80, "visual" => 6, "auditori" => 5, "kinestetik" => 5, "skor" => 77.5],
            ["nama" => "Rifqi Naufalazmi ", "tgl_lahir" => "2007-02-12", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 80, "visual" => 4, "auditori" => 5, "kinestetik" => 7, "skor" => 77.5],
            ["nama" => "Rifki Agus Riyanto", "tgl_lahir" => "2007-08-18", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 36, "pjok" => 75, "visual" => 5, "auditori" => 5, "kinestetik" => 6, "skor" => 55.5],
            ["nama" => "suci putri anggrieni ", "tgl_lahir" => "2006-08-17", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 84, "pjok" => 82, "visual" => 5, "auditori" => 6, "kinestetik" => 5, "skor" => 83],
            ["nama" => "Rustanti ", "tgl_lahir" => "2008-11-23", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "ANIMASI", "mtk" => 70, "pjok" => 65, "visual" => 10, "auditori" => 4, "kinestetik" => 2, "skor" => 67.5],
            ["nama" => "David Santoso", "tgl_lahir" => "2008-08-13", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 40, "pjok" => 75, "visual" => 4, "auditori" => 5, "kinestetik" => 7, "skor" => 57.5],
            ["nama" => "Faisal Halim", "tgl_lahir" => "2001-06-04", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 56, "pjok" => 75, "visual" => 3, "auditori" => 7, "kinestetik" => 6, "skor" => 65.5],
            ["nama" => "KHOLISNA NURUL AINI", "tgl_lahir" => "2007-12-18", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 53, "pjok" => 70, "visual" => 6, "auditori" => 5, "kinestetik" => 5, "skor" => 61.5],
            ["nama" => "Widya Ajeng Pramesti ", "tgl_lahir" => "2007-10-20", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 27, "pjok" => 60, "visual" => 4, "auditori" => 4, "kinestetik" => 8, "skor" => 43.5],
            ["nama" => "Putri Najwa Meilaningsih ", "tgl_lahir" => "2008-05-20", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 30, "pjok" => 47, "visual" => 6, "auditori" => 7, "kinestetik" => 3, "skor" => 38.5],
            ["nama" => "shofi salsabila w.", "tgl_lahir" => "2008-12-18", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 57, "pjok" => 80, "visual" => 7, "auditori" => 2, "kinestetik" => 7, "skor" => 68.5],
            ["nama" => "siti zahrotusiffa", "tgl_lahir" => "2007-11-08", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 25, "pjok" => 75, "visual" => 9, "auditori" => 6, "kinestetik" => 1, "skor" => 50],
            ["nama" => "Rida Octaviana Safitri ", "tgl_lahir" => "2007-10-15", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 80, "visual" => 4, "auditori" => 8, "kinestetik" => 4, "skor" => 77.5],
            ["nama" => "sholekhatun nisa' ", "tgl_lahir" => "2007-12-11", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 40, "pjok" => 40, "visual" => 7, "auditori" => 5, "kinestetik" => 4, "skor" => 40],
            ["nama" => "Rina Apiyani ", "tgl_lahir" => "2007-06-04", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 80, "visual" => 3, "auditori" => 9, "kinestetik" => 4, "skor" => 77.5],
            ["nama" => "nila amalia nabila", "tgl_lahir" => "2008-05-21", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 40, "pjok" => 70, "visual" => 6, "auditori" => 7, "kinestetik" => 3, "skor" => 55],
            ["nama" => "Dimas Putra Mawardi", "tgl_lahir" => "2002-04-10", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 87, "pjok" => 90, "visual" => 3, "auditori" => 5, "kinestetik" => 8, "skor" => 88.5],
            ["nama" => "Muhammad Iqbal Tawakkal", "tgl_lahir" => "2002-04-05", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 70, "pjok" => 80, "visual" => 5, "auditori" => 8, "kinestetik" => 3, "skor" => 75],
            ["nama" => "Delia Arya", "tgl_lahir" => "2007-08-01", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "TKJ", "mtk" => 50, "pjok" => 75, "visual" => 5, "auditori" => 5, "kinestetik" => 6, "skor" => 62.5],
            ["nama" => "Nurrimas Catur Konvetidhiena ", "tgl_lahir" => "2008-06-06", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 25, "pjok" => 75, "visual" => 8, "auditori" => 1, "kinestetik" => 7, "skor" => 50],
            ["nama" => "Imanuel Nicolas Manafe ", "tgl_lahir" => "1997-09-27", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 76, "pjok" => 78, "visual" => 2, "auditori" => 12, "kinestetik" => 2, "skor" => 77],
            ["nama" => "Rafa Ifaqoh ", "tgl_lahir" => "2008-01-04", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 75, "pjok" => 75, "visual" => 6, "auditori" => 8, "kinestetik" => 2, "skor" => 75],
            ["nama" => "Putri Anggaraini ", "tgl_lahir" => "2005-07-02", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 43, "pjok" => 50, "visual" => 6, "auditori" => 4, "kinestetik" => 6, "skor" => 46.5],
            ["nama" => "shella puspita sari ", "tgl_lahir" => "2008-01-07", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 50, "pjok" => 67, "visual" => 6, "auditori" => 3, "kinestetik" => 7, "skor" => 58.5],
            ["nama" => "salma nabilah", "tgl_lahir" => "2007-11-22", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 57, "pjok" => 60, "visual" => 9, "auditori" => 4, "kinestetik" => 3, "skor" => 58.5],
            ["nama" => "risma putri lestari ", "tgl_lahir" => "2007-12-11", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 45, "pjok" => 60, "visual" => 8, "auditori" => 5, "kinestetik" => 3, "skor" => 52.5],
            ["nama" => "Rafa nur samsudin", "tgl_lahir" => "2008-09-23", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 12, "pjok" => 65, "visual" => 7, "auditori" => 1, "kinestetik" => 8, "skor" => 38.5],
            ["nama" => "Nurul Miftakhul Awaliyah", "tgl_lahir" => "2008-07-19", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 54, "pjok" => 70, "visual" => 6, "auditori" => 6, "kinestetik" => 4, "skor" => 62],
            ["nama" => "Renanda", "tgl_lahir" => "2007-05-20", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 45, "pjok" => 65, "visual" => 3, "auditori" => 6, "kinestetik" => 7, "skor" => 55],
            ["nama" => "safira ramadhani ", "tgl_lahir" => "2008-09-04", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 86, "pjok" => 78, "visual" => 4, "auditori" => 9, "kinestetik" => 3, "skor" => 82],
            ["nama" => "Nazilatul Zulfa Aulia Pratiwi ", "tgl_lahir" => "2008-01-05", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 45, "pjok" => 70, "visual" => 11, "auditori" => 3, "kinestetik" => 2, "skor" => 57.5],
            ["nama" => "Rifqi indra saputra ", "tgl_lahir" => "2007-08-09", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 56, "pjok" => 75, "visual" => 4, "auditori" => 4, "kinestetik" => 8, "skor" => 65.5],
            ["nama" => "rezva indah kurnia ", "tgl_lahir" => "2008-03-30", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 80, "visual" => 6, "auditori" => 5, "kinestetik" => 5, "skor" => 80],
            ["nama" => "Sinta romasuci", "tgl_lahir" => "2006-09-28", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 78, "visual" => 5, "auditori" => 7, "kinestetik" => 4, "skor" => 79],
            ["nama" => "Tri Budi Utomo", "tgl_lahir" => "2008-01-14", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 82, "pjok" => 75, "visual" => 4, "auditori" => 6, "kinestetik" => 6, "skor" => 78.5],
            ["nama" => "Ririn khoirun nisa", "tgl_lahir" => "2024-05-04", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 34, "pjok" => 60, "visual" => 5, "auditori" => 5, "kinestetik" => 6, "skor" => 47],
            ["nama" => "silvani diana prasasti ", "tgl_lahir" => "2008-03-30", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 30, "pjok" => 40, "visual" => 7, "auditori" => 6, "kinestetik" => 3, "skor" => 35],
            ["nama" => "Yanuar ikrom", "tgl_lahir" => "2008-01-30", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 35, "pjok" => 72, "visual" => 5, "auditori" => 6, "kinestetik" => 5, "skor" => 53.5],
            ["nama" => "Raehan Kamal syabba", "tgl_lahir" => "2008-03-02", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 30, "pjok" => 76, "visual" => 8, "auditori" => 4, "kinestetik" => 4, "skor" => 53],
            ["nama" => "Shilny Farah", "tgl_lahir" => "2008-05-14", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "TKJ", "mtk" => 80, "pjok" => 72, "visual" => 5, "auditori" => 6, "kinestetik" => 5, "skor" => 76],

            // SSLANDARI
            ["nama" => "Aura Syiqqi Jafnah", "tgl_lahir" => "2003-11-11", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 65, "visual" => 70, "auditori" => 70, "kinestetik" => 90],
            ["nama" => "Rifana ambar wati", "tgl_lahir" => "2005-2-2", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 90, "pjok" => 78, "visual" => 73, "auditori" => 89, "kinestetik" => 80],
            ["nama" => "Muhammad galang pratama", "tgl_lahir" => "2003-3-3", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 70, "pjok" => 50, "visual" => 60, "auditori" => 8, "kinestetik" => 80],
            ["nama" => "Muhammad Mekka", "tgl_lahir" => "2005-3-4", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 66, "pjok" => 45, "visual" => 74, "auditori" => 80, "kinestetik" => 77],
            ["nama" => "Gema Hermawan", "tgl_lahir" => "2004-04-20", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 70, "pjok" => 20, "visual" => 50, "auditori" => 70, "kinestetik" => 76],
            ["nama" => "Sigit Eka Wahyudi", "tgl_lahir" => "2005-3-9", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 79, "pjok" => 80, "visual" => 78, "auditori" => 90, "kinestetik" => 89],
            ["nama" => "bella istiqomah", "tgl_lahir" => "2003-10-11", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 90, "pjok" => 30, "visual" => 70, "auditori" => 88, "kinestetik" => 80],
            ["nama" => "Patar Amirulrizki purba", "tgl_lahir" => "2004-09-27", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 40, "visual" => 65, "auditori" => 70, "kinestetik" => 70],
            ["nama" => "Muhammad Fajri Andika Apriyansah", "tgl_lahir" => "2005-1-12", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 76, "pjok" => 79, "visual" => 79, "auditori" => 90, "kinestetik" => 70],
            ["nama" => "Hasan Lutpi", "tgl_lahir" => "2004-08-20", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 77, "pjok" => 80, "visual" => 85, "auditori" => 80, "kinestetik" => 80],
            ["nama" => "Firyal syifa salsabila", "tgl_lahir" => "2003-10-7", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 80, "visual" => 70, "auditori" => 67, "kinestetik" => 65],
            ["nama" => "Dhea Naura Oktaviani", "tgl_lahir" => "2005-11-1", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 79, "visual" => 65, "auditori" => 80, "kinestetik" => 65],
            ["nama" => "Fajar Efriansyah", "tgl_lahir" => "2005-3-9", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 70, "pjok" => 60, "visual" => 78, "auditori" => 78, "kinestetik" => 80],
            ["nama" => "Raffa Fathirawan", "tgl_lahir" => "2005-12-12", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 77, "pjok" => 67, "visual" => 50, "auditori" => 75, "kinestetik" => 80],
            ["nama" => "Aulia Putri", "tgl_lahir" => "2005-02-15", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 75, "pjok" => 79, "visual" => 45, "auditori" => 68, "kinestetik" => 70],
            ["nama" => "indri oviani", "tgl_lahir" => "2005-02-14", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 78, "pjok" => 80, "visual" => 20, "auditori" => 78, "kinestetik" => 80],
            ["nama" => "HAFIZH ALIF FERNANDO", "tgl_lahir" => "2006-1-1", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 85, "pjok" => 78, "visual" => 80, "auditori" => 78, "kinestetik" => 80],
            ["nama" => "alfin muhamad triadi nugroho", "tgl_lahir" => "2004-9-2", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 79, "pjok" => 76, "visual" => 30, "auditori" => 78, "kinestetik" => 75],
            ["nama" => "Muhamad Rizky Satria", "tgl_lahir" => "2003-12-12", "jk" => "Laki-Laki", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 74, "pjok" => 60, "visual" => 40, "auditori" => 73, "kinestetik" => 71],
            ["nama" => "Ajeng Harum Trisasih", "tgl_lahir" => "2004-11-17", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 79, "pjok" => 73, "visual" => 79, "auditori" => 32, "kinestetik" => 76],
            ["nama" => "Riana Desima Ayu Sari", "tgl_lahir" => "2004-08-18", "jk" => "Perempuan", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 81, "pjok" => 81, "visual" => 80, "auditori" => 62, "kinestetik" => 77],
            ["nama" => "Muhammad Rivaldi", "tgl_lahir" => "2004-08-17", "jk" => "Laki-Laki", "kelas" => 11, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 78, "visual" => 80, "auditori" => 80, "kinestetik" => 70],
            ["nama" => "Syarah Ramadhani Widjaya", "tgl_lahir" => "2003-08-15", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 78, "pjok" => 80, "visual" => 79, "auditori" => 82, "kinestetik" => 78],
            ["nama" => "alisa sinta putri utami", "tgl_lahir" => "2003-09-13", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 79, "pjok" => 70, "visual" => 60, "auditori" => 75, "kinestetik" => 73],
            ["nama" => "Putri meilani", "tgl_lahir" => "2003-10-30", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 77, "pjok" => 77, "visual" => 67, "auditori" => 84, "kinestetik" => 80],
            ["nama" => "Muhammad Hanif Abdul jabbar", "tgl_lahir" => "2005-06-28", "jk" => "Laki-Laki", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 80, "pjok" => 80, "visual" => 79, "auditori" => 85, "kinestetik" => 77],
            ["nama" => "aulia rahmawati", "tgl_lahir" => "2005-09-28", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 78, "pjok" => 80, "visual" => 80, "auditori" => 80, "kinestetik" => 75],
            ["nama" => "Septiani Aulia", "tgl_lahir" => "2005-09-22", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 75, "pjok" => 76, "visual" => 78, "auditori" => 80, "kinestetik" => 78],
            ["nama" => "Cita Fauziah Ramadhani", "tgl_lahir" => "2005-12-26", "jk" => "Perempuan", "kelas" => 10, "jurusan" => "PPLG", "mtk" => 68, "pjok" => 70, "visual" => 76, "auditori" => 75, "kinestetik" => 66],
            ["nama" => "Anggraeni Mustikasari", "tgl_lahir" => "2003-05-23", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 78, "pjok" => 70, "visual" => 70, "auditori" => 82, "kinestetik" => 65],
            ["nama" => "Nur intan silviani", "tgl_lahir" => "2003-04-20", "jk" => "Perempuan", "kelas" => 12, "jurusan" => "PPLG", "mtk" => 78, "pjok" => 74, "visual" => 77, "auditori" => 76, "kinestetik" => 74]
        ];

        shuffle($dataset);

        foreach ($dataset as $data) {
            // if skor is not set, calculate it
            if (!isset($data['skor'])) {
                $data['skor'] = ($data['mtk'] + $data['pjok']) / 2;
            }

            // Panggil helper untuk menentukan gaya belajar
            $data['label'] = LearningStyleHelper::determineLearningStyle($data['visual'], $data['auditori'], $data['kinestetik']);

            // Insert data ke database
            \App\Models\Dataset::create($data);
        }



        // faker data for testing
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < rand(394, 666); $i++) {
            $data = [
                "nama"       => $faker->firstName . ' ' . $faker->lastName,
                "jk"         => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                "kelas"      => $faker->randomElement([10, 11, 12]),
                "jurusan"    => $faker->randomElement(['ANIMASI', 'TKJ', 'PPLG']),
                "mtk"        => $faker->numberBetween(40, 100),
                "pjok"       => $faker->numberBetween(60, 100),
            ];

            // Set tgl_lahir based on kelas
            if ($data['kelas'] == 10) {
                $data['tgl_lahir'] = $faker->dateTimeBetween('-16 years', '-15 years')->format('Y-m-d');
            } elseif ($data['kelas'] == 11) {
                $data['tgl_lahir'] = $faker->dateTimeBetween('-17 years', '-16 years')->format('Y-m-d');
            } else {
                $data['tgl_lahir'] = $faker->dateTimeBetween('-18 years', '-17 years')->format('Y-m-d');
            }

            // Ensure the total of visual, auditori, and kinestetik is 16
            $total = 16;
            $data['visual'] = $faker->numberBetween(0, $total);
            $remaining = $total - $data['visual'];
            $data['auditori'] = $faker->numberBetween(0, $remaining);
            $data['kinestetik'] = $remaining - $data['auditori'];

            // if skor is not set, calculate it
            if (!isset($data['skor'])) {
                $data['skor'] = ($data['mtk'] + $data['pjok']) / 2;
            }

            // Panggil helper untuk menentukan gaya belajar
            $data['label'] = LearningStyleHelper::determineLearningStyle($data['visual'], $data['auditori'], $data['kinestetik']);

            // Insert data ke database
            \App\Models\Dataset::create($data);
        }


        // echo count of dataset 
        $count = \App\Models\Dataset::count();
        $this->command->info("Berhasil menambahkan $count data pada tabel dataset");

        // detail data, pisahka antara data yang di seeding dan data yang di faker, tampilkan jumlah saja
        $count_seeding = count($dataset);
        $count_faker = $count - $count_seeding;
        $this->command->info("Seeding data: $count_seeding");
        $this->command->info("Faker data: $count_faker");
    }
}
