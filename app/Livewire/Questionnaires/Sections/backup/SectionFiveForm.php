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

class SectionFiveForm extends Component
{

    public $yes_no, $questions, $nonActionableDisclosureList, $revenueList, $revenueReceivedList, $nonIprActActionableDisclosuresList, $nonIprActActionableDisclosuresSecondList, $runnningRoyaltiesList, $totalAnnualRevenueType, $submit_type, $completedStatus;

    public function mount(){
        $this->yes_no = Common::$yes_no;
        $this->nonActionableDisclosureList = Common::getNonActionableDisclosure();
        $this->revenueList = Common::getRevenueData();
        $this->revenueReceivedList = Common::getRevenueReceived();
        $this->nonIprActActionableDisclosuresList = Common::getNonIprActActionableDisclosuresFirst();
        $this->nonIprActActionableDisclosuresSecondList = Common::getNonIprActActionableDisclosuresSecond();
        $this->runnningRoyaltiesList = Common::getRunnningRoyalties();
        $this->totalAnnualRevenueType = Common::$getTotalAnnualRevenueType;
        $this->questions = getSectionWiseFormData(7);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 7)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';

        for ($i = 222; $i <= 231; $i++) {
            foreach (getYears() as $year) {
                $this->questions[$i][$year] = isset($this->questions[$i][$year]) && $this->questions[$i][$year] > 0 ? $this->questions[$i][$year] : 0;
            }
        }

