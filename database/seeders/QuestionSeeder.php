<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $q = [
            "Nilai Matematika terendah yang pernah di dapat..." => [
                "type"      => "number"
            ],
            "Nilai PJOK terendah yang pernah didapat..." => [
                "type"      => "number"
            ],
            "Ketika berbicara, kecenderungan gaya bicara saya..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Saya sering menggunakan isyarat tangan atau ekspresi wajah untuk mendukung pembicaraan saya",
                    "auditory"    => "Saya berbicara dengan cepat dan berirama, menjaga intonasi suara agar terdengar dinamis",
                    "kinesthetic" => "Saya berbicara dengan lambat sambil bergerak atau melakukan gerakan tubuh saat menyampaikan sesuatu"
                ],
            ],

            "Saya ..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Mampu merencanakan dan mengatur kegiatan jangka panjang dengan baik",
                    "auditory"    => "Mampu mengulang dan menirukan nada, perubahan, dan warna suara",
                    "kinesthetic" => "Mahir dalam mengerjakan puzzle, teka-teki, menyusun potongan-potongan gambar"
                ],
            ],

            "Saya dapat mengingat dengan baik informasi yang..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Tertulis di papan tulis atau yang diberikan melalui tugas membaca",
                    "auditory"    => "Disampaikan melalui penjelasan guru, diskusi, atau rekaman",
                    "kinesthetic" => "Diberikan dengan cara menuliskannya berkali-kali"
                ],
            ],

            "Saya menghafal sesuatu..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Dengan membayangkannya",
                    "auditory"    => "Dengan mengucapkannya dengan suara yang keras",
                    "kinesthetic" => "Sambil berjalan dan melihat-lihat keadaan sekeliling"
                ],
            ],

            "Saya merasa sulit..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Mengingat perintah lisan kecuali jika dituliskan",
                    "auditory"    => "Menulis tetapi pandai bercerita",
                    "kinesthetic" => "Duduk tenang untuk waktu yang lama"
                ],
            ],

            "Saya lebih suka..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Membaca daripada dibacakan",
                    "auditory"    => "Mendengar daripada membaca",
                    "kinesthetic" => "Menggunakan model dan praktek atau praktikum"
                ],
            ],

            "Saya suka..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Mencoret-coret selama menelepon, mendengarkan musik, atau menghadiri rapat",
                    "auditory"    => "Membaca keras-keras dan mendengarkan musik/pembicaraan",
                    "kinesthetic" => "Mengetuk-ngetuk pena, jari, atau kaki saat mendengarkan musik/pembicaraan"
                ],
            ],

            "Saya lebih suka melakukan..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Demonstrasi daripada berpidato",
                    "auditory"    => "Diskusi dan berbicara panjang lebar",
                    "kinesthetic" => "Berolahraga dan kegiatan fisik lainnya"
                ],
            ],

            "Saya lebih menyukai..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Seni rupa daripada musik",
                    "auditory"    => "Musik daripada seni rupa",
                    "kinesthetic" => "Olahraga dan kegiatan fisik lainnya"
                ],
            ],

            "Ketika mengerjakan sesuatu, saya selalu..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Mengikuti petunjuk dan gambar yang disediakan",
                    "auditory"    => "Membicarakan dengan orang lain atau berbicara sendiri keras-keras",
                    "kinesthetic" => "Mencari tahu cara kerjanya sambil mengerjakannya"
                ],
            ],

            "Konsentrasi saya terganggu oleh..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Ketidakteraturan atau gerakan",
                    "auditory"    => "suara atau keributan",
                    "kinesthetic" => "Kegiatan di sekeliling"
                ],
            ],

            "Saya lebih mudah belajar melalui kegiatan..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Membaca",
                    "auditory"    => "Mendengarkan dan berdiskusi",
                    "kinesthetic" => "Praktek atau praktikum"
                ],
            ],

            "Saya berbicara dengan..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Singkat dan tidak senang mendengarkan pembicaraan panjang",
                    "auditory"    => "Cepat dan senang mendengarkan",
                    "kinesthetic" => "Menggunakan isyarat tubuh dan gerakan-gerakan ekspresif"
                ],
            ],

            "Untuk mengetahui suasana hati seseorang, saya..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Melihat ekspresi wajahnya",
                    "auditory"    => "Mendengarkan nada suara",
                    "kinesthetic" => "Memperhatikan gerakan badannya"
                ],
            ],

            "Untuk mengisi waktu luang, saya lebih suka..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Menonton televisi atau menyaksikan pertunjukan",
                    "auditory"    => "Mendengarkan radio, musik, atau membaca",
                    "kinesthetic" => "Melakukan permainan atau bekerja dengan menggunakan tangan"
                ],
            ],

            "Ketika mengajarkan sesuatu kepada orang lain, saya lebih suka..." => [
                "type"      => "choice",
                "answeres"  => [
                    "visual"      => "Menunjukkannya",
                    "auditory"    => "Menceritakannya",
                    "kinesthetic" => "Mendemonstrasikannya dan meminta mereka untuk mencobanya"
                ],
            ]
        ];

        foreach ($q as $key => $question) {
            $qInput = \App\Models\Question::create([
                'question' => $key,
                'type'     => $question['type']
            ]);

            if ($question['type'] == 'number') {
                continue;
            }

            foreach ($question['answeres'] as $type => $answer) {
                $lId = \App\Models\LearningStyle::where('type', $type)->first()->id;

                \App\Models\Answer::create([
                    'question_id'       => $qInput->id,
                    'answer'            => $answer,
                    'learning_style_id' => $lId
                ]);
            }
        }
    }
}
