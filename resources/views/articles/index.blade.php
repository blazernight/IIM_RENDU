@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div style="text-align: center;"><h1>Dashboard :</h1></div>
                    <div class="panel-heading"> <a style="margin-left: 300px;" href="{{route('article.create')}}">Ajouter un article</a></div>

                    <div class="panel-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @forelse($articles as $article)
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->content }}</p><br>

                            @if(!$article->picture)
                                <img src="http://placehold.it/50x50"><br>
                            @else
                                <img src="{{ asset('uploads/article_pictures/' . $article->picture) }}" alt=""><br>
                            @endif

                            @include('components.share', ['url' => route('article.show', ['id' => $article->id])])<br>



                                @foreach ($article->likes as $user)
                                    {{ $user->name }} likes this !
                                @endforeach


                                @if ($article->isLiked)
                                    <a href="{{ route('article.like', $article->id) }}">Unlike</a><br>
                                @else
                                    <a href="{{ route('article.like', $article->id) }}">Like this!</a><br>
                                @endif


                            <a href="{{route('article.show', ['id' => $article->id])}}">
                                Voir mon article
                            </a>

                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
