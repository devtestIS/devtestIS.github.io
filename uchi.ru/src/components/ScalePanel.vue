<template lang="pug">
    div
        div
          input(v-model="numberA" type="number")
        img(src="../assets/sprite.png" alt="scale")
        span {{ numberA }}
</template>

<script>
export default {
  name: 'ScalePanel',
  data () {
    return {
      numberA: '',
      msg: 'Test'
    }
  }
}
</script>

<style lang="sass" scoped>

</style>
