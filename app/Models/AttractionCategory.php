<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AttractionCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'attraction_categories';
    protected $guarded = ['id'];


    // filter
    public function scopeFilter($query, array $filter){
        $query->when($filter['search'] ?? false, function($query, $search){
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('code_category_attraction', 'like', '%' . $search . '%');
        });
    }


    protected static function boot()
    {
        parent::boot();

        // saat kategori baru dibuat
        static::creating(function($AttractionCategory){
            $AttractionCategory->code_category_attraction = self::generateCodeCategory($AttractionCategory->name);
        });

        // saat kategori diupdate
        static::updating(function($AttractionCategory){
            // cek jika nama kategori diubah
            if($AttractionCategory->isDirty('name')){
                $newCode = self::generateCodeCategory($AttractionCategory->name);

                // jika kode berubah, update semua wisata yang menggunakan kode lama
                $oldCode = $AttractionCategory->getOriginal('code_category_attraction');
                if($oldCode !== $newCode){
                    Attraction::where('category_id', $AttractionCategory->id)->update([
                        'code_attraction' => DB::raw("REPLACE(code_attraction, '$oldCode', '$newCode')")
                    ]);
                    $AttractionCategory->code_category_attraction = $newCode;
                }
            }
        });
    }

    // fungsi untuk generate kode kategori unik
    protected static function generateCodeCategory($name)
    {
        $code = strtoupper(
            collect(explode(' ', $name))
            ->map(fn($word) => substr($word, 0, 3))
            ->join('')
        );

        $latestCategory = self::where('code_category_attraction', 'Like', $code . '%')
            ->orderBy('code_category_attraction', 'desc')
            ->first();

            if($latestCategory){
                preg_match('/\d+$/', $latestCategory->code_category_attraction, $matches);
                $newNumber = isset($matches[0]) ? ((int) $matches[0] + 1) : 1;
            }else{
                $newNumber = 1;
            }

            return $code . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

    
}
