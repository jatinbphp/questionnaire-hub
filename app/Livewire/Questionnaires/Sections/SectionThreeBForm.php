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

class SectionThreeBForm extends Component
{

    public $yesNo, $questions, $nonIprActDisclosuresList, $nonIprActNewPatentList, $patentApplicationsReasonsList, $nonPatentsGrantedList, $nonPatentFamilyList, $nonSingleJurisdictionPatents, $nonTradeMarkPortfolioList, $productServicesList, $plantBreedersIprActList, $submit_type, $completedStatus;

    public function mount(){
        $this->yesNo = Common::$yes_no;
        $this->nonIprActDisclosuresList = Common::getNonIprActDisclosures();
        $this->nonIprActNewPatentList = Common::getNonIprActNewPatent();
        $this->patentApplicationsReasonsList = Common::getPatentApplicationsReasons();
        $this->nonPatentsGrantedList = Common::getNonPatentsGranted();
        $this->nonPatentFamilyList = Common::getNonPatentFamily();
        $this->nonSingleJurisdictionPatents = Common::getNonSingleJurisdictionPatents();
        $this->nonTradeMarkPortfolioList = Common::getNonTradeMarkPortfolio();
        $this->productServicesList = Common::getProductServices();
        $this->plantBreedersIprActList = Common::getPlantBreedersIprAct();
        $this->questions = getSectionWiseFormData(4);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 4)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';

        for ($i = 150; $i <= 164; $i++) {
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

        $questionId = 130;

        $rules["questions.$questionId.ipr_act"] = 'required|in:Yes,No';
        $messages["questions.$questionId.ipr_act.required"] = 'This field is required.';
        $questionId++;

        if (isset($this->questions[130]['ipr_act']) && $this->questions[130]['ipr_act'] === 'Yes') {

            for ($i = 131; $i <= 135; $i++) {
                foreach (getYears() as $year){
                    $rules["questions.$i.$year"] = 'required_if:questions.130.ipr_act,Yes';
                    $messages["questions.$i.$year.required_if"] = "This field is required.";
                }
                $questionId++;
            }

            $rules["questions.$questionId.non_patent_portfolio"] = 'required|in:Yes,No';
            $messages["questions.$questionId.non_patent_portfolio.required"] = 'This field is required.';
            $questionId++;

            if (isset($this->questions[136]['non_patent_portfolio']) && $this->questions[136]['non_patent_portfolio'] === 'Yes') {

                $rules["questions.$questionId.non_patent_applications"] = 'required_if:questions.136.non_patent_portfolio,Yes';
                $messages["questions.$questionId.non_patent_applications.required_if"] = 'This field is required.';
                $questionId++;

                for ($i = 138; $i <= 141; $i++) {
                    foreach (getYears() as $year){

                        if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                            $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                        }

                        if (isset($this->questions[137]['non_patent_applications']) && $this->questions[137]['non_patent_applications'] === 'Yes') {
                            $rules["questions.$questionId.$year"] = 'required_if:questions.137.non_patent_applications,Yes';

                            if ($i != 138) {
                                $rules["questions.$questionId.$year"] .= '|lte:questions.138.' . $year;
                            }

                            $messages["questions.$questionId.$year.required_if"] = "This field is required.";

                            $messages["questions.$questionId.$year.required_if"] = "This field is required.";
                        }
                    }
                    $questionId++;
                }

                $rules["questions.$questionId.institution_abandoned"] = 'required_if:questions.136.non_patent_portfolio,Yes';
                $messages["questions.$questionId.institution_abandoned.required_if"] = 'This field is required.';
                $questionId++;

                for ($i = 143; $i <= 148; $i++) {
                    if (isset($this->questions[142]['institution_abandoned']) && $this->questions[142]['institution_abandoned'] === 'Yes') {
                        $rules["questions.$questionId"] = 'required_if:questions.142.institution_abandoned,Yes';
                        $messages["questions.$questionId.required_if"] = "This field is required.";
                    }
                    $questionId++;
                }

                $rules["questions.$questionId.non_granted_patent_applications"] = 'required|in:Yes,No';
                $messages["questions.$questionId.non_granted_patent_applications.required"] = 'This field is required.';
                $questionId++;

                for ($i = 150; $i <= 164; $i++) {
                    foreach (getYears() as $year){
                        $rules["questions.$questionId.$year"] = 'required_if:questions.149.non_granted_patent_applications,Yes';
                        $messages["questions.$questionId.$year.required_if"] = "This field is required.";
                    }
                    $questionId++;
                }

                for ($i = 165; $i <= 166; $i++) {
                    foreach (getYears() as $year){
                        $rules["questions.$i.$year"] = 'required';
                        $messages["questions.$i.$year.required"] = "This field is required.";
                    }
                    $questionId++;
                }
            } else {
                $questionId=167;
            }

            $rules["questions.$questionId.ipr_act_trademark_portfolio"] = 'required|in:Yes,No';
            $messages["questions.$questionId.ipr_act_trademark_portfolio.required"] = 'This field is required.';
            $questionId++;

            for ($i = 168; $i <= 171; $i++) {
                foreach (getYears() as $year) {

                    if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                        $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                    }
                    
                    if (isset($this->questions[167]['ipr_act_trademark_portfolio']) && $this->questions[167]['ipr_act_trademark_portfolio'] === 'Yes') {
                        $rules["questions.$i.$year"] = 'required_if:questions.167.ipr_act_trademark_portfolio,Yes';
                        $messages["questions.$i.$year.required_if"] = "This field is required.";

                        if ($i == 170) {
                            $rules["questions.$i.$year"] .= '|lte:questions.169.' . $year;
                            $messages["questions.$i.$year.lte"] = "This field must be less than or equal to the total number of granted trademarks (3.13.2).";
                        }
                    }
                }
                $questionId++;
            }


