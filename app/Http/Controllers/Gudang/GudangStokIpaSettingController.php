<?php
namespace App\Http\Controllers\Gudang;

use App\Http\Controllers\Controller;
use App\Models\Gudang\StokIpa;
use App\Models\Gudang\GudangStokIpaSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GudangStokIpaSettingController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $idIpa = $user->ipa;

        $stok = StokIpa::with(['bahan.satuan'])
            ->where('id_ipa', $idIpa)
            ->orderBy('id_bahan')
            ->get();

        $settings = GudangStokIpaSetting::where('id_ipa', $idIpa)
            ->pluck('stok_minimum', 'id_bahan');

        return view('ipa.set-minimum-stok', compact(
            'stok',
            'settings'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'items' => ['required', 'array'],
            'items.*.stok_minimum' => [
                'required',
                'numeric',
                'min:0',
                'max:9999999999999.99',
            ],
        ]);

        $user = auth()->user();
        $idIpa = $user->ipa;

        DB::transaction(function () use ($request, $idIpa) {
            foreach ($request->input('items') as $idBahan => $item) {
                // Pastikan bahan memang terdaftar pada IPA yang sedang login.
                $terdaftar = StokIpa::where('id_ipa', $idIpa)
                    ->where('id_bahan', $idBahan)
                    ->exists();

                if (! $terdaftar) {
                    abort(403, 'Bahan tidak terdaftar pada IPA Anda.');
                }

                GudangStokIpaSetting::updateOrCreate(
                    [
                        'id_ipa' => $idIpa,
                        'id_bahan' => $idBahan,
                    ],
                    [
                        'stok_minimum' => $item['stok_minimum'],
                    ]
                );
            }
        });

        return redirect()
            ->route('ipa.set-minimum-stok')
            ->with('success', 'Pengaturan minimum stok berhasil disimpan.');
    }
}