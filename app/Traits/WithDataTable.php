<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;


trait WithDataTable
{

    public function getPaginationData()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Add User',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
                case 'item':
                    $items = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);

                    return [
                        "view" => 'livewire.table.item',
                        "items" => $items,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => route('item.new'),
                                'create_new_text' => 'Add Item',
                                'export' => '#',
                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                    case 'order':
                        $orders = $this->model::search($this->search)
                            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                            ->paginate($this->perPage);

                        return [
                            "view" => 'livewire.table.order',
                            "orders" => $orders,
                            "data" => array_to_object([
                                'href' => [
                                    'create_new' => route('orders.create'),
                                    'create_new_text' => 'Orders to csv',
                                    'export' => route('orders.export'),
                                    'export_text' => 'Export'
                                ]
                            ])
                        ];
                        break;
                        case 'contact':
                            $contacts = $this->model::search($this->search)
                                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                ->paginate($this->perPage);

                            return [
                                "view" => 'livewire.table.contact',
                                "contacts" => $contacts,
                                "data" => array_to_object([
                                    'href' => [
                                        'create_new' => route('contacts.create'),
                                        'create_new_text' => 'Add Contact',
                                        'export' => '#',
                                        'export_text' => 'Export'
                                    ]
                                ])
                            ];
                            break;
            default:
                # code...
                break;
        }
    }
}
