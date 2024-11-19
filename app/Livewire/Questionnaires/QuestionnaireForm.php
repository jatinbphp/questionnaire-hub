<?php

namespace App\Livewire\Questionnaires;

use Livewire\Component;
use App\Models\InstitutionsCompletedSection;
use App\Models\InstitutionsWorkingSection;
use App\Models\QuestionAnswer;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QuestionnaireForm extends Component
{
    public $menu, $sectionId, $percentage, $institutionId, $anyOneIsWorking, $workingUsers, $accessDenied, $percentageSubmitter, $sectionStatus;

    public function mount($id){
        $this->institution = Section::findOrFail($id);
        $this->menu      = "Questionnaires";
        $this->sectionId = $id;
        $this->institutionId = Auth::user()->institution_id;
        $totalQuestions = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->count();
        $this->percentage = ($totalQuestions > 0) ? round(($totalQuestions * 100) / 8, 1) : 0;

        $totalQuestionsSubmitter = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('status', 1)->count();
        $this->percentageSubmitter = ($totalQuestionsSubmitter > 0) ? round(($totalQuestionsSubmitter * 100) / 8, 1) : 0;

        $this->anyOneIsWorking = false;
        $institutionId = Auth::user()->institution_id;
        $userId = Auth::user()->id;

        $checkStatus = InstitutionsCompletedSection::where('institution_id', $institutionId)->get();
        $this->sectionStatus = [];

        if(!empty($checkStatus)){
            foreach ($checkStatus as $statusValue) {
                $this->sectionStatus[$statusValue->section_id] = $statusValue->status;
            }
        }

        $anyOneIsWorking = InstitutionsWorkingSection::where('institution_id', $institutionId)->where('section_id', $id)->first();
        if ($anyOneIsWorking) {
            if ($anyOneIsWorking->user_id == $userId) {
                $this->resetWorkingSection($userId, $institutionId, $id);
            } else {
                $workingUser = User::where('status', 'active')->where('institution_id', $institutionId)->find($anyOneIsWorking->user_id);

                $this->anyOneIsWorking = $workingUser ? true : false;

                if (!$this->anyOneIsWorking) {
                    $this->resetWorkingSection($userId, $institutionId, $id);
                }
            }
        } else {
            $this->resetWorkingSection($userId, $institutionId, $id);
        }

        $this->workingUsers = [];
        $this->accessDenied = [];
        $workingSections = InstitutionsWorkingSection::with('user')->where('institution_id', $institutionId)->get();

        if(!empty($workingSections)){
            foreach ($workingSections as $workingSection) {
                if ($workingSection->user) {
                    $this->workingUsers[$workingSection->section_id] = $workingSection->user->fullname;

                    if ($workingSection->user->id != $userId) {
                        $this->accessDenied[$workingSection->section_id] = 1;
                    }
                }
            }
        }
    }

    public function render(){
        return view('livewire.questionnaires.questionnaire-form')->extends('layouts.app', ['menu' => $this->menu, 'sectionId' => $this->sectionId])->section('content');
    }

    public function deleteQueAnsImg($id, $src){
        $queAns = QuestionAnswer::where('section_id', 8)
                    ->where('institution_id', Auth::user()->institution_id)
                    ->where('question_id', $id)->first();
        $updatedString = '';
        $updatedArray = [];
        if ($queAns) {
          $answers = $queAns['answers'];
          if(!empty($answers)){
            $ansImgArr = json_decode($answers, true);
            $removeImg = 'uploads/sections/'.$src;
            $newImgs = [];
            foreach($ansImgArr as $ans){
              if($ans == $removeImg){
                 if (file_exists(public_path($removeImg))) {
                    unlink(public_path($removeImg));
                }
              }else{
                $newImgs[] = $ans;
              }
            }

            $input['answers'] = $newImgs;
            $queAns->update($input);
            return response()->json(['success' => 'Image deleted successfully!']);
          }else{
            return response()->json(['error' => 'Image not found!']);
          }          
        } else {
            return response()->json(['error' => 'Question not found.']);
        }
    }

    private function resetWorkingSection($userId, $institutionId, $sectionId){
        InstitutionsWorkingSection::where([
            'user_id' => $userId,
            'institution_id' => $institutionId,
        ])->delete();

        InstitutionsWorkingSection::create([
            'user_id' => $userId,
            'section_id' => $sectionId,
            'institution_id' => $institutionId,
        ]);
    }

    public function startLoading(){
    }
}
