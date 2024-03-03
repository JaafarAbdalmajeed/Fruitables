@extends('layouts.admin')

@section('title', 'Order Items')

@section('content')
@include('admin.order.create')
@include('admin.order.edit')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Order Items</h3>

        <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <!-- Table content -->
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Id</td>
                                <td>name</td>
                                <td>price</td>
                                <td>quantity</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)
                            <tr>
                                <td><img src="{{asset($item->product->image)}}" width="50px" height="50px"></td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Order details <span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p id="total-price" class="mb-0">{{$order->total_price}}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Firstname</h5>
                            <div class="">
                                <p class="mb-0">{{$order->firstname}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Lastname</h5>
                            <div class="">
                                <p class="mb-0">{{$order->lastname}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Address</h5>
                            <div class="">
                                <p class="mb-0">{{$order->address}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">City</h5>
                            <div class="">
                                <p class="mb-0">{{$order->city}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Country</h5>
                            <div class="">
                                <p class="mb-0">{{$order->country}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Postcode</h5>
                            <div class="">
                                <p class="mb-0">{{$order->postcode}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Mobile</h5>
                            <div class="">
                                <p class="mb-0">{{$order->mobile}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Email</h5>
                            <div class="">
                                <p class="mb-0">{{$order->email}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Order Note</h5>
                            <div class="">
                                <p class="mb-0">{{$order->order_note}}</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Message</h5>
                            <div class="">
                                <p class="mb-0">{{$order->message}}</p>
                            </div>
                        </div>
                    </div>
                    <button class="btn {{ $order->status == 1 ? 'btn-primary' : 'btn-success' }}  rounded-pill px-6 py-3 text-uppercase mb-4 ms-4 m-3" id="btn-update-state" onclick="updateState({{$order->id}}, this.textContent)" type="button">    {{ $order->status == 1 ? 'Pending' : 'Completed' }}</button>

                </div>

            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
function updateState(id, state) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        type: "post",
        url: "{{ route('update.state') }}",
        data: {
            id: id,
            state: state,
            _token: csrfToken
        },
        success: function(response) {
            if (response.message === 'Completed') {
                $("#btn-update-state").text("Completed").removeClass("btn-primary").addClass("btn-success");
            } else {
                $("#btn-update-state").text("Pending").removeClass("btn-success").addClass("btn-primary");
            }
        }
    });
}
</script>
@endpush
