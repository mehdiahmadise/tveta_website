<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileUpdateRequest;
use App\Http\Requests\AdminUpdatePasswordRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Traits\FileUploadTrait;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('backend.modules.profile.index', compact('user'));
    }

    public function update(AdminProfileUpdateRequest $request, string $id)
    {
        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image); 
        /** Save updated datas */
        $admin = Admin::findOrFail($id);
        $admin->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        toast('پروفایل شما با موفقیت اپدیت شد','success');
        return redirect()->back();

    }
    /**
     * Update the specified resource for password.
     */
    public function passwordUpdate(AdminUpdatePasswordRequest $request, string $id)
    {
        
        $admin = Admin::findOrFail($id); 
        $admin->password = bcrypt($request->password);
        $admin->save();
        toast('پسورد شما با موفقیت اپدیت شد','success');
        return redirect()->back();
    }
}
