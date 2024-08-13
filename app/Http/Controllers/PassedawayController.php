<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Passedaway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PassedawayController extends Controller
{
    public function index()
    {
        $Passedaway = Passedaway::with("qrcode.qrcode")->where('user_id', auth()->user()->id)->first(); // Assuming there is only one Passedaway or adjust as per your application logic
        if($Passedaway){
            $profile = $Passedaway->toArray();
            $profile['birth_date'] = $Passedaway->getAttributes()['birth_date'];
            $profile['death_date'] = $Passedaway->getAttributes()['death_date'];
        }
        return Inertia::render('Site/PasswayProfile', [
            'profile' => $profile ?? null
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'relationship' => 'required',
            'bio' => 'required',
            'description' => 'required',
            'birth_date' => 'required|date_format:Y-m-d|before:death_date',
            'death_date' => 'required|date_format:Y-m-d|after:birth_date',
            'allow_comments' => 'required',
        ]);

        $data = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'relationship' => $request->relationship,
            'user_id' => auth()->id(),
            'bio' => $request->bio,
            'description' => $request->description,
            'birth_date' => $request->birth_date,
            'death_date' => $request->death_date,
            'city' => $request->city,
            'state' => $request->state,
            'allow_comments' => $request->allow_comments  == 'false' ? false : true,
        ];

        Passedaway::updateOrCreate(
            ['user_id' => auth()->id()],
            $data
        );

        return redirect()->back()->with('success', 'Profile saved successfully');
    }

    public function media()
    {
        $profile = Passedaway::with("media","qrcode.qrcode")->where('user_id', auth()->user()->id)->first();
        if(!$profile){
            return redirect()->route("passedaway.profile.bio");
        }
        return Inertia::render('Site/PasswayMedia', [
            'profile' => $profile ?? null
        ]);
    }

    public function uploadProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $profile_picture->getClientOriginalName());
            $profile_picture->move(public_path('profilepictures'), $fileName);
            $profile_picture = url("profilepictures/".$fileName);

            Passedaway::updateOrCreate(
                ['user_id' => auth()->id()],
                ['profile_picture' => $profile_picture]
            );
        }
        return redirect()->back()->with('success', 'Cover Photo Updated successfully');
    }
    public function uploadCoverPhoto(Request $request)
    {
        $request->validate([
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('cover_photo')) {

            $cover_photo = $request->file('cover_photo');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $cover_photo->getClientOriginalName());
            $cover_photo->move(public_path('coverphoto'), $fileName);
            $cover_photo = url("coverphoto/".$fileName);

            Passedaway::updateOrCreate(
                ['user_id' => auth()->id()],
                ['cover_photo' => $cover_photo]
            );
        }
        return redirect()->back()->with('success', 'Cover Photo Updated successfully');
    }


    public function storeMedia(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'nullable|exists:media',
            // 'title' => 'required',
            // 'summary' => 'required',
            'type' => 'required|in:video,audio,image',
            'passedaway_id' => 'required|exists:passedaways,id',
            'video_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $media = $validatedData['id'] ? Media::find($validatedData['id']) : new Media();

        if ($request->hasFile('image')) {
            // Store the uploaded image and get the full URL
            $imagePath = $request->file('image')->store('media/images', 'public');
            $media->file_path = asset(Storage::url($imagePath));
        }

        $media->title = $validatedData['title'] ?? "";
        $media->summary = $validatedData['summary'] ?? "";
        $media->type = $validatedData['type'];
        $media->video_url = $validatedData['video_url'];
        $media->passedaway_id = $validatedData['passedaway_id'];
        $media->save();

        return redirect()->back()->with('success', 'Media uploaded successfully.');
    }

    // Fetch a specific media record
    public function getMedia(Media $media)
    {
        return response()->json($media);
    }

    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id);

        // If the media is an image, delete the file from storage
        if ($media->type === 'image' && $media->file_path) {
            $filePath = str_replace('/storage', '', $media->file_path);
            Storage::disk('public')->delete($filePath);
        }

        // Delete the media record from the database
        $media->delete();

        return redirect()->back()->with('success', 'Media deleted successfully.');
    }
}
