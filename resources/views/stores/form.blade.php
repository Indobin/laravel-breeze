<x-app-layout title="{{ $page_meta['title'] }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $page_meta['title'] }}
        </h2>
    </x-slot>

    <x-container>
        <x-card class="max-w-2xl">
            <x-card.header>
                <x-card.title>
                {{ $page_meta['sub_title'] }}
                </x-card.title>
                <x-card.description>
                {{ $page_meta['description'] }}
                </x-card.descripti>
            </x-card.header>
            <x-card.content>
                <form action="{{ $page_meta['url'] }}" method="post" enctype="multipart/form-data" novalidate>
                @method($page_meta['method'])
                    @csrf
                 <div class="mb-6">
                    <x-input-label for="name" class="sr-only" :value="__('Logo')" />
                    <input type="file" name="logo" id="logo" />
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                </div>
                <div class="mb-6">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $store->name)"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mb-6">
                    <x-input-label for="description" :value="__('description')" />
                    <x-text-area id="description" class="block mt-1 w-full" name="description">{{old('description', $store->description)}}</x-text-area>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <x-primary-button>
                {{$page_meta['submit_text']}}
                </x-primary-button>
                </form>
            </x-card.content>
        </x-card>
    </x-con>
</x-app-layout>
