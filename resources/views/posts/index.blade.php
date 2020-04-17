@extends('layouts.app')

@section('content')

    <div class="container-fluid p-0">
        <main>
            <div>
                <div class="justify-content-center py-5">
                    <div class="text-white text-xl-center " style="font-family: 'Bookman Old Style';  "><h1>See All
                            Posts </h1></div>
                    <p class="text-center text-lightDark pt-5">We try to make your day interesting!</p>
                </div>
            </div>

        </main>
        <div class="row justify-content-start pt-4 pl-5">


            @foreach($posts as $post)
                <div class="card mb-3 ml-4 card-grey-bg text-white border-white" style="max-width: 500px;">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">

                                <h5 class="card-title"><a href="/posts/{{$post->id}}"
                                                          class="text-white font-weight-bold">{{$post->title}}</a></h5>

                                <p class="card-text d-block" style="max-width: 250px;">
                                    {!! Str::limit(nl2br($post->content), 150)!!}</p>

                                <p class="card-text"><small class="text-lightDark">{{$post->created_at}}
                                        by {{$post->user->username}}</small></p>


                            </div>
                            <div class="d-flex card-footer">
                                @foreach($post->tags as $tag)
                                    <span class="badge badge-light  mr-2 p-2">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img
                                src="/storage/{{$post->image}}"
                                class="card-img-bottom">
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        .
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                {{$posts->links()}}
            </div>
        </div>

    </div>


@endsection
