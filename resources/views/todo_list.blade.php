<x-app-layout>
</x-app-layout>
<div class="flex">
    <!-- Sidebar -->
    <div class="p-2">
        @include('layouts.sidebare')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

    <div class="bg-gray-50 min-h-screen w-[77.5vw] mt-3 rounded-lg p-8 shadow-lg">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold text-center mb-8">Task<span class="text-[#B784B7]">Geek</span> Board</h1>

            <div class="flex flex-col md:flex-row gap-6">

                <div class="flex-1 bg-[#eee3ee] p-4 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-4">To Do</h2>
                    <ul id="todo-list" class="min-h-[200px] space-y-2">
                        
                        @if ($todos && $todos->count())
                            @foreach ($todos as $todo)
                                <li id="task-{{ $todo->id }}" class="bg-white p-4 rounded shadow cursor-move">
                                    <h3 class="text-sm text-gray-600"><span class="font-semibold">Name:</span> {{ $todo->task_name }}</h3>
                                    <p class="text-sm text-gray-600"><span class="font-semibold">Description:</span> {{ $todo->task_description }}</p>
                                    <p class="text-sm text-gray-600"><span class="font-semibold">Deadline:</span> {{ $todo->task_deadline }}</p>
                                    <p class="text-sm text-gray-600"><span class="font-semibold">Priority:</span> {{ $todo->task_priority }}</p>
                                    <div class="flex justify-end mt-2">
                                        <button onclick="editTask('task-{{ $todo->id }}')" class="text-[#B784B7] hover:text-teal-700 mr-2">Edit</button>
                                        <button onclick="deleteTask('task-{{ $todo->id }}')" class="text-red-500 hover:text-red-700">Delete</button>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    
                    <button onclick="openTaskModal('todo')"
                        class="mt-4 w-full bg-[#d3afd3] text-white py-2 px-4 rounded hover:bg-[#e5bbe5] transition duration-300">Add
                        Task</button>
                </div>

                <div class="flex-1 bg-[#eee3ee] p-4 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-4">In Progress</h2>
                    <ul id="progress-list" class="min-h-[200px] space-y-2">
                    </ul>
                </div>

                <div class="flex-1 bg-[#eee3ee] p-4 rounded-lg shadow-lg">
                    <h2 class="text-xl font-semibold mb-4">Done</h2>
                    <ul id="done-list" class="min-h-[200px] space-y-2">
                    </ul>
                </div>
            </div>
        </div>

        <!-- Task Modal -->
        <div id="task-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
            <div class="bg-white rounded-xl p-8 w-[450px] shadow-2xl mt-36 ml-[33vw] transform transition-all ">
                <h2 class="text-2xl font-bold text-[#B784B7] mb-6 text-center">Créer une Task</h2>
                <form action="{{ route('todos.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                    <label for="task_name">Task Name</label>
                    <input type="text" name="task_name" id="task_name"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all" required>
                </div>
                    <label for="task_description">Description</label>
                    <textarea name="task_description"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all" id="task_description"></textarea>
                
                    <label for="task_deadline">Deadline</label>
                    <input type="date" name="task_deadline"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all" id="task_deadline">
                
                    <label for="task_priority">Priority</label>
                    <select name="task_priority" id="task_priority"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#B784B7] focus:border-transparent transition-all">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                
                    <button type="submit" class="px-4 mt-6 py-2 bg-[#B784B7] text-white rounded-lg hover:bg-purple-700 transition-colors">Save Task</button>
                </form>
                

            </div>
        </div>
        <script>
            const lists = ['todo-list', 'progress-list', 'done-list'];
            lists.forEach(listId => {
                new Sortable(document.getElementById(listId), {
                    group: 'shared',
                    animation: 150,
                    ghostClass: 'bg-teal-100',
                    onEnd: function(evt) {
                        updateTaskStatus(evt.item.id, evt.to.id);
                    }
                });
            });

            let currentList = '';

            // Open Task Modal
            function openTaskModal(listId) {
                currentList = listId;
                document.getElementById('task-modal').classList.remove('hidden');
            }

            // Close Task Modal
            function closeTaskModal() {
                document.getElementById('task-modal').classList.add('hidden');
                document.getElementById('task-name').value = '';
                document.getElementById('task-description').value = '';
                document.getElementById('task-deadline').value = '';
                document.getElementById('task-priority').value = '';
            }

            // Add Task to List
            function addTask() {
                const name = document.getElementById('task-name').value;
                const description = document.getElementById('task-description').value;
                const deadline = document.getElementById('task-deadline').value;
                const priority = document.getElementById('task-priority').value;

                if (name && description && deadline && priority) {
                    const taskId = 'task-' + Date.now();
                    const taskElement = createTaskElement(taskId, name, description, deadline, priority);
                    document.getElementById(currentList + '-list').appendChild(taskElement);
                    closeTaskModal();
                }
            }

            // Create Task Element
            function createTaskElement(id, name, description, deadline, priority) {
                const li = document.createElement('li');
                li.id = id;
                li.className = 'bg-white p-4 rounded shadow cursor-move';
                li.innerHTML = `
                      <h3 class="text-sm text-gray-600"><span class = "font-semibold">Name : </span>  ${name}</h3>
                      <p class="text-sm text-gray-600"><span class = "font-semibold">Description :</span> ${description}</p>
                      <p class="text-sm text-gray-600"><span class = "font-semibold">Deadline : </span>  ${deadline}</p>
                      <p class="text-sm text-gray-600"> <span class = "font-semibold">Priority : </span>  ${priority}</p>
                      <div class="flex justify-end mt-2">
                          <button onclick="editTask('${id}')" class="text-[#B784B7] hover:text-teal-700 mr-2">Edit</button>
                          <button onclick="deleteTask('${id}')" class="text-red-500 hover:text-red-700">Delete</button>
                      </div>
                  `;
                return li;
            }

            // Update Task Status (for drag-and-drop)
            function updateTaskStatus(taskId, newListId) {
                console.log(`Task ${taskId} moved to ${newListId}`);
            }

            // Edit Task
            function editTask(taskId) {
                const taskElement = document.getElementById(taskId);
                const name = taskElement.querySelector('h3').textContent;
                const description = taskElement.querySelector('p').textContent.split('Deadline')[0].trim();
                const deadline = taskElement.querySelector('p').textContent.split('Deadline: ')[1].split('Priority')[0].trim();
                const priority = taskElement.querySelector('p').textContent.split('Priority: ')[1].trim();

                document.getElementById('task-name').value = name;
                document.getElementById('task-description').value = description;
                document.getElementById('task-deadline').value = deadline;
                document.getElementById('task-priority').value = priority;

                currentList = taskElement.parentElement.id.replace('-list', '');
                openTaskModal(currentList);

                taskElement.remove();
            }

            // Delete Task
            function deleteTask(taskId) {
                if (confirm('Are you sure you want to delete this task?')) {
                    document.getElementById(taskId).remove();
                }
            }
        </script>
    </div>
</div>
