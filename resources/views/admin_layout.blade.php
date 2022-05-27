<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >

<meta name="csrf-token" content="{{csrf_token()}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<link href="{{asset('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">


<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap-tagsinput.css')}}" type="text/css"/>

<link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" type="text/css"/>

<link rel="icon" href="{{asset('public/frontend/images/logo-mail.png')}}" type="image/gif" sizes="32x32">
<!-- calendar -->


<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>

<script src="{{asset('public/backend/js/bootstrap-tagsinput.js')}}"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a target="_blank" href="{{url('/')}}" class="logo">
       Shop
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{('public/backend/images/2.png')}}">
                <span class="username">
                	
                    <?php
                    if(Session::get('login_normal')){
                        
                        $name = Session::get('admin_name');
                    }else{
                        $name = Auth::user()->admin_name;
                    }
                   
                    if($name){
                        echo $name;   
                    }
                    ?>

                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                
                <li><a href="{{URL::to('/logout-auth')}}"><i class="fa fa-key"></i>Logout</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Overview</span>
                    </a>
                </li>
              <!--   <li>
                    <a href="{{URL::to('read_data')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Google drive</span>
                    </a>
                </li> -->
                <li>
                    <a href="{{URL::to('/information')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Information website</span>
                    </a>
                </li>
                 
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/manage-slider')}}">List slider</a></li>
                        <li><a href="{{URL::to('/add-slider')}}">Add slider</a></li>
                    </ul>
                </li>
                   
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Order</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Order Management</a></li>
						
                      
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Discount code</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/insert-coupon')}}">Add discount code</a></li>
                        <li><a href="{{URL::to('/list-coupon')}}">List discount codes</a></li>
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Ship</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/delivery')}}">Shipping Management</a></li>
                        
                        
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Category product</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Add Category product</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">List Category product</a></li>
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Comment</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/comment')}}">List Comment</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Category posts</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-category-post')}}">Add Category posts</a></li>
                        <li><a href="{{URL::to('/all-category-post')}}">List Category posts</a></li>
                      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Product brands</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Add product brands</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">List product brands</a></li>
                      
                    </ul>
                </li>
              
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Product</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Add Product</a></li>
						<li><a href="{{URL::to('/all-product')}}">List Product</a></li>
                      
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Posts</span>
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/add-post')}}">Add posts</a></li>
                        <li><a href="{{URL::to('/all-post')}}">List posts</a></li>
                      
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Video</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('video')}}">Add video</a></li>
                    
                      
                    </ul>
                </li>
                @impersonate
                <li>
                   
                    <span><a href="{{URL::to('/impersonate-destroy')}}">Stop transfer rights</a></span>
                  
                </li>
                @endimpersonate

                @hasrole(['admin','author'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Users</span>
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/add-users')}}">Add user</a></li>
                        <li><a href="{{URL::to('/users')}}">List user</a></li>
                      
                    </ul>
                </li>

                @endhasrole
             
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
    </section>

</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/js/simple.money.format.js')}}"></script>


<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>

<script>
    function previewFile(input){
        var file = $(".image-preview").get(0).files[0];
         
        if (file) {
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>

<script>
  var options = {
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token='
  };
</script>
<script>
CKEDITOR.replace('my-editor', options);
</script>

<script type="text/javascript">
   
  $( function() {
    $( "#start_coupon" ).datepicker({
       prevText:"Last month",
         nextText:"Next month",
         dateFormat:"dd/mm/yy",
         dayNamesMin: [ "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ],
         duration: "slow"
    });
    $( "#end_coupon" ).datepicker({
        prevText:"Last month",
         nextText:"Next month",
         dateFormat:"dd/mm/yy",
         dayNamesMin: [ "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ],
         duration: "slow"
    });
  } );
 
</script>
<script type="text/javascript">

    list_nut();
    function delete_icons(id){
         $.ajax({
                url:"{{url('/delete-icons')}}",
                method:"GET",
                data:{id:id},
                success:function(data)
                    {
                        list_nut();
                        list_doitac();
                    }   
            }); 
    }
    function list_nut(){

          $.ajax({
                url:"{{url('/list-nut')}}",
                method:"GET",
                success:function(data)
                    {
                        $('#list_nut').html(data);
                    }   
            });    
    }
    $('.add-nut').click(function(){
       
         var name = $('#name').val();
         var link = $('#link').val();
         var image = $('#image_nut')[0].files[0];
         var form_data = new FormData();

            form_data.append('file',image);
            form_data.append('name',name);
            form_data.append('link',link);
           
    


       $.ajax({
                url:"{{url('/add-nut')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                cache: false,
                processData: false,

                data:form_data,
                success:function(data)
                    {
                       alert('Add success button');
                        list_nut();
                        $('#name').val('');
                        $('#link').val('');
                        
                    }   
            });    
    })
</script>
<!-----------------List đối tác-------------------->
<script type="text/javascript">

 
    list_doitac();
    function list_doitac(){

          $.ajax({
                url:"{{url('/list-doitac')}}",
                method:"GET",
                success:function(data)
                    {
                        $('#list_doitac').html(data);
                    }   
            });    
    }
    $('.add-doitac').click(function(){
       
         var name = $('#name_doitac').val();
         var link = $('#link_doitac').val();
         var image = $('#image_doitac')[0].files[0];
         var form_data = new FormData();

            form_data.append('file',image);
            form_data.append('name',name);
            form_data.append('link',link);
           
    


       $.ajax({
                url:"{{url('/add-doitac')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                cache: false,
                processData: false,

                data:form_data,
                success:function(data)
                    {
                       alert('Add successful partners');
                       list_doitac();
                       
                        
                    }   
            });    
    })
</script>
<script type="text/javascript">
    $('.btn-delete-document').click(function(){

        var product_id = $(this).data('document_id');
        var _token = $('input[name="_token"]').val();
         $.ajax({
                url:"{{url('/delete-document')}}",
                method:"POST",
               
                data:{_token:_token,product_id:product_id},
                
                success:function(data)
                    {
                        alert('File deletion successful');
                        location.reload();
                    }   
            });    
    });
</script>
<script type="text/javascript">
    $('.price_format').simpleMoneyFormat();

</script>
<script type="text/javascript">
$(document).ready(function(){

        chart60daysorder();

        var chart = new Morris.Bar({
             
              element: 'chart',
              //option chart
              lineColors: ['#819C79', '#fc8710','#FF6541', '#A4ADD3', '#766B56'],
                parseTime: false,
                hideHover: 'auto',
                xkey: 'period',
                ykeys: ['order','sales','profit','quantity'],
                labels:['order','sales','profit','quantity']
            
            });


       
        function chart60daysorder(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/days-order')}}",
                method:"POST",
                dataType:"JSON",
                data:{_token:_token},
                
                success:function(data)
                    {
                        chart.setData(data);
                    }   
            });
        }

    $('.dashboard-filter').change(function(){
        var dashboard_value = $(this).val();
        var _token = $('input[name="_token"]').val();
        // alert(dashboard_value);
        $.ajax({
            url:"{{url('/dashboard-filter')}}",
            method:"POST",
            dataType:"JSON",
            data:{dashboard_value:dashboard_value,_token:_token},
            
            success:function(data)
                {
                    chart.setData(data);
                }   
            });

    });

    $('#btn-dashboard-filter').click(function(){
       
        var _token = $('input[name="_token"]').val();

        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();

         $.ajax({
            url:"{{url('/filter-by-date')}}",
            method:"POST",
            dataType:"JSON",
            data:{from_date:from_date,to_date:to_date,_token:_token},
            
            success:function(data)
                {
                    chart.setData(data);
                }   
        });

    });

});
    
</script>

<script type="text/javascript">
$(document).ready(function(){
      
        //     });
        var donut = Morris.Donut({
          element: 'donut',
          resize: true,
          colors: [
            '#a8328e',
            '#61a1ce',
            '#ce8f61',
            '#f5b942',
            '#4842f5'
            
          ],
          //labelColor:"#cccccc", // text color
          //backgroundColor: '#333333', // border color
          data: [
            {label:"San pham", value:<?php echo $app_product ?>},
            {label:"Bai viet", value:<?php echo $app_post ?>},
            {label:"Don hang", value:<?php echo $app_order ?>},
            {label:"Video", value:<?php echo $app_video ?>},
            {label:"Khach hang", value:<?php echo $app_customer ?>} 
          ]
        });
     
});
</script>

<script type="text/javascript">
   
  $( function() {
    $( "#datepicker" ).datepicker({
        prevText:"Last month",
         nextText:"Next month",
         dateFormat: "yy-mm-dd",
         dayNamesMin: [ "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ],
         duration: "slow"
    });
    $( "#datepicker2" ).datepicker({
       prevText:"Last month",
         nextText:"Next month",
         dateFormat: "yy-mm-dd",
         dayNamesMin: [ "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday" ],
         duration: "slow"
    });
  } );
 
</script>
<script type="text/javascript">
    $(document).ready(function(){

        $('#category_order').sortable({
            placeholder: 'ui-state-highlight',
             update  : function(event, ui)
              {
                var page_id_array = new Array();
                var _token = $('input[name="_token"]').val();

                $('#category_order tr').each(function(){
                    page_id_array.push($(this).attr("id"));
                });
                
                $.ajax({
                        url:"{{url('/arrange-category')}}",
                        method:"POST",
                        data:{page_id_array:page_id_array,_token:_token},
                        success:function(data)
                        {
                            alert(data);
                        }
                });

              }
        });
       

    });
</script>
<script type="text/javascript">
    $('.comment_duyet_btn').click(function(){
        var comment_status = $(this).data('comment_status');

        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if(comment_status==0){
            var alert = 'Change to browse successful';
        }else{
            var alert = 'Change to no browsing successful';
        }
          $.ajax({
                url:"{{url('/allow-comment')}}",
                method:"POST",

                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
                success:function(data){
                    location.reload();
                   $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');

                }
            });


    });
    $('.btn-reply-comment').click(function(){
        var comment_id = $(this).data('comment_id');

        var comment = $('.reply_comment_'+comment_id).val();

        

        var comment_product_id = $(this).data('product_id');

        
        // alert(comment);
        // alert(comment_id);
        // alert(comment_product_id);
        
          $.ajax({
                url:"{{url('/reply-comment')}}",
                method:"POST",

                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
                success:function(data){
                    $('.reply_comment_'+comment_id).val('');
                   $('#notify_comment').html('<span class="text text-alert">Reply to comment successfully</span>');

                }
            });


    });
</script>

<script type="text/javascript">
    $(document).ready( function () {
            $('#myTable').DataTable();
        } );
</script>

<script type="text/javascript">
	 $(document).on('click','#btn-add-video', function(){
            var video_title = $('.video_title').val();
            var video_slug = $('.video_slug').val();
            var video_desc = $('.video_desc').val();
            var video_link = $('.video_link').val();
          
            var form_data = new FormData();

            form_data.append("file", document.getElementById("file_img_video").files[0]);
            form_data.append("video_title",video_title);
            form_data.append("video_slug",video_slug);
            form_data.append("video_desc",video_desc);
            form_data.append("video_link",video_link);

            $.ajax({
                url:"{{url('/insert-video')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data:form_data,

                contentType:false,
                cache:false,
                processData:false,

                success:function(data){
              $('.video_title').val('');
            $('.video_slug').val('');
            $('.video_desc').val('');
            $('.video_link').val('');
                    load_video();
                
                    $('#notify').html('<span class="text text-success">Successful video added</span>');
                }
            });


        });
</script>

<script type="text/javascript">
  
    load_video();

    function load_video(){

            $.ajax({
                url:"{{url('/select-video')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success:function(data){
                    $('#video_load').html(data);
                }
            });
        }
       
        $(document).on('click','.btn-delete-video',function(){
            var video_id = $(this).data('video_id');
            if(confirm('Do you want to delete this video?')){
                $.ajax({
                    url:"{{url('/delete-video')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{video_id:video_id},
                    success:function(data){
                        load_video();
                        $('#notify').html('<span class="text text-success">Delete video successfully</span>');
                    }
                });
            }


        });
        $(document).on('blur','.video_edit',function(){
            var video_type = $(this).data('video_type');
            var video_id = $(this).data('video_id');
            //alert(video_type);
            if(video_type=='video_title'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else if(video_type=='video_desc'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else if(video_type=='video_link'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else{
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }

            $.ajax({
                url:"{{url('/update-video')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{video_check:video_check,video_edit:video_edit,video_id:video_id},
                success:function(data){
                    load_video();
                    $('#notify').html('<span class="text text-success">Successful video update</span>');
                }
            });

        });

        $(document).on('change','.file_img_video',function(){

            var video_id = $(this).data('video_id');
            var image = document.getElementById("file-video-"+video_id).files[0];

            var form_data = new FormData();

            form_data.append("file", document.getElementById("file-video-"+video_id).files[0]);
            form_data.append("video_id",video_id);


          
                $.ajax({
                    url:"{{url('/update-video-image')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:form_data,

                    contentType:false,
                    cache:false,
                    processData:false,

                    success:function(data){
                        load_video();
                        $('#notify').html('<span class="text text-success">Update video image successfully</span>');
                    }
                });
            
        });



   

</script>
<script type="text/javascript">
 
        load_gallery();

        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();
            // alert(pro_id);
            $.ajax({
                url:"{{url('/select-gallery')}}",
                method:"POST",
                data:{pro_id:pro_id,_token:_token},
                success:function(data){
                    $('#gallery_load').html(data);
                }
            });
        }

        $('#file').change(function(){
            var error = '';
            var files = $('#file')[0].files;

            if(files.length>5){
                error+='<p>You can choose up to 5 photos</p>';
            }else if(files.length==''){
                error+='<p>You can not leave the photo blank</p>';
            }else if(files.size > 2000000){
                error+='<p>Image files cannot be larger than 2MB</p>';
            }

            if(error==''){

            }else{
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                return false;
            }

        });

        $(document).on('blur','.edit_gal_name',function(){
            var gal_id = $(this).data('gal_id');
            var gal_text = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/update-gallery-name')}}",
                method:"POST",
                data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Update image name successfully</span>');
                }
            });
        });

        $(document).on('click','.delete-gallery',function(){
            var gal_id = $(this).data('gal_id');
          
            var _token = $('input[name="_token"]').val();
            if(confirm('Do you want to delete this image?')){
                $.ajax({
                    url:"{{url('/delete-gallery')}}",
                    method:"POST",
                    data:{gal_id:gal_id,_token:_token},
                    success:function(data){
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Delete image successfully</span>');
                    }
                });
            }
        });

        $(document).on('change','.file_image',function(){

            var gal_id = $(this).data('gal_id');
            var image = document.getElementById("file-"+gal_id).files[0];

            var form_data = new FormData();

            form_data.append("file", document.getElementById("file-"+gal_id).files[0]);
            form_data.append("gal_id",gal_id);


          
                $.ajax({
                    url:"{{url('/update-gallery')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:form_data,

                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Image update successfully</span>');
                    }
                });
            
        });



  
</script>
<script type="text/javascript">
 
    function ChangeToSlug()
        {
            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
         

   
   
</script>

<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        // alert(order_product_id);
        // alert(order_qty);
        // alert(order_code);
        $.ajax({
                url : '{{url('/update-qty')}}',

                method: 'POST',

                data:{_token:_token, order_product_id:order_product_id ,order_qty:order_qty ,order_code:order_code},
                // dataType:"JSON",
                success:function(data){

                    alert('Update number successfully');
                 
                   location.reload();
                    
              
                    

                }
        });

    });
</script>

<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

            if(parseInt(order_qty)>parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('The quantity sold in stock is not enough');
                }
                $('.color_qty_'+order_product_id[i]).css('background','#000');
            }
        }
        
        if(j==0){
          
                $.ajax({
                        url : '{{url('/update-order-qty')}}',
                            method: 'POST',
                            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
                            success:function(data){
                                alert('Change order status successfully');
                                location.reload();
                            }
                });
            
        }

    });
