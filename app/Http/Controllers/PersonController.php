<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User as FacadesUser;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    public function addqr(Request $request)
    {
        Auth::user()->allowIf(FacadesUser::ENCODER);

        $person = Person::find($request->person_id);
        $person->qr_code = $request->qrcode_number;
        $person->save();

        return redirect(route('pre.index'))->with([
            'registered' => true,
            'title'      => 'Great!',
            'text'       => 'Qr Code successfully added'
        ]);
    }
}
