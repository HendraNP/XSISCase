<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-nav-link :href="route('addpegawai')" :active="request()->routeIs('addpegawai')">
                {{ __('Add Pegawai') }}
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Status</th>
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
                                        <td>{{$g->pegawai_id}}</td>
                                        <td>{{$g->first_name}}</td>
                                        <td>{{$g->last_name}}</td>
                                        <td>{{$g->phone}}</td>
                                        <td>{{$g->address}}</td>
                                        <td>{{$g->email}}</td>
                                        <td>
                                            <a href="/pegawai/detail/{{ $g->pegawai_id }}" class="underline text-gray-900 dark:text-black">Detail</a>
                                            <a href="/pegawai/delete/{{ $g->pegawai_id }}" class="underline text-gray-900 dark:text-black">Remove</a>
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
