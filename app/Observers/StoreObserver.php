<?php

namespace App\Observers;
// Suggested code may be subject to a license. Learn more: ~LicenseLog:1567480894.
use App\Models\Store;

class StoreObserver
{
    public function creating(Store $store): void
    {
        $store->slug = str()->slug($store->name);
    }
}
