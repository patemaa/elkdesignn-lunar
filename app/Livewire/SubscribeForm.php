<?php
namespace App\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class SubscribeForm extends Component
{
    public $email = '';
    public $message = '';
    public $messageType = '';

    protected $rules = [
        'email' => 'required|email',
    ];

    public function submit()
    {
        $this->validate();

        if (Subscriber::where('email', $this->email)->exists()) {
            $this->message = 'This email is already registered.';
            $this->messageType = 'warning';
            return;
        }

        try {
            Subscriber::create(['email' => $this->email]);
            $this->message = 'Thank you! Your email has been saved.';
            $this->messageType = 'success';
            $this->email = '';
        } catch (\Exception $e) {
            $this->message = 'Something went wrong, please try again later.';
            $this->messageType = 'error';
        }
    }

    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
