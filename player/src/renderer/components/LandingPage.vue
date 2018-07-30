<template>
  <main>
    <ul>
      <li v-for="(item, index) in pathFolder" v-bind:key="'item ' + index">{{ item }}</li>
    </ul>
  </main>
</template>

<script>
import { root } from '../files/files.js'

export default {
  data: () => ({
    pathFolder: root
  })
}
</script>


<style lang="scss">
  
</style>