        for ($i = 237; $i <= 243; $i++) {
            foreach (getYears() as $year) {
                $this->questions[$i][$year] = isset($this->questions[$i][$year]) && $this->questions[$i][$year] > 0 ? $this->questions[$i][$year] : 0;
            }
        }
    }

    public function setSubmitType($type){
        $this->submit_type = $type;
        $this->store();
    }

    public function store(){

        $rules = $messages = [];

        $questionId = 221;

        $rules["questions.$questionId.actionable_disclosure_5_1"] = 'required';
        $messages["questions.$questionId.actionable_disclosure_5_1.required"] = "This field is required.";                
        $questionId++;

        for ($i = 222; $i <= 234; $i++) {
            if (isset($this->questions[221]['actionable_disclosure_5_1']) && $this->questions[221]['actionable_disclosure_5_1'] === 'Yes') {
                foreach (getYears() as $year){
                    
                    if(isset($this->questions[$i][$year])){
                        $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                    }

                    $rules["questions.$i.$year"] = 'required';
                    $messages["questions.$i.$year.required"] = "This field is required.";
                }
                if($i==232){
                    $rules["questions.232.type"] = 'required';
                    $messages["questions.232.type.required"] = "This field is required.";
                }
            }
            $questionId++;            
        }

        if (isset($this->questions[221]['actionable_disclosure_5_1']) && $this->questions[221]['actionable_disclosure_5_1'] === 'Yes') {
            foreach (getYears() as $year) {
                $rules["questions.223.$year"] .= '|lte:questions.222.' . $year;
                $messages["questions.223.$year.lte"] = "This field must be less than or equal to the total in 5.2.";
            }

            foreach (getYears() as $year) {
                $rules["questions.224.$year"] .= '|lte:questions.222.' . $year;
                $messages["questions.224.$year.lte"] = "This field must be less than or equal to the total in 5.2.";
            }

            foreach (getYears() as $year) {
                $rules["questions.225.$year"] .= '|lte:questions.222.' . $year;
                $messages["questions.225.$year.lte"] = "This field must be less than or equal to the total in 5.2.";
            }

            foreach (getYears() as $year) {
                $rules["questions.226.$year"] .= '|lte:questions.222.' . $year;
                $messages["questions.226.$year.lte"] = "This field must be less than or equal to the total in 5.2.";
            }

            foreach (getYears() as $year) {
                $rules["questions.227.$year"] = 'required';
                $messages["questions.227.$year.required"] = "This field is required.";
            }            

            foreach (getYears() as $year) {
                $rules["questions.228.$year"] .= '|lte:questions.227.' . $year;
                $messages["questions.228.$year.lte"] = "This field must be less than or equal to the total in 5.3.";
            }

            $rules["questions.$questionId.actionable_disclosure_5_9"] = 'required';
            $messages["questions.$questionId.actionable_disclosure_5_9.required"] = "This field is required.";
        }                
        $questionId++;

        if (isset($this->questions[235]['actionable_disclosure_5_9']) && $this->questions[235]['actionable_disclosure_5_9'] === 'Yes') {

            if(isset($this->questions[$questionId])){
                $this->questions[$questionId] = str_replace(",", "", $this->questions[$questionId]);
            }

            $rules["questions.$questionId"] = 'required';
            $messages["questions.$questionId.required"] = "This field is required.";          
        }      
        $questionId++;

        for ($i = 237; $i <= 243; $i++) {
            foreach (getYears() as $year){

                if(isset($this->questions[$i][$year])){
                    $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                }

                if (isset($this->questions[235]['actionable_disclosure_5_9']) && $this->questions[235]['actionable_disclosure_5_9'] === 'Yes') {
                    $rules["questions.$i.$year"] = 'required';
                    $messages["questions.$i.$year.required"] = "This field is required.";

                    $rules["questions.$i.$year"] .= '|lte:questions.236';
                    $messages["questions.$i.$year.lte"] = "This field must be less than or equal to the total in 5.10.";
                }
            }
            $questionId++;            
        }

        $rules["questions.$questionId.actionable_disclosure_5_14"] = 'required';
        $messages["questions.$questionId.actionable_disclosure_5_14.required"] = "This field is required.";                
        $questionId++;

        for ($i = 245; $i <= 248; $i++) {
            foreach (getYears() as $year){

                if(isset($this->questions[$i][$year])){
                    $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                }
                
                $rules["questions.$i.$year"] = 'required_if:questions.244.actionable_disclosure_5_14,Yes';
                $messages["questions.$questionId.$year.required_if"] = "This field is required.";

                if (isset($this->questions[244]['actionable_disclosure_5_14']) && $this->questions[244]['actionable_disclosure_5_14'] === 'Yes') {
                    if ($i == 246) {
                        $rules["questions.$i.$year"] .= '|lte:questions.245.' . $year;
                        $messages["questions.$i.$year.lte"] = "This field must be less than or equal to the total in 5.15.";
                    }

                    if ($i == 247) {
                        $rules["questions.$i.$year"] .= '|lte:questions.245.' . $year;
                        $messages["questions.$i.$year.lte"] = "This field must be less than or equal to the total in 5.15.";
                    }

                    if ($i == 248) {
                        $rules["questions.$i.$year"] .= '|lte:questions.245.' . $year;
                        $messages["questions.$i.$year.lte"] = "This field must be less than or equal to the total in 5.15.";
                    }
                }                
            }
            $questionId++;            
        }

        if (in_array($this->submit_type, [1, 3])) {
            $rSectionId = 8;
            $this->validate($rules, $messages);

            updateOrCreateInstitutionSection(7,$this->submit_type);

        } else if (in_array($this->submit_type, [2])) {
            try {
                updateOrCreateInstitutionSection(7,$this->submit_type);
                $this->validate($rules, $messages);
            } catch (ValidationException $e) {
                deleteInstitutionSection(7);
            }
            
            $rSectionId = $this->submit_type == 2 ? 7 : 8;
        }

        if (isset($this->questions) && !empty($this->questions)) {

            for ($i = 222; $i <= 234; $i++) {
                if (isset($this->questions[221]['actionable_disclosure_5_1']) && $this->questions[221]['actionable_disclosure_5_1'] === 'Yes') {
                    if (isset($this->questions[$i])) {
                        foreach (getYears() as $year) {
                            if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                                $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                            }
                        }
                    }
                }
            }

            if (isset($this->questions[221]['actionable_disclosure_5_1']) && $this->questions[221]['actionable_disclosure_5_1'] === 'Yes') {
                if (isset($this->questions[236])) {
                    $this->questions[236] = number_format($this->questions[236]);
                }
            }

            for ($i = 237; $i <= 243; $i++) {
                if (isset($this->questions[235]['actionable_disclosure_5_9']) && $this->questions[235]['actionable_disclosure_5_9'] === 'Yes') {
                    if (isset($this->questions[$i])) {
                        foreach (getYears() as $year) {
                            if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                                $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                            }
                        }
                    }
                }
            }

            for ($i = 245; $i <= 248; $i++) {
                if (isset($this->questions[244]['actionable_disclosure_5_14']) && $this->questions[244]['actionable_disclosure_5_14'] === 'Yes') {
                    if (isset($this->questions[$i])) {
                        foreach (getYears() as $year) {
                            if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                                $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                            }
                        }
                    }
                }
            }

            foreach ($this->questions as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                $record = QuestionAnswer::where('section_id', 7)
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
                        'section_id' => 7,
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
        return view('livewire.questionnaires.sections.section-five-form');
    }
}
