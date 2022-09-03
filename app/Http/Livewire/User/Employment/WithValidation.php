<?php

namespace App\Http\Livewire\User\Employment;

trait WithValidation
{
    public function validationStep1()
    {
        $this->validate([
            'first_name' => ['required', 'max:32'],
            'last_name' => ['required', 'max: 32'],
            'code' => ['required', 'size:10', 'regex:/[\d]{10}/'],
            'year' => ['required', 'size:4', 'regex:/[\d]{4}/'],
            'gender' => ['required', 'boolean'],
            'marital_status' => ['required', 'boolean'],
        ]);

        $this->confirmSteps++;

        if (!$this->gender) {
            $this->military_status = 0;
        }
    }

    public function validationStep2()
    {
        if ($this->gender) {
            $this->validate([
                'father_job' => ['max:32'],
                'military_status' => ['required', 'in:1,2,3,4'],
                'education' => ['required', 'in:1,2,3,4'],
                'field' => ['max:32'],
            ]);
        } else {
            $this->validate([
                'father_job' => ['max:32'],
                'military_status' => ['in:0'],
                'education' => ['required', 'in:1,2,3,4'],
                'field' => ['max:32'],
            ]);
        }

        $this->confirmSteps++;
    }

    public function validationStep3()
    {
        $this->validate([
            'willingness_work' => ['required', 'in:1,2,3,4,5,6,7'],
            'name_guarantor' => ['max:32'],
            'work_experience' => ['required', 'boolean'],
            'work_experience_description' => ['max:512']
        ]);

        $this->confirmSteps++;
    }

    public function validationStep4()
    {
        $this->validate([
            'mobile' => ['required', 'size:11'],
            'phone' => ['required', 'size:11'],
            'address' => ['max:128'],
        ]);

        $this->confirmSteps++;
    }

    public function validationStep5()
    {
        $this->validate([
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:300', 'dimensions:max_width=800,max_height=800'],
        ]);

        $this->confirmSteps++;
    }
}