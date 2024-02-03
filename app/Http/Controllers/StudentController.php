<?php

namespace App\Http\Controllers;

use App\Models\Admin\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public static function index() {
        return view('student');
    }

    //Create
    public static function createData(Request $request){
        $student = new Student();

        $student->nama = $request->name;
        $student->nis = $request->nis;
        $student->umur = $request->umur;
        $student->alamat = $request->alamat;
        $student->class_id = 3;

        $student->save();

        return $student;
    }

    //Read

    public static function getAll($id = 0){
        $student = Student::all();


        return response()->json([
            "total" => count($student),
            "totalNotFiltered" =>count($student),
            "rows" => $student
        ]);
    }


    public static function updateData(Request $request, $id) {
        $student = DB::select(
            DB::raw("update students set nama = '$request->nama',
            updated_at = now() where id = '$id' "));

        $updated = Student::find($id);

        return $updated;
    }

    public static function destroyData(Request $request, $id){
        try {
            $student = Student::destroy($id);

            if ($student) {
                return "Data Berhasil dihapus";
            }else{
                throw new Exception("Tidak ada data dengan id $id");
            }

        } catch (\Exception $e) {
            throw $e;
        }


    }
}
