<template>
  <div
    v-if="show"
    class="backdrop"
  >
    <div class="modal">
      <div class="modal__header">
        <slot name="header" />
      </div>
      <div class="modal__main">
        <slot />
      </div>
      <div class="moadal__footer">
        <slot name="footer" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'BaseModal',
  props: {
    show: {
      type: Boolean,
      required: false
    }
  }
}
</script>

<style lang="scss" scoped>
.backdrop {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0, 0.3);
}

.modal {
  padding: 40px;
  border-radius: 6px;
  background: #fff;
  border: 1px solid #eee;
  color: #0a2b4e;
}
</style>
