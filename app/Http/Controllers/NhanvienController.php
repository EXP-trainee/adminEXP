<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use Illuminate\Support\Facades\DB;

class NhanvienController extends Controller
{
    public function showNhanVien(){
        $listNhanvien =  NhanVien::all();
        // $listNhanvien = DB::table('nhanviens')->paginate(6); // phan trang
        return view('admin.user.show',['listNhanvien' => $listNhanvien]);
    }
    public function createNhanVien()
    {
        return view('admin.user.create');
    }
    public function postNhanVien(Request $request)
    {
      
        $nhanvien = new NhanVien;
        $nhanvien->hoten = $request->hoten;
        $nhanvien->email = $request->email;
        $nhanvien->sdt = $request->sdt;
        $nhanvien->ngaysinh = $request->ngaysinh;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->save();
        return redirect(route('showNhanVien'));
       
    }
    public function editNhanVien($id)
    {
        $findNhanVien = NhanVien::find($id);
        // dd($findId);
        return view('admin.user.edit',['findNhanVien' => $findNhanVien]);
    }
    public function updateNhanVien(Request $request, $id)
    {
        $findUpdate = NhanVien::find($id);
        $findUpdate->hoten = $request->hoten;
        $findUpdate->email = $request->email;
        $findUpdate->sdt = $request->sdt;
        $findUpdate->ngaysinh = $request->ngaysinh;
        $findUpdate->gioitinh = $request->gioitinh;
        $findUpdate->diachi = $request->diachi;
        $findUpdate->save();
        return redirect(route('showNhanVien'));
    }
    public function deleteNhanvien($id)
    {
       $findDelete = NhanVien::find($id)->delete();
       return redirect(route('showNhanVien'))->with('thongbao', 'Xoa ok');
    }
}
