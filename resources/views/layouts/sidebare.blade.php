<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskGeek Sidebar</title>
</head>

<body>
    <div class="h-full w-[20vw] flex flex-col bg-white shadow-lg">
        <div class="mb-8 mr-2">
            <h1
                class="font-bold text-lg text-[#B784B7] bg-white border-2 border-[#B784B7] rounded-xl p-3 text-center shadow-sm hover:shadow-md transition-all duration-300">
                Espace De Travail TaskGeek
            </h1>
        </div>
        <!-- Navigation Section -->
        <div class="flex-1 overflow-y-auto p-4">
            <div class="space-y-6">
                <!-- Projects Section -->

                <!-- Views Section -->
                <div>
                    <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-3">Views</h3>
                    <div class="space-y-2">
                        <li class="text-gray-600 text-sm">Teams</li>
                        <a href="/dashboard"
                            class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-table mr-3"></i>
                            Tableaux
                        </a>
                        <a href="/calendar_2"
                            class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-calendar mr-3"></i>
                            Calendar of Teams
                        </a>
                        <a href="/members"
                            class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-users mr-3"></i>
                            All Members
                        </a>
                        <a href="/chatify"
                            class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-comment mr-3"></i>
                            Chat With Members
                        </a>
                        <li class="text-gray-600 text-sm">Task</li>
                        <a href="/task"
                            class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fa-solid fa-table-list mr-3"></i>
                            Add Task
                        </a>
                        <a href="/calendar"
                            class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-calendar mr-3"></i>
                            Calendar
                        </a>
                        <a href="/todo_list"
                            class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-list mr-3"></i>
                            To Do
                        </a>


                    </div>
                </div>

                <div>
                    <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-3">My Teams</h3>
                    <div class="space-y-2">
                        @foreach ($groups as $group)
                            <a href="#"
                                class="flex items-center px-3 py-2 text-sm text-gray-600 rounded-md hover:bg-gray-100">
                                <span class="w-2 h-2 bg-[#4573D2] rounded-full mr-3"></span>
                                {{ $group->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- User Profile Section -->
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-[#4573D2] rounded-full flex items-center justify-center text-white text-sm">
                    JD
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-700">John Doe</p>
                    <p class="text-xs text-gray-500">john@example.com</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
