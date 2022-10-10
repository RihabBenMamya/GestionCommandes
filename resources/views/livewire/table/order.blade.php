<div>
    <x-data-table :data="$data" :model="$orders">
        <x-slot name="head">
            <tr>
                <th id=""><a wire:click.prevent="sortBy('Amount')" role="button" href="#">
                        Amount
                        @include('components.sort-icon', ['field' => 'Amount'])
                    </a></th>
                <th id=""><a wire:click.prevent="sortBy('Currency')" role="button" href="#">
                        Currency
                        @include('components.sort-icon', ['field' => 'Currency'])
                    </a></th>
                <th id=""><a wire:click.prevent="sortBy('DeliverTo')" role="button" href="#">
                        DeliverTo
                        @include('components.sort-icon', ['field' => 'DeliverTo'])
                    </a></th>
                <th id=""><a wire:click.prevent="sortBy('OrderID')" role="button" href="#">
                    OrderID
                        @include('components.sort-icon', ['field' => 'OrderID'])
                    </a></th>
                    <th id=""><a wire:click.prevent="sortBy('OrderNumber')" role="button" href="#">
                        OrderNumber
                            @include('components.sort-icon', ['field' => 'OrderNumber'])
                        </a></th>
                <th id="Action">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($orders as $order)
            <tr x-data="window.__controller.dataTableController({{ $order->id }})">
                <td>{{ $order->Amount }}</td>
                <td>{{ $order->Currency }}</td>
                <td>{{ $order->DeliverTo }}</td>
                <td>{{ $order->OrderID }}</td>
                <td>{{ $order->OrderNumber }}</td>
                @if (Auth::user()->isAdmin())
                <td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('orders.edit', $order->id) }}" class="mr-3">
                        <em class="fa fa-16px fa-pen"></em></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $order->id }})" href="#">
                        <em class="fa fa-16px fa-trash text-red-500"></em></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
