<?php

namespace App\Http\Controllers\Ipa;

use App\Http\Controllers\Controller;
use App\Models\Ipa\Amper;
use App\Models\Ipa\Durasi;
use App\Models\Ipa\Flow;
use App\Models\Ipa\Frekuansi;
use App\Models\Ipa\Level;
use App\Models\Ipa\Mano;
use App\Models\Ipa\Ntubaku;
use App\Models\Ipa\status;
use App\Models\Ipa\Volt;
use App\Models\Ipa\Lumpur;
use App\Models\Ipa\Cucifilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IpaController extends Controller
{
    public function index()
    {
        return view('ipa.monitor');
    }

    public function store(Request $request)
    {
        $user   = Auth::user();
        $idIpa  = $user->ipa;
        $idUser = $user->id;

        DB::transaction(function () use ($request, $idIpa, $idUser) {

            /* =====================================================
             |  DATA POMPA (STATUS + PARAMETER LISTRIK)
             =====================================================*/
            if ($request->has('pompa')) {

                foreach ($request->pompa as $pompa) {

                    $idPompa = $pompa['id_pompa'];

                    // ===== STATUS (WAJIB DISIMPAN, ON / OFF)
                    status::create([
                        'status'   => $pompa['status'], // 0 / 1
                        'id_pompa' => $idPompa,
                        'id_ipa'   => $idIpa,
                        'id_user'  => $idUser,
                    ]);

                    // jika OFF, parameter lain tidak perlu diproses
                    // if ($pompa['status'] != 1) {
                    //     continue;
                    // }

                    // ===== FREKUENSI
                    if (!is_null($pompa['frekuensi'])) {
                        Frekuansi::create([
                            'frek' => $pompa['frekuensi'],
                            'id_pompa'  => $idPompa,
                            'id_ipa'    => $idIpa,
                            'id_user'  => $idUser,
                        ]);
                    }

                    // ===== AMPERE
                    if (!is_null($pompa['ampere'])) {
                        Amper::create([
                            'amp'   => $pompa['ampere'],
                            'id_pompa' => $idPompa,
                            'id_ipa'   => $idIpa,
                            'id_user'  => $idUser,
                        ]);
                    }

                    // ===== VOLT
                    if (!is_null($pompa['volt'])) {
                        Volt::create([
                            'vol'     => $pompa['volt'],
                            'id_pompa' => $idPompa,
                            'id_ipa'   => $idIpa,
                            'id_user'  => $idUser,
                        ]);
                    }

                    // ===== DURASI
                    if (!is_null($pompa['durasi'])) {
                        Durasi::create([
                            'durasi'   => $pompa['durasi'],
                            'id_pompa' => $idPompa,
                            'id_ipa'   => $idIpa,
                            'id_user'  => $idUser,
                        ]);
                    }
                }
            }

            /* =====================================================
             |  FLOW & TOTALIZER (BERDASARKAN INTAKE)
             =====================================================*/
                if ($request->has('flow') && $request->has('total')) {

                foreach ($request->flow as $key => $flowValue) {

                    Flow::create([
                        'flow'      => $flowValue,                 // ⬅️ FIX
                        'totaliz' => $request->total[$key] ?? null,
                        'id_flow'   => $key,
                        'id_ipa'    => $idIpa,
                        'id_user'   => $idUser,
                    ]);
                }
            }

             /* =====================================================
             |  MANO METER
             =====================================================*/
            if ($request->has('mano') && $request->has('id_mano')) {

                foreach ($request->mano as $key => $manoValue) {

                    if (is_null($manoValue)) {
                        continue;
                    }

                    Mano::create([
                        'mano'        => $manoValue,
                        'id_mano'  => $request->id_mano[$key],
                        'id_ipa'     => $idIpa,
                        'id_user'    => $idUser,
                    ]);
                }
            }

            /* =====================================================
             |  RESERVAOR 
             =====================================================*/
            if ($request->has('resv') && $request->has('id_resv')) {

                foreach ($request->resv as $key => $resvValue) {

                    if (is_null($resvValue)) {
                        continue;
                    }

                    Level::create([
                        'lvl'        => $resvValue,
                        'id_resv'  => $request->id_resv[$key],
                        'id_ipa'     => $idIpa,
                        'id_user'    => $idUser,
                    ]);
                }
            }

            // ================= BUANG LUMPUR =================
                if ($request->filled('menit_lumpur')) {
                    Lumpur::create([
                        'menit'   => $request->menit_lumpur,
                        'ipa_lumpur'  => $request->ipa_lumpur,
                        'id_ipa' =>$idIpa,
                        'user' => $idUser,
                    ]);
                }

                // ================= CUCI FILTER =================
                if ($request->filled('menit_cuci')) {
                    Cucifilter::create([
                        'menit'     => $request->menit_cuci,
                        'id_filter' => $request->atFilter,
                        'id_ipa'    => $idIpa,
                        'user'   => $idUser,
                    ]);
                }

            /* =====================================================
             |  NTU (BERDASARKAN INTAKE)
             =====================================================*/
            // if ($request->has('ntu') && $request->has('id_intake')) {

            //     foreach ($request->ntu as $key => $ntuValue) {

            //         if (is_null($ntuValue)) {
            //             continue;
            //         }

            //         Ntubaku::create([
            //             'ntu'        => $ntuValue,
            //             'id_intake'  => $request->id_intake[$key],
            //             'id_ipa'     => $idIpa,
            //             'id_user'    => $idUser,
            //         ]);
            //     }
            // }

        });

        return back()->with('success', 'Data IPA berhasil disimpan');
    }

}
