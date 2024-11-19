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

class SectionFourBForm extends Component
{
    public $yesNo, $questions, $nonIprActActLicencesList, $nonIprActActAssignmentsList, $nonIprActActTransactionList, $randValuesIpTransaTwoList, $submit_type, $completedStatus;

    public function mount(){
        $this->yesNo = Common::$yes_no;
        $this->nonIprActActLicencesList = Common::getNonIprActActLicences();
        $this->nonIprActActAssignmentsList = Common::getNonIprActActAssignments();
        $this->nonIprActActTransactionList = Common::getNonIprActActTransaction();
        $this->randValuesIpTransaTwoList = Common::getRandValuesIpTransaTwo();
        $this->questions = getSectionWiseFormData(6);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 6)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function setSubmitType($type){
        $this->submit_type = $type;
        $this->store();
    }

    public function store(){


        $rules = $messages = [];

        $questionId = 216;
        
        $rules["questions.$questionId.ip_transaction_4_12"] = 'required|in:Yes,No';
        $messages["questions.$questionId.ip_transaction_4_12.required"] = 'This field is required.';
        $questionId++;

        if (isset($this->questions[216]['ip_transaction_4_12']) && $this->questions[216]['ip_transaction_4_12'] === 'Yes') {
        
            for ($i = 217; $i <= 219; $i++) {
                foreach (getYears() as $year){
                    $rules["questions.$questionId.$year"] = 'required_if:questions.216.ip_transaction_4_12,Yes';
                    $messages["questions.$questionId.$year.required_if"] = "This field is required.";
                }
                $questionId++;
            }

            foreach (getYears() as $year){
                for ($i = 1; $i <= 6; $i++) {
                    $rules["questions.$questionId.$year.column_$i"] = 'required';
                    $messages["questions.$questionId.$year.column_$i"] = "This field is required.";
                }
            }
            $questionId++;
        }

        if (in_array($this->submit_type, [1, 3])) {
            $rSectionId = 7;
            $this->validate($rules, $messages);

            updateOrCreateInstitutionSection(6,$this->submit_type);

        } else if (in_array($this->submit_type, [2])) {
            try {
                updateOrCreateInstitutionSection(6,$this->submit_type);
                $this->validate($rules, $messages);
            } catch (ValidationException $e) {
                deleteInstitutionSection(6);
            }
            
            $rSectionId = $this->submit_type == 2 ? 6 : 7;
        }

        if (isset($this->questions) && !empty($this->questions)) {
            foreach ($this->questions as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                $record = QuestionAnswer::where('section_id', 6)
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
                        'section_id' => 6,
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

    public function updateTotal($questionId, $year)
    {
        $total = 0;
        if (isset($this->questions[$questionId][$year])) {
            for ($i = 2; $i <= 6; $i++) {
                $value = str_replace(',', '', $this->questions[$questionId][$year]['column_' . $i] ?? 0);
                $total += (float) $value;
            }
        }

        $this->questions[$questionId][$year]['column_1'] = number_format($total, 0, '.', ',');
    }

    public function render(){
        return view('livewire.questionnaires.sections.section-four-b-form');
    }
}
