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

class SectionThreeAForm extends Component
{
    public $yesNo, $questions, $actionableDisclosuresList, $patentPortfolioList, $patentApplicationsReasonsList, $patentsGrantedList, $patentFamilyList, $singleJurisdictionPatentsList, $tradeMarkPortfolioList, $designPortfolioList, $plantBreedersList, $submit_type, $completedStatus;

    public function mount(){
        $this->yesNo = Common::$yes_no;
        $this->actionableDisclosuresList = Common::getActionableDisclosures();
        $this->patentPortfolioList = Common::getPatentPortfolio();
        $this->patentApplicationsReasonsList = Common::getPatentApplicationsReasons();
        $this->patentsGrantedList = Common::getPatentsGranted();
        $this->patentFamilyList = Common::getPatentFamily();
        $this->singleJurisdictionPatentsList = Common::getSingleJurisdictionPatents();
        $this->tradeMarkPortfolioList = Common::getTradeMarkPortfolio();
        $this->designPortfolioList = Common::getDesignPortfolio();
        $this->plantBreedersList = Common::getPlantBreeders();
        $this->questions = getSectionWiseFormData(3);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 3)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';

        for ($i = 101; $i <= 114; $i++) {
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
        $questionId = 86;

        for ($i = 86; $i <= 87; $i++) {
            foreach (getYears() as $year){
                $rules["questions.$i.$year"] = 'required';
                $messages["questions.$i.$year.required"] = "This field is required.";
            }
            $questionId++;
        }

        $rules["questions.$questionId.patent_portfolio"] = 'required|in:Yes,No';
        $messages["questions.$questionId.patent_portfolio.required"] = 'This field is required.';
        $questionId++;

        for ($i = 89; $i <= 92; $i++) {
            foreach (getYears() as $year){

                if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                    $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                }

                $rules["questions.$questionId.$year"] = 'required_if:questions.88.patent_portfolio,Yes';
                $messages["questions.$questionId.$year.required_if"] = "This field is required.";

                if (isset($this->questions[88]['patent_portfolio']) && $this->questions[88]['patent_portfolio'] === 'Yes') {
                    if ($i != 89) {
                        $rules["questions.$questionId.$year"] .= '|lte:questions.89.' . $year;
                        $messages["questions.$questionId.$year.lte"] = "This field must be less than or equal to the total number of granted trade marks (3.1.1).";
                    }
                }

                $messages["questions.$questionId.$year.required_if"] = "This field is required.";
            }
            $questionId++;
        }

        $rules["questions.$questionId.patent_applications"] = 'required|in:Yes,No';
        $messages["questions.$questionId.patent_applications.required"] = 'This field is required.';
        $questionId++;

        for ($i = 94; $i <= 99; $i++) {
            $rules["questions.$questionId"] = 'required_if:questions.93.patent_applications,Yes';
            $messages["questions.$questionId.required_if"] = "This field is required.";
            $questionId++;
        }

        for ($i = 100; $i <= 116; $i++) {
            foreach (getYears() as $year){
                $rules["questions.$i.$year"] = 'required';
                $messages["questions.$i.$year.required"] = "This field is required.";
            }
            $questionId++;
        }

        $rules["questions.$questionId.trademark_portfolio"] = 'required|in:Yes,No';
        $messages["questions.$questionId.trademark_portfolio.required"] = 'This field is required.';
        $questionId++;

        for ($i = 118; $i <= 121; $i++) {
            foreach (getYears() as $year) {
                if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                    $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                }

                $rules["questions.$questionId.$year"] = 'required_if:questions.117.trademark_portfolio,Yes';
                $messages["questions.$questionId.$year.required_if"] = "This field is required.";

                if (isset($this->questions[117]['trademark_portfolio']) && $this->questions[117]['trademark_portfolio'] === 'Yes') {
                    if ($i == 120) {
                        $rules["questions.$questionId.$year"] .= '|lte:questions.119.' . $year;
                        $messages["questions.$questionId.$year.lte"] = "This field must be less than or equal to the total number of granted trade marks (3.3.2).";
                    }
                }
            }
            $questionId++;
        }

        $rules["questions.$questionId.design_portfolio"] = 'required|in:Yes,No';
        $messages["questions.$questionId.design_portfolio.required"] = 'This field is required.';
        $questionId++;

        for ($i = 123; $i <= 125; $i++) {
            foreach (getYears() as $year) {
                if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                    $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                }

                $rules["questions.$questionId.$year"] = 'required_if:questions.122.design_portfolio,Yes';
                $messages["questions.$questionId.$year.required_if"] = "This field is required.";

                if (isset($this->questions[122]['design_portfolio']) && $this->questions[122]['design_portfolio'] === 'Yes') {
                    if ($i == 125) {
                        $rules["questions.$questionId.$year"] .= '|lte:questions.124.' . $year;
                        $messages["questions.$questionId.$year.lte"] = "This field must be less than or equal to the total number of granted designs (3.4.2).";
                    }
                }
            }
            $questionId++;
        }


        $rules["questions.$questionId.rights_portfolio"] = 'required|in:Yes,No';
        $messages["questions.$questionId.rights_portfolio.required"] = 'This field is required.';
        $questionId++;

        for ($i = 127; $i <= 129; $i++) {
            foreach (getYears() as $year) {

                if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                    $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                }
                
                if (isset($this->questions[126]['rights_portfolio']) && $this->questions[126]['rights_portfolio'] === 'Yes') {
                    $rules["questions.$questionId.$year"] = 'required_if:questions.126.rights_portfolio,Yes';
                    $messages["questions.$questionId.$year.required_if"] = "This field is required.";

                    if ($i == 129) {
                        $rules["questions.$questionId.$year"] .= '|lte:questions.128.' . $year;
                        $messages["questions.$questionId.$year.lte"] = "This field must be less than or equal to the total number of granted rights (3.5.2).";
                    }
                }
            }
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

            for ($i = 89; $i <= 92; $i++) {
                if (isset($this->questions[$i]) && !empty($this->questions[$i])) {
                    foreach (getYears() as $year) {
                        if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                            $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                        }
                    }
                }
            }

            for ($i = 118; $i <= 121; $i++) {
                if (isset($this->questions[$i]) && !empty($this->questions[$i])) {
                    foreach (getYears() as $year) {
                        if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                            $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                        }
                    }
                }
            }

            for ($i = 123; $i <= 125; $i++) {
                if (isset($this->questions[$i]) && !empty($this->questions[$i])) {
                    foreach (getYears() as $year) {
                        if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                            $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                        }
                    }
                }
            }

            for ($i = 127; $i <= 129; $i++) {
                if (isset($this->questions[$i]) && !empty($this->questions[$i])) {
                    foreach (getYears() as $year) {
                        if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                            $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                        }
                    }
                }
            }

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

    public function updateParentPortfolioTotal($yearValue){
        $patentPortfolio = 0;
        for ($i = 90; $i <= 92; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $patentPortfolio += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[89][$yearValue] = number_format($patentPortfolio, 0, '.', ',');
    }

    public function updatePatentsGrantedTotal($yearValue){
        $patentPortfolio = 0;
        for ($i = 101; $i <= 114; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $patentPortfolio += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[100][$yearValue] = number_format($patentPortfolio, 0, '.', ',');
    }

    public function render(){
        return view('livewire.questionnaires.sections.section-three-a-form');
    }
}
