<template>
  <form @submit.prevent="setItem(noteIndex)">
    <label>
      Заголовок
      <input
        v-model="itemHeading"
        type="text"
      >
    </label>
    <label>
      Новый пункт
      <input
        v-model="itemText"
        type="text"
      >
    </label>
    <button
      type="button"
      @click="addItem"
    >
      Добавить
    </button>
    <Preview :list="list" />
    <BaseButton
      type="submit"
    >
      Сохранить
    </BaseButton>
    <BaseButton
      type="button"
      @click.native="restoreModal"
    >
      Отменить
    </BaseButton>
    <BaseModal :show="showRestore">
      <template #header>
        <h1>Действительно удалить запись?</h1>
      </template>

      <BaseButton
        type="button"
        @click.native="() => {
          restoreChanges(noteIndex)
          restoreModal()
        }"
      >
        Да
      </BaseButton>
      <BaseButton
        type="button"
        @click.native="restoreModal"
      >
        Нет
      </BaseButton>
    </BaseModal>
    <BaseButton
      type="button"
      @click.native="modal"
    >
      Удалить
    </BaseButton>
    <BaseModal :show="show">
      <template #header>
        <h1>Действительно удалить запись?</h1>
      </template>

      <BaseButton
        type="button"
        @click.native="removeNote(noteIndex); modal"
      >
        Да
      </BaseButton>
      <BaseButton
        type="button"
        @click.native="modal"
      >
        Нет
      </BaseButton>
    </BaseModal>
    <BaseButton
      type="button"
      @click.native="UNDO_ACTION"
    >
      Назад
    </BaseButton>
    <BaseButton
      type="button"
      @click.native="REDO_ACTION"
    >
      Вперед
    </BaseButton>
  </form>
</template>

<script>
import Preview from '@/components/Preview.vue'
import { SET_TEXT, SET_LIST, RESTORE_LIST, UNDO_ACTION, REDO_ACTION, SET_HEADING } from '@/store/mutation-types'
import { mapState, mapActions, mapMutations } from 'vuex'
const formValue = (stateProp, mutationProp) => {
  return {
    get () {
      return this[stateProp]
    },
    set (value) {
      this[mutationProp](value)
    }
  }
}
export default {
  name: 'NoteEditor',
  components: {
    Preview
  },
  props: {
    noteIndex: {
      type: Number,
      required: true,
      default: NaN
    }
  },
  data () {
    return {
      show: false,
      showRestore: false
    }
  },
  computed: {
    ...mapState('items', ['text', 'list', 'heading']),
    itemText: formValue('text', SET_TEXT),
    itemHeading: formValue('heading', SET_HEADING)
  },
  created () {
    this.setExistingList(this.noteIndex)
  },
  methods: {
    ...mapActions('items', ['setItem', 'removeNote', 'setExistingList', 'restoreChanges']),
    ...mapMutations('items', [SET_TEXT, SET_LIST, RESTORE_LIST, UNDO_ACTION, REDO_ACTION, SET_HEADING]),
    addItem () {
      this[SET_LIST]()
    },
    modal () {
      this.show = !this.show
    },
    restoreModal () {
      this.showRestore = !this.showRestore
    }
  }
}
</script>

<style lang="scss" scoped>
</style>
