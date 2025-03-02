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
                'slug' => Str::slug('Hotelin'),
                'address' => 'Jl. Raya Kalikajar No.1, Wonosobo, Jawa Tengah',
                'description' => 'Hotel dengan fasilitas lengkap dan nyaman.',
                'phone' => '081234567890',
                'image' => 'hotelin.jpg',
            ]
        );

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
                ['slug' => Str::slug($category['name'])],
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
                // Simpan atau update data kamar berdasarkan nama agar tidak tertimpa
                Room::updateOrCreate(
                    ['name' => $room['name']], // Kunci unik sekarang berdasarkan nama kamar
                    [
                        'category_id' => $category->id,
                        'price' => $room['price'],
                        'facilities' => $room['facilities'],
                        'availability_status' => $room['availability_status'],
                        'image' => rand(1, 6) . '.webp',
                        'slug' => Str::slug($room['name']) // Slug tetap ada tapi unik per kamar
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
                'icon' => 'service-icon1.webp'
            ],
            [
                'name' => 'Restoran',
                'description' => 'Nikmati beragam hidangan lezat dengan cita rasa terbaik di restoran kami. Sajian spesial untuk melengkapi pengalaman menginap Anda di Hotelin.',
                'image' => 'service2.webp',
                'icon' => 'service-icon2.webp'
            ],
            [
                'name' => 'Kolam Renang',
                'description' => 'Rasakan kesegaran dengan berenang di kolam renang kami, tempat yang sempurna untuk bersantai dan menikmati suasana Hotelin.',
                'image' => 'service3.webp',
                'icon' => 'service-icon3.webp'
            ],
            [
                'name' => 'Ruang Pertemuan',
                'description' => 'Tempat ideal untuk rapat, seminar, dan acara penting Anda, dengan fasilitas lengkap dan suasana yang nyaman di Hotelin.',
                'image' => 'service4.webp',
                'icon' => 'service-icon4.webp'
            ],
        ];

        foreach ($facilities as $f){
            HotelFaicilities::updateOrCreate(
                [
                    'name' => $f['name'],
                    'description' => $f['description'],
                    'image' => $f['image'],
                    'icon' => $f['icon'],
                    'slug' => Str::slug($f['name']),
                ]
            );
        }
    }
}