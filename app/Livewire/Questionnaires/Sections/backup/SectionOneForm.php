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

class SectionOneForm extends Component
{
    public $policy_guideline, $yes_no, $ip_enablers_share, $appropriate, $questions, $factorsList, $submit_type, $completedStatus;

    public function mount(){
        $this->policy_guideline = Common::$policy_guideline;
        $this->yes_no = Common::$yes_no;
        $this->ip_enablers_share = Common::$ip_enablers_share;
        $this->appropriate = Common::$appropriate;
        $this->factorsList = Common::getFactors();
        $this->questions = getSectionWiseFormData(1);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 1)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function setSubmitType($type){
        $this->submit_type = $type;
        $this->store();
    }

    public function store(){

        $rules = $messages = [];
        $rules = [
            "questions.27.revenue" => 'required|in:Yes,No',
            "questions.28.gross_revenue" => 'required_if:questions.27.revenue,Yes',
            "questions.29.nett_revenue" => 'required_if:questions.27.revenue,Yes',

            "questions.30.institution_policy_ip_enablers" => 'required|in:Yes,No',

            "questions.31.provision" => 'required_if:questions.30.institution_policy_ip_enablers,Yes',
            "questions.32.portion_accruing" => 'required_if:questions.30.institution_policy_ip_enablers,Yes',

            "questions.33.company" => 'required',
            "questions.34.ip_transaction" => 'required',
        ];

        $messages = [
            'questions.27.revenue.required' => 'This field is required.',
            'questions.27.revenue.in' => 'Please select a valid option for revenue.',
            'questions.28.gross_revenue.required_if' => 'This field is required.',
            'questions.29.nett_revenue.required_if' => 'This field is required.',

            'questions.30.institution_policy_ip_enablers.required' => 'This field is required.',
            'questions.30.institution_policy_ip_enablers.in' => 'Please select a valid option for revenue.',
            "questions.31.provision.required_if" => 'This field is required.',

            "questions.32.portion_accruing.required_if" => 'This field is required.',
            'questions.33.company.required' => 'This field is required.',
            'questions.34.ip_transaction.required' => 'This field is required.',
        ];

        for ($i = 1; $i <= 16; $i++) {
            $rules["questions.$i.importance"] = 'required|in:1,2,3';
            $rules["questions.$i.present"] = 'required|in:4,5,6';

            $messages["questions.$i.importance.required"] = "This field is required.";
            $messages["questions.$i.importance.in"] = "This field must be one of the following: 1, 2, or 3.";
            
            $messages["questions.$i.present.required"] = "This field is required.";
            $messages["questions.$i.present.in"] = "This field must be one of the following: 4, 5, or 6.";
        }

        for ($i = 17; $i <= 26; $i++) {
            $rules["questions.$i.policy"] = 'required';
            $messages["questions.$i.policy.required"] = "This field is required.";
           
            if (isset($this->questions[$i]['policy']) && in_array($this->questions[$i]['policy'], [1, 2])) {
                $rules["questions.$i.board"] = 'required';
                $rules["questions.$i.broadly"] = 'required';
                $rules["questions.$i.adequate"] = 'required';

                $messages["questions.$i.board.required"] = "This field is required.";
                $messages["questions.$i.broadly.required"] = "This field is required.";
                $messages["questions.$i.adequate.required"] = "This field is required.";
            } else {
                $rules["questions.$i.board"] = 'nullable';
                $rules["questions.$i.broadly"] = 'nullable';
                $rules["questions.$i.adequate"] = 'nullable';
            }
        }

        if (in_array($this->submit_type, [1, 3])) {
            $rSectionId = 2;
            $this->validate($rules, $messages);

            updateOrCreateInstitutionSection(1,$this->submit_type);

        } else if (in_array($this->submit_type, [2])) {
            try {
                updateOrCreateInstitutionSection(1,$this->submit_type);
                $this->validate($rules, $messages);
            } catch (ValidationException $e) {
                deleteInstitutionSection(1);
            }
            
            $rSectionId = $this->submit_type == 2 ? 1 : 2;
        }


        if (isset($this->questions) && !empty($this->questions)) {
            foreach ($this->questions as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                if(empty($value)){
                    InstitutionsCompletedSection::where([
                        'section_id' => 1,
                        'institution_id' => Auth::user()->institution_id,
                    ])->delete();
                }

                $record = QuestionAnswer::where('section_id', 1)
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
                        'section_id' => 1,
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
        return view('livewire.questionnaires.sections.section-one-form');
    }
}