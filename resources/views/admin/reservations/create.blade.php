<x-sg-master>
    <div class="content">
        <form method="POST" action="{{ route('admin.reservations.store') }}">
            @csrf
            @method('POST')
            <div class="sm:col-span-6">
                <label for="first_name" class="block text-sm font-medium text-gray-700"> First Name </label>
                <div class="mt-1">
                    <input type="text" id="first_name" name="first_name"
                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('first_name')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-6">
                <label for="last_name" class="block text-sm font-medium text-gray-700"> Last Name </label>
                <div class="mt-1">
                    <input type="text" id="last_name" name="last_name"
                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('last_name')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-6">
                <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                <div class="mt-1">
                    <input type="email" id="email" name="email"
                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('email')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-6">
                <label for="tel_number" class="block text-sm font-medium text-gray-700"> Phone number
                </label>
                <div class="mt-1">
                    <input type="text" id="tel_number" name="tel_number"
                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('tel_number')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-6">
                <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation Date
                </label>
                <div class="mt-1">
                    <input type="datetime-local" id="res_date" name="res_date"
                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('res_date')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-6">
                <label for="guest_number" class="block text-sm font-medium text-gray-700"> Guest Number
                </label>
                <div class="mt-1">
                    <input type="number" id="guest_number" name="guest_number"
                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                </div>
                @error('guest_number')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-6 pt-5">
                <label for="status" class="block text-sm font-medium text-gray-700">Table</label>
                <div class="mt-1">
                    <select id="table_id" name="table_id" class="form-multiselect block w-full mt-1">
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}">{{ $table->name }}
                                ({{ $table->guest_number }} Guests)
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('table_id')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6 p-4">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
            </div>
        </form>
            </div>
    </x-sg-master>