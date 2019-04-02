<template>
    <div ref="div">
        <div class="reaction" >
            <button v-if="flag" v-on:click="removelike" class="btn text-green"><i class="icon ion-thumbsup"></i>{{counter}} Likes</button>
            <button v-if="flag_rep" v-on:click="repost" class="btn text-red"><i class="fas fa-reply-all"></i>Repost</button>
            <button v-if="!flag" v-on:click="getlike" class="btn text-green"><i class="icon ion-thumbsup"></i>{{counter}} Likes</button>
        </div>
    </div>
</template>
<script>
    export default {
        props:{
            counter:Number,
            post_id:Number,
            flag:Boolean,
            flag_rep:Boolean
        },
        methods:{
            removelike: function()
            {
                if(this.counter!=0)
                    this.counter--;
                axios
                    .get("/post/removelike/"+this.post_id)
                    .then(response => (console.log(response)));
                this.flag = false;

            },
            getlike: function()
            {
                this.counter++;
                axios
                    .get("/post/getlike/" + this.post_id)
                    .then(response => (console.log(response)));
                this.flag = true;
            },
            repost:function () {
                axios
                    .get("/post/repost/" + this.post_id)
                    .then(responce = "ok" ? this.flag_rep = false : this.flag_rep = true);
            }
        }
    }
</script>
