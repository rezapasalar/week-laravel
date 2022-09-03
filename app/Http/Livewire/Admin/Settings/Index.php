<?php
 
namespace App\Http\Livewire\Admin\Settings;

use App\Http\Livewire\MyComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Cache;

class Index extends MyComponent
{
    use AuthorizesRequests;
    
    public Setting $setting;

    public $rules = [
        'setting.app_name_fa' => ['required', 'max:128'],
        'setting.app_name_en' => ['required', 'max:128'],
        'setting.dollar' => ['required', 'integer'],
        'setting.allow_comment' => ['boolean'],
        'setting.allow_email' => ['boolean'],
        'setting.allow_employment_form' => ['boolean'],
        'setting.allow_representation_form' => ['boolean']
    ];

    public function mount()
    {
        $setting = Setting::first();

        $this->setting = Setting::first() ?? new Setting();

        $this->setting->allow_comment = $setting->allow_comment ?? 1;

        $this->setting->allow_email = $setting->allow_email ?? 1;

        $this->setting->allow_employment_form = $setting->allow_employment_form ?? 1;

        $this->setting->allow_representation_form = $setting->allow_representation_form ?? 1;
    }

    public function edit()
    {
        $this->validate();

        $this->setting->app_name_en = ucwords($this->setting->app_name_en);

        $this->setting->save();

        Cache::forget('settings');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);
    }

    public function render()
    {
        $this->authorize('settings:edit');

        return view('livewire.admin.settings.index')->layout('layouts.admin.master');
    }
}
