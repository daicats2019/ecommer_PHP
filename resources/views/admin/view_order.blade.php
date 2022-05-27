@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Login information
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
         
           <th>Customer name</th>
           <th>Phone number</th>
           <th>Email</th>
          
          
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>{{$customer->customer_name}}</td>
          <td>{{$customer->customer_phone}}</td>
          <td>{{$customer->customer_email}}</td>

        </tr>
        
      </tbody>
    </table>

  </div>
  
</div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Shipping information
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
         
           <th>Name of carrier</th>
           <th>Address</th>
           <th>Phone number</th>
           <th>Email</th>
           <th>Notes</th>
           <th>Form of payment</th>
          
          
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
         
          <td>{{$shipping->shipping_name}}</td>
          <td>{{$shipping->shipping_address}}</td>
          <td>{{$shipping->shipping_phone}}</td>
          <td>{{$shipping->shipping_email}}</td>
          <td>{{$shipping->shipping_notes}}</td>
          <td>@if($shipping->shipping_method==0) Transfer @else Cash @endif</td>
          
          
        </tr>
        
      </tbody>
    </table>

  </div>
  
</div>
</div>
<br><br>

<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      List order details
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
             <th>Product name</th>
             <th>Number of stock remaining</th>
             <th>Discount Code</th>
             <th>Shipping fee</th>
             <th>Amount</th>
             <th>Price</th>
             <th>Original price</th>
             <th>Total amount</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          $total = 0;
          @endphp
          @foreach($order_details as $key => $details)

          @php 
          $i++;
          $subtotal = $details->product_price*$details->product_sales_quantity;
          $total+=$subtotal;
          @endphp
          <tr class="color_qty_{{$details->product_id}}">
           
            <td><i>{{$i}}</i></td>
            <td>{{$details->product_name}}</td>
            <td>{{$details->product->product_quantity}}</td>
            <td>@if($details->product_coupon!='no')
              {{$details->product_coupon}}
              @else 
              No code
              @endif
            </td>
            <td>{{number_format($details->product_feeship ,0,',','.')}}đ</td>
            <td>

              <input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">

              <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product->product_quantity}}">

              <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">

              <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">

              @if($order_status!=2) 

              <button class="btn btn-default update_quantity_order" data-product_id="{{$details->product_id}}" name="update_quantity_order">Update</button>

              @endif

            </td>
            <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
            <td>{{number_format($details->product->price_cost ,0,',','.')}}đ</td>
            <td>{{number_format($subtotal ,0,',','.')}}đ</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="2">  
              @php 
              $total_coupon = 0;
              @endphp
              @if($coupon_condition==1)
              @php
              $total_after_coupon = ($total*$coupon_number)/100;
              echo 'Total reduction :'.number_format($total_after_coupon,0,',','.').'</br>';
              $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
              @endphp
              @else 
              @php
              echo 'Total reduction :'.number_format($coupon_number,0,',','.').'k'.'</br>';
              $total_coupon = $total + $details->product_feeship - $coupon_number ;

              @endphp
              @endif

              Shipping fee : {{number_format($details->product_feeship,0,',','.')}}đ</br> 
              Pay: {{number_format($total_coupon,0,',','.')}}đ 
          
            </td>
          </tr>
          <tr>
            <td colspan="2">
              @foreach($getorder as $key => $or)
              @if($or->order_status==1)
              <form>
               @csrf
               <select class="form-control order_details">
                
                <option id="{{$or->order_id}}" selected value="1">No process</option>
                <option id="{{$or->order_id}}" value="2">Processed-Delivered</option>
                
              </select>
            </form>
            
            @else

            <form>
              @csrf
              <select class="form-control order_details">
               
                <option disabled id="{{$or->order_id}}" value="1">Unprocessed</option>
                 <option id="{{$or->order_id}}" selected value="2">Processed-Delivered</option>
                
              </select>
            </form>

            

            @endif
            @endforeach


          </td>
        </tr>
      </tbody>
    </table>
    <a target="_blank" href="{{url('/print-order/'.$details->order_code)}}">Print order PDF</a>
  </div>
  
</div>
</div>
@endsection