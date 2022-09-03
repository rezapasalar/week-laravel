<?php

namespace App\Http\Livewire\User\Employment;

use App\Events\EmploymentEvent;
use App\Http\Livewire\MyComponent;
use App\Models\Employment;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;

class Index extends MyComponent
{
    use WithValidation, WithFileUploads;
    
    public $currentStep = 1;

    public $confirmSteps = 0;

    public $percent = 0;

    public $first_name;
    public $last_name;
    public $code;
    public $year;
    public $gender;
    public $marital_status;
    public $father_job;
    public $military_status = 0;
    public $education;
    public $field;
    public $willingness_work;
    public $name_guarantor;
    public $work_experience;
    public $work_experience_description = '';
    public $mobile;
    public $phone;
    public $address = '';
    public $photo;

    private function getPercent()
    {
        return match($this->currentStep) {
            1 => 0, 2 => 20, 3 => 40, 4 => 60, 5 => 80,
        };
    }

    public function dehydrate()
    {
        $this->dispatchBrowserEvent('change:step', ['step' => $this->currentStep, 'percent' => $this->getPercent()]);
    }

    public function next()
    {
        $this->currentStep < 5 ? $this->currentStep++ : $this->currentStep;
    }

    public function previous()
    {
        $this->currentStep > 1 ? $this->currentStep-- : $this->currentStep;
        $this->confirmSteps--;
    }

    public function handle()
    {
        $this->callMethod("validationStep{$this->currentStep}");
        
        if($this->currentStep < 5) {
            $this->next();
        } else {
            if ($this->confirmSteps === 5) {
                $this->create();
            } else {
                $this->resetForm();
            }
        }
    }

    private function create()
    {
        $photo_path = $this->employmentPhotoUpload();

        Employment::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'code' => $this->code,
            'year' => $this->year,
            'gender' => $this->gender,
            'marital_status' => $this->marital_status,
            'father_job' => $this->father_job,
            'military_status' => 1,
            'education' => $this->education,
            'field' => $this->field,
            'willingness_work' => $this->willingness_work,
            'name_guarantor' => $this->name_guarantor,
            'work_experience' => $this->work_experience,
            'work_experience_description' => $this->work_experience_description,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'address' => $this->address,
            'photo_path' => $photo_path
        ]);

        $this->dispatchBrowserEvent('close:employmentProduct');

        $this->dispatchBrowserEvent('alert-wot:success', ['title' => 'موفق آمیز', 'message' => 'درخواست استخدام با موفقیت ارسال شد.', 'confirmButtonText' => 'متوجه ام']);

        $this->resetForm();

        try {
            broadcast(new EmploymentEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }

    public function resetForm()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->currentStep = 1;

        $this->confirmSteps = 0;

        $this->first_name = null;
        $this->last_name = null;
        $this->code = null;
        $this->year = null;
        $this->gender = null;
        $this->marital_status = null;
        $this->father_job = null;
        $this->military_status = 0;
        $this->education = null;
        $this->field = null;
        $this->willingness_work = null;
        $this->name_guarantor = null;
        $this->work_experience = null;
        $this->work_experience_description = '';
        $this->mobile = null;
        $this->phone = null;
        $this->address = '';
        $this->photo = null;

        $this->dispatchBrowserEvent('close:employmentProduct');
    }

    public function render()
    {
        if (getSettings()->allow_employment_form ?? 1) {
            return view('livewire.user.employment.index');
        }

        return abort(404);
    }
}
