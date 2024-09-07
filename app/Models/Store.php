<?php

namespace App\Models;

use App\Enums\StatusStore;
use Illuminate\Database\Eloquent\Relations\BelongsTo;;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use App\Observers\StoreObserver;

#[ObservedBy(StoreObserver::class)]
class Store extends Model
{
    //isi table
    protected $fillable =[
        'logo',
        'name',
        'slug',
        'description',
        'status',
    ];

    //relasi dengan table users
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected function casts(): array
    {
        return [
           'status' => StatusStore::class,
        ];
    }

}
