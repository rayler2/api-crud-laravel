<?php

namespace App\Http\Controllers;

use App\Models\Muser;
use Illuminate\Http\Request;

class MuserController extends Controller
{
    public function get_all_use(Request $request)
    {
        $musers =Muser::all();
        return response()->json($musers);
    }

    public function create_user(Request $request)
    {   /* une façon de faire cela
        $muser = new Muser();
        $muser->name = $request->name;
        $muser->email = $request->email;
        $muser->password = bcrypt($request->password);
        $muser->image = $request->image;
        $muser->save();

        return response()->json(['message' => 'User created successfully']);
        */

        /* une autre façon de faire ce qui nous pousse a modifier le model en ajoutant les champ*/
        $newmusers = Muser::create($request->all());
        return response()->json(['message' => 'User created successfully', 'data' => $newmusers]); 
     
    }

    public function delete_user($id)
    {
        $muser = Muser::find($id);
        if ($muser) {
            $muser->delete();
            return response()->json(['message' => 'User deleted successfully', 'data' => $muser], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function update_user(Request $request, $id)
    {
        $muser = Muser::find($id);
        if ($muser) {
            $muser->update($request->all());
            return response()->json(['message' => 'User updated successfully', 'data' => $muser], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
