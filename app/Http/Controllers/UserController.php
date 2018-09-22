<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->get("page") ?: 1;
        $users = User::all()
                    ->forPage((int)$page,3);
        $users = $users->map(function($item){
              return array(
                  "id" => $item->id,
                  "first_name" => $item->nombre,
                  "last_name" => $item->apellidopat." ".$item->apellidomat,
                  "avatar" => $item->avatar
              );
        });
        return response()->json([
            "page" => $page,
            "per_page" => 3,
            "total_pages" => ceil(User::all()->count()/3),
            "data" => $users
        ]);
    }

    public function find($id)
    {
        $user = User::find($id);
        return response()->json([
            "data" => array([
                "id" => $user->id,
                "first_name" => $user->nombre,
                "last_name" => $user->apellidopat." ".$user->apellidomat,
                "avatar" => $user->avatar
            ])
        ]);
    }
    public function create(Request $request)
    {
        $user = new User();
        $user->nombre = $request->get('nombre');
        $user->apellidopat = $request->get('apellidopat');
        $user->apellidomat = $request->get('apellidomat');
        $user->email = $request->get('email');
        $user->fchnac = $request->get('fchnac');
        $user->fchingreso = $request->get('fchingreso');
        $user->password = 'w3ewewwewewewe';
        $user->save();
        return response()->json([
            "nombre"=> $user->nombre,
            "apellidopat" => $user->apellidopat,
            "apellidomat" => $user->apellidomat,
            "email" => $user->email,
            "fchnac" => date('d/m/Y', strtotime($user->fchnac)),
            "fchingreso" => date('d/m/Y', strtotime($user->fchingreso)),
            "id" => $user->id,
            "createdAt"=> $user->created_at->toDateTimeString()
        ]);
    }

    public function update($id,Request $request)
    {
        $user = User::find($id);
        $user->nombre = $request->get('nombre');
        $user->apellidopat = $request->get('apellidopat');
        $user->apellidomat = $request->get('apellidomat');
        $user->email = $request->get('email');
        $user->fchnac = $request->get('fchnac');
        $user->fchingreso = $request->get('fchingreso');
        $user->save();
        return response()->json([
            "nombre"=> $user->nombre,
            "apellidopat" => $user->apellidopat,
            "apellidomat" => $user->apellidomat,
            "email" => $user->email,
            "fchnac" => date('d/m/Y', strtotime($user->fchnac)),
            "fchingreso" => date('d/m/Y', strtotime($user->fchingreso)),
            "id" => $user->id,
            "createdAt"=> $user->created_at->toDateTimeString()
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $result = '';
        if($user==null)
            $result= 'No user found';
        else
        {
            $user->delete();
            $result= 'User deleted';
        }

        return response()->json([
            "data" => array([
                "Result" => $result,
            ])
        ]);
    }
}