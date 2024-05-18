<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $index = 0;
    public function index()
    {
        //
        // $partners = partner::orderBy('created_at','desc')->get();
        // return view('partner.index', compact('partners'));
        if (request()->ajax()) {
            $partners = partner::orderBy('created_at','desc');
            return datatables()->of($partners)
                ->addColumn('DT_RowIndex', function ($row) {
                    // Menghitung nomor urut secara manual
                    return ++$this->index;
                })
                ->addColumn('image', function ($row) {
                    return '<img src="' . $row->logo . '" alt="Image" width="100" height="100">';
                })
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('description', function ($row) {
                    return $row->description;
                })
                ->addColumn('slug', function ($row) {
                    return $row->slug;
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="'.route('partner.edit',$row->id).'" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                <a href="" class="btn icon btn-danger" onclick="deletePost('.$row->id.')"><i class="bi bi-trash"></i></a>
                ';
                    return new HtmlString($button);
                })
                ->rawColumns(['image'])
                ->make(true);
        }
        return view('partner.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
//        return view('partner.add_partner');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();

            $validator = Validator::make($request->all(),[
                'title' => 'required',
                'description' => 'required',
                'slug' => 'required',
                'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => 400,
                    'message' => 'Validation Errors!',
                    'errors' => $validator->errors()
                ], Response::HTTP_BAD_REQUEST);
            }

            $path = public_path('/image/partner/');
            $logo = $request->file('logo');
            $fileName = date('YmdHis') . '_' . $logo->getClientOriginalName();

            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }

            $logo->move($path, $fileName);

            $partner = Partner::create([
                'title' => $request->title,
                'description' => $request->description,
                'slug' => Str::slug($request->slug, '-'),
                'logo' => asset('image/partner/' . $fileName),
            ]);

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Partner has been created!'
            ], 200);
        } catch (\Exception $ex) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(partner $partner)
    {
        //
        // dd($partner);
//        return view('partner.edit_partner', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, partner $partner)
    {
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if (file_exists(public_path('image/program/' . $partner->image))) {
                unlink(public_path('image/partner/' . $partner->image));
            }
            $newImage = $date . '_' . $image->getClientOriginalName();
            $image->move(public_path('image/partner'), $newImage);
            $validatedData['image'] = $newImage;
        } else {
            $validatedData['image'] = $partner->image;
        }

        $partner->slug = null;
        $partner->update($validatedData);
        $partner->update(['created_at'=>$request['created_at']]);
        return redirect()->route('partner.index')->with('success', 'partner berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(partner $partner)
    {
        if (file_exists(public_path('image/partner/' . $partner->image))) {
            unlink(public_path('image/partner/' . $partner->image));
        }
        $partner->delete();
        return redirect()->back()->with('success', 'partner berhasil dihapus');
    }
}
