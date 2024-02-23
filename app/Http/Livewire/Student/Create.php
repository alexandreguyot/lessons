<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public Student $student;

    public function mount(Student $student)
    {
        $this->student = $student;
    }

    public function render()
    {
        return view('livewire.student.create');
    }

    public function submit()
    {
        $this->validate();

        $this->student->save();

        return redirect()->route('admin.students.index');
    }

    protected function rules(): array
    {
        return [
            'student.firstname' => [
                'string',
                'nullable',
            ],
            'student.lastname' => [
                'string',
                'nullable',
            ],
            'student.email' => [
                'string',
                'nullable',
            ],
            'student.infos' => [
                'string',
                'nullable',
            ],
        ];
    }
}
