<x-guest-layout>
    <div class="flex">
        @include('layouts.admin-sidebar')

        <div class="flex-1 p-8 bg-gray-100">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold">Tambah Booking</h2>
                        <a href="{{ route('admin.bookings.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.bookings.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="lapangan_id" class="block text-gray-700 text-sm font-bold mb-2">
                                Pilih Lapangan
                            </label>
                            <select name="lapangan_id" 
                                    id="lapangan_id" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required>
                                <option value="">Pilih Lapangan</option>
                                @foreach($lapangan as $lap)
                                    <option value="{{ $lap->id }}" {{ old('lapangan_id') == $lap->id ? 'selected' : '' }}>
                                        {{ $lap->nama }} - Rp {{ number_format($lap->harga, 0, ',', '.') }}/jam
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal" class="block text-gray-700 text-sm font-bold mb-2">
                                Tanggal
                            </label>
                            <input type="date" 
                                   name="tanggal" 
                                   id="tanggal" 
                                   value="{{ old('tanggal') }}"
                                   min="{{ date('Y-m-d') }}"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   required>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="jam_mulai" class="block text-gray-700 text-sm font-bold mb-2">
                                    Jam Mulai
                                </label>
                                <input type="time" 
                                       name="jam_mulai" 
                                       id="jam_mulai" 
                                       value="{{ old('jam_mulai') }}"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       required>
                            </div>
                            <div>
                                <label for="jam_selesai" class="block text-gray-700 text-sm font-bold mb-2">
                                    Jam Selesai
                                </label>
                                <input type="time" 
                                       name="jam_selesai" 
                                       id="jam_selesai" 
                                       value="{{ old('jam_selesai') }}"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="catatan" class="block text-gray-700 text-sm font-bold mb-2">
                                Catatan
                            </label>
                            <textarea name="catatan" 
                                      id="catatan" 
                                      rows="3"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('catatan') }}</textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> 