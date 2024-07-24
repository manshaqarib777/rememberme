<?php

namespace App\Http\Controllers;

use App\Models\Passedaway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PassedawayController extends Controller
{
    public function index()
    {
        $Passedaway = Passedaway::where('user_id', auth()->user()->id)->first(); // Assuming there is only one Passedaway or adjust as per your application logic
        return Inertia::render('Site/PasswayProfile', [
            'profile' => $Passedaway
        ]);
    }

    public function store(Request $request)
    {


        $data = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'title' => $request->title,
            'relationship' => $request->relationship,
            'user_id' => $request->user_id,
            'bio' => $request->bio,
            'description' => $request->description,
            'birth_date' => $request->birth_date,
            'death_date' => $request->death_date,
            'allow_comments' => $request->allow_comments  == 'false' ? false : true,

        ];

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('profile_pictures');
        }



        if ($request->hasFile('profile_picture')) {
            $profile_picture = $request->file('profile_picture');
            $fileName = time() . '_' . $profile_picture->getClientOriginalName();
            $profile_picture->move(public_path('profilepictures'), $fileName);
            $data['profile_picture'] = "profilepictures/".$fileName;
        }

        if ($request->hasFile('cover_photo')) {
            $cover_photo = $request->file('cover_photo');
            $fileName = time() . '_' . $cover_photo->getClientOriginalName();
            $cover_photo->move(public_path('coverphoto'), $fileName);
            $data['cover_photo'] = "coverphoto/".$fileName;
        }

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                // Store images in the public/images folder
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $fileName);
                $images[] = "images/".$fileName;
            }
            $data['images'] = json_encode($images);
        }
        // Convert date formats
        if (!empty($data['birth_date'])) {
            $data['birth_date'] = \Carbon\Carbon::parse($data['birth_date'])->format('Y-m-d');
        }
        if (!empty($data['death_date'])) {
            $data['death_date'] = \Carbon\Carbon::parse($data['death_date'])->format('Y-m-d');
        }


        // Check if profile exists and update or create new one
        $profile = Passedaway::updateOrCreate(
            ['user_id' => auth()->id()],
            $data
        );

        return redirect()->back()->with('success', 'Profile saved successfully');
    }
    public function update(Request $request, Passedaway $Passedaway)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            // Add other validation rules as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $Passedaway->update($request->all());

        return redirect()->back()->with('success', 'Passedaway updated successfully');
    }
}
