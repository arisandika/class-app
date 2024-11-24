<?php

namespace App\Livewire;

use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    public $name, $nim, $class_id, $github, $portfolio, $description, $studentId, $dataStudents, $access_key;
    protected $paginationTheme = 'bootstrap';
    public $search = '', $sortBy, $perPage;
    public $isEditMode = false;
    public $isModalOpen = false;
    protected $accessKey = '221011401774';
    public $student_id;
    public $isDropdownOpen = false;

    public function mount()
    {
        $this->sortBy = "default";
        $this->perPage = 10;
    }

    protected function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'github' => 'required|url',
            'portfolio' => 'required|url',
            'class_id' => 'required|exists:classes,id',
            'description' => 'nullable|string|max:100',
            'access_key' => 'required',
        ];

        if ($this->student_id) {
            $rules['nim'] = 'required|string|unique:students,nim,' . $this->student_id;
        } else {
            $rules['nim'] = 'required|string|unique:students,nim';
        }

        return $rules;
    }

    public function updateFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = Student::query();

        switch ($this->sortBy) {
            case 'latest':
                $students->latest();
                break;
            case 'oldest':
                $students->oldest();
                break;
            case 'name_asc':
                $students->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $students->orderBy('name', 'desc');
                break;
        }

        if ($this->search) {
            $students->where(function ($student) {
                $student->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('nim', 'like', '%' . $this->search . '%');
            });
        }

        $students = $students->orderByDesc('created_at')->paginate($this->perPage);

        $classes = Classes::all();

        return view('livewire.home.index', [
            'students' => $students,
            'classes' => $classes
        ])->extends('livewire.layouts.layout')->section('content');
    }

    public function resetForm()
    {
        $this->name = '';
        $this->nim = '';
        $this->class_id = '';
        $this->github = '';
        $this->portfolio = '';
        $this->access_key = '';
        $this->description = '';
    }

    public function openModal()
    {
        $this->resetForm();
        $this->isModalOpen = true;
    }

    public function store()
    {
        $this->validate($this->rules());

        if ($this->access_key !== $this->accessKey) {
            $this->addError('access_key', 'Access key salah');
            return;
        }

        Student::create([
            'name' => ucwords(strtolower($this->name)),
            'nim' => $this->nim,
            'github' => $this->github,
            'portfolio' => $this->portfolio,
            'description' => $this->description,
            'class_id' => $this->class_id,
        ]);

        session()->flash('message', 'Student added successfully');

        $this->dispatch('close-modal');
        $this->resetForm();
        return $this->redirect('/', navigate: true);
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $this->student_id = $student->id;
        $this->name = $student->name;
        $this->nim = $student->nim;
        $this->github = $student->github;
        $this->portfolio = $student->portfolio;
        $this->class_id = $student->class_id;
        $this->description = $student->description;
    }

    public function update()
    {
        $this->validate($this->rules());

        if ($this->access_key !== $this->accessKey) {
            $this->addError('access_key', 'Access key salah');
            return;
        }

        $student = Student::findOrFail($this->student_id);

        $student->update([
            'name' => ucwords(strtolower($this->name)),
            'nim' => $this->nim,
            'github' => $this->github,
            'portfolio' => $this->portfolio,
            'class_id' => $this->class_id,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Student updated successfully');

        $this->dispatch('close-modal');
        $this->resetForm();
        return $this->redirect('/', navigate: true);
    }

    public function toggleDropdown()
    {
        $this->isDropdownOpen = !$this->isDropdownOpen;
    }

    public function clodeModal()
    {
        $this->dispatch('close-modal');
        $this->dispatch('livewire:updated');
    }
}
