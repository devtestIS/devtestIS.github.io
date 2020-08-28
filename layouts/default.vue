<template>
  <v-app dark>
    <Header />
    <MainContent />
    <v-footer></v-footer>
  </v-app>
</template>

<script>
import Header from '@/components/Header'
import MainContent from '@/components/MainContent'

export default {
  components: {
    Header,
    MainContent,
  },
}
</script>
