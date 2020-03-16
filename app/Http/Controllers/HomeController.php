<?php

namespace App\Http\Controllers;

use App\Constants\BankList;
use App\Http\Requests\RegisterDriverRequest;
use App\Http\Requests\UserFeedbackRequest;
use App\Models\User;
use App\Models\UserFeedback;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Optix\Media\MediaUploader;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function about(): View
    {
        return view('about');
    }

    public function driver(User $_drivers): View
    {
        $drivers = $_drivers->newQuery()->paginate(16);


        return view('driver', compact('drivers'));

    }

    public function registerDriver(): View
    {
        $banks = BankList::labels();
        return view('register_driver', compact('banks'));
    }

    public function registerDriverSubmit(RegisterDriverRequest $request, User $user): RedirectResponse
    {
        $data = $request->data();
        $file = $request["file_foto"];

        $media = MediaUploader::fromFile($file)
            ->useFileName("supirin_" . Carbon::now()->format("YmdHis") . ".jpg")
            ->upload();

        unset($data["file_foto"]);
        $driver = $user->newQuery()->create($data);
        $driver->attachMedia($media, "profile_pictures", ["profile_picture"]);
        return back()->with(['success' => 'Pendaftaran berhasil.']);
    }

    public function contact(): View
    {
        return view("contact");
    }

    public function sendFeedback(UserFeedbackRequest $request, UserFeedback $feedback): RedirectResponse
    {
        $data = $request->data();
        $feedback->newQuery()->create($data);
        return back()->with(["success" => "Terkirim."]);
    }
}
