<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{

    public function vu()
    {
        $post = post::where('statut','!=',false)->get();
        return view('welcome', compact('post'));
    }
    public function index(): view
    {
        $user = Auth::user();
        $role=$user->role;
        if ( $role=='admin') {
            $post = Post::all();

        }else{
            $post = Post::where('user_id',  Auth::id())->get();

        }
        return view('post.index', compact('post','role'));
    }

    public function create(): view
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titre' => 'required|string|max:255',
            'description' => 'required| string',
            'email' => 'required| string|max:255', // Validation du champ email
            'localisation' => 'required| string',


        ]);
        $validatedData['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/post_images', $imageName);
            $validatedData['image'] = 'post_images/' . $imageName;
        }

        post::create($validatedData);

        return redirect()->route('post.index')->with('success', 'post added successfully');

    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function accepter($id)
    {
        $post = Post::findOrFail($id);
        $post->statut=$post->statut==true ? false : true;
        $post->save();
        return redirect()->route('post.index')->with('success', 'post accepted successfully');
    }
    public function edit($id)
    {
        $post = post::where("user_id", auth()->user()->id)->find($id);
        return view('post.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {

        $post = post::where("user_id", auth()->user()->id)->find($id);

        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titre' => 'required|string|max:255',
            'description' => 'required| string',
            'email' => 'required| string|max:255', // Validation du champ email
            'localisation' => 'required| string',

        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/post_images', $imageName);
            $validatedData['image'] = 'post_images/' . $imageName;
        }


        $post->update($validatedData);

        return redirect()->route('post.show', $post->id)->with('success', 'post updated successfully');
    }


    public function destroy($id)
    {
        $post = post::where("user_id", auth()->user()->id)->find($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'post deleted successfully');

    }
}





