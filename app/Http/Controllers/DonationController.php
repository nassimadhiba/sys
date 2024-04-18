<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\post;
use App\Models\User;
use App\Notifications\DonationNotification;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::where('user_id', auth()->user()->id)->paginate(10);
        return view('donations.index', compact('donations'));
    }

    public function create(string $postId)
    {
        return view("donations.create", ['postId' => $postId]);
    }

    public function store(Request $request)
    {
        $data =  $request->validate([
            'nom_prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'adresse' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'etat' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'montant_don' => 'required|string|max:10',
            'code_postal' => 'required|string|max:10',
            'post_id' => 'required|exists:post,id',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $data['user_id'] = $user->id;
        $post = post::with("user", 'donations')->findOrFail($request->post_id);
        $donation = $post->donations()->create($data);
        $user->notify(new DonationNotification($donation));

        return redirect()->back()->with('success', 'Donation créée avec succès!');
    }

    public function show(string $id)
    {
        $donation = Donation::findOrFail($id);
        return view('donations.show', compact('donation'));
    }

    public function destroy(string $id)
    {
        $donation = Donation::findOrFail($id);
        $donation->delete();
        return redirect()->route("donations.index")->with('success', 'Donation supprimée avec succès!');
    }
}
