<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Article', [
            'articles' => Article::with('user', 'category', 'documents')->latest()->paginate(9),
        ]);
    }
    public function editeur($contents){

        $id=null;
        if(is_numeric($contents)){
            $article = Article::find($contents);
           $contents = $article->content;
           $id=$article->id;
        }

        return view('articles.articlesadd', ['contents'=>$contents, 'id'=>$id]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($content=[])
    {

        return Inertia::render('ArticleAdd', [
            'categories' => Category::all(),
            'contents'=>$content
        ]);
        // return view('articlesarticlesadd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // This logic seems to be for a different editor flow.
        // We will focus on the Inertia/Vue flow.
       if($request->id==null){
         if ($request->has('editor') && $request->editor == "1") {
            return $this->create($content = $request['content']);
        }
       }else{
        $article = Article::find($request->id);
        $article->update($request->only('content' ));
        return Redirect::route('articles.index')->with('success', 'Article créé avec succès.');
       }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'cover_photo' => 'nullable|image|max:2048', // 2MB Max
            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx,zip,rar|max:10240', // 10MB Max per file
            'tags' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
            'publicate'=> 'nullable'
        ]);

        $article = $request->user()->articles()->create($validatedData);

        if ($request->hasFile('cover_photo')) {
            $article->cover_photo_path = $request->file('cover_photo')->store('article_covers', 'public');
            $article->save();
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('article_documents', 'public');
                $article->documents()->create([
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        if ($request->filled('tags')) {
            $tagNames = array_map('trim', explode(',', $request->tags));
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                if (!empty($tagName)) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
            }
            $article->tags()->sync($tagIds);
        }

        return Redirect::route('articles.index')->with('success', 'Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $article->load('tags', 'documents');

        // Pour passer les tags comme une chaîne de caractères simple au formulaire
       if( $article->tags!=null ) $article->tags_string = $article->tags->pluck('name')->implode(', ');

        return Inertia::render('ArticleEdit', [
            'article' => $article,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'cover_photo' => 'nullable|image|max:2048',
            'documents' => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx,zip,rar|max:10240',
            'tags' => 'nullable|string|max:255',
            'source' => 'nullable|string|max:255',
            'documents_to_delete' => 'nullable|array',
            'documents_to_delete.*' => 'integer|exists:documents,id',
            'publicate'=>'nullable'
        ]);

        $article->update($request->only('title', 'content', 'category_id', 'source', 'publicate'));

        if ($request->hasFile('cover_photo')) {
            if ($article->cover_photo_path) {
                Storage::disk('public')->delete($article->cover_photo_path);
            }
            $article->cover_photo_path = $request->file('cover_photo')->store('article_covers', 'public');
            $article->save();
        }

        if (!empty($validatedData['documents_to_delete'])) {
            $documentsToDelete = Document::whereIn('id', $validatedData['documents_to_delete'])
                                         ->where('article_id', $article->id)
                                         ->get();
            foreach ($documentsToDelete as $doc) {
                Storage::disk('public')->delete($doc->path);
                $doc->delete();
            }
        }

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('article_documents', 'public');
                $article->documents()->create([
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        if ($request->filled('tags')) {
            $tagNames = array_map('trim', explode(',', $request->tags));
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                if (!empty($tagName)) {
                    $tag = Tag::firstOrCreate(['name' => $tagName]);
                    $tagIds[] = $tag->id;
                }
            }
            $article->tags()->sync($tagIds);
        } else {
            $article->tags()->detach();
        }

        return Redirect::route('articles.index')->with('success', 'Article modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Delete cover photo from storage
        if ($article->cover_photo_path) {
            Storage::disk('public')->delete($article->cover_photo_path);
        }

        // Delete associated documents and their files from storage
        foreach ($article->documents as $document) {
            Storage::disk('public')->delete($document->path);
        }
        $article->documents()->delete();

        $article->delete();
        return Redirect::route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
