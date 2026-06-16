<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@mail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Seed Settings
        $settings = [
            'hero_badge' => 'Pranata Komputer @ Dinas Kominfo',
            'hero_title' => 'Membangun Layanan Teknologi & Program Digital',
            'hero_description' => 'Saya adalah seorang Pranata Komputer di Dinas Kominfo dengan latar belakang pelatihan pemrograman. Berpengalaman dalam mengelola sistem TI pemerintah, mengoptimalkan infrastruktur digital, serta merancang aplikasi web berbasis Laravel.',
            'about_bio_1' => 'Saya adalah seorang Pranata Komputer yang mengabdikan diri di Dinas Komunikasi dan Informatika (Kominfo). Dengan latar belakang keahlian administrasi TI dan jaringan komputer pemerintah, saya mengintegrasikan keandalan sistem dengan efisiensi pemrograman.',
            'about_bio_2' => 'Setelah menyelesaikan pelatihan pemrograman intensif, saya fokus membangun aplikasi web dinamis dan kustom untuk menunjang keterbukaan informasi, pelayanan publik digital, dan efisiensi birokrasi pemerintahan daerah.',
            'stats_experience' => '5+',
            'stats_projects' => '40+',
            'stats_satisfaction' => '100%',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // Convert default local profile photo to base64 for seeding
        $photoPath = public_path('images/foto-profil.png');
        if (File::exists($photoPath)) {
            $base64 = 'data:image/png;base64,' . base64_encode(File::get($photoPath));
            Setting::set('profile_photo', $base64);
        }

        // 3. Seed Skills
        $skills = [
            // Backend
            ['name' => 'Laravel / PHP', 'category' => 'backend', 'percentage' => 95],
            ['name' => 'Node.js / Express', 'category' => 'backend', 'percentage' => 80],
            ['name' => 'MySQL / PostgreSQL / SQLite', 'category' => 'backend', 'percentage' => 90],
            // Frontend
            ['name' => 'React.js / Vue.js', 'category' => 'frontend', 'percentage' => 85],
            ['name' => 'JavaScript / TypeScript', 'category' => 'frontend', 'percentage' => 88],
            ['name' => 'TailwindCSS / Bootstrap', 'category' => 'frontend', 'percentage' => 95],
            // DevOps
            ['name' => 'Git / GitHub Actions / Gitlab CI', 'category' => 'devops', 'percentage' => 90],
            ['name' => 'Vercel / Netlify / Heroku', 'category' => 'devops', 'percentage' => 85],
            ['name' => 'Docker / Laradock', 'category' => 'devops', 'percentage' => 75],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(
                ['name' => $skill['name']],
                ['category' => $skill['category'], 'percentage' => $skill['percentage']]
            );
        }

        // 4. Seed Projects
        $projects = [
            [
                'title' => 'E-Commerce Premium',
                'description' => 'Platform belanja online dengan integrasi Payment Gateway otomatis, modul manajemen inventaris lengkap, serta visual dasbor yang responsif.',
                'tags' => 'Laravel 11, Vue.js',
                'github_url' => '#',
                'demo_url' => '#',
            ],
            [
                'title' => 'SaaS Analytic Platform',
                'description' => 'Aplikasi pemantau performa bisnis real-time, menyajikan pengolahan bagan data menggunakan websocket dan caching data cepat berbasis Redis.',
                'tags' => 'Laravel API, Next.js',
                'github_url' => '#',
                'demo_url' => '#',
            ],
            [
                'title' => 'Task Collaboration Tool',
                'description' => 'Aplikasi kolaborasi tim bergaya Kanban untuk pelacakan alur kerja yang dinamis, dilengkapi dengan enkripsi data dan sistem notifikasi internal.',
                'tags' => 'Laravel 11, Tailwind',
                'github_url' => '#',
                'demo_url' => '#',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                [
                    'description' => $project['description'],
                    'tags' => $project['tags'],
                    'github_url' => $project['github_url'],
                    'demo_url' => $project['demo_url'],
                ]
            );
        }

        // 5. Seed Experiences
        $experiences = [
            [
                'period' => '2023 - Sekarang',
                'title' => 'Lead Fullstack Developer',
                'company' => 'Tech Corp',
                'description' => 'Memimpin pengembangan ulang platform e-commerce menggunakan Laravel 10/11 dan React, berhasil meningkatkan kecepatan muat halaman sebesar 40% dan mengoptimalkan retensi pengguna.',
                'type' => 'work',
            ],
            [
                'period' => '2021 - 2023',
                'title' => 'Senior Web Developer',
                'company' => 'Pixel Agency',
                'description' => 'Membangun aplikasi SaaS custom, mengintegrasikan sistem pembayaran Stripe, gerbang notifikasi Twilio, dan menyiapkan deployment otomatis dengan GitHub Actions ke AWS.',
                'type' => 'work',
            ],
            [
                'period' => '2017 - 2021',
                'title' => 'S1 Teknik Informatika',
                'company' => 'Universitas Global',
                'description' => 'Lulus dengan IPK 3.82. Fokus pada Rekayasa Perangkat Lunak, Struktur Data, dan Pemrograman Terdistribusi.',
                'type' => 'education',
            ],
            [
                'period' => 'Sertifikasi',
                'title' => 'AWS Certified Developer',
                'company' => 'Amazon Web Services',
                'description' => '',
                'type' => 'certification',
            ],
            [
                'period' => 'Sertifikasi',
                'title' => 'Laravel Certified Developer',
                'company' => 'Laravel LLC',
                'description' => '',
                'type' => 'certification',
            ],
        ];

        foreach ($experiences as $exp) {
            Experience::updateOrCreate(
                ['title' => $exp['title'], 'company' => $exp['company']],
                [
                    'period' => $exp['period'],
                    'description' => $exp['description'],
                    'type' => $exp['type'],
                ]
            );
        }
    }
}
