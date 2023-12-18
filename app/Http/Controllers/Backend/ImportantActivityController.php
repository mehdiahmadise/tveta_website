<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminImportantActivityCreateRequest;
use App\Http\Requests\AdminImportantActivityUpdateRequest;
use App\Models\Category;
use App\Models\ImportantActivity;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ImportantActivityController extends Controller
{

    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('backend.modules.important-activity.all', compact('languages'));
    }


    /**
     * Fetch category depending on language
     */
    public function fetchCategory(Request $request)
    {
        $categories = Category::where('language', $request->lang)->get();
        return $categories;
    }

    function approveImportantActivity(Request $request): Response
    {
        $important_activity = ImportantActivity::findOrFail($request->id);
        $important_activity->is_approved = $request->is_approve;
        $important_activity->save();

        return response(['status' => 'success', 'message' => 'فعالیت های مهم مورد نظر تایید شد.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('backend.modules.important-activity.create', compact('languages'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminImportantActivityCreateRequest $request)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $important_activity = new ImportantActivity();

        $important_activity->language = $request->language;
        $important_activity->category_id = $request->category;
        $important_activity->auther_id = Auth::guard('admin')->user()->id;
        $important_activity->image = $imagePath;
        $important_activity->title = $request->title;

        $important_activity->date_gregorian = $request->date_gregorian;
        $important_activity->date_ghamari = $request->date_ghamari;
        $important_activity->date_shamsi = $request->date_shamsi;

        $important_activity->description = $request->description;
        $important_activity->meta_title = $request->meta_title;
        $important_activity->meta_description = $request->meta_description;
        $important_activity->status = $request->status == 1 ? 1 : 0;
        $important_activity->save();

        toast('فعالیت های مهم مورد نظر با موفقیت ثبت شد.', 'success');

        return redirect()->route('admin.important-activity.index');
    }

    /**
     * change toggle status of important activity
     */
    public function toggleImportantActivityStatus(Request $request)
    {
        try {
            $important_activity = ImportantActivity::findOrFail($request->id);
            $important_activity->{$request->name} = $request->status;
            $important_activity->save();

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
        $important_activity = ImportantActivity::findOrFail($id);
        $categories = Category::where('language', $important_activity->language)->get();
        return view('backend.modules.important-activity.edit', compact('languages', 'important_activity', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminImportantActivityUpdateRequest $request, string $id)
    {
        $important_activity = ImportantActivity::findOrFail($id);

        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image');

        $important_activity->language = $request->language;
        $important_activity->category_id = $request->category;
        $important_activity->image = !empty($imagePath) ? $imagePath : $important_activity->image;
        $important_activity->title = $request->title;

        $important_activity->date_gregorian = $request->date_gregorian;
        $important_activity->date_ghamari = $request->date_ghamari;
        $important_activity->date_shamsi = $request->date_shamsi;
        
        $important_activity->description = $request->description;
        $important_activity->meta_title = $request->meta_title;
        $important_activity->meta_description = $request->meta_description;
        $important_activity->status = $request->status == 1 ? 1 : 0;
        $important_activity->save();

        toast('فعالیت های مهم مورد نظر با موفقیت ویرایش شد', 'success');
        return redirect()->route('admin.important-activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $important_activity = ImportantActivity::findOrFail($id);
        $this->deleteFile($important_activity->image);
        $important_activity->delete();

        return response(['status' => 'success', 'message' => 'فعالیت مهم مورد نظر با موفقیت انجام شد']);
    }

    /**
     * Copy important activity
     */
    public function copyImportantActivity(string $id)
    {
        $important_activity = ImportantActivity::findOrFail($id);
        $copyImportantActivity = $important_activity->replicate();
        $copyImportantActivity->save();

        toast('فعالیت مهم مورد نظر کاپی شد', 'success');
        
        return redirect()->back();
    }
}
