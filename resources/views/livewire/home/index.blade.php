@section('title', 'Home')

<div class="container text-center padding-y position-relative">

    <span class="mt-4 text-sm fw-bold">Created by Ari Sandika</span>

    <h1 class="main-title">Hi, Selamat Datang di <br>
        <span class="text-gradient">
            Kelas 05TPLK001
        </span>
    </h1>

    <p class="subtitle">Kumpulkan tugasnya, serap ilmunya, abaikan lainnya.</p>
    <div class="d-flex justify-content-center">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">
            Tambah Mahasiswa
            <x-lucide-plus width="16" height="16" />
        </button>
    </div>

    <div class="gap-2 search-container d-flex">
        <div class="input-group">
            <span class="bg-white input-group-text border-end-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </span>
            <input type="text" id="search" name="search" class="form-control border-start-0"
                placeholder="Cari mahasiswa: Nama, NIM" wire:model="search" wire:keydown="updateFilter">
        </div>

        <select id="sortBy" name="sortBy" class="custom-select-button" wire:model="sortBy" wire:change="updateFilter">
            <option value="">Urutan</option>
            <option value="latest">Terbaru</option>
            <option value="oldest">Terdahulu</option>
            <option value="name_asc">Nama A-Z</option>
            <option value="name_desc">Nama Z-A</option>
        </select>
    </div>

    <div class="list-container">
        @if (session('message'))
            <div class="row">
                <div class="col-12">
                    <div id="autoCloseAlert" class="mb-4 alert alert-primary alert-dismissible fade show" role="alert">
                        <div class="text-alert d-flex align-items-center">
                            <x-lucide-check-circle width="16" height="16" class="me-3" />
                            {{ session('message') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="row gy-4">
            @if ($students->isEmpty())
                <p>No students available.</p>
            @else
                @foreach ($students as $student)
                    <div class="col-12 col-md-6">
                        <div class="card topic-card h-100">
                            <div class="card-body card-portfolio text-start">
                                <div class="card-text">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="text-sm text-gradient fw-bold">{{ $student->nim }}</p>
                                        <div class="gap-2 d-flex">
                                            <p class="text-sm text-muted">{{ $student->created_at->diffForHumans() }}</p>
                                            <div class="btn-group">
                                                <button type="button" class="btn-dots" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class=""><x-tabler-dots-vertical width="18" height="18" /></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><button class="btn-edit w-100" data-bs-toggle="modal"
                                                            data-bs-target="#editModal"
                                                            x-on:click="$wire.edit('{{ $student->id }}')">
                                                            Edit
                                                            <x-lucide-pencil-line width="14" height="14" />
                                                        </button></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="mb-2 card-title fw-bold">{{ $student->name }}</h6>
                                    <p class="mb-4 card-text text-muted">{{ $student->description }}</p>
                                </div>
                                <div class="gap-2 d-flex">
                                    <a href="{{ $student->github }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        Open in
                                        <x-ri-github-fill width="20" height="20" />
                                    </a>
                                    <a href="{{ $student->portfolio }}" target="_blank"
                                        class="btn btn-sm btn-outline-secondary">
                                        Open Link
                                        <x-lucide-external-link width="17" height="17" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>

    @include('livewire.home.add-modal')
    @include('livewire.home.edit-modal')
</div>