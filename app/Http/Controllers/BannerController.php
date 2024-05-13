<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function banner_add(){
        return view('admin.banner.banner-create');
    }
    public function banner_create(Request $request){
        $banner        = $request->file('image');
        $extention      = $banner ->getClientOriginalName();
        $imageName      = 'banner_'.time().'.'.$extention;
        $banner->storeAs('public/Banner',$imageName);

        $banner  = new  Banner();

        $banner ->banner_title       = $request->banner_title;
        $banner ->discount_info       = $request->discount_info;
        $banner ->image             = $imageName;
        $banner ->save();
        return redirect()->route('banner_add');
    }
    public function banner_show()
    {
        $this->banner = Banner::all();
        return view('admin.banner.banner-show',['banners'=> $this->banner]);
    }
    public function banner_edit($id)
    {
        $this->banner = Banner::find($id);
        return view('admin.banner.banner-edit',['banners'=> $this->banner]);
    }
    public function banner_update(Request $request,$id){

        $banner = Banner::find($id);

        if ($request->hasFile('image'))
        {
            if (file_exists($banner->image))
            {
                unlink($banner ->image);
            }
            
            $banners        = $request->file('image');
            $extention      = $banners  ->getClientOriginalName();
            $imageName      = 'banner_'.time().'.'.$extention;
            $banners ->storeAs('public/Banner',$imageName);
            
        
            $banner ->banner_title       = $request->banner_title;
            $banner ->discount_info       = $request->discount_info;
            $banner->image             = $imageName;
            $banner->save();
          
        }
        return redirect()->route('banner_show');
        
    }
    public function banner_delete($id){
        $banner = Banner::find($id);

        if (file_exists($banner->image))
        {
            unlink($banner->image);
        }
        $banner->delete();
        return redirect()->route('banner_show');
    }
}
