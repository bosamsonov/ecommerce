<?php

namespace App\Http\Controllers\Crewing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Crewing\{
    Candidate,
    Certificate,
    Education,
    SeaService
};

class CandidateController extends Controller
{
    public function index(){
        $candidates = Candidate::paginate(15);
        return view('crewing.pages.candidates.index', [
            'candidates' => $candidates
        ]);
    }
    
    public function create(){
        return view('crewing.pages.candidates.create');
    }
    
    public function store(Request $request){
        
        $candidate = Candidate::create($request->all());
        
        if($request->has('education')) {
            foreach ($request->education as $education) {
                $candidate->education()
                    ->save(new Education($education));
            }
        }
        
        if($request->has('certificate')) {
            foreach ($request->certificate as $certificate) {
                $candidate->certificate()
                    ->save(new Certificate($certificate));
            }
        }
        
        if($request->has('sea_service')) {
            foreach ($request->sea_service as $sea_service) {
                $candidate->sea_service()
                    ->save(new SeaService($sea_service));
            }
        }
            
        return redirect()->route('crewing.candidates.index');
    }
    
    public function show (Candidate $candidate){
        return view('crewing.pages.candidates.show', [
                'candidate' => $candidate
            ]);
    }
    
    public function edit ($candidateId){
        $candidate = Candidate::with('certificate', 'education', 'sea_service')->find($candidateId);
        return view('crewing.pages.candidates.edit', [
                'candidate' => $candidate
            ]);
    }
    
}
