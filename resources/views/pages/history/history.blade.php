@extends('layout')
@section('content')
    <div class="table-agile-info">
    <div class="panel panel-default">
    <div class="panel-heading">
      List all orders
    </div>
  
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
             <th>Order</th>
             <th>Order ID</th>
             <th>Order Date</th>
             <th>Order Status</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          @endphp
          @foreach($getorder as $key => $ord)
            @php 
            $i++;
            @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $ord->order_code }}</td>
            <td>{{ $ord->created_at }}</td>
            
            <td>@if($ord->order_status==1)
                    <span class="text text-success">New order</span>
                 @elseif($ord->order_status==2)
                    <span class="text text-primary">Processed - Shipped</span>
                 @else
                   <span class="text text-danger">Order has been canceled</span>
                 @endif
             </td>
           
           
            <td>
              @if($ord->order_status!=3)
              <!-- Trigger the modal with a button -->
              <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huydon">Order has been canceled</button></p>
              @endif
              <!-- Modal -->
              <div id="huydon" class="modal fade" role="dialog">
                <div class="modal-dialog">
                <form>
                  @csrf
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Reason for order cancellation</h4>
                    </div>
                    <div class="modal-body">
                      <p><textarea rows="5" class="lydohuydon" required placeholder="Reason for order cancellation....(required)"></textarea></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="button" id="{{$ord->order_code}}" onclick="Huydonhang(this.id)" class="btn btn-success">Send cancellation reason</button>
                    </div>
                  </div>
                </form>

                </div>
              </div>
              <p><a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
               View orders</a></p>

             {{--  <a onclick="return confirm('Are you sure you want to delete this order?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a> --}}

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
         {{--  <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> --}}
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$getorder->links()!!}
          </ul>
        </div>
      </div>
    </footer>
   
  </div>
</div>
@endsection