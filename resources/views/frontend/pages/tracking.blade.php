
@extends('frontend.frontend_master')
@section('content')
<div class="contact_form pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="contact_form_title text-center pb-5"><h3>ORDER STATUS</h3></div>

                <div class="progress">
                    @if ($tracking->status==0)
                    <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment one" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                @elseif ($tracking->status==1)
                <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment one" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-primary" role="progressbar" aria-label="Segment two" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                @elseif ($tracking->status==2)
                <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment one" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-primary" role="progressbar" aria-label="Segment two" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-info" role="progressbar" aria-label="Segment three" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    @elseif ($tracking->status==3)
                    <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment one" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-primary" role="progressbar" aria-label="Segment two" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-info" role="progressbar" aria-label="Segment three" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar bg-success" role="progressbar" aria-label="Segment three" style="width: 35%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    @else
                    <div class="progress-bar bg-danger" role="progressbar" aria-label="Segment one" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                @endif
                  </div><br>
                  @if ($tracking->status==0)
                  <h4>Note: Your order is under review</h4>
                  @elseif ($tracking->status==1)
                  <h4>Note: Payment accept under process</h4>
                  @elseif ($tracking->status==2)
                  <h4>Note: Packing done handover process</h4>
                  @elseif ($tracking->status==3)
                  <h4>Note: Your Order Complete</h4>
                  @else
                  <h4>Note: Order Cancel</h4>
                  @endif


            </div>

            <div class="col-md-5">
                <div class="contact_form_title text-center"><h3>ORDER DETAILS</h3></div>
                <ul class="list-group col-md-12">
                    <li class="list-group-item"><span style="font-size:18px">Payment Type: </span><span class="badge badge-info">{{ $tracking->payment_type }}</span></li>
                    <li class="list-group-item"><span style="font-size:18px">Transection Id: </span><span class="badge badge-primary">{{ $tracking->payment_id }}</span></li>
                    <li class="list-group-item"><span style="font-size:18px">Balance Transection: </span><span class="badge badge-danger">{{ $tracking->blnc_transection }}</span></li>
                    <li class="list-group-item"><span style="font-size:18px">Sub Total: </span><span class="badge badge-info">{{ $tracking->subtotal }} TK</span></li>
                    <li class="list-group-item"><span style="font-size:18px">Shipping: </span><span class="badge badge-info">{{ $tracking->shipping }} Tk</span></li>
                    <li class="list-group-item "><span style="font-size:18px">Total: </span><span class="badge badge-success">{{ $tracking->total }} TK</span></li>
                    <li class="list-group-item"><span style="font-size:18px">Month: </span><span class="badge badge-info">{{ $tracking->month }}</span></li>
                    <li class="list-group-item"><span style="font-size:18px">Date: </span><span class="badge badge-info">{{ $tracking->date }}</span></li>
                    <li class="list-group-item"><span style="font-size:18px">Year: </span><span class="badge badge-info">{{ $tracking->year }}</span></li>

                </ul>

            </div>
        </div>
    </div>
</div>


@endsection
