<template>
  <div>
    <div class="instance">
      <h2>{{ index + 1 }} {{ item.heading }}</h2>
      <ul>
        <template
          v-for="(itemList, indexList) in item.list"
        >
          <li
            v-if="indexList < 2"
            :key="indexList"
          >
            {{ itemList.text }}
          </li>
        </template>
      </ul>

      <BaseButton @click.native="$emit('edit', index)">
        Редактировать запись
      </BaseButton>
      <BaseButton @click.native="modal">
        Удалить запись
      </BaseButton>
      <BaseModal :show="show">
        <template #header>
          <h1>Действительно удалить запись?</h1>
        </template>

        <BaseButton
          @click.native="removeNoteInstance(index).then(() => {
            modal()
          })"
        >
          Да
        </BaseButton>
        <BaseButton @click.native="modal">
          Нет
        </BaseButton>
      </BaseModal>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
  name: 'NoteInstance',
  props: {
    index: {
      type: Number,
      required: true,
      default: 0
    },
    item: {
      type: Object,
      required: true,
      default () {
        return {}
      }
    }
  },
  data () {
    return {
      show: false
    }
  },
  methods: {
    ...mapActions(['removeNoteInstance']),
    modal () {
      this.show = !this.show
    }
  }
}
</script>

<style lang="scss" scoped>
.instance {
  padding: 30px;
  margin: 15px 5px;
  background: #fff;
  box-shadow: 0 25px 55px rgba(0,0,0,.2), 0 16px 28px rgba(0,0,0,.24);
  border-radius: 25px;
}
</style>
