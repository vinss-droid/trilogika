<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $index = 0;
    public function index()
    {
        //
        // $portofolios = Portofolio::orderBy('created_at','desc')->get();
        // return view('portofolio.index', compact('portofolios'));
        if (request()->ajax()) {
            $portofolios = Portofolio::orderBy('created_at','desc');
            return datatables()->of($portofolios)
            ->addColumn('DT_RowIndex', function ($row) {
                // Menghitung nomor urut secara manual
                return ++$this->index;
            })
                ->addColumn('image', function ($row) {
                    return '<img src="' . asset("image/portofolio/" . $row->image) . '" alt="Image" width="100" height="100">';
                })
                ->addColumn('action', function ($row) {
                    $button = '<a href="'.route('portofolio.edit',$row->id).'" class="btn icon btn-success"><i class="bi bi-pencil"></i></a>
                    <a href="" class="btn icon btn-danger" onclick="deletePost('.$row->id.')"><i class="bi bi-trash"></i></a>
                    ';
                    return new HtmlString($button);
                })
                ->rawColumns(['image'])
                ->make(true);
        }
        return view('portofolio.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('portofolio.add_portofolio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));
// dd($request->all());
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $date . '_' . $file->getClientOriginalName();
            $filePath = public_path() . '/image/portofolio/';
            $file->move($filePath, $fileName);
        }

        Portofolio::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $fileName,
            'created_at'=> $request['created_at'],
        ]);

        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolio)
    {
        //
        // dd($portofolio);
        return view('portofolio.edit_portofolio', compact('portofolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $date = str_replace([' ', '-', ':'], '', date('Y-m-d', time()));
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if (file_exists(public_path('image/program/' . $portofolio->image))) {
                unlink(public_path('image/portofolio/' . $portofolio->image));
            }
            $newImage = $date . '_' . $image->getClientOriginalName();
            $image->move(public_path('image/portofolio'), $newImage);
            $validatedData['image'] = $newImage;
        } else {
            $validatedData['image'] = $portofolio->image;
        }

        $portofolio->slug = null;
        $portofolio->update($validatedData);
        $portofolio->update(['created_at'=>$request['created_at']]);
        return redirect()->route('portofolio.index')->with('success', 'Portofolio berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portofolio $portofolio)
    {
        if (file_exists(public_path('image/portofolio/' . $portofolio->image))) {
            unlink(public_path('image/portofolio/' . $portofolio->image));
        }
        $portofolio->delete();
        return redirect()->back()->with('success', 'Portofolio berhasil dihapus');
    }
}
