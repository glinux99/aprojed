<?php

namespace App\Http\Controllers;

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
        $query = Document::with('article')->latest();

        if (request('search')) {
            $query->where('original_name', 'like', '%' . request('search') . '%');
        }

        return Inertia::render('Document', [
            'documents' => $query->paginate(10)->withQueryString(),
            'articles' => Article::select('id', 'title')->get(),
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
            'document_file' => 'required|file',
            'article_id' => 'nullable|exists:articles,id',
        ]);

        $file = $request->file('document_file');
        $path = $file->store('article_documents', 'public');

        Document::create([
            'path' => $path,
            'original_name' => $file->getClientOriginalName(),
            'article_id' => $validated['article_id'],
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
            'document_file' => 'nullable|file|mimes:pdf,doc,docx,zip,rar,jpg,png|max:10240',
            'article_id' => 'nullable|exists:articles,id',
        ]);

        $document->article_id = $validated['article_id'];

        if ($request->hasFile('document_file')) {
            // Supprimer l'ancien fichier
            if ($document->path) {
                Storage::disk('public')->delete($document->path);
            }
            // Enregistrer le nouveau fichier
            $file = $request->file('document_file');
            $document->path = $file->store('article_documents', 'public');
            $document->original_name = $file->getClientOriginalName();
        } else {
            // Si pas de nouveau fichier, mettre à jour le nom
            $document->original_name = $validated['original_name'];
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
