<template>
    <div>
        <div class="col-md-3 col-sm-3">
            <button v-if="!flag" v-on:click="subscribe" class="btn btn-info pull-right">Подписаться</button>
            <button v-if="flag" v-on:click="unsubscribe" class="btn btn-danger pull-right">Отписаться</button>
        </div>
    </div>
</template>
<script>
    export default {
        props:{
            user:Object,
            flag:Boolean,
        },
        methods:{
            subscribe:function(responce)
            {
                toastr.success("Cool subcribe 😜");
                axios
                    .get("/users/subscribe/"+this.user.id)
                    .then(response = "ok" ? this.flag = true : this.flag = false);
            },
            unsubscribe:function (responce) {
                toastr.error("Return back 🥺");
                axios
                    .get("/users/unsubscribe/"+this.user.id)
                    .then(response = "ok" ? this.flag = false : this.flag = true);
            }
        },
        mounted() {
        }
    }
</script>

