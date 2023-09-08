<x-app-layout>
    <div style='width:35%;margin:auto;padding-top:25px;'>
    <h2>Detail Cuti</h2>
    <br/>
    <form method="POST" action="{{ route('editcuti') }}">
        @csrf
        

        <!-- Name -->
        <input type='hidden' name='id' id='id'value="{{$cuti->cuti_id}}" />
        <div>
            <x-input-label for="name" :value="__('Product Name')" />
            <p>{{$cuti->first_name}} {{$cuti->last_name}}</p>
        </div>

        <!-- Alasan -->
        <div class="mt-4">
            <x-input-label for="reason" :value="__('Alasan Cuti')" />
            <x-text-input id="reason" class="block mt-1 w-full" type="text" name="reason" value="{{$cuti->alasan_cuti}}" required />
            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="start_date" :value="__('Tanggal Mulai Cuti')" />
            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{$cuti->start_date}}" required />
            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="end_date" :value="__('Tanggal Akhir Cuti')" />
            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" value="{{$cuti->end_date}}" required />
            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
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
    $('#start_date').text('{{$cuti->start_date}}');
    $('#end_date').text('{{$cuti->end_date}}');
</script>