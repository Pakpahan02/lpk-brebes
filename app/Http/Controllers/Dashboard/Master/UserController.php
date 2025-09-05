<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('dashboard.master.user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.master.user.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $data['password'] = bcrypt($data['password']);

            User::create($data);

        } catch (\Throwable $th) {

            return redirect()
                ->route('dashboard.master.user.create')
                ->with('error', 'Terjadi kesalahan saat menyimpan data : ' . $th->getMessage());
        }

        return redirect()
            ->route('dashboard.master.user.create')
            ->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.master.user.form', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users,email,' . $user->id],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            ]);

            if (!empty($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }

            $user->update($data);

        } catch (\Throwable $th) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data : ' . $th->getMessage());
        }

        return redirect()
            ->back()
            ->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
