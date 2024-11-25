@extends('layouts.app')

@section('content')
    <div class="container mx-auto pt-8 flex flex-col items-center gap-5">
        <h1 class="text-slate-900 font-extrabold text-4xl sm:text-5xl lg:text-6xl tracking-tight text-center">
            Simplifiez votre gestion d'équipe<br> avec Task<span class="text-[#B784B7]">Geek</span>
        </h1>
        <p class="mt-6 text-lg text-slate-600 text-center max-w-3xl pb-4 mx-auto">
            Gérez vos équipes, suivez vos tâches et collaborez en toute simplicité.
        </p>

        <div class="flex flex-wrap gap-8 items-center mb-12 justify-center">
            <div
                class="bg-white shadow-md w-full sm:w-1/2 md:w-1/4 lg:w-1/5 flex flex-col items-center rounded-lg p-4 transition-transform transform hover:scale-105 hover:bg-[#eee3ee] hover:text-white">
                <i class="fas fa-paint-brush text-pink-500 text-3xl mb-2"></i>
                <p class="text-gray-700">Création et design</p>
            </div>

            <div
                class="bg-white shadow-md w-full sm:w-1/2 md:w-1/4 lg:w-1/5 flex flex-col items-center rounded-lg p-4 transition-transform transform hover:scale-105 hover:bg-[#eee3ee] hover:text-white">
                <i class="fas fa-laptop-code text-purple-500 text-3xl mb-2"></i>
                <p class="text-gray-700">Informatique</p>
            </div>

            <div
                class="bg-white shadow-md w-full sm:w-1/2 md:w-1/4 lg:w-1/5 flex flex-col items-center rounded-lg p-4 transition-transform transform hover:scale-105 hover:bg-[#eee3ee] hover:text-white">
                <i class="fas fa-briefcase text-green-500 text-3xl mb-2"></i>
                <p class="text-gray-700">Gestion de portfolio</p>
            </div>

            <div
                class="bg-white shadow-md w-full sm:w-1/2 md:w-1/4 lg:w-1/5 flex flex-col items-center rounded-lg p-4 transition-transform transform hover:scale-105 hover:bg-[#eee3ee] hover:text-white">
                <i class="fas fa-bullhorn text-pink-500 text-3xl mb-2"></i>
                <p class="text-gray-700">Marketing</p>
            </div>

            <div
                class="bg-white shadow-md w-full sm:w-1/2 md:w-1/4 lg:w-1/5 flex flex-col items-center rounded-lg p-4 transition-transform transform hover:scale-105 hover:bg-[#eee3ee] hover:text-white">
                <i class="fas fa-project-diagram text-yellow-500 text-3xl mb-2"></i>
                <p class="text-gray-700">Gestion de projet</p>
            </div>

            <div
                class="bg-white shadow-md w-full sm:w-1/2 md:w-1/4 lg:w-1/5 flex flex-col items-center rounded-lg p-4 transition-transform transform hover:scale-105 hover:bg-[#eee3ee] hover:text-white">
                <i class="fas fa-users text-teal-500 text-3xl mb-2"></i>
                <p class="text-gray-700">Projets clients</p>
            </div>

            <div
                class="bg-white shadow-md w-full sm:w-1/2 md:w-1/4 lg:w-1/5 flex flex-col items-center rounded-lg p-4 transition-transform transform hover:scale-105 hover:bg-[#eee3ee] hover:text-white">
                <i class="fas fa-tasks text-blue-800 text-3xl mb-2"></i>
                <p class="text-gray-700">Gestion des tâches</p>
            </div>

            <div
                class="bg-white shadow-md w-full sm:w-1/2 md:w-1/4 lg:w-1/5 flex flex-col items-center rounded-lg p-4 transition-transform transform hover:scale-105 hover:bg-[#eee3ee] hover:text-white">
                <i class="fas fa-user-friends text-red-500 text-3xl mb-2"></i>
                <p class="text-gray-700">Ressources humaines</p>
            </div>
        </div>

        <a href="/dashboard"
            class="bg-[#B784B7] text-white text-lg font-semibold py-3 px-8 rounded-full shadow-md hover:bg-[#e0b2e0] transition duration-300">
            Commencer <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>

