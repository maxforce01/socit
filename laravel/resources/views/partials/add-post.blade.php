<div class="create-post">
    <div class="row">
                <div class="text-center">
                    <button class="btn btn-info btn-md" data-toggle="modal" data-target="#exampleModal">Опубликовать</button>
                </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title grey" id="exampleModalLabel">Добавить пост</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="post-comment" action="{{route('post.create')}}" method="post" enctype="multipart/form-data" >
                            <label for="title">Заголовок</label>
                            <input type="text" id="title" name="title" class="form-control">
                            <label for="excerpt">Краткое описание</label>
                            <input type="text" id="excerpt" name="excerpt" class="form-control">
                            <label for="body">Описание</label>
                            <richtextbox name="body" id="body"></richtextbox>
                            <label>Категория</label>
                            <select class="parent form-control" onchange="reload_script()">
                                @foreach($categories = \App\Category::where('parent_id',null)->get() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label>Подкатегория</label>
                            <select name="category_id" class="child form-control"></select>
                            <br>
                            <label>Тэги</label>
                            <select name="tags[]" class="form-control" id="tags" multiple="multiple">
                                @foreach($tags = \App\Tag::all() as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <label>Каритнка</label>
                            <input name="image" class="form-control" type="file">
                            <label>Видео</label>
                            <input name="video" class="form-control" type="file">
                            <br>
                            <div class="line-divider"></div>
                            <button  type="submit" class="btn btn-success btn-md">Success</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
