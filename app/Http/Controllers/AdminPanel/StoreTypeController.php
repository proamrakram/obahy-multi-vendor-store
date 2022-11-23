<?php

namespace App\Http\Controllers\AdminPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Uploading;
use App\Models\StoreType;
use Illuminate\Support\Facades\Storage;

class StoreTypeController extends Controller
{
    use Uploading;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stores_types = StoreType::language()->get();
        return view('AdminPanel.stores-types.index')->with('stores_types', $stores_types);
    }

    public function create()
    {
        return view('AdminPanel.stores-types.create');
    }

    public function store(Request $request)
    {
        /*  if ($request->hasFile('image')) {

            $image = $request->file('image');

            if ($image->isValid()) {
                $path = $image->path();
                $extension = $image->getClientOriginalExtension();
                $folder = 'storage/assets/images/stores-types/';
                $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $this->uploadOne($image, $folder, 'public', $image_name);
            }
        }*/

        $this->validate($request, [
            'store_type_ar' => 'required|string|max:255|unique:store_types,store_type_ar',
            'store_type_en' => 'required|string|max:255|unique:store_types,store_type_en',
            'store_type_status' => 'nullable|in:on,off',
            'banner_section' => 'nullable|in:on,off',
            'service_section' => 'nullable|in:on,off',
            'filter_section' => 'nullable|in:on,off',
        ]);

        if ($request->store_type_status == 'on') {
            $store_type_status = 'active';
        } else {
            $store_type_status = 'inactive';
        }
        if ($request->banner_section == 'on') {
            $banner_section = 'active';
        } else {
            $banner_section = 'inactive';
        }
        if ($request->service_section == 'on') {
            $service_section = 'active';
        } else {
            $service_section = 'inactive';
        }
        if ($request->filter_section == 'on') {
            $filter_section = 'active';
        } else {
            $filter_section = 'inactive';
        }

        $store = StoreType::create([
            'store_type_ar' => $request->store_type_ar,
            'store_type_en' => $request->store_type_en,
            'store_type_status' => $store_type_status,
            'image' => $request->image,
            'is_delete' => 0,
            'banner_section' => $banner_section,
            'service_section' => $service_section,
            'filter_section' => $filter_section,
        ]);


        session()->flash('success', 'تم اضافة المتجر  بنجاح');
        return redirect()->route('admin.stores-types.index');
    }

    public function edit($id)
    {
        $store_type = StoreType::find($id);

        if (is_null($store_type) || $store_type->is_delete == 1) {
            session()->flash('error', 'المتجر غير موجودة');
            return redirect()->back();
        }

        return view('AdminPanel.stores-types.edit')->with('store_type', $store_type);
    }

    public function update(Request $request, $id)
    {
        $store_type = StoreType::find($id);

        /*  if ($request->hasFile('image')) {

            $image = $request->file('image');


           if ($image->isValid()) {

                $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

                $path = $image->path();
                $extension = $image->getClientOriginalExtension();
                $folder = 'storage/assets/images/stores-types/';
                $image_path = $folder . $image_name;
                $result = Storage::disk('public')->exists($image_path);
                if (!$result) {
                    $this->uploadOne($image, $folder, 'public', $image_name);
                }

                $image_name = $image_name . '.' . $extension;
            }
        } else {
            $image_name = $store_type->image;
        }*/

        if (is_null($store_type)  || $store_type->is_delete == 1) {
            session()->flash('error', 'المتجر غير موجودة');
            return redirect()->back();
        }

        $this->validate($request, [
            'store_type_ar' => 'required|string|max:255|unique:store_types,store_type_ar,' . $store_type->id,
            'store_type_en' => 'required|string|max:255|unique:store_types,store_type_en,' . $store_type->id,
            'store_type_status' => 'nullable|in:on,off',
            'banner_section' => 'nullable|in:on,off',
            'service_section' => 'nullable|in:on,off',
            'filter_section' => 'nullable|in:on,off',
        ]);

        if ($request->store_type_status == 'on') {
            $store_type_status = 'active';
        } else {
            $store_type_status = 'inactive';
        }
        if ($request->banner_section == 'on') {
            $banner_section = 'active';
        } else {
            $banner_section = 'inactive';
        }
        if ($request->service_section == 'on') {
            $service_section = 'active';
        } else {
            $service_section = 'inactive';
        }
        if ($request->filter_section == 'on') {
            $filter_section = 'active';
        } else {
            $filter_section = 'inactive';
        }

        $store_type->update([
            'store_type_ar' => $request->store_type_ar,
            'store_type_en' => $request->store_type_en,
            'store_type_status' => $store_type_status,
            'image' => $request->image,
            'is_delete' => 0,
            'banner_section' => $banner_section,
            'service_section' => $service_section,
            'filter_section' => $filter_section,
        ]);

        session()->flash('success', 'تم تعديل بيانات المتجر  بنجاح');
        return redirect()->route('admin.stores-types.index');
    }

    public function destroy($id)
    {
        $store_type = StoreType::find($id);
        if (is_null($store_type)  || $store_type->is_delete == 1) {
            session()->flash('error', 'المتجر غير موجودة');
            return redirect()->back();
        }

        $store_type->is_delete = 1;
        $store_type->save();
        session()->flash('success', 'تم حذف المتجر بنجاح');
        return redirect()->back();
    }


    public function change_status($id)
    {
        $store_type = StoreType::find($id);
        if (is_null($store_type)  || $store_type->is_delete == 1) {
            session()->flash('error', 'المتجر غير موجود');
            return redirect()->back();
        }

        if ($store_type->store_type_status == 'active') {
            $store_type->store_type_status = 'inactive';
        } else {
            $store_type->store_type_status = 'active';
        }
        $store_type->save();
        session()->flash('success', 'تم تغيير حالة المتجر بنجاح');
        return redirect()->back();
    }
}
