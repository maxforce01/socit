<template>
    <div>
    <div class="people-nearby">
        <div class="nearby-user">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <img :src="path" alt="user" class="profile-photo-lg" />
                </div>
                <div class="col-md-7 col-sm-7">

                    <h5><a href="#" class="profile-link">{{user.name}}</a></h5>
                    <p>Проффесия</p>
                    <p class="text-muted"></p>
                </div>
                <div class="col-md-3 col-sm-3">
                    <button v-if="!flag" v-on:click="subscribe" class="btn btn-info pull-right">Подписаться</button>
                    <button v-if="flag" v-on:click="unsubscribe" class="btn btn-danger pull-right">Отписаться</button>
                </div>
            </div>
        </div>
    </div>
    </div>

</template>
<script>
    export default {
        props:{
            user:Object,
            flag:Boolean,
            path: String
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

