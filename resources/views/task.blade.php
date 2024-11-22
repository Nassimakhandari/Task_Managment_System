<x-app-layout>
</x-app-layout>

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <div class="p-2 bg-white">
        @include('layouts.sidebare')
    </div>

    <!-- Add Task Button -->
    <div class="flex flex-col gap-8 mt-4">


        <button
            class="group ml-7 w-64 relative inline-flex items-center justify-center px-3 py-2 text-base font-medium transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-lg bg-gradient-to-r from-[#B784B7] to-purple-500 text-white rounded-lg"
            onclick="openCreateTaskModal()">
            Ajouter Task
        </button>

        <!-- Modal for Task Creation -->
        <div id="createTaskModal"
            class="hidden fixed inset-0 pl-[33vw] pt-14 items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-xl p-8 w-[450px] shadow-2xl transform transition-all">
                <h2 class="text-2xl font-bold text-[#B784B7] mb-6 text-center">Créer une Task</h2>
                <form id="createTaskForm" action="{{ route('creations.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="group_id" id="group_id">
                    <div>
                        <label for="" class="block text-sm font-medium text-gray-700 mb-2">Nom de la
                            Task</label>
                        <input type="text" id="" name="name_todo"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all"
                            required>
                    </div>
                    <div>
                        <label for="" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="" name="description_todo" rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all"
                            required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="start" class="block text-gray-300 text-sm font-medium mb-1">Start</label>
                        <input type="datetime-local" id="start" name="start"
                            class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                            min="{{ date('Y-m-d\TH:i') }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="end" class="block text-gray-300 text-sm font-medium mb-1">End</label>
                        <input type="datetime-local" id="end" name="end"
                            class="block w-full px-4 py-2 text-sm text-gray-100 bg-[#2a2a2a] border border-[#555] rounded-md focus:ring-[#6737f5] focus:border-[#6737f5] transition duration-300"
                            min="{{ date('Y-m-d\TH:i') }}" required>
                    </div>
                    <div>
                        <label for="" class="block text-sm font-medium text-gray-700 mb-2">Priorité</label>
                        <select id="" name="priority_todo"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all appearance-none">
                            <option value="" selected disabled>Choisir la priorité</option>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" id="closeTaskModal" onclick="closeCreateTaskModal()"
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

        <div class="task-table w-[75vw]">
            <table class="w-full ml-3  divide-gray-200">
                <thead class="">
                    <tr class="text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                        <th class="px-6 py-3">Nom</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3">Start</th>
                        <th class="px-6 py-3">End</th>
                        <th class="px-6 py-3">Priority</th>
                        <th class="px-6 py-3">Statut</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y gap-2 divide-gray-200 border-t border-gray-200">
                    @foreach ($task as $taskk)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4  border-l border-gray-200">
                                <div class="flex items-center">
                                    <i class="fas fa-grip-vertical text-gray-400 mr-3"></i>
                                    {{ $taskk->name_todo }}
                                </div>
                            </td>
                            <td class="px-7  text-sm text-gray-600 border-l border-gray-200">
                                {{ $taskk->description_todo }}
                            </td>
                            <td class="px-7  text-sm text-gray-600 border-l border-gray-200">
                                {{ $taskk->start }}
                            </td>
                            <td class="px-7  text-sm text-gray-600 border-l border-gray-200">
                                {{ $taskk->end}}
                            </td>
                            <td class="px-7  border-l border-gray-200">
                                <span
                                class="px-2  text-xs rounded-full
                            @if ($taskk->priority_todo == 'High') bg-red-100 text-red-800
                            @elseif($taskk->priority_todo == 'Medium') bg-yellow-100 text-yellow-800
                            @else bg-green-100 text-green-800 @endif">
                                    {{ $taskk->priority_todo }}
                                </span>
                            </td>
                            <td class="px-7 pt-[5.5px] border-l border-gray-200">
                                <form method="POST" action="{{ route('task.markAsDone', $taskk->id) }}"
                                    onsubmit="handleMarkAsDone(event, this)">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="inline-flex items-center px-3 py-1 pt- border border-[#B784B7] text-sm font-medium rounded-md text-[#B784B7] hover:bg-[#B784B7] hover:text-white transition-colors duration-200">
                                        Mark as Done
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-1 border-l border-gray-200">
                                <div class="relative" x-data="{ open: false }">
                                    <button @click="open = !open" class="text-gray-400 hover:text-gray-600">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div x-show="open" @click.away="open = false"
                                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
                                        <button onclick="openEditTaskModal('{{ $taskk->id }}')"
                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left">
                                            Edit Task
                                        </button>
                                        <button onclick="deleteTask('{{ $taskk->id }}')"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 w-full text-left">
                                            Delete Task
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- JavaScript to handle the modal -->
    <script>
        // Function to open the modal
        function openCreateTaskModal() {
            document.getElementById("createTaskModal").classList.remove("hidden");
        }

        // Function to close the modal
        function closeCreateTaskModal() {
            document.getElementById("createTaskModal").classList.add("hidden");
        }
    </script>
</div>
