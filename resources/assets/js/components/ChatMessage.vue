<template>
    <div class="container" :class="classname">
        <img :src="imagePath" :class="{right : classname}" alt="Avatar">
        <p>{{ message.message }}</p>
        <span class="time-right" :class="{ 'time-left' : classname }">{{ message.created_at}}</span>
    </div>
</template>

<script>
export default {
    props: ['message', 'classname'],
    data() {
      return {
        imagePath : this.message.user.image_path
      }
    },
    created() {
      // console.log(this.message.user.image)
    }
}
</script>

<style scoped>
/* Chat containers */
.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.darker {
  border-color: #ccc;
  background-color: #4080ff;
  color: #f1f1f1;
}

/* Clear floats */
.container::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

/* Style time text */
.time-right {
  float: right;
  color: #999;
}

/* Style time text */
.time-left {
  float: left;
  color: #f1f1f1;
}

/* .container:nth-child(2n+1) {
  border-color: #ccc;
  background-color: #ddd;
} */

</style>