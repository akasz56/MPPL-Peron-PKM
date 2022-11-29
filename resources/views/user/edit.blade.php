<x-app-layout>
    <x-slot name="header">
        Edit Profil
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('vacancies.update') }}">
                        @csrf
                        <div class="mb-6">
                            <x-forms.label for="name">Nama</x-forms.label>
                            <x-forms.text id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="$user->name" placeholder="Masukkan Nama anda" required autofocus />
                        </div>
                        <div class="mb-6">
                            <x-forms.label for="NIM">NIM</x-forms.label>
                            <x-forms.text id="NIM" class="block mt-1 w-full" type="text" name="NIM"
                                :value="$user->NIM" placeholder="Masukkan NIM anda" required />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="faculty">Fakultas</x-input-label>
                            <select id="faculty"
                                class="select select-bordered block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="faculty_id" required>
                                <option disabled selected>Pilih Fakultas</option>
                                @foreach ($faculties as $faculty)
                                    <option value={{ $faculty->id }}
                                        {{ $user->faculty_id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-6">
                            <x-input-label for="department">Departemen</x-input-label>
                            <select id="department"
                                class="select select-bordered block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="department_id" required>
                                <option disabled selected>Pilih Fakultas terlebih dahulu</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                Submit
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let select_faculty = document.getElementById("faculty");
            let select_department = document.getElementById("department");
            let departments = {!! json_encode($departments) !!};

            select_faculty.onchange = function() {
                let value = select_faculty.options[select_faculty.selectedIndex].value;
                let filteredDepartments = departments.filter((item) => item.faculty_id == value);
                let options = filteredDepartments.map((item) =>
                    `<option value=${item.id}` +
                    ({!! json_encode($user->department_id) !!} === item.id) ? ' selected ' : '' +
                    `>${item.name}</option>`
                );
                console.log(options);
                select_department.innerHTML = options;
            }
        </script>
    @endpush
</x-app-layout>