<div class="text-center flex flex-col items-center justify-center mt-36 gap-24">
    <h1 class="text-[#E493B3] font-medium sm:text-5xl lg:text-4xl tracking-tight text-center">
        Plus de 225 000 clients dans le monde <br>nous font confiance
    </h1>

    <div class="flex flex-col sm:flex-row items-center justify-center gap-16 mb-8">
        <div class="flex items-center justify-center">
            <img src="https://img.evbuc.com/https%3A%2F%2Fcdn.evbuc.com%2Fimages%2F501406499%2F1197589934553%2F1%2Foriginal.20230426-140955?w=512&auto=format%2Ccompress&q=75&sharp=10&rect=0%2C0%2C800%2C800&s=655f4409297fc7e5338d35ab02b29a07" alt="lionsgeek" class="h-24 w-24 md:h-20 md:w-20 lg:h-24 lg:w-24" />
        </div>
        <div class="flex items-center justify-center">
            <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/a/ac/2M_Logo.svg/2560px-2M_Logo.svg.png" alt="2m" class="h-20 w-28 md:h-16 md:w-24 lg:h-20 lg:w-28" />
        </div>
        <div class="flex items-center justify-center">
            <img src="https://pbs.twimg.com/media/CaU4YAhUYAAgM2c.jpg" alt="molengeek" class="h-20 w-36 md:h-16 md:w-28 lg:h-20 lg:w-36" />
        </div>

        <div class="flex items-center justify-center">
            <img src="https://www.wbi.be/sites/default/files/2024-08/image_logo_site_wbi.png" alt="wallonie" class="h-20 w-36 md:h-16 md:w-28 lg:h-20 lg:w-36" />
        </div>
        <div class="flex items-center justify-center">
            <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Logo_login.png" alt="anapec" class="h-16 w-20 md:h-12 md:w-16 lg:h-16 lg:w-20" />
        </div>
        <div class="flex items-center justify-center">
            <img src="https://www.wallonie-bruxelles-rdc.org/sites/default/files/Bandeau-APEFE-RDC.jpg" alt="APEFE" class="h-24 w-40 md:h-20 md:w-32 lg:h-24 lg:w-40" />
        </div>
        <div class="flex items-center justify-center">
            <img src="https://upload.wikimedia.org/wikipedia/fr/thumb/1/1a/RTBF.be_2010.svg/2560px-RTBF.be_2010.svg.png" alt="RTBF.be" class="h-14 w-28 md:h-12 md:w-24 lg:h-14 lg:w-28" />
        </div>
    </div>
</div>



