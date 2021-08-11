<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;

class PostsAdminController extends Controller
{

    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    
    public function index() //Exibe a tela Home
    {
        $posts = $this->post->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    public function create() //Exibe a tela incluir novos dados
    {
        return view('admin.posts.create');
    }

    public function store(Requests\PostRequest $request)  //Inclui os dados e retorna a tela Home
    {
        $this->post->create($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function edit($id) //Exibe a tela para editar um dado existente
    {
        $post = $this->post->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request) //Altera o dado escolhido e redireciona para tela Home
    {
        $this->post->find($id)->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)  //Deleta o dado escolhido e redireciona para a tela Home
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }
}
