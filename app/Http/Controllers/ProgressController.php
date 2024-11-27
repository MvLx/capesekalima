<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\Content;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $progress = Progress::findOrFail($id);

        if ($progress->enrollment->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this progress.');
        }

        $progress->update([
            'is_completed' => $request->status,
            'completed_at' => $request->status ? now() : null,
        ]);

        return redirect()->back()->with('success', 'Progress updated successfully.');
    }

    public function markAsDone($content_id)
    {
        $content = Content::findOrFail($content_id);
        $enrollment = $content->course->enrollments->where('user_id', auth()->id())->first();

        if (!$enrollment) {
            return redirect()->back()->with('error', 'You are not enrolled in this course.');
        }

        $progress = Progress::firstOrCreate([
            'enrollment_id' => $enrollment->id,
            'content_id' => $content->id,
        ]);

        $progress->update([
            'is_completed' => true,
            'completed_at' => now(),
        ]);

       // Update enrollment progress percentage
       $totalContents = $content->course->contents->count();
       $completedContents = $enrollment->progresses()->where('is_completed', true)->count();
       $enrollment->progress = ($completedContents / $totalContents) * 100;
       $enrollment->save();

       return redirect()->route('contents.view', $content_id)->with('success', 'Content marked as done.');
    }
}
