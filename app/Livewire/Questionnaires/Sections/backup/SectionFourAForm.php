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

class SectionFourAForm extends Component
{
    public $yesNo, $questions, $optionsList, $licencesList, $southAfricaList, $foreignJurisdictionList, $assignmentsList, $ipTransationsList, $actionableDisclosuresIplist, $licenseAssignmentList, $ipTransactionRevnueList, $benefitShareList, $randValuesList, $submit_type, $completedStatus;

    public function mount(){
        $this->yesNo = Common::$yes_no;
        $this->optionsList = Common::getOptions();
        $this->licencesList = Common::getLicences();
        $this->southAfricaList = Common::getSouthAfricaData();
        $this->foreignJurisdictionList = Common::getForeignJurisdiction();
        $this->assignmentsList = Common::getAssignments();
        $this->ipTransationsList = Common::getIpTransations();
        $this->actionableDisclosuresIplist = Common::getActionableDisclosuresIp();
        $this->licenseAssignmentList = Common::getLicenseAssignment();
        $this->ipTransactionRevnueList = Common::getIpTransactionRevnue();
        $this->benefitShareList = Common::getBenefitShare();
        $this->randValuesList = Common::getRandValues();
        $this->questions = getSectionWiseFormData(5);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 5)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function setSubmitType($type){
        $this->submit_type = $type;
        $this->store();
    }

