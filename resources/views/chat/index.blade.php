@extends('layouts.app')
@section('main')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-chat card overflow-hidden">
            <div class="row g-0">
                <!-- Sidebar Left -->
                <div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
                    <div
                        class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                        <div class="avatar avatar-xl avatar-online">
                            <img src="{{ asset('public') }}/assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <h5 class="mt-2 mb-0">John Doe</h5>
                        <small>Admin</small>
                        <i class="ti ti-x ti-sm cursor-pointer close-sidebar" data-bs-toggle="sidebar" data-overlay
                            data-target="#app-chat-sidebar-left"></i>
                    </div>
                    <div class="sidebar-body px-4 pb-4">
                        <div class="my-4">
                            <p class="text-muted text-uppercase">About</p>
                            <textarea id="chat-sidebar-left-user-about" class="form-control chat-sidebar-left-user-about mt-3" rows="4"
                                maxlength="120">
                                    Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                        </div>
                        <div class="my-4">
                            <p class="text-muted text-uppercase">Status</p>
                            <div class="d-grid gap-1">
                                <div class="form-check form-check-success">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="active"
                                        id="user-active" checked />
                                    <label class="form-check-label" for="user-active">Active</label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="busy"
                                        id="user-busy" />
                                    <label class="form-check-label" for="user-busy">Busy</label>
                                </div>
                                <div class="form-check form-check-warning">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="away"
                                        id="user-away" />
                                    <label class="form-check-label" for="user-away">Away</label>
                                </div>
                                <div class="form-check form-check-secondary">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="offline"
                                        id="user-offline" />
                                    <label class="form-check-label" for="user-offline">Offline</label>
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <p class="text-muted text-uppercase">Settings</p>
                            <ul class="list-unstyled d-grid gap-2 me-3">
                                <li class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="ti ti-message me-1"></i>
                                        <span class="align-middle">Two-step Verification</span>
                                    </div>
                                    <label class="switch switch-primary me-4">
                                        <input type="checkbox" class="switch-input" checked="" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="ti ti-bell me-1"></i>
                                        <span class="align-middle">Notification</span>
                                    </div>
                                    <label class="switch switch-primary me-4">
                                        <input type="checkbox" class="switch-input" />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </li>
                                <li>
                                    <i class="ti ti-user-plus me-1"></i>
                                    <span class="align-middle">Invite Friends</span>
                                </li>
                                <li>
                                    <i class="ti ti-trash me-1"></i>
                                    <span class="align-middle">Delete Account</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mt-4">
                            <button class="btn btn-primary" data-bs-toggle="sidebar" data-overlay
                                data-target="#app-chat-sidebar-left">
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar Left-->

                <!-- Chat & Contacts -->
                <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end"
                    id="app-chat-contacts">
                    <div class="sidebar-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 input-group input-group-merge rounded-pill">
                                <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                                <input type="text" class="form-control chat-search-input" placeholder="Search..."
                                    aria-label="Search..." aria-describedby="basic-addon-search31" />
                            </div>
                        </div>
                        <i class="ti ti-x cursor-pointer close-sidebar d-lg-none d-block position-absolute top-0 end-0"
                            data-overlay data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                    </div>
                    <hr class="container-m-nx m-0" />
                    <div class="sidebar-body">
                        <!-- Contacts -->
                        <ul class="list-unstyled chat-contact-list mb-0" id="contact-list">
                            <li class="chat-contact-list-item chat-list-item-0 d-none">
                                <h6 class="text-muted mb-0"></h6>
                            </li>
                            <li class="chat-contact-list-item chat-contact-list-item-title">
                                <h5 class="text-primary mb-0">Contacts</h5>
                            </li>
                            <li class="chat-contact-list-item contact-list-item-0 d-none">
                                <h6 class="text-muted mb-0">No Contacts Found</h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /Chat contacts -->
