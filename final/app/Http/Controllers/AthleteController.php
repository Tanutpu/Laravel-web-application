<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AthleteController extends Controller
{
    //fx show หน้าแรกของ นักกีฬา
    public function index()
    {
        $athletes = Athlete::latest()->paginate(5); //เรียงจากอันสุดท้ายก่อนโดยเอามาแค่ 5 อัน
        return view('athletes.index',compact('athletes'))  
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('athletes.create');
    }

    //fx เก็บของข้อมูล
    public function store(Request $request)
    {
  
        if ($request->image){
            $file = $request->image;
            $picname = $file->getClientOriginalName();
            $path = $request->image->storeAs('public/img',$picname);
            
            $athletes = new Athlete;
            $athletes->name = $request->name;
            $athletes->position = $request->position;
            $athletes->club = $request->club;
            $athletes->image = $picname;
            $athletes->save();
            
        }
        return redirect()->route('athletes.index')
                        ->with('success','Player created successfully.');
    }

    public function show(Athlete $athlete)
    {
        return view('athletes.show',compact('athlete'));
    }


    public function edit(Athlete $athlete)
    {
        return view('athletes.edit',compact('athlete'));

    }

    public function update(Request $request, Athlete $athlete)
    {
        $athletes = Athlete::find($request->id);
        //update image
        if ($request->image){
            if($athletes['image']){
                if(Storage::disk('public')->exists('img/'.$athletes->image)){
                    unlink(storage_path('app/public/img/'.$athletes->image));
                }
            }
            $file = $request->image;
            $picname = $file->getClientOriginalName();
            $path = $request->image->storeAs('public/img',$picname);
            $athletes->update(['image'=>$picname]);
        }
        //update name position club
        $athletes->update(['name'=>$request->name]);
        $athletes->update(['position'=>$request->position]);
        $athletes->update(['club'=>$request->club]);
    
        return redirect()->route('athletes.index')
                        ->with('success','Player updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Athlete  $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        
        if($athlete['image']){
            if(Storage::disk('public')->exists('img/'.$athlete->image)){
                unlink(storage_path('app/public/img/'.$athlete->image));
            }
        }
        $athlete->delete();
    
        return redirect()->route('athletes.index')
                        ->with('success','Player deleted successfully');
    }
}