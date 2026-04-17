<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\CalonSiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Statistik PPDB
        $today = CalonSiswa::whereDate('created_at', date('Y-m-d'))->count();
        $month = CalonSiswa::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count();
        $year = CalonSiswa::whereYear('created_at', date('Y'))->count();
        $total = CalonSiswa::count();

        // Grafik 10 hari terakhir
        $start = now()->subDays(9)->startOfDay();
        $end = now()->endOfDay();

        $statistic = CalonSiswa::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('created_at', [$start, $end])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        $labels = [];
        $data = [];

        foreach ($statistic as $item) {
            $labels[] = Carbon::parse($item->date)->isoFormat('DD/MM/YYYY');
            $data[] = $item->total;
        }

        return view('home', compact(
            'today',
            'month',
            'year',
            'total',
            'statistic',
            'labels',
            'data'
        ));
    }

    // ================= PROFILE =================

    public function profile()
    {
        return view('pages.profile');
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile.index')
            ->with('success', 'Profile berhasil diperbarui.');
    }

    // ================= PASSWORD =================

    public function password()
    {
        return view('pages.password');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', function ($attr, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Password lama tidak sesuai.');
                }
            }],
            'password' => ['required', 'confirmed', function ($attr, $value, $fail) {
                if (Hash::check($value, Auth::user()->password)) {
                    $fail('Password baru tidak boleh sama.');
                }
            }],
        ], [
            'old_password.required' => 'Password lama harus diisi.',
            'password.required' => 'Password baru harus diisi.',
            'password.confirmed' => 'Konfirmasi tidak cocok.',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('password.index')
            ->with('success', 'Password berhasil diperbarui.');
    }
}