<x-app-layout>
</x-app-layout>
<div class="flex">
    <!-- Sidebar -->
    <div class="p-2">
        @include('layouts.sidebare')
    </div>

    <style>
        .fc-button {
            background-color: #d2aad2;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
        }

        .fc-button:hover {
            background-color: #EEA5A6;
            color: white;
        
        }

        .fc-button:active {
            background-color: #d2aad2;
            color: white;
        }

        .fc-button.fc-button-primary {
            background-color: #d2aad2;
            color: white;
        }

        .fc-daygrid-day.fc-day-selected,
        .fc-timegrid-day.fc-day-selected {
            background-color: #d2aad2;
            color: white;
        }

        .fc-daygrid-day.fc-day-today {
            background-color: #d2aad2;
            color: white;
        }

        .fc-daygrid-day.fc-day-active {
            background-color: #d2aad2;
            color: white;
        }
    </style>


    <div class=" w-[80vw]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <!-- Button to Open Modal -->
            <button id="openAddTaskModal"  class="group relative w-56 ml-2 inline-flex items-center justify-center px-3 py-2 text-base font-medium transition-all duration-200 ease-in-out transform hover:scale-105 hover:shadow-lg bg-gradient-to-r from-[#B784B7] to-purple-500 text-white rounded-lg">
                Ajouter une tâche</button>

            <form class="hidden" method="post" class="" action="{{ route('calendar.store') }}">
                @csrf
                <input name="start" id="start" type="datetime-local">
                <input name="end" id="end" type="datetime-local">
                <button id="submitEvent">submit</button>
            </form>

            <div class="">
                <form class="hidden" id="updateForm" method="post" action="">
                    @csrf @method('PUT')
                    <input id="updatedStart" name="start" type="hidden">
                    <input id="updatedEnd" name="end" type="hidden">
                    <button id="submitUpdate"></button>
                </form>
            </div>
            @include('components.delete_event')

            <div class="w-full h-[90vh] bg-[#fbf3fb] mt-4 rounded-3xl border-none p-3" id="calendar"></div>
        </div>


        <!-- Modal for Adding Task -->
        <div id="addTaskModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden justify-center items-center z-50">
            <div class="bg-white p-6 rounded-lg w-1/3 max-w-md mx-auto">
                <div class="text-xl mb-4 text-center">Créer une nouvelle tâche</div>
                <form id="addTaskForm" method="POST" action="{{ route('calendar.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="taskName" class="block text-sm">Nom de la tâche</label>
                        <input type="text" id="taskName" name="name" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-4">
                        <label for="taskDescription" class="block text-sm">Description de la tâche</label>
                        <textarea id="taskDescription" name="description" class="w-full p-2 border rounded" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="taskDate" class="block text-sm">Date d'échéance</label>
                        <input type="date" id="taskDate" name="due_date" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="flex justify-between">
                        <button type="button" id="closeTaskModal"
                            class="bg-[#B784B7] text-white p-2 rounded">Annuler</button>
                        <button type="submit" class="bg-[#B784B7] text-white p-2 rounded">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="taskDetailsModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 justify-center items-center z-50">
            <div class="bg-white p-6 mt-48  rounded-lg w-1/3 max-w-md mx-auto">
                <div class="text-xl text-[#B784B7] mb-4 text-center">Task Details</div>
                <div id="taskDetails" class="text-md flex flex-col gap-3">
                </div>
                <button id="closeTaskDetailsModal" class="bg-[#B784B7] text-white p-2 mt-4 rounded w-full">Close</button>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', async function() {
                let response = await axios.get("/calendar/create")
                let events = response.data.events
                console.log(events);
                
                let nowDate = new Date()
                let day = nowDate.getDate()
                let month = nowDate.getMonth() + 1
                let hours = nowDate.getHours()
                let minutes = nowDate.getMinutes()
                let minTimeAllowed =
                    `${nowDate.getFullYear()}-${month < 10 ? "0"+month : month}-${day < 10 ? "0"+day : day}T${hours < 10 ? "0"+hours : hours}:${minutes < 10 ? "0"+minutes : minutes}:00`
                start.min = minTimeAllowed;


                var myCalendar = document.getElementById('calendar');



                var calendar = new FullCalendar.Calendar(myCalendar, {

                    headerToolbar: {
                        left: 'prev,next,dayGridMonth,timeGridWeek,timeGridDay',
                        center: 'title',
                        right: 'listMonth,listWeek,listDay'
                    },


                    views: {
                        listDay: { // Customize the name for listDay
                            buttonText: 'Day Events',

                        },
                        listWeek: { // Customize the name for listWeek
                            buttonText: 'Week Events'
                        },
                        listMonth: { // Customize the name for listMonth
                            buttonText: 'Month Events'
                        },
                        timeGridWeek: {
                            buttonText: 'Week', // Customize the button text
                        },
                        timeGridDay: {
                            buttonText: "Day",
                        },
                        dayGridMonth: {
                            buttonText: "Month",
                        },

                    },


                    initialView: "timeGridWeek", // initial view  =   l view li kayban  mni kan7ol l  calendar
                    slotMinTime: "09:00:00", // min  time  appear in the calendar
                    slotMaxTime: "19:00:00", // max  time  appear in the calendar
                    nowIndicator: true, //  indicator  li kaybyen  l wa9t daba   fin  fl calendar
                    selectable: true, //   kankhali l user  i9ad  i selectioner  wast l calendar
                    selectMirror: true, //  overlay   that show  the selected area  ( details  ... )
                    selectOverlap: false, //  nkhali ktar mn event f  nfs  l wa9t  = e.g:   5 nas i reserviw nfs lblasa  f nfs l wa9t
                    weekends: true, // n7ayed  l weekends    ola nkhalihom 
                    editable: true,
                    droppable: true,


                    // events  hya  property dyal full calendar
                    //  kat9bel array dyal objects  khass  i kono jayin 3la chkl  object fih  start  o end  7it hya li kayfahloha
                    events: events,

                    eventDrop: (info) => {
                        updateEvent(info)

                    },
                    eventResize: (info) => {

                        updateEvent(info)
                    },

                    eventClick: (info) => {

                        let eventId = info.event._def.publicId

                        if (validateOwner(info)) {
                            deleteEventForm.action = `/calendar/delete/${eventId}`
                            deleteEventBtn.click()
                        }

                    },

                    selectAllow: (info) => {

                        return info.start >= nowDate;
                    },

                    select: (info) => {
                        console.log(info);


                        if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay) {
                            return
                        }

                        if (info.allDay) {
                            start.value = info.startStr + " 09:00:00"
                            end.value = info.startStr + " 19:00:00"

                        } else {
                            start.value = info.startStr.slice(0, info.startStr.length - 6)
                            end.value = info.endStr.slice(0, info.endStr.length - 6)
                        }

                        submitEvent.click()
                    },

                    eventClick: function (info) {
                // Populate modal with task details
                const task = info.event;
                const modalContent = `
                    <p><strong>Task:</strong> ${task.title}</p>
                    <p><strong>Description:</strong> ${task.extendedProps.description}</p>
                    <p><strong>Due Date:</strong> ${task.extendedProps.due_date}</p>
                    <p><strong>Start:</strong> ${task.start.toISOString()}</p>
                    <p><strong>End:</strong> ${task.end.toISOString()}</p>
                `;
                document.getElementById('taskDetails').innerHTML = modalContent;

                // Show the modal
                document.getElementById('taskDetailsModal').classList.remove('hidden');
            }

                });


                calendar.render();
                document.getElementById('closeTaskDetailsModal').addEventListener('click', function () {
            document.getElementById('taskDetailsModal').classList.add('hidden');
        });
                function updateEvent(info) {

                    let eventInfo = info.event._def
                    let eventTime = info.event._instance.range

                    if (eventTime.start > nowDate && validateOwner(info)) {
                        function formattedDate(time) {
                            let date = new Date(time);
                            return date.toISOString().slice(0, 19);
                        }

                        updatedStart.value = formattedDate(eventTime.start)
                        updatedEnd.value = formattedDate(eventTime.end)



                        updateForm.action = `/calendar/update/${eventInfo.publicId}`

                        submitUpdate.click()

                    } else {
                        window.location.reload()
                    }
                };

                function validateOwner(info) {
                    let owner = info.event._def.extendedProps.owner
                    let authUser = `{{ Auth::user()->id }}`

                    return owner == authUser
                }


            })


            document.getElementById('openAddTaskModal').addEventListener('click', function() {
                document.getElementById('addTaskModal').classList.remove('hidden');
            });

            document.getElementById('closeTaskModal').addEventListener('click', function() {
                document.getElementById('addTaskModal').classList.add('hidden');
            });
            
        </script>


    </div>
</div>
