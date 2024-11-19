<?php

namespace App\Livewire\Questionnaires\Sections;

use Livewire\Component;
use App\Models\Common;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\Models\InstitutionsCompletedSection;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SectionSixForm extends Component
{
    use WithFileUploads;

    public $questions, $submit_type, $completedStatus;
    public $images = [];
    public $currentImage = 'assets/dist/img/no-image.png'; // Placeholder

    public function mount(){
        $this->questions = getSectionWiseFormData(8);
        $sectionCompleted = InstitutionsCompletedSection::where('institution_id', Auth::user()->institution_id)->where('section_id', 8)->count();
        $this->completedStatus = ($sectionCompleted > 0) ? 'Completed' : 'Pending';
    }

    public function setSubmitType($type){
        $this->submit_type = $type;
        $this->store();
    }

    public function store(){
        $rules = $messages = [];

        for ($i = 249; $i <= 261; $i++) {
            $rules["questions.$i"] = 'required';
            $messages["questions.$i.required"] = "This field is required.";
        }     

        if (in_array($this->submit_type, [1, 3])) {
            $rSectionId = 9;
            $rSectionId = 8;
            $this->validate($rules, $messages);

            updateOrCreateInstitutionSection(8,$this->submit_type);

        } else if (in_array($this->submit_type, [2])) {
            try {
                updateOrCreateInstitutionSection(8,$this->submit_type);
                $this->validate($rules, $messages);
            } catch (ValidationException $e) {
                deleteInstitutionSection(8);
            }
            
            //$rSectionId = $this->submit_type == 2 ? 8 : 9;
            $rSectionId = $this->submit_type == 2 ? 8 : 8;
        }

        if (isset($this->questions) && !empty($this->questions)) {
            foreach ($this->questions as $key => $value) {
                if ($key == 0) {
                    continue;
                }

                $record = QuestionAnswer::where('section_id', 8)
                    ->where('institution_id', Auth::user()->institution_id)
                    ->where('question_id', $key)
                    ->first();

                if (!empty($value) && is_array($value) && $key == 260) {

                    $newImagePaths = [];

                    $existingImages = [];
                    if ($record && !empty($record->answers)) {
                        $existingImages = json_decode($record->answers);
                    }

                    foreach ($value as $image) {
                        if ($image instanceof \Illuminate\Http\UploadedFile) {
                            $imagePath = $image->store('uploads/sections', 'public'); // Store new image
                            $newImagePaths[] = stripslashes($imagePath); // Collect the image paths
                        }                    
                    }                  

                    $value = array_unique(array_merge($existingImages, $newImagePaths));
                }               

                if ($record) {
                    $record->update([
                        'answers' => json_encode($value),
                        'updated_at' => now(), // Optional: Update the timestamp
                    ]);
                } else {
                    QuestionAnswer::create([
                        'section_id' => 8,
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

    public function render()
    {
        return view('livewire.questionnaires.sections.section-six-form');
    }
}
