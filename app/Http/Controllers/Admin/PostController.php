<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts= Post::all();

         return view( 'admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    
    {

//  get all types
        $types = Type::all();
        //  get all technologies
        $technologies = Technology::all();
        
        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
         // dd($request->all());
         $data = $request->validated();



        $new_post = new Post();

        //  $post->title = $data['title'];
        //  $post->content = $data['content'];
        $new_post->fill($data);
          $new_post->slug = Str::of($new_post->title)->slug('-');

 
       

          $new_post->save();


          if (isset($data['technologies'])){
               $new_post->technologies()->sync($data['technologies']);

          }
       
         return redirect()->route('admin.posts.index')->with('message',"Post $new_post->id creato correttamente");


    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        // return 'sono il dettaglio';

        // $post = Post::where('slug', $slug)->first();

        // dd($post); 

        return view('admin.posts.show' , compact('post'));
  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //

 $types = Type::all();

   $technologies = Technology::all();

        //
    
           return view('admin.posts.edit', compact('post','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //

         $data = $request->validated();

 
         


        //  $post->title = $data['title'];
        //  $post->content = $data['content'];
        //  $post->slug = $data['slug'];

         $post->save();

         
               $post->technologies()->sync($data['technologies']);

   



         $post->update($data);


         
         return redirect()->route('admin.posts.index')->with('message', "Post $post->id aggiornato correttamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->technologies()->sync([]);
         $post_id = $post->id;
         $post->delete();

         return redirect()->route('admin.posts.index')->with('message', "Post $post_id cancellato correttamente");
    }
}
