<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\RoomCategory;
use App\Models\Room;
use App\Models\HeroSection;
use App\Models\HotelFaicilities;
use App\Models\Gallery;
use App\Models\Role;
use App\Models\PaymentMethod;
use Illuminate\Support\Str;

class HotelSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk Hotels
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

        PaymentMethod::updateOrCreate([
            'bank_name' => 'BRI',
            'account_number' => '77345689012',
            'account_holder' => 'Hotelin',
            'qris_image' => 'qrcode.jpg'
        ]);

        // Seeder untuk Room Categories

        $categories = [
            [
                'name' => 'Deluxe',
                'image' => 'room1.webp',
                'description' => 'Kamar nyaman dengan fasilitas lengkap untuk pengalaman menginap terbaik.',
                'base_price' => 500000,
                'max_guests' => 2,
                'status' => true
            ],
            [
                'name' => 'Superior',
                'image' => 'room2.webp',
                'description' => 'Kamar dengan ruang lebih luas dan fasilitas tambahan.',
                'base_price' => 700000,
                'max_guests' => 3,
                'status' => true
            ],
            [
                'name' => 'Suite',
                'image' => 'room3.webp',
                'description' => 'Kamar eksklusif dengan pemandangan indah dan fasilitas premium.',
                'base_price' => 1200000,
                'max_guests' => 4,
                'status' => true
            ],
        ];

        foreach ($categories as $category){
            RoomCategory::updateOrCreate(
                ['code_category_room' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'image' => $category['image'],
                    'description' => $category['description'],
                    'base_price' => $category['base_price'],
                    'max_guests' => $category['max_guests'],
                    'status' => $category['status']
                ]
                );
        }

        // Seeder role user
        $roleUser = [
            ['role_name' => 'admin'],
            ['role_name' => 'staff'],
            ['role_name' => 'customer']
        ];

        foreach ($roleUser as $role){
            Role::updateOrCreate(
            [
                'role_name' => $role['role_name']
            ]);
        }


        // Seeder untuk Rooms
        $roomData = [
            ['name'=> 'kamar 1', 'category' => 'Deluxe', 'price' => 500000, 'facilities' => 'AC, TV, WiFi, Breakfast', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 2', 'category' => 'Superior', 'price' => 700000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar', 'availability_status' => 'available', 'image' => 'room2.webp'],
            ['name'=> 'kamar 3', 'category' => 'Suite', 'price' => 1200000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar, Jacuzzi', 'availability_status' => 'available', 'image' => 'room3.webp'],
            ['name'=> 'kamar 4', 'category' => 'Deluxe', 'price' => 500000, 'facilities' => 'AC, TV, WiFi, Breakfast', 'availability_status' => 'available', 'image' => 'room3.webp'],
            ['name'=> 'kamar 5', 'category' => 'Suite', 'price' => 1200000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar, Jacuzzi', 'availability_status' => 'available', 'image' => 'room2.webp'],
            ['name'=> 'kamar 6', 'category' => 'Superior', 'price' => 700000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 7', 'category' => 'Deluxe', 'price' => 500000, 'facilities' => 'AC, TV, WiFi, Breakfast', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 8', 'category' => 'Suite', 'price' => 1200000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar, Jacuzzi', 'availability_status' => 'available', 'image' => 'room2.webp'],
            ['name'=> 'kamar 9', 'category' => 'Superior', 'price' => 700000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar', 'availability_status' => 'available', 'image' => 'room3.webp'],
            ['name'=> 'kamar 10', 'category' => 'Deluxe', 'price' => 500000, 'facilities' => 'AC, TV, WiFi, Breakfast', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 11', 'category' => 'Suite', 'price' => 1200000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar, Jacuzzi', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 12', 'category' => 'Superior', 'price' => 700000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar', 'availability_status' => 'available', 'image' => 'room2.webp'],
            ['name'=> 'kamar 13', 'category' => 'Deluxe', 'price' => 500000, 'facilities' => 'AC, TV, WiFi, Breakfast', 'availability_status' => 'available', 'image' => 'room3.webp'],
            ['name'=> 'kamar 14', 'category' => 'Suite', 'price' => 1200000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar, Jacuzzi', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 15', 'category' => 'Superior', 'price' => 700000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar', 'availability_status' => 'available', 'image' => 'room2.webp'],
            ['name'=> 'kamar 16', 'category' => 'Deluxe', 'price' => 500000, 'facilities' => 'AC, TV, WiFi, Breakfast', 'availability_status' => 'available', 'image' => 'room3.webp'],
            ['name'=> 'kamar 17', 'category' => 'Suite', 'price' => 1200000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar, Jacuzzi', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 18', 'category' => 'Superior', 'price' => 700000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar', 'availability_status' => 'available', 'image' => 'room2.webp'],
            ['name'=> 'kamar 19', 'category' => 'Deluxe', 'price' => 500000, 'facilities' => 'AC, TV, WiFi, Breakfast', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 20', 'category' => 'Suite', 'price' => 1200000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar, Jacuzzi', 'availability_status' => 'available', 'image' => 'room3.webp'],
        ];

        foreach ($roomData as $room) {
            // Cari kategori berdasarkan nama
            $category = RoomCategory::where('name', $room['category'])->first();
        
            if ($category) {
                // Ambil prefix dari kode kategori
                $prefix = strtoupper($category->code_category_room);
        
                // Hitung jumlah kamar yang sudah ada dalam kategori ini
                $roomCount = Room::where('category_id', $category->id)->count() + 1;
        
                // Format code_room jadi "DEL001", "DEL002", dst.
                $codeRoom = $prefix . str_pad($roomCount, 3, '0', STR_PAD_LEFT);
        
                Room::updateOrCreate(
                    ['name' => $room['name']],
                    [
                        'category_id' => $category->id,
                        'price' => $room['price'],
                        'facilities' => $room['facilities'],
                        'availability_status' => $room['availability_status'],
                        'image' => rand(1, 6) . '.webp',
                        'code_room' => $codeRoom, // Kode unik
                    ]
                );
            } else {
                // Jika kategori tidak ditemukan, tampilkan pesan untuk debugging
                \Illuminate\Support\Facades\Log::warning("Kategori tidak ditemukan: " . $room['category']);

            }
        }
        
        

        // Data Seeder untuk Hero Section
        $HeroSection = [
            [
                'title' => 'Welcome to Hotelin',
                'subtitle' => 'Nikmati kenyamanan dan fasilitas terbaik bersama kami.',
                'button_text' => 'Pesan Sekarang',
                'button_link' => '/booking',
                'image' => 'slider1.webp',],
            [
                'title' => 'Welcome to Hotelin',
                'subtitle' => 'Nikmati kenyamanan dan fasilitas terbaik bersama kami.',
                'button_text' => 'Pesan Sekarang',
                'button_link' => '/booking',
                'image' => 'slider2.webp',],
        ];
        // Seeder untuk Hero Section
       
        foreach ($HeroSection as $hero) {
            HeroSection::updateOrCreate(
               [
                'title' => $hero['title'],
                'subtitle' => $hero['subtitle'],
                'button_text' => $hero['button_text'],
                'button_link' => $hero['button_link'],
                'image' => $hero['image']
               ]

            );
        }


        // seeder untuk Hotel Facilities
        $facilities = [
            [
                'name' => 'Spa, Kecantikan & Kesehatan',
                'description' => 'Nikmati relaksasi spa, perawatan kecantikan, dan fasilitas kebugaran untuk menjaga tubuh tetap sehat selama menginap di Hotelin.',
                'image' => 'service1.webp',
            ],
            [
                'name' => 'Restoran',
                'description' => 'Nikmati beragam hidangan lezat dengan cita rasa terbaik di restoran kami. Sajian spesial untuk melengkapi pengalaman menginap Anda di Hotelin.',
                'image' => 'service2.webp',
            ],
            [
                'name' => 'Kolam Renang',
                'description' => 'Rasakan kesegaran dengan berenang di kolam renang kami, tempat yang sempurna untuk bersantai dan menikmati suasana Hotelin.',
                'image' => 'service3.webp',
            ],
            [
                'name' => 'Ruang Pertemuan',
                'description' => 'Tempat ideal untuk rapat, seminar, dan acara penting Anda, dengan fasilitas lengkap dan suasana yang nyaman di Hotelin.',
                'image' => 'service4.webp',
            ],
        ];

        foreach ($facilities as $f){
            HotelFaicilities::updateOrCreate(
                [
                    'name' => $f['name'],
                    'description' => $f['description'],
                    'image' => $f['image'],
                ]
            );
        }

                $galleryData = [
                    [
                        'title' => 'Pemandangan Indah',
                        'description' => 'Foto pemandangan indah dengan gunung dan langit biru.',
                    ],
                    [
                        'title' => 'Pantai Eksotis',
                        'description' => 'Gambar pantai dengan pasir putih dan air laut jernih.',
                    ],
                    [
                        'title' => 'Hutan Hijau',
                        'description' => 'Pemandangan hutan hijau yang asri dan sejuk.',
                    ],
                    [
                        'title' => 'Pegunungan Bersalju',
                        'description' => 'Pemandangan pegunungan tinggi yang diselimuti salju.',
                    ],
                    [
                        'title' => 'Kota Malam Hari',
                        'description' => 'Pemandangan gedung-gedung tinggi dengan lampu kota yang menyala di malam hari.',
                    ],
                    [
                        'title' => 'Sawah yang Hijau',
                        'description' => 'Pemandangan sawah hijau yang luas dengan petani yang sedang bekerja.',
                    ],
                    [
                        'title' => 'Air Terjun Alami',
                        'description' => 'Keindahan air terjun alami dengan aliran air yang jernih.',
                    ],
                    [
                        'title' => 'Danau Biru',
                        'slug' => Str::slug('Danau Biru'),
                        'description' => 'Pemandangan danau biru yang tenang dan damai.',
                    ],
                ];
                

        foreach ($galleryData as $g){
            Gallery::updateOrCreate(
                [
                    'title' => $g['title'],
                    'description' => $g['description'],
                    'image' => rand(1,6). '.webp',
                ]
            );
        }



    }
}