<template>
<div>
    <div class="scroll" ref="messageDisplay">
        <chat-message v-for="(message,index) in messages" :key="index" :message="message" :classname="message.user.id == user.id ? 'darker' : ''"></chat-message>
    </div>
</div>


</template>
<script>
export default {
    props : ['messages'],
    data() {
        return {
            user : Window.App.user
        }
    },
    computed : {

    },
    methods: {
        scrollToEnd() {
             var messageDisplay = this.$refs.messageDisplay;
             messageDisplay.scrollTop = messageDisplay.scrollHeight;
        },

    },
    updated() {
        this.scrollToEnd();
    }
}
</script>
<style scoped>
.scroll{
	max-height: 600px;
	overflow-y: scroll;
}
</style>
