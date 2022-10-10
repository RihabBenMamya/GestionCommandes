<?php

namespace App\Http\Livewire;

use App\Models\Items;
use Livewire\Component;

class CreateItem extends Component
{
    public $item;
    public $itemId;
    public $action;
    public $button;

    protected function getRules()
    {

        return [
            'item.Amount' => 'required',
            'item.Discount' => 'required',
            'item.Item' => 'required',
            'item.ItemDescription' => 'required',
            'item.Quantity' => 'required',
            'item.UnitCode' => 'required',
            'item.UnitDescription' => 'required',
            'item.UnitPrice' => 'required',
            'item.VATAmount' => 'required',
            'item.VATPercentage' => 'required'
        ];



    }
    public function createItem()
    {
        $this->resetErrorBag();
        $this->validate();
        Items::create([
            'Amount' => $this->item["Amount"],
            'Description' => $this->item["ItemDescription"],
            'Discount' => $this->item["Discount"],
            'Item' => $this->item["Item"],
            'ItemDescription' => $this->item["ItemDescription"],
            'Quantity' => $this->item["Quantity"],
            'UnitCode' => $this->item["UnitCode"],
            'UnitDescription' => $this->item["UnitDescription"],
            'UnitPrice' => $this->item["UnitPrice"],
            'VATAmount' => $this->item["VATAmount"],
            'VATPercentage' => $this->item["VATPercentage"],

    ]);
        $this->reset('item');
        return redirect('/items');
    }


    public function updateItem()
    {
        $this->resetErrorBag();
        $this->validate();

        Items::query()
            ->where('id', $this->itemId)
            ->update([
                'Amount' => $this->item["Amount"],
            'Description' => $this->item["ItemDescription"],
            'Discount' => $this->item["Discount"],
            'Item' => $this->item["Item"],
            'ItemDescription' => $this->item["ItemDescription"],
            'Quantity' => $this->item["Quantity"],
            'UnitCode' => $this->item["UnitCode"],
            'UnitDescription' => $this->item["UnitDescription"],
            'UnitPrice' => $this->item["UnitPrice"],
            'VATAmount' => $this->item["VATAmount"],
            'VATPercentage' => $this->item["VATPercentage"],
            ]);

        $this->emit('saved');
        return redirect('/items');
    }

    public function mount()
    {
        if (!$this->item && $this->itemId) {
            $this->item = Items::find($this->itemId);
        }

        $this->button = create_button($this->action, "Item");
    }

    public function render()
    {
        return view('livewire.create-item');
    }
}
