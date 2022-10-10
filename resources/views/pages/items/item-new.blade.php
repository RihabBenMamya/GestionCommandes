<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Add Item') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Item</a></div>
            <div class="breadcrumb-item"><a href="{{ route('item.new') }}">Add Item</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-item action="createItem" />
    </div>
</x-app-layout>