            $rules["questions.$questionId.ipr_act_design_portfolio"] = 'required|in:Yes,No';
            $messages["questions.$questionId.ipr_act_design_portfolio.required"] = 'This field is required.';
            $questionId++;

            for ($i = 173; $i <= 176; $i++) {
                if ($i != 175) {
                    foreach (getYears() as $year) {

                        if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                            $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                        }

                        if (isset($this->questions[172]['ipr_act_design_portfolio']) && $this->questions[172]['ipr_act_design_portfolio'] === 'Yes') {
                            $rules["questions.$questionId.$year"] = 'required_if:questions.172.ipr_act_design_portfolio,Yes';
                            $messages["questions.$questionId.$year.required_if"] = "This field is required.";

                            if ($i == 176) {
                                $rules["questions.$questionId.$year"] .= '|lte:questions.174.' . $year;
                                $messages["questions.$questionId.$year.lte"] = "This field must be less than or equal to the total number of granted designs (3.14.2).";
                            }
                        }
                    }
                }
                $questionId++;
            }


            $rules["questions.$questionId.ipr_act_rights_portfolio"] = 'required|in:Yes,No';
            $messages["questions.$questionId.ipr_act_rights_portfolio.required"] = 'This field is required.';
            $questionId++;

            for ($i = 178; $i <= 180; $i++) {
                foreach (getYears() as $year) {

                    if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                        $this->questions[$i][$year] = str_replace(",", "", $this->questions[$i][$year]);
                    }

                    if (isset($this->questions[177]['ipr_act_rights_portfolio']) && $this->questions[177]['ipr_act_rights_portfolio'] === 'Yes') {
                        $rules["questions.$questionId.$year"] = 'required_if:questions.177.ipr_act_rights_portfolio,Yes';
                        $messages["questions.$questionId.$year.required_if"] = "This field is required.";
                    
                        if ($i == 180) {
                            $rules["questions.$questionId.$year"] .= '|lte:questions.179.' . $year;
                            $messages["questions.$questionId.$year.lte"] = "This field must be less than or equal to the total number of granted rights (3.15.2).";
                        }
                    }
                }
                $questionId++;
            }

        }        

        if (in_array($this->submit_type, [1, 3])) {
            $rSectionId = 5;
            $this->validate($rules, $messages);

            updateOrCreateInstitutionSection(4,$this->submit_type);

        } else if (in_array($this->submit_type, [2])) {
            try {
                updateOrCreateInstitutionSection(4,$this->submit_type);
                $this->validate($rules, $messages);
            } catch (ValidationException $e) {
                deleteInstitutionSection(4);
            }
            
            $rSectionId = $this->submit_type == 2 ? 4 : 5;
        }

        if (isset($this->questions) && !empty($this->questions)) {

            if (isset($this->questions[130]['ipr_act']) && $this->questions[130]['ipr_act'] === 'Yes') {

                if (isset($this->questions[136]['non_patent_portfolio']) && $this->questions[136]['non_patent_portfolio'] === 'Yes') {
                    for ($i = 138; $i <= 141; $i++) {
                        if (isset($this->questions[$i]) && !empty($this->questions[$i])) {
                            foreach (getYears() as $year) {
                                if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                                    $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                                }
                            }
                        }
                    }
                }

                for ($i = 168; $i <= 171; $i++) {
                    if (isset($this->questions[$i]) && !empty($this->questions[$i])) {
                        foreach (getYears() as $year) {
                            if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                                $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                            }
                        }
                    }
                }

                for ($i = 173; $i <= 176; $i++) {
                    if ($i != 175) {
                        if (isset($this->questions[$i]) && !empty($this->questions[$i])) {
                            foreach (getYears() as $year) {
                                if (isset($this->questions[$i][$year]) && !empty($this->questions[$i][$year])) {
                                    $this->questions[$i][$year] = number_format($this->questions[$i][$year]);
                                }
                            }
                        }
                    }
                }

                for ($i = 178; $i <= 180; $i++) {
                    if (isset($this->questions[$i]) && !empty($this->questions[$i])) {
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

                $record = QuestionAnswer::where('section_id', 4)
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
                        'section_id' => 4,
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

    public function updatePatentsGrantedTotal($yearValue){
        $patentPortfolio = 0;
        for ($i = 151; $i <= 164; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $patentPortfolio += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[150][$yearValue] = number_format($patentPortfolio, 0, '.', ',');
    }

    public function updateNonIprActDisclosuresTotal($yearValue){
        $patentPortfolio = 0;
        for ($i = 132; $i <= 135; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $patentPortfolio += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[131][$yearValue] = number_format($patentPortfolio, 0, '.', ',');
    }

    public function updateNonIprActNewPatentApplicationsTotal($yearValue){
        $patentPortfolio = 0;
        for ($i = 139; $i <= 141; $i++) {
            foreach (getYears() as $year){
                if($year==$yearValue){
                    $patentPortfolio += floatval(str_replace(',', '', ($this->questions[$i][$year]) ?? 0));
                }
            }
        }
        $this->questions[138][$yearValue] = number_format($patentPortfolio, 0, '.', ',');
    }

    public function render(){
        return view('livewire.questionnaires.sections.section-three-b-form');
    }
}
