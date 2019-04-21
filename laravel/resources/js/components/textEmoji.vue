<template>
<div>
    <div v-for="coment in commentsArray">
        <comment :auth="auth" :comment="coment" @deleComment="deleteComment"></comment>
    </div>
    <form class="post-comment" @submit.prevent='action()' method="post" >
        <input type="hidden" name="title" v-model="text">
        <textarea2 v-model="text"/>
        <input type="hidden" name="post_id" v-model="post_id">
        <button  type="submit" class="btn btn-primary btn-xs"><i class="fa fa-check" aria-hidden="true"></i></button>
    </form>
</div>
</template>

<script>
    import TextareaEmojiPicker from './Emoji'
    import Comment from './Comment'
    export default {
        name: "emoji-vue",
        components: {TextareaEmojiPicker, Comment},
        data() {
            return {
                    text: '',
                    commentsArray: this.coments,
            }
        },
        props: {
            coments: Array,
            post_id: Number,
            auth:Number
        },
        methods: {
            action(){
                axios.post('/comment/add', {
                          title: this.text,
                          post_id: this.post_id
                      }).then(response => (this.commentsArray.push(response.data)));
                this.text = '';
            },
            deleteComment(e)
            {
                axios.get('/comments/'+e.id)
                    .then(response => (this.commentsArray.splice(this.commentsArray.indexOf(e),1)));
            },

        },
    }
</script>