<!-- Chat History -->
<div class="col app-chat-history bg-body">
    <div class="chat-history-wrapper">
        <div class="chat-history-header border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex overflow-hidden align-items-center">
                    <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2"
                        data-bs-toggle="sidebar" data-overlay data-target="#app-chat-contacts"></i>
                    <div class="flex-shrink-0 avatar"
                        style="background-color: #f0f0f0; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                        <span style="font-weight: bold; color: #333;">US</span>
                    </div>
                    <div class="chat-contact-info flex-grow-1 ms-2">
                        <h6 class="m-0">{{ Auth::user()->name }}</h6>
                        <small class="user-status text-muted">{{ Auth::user()->role }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-history-body bg-body">
            <ul class="list-unstyled chat-history">
                @foreach ($chat as $o)
                <tr>
                    <li class="chat-message chat-message-right">
                        <div class="d-flex overflow-hidden">
                            <div class="chat-message-wrapper flex-grow-1"><div class="chat-message-text">
                                <p class="mb-0">{{ $o->message }}</p>
                            </div>
                                <div class="text-end text-muted mt-1">
                                    <i class="ti ti-checks ti-xs me-1 text-success"></i>
                                    <small>10:00 AM</small>
                                </div>
                            </div>
                            {{-- <div class="user-avatar flex-shrink-0 ms-3">
                                <div class="avatar avatar-sm">
                                    <img src="{{ asset('public') }}/assets/img/avatars/1.png" alt="Avatar"
                                        class="rounded-circle" />
                                </div>
                            </div> --}}
                            <div class="flex-shrink-0 avatar ms-3"
                        style="background-color: #f0f0f0; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                        <span style="font-weight: bold; color: #333;">US</span>
                    </div>
                        </div>
                    </li>
                </tr>
            @endforeach

                <li class="chat-message">
                    <div class="d-flex overflow-hidden">
                        <div class="user-avatar flex-shrink-0 me-3">
                            <div class="avatar avatar-sm">
                                <img src="{{ asset('public') }}/assets/img/avatars/2.png" alt="Avatar"
                                    class="rounded-circle" />
                            </div>
                        </div>
                        <div class="chat-message-wrapper flex-grow-1">
                            <div class="chat-message-text">
                                <p class="mb-0">Hey John, I am looking for the best admin template.</p>
                                <p class="mb-0">Could you please help me to find it out? 🤔</p>
                            </div>
                            <div class="text-muted mt-1">
                                <small>10:02 AM</small>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Chat message form -->
        <div class="chat-history-footer shadow-sm">
            <form class="d-flex justify-content-between align-items-center" id="form-send-message">
                <input type="hidden" name="receiver_id" id="receiver_id">
                <input class="form-control message-input border-0 me-3 shadow-none" id="chat_message"
                    name="chat_message" placeholder="Type your message here" />
                <div class="message-actions d-flex align-items-center">
                    <button type="button" class="btn btn-primary d-flex send-msg-btn" id="sendMessage">
                        <i class="ti ti-send me-md-1 me-0"></i>
                        <span class="align-middle d-md-inline-block d-none">Send</span>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- /Chat History -->




                <div class="app-overlay"></div>

            </div>
        </div>


    </div>
    </div>

@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            // Fetch the contact list when the page loads
            let contacts = []; // Array to store contacts

            function loadContacts() {
                console.log("Fetching contacts...");

                $.ajax({
                    url: "{{ url('contacts') }}", // Fetch contacts from the specified route
                    method: 'GET',
                    success: function(response) {
                        console.log(response); // Log the response from the server
                        contacts = response; // Store contacts in the global array
                        displayContacts(contacts);
                    },
                    error: function(xhr, status, error) {
                        console.log("Error fetching contacts:", error); // Log any errors
                    }
                });
            }

            // Function to display contacts
            function displayContacts(contactList) {
                $('#contact-list').html('');

                // Add the contacts heading
                $('#contact-list').append(`
            <li class="chat-contact-list-item chat-contact-list-item-title border-bottom">
                <h5 class="text-primary mb-0">Contacts</h5>
            </li>
        `);

                // Check if there are any contacts
                if (contactList.length === 0) {
                    $('#contact-list').append(`
                <li class="chat-contact-list-item contact-list-item-0">
                    <h6 class="text-muted mb-0">No Contacts Found</h6>
                </li>
            `);
                } else {
                    // Loop through each contact and append it using the specified HTML structure
                    contactList.forEach(function(contact) {
                        var initials = getInitials(contact.name);
                        var contactHTML = `
                    <li class="chat-contact-list-item" data-name="${contact.name}" data-receiver-id="${contact.id}" data-role="${contact.role}">
                        <a class="d-flex align-items-center">
                            <div class="flex-shrink-0 avatar" style="background-color: #f0f0f0; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                <span style="font-weight: bold; color: #333;">` + initials + `</span>
                            </div>
                            <div class="chat-contact-info flex-grow-1 ms-2">
                                <h6 class="chat-contact-name text-truncate m-0">` + contact.name + `</h6>
                                <p class="chat-contact-status text-muted text-truncate mb-0">` + contact.role + `</p>
                            </div>
                        </a>
                    </li>
                `;
                        $('#contact-list').append(contactHTML);
                    });
                }
            }

            // Function to get initials from the contact name
            function getInitials(name) {
                var names = name.split(' ');
                var initials = names[0].charAt(0).toUpperCase();


                if (names.length > 1) {
                    initials += names[names.length - 1].charAt(0).toUpperCase();
                }

                return initials;
            }

            // Search functionality
            $('.chat-search-input').on('keyup', function() {
                var searchValue = $(this).val().toLowerCase();
                var filteredContacts = contacts.filter(function(contact) {
                    return contact.name.toLowerCase().includes(searchValue);
                });
                displayContacts(filteredContacts);
            });

            // Click event for contact items
            $('#contact-list').on('click', '.chat-contact-list-item', function() {
                var name = $(this).data('name');
                var role = $(this).data('role');
                var receiver = $(this).data('receiver-id');
                var initials = getInitials(name);

                // Update the chat header
                $('.chat-history-header .chat-contact-info h6').text(name);
                $('.chat-history-header .user-status').text(role);
                $('.chat-history-header .avatar span').text(initials);
                $("#receiver_id").val(receiver)
                // Update initials in the chat header

            });

            // Load contacts on page load
            loadContacts();
        });


        $(document).ready(function() {
            $("#sendMessage").click(function(e) {
                // Get the values from the input fields
                const receiverId = $("#receiver_id").val(); // Get receiver ID
                const chatMessage = $("#chat_message").val(); // Get chat message

                // Log values for debugging
                console.log('Receiver ID:', receiverId);
                console.log('Chat Message:', chatMessage);

                $.ajax({
                    url: "{{ route('message.store') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    data: {
                        receiver_id: receiverId,
                        chat_message: chatMessage
                    },
                    success: function(response) {
                        console.log('response');
                        if (response.status === true) {

                            $("#chat_message").val(''); // Clear the message input

                        } else {
                            console.error("Error: ", response
                            .errors); // Log errors for debugging
                        }
                    },
                    error: function(error) {
                        console.error("Ajax request failed: ",
                        error); // Log AJAX error for debugging
                    }
                });
            });
        });
    </script>
@endsection
