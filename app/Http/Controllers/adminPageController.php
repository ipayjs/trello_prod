<?php

namespace App\Http\Controllers;
use App\Models\article;

use Illuminate\Http\Request;

class adminPageController extends Controller
{
    

    public function index(Request $request)
    {

        $articles = article::where('title', 'LIKE', '%'.$request->search_blog.'%')->orderBy('title', 'ASC')->simplePaginate(5);

        return view('blogs', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'publisher' => 'required',
            'type' => 'required',
            'title' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk jenis file dan ukuran
        ]);
        
        // Mengelola file upload
        if ($request->hasFile('photo')) {
            // Mendapatkan file
            $file = $request->file('photo');
            
            // Menentukan nama file yang unik
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            
            // Menyimpan file ke direktori 'uploads'
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            
            // Mendapatkan URL file yang telah disimpan
            $photoUrl = '/storage/' . $filePath; // Path untuk disimpan di database
        }
        
        $proses = article::create([
            'publisher' => $request->publisher,
            'type' => $request->type,
            'title' => $request->title,
            'photo' => $photoUrl, // Menyimpan path file foto
            'content' => $request->content,
        ]);
        

        if($proses) {
            return redirect()->route('blogs')->with('success', 'Berhasil membuat artikel');
            
        }
        else {
            return redirect()->route('article.add.store')->with('error', 'Gagal membuat artikel');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $articles = article::where('id', $id)->first();
        return view('edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'publisher' => 'required',
            'type' => 'required',
            'title' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk jenis file dan ukuran
        ]);

        $articleBefore = article::where('id',$id)->first();

        if ($request->hasFile('photo')) {
            // Mendapatkan file
            $file = $request->file('photo');
            
            // Menentukan nama file yang unik
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            
            // Menyimpan file ke direktori 'uploads'
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            
            // Mendapatkan URL file yang telah disimpan
            $photoUrl = '/storage/' . $filePath; // Path untuk disimpan di database
        }

        $proses = $articleBefore->update([
            'publisher' => $request->publisher,
            'type' => $request->type,
            'title' => $request->title,
            'photo' => $photoUrl, // Menyimpan path file foto
            'content' => $request->content,]);

            if ($proses) {
                return redirect()->route('blogs')->with('success', 'Data obat berhasil diubah!');
            } else {
                return redirect()->route('article.edit.update', $id)->with('failed', 'Gagal mengubah data obat!');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan artikel berdasarkan ID
        $article = Article::find($id);

        if ($article) {
            // Hapus artikel jika ditemukan
            $article->delete();
            return redirect()->back()->with('berhasil', 'Data artikel berhasil dihapus!');
        } else {
            // Jika tidak ditemukan, kembalikan pesan gagal
            return redirect()->back()->with('failed', 'Artikel tidak ditemukan atau gagal dihapus!');
        }
    }
}
