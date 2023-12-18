<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAchievementCreateRequest;
use App\Http\Requests\AdminAgreementUpdateRequest;
use App\Models\Achievement;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.achievement.all', compact('languages'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.achievement.create', compact('languages'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminAchievementCreateRequest $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $achievement = new Achievement();
        $achievement->language = $request->language;
        $achievement->image = $imagePath;
        $achievement->file = $filePath;

        $achievement->subject = $request->subject;
        $achievement->date_gregorian = $request->date_gregorian;
        $achievement->date_ghamari = $request->date_ghamari;
        $achievement->date_shamsi = $request->date_shamsi;
        $achievement->content = $request->content;
        $achievement->meta_title = $request->meta_title;
        $achievement->meta_description = $request->meta_description;
        $achievement->status = $request->status == 1 ? 1 : 0;
        $achievement->save();

        toast('دستاورد مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.achievement.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleAgreementStatus(Request $request)
    {
        try {
            $achievement = Achievement::findOrFail($request->id);
            $achievement->{$request->name} = $request->status;
            $achievement->save();

            return response(['status' => 'success', 'message' => 'تغییرات با موفقیت ثبت شد.']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $achievement = Achievement::findOrFail($id);
        return view('backend.modules.achievement.edit', compact('languages', 'achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminAgreementUpdateRequest $request, string $id)
    {
        $achievement = Achievement::findOrFail($id);
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');
        $filePath = $this->handleFileUpload($request, 'file');

        $achievement->language = $request->language;
        $achievement->image = !empty($imagePath) ? $imagePath : $achievement->image;
        $achievement->file = !empty($filePath) ? $filePath : $achievement->file;
        $achievement->subject = $request->subject;
        $achievement->date_gregorian = $request->date_gregorian;
        $achievement->date_ghamari = $request->date_ghamari;
        $achievement->date_shamsi = $request->date_shamsi;
        $achievement->content = $request->content;
        $achievement->meta_title = $request->meta_title;
        $achievement->meta_description = $request->meta_description;
        $achievement->status = $request->status == 1 ? 1 : 0;
        $achievement->update();
        
        toast('دستاورد مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.achievement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        $this->deleteFile($achievement->image);
        $this->deleteFile($achievement->file);
        $achievement->delete();
        return response(['status' => 'success', 'message' => 'دستاورد مورد نظر با موفقیت حذف شد']);
    }

    /**
     * Copy important activity
     */
    public function copyAchievement(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        $copyImportantActivity = $achievement->replicate();
        $copyImportantActivity->save();
        toast('دستاورد مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }

    /**
     * change toggle status of important activity
     */
    public function toggleAchievementStatus(Request $request)
    {
        try {
            $achievement = Achievement::findOrFail($request->id);
            $achievement->{$request->name} = $request->status;
            $achievement->save();

            return response(['status' => 'success', 'message' => 'تغییرات با موفقیت ثبت شد.']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
