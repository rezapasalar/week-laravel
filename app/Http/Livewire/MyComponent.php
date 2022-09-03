<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class MyComponent extends Component
{
    public $errorPosition;

    public $timer = 3000;

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        [$rules, $messages, $attributes] = $this->providedOrGlobalRulesMessagesAndAttributes($rules, $messages, $attributes);

        $data = $this->prepareForValidation(
            $this->getDataForValidation($rules)
        );

        $ruleKeysToShorten = $this->getModelAttributeRuleKeysToShorten($data, $rules);

        $data = $this->unwrapDataForValidation($data);

        $validator = Validator::make($data, $rules, $messages, $attributes);
        
        if ($this->withValidatorCallback) {
            call_user_func($this->withValidatorCallback, $validator);

            $this->withValidatorCallback = null;
        }
        
        if ($validator->fails())  {
            if (explode('.', request()->segment(3))[0] == 'admin') {
                $this->errorPosition = 'bottom-start';
            } else {
                $this->errorPosition = app()->getLocale() == 'fa' ? 'bottom-end' : 'bottom-start';
            }
            
            $this->dispatchBrowserEvent('toast:error', ['message' => __('response.invalid_form'), 'timer' => $this->timer, 'position' => $this->errorPosition]);
        }

        $this->shortenModelAttributesInsideValidator($ruleKeysToShorten, $validator);

        $validatedData = $validator->validate();

        $this->resetErrorBag();

        return $validatedData;
    }

    public function productPhotoUpload(): void
    {
        $name = "{$this->product->code}.{$this->photo->getClientOriginalExtension()}";

        $this->photo->storeAs('product-photos', $name);

        $this->product->photo_path = $name;
    }

    public function employmentPhotoUpload(): string
    {
        $time = now()->timestamp . rand(1000,10000);

        $name = "{$time}.{$this->photo->getClientOriginalExtension()}";

        $this->photo->storeAs('employment-photos', $name);

        return $name;
    }

    public function slideshowPhotoUpload($filename = null): void
    {
        if (!$filename) {
            $dir = storage_path('app/public/slideshow-photos');

            $ext = $this->photo->getClientOriginalExtension();

            $i = 1;
            do {
                $filename = "{$i}.{$ext}";
                $i++;
            } while (File::exists($dir . '/' . $filename));
        }

        $this->photo->storeAs('slideshow-photos', $filename);
    }
}