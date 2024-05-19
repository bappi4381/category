<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OfferBanner;

class OfferBannerController extends Controller
{
    public function offer_banner_add(){
        return view('admin.offerbanner.offer_banner_store');
    }
    

    public function offer_banner_create(Request $request){
        $banners        = $request->file('offer_image');
        $extention      = $banners  ->getClientOriginalName();
        $imageName      = 'offer_banner_'.time().'.'.$extention;
        $banners->storeAs('public/Offer_banner',$imageName);

        $banner  = new  OfferBanner();

        $banner->offer_banner_title       = $request->offer_banner_title;
        $banner->offer_info               = $request->offer_info;
        $banner->offer_image              = $imageName;
        $banner->save();
        return redirect()->route('offer_banner_add');
    }
    public function offer_banner_show()
    {
        $this->offer = OfferBanner::all();
        return view('admin.offerbanner.offer_banner_show',['offers'=> $this->offer]);
    }
    public function offer_banner_edit($id)
    {
        $this->offer = OfferBanner::find($id);
        return view('admin.offerbanner.offer_banner_edit',['offers'=> $this->offer]);
    }
    public function offer_banner_update(Request $request,$id){

        $offer = OfferBanner::find($id);

        if ($request->hasFile('offer_image'))
        {
            if (file_exists($offer->offer_image))
            {
                unlink($offer ->offer_image);
            }
            
            $offers        = $request->file('offer_image');
            $extention      = $offers->getClientOriginalName();
            $imageName      = 'offer_banner_'.time().'.'.$extention;
            $directory= 'public/Offer_banner';
            $offers ->storeAs($directory,$imageName);
           
        }
            else{
                $imageName = $offer ->offer_image;
            }
        $offer->offer_banner_title     = $request->offer_banner_title;
        $offer->offer_info             = $request->offer_info;
        $offer->offer_image             =$imageName;
        $offer->save();
        return redirect()->route('offer_banner_show');
        
    }
    public function offer_banner_delete($id){
        $offer = OfferBanner::find($id);

        if (file_exists($offer->offer_image))
        {
            unlink($offer->offer_image);
        }
        $offer->delete();
        return redirect()->route('offer_banner_show');
    }
}
