<!-- Modal -->
<div id="deleteEvent" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

        <div class="flex justify-end p-2">
            <button onclick="closeModal('deleteEvent')" type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 pt-0 text-center">
            <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 id="modalHeading" class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this Group?</h3>
            <div class="flex items-center gap-x-5 justify-center w-full">
                <form method="post" id="deleteEventForm" action="">
                    @csrf @method("DELETE")
                    <button type="submit" class="bg-red-500 px-5 py-2 text-white rounded-lg">Delete</button>
                </form>

                <button onclick="closeModal('deleteEvent')"
                    class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                    No, cancel
                </button>

            </div>
        </div>
    </div>
</div>
<script>
       document.addEventListener('DOMContentLoaded', function () {

    window.openModal = function (modalId, deleteUrl, itemId) {
    const modal = document.getElementById(modalId);

    // Set the action URL for the form dynamically
    document.getElementById('deleteEventForm').action = deleteUrl;

    // Update modal heading or other text with the item's ID
    const modalHeading = document.getElementById('modalHeading');
    modalHeading.textContent = `Are you sure you want to delete item #${itemId}?`;

    // Show the modal
    modal.style.display = 'block';
    document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
};

window.closeModal = function (modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none';
    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
};
});
</script>