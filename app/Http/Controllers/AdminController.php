<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Show the main admin CMS dashboard.
     */
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->all();
        $skills = Skill::orderBy('category')->get();
        $projects = Project::latest()->get();
        $experiences = Experience::orderBy('type')->get();
        $messages = ContactMessage::latest()->get();

        return view('admin.dashboard', compact('settings', 'skills', 'projects', 'experiences', 'messages'));
    }

    /**
     * Update website general settings.
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'hero_badge' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'about_bio_1' => 'required|string',
            'about_bio_2' => 'required|string',
            'stats_experience' => 'required|string|max:50',
            'stats_projects' => 'required|string|max:50',
            'stats_satisfaction' => 'required|string|max:50',
            'profile_photo' => 'nullable|image|max:2048', // max 2MB
        ]);

        $keys = [
            'hero_badge',
            'hero_title',
            'hero_description',
            'about_bio_1',
            'about_bio_2',
            'stats_experience',
            'stats_projects',
            'stats_satisfaction'
        ];

        foreach ($keys as $key) {
            Setting::set($key, $request->input($key));
        }

        // Handle profile photo upload (convert to Base64)
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $base64 = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
            Setting::set('profile_photo', $base64);
        }

        return back()->with('success', 'Pengaturan portofolio berhasil diperbarui.');
    }

    /**
     * Update admin password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui.');
    }

    // --- SKILLS CRUD ---

    public function storeSkill(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:frontend,backend,devops',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        Skill::create($validated);

        return back()->with('success', 'Keahlian berhasil ditambahkan.');
    }

    public function updateSkill(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:frontend,backend,devops',
            'percentage' => 'required|integer|min:0|max:100',
        ]);

        Skill::findOrFail($id)->update($validated);

        return back()->with('success', 'Keahlian berhasil diperbarui.');
    }

    public function deleteSkill($id)
    {
        Skill::findOrFail($id)->delete();
        return back()->with('success', 'Keahlian berhasil dihapus.');
    }

    // --- PROJECTS CRUD ---

    public function storeProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string|max:255',
            'github_url' => 'nullable|string',
            'demo_url' => 'nullable|string',
            'project_image' => 'nullable|image|max:2048',
        ]);

        $project = new Project($validated);

        if ($request->hasFile('project_image')) {
            $file = $request->file('project_image');
            $project->image_base64 = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
        }

        $project->save();

        return back()->with('success', 'Proyek berhasil ditambahkan.');
    }

    public function updateProject(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'required|string|max:255',
            'github_url' => 'nullable|string',
            'demo_url' => 'nullable|string',
            'project_image' => 'nullable|image|max:2048',
        ]);

        $project = Project::findOrFail($id);
        $project->fill($validated);

        if ($request->hasFile('project_image')) {
            $file = $request->file('project_image');
            $project->image_base64 = 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
        }

        $project->save();

        return back()->with('success', 'Proyek berhasil diperbarui.');
    }

    public function deleteProject($id)
    {
        Project::findOrFail($id)->delete();
        return back()->with('success', 'Proyek berhasil dihapus.');
    }

    // --- EXPERIENCES CRUD ---

    public function storeExperience(Request $request)
    {
        $validated = $request->validate([
            'period' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:work,education,certification',
        ]);

        Experience::create($validated);

        return back()->with('success', 'Riwayat berhasil ditambahkan.');
    }

    public function updateExperience(Request $request, $id)
    {
        $validated = $request->validate([
            'period' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:work,education,certification',
        ]);

        Experience::findOrFail($id)->update($validated);

        return back()->with('success', 'Riwayat berhasil diperbarui.');
    }

    public function deleteExperience($id)
    {
        Experience::findOrFail($id)->delete();
        return back()->with('success', 'Riwayat berhasil dihapus.');
    }

    // --- CONTACT MESSAGES DELETE ---

    public function deleteMessage($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return back()->with('success', 'Pesan masuk berhasil dihapus.');
    }
}
