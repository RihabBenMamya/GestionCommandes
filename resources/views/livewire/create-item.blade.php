<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('item') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Complete the following data and submit to create a new item data') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="Amount" value="{{ __('Amount') }}" />
                <small>Total amount of the line, excluding taxes and including discounts</small>
                <x-jet-input id="Amount" type="number" step="any" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.Amount" />
                <x-jet-input-error for="item.Amount" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="Discount" value="{{ __('Discount') }}" />
                <small>Absolute amount of discount</small>
                <x-jet-input id="Discount" type="number" step="any" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.Discount" />
                <x-jet-input-error for="item.Discount" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="Item" value="{{ __('Item') }}" />
                <small>Unique ID of the item</small>
                <x-jet-input id="Item" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.Item" />
                <x-jet-input-error for="item.Item" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="ItemDescription" value="{{ __('ItemDescription') }}" />
                <small>	Short Description</small>
                <x-jet-input id="ItemDescription" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.ItemDescription" />
                <x-jet-input-error for="item.ItemDescription" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="Quantity" value="{{ __('Quantity') }}" />
                <small>Quantity of Item in Line</small>
                <x-jet-input id="Quantity" type="number" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.Quantity" />
                <x-jet-input-error for="item.Quantity" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="UnitCode" value="{{ __('UnitCode') }}" />
                <small>	Unit of Quantity</small>
                <x-jet-input id="UnitCode" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.UnitCode" />
                <x-jet-input-error for="item.UnitCode" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="UnitDescription" value="{{ __('UnitDescription') }}" />
                <small>	Verbose Unit of Quantity</small>
                <x-jet-input id="UnitDescription" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.UnitDescription" />
                <x-jet-input-error for="item.UnitDescription" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="UnitPrice" value="{{ __('UnitPrice') }}" />
                <small>Unit Price, excluding taxes</small>
                <x-jet-input id="UnitPrice" type="number" step="any" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.UnitPrice" />
                <x-jet-input-error for="item.UnitPrice" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="VATAmount" value="{{ __('VATAmount') }}" />
                <small>Absolute amount of Taxes for the line</small>
                <x-jet-input id="VATAmount" type="number" step="any" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.VATAmount" />
                <x-jet-input-error for="item.VATAmount" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="VATPercentage" value="{{ __('VATPercentage') }}" />
                <small>	Percentage amount of taxes for the line</small>
                <x-jet-input id="VATPercentage" type="number" step="any" class="mt-1 block w-full form-control shadow-none" wire:model.defer="item.VATPercentage" />
                <x-jet-input-error for="item.VATPercentage" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
