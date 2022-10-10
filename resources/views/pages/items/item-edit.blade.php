<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Item') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Item</a></div>
            <div class="breadcrumb-item"><a href="{{ route('items.index') }}">Edit Item</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-item action="updateItem" :itemId="request()->itemId" />
    </div>
</x-app-layout>
