<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class SectionSixForm extends Component
{
    use WithFileUploads;

    public $questions, $submit_type, $institutionId, $completedStatus;
    public $currentImage = 'assets/dist/img/no-image.png'; // Placeholder

    public function mount($institutionId){
        $this->questions = getSectionWiseFormData(8, $institutionId);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', $institutionId)->where('section_id', 8)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function render(){
        return view('livewire.reporting.sections.section-six-form');
    }
}
