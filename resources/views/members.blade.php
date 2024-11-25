<x-app-layout>
</x-app-layout>
<div class="flex">
    <div class="p-2">
        @include('layouts.sidebare')
    </div>

    <div class="container mx-auto py-4 px-4">
        <h2 class="text-3xl font-semibold text-[#B784B7] mb-6">All Groups With Members</h2>

        <div class="flex flex-wrap gap-20">
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
                        @if ($user->pivot->role == ('member'))
                        <div class="flex items-center gap-4 mb-3">
                            <img class="w-10 h-10 rounded-full object-cover border-2 border-[#B784B7]"
                                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=B784B7&color=fff"
                                alt="{{ $user->name }}">
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-800">{{ $user->name }}</h4>
                                <span class="text-xs text-gray-500">{{ $user->email }}</span>
                            </div>
                            <!-- Delete Button -->
                            <button 
                            type="button"
                            data-id="{{ $user->id }}" 
                            class="bg-purple-200 text-white hover:bg-red-700 px-3 py-1 text-sm rounded-md delete-member-btn">
                            Delete
                        </button>
                        
                        </div>
                        @endif
     
                        @endforeach
                    </div>
                </div>


                <!-- Delete Button -->


           <!-- Modal -->
<div id="delete-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-5 rounded-md shadow-md">
        <h2 class="text-lg font-bold mb-3">Confirm Deletion</h2>
        <p class="text-sm mb-4">Are you sure you want to delete this member?</p>
        <div class="flex justify-end space-x-2">
            <button id="cancel-delete" class="px-3 py-1 text-sm text-gray-700 border rounded-md">Cancel</button>
            <form id="delete-form" method="POST" action="">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-1 text-sm text-white bg-red-600 hover:bg-red-700 rounded-md">
                    Confirm
                </button>
            </form>
        </div>
    </div>
</div>

        </div>
        @endforeach
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-member-btn');
    const modal = document.getElementById('delete-modal');
    const cancelDelete = document.getElementById('cancel-delete');
    const deleteForm = document.getElementById('delete-form');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const memberId = button.getAttribute('data-id');
            deleteForm.setAttribute('action', `/members/${memberId}`);
            modal.classList.remove('hidden');
        });
    });

    cancelDelete.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
});
</script>
<style>
    /* Center the modal */
    #deleteModal {
        z-index: 1000;
    }

    /* Smooth fade-in */
    #deleteModal.hidden {
        display: none;
    }
</style>
