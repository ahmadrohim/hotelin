<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\RoomCategory;
use App\Models\Room;
use App\Models\HeroSection;
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
            ['name' => 'Deluxe', 'image' => 'room1.webp'],
            ['name' => 'Superior', 'image' => 'room2.webp'],
            ['name' => 'Suite', 'image' => 'room3.webp'],
        ];

        foreach ($categories as $category) {
            RoomCategory::updateOrCreate(
                ['slug' => Str::slug($category['name'])],
                [
                    'name' => $category['name'],
                    'image' => $category['image'],
                ]
            );
        }

        // Seeder untuk Rooms
        $roomData = [
            ['name'=> 'kamar 1','category' => 'Deluxe', 'price' => 500000, 'facilities' => 'AC, TV, WiFi, Breakfast', 'availability_status' => 'available', 'image' => 'room1.webp'],
            ['name'=> 'kamar 2','category' => 'Superior', 'price' => 700000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar', 'availability_status' => 'available', 'image' => 'room2.webp'],
            ['name'=> 'kamar3', 'category' => 'Suite', 'price' => 1200000, 'facilities' => 'AC, TV, WiFi, Breakfast, Mini Bar, Jacuzzi', 'availability_status' => 'available', 'image' => 'room3.webp'],
        ];

        foreach ($roomData as $room) {
            $category = RoomCategory::where('name', $room['category'])->first();
            if ($category) {
                Room::updateOrCreate(
                    ['slug' => Str::slug($room['category'])],
                    [
                        'name' => $room['name'],
                        'category_id' => $category->id,
                        'price' => $room['price'],
                        'facilities' => $room['facilities'],
                        'availability_status' => $room['availability_status'],
                        'image' => $room['image'],
                    ]
                );
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

    }
}