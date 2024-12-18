<?php

namespace App\Livewire\AdvanceStats\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionFiveForm extends Component
{

    public $yes_no, $questions, $nonActionableDisclosureList, $revenueList, $revenueReceivedList, $nonIprActActionableDisclosuresList, $nonIprActActionableDisclosuresSecondList, $runnningRoyaltiesList, $totalAnnualRevenueType, $institutionId, $completedStatus;

    public function mount(){
        $this->yes_no = Common::$yes_no;
        $this->nonActionableDisclosureList = Common::getNonActionableDisclosure();
        $this->revenueList = Common::getRevenueData();
        $this->revenueReceivedList = Common::getRevenueReceived();
        $this->nonIprActActionableDisclosuresList = Common::getNonIprActActionableDisclosuresFirst();
        $this->nonIprActActionableDisclosuresSecondList = Common::getNonIprActActionableDisclosuresSecond();
        $this->runnningRoyaltiesList = Common::getRunnningRoyalties();
        $this->totalAnnualRevenueType = Common::$getTotalAnnualRevenueType;
        $this->questions = getSectionWiseData(7);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 7)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function render()
    {
        return view('livewire.advance-stats.sections.section-five-form');
    }
}
