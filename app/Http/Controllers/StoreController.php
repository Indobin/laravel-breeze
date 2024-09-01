<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Gate;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('stores.index',[
            'stores' => Store::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.form',[
            'store' => new Store(),
            'page_meta' => [
                'url' => route('stores.store'),
                'title' => 'Create a store',
                'sub_title' => 'Create new store',
                'description' => 'You can nsnsnsns',
                'submit_text' => 'Create',
                'method' => 'post',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // dd($request->user());
        $file = $request->file('logo');
        $request->user()->stores()->create([
            ...$request->validated(),
            ...['logo' => $file->store('image/stores')],
        ]);
        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Store $store)
    {
        Gate::authorize('update', $store);
        return view('stores.form',[
            'store' => $store,
            'page_meta' => [
                'url' => route('stores.update', $store->id),
                'title' => 'Edit a store ' . $store->name,
                'sub_title' => 'Edit store',
                'description' => 'You can nsnsnsns',
                'submit_text' => 'Update',
                'method' => 'put',
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store)
    {
        $store->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
