@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      List comments
    </div>
    <div id="notify_comment"></div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
           
             <th>Browse</th>
             <th>Sender Name</th>
             <th>Comment</th>
             <th>Sent Date</th>
             <th>Product</th>
             <th>Management</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($comment as $key => $comm)
          <tr>
        
            <td>
              @if($comm->comment_status==1)
                <input type="button" data-comment_status="0" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Confirm" >
              @else 
                <input type="button" data-comment_status="1" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Unconfirmed" >
              @endif
            
            </td>
            <td>{{ $comm->comment_name }}</td>

            <td>{{ $comm->comment }}
              <style type="text/css">
                ul.list_rep li {
                  list-style-type: decimal;
                  color: blue;
                  margin: 5px 40px;
              }
              </style>
              <ul class="list_rep">
                Rep comment : 
                @foreach($comment_rep as $key => $comm_reply)
                  @if($comm_reply->comment_parent_comment==$comm->comment_id)
                    <li> {{$comm_reply->comment}}</li>
                  @endif
                
                @endforeach

              </ul>
              @if($comm->comment_status==0)
              <br/><textarea class="form-control reply_comment_{{$comm->comment_id}}" rows="5"></textarea>
              <br/><button class="btn btn-default btn-xs btn-reply-comment" data-product_id="{{$comm->comment_product_id}}"  data-comment_id="{{$comm->comment_id}}">Reply to comment</button>
              
              @endif
             

            </td>
            <td>{{ $comm->comment_date }}</td>
            <td><a href="{{url('/chi-tiet/'.$comm->product->product_slug)}}" target="_blank">{{ $comm->product->product_name }}</a></td>
            <td>
              <a href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Are you sure you want to delete this comment?')" href="" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  
  </div>
</div>
@endsection