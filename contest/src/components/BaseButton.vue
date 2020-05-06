<template>
  <button
    :type="type"
    class="button"
  >
    <slot />
  </button>
</template>

<script>
export default {
  name: 'BaseButton',
  props: {
    type: {
      type: String,
      required: false,
      default: ''
    }
  }
}
</script>

<style lang="scss" scoped>
.button {
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin: 0.25em 0;
  padding: 10px 30px;
  border: none;
  border-radius: 30px;
  color: #39b982;
  border-color: #39b982;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.55s cubic-bezier(0.19, 1, 0.22, 1);

  &, &:focus, &:hover {
    outline: none;
  }

  &:hover {
    background: linear-gradient(to bottom right,#41b782,#86d169);
    color: #fff;
  }
}
</style>