<div class="bg-white text-gray-800">
    <div class="container mt-28 p-8">
        <!-- Navigation -->
        <div class="flex justify-center items-center gap-0 sm:gap-4 mb-8"> <!-- gap-0 pour les écrans 428px et moins -->
            <button class="px-6 py-2 text-xl bg-pink-50 text-[#B784B7] rounded-full border border-[#B784B7]"
                onclick="showTab('teams')">
                Teams
            </button>
            <button class="px-6 py-2 text-xl text-[#B784B7] rounded-full border border-transparent hover:border-[#B784B7]"
                onclick="showTab('tasks')">
                Tasks
            </button>
            <button class="px-6 py-2 text-xl text-[#B784B7] rounded-full border border-transparent hover:border-[#B784B7]"
                onclick="showTab('calendar')">
                Calendar
            </button>
            <button class="px-6 py-2 text-xl text-[#B784B7] rounded-full border border-transparent hover:border-[#B784B7]"
                onclick="showTab('chat')">
                Chat
            </button>
            <button class="px-6 py-2 text-xl text-[#B784B7] rounded-full border border-transparent hover:border-[#B784B7]"
                onclick="showTab('reports')">
                Todo
            </button>
        </div>

        <!-- Teams Section -->
        <div class="tab-content mt-24" id="teams">
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <div class="w-full sm:w-[22%] pr-8">
                    <h2 class="text-2xl font-bold text-center mb-4">Team Management</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Create and Manage Teams:</span> Build up to 5 free teams, invite members, and assign roles seamlessly.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">User Roles:</span> Distinguish between team owners, members, and task contributors for better collaboration.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Permissions:</span> Define who can create, update, or delete tasks within a team.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="w-full sm:w-[55%] relative">
                    <img alt="Team collaboration interface" class="rounded-lg shadow-lg" src="{{ asset('images/Teams.png') }}" />
                </div>
            </div>
        </div>

        <!-- Tasks Section -->
        <div class="tab-content hidden mt-24" id="tasks">
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <div class="w-full sm:w-[22%] pr-8">
                    <h2 class="text-2xl font-bold mb-4 text-center">Task Management</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Organize Your Work:</span> Create tasks for yourself or your team with clear deadlines and priorities.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Track Progress:</span> Mark tasks as done and visualize completed work.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Attach Files:</span> Enhance tasks with file uploads for better context.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="w-full sm:w-[55%] relative">
                    <img alt="Task management interface" class="rounded-lg shadow-lg" src="{{ asset('images/tasks.png') }}" />
                </div>
            </div>
        </div>

        <!-- Calendar Section -->
        <div class="tab-content hidden mt-24" id="calendar">
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <div class="w-full sm:w-[22%] pr-8">
                    <h2 class="text-2xl font-bold mb-4 text-center">Calendar Integration</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Visualize Tasks:</span> Display tasks and deadlines in a calendar format.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Sync Events:</span> Keep track of team and personal events in one place.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="w-full sm:w-[55%] relative">
                    <img alt="Calendar interface" class="rounded-lg shadow-lg" src="{{ asset('images/calendar.png') }}" />
                </div>
            </div>
        </div>

        <!-- Chat Section -->
        <div class="tab-content hidden mt-24" id="chat">
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <div class="w-full sm:w-[22%] pr-8">
                    <h2 class="text-2xl font-bold mb-4 text-center">Team Communication</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Real-Time Chat:</span> Collaborate with your team instantly through Chatify.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Shared Channels:</span> Discuss tasks and updates within specific team groups.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="w-full sm:w-[55%] relative">
                    <img alt="Chat interface" class="rounded-lg shadow-lg" src="{{ asset('images/chat.png') }}" />
                </div>
            </div>
        </div>

        <!-- Reports Section -->
        <div class="tab-content hidden mt-24" id="reports">
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <div class="w-full sm:w-[22%] pr-8">
                    <h2 class="text-2xl font-bold mb-4 text-center">Todo Management</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Todo:</span> Generate detailed todos for operations.
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-[#B784B7] mt-1 mr-2"></i>
                            <div>
                                <span class="font-bold">Todo and insights:</span> Out-of-the-box todos and dashboards offer critical insights into your work to ensure your teams are always up to date and set up for success.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="w-full sm:w-[55%] relative">
                    <img alt="Reports interface" class="rounded-lg shadow-lg" src="{{ asset('images/todo.png') }}" />
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        function showTab(tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => {
                tab.classList.add('hidden');
            });
            document.getElementById(tabId).classList.remove('hidden');
        }
    </script>

<div class="w-full flex items-center justify-center gap-10 my-36 flex-col-reverse lg:flex-row">
    <div class="pl-0 sm:pl-24 rounded-lg w-full lg:w-auto">
        <img src="https://images.pexels.com/photos/6804077/pexels-photo-6804077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            class="rounded-xl w-full lg:w-[47vw] h-auto lg:h-[63vh]" alt="Image de collaboration">
    </div>

    <div class="w-full lg:w-[45%] pr-16 pl-20 sm:pl-0 text-center lg:text-left">
        <h1 class="text-slate-900 font-extrabold sm:text-5xl lg:text-4xl tracking-tight pb-5">
            Dopez la collaboration entre équipes et améliorez la productivité
        </h1>
        <p class="text-lg font-light text-gray-500 mb-6">
            Simplifiez la communication entre les équipes afin d'atteindre vos objectifs plus rapidement à l'aide d'un
            logiciel de gestion des équipes qui maximise la productivité et permet à tous de travailler plus intelligemment,
            ensemble.
        </p>
        <button
            class="bg-[#B784B7] text-white px-6 py-3 rounded-full text-lg font-medium hover:bg-[#B784B7] transition duration-300">
            Commencer
            <i class="fas fa-arrow-right ml-2"></i>
        </button>
    </div>
