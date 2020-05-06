<template>
  <div class="preview">
    <LabelItem
      v-for="(item, index) in list"
      :key="index"
      :item="item"
      :index="index"
    />
  </div>
</template>

<script>
import LabelItem from '@/components/LabelItem.vue'
import { REMOVE_ITEM, SET_CHECKED } from '@/store/mutation-types'
import { mapMutations } from 'vuex'
export default {
  name: 'Preview',
  components: {
    LabelItem
  },
  props: {
    list: {
      type: Array,
      required: true,
      default () {
        return []
      }
    }
  },
  data () {
    return {
      edit: false
    }
  },
  methods: {
    ...mapMutations('items', [REMOVE_ITEM, SET_CHECKED]),
    removeItem (index, event) {
      this[REMOVE_ITEM](index)
    },
    editText () {
      this.edit = !this.edit
    }
  }
}
</script>

<style lang="scss" scoped>
.preview {
  display: flex;
  flex-direction: column;
  flex-wrap: nowrap;
  margin-top: 15px;
}
</style>
