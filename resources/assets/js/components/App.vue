<template>


</template>
<script>
export default {
mounted () {
    //  [App.vue specific] When App.vue is finish loading finish the progress bar
  },
  created () {
    //  [App.vue specific] When App.vue is first loaded start the progress bar
    this.$Progress.start()
    //  hook the progress bar to start before we move router-view
  }
};
</script>