</div>



    <div class="container text-center mb-20 mt-10 ">

        <h2 class="text-4xl font-bold text-[#E493B3]">Our Plans for Task Management</h2>
        <div class="flex flex-col sm:flex-row items-center justify-center px-8 gap-10 sm:gap-36 mx-5 text-zinc-600 mt-20">
            <!-- Starter Plan -->
            <div
                class="flex flex-col items-center bg-[#eee3ee] p-8 rounded-xl shadow-lg w-80 hover:border-[#B784B7] hover:border-4">
                <div>
                    <h2 class="font-extrabold text-3xl text-center mb-2">Free</h2>
                    <p class="opacity-60 text-center">For individuals and small teams</p>
                    <div class="flex flex-col items-center my-8">
                        <p class="font-extrabold text-4xl"> $0</p>
                        <p class="text-sm opacity-60">Forever</p>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Manage up to 5 teams</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Create and assign tasks</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>1Basic calendar integration</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Chat with team members</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Basic Support</b>
                    </p>
                    <div class="flex justify-center mt-8">
                        <a href="/dashboard" class="bg-pink-50  px-4 py-2 border-[#B784B7] border-4 hover:bg-[#B784B7] rounded-xl">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pro Plan -->
            <div
                class="flex flex-col items-center bg-gradient-to-br from-pink-50 via-[#d5aed5] to-purple-100 p-8 rounded-lg shadow-lg relative border-8 border-[#c997c9] w-96">

                <p
                    class="mono text-sm absolute -top-4 bg-[#B784B7] text-zinc-100 py-2 px-4 font-bold tracking-wider rounded">
                    POPULAR
                </p>
                <div>
                    <h2 class="font-extrabold text-3xl text-center mb-2">Pro</h2>
                    <p class="opacity-60 text-center">For agencies and businesses</p>
                    <div class="flex flex-col items-center my-8">
                        <p class="font-extrabold text-4xl">$79</p>
                        <p class="text-sm opacity-60">/month</p>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Trending Dashboard</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Feature of the plan</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Another feature plan feature</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Yet another plan feature</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Basic Support</b>
                    </p>
                    <div class="flex justify-center mt-8">
                        <a href="{{ route('subscription') }}" class="bg-pink-50  px-4 py-2 border-[#B784B7] border-4 hover:bg-[#B784B7]  rounded-xl">
                            Get Started
                        </a>
                    </div>
                </div>

            </div>

            <div
                class="flex flex-col items-center bg-[#eee3ee] p-8 rounded-lg shadow-xl w-80 hover:border-[#B784B7] hover:border-4">
                <div>
                    <h2 class="font-extrabold text-3xl text-center mb-2">standard</h2>
                    <p class="opacity-60 text-center">For individuals and small teams</p>
                    <div class="flex flex-col items-center my-8">
                        <p class="font-extrabold text-4xl">$45</p>
                        <p class="text-sm opacity-60">/month</p>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Trending Dashboard</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Feature of the plan</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Another feature plan feature</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Yet another plan feature</b>
                    </p>
                    <p class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-4 h-4 mr-2">
                            <path fill-rule="evenodd"
                                d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <b>Basic Support</b>
                    </p>
                    <div class="flex justify-center mt-8">
                        <a href="{{ route('subscription') }}" class="bg-pink-50  px-4 py-2 border-[#B784B7] border-4 hover:bg-[#B784B7]  rounded-xl">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="bg-[#eee3ee] py-5">
        <div class="mt-8 text-gray-500 pt-9">
            <div class="mx-auto w-full max-w-[1166px] px-4 xl:px-0">
                <div class="flex flex-col justify-between sm:px-[18px] md:flex-row md:px-10">
                    <div class="md:w-[316px]">
                        <p class="text-[18px] font-medium ">
                        <h1 class="text-2xl font-extrabold">Task<span class="text-[#B784B7]">Geek</span>
                        </h1>
                        </p>
                        <p class="mt-[18px] text-[15px] font-normal text-gray-500/[80%]">TaskGeek est une plateforme
                            innovante qui vous aide à organiser, suivre et collaborer efficacement sur vos tâches et
                            projets. Que vous soyez une équipe ou un individu, notre outil est conçu pour optimiser votre
                            productivité.</p>
                        <div class="mt-[18px] flex gap-7">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-linkedin"></i>
                        </div>
                    </div>
                    <div class="md:w-[316px]">
                        <div class="mt-[23px] flex">
                            <div class="flex h-[38px] w-[38px] items-center justify-center rounded-[75%]">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20.8472 14.8554L16.4306 12.8764L16.4184 12.8707C16.1892 12.7727 15.939 12.7333 15.6907 12.7562C15.4424 12.7792 15.2037 12.8636 14.9963 13.002C14.9718 13.0181 14.9484 13.0357 14.9259 13.0545L12.6441 14.9998C11.1984 14.2976 9.70595 12.8164 9.00376 11.3895L10.9519 9.07294C10.9706 9.0495 10.9884 9.02606 11.0053 9.00075C11.1407 8.79384 11.2229 8.55667 11.2445 8.31035C11.2661 8.06402 11.2264 7.81618 11.1291 7.58887V7.57762L9.14438 3.15356C9.0157 2.85662 8.79444 2.60926 8.51362 2.44841C8.2328 2.28756 7.9075 2.22184 7.58626 2.26106C6.31592 2.42822 5.14986 3.05209 4.30588 4.01615C3.4619 4.98021 2.99771 6.21852 3.00001 7.49981C3.00001 14.9436 9.05626 20.9998 16.5 20.9998C17.7813 21.0021 19.0196 20.5379 19.9837 19.6939C20.9477 18.85 21.5716 17.6839 21.7388 16.4136C21.7781 16.0924 21.7125 15.7672 21.5518 15.4864C21.3911 15.2056 21.144 14.9843 20.8472 14.8554ZM16.5 19.4998C13.3185 19.4963 10.2682 18.2309 8.01856 15.9813C5.76888 13.7316 4.50348 10.6813 4.50001 7.49981C4.49648 6.58433 4.82631 5.69887 5.42789 5.00879C6.02947 4.3187 6.86167 3.87118 7.76907 3.74981C7.7687 3.75355 7.7687 3.75732 7.76907 3.76106L9.73782 8.16731L7.80001 10.4867C7.78034 10.5093 7.76247 10.5335 7.74657 10.5589C7.60549 10.7754 7.52273 11.0246 7.5063 11.2825C7.48988 11.5404 7.54035 11.7981 7.65282 12.0307C8.5022 13.7679 10.2525 15.5051 12.0084 16.3536C12.2428 16.465 12.502 16.5137 12.7608 16.495C13.0196 16.4762 13.2692 16.3907 13.485 16.2467C13.5091 16.2305 13.5322 16.2129 13.5544 16.1942L15.8334 14.2498L20.2397 16.2232C20.2397 16.2232 20.2472 16.2232 20.25 16.2232C20.1301 17.1319 19.6833 17.9658 18.9931 18.5689C18.3028 19.172 17.4166 19.5029 16.5 19.4998Z"
                                        fill="gray"></path>
                                </svg>
                            </div>
                            <div class="ml-[18px]">
                                <a href="t" class="font-Inter text-[14px] font-medium text-gray-500">+212 522 662
                                    660</a>
                                <p class="font-Inter text-[12px] font-medium text-gray-500">Support Number</p>
                            </div>
                        </div>
                        <div class="mt-[23px] flex">
                            <div class="flex h-[38px] w-[38px] items-center justify-center rounded-[75%]">
                                <svg width="20" height="15" viewBox="0 0 20 15" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 0H1C0.801088 0 0.610322 0.0790178 0.46967 0.21967C0.329018 0.360322 0.25 0.551088 0.25 0.75V13.5C0.25 13.8978 0.408035 14.2794 0.68934 14.5607C0.970644 14.842 1.35218 15 1.75 15H18.25C18.6478 15 19.0294 14.842 19.3107 14.5607C19.592 14.2794 19.75 13.8978 19.75 13.5V0.75C19.75 0.551088 19.671 0.360322 19.5303 0.21967C19.3897 0.0790178 19.1989 0 19 0ZM10 7.98281L2.92844 1.5H17.0716L10 7.98281ZM7.25406 7.5L1.75 12.5447V2.45531L7.25406 7.5ZM8.36406 8.51719L9.48906 9.55312C9.62743 9.68014 9.80842 9.75062 9.99625 9.75062C10.1841 9.75062 10.3651 9.68014 10.5034 9.55312L11.6284 8.51719L17.0659 13.5H2.92844L8.36406 8.51719ZM12.7459 7.5L18.25 2.45438V12.5456L12.7459 7.5Z"
                                        fill="gray"></path>
                                </svg>
                            </div>
                            <div class="ml-[18px]">
                                <a href="mailto:help@lorem.com"
                                    class="font-Inter text-[14px] font-medium text-gray-500">contact@TaskGeek.com</a>
                                <p class="font-Inter text-[12px] font-medium text-gray-500">Support Email</p>
                            </div>
                        </div>

                    </div>
                    <div
                        class="mt-6 flex w-full flex-col justify-between text-gray-500 sm:flex-row md:mt-0 md:max-w-[341px]">
                        <div class="">
                            <p class="text-gray-500 font-inter text-[18px] font-medium leading-normal">Pages</p>
                            <ul>
                                <li class="mt-[15px]"><a
                                        class="text-gray-500 hover:text-gray-500/80 font-inter text-[15px] font-normal hover:font-semibold"
                                        href="#">Home</a></li>
                                <li class="mt-[15px]"><a
                                        class="text-gray-500 hover:text-gray-500/80 font-inter text-[15px] font-normal hover:font-semibold"
                                        href="#">News</a></li>
                                <li class="mt-[15px]"><a
                                        class="text-gray-500 hover:text-gray-500/80 font-inter text-[15px] font-normal hover:font-semibold"
                                        href="#">Contact</a></li>
                                <li class="mt-[15px]"><a
                                        class="text-gray-500 hover:text-gray-500/80 font-inter text-[15px] font-normal hover:font-semibold"
                                        href="#">Plans and pricing</a></li>
                                <li class="mt-[15px]"><a
                                        class="text-gray-500 hover:text-gray-500/80 font-inter text-[15px] font-normal hover:font-semibold"
                                        href="#">Terms and conditions</a></li>
                                <li class="mt-[15px]"><a
                                        class="text-gray-500 hover:text-gray-500/80 font-inter text-[15px] font-normal hover:font-semibold"
                                        href="#">Privcay policy</a></li>
                            </ul>
                        </div>
                        <div class="mt-6 flex flex-col gap-4 sm:mt-0">
                            <p class="text-gray-500 font-inter text-[18px] font-semibold">Download the app</p>
                            <div class="flex gap-4 sm:flex-col">
                                <button type="button"
                                    class="flex items-center justify-center w-40 text-gray-500 bg-transparent border border-gray-500 h-12 rounded-xl">
                                    <div class="mr-3">
                                        <svg viewBox="0 0 384 512" width="23">
                                            <path fill="currentColor"
                                                d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs">
                                            Download on the
                                        </div>
                                        <div class="-mt-1 font-sans text-xl font-semibold">
                                            App Store
                                        </div>
                                    </div>
                                </button>
                                <button type="button"
                                    class="flex items-center justify-center w-40 text-gray-500 bg-transparent border border-gray-500 h-12 rounded-xl">
                                    <div class="mr-3">
                                        <i class="fa-brands fa-google-play text-gray-500"></i>
                                    </div>
                                    <div>
                                        <div class="text-xs">
                                            Download on the
                                        </div>
                                        <div class="-mt-1 font-sans text-xl font-semibold">
                                            Google Play
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-[30px] text-gray-500" />
                <div class="flex items-center justify-center pb-8 pt-[9px] md:py-8">
                    <p class="text-[10px] font-normal text-gray-500 md:text-[12px]">
                        © Copyright
                        <!-- -->2024
                        <!-- -->, All Rights Reserved by Task<span class="text-[#B784B7]">Geek</span>
                    </p>
                </div>
            </div>
        </div>

    </footer>
@endsection
