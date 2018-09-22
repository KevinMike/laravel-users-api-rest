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
        $total = User::all()->count();

        return response()->json([
            "page" => $page,
            "per_page" => 3,
            "total" => $total,
            "total_pages" => ceil($total/3),
            "data" => $users
        ]);
    }

    public function find($id)
    {
        $user = User::find($id);
        if($user == null)return response()->json(["data" => []],404);
        return response()->json([
            "data" => array(
                "id" => $user->id,
                "first_name" => $user->nombre,
                "last_name" => $user->apellidopat." ".$user->apellidomat,
                "avatar" => $user->avatar
            )
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
        ],201);
    }

    public function update($id,Request $request)
    {
        $user = User::find($id);
        if($user == null)return response()->json(["Result" => "User not found"],404);
        $params = $request->all();
        $user->update($params);
        return response()->json([
            "nombre"=> $user->nombre,
            "apellidopat" => $user->apellidopat,
            "apellidomat" => $user->apellidomat,
            "email" => $user->email,
            "fchnac" => date('d/m/Y', strtotime($user->fchnac)),
            "fchingreso" => date('d/m/Y', strtotime($user->fchingreso)),
            "id" => $user->id,
            "createdAt"=> $user->created_at->toDateTimeString()
        ],200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if($user==null)
            return response()->json(
                array(
                    "Result" => 'User not found',
                )
            ,404);
        else
        {
            $user->delete();
            return response()->json(
                array(
                    "Result" => 'User deleted',
                )
            ,200);
        }

    }
}