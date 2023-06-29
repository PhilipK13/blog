<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;


class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('BlogPosts/Index', [
            'blogPosts' => BlogPost::with('user:id,name')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Stores a blog post after verifying the length is less than 255 chars
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->blogPosts()->create($validated);

        return redirect(route('blogPosts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        //
    }

    /**
     * Updates the blog post after verifying the user is authenticated to do so.
     */
    public function update(Request $request, BlogPost $blogPost): RedirectResponse
    {
        $this->authorize('update', $blogPost);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $blogPost->update($validated);

        return redirect(route('blogPosts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        //
    }
}