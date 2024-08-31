<x-app-layout>
    @slot('title', 'Create as stores')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a store') }}
        </h2>
    </x-slot>

    <x-container>
        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>
                    Create new store
                </x-card.title>
                <x-card.description>
                    You can nsnsnsns
                </x-card.descripti>
            </x-card.header>
            <x-card.content>
                <form action="{{route('stores.store')}}" method="post" enctype="multipart/form-data" novalidate>
                    @csrf
                 <div class="mb-6">
                    <x-input-label for="name" class="sr-only" :value="__('Logo')" />
                    <input type="file" name="logo" id="logo" />
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                </div>
                <div class="mb-6">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-6">
                    <x-input-label for="description" :value="__('description')" />
                    <x-text-area id="description" class="block mt-1 w-full" name="description">{{old('description')}}</x-text-area>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <x-primary-button>
                    Create
                </x-primary-button>
                </form>
            </x-card.content>
        </x-card>
    </x-con>
</x-app-layout>
