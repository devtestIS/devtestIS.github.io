<template>
  <div
    class="item-wrapper"
  >
    <label>
      <span
        class="text-editable"
        @click.prevent="editText"
      >{{ item.text }}</span>
      <input
        :checked="item.checked"
        type="checkbox"
        @change="SET_CHECKED(index)"
      >
      <button
        type="button"
        class="remove-item"
        @click="removeItem(index, $event)"
      >x</button>
    </label>
    <input
      v-if="edit"
      v-model="text"
      class="item-text"
      type="text"
      @blur="setText(index)"
    >
  </div>
</template>

<script>
import { REMOVE_ITEM, SET_CHECKED, SET_ITEM_TEXT } from '@/store/mutation-types'
import { mapMutations } from 'vuex'
export default {
  name: 'Preview',
  props: {
    item: {
      type: Object,
      required: true,
      default () {
        return {}
      }
    },
    index: {
      type: Number,
      required: true,
      default: 0
    }
  },
  data () {
    return {
      edit: false,
      text: this.item.text || ''
    }
  },
  methods: {
    ...mapMutations('items', [REMOVE_ITEM, SET_CHECKED, SET_ITEM_TEXT]),
    removeItem (index, event) {
      this[REMOVE_ITEM](index)
    },
    editText () {
      this.edit = !this.edit
    },
    setText (index) {
      this[SET_ITEM_TEXT]({
        index,
        text: this.text
      })
      this.edit = !this.edit
    }
  }
}
</script>

<style lang="scss" scoped>
.remove-item {
  display: inline-block;
  margin-left: 5px;
  color: red;
  background: none;
  border: none;
  outline: none;
  cursor: pointer;
}

.item-wrapper {
  position: relative;
  margin-bottom: 10px;
}

.item-text {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: #fff;
}

.text-editable {
  display: inline-block;
  margin-right: 5px;
  cursor: pointer;
}
</style>
