<x-app-layout>
    <div style='width:35%;margin:auto;padding-top:25px;'>
    <h2>Detail Pegawai</h2>
    <br/>
    <form method="POST" action="{{ route('editpegawai') }}">
        @csrf
        <x-text-input id="pegawai_id" type="hidden" name="id" value="{{ $pegawai->pegawai_id }}"></x-text-input>

        <!-- Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" value="{{ $pegawai->first_name }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" value="{{ $pegawai->last_name }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $pegawai->email }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $pegawai->address }}" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />

            <x-text-input id="phone" class="block mt-1 w-full"
                            type="text"
                            name="phone" value="{{ $pegawai->phone }}" required/>

            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
            <select id="gender" class="block mt-1 w-full" name="gender" required>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Edit') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-app-layout>

<script>
    $('#gender option[value={{$pegawai->gender}}').attr('selected','selected');
</script>