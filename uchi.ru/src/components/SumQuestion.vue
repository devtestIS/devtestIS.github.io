<template lang="pug">
    div
        span {{firstNumber}} + {{secondNumber}} = ?
</template>

<script>
import {firstNumber, sum, secondNumber} from '../data/getNumbers'
export default {
  name: 'SumQuestion',
  data () {
    return {
      firstNumber: firstNumber,
      secondNumber: sum,
      sum: secondNumber
    }
  }
}
</script>

<style lang="sass" scoped>

</style>
