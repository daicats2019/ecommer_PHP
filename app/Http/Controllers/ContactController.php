<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\CatePost;
use App\Slider;
use App\Contact;
use App\Icons;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ContactController extends Controller
{
    
    public function add_doitac(Request $request){
        $data = $request->all();
        $icons = new Icons();
        $name = $data['name'];
        $link = $data['link'];
        $get_image = $request->file('file');
      
        $path = 'public/uploads/icons/';
      
        //them hinh anh
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $icons->image = $new_image;
           
        }
        $icons->name = $name;
        $icons->link = $link;
        $icons->category = 'doitac';
         
        $icons->save();
        
    }
    public function add_nut(Request $request){
        $data = $request->all();
        $icons = new Icons();
        $name = $data['name'];
        $link = $data['link'];
        $get_image = $request->file('file');
      
        $path = 'public/uploads/icons/';
      
        //them hinh anh
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $icons->image = $new_image;
           
        }
        $icons->name = $name;
        $icons->link = $link;
        $icons->category = 'icons';
         
        $icons->save();
        
    }
    public function delete_icons(){
        $id = $_GET['id'];
        $icons = Icons::find($id);
        $icons->delete();
    }

    public function list_doitac(){
        $icons = Icons::where('category','doitac')->orderBy('id_icons','DESC')->get();
        // dd($icons);
        $output = '';
        $output .= '<table class="table table-hover">
            <thead>
              <tr>
                <th>Partner Name</th>
                 <th>Partner image</th>
                 <th>Partner Link</th>
                 <th>Management</th>
              </tr>
              </tr>
            </thead>
            <tbody>';
            foreach($icons as $ico){

             $output .= ' <tr>
                <td>'.$ico->name.'</td>
                <td><img height="80px" width="150px" src="'.url('/public/uploads/icons/'.$ico->image).'"></td>
                <td>'.$ico->link.'</td>
                 <td><button id="'.$ico->id_icons.'" class="btn btn-warning" onclick="delete_icons(this.id)">Remove partner</button></td>
              </tr>';

             }
             $output .= '</tbody>
          </table>';
          echo $output;
    }
    public function list_nut(){
        $icons = Icons::where('category','icons')->orderBy('id_icons','DESC')->get();
        // dd($icons);
        $output = '';
        $output .= '<table class="table table-hover">
            <thead>
              <tr>
                <th>Button name</th>
                 <th>Image</th>
                 <th>Link</th>
                 <th>Management</th>
              </tr>
              </tr>
            </thead>
            <tbody>';
            foreach($icons as $ico){

             $output .= ' <tr>
                <td>'.$ico->name.'</td>
                <td><img height="32px" width="32px" src="'.url('/public/uploads/icons/'.$ico->image).'"></td>
                <td>'.$ico->link.'</td>
                 <td><button id="'.$ico->id_icons.'" class="btn btn-danger" onclick="delete_icons(this.id)">Delete</button></td>
              </tr>';

             }
             $output .= '</tbody>
          </table>';
          echo $output;
    }
    public function lien_he(Request $request){
    	  //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        //seo 
         $meta_desc = "Contact";
         $meta_keywords = "Contact";
         $meta_title = "Contact us";
        $url_canonical = $request->url();
        //--seo
        
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

		$contact = Contact::where('info_id',1)->get();

    	return view('pages.lienhe.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post)->with('contact',$contact);

    }
    public function information(){
    	$contact = Contact::where('info_id',1)->get();

    	return view('admin.information.add_information')->with(compact('contact'));
    }
    public function update_info(Request $request,$info_id){
    	$data = $request->all();
    	$contact = Contact::find($info_id);
    	$contact->info_contact = $data['info_contact'];	
        $contact->slogan_logo = $data['slogan_logo']; 
    	$contact->info_map = $data['info_map'];
    	$contact->info_fanpage = $data['info_fanpage'];	
    	$get_image = $request->file('info_image');
    	$path = 'public/uploads/contact/';
    	if($get_image){
            if($contact->info_logo!=null){
    		unlink($path.$contact->info_logo);
            }
    		$get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
    	}

    	$contact->save();
    	return redirect()->back()->with('message','Website information update successful');
    }
    public function save_info(Request $request){
    	$data = $request->all();
    	$contact = new Contact();
    	$contact->info_contact = $data['info_contact'];	
    	$contact->info_map = $data['info_map'];
    	$contact->info_fanpage = $data['info_fanpage'];	
    	$get_image = $request->file('info_image');
    	$path = 'public/uploads/contact/';
    	if($get_image){
    		$get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
    	}

    	$contact->save();
    	return redirect()->back()->with('message','Website information update successful');

    }
}
