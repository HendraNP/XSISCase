<x-app-layout>
    <div style='width:35%;margin:auto;padding-top:25px;'>
    <h2>Add Cuti</h2>
    <br/>
    <form method="POST" action="{{ route('addcuti') }}">
        @csrf
        

        <!-- Name -->
        <div>
            <x-input-label for="pegawai_id" :value="__('Pegawai ID')" />
            <select class="block mt-1 w-full" id='pegawai_id' name='pegawai_id'>
                @php 
                @foreach($list as $i=>$g)
                    <option value="{{$g->pegawai_id}}">{{$g->first_name}} {{$g->first_name}}</option>
                @endforeach
            </select>
        </div>

        <!-- alasan cuti -->
        <div class="mt-4">
            <x-input-label for="reason" :value="__('Alasan Cuti')" />
            <x-text-input id="reason" class="block mt-1 w-full" type="text" name="reason" :value="old('reason')" required />
            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
        </div>

        <!-- date -->
        <div class="mt-4">
            <x-input-label for="start_date" :value="__('Tanggal Mulai Cuti')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="end_date" :value="__('Tanggal Akhir Cuti')" />
            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date')" required />
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Add') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-app-layout>
