<template>
    <div>
        <label for="filtername">Find your hero:</label>
        <input v-model="findName" id="filtername" type="text" />
        <div v-for="user in filteredUsers">
            <user v-if="i_am.id!==user.id"  :user="user"></user>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {findName:"",}
        },
        props:{
            users:Array,
            i_am: Object,
        },
        methods:{
        },
        computed:{
            filteredUsers() {
                let result = this.users;
                if (!this.findName)
                    return result;
                const filterValue = this.findName.toLowerCase();
                const filter = user =>
                    user.name.toLowerCase().includes(filterValue);
                return result.filter(filter)
            }
        }
        }
</script>

