<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DropdownController extends Controller
{
    public function index()
    {
        $list = DB::table('provinces')->orderBy('name_in_thai','ASC')->get();
        return view('test',compact('list'));
    }

    public function district(Request $request)
    {
        $province_id = $request->provinceID;
        $query = DB::table('districts')->where('province_id',$province_id)->get();

        $output = '<option value="">เลือกอำเภอ</option>';
        foreach ($query as $temp) {
            $output.='<option value="'.$temp->id.'">'.$temp->name_in_thai.'</option>';
        }
        echo $output;
    }

    public function subdistrict(Request $request)
    {
        $district_id = $request->districtID;
        $query = DB::table('subdistricts')->where('district_id',$district_id)->get();

        $output = '<option value="">เลือกตำบล</option>';
        foreach ($query as $temp) {
            $output.='<option value="'.$temp->id.'">'.$temp->name_in_thai.'</option>';
        }
        echo $output;
    }

    public function datatable()
    {
        $lists = DB::table('provinces')->get();
        return view('starter', compact('lists'));
    }
}
