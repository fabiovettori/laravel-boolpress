<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin/posts/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // con una query recuero i dati dal form
        $post = $request->all();
        // salvo i dati recuoerati nel debug
        $new_post = new Post();
        $new_post->fill($post);
        $new_post->save();
        // faccio il redirect alla singola scheda del post
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (!$post) {
            abort(404); //se il post non esiste vado in 404
        };

        $data = [
            'post' => $post
        ];

        return view('admin/posts/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (!$post) {
            abort(404); //se il post non esiste vado in 404
        };

        $data = [
            'post'=> $post
        ];

        return view('admin/posts/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // faccio una query andando a leggere i dati inseriti nel form
        $data = $request->all();
        $post->author = $data['author'];
        $post->author = $data['contributor'];
        $post->title = $data['title'];
        $post->description = $data['description'];

        // prima di salvarlo verifico se il valore dello slug inserito nel form non sia già presente (deve essere unique!)
        $form_slug = $data['slug']; //valore trasmesso dal form
        $post_slug = $post->slug; //valore presente nel db

        if ($form_slug == $post_slug) {
            $post->slug = $form_slug;
            $post->save($data);
        } else {
            $test_slug = Post::where('slug', $form_slug)->first(); //interrogo il db e verifico se esiste uno slug uguali tra i posts del dm

            $counter = 1; //definisco un contatore che servirà a generare uno slug univoco a partire da quello inserito dall'utente
            while($test_slug){ //se $test_slug è vuoto la query restituisce NULL quindi non entro nel ciclo e posso salvare direttamente lo slug
                $slug_base = $test_slug->slug;
                // se sono entrato dentro al ciclo allora vuol dire che ho trovato uno slug nel db identico a quello inserito nel form dall'utente
                $form_slug = $slug_base . '-' . $counter; //ora però devo verificare se questo nuovo slug non sia stato già generato in precedente
                $test_slug = Post::where('slug', $form_slug)->first(); //quindi devo interrogare nuovamente il debug
                // prima di ripetere il test del dentro al while incremento il contatore (nel caso tornasse diverso da NULL)
                $counter ++;
            };
            // a questo punto posso salvae il valore dello slug
            $post->slug = $form_slug;
            // vado a salvare i valori inseriti
            $post->save($data);
        }

        // faccio il redirect alla view del singolo post (controllando prima se il salvataggio è andato a buon fine verificando se il salvataggio mi restituisce true o false)
        $saved = $post->save($data);
        dd($saved);

        if($saved){
            // faccio il redirect alla view del singolo post + messaggio di successo
            return redirect()->route('admin.posts.show', ['post'=> $post->id])->with('status', 'Post updated!');
        } else {
            // faccio il redirect alla view del singolo post + messaggio di errore
            return redirect()->route('admin.posts.show', ['post'=> $post->id])->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
