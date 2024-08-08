<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCourseController extends Controller
{
    // Menampilkan data peserta didik untuk gelar_mentor 'S.Kom' dan 'S.T.'
    public function titleIn()
    {
        $results = DB::table('userCourse as uc')
            ->join('users as u', 'uc.user_id', '=', 'u.id')
            ->join('courses as c', 'uc.course_id', '=', 'c.id')
            ->select('u.username AS peserta_didik', 'c.course AS mata_kuliah', 'c.mentor AS nama_mentor', 'c.title AS gelar_mentor')
            ->whereIn('c.title', ['S.Kom', 'S.T.'])
            ->get();

        return response()->json($results);
    }

    // Menampilkan data peserta didik untuk gelar_mentor selain 'S.Kom' dan 'S.T.'
    public function titleNotIn()
    {
        $results = DB::table('userCourse as uc')
            ->join('users as u', 'uc.user_id', '=', 'u.id')
            ->join('courses as c', 'uc.course_id', '=', 'c.id')
            ->select('u.username AS peserta_didik', 'c.course AS mata_kuliah', 'c.mentor AS nama_mentor', 'c.title AS gelar_mentor')
            ->whereNotIn('c.title', ['S.Kom', 'S.T.'])
            ->get();

        return response()->json($results);
    }

    // Menampilkan jumlah peserta didik per mata kuliah
    public function countCourses()
    {
        $results = DB::table('userCourse as uc')
            ->join('courses as c', 'uc.course_id', '=', 'c.id')
            ->select('c.course AS mata_kuliah', 'c.mentor AS nama_mentor', 'c.title AS gelar_mentor', DB::raw('COUNT(uc.user_id) AS jumlah_peserta_didik'))
            ->groupBy('c.course', 'c.mentor', 'c.title')
            ->get();

        return response()->json($results);
    }

    // Menampilkan jumlah peserta dan total fee per mentor
    public function calculateFees()
    {
        $results = DB::table('userCourse as uc')
            ->join('courses as c', 'uc.course_id', '=', 'c.id')
            ->select('c.mentor AS mentor', DB::raw('COUNT(uc.user_id) AS jumlah_peserta'), DB::raw('COUNT(uc.user_id) * 2000000 AS total_fee'))
            ->groupBy('c.mentor')
            ->get();

        return response()->json($results);
    }
}
