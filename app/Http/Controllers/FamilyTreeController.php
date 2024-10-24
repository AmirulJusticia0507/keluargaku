<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember; // Impor model FamilyMember

class FamilyTreeController extends Controller
{
    public function index()
    {
        // Mengambil kepala keluarga (anggota yang tidak memiliki ayah_id)
        $families = FamilyMember::whereNull('ayah_id')->get();

        // Mengirim data kepala keluarga ke view 'family-tree'
        return view('family-tree', compact('families'));
    }

    public function showFamilyTree(Request $request)
    {
        $familyId = $request->input('family_id');

        // Ambil anggota keluarga berdasarkan ID keluarga yang dipilih
        $familyTree = $this->buildFamilyTree($familyId);

        // Mengembalikan data dalam format JSON untuk digunakan di view
        return response()->json($familyTree);
    }

    private function buildFamilyTree($memberId)
    {
        // Mencari anggota keluarga berdasarkan ID
        $member = FamilyMember::find($memberId);
        if (!$member) {
            return [];
        }

        // Susun data pohon keluarga berdasarkan hubungan keluarga
        $tree = [
            'name' => $member->nama_lengkap,
            'children' => []
        ];

        // Tambahkan anak-anak (jika ada), baik berdasarkan ayah_id atau ibu_id
        $children = FamilyMember::where('ayah_id', $memberId)
                                ->orWhere('ibu_id', $memberId)
                                ->get();
        foreach ($children as $child) {
            $tree['children'][] = $this->buildFamilyTree($child->id); // Rekursif
        }

        return $tree;
    }
}
