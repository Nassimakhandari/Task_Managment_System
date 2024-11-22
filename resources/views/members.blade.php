<x-app-layout>
</x-app-layout>
<div class="flex">
    <div class="p-2">
        @include('layouts.sidebare')
    </div>

    <div class="container mx-auto py-4 px-4">
        <h2 class="text-3xl font-semibold text-[#B784B7] mb-6">All Groups With Members</h2>

        <div class="flex flex-wrap gap-6">
            @foreach ($groups as $group)
                <div
                    class="bg-white border border-gray-200 shadow-md rounded-xl overflow-hidden w-80 transform hover:scale-105 transition-all duration-300">
                    <!-- Group Header -->
                    <div class="bg-gradient-to-r from-[#B784B7]/10 to-purple-100 px-4 py-3">
                        <h3 class="text-lg font-semibold text-[#B784B7]">{{ $group->name }}</h3>
                    </div>

                    <!-- Group Members -->
                    <div class="p-4">
                        @foreach ($group->users as $user)
                            <div class="flex items-center gap-3 mb-3">
                                <img class="w-10 h-10 rounded-full object-cover border-2 border-[#B784B7]"
                                    src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=B784B7&color=fff"
                                    alt="{{ $user->name }}">
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-800">{{ $user->name }}</h4>
                                    <span class="text-xs text-gray-500">{{ $user->email }}</span>
                                </div>
                                <!-- Delete Button -->
                                <form
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-purple-200 text-white hover:bg-red-700 px-3 py-1 text-sm rounded-md">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