</script>

<script type="text/javascript">
    

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
             var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                   fetch_delivery();
                }
            });

        });
        
        $('.add_delivery').click(function(){

           var city = $('.city').val();
           var province = $('.province').val();
           var wards = $('.wards').val();
           var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
           // alert(city);
           // alert(province);
           // alert(wards);
           // alert(fee_ship);
            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
                success:function(data){
                   fetch_delivery();
                }
            });


        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        }); 
   


</script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
</script>
<script type="text/javascript">
        $.validate({
            
        });
</script>

 <script  type="text/javascript">
      
         
        
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1',{

            filebrowserImageUploadUrl : "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
            filebrowserBrowseUrl : "{{ url('file-browser?_token='.csrf_token()) }}",
            filebrowserUploadMethod: 'form'

        });

        CKEDITOR.replace('ckeditor2', {

            filebrowserImageUploadUrl : "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
            filebrowserBrowseUrl : "{{ url('file-browser?_token='.csrf_token()) }}",
            filebrowserUploadMethod: 'form'

        });

        CKEDITOR.replace('ckeditor3',{

            filebrowserImageUploadUrl : "{{ url('uploads-ckeditor?_token='.csrf_token()) }}",
            filebrowserBrowseUrl : "{{ url('file-browser?_token='.csrf_token()) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('id4');

     
    
</script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
