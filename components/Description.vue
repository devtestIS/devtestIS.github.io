<template>
  <v-row tag="section">
    <v-col>
      <h1 class="text-lg-h1">{{ name }}</h1>
      <p class="text-lg-h6">Front-end разработчик</p>
      <v-btn @click.stop="dialog = true">Узнать подробнее</v-btn>
      <v-dialog v-model="dialog" width="100%" max-width="1185">
        <Profile />
      </v-dialog>
    </v-col>
  </v-row>
</template>

<script>
import Profile from '@/components/Profile'
import { createNamespacedHelpers } from 'vuex'

const { mapState } = createNamespacedHelpers('user')
export default {
  name: 'Description',
  components: {
    Profile,
  },
  data() {
    return {
      dialog: false,
    }
  },
  computed: {
    ...mapState(['name']),
  },
}
</script>

<style lang="scss" scoped></style>
