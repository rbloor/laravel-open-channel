<?php

namespace App\Http\Livewire\Admin;

use App\Models\Feedback;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Feedbacks extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public $subject;
    public $message;
    public $deleteId;
    public $showModal = false;
    public $deleteModal = false;

    public function render()
    {
        $this->authorize('viewAny', Feedback::class);
        $feedbacks = Feedback::latest()->paginate(8);
        return view('livewire.admin.feedbacks', compact('feedbacks'));
    }

    public function show(Feedback $feedback)
    {
        $this->authorize('view', $feedback);
        $this->subject = $feedback->subject;
        $this->message = $feedback->message;
        $this->showModal = true;
    }

    public function confirmDelete(Feedback $feedback)
    {
        $this->authorize('delete', $feedback);
        $this->deleteModal = true;
        $this->deleteId = $feedback->id;
    }

    public function delete()
    {
        $feedback = Feedback::findOrFail($this->deleteId);
        $this->authorize('delete', $feedback);
        $feedback->delete();
        $this->deleteModal = false;
        $this->deleteId = null;
        session()->flash('message', 'Feedback Deleted Successfully');
        return redirect()->route('admin.feedback.index');
    }
}
