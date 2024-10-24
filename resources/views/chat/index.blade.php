@extends('layouts.app')
@section('css')
    <style>
        .unread-count {
            background-color: rgb(0, 255, 85);
            border-color: rgb(193, 74, 131);
            background-color: rgb(193, 74, 131);

            border-radius: 50%;
            width: 1rem;
            height: 1rem;
            text-align: center;
            font-size: 9px;
            color: #fff;
            padding: 2px;
            display: flex;
            justify-content: center;
            text-align: center;
        }
    </style>
@endsection
@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-chat card overflow-hidden">
            <div class="row g-0">
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
                    <div id="chat-history-wrapper">
                        <div class="chat-history-header border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex overflow-hidden align-items-center">
                                    <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2"
                                        data-bs-toggle="sidebar" data-overlay data-target="#app-chat-contacts"></i>
                                    <div class="flex-shrink-0 avatar"
                                        style="background-color: #f0f0f0; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                        <span style="font-weight: bold; color: #333;"></span>
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-2">
                                        <h6 class="m-0"></h6>
                                        <small class="user-status text-muted"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history-body bg-body">
                            <ul class="list-unstyled chat-history" id="chat-messages">
                                {{--  --}}
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
@section('link-js')
    <!-- Page JS -->
    <script src="{{ asset('public') }}/assets/js/app-chat.js"></script>
@endsection
@section('javascript')
    <script>

        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const receiverId = urlParams.get('receiver_id');
            if (receiverId) {
                updateChatHeader(receiverId)
                getMessages(receiverId);
                $("#receiver_id").val(receiver_id);
                const contactItem = $('#contact-list').find(`[data-receiver-id="${receiverId}"]`);
                if (contactItem.length) {
                    var name = contactItem.data('name');
                    var role = contactItem.data('role');
                    var profile_pic = contactItem.data('profile-pic');
                    var initials = getInitials(name);

                    $('.chat-history-header .chat-contact-info h6').text(name);
                    $('.chat-history-header .user-status').text(role);

                    if (profile_pic) {
                        $('.chat-history-header .avatar').html(`
                    <img src="{{ asset('public') }}/profile/${profile_pic}" alt="${name}" class="avatar-img" style="width: 40px; height: 40px; border-radius: 50%;">
                `);
                    } else {
                        $('.chat-history-header .avatar').html(`
                    <span class="avatar-initials" style="font-weight: bold; color: #333;">${initials}</span>
                `);
                    }
                }
            }
            loadContacts()
            let contacts = [];

            function loadContacts() {
                $.ajax({
                    url: "{{ url('contacts') }}",
                    method: 'GET',
                    success: function(response) {
                        contacts = response;
                        displayContacts(contacts);
                    },
                    error: function(xhr, status, error) {}
                });
            }

            function displayContacts(contactList) {
                $('#contact-list').html('');
                $('#contact-list').append(`
                <li class="chat-contact-list-item chat-contact-list-item-title border-bottom">
                    <h5 class="text-primary mb-0">Contacts</h5>
                </li>
            `);

                if (contactList.length === 0) {
                    $('#contact-list').append(`
                    <li class="chat-contact-list-item contact-list-item-0">
                        <h6 class="text-muted mb-0">No Contacts Found</h6>
                    </li>
                `);
                } else {
                    contactList.forEach(function(contact) {
                        var initials = getInitials(contact.name);
                        var lastMessage = contact.last_message ? contact.last_message : 'no message Found';
                        var isUnread = contact.unread_count > 0 ?
                            `<div class="unread-count d-flex">${contact.unread_count}</div>` : '';
                        var avatarContent = contact.profile_pic ?
                            `<img src="{{ asset('public') }}/profile/${contact.profile_pic}" alt="${contact.name}" class="avatar-img" style="width: 40px; height: 40px; border-radius: 50%;">` :
                            `<div class="avatar-initials" style="font-weight: bold; color: #333;">${initials}</div>`;

                        var contactHTML = `<li class="chat-contact-list-item" data-name="${contact.name}"  data-profile-pic="${contact.profile_pic}" data-receiver-id="${contact.id}" data-role="${contact.role}">
                                                    <a href="javascript:void(0)" class="d-flex align-items-center" href="?receiver_id=${contact.id}">
                                                        <div class="flex-shrink-0 avatar" style="background-color: #f0f0f0; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                                            ${avatarContent}
                                                        </div>
                                                        <div class="chat-contact-info flex-grow-1 ms-2">
                                                            <h6 class="chat-contact-name text-truncate m-0">${contact.name} (${contact.role})</h6>
                                                            <p class="chat-contact-status text-muted text-truncate mb-0">${lastMessage}</p>
                                                        </div>
                                                        ${isUnread}
                                                    </a>
                                                </li>
                                            `;
                        $('#contact-list').append(contactHTML);
                    });
                }
            }

            function updateChatHeader(receiverId) {
                const contactItem = $('#contact-list').find(`[receiver-id="${receiverId}"]`);
                console.log(contactItem);
                debugger

                if (contactItem.length) {
                    var name = contactItem.data('name');
                    var role = contactItem.data('role');
                    var profile_pic = contactItem.data('profile-pic');
                    var initials = getInitials(name);
                    $('.chat-history-header .chat-contact-info h6').text(name);
                    $('.chat-history-header .user-status').text(role);

                    // Update avatar
                    if (profile_pic) {
                        $('.chat-history-header .avatar').html(`
                <img src="{{ asset('public') }}/profile/${profile_pic}" alt="${name}" class="avatar-img" style="width: 40px; height: 40px; border-radius: 50%;">
            `);
                    } else {
                        $('.chat-history-header .avatar').html(`
                <span class="avatar-initials" style="font-weight: bold; color: #333;">${initials}</span>
            `);
                    }
                    getMessages(receiverId);
                    markAsRead(receiverId);
                }
            }
            $('#contact-list').on('click', '.chat-contact-list-item', function() {
                var receiver_id = $(this).data('receiver-id');
                var newUrl = window.location.origin + window.location.pathname + '?receiver_id=' +
                    receiver_id;
                window.location.href = newUrl;
            });

            function getInitials(name) {
                var names = name.split(' ');
                var initials = names[0].charAt(0).toUpperCase();


                if (names.length > 1) {
                    initials += names[names.length - 1].charAt(0).toUpperCase();
                }

                return initials;
            }
            $('.chat-search-input').on('keyup', function() {
                var searchValue = $(this).val().toLowerCase();
                var filteredContacts = contacts.filter(function(contact) {
                    return contact.name.toLowerCase().includes(searchValue);
                });
                displayContacts(filteredContacts);
            });
