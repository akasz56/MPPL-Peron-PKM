<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="'Email'" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <!-- Name -->
            <div class="mt-4">
                <x-input-label for="name" :value="'Nama Lengkap'" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required />
            </div>

            <!-- NIM -->
            <div class="mt-4">
                <x-input-label for="nim" :value="'NIM'" />

                <x-text-input id="nim" class="block mt-1 w-full" type="text" name="nim" :value="old('nim')"
                    required />
            </div>

            <!-- Faculty -->
            <div class="mt-4">
                <x-input-label for="faculty" :value="'Fakultas'" />

                <select id="faculty"
                    class="select select-bordered block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="faculty_id" value="{{ old('faculty_id') }}" required>
                    <option disabled selected>Pilih Fakultas</option>
                    @foreach ($faculties as $faculty)
                        <option value={{ $faculty->id }}>{{ $faculty->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Department -->
            <div class="mt-4">
                <x-input-label for="department" :value="'Departemen'" />

                <select id="department"
                    class="select select-bordered block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    name="department_id" value="{{ old('department_id') }}" required>
                    <option disabled selected>Pilih Fakultas terlebih dahulu</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="'Password'" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="'Ulang Password'" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <!-- Choose Role -->
            <div class="mt-4">
                <x-input-label :value="'Saya Sebagai'" />

                <div class="flex">
                    <div class="flex-1">
                        <input type="radio" id="role-creator" name="role" value="creator">
                        <label for="role-creator">Creator</label>
                    </div>
                    <div class="flex-1">
                        <input type="radio" id="role-developer" name="role" value="developer">
                        <label for="role-developer">Developer</label>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Sudah Punya Akun?
                </a>

                <x-primary-button class="ml-4">
                    Daftar
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>

    @push('scripts')
        <script>
            let select_faculty = document.getElementById("faculty");
            let select_department = document.getElementById("department");
            let departments = {!! json_encode($departments) !!};

            select_faculty.onchange = function() {
                let value = select_faculty.options[select_faculty.selectedIndex].value;
                let filteredDepartments = departments.filter((item) => item.faculty_id == value);
                let options = filteredDepartments.map((item) => `<option value=${item.id}>${item.name}</option>`);
                select_department.innerHTML = options;
            }
        </script>
    @endpush

</x-guest-layout>
