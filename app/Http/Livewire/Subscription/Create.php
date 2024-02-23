<?php

namespace App\Http\Livewire\Subscription;

use App\Models\Subscription;
use Livewire\Component;

class Create extends Component
{
    public Subscription $subscription;

    public function mount(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    public function render()
    {
        return view('livewire.subscription.create');
    }

    public function submit()
    {
        $this->validate();

        $this->subscription->save();

        return redirect()->route('admin.subscriptions.index');
    }

    protected function rules(): array
    {
        return [
            'subscription.title' => [
                'string',
                'nullable',
            ],
            'subscription.number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