    public function store(){

        $rules = $messages = [];

        $questionId = 181;

        $rules["questions.$questionId.ip_transactions_4_1"] = 'required';
        $messages["questions.$questionId.ip_transactions_4_1.required"] = "This field is required.";                
        $questionId++;

        for ($i = 182; $i <= 200; $i++) {
            foreach (getYears() as $year){


                if(isset($this->questions[$i][$year])){
                    $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                }

                $rules["questions.$i.$year"] = 'required_if:questions.181.ip_transactions_4_1,Yes';
                $messages["questions.$i.$year.required_if"] = "This field is required.";

                if (in_array($i, [197,198.199,200])){
                    $rules["questions.$questionId.$year"] .= '|lte:questions.196.' . $year;
                    $messages["questions.$questionId.$year.lte"] = "This field must be less than or equal to the 4.5.1.";
                }
            }
            $questionId++;            
        }

        $rules["questions.184.$year"] = 'required_if:questions.181.ip_transactions_4_1,Yes';
        $messages["questions.184.$year.required_if"] = "This field is required.";

        if (isset($this->questions[181]['ip_transactions_4_1']) && $this->questions[181]['ip_transactions_4_1'] === 'Yes') {
            foreach (getYears() as $year) {
                $rules["questions.185.$year"] .= '|lte:questions.184.' . $year;
                $messages["questions.185.$year.lte"] = "This field must be less than or equal to the total in 4.3.2.";
            }

            foreach (getYears() as $year) {
                $rules["questions.186.$year"] .= '|lte:questions.185.' . $year;
                $messages["questions.186.$year.lte"] = "This field must be less than or equal to the total in 4.3.2.1.";
            }
        }

        $rules["questions.187.$year"] = 'required_if:questions.181.ip_transactions_4_1,Yes';
        $messages["questions.187.$year.required_if"] = "This field is required.";

        if (isset($this->questions[181]['ip_transactions_4_1']) && $this->questions[181]['ip_transactions_4_1'] === 'Yes') {
            foreach (getYears() as $year) {
                $rules["questions.188.$year"] .= '|lte:questions.187.' . $year;
                $messages["questions.188.$year.lte"] = "This field must be less than or equal to the total in 4.3.2.2.";
            }
        }

        $rules["questions.189.$year"] = 'required_if:questions.181.ip_transactions_4_1,Yes';
        $messages["questions.189.$year.required_if"] = "This field is required.";

        if (isset($this->questions[181]['ip_transactions_4_1']) && $this->questions[181]['ip_transactions_4_1'] === 'Yes') {
            foreach (getYears() as $year) {
                $rules["questions.190.$year"] .= '|lte:questions.189.' . $year;
                $messages["questions.190.$year.lte"] = "This field must be less than or equal to the total in 4.3.3.";
            }
        }

        if (isset($this->questions[181]['ip_transactions_4_1']) && $this->questions[181]['ip_transactions_4_1'] === 'Yes') {
            foreach (getYears() as $year) {
                $rules["questions.191.$year"] .= '|lte:questions.190.' . $year;
                $messages["questions.191.$year.lte"] = "This field must be less than or equal to the total in 4.3.3.1.";
            }
        }

        $rules["questions.192.$year"] = 'required_if:questions.181.ip_transactions_4_1,Yes';
        $messages["questions.192.$year.required_if"] = "This field is required.";

        if (isset($this->questions[181]['ip_transactions_4_1']) && $this->questions[181]['ip_transactions_4_1'] === 'Yes') {
            foreach (getYears() as $year) {
                $rules["questions.193.$year"] .= '|lte:questions.192.' . $year;
                $messages["questions.193.$year.lte"] = "This field must be less than or equal to the total in 4.3.3.2.";
            }
        }

        $rules["questions.194.$year"] = 'required_if:questions.181.ip_transactions_4_1,Yes';
        $messages["questions.194.$year.required_if"] = "This field is required.";

        if (isset($this->questions[181]['ip_transactions_4_1']) && $this->questions[181]['ip_transactions_4_1'] === 'Yes') {
            foreach (getYears() as $year) {
                $rules["questions.195.$year"] .= '|lte:questions.194.' . $year;
                $messages["questions.195.$year.lte"] = "This field must be less than or equal to the total in 4.4.1.";
            }
        }

        $rules["questions.$questionId.ip_transactions_4_5"] = 'required_if:questions.181.ip_transactions_4_1,Yes';
        $messages["questions.$questionId.ip_transactions_4_5.required_if"] = "This field is required.";                
        $questionId++;

        if (isset($this->questions[201]['ip_transactions_4_5']) && $this->questions[201]['ip_transactions_4_5'] === 'Yes') {

            for ($i = 202; $i <= 204; $i++) {
                $rules["questions.$i"] = 'required_if:questions.201.ip_transactions_4_5,Yes';
                $messages["questions.$i.required_if"] = "This field is required.";
                $questionId++;            
            }

            /*$rules["questions.$questionId.actionable_disclosures_4_7"] = 'required';
            $messages["questions.$questionId.actionable_disclosures_4_7.required"] = "This field is required.";*/                
            $questionId++;

            $extQuestionId = 262;
            $rules["questions.$extQuestionId.actionable_disclosures_4_7_1"] = 'required';
            $messages["questions.$extQuestionId.actionable_disclosures_4_7_1.required"] = "This field is required.";                
            $extQuestionId++;

            $rules["questions.$extQuestionId.actionable_disclosures_4_7_2"] = 'required';
            $messages["questions.$extQuestionId.actionable_disclosures_4_7_2.required"] = "This field is required.";                
            $extQuestionId++;
        } else {
            $questionId = 206;
        }

        $rules["questions.$questionId.ip_transactions_4_8"] = 'required';
        $messages["questions.$questionId.ip_transactions_4_8.required"] = "This field is required.";                
        $questionId++;

        for ($i = 207; $i <= 211; $i++) {
            foreach (getYears() as $year){
                $rules["questions.$i.$year"] = 'required_if:questions.206.ip_transactions_4_8,Yes';
                $messages["questions.$i.$year.required_if"] = "This field is required.";
            }
            $questionId++;            
        }

        $questionId++;

        foreach (getYears() as $year){
            for ($i = 1; $i <= 6; $i++) {
                $rules["questions.212.$year.column_$i"] = 'required';
                $messages["questions.212.$year.column_$i"] = "This field is required.";
            }
        }
        $questionId++;

        for ($i = 213; $i <= 215; $i++) {
            foreach (getYears() as $year){
                $rules["questions.$i.$year"] = 'required';
                $messages["questions.$i.$year.required"] = "This field is required.";
            }
            $questionId++;            
        }

        if (in_array($this->submit_type, [1, 3])) {
            $rSectionId = 6;         
            $this->validate($rules, $messages);

            updateOrCreateInstitutionSection(5,$this->submit_type);

        } else if (in_array($this->submit_type, [2])) {
            try {
                updateOrCreateInstitutionSection(5,$this->submit_type);
                $this->validate($rules, $messages);
            } catch (ValidationException $e) {
                deleteInstitutionSection(5);
            }
            
            $rSectionId = $this->submit_type == 2 ? 5 : 6;
        }

        if (isset($this->questions) && !empty($this->questions)) {

            for ($i = 182; $i <= 200; $i++) {
                if (isset($this->questions[$i])) {
                    foreach (getYears() as $year) {
                        if (isset($this->questions[$i][$year])) {
                            $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                        }
                    }
                }
            }

            foreach ($this->questions as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                $record = QuestionAnswer::where('section_id', 5)
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
                        'section_id' => 5,
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

    public function getRowTotal($questionId, $year){
        $row = $this->questions[$questionId][$year];
        return $row['column_1'] + $row['column_2'] + $row['column_3'] + $row['column_4'] + $row['column_5'] + $row['column_6'];
    }

    public function updateTotal($questionId, $year){
        $total = 0;
        if (isset($this->questions[$questionId][$year])) {
            for ($i = 2; $i <= 6; $i++) {
                if (isset($this->questions[$questionId][$year]['column_' . $i])) {
                    $value = str_replace(',', '', $this->questions[$questionId][$year]['column_' . $i] ?? 0);
                    $total += (float) $value;
                }   
            }
        }

        $this->questions[$questionId][$year]['column_1'] = number_format($total, 0, '.', ',');
    }

    public function updateIpTransactionTotal($yearValue){
        $ipTransactions = 0;
        for ($i = 197; $i <= 200; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $ipTransactions += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[196][$yearValue] = number_format($ipTransactions, 0, '.', ',');
    }

    public function updateBenifitShareTotal($yearValue){
        $ipTransactions = 0;
        for ($i = 213; $i <= 214; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $ipTransactions += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[215][$yearValue] = number_format($ipTransactions, 0, '.', ',');
    }

    public function updateRevenueTotal($yearValue){

        $revenue = 0;
        for ($i = 208; $i <= 211; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $revenue += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[207][$yearValue] = number_format($revenue, 0, '.', ',');
    }

    public function updateIpTransactionTotalNew($yearValue){
        $ipTransactions = 0;

        $fieldArray = [186,188,191,193,195];

        foreach ($fieldArray as $key => $value) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $ipTransactions += floatval(str_replace(',', '', ($this->questions[$value][$year]) ?? 0));
                }
            }
        }
        $this->questions[196][$yearValue] = number_format($ipTransactions, 0, '.', ',');
    }

    public function render(){
        return view('livewire.questionnaires.sections.section-four-a-form');
    }
}
