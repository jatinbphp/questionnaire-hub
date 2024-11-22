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

class SectionTwoForm extends Component
{
    public $ttf_activities, $yesNo, $questions, $ipManagementTasksList, $staffingTtfList, $staffingOfTheTtf, $staffingOfTheTtfB, $staffingOfTheTtfC, $staffingOfTheTtfD, $staffingOfTheTtfE, $staffingOfTheTtfGender, $newRows, $researchDevelopmentList, $clinicalTrialsList, $technologyTransferActivitiesList, $ipTransactionsList, $seedFundingList, $additionalFundingList, $submit_type, $completedStatus;

    public function mount(){
        $this->ttf_activities = Common::$ttf_activities;
        $this->yesNo = Common::$yes_no;
        $this->ipManagementTasksList = Common::getIpManagementTasks();
        $this->staffingTtfList = Common::getStaffingTtf();
        $this->staffingOfTheTtf = Common::getStaffingOfTheTtf();
        $this->staffingOfTheTtfB = Common::getStaffingOfTheTtfB();
        $this->staffingOfTheTtfC = Common::getStaffingOfTheTtfC();
        $this->staffingOfTheTtfD = Common::getStaffingOfTheTtfD();
        $this->staffingOfTheTtfE = Common::getStaffingOfTheTtfE();
        $this->staffingOfTheTtfGender = Common::getStaffingOfTheTtfGender();
        $this->researchDevelopmentList = Common::getResearchDevelopment();
        $this->clinicalTrialsList = Common::getClinicalTrials();
        $this->technologyTransferActivitiesList = Common::getTechnologyTransferActivities();
        $this->ipTransactionsList = Common::getIpTransactions();
        $this->seedFundingList = Common::getSeedFunding();
        $this->additionalFundingList = Common::getAdditionalFunding();
        $this->questions = getSectionWiseFormData(2);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 2)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }   

    public function setSubmitType($type){
        $this->submit_type = $type;
        $this->store();
    }

    public function store(){

        $rules = $messages = [];
        for ($i = 35; $i <= 57; $i++) {
            $rules["questions.$i.ttf_activity"] = 'required';
            $rules["questions.$i.ttf_capability"] = 'required';
            $rules["questions.$i.ttf_capacity"] = 'required';
            $rules["questions.$i.ttf_importance"] = 'required';

            $messages["questions.$i.ttf_activity.required"] = "This field is required.";
            $messages["questions.$i.ttf_capability.required"] = "This field is required.";
            $messages["questions.$i.ttf_capacity.required"] = "This field is required.";
            $messages["questions.$i.ttf_importance.required"] = "This field is required.";
        }

         // Validation for question 58
        if (isset($this->questions[58])) {
            foreach ($this->questions[58] as $index => $row) {
                $rules["questions.58.$index.number"]   = 'required';
                $rules["questions.58.$index.type"]     = 'required';
                $rules["questions.58.$index.gender"]   = 'required';
                $rules["questions.58.$index.level"]    = 'required';
                $rules["questions.58.$index.degree1"]  = 'required';
                $rules["questions.58.$index.subject1"] = 'required';
                $rules["questions.58.$index.degree2"]  = 'required';
                $rules["questions.58.$index.subject2"] = 'required';
                $rules["questions.58.$index.title"]    = 'required';
                $rules["questions.58.$index.years"]    = 'required';
                $rules["questions.58.$index.ttfFte"]   = 'required|numeric';
                $rules["questions.58.$index.otherFte"] = 'required|numeric';

                $messages["questions.58.$index.number.required"]   = "This field is required.";
                $messages["questions.58.$index.type.required"]     = "This field is required.";
                $messages["questions.58.$index.gender.required"]   = "This field is required.";
                $messages["questions.58.$index.level.required"]    = "This field is required.";
                $messages["questions.58.$index.degree1.required"]  = "This field is required.";
                $messages["questions.58.$index.subject1.required"] = "This field is required.";
                $messages["questions.58.$index.degree2.required"]  = "This field is required.";
                $messages["questions.58.$index.subject2.required"] = "This field is required.";
                $messages["questions.58.$index.title.required"]    = "This field is required.";
                $messages["questions.58.$index.years.required"]    = "This field is required.";
                $messages["questions.58.$index.ttfFte.required"]   = "This field is required.";
                $messages["questions.58.$index.ttfFte.numeric"]    = "This field only contain numeric.";
                $messages["questions.58.$index.otherFte.required"] = "This field is required.";
                $messages["questions.58.$index.otherFte.numeric"]  = "This field only contain numeric.";
            }
        }

        $questionId = 59;
        foreach (getYears() as $year){
            $rules["questions.$questionId.$year"] = 'required';
            $messages["questions.$questionId.$year.required"] = "This field is required.";
        }
        $questionId++;

        $extQuestionId = 264;
        $rules = [
            "questions.$extQuestionId" => 'required|array|min:1',
        ];
        $messages = [
            "questions.$extQuestionId.required" => "The field is required.",
        ];

        $rules["questions.$questionId.medical_school"] = 'required|in:Yes,No';
        $messages["questions.$questionId.medical_school.required"] = "This field is required.";                
        $questionId++;

        $rules["questions.$questionId.clinical_trials"] = 'required_if:questions.60.medical_school,Yes';
        $messages["questions.$questionId.clinical_trials.required_if"] = 'This field is required if medical school are Yes.';
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
            $rSectionId = 3;
            $this->validate($rules, $messages);

            updateOrCreateInstitutionSection(2,$this->submit_type);

        } else if (in_array($this->submit_type, [2])) {
            try {
                updateOrCreateInstitutionSection(2,$this->submit_type);
                $this->validate($rules, $messages);
            } catch (ValidationException $e) {
                deleteInstitutionSection(2);
            }
            
            $rSectionId = $this->submit_type == 2 ? 2 : 3;
        }

        if (isset($this->questions) && !empty($this->questions)) {
            foreach ($this->questions as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                $record = QuestionAnswer::where('section_id', 2)
                    ->where('institution_id', Auth::user()->institution_id)
                    ->where('question_id', $key)
                    ->first();

                if ($record) {
                    $record->update([
                        'answers' => json_encode($value),
                    ]);
                } else {
                    QuestionAnswer::create([
                        'section_id' => 2,
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
        return view('livewire.questionnaires.sections.section-two-form');
    }

    public function addNewRow($questionId)
    {
        if (!isset($this->questions[$questionId])) {
            $this->questions[$questionId] = [];
        }
        $this->questions[$questionId][] = [
            'number' => count($this->questions[$questionId]) + 1,
            'type' => '',
            'gender' => '',
            'level' => '',
            'degree1' => '',
            'subject1' => '',
            'degree2' => '',
            'subject2' => '',
            'title' => '',
            'years' => '',
            'ttfFte' => 0,
            'otherFte' => 0,
            'totalFte' => 0,
        ];
    }

    public function updateFte($questionId, $index)
    {
        $ttfFte = floatval($this->questions[$questionId][$index]['ttfFte']);
        $otherFte = floatval($this->questions[$questionId][$index]['otherFte']);

        $this->questions[$questionId][$index]['totalFte'] = $ttfFte + $otherFte;
    }

    public function updateSeedFundingList($yearValue){

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

    public function addEstablishedRow($questionId){
        if (!isset($this->questions[$questionId])) {
            $this->questions[$questionId] = [];
        }

        if (empty($this->questions[$questionId])) {
            $this->questions[$questionId] = ['', ''];
        } else {
            $this->questions[$questionId][] = '';
        }
    }
}
