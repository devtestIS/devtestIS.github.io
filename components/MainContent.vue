<template>
  <v-main>
    <v-container>
      <router-view></router-view>
    </v-container>
  </v-main>
</template>

<script>
import { createNamespacedHelpers } from 'vuex'

const { mapActions } = createNamespacedHelpers('user')
export default {
  name: 'MainContent',
  created() {
    this.getUser()
  },
  methods: {
    ...mapActions(['getUser']),
  },
}
</script>

<style lang="scss" scoped></style>
