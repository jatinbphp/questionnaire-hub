<?php

namespace App\Livewire\Reporting\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;

class SectionCompleted extends Component
{
    public function mount(){
    }

    public function render()
    {
        return view('livewire.reporting.sections.section-completed');
    }
}
