<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Facility;
use App\Models\Municipality;
use App\Models\PostVax;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class AdminReportsController extends Controller
{

    private function filterPostVaxesByMunicipality($postVaxes)
    {
        $filteredpostvaxes = [];
        foreach($postVaxes as $postvax)
        {
            if($postvax->getVaccinatorMunicipality()->id === Auth::user()->municipality_id)
            {
                array_push($filteredpostvaxes, $postvax);
            }
        }

        return $filteredpostvaxes;

    }

    private function addOneDayToDate($dateStr)
    {
        return Carbon::createFromFormat('Y-m-d',$dateStr)->addDay()->format('Y-m-d');
    }

    
    public function index()
    {
        Auth::user()->allowIf(User::ADMIN);
        $postvaxes = PostVax::all();

        $filteredpostvaxes = $this->filterPostVaxesByMunicipality($postvaxes);

        return view('pages.admin.reports', ['vaccinateds' => $filteredpostvaxes]);
    }
    

    public function filter(Request $request)
    {  
        $request->validate([
            'from'=>'required',
            'to'=>'required'
        ]);
      
        $to=$this->addOneDayToDate($request->to);
        
        $postvaxes = PostVax::whereBetween('created_at',[$request->from,$to])->get();

        $filteredpostvaxes = $this->filterPostVaxesByMunicipality($postvaxes);

        return view('pages.admin.reports', [
            'vaccinateds' => $filteredpostvaxes,
            'from'=>$request->from,
            'to'=>$request->to
        ]);





    }
}
