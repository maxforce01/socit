<style>
    .panel .mce-panel {
        border-left-color: #fff;
        border-right-color: #fff;
    }

    .panel .mce-toolbar,
    .panel .mce-statusbar {
        padding-left: 20px;
    }

    .panel .mce-edit-area,
    .panel .mce-edit-area iframe,
    .panel .mce-edit-area iframe html {
        padding: 0 10px;
        min-height: 350px;
    }

    .mce-content-body {
        color: #555;
        font-size: 14px;
    }

    .panel.is-fullscreen .mce-statusbar {
        position: absolute;
        bottom: 0;
        width: 100%;
        z-index: 200000;
    }

    .panel.is-fullscreen .mce-tinymce {
        height:100%;
    }

    .panel.is-fullscreen .mce-edit-area,
    .panel.is-fullscreen .mce-edit-area iframe,
    .panel.is-fullscreen .mce-edit-area iframe html {
        height: 100%;
        position: absolute;
        width: 99%;
        overflow-y: scroll;
        overflow-x: hidden;
        min-height: 100%;
    }
</style>
<form class="form-edit-add" role="form" action="http://localhost:8000/admin/posts" method="POST" enctype="multipart/form-data">
    <!-- PUT Method if we are editing -->
    <div class="row">
        <div class="col-md-8">
            <!-- ### TITLE ### -->
            <div class="panel">

                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="voyager-character"></i> Заголовок
                        <span class="panel-desc"> Название статьи</span>
                    </h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Название" value="">
                </div>
            </div>

            <!-- ### CONTENT ### -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Текст сообщения</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                <textarea class="form-control richTextBox" name="body" onresize="false">

    </textarea>
                </div>
            </div><!-- .panel -->

            <!-- ### EXCERPT ### -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Анонс <small>Краткое описание статьи</small></h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <textarea class="form-control" name="excerpt" onresize="false">

                    </textarea>
                </div>
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Дополнительные поля</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group  " >
                        <label for="name">Video</label>
                        <input  type="file" name="video[]" multiple="multiple">
                    </div>
                    <div class="form-group  " >
                        <label for="name">tags</label>
                        <select
                            class="form-control  select2-ajax "
                            name="post_belongstomany_tag_relationship[]" multiple>
                            @foreach(\App\Tag::all() as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <!-- ### DETAILS ### -->
            <div class="panel panel panel-bordered panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-clipboard"></i> Свойства</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="slug">Ссылка</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                               placeholder="slug"
                               data-slug-origin=title data-slug-forceupdate=true
                               value="">
                    </div>
                    <div class="form-group">
                        <label for="status">Статус публикации</label>
                        <select class="form-control" name="status">
                            <option value="PUBLISHED">Опубликовано</option>
                            <option value="DRAFT">Черновик</option>
                            <option value="PENDING">На модерации</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Категория сообщения</label>
                        <select class="form-control" name="category_id">
                            @foreach(\App\Category::all() as $category)
                                @if($category->parent_id == $parent->id)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                 @endif
                             @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="featured">Рекомендуемый</label>
                        <input type="checkbox" name="featured">
                    </div>
                </div>
            </div>
            <!-- ### IMAGE ### -->
            <div class="panel panel-bordered panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-image"></i> Изображение</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="file" name="image">
                </div>
            </div>
            <!-- ### SEO CONTENT ### -->
            <div class="panel panel-bordered panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="icon wb-search"></i> SEO текст</h3>
                    <div class="panel-actions">
                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="meta_description">Описание (meta)</label>
                        <textarea class="form-control" name="meta_description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Ключевые слова (meta)</label>
                        <textarea class="form-control" name="meta_keywords"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="seo_title">SEO название</label>
                        <input type="text" class="form-control" name="seo_title" placeholder="SEO Title" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">
        <i class="icon wb-plus-circle"></i> Опубликовать</button>
</form>
