<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;



class MhsAPIController extends Controller
{
    public function read()
    {
        $mhs = Mahasiswa::all();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil Ditampilkan',
            'data' => $mhs], 200);
        

    }
    public function create(Request $request)
        {
            $mhs = Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'minat' => $request->minat,

            ]);

            if ($mhs)
            {
                return response()->json([
                    'succes' => true,
                    'message' => 'data baerhasi di tambahkan'
                ], 200);
            }
            else
            {
            
                return response()->json([
                    'succes' => false,
                    'message' => 'data baerhasi di tambahkan'
                ], 400);

            }
        


        }
        public function update($id, Request $request)
        {
            $mhs = Mahasiswa::find($id)->update([
                "nim" => $request->nim,
                "nama" => $request->nama,
                "gender" => $request->gender,
                "minat" => $request->minat,

            ]);
            if ($mhs)
            {
                return response()->json([
                    'succes' => true,
                    'message' => 'data baerhasi di tambahkan'
                ], 200);
            }
            else
            {
            
                return response()->json([
                    'succes' => false,
                    'message' => 'data baerhasi di tambahkan'
                ], 400);
            }


        }
        public function delete($id){
            $mhs = Mahasiswa::find($id);
            $mhs->delete();
            return response()->json([
                'success' =>true,
                'message' => 'Data berhasil dihapus!'
            ]);
        }





}