<<<<<<<<< Temporary merge branch 1
            $("#sendMessage").click(function(e) {
                e.preventDefault();
                const receiverId = $("#receiver_id").val();
                const chatMessage = $("#chat_message").val();
                if (!receiverId) {
                    alert("Receiver ID is required.");
                    return;
                    success: function(response) {
                        if (response.status) {
                            var newMessage = response.message;
                            var alignment = newMessage.sender_id == {{ auth()->id() }} ?
                                'chat-message-right' : '';
                            var messageHTML = `
                    <li class="chat-message ${alignment}">
                        <div class="d-flex overflow-hidden">
                            <div class="chat-message-wrapper flex-grow-1">
                                <div class="chat-message-text">
                                    <p class="mb-0">${newMessage.message}</p>
                                </div>
                                <div class="text-end text-muted mt-1">
                                    <small>${new Date(newMessage.created_at).toLocaleTimeString()}</small>
                                </div>
                            </div>
                        </div>
                    </li>
                `;
                            $('#chat-messages').append(messageHTML);
                            setTimeout(function() {
                                scrollToBottom();
                                console.log('scroll');

                            }, 100);
                            $('#chat_message').val('');
                        } else {
                            console.error('Error sending message:', response.error);
                        }
                    },
                    error: function(error) {
                        console.error("Ajax request failed: ", error);
                    }
                });
            });

            function markAsRead(contactId) {
                $.ajax({
                    url: "{{ url('mark-as-read') }}",
                    method: 'POST',
                    data: {
                        receiver_id: contactId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        loadContacts();

                    }
                });
            }
        });
    </script>
@endsection
