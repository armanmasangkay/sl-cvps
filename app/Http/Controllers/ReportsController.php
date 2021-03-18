<?php

namespace App\Http\Controllers;

use App\Classes\CustomPaginator;
use App\Classes\Facades\User;
use App\Models\Municipality;
use App\Models\PostVax;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{

    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository=$personRepository;
    }

    private function addOneDayToDate($dateStr)
    {
        return Carbon::createFromFormat('Y-m-d',$dateStr)->addDay()->format('Y-m-d');
    }

    private function filterPostVaxesByMunicipality($postVaxes,$municipalityId)
    {
        $filteredpostvaxes = [];
        foreach($postVaxes as $postvax)
        {
        
            if($postvax->getVaccinatorMunicipality()->id == $municipalityId)
            {
                array_push($filteredpostvaxes, $postvax);
            }
        }

        return $filteredpostvaxes;

    }

    public function index()
    {
        Auth::user()->allowIf(User::SUPER_ADMIN);
    
        $postvaxes = PostVax::paginate(10);
        return view('pages.superadmin.reports',[
            'vaccinateds'=>$postvaxes,
            'user' => 'Super Admin',
            'municipalities'=>Municipality::all()
        ]);
    }

    public function filter(Request $request)
    {

        Auth::user()->allowIf(User::SUPER_ADMIN);
        $to=$this->addOneDayToDate($request->to);
        $postvaxes = PostVax::whereBetween('created_at',[$request->from,$to])->paginate(5);
        
        $filteredpostvaxes=[];
        if($request->municipality<0){
            $filteredpostvaxes=$postvaxes->items();
           
        }else{
            $filteredpostvaxes=$this->filterPostVaxesByMunicipality($postvaxes,$request->municipality);
        }
    
 
        $postVaxes=new CustomPaginator($filteredpostvaxes,count($filteredpostvaxes));

        return view('pages.superadmin.reports',[
            'vaccinateds'=>$postVaxes,
            'user' => 'Super Admin',
            'municipalities'=>Municipality::all(),
            'from'=>$request->from,
            'to'=>$request->to,
            'selected_municipality_id'=>$request->municipality

        ]);

    }
}
