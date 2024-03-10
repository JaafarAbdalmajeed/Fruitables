@extends('layouts.admin')

@section('title', 'Order')

@section('content')
<div class="row">

    <!-- DIRECT CHAT -->

    <div class="card direct-chat direct-chat-primary col-8 m-3">
        <div class="card-header">
            <h3 class="card-title">Direct Chat with {{$receiver->name}}</h3>

            <div class="card-tools">
                <span title="3 New Messages" class="badge badge-primary">3</span>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- Conversations are loaded here -->
            <div id="chat_area" class="direct-chat-messages">
                <!-- Messages -->
            </div>

        </div>

        <!-- /.card-body -->
        <div class="card-footer">
            <form id="send-message-form">
                <div class="input-group">
                    <input type="hidden" name="sender_id" id="sender-id" value="{{ Auth::id() }}">
                    <input type="hidden" name="receiver_id" id="receiver-id" value="{{ $receiver->id }}">
                    <input type="text" name="content" id="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary" id="send">Send</button>
                    </span>
                </div>
            </form>
        </div>
        <!-- /.card-footer-->
    </div>
    <!--/.direct-chat -->

    <div class="card direct-chat direct-chat-primary col-3">
        <div class="media m-3">
            {{-- <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}
            <div class="media-body">
                <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
        </div>

        <div class="media m-3">
            <img src="{{asset('dist/img/user1-128x128.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
                <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
    // Send message using AJAX POST request
    $('#send-message-form').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        // Get form data
        var sender_id = $('#sender-id').val();
        var receiver_id = $('#receiver-id').val();
        var message = $('#message').val();

        // Send AJAX POST request
        $.ajax({
            type: 'POST',
            url: '/chat/{{ $receiver->id }}', // Update URL to match your route
            data: {
                sender_id: sender_id,
                receiver_id: receiver_id,
                message: message,
                _token: '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function(response) {
                alert("Message sent successfully");
                $('#message').val(''); // Clear message input field
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error message
            }
        });
    });
    const pusher = new Pusher('31c20f82be9dccc761fb', {
        cluster: 'ap2',
        encrypted: true
    });

    const channel = pusher.subscribe('chat');

    channel.bind('App\\Events\\NewMessage', function(data) {
alert("slkdm")
        console.log(data);
    });


    // Retrieve messages using AJAX GET request
    function getMessages() {
        $.ajax({
            type: 'GET',
            url: '/chat/{{ $receiver->id }}', // Update URL to match your route
            dataType: 'json',
            success: function(messages) {
                console.log(messages); // Log received messages
                // Update chat interface with received messages
                // (e.g., append messages to chat window)
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log error message
            }
        });
    }

    // Call getMessages function to fetch messages initially or periodically
    getMessages(); // Fetch messages initially

    // You can also fetch messages periodically using setInterval
    // setInterval(getMessages, 5000); // Fetch messages every 5 seconds (for example)
</script>
@endpush
