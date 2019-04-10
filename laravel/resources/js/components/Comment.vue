<template>
    <div class="post-comment">
        <img :src="'http://localhost:8000/storage/'+this.comment.user_avatar" alt="" class="profile-photo-sm" />
        <h4><a href="#" class="profile-link" >{{this.comment.user_name}}</a>  :   </h4>
        <h4 class="grey-spec">{{this.comment.title}}</h4>
        <button v-if="this.auth===this.comment.user_id" @click="delComment"  class="delete-coment"><i class="fa fa-times" aria-hidden="true" ></i></button>
    </div>
</template>
<script>

    export default {
        props:{
            comment:Object,
            auth:Number
        },
        methods:{
            delComment()
            {
                this.$emit('deleComment', this.comment)
            },
            moment() {
                return moment(this.comment.created_at).fromNow();
            }
        }
    }
</script>
