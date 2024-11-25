<div>
    <x-app-layout>
    </x-app-layout>

    <div class="flex  min-h-screen">
        <!-- Sidebar -->
        <div class="p-2 bg-white ">
            @include('layouts.sidebare')
        </div>

        <!-- Main Content -->
        <div class="flex-1 w-[75vw]  p-8">

            @if (!auth()->user()->isSubscribed() && auth()->user()->teamCount() >= 5 && !session('show_max_team_error'))
                <div class="bg-yellow-100 text-yellow-700 p-4 rounded-lg mb-4">
                    <p class="font-bold">You’ve reached the maximum team limit.</p>
                    <p>
                        <a href="{{ route('subscription') }}" class="text-blue-600 hover:underline">
                            Subscribe to create more teams.
                        </a>
                    </p>
                </div>
            @endif


            <div class="max-w-7xl mx-auto">
                <!-- Header Section -->
                <div class="flex-1 flex flex-col overflow-hidden">

                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <button id="openGroupModal"
                                class="group relative inline-flex items-center justify-center px-3 py-2 text-base font-medium transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-lg bg-gradient-to-r from-[#B784B7] to-purple-500 text-white rounded-lg">
                                <span class="mr-2">+</span>
                                Ajouter un nouveau groupe
                            </button>
                        </div>
                        <div class="flex gap-4 items-center justify-center mr-3">
                            <div class="flex items-center">
                                <input type="text" id="search" placeholder="Search tasks..."
                                    class="w-72 px-5 py-3 border border-[#B784B7] rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#ddb9dd] placeholder:text-[#B784B7]">
                            </div>
                            <a href="/chatify" class="relative group  mt-2">
                                <i
                                    class="fa-regular fa-comment text-gray-500 text-2xl transition-transform duration-200 ease-in-out transform group-hover:scale-110"></i>
                                <span
                                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                            </a>
                        </div>
                    </div>
                    <script>
                        document.getElementById('search').addEventListener('input', function () {
                            const searchValue = this.value.toLowerCase(); // Lowercase for case-insensitivity
                            const groups = document.querySelectorAll('.group-item'); // All group elements
                    
                            groups.forEach(group => {
                                const groupName = group.textContent.toLowerCase(); // Group name text
                                if (groupName.includes(searchValue)) {
                                    group.style.display = 'block'; // Show matching group
                                } else {
                                    group.style.display = 'none'; // Hide non-matching group
                                }
                            });
                    
                            // Optional: Add a message if no results match
                            const noResults = document.getElementById('noResults');
                            if (!Array.from(groups).some(group => group.style.display === 'block')) {
                                if (!noResults) {
                                    const message = document.createElement('div');
                                    message.id = 'noResults';
                                    message.textContent = 'No matching groups found.';
                                    message.className = 'text-gray-500 text-sm text-center mt-4';
                                    document.getElementById('groupsContainer').appendChild(message);
                                }
                            } else if (noResults) {
                                noResults.remove();
                            }
                        });
                    </script>
                    
                    <!-- Groups Container -->
                    <div id="groupsContainer" class="space-y-6">
                        @if (isset($groups) && $groups->count())
                            @foreach ($groups as $group)
                                <div class="group-div group-item bg-white rounded-xl shadow-md border border-[#B784B7]/20 hover:border-[#B784B7] transition-all duration-300 overflow-hidden"
                                    data-group-id="{{ $group->id }}">

                                    <div class="bg-gradient-to-r from-[#B784B7]/10 to-purple-100/30 px-6 py-4">
                                        <div class="flex justify-between items-center h-4">
                                            <h2 class="text-lg font-semibold text-[#B784B7] flex items-center">
                                                <span>{{ $group->name }}</span>
                                            </h2>
                                            <div class="flex items-center space-x-4">
                                                <button onclick="openModal('inviteModal{{ $group->id }}')"
                                                    class="text-[#B784B7] hover:text-purple-700 transition-colors">
                                                    <i class="fa-regular fa-circle-user text-xl"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Task Table -->
                                    <div class="task-table ">
                                        <table class="w-full  divide-gray-200">
                                            <thead class="">
                                                <tr
                                                    class="text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                                    <th class="px-6 py-3">Nom</th>
                                                    <th class="px-6 py-3">Description</th>
                                                    <th class="px-6 py-3">Start</th>
                                                    <th class="px-6 py-3">End</th>
                                                    <th class="px-6 py-3">Priority</th>
                                                    <th class="px-6 py-3">Assigné à</th>
                                                    <th class="px-6 py-3">Statut</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y  divide-gray-200 border-t border-gray-200">
                                                @foreach ($group->tasks as $task)
                                                    <tr class="hover:bg-gray-50 ">
                                                        <td class="px-4 border-l border-gray-200">
                                                            <div class="flex items-center text-sm">
                                                                <i class="fas fa-grip-vertical text-gray-400 mr-3"></i>
                                                                {{ $task->name }}
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="px-7 text-sm text-gray-600 border-l border-gray-200">
                                                            {{ $task->description }}
                                                        </td>
                                                        <td class="px-5  text-sm text-gray-600 border-l border-gray-200">
                                                            {{ $task->start }}
                                                        </td>
                                                        <td class="px-5 text-sm text-gray-600 border-l border-gray-200">
                                                            {{ $task->end }}
                                                        </td>

                                                        <td class="px-5 border-l border-gray-200">
                                                            <span
                                                                class="px-2  text-xs rounded-full
                                                                    @if ($task->priority == 'High') bg-red-100 text-red-800
                                                                    @elseif($task->priority == 'Medium') bg-yellow-100 text-yellow-800
                                                                    @else bg-green-100 text-green-800 @endif">
                                                                {{ $task->priority }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="px-4 text-xs border-l border-gray-200">
                                                                <select id="assignee" name="assignee_id"
                                                                    class="w-28 p-1 text-xs rounded-md text-gray-700 border border-[#B784B7] bg-white focus:ring-2 focus:ring-[#B784B7] focus:border-[#B784B7] transition-all"
                                                                    required>
                                                                    <option value="" disabled selected>Select a
                                                                        member</option>
                                                                    @foreach ($group->users as $user)
                                                                        @if ($user->pivot->role == ('member'))
                                                                        <option value="{{ $user->id }}"
                                                                            class="text-xs text-gray-700"
                                                                            @if (isset($task) && $task->assignee_id == $user->id) selected @endif>
                                                                            {{ $user->name }}
                                                                        </option>
                                                                        @endif
                             
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </td>
                                                        <td class="px-5 pt-[5.6px] border-l border-gray-200">
                                                            <form method="POST"
                                                                action="{{ route('task.markAsDone', $task->id) }}"
                                                                onsubmit="handleMarkAsDone(event, this)">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit"
                                                                    class="inline-flex items-center px-3 py-1 pt- border border-[#B784B7] text-xs font-medium rounded-md text-[#B784B7] hover:bg-[#B784B7] hover:text-white transition-colors duration-200">
                                                                    Mark as Done
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td class="px-3 py-1 border-l border-gray-200">
                                                            <div class="relative" x-data="{ open: false }">
                                                                <button @click="open = !open"
                                                                    class="text-gray-400 hover:text-gray-600">
                                                                    <i class="fas fa-ellipsis-h"></i>
                                                                </button>
                                                                <div x-show="open" @click.away="open = false"
                                                                    class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                                                    <button
                                                                        onclick="openUpdateTaskModal('{{ $task->id }}')"
                                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">
                                                                        Edit Task
                                                                    </button>

                                                                    <form method="POST"
                                                                        action="{{ route('tasks.destroy', $task->id) }}">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button
                                                                            onclick="openModal('deleteTaskModal', '/tasks/delete/{{ $task->id }}', '{{ $task->id }}')"
                                                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 w-full text-left">
                                                                            Delete Task
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>

                                                    </tr>





                                                    <div id="updateTaskModal{{ $task->id }}"
                                                        class="hidden fixed inset-0 items-center justify-center bg-black bg-opacity-50">
                                                        <div
                                                            class="bg-white ml-[35vw] mt-36 rounded-lg shadow-lg p-6 w-1/3">
                                                            <h2 class="text-lg font-bold mb-4">Update Task</h2>
                                                            <form id="updateTaskForm{{ $task->id }}"
                                                                action="{{ route('tasks.update', $task->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <!-- Task Name -->
                                                                <input type="text" name="name"
                                                                    id="taskNameInput{{ $task->id }}"
                                                                    class="border border-gray-300 rounded p-2 w-full mb-4"
                                                                    placeholder="Enter task name"
                                                                    value="{{ $task->name }}" required>

                                                                <!-- Task Description -->
                                                                <textarea name="description" id="taskDescriptionInput{{ $task->id }}"
                                                                    class="border border-gray-300 rounded p-2 w-full mb-4" placeholder="Enter task description" required>{{ $task->description }}</textarea>

                                                                <!-- Deadline -->
                                                                <input type="date" name="deadline"
                                                                    id="taskDeadlineInput{{ $task->id }}"
                                                                    class="border border-gray-300 rounded p-2 w-full mb-4"
                                                                    value="{{ $task->deadline }}" required>

                                                                <!-- Priority -->
                                                                <select name="priority"
                                                                    id="taskPriorityInput{{ $task->id }}"
                                                                    class="border border-gray-300 rounded p-2 w-full mb-4"
                                                                    required>
                                                                    <option value="high"
                                                                        {{ $task->priority == 'high' ? 'selected' : '' }}>
                                                                        High</option>
                                                                    <option value="medium"
                                                                        {{ $task->priority == 'medium' ? 'selected' : '' }}>
                                                                        Medium</option>
                                                                    <option value="low"
                                                                        {{ $task->priority == 'low' ? 'selected' : '' }}>
                                                                        Low</option>
                                                                </select>

                                                                <!-- Assignee -->
                                                                @if(Auth::id() === $group->owner_id)
                                                                <div class="mb-4">
                                                                    <x-input-label for="assigned_to" :value="__('Assign to')" />
                                                                    <select id="assigned_to" name="assigned_to" class="block mt-1 w-full border-[#fff]/25 bg-transparent focus:outline-none focus:ring-0 focus:border-[#fff]/25 text-[#fff] rounded-md shadow-sm">
                                                                        <option value="" class="text-[#000]">Select team member</option>
                                                                        @foreach($group->users as $member)
                                                                            <option value="{{ $member->id }}" class="text-[#000]">
                                                                                {{ $member->name }} 
                                                                                @if($member->pivot && $member->pivot->role === 'member')
                                                                                    (member)
                                                                                @elseif(!$member->pivot)
                                                                                    (Invited)
                                                                                @endif
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @endif
                                            



                                                                <div class="flex justify-end space-x-4">
                                                                    <button type="button"
                                                                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded"
                                                                        onclick="closeModal('updateTaskModal{{ $task->id }}')">
                                                                        Cancel
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="px-4 py-2 bg-[#B784B7] hover:bg-[#caadca] text-white rounded">
                                                                        Update
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    <!-- Group Footer -->
                                    <div
                                        class="px-6 py-3 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                                        <button
                                            class="openTaskModalButton inline-flex items-center text-[#B784B7] hover:text-purple-700 transition-colors">
                                            <span class="mr-2">+</span>
                                            Ajouter Task
                                        </button>
                                        <div class="flex items-center space-x-4">
                                            <button class="text-[#B784B7] hover:text-blue-700 transition-colors"
                                                onclick="openModal('updateGroupModal{{ $group->id }}', '{{ route('group.update', $group->id) }}', '{{ $group->id }}')">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button class="text-[#B784B7] hover:text-red-700 transition-colors"
                                                onclick="openModal('deleteEvent', '{{ route('group.destroy', $group->id) }}', '{{ $group->id }}')">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @include('components.delete_grp')

                                </div>


                                <div id="inviteModal{{ $group->id }}"
                                    class="hidden fixed inset-0 items-center mt-52 justify-center bg-black bg-opacity-50">
                                    <div
                                        class="bg-white rounded-xl p-8 w-[400px] mt-52 ml-[36vw] shadow-2xl transform transition-all">
                                        <h3 class="text-xl font-bold text-[#B784B7] mb-6">Inviter un utilisateur</h3>
                                        <div class="space-y-4">
                                            <form action="{{ route('invite.store', $group->id) }}" method="POST">
                                                @csrf
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email
                                                        de
                                                        l'utilisateur</label>
                                                    <input type="email" name="email"
                                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all"
                                                        required>
                                                </div>
                                                <div class="flex justify-end space-x-3 mt-6">
                                                    <button type="button"
                                                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors"
                                                        onclick="closeModal('inviteModal{{ $group->id }}')">
                                                        Annuler
                                                    </button>
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-[#B784B7] text-white rounded-lg hover:bg-purple-700 transition-colors">
                                                        Envoyer
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>




                                <div id="updateGroupModal{{ $group->id }}"
                                    class="hidden fixed inset-0 items-center justify-center bg-black bg-opacity-50">
                                    <div class="bg-white ml-[35vw] mt-56  rounded-lg shadow-lg p-6 w-1/3">
                                        <h2 class="text-lg font-bold mb-4">Update Group Name</h2>
                                        <form id="updateGroupForm" action="{{ route('group.update', $group->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" id="groupNameInput"
                                                class="border border-gray-300 rounded p-2 w-full mb-4"
                                                placeholder="Enter new group name" value="{{ $group->name }}"
                                                required>
                                            <div class="flex justify-end space-x-4">
                                                <button type="button"
                                                    class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded"
                                                    onclick="closeModal('updateGroupModal{{ $group->id }}')">
                                                    Cancel
                                                </button>
                                                <button type="submit"
                                                    class="px-4 py-2 bg-[#B784B7] hover:bg-[#cdadcd] text-white rounded">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Create Task Modal -->
                                <div id="createTaskModal"
                                    class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
                                    <div class="bg-white rounded-xl p-8 w-[500px] shadow-2xl transform transition-all">
                                        <h2 class="text-2xl font-bold text-[#B784B7] mb-6 text-center">Créer une Task
                                        </h2>
                                        <form id="createTaskForm" action="{{ route('tasks.store') }}" method="POST"
                                            class="space-y-6">
                                            @csrf
                                            <input type="hidden" name="group_id" id="group_id">
                                            <div>
                                                <label for="taskName"
                                                    class="block text-sm font-medium text-gray-700 mb-2">Nom de la
                                                    Task</label>
                                                <input type="text" id="taskName" name="name"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all"
                                                    required>
                                            </div>
                                            <div>
                                                <label for="taskDescription"
                                                    class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                                <textarea id="taskDescription" name="description" rows="3"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all"
                                                    required></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label for="start" class="block text-sm font-medium text-gray-700 mb-2">Start</label>
                                                <input type="datetime-local" id="start" name="start"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all"
                                                    min="{{ date('Y-m-d\TH:i') }}" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="end" class="block text-sm font-medium text-gray-700 mb-2">End</label>
                                                <input type="datetime-local" id="end" name="end"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all"
                                                    min="{{ date('Y-m-d\TH:i') }}" required>
                                            </div>
                                            <div>
                                                <label for="taskPriority"
                                                    class="block text-sm font-medium text-gray-700 mb-2">Priorité</label>
                                                <select id="taskPriority" name="priority"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all appearance-none">
                                                    <option value="" selected disabled>Choisir la priorité
                                                    </option>
                                                    <option value="Low">Low</option>
                                                    <option value="Medium">Medium</option>
                                                    <option value="High">High</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for=""
                                                    class="block text-sm font-medium text-gray-700 mb-2">Assigné
                                                    à</label>
                                                <select id="assignee" name="assignee_id"
                                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all appearance-none"
                                                    required>
                                                    <option value="" disabled selected>Select a member</option>
                                                    @foreach ($group->users as $member)
                                                        <option value="{{ $member->id }}">{{ $member->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="flex justify-end space-x-3">
                                                <button type="button" id="closeTaskModal"
                                                    class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                                                    Annuler
                                                </button>
                                                <button type="submit"
                                                    class="px-4 py-2 bg-[#B784B7] text-white rounded-lg hover:bg-purple-700 transition-colors">
                                                    Créer
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>


        <!-- Your existing modals with enhanced styling -->


        <!-- Create Group Modal -->
        <div id="createGroupModal"
            class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
            <div class="bg-white rounded-xl p-8 w-[500px] shadow-2xl transform transition-all">
                <h2 class="text-2xl font-bold text-[#B784B7] mb-6 text-center">Créer un nouveau groupe</h2>
                <form id="createGroupForm" action="{{ route('groups.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="groupName" class="block text-sm font-medium text-gray-700 mb-2">Nom du
                            groupe</label>
                        <input type="text" id="groupName" name="name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all"
                            required>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" id="closeGroupModal"
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                            Annuler
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-[#B784B7] text-white rounded-lg hover:bg-purple-700 transition-colors">
                            Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <!-- Notifications -->
        @if (session('error'))
            <div class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
                {{ session('success') }}
            </div>
        @endif


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.openModal = function(modalId, deleteUrl, taskId) {
                    const modal = document.getElementById(modalId);

                    // Set the action URL for the form dynamically
                    document.getElementById('deleteEventForm').action = deleteUrl;

                    // Update modal heading or other text with the task ID
                    const modalHeading = document.getElementById('modalHeading');
                    modalHeading.textContent = `Are you sure you want to delete task #${taskId}?`;

                    // Show the modal
                    modal.style.display = 'block';
                    document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden');
                };

                window.closeModal = function(modalId) {
                    const modal = document.getElementById(modalId);
                    modal.style.display = 'none';
                    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden');
                };
            });


            // Function to open the update modal
            function openUpdateTaskModal(taskId) {
                // Get the modal by its ID and show it
                const modal = document.getElementById('updateTaskModal' + taskId);
                modal.classList.remove('hidden');
                document.body.classList.add('overflow-hidden'); // Prevent background scrolling
            }

            // Function to close the modal
            function closeModal(taskId) {
                const modal = document.getElementById('updateTaskModal' + taskId);
                modal.classList.add('hidden');
                document.body.classList.remove('overflow-hidden'); // Allow background scrolling
            }


            // update name of grp
            function openModal(modalId, groupId, groupName) {
                // Display modal
                document.getElementById(modalId).classList.remove('hidden');

                // Update form action with dynamic ID
                const form = document.getElementById('updateGroupForm');
                form.action = `/groups/${groupId}`; // Route dynamic based on group ID

                // Pre-fill input with current group name
                const nameInput = document.getElementById('groupNameInput');
                nameInput.value = groupName;
            }

            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }



            function openModal() {
                document.getElementById('modal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('modal').classList.add('hidden');
            }


            document.addEventListener("DOMContentLoaded", function() {
                const groupModal = document.getElementById("createGroupModal");
                const openGroupModalButton = document.getElementById("openGroupModal");
                const closeGroupModalButton = document.getElementById("closeGroupModal");

                openGroupModalButton.addEventListener("click", () => {
                    groupModal.classList.remove("hidden");
                    groupModal.classList.add("flex");
                });

                closeGroupModalButton.addEventListener("click", () => {
                    groupModal.classList.add("hidden");
                    groupModal.classList.remove("flex");
                });

                const taskModal = document.getElementById("createTaskModal");
                const closeTaskModalButton = document.getElementById("closeTaskModal");
                const openTaskModalButtons = document.querySelectorAll(".openTaskModalButton");
                const groupIdInput = document.getElementById("group_id");

                document.querySelectorAll('.openTaskModalButton').forEach(button => {
                    button.addEventListener('click', function() {
                        const groupDiv = this.closest('.group-div');
                        const taskTable = groupDiv.querySelector('.task-table');
                        taskTable.classList.toggle('hidden');
                    });
                });
                openTaskModalButtons.forEach((button) => {
                    button.addEventListener("click", (event) => {
                        const groupDiv = button.closest(".group-div");
                        const groupId = groupDiv.getAttribute("data-group-id");

                        groupIdInput.value = groupId;

                        taskModal.classList.remove("hidden");
                        taskModal.classList.add("flex");
                    });
                });

                closeTaskModalButton.addEventListener("click", () => {
                    taskModal.classList.add("hidden");
                    taskModal.classList.remove("flex");
                });
            });
            document.querySelector('#taskForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const response = await fetch('/tasks', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                });

                if (response.ok) {
                    const newTask = await response.json();
                    updateTaskList(newTask);
                } else {
                    alert('Erreur lors de l\'ajout de la tâche');
                }
            });

            function updateTaskList(task) {
                const taskContainer = document.querySelector('#tasksContainer');
                const taskElement = document.createElement('div');
                taskElement.innerHTML = `
        <h3>${task.name}</h3>
        <p>${task.description}</p>
        <small>Priorité : ${task.priority}</small>
        <small>Deadline : ${task.deadline}</small>
    `;
                taskContainer.appendChild(taskElement);
            }



            function openInviteModal(groupId) {
                const inviteModal = document.getElementById('inviteModal');
                if (inviteModal) {
                    inviteModal.classList.remove('hidden');
                    inviteModal.classList.add('flex');
                    const groupIdInput = document.querySelector('input[name="group_id"]');
                    if (groupIdInput) {
                        groupIdInput.value = groupId;
                    }
                } else {
                    console.error('Invite modal not found');
                }
            }

            function closeInviteModal() {
                const inviteModal = document.getElementById('inviteModal');
                if (inviteModal) {
                    inviteModal.classList.add('hidden');
                    inviteModal.classList.remove('flex');
                }
            }

            window.openInviteModal = openInviteModal;
            window.closeInviteModal = closeInviteModal;

            function handleMarkAsDone(event, form) {
                event.preventDefault();

                const button = form.querySelector('button');
                button.textContent = 'Done';
                button.disabled = true;

                fetch(form.action, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            console.log('Task marked as done successfully');
                        } else {
                            console.error('Error marking task as done');
                            button.textContent = 'Mark as Done';
                            button.disabled = false;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        button.textContent = 'Mark as Done';
                        button.disabled = false;
                    });
            }
        </script>
