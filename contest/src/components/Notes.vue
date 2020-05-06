<template>
  <div class="wrapper">
    <NoteInstance
      v-for="(item, index) in notesList"
      :key="`item${index}`"
      :index="index"
      :item="item"
      @edit="edit"
    />
    <aside class="add-button">
      <BaseButton
        @click.native="edit(notesList ? notesList.length : 0)"
      >
        Добавить запись
      </BaseButton>
    </aside>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import NoteInstance from '@/components/NoteInstance'
export default {
  name: 'HelloWorld',
  components: {
    NoteInstance
  },
  computed: {
    ...mapState(['notesList'])
  },
  methods: {
    edit (index) {
      this.$router.push(`/note/${index}`)
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.wrapper {
  position: relative;
  padding-top: 15px;
  padding-left: 270px;
}

.add-button {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 50px 20px;
  background: #fff;
  box-shadow: 0 25px 55px rgba(0,0,0,.2), 0 16px 28px rgba(0,0,0,.24);
}
</style>
