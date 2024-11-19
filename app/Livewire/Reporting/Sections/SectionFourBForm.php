<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionFourBForm extends Component
{
    public $yesNo, $questions, $nonIprActActLicencesList, $nonIprActActAssignmentsList, $nonIprActActTransactionList, $randValuesIpTransaTwoList, $institutionId, $completedStatus;

    public function mount($institutionId){
        $this->yesNo = Common::$yes_no;
        $this->nonIprActActLicencesList = Common::getNonIprActActLicences();
        $this->nonIprActActAssignmentsList = Common::getNonIprActActAssignments();
        $this->nonIprActActTransactionList = Common::getNonIprActActTransaction();
        $this->randValuesIpTransaTwoList = Common::getRandValuesIpTransaTwo();
        $this->questions = getSectionWiseFormData(6, $institutionId);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 6)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function render(){
        return view('livewire.reporting.sections.section-four-b-form');
    }
}
