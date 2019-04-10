<template>
    <div>
        <form class="post-comment" @submit.prevent='action()' method="post" >
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control">
            <label for="excerpt">Краткое описание</label>
            <input type="text" id="excerpt" name="excerpt" class="form-control">
            <label for="body">Описание</label>
            <richtextbox name="body" id="body"></richtextbox>
            <label>Категория</label>
            <select2 @click="parentCategories" :options="parentCategoriesArr"></select2>
            <label>Подкатегория</label>
            <select2></select2>
            <label>Тэги</label>
            <select2 multiply @click="tags" :options="tagsArr['name']" ></select2>
            <label>Каритнка</label>
            <input type="file">
            <label>Видео</label>
            <input type="file">
            <br>
            <div class="line-divider"></div>
            <button  type="submit" class="btn btn-success btn-md">Success</button>
        </form>
        <button @click="info()">click</button>
    </div>
</template>

<script>
    import TextareaEmojiPicker from './Emoji'
    export default {
        name: "emoji-vue",
        components: {TextareaEmojiPicker, },
        data() {
            return {
                title: '',
                excerpt:'',
                body:'',
                childCategoriesArr:[],
                parentCategoriesArr:[],
                tagsArr:[],
            }
        },
        props:{

        },
        methods: {
            info(){
                console.log(this.parentCategoriesArr);
                console.log(this.tagsArr);
            },
            childCategories(){
                console.log(this.parentCategoriesArr);
                /*axios.get('/categories/child').then(response => (this.childCategoriesArr.push(response.data)));*/
            },
            parentCategories(){
                axios.get('/categories/parent').then(response => (this.parentCategoriesArr.push(response.data)));
            },
            tags()
            {
                axios.get('/tags').then(response => (console.log(response.data)));
                /**/
            },
            action(){
                /*axios.post('/comment/add', {
                    title: this.text,
                    post_id: this.post_id
                }).then(response => (this.commentsArray.push(response.data)));*/
            },
        },
        mounted() {
            axios.get('/tags').then(response => (this.tagsArr.push(response.data)));
            console.log(this.tagsArr['name']);
        }
    }
</script>
