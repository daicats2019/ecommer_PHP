@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List Coupon
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
       {{--  <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>   --}}      



      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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


            <th>Discount Code Name</th>
             <th>Start Date</th>
             <th>End Date</th>
             <th>Discount Code</th>
             <th>Discount Quantity</th>
             <th>Discount Conditions</th>
             <th>Decreases</th>
             <th>Status</th>
             <th>Expires</th>
             <td>Management</td>
             <th>Send Code</th>
            

          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>

            <td>{{ $cou->coupon_name }}</td>
            <td>{{ $cou->coupon_date_start }}</td>
            <td>{{ $cou->coupon_date_end }}</td>

            <td>{{ $cou->coupon_code }}</td>
            <td>{{ $cou->coupon_time }}</td>
            <td><span class="text-ellipsis">
              <?php
              if($cou->coupon_condition==1){
                ?>
                Reduce by %
                <?php
              }else{
                ?>  
                Reduce by money
                <?php
              }
              ?>
            </span>
          </td>
          <td><span class="text-ellipsis">
            <?php
            if($cou->coupon_condition==1){
              ?>
              Reduce {{$cou->coupon_number}} %
              <?php
            }else{
              ?>  
              Reduce {{$cou->coupon_number}} k
              <?php
            }
            ?>
          </span></td>
          <td><span class="text-ellipsis">
            <?php
            if($cou->coupon_status==1){
              ?>
              <span style="color:green">Active</span>
              <?php
            }else{
              ?>  
              <span style="color:red">Locked</span>
              <?php
            }
            ?>
          </span>
        </td>
        <td>

          @if($cou->coupon_date_end>=$today)
          <span style="color:green">Is already still time</span>
          @else 
          <span style="color:red">Is not already still time</span>
          @endif
          

        </td>
        <td>

          <a onclick="return confirm('Are you sure you want to remove this code?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
            <i class="fa fa-times text-danger text"></i>
          </a>
        </td>
        <td>
      
          <p><a href="{{url('/send-coupon-vip', [ 

            'coupon_time'=> $cou->coupon_time,
            'coupon_condition'=> $cou->coupon_condition,
            'coupon_number'=> $cou->coupon_number,
            'coupon_code'=> $cou->coupon_code


          ])}}" class="btn btn-primary" style="margin:5px 0;">Send VIP customer discount</a></p>    
          <p><a href="{{url('/send-coupon',[ 

           
            'coupon_time'=> $cou->coupon_time,
            'coupon_condition'=> $cou->coupon_condition,
            'coupon_number'=> $cou->coupon_number,
            'coupon_code'=> $cou->coupon_code


          ])}}" class="btn btn-default">Send regular customer discount</a></p>  
       

       </td>
     </tr>
     @endforeach
   </tbody>
 </table>
</div>
<footer class="panel-footer">
  <div class="row">

    <div class="col-sm-5 text-center">
      <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
    </div>
    <div class="col-sm-7 text-right text-center-xs">                
      <ul class="pagination pagination-sm m-t-none m-b-none">
       {!!$coupon->links()!!}
     </ul>
   </div>
 </div>
</footer>
</div>
</div>
@endsection