<template lang="pug">
    div
        div
          input(v-model="numberA" type="number")
        div
          canvas(id="arrow" width="875" height="250")
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
  },
  mounted: function () {
    function draw () {
      let canvas = document.getElementById('arrow')
      if (canvas.getContext) {
        let ctx = canvas.getContext('2d')
        ctx.lineWidth = 1.5
        ctx.strokeStyle = '#333'
        ctx.beginPath()
        ctx.moveTo(0, 250)
        ctx.bezierCurveTo(150, 20, 725, 20, 875, 250)
        ctx.stroke()
      }
    }
    draw()
  }
}
</script>

<style lang="sass" scoped>

</style>
