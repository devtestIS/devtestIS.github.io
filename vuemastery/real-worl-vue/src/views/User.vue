<template>
  <div class="user">This is {{ username }}'s page</div>
</template>

<script>
export default {
  props: {
    username: {
      type: String,
      default: ""
    }
  }
};
</script>

<style></style>
