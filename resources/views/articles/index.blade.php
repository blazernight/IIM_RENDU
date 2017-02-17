@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @forelse($articles as $article)
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->content }}</p>



                            @if(!$article->picture)
                                <img src="http://placehold.it/50x50"><br>
                            @else
                                <img src="{{ asset('uploads/article_pictures/' . $article->picture) }}" alt=""><br>
                            @endif

                            @include('components.share', ['url' => route('article.show', ['id' => $article->id])])

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
