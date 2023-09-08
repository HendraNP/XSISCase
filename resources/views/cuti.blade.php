<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Cuti Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-nav-link :href="route('addcuti')" :active="request()->routeIs('addcuti')">
                {{ __('Add Cuti') }}
            </x-nav-link>
        </div>
        <br />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            <table id='listOrder' class="table table-striped table-bordered">
                                <thead>
                                    <tr role="row">
                                        <th style="width: 20px;">No</th>
                                        <th>Name</th>
                                        <th>Alasan Cuti</th>
                                        <th>Start Cuti</th>
                                        <th>End Cuti</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $a=1
                                    @endphp
                                    @foreach($list as $i=>$g)
                                    <tr>
                                        <td>{{$a++}}</td>
                                        <td>{{$g->first_name}} {{$g->last_name}}</td>
                                        <td>{{$g->alasan_cuti}}</td>
                                        <td>{{$g->start_date}}</td>
                                        <td>{{$g->end_date}}</td>
                                        <td>
                                            <a href="/cuti/edit/{{ $g->pegawai_id }}" class="underline text-gray-900 dark:text-black">Detail</a>
                                            <a href="/cuti/delete/{{ $g->pegawai_id }}" class="underline text-gray-900 dark:text-black">Remove</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
