<x-app-layout>
    @slot('title', 'Store')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>

    
        <x-container>
            <div class="grid grid-cols-4 gap-6">
            @foreach ($stores as $stores)
                <x-card>
                    <div class="p-6">
                    <img src="{{asset('storage/' . $stores->logo) }}" alt="" class="size-16 rounded-lg">
                    </div>
                    <x-card.header>
                        <x-card.title>
                            {{ $stores->name }}
                        </x-card.title>
                        <x-card.description>
                            {{ $stores->description }}
                        </x-card.description>
                        @auth
                            @if ($stores->user_id == auth()->user()->id)
                                <a href="{{route('stores.edit', $stores)}}" class="underline text-blue-600">Edit</a>
                            @endif
                        @endauth
                       
                    </x-card.header>
                </x-card>
            @endforeach
            </div>
        </x-container>
    </div>
   
</x-app-layout>
