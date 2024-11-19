<?php

namespace App\Livewire\Questionnaires\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SectionThreeForm extends Component
{
    public $yesNo, $questions, $researchDevelopmentList, $clinicalTrialsList, $technologyTransferActivitiesList, $ipTransactionsList, $seedFundingList, $additionalFundingList, $submit_type, $completedStatus;

    public function mount(){
        $this->yesNo = Common::$yes_no;
        $this->researchDevelopmentList = Common::getResearchDevelopment();
        $this->clinicalTrialsList = Common::getClinicalTrials();
        $this->technologyTransferActivitiesList = Common::getTechnologyTransferActivities();
        $this->ipTransactionsList = Common::getIpTransactions();
        $this->seedFundingList = Common::getSeedFunding();
        $this->additionalFundingList = Common::getAdditionalFunding();
        $this->questions = getSectionWiseFormData(3);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 3)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function setSubmitType($type){
        $this->submit_type = $type;
        $this->store();
    }

    public function store(){

        $rules = $messages = [];

        $questionId = 59;
        foreach (getYears() as $year){
            $rules["questions.$questionId.$year"] = 'required';
            $messages["questions.$questionId.$year.required"] = "This field is required.";
        }
        $questionId++;

        $rules["questions.$questionId.medical_school"] = 'required';
        $messages["questions.$questionId.medical_school.required"] = "This field is required.";                
        $questionId++;

        $rules["questions.$questionId.clinical_trials"] = 'required|in:Yes,No';
        $messages["questions.$questionId.clinical_trials.required"] = 'This field is required.';
        $questionId++;

        if($questionId==62) {
            foreach (getYears() as $year){
                $rules["questions.$questionId.$year"] = 'required_if:questions.61.clinical_trials,Yes';
                $messages["questions.$questionId.$year.required_if"] = "This field is required.";
            }
        }
        $questionId++;

        for ($i = 63; $i <= 66; $i++) {
            foreach (getYears() as $year){
                $rules["questions.$i.$year"] = 'required';
                $messages["questions.$i.$year.required"] = "This field is required.";
            }
            $questionId++;
        }

        $rules["questions.$questionId.seed_funding"] = 'required|in:Yes,No';
        $messages["questions.$questionId.seed_funding.required"] = 'This field is required.';
        $questionId++;

        for ($i = 68; $i <= 71; $i++) {
            foreach (getYears() as $year){
                $rules["questions.$questionId.$year"] = 'required_if:questions.67.seed_funding,Yes';
                $messages["questions.$questionId.$year.required_if"] = "This field is required.";
            }
            $questionId++;
        }

        $rules["questions.$questionId"] = 'required';
        $messages["questions.$questionId.required"] = 'This field is required.';
        $questionId++;

        for ($i = 73; $i <= 85; $i++) {
            $rules["questions.$i"] = 'required';
            $messages["questions.$i.required"] = "This field is required.";
            $questionId++;
        }

        if (in_array($this->submit_type, [1, 3])) {
            $rSectionId = 4;
            $this->validate($rules, $messages);

            updateOrCreateInstitutionSection(3,$this->submit_type);

        } else if (in_array($this->submit_type, [2])) {
            try {
                updateOrCreateInstitutionSection(3,$this->submit_type);
                $this->validate($rules, $messages);
            } catch (ValidationException $e) {
                deleteInstitutionSection(3);
            }
            
            $rSectionId = $this->submit_type == 2 ? 3 : 4;
        }

        if (isset($this->questions) && !empty($this->questions)) {
            foreach ($this->questions as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                $record = QuestionAnswer::where('section_id', 3)
                    ->where('institution_id', Auth::user()->institution_id)
                    ->where('question_id', $key)
                    ->first();

                if ($record) {
                    $record->update([
                        'answers' => json_encode($value),
                        'updated_at' => now(), // Optional: Update the timestamp
                    ]);
                } else {
                    QuestionAnswer::create([
                        'section_id' => 3,
                        'institution_id' => Auth::user()->institution_id,
                        'question_id' => $key,
                        'answers' => json_encode($value),
                    ]);
                }
            }
        }

        session()->flash('success', 'Questionnaire updated successfully!');        
        $this->redirect(route('questionnaire', ['id' => $rSectionId]), navigate: true);
    }

    public function render(){
        return view('livewire.questionnaires.sections.section-three-form');
    }

    public function updateFte($yearValue){

        $seedFunding = 0;
        for ($i = 68; $i <= 70; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $seedFunding += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[71][$yearValue] = number_format($seedFunding, 0, '.', ',');
    }
}
