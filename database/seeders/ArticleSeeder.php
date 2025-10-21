<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article; // Import model Article
use Illuminate\Support\Str; // Import Str untuk slug

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Mengapa Literasi Penting di Era Digital',
            'slug' => Str::slug('Mengapa Literasi Penting di Era Digital'),
            'author' => 'Ahmad Budi',
            'featured_image' => '/storage/article_images/dummy_1.jpg', // Ganti dengan path gambar yang Anda inginkan
            'synopsis' => 'Dalam artikel ini, kita akan membahas peran krusial literasi dalam menghadapi tantangan dan peluang di dunia digital yang terus berkembang pesat.',
            'body' => '<p>Literasi bukan hanya tentang membaca dan menulis, tetapi juga tentang kemampuan memahami, mengevaluasi, dan menciptakan informasi di berbagai format. Di era digital ini, di mana informasi mengalir tanpa henti, kemampuan literasi menjadi semakin vital.</p><p>Kita dihadapkan pada banjir informasi, baik yang akurat maupun disinformasi. Tanpa literasi digital yang kuat, individu rentan terhadap manipulasi dan kesulitan dalam membuat keputusan yang tepat.</p>',
            'likes' => 120,
            'comments' => 25,
            'published_at' => now()->subDays(5), // 5 hari yang lalu
        ]);

        Article::create([
            'title' => 'Tips Memulai Hobi Membaca Buku',
            'slug' => Str::slug('Tips Memulai Hobi Membaca Buku'),
            'author' => 'Siti Aminah',
            'featured_image' => '/storage/article_images/dummy_2.jpg', // Ganti dengan path gambar yang Anda inginkan
            'synopsis' => 'Bagi Anda yang ingin menjadikan membaca sebagai kebiasaan, artikel ini menyajikan tips praktis untuk memulai dan mempertahankan hobi membaca yang menyenangkan.',
            'body' => '<p>Membaca adalah gerbang menuju dunia pengetahuan dan imajinasi. Namun, bagi sebagian orang, memulai hobi membaca bisa terasa menakutkan.</p><p>Ada beberapa tips sederhana yang bisa Anda coba: mulai dari buku yang tipis, temukan genre favorit Anda, sisihkan waktu khusus, dan jangan ragu untuk berhenti jika buku tidak cocok. Nikmati setiap prosesnya!</p>',
            'likes' => 85,
            'comments' => 10,
            'published_at' => now()->subDays(2), // 2 hari yang lalu
        ]);

        // Opsional: Anda bisa tambahkan lebih banyak dummy data jika perlu.
        // Pastikan Anda memiliki gambar di folder public/storage/article_images
        // atau ganti featured_image dengan URL placeholder online jika tidak ada gambar lokal.
        // Contoh URL placeholder online: 'https://source.unsplash.com/random/800x600?book,reading'
    }
}