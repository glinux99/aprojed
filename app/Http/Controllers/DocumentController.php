<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Document::with('documentable')->latest();

        if (request('search')) {
            $query->where('original_name', 'like', '%' . request('search') . '%');
        }

        return Inertia::render('Document', [
            'documents' => $query->paginate(10)->withQueryString(),
            'articles' => Article::select('id', 'title')->get(),
            'users' => User::select('id', 'name')->get(),
            'filters' => request()->only(['search']),
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_file' => 'required|file|max:10240', // 10MB Max
            'original_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'article_id' => 'nullable|exists:articles,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $file = $request->file('document_file');
        $path = $file->store('documents', 'public');

        $documentable_id = $validated['article_id'] ?? $validated['user_id'] ?? null;
        $documentable_type = null;
        if (!empty($validated['article_id'])) {
            $documentable_type = Article::class;
        } elseif (!empty($validated['user_id'])) {
            $documentable_type = User::class;
        }

        Document::create([
            'path' => $path,
            'original_name' => $validated['original_name'] ?: $file->getClientOriginalName(),
            'description' => $validated['description'],
            'documentable_id' => $documentable_id,
            'documentable_type' => $documentable_type,
        ]);

        return Redirect::route('documents.index')->with('success', 'Document téléversé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        return Redirect::to('/storage/' . $document->path);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'original_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'document_file' => 'nullable|file|max:10240', // 10MB Max
            'article_id' => 'nullable|exists:articles,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $document->fill($request->only(['original_name', 'description']));

        $documentable_id = $request->input('article_id') ?? $request->input('user_id') ?? null;
        $documentable_type = null;
        if ($request->input('article_id')) {
            $documentable_type = Article::class;
        } elseif ($request->input('user_id')) {
            $documentable_type = User::class;
        }
        $document->documentable_id = $documentable_id;
        $document->documentable_type = $documentable_type;

        if ($request->hasFile('document_file')) {
            // Supprimer l'ancien fichier
            if ($document->path) {
                Storage::disk('public')->delete($document->path);
            }
            // Enregistrer le nouveau fichier
            $file = $request->file('document_file');
            $document->path = $file->store('documents', 'public');
        }

        $document->save();
        return Redirect::route('documents.index')->with('success', 'Document modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->path) {
            Storage::disk('public')->delete($document->path);
        }
        $document->delete();

        return Redirect::route('documents.index')->with('success', 'Document supprimé avec succès.');
    }
}
