<div class="col-12">
    <div class="form-check">
        <input class="form-check-input" type="radio" wire:click="traer_datos()" wire:model="site_intro" value="posts" @if($site_intro=='posts') checked @endif name="site_intro" id="articles_type">
        <label class="form-check-label cursor-pointer" for="articles_type">
          Artículos
        </label>
    </div>


    <div class="form-check">
        <input class="form-check-input" type="radio" wire:click="traer_datos()" wire:model="site_intro" value="post" @if($site_intro=='post') checked @endif name="site_intro" id="article_type">
        <label class="form-check-label cursor-pointer" for="article_type">
          Un sólo artículo
        </label>
    </div>

    @if($posts)
        <select class="form-select mt-5" name="site_home_post_id" >
            <option disabled >Seleccione un post</option>
            @foreach ($posts as $c )
                <option value="{{ $c->id }}" @if($c->id== $site_home_post_id) selected  @endif >{{ $c->title }}</option>
            @endforeach
        </select>
    @endif


</div>
