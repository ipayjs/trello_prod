<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Menggunakan paginate untuk pagination, misalnya 10 user per halaman
        $users = User::paginate(10);
        return view("user.users", compact('users'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
           // validasi role agar bisa menerima nilai lain
        ],
        [
            'name.required' => 'nama wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.email' => 'email harus valid',
            'email.unique' => 'email sudah terdaftar',
           
        ]
    );
        
        $proses = User::create([
            'name' => $request->name,
            'email' => $request->email,
           
        ]);
        
        // jika User::create berhasil (if), jika gagal (else)
        if ($proses) {
            return redirect()->route('user')->with('berhasil', 'Data obat berhasil ditambahkan!');
        } else {
            return redirect()->route('user.login')->with('failed', 'Gagal menambahkan data obat!');
        }
        
        
    }

    public function login(){

        return view('login');


        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min6',
        // ]);

        // if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
        //     $user = Auth::user();
        //     if($user->role == 'admin'){
        //         return redirect()->route('admin.dashboard')->with('success', 'Login Success');
        //     }
        //    else if ($user->role == 'kasir'){
        //     return redirect()->route('kasir.dashboard')->with('success', 'Login Success');
        //      {
                
        //      }
        //    }

        // }  
       
    }


    public function loginAuth(Request $request){

        $user = $request->only(['email','password']);

        if(Auth::attempt($user)){
            return redirect()->route('landing_page');
        }else {
            return redirect()->back()->with('failed','Proses login gagal, silahkan coba kembali dengan daya yang benar!');
        }

    }

    public function logout(){
        //menghapus riwayat login
        Auth::logout();
        //arahkan kehalaman login
       return redirect()->route('login')->with('success', 'Logout Success');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::where('id', $id)->first();
        return view('user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
           // Password bersifat opsional dengan minimal 8 karakter
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus valid',
            'email.unique' => 'Email sudah terdaftar',
             // Pesan untuk validasi panjang password
        ]);
    
        $usersBefore = User::find($id); // Mengambil data user berdasarkan ID
    
        // Buat array untuk pembaruan
        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
          
        ];
    
        // Jika password diisi, hash password dan tambahkan ke array pembaruan
     
    
        $proses = $usersBefore->update($dataToUpdate); // Mengupdate data pengguna
    
        if ($proses) {
            return redirect()->route('user')->with('berhasil', 'Data berhasil diubah');
        } else {
            return redirect()->route('user.edit', ['id' => $id])->with('failed', 'Data gagal diubah');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proses = User::where('id', $id)->delete();
        if ($proses) {
            // redirect()->back() : kembali ke halaman sebelum destroy dijalanin (halaman button delete berada)
            return redirect()->back()->with('berhasil', 'Data obat berhasil dihapus!');
        } else {
            return redirect()->back()->with('failed', 'Gagal menghapus data obat!');
        }
    }
    
}