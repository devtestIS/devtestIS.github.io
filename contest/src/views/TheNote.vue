<template>
  <NoteEditor :note-index="Number(noteIndex)" />
</template>

<script>
import NoteEditor from '@/components/NoteEditor.vue'
export default {
  name: 'TheNote',
  components: {
    NoteEditor
  },
  props: {
    noteIndex: {
      type: String,
      required: true,
      default: ''
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
