
@extends('layouts/main')

      @section('content')


<div class="container-fluid">

  <div class="column">
    <h1 class="text-center">Recette : {{$recipe->title}}  </h1>
    <h1 class="text-center"> Auteur : {{$author->name}}  </h1
  </div>

<div class="column text-center">
  <img class="img-thumbnail" style="max-width:50%" src="{{ asset("$recipe->image")}}" alt="{{$recipe->title}}">
</div>

<div class="column text-center">
      {{-- Recipe Comments --}}
        <div class="card mt-4">
            <h5 class="card-header">Commentaires <span class="comment-count float-right badge badge-info">{{ count($recipe->comments) }}</span></h5>
            <div class="card-body">
                {{-- Add Comment --}}
                @if(Auth::check())
                    <div class="add-comment mb-3">
                        @csrf
                        <textarea class="form-control comment" placeholder="Saisissez un commentaire"></textarea>
                        <button data-recipe="{{ $recipe->id }}" class="btn btn-dark btn-sm mt-2 save-comment">Envoyer</button>
                    </div>
                @endif
                <hr/>
                {{-- List Start --}}
                <div class="comments">
                    @if(count($recipe->comments)>0)
                        @foreach($recipe->comments as $comment)
                            <h5> {{ $comment->author->name }}  </h5>
                            <p> Le : {{ $comment->date }}</p>
                            <blockquote class="blockquote">
                              <small class="mb-0">{{ $comment->content }}</small>
                            </blockquote>
                            <hr/>
                        @endforeach
                    @else
                    <p class="no-comments">Cette recette ne dispose pas encore de commentaire</p>
                    @endif
                </div>
            </div>
        </div>
        {{-- ## End recipe Comments --}}
      </div>
    </div>

        <script type="text/javascript">
// Save Comment
$(".save-comment").on('click',function(){
    var _comment=$(".comment").val();
    var _post=$(this).data('post');
    var vm=$(this);
    // Run Ajax
    $.ajax({
        url:" /admin/recettes/{{$recipe->id}}",
        type:"post",
        dataType:'json',
        data:{
            comment:_comment,
            post:_post,
            _token:"{{ csrf_token() }}"
        },
        beforeSend:function(){
            vm.text('Saving...').addClass('disabled');
        },
        success:function(res){
            var _html='<blockquote class="blockquote animate__animated animate__bounce">\
            <small class="mb-0">'+_comment+'</small>\
            </blockquote><hr/>';
            if(res.bool==true){
                $(".comments").prepend(_html);
                $(".comment").val('');
                $(".comment-count").text($('blockquote').length);
                $(".no-comments").hide();
            }
            vm.text('Save').removeClass('disabled');
        }
    });
});
</script>

      @endsection
