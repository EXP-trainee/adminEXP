<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use Illuminate\Support\Facades\DB;

class NvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNhanvien =  NhanVien::all();
        // $listNhanvien = DB::table('nhanviens')->paginate(6); // phan trang
        return view('admin.user.show', ['listNhanvien' => $listNhanvien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nhanvien = new NhanVien;
        $nhanvien->hoten = $request->hoten;
        $nhanvien->email = $request->email;
        $nhanvien->sdt = $request->sdt;
        $nhanvien->ngaysinh = $request->ngaysinh;
        $nhanvien->gioitinh = $request->gioitinh;
        $nhanvien->diachi = $request->diachi;
        $nhanvien->save();
        return redirect(route('nhanvien.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $findNhanVien = NhanVien::find($id);
        return view('admin.user.edit',['findNhanVien' => $findNhanVien]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findUpdate = NhanVien::find($id);
        $findUpdate->hoten = $request->hoten;
        $findUpdate->email = $request->email;
        $findUpdate->sdt = $request->sdt;
        $findUpdate->ngaysinh = $request->ngaysinh;
        $findUpdate->gioitinh = $request->gioitinh;
        $findUpdate->diachi = $request->diachi;
        $findUpdate->save();
        return redirect(route('nhanvien.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::delete('delete nhanviens where id = ?', [$id]);
        $findDelete = NhanVien::find($id)->delete();
        return redirect(route('nhanvien.index'))->with('thongbao', 'Xoa ok');
    }
}
