<template>
<div class="row">
    <div class="col-md-8">
        <vue-progress-bar></vue-progress-bar>
        <chat-log :messages="messages" ></chat-log>
        <chat-composer @sent="addMessage" :activepeer="activePeer" ></chat-composer>
    </div>
    <div class="col-md-4">
        <list-user :users="users"></list-user>
        <router-link to="/" tag="button" class="btn-default">Back</router-link>
    </div>
</div>
</template>
<script>
export default {
  data() {
    return {
      messages: [],
      users: [],
      activePeer: false,
      typingTimer: false
    };
  },
  methods: {
    addMessage(message) {
      this.messages.push(message);
      axios.post("/messages", message).then(response => {
      });
    }
  },
  created() {
      this.$Progress.start()
    axios.get("/messages").then(response => {
      this.messages = response.data;
    });

    Echo.join("chatroom")
      .here(user => {
        this.users = user;
      })
      .joining(user => {
        this.users.push(user);
        toastr.success(
          "Đại ca " + user.name + " đã vào phòng chat",
          "Chào mừng"
        );
      })
      .leaving(user => {
        this.users.splice(this.users.indexOf(user), 1);
        toastr.warning("Đại ca " + user.name + " đã rời phòng");
      })
      .listen("MessagePosted", e => {
        this.messages.push({
          message: e.message.message,
          user: { name: e.user.name, image_path: e.user.image_path }
        });
      })
      .listenForWhisper("typing", e => {
        this.activePeer = e;
        if (this.typingTimer) clearTimeout(this.typingTimer);
        this.typingTimer = setTimeout(() => {
          this.activePeer = false;
        }, 3000);
      });
  }
};
</script>
