<template>

    <div class="emoji-page">
        <input type="hidden" name="title" v-model="text">
        <textarea2 v-model="text"/>
    </div>
</template>

<script>
    import TextareaEmojiPicker from './Emoji'
    export default {
        name: "emoji-vue",
        components: { TextareaEmojiPicker },
        data () {
            return {
                text: ''
            }
        }
    }
</script>
