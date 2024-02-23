<?php

namespace App\Http\Livewire\Lesson;

use App\Models\Lesson;
use App\Models\Student;
use Livewire\Component;

class Create extends Component
{
    public Lesson $lesson;

    public array $student = [];

    public array $listsForFields = [];

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.lesson.create');
    }

    public function submit()
    {
        $this->validate();

        $this->lesson->save();
        $this->lesson->student()->sync($this->student);

        return redirect()->route('admin.lessons.index');
    }

    protected function rules(): array
    {
        return [
            'lesson.title' => [
                'string',
                'required',
            ],
            'lesson.day' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['day'])),
            ],
            'lesson.date_start' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'lesson.date_end' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'lesson.hour' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
            'student' => [
                'array',
            ],
            'student.*.id' => [
                'integer',
                'exists:students,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['day']     = $this->lesson::DAY_SELECT;
        $this->listsForFields['student'] = Student::pluck('lastname', 'id')->toArray();
    }
}
