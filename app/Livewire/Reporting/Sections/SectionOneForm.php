<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionOneForm extends Component
{
    public $policy_guideline, $yes_no, $ip_enablers_share, $appropriate, $questions, $factorsList, $institutionId, $completedStatus;

    public function mount($institutionId){
        $this->policy_guideline = Common::$policy_guideline;
        $this->yes_no = Common::$yes_no;
        $this->ip_enablers_share = Common::$ip_enablers_share;
        $this->appropriate = Common::$appropriate;
        $this->factorsList = Common::getFactors();
        $this->questions = getSectionWiseFormData(1, $institutionId);

        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 1)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function render(){
        return view('livewire.reporting.sections.section-one-form');
    }
}