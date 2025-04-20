<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;
use App\Models\Role;
use App\Models\HeroSection;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Room;
use App\Models\Feedback;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{
    public function run()
    {
        // Seeder untuk Hotel
        Hotel::updateOrCreate(
            ['email' => 'info@hotelin.com'],
            [
                'name' => 'Hotelin',
                'address' => 'Jl. Raya Kalikajar No.1, Wonosobo, Jawa Tengah',
                'description' => 'Hotel dengan fasilitas lengkap dan nyaman.',
                'phone' => '081234567890',
                'image' => 'hotelin.jpg',
            ]
        );

        // Seeder Role User
        $roleUser = ['admin', 'staff', 'customer'];

        foreach ($roleUser as $roleName) {
            Role::updateOrCreate([
                'role_name' => $roleName
            ]);
        }

        // Seeder Hero Section
        $heroSections = [
            [
                'title' => 'Welcome to Hotelin',
                'subtitle' => 'Nikmati kenyamanan dan fasilitas terbaik bersama kami.',
                'button_text' => 'Pesan Sekarang',
                'button_link' => '/booking',
                'image' => 'slider1.webp',
            ],
            [
                'title' => 'Welcome to Hotelin',
                'subtitle' => 'Nikmati kenyamanan dan fasilitas terbaik bersama kami.',
                'button_text' => 'Pesan Sekarang',
                'button_link' => '/booking',
                'image' => 'slider2.webp',
            ],
        ];

        foreach ($heroSections as $hero) {
            HeroSection::updateOrCreate([
                'title' => $hero['title'],
                'subtitle' => $hero['subtitle'],
                'button_text' => $hero['button_text'],
                'button_link' => $hero['button_link'],
                'image' => $hero['image']
            ]);
        }

        // Seeder Facilities
        $facilities = [
            'AC', 'Wi-Fi', 'TV', 'Kamar Mandi Dalam', 'Fridge', 'Coffee Maker', 'Kulkas'
        ];

        foreach ($facilities as $facility) {
            Facility::updateOrCreate(['name' => $facility]);
        }

        // Seeder Gallery
        $galleryData = [
            ['title' => 'Pemandangan Indah', 'description' => 'Foto pemandangan indah dengan gunung dan langit biru.'],
            ['title' => 'Pantai Eksotis', 'description' => 'Gambar pantai dengan pasir putih dan air laut jernih.'],
            ['title' => 'Hutan Hijau', 'description' => 'Pemandangan hutan hijau yang asri dan sejuk.'],
            ['title' => 'Pegunungan Bersalju', 'description' => 'Pemandangan pegunungan tinggi yang diselimuti salju.'],
            ['title' => 'Kota Malam Hari', 'description' => 'Pemandangan gedung-gedung tinggi dengan lampu kota yang menyala di malam hari.'],
            ['title' => 'Sawah yang Hijau', 'description' => 'Pemandangan sawah hijau yang luas dengan petani yang sedang bekerja.'],
            ['title' => 'Air Terjun Alami', 'description' => 'Keindahan air terjun alami dengan aliran air yang jernih.'],
            ['title' => 'Danau Biru', 'description' => 'Pemandangan danau biru yang tenang dan damai.'],
        ];

        foreach ($galleryData as $g) {
            Gallery::updateOrCreate([
                'title' => $g['title'],
                'description' => $g['description'],
                'image' => rand(1, 6) . '.webp',
            ]);
        }

        // Kamar 1 - Deluxe Room
        $room1 = Room::create([
            'name' => 'Deluxe Room',
            'code_room' => 'ROOM' . now()->format('Ymd') . '_' . strtoupper(Str::random(6)),
            'price' => 750000,
            'max_guest' => 2,
            'description' => 'Kamar Deluxe dengan pemandangan indah.',
            'bed_type' => 'Queen',
        ]);
        $room1->facilities()->attach(Facility::whereIn('name', ['AC', 'Wi-Fi', 'TV'])->get());
        $room1->images()->createMany([
            ['image' => '6.webp'],
            ['image' => '5.webp'],
        ]);

        // Kamar 2 - Family Room
        $room2 = Room::create([
            'name' => 'Family Room',
            'code_room' => 'ROOM' . now()->format('Ymd') . '_' . strtoupper(Str::random(6)),
            'price' => 950000,
            'max_guest' => 4,
            'description' => 'Kamar luas cocok untuk keluarga.',
            'bed_type' => 'King',
        ]);
        $room2->facilities()->attach(Facility::whereIn('name', ['AC', 'Wi-Fi', 'TV', 'Kulkas'])->get());
        $room2->images()->createMany([
            ['image' => '4.webp'],
            ['image' => '3.webp'],
        ]);

        // Kamar 3 - Standard Room
        $room3 = Room::create([
            'name' => 'Standard Room',
            'code_room' => 'ROOM' . now()->format('Ymd') . '_' . strtoupper(Str::random(6)),
            'price' => 500000,
            'max_guest' => 2,
            'description' => 'Kamar sederhana dengan fasilitas standar.',
            'bed_type' => 'Twin',
        ]);
        $room3->facilities()->attach(Facility::whereIn('name', ['Wi-Fi', 'TV'])->get());
        $room3->images()->createMany([
            ['image' => '1.webp'],
            ['image' => '2.webp'],
        ]);


        DB::table('attraction_categories')->insert([
            [
                'name' => 'Gunung',
                'code_category_attraction' => 'gunung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Danau',
                'code_category_attraction' => 'danau',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tempat Sejarah',
                'code_category_attraction' => 'tempat-sejarah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wisata Alam',
                'code_category_attraction' => 'wisata-alam',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        

        // Menambahkan wisata sekitar hotel
       DB::table('attractionshotel')->insert([
    [
        'category_id' => 1, // Gunung
        'name' => 'Gunung Dieng',
        'code_attraction' => 'DGN001',
        'description' => 'Nikmati keindahan alam dan panorama dari puncak Gunung Dieng.',
        'image' => '5.webp', // Pastikan gambar ada di folder /images/attractions/
        'map_link' => 'https://www.google.com/maps/search/Gunung+Dieng',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'category_id' => 2, // Danau
        'name' => 'Danau Telaga Warna',
        'code_attraction' => 'DTW002',
        'description' => 'Danau dengan air berwarna-warni yang sangat indah, cocok untuk berfoto.',
        'image' => '1.webp',
        'map_link' => 'https://www.google.com/maps/search/Telaga+Warna+Dieng',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'category_id' => 3, // Tempat Sejarah
        'name' => 'Candi Arjuna',
        'code_attraction' => 'CAJ003',
        'description' => 'Candi bersejarah yang ada di Dieng, yang memiliki nilai sejarah tinggi.',
        'image' => '4.webp',
        'map_link' => 'https://www.google.com/maps/search/Candi+Arjuna+Dieng',
        'created_at' => now(),
        'updated_at' => now()
    ],
    [
        'category_id' => 4, // Wisata Alam
        'name' => 'Kawah Sikidang',
        'code_attraction' => 'KSK004',
        'description' => 'Kawah aktif dengan pemandangan alam yang menakjubkan dan udara yang segar.',
        'image' => '3.webp',
        'map_link' => 'https://www.google.com/maps/search/Kawah+Sikidang',
        'created_at' => now(),
        'updated_at' => now()
    ]
]);


$feedbacks = [
    [
        'name' => 'Budi Santoso',
        'email' => 'budi@example.com',
        'message' => 'Pelayanan yang sangat ramah dan kamar yang bersih. Sangat puas menginap di Hotelin!',
    ],
    [
        'name' => 'Rina Putri',
        'email' => 'rina@example.com',
        'message' => 'Tempatnya nyaman, dekat dengan tempat wisata. Rekomendasi banget!',
    ],
    [
        'name' => 'Dedi Kurniawan',
        'email' => 'dedi@example.com',
        'message' => 'Saya dan keluarga sangat menikmati pengalaman menginap di sini. Terima kasih Hotelin!',
    ],
    [
        'name' => 'Siti Rahma',
        'email' => 'siti@example.com',
        'message' => 'Staf hotel sangat membantu dan ramah. Lokasi juga strategis!',
    ],
    [
        'name' => 'Ahmad Fauzi',
        'email' => 'ahmad@example.com',
        'message' => 'Check-in cepat, fasilitas lengkap, dan suasana tenang. Top!',
    ],
    [
        'name' => 'Maya Dewi',
        'email' => 'maya@example.com',
        'message' => 'Kamar luas, bersih, dan pemandangannya bagus. Akan kembali lagi ke sini!',
    ],
];

foreach ($feedbacks as $data) {
    Feedback::create($data);
}

    }
}
