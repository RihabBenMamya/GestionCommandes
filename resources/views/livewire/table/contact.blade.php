<div>
    <x-data-table :data="$data" :model="$contacts">
        <x-slot name="head">
            <tr>
                <th id="AccountID"><a wire:click.prevent="sortBy('AccountID')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'AccountID'])
                    </a></th>
                <th id="AccountName"><a wire:click.prevent="sortBy('AccountName')" role="button" href="#">
                        AccountName
                        @include('components.sort-icon', ['field' => 'AccountName'])
                    </a></th>
                <th id="AdressLine1"><a wire:click.prevent="sortBy('AddressLine1')" role="button" href="#">
                        AddressLine1
                        @include('components.sort-icon', ['field' => 'AddressLine1'])
                    </a></th>
                <th id="AdressLine2"><a wire:click.prevent="sortBy('AddressLine2')" role="button" href="#">
                        AddressLine2
                        @include('components.sort-icon', ['field' => 'AddressLine2'])
                    </a></th>
                <th id="City"><a wire:click.prevent="sortBy('City')" role="button" href="#">
                        City
                        @include('components.sort-icon', ['field' => 'City'])
                    </a></th>
                <th id="ContactName"><a wire:click.prevent="sortBy('ContactName')" role="button" href="#">
                    ContactName
                        @include('components.sort-icon', ['field' => 'ContactName'])
                    </a></th>
                <th id="Country"><a wire:click.prevent="sortBy('Country')" role="button" href="#">
                    Country
                        @include('components.sort-icon', ['field' => 'Country'])
                    </a></th>
                <th id="ZipCode"><a wire:click.prevent="sortBy('ZipCode')" role="button" href="#">
                    ZipCode
                        @include('components.sort-icon', ['field' => 'ZipCode'])
                    </a></th>
                <th id="Action">Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">

            @foreach ($contacts as $contact)
            <tr x-data="window.__controller.dataTableController({{ $contact->id }})">
                <td>{{ $contact->AccountID }}</td>
                <td>{{ $contact->AccountName }}</td>
                <td>{{ $contact->AddressLine1 }}</td>
                <td>{{ $contact->AddressLine2 }}</td>
                <td>{{ $contact->City }}</td>
                <td>{{ $contact->ContactName }}</td>
                <td>{{ $contact->Country }}</td>
                <td>{{ $contact->ZipCode }}</td>

                <td class="whitespace-no-wrap row-action--icon">
                    <a role="button" href="{{ route('contacts.edit', $contact->id) }}" class="mr-3">
                        <em class="fa fa-16px fa-pen"></em></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $contact->id }})" href="#">
                        <em class="fa fa-16px fa-trash text-red-500"></em></a>
                </td>
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
