<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Booking;
use App\Models\Room;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Kirim ke semua view yang menggunakan layout admin
        view::composer('admin.layout.main', function($view){

            $data = [
                'pendingBookings' => Booking::where('status', 'pending')->latest()->paginate(10)->withQueryString(),
                'pendingBookingCount' => Booking::where('status', 'pending')->count(),
            ];

            $view->with($data);
        });

    }
}
