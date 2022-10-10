<div>
    <x-data-table :data="$data" :model="$items">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('Amount')" role="button" href="#">
                        Amount
                        @include('components.sort-icon', ['field' => 'Amount'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('Description')" role="button" href="#">
                        Description
                        @include('components.sort-icon', ['field' => 'Description'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('Discount')" role="button" href="#">
                        Discount
                        @include('components.sort-icon', ['field' => 'Discount'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('Item')" role="button" href="#">
                        Item
                        @include('components.sort-icon', ['field' => 'Item'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('ItemDescription')" role="button" href="#">
                        ItemDescription
                        @include('components.sort-icon', ['field' => 'ItemDescription'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('Quantity')" role="button" href="#">
                    Quantity
                        @include('components.sort-icon', ['field' => 'Quantity'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('UnitCode')" role="button" href="#">
                    UnitCode
                        @include('components.sort-icon', ['field' => 'UnitCode'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('UnitDescription')" role="button" href="#">
                    UnitDescription
                        @include('components.sort-icon', ['field' => 'UnitDescription'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('UnitPrice')" role="button" href="#">
                    UnitPrice
                        @include('components.sort-icon', ['field' => 'UnitPrice'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('VATAmount')" role="button" href="#">
                    VATAmount
                        @include('components.sort-icon', ['field' => 'VATAmount'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('VATPercentage')" role="button" href="#">
                    VATPercentage
                        @include('components.sort-icon', ['field' => 'VATPercentage'])
                    </a></th>
                <th>Action</th>

            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($items as $item)
            <tr x-data="window.__controller.dataTableController({{ $item->id }})">
                <td>{{ $item->Amount }}</td>
                <td>{{ $item->Description }}</td>
                <td>{{ $item->Discount }}</td>
                <td>{{ $item->Item }}</td>
                <td>{{ $item->ItemDescription }}</td>
                <td>{{ $item->Quantity }}</td>
                <td>{{ $item->UnitCode }}</td>
                <td>{{ $item->UnitDescription }}</td>
                <td>{{ $item->UnitPrice }}</td>
                <td>{{ $item->VATAmount }}</td>
                <td>{{ $item->VATPercentage }}</td>
                <td class="whitespace-no-wrap row-action--icon">
                    <a role="button" href="{{ route('item.edit', $item->id) }}" class="mr-3">
                        <em class="fa fa-16px fa-pen"></em></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $item->id }})" href="#">
                        <em class="fa fa-16px fa-trash text-red-500"></em></a>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
