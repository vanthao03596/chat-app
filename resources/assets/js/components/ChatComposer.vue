<template>
    <div>
        <input class="form-control" type="text" name="" id="" v-model="message"  @keyup.enter="sendMessage" @keydown="tapParticipants">
        <!-- <button class="btn btn-outline-primary" @click="sendMessage" >Send</button> -->
        <span v-if="activepeer" v-text="activepeer.name + 'is typing ...'"></span>
    </div>
</template>

<script>
export default {
    props : ['activepeer'],
  data() {
    return {
      message: "",
    };
  },
  methods: {
    tapParticipants() {
      Echo.join("chatroom").whisper("typing", {
        name: $('#navbarDropdown').text()
      });
    },
    sendMessage() {
      if (this.message.length != 0) {
        this.activepeer = false
        this.$emit("sent", {
          message: this.message,
          user: {
            id: Window.App.user.id,
            name: $('#navbarDropdown').text(),
            image_path: Window.App.user.image_path
          },
        }),
          this.message = ""
      }
    }
  }
};
</script>
