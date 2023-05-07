<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;

class ToolController extends Controller
{
    public function index()
    {
        $data = Tools::latest()->paginate(5);
        return view('pages.tools.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('pages.tools.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'image' => 'required',

        ], [
            'name.required' => 'Name field is required.',
            'qty.required' => 'Qty field is required.',
            'status.required' => 'Status field is required.',
            'image.required' => 'Image field is required.',
        ]);

        // upload image
        $image = $request->file('image');
        $image_name = Carbon::now()->format('YmdHms') . '.' . $image->extension();
        $image->move(public_path('images'), $image_name);

        $validatedData['image'] = $image_name;

        $user = Tools::create($validatedData);

        return redirect()->route('tools.index')
            ->with('success', 'Created successfully.');
    }

    public function show(Tools $tools)
    {
    }

    public function edit(Tools $tools)
    {
        return view('pages.tools.edit', compact('tools'));
    }

    public function update(Request $request, Tools $tools)
    {


        $validatedData = $request->validate([
            'title' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'image' => 'required_if:text_image,==,null',

        ], [
            'name.required' => 'Name field is required.',
            'qty.required' => 'Qty field is required.',
            'status.required' => 'Status field is required.',
            'image.required' => 'Image field is required.',
        ]);


        // check is image?
        if ($request->hasFile('image')) {
            // delete old image
            $old_image = public_path('images') . '/' . $tools->image;
            if (file_exists($old_image)) {
                unlink($old_image);
            }

            // upload new image
            $image = $request->file('image');
            $image_name = Carbon::now()->format('YmdHms') . '.' . $image->extension();
            $image->move(public_path('images'), $image_name);

            $validatedData['image'] = $image_name;
        }

        $tools->update($validatedData);

        return redirect()->route('tools.index')
            ->with('success', 'Updated successfully.');
    }

    public function destroy(Tools $tools)
    {
        $tools->delete();

        return redirect()->route('tools.index')
            ->with('success', 'Deleted successfully.');
    }
}
